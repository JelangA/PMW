<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\Attendance;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
	// Menampilkan daftar absensi
	public function index()
	{
		$attendances = Attendance::all();
		return ResponseFormatter::createAPI(200, 'success', 'Attendance list retrieved successfully', $attendances);
	}

	// Menampilkan detail absensi berdasarkan ID
	public function show($id)
	{
		$attendance = Attendance::findOrFail($id);
		return ResponseFormatter::createAPI(200, 'success', 'Attendance detail retrieved successfully', $attendance);
	}

	// Menambah absensi baru
	public function store(Request $request)
	{
		$validated = $request->validate([
			'student' => 'required|exists:students,nim',
			'workshop_id' => 'required|exists:workshops,workshop_id',
			'check_in_time' => 'required|date',
			'check_out_time' => 'nullable|date',
		]);
		
		$attendance = Attendance::create($validated);
		return ResponseFormatter::createAPI(201, 'success', 'Attendance created successfully', $attendance);
	}

	// Mengupdate absensi berdasarkan ID
	public function update(Request $request, $id)
	{
		$validated = $request->validate([
			'student' => 'required|exists:students,id',
			'workshop_id' => 'required|exists:workshops,workshop_id',
			'check_in_time' => 'required|date',
			'check_out_time' => 'nullable|date',
		]);
		
		$attendance = Attendance::findOrFail($id);
		$attendance->update($validated);
		
		return ResponseFormatter::createAPI(200, 'success', 'Attendance updated successfully', $attendance);
	}

	// Menghapus absensi berdasarkan ID
	public function destroy($id)
	{
		$attendance = Attendance::findOrFail($id);
		$attendance->delete();
		
		return ResponseFormatter::createAPI(200, 'success', 'Attendance deleted successfully', $attendance);
	}

	// Absensi Check-in
	public function checkIn(Request $request, $workshop_id)
	{
		$validated = $request->validate([
			'student' => 'required|exists:students,nim',
		]);
		
		$workshop = Workshop::where('workshop_id', $workshop_id)->first();
		if (!$workshop) {
			return ResponseFormatter::createAPI(404, 'failed', 'Workshop not found');
		}
		
		$now = Carbon::now();
		if ($now->lt($workshop->start_time) || $now->gt($workshop->end_time)) {
			return ResponseFormatter::createAPI(400, 'failed', 'Check-in is not allowed outside workshop schedule');
		}
		
		$existingAttendance = Attendance::where('student', $validated['student'])
			->where('workshop_id', $workshop_id)
			->whereNull('check_out_time')
			->first();
		
		if ($existingAttendance) {
			return ResponseFormatter::createAPI(400, 'failed', 'Already checked in');
		}
		
		$attendance = Attendance::create([
			'student' => $validated['student'],
			'workshop_id' => $workshop_id,
			'check_in_time' => $now,
			'check_out_time' => null,
		]);
		
		return ResponseFormatter::createAPI(201, 'success', 'Check-in successful', $attendance);
	}

	public function checkOut(Request $request, $workshop_id)
	{
		$validated = $request->validate([
			'student' => 'required|exists:students,nim',
		]);
		
		$attendance = Attendance::where('workshop_id', $workshop_id)
			->where('student', $validated['student'])
			->whereNull('check_out_time')
			->first();
		
		if (!$attendance) {
			return ResponseFormatter::createAPI(404, 'failed', 'Attendance not found or already checked out');
		}
		
		$workshop = Workshop::where('workshop_id', $attendance->workshop_id)->first();
		if (!$workshop) {
			return ResponseFormatter::createAPI(404, 'failed', 'Workshop not found');
		}
		
		if (!$attendance->check_in_time) {
			return ResponseFormatter::createAPI(400, 'failed', 'Check-in time is missing');
		}
		
		if ($attendance->check_out_time) {
			return ResponseFormatter::createAPI(400, 'failed', 'Already checked out');
		}
		
		$now = Carbon::now();
		if ($now->gt($workshop->end_time)) {
			return ResponseFormatter::createAPI(400, 'failed', 'Check-out is not allowed after workshop has ended');
		}
		
		$attendance->update([
			'check_out_time' => now(),
			'updated_at' => now()
		]);
		
		return ResponseFormatter::createAPI(200, 'success', 'Check-out successful', $attendance);
	}
}
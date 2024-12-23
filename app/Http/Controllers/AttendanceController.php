<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
	// Menampilkan daftar absensi
	public function index()
	{
		$attendances = Attendance::all();
		return AttendanceResource::collection($attendances);
	}
	
	// Menampilkan detail absensi berdasarkan ID
	public function show($id)
	{
		$attendance = Attendance::findOrFail($id);
		return new AttendanceResource($attendance);
	}
	
	// Menambah absensi baru
	public function store(Request $request)
	{
		$validated = $request->validate([
			'student' => 'required|exists:students,nim',
			'workshop_id' => 'required|exists:workshops,workshop_id',
			'check_in_time' => 'required|date',
			'check_out_time' => 'nullable|date',
			'status' => 'required|in:present,absent',
		]);
		
		$attendance = Attendance::create($validated);
		return new AttendanceResource($attendance);
	}
	
	// Mengupdate absensi berdasarkan ID
	public function update(Request $request, $id)
	{
		$validated = $request->validate([
			'student' => 'required|exists:students,id',
			'workshop_id' => 'required|exists:workshops,workshop_id',
			'check_in_time' => 'required|date',
			'check_out_time' => 'nullable|date',
			'status' => 'required|in:present,absent',
		]);
		
		$attendance = Attendance::findOrFail($id);
		$attendance->update($validated);
		
		return new AttendanceResource($attendance);
	}
	
	// Menghapus absensi berdasarkan ID
	public function destroy($id)
	{
		$attendance = Attendance::findOrFail($id);
		$attendance->delete();
		
		return response()->json(['message' => 'Attendance deleted successfully']);
	}
}

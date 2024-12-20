<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
	// Menampilkan daftar mahasiswa
	public function index()
	{
		$students = Student::all();
		return StudentResource::collection($students);
		
	}
	
	// Menampilkan detail mahasiswa berdasarkan ID
	public function show($nim)
	{
		$student = Student::findOrFail($nim);
		return new StudentResource($student);
	}
	
	// Menambah data mahasiswa baru
	public function store(Request $request)
	{
		$validated = $request->validate([
			'nim' => 'required|unique:students,nim|max:9',
			'name' => 'required|max:100',
			'major' => 'required|max:100',
			'study_program' => 'required|max:150',
			'year' => 'required|max:4',
			'email' => 'required|email|unique:students,email',
			'status' => 'required|in:active,inactive',
			'password' => 'required|min:6',
		]);
		
		$student = Student::create($validated);
		return new StudentResource($student);
	}
	
	// Mengupdate data mahasiswa berdasarkan ID
	public function update(Request $request, $nim)
	{
		$validated = $request->validate([
			'nim' => 'required|max:9',
			'name' => 'required|max:100',
			'major' => 'required|max:100',
			'study_program' => 'required|max:150',
			'year' => 'required|max:4',
			'email' => 'required|email',
			'status' => 'required|in:active,inactive',
			'password' => 'nullable|min:6',
		]);
		
		$student = Student::findOrFail($nim);
		$student->update($validated);
		
		return new StudentResource($student);
	}
	
	// Menghapus data mahasiswa berdasarkan ID
	public function destroy($nim)
	{
		$student = Student::findOrFail($nim);
		$student->delete();
		
		return response()->json(['message' => 'Student deleted successfully']);
	}
}

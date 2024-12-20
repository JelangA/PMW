<?php

namespace App\Http\Controllers;

use App\helpers\ResponseFormatter;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class authController
{
	public function login(Request $request)
	{
		try {
			// Validasi input
			$request->validate([
				'email' => 'required|email',
				'password' => 'required',
			]);
			
			// Cari pengguna berdasarkan email
			$user = User::where('email', $request->email)->first();
			
			// Jika pengguna tidak ditemukan
			if (!$user) {
				return ResponseFormatter::createAPI(401, 'failed', 'Email not found');
			}
			
			// Verifikasi password
			if (!Hash::check($request->password, $user->password)) {
				return ResponseFormatter::createAPI(401, 'failed', 'Invalid credentials');
			}
			
			// Membuat token setelah berhasil login
			$token = $user->createToken($request->email, ['student'])->plainTextToken;
			
			if ($token) {
				return ResponseFormatter::createAPI(200, 'success', $token);
			} else {
				return ResponseFormatter::createAPI(401, 'failed', 'Login failed');
			}
		} catch (\Throwable $th) {
			// Tangani kesalahan dan rollback jika ada masalah
			return ResponseFormatter::createAPI(400, 'failed', $th->getMessage());
		}
	}
	
	
	public function register(Request $request)
	{
		try{
			$request->validate([
				'nim' => 'required|numeric|unique:students,nim',
				'name' => 'required|string',
				'major' => 'required|string',
				'study_program' => 'required|string',
				'year' => 'required|numeric',
				'email' => 'required|email',
				'password' => 'required',
			]);
			
			DB::beginTransaction();
			
			$student = Student::create([
				'nim' => $request->nim,
				'name' => $request->name,
				'major' => $request->major,
				'study_program' => $request->study_program,
				'year' => $request->year,
				'email' => $request->email,
				'status' => 'active'
			]);
			
			
			$user = User::create([
				'name' => $request->name,
				'email' => $request->email,
				'password' => Hash::make($request->password),
				'nim' => $request->nim,
			]);
			
			
			
			if ($user && $student){
				DB::commit();
				return ResponseFormatter::createAPI(200, 'success', 'Register success');
			}else{
				DB::rollBack();
				return ResponseFormatter::createAPI(400, 'failed', 'Register failed');
			}
		}catch (\Throwable $th){
			DB::rollBack();
			return ResponseFormatter::createAPI(400, 'failed', $th->getMessage());
		}
	}
}

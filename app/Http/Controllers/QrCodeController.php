<?php

namespace App\Http\Controllers;

use App\Http\Resources\QrCodeResource;
use App\Models\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
	// Menampilkan daftar QR Code
	public function index()
	{
		$qrCodes = QrCode::all();
		return QrCodeResource::collection($qrCodes);
	}
	
	// Menampilkan detail QR Code berdasarkan ID
	public function show($id)
	{
		$qrCode = QrCode::findOrFail($id);
		return new QrCodeResource($qrCode);
	}
	
	// Menambah QR Code baru
	public function store(Request $request)
	{
		$validated = $request->validate([
			'qr_code_type' => 'required|in:check_in,check_out',
			'workshop_id' => 'required|exists:workshops,workshop_id',
			'qr_code' => 'required|string',
		]);
		
		$qrCode = QrCode::create($validated);
		return new QrCodeResource($qrCode);
	}
	
	// Mengupdate QR Code berdasarkan ID
	public function update(Request $request, $id)
	{
		$validated = $request->validate([
			'qr_code_type' => 'required|in:check_in,check_out',
			'workshop_id' => 'required|exists:workshops,workshop_id',
			'qr_code' => 'required|string',
		]);
		
		$qrCode = QrCode::findOrFail($id);
		$qrCode->update($validated);
		
		return new QrCodeResource($qrCode);
	}
	
	// Menghapus QR Code berdasarkan ID
	public function destroy($id)
	{
		$qrCode = QrCode::findOrFail($id);
		$qrCode->delete();
		
		return response()->json(['message' => 'QR Code deleted successfully']);
	}
}

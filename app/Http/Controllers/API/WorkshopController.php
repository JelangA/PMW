<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\WorkshopResource;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
	public function index()
	{
		$workshops = Workshop::all();
		return WorkshopResource::collection($workshops);
	}
	
	// Menampilkan detail workshop berdasarkan ID
	public function show($id)
	{
		$workshop = Workshop::findOrFail($id);
		return new WorkshopResource($workshop);
	}
	
	// Menambah workshop baru
	public function store(Request $request)
	{
		$validated = $request->validate([
			'title' => 'required|max:150',
			'description' => 'nullable|string',
			'start_time' => 'required|date',
			'end_time' => 'required|date|after:start_time',
			'location' => 'nullable|string',
		]);
		
		$workshop = Workshop::create($validated);
		return new WorkshopResource($workshop);
	}
	
	// Mengupdate data workshop berdasarkan ID
	public function update(Request $request, $id)
	{
		$validated = $request->validate([
			'title' => 'required|max:150',
			'description' => 'nullable|string',
			'start_time' => 'required|date',
			'end_time' => 'required|date|after:start_time',
			'location' => 'nullable|string',
		]);
		
		$workshop = Workshop::findOrFail($id);
		$workshop->update($validated);
		
		return new WorkshopResource($workshop);
	}
	
	// Menghapus workshop berdasarkan ID
	public function destroy($id)
	{
		$workshop = Workshop::findOrFail($id);
		$workshop->delete();
		
		return response()->json(['message' => 'Workshop deleted successfully']);
	}
}

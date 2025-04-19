<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Workshop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
	public function index(): JsonResponse
	{
		$workshops = Workshop::all();
		return ResponseFormatter::createAPI(200, 'success', 'Workshop list retrieved successfully', $workshops);
	}
	
	public function show($id): JsonResponse
	{
		$workshop = Workshop::find($id);
		
		if (!$workshop) {
			return ResponseFormatter::createAPI(404, 'error', 'Workshop not found', null);
		}
		
		return ResponseFormatter::createAPI(200, 'success', 'Workshop detail retrieved successfully', $workshop);
	}
	
	public function store(Request $request): JsonResponse
	{
		$validated = $request->validate([
			'title' => 'required|max:150',
			'description' => 'nullable|string',
			'start_time' => 'required|date',
			'end_time' => 'required|date|after:start_time',
			'location' => 'nullable|string',
		]);
		
		$workshop = Workshop::create($validated);
		
		return ResponseFormatter::createAPI(201, 'success', 'Workshop created successfully', $workshop);
	}
	
	public function update(Request $request, $id): JsonResponse
	{
		$validated = $request->validate([
			'title' => 'required|max:150',
			'description' => 'nullable|string',
			'start_time' => 'required|date',
			'end_time' => 'required|date|after:start_time',
			'location' => 'nullable|string',
		]);
		
		$workshop = Workshop::find($id);
		
		if (!$workshop) {
			return ResponseFormatter::createAPI(404, 'error', 'Workshop not found', null);
		}
		
		$workshop->update($validated);
		
		return ResponseFormatter::createAPI(200, 'success', 'Workshop updated successfully', $workshop);
	}
	
	public function destroy($id): JsonResponse
	{
		$workshop = Workshop::find($id);
		
		if (!$workshop) {
			return ResponseFormatter::createAPI(404, 'error', 'Workshop not found', null);
		}
		
		$workshop->delete();
		
		return ResponseFormatter::createAPI(200, 'success', 'Workshop deleted successfully', null);
	}
}
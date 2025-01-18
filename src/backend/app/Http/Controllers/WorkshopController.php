<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Http\Resources\WorkshopResource;
use App\Models\Workshop;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class WorkshopController extends Controller
{
	public function index(): JsonResponse
	{
		$workshops = Workshop::all();
		return ResponseFormatter::success(
			WorkshopResource::collection($workshops),
			'Workshops retrieved successfully'
		);
	}
	
	public function show($id): JsonResponse
	{
		$workshop = Workshop::find($id);
		
		if (!$workshop) {
			return ResponseFormatter::error(
				null,
				'Workshop not found',
				404
			);
		}
		
		return ResponseFormatter::success(
			new WorkshopResource($workshop),
			'Workshop retrieved successfully'
		);
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
		
		return ResponseFormatter::success(
			new WorkshopResource($workshop),
			'Workshop created successfully',
			201
		);
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
			return ResponseFormatter::error(
				null,
				'Workshop not found',
				404
			);
		}
		
		$workshop->update($validated);
		
		return ResponseFormatter::success(
			new WorkshopResource($workshop),
			'Workshop updated successfully'
		);
	}
	
	public function destroy($id): JsonResponse
	{
		$workshop = Workshop::find($id);
		
		if (!$workshop) {
			return ResponseFormatter::error(
				null,
				'Workshop not found',
				404
			);
		}
		
		$workshop->delete();
		
		return ResponseFormatter::success(
			null,
			'Workshop deleted successfully'
		);
	}
}
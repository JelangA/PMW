<?php
	
	use App\Http\Controllers\API\StudentController;
	use App\Http\Controllers\authController;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	
	Route::get('/user', function (Request $request) {
		return $request->user();
	})->middleware('auth:sanctum');
	
	Route::prefix('auth')->group(function () {
		Route::post('/login', [authController::class, 'login']);
		Route::post('/register', [authController::class, 'register']);
	});
	
	Route::prefix('students')->group(function () {
		Route::get('/', [StudentController::class, 'index']);
		Route::get('/{nim}', [StudentController::class, 'show']);
		Route::post('/', [StudentController::class, 'store']);
		Route::put('/{nim}', [StudentController::class, 'update']);
		Route::delete('/{nim}', [StudentController::class, 'destroy']);
	})->middleware('auth:sanctum');



<?php
	
	use App\Http\Controllers\authController;
	use App\Http\Controllers\StudentController;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	
//	Route::get('/user', function (Request $request) {
//		return $request->user();
//	})->middleware('auth:sanctum');
	
	Route::prefix('auth')->group(function () {
		Route::post('/login', [authController::class, 'login']);
		Route::post('/register', [authController::class, 'register']);
	});
	
	Route::prefix('students')->middleware('auth:sanctum')->group(function () {
		Route::get('/', [StudentController::class, 'index']);
		Route::get('/{nim}', [StudentController::class, 'show']);
		Route::post('/', [StudentController::class, 'store']);
		Route::put('/{nim}', [StudentController::class, 'update']);
		Route::delete('/{nim}', [StudentController::class, 'destroy']);
	});




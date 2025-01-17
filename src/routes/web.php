<?php

use Illuminate\Support\Facades\Route;
use App\Models\Attendance;

Route::get('/', function () {
	$attendance = Attendance::with('student')->first();
	dd($attendance);
    return view('welcome');
});

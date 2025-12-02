<?php

use Illuminate\Support\Facades\Route;
use App\Models\Attendance;

Route::get('/', function () {
	$attendance = Attendance::with('student')->first();
	dd($attendance);
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/admin/login');
})->name('login');

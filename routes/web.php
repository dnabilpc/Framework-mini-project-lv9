<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');
//Route untuk Students menggunakan Route resource grouping
//akan otomatis terbuat route CRUD dengan nama student.(nama method)
Route::resource('/student', StudentController::class);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController; 

Route::view('/', 'home'); 

Route::resources(JobController::class); 

Route::view('/contact', 'contact'); 

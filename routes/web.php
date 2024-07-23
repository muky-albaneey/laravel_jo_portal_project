<?php

use App\Http\Controllers\JobListingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\sessionController;
use App\Mail\JobPosted;
use App\Models\JobListing;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


// Route::get('/test', function () {
//     Mail::to('mukyalbani1@gmail.com')->send(
//         new JobPosted()
//     );

//     return 'done';
// });


Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('welcome');
});
Route::get('/jobs',[JobListingController::class, 'index']);

Route::get('/jobs/create',[JobListingController::class, 'create']);
Route::get('/jobs/{job}',[JobListingController::class, 'show']);


Route::post('/jobs/create',[JobListingController::class, 'store'])->middleware('auth');
// Route::get('/jobs/{job}/edit', [JobListingController::class, 'edit'])->middleware(['auth','can:edit_gate,job']);

Route::get('/jobs/{job}/edit', [JobListingController::class, 'edit'])
->middleware('auth')
->can('edit','job');
Route::patch('/jobs/{job}',[JobListingController::class, 'update']);
Route::delete('/jobs/{job}',[JobListingController::class, 'destroy']);


Route::get('/users',[RegisterController::class,'create']);
Route::post('/users',[RegisterController::class,'store']);



Route::get('/login',[sessionController::class,'create'])->name('login');
Route::post('/login',[sessionController::class,'store']);
Route::post('/logout',[sessionController::class,'destroy']);

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   // return view('welcome');
   return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/patients', function () {
    return view('patientlist');
});

Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::get('/doctors', function () {
    return view('doctorlist');
   
});
 Route::get('/createdoctor', function () {
    return view('doctoradd');});
    Route::get('/doctor/{id}', function ($id) {
    return view('doctoredit',[
            'id'=>$id,
            
             
        ]);});




 });



require __DIR__.'/auth.php';

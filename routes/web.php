<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/EditForm', function () {
    return view('student.edit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(App\Http\Controllers\StudentController::class)->group(function () {
    Route::get('/students', 'index')->name('student.index');
    Route::get('/add-student', 'create');
    Route::post('/add-student', 'store');
    Route::get('/student/edit/{student_id}','edit')->name('student.edit');
    Route::put('/students/update/{student_id}', 'update')->name('students.update');
    Route::get('/students/destroy/{student_id}', 'destroy')->name('students.destroy');
});

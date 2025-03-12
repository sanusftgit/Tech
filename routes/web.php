<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\studentsubjectcontroller;


Route::get('/', function () { return view('index');});


Route::get('/teach', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers/{id}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update');
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

Route::get('/teacher-to-student', function () {
    return redirect()->route('student.index');
});


Route::get('/teacher-to-student', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/teacher-to-student', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');

Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');




Route::get('/teacher-to-subject', function () {
    return redirect()->route('subjects.index');
});

Route::get('/teacher-to-subject', [SubjectController::class, 'index'])->name('subjects.index');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects.create');
Route::post('/teacher-to-subject', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/{id}', [SubjectController::class, 'show'])->name('subjects.show');
// Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');

Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');


Route::get('/teacher-to-studentsubject', function () {
    return redirect()->route('studentsubject.index');
});




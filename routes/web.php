<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController; // Assurez-vous d'inclure le contrôleur
use App\Http\Controllers\ExamController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;



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
})->name('home');

Route::get('/exams/results/show', [ExamController::class, 'showResult'])->name('exams.results.show');

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'customLogin'])->name('login.user');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('register', [AuthController::class, 'customRegistration'])->name('register.user');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update_password');

Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::put('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::resource('filieres', FiliereController::class);
    Route::resource('courses', CourseController::class);

    Route::get('/exams/results', [ExamController::class, 'createNote'])->name('exams.results.create');
    Route::post('/exams/results', [ExamController::class, 'storeResult'])->name('exams.results.store');

    Route::get('/exams', [ExamController::class, 'index'])->name('exams.index');
    Route::get('/exams/create', [ExamController::class, 'create'])->name('exams.create');
    Route::post('/exams', [ExamController::class, 'store'])->name('exams.store');
    Route::get('/exams/{exam}', [ExamController::class, 'show'])->name('exams.show');
    Route::get('/exams/{exam}', [ExamController::class, 'edit'])->name('exams.edit');
    Route::delete('/exams/{exam}', [ExamController::class, 'destroy'])->name('exams.destroy');
    Route::put('/exams/{id}', [ExamController::class, 'update'])->name('exams.update');

    // Route pour le tableau de bord
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});




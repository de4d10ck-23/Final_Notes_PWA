<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;


Route::post('/notes', [NoteController::class, 'store']);
Route::delete('/notes/{note}', [NoteController::class, 'destroy']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/weather', [AuthController::class, 'weather'])->name('weather');
Route::get('/dashboard', [NoteController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');








// Route::get('/', function () {
//     return view('login');
// });
// Route::middleware(['auth'])->group(function(){
// Route::get('/', [NoteController::class, 'dashboard'])->name('back');
// Route::post('/notes', [NoteController::class, 'store']);
// Route::put('/notes/{note}', [NoteController::class, 'update']);
// Route::delete('/notes/{note}', [NoteController::class, 'destroy']);

// });
// Route::get('/login',[AuthController::class, 'login'])->name('login');
// Route::post('/authenticate',[AuthController::class,'authenticate'])->name('login.submit');
// Route::get('/register', [AuthController::class,'register'])->name('register');
// Route::post('/registerData', [AuthController::class,'registration_store'])->name('storeReg');
// Route::post('/logout',[AuthController::class,'logout'])->name('logout');


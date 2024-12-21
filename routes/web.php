<?php

use App\Http\Controllers\AiController;
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
Route::middleware(['auth'])->group(function () {
    Route::get('/sozlesme-olustur', [AiController::class, 'contractView'])->name('contract');
    Route::post('/create-contract', [AiController::class, 'createContract'])->name('create.contract');
    
    Route::get('/danismana-sor', [AiController::class, 'privateView'])->name('private');
    Route::post('/create-here', [AiController::class, 'createPrivate'])->name('create.private');
    
    Route::get('/project', [AiController::class, 'projectView'])->name('project');
    Route::post('/proje-olustur', [AiController::class, 'createProject'])->name('create.project');
    Route::post('/logout', [AiController::class, 'logout'])->name('logout');
});
Route::get('/', [AiController::class, 'home'])->name('home');

Route::get('/terms-of-services', [AiController::class, 'Terms'])->name('terms');
Route::get('/privacy-policy', [AiController::class, 'Privacy'])->name('privacy');


Route::get('/login', [AiController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AiController::class, 'login']);

Route::get('/register', [AiController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AiController::class, 'register']);


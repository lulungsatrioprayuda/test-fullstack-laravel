<?php

use App\Http\Controllers\ProfileController;
use App\Actions\RegisterAction;
use App\Actions\EditProfileAction;
use App\Actions\UpdateProfileAction;
use App\Actions\DestroyProfileAction;
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
Route::post('/login', [LoginAction::class, 'handle'])->name('login');
Route::post('/register', [RegisterAction::class, 'handle'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', EditProfileAction::class)->name('profile.edit');
    Route::patch('/profile', UpdateProfileAction::class)->name('profile.update');
    Route::delete('/profile', DestroyProfileAction::class)->name('profile.destroy');
});

require __DIR__ . '/auth.php';

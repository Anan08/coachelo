<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Game;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);  

Route::view('login', 'login');

Route::get('/dashboard', function() {
    return view('dashboard');
});

Route::get('/become-coach', function() {
    $games = Game::all();
    if (session()->get('role') == 'coach') {
        return back();
    }
    return view('become_coach', ['games' => $games]);
});


Route::get('/games/{game_id}', [CoachController::class, 'show']);


Route::get('/orders', [CoachController::class, 'check_orders']);
Route::get('/trolley', [UserController::class, 'get_orders']);

Route::get('/users', function () {
    return view("users");
});

Route::get('/applicances', [CoachController::class, 'get_applicances']);

Route::post('/store_cv', [CoachController::class, 'store_cv']);


Route::get('/post/{slug}', function () {
    return view('post');
});

Route::post('/login', [UserController::class, 'login']);

Route::get('/register', function(){
    return view('register');
});

Route::post('/register', [UserController::class, 'register']
);

Route::get('/profile', function () {
    return view('profile');
});


Route::get('/logout', [UserController::class, 'logout']);


Route::get('/coaches/{coach_id}',  [CoachController::class, 'get_profile']);

Route::get('/profile/{id}',  [UserController::class, 'show_profile']);


Route::post('/coach-update', [CoachController::class, 'update_coach']);
Route::post('/user-update', [UserController::class, 'update_user']);
Route::post('/session_transaction', [TransactionController::class, 'buy']);

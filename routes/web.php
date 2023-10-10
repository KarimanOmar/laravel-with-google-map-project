<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmlandsController;

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

Route::get('/', function () {
    $initialMarkers = [
        [
            'position' => [
                'lat' => 28.625485,
                'lng' => 79.821091
            ],
            'label' => [ 'color' => 'white', 'text' => 'P1' ],
            'draggable' => true
        ],
        [
            'position' => [
                'lat' => 28.625293,
                'lng' => 79.817926
            ],
            'label' => [ 'color' => 'white', 'text' => 'P2' ],
            'draggable' => false
        ],
        [
            'position' => [
                'lat' => 28.625182,
                'lng' => 79.81464
            ],
            'label' => [ 'color' => 'white', 'text' => 'P3' ],
            'draggable' => true
        ]
    ];
    return view('welcome', compact('initialMarkers'));
});
Route::get('/farmlands',[FarmlandsController::class, 'index'])->name('farmlands.index');
Route::get('/farmlands/create',[FarmlandsController::class, 'create'])->name('farmlands.create');
Route::post('/farmlands',[FarmlandsController::class, 'store'])->name('farmlands.store');
Route::get('/farmlands/{farmland}',[FarmlandsController::class, 'show'])->name('farmlands.show');

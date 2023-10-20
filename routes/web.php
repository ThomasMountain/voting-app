<?php

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
    return redirect('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/polls', \App\Livewire\ListPolls::class)->name('polls.index');
    Route::get('/polls/create', \App\Livewire\CreatePoll::class)->name('polls.create');
    Route::get('/polls/{poll}', \App\Livewire\ShowPoll::class)->name('polls.show');
});

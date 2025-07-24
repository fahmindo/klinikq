<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/daftar', [FrontendController::class, 'form'])->name('form');
Route::post('/daftar', [FrontendController::class, 'submit'])->name('form.submit');

Route::get('/thanks', [FrontendController::class, 'thanks'])->name('thanks');

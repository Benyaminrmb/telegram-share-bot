<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/r', function (){
    $telegraphBot = \DefStudio\Telegraph\Models\TelegraphBot::query()->first();
    $telegraphBot->registerWebhook()->send();
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

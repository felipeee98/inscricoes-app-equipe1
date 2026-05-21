<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('arquivo');
});

Route::get('/perfil', function () {
    return view('perfil');
});

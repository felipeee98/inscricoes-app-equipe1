<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/admin.php';
require __DIR__.'/Candidato.php';

Route::get('/', function () {
    return view('welcome');
    // Rota de teste
Route::get('/painel-admin', function () {
    return "Se você está vendo isso, você é um Administrador!";
})->middleware(['auth', 'admin']);
});

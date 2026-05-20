<?php
use Illuminate\Support\Facedes\Route;

Route::middleware(['auth','admin'])->group(function(){

    Route::get('/admin/dashboard',funcion(){
       return view('admin.dashboard');

    

   });

});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoAuthController;


Route::get('/demo-login/{role}', [DemoAuthController::class, 'loginAs']);
// جعل الصفحة الرئيسية تفتح لوحة التحكم مباشرة
Route::get('/', function () {
    return view('dashboard');
});

// مسارات تسج

// مسار لوحة التحكم الاحتياطي
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
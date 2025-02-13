<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModelInstallSiteController;

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

Route::get('/download/{filename}', [ ModelInstallSiteController::class, 'download' ])->name('download');

Route::prefix('install3dmodelsite')->controller(ModelInstallSiteController::class)->name('install3dmodelsite.')->group(function() {
    
    // HP
    Route::get('/', 'hp')->name('hp');

    // ライセンス確認画面
    Route::get('/license', 'license')->name('license');

    // GoogleMapで地域検索
    Route::get('/areaindex', 'areaindex')->name('areaindex');

    // showarea...地域の詳細画面
    // Route::get('/{id}', 'showarea')->name('showarea');
    // 地域を3D表示
    Route::get('/showarea/{id}', 'showarea')->name('showarea');

    // モデルをインストール
    Route::get('/download/{filename}', 'download')->name('download');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

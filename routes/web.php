<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/categoria/{category}', [PublicController::class, 'categoryShow'])->name('categoryShow');

Route::get('/nuovo/annuncio',[AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcement.create');

Route::get ('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('showAnnouncement');

Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('indexAnnouncement');
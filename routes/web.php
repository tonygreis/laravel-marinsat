<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\CastController;
use App\Http\Controllers\Front\EpisodeController;
use App\Http\Controllers\Front\GenreController;
use App\Http\Controllers\Front\MovieController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\SerieController;
use App\Http\Controllers\Front\TagController;
use App\Http\Controllers\Front\WelcomeController;
use App\Http\Livewire\SettingIndex;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');
Route::get('/search/', [SearchController::class, 'search'])->name('search');
Route::view('/privacy', 'privacy');
Route::view('/dmca', 'dmca');

Route::get('/flima', [MovieController::class, 'index'])->name('movies.index');
Route::get('/filma/{slug}', [MovieController::class, 'show'])->name('movies.show');

Route::get('/seriale', [SerieController::class, 'index'])->name('series.index');
Route::get('/seriale/{slug}', [SerieController::class, 'show'])->name('series.show');
Route::get('/seriale/{slug}/seasons/{season}', [SerieController::class, 'seasonShow'])->name('seasons.show');
Route::get('/episodes/{episode}', [EpisodeController::class, 'show'])->name('episodes.show');

Route::get('/casts', [CastController::class, 'index'])->name('casts.index');
Route::get('/casts/{cast}', [CastController::class, 'show'])->name('casts.show');

Route::get('/genres/{genre}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

Route::middleware(['auth:sanctum', 'verified', 'role:admin'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/main-settings', SettingIndex::class)
    ->name('admin.settings')
    ->middleware(['auth:sanctum', 'role:admin']);

Route::group([
    'middleware' => ['role:admin'],
    'prefix' => 'admin'
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/{any}', [AdminController::class, 'index'])->where('any', '.*');
});

Route::get('/storage/{extra}', function ($extra) {
    return redirect('public/storage/'. $extra);
})->where('extra', '.*');

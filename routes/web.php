<?php

use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebinaireController;
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

Route::view('about', 'about')->name('about');

Auth::routes();
Route::get("/", [HomeController::class, "index"])->name("home");

Route::middleware('auth')->group(function () {
    //Route::view('about', 'about')->name('about');
    Route::prefix('webinaires')->name("webinaires.")->group(function () {
        Route::get('/', [WebinaireController::class, "index"])->name("index");
        Route::get('/inscrits', [WebinaireController::class, "WebinairesInscrits"])->name("inscrits");
        Route::get('/{id}', [WebinaireController::class, "show"])->name("show");

    });

    Route::get('/calendrier', [CalendrierController::class, "index"])->name("calendrier.index");
    Route::get('/event/inscrire/{webinaire_id}', [EventController::class, "inscrire"])->name("event.inscrire");

    Route::prefix('admin')->name("admin.")->group(function () {
        Route::prefix('webinaires')->name("webinaires.")->group(function () {
            Route::get('/', function () {
                $webinaires = new WebinaireController();
                return $webinaires->index(true);
            })->name("index");
            Route::get('/edit/{id}', [WebinaireController::class, "edit"])->name("edit");
            Route::put('/{id}', [WebinaireController::class, "update"])->name("update");
            Route::delete('/{id}', [WebinaireController::class, "destroy"])->name("destroy");
            Route::get('/create', [WebinaireController::class, "create"])->name("create");
            Route::post('/store', [WebinaireController::class, "store"])->name("store");

        });
        Route::prefix('users')->name("users.")->group(function () {
            Route::get('/', [UserController::class, "index"])->name("index");
            Route::get('/edit/{id}', [UserController::class, "edit"])->name("edit");
            Route::put('/{id}', [UserController::class, "update"])->name("update");
            Route::delete('/{id}', [UserController::class, "destroy"])->name("destroy");
            Route::get('/create', [UserController::class, "create"])->name("create");
            Route::post('/store', [UserController::class, "store"])->name("store");

        });
    });
    //Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\SocialController as AdminSocialController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//posso aggiungere, oltre ad "auth" anche "verified"
Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Projects
        Route::get('/projects/deleted', [AdminProjectController::class, 'deletedIndex'])->name('projects.deleted.index');
        Route::get('/projects/deleted/{poject}', [AdminProjectController::class, 'deletedShow'])->name('projects.deleted.show');
        Route::patch('/projects/deleted/{poject}', [AdminProjectController::class, 'deletedRestore'])->name('projects.deleted.restore');
        Route::delete('/projects/deleted/{project}', [AdminProjectController::class, 'deletedDestroy'])->name('projects.deleted.destroy');
        Route::resource('/projects', AdminProjectController::class);

        //Socials
        Route::resource('/socials', AdminSocialController::class);
        
        // Types
        Route::get('/types/deleted', [AdminTypeController::class, 'deletedIndex'])->name('types.deleted.index');
        Route::patch('/types/deleted/{type}', [AdminTypeController::class, 'deletedRestore'])->name('types.deleted.restore');
        Route::delete('/types/deleted/{type}', [AdminTypeController::class, 'deletedDestroy'])->name('types.deleted.destroy');
        Route::resource('/types', AdminTypeController::class);

        // Technologies
        Route::get('/technologies/deleted', [AdminTechnologyController::class, 'deletedIndex'])->name('technologies.deleted.index');
        Route::patch('/technologies/deleted/{type}', [AdminTechnologyController::class, 'deletedRestore'])->name('technologies.deleted.restore');
        Route::delete('/technologies/deleted/{type}', [AdminTechnologyController::class, 'deletedDestroy'])->name('technologies.deleted.destroy');
        Route::resource('/technologies', AdminTechnologyController::class);

});
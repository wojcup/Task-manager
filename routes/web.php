<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TrashedTaskController;
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



// foreach ($routeCollection as $value) {
//     dd( $value );
// }


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () { return view('dashboard'); })
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource( '/tasks', TaskController::class )
    ->middleware(['auth']);

// Route::get( '/trashed', [TrashedTaskController::class, 'index'] )
//     ->middleware( 'auth' )
//     ->name( 'trashed.index' );

// Route::get( '/trashed/{task}', [TrashedTaskController::class, 'show'] )
//     ->withTrashed()
//     ->middleware( 'auth' )
//     ->name('trashed.show');

// Route::put( '/trashed/{task}', [TrashedTaskController::class, 'update'] )
//     ->withTrashed()
//     ->middleware( 'auth' )
//     ->name( 'trashed.update' );

// Route::delete( '/trashed/{task}', [TrashedTaskController::class, 'destroy'] )
//     ->withTrashed()
//     ->middleware( 'auth' )
//     ->name( 'trashed.destroy' );


Route::prefix( '/trashed' )->name( 'trashed.' )->middleware( 'auth' )->group( function(){
    Route::get( '/', [TrashedTaskController::class, 'index'] )->name( 'index' );
    Route::get( '/{task}', [TrashedTaskController::class, 'show'] )->name( 'show' )->withTrashed();
    Route::put( '/{task}', [TrashedTaskController::class, 'update'] )->name( 'update' )->withTrashed();
    Route::delete( '/{task}', [TrashedTaskController::class, 'destroy'] )->name( 'destroy' )->withTrashed();
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterielController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// useless routes
// Just to demo sidebar dropdown links active states.

// Route::get('/buttons/text', function () {
//     return view('buttons-showcase.text');
// })->middleware(['auth'])->name('buttons.text');

// Route::get('/buttons/icon', function () {
//     return view('buttons-showcase.icon');
// })->middleware(['auth'])->name('buttons.icon');

// Route::get('/buttons/text-icon', function () {
//     return view('buttons-showcase.text-icon');
// })->middleware(['auth'])->name('buttons.text-icon');

// Ajout de materiel
Route::get('/materiels/create', [MaterielController::class, 'create'])->name('materiels.ajouter');
Route::post('/materiels', [MaterielController::class, 'store'])->name('materiels.store');

//Modification de materiel
Route::get('/materiels/select', [MaterielController::class, 'select'])->name('materiels.select');
Route::get('/materiels/{num_ordre}/edit', [MaterielController::class, 'edit'])->name('materiels.edit');
Route::put('/materiels/{num_ordre}', [MaterielController::class, 'update'])->name('materiels.update');

// Suppression de materiel
Route::get('/materiels/delselect', [MaterielController::class, 'delselect'])->name('materiels.delselect');
Route::delete('/materiels/{num_ordre}', [MaterielController::class, 'destroy'])->name('materiels.destroy');


require __DIR__ . '/auth.php';

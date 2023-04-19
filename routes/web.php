<?php

use App\Domain\CapitalSageAcademy\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Sanef\NewAgent;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', \App\Http\Controllers\HomeController::class);

Route::prefix("capitalsage-academy")->group(function(){
    Route::get("/", HomeController::class)->name('academy.home');
});

Route::view("test", "templates.sidebar-i.sidebar-one");

Route::prefix("sanef")->group(function ()
{
    Route::get('new-agent', NewAgent::class);
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

<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RulesetController;
use \App\Http\Controllers\FundamentalsController;
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

Route::get('/', [HomeController::class, INDEX])->name(HOME);

Route::group(['prefix' => 'fundamentals', 'as' => 'fundamentals.'], function() {
    Route::get('/imagery', [FundamentalsController::class, 'imagery'])->name('imagery');
    Route::get('/logo', [FundamentalsController::class, 'logo'])->name('logo');
    Route::get('/components', [FundamentalsController::class, 'components'])->name('components');
});

Route::group(['prefix' => 'ruleset', 'as' => 'ruleset.'], function() {
    Route::get('/variables', [RulesetController::class, 'variables'])->name('variables');
    Route::get('/palette', [RulesetController::class, 'palette'])->name('palette');
    Route::get('/typography', [RulesetController::class, 'typography'])->name('typography');
    Route::get('/borders', [RulesetController::class, 'borders'])->name('borders');
    Route::get('/spacing', [RulesetController::class, 'spacing'])->name('spacing');
});

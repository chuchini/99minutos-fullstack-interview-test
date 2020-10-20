<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\CommitsController;
use App\Http\Controllers\PRController;


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

Route::get('/', function() {
    return View::make('index');
});

Route::get('/branches', [BranchesController::class, 'getBranches']);

Route::get('/pullrequests', [PRController::class, 'getPR']);

Route::get('/branches/info/{sha}', [BranchesController::class, 'getCommits']);

Route::get('/commit/{sha}', [CommitsController::class, 'getCommitInfo']);

Route::get('/closepr/{prID}', [PRController::class, 'closePR']);

Route::post('/pullrequests/newpr', [PRController::class, 'createPR']);

Route::get('/pullrequests/newpr', [PRController::class, 'newpr']);

Route::get('/error', function() {
    return View::make('error');
});
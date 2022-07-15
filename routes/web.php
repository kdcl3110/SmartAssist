<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapeController;
use Illuminate\Support\Facades\Auth;

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
Auth::routes([
    'verify'=>true
]);
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pdf', function () {
    return view('PDFTemplate');
});
Route::view('/etatcivil', 'etatcivil');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('test', 'ScrapeController@index');
/* Route::get('/', function() {
    $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
    $crawler->filter('.result__title .result__a')->each(function ($node) {
      dump($node->text());
    });
    return view('welcome');
}); */
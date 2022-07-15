<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\EtatcivilController;
use App\Http\Controllers\FiliationController;
use App\Http\Controllers\FilièresController;
use App\Http\Controllers\DiplomesController;
use App\Http\Controllers\InfosdiversesController;
use App\Http\Controllers\InfospaiementsController;
use App\Http\Controllers\DataStudentsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ScrapeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'createAccount']);
Route::post('/signin', [AuthController::class, 'signin']);
Route::get('/user/verify/{token}', [AuthController::class, 'verifyUser']);
//using middleware
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

// a route that returns a view with the password reset link request form
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

//a route that handles the form submission request from the "forgotten password" view
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
 
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('/printPDF/{id}', [PDFController::class, 'store']);
Route::post('/etatcivil', [EtatcivilController::class, 'addData']);
Route::view('/etat', 'etatcivil');
Route::post('/filiation', [FiliationController::class, 'addData']);
Route::post('/filiere', [FilièresController::class, 'addData']);
Route::post('/diplome', [DiplomesController::class, 'addData']);
Route::post('/infospaiement', [InfospaiementsController::class, 'addData']);
Route::post('/infosdiverse', [InfosdiversesController::class, 'addData']);
Route::post('/datastudents', [DataStudentsController::class, 'addData']);
Route::get('/datastudents/{id}', [DataStudentsController::class, 'store']);
Route::get('/pdf', function () {
    return view('PDFTemplate');
});


/* Route::get('/', function() {
    $crawler = Goutte::request('GET', 'https://duckduckgo.com/html/?q=Laravel');
    $crawler->filter('.result__title .result__a')->each(function ($node) {
      dump($node->text());
    });
    return view('welcome');
}); */


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('propducts', ProductController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/scrape', [ScrapeController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactQueryController;
use Illuminate\Http\Request;

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');



Route::post('/contact', [ContactQueryController::class, 'store'])
    ->middleware('web')
    ->name('contact.store');

Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrfToken' => csrf_token()]);
});

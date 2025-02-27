<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactQueryController;
use App\Http\Controllers\LeadController;
use Illuminate\Http\Request;





Route::post('/contact', [ContactQueryController::class, 'store'])
    ->middleware('web')
    ->name('contact.store');

Route::middleware('web')->group(function () {
    Route::post('/api/leads', [LeadController::class, 'store'])->name('leads.store');
});

Route::get('/csrf-token', function (Request $request) {
    return response()->json(['csrfToken' => csrf_token()]);
});

Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');

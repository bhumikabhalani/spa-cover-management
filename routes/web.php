<?php

use App\Http\Controllers\OrderQuoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web', 'auth'])->group(function (): void {
    Route::get('/admin/orders/{order}/quote', [OrderQuoteController::class, 'download'])
        ->name('orders.quote.download');
});

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Order;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    
    $totalOrder = Order::count();

    $diproses = Order::where(
        'status_order',
        'Diproses'
    )->count();

    $selesai = Order::where(
        'status_order',
        'Selesai'
    )->count();

    $pendapatan = Order::sum(
        'total_harga'
    );

    return view('dashboard', compact(
        'totalOrder',
        'diproses',
        'selesai',
        'pendapatan'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::resource('orders', OrderController::class);

});
Route::put(
    '/orders/{order}/status',
    [OrderController::class, 'updateStatus']
)->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::delete(
        '/orders/{order}',
        [OrderController::class, 'destroy']
    );

Route::middleware([
        'auth',
        'premium'
    ])->group(function () {

        Route::get('/premium-test', function () {

            return 'Fitur Premium';

        });

    });
});

Route::middleware([
    'auth',
    'premium'
])->group(function () {

    Route::get(
        '/orders/{order}/invoice',
        [OrderController::class, 'invoice']
    )->name('orders.invoice');

});

Route::get(
    '/tracking',
    [OrderController::class, 'trackingForm']
);

Route::post(
    '/tracking',
    [OrderController::class, 'trackingResult']
);

Route::get('/tracking/{invoice}',[OrderController::class, 'trackingInvoice'])->name('orders.track');

require __DIR__.'/auth.php';
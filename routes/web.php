<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Teams\TeamInvitationController;
use App\Http\Middleware\EnsureTeamMembership;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', function (Request $request) {
    return 'success';
});
Route::get('/course', [CourseController::class, 'index']);
Route::get('/about', [CourseController::class, 'about']);
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->whereNumber('id')->name('products.show');
Route::get('/search', function (Request $request){
    $query = $request->query('q', '');
    return"Recherche: $query";    
});

Route::get('/debug/request', function (Request $request){
    return response()->json([
        'method' => $request->method(),
        'path' => $request->path(),
        'query' => $request->query(),
        'accept' => $request->header('Accept'),
    ]);
});
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            return 'Dashboard';
        })->name('dashboard');
        Route::get('/products', function () {
            return 'Admin Products';
        })->name('products');
    });
require __DIR__.'/settings.php';

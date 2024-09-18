<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::prefix('auth')->group(function () {
    // Public route for admin login
    Route::post('login', [AuthController::class, 'login']);
});

// Protected routes for authenticated admins
Route::middleware(['auth:api'])->group(function () {
    // Example route to get the authenticated admin's profile
    Route::get('admin/profile', function () {
        return response()->json([
            'status' => 'success',
            'message' => 'Profile fetched successfully',
            'data' => [
                'admin' => auth()->user() // Returns the authenticated admin
            ]
        ]);
    });
    
    // Add more routes that require authentication here
    // Route::get('admin/dashboard', [DashboardController::class, 'index']);
});

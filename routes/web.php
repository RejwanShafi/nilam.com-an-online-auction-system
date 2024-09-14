<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AuctionApprovalController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SellerDashboardController;
use App\Http\Controllers\AuctionManagementController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

// Google login
Route::get('/auth/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('auth.google.callback');


// Normal User dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'user'])->name('dashboard');

// Seller dashboard
Route::get('/seller/dashboard', function () {
    return view('seller.dashboard');
})->middleware(['auth', 'verified', 'seller'])->name('seller.dashboard');

// Admin dashbaard
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');


// Seller dashboard
Route::get('/seller/dashboard', [SellerDashboardController::class, 'index'])->middleware(['auth', 'verified', 'seller'])->name('seller.dashboard');
Route::get('/seller/auction-item/create', [SellerDashboardController::class, 'createAuctionItem'])->middleware(['auth', 'verified', 'seller'])->name('seller.createAuctionItem');
Route::post('/seller/auction-item/store', [SellerDashboardController::class, 'storeAuctionItem'])->middleware(['auth', 'verified', 'seller'])->name('seller.storeAuctionItem');
Route::get('/seller/waiting-approval', [SellerDashboardController::class, 'showwaiting'])->middleware(['auth', 'verified', 'seller'])->name('seller.items-waiting');
Route::get('/seller/sold-item-records', [SellerDashboardController::class, 'soldItems'])->middleware(['auth', 'verified', 'seller'])->name('seller.sold-items');
Route::get('/seller/edit-item-records', [SellerDashboardController::class, 'editItems'])->middleware(['auth', 'verified', 'seller'])->name('seller.edit-items');
// Delete Auction Item
Route::delete('/seller/auction/{id}/delete', [SellerDashboardController::class, 'delete'])->name('auction.delete');

// Update Auction Item
Route::put('/seller/auction/update', [SellerDashboardController::class, 'update'])->name('auction.update');



// Admin Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');
Route::get('/admin/users', [AdminDashboardController::class, 'users'])->middleware(['auth', 'verified', 'admin'])->name('admin.users');
Route::get('/admin/sellers', [AdminDashboardController::class, 'sellers'])->middleware(['auth', 'verified', 'admin'])->name('admin.sellers');
Route::get('/admin/add', [AdminDashboardController::class, 'showAddAdminForm'])->middleware(['auth', 'verified', 'admin'])->name('admin.add');
Route::post('/admin/register', [AdminDashboardController::class, 'registerAdmin'])->middleware(['auth', 'verified', 'admin'])->name('admin.register');
Route::get('/admin/auction-status', [AuctionApprovalController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin.auc-status');
Route::get('/admin/auction-approve', [AuctionManagementController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('admin.auc-approve');
// Route to delete auction item
Route::delete('/admin/auction/{id}/delete', [AuctionManagementController::class, 'delete'])->middleware(['auth', 'verified', 'admin'])->name('auction.delete');

// Route to approve auction item
Route::put('/admin/auction/{id}/approve', [AuctionManagementController::class, 'approve'])->middleware(['auth', 'verified', 'admin'])->name('auction.approve');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminUsersController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function() {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'create'])
                ->name('admin.dashboard')
                ->middleware('can:access-admin-dashboard');

    Route::get('admin/users', [AdminUsersController::class, 'create'])
                ->name('admin.users')
                ->middleware('can:edit-users');

    Route::get('admin/users/search', [AdminUsersController::class, 'create'])
                ->name('admin.users.search')
                ->middleware('can:edit-users');

    Route::get('admin/users/edit/{id}', [AdminUsersController::class, 'edit'])   
                ->name('admin.users.edit')
                ->middleware('can:edit-users');

    Route::post('admin/users/edit/{id}', [AdminUsersController::class, 'update'])   
                ->name('admin.users.edit')
                ->middleware('can:edit-users');

    Route::delete('admin/users/delete/{id}', [AdminUsersController::class, 'delete'])
                ->name('admin.users.delete')
                ->middleware('can:edit-users');
});
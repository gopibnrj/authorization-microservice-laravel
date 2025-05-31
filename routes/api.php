<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuditLogController;
use App\Http\Middleware\CheckPermission;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::middleware([
    'auth:sanctum',
    'permission :manage-orders',
])->group(function () {
    Route::get('/user/permissions', [AuthController::class, 'permissions']);
    Route::post('/roles', [RoleController::class, 'store']);
    Route::post('/permissions', [RoleController::class, 'addPermission']);
    Route::post('/assign-role', [RoleController::class, 'assignRole']);
    Route::get('/audit-logs', [AuditLogController::class, 'index']);
});

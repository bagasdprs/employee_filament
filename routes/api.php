<?php

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\EmployeesResource;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees', function () {
    $employees = Employees::orderBy('last_name')->get();
    return EmployeesResource::collection($employees);
});


// Route::get('/employees', function () {
//     return Employees::all();
// });

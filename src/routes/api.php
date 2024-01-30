<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lol/{name}', [TestController::class, 'testMethod']);
Route::get('/test/{name?}', [TestController::class, 'covidMethod']);
Route::get('/overkill', [TestController::class, 'overkillMethod']);
Route::post('/save-student', [TestController::class, 'saveStudent']);
Route::post('/save-user', [UserController::class, 'saveUser']);
Route::get('/get-user/{id}', [UserController::class, 'getUser']);
Route::get('/get-user-by-email/{email}', [UserController::class, 'getUserByEmail']);
Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser']);
Route::get('/get-all-users', [UserController::class, 'getAllUsers']);
Route::patch('/update-user', [UserController::class, 'updateUser']);
Route::get('/get-all-user-contacts/{id}', [UserController::class, 'getAllUserContacts']);

Route::post('/save-student', [StudentController::class, 'saveStudent']);
Route::get('/get-student/{id}', [StudentController::class, 'getStudent']);
Route::get('/get-student-by-email/{email}', [StudentController::class, 'getStudentByEmail']);
Route::delete('/delete-student/{id}', [StudentController::class, 'deleteStudent']);
Route::get('/get-all-studnets', [StudentController::class, 'getAllStudents']);
Route::patch('/update-student', [StudentController::class, 'updateStudent']);

Route::post('/save-prax', [PraxController::class, 'savePrax']);
Route::get('/get-prax/{id}', [PraxController::class, 'getPrax']);
Route::delete('/delete-prax/{id}', [PraxController::class, 'deletePrax']);
Route::get('/get-all-prax', [PraxController::class, 'getAllPrax']);
Route::patch('/update-prax', [PraxController::class, 'updatePrax']);

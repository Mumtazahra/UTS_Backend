<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\PatientController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# method get
Route::get('/animals', [AnimalController::class, 'index']);

# method post
Route::post('/animals', [AnimalController::class, 'store']);

# method put
Route::put('/animals/{id}', [AnimalController::class, 'update']);

# method delete
Route::delete('/animals/{id}', [AnimalController::class, 'destroy']);

# get all resource students
# method get
Route::get('/students', [StudentController::class, 'index']);

# method post
Route::post('/students', [StudentController::class, 'store']);

# method put
Route::put('/students/{id}', [StudentController::class, 'update']);

# method delete
Route::delete('/students/{id}', [StudentController::class, 'destroy']);

# mendapatkan detail resource student
# method get
Route::get('/students/{id}', [StudentController::class, 'show']);

# memperbaharui resource student
# method put
Route::put('/students/{id}', [StudentController::class, 'update']);

# menghapus resource student
# method delete
Route::delete('/students/{id}', [StudentController::class, 'destroy']);


# membuat route untuk register dan login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


                                                   ##      UTS BACKEND       ##

# get all resource patients
# method get
Route::get('/patients', [PatientController::class, 'index']);

# add resource
# method post
Route::post('/patients', [PatientController::class, 'store']);

# get Get Detail Resource
# method get
Route::get('/patients/{id}', [PatientController::class, 'show']);

# memperbaharui resource patient
# method put
Route::put('/patients/{id}', [PatientController::class, 'update']);

# menghapus resource patient
# method delete
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);

# mencari resource patient berdasarkan nama
# method get
Route::get('/patients/search/{name}', [PatientController::class, 'search']);

# memcari resource patient berdasarkan status positive
# method get
Route::get('/patients/status/positive', [PatientController::class, 'positive']);

# memcari resource patient berdasarkan status recovered
# method get
Route::get('/patients/status/recovered', [PatientController::class, 'recovered']);

# memcari resource patient berdasarkan status dead
# method get
Route::get('/patients/status/dead', [PatientController::class, 'dead']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\SubjectController;
use App\Http\Controllers\api\StudentController;
use App\Http\Controllers\api\StudentMarkController;
use App\Http\Controllers\api\UserController;

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

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function () {

    Route::resource('subject', SubjectController::class);

    Route::get('user', [UserController::class, 'getUserInfo']); // get user info
    Route::get('user/semester-result/{semester}', [UserController::class, 'getUserSemesterResult']); // get user info

    Route::group([
        'prefix' => 'student',
    ], function () {

        Route::get('/{id}/semester/{semester_id}', [StudentMarkController::class, 'getResultBySemester']); // return all result for semester

        // only for admin route
        Route::group(['middleware' => ['isAdmin']], function () {
            Route::post('/', [StudentController::class, 'createStudent']);
            Route::patch('/{id}', [StudentController::class, 'editStudent']);
            Route::delete('/{id}', [StudentController::class, 'deleteStudent']);

            Route::post('/semester', [StudentMarkController::class, 'insertSubjectMarkToSemester']); // add new semester and subject marks
            Route::delete('/{id}/semester/{semester_id}', [StudentMarkController::class, 'deleteStudentSemester']); // delete the whole semester

            Route::patch('/{id}/semester/{semester_id}/subject/{subject_id}', [StudentMarkController::class, 'editSubjectResultSemester']); // edit subject and marks by semester
            Route::delete('/{id}/semester/{semester_id}/subject/{subject_id}', [StudentMarkController::class, 'deleteSubjectResultSemester']); // delete subject mark by semester

        });

    });

});

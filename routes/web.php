<?php

use App\Http\Controllers\BloodGroupController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SiteSettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UpazilaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::group(['middleware'=>['auth']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'setting/role', 'as' => 'role.'], function () {
        Route::get('/',[RoleController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::post('/store', [RoleController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
        Route::get('/permission/{id}', [RoleController::class, 'permission'])->name('permission');
        Route::post('/permission/store/{id}', [RoleController::class, 'permission_store'])->name('permission.store');
    });
    Route::group(['prefix' => 'setting/user', 'as' => 'user.'], function () {
        Route::get('/',[UsersController::class, 'index'])->name('index');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
        Route::post('/store', [UsersController::class, 'store'])->name('store');
        Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
        Route::post('/update/{id}', [UsersController::class, 'update'])->name('update');
        Route::get('/assign_role/{id}',[UsersController::class, 'assign_role'])->name('role_assign');
        Route::post('/assign_role', [UsersController::class, 'assign_role_store'])->name('role_assign_store');
    });
    Route::group(['prefix' => 'setting/site_setting', 'as' => 'site_setting.'], function () {
        Route::get('/',[SiteSettingController::class, 'index'])->name('index');
        Route::post('/update/{id}', [SiteSettingController::class, 'update'])->name('update');
    });
    Route::group(['prefix' => 'setting/division', 'as' => 'division.'], function () {
        Route::get('/',[DivisionController::class, 'index'])->name('index');
        Route::post('/store',[DivisionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[DivisionController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[DivisionController::class, 'delete'])->name('delete');
        Route::post('/divisionstore', [DivisionController::class, 'divisionstore'])->name('divisionstore');
    });
    Route::group(['prefix' => 'setting/district', 'as' => 'district.'], function () {
        Route::get('/',[DistrictController::class, 'index'])->name('index');
        Route::post('/store',[DistrictController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[DistrictController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[DistrictController::class, 'delete'])->name('delete');
        Route::post('/districtstore', [DistrictController::class, 'districtstore'])->name('districtstore');
    });
    Route::group(['prefix' => 'setting/upazila', 'as' => 'upazila.'], function () {
        Route::get('/',[UpazilaController::class, 'index'])->name('index');
        Route::post('/store',[UpazilaController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[UpazilaController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[UpazilaController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/blood_group', 'as' => 'blood_group.'], function () {
        Route::get('/',[BloodGroupController::class, 'index'])->name('index');
        Route::post('/store',[BloodGroupController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[BloodGroupController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[BloodGroupController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/religion', 'as' => 'religion.'], function () {
        Route::get('/',[ReligionController::class, 'index'])->name('index');
        Route::post('/store',[ReligionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[ReligionController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[ReligionController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'setting/gender', 'as' => 'gender.'], function () {
        Route::get('/',[GenderController::class, 'index'])->name('index');
        Route::post('/store',[GenderController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[GenderController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[GenderController::class, 'delete'])->name('delete');
    });
    // Academic section route start
    Route::group(['prefix' => 'academy/class', 'as' => 'class.'], function () {
        Route::get('/',[ClassController::class, 'index'])->name('index');
        Route::post('/store',[ClassController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[ClassController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[ClassController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'academy/session', 'as' => 'session.'], function () {
        Route::get('/',[SessionController::class, 'index'])->name('index');
        Route::post('/store',[SessionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[SessionController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[SessionController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'academy/section', 'as' => 'section.'], function () {
        Route::get('/',[SectionController::class, 'index'])->name('index');
        Route::post('/store',[SectionController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[SectionController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[SectionController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'academy/group', 'as' => 'group.'], function () {
        Route::get('/',[GroupController::class, 'index'])->name('index');
        Route::post('/store',[GroupController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[GroupController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[GroupController::class, 'delete'])->name('delete');
    });
    Route::group(['prefix' => 'academy/room', 'as' => 'room.'], function () {
        Route::get('/',[RoomController::class, 'index'])->name('index');
        Route::post('/store',[RoomController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[RoomController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[RoomController::class, 'delete'])->name('delete');
    });
    // academic route section end 

    // hrm section router start 
    Route::group(['prefix' => 'hrm/department', 'as' => 'department.'], function () {
        Route::get('/',[DepartmentController::class, 'index'])->name('index');
        Route::post('/store',[DepartmentController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[DepartmentController::class, 'edit'])->name('edit');
        Route::get('/delete/{id}',[DepartmentController::class, 'delete'])->name('delete');
    });
    // hrm router section end 

    Route::group(['prefix' => 'student', 'as' => 'student.'], function () {
        Route::get('/',[StudentController::class, 'index'])->name('index');
        Route::get('/create',[StudentController::class, 'create'])->name('create');
        Route::post('/store',[StudentController::class, 'store'])->name('store');
        Route::get('/edit/{id}',[StudentController::class, 'edit'])->name('edit');
        Route::post('/update/{id}',[StudentController::class, 'update'])->name('update');
        Route::get('/delete/{id}',[StudentController::class, 'delete'])->name('delete');
    });
});

Auth::routes();


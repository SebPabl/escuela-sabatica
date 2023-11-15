<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\OfferingController;
use App\Http\Controllers\admin\AttendanceController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');
});

Route::get('/admin.students.index', function () {
    return view('admin.students.index');
})->name('admin.students.index');

Route::get('/admin.students.create', function () {
    return view('admin.students.create');
})->name('admin.students.create');

Route::get('/admin.students.show', function () {
    return view('admin.students.show');
})->name('admin.students.show');

Route::get('/admin.students.edit', function () {
    return view('admin.students.edit');
})->name('admin.students.edit');

Route::get('/admin.courses.index', function () {
    return view('admin.courses.index');
})->name('admin.courses.index');

Route::get('/admin.courses.create', function () {
    return view('admin.courses.create');
})->name('admin.courses.create');

Route::get('/admin.courses.show', function () {
    return view('admin.courses.show');
})->name('admin.courses.show');

Route::get('/admin.courses.edit', function () {
    return view('admin.courses.edit');
})->name('admin.courses.edit');

Route::get('/admin.users.index', function () {
    return view('admin.users.index');
})->name('admin.users.index');

Route::get('/admin.users.create', function () {
    return view('admin.users.create');
})->name('admin.users.create');

Route::get('/admin.users.show', function () {
    return view('admin.users.show');
})->name('admin.users.show');

Route::get('/admin.users.edit', function () {
    return view('admin.users.edit');
})->name('admin.users.edit');

Route::get('/admin.offerings.index', function () {
    return view('admin.offerings.index');
})->name('admin.offerings.index');

Route::get('/admin.offerings.create', function () {
    return view('admin.offerings.create');
})->name('admin.offerings.create');

Route::get('/admin.offerings.show', function () {
    return view('admin.offerings.show');
})->name('admin.offerings.show');

Route::get('/admin.offerings.edit', function () {
    return view('admin.offerings.edit');
})->name('admin.offerings.edit');

Route::get('/admin.attendances.index', function () {
    return view('admin.attendances.index');
})->name('admin.attendances.index');

Route::get('/admin.attendances.create', function () {
    return view('admin.attendances.create');
})->name('admin.attendances.create');

Route::get('/admin.attendances.show', function () {
    return view('admin.attendances.show');
})->name('admin.attendances.show');

Route::get('/admin.attendances.edit', function () {
    return view('admin.attendances.edit');
})->name('admin.attendances.edit');

Route::resource('admin/student', StudentController::class)->names([
    'index' => 'admin.students.index',
    'create' => 'admin.students.create',
    'store' => 'admin.students.store',
    'show' => 'admin.students.show',
    'edit' => 'admin.students.edit',
    'update' => 'admin.students.update',
    'destroy' => 'admin.students.destroy',
]);

Route::resource('admin/course', CourseController::class)->names([
    'index' => 'admin.courses.index',
    'create' => 'admin.courses.create',
    'store' => 'admin.courses.store',
    'show' => 'admin.courses.show',
    'edit' => 'admin.courses.edit',
    'update' => 'admin.courses.update',
    'destroy' => 'admin.courses.destroy',
]);

Route::resource('admin/user', UserController::class)->names([
    'index' => 'admin.users.index',
    'create' => 'admin.users.create',
    'store' => 'admin.users.store',
    'show' => 'admin.users.show',
    'edit' => 'admin.users.edit',
    'update' => 'admin.users.update',
    'destroy' => 'admin.users.destroy',
]);

Route::resource('admin/offering', OfferingController::class)->names([
    'index' => 'admin.offerings.index',
    'create' => 'admin.offerings.create',
    'store' => 'admin.offerings.store',
    'show' => 'admin.offerings.show',
    'edit' => 'admin.offerings.edit',
    'update' => 'admin.offerings.update',
    'destroy' => 'admin.offerings.destroy',
]);

Route::resource('admin/attendance', AttendanceController::class)->names([
    'index' => 'admin.attendances.index',
    'create' => 'admin.attendances.create',
    'store' => 'admin.attendances.store',
    'show' => 'admin.attendances.show',
    'edit' => 'admin.attendances.edit',
    'update' => 'admin.attendances.update',
    'destroy' => 'admin.attendances.destroy',
]);
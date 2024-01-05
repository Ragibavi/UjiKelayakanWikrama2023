<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RombelController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\LateController;
use Illuminate\Support\Facades\Auth;

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

Route::redirect('/', '/login');
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/fallback');
    } else {
        return view('login');
    }
})->name('login');
Route::post('/login', [AuthController::class, 'loginAuth'])->name('loginPost');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['IsLogin','IsAdmin'])->group(function () {


    Route::get('/dashboard', [StudentController::class, 'indexDashboard'])->name('pages.dashboardAdmin');

    Route::get('/user', [AuthController::class, 'index'])->name('pages.user');
    Route::get('/userCreate', [AuthController::class, 'create'])->name('pages.user.create');
    Route::post('/userStore', [AuthController::class, 'store'])->name('pages.user.store');
    Route::get('/userEdit/{id}', [AuthController::class, 'edit'])->name('pages.user.edit');
    Route::patch('/user/{id}', [AuthController::class, 'update'])->name('pages.user.update');
    Route::delete('/user/{id}', [AuthController::class, 'destroy'])->name('pages.user.destroy');

    Route::get('/rombel', [RombelController::class, 'index'])->name('pages.rombel');
    Route::get('/rombelCreate', [RombelController::class, 'create'])->name('pages.rombel.create');
    Route::get('/rombelEdit/{id}', [RombelController::class, 'edit'])->name('pages.rombel.edit');
    Route::patch('/rombel/{id}', [RombelController::class, 'update'])->name('pages.rombel.update');
    Route::post('/rombelStore', [RombelController::class, 'store'])->name('pages.rombel.store');
    Route::delete('/rombel/{id}', [RombelController::class, 'destroy'])->name('pages.rombel.destroy');

    Route::get('/rayon', [RayonController::class, 'index'])->name('pages.rayon');
    Route::get('/rayonCreate', [RayonController::class, 'create'])->name('pages.rayon.create');
    Route::post('/rayonStore', [RayonController::class, 'store'])->name('pages.rayon.store');
    Route::get('/rayonEdit/{id}', [RayonController::class, 'edit'])->name('pages.rayon.edit');
    Route::patch('/rayon/{id}', [RayonController::class, 'update'])->name('pages.rayon.update');
    Route::delete('/rayon/{id}', [RayonController::class, 'destroy'])->name('pages.rayon.destroy');

    Route::get('/student', [StudentController::class, 'index'])->name('pages.student');
    Route::get('/studentCreate', [StudentController::class, 'create'])->name('pages.student.create');
    Route::post('/studentStore', [StudentController::class, 'store'])->name('pages.student.store');
    Route::get('/studentEdit/{id}', [StudentController::class, 'edit'])->name('pages.student.edit');
    Route::patch('/student/{id}', [StudentController::class, 'update'])->name('pages.student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('pages.student.destroy');

    Route::get('/datelate', [LateController::class, 'index'])->name('pages.dateLate');
    Route::get('/datelate', [LateController::class, 'index'])->name('pages.dateLate');
    Route::get('/dateLateCreate', [LateController::class, 'create'])->name('pages.dateLate.create');
    Route::post('/dateLateStore', [LateController::class, 'store'])->name('pages.dateLate.store');
    Route::get('/dateLateEdit/{id}', [LateController::class, 'edit'])->name('pages.dateLate.edit');
    Route::patch('/datelate/{id}', [LateController::class, 'update'])->name('pages.datelate.update');
    Route::delete('/dateLate/{id}', [LateController::class, 'destroy'])->name('pages.dateLate.destroy');
});

Route::middleware(['IsLogin','IsUser'])->group(function () {
    Route::get('/dashboard/User', [StudentController::class, 'indexUser'])->name('pages.user.dashboard');
    Route::get('/Student/User', [StudentController::class, 'studentUser'])->name('pages.user.student');
    Route::get('/datalate/User', [LateController::class, 'indexUser'])->name('pages.user.dateLate');
    Route::get('/cetakPdf/{id}', [StudentController::class, 'cetakPdf'])->name('pages.cetakPdf');
});

Route::get('/dateLateDetail/{student_id}', [LateController::class, 'detail'])->name('pages.dateLate.detail');
Route::get('/export', [LateController::class, 'export'])->name('pages.dateLate.export');

Route::get('/fallback', function () {
    return view('pages.notFound');
})->name('notFound');

Route::middleware(['storeLastVisitedPage', 'redirectLastVisitedPage'])->group(function () {
    Route::redirect('/', '/login');

    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect('/fallback');
        } else {
            return view('login');
        }
    })->name('login');

    Route::get('/fallback', function () {
        return view('pages.notFound');
    })->name('notFound');
});
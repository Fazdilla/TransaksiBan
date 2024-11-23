<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportExcelController;
use App\Http\Controllers\MasterAlmedController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserRuanganController;
use App\Http\Controllers\LepasBanController;
use App\Http\Controllers\PemakaianBanController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\OtfBanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AuthController::class, 'redirectToLogin']);

Route::get('/pdf', function () {
    return view('alatmedis.pdfnew');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('registerpost');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('loginpost');
});

Route::group(['middleware' => 'auth'], function () {
    // Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');
    Route::post('/import', [ImportExcelController::class, 'import'])->name('import');


    Route::resource('almed', MasterAlmedController::class)->except([
        'show'
    ]);
    Route::resource('status', StatusController::class)->except([
        'show'
    ]);

    Route::resource('users', UserController::class)->except([
        'show'
    ]);

    Route::resource('ruang', RuanganController::class)->except([
        'show'
    ]);

    Route::get('/user', [UserRuanganController::class, 'index'])->name("user.index");
    // Route::get('/user/createRuangan', [UserRuanganController::class, 'createRuangan'])->name("user.createruangan");
    Route::get('/user/{userId}/tambah-ruangan', [UserRuanganController::class, 'tambahRuanganForm'])->name("user.tambah-ruangan-form");
    Route::post('/user/{userId}/tambah-ruangan', [UserRuanganController::class, 'tambahRuanganUser'])->name("user.tambah-ruangan-user");
    Route::delete('/user/{userId}/hapus-ruangan/{ruanganId}', [UserRuanganController::class, 'hapusRuanganUser'])->name("user.hapus-ruangan-user");

    // Lepas Ban Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/', function () {
            return view('dashboard');
        });

        Route::resource('lepas_ban', LepasBanController::class);
        Route::resource('pemakaian_ban', PemakaianBanController::class);
        Route::resource('ban', BanController::class);
        Route::resource('cabang', CabangController::class);
        Route::resource('kendaraan', KendaraanController::class);
        Route::resource('otfban', OtfBanController::class);
    });

    // hanya untuk superadmin
    Route::group(['middleware' => ['role:Super-Admin']], function () {
        Route::resource('permissions', PermissionController::class)->except([
            'show'
        ]);

        Route::resource('roles', RoleController::class)->except([
            'show'
        ]);
    });
});

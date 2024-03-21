<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\HomeController;

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

$roles = Role::all('name');
$a = "";

$totalRoles = count($roles);
foreach ($roles as $key => $role) {
    $a .= $role['name'];
    if ($key < $totalRoles - 1) {
        $a .= '|';
    }
}



Route::group(['middleware' => ['role:' . $a]], function () {

    Route::resource('permission', App\Http\Controllers\PermissionController::class);
    Route::get('permission/{permissionid}/delete', [App\Http\Controllers\PermissionController::class, 'distroy']);


    Route::resource('role', App\Http\Controllers\RoleController::class);
    Route::get('role/{roleid}/delete', [App\Http\Controllers\RoleController::class, 'distroy']);
    Route::get('role/{roleid}/giv-permission', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('role/{roleid}/giv-permission', [App\Http\Controllers\RoleController::class, 'givPermissionToRole']);


    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userid}/delete', [App\Http\Controllers\UserController::class, 'distroy']);
});

// Route::get('allpermissions',[UserController::class,'allpermission']);
//////////////////////////////////////////////////////////////////////////////////////

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['role:' . $a]], function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //
    Route::get('/authentication-login', function () {
        return view('authentication-login');
    });
    Route::get('/authentication-register', function () {
        return view('authentication-register');
    });
    Route::get('/icon-tabler', function () {
        return view('icon-tabler');
    })->middleware('permission:Icon Control');
    Route::get('/sample-page', function () {
        return view('sample-page');
    })->middleware('permission:Sample Page Control');
    Route::get('/ui-alerts', function () {
        return view('ui-alerts');
    })->middleware('permission:Alert Control');
    Route::get('/ui-buttons', function () {
        return view('ui-buttons');
    })->middleware('permission:button control');
    Route::get('/ui-card', function () {
        return view('ui-card');
    })->middleware('permission:Card Control');
    Route::get('/ui-forms', function () {
        return view('ui-forms');
    })->middleware('permission:Post Control');
    Route::get('/ui-typography', function () {
        return view('ui-typography');
    });
});




require __DIR__ . '/auth.php';

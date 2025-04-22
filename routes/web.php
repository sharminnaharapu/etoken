<?php

use App\Http\Controllers\Master\CounterController;
use App\Http\Controllers\Master\DashboardController;
use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\DisplayController;
use App\Http\Controllers\Master\DisplayShowController;
use App\Http\Controllers\Master\DoctorTokenController;
use App\Http\Controllers\Master\GeneralSettingController;
use App\Http\Controllers\Master\RoomController;
use App\Http\Controllers\Master\ServiceController;
use App\Http\Controllers\Master\TokenController;
use App\Http\Controllers\Master\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $user_id = null;

    if (auth()->check()) {
        $user_id = Auth::user();
    }

    if ($user_id) {
        return redirect()->route('master.dashboard.index');
    } else {
        return redirect()->route('login');
    }

});
Route::prefix('master/')->name('master.')->middleware(['auth', 'verified'])->group(function () {
    Route::prefix('Dashboard/')->name('dashboard.')->controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::name('setting.')->controller(GeneralSettingController::class)->group(function () {
        Route::get('General-Setting', 'generalSetting')->name('generalSetting');
        Route::post('General-Setting/Mane-Logo', 'mainLogoUpdate')->name('mainLogoUpdate');
        Route::post('General-Setting/Fab-Logo', 'fabLogoUpdate')->name('fabLogoUpdate');
        Route::post('General-Setting/Print-Logo', 'printLogoUpdate')->name('printLogoUpdate');
        Route::post('General-Setting/Update', 'update')->name('update');
        Route::post('General-Setting/Stamp', 'stampUpdate')->name('stampUpdate');
    });

    // Department
    Route::prefix('Department')->name('department.')->controller(DepartmentController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('Store', 'store')->name('store');
        Route::POST('Show/{id}', 'show')->name('show');
        Route::get('Status/{id}', 'status')->name('status');
        Route::post('Edit/{id}', 'edit')->name('edit');
        Route::post('Update/{id}', 'update')->name('update');
        Route::post('Filter', 'filter')->name('filter');
    });
    // Counter
    Route::prefix('Counter')->name('counter.')->controller(CounterController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('Store', 'store')->name('store');
        Route::POST('Show/{id}', 'show')->name('show');
        Route::get('Status/{id}', 'status')->name('status');
        Route::post('Edit/{id}', 'edit')->name('edit');
        Route::post('Update/{id}', 'update')->name('update');
        Route::post('Filter', 'filter')->name('filter');
    });
    // service
    Route::prefix('service')->name('service.')->controller(ServiceController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('Store', 'store')->name('store');
        Route::POST('Show/{id}', 'show')->name('show');
        Route::get('Status/{id}', 'status')->name('status');
        Route::get('Edit/{id}', 'edit')->name('edit');
        Route::post('Update/{id}', 'update')->name('update');
        Route::post('Filter', 'filter')->name('filter');
    });
    // display
    Route::prefix('display')->name('display.')->controller(DisplayController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('Store', 'store')->name('store');
        Route::POST('Show/{id}', 'show')->name('show');
        Route::get('Status/{id}', 'status')->name('status');
        Route::get('Edit/{id}', 'edit')->name('edit');
        Route::post('Update/{id}', 'update')->name('update');
        Route::post('Filter', 'filter')->name('filter');
    });
    // room
    Route::prefix('room')->name('room.')->controller(RoomController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('Store', 'store')->name('store');
        Route::POST('Show/{id}', 'show')->name('show');
        Route::get('Status/{id}', 'status')->name('status');
        Route::post('Edit/{id}', 'edit')->name('edit');
        Route::post('Update/{id}', 'update')->name('update');
        Route::post('Filter', 'filter')->name('filter');
    });

    // user
    Route::prefix('user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('Filter', 'filter')->name('filter');
        Route::get('create', 'create')->name('create');
        Route::post('serviceget', 'serviceget')->name('serviceget');
        Route::post('counterget', 'counterget')->name('counterget');
        Route::post('Store', 'store')->name('store');
        Route::get('Status/{id}', 'status')->name('status');
        Route::get('Edit/{id}', 'edit')->name('edit');
        Route::post('Update/{id}', 'update')->name('update');

    });

    // Token
    Route::prefix('token')->name('token.')->controller(TokenController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('servicedataget/{id}', 'servicedataget')->name('servicedataget');
        Route::post('tokengeneral/{id}', 'tokengeneral')->name('tokengeneral');
        Route::get('list', 'list')->name('list');
        Route::get('activelist', 'activelist')->name('activelist');
        Route::post('Filter', 'filter')->name('filter');
        Route::post('activeFilter', 'activefilter')->name('activefilter');
        Route::get('next/{id}', 'next')->name('next');
    });
    // Doctor Token
    Route::prefix('doctor-token')->name('doctortoken.')->controller(DoctorTokenController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('tokengeneral/{id}', 'tokengeneral')->name('tokengeneral');
        Route::get('list', 'list')->name('list');
        Route::get('activelist', 'activelist')->name('activelist');
        Route::post('Filter', 'filter')->name('filter');
        Route::post('activeFilter', 'activefilter')->name('activefilter');
        Route::get('next/{id}', 'next')->name('next');

    });

    // Display Show
    Route::prefix('display-show')->name('displayshow.')->controller(DisplayShowController::class)->group(function () {
        Route::get('room', 'roomindex')->name('roomindex');
        Route::post('roomfilter', 'roomfilter')->name('roomfilter');
        Route::get('roomview/{id}', 'roomview')->name('roomview');
        Route::get('counter', 'counterindex')->name('counterindex');
        Route::post('counterfilter', 'counterfilter')->name('counterfilter');

        Route::get("/counter-view/{display}", 'counterView')->name('counterView');

    });

});


// Route::get('/dashboard', function () {

//     return view('dashboard');

// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {

//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';


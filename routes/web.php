<?php
use App\Enums\UserRole;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientDetailsController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', function () {
    // dd("fguifigi");
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {  
    
    Route::resource('tasks', TaskController::class);
    Route::resource('projects', ProjectController::class);
    // Route::resource('/client-details',ClientDetailsController::class);
    // Route::resource('client-details', \App\Http\Controllers\Client\ClientDetailsController::class);
    // Route::resource('client-details', ClientDetailsController::class);
    // Route::resource('client-details', ClientDetailsController::class);
    Route::resource('client-details', ClientDetailsController::class)->names([
        'index' => 'clientDetails.index',
        'create' => 'clientDetails.create',
        'store' => 'clientDetails.store',
        'show' => 'clientDetails.show',
        'edit' => 'clientDetails.edit',
        'update' => 'clientDetails.update',
        'destroy' => 'clientDetails.destroy',
    ]);
    

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'delete'])->name('profile.delete');
    
});

Route::middleware(['auth','role:admin'])->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/Clients', [ClientController::class, 'index'])->name('client.index');
    Route::get('/Employees', [EmployeeController::class, 'index'])->name('employee.index');
    
    
});

Route::resource('users', UserController::class);

//Client
Route::middleware('auth','role:client')->group(function () {
    Route::get('client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    // Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    // Route::get('client/projects/{project}', [ProjectController::class, 'show'])->name('client.projects.show');
    // Route::get('client/tasks', [TaskController::class, 'index'])->name('client.tasks.index');
    // Route::get('client/tasks/{task}', [TaskController::class, 'show'])->name('client.tasks.show');
    
    // Route::resource('users', UserController::class)->except('index','edit','update','destroy');
});

//Employee
Route::middleware('auth','role:employee')->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
    // Route::resource('users', UserController::class)->except('index','edit','update','destroy');
    
});






require __DIR__.'/auth.php';

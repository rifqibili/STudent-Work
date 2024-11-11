<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KerjakanTugasController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ToworkerController;
use App\Http\Controllers\WorkerController;
use App\Models\Submission;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/EulaToWorker', function () {
    return view('
    layouts.permohonan.eulaToWorker');
})->name('eula');

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'regisForm')->name('register.form');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'loginForm')->name('login.form');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-password', 'forgot_password')->name('forgot-password');
    Route::post('/forgot-password', 'forgot_password_act')->name('forgot-password-act');
    Route::get('/validasi-forgot-password/{token}', 'validasi_forgot_password')->name('validasi-forgot-password');
    Route::post('/validasi-forgot-password', 'validasi_forgot_password_act')->name('validasi-forgot-password-act');
});

Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/create-task', 'create')->name('task.form');
    Route::post('/create-task', 'store')->name('task.store');
    Route::get('/detail-task/{id}', 'show')->name('task.show');
    Route::get('/all-task', 'allTask')->name('task.all');
    Route::get('/update-task/{task}', 'edit')->name('task.create');
    Route::patch('/update-task/{task}', 'update')->name('task.update');
    Route::delete('/delete-task/{task}', 'destroy')->name('task.delete');
    Route::get('/dashboard/task-collect', 'collectAssignment')->name('task.collectAssignment');
    Route::get('/dashboard/deletedtask', 'showDeletedTasks')->name('task.deletedTask');
    Route::patch('/dashboard/task/restore/{id}', 'restore')->name('task.restore');
    Route::delete('/dashboard/task/forceDelete/{id}', 'forceDelete')->name('task.forceDelete');
    Route::delete('/dashboard/task/forceDeleteAll',  'forceDeleteAll')->name('task.forceDeleteAll');
});

Route::controller(KategoriController::class)->group(function () {
    Route::get('/dashboard/create-kategori', 'create')->name('kategori.form');
    Route::post('/create-kategori', 'store')->name('kategori.store');
    Route::get('/dashboard/update-kategori/{$id}', 'edit')->name('kategori.edit');
    Route::delete('/dashboard/delete-task/{kategori}', 'destroy')->name('kategori.delete');
    Route::get('/dashboard/deleted/kategori', 'showDeletedkategori')->name('kategori.deletedkategori');
    Route::patch('/dashboard/kategori/restore/{id}', 'restore')->name('kategori.restore');
    Route::delete('/dashboard/kategori/forceDelete/{id}', 'forceDelete')->name('kategori.forceDelete');
    Route::delete('/dashboard/kategori/forceDeleteAll',  'forceDeleteAll')->name('kategori.forceDeleteAll');
});

Route::controller(KerjakanTugasController::class)->group(function () {
    Route::post('/apply-task/{task}', 'applyTask')->name('task.apply');
    Route::post('/approve-worker/{application}', 'approvedBtn')->name('task.approved');
    Route::post('/unapprove-worker/{application}', 'unApprovedBtn')->name('task.unapproved');
    Route::post('/detail-profile', 'profileView')->name('profile.view');
});

Route::middleware('auth')->controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'dashboardCount')->name('dashboard');
    Route::get('/dashboard/table/users', 'tableUser')->name('dashboard.table.user');
    Route::get('/dashboard/table/task', 'tableTask')->name('dashboard.table.task');
    Route::get('/dashboard/table/kategori', 'tableKategori')->name('dashboard.table.kategori');
    Route::get('/dashboard/profile', 'profile')->name('dashboard.profile');
    Route::delete('/dashboard/user/{id}', 'UserController@destroy')->name('user.delete');
    Route::get('/dashboard/user/{id}', 'UserController@show')->name('user.show');


});


Route::controller(ToworkerController::class)->group(function () {
    Route::get('/dashboard/toworker', 'upgradeForm')->name('toWorker.form');
    Route::post('/dashboard/toworker', 'submitUpgradeRequet')->name('toWorker.store');
    Route::get('/dashboard/upgrade-requests', 'showUpgradeRequest')->middleware('admin')->name('show.toWorker');
    Route::post('/dashboard/upgrade-requests/{id}/approve', 'approveRequest')->middleware('admin')->name('approve.toWorker');
    Route::post('/dashboard/upgrade-requests/{id}/rejected', 'rejectedRequest')->middleware('admin')->name('rejected.toWorker');
});

Route::controller(SubmissionController::class)->group(function () {
    Route::get('/dashboard/submitForm/{task}', 'submitForm')->name('submit.form');
    Route::post('/dashboard/{task}/submit', 'submitTask')->name('submit.task');
});

Route::middleware('auth')->controller(ChatController::class)->group(function () {
    Route::get('/dashboard/chat/{receiverId?}', 'index')
        ->name('chat.index')
        ->whereNumber('receiverId');
    Route::post('/dashboard/chat/{receiverId?}', 'store')
        ->name('chat.store')
        ->whereNumber('receiverId');
});

Route::middleware('penyedia')->controller(ProviderController::class)->group( function () 
{
    Route::get('/dashboard/yourtask', 'yourTask')->name('task.yourTask');
    Route::get('/dashboard/deletedtaskprov', 'showDeletedTasksForProvider')->name('task.deletedTaskProv');
    Route::get('/dashboard/view{taskId}/submissions', 'penyediaView')->name('submit.view');
    Route::patch('/dashboard/view/{submission}/update', 'updateSubmissionStatus')->name('submit.action');
    Route::get('/dashboard/download/{path}', 'downloadFile')->name('download.file');
});
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\StudentDashboardController;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Log;


Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::get('/storage/{path}', function ($path) {

    $file = storage_path('app/public/' . $path);

    if (!File::exists($file)) {
        abort(404);
    }

    return Response::file($file);

})->where('path', '.*');

Route::get('/terms-and-conditions', function () {
    return view('terms_&_conditions');
});

Route::get('/privacy-policy', function () {
    return view('privacy_policy');
});

Route::get('admin/register/me', [AuthController::class, 'registrationForm'])->name('admin.register.me');
Route::post('/admin/register', [AuthController::class, 'store'])->name('admin.register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/message', [DashboardController::class, 'store_contact'])->name('message');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/updates', [HomeController::class, 'update_feed'])->name('updates');

Route::get('/careers', [CareersController::class, 'careers'])->name('careers');
Route::get('/career-form', [CareersController::class, 'showForm'])->name('career.form');
Route::post('/career-submit', [CareersController::class, 'submitForm'])->name('career.submit');

Route::prefix('blog')->group(function () {
    Route::middleware('admin.writer')->group(function () {
        Route::get('/create', [PostController::class, 'create'])->name('blog.create');
        Route::get('/{post}/edit', [PostController::class, 'edit'])->name('blog.edit');
        Route::put('/{post}', [PostController::class, 'update'])->name('blog.update');
        Route::delete('/{post}', [PostController::class, 'destroy'])->name('blog.destroy');
        Route::post('/store', [PostController::class, 'store'])->name('blog.store');
    });

    Route::get('/stores', [PostController::class, 'index'])->name('blog.stores');
    Route::get('/{slug}', [PostController::class, 'show'])->name('blog.show');
});

Route::get('filter/store', [PostController::class, 'store_filter'])->name('filter.store');
// Route::get('/career-form', [CareersController::class, 'ApplicationDetails']);


Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/store_users', [DashboardController::class, 'store_users'])->name('store_users');
    //Route::post('/users/{id}/update-role', [DashboardController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/messages/{id}', [DashboardController::class, 'destroy_contact'])->name('contact.destroy');
    Route::post('/admin/users/update-role', [DashboardController::class, 'updateRole']);
    Route::get('/admin/careers', [CareersController::class, 'viewApplications'])->name('admin.careers');
    Route::get('/admin/careers/export', [CareersController::class, 'export'])->name('admin.careers.export');
    Route::post('/admin/careers/clear', [CareersController::class, 'clearAllApplications'])->name('admin.careers.clearAll');
    Route::get('/admin/student/{id}', [StudentDashboardController::class, 'dashboard'])->name('admin.student.dashboard');
    Route::post('/admin/careers/update-paid', [CareersController::class, 'updatePaid'])->name('admin.careers.updatePaid');
    Route::post('/career/update-progress', [CareersController::class, 'updateProgress'])->name('career.update.progress');
    Route::post('/admin/application-windows', [CareersController::class, 'storeApplicationWindow'])->name('application-windows.store');
    Route::post('admin/send-message', [CareersController::class, 'send_message'])->name('admin.messages.send');
});

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->middleware('auth')->name('student.dashboard');

Route::get('/store', [PostController::class, 'store'])->name('store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/users/{id}', [ProfileController::class, 'destroy'])->name('users.destroy');
    });
});

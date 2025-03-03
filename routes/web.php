<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;

// ==========================
// Public Routes
// ==========================
Route::view('/', 'index')->name('landing');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login'); 
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/student/logout', [AuthController::class, 'studentLogout'])->name('student.logout');

// Protect the enroll route with auth middleware
Route::middleware(['auth:web'])->group(function () {
    Route::get('/enroll', [AuthController::class, 'enrollNow'])->name('enroll');
});

// ==========================
// Admin Routes (Protected)
// ==========================
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('home');

    // User Management
    Route::get('/admin/users', [AuthController::class, 'getAllUsers'])->name('admin.users');
    Route::get('/admin/admin-list', [AuthController::class, 'getAllAdmins'])->name('admin.adminList');
    Route::get('/admin/users/{id}/edit', [AuthController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AuthController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AuthController::class, 'deleteUser'])->name('admin.users.delete');

    // Archived Users
    Route::get('/admin/archived-users', [AuthController::class, 'getArchivedUsers'])->name('admin.archivedUsers');

    // Archived Events
    Route::get('/admin/archived-events', [EventController::class, 'getArchivedEvents'])->name('admin.archivedEvents');

    // Admin Profile
    Route::view('/admin/profile', 'admin.profile')->name('admin.profile');
    Route::post('/admin/profile/update', [AdminUserController::class, 'updateProfile'])->name('admin.profile.update');

    // Admin Creation
    Route::view('/admin/createAdmin', 'admin.createAdmin')->name('admin.createAdmin');
    Route::get('/admin/create', [AdminUserController::class, 'create'])->name('admin.createAdmin');
    Route::post('/admin/store', [AdminUserController::class, 'store'])->name('admin.storeAdmin');

    // Admin Management (Edit/Delete)
    Route::get('/admin/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminUserController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminUserController::class, 'destroy'])->name('admin.destroy');

    // News & Events Management
    Route::view('/admin/Postnews', 'admin.Postnews')->name('admin.Postnews');
    Route::view('/admin/managePost', 'admin.managePost')->name('admin.managePost');
    Route::get('/admin/manage-post', [EventController::class, 'managePost'])->name('admin.managePost');
    Route::get('/admin/manage-post/{id}/edit', [EventController::class, 'edit'])->name('admin.managePost.edit');
    Route::put('/admin/manage-post/{id}', [EventController::class, 'update'])->name('admin.managePost.update');
    Route::delete('/admin/manage-post/{id}', [EventController::class, 'destroy'])->name('admin.managePost.delete');

    // PDF Exports
    Route::get('/admin/pdfUsers', [AuthController::class, 'exportToPDF'])->name('admin.pdfUsers');
    Route::get('/admin/pdfPost', [EventController::class, 'exportToPDF'])->name('admin.pdfPost');
    Route::get('/admin/pdfNews', [AuthController::class, 'exportNewsToPDF'])->name('admin.pdfNews');
});

// ==========================
// Events & News Routes
// ==========================
Route::get('/events', [EventController::class, 'showNews'])->name('events.index');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/json', [EventController::class, 'getEvents'])->name('events.json');

Route::get('/news', [EventController::class, 'showNews'])->name('news');
Route::get('/news/{id}', [EventController::class, 'show'])->name('news.show');

// ==========================
// Static Pages
// ==========================
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/contact', fn() => view('contact'))->name('contact');

// Contact Form Submission
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

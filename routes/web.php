<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\SuperAdmin\WebsiteManagementController;
use App\Http\Controllers\SuperAdmin\StudentManagementController;
use App\Http\Controllers\SuperAdmin\CourseManagementController;
use App\Http\Controllers\SuperAdmin\ModuleManagementController;
use App\Http\Controllers\SuperAdmin\BatchManagementController;
use App\Http\Controllers\SuperAdmin\AttendanceManagementController;
use App\Http\Controllers\SuperAdmin\StudyMaterialManagementController;
use App\Http\Controllers\SuperAdmin\AssignmentManagementController;
use App\Http\Controllers\SuperAdmin\OnlineTestManagementController;
use App\Http\Controllers\SuperAdmin\TestQuestionManagementController;
use App\Http\Controllers\SuperAdmin\StudentProgressManagementController;
use App\Http\Controllers\SuperAdmin\CertificateManagementController;
use App\Http\Controllers\SuperAdmin\NavbarItemController;
use App\Http\Controllers\SuperAdmin\HeroSlideController;
use App\Http\Controllers\SuperAdmin\PlacementController;
use App\Http\Controllers\SuperAdmin\TrainerController;
use App\Http\Controllers\CertificateVerificationController;
use App\Http\Controllers\Student\StudentCourseController;
use App\Http\Controllers\Student\StudentModuleController;
use App\Http\Controllers\Student\StudentStudyMaterialController;
use App\Http\Controllers\Student\StudentAssignmentController;
use App\Http\Controllers\Student\StudentTestController;
use App\Http\Controllers\Student\StudentTestAttemptController;
use App\Http\Controllers\Student\StudentAttendanceController;
use App\Http\Controllers\Student\StudentProgressController;
use App\Http\Controllers\Student\StudentCertificateController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CourseController;
use App\Http\Controllers\Frontend\BatchController;
use App\Http\Controllers\Frontend\TrainingController;
use App\Http\Controllers\OfferRequestController;
use App\Http\Controllers\Frontend\PracticalController;
use App\Http\Controllers\ContactController;


Route::get( '/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/Trainers', [TrainingController::class, 'index'])->name('Trainers');
Route::get('career-support',[TrainingController::class,'career'])->name('career-support');
Route::post('/career-enquiry', [TrainingController::class, 'send'])->name('career.enquiry.send');
Route::get('/certificates',[TrainingController::class,'certificates'])->name('certificates');
Route::get('/contact',[TrainingController::class,'contact'])->name('contact');
Route::get('/batches', [BatchController::class, 'index'])->name('website.batches');
Route::get('/Practical-Projects',[PracticalController::class,'index'])->name('/Practical-Projects');
Route::post('/offer-request', [OfferRequestController::class, 'store'])->name('offer.submit');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::prefix('courses')->name('courses.')->group(function () {
Route::get('/', [CourseController::class, 'index'])->name('index');
Route::get('/{id}', [CourseController::class, 'show'])->name('show');



    });



Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'super_admin'])->prefix('super-admin') ->name('super-admin.')->group(function () {

        // Dashboard
 Route::get('/dashboard', [SuperAdminDashboardController::class,'index'  ])->name('dashboard');
// ========================= // Website Management// =========================
 Route::get('/website', [ WebsiteManagementController::class, 'index'])->name('website.index');
 Route::post('/website/settings', [WebsiteManagementController::class, 'updateSettings' ])->name('website.settings.update');
 Route::post('/hero-slides/{heroSlide}/toggle-status',[HeroSlideController::class, 'toggleStatus'])->name('hero-slides.toggle-status');
 Route::resource('placements', PlacementController::class)->except(['show']);
 Route::resource('hero-slides', HeroSlideController::class);
 Route::resource('trainers', TrainerController::class)->except(['show']);
 Route::resource('navbar', NavbarItemController::class)->except(['show']);
// ========================= // Student Management // =========================
 Route::prefix('students')->name('students.')->group(function () {
 Route::get('/', [StudentManagementController::class,'index' ])->name('index');
 Route::get('/{id}', [ StudentManagementController::class,'show' ])->name('show');
 Route::post('/{id}/approve', [StudentManagementController::class,'approve' ])->name('approve');
 Route::post('/{id}/deactivate', [StudentManagementController::class,'deactivate'])->name('deactivate');
 Route::delete('/{id}', [StudentManagementController::class,'destroy'])->name('destroy');

 });

// =========================// Course Management// =========================
 Route::prefix('courses')->name('courses.')->group(function () {
 Route::get('/', [CourseManagementController::class, 'index'])->name('index');
 Route::get('/create', [CourseManagementController::class,'create'])->name('create');
 Route::post('/', [ CourseManagementController::class, 'store'])->name('store');
 Route::get('/{id}', [CourseManagementController::class,'show'])->name('show');
 Route::get('/{id}/edit', [ CourseManagementController::class, 'edit'])->name('edit');
 Route::put('/{id}', [CourseManagementController::class,'update'])->name('update');
 Route::post('/{id}/toggle-status', [ CourseManagementController::class, 'toggleStatus'])->name('toggle-status');
 Route::delete('/{id}', [ CourseManagementController::class, 'destroy'])->name('destroy');
});
// ========================= // Module Management // =========================
Route::get('/modules', [ ModuleManagementController::class,'allModules'])->name('modules.index');
Route::prefix('courses/{course}/modules')->name('courses.modules.')->group(function () {
Route::get('/', [ ModuleManagementController::class,'index'])->name('index');
Route::get('/create', [ ModuleManagementController::class,'create'])->name('create');
Route::post('/', [ModuleManagementController::class,'store'])->name('store');
Route::get('/{id}', [ModuleManagementController::class,'show'])->name('show');
Route::get('/{id}/edit', [ModuleManagementController::class, 'edit'])->name('edit');
Route::put('/{id}', [ModuleManagementController::class, 'update'])->name('update');
Route::post('/{id}/toggle-status', [ ModuleManagementController::class,'toggleStatus'])->name('toggle-status');
Route::delete('/{id}', [ModuleManagementController::class,'destroy'])->name('destroy');
});

// ========================= // Batch Management // =========================
Route::prefix('batches')->name('batches.')->group(function () {
Route::get('/', [BatchManagementController::class,'index'])->name('index');
Route::get('/create', [BatchManagementController::class,'create'])->name('create');
Route::post('/', [BatchManagementController::class,'store'])->name('store');
Route::get('/{id}', [BatchManagementController::class,'show'])->name('show');
Route::get('/{id}/edit', [BatchManagementController::class,'edit'])->name('edit');
Route::put('/{id}', [BatchManagementController::class,'update'])->name('update');
 Route::post('/{id}/toggle-status', [ BatchManagementController::class,'toggleStatus' ])->name('toggle-status');
Route::delete('/{id}', [ BatchManagementController::class,'destroy'])->name('destroy');
});
// ========================= // Attendance Management // =========================
Route::prefix('attendance')->name('attendance.')->group(function () {
Route::get('/', [AttendanceManagementController::class,'index' ])->name('index');
Route::get('/create', [AttendanceManagementController::class,'create'])->name('create');
Route::post('/', [AttendanceManagementController::class,'store'])->name('store');
Route::get('/history', [  AttendanceManagementController::class, 'history' ])->name('history');
    });
// ========================= // Study Material Management // =========================
Route::prefix('study-materials')->name('study-materials.')->group(function () {
// All Study Materials
Route::get('/', [StudyMaterialManagementController::class, 'index'])->name('index');
Route::get('/create', [StudyMaterialManagementController::class, 'create' ])->name('create');
 Route::post('/', [ StudyMaterialManagementController::class,'store'])->name('store');
Route::get('/{id}', [ StudyMaterialManagementController::class,'show' ])->name('show');
Route::get('/{id}/edit', [StudyMaterialManagementController::class,'edit' ])->name('edit');
Route::put('/{id}', [StudyMaterialManagementController::class, 'update'])->name('update');
Route::post('/{id}/toggle-status', [StudyMaterialManagementController::class,'toggleStatus'])->name('toggle-status');
Route::delete('/{id}', [StudyMaterialManagementController::class,'destroy'])->name('destroy');
});
// ========================= // Assignment Management // =========================

Route::prefix('assignments')->name('assignments.')->group(function () {
Route::get('/', [ AssignmentManagementController::class,'index' ])->name('index');
Route::get('/create', [AssignmentManagementController::class,'create'])->name('create');
Route::post('/', [AssignmentManagementController::class,'store' ])->name('store');
Route::get('/{id}', [AssignmentManagementController::class, 'show'])->name('show');
 Route::get('/{id}/edit', [AssignmentManagementController::class,'edit' ])->name('edit');
 Route::put('/{id}', [AssignmentManagementController::class,'update'])->name('update');
 Route::post('/{id}/toggle-status', [ AssignmentManagementController::class, 'toggleStatus'])->name('toggle-status');
 Route::delete('/{id}', [ AssignmentManagementController::class, 'destroy' ])->name('destroy');
    });

    // ========================= // Online Test Management // =========================
    Route::prefix('tests')->name('tests.')->group(function () {
    Route::get('/', [ OnlineTestManagementController::class,'index'])->name('index');
    Route::get('/create', [OnlineTestManagementController::class, 'create' ])->name('create');
    Route::post('/', [OnlineTestManagementController::class,'store'])->name('store');
    Route::get('/{id}', [ OnlineTestManagementController::class, 'show' ])->name('show');
    Route::get('/{id}/edit', [OnlineTestManagementController::class,'edit' ])->name('edit');
   Route::put('/{id}', [OnlineTestManagementController::class, 'update'])->name('update');
   Route::post('/{id}/toggle-status', [OnlineTestManagementController::class,'toggleStatus'])->name('toggle-status');
   Route::delete('/{id}', [OnlineTestManagementController::class,'destroy' ])->name('destroy');
    });

    // ========================= // Test Question Management // =========================

    Route::prefix('tests/{test}/questions')->name('tests.questions.') ->group(function () {
     Route::get('/', [TestQuestionManagementController::class, 'index'])->name('index');
     Route::get('/create', [ TestQuestionManagementController::class,'create'])->name('create');
     Route::post('/', [TestQuestionManagementController::class,'store'])->name('store');
     Route::get('/{question}', [TestQuestionManagementController::class,'show'])->name('show');
     Route::get('/{question}/edit', [TestQuestionManagementController::class,'edit'])->name('edit');
     Route::put('/{question}', [TestQuestionManagementController::class,'update'])->name('update');
     Route::post('/{question}/toggle-status', [ TestQuestionManagementController::class,'toggleStatus' ])->name('toggle-status');
     Route::delete('/{question}', [TestQuestionManagementController::class,'destroy'])->name('destroy');

    });

    // ========================= // Student Progress Management // =========================
    Route::prefix('student-progress')->name('student-progress.')->group(function () {
    Route::get('/',[StudentProgressManagementController::class, 'index'])->name('index');
    Route::get('/{id}',[StudentProgressManagementController::class, 'show'] )->name('show');
    });

    // ========================= // Certificate Management // =========================

    Route::prefix('certificates')->name('certificates.')->group(function () {
    Route::get( '/',[CertificateManagementController::class, 'index'])->name('index');
    Route::get('/create',[CertificateManagementController::class, 'create'])->name('create');
    Route::post( '/', [CertificateManagementController::class, 'store'])->name('store');
    Route::get('/{id}', [CertificateManagementController::class, 'show'] )->name('show');
    Route::post('/{id}/toggle-status',[CertificateManagementController::class, 'toggleStatus'] )->name('toggle-status');
    Route::delete( '/{id}',[CertificateManagementController::class, 'destroy'])->name('destroy');

    });

    Route::prefix('progress')->name('progress.')->group(function () {
     Route::get( '/', [StudentProgressManagementController::class, 'index'])->name('index');
     Route::get( '/create', [StudentProgressManagementController::class, 'create'])->name('create');
     Route::post('/',[StudentProgressManagementController::class, 'store'])->name('store');
    Route::get( '/{id}', [StudentProgressManagementController::class, 'show'] )->name('show');
     Route::get('/{id}/edit',[StudentProgressManagementController::class, 'edit'])->name('edit');
     Route::put('/{id}',[StudentProgressManagementController::class, 'update'])->name('update');
     Route::delete( '/{id}', [StudentProgressManagementController::class, 'destroy'])->name('destroy');
    });

});
Route::get(
    '/certificate/verify/{certificateNumber}',
    [CertificateVerificationController::class, 'verify']
)->name('certificate.verify');









 Route::middleware(['auth', 'student'])->prefix('student')->name('student.')->group(function () {
 Route::get('/dashboard',[StudentDashboardController::class, 'index'])->name('dashboard');
 Route::get('/modules',[StudentModuleController::class, 'index'])->name('modules.index');
  Route::prefix('courses')->name('courses.')->group(function () {
  Route::get('/',[StudentCourseController::class, 'index'])->name('index');
  Route::get('/{id}',[StudentCourseController::class, 'show'])->name('show');
});
// ========================= // Student Module Management // =========================

Route::prefix('study-materials')->name('study-materials.')->group(function () {
Route::get('/',[StudentStudyMaterialController::class, 'index'])->name('index');
Route::get('/{id}',[StudentStudyMaterialController::class, 'show'])->name('show');
});

// ========================= // Student Assignment Management // =========================
Route::prefix('assignments')->name('assignments.')->group(function () {
 Route::get( '/',[StudentAssignmentController::class, 'index'])->name('index');
 Route::get( '/{id}', [StudentAssignmentController::class, 'show'] )->name('show');
});

// ========================= // Student Test Management // =========================
Route::prefix('tests')->name('tests.')->group(function () {
Route::get('/',[StudentTestController::class, 'index'])->name('index');
Route::get( '/{id}', [StudentTestController::class, 'show'])->name('show');

});

Route::get( '/{id}/start', [StudentTestAttemptController::class, 'start'])->name('start');
Route::get('/attempt/{id}',[StudentTestAttemptController::class, 'attempt'])->name('attempt');
Route::post('/attempt/{id}/submit',[StudentTestAttemptController::class, 'submit'])->name('submit');
Route::get('/result/{id}',[StudentTestAttemptController::class, 'result']
)->name('result');

// ========================= // Student Test Attempt Management // =========================

Route::get('/attendance',[StudentAttendanceController::class, 'index'])->name('attendance.index');
Route::get('/progress',[StudentProgressController::class, 'index'])->name('progress.index');

// ========================= // Student Certificate Management // =========================
Route::prefix('certificates')->name('certificates.')->group(function () {
Route::get('/',[StudentCertificateController::class, 'index'])->name('index');
Route::get('/{id}',[StudentCertificateController::class, 'show'])->name('show');
});

//========================= // Student Profile Management // =========================
Route::prefix('profile')->name('profile.')->group(function () {
Route::get( '/', [StudentProfileController::class, 'index'])->name('index');
Route::post( '/password', [StudentProfileController::class, 'updatePassword'] )->name('password.update');
});





});

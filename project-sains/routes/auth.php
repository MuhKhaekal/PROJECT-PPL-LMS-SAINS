<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\AdminFacultyController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AnnouncementAsistenController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\StudyGroupController;
use App\Http\Controllers\AsistenGroupController;
use App\Http\Controllers\AssignmentChecksController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FaqAsistenController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ShowAssignmentController;
use App\Http\Controllers\ShowMaterialController;
use App\Http\Controllers\SubmissionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::resource('kelola-akun', AccountsController::class)->middleware('admin');
    Route::resource('study-group', StudyGroupController::class)
    ->middleware('user') 
    ->names([
        'index' => 'study-group.index',
        'create' => 'study-group.create',
        'store' => 'study-group.store',
        'show' => 'study-group.show',
        'edit' => 'study-group.edit',
        'update' => 'study-group.update',
        'destroy' => 'study-group.destroy',
    ]);

    Route::resource('asisten-group', AsistenGroupController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'asisten-group.index',
        'create' => 'asisten-group.create',
        'store' => 'asisten-group.store',
        'show' => 'asisten-group.show',
        'edit' => 'asisten-group.edit',
        'update' => 'asisten-group.update',
        'destroy' => 'asisten-group.destroy',
    ]);
    Route::resource('presensi', PresensiController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'presensi.index',
        'create' => 'presensi.create',
        'store' => 'presensi.store',
        'show' => 'presensi.show',
        'edit' => 'presensi.edit',
        'update' => 'presensi.update',
        'destroy' => 'presensi.destroy',
    ]);


    Route::resource('pertemuan', MeetingController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'pertemuan.index',
        'create' => 'pertemuan.create',
        'store' => 'pertemuan.store',
        'show' => 'pertemuan.show',         
        'edit' => 'pertemuan.edit',
        'update' => 'pertemuan.update',
        'destroy' => 'pertemuan.destroy',
    ]);
    
    Route::resource('materi', MaterialController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'materi.index',
        'create' => 'materi.create',
        'store' => 'materi.store',
        'show' => 'materi.show',         
        'edit' => 'materi.edit',
        'update' => 'materi.update',
        'destroy' => 'materi.destroy',
    ]);
    Route::resource('assignment', AssignmentController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'assignment.index',
        'create' => 'assignment.create',
        'store' => 'assignment.store',
        'show' => 'assignment.show',         
        'edit' => 'assignment.edit',
        'update' => 'assignment.update',
        'destroy' => 'assignment.destroy',
    ]);

    Route::resource('showmaterial', ShowMaterialController::class)
    ->middleware('user')
    ->names([
        'index' => 'showmaterial.index',
        'create' => 'showmaterial.create',
        'store' => 'showmaterial.store',
        'show' => 'showmaterial.show',         
        'edit' => 'showmaterial.edit',
        'update' => 'showmaterial.update',
        'destroy' => 'showmaterial.destroy',
    ]);
    Route::resource('showassignment', ShowAssignmentController::class)
    ->middleware('user')
    ->names([
        'index' => 'showassignment.index',
        'create' => 'showassignment.create',
        'store' => 'showassignment.store',
        'show' => 'showassignment.show',         
        'edit' => 'showassignment.edit',
        'update' => 'showassignment.update',
        'destroy' => 'showassignment.destroy',
    ]);
    Route::resource('assignmentcheck', AssignmentChecksController::class)
    ->middleware('user')
    ->names([
        'index' => 'assignmentcheck.index',
        'create' => 'assignmentcheck.create',
        'store' => 'assignmentcheck.store',
        'show' => 'assignmentcheck.show',         
        'edit' => 'assignmentcheck.edit',
        'update' => 'assignmentcheck.update',
        'destroy' => 'assignmentcheck.destroy',
    ]);
    Route::resource('submission', SubmissionController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'submission.index',
        'create' => 'submission.create',
        'store' => 'submission.store',
        'show' => 'submission.show',         
        'edit' => 'submission.edit',
        'update' => 'submission.update',
        'destroy' => 'submission.destroy',
    ]);
    Route::resource('adminuser', AdminUserController::class)
    ->middleware('admin')
    ->names([
        'index' => 'adminuser.index',
        'create' => 'adminuser.create',
        'store' => 'adminuser.store',
        'show' => 'adminuser.show',         
        'edit' => 'adminuser.edit',
        'update' => 'adminuser.update',
        'destroy' => 'adminuser.destroy',
    ]);
    Route::resource('adminfaculty', AdminFacultyController::class)
    ->middleware('admin')
    ->names([
        'index' => 'adminfaculty.index',
        'create' => 'adminfaculty.create',
        'store' => 'adminfaculty.store',
        'show' => 'adminfaculty.show',         
        'edit' => 'adminfaculty.edit',
        'update' => 'adminfaculty.update',
        'destroy' => 'adminfaculty.destroy',
    ]);
    Route::resource('admincourse', AdminCourseController::class)
    ->middleware('admin')
    ->names([
        'index' => 'admincourse.index',
        'create' => 'admincourse.create',
        'store' => 'admincourse.store',
        'show' => 'admincourse.show',         
        'edit' => 'admincourse.edit',
        'update' => 'admincourse.update',
        'destroy' => 'admincourse.destroy',
    ]);
    Route::resource('admincertificate', CertificateController::class)
    ->middleware('admin')
    ->names([
        'index' => 'admincertificate.index',
        'create' => 'admincertificate.create',
        'store' => 'admincertificate.store',
        'show' => 'admincertificate.show',         
        'edit' => 'admincertificate.edit',
        'update' => 'admincertificate.update',
        'destroy' => 'admincertificate.destroy',
    ]);
    Route::resource('faq', FaqController::class)
    ->middleware('user')
    ->names([
        'index' => 'faq.index',
        'create' => 'faq.create',
        'store' => 'faq.store',
        'show' => 'faq.show',         
        'edit' => 'faq.edit',
        'update' => 'faq.update',
        'destroy' => 'faq.destroy',
    ]);
    Route::resource('announcement', AnnouncementController::class)
    ->middleware('user')
    ->names([
        'index' => 'announcement.index',
        'create' => 'announcement.create',
        'store' => 'announcement.store',
        'show' => 'announcement.show',         
        'edit' => 'announcement.edit',
        'update' => 'announcement.update',
        'destroy' => 'announcement.destroy',
    ]);
    Route::resource('faqasisten', FaqAsistenController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'faqasisten.index',
        'create' => 'faqasisten.create',
        'store' => 'faqasisten.store',
        'show' => 'faqasisten.show',         
        'edit' => 'faqasisten.edit',
        'update' => 'faqasisten.update',
        'destroy' => 'faqasisten.destroy',
    ]);
    Route::resource('announcementasisten', AnnouncementAsistenController::class)
    ->middleware('asisten')
    ->names([
        'index' => 'announcementasisten.index',
        'create' => 'announcementasisten.create',
        'store' => 'announcementasisten.store',
        'show' => 'announcementasisten.show',         
        'edit' => 'announcementasisten.edit',
        'update' => 'announcementasisten.update',
        'destroy' => 'announcementasisten.destroy',
    ]);
});

<?php
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\AdminAnnouncementController;
use App\Http\Controllers\Admin\AdminCourseController;
use App\Http\Controllers\Admin\AdminFacultyController;
use App\Http\Controllers\Admin\AdminFaqController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\FillCertifcateController;
use App\Http\Controllers\Admin\ShowFaqAdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

Route::middleware('auth', 'admin')->group(function() {
    Route::resource('kelola-akun', AccountsController::class);
    Route::resource('adminuser', AdminUserController::class);
    Route::resource('adminfaculty', AdminFacultyController::class);
    Route::resource('admincourse', AdminCourseController::class);
    Route::resource('admincertificate', CertificateController::class);
    Route::resource('showfaqadmin', ShowFaqAdminController::class);
    Route::resource('adminfaq', AdminFaqController::class);
    Route::resource('adminannouncement', AdminAnnouncementController::class);
    Route::resource('admincertificates', CertificateController::class);

    Route::delete('/admincertificates', [CertificateController::class, 'destroyAll'])
    ->name('admincertificate.destroyAll');

    Route::get('/verificationCertificate', [FillCertifcateController::class, 'process'])->name('fillcertificate.process');
    Route::post('/verificationCertificate', [FillCertifcateController::class, 'store'])->name('fillcertificate.store');
    Route::delete('/verificationcertificates', [FillCertifcateController::class, 'destroyByType'])
    ->name('fillcertificate.destroyByType');
});
    


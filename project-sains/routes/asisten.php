<?php
use App\Http\Controllers\Asisten\AnnouncementAsistenController;
use App\Http\Controllers\Asisten\AsistenGroupController;
use App\Http\Controllers\Asisten\AsistenProfileController;
use App\Http\Controllers\Asisten\AssignmentController;
use App\Http\Controllers\Asisten\FaqAsistenController;
use App\Http\Controllers\Asisten\ListPraktikanController;
use App\Http\Controllers\Asisten\MaterialController;
use App\Http\Controllers\Asisten\PresensiController;
use App\Http\Controllers\Asisten\MeetingController;
use App\Http\Controllers\Asisten\PostTestController;
use App\Http\Controllers\Asisten\PreTestController;
use App\Http\Controllers\Asisten\ShowFaqController;
use App\Http\Controllers\Asisten\SubmissionController;
use App\Http\Controllers\Asisten\WeeklyScoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


Route::middleware('auth', 'asisten')->group(function() {
    Route::resource('asisten-group', AsistenGroupController::class);
    Route::resource('presensi', PresensiController::class);
    Route::resource('pertemuan', MeetingController::class);
    Route::resource('materi', MaterialController::class);
    Route::resource('assignment', AssignmentController::class);
    Route::resource('submission', SubmissionController::class);
    Route::resource('faqasisten', FaqAsistenController::class);
    Route::resource('showfaqasisten', ShowFaqController::class);
    Route::resource('announcementasisten', AnnouncementAsistenController::class);
    Route::resource('myprofileasisten', AsistenProfileController::class);
    Route::resource('daftarnilaipraktikan', ListPraktikanController::class);
    Route::resource('pretest', PreTestController::class);
    Route::resource('posttest', PostTestController::class);
    Route::resource('nilaiperpekan', WeeklyScoreController::class);

        // Route::put('pretest/{pretest}', [PreTestController::class, 'updateAll'])->name('pretest.updateAll');
        Route::put('pretest/update/{courseId?}', [PreTestController::class, 'updateAll'])->name('pretest.updateAll');
        Route::put('posttest/update/{courseId?}', [PostTestController::class, 'updateAll'])->name('posttest.updateAll');
        Route::put('nilaiperpekan/update/{courseId?}', [WeeklyScoreController::class, 'updateAll'])->name('nilaiperpekan.updateAll');
        Route::get('/export-nilairekap', [ListPraktikanController::class, 'exportToExcel'])->name('nilaiperpekan.exportToExcel');
});
<?php
use App\Http\Controllers\User\AnnouncementController;
use App\Http\Controllers\User\StudyGroupController;
use App\Http\Controllers\User\AssignmentChecksController;
use App\Http\Controllers\User\FaqController;
use App\Http\Controllers\User\ShowAssignmentController;
use App\Http\Controllers\User\ShowMaterialController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


Route::middleware('auth', 'user')->group(function() {
    Route::resource('announcement', AnnouncementController::class);
    Route::resource('study-group', StudyGroupController::class);
    Route::resource('showmaterial', ShowMaterialController::class);
    Route::resource('showassignment', ShowAssignmentController::class);
    Route::resource('assignmentcheck', AssignmentChecksController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('myprofile', UserProfileController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PlaningPlatform;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\OrientationController;
use App\Http\Controllers\admin\PvtBodiesController;
use App\Http\Controllers\admin\SocialMobilizationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});
Route::prefix('admin')->group(function () {
	Route::controller(AuthController::class)->middleware('guest')->group(function(){
		Route::get('login','login')->name('login');
		Route::post('login_check','login_check')->name('admin.login_check');
	});
	Route::middleware('auth')->group(function(){
		Route::controller(DashboardController::class)->group(function(){
			Route::get('dashboard','index')->name('Dashboard');
			Route::view('Social_Mobilization','admin/Social_Mobilization')->name('Social_Mobilization');
			Route::view('Orientation','admin/Orientation')->name('Social_Mobilization');
			Route::view('Pvt_Bodies','admin/Pvt Bodies')->name('Social_Mobilization');
			Route::view('Coordination','admin/Coordination Meeting Line')->name('Social_Mobilization');
			Route::view('Mass','admin/Mass Media Mid Media')->name('Social_Mobilization');
			Route::view('Orientation_Health','admin/Orientation Health')->name('Social_Mobilization');
			Route::view('Iec','admin/Iec')->name('Social_Mobilization');
			Route::view('Groups_Tracking','admin/Groups Tracking')->name('Social_Mobilization');
		});
		Route::controller(PlaningPlatform::class)->group(function(){
			Route::view('Planing_Platform','admin/Planing_Platform')->name('Planing_Platform');
			Route::post('Planing_platform_save','planing_platform_save')->name('admin.planingPlatformSave');
			Route::post('Sector_meeting','sector_meeting')->name('admin.sectorMeeting');
			Route::post('Nigrani_samiti_meeting','nigrani_samiti_meeting')->name('admin.nigraniSamitiMeeting');
			Route::post('District_communication','district_communication')->name('admin.districtCommunication');
			Route::post('Fortnightly_implementation','fortnightly_implementation')->name('admin.fortnightlyImplementation');
		});
		Route::controller(OrientationController::class)->group(function(){
			Route::view('Orientation','admin/Orientation')->name('admin.Orientation');
			Route::post('Education_department','education_department')->name('admin.educationDepartment');
			Route::post('Panchayati_raj','panchayati_raj')->name('admin.panchayatiRaj');
			Route::post('Minority_deparment','minority_deparment')->name('admin.minorityDeparment');
			Route::post('Ulb_deparment','ulb_deparment')->name('admin.ulbDeparment');
			Route::post('Csr_deparment','csr_deparment')->name('admin.csrDeparment');
		});
		Route::controller(PvtBodiesController::class)->group(function(){
			Route::view('PvtBodies','admin/Pvt Bodies')->name('admin.PvtBodies');
			Route::post('Meeting_IMA','meeting_ima')->name('admin.meetingIMA');
			Route::post('Meeting_Private','meeting_private')->name('admin.meetingPrivate');
			Route::post('Pharmacists_associations','pharmacists_associations')->name('admin.pharmacistsAssociations');
			Route::post('Merchant_association','merchant_association')->name('admin.merchantAssociation');
			Route::post('Others','Others')->name('admin.Others');
		});
		Route::controller(SocialMobilizationController::class)->group(function(){
			Route::view('Social_Mobilization','admin/Social_Mobilization');
   			Route::post('insert-sm-meeting-faith-based','insert_sm_meeting_faith_based')->name('admin.SmMeetingFaithBased');
   			Route::post('insert-sm-meeting-influencers','insert_sm_meeting_influencers')->name('admin.SmMeetingInfluencers');
   			Route::post('insert-sm-meeting-numbers','insert_sm_meeting_numbers')->name('admin.SmMeetingNumbers');
   			Route::post('insert-sm-meeting-ipc','insert_sm_meeting_ipc')->name('admin.SmMeetingIpc');
   			Route::post('insert-sm-meeting-mother-meeting','insert_sm_mother_meeting')->name('admin.SmMeetingMotherMeeting');
   			Route::post('sm-community-meeting','sm_community')->name('admin.SmCommunityMeeting');
   			Route::post('sm-shg-meeting','sm_shg_meeting')->name('admin.SmShgMeeting');
   			Route::post('sm-vulrenable-meeting','sm_vulrenable_meeting')->name('admin.SmVulrenableMeeting');
   			Route::post('sm-excluded-groups','sm_excluded_groups')->name('admin.SmExcludedGroups');
   			Route::post('sm-volunteer-meeting','sm_volunteer_meeting')->name('admin.SmVolunteerMeeting');
		});

	});

});






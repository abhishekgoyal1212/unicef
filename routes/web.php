<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PlaningPlatform;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\OrientationController;
use App\Http\Controllers\admin\PvtBodiesController;
use App\Http\Controllers\admin\SocialMobilizationController;
use App\Http\Controllers\admin\CoordinationController;
use App\Http\Controllers\admin\MassMediaController;
use App\Http\Controllers\admin\OrientationHealthController;
use App\Http\Controllers\admin\GroupsTrackingController;
use App\Http\Controllers\admin\AdminDashboardController;

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
	return view('redirecttologin');
});
	Route::controller(AuthController::class)->middleware('guest')->group(function(){
		Route::get('login','login')->name('login');
		Route::post('login_check','login_check')->name('admin.login_check');
		Route::prefix('admin')->group(function(){
		Route::get('admin-login','login')->name('admin_login');
		});
	});
	Route::prefix('admin')->group(function(){
	Route::middleware(['auth', 'admin'])->group(function(){
	Route::controller(AdminDashboardController::class)->group(function(){
	Route::view('admin-dashboard','admin/admin-dashboard/dashboard')->name('admin.admin_dashboard');
	Route::get('logout','logout')->name('admin.admin.logout');
	});
	});
	});
	
	Route::middleware(['auth', 'user'])->group(function(){
		Route::controller(DashboardController::class)->group(function(){
			// Route::get('dashboard','index')->name('dashboard');
			Route::get('dashboard','index')->name('admin.dashboard');
			Route::get('logout','logout')->name('admin.logout');
			Route::view('Planing_Platform','admin/Planing_Platform')->name('admin.planingPlatform');
			Route::view('Social_Mobilization','admin/Social_Mobilization')->name('admin.socialMobilization');
			Route::view('Orientation','admin/Orientation')->name('admin.Orientation');
			Route::view('Pvt_Bodies','admin/Pvt Bodies')->name('admin.pvtBodies');
			Route::view('Coordination','admin/Coordination Meeting Line')->name('admin.coordinationMeetingLine');
			Route::view('Mass','admin/Mass Media Mid Media')->name('admin.massMediaMidMedia');
			Route::view('Orientation_Health','admin/Orientation Health')->name('admin.orientationHealth');
			Route::view('Iec','admin/Iec')->name('admin.Iec');
			Route::view('Groups_Tracking','admin/Groups Tracking')->name('admin.GroupsTracking');

			Route::get('profile', 'profile')->name('profile');
			Route::post('update-profile', 'update_profile')->name('update_profile');
			Route::post('update-profile-photo', 'update_profile_photo')->name('update_profile_photo');
			Route::post('update-password', 'update_password')->name('update_password');
			Route::post('fetch-graph-data', 'fetch_graph_data')->name('fetch_graph_data');
			Route::post('planning-graph', 'planning_graph')->name('planning_graph');
			Route::post('coordination-graph', 'coordination_graph')->name('coordination_graph');
			Route::post('pvt-bodies-graph', 'pvt_bodies_graph')->name('pvt_bodies_graph');

			Route::post('planning-districts', 'planning_districts')->name('planning_districts');

		});

		Route::controller(PlaningPlatform::class)->group(function(){
			Route::post('Planing_platform_save','planing_platform_save')->name('admin.planingPlatformSave');
			Route::post('Sector_meeting','sector_meeting')->name('admin.sectorMeeting');
			Route::post('Nigrani_samiti_meeting','nigrani_samiti_meeting')->name('admin.nigraniSamitiMeeting');
			Route::post('District_communication','district_communication')->name('admin.districtCommunication');
			Route::post('Fortnightly_implementation','fortnightly_implementation')->name('admin.fortnightlyImplementation');
		});
		Route::controller(OrientationController::class)->group(function(){
			Route::post('Education_department','education_department')->name('admin.educationDepartment');
			Route::post('Panchayati_raj','panchayati_raj')->name('admin.panchayatiRaj');
			Route::post('Minority_deparment','minority_deparment')->name('admin.minorityDeparment');
			Route::post('Ulb_deparment','ulb_deparment')->name('admin.ulbDeparment');
			Route::post('Csr_deparment','csr_deparment')->name('admin.csrDeparment');
		});
		Route::controller(PvtBodiesController::class)->group(function(){
			Route::post('Meeting_IMA','meeting_ima')->name('admin.meetingIMA');
			Route::post('Meeting_Private','meeting_private')->name('admin.meetingPrivate');
			Route::post('Pharmacists_associations','pharmacists_associations')->name('admin.pharmacistsAssociations');
			Route::post('Merchant_association','merchant_association')->name('admin.merchantAssociation');
			Route::post('Others','Others')->name('admin.Others');
		});
		Route::controller(SocialMobilizationController::class)->group(function(){
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
		// Route::controller(IecController::class)->group(function(){
		// 	Route::post('iec_material','iec_material')->name('admin.iecMaterial');
		// 	Route::post('local_iec_material','local_iec_material')->name('admin.localIecMaterial');
		// 	Route::post('Special_iec_material','Special_iec_material')->name('admin.specialIecMaterial');
		// }); 
		Route::controller(CoordinationController::class)->group(function(){
   			Route::post('insert-coordination','insert_coordination')->name('admin.coordination');
		});
		Route::controller(MassMediaController::class)->group(function(){
   			Route::post('mass-media','insert_mass_media')->name('admin.MassMedia');
		});
		Route::controller(OrientationHealthController::class)->group(function(){
   			Route::post('orientation-health','orientation_health')->name('admin.OrientationHealth');
		});
		Route::controller(GroupsTrackingController::class)->group(function(){
   			Route::post('groups-tracking','groups_tracking')->name('admin.GroupsTrackingpost');;
		});
	});








<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\JobLibrary;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    if(Session::has('locked-screen')){
        return redirect()->to(route('lock_screen'));
    }else{
        return redirect()->to(route('login'));
    }
});

//
Route::get('/reset-db',[AdminController::class,'reset_db'])->name('reset_db');
// Here 5 requests allowed in every 1 minute by a single user or session IP.
Route::group(['middleware' => 'throttle:5,1'], function () {
    Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
    Route::post('/authenticate-user-login', [AuthenticationController::class, 'authenticate_process_login'])->name('authenticate_process_login');
});
Route::get('reset-password-email/{email?}',[AuthenticationController::class,'reset_password'])->name('reset_password');
Route::get('reset-password-send/{email}',[AuthenticationController::class,'send_reset_mail'])->name('send_reset_mail');
Route::get('change-password-reset',[AuthenticationController::class,'change_reset_password'])->name('change_reset_password');
Route::get('log-out-user',[AuthenticationController::class,'log_out'])->name('log_out');
Route::get('/switch-mode', [AuthenticationController::class, 'switch_mode'])->name('switch_mode');
Route::get('/switch-mode-to-light-mode', [AuthenticationController::class, 'switch_mode_to_light'])->name('switch_mode_to_light');
Route::get('/admin-dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('lock-screen',[AdminController::class,'lock_screen'])->name('lock_screen');
Route::post('lock-screen-open-request',[AdminController::class,'lock_screen_open_request'])->name('lock_screen_open_request');
// Route::match(['get', 'post'], '/botman', 'BotManController@handle');
// Route::get('/botman',[AdminController::class,'handle']);




// Akash works
Route::get('add-jobs',[AdminController::class,'add_jobs'])->name('add_jobs');
Route::post('add-jobs',[AdminController::class,'add_jobs_post'])->name('add_jobs_post');
Route::get('job-questionaire/{jobid?}',[AdminController::class,'job_questionaire'])->name('job_questionaire');
Route::post('job-questionaire/add',[AdminController::class,'job_questionaire_post'])->name('job_questionaire_post');
Route::post('job-questionaire/templates/add',[AdminController::class,'job_questionaire_templates_post'])->name('job_questionaire_templates_post');
Route::get('job-attachment-scorecard/{jobid}',[AdminController::class,'job_attachment_scorecard'])->name('job_attachment_scorecard');
Route::post('job-attachment-scorecard-post',[AdminController::class,'job_attachment_scorecard_post'])->name('job_attachment_scorecard_post');
Route::post('job-attachment-scorecard/templates/add',[AdminController::class,'attachment_scorecard_templates_post'])->name('attachment_scorecard_templates_post');
Route::get('job-hiring-team/{jobid}',[AdminController::class,'job_hiring_team'])->name('job_hiring_team');
Route::post('job-hiring-team-post/',[AdminController::class,'job_hiring_team_post'])->name('job_hiring_team_post');
Route::get('job-share-social/{jobid}',[AdminController::class,'job_share_social'])->name('job_share_social');
Route::get('job-advertise-social/{jobid}',[AdminController::class,'job_advertise_social'])->name('job_advertise_social');

//Manage Jobs All Routes [required middleware : Auth , AuthLockScreen ,JobsCloud]
Route::get('manage-jobs',[AdminController::class,'manage_jobs'])->name('manage_jobs');
Route::get('/view-job-details/{jobid}',[AdminController::class,'view_job_details'])->name('view_job_details');
Route::get('/view-job-details/{jobid}/{ctab}',[AdminController::class,'view_job_details_tab'])->name('view_job_details_tab');
Route::get('/view-job-details/{jobid}/{ctab}/{filter?}',[ApplicantController::class,'view_job_details_smart_filter'])->name('view_job_details_smart_filter');
Route::post('add-single-candidates',[AdminController::class,'add_single_candidates'])->name('add_single_candidates');
Route::get('add-candidate-from-excel/{jobid}',[AdminController::class,'add_candidate_from_excel'])->name('add_candidate_from_excel');
Route::post('process-candidate-from-excel/',[AdminController::class,'process_candidate_from_excel'])->name('process_candidate_from_excel');
Route::post('excel-db-import/',[AdminController::class,'excel_db_import'])->name('excel_db_import');
Route::get('add-candidate-from-resume/{jobid}',[AdminController::class,'add_candidate_from_resume'])->name('add_candidate_from_resume');
Route::post('parse-candidate-from-resume/',[AdminController::class,'parse_candidate_from_resume'])->name('parse_candidate_from_resume');
Route::get('view-parsed-candidate-details/{jobid}/{jobloop}',[AdminController::class,'view_parsed_candidate_details'])->name('view_parsed_candidate_details');
Route::get('delete-resume-parsed/{canid}/{jobloop}',[AdminController::class,'delete_resume_parsed'])->name('delete_resume_parsed');
Route::get('discard-all-resume-parsed/{jobloop}',[AdminController::class,'discard_all_resume_parsed'])->name('discard_all_resume_parsed');
Route::post('parse-pdf',[AdminController::class,'parse_pdf'])->name('parse_pdf');
Route::get('search-from-database/{jobid}',[AdminController::class,'search_from_database'])->name('search_from_database');
Route::get('searched-result-from-database/{jobid}',[AdminController::class,'search_result_from_database'])->name('search_result_from_database');
Route::get('view-candidate/{cankey}',[AdminController::class,'view_candidate'])->name('view_candidate');
Route::get('view-pool-candidate/{jobcode}/{screenid}/{innertab}/{key?}',[AdminController::class,'view_pool_candidate'])->name('view_pool_candidate');
Route::get('view-pool-candidate-call/{screenid}/{key?}',[AdminController::class,'view_pool_candidate_call'])->name('view_pool_candidate_call');
Route::get('view-pool-candidate-call-jdshare/{screenid}/{key?}',[AdminController::class,'view_pool_candidate_call_jdshare'])->name('view_pool_candidate_call_jdshare');
// |--------------------------------------------------------------------------
// | Deletion Candidates Web Routes   view_pool_candidate_call
// |--------------------------------------------------------------------------
Route::get('remove-candidate/{canid}',[AdminController::class,'remove_candidate'])->name('remove_candidate');
Route::get('drop-candidate/{canid}',[AdminController::class,'drop_candidate'])->name('drop_candidate');

Route::post('upload-resume',[AdminController::class,'upload_resume'])->name('upload_resume');
Route::post('update-resume-screening',[AdminController::class,'update_resume_screening'])->name('update_resume_screening');
Route::post('update-resume-screening-ajax',[AdminController::class,'update_resume_screening_ajax'])->name('update_resume_screening_ajax');
// |--------------------------------------------------------------------------
// | Call Candidates Modal Request Web Routes  
// |--------------------------------------------------------------------------
Route::post('update-screen-candidate/',[AdminController::class,'call_screening_modal_post'])->name('call_screening_modal_post');
Route::post('call-validate-candidate',[AdminController::class,'call_validate_modal_post'])->name('call_validate_modal_post');
Route::get('call-candidate-screening/{screenid}/{jobid}',[AdminController::class,'call_candidate_screening'])->name('call_candidate_screening');
Route::post('call-candidate-screening/',[AdminController::class,'call_candidate_screening_post'])->name('call_candidate_screening_post');
Route::get('verify-candidate-email/{jobid}/{email}/{screenid}',[AdminController::class,'verify_candidate_email'])->name('verify_candidate_email');
Route::get('candidate-quality-approve-check/{appkey}/{jobid}',[AdminController::class,'candidate_quality_approve_check'])->name('candidate_quality_approve_check');
Route::post('candidate-quality-approve-check/',[AdminController::class,'candidate_quality_approve_check_post'])->name('candidate_quality_approve_check_post');
Route::get('applicant-quality-reject/{jobid}/{screenid}',[AdminController::class,'applicant_quality_reject'])->name('applicant_quality_reject');
Route::get('applicant-quality-duplicate-reject/{jobid}/{screenid}',[AdminController::class,'applicant_quality_duplicate'])->name('applicant_quality_duplicate');
Route::get('view-applicant/{applikey}',[AdminController::class,'view_applicant'])->name('view_applicant');
Route::get('view-applicant-update-submittal/{applikey}',[AdminController::class,'view_applicant_update_submittal'])->name('view_applicant_update_submittal');

// |--------------------------------------------------------------------------
// | Applicant Controller Request Web Routes  
// |--------------------------------------------------------------------------
Route::post('update-submitted-applicant-pool',[ApplicantController::class,'update_submitted_applicant_pool'])->name('update_submitted_applicant_pool');
Route::get('view-applicant-update-progress/{applikey}',[ApplicantController::class,'view_applicant_update_progress'])->name('view_applicant_update_progress');
Route::post('view-applicant-update-progress-post',[ApplicantController::class,'view_applicant_update_progress_post'])->name('view_applicant_update_progress_post');
Route::get('update-hiring-pool-appeared/{applikey}',[ApplicantController::class,'update_hiring_pool_appeared'])->name('update_hiring_pool_appeared');
Route::post('update-hiring-pool-appeared-post',[ApplicantController::class,'update_hiring_pool_appeared_post'])->name('update_hiring_pool_appeared_post');
Route::get('view-applicant-update-selected/{applikey}',[ApplicantController::class,'view_applicant_update_selected'])->name('view_applicant_update_selected');
Route::post('view-applicant-update-selected-post',[ApplicantController::class,'view_applicant_update_selected_post'])->name('view_applicant_update_selected_post');
Route::post('update-joined-abscond-last-working',[ApplicantController::class,'update_joined_abscond_last_working'])->name('update_joined_abscond_last_working');
Route::post('update-joined-update-details',[ApplicantController::class,'update_joined_update_details'])->name('update_joined_update_details');

// Job library Category Add Route 
Route::get('jd-library',[JobLibrary::class,'show'])->name('show');
Route::post('jd-library',[JobLibrary::class,'submit_data'])->name('submit_data');
Route::get('fetch-library-sub-category/{catid}',[JobLibrary::class,'fetch_library_sub_category'])->name('fetch_library_sub_category');
Route::get('fetch-library-content/{sbcid}',[JobLibrary::class,'fetch_library_content'])->name('fetch_library_content');
Route::get('fetch-library-content-init/{sbcid}',[JobLibrary::class,'fetch_library_content_init'])->name('fetch_library_content_init');
Route::get('search-sub-category/{search}',[JobLibrary::class,'search_sub_category'])->name('search_sub_category');
Route::get('get-parent-category/{parentid}',[JobLibrary::class,'get_parent_category'])->name('get_parent_category');

//view job smart filteration route
Route::post('candidate-smart-filteration',[ApplicantController::class,'candidate_smart_filteration'])->name('candidate_smart_filteration');





// Raman works 
// |--------------------------------------------------------------------------
// | Add Organisation Side Menu Web Routes  
// |--------------------------------------------------------------------------
route::get('/organisation',[AdminController::class,'organisation'])->name('organisation');
route::get('/add-organisation',[AdminController::class,'add_organisation'])->name('add_organisation1');
route::post('/add-organisation',[AdminController::class,'add_organisation_post'])->name('add_organisation');
route::get('/edit-organisation/{id}',[AdminController::class,'edit_organisation'])->name('edit_organisation');
route::post('/edit-organisation-post/{id}',[AdminController::class,'edit_organisation_post'])->name('update_organisation');
route::delete('/delete-organisation/{id}',[AdminController::class,'delete_organisation'])->name('delete_organisation');
route::get('/view-company-profile/{id}',[AdminController::class,'company_profile'])->name('company_profile');
route::get('/change-company-status/{id}',[AdminController::class,'change_company_status'])->name('change_company_status');
route::post('/add_agreement/{id}',[AdminController::class,'add_agreement'])->name('add_agreement');
// |--------------------------------------------------------------------------
// | Add contacts Side Menu Web Routes 
// |--------------------------------------------------------------------------
route::get('/contacts',[AdminController::class,'contacts'])->name('contacts');
route::get('/add-contacts',[AdminController::class,'add_contacts'])->name('add_contacts1');
route::post('/add-contacts',[AdminController::class,'add_contacts_post'])->name('add_contacts');
route::get('/edit-contacts/{id}',[AdminController::class,'edit_contacts'])->name('edit_contacts');
route::post('/edit-contacts/{id}',[AdminController::class,'edit_contacts_post'])->name('edit_contacts_post');
// |--------------------------------------------------------------------------
// | Add Location Side Menu Web Routes  
// |--------------------------------------------------------------------------
route::get('/location',[AdminController::class,'location'])->name('location');
route::get('/add-location',[AdminController::class,'add_location'])->name('add_location1');
route::post('/add-location',[AdminController::class,'add_location_post'])->name('add_location');
route::post('/add-location-ajax',[AdminController::class,'add_location_ajax'])->name('add_location_ajax');
route::get('/edit-location/{id}',[AdminController::class,'edit_locations'])->name('edit_locations');
route::post('/edit-location/{id}',[AdminController::class,'edit_location_post'])->name('edit_location_post');
route::get('edit-location/get-states-by-country/{id}',[AdminController::class,'getState_addLocation'])->name('get_states_by_country_edit');
// |--------------------------------------------------------------------------
// | Settings Side Menu Web Routes 
// |--------------------------------------------------------------------------
route::get('/setting',[AdminController::class,'setting'])->name('setting');

route::get('/manage-account',[AdminController::class,'manage_account'])->name('manage_account');
route::post('/manage-account-post',[AdminController::class,'manage_account_post'])->name('manage_account_post');

route::get('/manage-users',[AdminController::class,'manage_users'])->name('manage_users');
route::post('/add-user',[AdminController::class,'manage_users_post'])->name('manage_users_post');
route::get('/user-profile/{id}',[AdminController::class,'view_user_profile'])->name('view_profile');
route::get('/edit-profile/{id}',[AdminController::class,'edit_profile'])->name('edit_profile');

route::get('/manage-notification',[AdminController::class,'manage_notification'])->name('manage_notification');

route::get('/manage-role',[AdminController::class,'manage_role'])->name('manage_role');

route::get('/manage-email-template',[AdminController::class,'manage_template'])->name('manage_template');


// |--------------------------------------------------------------------------
// | Modal Routes
// |--------------------------------------------------------------------------
route::get('/get-company-detail/{id}',[AdminController::class,'company_modal'])->name('company_modal');

route::get('/get-contact-detail/{id}',[AdminController::class,'contact_modal'])->name('contact_modal');

route::get('/get-location-detail/{id}',[AdminController::class,'location_modal'])->name('location_modal');

route::get('/add-agreement-detail/{id}',[AdminController::class,'agreement_modal'])->name('agreement_modal');

route::get('/get-agreement-detail/{id}',[AdminController::class,'get_agreement_modal'])->name('get_agreement_modal');

route::post('/agreement_modal_post/{id}',[AdminController::class,'agreement_modal_post'])->name('agreement_modal_post');

route::get('/get-states-by-country/{id}',[AdminController::class,'getState_addLocation'])->name('get_states_by_country');


route::get('udpate-demo',[AdminController::class,'demo_update'])->name('demo_update');



Route::get('/show-password',function(){
    echo md5("Sarit@123");
});
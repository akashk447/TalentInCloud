<?php

namespace App\Http\Controllers;

use App\Models\TicJobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Client;
use App\Models\ClientSetting;
use App\Models\Contract;
use App\Models\demo;
use App\Models\Location;
use App\Models\TicCandidateDuplicateLog;
use App\Models\TicCandidateEducationDetials;
use App\Models\TicCandidateHistory;
use App\Models\TicCandidateMaster;
use App\Models\TicCandidateApplicant;
use App\Models\TicCandiateSnooze;
use App\Models\TicCandidateScreening;
use App\Models\TicCandidateCallSummary;
use App\Models\TicCandidateCallConnectedSummary;
use App\Models\TicCandidateSourceSummary;
use App\Models\TicCloud;
use App\Models\TicInterview;
use App\Models\TicCompanyJobsHistory;
use App\Models\TicQuestionnaireAnswer;
use App\Models\TicQuestionnaireQuestions;
use App\Models\TicQuestionnaireQuestionSet;
use App\Models\TicScorecard;
use App\Models\TicScorecardSet;
use App\Models\JobCategory;
use App\Models\JobContent;
use App\Models\TicCandidateSnooze;
use Exception as GlobalException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use Symfony\Component\Console\Input\Input;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class ApplicantController extends Controller
{
    public function lock_screen()
    {
        if (Auth::check()) {
            Session::put('locked-screen', 'yes');
            return view('auth.lock_screen');
        } else {
            return view('auth.lock_screen');
        }
    }
    public function candidate_smart_filteration(Request $tic)
    {

        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $smart_filter = false;
            $job_id = $tic->filter_job_id;
            $query = $tic->smart_filter_name;
            $ctab = "pool";
            if (isset($tic->smart_filter_type)) {
                $smart_filter = true;
            }
            if ($smart_filter) {

                $get_valid_job = TicJobs::where('job_id', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
                if ($get_valid_job) {
                    return redirect()->to(route('view_job_details_smart_filter', ['jobid' => $get_valid_job->job_code, 'ctab' => "pool", 'filter' => $query]));
                }
            } else {
                $get_valid_job = TicJobs::where('job_id', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
                if ($get_valid_job) {
                    return redirect()->to(route('view_job_details_smart_filter', ['jobid' => $get_valid_job->job_code, 'ctab' => "pool", 'filter' => $query]));
                }
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_job_details_smart_filter($job_id, $ctab, $filter = "")
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();



            if ($get_valid_job) {
                $get_sourced_candidates = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $job_id)
                    ->where('recruiter', Auth::user()->id)
                    ->Where('candidate_name', 'like', '%' . $filter . '%')
                    ->orWhere('candidate_email', 'like', '%' . $filter . '%')
                    ->orWhere('candidate_phone', 'like', '%' . $filter . '%')
                    ->orWhere('screen_status', 'like', '%' . $filter . '%')
                    ->Paginate(20);
                $get_all_job_applicants = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $job_id)
                    ->where('recruiter', Auth::user()->id)
                    ->Where('candidate_name', 'like', '%' . $filter . '%')
                    ->orWhere('candidate_email', 'like', '%' . $filter . '%')
                    ->orWhere('candidate_phone', 'like', '%' . $filter . '%')
                    ->orWhere('applicant_status', 'like', '%' . $filter . '%')
                    ->get();
                return view('admin.pages.view_job_details')->with(compact('job_id', 'get_sourced_candidates', 'ctab', 'get_all_job_applicants', 'get_valid_job', 'filter'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function update_submitted_applicant_pool(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        $profile_status = '';
        if (Auth::check()) {
            // Vakratunda mahakaaya Suryakoti samaprabha Nirvighnam kuru me deva Sarvakaaryesu sarvadaa
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->app_key)
                ->first();

            $get_job_details = get_job_details($get_applicant_details->job_id);
            // dd($get_job_details);
            if ($tic->profile_status == 'Submitted Profile Shortlisted') {
                $profile_status = 'Submitted Profile Shortlisted';
            }
            if ($tic->profile_status == 'Availability Required') {
                $profile_status = $tic->profile_status . ' - ' . $tic->availablity;
            }
            if ($tic->profile_status == 'Schedule Pending') {
                $profile_status = $tic->profile_status . ' - ' . $tic->availablity;
            }
            if ($tic->profile_status == 'Assessments') {
                $profile_status = $tic->profile_status . ' - ' . $tic->assessment;
            }
            if ($tic->profile_status == 'Schedule Interview') {
                $profile_status = $tic->profile_status . ' - ' . $tic->interview_type;
            }
            if ($tic->profile_status == 'Interview Appeared') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Interview Rejected') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Interview Cleared') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Update Information') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Profile Duplicate') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Profile Rejected') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Did Not attend (Not Interested)') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'On Hold') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'No further Action') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Snoozed') {
                $profile_status = $tic->profile_status;
            }
            $priority = $tic->priority;

            if ($profile_status == 'Assessments - Test Initiated') {
                $ass_sch_time = $tic->assessment_sch_time;
                $ass_type = $tic->assessment_type;
                $ass_round = $tic->assessment_round;
                $ass_service = $tic->assessment_services;
                $ass_test_initiated_mail = $tic->test_initiated_mail;
                if (isset($tic->test_initiated_date)) {
                    $initiated_date = $tic->test_initiated_date;
                } else {
                    $initiated_date = $tic->test_initiated_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($initiated_date));
                $h_notes = $tic->notes . ' || Assessment Initiated for: ' . $disp_pnl_date . ' At : ' . $ass_sch_time . ' (Assessment Type: ' . $tic->assessment_type . ' ' . $tic->assessment_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "sch",
                        'distbut_id' => "0",
                        'scheduled_date' => $initiated_date,
                        'scheduled_time' => $ass_sch_time,
                        'interview_ass_type' => $ass_type,
                        'interview_ass_round' => $ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Completed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Passed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed & Passed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Failed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed & Failed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Schedule Interview - Offline') {
                $interview_off_start_time = $tic->interview_off_start_time;
                $interview_duration_offline = $tic->interview_duration_offline;
                $interview_round_offline = $tic->interview_round_offline;
                $interview_location_offline = $tic->interview_location_offline;
                $interviewer_name_offline = $tic->interviewer_name_offline;
                $interviewer_kit_offline = $tic->interviewer_kit_offline;
                $sch_interview_offline_link = $tic->sch_interview_offline_link;
                if (isset($tic->interview_sch_offline_date)) {
                    $interview_offline_date = $tic->interview_sch_offline_date;
                } else {
                    $interview_offline_date = $tic->interview_sch_offline_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_offline_date));
                $h_notes = $tic->notes . ' || Interview Scheduled on: ' . $disp_pnl_date . ' At : ' . $interview_off_start_time . ' (Interview Type: Offline ' . $interview_round_offline . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'scheduled_date' => $interview_offline_date,
                        'scheduled_time' => $interview_off_start_time,
                        'interview_ass_round' => $interview_round_offline,
                        'interview_location' => $interview_location_offline,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $addorupdate_interview_details = TicInterview::updateOrCreate(
                    [
                        'applicant_id' => $get_applicant_details->applicant_id
                    ],
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'interview_type' => "Online",
                        'interview_date' => $interview_offline_date,
                        'interview_time' => $interview_off_start_time,
                        'interview_duration' => $interview_duration_offline,
                        'interview_round' => $interview_round_offline,
                        'interviewers' => $interviewer_name_offline,
                        'interview_kit' => $interviewer_kit_offline,
                        'scheduled_by' => Auth::user()->id,
                        'status' => "Scheduled",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Schedule Interview - Online') {
                $interview_on_start_time = $tic->interview_on_start_time;
                $interview_duration_online = $tic->interview_duration_online;
                $interview_round_online = $tic->interview_round_online;
                $video_call_online = $tic->video_call_online;
                $interviewer_name_online = $tic->interviewer_name_online;
                $interviewer_kit_online = $tic->interviewer_kit_online;
                $sch_interview_online_link = $tic->sch_interview_online_link;
                if (isset($tic->interview_sch_online_date)) {
                    $interview_online_date = $tic->interview_sch_online_date;
                } else {
                    $interview_online_date = $tic->interview_sch_online_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_online_date));
                $h_notes = $tic->notes . ' || Interview Scheduled on: ' . $disp_pnl_date . ' At : ' . $interview_on_start_time . ' (Interview Type: Online ' . $interview_round_online . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'scheduled_date' => $interview_online_date,
                        'scheduled_time' => $interview_on_start_time,
                        'interview_ass_type' =>  $tic->interview_type,
                        'interview_ass_round' => $interview_round_online,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                        // insert in tic_interviews table here 

                    ]);

                $addorupdate_interview_details = TicInterview::updateOrCreate(
                    [
                        'applicant_id' => $get_applicant_details->applicant_id
                    ],
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'interview_type' => "Online",
                        'interview_date' => $interview_online_date,
                        'interview_time' => $interview_on_start_time,
                        'interview_duration' => $interview_duration_online,
                        'interview_round' => $interview_round_online,
                        'vc_services' => $video_call_online,
                        'interviewers' => $interviewer_name_online,
                        'interview_kit' => $interviewer_kit_online,
                        'scheduled_by' => Auth::user()->id,
                        'status' => "Scheduled",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Interview Appeared') {
                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_type' =>  $interview_appeared_type,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Interview Rejected') {
                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                $h_notes = $tic->notes . ' || Interview Rejected on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Interview Cleared') {
                $interview_cleared_round = $tic->interview_cleared_round;
                $interview_cleared_mail_link = $tic->interview_cleared_mail_link;
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_ass_round' => $interview_cleared_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Update Information') {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } else {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
                if ($profile_status == 'Snoozed') {
                    if (isset($tic->snooze_date)) {
                        $snooze_date = $tic->snooze_date;
                    } else {
                        $snooze_date = $tic->snooze_date1;
                    }
                    $add_snooze = TicCandidateSnooze::create(
                        [
                            'userid' => Auth::user()->id,
                            'recruiter' => Auth::user()->name,
                            'activity_date' => today_date(),
                            'activity_time' => today_time(),
                            'applicant_id' => $get_applicant_details->applicant_id,
                            'snooze_dt' => $snooze_date
                        ]
                    );
                }
            }
            // Mail SMS Whatsapp included here 
            // fjsgdklfjgskjgsdjgskd
            // fjsgdklfjgskjgsdjgskd
            // fjsgdklfjgskjgsdjgskd
            // fjsgdklfjgskjgsdjgskd
            // fjsgdklfjgskjgsdjgskd
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->app_key)
                ->first();

            return  redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => 'submitted']));
        } else {
            return redirect('login')->withSuccess('You are not allowed to access');
        }
    }
    public function view_applicant_update_progress($applicant_key)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $applicant_key)
                ->first();
            $get_jobowner_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_applicant_details->job_id)
                ->first();
            $get_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $get_applicant_details->candidate_id)
                ->where('screen_id', $get_applicant_details->screen_id)
                ->orderBy('candidate_history_id', 'DESC')
                ->get();
            return view('admin.pages.update_inprogress_applicant')->with(compact('get_applicant_details', 'get_jobowner_details', 'get_history'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_applicant_update_progress_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->app_key)
                ->first();

            $get_job_details = get_job_details($get_applicant_details->job_id);
            $priority = $tic->priority;
            if ($tic->profile_status == 'Reschedule Interview') {
                $profile_status = $tic->profile_status . ' - ' . $tic->reschedule_type;
            } elseif ($tic->profile_status == 'Availability Required') {
                $profile_status = $tic->profile_status . ' - ' . $tic->availablity;
            } elseif ($tic->profile_status == 'Schedule Pending') {
                $profile_status = $tic->profile_status . ' - ' . $tic->availablity;
            } elseif ($tic->profile_status == 'Assessments') {
                $profile_status = $tic->profile_status . ' - ' . $tic->assessment;
            } else {
                $profile_status = $tic->profile_status;
            }
            if ($profile_status == 'Reschedule Interview - Online') {
                //update code over here
                $interview_on_start_time = $tic->interview_on_start_time;
                $interview_duration_online = $tic->interview_duration_online;
                $interview_round_online = $tic->interview_round_online;
                $video_call_online = $tic->video_call_online;
                $interviewer_name_online = $tic->interviewer_name_online;
                $interviewer_kit_online = $tic->interviewer_kit_online;
                $sch_interview_online_link = $tic->sch_interview_online_link;
                if (isset($tic->interview_sch_online_date)) {
                    $interview_online_date = $tic->interview_sch_online_date;
                } else {
                    $interview_online_date = $tic->interview_sch_online_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_online_date));
                $h_notes = $tic->notes . ' || Interview Re-Scheduled on: ' . $disp_pnl_date . ' At : ' . $interview_on_start_time . ' (Interview Type: Online ' . $interview_round_online . ')';
                //reschedule count code over here
                $last_reschdule_count = $get_applicant_details->rescheduled_count;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'scheduled_date' => $interview_online_date,
                        'scheduled_time' => $interview_on_start_time,
                        'interview_ass_type' =>  $tic->interview_type,
                        'interview_ass_round' => $interview_round_online,
                        'rescheduled_count' => $last_reschdule_count++,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);

                $addorupdate_interview_details = TicInterview::updateOrCreate(
                    [
                        'applicant_id' => $get_applicant_details->applicant_id
                    ],
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'interview_type' => "Online",
                        'interview_date' => $interview_online_date,
                        'interview_time' => $interview_on_start_time,
                        'interview_duration' => $interview_duration_online,
                        'interview_round' => $interview_round_online,
                        'vc_services' => $video_call_online,
                        'interviewers' => $interviewer_name_online,
                        'interview_kit' => $interviewer_kit_online,
                        'scheduled_by' => Auth::user()->id,
                        'status' => "Scheduled",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Reschedule Interview - Offline') {
                $last_reschdule_count = $get_applicant_details->rescheduled_count;
                $interview_off_start_time = $tic->interview_off_start_time;
                $interview_duration_offline = $tic->interview_duration_offline;
                $interview_round_offline = $tic->interview_round_offline;
                $interview_location_offline = $tic->interview_location_offline;
                $interviewer_name_offline = $tic->interviewer_name_offline;
                $interviewer_kit_offline = $tic->interviewer_kit_offline;
                $sch_interview_offline_link = $tic->sch_interview_offline_link;
                if (isset($tic->interview_sch_offline_date)) {
                    $interview_offline_date = $tic->interview_sch_offline_date;
                } else {
                    $interview_offline_date = $tic->interview_sch_offline_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_offline_date));
                $h_notes = $tic->notes . ' || Interview Re-Scheduled on: ' . $disp_pnl_date . ' At : ' . $interview_off_start_time . ' (Interview Type: Offline ' . $interview_round_offline . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'scheduled_date' => $interview_offline_date,
                        'scheduled_time' => $interview_off_start_time,
                        'interview_ass_round' => $interview_round_offline,
                        'interview_location' => $interview_location_offline,
                        'rescheduled_count' => $last_reschdule_count++,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $addorupdate_interview_details = TicInterview::updateOrCreate(
                    [
                        'applicant_id' => $get_applicant_details->applicant_id
                    ],
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'interview_type' => "Online",
                        'interview_date' => $interview_offline_date,
                        'interview_time' => $interview_off_start_time,
                        'interview_duration' => $interview_duration_offline,
                        'interview_round' => $interview_round_offline,
                        'interviewers' => $interviewer_name_offline,
                        'interview_kit' => $interviewer_kit_offline,
                        'scheduled_by' => Auth::user()->id,
                        'status' => "Scheduled",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Initiated') {
                $ass_sch_time = $tic->assessment_sch_time;
                $ass_type = $tic->assessment_type;
                $ass_round = $tic->assessment_round;
                $ass_service = $tic->assessment_services;
                $ass_test_initiated_mail = $tic->test_initiated_mail;
                if (isset($tic->test_initiated_date)) {
                    $initiated_date = $tic->test_initiated_date;
                } else {
                    $initiated_date = $tic->test_initiated_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($initiated_date));
                $h_notes = $tic->notes . ' || Assessment Initiated for: ' . $disp_pnl_date . ' At : ' . $ass_sch_time . ' (Assessment Type: ' . $tic->assessment_type . ' ' . $tic->assessment_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "sch",
                        'distbut_id' => "0",
                        'scheduled_date' => $initiated_date,
                        'scheduled_time' => $ass_sch_time,
                        'interview_ass_type' => $ass_type,
                        'interview_ass_round' => $ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Completed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Passed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed & Passed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Failed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed & Failed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Interview Appeared') {


                if ($tic->interview_status == "Shortlisted") {
                    $profile_status = $tic->interview_status . ' - ' . $tic->next_interview_type;
                } elseif ($tic->interview_status == "Selected") {
                    $profile_status = $tic->interview_status . ' - ' . $tic->documentation_type;
                } elseif ($tic->interview_status == "Offered") {
                    $profile_status = $tic->offered_released_type;
                } else {
                    $profile_status = $tic->interview_status;
                }
                // echo $profile_status;
                if ($profile_status == "Shortlisted - Online") {
                    $interview_on_start_time = $tic->next_interview_on_start_time;
                    $interview_duration_online = $tic->next_interview_duration_online;
                    $interview_round_online = $tic->next_interview_round_online;
                    $video_call_online = $tic->next_video_call_online;
                    $interviewer_name_online = $tic->next_interviewer_name_online;
                    $interviewer_kit_online = $tic->next_interviewer_kit_online;
                    $sch_interview_online_link = $tic->next_sch_interview_online_link;
                    if (isset($tic->next_interview_sch_online_date)) {
                        $interview_online_date = $tic->next_interview_sch_online_date;
                    } else {
                        $interview_online_date = $tic->next_interview_sch_online_date1;
                    }
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }
                    $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_online_date));
                    $sl_note = ' || Next Interview Scheduled on ' . $disp_pnl_date . ' At: ' . $interview_on_start_time . ' (Interview Type: Online - ' . $interview_round_online . ')';
                    $h_notes = $tic->notes . ' (Interview Attended on : ' . $interview_appeared_date . ' At: ' . $tic->interview_appeared_time . ' Taken by: ' . $tic->interview_appeared_taken_by . ' ' . $sl_note . ')';
                    //reschedule count code over here
                    $last_reschdule_count = $get_applicant_details->rescheduled_count;
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => $priority,
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'scheduled_date' => $interview_online_date,
                            'scheduled_time' => $interview_on_start_time,
                            'interview_ass_type' =>  $tic->interview_type,
                            'interview_ass_round' => $interview_round_online,
                            'rescheduled_count' => $last_reschdule_count++,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);

                    $addorupdate_interview_details = TicInterview::updateOrCreate(
                        [
                            'applicant_id' => $get_applicant_details->applicant_id
                        ],
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'interview_type' => "Online",
                            'interview_date' => $interview_online_date,
                            'interview_time' => $interview_on_start_time,
                            'interview_duration' => $interview_duration_online,
                            'interview_round' => $interview_round_online,
                            'vc_services' => $video_call_online,
                            'interviewers' => $interviewer_name_online,
                            'interview_kit' => $interviewer_kit_online,
                            'scheduled_by' => Auth::user()->id,
                            'status' => "Scheduled",
                            'date' => today_date(),
                            'time' => today_time(),
                            'ip' => get_client_ip(),
                            'browser' => get_client_browser(),
                        ]
                    );
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Shortlisted - Offline") {
                    $interview_off_start_time = $tic->next_interview_off_start_time;
                    $interview_duration_offline = $tic->next_interview_duration_offline;
                    $interview_round_offline = $tic->next_interview_round_offline;
                    $interview_location_offline = $tic->next_interview_location_offline;
                    $interviewer_name_offline = $tic->next_interviewer_name_offline;
                    $interviewer_kit_offline = $tic->next_interviewer_kit_offline;
                    $sch_interview_offline_link = $tic->next_sch_interview_offline_link;
                    if (isset($tic->next_interview_sch_offline_date)) {
                        $interview_offline_date = $tic->next_interview_sch_offline_date;
                    } else {
                        $interview_offline_date = $tic->next_interview_sch_offline_date1;
                    }
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }
                    $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_offline_date));
                    $sl_note = ' || Next Interview Scheduled on ' . $disp_pnl_date . ' At: ' . $interview_off_start_time . ' (Interview Type: Offline - ' . $interview_round_offline . ')';
                    $h_notes = $tic->notes . ' (Interview Attended on : ' . $tic->$interview_appeared_date . ' At: ' . $tic->interview_appeared_time . ' Taken by: ' . $tic->interview_appeared_taken_by . ' ' . $sl_note . ')';
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => $priority,
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'scheduled_date' => $interview_offline_date,
                            'scheduled_time' => $interview_off_start_time,
                            'interview_ass_round' => $interview_round_offline,
                            'interview_location' => $interview_location_offline,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $addorupdate_interview_details = TicInterview::updateOrCreate(
                        [
                            'applicant_id' => $get_applicant_details->applicant_id
                        ],
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'interview_type' => "Online",
                            'interview_date' => $interview_offline_date,
                            'interview_time' => $interview_off_start_time,
                            'interview_duration' => $interview_duration_offline,
                            'interview_round' => $interview_round_offline,
                            'interviewers' => $interviewer_name_offline,
                            'interview_kit' => $interviewer_kit_offline,
                            'scheduled_by' => Auth::user()->id,
                            'status' => "Scheduled",
                            'date' => today_date(),
                            'time' => today_time(),
                            'ip' => get_client_ip(),
                            'browser' => get_client_browser(),
                        ]
                    );
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Selected - For Documentation") {

                    $interview_appeared_time = $tic->interview_appeared_time;
                    $interview_appeared_type = $tic->interview_appeared_type;
                    $interview_appeared_round = $tic->interview_appeared_round;
                    $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                    $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }
                    $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                    $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ')';
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => "Normal",
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'attn_status' => "Yes",
                            'interview_attn_dt' => $interview_appeared_date,
                            'interview_attn_time' => $interview_appeared_time,
                            'interview_ass_type' =>  $interview_appeared_type,
                            'interview_ass_round' => $interview_appeared_round,
                            'interview_taken_by' => $interview_appeared_taken_by,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Selected - For Offer") {
                    $interview_appeared_time = $tic->interview_appeared_time;
                    $interview_appeared_type = $tic->interview_appeared_type;
                    $interview_appeared_round = $tic->interview_appeared_round;
                    $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                    $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }
                    $offered_position = $tic->offered_position;
                    $offered_ctc = $tic->offered_ctc;
                    $offered_exp_doj = $tic->offered_exp_doj;
                    $documentation_link = $tic->documentation_link;
                    $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                    $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ')';
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => "Normal",
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'attn_status' => "Yes",
                            'interview_attn_dt' => $interview_appeared_date,
                            'interview_attn_time' => $interview_appeared_time,
                            'interview_ass_type' =>  $interview_appeared_type,
                            'interview_ass_round' => $interview_appeared_round,
                            'interview_taken_by' => $interview_appeared_taken_by,
                            'offer_position' => $offered_position,
                            'offer_ctc' => $offered_ctc,
                            'exp_doj' => $offered_exp_doj,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Offer Released") {
                    $interview_appeared_time = $tic->interview_appeared_time;
                    $interview_appeared_type = $tic->interview_appeared_type;
                    $interview_appeared_round = $tic->interview_appeared_round;
                    $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                    $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }
                    $offered_position = $tic->offer_rel_position;
                    $offered_ctc = $tic->offer_rel_ctc;
                    $offered_exp_doj = $tic->offer_rel_exp_doj;
                    $offered_released_link = $tic->offered_released_link;
                    $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                    $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Expected Date of Joining : $offered_exp_doj ";
                    $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ' ' . $doj_notes . ')';
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => $priority,
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'attn_status' => "Yes",
                            'interview_attn_dt' => $interview_appeared_date,
                            'interview_attn_time' => $interview_appeared_time,
                            'interview_ass_type' =>  $interview_appeared_type,
                            'interview_ass_round' => $interview_appeared_round,
                            'interview_taken_by' => $interview_appeared_taken_by,
                            'offer_position' => $offered_position,
                            'offer_ctc' => $offered_ctc,
                            'exp_doj' => $offered_exp_doj,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Offer Accepted") {
                    $interview_appeared_time = $tic->interview_appeared_time;
                    $interview_appeared_type = $tic->interview_appeared_type;
                    $interview_appeared_round = $tic->interview_appeared_round;
                    $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                    $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }
                    $offered_position = $tic->offer_rel_position;
                    $offered_ctc = $tic->offer_rel_ctc;
                    $offered_exp_doj = $tic->offer_rel_exp_doj;
                    $offered_released_link = $tic->offered_released_link;
                    $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                    $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Expected Date of Joining : $offered_exp_doj ";
                    $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ' ' . $doj_notes . ')';
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => $priority,
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'attn_status' => "Yes",
                            'interview_attn_dt' => $interview_appeared_date,
                            'interview_attn_time' => $interview_appeared_time,
                            'interview_ass_type' =>  $interview_appeared_type,
                            'interview_ass_round' => $interview_appeared_round,
                            'interview_taken_by' => $interview_appeared_taken_by,
                            'offer_position' => $offered_position,
                            'offer_ctc' => $offered_ctc,
                            'exp_doj' => $offered_exp_doj,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Offer Declined") {
                    $interview_appeared_time = $tic->interview_appeared_time;
                    $interview_appeared_type = $tic->interview_appeared_type;
                    $interview_appeared_round = $tic->interview_appeared_round;
                    $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                    $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                    if (isset($tic->interview_appeared_date)) {
                        $interview_appeared_date = $tic->interview_appeared_date;
                    } else {
                        $interview_appeared_date = $tic->interview_appeared_date1;
                    }

                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => $priority,
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'attn_status' => "Yes",
                            'interview_attn_dt' => $interview_appeared_date,
                            'interview_attn_time' => $interview_appeared_time,
                            'interview_ass_type' =>  $interview_appeared_type,
                            'interview_ass_round' => $interview_appeared_round,
                            'interview_taken_by' => $interview_appeared_taken_by,
                            'applicant_status' => $profile_status,
                            'update_date' => today_date(),
                            'h_notes' => $tic->notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $profile_status,
                        'activity_notes' => $tic->notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } elseif ($profile_status == "Result Awaited") {
                    $h_notes = $tic->notes;
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => $priority,
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'applicant_status' => "Interview Appeared",
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $tic->interview_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                } else {
                    $h_notes = $tic->notes;
                    $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                        ->where('applicant_key', $tic->app_key)
                        ->update([
                            'priority' => "Normal",
                            'int_confirm' => "usch",
                            'distbut_id' => "0",
                            'applicant_status' => $tic->interview_status,
                            'update_date' => today_date(),
                            'h_notes' => $h_notes,
                        ]);
                    $add_candidate_history = TicCandidateHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'applied_job_id' => $get_job_details->job_id,
                        'applied_job_title' => $get_job_details->job_title,
                        'applied_company_name' => $get_job_details->job_company_name,
                        'applied_company_location' => $get_job_details->job_location,
                        'screen_id' => $get_applicant_details->screen_id,
                        'applicant_id' => $get_applicant_details->applicant_id,
                        'candidate_id' => $get_applicant_details->candidate_id,
                        'activity_type' => $tic->interview_status,
                        'activity_notes' => $h_notes,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]);
                }
            } elseif ($profile_status == 'Update Information') {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } else {
                // common part
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            }
            return  redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => 'inprogress']))->with('success_status_change', 'Status Changed');
            // return redirect()->back()->with('success_status_change','Status Changed');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function update_hiring_pool_appeared($applicant_key)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $applicant_key)
                ->first();
            $get_jobowner_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_applicant_details->job_id)
                ->first();
            $get_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $get_applicant_details->candidate_id)
                ->where('screen_id', $get_applicant_details->screen_id)
                ->orderBy('candidate_history_id', 'DESC')
                ->get();
            return view('admin.pages.update_hiring_pool_appeared')->with(compact('get_applicant_details', 'get_jobowner_details', 'get_history'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function update_hiring_pool_appeared_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->app_key)
                ->first();
            $get_job_details = get_job_details($get_applicant_details->job_id);
            $priority = $tic->priority;
            if ($tic->profile_status == 'Availability Required') {
                $profile_status = $tic->profile_status . ' - ' . $tic->availablity;
            }
            if ($tic->profile_status == "Shortlisted") {
                $profile_status = $tic->profile_status . ' - ' . $tic->next_reschedule_type;
            }
            if ($tic->profile_status == 'Assessments') {
                $profile_status = $tic->profile_status . ' - ' . $tic->assessment;
            }
            if ($tic->profile_status == 'Interview Cleared') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Interview Rejected') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Not Interested') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == "Selected") {
                $profile_status = $tic->profile_status . ' - ' . $tic->documentation_type;
            }
            if ($tic->profile_status == "Offered") {
                $profile_status = $tic->offered_released_type;
            }
            if ($tic->profile_status == 'Joined') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Selected - Not Offered') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Update Information') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'Did Not Attented') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'No further Action') {
                $profile_status = $tic->profile_status;
            }
            if ($tic->profile_status == 'On Hold') {
                $profile_status = $tic->profile_status;
            }
            if ($profile_status == 'Assessments - Test Initiated') {
                $ass_sch_time = $tic->assessment_sch_time;
                $ass_type = $tic->assessment_type;
                $ass_round = $tic->assessment_round;
                $ass_service = $tic->assessment_services;
                $ass_test_initiated_mail = $tic->test_initiated_mail;
                if (isset($tic->test_initiated_date)) {
                    $initiated_date = $tic->test_initiated_date;
                } else {
                    $initiated_date = $tic->test_initiated_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($initiated_date));
                $h_notes = $tic->notes . ' || Assessment Initiated for: ' . $disp_pnl_date . ' At : ' . $ass_sch_time . ' (Assessment Type: ' . $tic->assessment_type . ' ' . $tic->assessment_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "sch",
                        'distbut_id' => "0",
                        'scheduled_date' => $initiated_date,
                        'scheduled_time' => $ass_sch_time,
                        'interview_ass_type' => $ass_type,
                        'interview_ass_round' => $ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Completed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Passed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed & Passed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Assessments - Test Failed') {
                $appeared_ass_sch_time = $tic->test_appeared_time;
                $appeared_ass_type = $tic->test_appeared_assessment_type;
                $appeared_ass_round = $tic->test_appeared_assessment_round;
                $appeared_ass_service = $tic->test_appeared_assessment_services;
                $appeared_ass_test_initiated_mail = $tic->test_appeared_link;
                if (isset($tic->test_appeared_date)) {
                    $test_completed_date = $tic->test_appeared_date;
                } else {
                    $test_completed_date = $tic->test_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($test_completed_date));
                $h_notes = $tic->notes . ' || Assessment was Completed & Failed on: ' . $disp_pnl_date . ' At : ' . $appeared_ass_sch_time . ' (Assessment Type: ' . $appeared_ass_type . ' ' . $appeared_ass_round . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $test_completed_date,
                        'interview_attn_time' => $appeared_ass_sch_time,
                        'interview_ass_type' => $appeared_ass_type,
                        'interview_ass_round' => $appeared_ass_round,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Shortlisted - Online") {
                $interview_on_start_time = $tic->next_interview_on_start_time;
                $interview_duration_online = $tic->next_interview_duration_online;
                $interview_round_online = $tic->next_interview_round_online;
                $video_call_online = $tic->next_video_call_online;
                $interviewer_name_online = $tic->next_interviewer_name_online;
                $interviewer_kit_online = $tic->next_interviewer_kit_online;
                $sch_interview_online_link = $tic->next_sch_interview_online_link;
                if (isset($tic->next_interview_sch_online_date)) {
                    $interview_online_date = $tic->next_interview_sch_online_date;
                } else {
                    $interview_online_date = $tic->next_interview_sch_online_date1;
                }
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_online_date));
                $sl_note = ' || Next Interview Scheduled on ' . $disp_pnl_date . ' At: ' . $interview_on_start_time . ' (Interview Type: Online - ' . $interview_round_online . ')';
                $h_notes = $tic->notes . ' (Interview Attended on : ' . $interview_appeared_date . ' At: ' . $tic->interview_appeared_time . ' Taken by: ' . $tic->interview_appeared_taken_by . ' ' . $sl_note . ')';
                //reschedule count code over here
                $last_reschdule_count = $get_applicant_details->rescheduled_count;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'scheduled_date' => $interview_online_date,
                        'scheduled_time' => $interview_on_start_time,
                        'interview_ass_type' =>  $tic->interview_type,
                        'interview_ass_round' => $interview_round_online,
                        'rescheduled_count' => $last_reschdule_count++,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);

                $addorupdate_interview_details = TicInterview::updateOrCreate(
                    [
                        'applicant_id' => $get_applicant_details->applicant_id
                    ],
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'interview_type' => "Online",
                        'interview_date' => $interview_online_date,
                        'interview_time' => $interview_on_start_time,
                        'interview_duration' => $interview_duration_online,
                        'interview_round' => $interview_round_online,
                        'vc_services' => $video_call_online,
                        'interviewers' => $interviewer_name_online,
                        'interview_kit' => $interviewer_kit_online,
                        'scheduled_by' => Auth::user()->id,
                        'status' => "Scheduled",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Shortlisted - Offline") {
                $interview_off_start_time = $tic->next_interview_off_start_time;
                $interview_duration_offline = $tic->next_interview_duration_offline;
                $interview_round_offline = $tic->next_interview_round_offline;
                $interview_location_offline = $tic->next_interview_location_offline;
                $interviewer_name_offline = $tic->next_interviewer_name_offline;
                $interviewer_kit_offline = $tic->next_interviewer_kit_offline;
                $sch_interview_offline_link = $tic->next_sch_interview_offline_link;
                if (isset($tic->next_interview_sch_offline_date)) {
                    $interview_offline_date = $tic->next_interview_sch_offline_date;
                } else {
                    $interview_offline_date = $tic->next_interview_sch_offline_date1;
                }
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_offline_date));
                $sl_note = ' || Next Interview Scheduled on ' . $disp_pnl_date . ' At: ' . $interview_off_start_time . ' (Interview Type: Offline - ' . $interview_round_offline . ')';
                $h_notes = $tic->notes . ' (Interview Attended on : ' . $tic->$interview_appeared_date . ' At: ' . $tic->interview_appeared_time . ' Taken by: ' . $tic->interview_appeared_taken_by . ' ' . $sl_note . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'scheduled_date' => $interview_offline_date,
                        'scheduled_time' => $interview_off_start_time,
                        'interview_ass_round' => $interview_round_offline,
                        'interview_location' => $interview_location_offline,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $addorupdate_interview_details = TicInterview::updateOrCreate(
                    [
                        'applicant_id' => $get_applicant_details->applicant_id
                    ],
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'interview_type' => "Online",
                        'interview_date' => $interview_offline_date,
                        'interview_time' => $interview_off_start_time,
                        'interview_duration' => $interview_duration_offline,
                        'interview_round' => $interview_round_offline,
                        'interviewers' => $interviewer_name_offline,
                        'interview_kit' => $interviewer_kit_offline,
                        'scheduled_by' => Auth::user()->id,
                        'status' => "Scheduled",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Selected - For Documentation") {

                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_type' =>  $interview_appeared_type,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Selected - For Offer") {
                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $offered_position = $tic->offered_position;
                $offered_ctc = $tic->offered_ctc;
                $offered_exp_doj = $tic->offered_exp_doj;
                $documentation_link = $tic->documentation_link;
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_type' =>  $interview_appeared_type,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Offer Released") {
                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $offered_position = $tic->offer_rel_position;
                $offered_ctc = $tic->offer_rel_ctc;
                $offered_exp_doj = $tic->offer_rel_exp_doj;
                $offered_released_link = $tic->offered_released_link;
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Expected Date of Joining : $offered_exp_doj ";
                $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ' ' . $doj_notes . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_type' =>  $interview_appeared_type,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Offer Accepted") {
                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }
                $offered_position = $tic->offer_rel_position;
                $offered_ctc = $tic->offer_rel_ctc;
                $offered_exp_doj = $tic->offer_rel_exp_doj;
                $offered_released_link = $tic->offered_released_link;
                $disp_pnl_date = date('d-M-Y [D]', strtotime($interview_appeared_date));
                $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Expected Date of Joining : $offered_exp_doj ";
                $h_notes = $tic->notes . ' || Interview Appeared on : ' . $disp_pnl_date . ' At : ' . $interview_appeared_time . ' (Taken by: ' . $interview_appeared_taken_by . ' ' . $doj_notes . ')';
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_type' =>  $interview_appeared_type,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Offer Declined") {
                $interview_appeared_time = $tic->interview_appeared_time;
                $interview_appeared_type = $tic->interview_appeared_type;
                $interview_appeared_round = $tic->interview_appeared_round;
                $interview_appeared_taken_by = $tic->interview_appeared_taken_by;
                $interview_appeared_mail_link = $tic->interview_appeared_mail_link;
                if (isset($tic->interview_appeared_date)) {
                    $interview_appeared_date = $tic->interview_appeared_date;
                } else {
                    $interview_appeared_date = $tic->interview_appeared_date1;
                }

                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'attn_status' => "Yes",
                        'interview_attn_dt' => $interview_appeared_date,
                        'interview_attn_time' => $interview_appeared_time,
                        'interview_ass_type' =>  $interview_appeared_type,
                        'interview_ass_round' => $interview_appeared_round,
                        'interview_taken_by' => $interview_appeared_taken_by,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $tic->notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $tic->notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Joined") {
                $offered_position = $tic->joined_offer_position;
                $offered_ctc = $tic->joined_offer_ctc;
                $offered_exp_doj = $tic->joined_offer_doj;
                $joined_offer_emp_code = $tic->joined_offer_emp_code;
                $candidate_joined_link = $tic->candidate_joined_link;
                $disp_expect_doj = date('d-M-Y [D]', strtotime($offered_exp_doj));
                $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Date of Joining : $offered_exp_doj at  Empcode : $joined_offer_emp_code ";
                $h_notes = $tic->notes . ' ' . $doj_notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'emp_code' => $joined_offer_emp_code,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == 'Update Information') {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } else {
                // common part
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'int_confirm' => "usch",
                        'distbut_id' => "0",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            }
            return  redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => 'inprogress']))->with('success_status_change', 'Status Changed');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_applicant_update_selected($applicant_key)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $applicant_key)
                ->first();
            $get_jobowner_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_applicant_details->job_id)
                ->first();
            $get_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $get_applicant_details->candidate_id)
                ->where('screen_id', $get_applicant_details->screen_id)
                ->orderBy('candidate_history_id', 'DESC')
                ->get();
            return view('admin.pages.update_selected_applicant')->with(compact('get_applicant_details', 'get_jobowner_details', 'get_history'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_applicant_update_selected_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->app_key)
                ->first();

            $get_job_details = get_job_details($get_applicant_details->job_id);
            $priority = $tic->priority;
            if ($tic->offered_released_type == "Offer Accepted") {
                $profile_status = $tic->offered_released_type;
            } elseif ($tic->offered_released_type == "Offer Released") {
                $profile_status = $tic->offered_released_type;
            } elseif ($tic->offered_released_type == "Offer Declined") {
                $profile_status = $tic->offered_released_type;
            } else {
                $profile_status = $tic->profile_status;
            }


            if ($profile_status == "Offer Accepted") {
                $offered_position = $tic->offer_rel_position;
                $offered_ctc = $tic->offer_rel_ctc;
                $offered_exp_doj = $tic->offer_rel_exp_doj;
                $offered_released_link = $tic->offered_released_link;
                $disp_expect_doj = date('d-M-Y [D]', strtotime($offered_exp_doj));
                $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Expected Date of Joining : $disp_expect_doj ";
                $h_notes = $tic->notes . ' ' . $doj_notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Offer Released") {
                $offered_position = $tic->offer_rel_position;
                $offered_ctc = $tic->offer_rel_ctc;
                $offered_exp_doj = $tic->offer_rel_exp_doj;
                $offered_released_link = $tic->offered_released_link;
                $disp_expect_doj = date('d-M-Y [D]', strtotime($offered_exp_doj));
                $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Expected Date of Joining : $disp_expect_doj ";
                $h_notes = $tic->notes . ' ' . $doj_notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Offer Declined") {

                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Joined") {
                $offered_position = $tic->joined_offer_position;
                $offered_ctc = $tic->joined_offer_ctc;
                $offered_exp_doj = $tic->joined_offer_doj;
                $joined_offer_emp_code = $tic->joined_offer_emp_code;
                $candidate_joined_link = $tic->candidate_joined_link;
                $disp_expect_doj = date('d-M-Y [D]', strtotime($offered_exp_doj));
                $doj_notes = "|| Offered Position : $offered_position | Offered CTC : $offered_ctc | Date of Joining : $offered_exp_doj at  Empcode : $joined_offer_emp_code ";
                $h_notes = $tic->notes . ' ' . $doj_notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'offer_position' => $offered_position,
                        'offer_ctc' => $offered_ctc,
                        'exp_doj' => $offered_exp_doj,
                        'emp_code' => $joined_offer_emp_code,
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Update Information") {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => $priority,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Selected - Not Offered") {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "Did Not Join (Not Interested)") {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } elseif ($profile_status == "On Hold") {
                $h_notes = $tic->notes;
                $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('applicant_key', $tic->app_key)
                    ->update([
                        'priority' => "Normal",
                        'applicant_status' => $profile_status,
                        'update_date' => today_date(),
                        'h_notes' => $h_notes,
                    ]);
                $add_candidate_history = TicCandidateHistory::create([
                    'cloud_id' => Auth::user()->cloud_id,
                    'applied_job_id' => $get_job_details->job_id,
                    'applied_job_title' => $get_job_details->job_title,
                    'applied_company_name' => $get_job_details->job_company_name,
                    'applied_company_location' => $get_job_details->job_location,
                    'screen_id' => $get_applicant_details->screen_id,
                    'applicant_id' => $get_applicant_details->applicant_id,
                    'candidate_id' => $get_applicant_details->candidate_id,
                    'activity_type' => $profile_status,
                    'activity_notes' => $h_notes,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]);
            } else {
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function update_joined_abscond_last_working(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->applicant_key)
                ->first();
            $get_job_details = get_job_details($get_applicant_details->job_id);
            $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $get_applicant_details->applicant_key)
                ->update([
                    'last_working_day' => $tic->joining_abscond_date,
                ]);
            $add_candidate_history = TicCandidateHistory::create([
                'cloud_id' => Auth::user()->cloud_id,
                'applied_job_id' => $get_job_details->job_id,
                'applied_job_title' => $get_job_details->job_title,
                'applied_company_name' => $get_job_details->job_company_name,
                'applied_company_location' => $get_job_details->job_location,
                'screen_id' => $get_applicant_details->screen_id,
                'applicant_id' => $get_applicant_details->applicant_id,
                'candidate_id' => $get_applicant_details->candidate_id,
                'activity_type' => "Update Last Working Day",
                'activity_notes' => $tic->notes,
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'date' => today_date(),
                'time' => today_time(),
                'ip' => get_client_ip(),
                'browser' => get_client_browser(),
            ]);
            return response()->json([
                'data' => "Success"
            ]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function update_joined_update_details(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return ApplicantController::lock_screen();
        }
        if (Auth::check()) {
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $tic->joined_applicant_key)
                ->first();
            $get_job_details = get_job_details($get_applicant_details->job_id);
            $update_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $get_applicant_details->applicant_key)
                ->update([
                    'offer_position' => $tic->joined_offer_position,
                    'offer_ctc' => $tic->joined_offer_ctc,
                    'emp_code' => $tic->joined_offer_emp_code,
                    'actual_doj' => $tic->joined_offer_doj,
                    'h_notes' => $tic->joined_offer_notes,
                ]);
            $add_candidate_history = TicCandidateHistory::create([
                'cloud_id' => Auth::user()->cloud_id,
                'applied_job_id' => $get_job_details->job_id,
                'applied_job_title' => $get_job_details->job_title,
                'applied_company_name' => $get_job_details->job_company_name,
                'applied_company_location' => $get_job_details->job_location,
                'screen_id' => $get_applicant_details->screen_id,
                'applicant_id' => $get_applicant_details->applicant_id,
                'candidate_id' => $get_applicant_details->candidate_id,
                'activity_type' => "Update Offer Details",
                'activity_notes' => $tic->joined_offer_notes,
                'user_id' => Auth::user()->id,
                'user_name' => Auth::user()->name,
                'date' => today_date(),
                'time' => today_time(),
                'ip' => get_client_ip(),
                'browser' => get_client_browser(),
            ]);
            return response()->json([
                'data' => "Success"
            ]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
}

// if(Session::has('locked-screen')){
// return ApplicantController::lock_screen();
// }
// if(Auth::check()){

// }
// else{
// return redirect("login")->withSuccess('You are not allowed to access');
// }

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
use App\Models\Contact;
use App\Models\CompanyHistory;
use App\Models\CompanyAgreement;
use App\Models\demo;
use App\Models\Location;
use App\Models\TicCandidateDuplicateLog;
use App\Models\TicCandidateEducationDetials;
use App\Models\TicCandidateHistory;
use App\Models\TicCandidateMaster;
use App\Models\TicCandidateApplicant;
use App\Models\TicCandidateScreening;
use App\Models\TicCandidateCallSummary;
use App\Models\TicCandidateCallConnectedSummary;
use App\Models\TicCandidateSourceSummary;
use App\Models\TicCloud;
use App\Models\TicCompanyJobsHistory;
use App\Models\TicQuestionnaireAnswer;
use App\Models\TicQuestionnaireQuestions;
use App\Models\TicQuestionnaireQuestionSet;
use App\Models\TicScorecard;
use App\Models\TicScorecardSet;
use App\Models\JobCategory;
use App\Models\JobContent;
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

// use PhpOffice\PhpSpreadsheet\IOFactory as IOFactory1;


class AdminController extends Controller
{
    public function reset_db(Request $request)
    {
        // DB::table('users')->truncate();
        // DB::table('tic_scorecard_set')->truncate();
        // DB::table('tic_questionnaire_question_set')->truncate();
        // DB::table('tic_questionnaire_questions')->truncate();
        // DB::table('tic_questionnaire_answer')->truncate();
        // // DB::table('tic_locations')->truncate();
        // DB::table('tic_job_scorecard')->truncate();
        // // DB::table('tic_invites')->truncate();
        // DB::table('tic_interviews')->truncate();
        // // DB::table('tic_company_locations')->truncate();
        // // DB::table('tic_company_jobs_history')->truncate();
        // // DB::table('tic_company_jobs')->truncate();
        // // DB::table('tic_company_history')->truncate();
        // // DB::table('tic_company_contacts')->truncate();
        // // DB::table('tic_company_agreements')->truncate();
        // // DB::table('tic_company')->truncate();
        // // DB::table('tic_clients')->truncate();
        // DB::table('tic_candidate_snooze')->truncate();
        // DB::table('tic_candidate_call_summary')->truncate();
        // DB::table('tic_candidate_call_connected_summary')->truncate();
        // DB::table('tic_candidates_source_summary')->truncate();
        // // DB::table('tic_cloud')->truncate();
        // DB::table('tic_candidates_screening')->truncate();
        // DB::table('tic_candidates_master')->truncate();
        // DB::table('tic_candidates_history')->truncate();
        // DB::table('tic_candidates_experience_details')->truncate();
        // DB::table('tic_candidates_education_details')->truncate();
        // DB::table('tic_candidates_duplicate_log_history')->truncate();
        // DB::table('tic_candidates_applicants')->truncate();
        // DB::table('tic_additional_question_set')->truncate();
        // DB::table('tic_additional_questions')->truncate();
        // DB::table('tic_additional_answer')->truncate();


        echo $request->ip();

        // return view('admin.pages.update_inprogress_applicant');
        // return view('admin.pages.update_selected_applicant');
        // $onemonth = time() + (180 * 24 * 60 * 60);
        // $output_onemonth =  date('Y-m-d', $onemonth);
        // $disp_output_onemonth = date('d-F Y', strtotime($output_onemonth));
        // echo $output_onemonth."<br>";
        // echo $disp_output_onemonth."<br>";
        // abort(403);
    }
    public function admin_dashboard()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.dashboard');
        } else {

            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function lock_screen()
    {
        if (Auth::check()) {
            Session::put('locked-screen', "yes");
            return view('auth.lock_screen');
        } else {
            return view('auth.lock_screen');
        }
    }
    public function lock_screen_open_request(Request $tic)
    {
        if (Auth::check()) {

            $get_current_user = User::where('email', Auth::user()->email)->first();
            if ($get_current_user) {
                if (Hash::check($tic->userpassword, $get_current_user->password)) {
                    Session::forget('locked-screen');
                    return redirect()->to(route('admin_dashboard'));
                } else {
                    return redirect()->back()->with('error', "OOPS ! Invalid Crediantials");
                }
            }
        } else {
            return view('auth.auth_login');
        }
    }


    public function add_jobs()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $job_id = generate_job_order_id();
            $get_user_info = Client::where('cloud_id', Auth::user()->cloud_id)->get();
            $get_job_library_category = JobCategory::where('jd_category_order', 0)->where('js_category_parent_id', 0)->orderBy('jd_category_id', "ASC")->get();
            $get_sub_category_list = JobContent::select()->groupBy('sbc_name')->get();
            return view('admin.pages.add_jobs')->with(compact('job_id', 'get_user_info', 'get_job_library_category', 'get_sub_category_list'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    public function add_jobs_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // dd($tic);
            $locations = "";
            foreach ($tic->location as $location) {
                if ($location != null) {
                    $locations = $location . "," . $locations;
                }
            }
            // dd(rtrim($locations,','));
            $new_file_name = "";
            $evaluate_attachment1 = "";
            $evaluate_attachment2 = "";
            $evaluate_attachment_name1 = "";
            $evaluate_attachment_name2 = "";
            if ($tic->hasFile('job_attach_jd')) {
                $file = $tic->file('job_attach_jd');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $new_file_name = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('job_description'), $new_file_name);
            }
            if ($tic->hasFile('evaluate_attachment1')) {
                $file = $tic->file('evaluate_attachment1');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $evaluate_attachment1 = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('evaluate_attachment'), $evaluate_attachment1);
                $evaluate_attachment_name1 = $tic->evaluate_attachment_name1;
            }
            if ($tic->hasFile('evaluate_attachment2')) {
                $file = $tic->file('evaluate_attachment2');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $evaluate_attachment2 = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('evaluate_attachment'), $evaluate_attachment2);
                $evaluate_attachment_name2 = $tic->evaluate_attachment_name2;
            }
            if ($tic->posting_type == "Internal") {
                Session::put('posting_type', "Internal");
            }

            $get_cloud_info = TicCloud::where('cloud_id', Auth::user()->cloud_id)->first();
            $add_job = TicJobs::create([
                'cloud_id' => Auth::user()->cloud_id,
                'job_code' => strtolower($tic->job_code),
                'job_title' => ucwords($tic->job_title),
                'job_priority' => $tic->job_priority,
                'job_description' => $tic->job_desc,
                'job_attach_jd' => $tic->$new_file_name,
                'job_posting_type' => $tic->posting_type,
                'job_cv_limit' => $tic->job_cv_limit,
                'job_valid_till' => date("Y-m-d", strtotime($tic->valid_till)),
                'company_id' => $get_cloud_info->cloud_id,
                'job_company_name' => ucwords($get_cloud_info->acc_name),
                'company_location_id' => "",
                'job_location' => rtrim($locations, ','),
                'job_state' => "",
                'job_industry' => ucwords($tic->industry),
                'job_function_area' => ucwords($tic->job_function),
                'job_emp_type' => $tic->emp_type,
                'job_exp_min' => $tic->exp_min,
                'job_exp_max' => $tic->exp_max,
                'job_position_nos' => $tic->position,
                'job_qualification' => $tic->qualification,
                'job_sal_min' => $tic->sal_min,
                'job_sal_max' => $tic->sal_max,
                'job_currency' => $tic->currency,
                'evaluate_attachment_name1' => $evaluate_attachment_name1,
                'evaluate_attachment_1' => $evaluate_attachment1,
                'evaluate_attachment_name2' => $evaluate_attachment_name2,
                'evaluate_attachment_2' => $evaluate_attachment2,
                'things_to_remember' => $tic->things_to_remember,
                'job_show_salary_details' => isset($tic->show_salary) == "on" ? "Yes" : "No",
                'date' => today_date(),
                'time' => today_time(),
                'ip' => get_client_ip(),
                'browser' => get_client_browser(),
                'updated_date' => today_date(),
                'job_posted_by_username' => Auth::user()->name,
                'job_posted_by_userid' => Auth::user()->id
            ]);
            $add_history = TicCompanyJobsHistory::create(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'job_id' => $add_job->job_id,
                    'user_id' => Auth::user()->id,
                    'user_name' => Auth::user()->name,
                    'activity_type' => 'New Job Created',
                    'activity_notes' => '',
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );
            return redirect()->to(route('job_questionaire', ['jobid' => strtolower($tic->job_code)]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_questionaire($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            Session::forget('set_id');
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {

                $questionnaire_templates = TicQuestionnaireQuestionSet::where('cloud_id', Auth::user()->cloud_id)->orderBy('question_set_id', 'DESC')->get();
                return view('admin.pages.job_questionnaire')->with(compact('questionnaire_templates', 'job_id'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_questionaire_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {

            $add_set = TicQuestionnaireQuestionSet::updateOrCreate(
                [
                    'question_set_name' => $tic->set_name,
                    'cloud_id' => Auth::user()->cloud_id
                ],
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'question_set_name' => $tic->set_name,
                    'date' => today_date(),
                    'time' => today_time()
                ]
            );
            if (!Session::has('set_id')) {
                Session::put('set_id', $add_set->question_set_id);
            }
            $update_job = TicJobs::where('job_code', $tic->job_id)->where('cloud_id', Auth::user()->cloud_id)
                ->update(
                    [
                        'question_set_id' => $add_set->question_set_id
                    ]
                );
            $add_question = TicQuestionnaireQuestions::create(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'question' => $tic->question,
                    'field_type' => $tic->field_type,
                    'is_required' => isset($tic->is_required) ? "Yes" : "No",
                    'automation' => isset($tic->is_automation) ? "Yes" : "No",
                    'question_set_id' => Session::get('set_id')
                ]
            );
            if ($tic->field_type == "Yes/No" || $tic->field_type == "Confirm") {
                $add_answer = TicQuestionnaireAnswer::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'question_set_id' => Session::get('set_id'),
                        'question_id' => $add_question->question_id,
                        'field_type' => $tic->field_type,
                        'options' => isset($tic->option1) ? $tic->option1 : "",
                        'option_response' => isset($tic->answer_yes) ? $tic->answer_yes : ""
                    ]
                );
                $add_answer1 = TicQuestionnaireAnswer::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'question_set_id' => Session::get('set_id'),
                        'question_id' => $add_question->question_id,
                        'field_type' => $tic->field_type,
                        'options' => isset($tic->option1) ? $tic->option2 : "",
                        'option_response' => isset($tic->answer_no) ? $tic->answer_no : ""
                    ]
                );
            } elseif ($tic->field_type == "Single Choice" || $tic->field_type == "Multiple Choice") {
                for ($i = 0; $i < count($tic->single_choices_list); $i++) {
                    $add_answer = TicQuestionnaireAnswer::create(
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'question_set_id' => Session::get('set_id'),
                            'question_id' => $add_question->question_id,
                            'field_type' => $tic->field_type,
                            'options' => $tic->single_choices_list[$i],
                            'option_response' => isset($tic->single_response[$i]) ? $tic->single_response[$i] : ""
                        ]
                    );
                }
            } else {
                $add_answer = TicQuestionnaireAnswer::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'question_set_id' => Session::get('set_id'),
                        'question_id' => $add_question->question_id,
                        'field_type' => $tic->field_type,
                        'options' => isset($tic->option1) ? $tic->option1 : "",
                        'option_response' => isset($tic->answer_yes) ? $tic->answer_yes : ""
                    ]
                );
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_questionaire_templates_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $update_job = TicJobs::where('job_code', $tic->job_id1)->where('cloud_id', Auth::user()->cloud_id)
                ->update(
                    [
                        'question_set_id' => $tic->questionnaire_template_id
                    ]
                );
            return redirect()->to(route('job_attachment_scorecard', ['jobid' => strtolower($tic->job_id1)]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_attachment_scorecard($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                $get_scorecard_templates = TicScorecardSet::where('cloud_id', Auth::user()->cloud_id)->orderBy('scorecard_set_id', 'DESC')->get();
                return view('admin.pages.scorecard')->with(compact('job_id', 'get_scorecard_templates'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Questionnaire");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_attachment_scorecard_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $add_scorecard_set = TicScorecardSet::create(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'scorecard_name' => $tic->scorecard_set_name,
                    'rating_type' => $tic->rating,
                    'allow_neutral' => isset($tic->neutral_type) ? "Yes" : "No",
                    'overall_comment_required' => isset($tic->comments_min_required) ? "Yes" : "No",
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser()
                ]
            );
            if ($add_scorecard_set) {
                for ($i = 0; $i < count($tic->options); $i++) {
                    $add_answer = TicScorecard::create(
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'options' => $tic->options[$i],
                            'options_output' => $tic->options_output[$i],
                            'scorecard_set_id' => $add_scorecard_set->scorecard_set_id,
                        ]
                    );
                }
            }
            return redirect()->to(route('job_hiring_team', ['jobid' => strtolower($tic->job_id)]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function attachment_scorecard_templates_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $update_job = TicJobs::where('job_code', $tic->job_id)->where('cloud_id', Auth::user()->cloud_id)
                ->update(
                    [
                        'scorecard_id' => $tic->scorecard_template_id
                    ]
                );
            return redirect()->to(route('job_hiring_team', ['jobid' => strtolower($tic->job_id)]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_hiring_team($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                $get_team = User::where('cloud_id', Auth::user()->cloud_id)->get();
                return view('admin.pages.hiring_team')->with(compact('job_id', 'get_team'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Hiring Team");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_hiring_team_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return redirect()->to(route('job_share_social', ['jobid' => strtolower($tic->job_id)]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_share_social($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                return view('admin.pages.social_share_job')->with(compact('job_id'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function job_advertise_social($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                return view('admin.pages.advertise')->with(compact('job_id'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function manage_jobs()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            Session::forget('posting_type');
            $get_cloud_job = TicJobs::where('cloud_id', Auth::user()->cloud_id)->orderBy('job_id', 'DESC')->paginate(2);
            $get_user_info = Client::where('cloud_id', Auth::user()->cloud_id)->get();
            return view('admin.pages.manage_jobs')->with(compact('get_cloud_job', 'get_user_info'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_job_details($job_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                $get_sourced_candidates = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_valid_job->job_id)
                    ->where('recruiter', Auth::user()->id)->Paginate(20)->setPath(route('view_job_details_tab', ['jobid' => $job_id, 'ctab' => 'pool']));
                $get_all_job_applicants = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_valid_job->job_id)
                    ->where('recruiter', Auth::user()->id)
                    ->get();
                return view('admin.pages.view_job_details')->with(compact('job_id', 'get_sourced_candidates', 'get_all_job_applicants', 'get_valid_job'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_job_details_tab($job_id, $ctab)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                $get_sourced_candidates = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_valid_job->job_id)
                    ->where('recruiter', Auth::user()->id)->Paginate(20);
                $get_all_job_applicants = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_valid_job->job_id)
                    ->where('recruiter', Auth::user()->id)
                    ->get();

                return view('admin.pages.view_job_details')->with(compact('job_id', 'get_sourced_candidates', 'ctab', 'get_all_job_applicants', 'get_valid_job'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }

    public function view_pool_candidate($job_code, $screen_id, $inner_tab, $key = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_candidate_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_candidate_details->job_id)->first();
            if ($inner_tab == "sourced") {
                $next_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '>', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->where('screen_status', 'Sourced')
                    ->orderBy('screen_id', 'ASC')
                    ->first();

                $prev_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '<', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->where('screen_status', 'Sourced')
                    ->orderBy('screen_id', 'DESC')
                    ->first();
            } elseif ($inner_tab == "attempted") {
                $attempted = array('Not Reachable', 'Call Wait', 'Switch Off', 'No Response', 'Call Later');
                $next_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '>', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $attempted)
                    ->orderBy('screen_id', 'ASC')
                    ->first();

                $prev_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '<', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $attempted)
                    ->orderBy('screen_id', 'DESC')
                    ->first();
            } elseif ($inner_tab == "calllater") {
                $next_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '>', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->where('screen_status', "Call Later")
                    ->orderBy('screen_id', 'ASC')
                    ->first();

                $prev_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '<', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->where('screen_status', "Call Later")
                    ->orderBy('screen_id', 'DESC')
                    ->first();
            } elseif ($inner_tab == "not_interested") {
                $not_interested = array('Dropped', 'Not-Interested', 'Profile Incorrect', 'Wrong No', 'Received By Others', 'Not In Service');
                $next_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '>', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $not_interested)
                    ->orderBy('screen_id', 'ASC')
                    ->first();

                $prev_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '<', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $not_interested)
                    ->orderBy('screen_id', 'DESC')
                    ->first();
            } elseif ($inner_tab == "interested") {
                $interested = array('Interested But Cv Update Required', 'Interested But Cv Pending', 'Interested Confirmation Awaited');
                $next_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '>', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $interested)
                    ->orderBy('screen_id', 'ASC')
                    ->first();

                $prev_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '<', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $interested)
                    ->orderBy('screen_id', 'DESC')
                    ->first();
            } elseif ($inner_tab == "submitted") {
                $submitted = array('Submitted To Quality', 'Quality Rejected', 'Quality Duplicate', 'Quality Approved',);
                $next_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '>', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $submitted)
                    ->orderBy('screen_id', 'ASC')
                    ->first();

                $prev_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('job_id', $get_job_details->job_id)
                    ->where('screen_id', '<', $get_candidate_details->screen_id)
                    ->where('recruiter', $get_candidate_details->recruiter)
                    ->whereIn('screen_status', $submitted)
                    ->orderBy('screen_id', 'DESC')
                    ->first();
            }


            $get_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $get_candidate_details->candidate_id)
                ->where('applied_job_id', $get_candidate_details->job_id)
                ->where('screen_id', $get_candidate_details->screen_id)
                ->orderBy('candidate_history_id', 'DESC')
                ->get();
            return view('admin.pages.view_pool_candidate')->with(compact('get_candidate_details', 'get_job_details', 'get_history', 'next_candidate', 'prev_candidate', 'inner_tab'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function remove_candidate($candidate_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $delete_candidate_screen = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $candidate_id)
                ->delete();
            return redirect()->back()->with('remove_success', "Candidate Removed Successfully");
            // $update_candidate_history = 
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function drop_candidate($screen_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // dd($screen_id);
            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('screen_id', $screen_id)->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_screen_details->job_id)->first();
            $update_candidate_screen = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->update(
                    [
                        'screen_status' => "Dropped"
                    ]
                );
            $add_candidate_history = TicCandidateHistory::create(
                [
                    "cloud_id" => Auth::user()->cloud_id,
                    "applied_job_id" => $get_screen_details->job_id,
                    "screen_id" => $get_screen_details->screen_id,
                    "applied_job_title" => $get_job_details->job_title,
                    "applied_company_name" => $get_job_details->job_company_name,
                    "applied_company_location" => $get_job_details->job_location,
                    "applicant_id" => "0",
                    "candidate_id" => $get_screen_details->candidate_id,
                    "activity_type" => "Profile Dropped",
                    "activity_notes" => "Recruiter Dropped the Profile due to inadequate information",
                    "user_id" => Auth::user()->id,
                    "user_name" => Auth::user()->name,
                    "date" => today_date(),
                    "time" => today_time(),
                    "ip" => get_client_ip(),
                    "browser" => get_client_browser()
                ]
            );

            $check_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                ->where('r_summary_userid', Auth::user()->id)
                ->where('r_job_id', $get_screen_details->job_id)
                ->where('r_summary_dt', today_date())
                ->first();
            // check if no call summary against this job with login user id
            if (!$check_call_summary) {
                $add_call_summary = TicCandidateCallSummary::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'r_summary_dt' => today_date(),
                        'r_summary_userid' => Auth::user()->id,
                        'r_job_id' => $get_screen_details->job_id,
                        'r_connected' => 0,
                        'r_validated' => 0,
                        'r_call_wait' => 0,
                        'r_switch_off' => 0,
                        'r_no_responce' => 0,
                        'r_not_reachable' => 0,
                        'r_not_inservice' => 0,
                        'r_dropped' => 1,
                        'r_today_total' => 1,
                        'r_redailed' => 0,
                    ]
                );
            } else {
                // $check_call_summary
                $last_dropped = $check_call_summary->r_dropped;
                $last_dropped++;
                $last_today_total = $check_call_summary->r_today_total;
                $last_today_total++;
                $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                    ->where('r_summary_userid', Auth::user()->id)
                    ->where('r_job_id', $get_screen_details->job_id)
                    ->where('r_summary_dt', today_date())
                    ->update(
                        [
                            'r_dropped' => $last_dropped,
                            'r_today_total' => $last_today_total
                        ]
                    );
            }


            return redirect()->back();
            // $update_candidate_history = 
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function call_screening_modal_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $screen_id = $tic->post_screen_id;
            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('screen_id', $screen_id)->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_screen_details->job_id)->first();
            // if ($tic->call_status == "Connected") {

            //     return redirect()->to(route('call_candidate_screening', ['screenid' => $tic->post_screen_id, 'jobid' => $get_screen_details->job_code]));
            // } else {

            TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->update(
                    [
                        'screen_status' => $tic->call_status
                    ]
                );
            $add_candidate_history = TicCandidateHistory::create(
                [
                    "cloud_id" => Auth::user()->cloud_id,
                    "applied_job_id" => $get_screen_details->job_id,
                    "screen_id" => $get_screen_details->screen_id,
                    "applied_job_title" => $get_job_details->job_title,
                    "applied_company_name" => $get_job_details->job_company_name,
                    "applied_company_location" => $get_job_details->job_location,
                    "applicant_id" => "0",
                    "candidate_id" => $get_screen_details->candidate_id,
                    "activity_type" => $tic->call_status,
                    "activity_notes" => "Recruiter tried to reach but number was " . $tic->call_status,
                    "user_id" => Auth::user()->id,
                    "user_name" => Auth::user()->name,
                    "date" => today_date(),
                    "time" => today_time(),
                    "ip" => get_client_ip(),
                    "browser" => get_client_browser()
                ]
            );

            // below code is done 
            $check_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                ->where('r_summary_userid', Auth::user()->id)
                ->where('r_job_id', $get_screen_details->job_id)
                ->where('r_summary_dt', today_date())
                ->first();
            // check if no call summary against this job with login user id
            if (!$check_call_summary) {
                $add_call_summary = TicCandidateCallSummary::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'r_summary_dt' => today_date(),
                        'r_summary_userid' => Auth::user()->id,
                        'r_job_id' => $get_screen_details->job_id,
                        'r_connected' => 0,
                        'r_validated' => 0,
                        'r_call_wait' => 0,
                        'r_switch_off' => 0,
                        'r_no_responce' => 0,
                        'r_not_reachable' => 0,
                        'r_not_inservice' => 0,
                        'r_dropped' => 1,
                        'r_today_total' => 1,
                        'r_redailed' => 0,
                    ]
                );
            } else {
                // $check_call_summary
                $last_connected = $check_call_summary->r_connected;
                $last_validated = $check_call_summary->r_validated;
                $last_call_wait = $check_call_summary->r_call_wait;
                $last_switch_off = $check_call_summary->r_switch_off;
                $last_no_responce = $check_call_summary->r_no_responce;
                $last_not_reachable = $check_call_summary->r_not_reachable;
                $last_not_inservice = $check_call_summary->r_not_inservice;
                $last_today_total = $check_call_summary->r_today_total;
                $last_connected++;
                $last_validated++;
                $last_call_wait++;
                $last_switch_off++;
                $last_no_responce++;
                $last_not_reachable++;
                $last_not_inservice++;
                $last_today_total++;
                // if call wait 
                if ($tic->call_status == "Call Wait")
                    $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                        ->where('r_summary_userid', Auth::user()->id)
                        ->where('r_job_id', $get_screen_details->job_id)
                        ->where('r_summary_dt', today_date())
                        ->update(
                            [
                                'r_call_wait' => $last_call_wait,
                                'r_today_total' => $last_today_total
                            ]
                        );
                if ($tic->call_status == "Switch Off")
                    $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                        ->where('r_summary_userid', Auth::user()->id)
                        ->where('r_job_id', $get_screen_details->job_id)
                        ->where('r_summary_dt', today_date())
                        ->update(
                            [
                                'r_switch_off' => $last_switch_off,
                                'r_today_total' => $last_today_total
                            ]
                        );
                if ($tic->call_status == "No Response")
                    $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                        ->where('r_summary_userid', Auth::user()->id)
                        ->where('r_job_id', $get_screen_details->job_id)
                        ->where('r_summary_dt', today_date())
                        ->update(
                            [
                                'r_no_responce' => $last_no_responce,
                                'r_today_total' => $last_today_total
                            ]
                        );
                if ($tic->call_status == "Not Reachable")
                    $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                        ->where('r_summary_userid', Auth::user()->id)
                        ->where('r_job_id', $get_screen_details->job_id)
                        ->where('r_summary_dt', today_date())
                        ->update(
                            [
                                'r_not_reachable' => $last_not_reachable,
                                'r_today_total' => $last_today_total
                            ]
                        );
                if ($tic->call_status == "Not In Service")
                    $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                        ->where('r_summary_userid', Auth::user()->id)
                        ->where('r_job_id', $get_screen_details->job_id)
                        ->where('r_summary_dt', today_date())
                        ->update(
                            [
                                'r_not_inservice' => $last_not_inservice,
                                'r_today_total' => $last_today_total
                            ]
                        );

                // if connected Switch Off No Response Not Reachable Not In Service

            }
            // }

            //end pending
            return redirect()->back();
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function call_validate_modal_post(Request $tic)
    {

        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $screen_id = $tic->screen_id_modal;
            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $check_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_email', $tic->modal_candidate_email)
                ->where('job_id', $get_screen_details->job_id)
                ->whereNotIn('screen_id', [$screen_id])
                ->first();

            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_code', $tic->job_id_modal)->first();
            $add_call_connected_summary = TicCandidateCallConnectedSummary::create(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'user_id' => Auth::user()->id,
                    'job_id' => $get_job_details->job_id,
                    'candidate_id' => $get_screen_details->candidate_id,
                    'screen_id' => $get_screen_details->screen_id,
                    'screen_status' => "",
                    'call_start_time' => today_time(),
                    'screen_type' => "Validated",
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser()
                ]
            );
            // $connect_id = $add_call_connected_summary->connect_id;
            // if duplicate candidate found 

            if ($check_screen_details) {
                TicCandidateDuplicateLog::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'job_id' => $get_job_details->job_id,
                        'duplicate_name' => $get_screen_details->candidate_name,
                        'duplicate_email' => $get_screen_details->candidate_email,
                        'duplicate_phone' => $get_screen_details->candidate_phone,
                        'duplicate_with' => $check_screen_details->screen_id,
                        'duplicate_from' => "Candidate Validation",
                        'duplicate_source' => "Internal",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
                $add_candidate_history = TicCandidateHistory::create(
                    [
                        "cloud_id" => Auth::user()->cloud_id,
                        "applied_job_id" => $get_job_details->job_id,
                        "applied_job_title" => $get_job_details->job_title,
                        "applied_company_name" => $get_job_details->job_company_name,
                        "applied_company_location" => $get_job_details->job_location,
                        "screen_id" =>  $get_screen_details->screen_id,
                        "applicant_id" => "0",
                        "candidate_id" => $get_screen_details->candidate_id,
                        "activity_type" => "Duplicate",
                        "activity_notes" => "Attempt to source request declined as the candidate is Duplicate - Source Validate",
                        "user_id" => Auth::user()->id,
                        "user_name" => Auth::user()->name,
                        "date" => today_date(),
                        "time" => today_time(),
                        "ip" => get_client_ip(),
                        "browser" => get_client_browser()
                    ]
                );
                $delete_old_screen_id_screening = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('screen_id', $screen_id)
                    ->delete();
                $delete_old_screen_id_candidate_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                    ->where('screen_id', $screen_id)
                    ->delete();
                return redirect()->back()->with('duplicate_candidate', "Duplicate Candidate Found");
            } else {
                // update candidate ,screening table 
                $update_candidate_master = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
                    ->where('candidate_id', $get_screen_details->candidate_id)
                    ->update(
                        [
                            'candidate_name' => $tic->modal_candidate_name,
                            'candidate_phone' => $tic->modal_candidate_mobile,
                            'candidate_email' => $tic->modal_candidate_email,
                        ]
                    );
                $update_candidate_screening = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('screen_id', $get_screen_details->screen_id)
                    ->update(
                        [
                            'candidate_name' => $tic->modal_candidate_name,
                            'candidate_phone' => $tic->modal_candidate_mobile,
                            'candidate_email' => $tic->modal_candidate_email,
                        ]
                    );
                $check_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                    ->where('r_summary_userid', Auth::user()->id)
                    ->where('r_job_id', $get_screen_details->job_id)
                    ->where('r_summary_dt', today_date())
                    ->first();
                // check if no call summary against this job with login user id
                if (!$check_call_summary) {
                    $add_call_summary = TicCandidateCallSummary::create(
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'r_summary_dt' => today_date(),
                            'r_summary_userid' => Auth::user()->id,
                            'r_job_id' => $get_screen_details->job_id,
                            'r_connected' => 0,
                            'r_validated' => 1,
                            'r_call_wait' => 0,
                            'r_switch_off' => 0,
                            'r_no_responce' => 0,
                            'r_not_reachable' => 0,
                            'r_not_inservice' => 0,
                            'r_dropped' => 0,
                            'r_today_total' => 1,
                            'r_redailed' => 0,
                        ]
                    );
                } else {
                    // $check_call_summary
                    $last_validate = $check_call_summary->r_validated;
                    $last_validate++;
                    $last_today_total = $check_call_summary->r_today_total;
                    $last_today_total++;
                    $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                        ->where('r_summary_userid', Auth::user()->id)
                        ->where('r_job_id', $get_screen_details->job_id)
                        ->where('r_summary_dt', today_date())
                        ->update(
                            [
                                'r_validated' => $last_validate,
                                'r_today_total' => $last_today_total
                            ]
                        );
                }


                $reverse_data = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                    ->where('screen_id', $screen_id)
                    ->first();
                $update_message = "Candidate Updated Successfully";
                return redirect()->back()->with(['update_message' => $update_message, 'reverse_data' => $reverse_data]);
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_pool_candidate_call($screen_id, $key = "")
    {

        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {

            $reverse_data = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $reverse_data->job_id)->first();
            return redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => 'pool']))->with(['reverse_data' => $reverse_data]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_pool_candidate_call_jdshare($screen_id, $key = "")
    {

        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // JD Share Email Logic Will Be Here 
            $reverse_data = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $reverse_data->job_id)->first();
            return redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => 'pool']))->with(['reverse_data' => $reverse_data]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function call_candidate_screening($screen_id, $job_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }

        // Crypt::encryptString($request->token)
        if (Auth::check()) {
            $screen_id = $screen_id;

            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_screen_details->job_id)->first();
            if ($get_job_details->question_set_id != "") {

                $get_questionnaire = TicQuestionnaireQuestions::where('cloud_id', Auth::user()->cloud_id)->where('question_set_id', $get_job_details->question_set_id)->get();
            } else {
                $get_questionnaire = array();
            }
            $check_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                ->where('r_summary_userid', Auth::user()->id)
                ->where('r_job_id', $get_screen_details->job_id)
                ->where('r_summary_dt', today_date())
                ->first();
            $get_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $get_screen_details->candidate_id)
                ->where('applied_job_id', $get_screen_details->job_id)
                ->where('screen_id', $get_screen_details->screen_id)
                ->orderBy('candidate_history_id', 'DESC')
                ->get();
            // check if no call summary against this job with login user id
            if (!$check_call_summary) {
                $add_call_summary = TicCandidateCallSummary::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'r_summary_dt' => today_date(),
                        'r_summary_userid' => Auth::user()->id,
                        'r_job_id' => $get_screen_details->job_id,
                        'r_connected' => 1,
                        'r_validated' => 0,
                        'r_call_wait' => 0,
                        'r_switch_off' => 0,
                        'r_no_responce' => 0,
                        'r_not_reachable' => 0,
                        'r_not_inservice' => 0,
                        'r_dropped' => 0,
                        'r_today_total' => 1,
                        'r_redailed' => 0,
                    ]
                );
            } else {
                // $check_call_summary
                $last_connected = $check_call_summary->r_connected;
                $last_connected++;
                $last_today_total = $check_call_summary->r_today_total;
                $last_today_total++;
                $update_call_summary = TicCandidateCallSummary::where('cloud_id', Auth::user()->cloud_id)
                    ->where('r_summary_userid', Auth::user()->id)
                    ->where('r_job_id', $get_screen_details->job_id)
                    ->where('r_summary_dt', today_date())
                    ->update(
                        [
                            'r_connected' => $last_connected,
                            'r_today_total' => $last_today_total
                        ]
                    );
            }
            // call_start_time_modal
            // ___________________________________________________________________________
            // Check if request coming from call validate modal
            $check_call_connected_summary = TicCandidateCallConnectedSummary::where('cloud_id', Auth::user()->cloud_id)
                ->where('user_id', Auth::user()->id)
                ->where('screen_id', $get_screen_details->screen_id)
                ->first();
            if (!$check_call_connected_summary) {

                $add_call_connected_summary = TicCandidateCallConnectedSummary::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'user_id' => Auth::user()->id,
                        'job_id' => $get_job_details->job_id,
                        'candidate_id' => $get_screen_details->candidate_id,
                        'screen_id' => $get_screen_details->screen_id,
                        'screen_status' => "",
                        'call_start_time' => today_time(),
                        'screen_type' => "Connected",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser()
                    ]
                );
                $connect_id = $add_call_connected_summary->connect_id;
            } else {
                $update_call_connected_summary = TicCandidateCallConnectedSummary::where('cloud_id', Auth::user()->cloud_id)
                    ->where('connect_id', $check_call_connected_summary->connect_id)
                    ->update([
                        'screen_type' => "Connected",
                    ]);
                $connect_id = $check_call_connected_summary->connect_id;
            }
            return view('admin.pages.call_candidate_screening')->with(compact('get_screen_details', 'job_id', 'get_history', 'connect_id', 'get_questionnaire'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function verify_candidate_email($job_id, $email, $screen_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id,)->first();
            $check_email_screen = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_email', $email)
                ->where('job_id', $job_id)
                ->whereNotIn('screen_id', [$screen_id])
                ->first();
            if ($check_email_screen) {
                $add_candidate_history = TicCandidateHistory::create(
                    [
                        "cloud_id" => Auth::user()->cloud_id,
                        "applied_job_id" => $job_id,
                        "screen_id" => $screen_id,
                        "applied_job_title" => $get_job_details->job_title,
                        "applied_company_name" => $get_job_details->job_company_name,
                        "applied_company_location" => $get_job_details->job_location,
                        "applicant_id" => "0",
                        "candidate_id" => $get_screen_details->candidate_id,
                        "activity_type" => "Manual Email Change Attempt",
                        "activity_notes" => "Recruiter tried to change the email but duplicate with candidate [ " . $check_email_screen->candidate_name . " ] ",
                        "user_id" => Auth::user()->id,
                        "user_name" => Auth::user()->name,
                        "date" => today_date(),
                        "time" => today_time(),
                        "ip" => get_client_ip(),
                        "browser" => get_client_browser()
                    ]
                );
                return "found";
            } else {
                return "not_found";
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function upload_resume(Request $tic)
    {
        // dd($tic);
        $new_file_name = "";
        // dd($tic);
        if ($tic->hasFile('file')) {
            $file = $tic->file('file')[0];
            $ext = $file->getClientOriginalExtension();
            $filename = $file->getClientOriginalName();
            $basename = basename($filename, "." . $ext);
            $new_file_name = $basename . "_" . str_replace('-', '', today_date_reverse()) . "_" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
            $file->move(public_path('candidate_resumes'), $new_file_name);
        }
        $update_candidate_resume = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
            ->where('candidate_id', $tic->candidate_id)
            ->update(
                [
                    'candidate_resume' => $new_file_name
                ]
            );
        $update_candidate_resume = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
            ->where('candidate_id', $tic->candidate_id)
            ->update(
                [
                    'candidate_resume' => $new_file_name
                ]
            );
        // return with file name 
        return response()->json([
            'filename' => $new_file_name,
            'status' => "success",
        ]);
    }
    public function update_resume_screening(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $new_file_name = "";
            // dd($tic);
            if ($tic->hasFile('update_resume_previous')) {
                $file = $tic->file('update_resume_previous');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $new_file_name = $basename . "_" . str_replace('-', '', today_date_reverse()) . "_" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('candidate_resumes'), $new_file_name);
            }
            $update_candidate_resume = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $tic->candidate_id_prev)
                ->update(
                    [
                        'candidate_resume' => $new_file_name
                    ]
                );
            $update_candidate_resume = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $tic->candidate_id_prev)
                ->update(
                    [
                        'candidate_resume' => $new_file_name
                    ]
                );
            // return with file name 
            return response()->json([
                'filename' => $new_file_name,
                'status' => "success",
            ]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function update_resume_screening_ajax(Request $tic){
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $new_file_name = "";
            // dd($tic);
            if ($tic->hasFile('update_resume_submit')) {
                $file = $tic->file('update_resume_submit');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $new_file_name = $basename . "_" . str_replace('-', '', today_date_reverse()) . "_" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('candidate_resumes'), $new_file_name);
            }
            $update_candidate_resume = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $tic->candidate_id_submit)
                ->update(
                    [
                        'candidate_resume' => $new_file_name
                    ]
                );
            $update_candidate_resume = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $tic->candidate_id_submit)
                ->update(
                    [
                        'candidate_resume' => $new_file_name
                    ]
                );
            // return with file name 
            return response()->json([
                'filename' => $new_file_name,
                'status' => "success",
            ]);
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function call_candidate_screening_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // dd($tic->call_start_time);
            $skills = "";
            foreach ($tic->skillset as $skill) {
                if ($skill != null) {
                    $skills = $skill . "," . $skills;
                }
            }
            $languages = "";
            foreach ($tic->language as $language) {
                if ($language != null) {
                    $languages = $language . "," . $languages;
                }
            }
            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $tic->screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $tic->job_id)->first();

            $get_dynamic_gender = isset($tic->candidate_gender) ? $tic->candidate_gender : "NA";

            // Update of Call Connected Summary 
            $update_call_connected_summary = TicCandidateCallConnectedSummary::where('cloud_id', Auth::user()->cloud_id)
                ->where('connect_id', $tic->connect_id)
                ->update(
                    [
                        'screen_status' => $tic->screen_status,
                        'call_end_time' => today_time(),
                    ]
                );

            // End of update of Call Connected Summary

            // For Duplicate Screening Table 
            $check_duplicate_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_email', $tic->candidate_email)
                ->where('job_id', $tic->job_id)
                ->whereNotIn('screen_id', [$tic->screen_id])
                ->first();
            // For Duplicate Applicant Table 
            $check_duplicate_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_email', $tic->candidate_email)
                ->where('job_id', $get_job_details->job_id)
                ->first();
            // dd($tic->screen_id);



            // If duplicacy found 
            if ($check_duplicate_screen_details || $check_duplicate_applicant_details) {
                return redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => "pool"]))->with('duplicate_candidate', "Duplicate Candidate Found");
            }
            // If no duplicacy found 
            else {

                // Master candidate database update check logic 
                $updatecandidatemaster = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
                    ->where('candidate_id', $get_screen_details->candidate_id)
                    ->update([
                        'candidate_name' => $tic->candidate_name,
                        'candidate_email' => $tic->candidate_email,
                        'candidate_phone' => $tic->candidate_phone,
                        'mobverifiedby_tic' => "Yes",
                        'candidate_alt_phone' => $tic->candidate_phone_alt1,
                        'candidate_dob' => $tic->candidate_dob,
                        'candidate_gender' => $tic->candidate_gender,
                        'candidate_location' => $tic->candidate_current_location,
                        'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                        'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                        'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                        'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                        'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                        'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                        'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                        'candidate_differently_abled' => $tic->candidate_differently_abled,
                        'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                        'candidate_language' =>  ucwords(rtrim($languages, ",")),
                        'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                        'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                        'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                        'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                        'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                        'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                        'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                        'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : "",
                        'last_modified' => today_date(),
                    ]);
                // End Master candidate database update check logic 

                //positive candidates applicant submit to quality
                $get_job_used_limit = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_screen_details->job_id)->first();
                $last_used_limit = $get_job_used_limit->job_used_cv_limit;
                if ($tic->screen_status == "Submitted To Quality") {

                    //update job limit
                    $update_job_limit = $last_used_limit + 1;
                    $update_job_used_limit = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_screen_details->job_id)
                        ->update([
                            'job_used_cv_limit' => $update_job_limit
                        ]);



                    //applicant create status=Quality Pending
                    $applicant_key = generate_applicant_key();
                    $add_new_applicant = TicCandidateApplicant::create(
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'applicant_key' => $applicant_key,
                            'candidate_id' => $get_screen_details->candidate_id,
                            'screen_id' => $get_screen_details->screen_id,
                            'job_id' => $get_screen_details->job_id,
                            'job_ownerid' => $get_screen_details->job_ownerid,
                            'recruiter' => Auth::user()->id,
                            'distbut_id' => "0",
                            'company_id' => "0",
                            'location_id' => $get_screen_details,
                            'applicant_status' => "Quality Pending",
                            'candidate_name' => $tic->candidate_name,
                            'candidate_email' => $tic->candidate_email,
                            'candidate_phone' => $tic->candidate_phone,
                            'candidate_alt_phone' => $tic->candidate_phone_alt1,
                            'candidate_dob' => $tic->candidate_dob,
                            'candidate_gender' => $tic->candidate_gender,
                            'candidate_location' => $tic->candidate_current_location,
                            'candidate_resume' => $get_screen_details->candidate_resume,
                            'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                            'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                            'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                            'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                            'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                            'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                            'candidate_language' =>  ucwords(rtrim($languages, ",")),
                            'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                            'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                            'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                            'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                            'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                            'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                            'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",

                        ]
                    );
                    //candidate history status =Submitted to quality
                    $add_candidate_history = TicCandidateHistory::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "applied_job_id" => $tic->job_id,
                            "applied_job_title" => $get_job_details->job_title,
                            "applied_company_name" => $get_job_details->job_company_name,
                            "applied_company_location" => $get_job_details->job_location,
                            "screen_id" => $add_new_applicant->screen_id,
                            "applicant_id" => $add_new_applicant->id,
                            "candidate_id" => $add_new_applicant->candidate_id,
                            "activity_type" => "Submitted to Quality",
                            "activity_notes" => $add_new_applicant->candidate_name . " has been moved for quality check",
                            "user_id" => Auth::user()->id,
                            "user_name" => Auth::user()->name,
                            "date" => today_date(),
                            "time" => today_time(),
                            "ip" => get_client_ip(),
                            "browser" => get_client_browser()
                        ]
                    );
                    //update screening status =Submitted to quality
                    $update_screen_status = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                        ->where('screen_id', $get_screen_details->screen_id)
                        ->update([
                            'candidate_name' => $tic->candidate_name,
                            'candidate_email' => $tic->candidate_email,
                            'candidate_phone' => $tic->candidate_phone,
                            'candidate_alt_phone' => $tic->candidate_phone_alt1,
                            'candidate_dob' => $tic->candidate_dob,
                            'candidate_gender' => $tic->candidate_gender,
                            'candidate_location' => $tic->candidate_current_location,
                            // 'candidate_address'=>$tic->,
                            'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                            'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                            'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                            'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                            'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                            'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                            'candidate_language' =>  ucwords(rtrim($languages, ",")),
                            'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                            'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                            'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                            'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                            'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                            'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                            'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                            'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : "",
                            'screen_status' => $tic->screen_status,
                        ]);
                }
                //positive candidates applicant submit to quality for other jobs
                elseif ($tic->screen_status == "Submit To Quality For Other Available Jobs") {
                    $update_job_limit = $last_used_limit + 1;
                    //update job limit
                    $update_job_used_limit = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_screen_details->job_id)
                        ->update([
                            'job_used_cv_limit' => $update_job_limit
                        ]);
                    //insert new screening Submitted to quality
                    $add_candidate_screening = TicCandidateScreening::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "job_id" => $tic->other_job_transfer,
                            "candidate_id" => $get_screen_details->candidate_id,
                            'candidate_name' => $tic->candidate_name,
                            'candidate_email' => $tic->candidate_email,
                            'candidate_phone' => $tic->candidate_phone,
                            'candidate_alt_phone' => $tic->candidate_alt_phone,
                            'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                            'candidate_location' => $tic->candidate_location,
                            'candidate_address' => $tic->candidate_address,
                            'candidate_gender' => $tic->candidate_gender,
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_resume' => $get_screen_details->candidate_resume,
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                            'candidate_language' =>  ucwords(rtrim($languages, ",")),
                            'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : null,
                            'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : null,
                            'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : null,
                            'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : null,
                            'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : null,
                            'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : null,
                            'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : null,
                            'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : null,
                            'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : null,
                            'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : null,
                            'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : null,
                            'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : null,
                            'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : null,
                            'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : null,
                            'candidate_job_profile' => isset($tic->job_profile[0]) ? $tic->job_profile[0] : null,
                            "job_ownerid" => get_job_ownerid($tic->other_job_transfer),
                            "recruiter" => $tic->user_id,
                            'source_from' => "Another Job",
                            "screen_status" => "Submitted to quality",
                            "date" => today_date(),
                            "time" => today_time()
                        ]
                    );
                    //applicant create status=Quality Pending 
                    $applicant_key = generate_applicant_key();
                    $add_new_applicant = TicCandidateApplicant::create(
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'applicant_key' => $applicant_key,
                            'candidate_id' => $add_candidate_screening->candidate_id,
                            'screen_id' => $add_candidate_screening->screen_id,
                            'job_id' => $add_candidate_screening->job_id,
                            'job_ownerid' => $add_candidate_screening->job_ownerid,
                            'recruiter' => Auth::user()->id,
                            'distbut_id' => "0",
                            'company_id' => "0",
                            'location_id' => "0",
                            'applicant_status' => "Quality Pending",
                            'candidate_name' => $tic->candidate_name,
                            'candidate_email' => $tic->candidate_email,
                            'candidate_phone' => $tic->candidate_phone,
                            'candidate_alt_phone' => $tic->candidate_phone_alt1,
                            'candidate_dob' => $tic->candidate_dob,
                            'candidate_gender' => $tic->candidate_gender,
                            'candidate_location' => $tic->candidate_current_location,
                            'candidate_resume' => $get_screen_details->candidate_resume,
                            'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                            'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                            'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                            'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                            'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                            'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                            'candidate_language' =>  ucwords(rtrim($languages, ",")),
                            'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                            'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                            'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                            'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                            'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                            'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                            'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                            // 'candidate_notice_period' => $tic->notice_period[0],
                        ]
                    );
                    //candidate history status =Submitted to quality . //  H.notes : Was added and submitted through different old job id with details
                    $add_candidate_history = TicCandidateHistory::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "applied_job_id" => $tic->job_id,
                            "applied_job_title" => $get_job_details->job_title,
                            "applied_company_name" => $get_job_details->job_company_name,
                            "applied_company_location" => $get_job_details->job_location,
                            "screen_id" => $add_new_applicant->screen_id,
                            "applicant_id" => $add_new_applicant->applicant_id,
                            "candidate_id" => $add_new_applicant->candidate_id,
                            "activity_type" => "Submitted to Quality",
                            "activity_notes" => $add_new_applicant->candidate_name . " Was added and submitted through different old job id with details",
                            "user_id" => Auth::user()->id,
                            "user_name" => Auth::user()->name,
                            "date" => today_date(),
                            "time" => today_time(),
                            "ip" => get_client_ip(),
                            "browser" => get_client_browser()
                        ]
                    );
                    //update existing(old) screening - status = Not-Interested
                    $update_screen_status = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                        ->where('screen_id', $get_screen_details->screen_id)
                        ->update([
                            'candidate_name' => $tic->candidate_name,
                            'candidate_email' => $tic->candidate_email,
                            'candidate_phone' => $tic->candidate_phone,
                            'candidate_alt_phone' => $tic->candidate_phone_alt1,
                            'candidate_dob' => $tic->candidate_dob,
                            'candidate_gender' => $tic->candidate_gender,
                            'candidate_location' => $tic->candidate_current_location,
                            // 'candidate_address'=>$tic->,
                            'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                            'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                            'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                            'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                            'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                            'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                            'candidate_language' =>  ucwords(rtrim($languages, ",")),
                            'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                            'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                            'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                            'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                            'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                            'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                            'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                            'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : "",
                            'screen_status' => "Not-Interested",
                        ]);

                    //candidate screening history : Candidate marked as not interested as has been offered for another role (New Job Id Details)
                    $add_candidate_history = TicCandidateHistory::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "applied_job_id" => $tic->job_id,
                            "applied_job_title" => $get_job_details->job_title,
                            "applied_company_name" => $get_job_details->job_company_name,
                            "applied_company_location" => $get_job_details->job_location,
                            "screen_id" => $get_screen_details->screen_id,
                            "applicant_id" => $add_new_applicant->applicant_id,
                            "candidate_id" => $get_screen_details->candidate_id,
                            "activity_type" => "Moved to other jobs",
                            "activity_notes" => "Candidate marked as not interested as has been offered for another role (New Job Id Details)",
                            "user_id" => Auth::user()->id,
                            "user_name" => Auth::user()->name,
                            "date" => today_date(),
                            "time" => today_time(),
                            "ip" => get_client_ip(),
                            "browser" => get_client_browser()
                        ]
                    );
                }
                //negative candidates only update screen table and history table
                else {
                    $update_candidate_screening = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                        ->where('screen_id', $tic->screen_id)
                        ->update(
                            [

                                'candidate_name' => $tic->candidate_name,
                                'candidate_email' => $tic->candidate_email,
                                'candidate_phone' => $tic->candidate_phone,
                                'candidate_alt_phone' => $tic->candidate_phone_alt1,
                                'candidate_dob' => $tic->candidate_dob,
                                'candidate_gender' => $tic->candidate_gender,
                                'candidate_location' => $tic->candidate_current_location,
                                'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                                'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                                'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                                'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                                'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                                'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                                'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                                'candidate_differently_abled' => $tic->candidate_differently_abled,
                                'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                                'candidate_language' =>  ucwords(rtrim($languages, ",")),
                                'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                                'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                                'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                                'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                                'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                                'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                                'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                                'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : "",
                                'screen_status' => $tic->screen_status,

                            ]
                        );
                    $add_candidate_history = TicCandidateHistory::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "applied_job_id" => $tic->job_id,
                            "applied_job_title" => $get_job_details->job_title,
                            "applied_company_name" => $get_job_details->job_company_name,
                            "applied_company_location" => $get_job_details->job_location,
                            "screen_id" => $get_screen_details->screen_id,
                            "applicant_id" => "0",
                            "candidate_id" => $get_screen_details->candidate_id,
                            "activity_type" => $tic->screen_status,
                            "activity_notes" => $tic->remark_notes,
                            "user_id" => Auth::user()->id,
                            "user_name" => Auth::user()->name,
                            "date" => today_date(),
                            "time" => today_time(),
                            "ip" => get_client_ip(),
                            "browser" => get_client_browser()
                        ]
                    );
                    if ($tic->screen_status == "Received By Others") {
                        if (isset($tic->refered_by)) {
                            //insert into candidate reference tab
                            //create new screening id with old details with new number
                            //insert into candidate history
                        }
                    }
                }
                return redirect()->back()->with('success_submit', 'submitted');
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function candidate_quality_approve_check($applicant_key, $job_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }

        // Crypt::encryptString($request->token)
        if (Auth::check()) {

            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('applicant_key', $applicant_key)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_applicant_details->job_id)->first();
            if ($get_job_details->question_set_id != "") {

                $get_questionnaire = TicQuestionnaireQuestions::where('cloud_id', Auth::user()->cloud_id)->where('question_set_id', $get_job_details->question_set_id)->get();
            } else {
                $get_questionnaire = array();
            }
            $get_history = TicCandidateHistory::where('cloud_id', Auth::user()->cloud_id)
                ->where('candidate_id', $get_applicant_details->candidate_id)
                ->where('applied_job_id', $get_applicant_details->job_id)
                ->where('screen_id', $get_applicant_details->screen_id)
                ->orderBy('candidate_history_id', 'DESC')
                ->get();
            $connect_id = "";
            return view('admin.pages.candidate_quality_approve_check')->with(compact('get_applicant_details', 'job_id', 'get_history', 'connect_id', 'get_questionnaire'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function candidate_quality_approve_check_post(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $skills = "";
            foreach ($tic->skillset as $skill) {
                if ($skill != null) {
                    $skills = $skill . "," . $skills;
                }
            }
            $languages = "";
            foreach ($tic->language as $language) {
                if ($language != null) {
                    $languages = $language . "," . $languages;
                }
            }
            $get_screen_details = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $tic->screen_id)
                ->first();
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $tic->job_id)->first();
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $tic->screen_id)
                ->first();
            $get_dynamic_gender = isset($tic->candidate_gender) ? $tic->candidate_gender : "NA";
            $update_screen_status = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $get_screen_details->screen_id)
                ->update([
                    'candidate_name' => $tic->candidate_name,
                    'candidate_email' => $tic->candidate_email,
                    'candidate_phone' => $tic->candidate_phone,
                    'candidate_alt_phone' => $tic->candidate_phone_alt1,
                    'candidate_dob' => $tic->candidate_dob,
                    'candidate_gender' => $tic->candidate_gender,
                    'candidate_location' => $tic->candidate_current_location,
                    'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                    'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                    'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                    'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                    'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                    'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                    'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                    'candidate_differently_abled' => $tic->candidate_differently_abled,
                    'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                    'candidate_language' =>  ucwords(rtrim($languages, ",")),
                    'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                    'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                    'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                    'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                    'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                    'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                    'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                    'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : "",
                    'screen_status' => "Quality Approved",
                ]);
            $update_applicant_status = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $get_screen_details->screen_id)
                ->update([
                    'candidate_name' => $tic->candidate_name,
                    'candidate_email' => $tic->candidate_email,
                    'candidate_phone' => $tic->candidate_phone,
                    'candidate_alt_phone' => $tic->candidate_phone_alt1,
                    'candidate_dob' => $tic->candidate_dob,
                    'candidate_gender' => $tic->candidate_gender,
                    'candidate_location' => $tic->candidate_current_location,
                    'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : "",
                    'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : "",
                    'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : "",
                    'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : "",
                    'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : "",
                    'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : "",
                    'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                    'candidate_differently_abled' => $tic->candidate_differently_abled,
                    'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                    'candidate_language' =>  ucwords(rtrim($languages, ",")),
                    'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : "",
                    'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : "",
                    'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : "",
                    'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : "",
                    'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : "",
                    'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : "",
                    'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : "",
                    // 'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : "",
                    'applicant_status' => "Submitted",
                ]);



            $add_candidate_history = TicCandidateHistory::create(
                [
                    "cloud_id" => Auth::user()->cloud_id,
                    "applied_job_id" => $tic->job_id,
                    "applied_job_title" => $get_job_details->job_title,
                    "applied_company_name" => $get_job_details->job_company_name,
                    "applied_company_location" => $get_job_details->job_location,
                    "screen_id" => $get_screen_details->screen_id,
                    "applicant_id" => $get_applicant_details->applicant_id,
                    "candidate_id" => $get_applicant_details->candidate_id,
                    "activity_type" => "Submitted",
                    "activity_notes" => "Candidate moved to submitted",
                    "user_id" => Auth::user()->id,
                    "user_name" => Auth::user()->name,
                    "date" => today_date(),
                    "time" => today_time(),
                    "ip" => get_client_ip(),
                    "browser" => get_client_browser()
                ]
            );
            return redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => 'submitted']));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function applicant_quality_reject($job_id, $screen_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_code', $job_id)->first();
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $update_applicant_status = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_job_details->job_id)
                ->where('screen_id', $screen_id)
                ->update([
                    'applicant_status' => "Quality Rejected"
                ]);
            $update_screening_status = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_job_details->job_id)
                ->where('screen_id', $screen_id)
                ->update([
                    'screen_status' => "Quality Rejected"
                ]);
            $add_candidate_history = TicCandidateHistory::create(
                [
                    "cloud_id" => Auth::user()->cloud_id,
                    "applied_job_id" => $get_job_details->job_id,
                    "applied_job_title" => $get_job_details->job_title,
                    "applied_company_name" => $get_job_details->job_company_name,
                    "applied_company_location" => $get_job_details->job_location,
                    "screen_id" => $screen_id,
                    "applicant_id" => $get_applicant_details->id,
                    "candidate_id" => $get_applicant_details->candidate_id,
                    "activity_type" => "Quality Rejected",
                    "activity_notes" => $get_applicant_details->candidate_name . " has been marked as quality reject by " . Auth::user()->name,
                    "user_id" => Auth::user()->id,
                    "user_name" => Auth::user()->name,
                    "date" => today_date(),
                    "time" => today_time(),
                    "ip" => get_client_ip(),
                    "browser" => get_client_browser()
                ]
            );
            return redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => "pool"]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function applicant_quality_duplicate($job_id, $screen_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_job_details = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_code', $job_id)->first();
            $get_applicant_details = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('screen_id', $screen_id)
                ->first();
            $update_applicant_status = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_job_details->job_id)
                ->where('screen_id', $screen_id)
                ->update([
                    'applicant_status' => "Quality Duplicate"
                ]);
            $update_screening_status = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
                ->where('job_id', $get_job_details->job_id)
                ->where('screen_id', $screen_id)
                ->update([
                    'screen_status' => "Quality Duplicate"
                ]);
            $add_candidate_history = TicCandidateHistory::create(
                [
                    "cloud_id" => Auth::user()->cloud_id,
                    "applied_job_id" => $get_job_details->job_id,
                    "applied_job_title" => $get_job_details->job_title,
                    "applied_company_name" => $get_job_details->job_company_name,
                    "applied_company_location" => $get_job_details->job_location,
                    "screen_id" => $screen_id,
                    "applicant_id" => $get_applicant_details->id,
                    "candidate_id" => $get_applicant_details->candidate_id,
                    "activity_type" => "Quality Duplicate",
                    "activity_notes" => $get_applicant_details->candidate_name . " has been marked as quality duplicate by " . Auth::user()->name,
                    "user_id" => Auth::user()->id,
                    "user_name" => Auth::user()->name,
                    "date" => today_date(),
                    "time" => today_time(),
                    "ip" => get_client_ip(),
                    "browser" => get_client_browser()
                ]
            );
            return redirect()->to(route('view_job_details_tab', ['jobid' => $get_job_details->job_code, 'ctab' => "pool"]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_applicant($applicant_key)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
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
            return view('admin.pages.view_applicant')->with(compact('get_applicant_details', 'get_jobowner_details', 'get_history'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_applicant_update_submittal($applicant_key)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
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
            return view('admin.pages.update_submitted_applicant')->with(compact('get_applicant_details', 'get_jobowner_details', 'get_history'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_single_candidates(Request $tic)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // dd($tic);
            $check_duplicate_master_candidate = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $tic->candidate_email)->first();
            $check_duplicate_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $tic->candidate_email)->where('job_id', $tic->job_id)->first();
            $check_duplicate_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $tic->candidate_email)->where('job_id', $tic->job_id)->first();

            $get_job_details = get_job_details($tic->job_id);
            $tmp_file_candidate_name = str_replace(" ", "", substr($tic->candidate_name, 0, 11));
            $tmp_file_job_loc_name = str_replace(" ", "", substr($get_job_details->job_location, 0, 8));
            $candidate_file_name = $tmp_file_candidate_name . "_" . $tmp_file_job_loc_name;
            if ($check_duplicate_candidate) {
                $get_screen_id = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $tic->job_id)->where('candidate_id', $check_duplicate_candidate->candidate_id)->first();
            }
            if ($check_duplicate_applicant) {
                $get_applicant_id = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $tic->job_id)->where('candidate_id', $check_duplicate_applicant->candidate_id)->first();
            }
            $skills = "";
            foreach ($tic->skillset as $skill) {
                if ($skill != null) {
                    $skills = $skill . "," . $skills;
                }
            }
            $languages = "";
            foreach ($tic->language as $language) {
                if ($language != null) {
                    $languages = $language . "," . $languages;
                }
            }

            #Initial Checkpoint if no job selected
            if (!isset($tic->job_id)) {
                if (!$check_duplicate_master_candidate) {
                    $candidate_key = generate_candidate_key();
                    $new_file_name = "";
                    if ($tic->hasFile('file')) {
                        $file = $tic->file('file');
                        $ext = $file->getClientOriginalExtension();
                        $filename = $file->getClientOriginalName();
                        $basename = basename($filename, "." . $ext);
                        $new_file_name = $candidate_file_name . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                        $file->move(public_path('candidate_resumes'), $new_file_name);
                    }

                    $add_candidate_master = TicCandidateMaster::create(
                        [
                            'candidate_key' => $candidate_key,
                            'cloud_id' => Auth::user()->cloud_id,
                            'candidate_name' => $tic->candidate_name,
                            'candidate_email' => $tic->candidate_email,
                            'candidate_phone' => $tic->candidate_phone,
                            'candidate_alt_phone' => $tic->candidate_alt_phone,
                            'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                            'candidate_location' => $tic->candidate_location,
                            'candidate_address' => $tic->candidate_address,
                            'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                            'candidate_differently_abled' => $tic->candidate_differently_abled,
                            'candidate_resume' => $new_file_name,
                            'candidate_skillset' => $skills,
                            'candidate_language' => $languages,
                            'created_date' => today_date(),
                            'created_time' => today_time(),
                            'last_modified' => today_date(),
                            'total_job_offers_count' => "0",
                            'total_job_applied_count' => "0",
                        ]
                    );
                    echo "Inserted";
                } else {
                    $get_resume = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $tic->candidate_email)->first();
                    $new_file_name = $get_resume->candidate_resume;

                    if ($tic->hasFile('file')) {
                        $file = $tic->file('file');
                        $ext = $file->getClientOriginalExtension();
                        $filename = $file->getClientOriginalName();
                        $basename = basename($filename, "." . $ext);
                        $new_file_name = $candidate_file_name . "_" . str_replace('-', '', today_date_reverse()) . "_" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                        $file->move(public_path('candidate_resumes'), $new_file_name);
                    }
                    $update_candidate_master = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
                        ->where('candidate_email', $tic->candidate_email)
                        ->update(
                            [
                                'candidate_name' => $tic->candidate_name,
                                'candidate_email' => $tic->candidate_email,
                                'candidate_phone' => $tic->candidate_phone,
                                'candidate_alt_phone' => $tic->candidate_alt_phone,
                                'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                                'candidate_location' => $tic->candidate_location,
                                'candidate_address' => $tic->candidate_address,
                                'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                                'candidate_differently_abled' => $tic->candidate_differently_abled,
                                'candidate_resume' => $new_file_name,
                                'last_modified' => today_date()
                            ]
                        );
                    echo "Inserted";
                }
            }
            #End of Initial Checkpoint

            else {
                // # CHECKPOINT :-Statement for duplicate candidate check 
                // # CHECKPOINT :-Statement for duplicate source summary check 
                $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                    ->where('u_id', $tic->user_id)
                    ->where('job_id', $tic->job_id)
                    ->where('date', today_date())
                    ->first();

                // # CHECKPOINT :-If duplicate candidate not found 

                if (!($check_duplicate_candidate || $check_duplicate_applicant)) {
                    // # CHECKPOINT :-If source with userid and job id not found 
                    if (!$check_source_summary) {
                        $candidate_key = generate_candidate_key();
                        $new_file_name = "";
                        if ($tic->hasFile('file')) {
                            $file = $tic->file('file');
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = "akash.pdf";
                            // $new_file_name = $candidate_file_name . "_" . str_replace('-', '', today_date_reverse()) . "_" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                        }
                        $add_candidate_master = TicCandidateMaster::create(
                            [
                                'candidate_key' => $candidate_key,
                                'cloud_id' => Auth::user()->cloud_id,
                                'candidate_name' => $tic->candidate_name,
                                'candidate_email' => $tic->candidate_email,
                                'candidate_phone' => $tic->candidate_phone,
                                'candidate_alt_phone' => $tic->candidate_alt_phone,
                                'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                                'candidate_location' => $tic->candidate_location,
                                'candidate_address' => $tic->candidate_address,
                                'candidate_gender' => $tic->candidate_gender,
                                'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                                'candidate_differently_abled' => $tic->candidate_differently_abled,
                                'candidate_resume' => $new_file_name,
                                'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                                'candidate_language' =>  ucwords(rtrim($languages, ",")),
                                'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : null,
                                'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : null,
                                'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : null,
                                'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : null,
                                'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : null,
                                'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : null,
                                'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : null,
                                'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : null,
                                'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : null,
                                'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : null,
                                'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : null,
                                'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : null,
                                'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : null,
                                'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : null,
                                'candidate_job_profile' => isset($tic->job_profile[0]) ? $tic->job_profile[0] : null,
                                'created_date' => today_date(),
                                'created_time' => today_time(),
                                'last_modified' => today_date(),
                                'total_job_offers_count' => "0",
                                'total_job_applied_count' => "0",
                            ]
                        );

                        $add_candidate_screening = TicCandidateScreening::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "job_id" => $tic->job_id,
                                "candidate_id" => $add_candidate_master->candidate_id,
                                'candidate_name' => $tic->candidate_name,
                                'candidate_email' => $tic->candidate_email,
                                'candidate_phone' => $tic->candidate_phone,
                                'candidate_alt_phone' => $tic->candidate_alt_phone,
                                'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                                'candidate_location' => $tic->candidate_location,
                                'candidate_address' => $tic->candidate_address,
                                'candidate_gender' => $tic->candidate_gender,
                                'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                                'candidate_differently_abled' => $tic->candidate_differently_abled,
                                'candidate_resume' => $new_file_name,
                                'candidate_skillset' =>  ucwords(rtrim($skills, ",")),
                                'candidate_language' =>  ucwords(rtrim($languages, ",")),
                                'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : null,
                                'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : null,
                                'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : null,
                                'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : null,
                                'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : null,
                                'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : null,
                                'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : null,
                                'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : null,
                                'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : null,
                                'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : null,
                                'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : null,
                                'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : null,
                                'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : null,
                                'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : null,
                                'candidate_job_profile' => isset($tic->job_profile[0]) ? $tic->job_profile[0] : null,
                                "job_ownerid" => get_job_ownerid($tic->job_id),
                                "recruiter" => $tic->user_id,
                                'source_from' => $tic->source_name,
                                "screen_status" => "Sourced",
                                "date" => today_date(),
                                "time" => today_time()
                            ]
                        );



                        $add_candidate_history = TicCandidateHistory::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "applied_job_id" => $tic->job_id,
                                "applied_job_title" => $get_job_details->job_title,
                                "applied_company_name" => $get_job_details->job_company_name,
                                "applied_company_location" => $get_job_details->job_location,
                                "screen_id" => $add_candidate_screening->screen_id,
                                "applicant_id" => "0",
                                "candidate_id" => $add_candidate_master->candidate_id,
                                "activity_type" => "Sourced",
                                "activity_notes" => "Candidate sourced by Add Single Manually",
                                "user_id" => Auth::user()->id,
                                "user_name" => Auth::user()->name,
                                "date" => today_date(),
                                "time" => today_time(),
                                "ip" => get_client_ip(),
                                "browser" => get_client_browser()
                            ]
                        );

                        $add_source_summary = TicCandidateSourceSummary::create(
                            [
                                'cloud_id' => Auth::user()->cloud_id,
                                'job_id' => $tic->job_id,
                                'u_id' => $tic->user_id,
                                'date' => today_date(),
                                'time' => today_time(),
                                'add_candidate' => "1",
                                'add_reference' => "",
                                'total_sourced' => "1"
                            ]
                        );
                        echo "Inserted";
                    }
                    // # CHECKPOINT :-If source with userid and job id found 
                    else {

                        $candidate_key = generate_candidate_key();
                        $new_file_name = "";
                        if ($tic->hasFile('file')) {
                            $file = $tic->file('file');
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);

                            $new_file_name = $candidate_file_name . "_" . str_replace('-', '', today_date_reverse()) . "_" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                        }
                        $add_candidate_master = TicCandidateMaster::create(
                            [
                                'candidate_key' => $candidate_key,
                                'cloud_id' => Auth::user()->cloud_id,
                                'candidate_name' => $tic->candidate_name,
                                'candidate_email' => $tic->candidate_email,
                                'candidate_phone' => $tic->candidate_phone,
                                'candidate_alt_phone' => $tic->candidate_alt_phone,
                                'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                                'candidate_location' => $tic->candidate_location,
                                'candidate_address' => $tic->candidate_address,
                                'candidate_gender' => $tic->candidate_gender,
                                'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                                'candidate_differently_abled' => $tic->candidate_differently_abled,
                                'candidate_resume' => $new_file_name,
                                'candidate_skillset' =>  ucwords(rtrim($skills)),
                                'candidate_language' =>  ucwords(rtrim($languages)),
                                'candidate_high_qual' => isset($tic->qualification[0]) ? $tic->qualification[0] : null,
                                'candidate_specialization' => isset($tic->specialization[0]) ? $tic->specialization[0] : null,
                                'candidate_course_type' => isset($tic->course_type[0]) ? $tic->course_type[0] : null,
                                'candidate_university' => isset($tic->institute[0]) ? $tic->institute[0] : null,
                                'candidate_percentage' => isset($tic->percentage[0]) ? $tic->percentage[0] : null,
                                'candidate_passing_year' => isset($tic->passing_year[0]) ? $tic->passing_year[0] : null,
                                'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : null,
                                'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : null,
                                'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : null,
                                'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : null,
                                'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : null,
                                'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : null,
                                'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : null,
                                'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : null,
                                'candidate_job_profile' => isset($tic->job_profile[0]) ? $tic->job_profile[0] : null,
                                'created_date' => today_date(),
                                'created_time' => today_time(),
                                'last_modified' => today_date(),
                                'total_job_offers_count' => "0",
                                'total_job_applied_count' => "0",
                            ]
                        );
                        $add_candidate_screening = TicCandidateScreening::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "job_id" => $tic->job_id,
                                "candidate_id" => $add_candidate_master->candidate_id,
                                'candidate_name' => $tic->candidate_name,
                                'candidate_email' => $tic->candidate_email,
                                'candidate_phone' => $tic->candidate_phone,
                                'candidate_alt_phone' => $tic->candidate_alt_phone,
                                'candidate_dob' => $tic->candidate_dob == "" ? "0000-00-00" : date("Y-m-d", strtotime($tic->candidate_dob)),
                                'candidate_location' => $tic->candidate_location,
                                'candidate_address' => $tic->candidate_address,
                                'candidate_gender' => $tic->candidate_gender,
                                'candidate_affrimative_action' => $tic->candidate_affrimative_action,
                                'candidate_differently_abled' => $tic->candidate_differently_abled,
                                'candidate_resume' => $new_file_name,
                                'candidate_skillset' =>  ucwords(rtrim($skills)),
                                'candidate_language' =>  ucwords(rtrim($languages)),
                                'candidate_high_qual' => $tic->qualification[0],
                                'candidate_specialization' => $tic->specialization[0],
                                'candidate_course_type' => $tic->course_type[0],
                                'candidate_university' => $tic->institute[0],
                                'candidate_percentage' => $tic->percentage[0],
                                'candidate_passing_year' => $tic->passing_year[0],
                                'candidate_employer_name' => isset($tic->employer_name[0]) ? $tic->employer_name[0] : null,
                                'candidate_employer_type' => isset($tic->employee_type[0]) ? $tic->employee_type[0] : null,
                                'candidate_designation' => isset($tic->designation[0]) ? $tic->designation[0] : null,
                                'candidate_duration_month_from' => isset($tic->duration_month_from[0]) ? $tic->duration_month_from[0] : null,
                                'candidate_duration_year_from' => isset($tic->duration_year_from[0]) ? $tic->duration_year_from[0] : null,
                                'candidate_duration_month_to' => isset($tic->duration_month_to[0]) ? $tic->duration_month_to[0] : null,
                                'candidate_duration_year_to' => isset($tic->duration_year_to[0]) ? $tic->duration_year_to[0] : null,
                                'candidate_notice_period' => isset($tic->notice_period[0]) ? $tic->notice_period[0] : null,
                                'candidate_job_profile' => isset($tic->job_profile[0]) ? $tic->job_profile[0] : null,
                                "job_ownerid" => get_job_ownerid($tic->job_id),
                                "recruiter" => $tic->user_id,
                                'source_from' => $tic->source_name,
                                "screen_status" => "Sourced",
                                "date" => today_date(),
                                "time" => today_time()
                            ]
                        );

                        $add_candidate_history = TicCandidateHistory::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "applied_job_id" => $tic->job_id,
                                "applied_job_title" => $get_job_details->job_title,
                                "applied_company_name" => $get_job_details->job_company_name,
                                "applied_company_location" => $get_job_details->job_location,
                                "screen_id" => $add_candidate_screening->screen_id,
                                "applicant_id" => "0",
                                "candidate_id" => $add_candidate_master->candidate_id,
                                "activity_type" => "Sourced",
                                "activity_notes" => "Candidate sourced by Add Single Manually",
                                "user_id" => Auth::user()->id,
                                "user_name" => Auth::user()->name,
                                "date" => today_date(),
                                "time" => today_time(),
                                "ip" => get_client_ip(),
                                "browser" => get_client_browser()
                            ]
                        );

                        #update source summary table
                        $get_source_summary = get_source_summary_details($tic->job_id, $tic->user_id);
                        $last_add_candidate_count = $get_source_summary->add_candidate;
                        $incremented_add_candidate_count = $last_add_candidate_count + 1;
                        $total_sourced = $incremented_add_candidate_count + $get_source_summary->add_from_excel + $get_source_summary->add_from_resume + $get_source_summary->add_from_db;
                        TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                            ->where('u_id', $tic->user_id)
                            ->where('job_id', $tic->job_id)
                            ->where('date', today_date())
                            ->update(
                                [
                                    'add_candidate' => $incremented_add_candidate_count,
                                    'date' => today_date(),
                                    'time' => today_time(),
                                    'total_sourced' => $total_sourced
                                ]
                            );
                        echo "Inserted";
                    }
                }

                // # CHECKPOINT :-If duplicate candidate found 
                if ($check_duplicate_candidate || $check_duplicate_applicant) {
                    $screen_id = "0";
                    $applicant_id = "0";
                    if ($check_duplicate_candidate) {
                        $duplicate_source_with = $get_screen_id->screen_id;
                        $duplicate_source_name = "Screening";
                        $screen_id = $get_screen_id->screen_id;
                    } elseif ($check_duplicate_applicant) {
                        $duplicate_source_with = $get_applicant_id->applicant_id;
                        $duplicate_source_name = "Applicant";
                        $applicant_id = $get_applicant_id->applicant_id;
                    } else {
                        $duplicate_source_with = "0";
                        $duplicate_source_name = "Error";
                    }
                    TicCandidateDuplicateLog::create(
                        [
                            'cloud_id' => Auth::user()->cloud_id,
                            'user_id' => Auth::user()->id,
                            'user_name' => Auth::user()->name,
                            'job_id' => $tic->job_id,
                            'duplicate_name' => $tic->candidate_name,
                            'duplicate_email' => $tic->candidate_email,
                            'duplicate_phone' => $tic->candidate_phone,
                            'duplicate_with' => $duplicate_source_with,
                            'duplicate_from' => "Add Candidate Manually",
                            'duplicate_source' => $duplicate_source_name,
                            'date' => today_date(),
                            'time' => today_time(),
                            'ip' => get_client_ip(),
                            'browser' => get_client_browser(),
                        ]
                    );
                    $add_candidate_history = TicCandidateHistory::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "applied_job_id" => $tic->job_id,
                            "applied_job_title" => $get_job_details->job_title,
                            "applied_company_name" => $get_job_details->job_company_name,
                            "applied_company_location" => $get_job_details->job_location,
                            "screen_id" => $screen_id,
                            "applicant_id" => $applicant_id,
                            "candidate_id" => $check_duplicate_candidate->candidate_id,
                            "activity_type" => "Duplicate",
                            "activity_notes" => "Attempt to source request declined as the candidate is Duplicate - Source Single Add",
                            "user_id" => Auth::user()->id,
                            "user_name" => Auth::user()->name,
                            "date" => today_date(),
                            "time" => today_time(),
                            "ip" => get_client_ip(),
                            "browser" => get_client_browser()
                        ]
                    );

                    // later work on part on Master Candidate update algorithm
                    // $update_candidate_details = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)
                    //     ->where('candidate_id', $check_duplicate_candidate->candidate_id)
                    //     ->update(
                    //         [
                    //             'candidate_phone' => $tic->candidate_phone
                    //         ]
                    //     );
                    return "exist";
                }
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_candidate_from_resume($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                return view('admin.pages.candidate_import_from_resume')->with(compact('job_id'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function parse_candidate_from_resume(Request $tic)
    {
        // dd($tic->all());
        // return Redirect::route('view_parsed_candidate_details')->withInput();
        // ->withInput();
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // global variable for this method 
            $get_job_details = get_job_code_details($tic->job_id);
            $job_id = $tic->job_id;
            $all_canditates_received = 0;
            $total_candidate_sourced = 0;
            $total_candidate_duplicate = 0;
            $invalid_email_id = 0;
            $invalid_mobile_no = 0;
            $neither_email_nor_phone_no = 0;
            // end  of global variable for this method
            $tmp_loop_id = Str::random('20');

            foreach ($tic->file('file') as $file) {

                $all_canditates_received++;
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                if ($file->getClientOriginalExtension() === "pdf") {
                    $email = array();
                    $phone = array();
                    $full_name = array();
                    $parser = new \Smalot\PdfParser\Parser();
                    $pdf = $parser->parseFile($file);
                    $textContent = $pdf->getText();
                    $pdfText1 = nl2br($textContent);
                    $pdfText = trim(preg_replace('/\t/', '', $pdfText1));
                    $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
                    preg_match_all($test_patt, $pdfText, $email1);
                    foreach ($email1[0] as $mail) {
                        $email[] = $mail;
                    }
                    $test_phone = '/\b[0-9]{3}\s*[-]?\s*[0-9]{3}\s*[-]?\s*[0-9]{4}\b/';
                    preg_match_all($test_phone, $pdfText, $phone1);
                    foreach ($phone1[0] as $phone2) {
                        $phone[] = $phone2;
                    }
                    $words = explode(" ", $pdfText);
                    if (count($words) >= 2) {

                        $firstname = $words[0];
                        $lastname = $words[1];
                        $full_name[] = $firstname . " " . $lastname;
                    } else {
                        $full_name[0] = "";
                    }
                    // var_dump($email);
                    // full_name,phone,email
                    // Logical Insertion Start 


                    $validate_mobile_no = false;
                    $validate_email_id = false;


                    if (preg_match('/^[0-9]{10}+$/', str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', isset($phone[0]) ? $phone[0] : ""))) {
                        $validate_mobile_no = true;
                        $filtered_mobile_no = str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', $phone[0]);
                    } else {
                        $filtered_mobile_no = "";
                        $invalid_mobile_no++;
                    }
                    if (filter_var(isset($email[0]) ? $email[0] : "", FILTER_VALIDATE_EMAIL)) {
                        $validate_email_id = true;
                        $filtered_email_id = strtolower($email[0]);
                    } else {
                        $filtered_email_id = "";
                        $invalid_email_id++;
                    }

                    // check if both email and phone is blank
                    if (trim($filtered_email_id) != "") {

                        if ($validate_mobile_no || $validate_email_id) {

                            $check_duplicate_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $filtered_email_id)->where('job_id', $get_job_details->job_id)->first();
                            $check_duplicate_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $filtered_email_id)->where('job_id', $get_job_details->job_id)->first();

                            if ($check_duplicate_candidate) {

                                $get_screen_id = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_job_details->job_id)->where('candidate_id', $check_duplicate_candidate->candidate_id)->first();
                            }
                            // # CHECKPOINT :-Statement for duplicate candidate check 
                            // # CHECKPOINT :-Statement for duplicate source summary check 
                            $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                ->where('u_id', Auth::user()->id)
                                ->where('job_id', $get_job_details->job_id)
                                ->where('date', today_date())
                                ->first();
                            // // dd($check_source_summary);
                            // // // # CHECKPOINT :-If duplicate candidate not found 
                            if (!$check_duplicate_candidate) {
                                // # CHECKPOINT :-If source with userid and job id not found 
                                if (!$check_source_summary) {
                                    $candidate_key = generate_candidate_key();
                                    $new_file_name = "";
                                    $ext = $file->getClientOriginalExtension();
                                    $filename = $file->getClientOriginalName();
                                    $basename = basename($filename, "." . $ext);
                                    $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    $file->move(public_path('candidate_resumes'), $new_file_name);
                                    $add_candidate_master = TicCandidateMaster::create(
                                        [
                                            'candidate_key' => $candidate_key,
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            'last_hold_loop' => $tmp_loop_id,
                                            'created_date' => today_date(),
                                            'created_time' => today_time(),
                                            'last_modified' => today_date(),
                                            'total_job_offers_count' => "0",
                                            'total_job_applied_count' => "0",
                                        ]
                                    );
                                    $add_candidate_screening = TicCandidateScreening::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "job_id" => $get_job_details->job_id,
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            // 'candidate_alt_phone' => $row[$alt_mobile],
                                            // 'candidate_dob' => $row[$dob_cr],
                                            // 'candidate_location' => $row[$location],
                                            // 'candidate_high_qual' =>  $row[$qualification],
                                            // 'candidate_employer_name' =>  $row[$company_cr],
                                            // 'candidate_designation' =>  $row[$designation],
                                            'last_hold_loop' => $tmp_loop_id,
                                            "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                            "recruiter" => Auth::user()->id,
                                            'source_from' => "Upload Resume",
                                            "screen_status" => "Sourced",
                                            "date" => today_date(),
                                            "time" => today_time()
                                        ]
                                    );
                                    $add_candidate_history = TicCandidateHistory::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "applied_job_id" => $get_job_details->job_id,
                                            "applied_job_title" => $get_job_details->job_title,
                                            "applied_company_name" => $get_job_details->job_company_name,
                                            "applied_company_location" => $get_job_details->job_location,
                                            "screen_id" => $add_candidate_screening->screen_id,
                                            "applicant_id" => "0",
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            "activity_type" => "Sourced",
                                            "activity_notes" => "dynamic notes will be here",
                                            "user_id" => Auth::user()->id,
                                            "user_name" => Auth::user()->name,
                                            "date" => today_date(),
                                            "time" => today_time(),
                                            "ip" => get_client_ip(),
                                            "browser" => get_client_browser()
                                        ]
                                    );
                                    $add_source_summary = TicCandidateSourceSummary::create(
                                        [
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'job_id' => $get_job_details->job_id,
                                            'u_id' => Auth::user()->id,
                                            'date' => today_date(),
                                            'time' => today_time(),
                                            'add_from_resume' => "1",
                                            'add_reference' => "",
                                            'total_sourced' => "1"
                                        ]
                                    );
                                    $total_candidate_sourced++;
                                }
                                // # CHECKPOINT :-If source with userid and job id found 
                                else {

                                    $candidate_key = generate_candidate_key();
                                    $new_file_name = "";
                                    $ext = $file->getClientOriginalExtension();
                                    $filename = $file->getClientOriginalName();
                                    $basename = basename($filename, "." . $ext);
                                    $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    $file->move(public_path('candidate_resumes'), $new_file_name);
                                    // $file->move(public_path('api_resume'), $basename);
                                    // $ext = $file->getClientOriginalExtension();
                                    // $filename = $file->getClientOriginalName();
                                    // $basename = basename($filename, "." . $ext);
                                    // $new_file_name = $candidate_file_name . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    // $file->move(public_path('candidate_resumes'), $new_file_name);
                                    $add_candidate_master = TicCandidateMaster::create(
                                        [
                                            'candidate_key' => $candidate_key,
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            'last_hold_loop' => $tmp_loop_id,
                                            'created_date' => today_date(),
                                            'created_time' => today_time(),
                                            'last_modified' => today_date(),
                                            'total_job_offers_count' => "0",
                                            'total_job_applied_count' => "0",
                                        ]
                                    );
                                    $add_candidate_screening = TicCandidateScreening::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "job_id" => $get_job_details->job_id,
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_mobile_no,
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            // 'candidate_dob' => $row[$dob_cr],
                                            // 'candidate_location' => $row[$location],
                                            // 'candidate_high_qual' =>  $row[$qualification],
                                            // 'candidate_employer_name' =>  $row[$company_cr],
                                            // 'candidate_designation' =>  $row[$designation],
                                            'last_hold_loop' => $tmp_loop_id,
                                            "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                            "recruiter" => Auth::user()->id,
                                            'source_from' => "Upload Resume",
                                            "screen_status" => "Sourced",
                                            "date" => today_date(),
                                            "time" => today_time()
                                        ]
                                    );
                                    $add_candidate_history = TicCandidateHistory::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "applied_job_id" => $get_job_details->job_id,
                                            "applied_job_title" => $get_job_details->job_title,
                                            "applied_company_name" => $get_job_details->job_company_name,
                                            "applied_company_location" => $get_job_details->job_location,
                                            "screen_id" => $add_candidate_screening->screen_id,
                                            "applicant_id" => "0",
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            "activity_type" => "Sourced",
                                            "activity_notes" => "dynamic notes will be here",
                                            "user_id" => Auth::user()->id,
                                            "user_name" => Auth::user()->name,
                                            "date" => today_date(),
                                            "time" => today_time(),
                                            "ip" => get_client_ip(),
                                            "browser" => get_client_browser()
                                        ]
                                    );
                                    // #update source summary table
                                    $get_source_summary = get_source_summary_details($get_job_details->job_id, Auth::user()->id);
                                    $last_add_from_resume_count = $get_source_summary->add_from_resume;
                                    $incremented_add_from_resume_count = $last_add_from_resume_count + 1;
                                    $total_sourced = $get_source_summary->add_candidate + $get_source_summary->add_from_excel + $incremented_add_from_resume_count + $get_source_summary->add_from_db;
                                    TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                        ->where('u_id', Auth::user()->id)
                                        ->where('job_id', $get_job_details->job_id)
                                        ->where('date', today_date())
                                        ->update(
                                            [
                                                'add_from_resume' => $incremented_add_from_resume_count,
                                                'date' => today_date(),
                                                'time' => today_time(),
                                                'total_sourced' => $total_sourced
                                            ]
                                        );
                                    $total_candidate_sourced++;
                                }
                            }

                            // // # CHECKPOINT :-If duplicate candidate found 
                            if ($check_duplicate_candidate) {
                                TicCandidateDuplicateLog::create(
                                    [

                                        'cloud_id' => Auth::user()->cloud_id,
                                        'user_id' => Auth::user()->id,
                                        'user_name' => Auth::user()->name,
                                        'job_id' => $get_job_details->job_id,
                                        'duplicate_name' => ucwords($full_name[0]),
                                        'duplicate_email' => $filtered_email_id,
                                        'duplicate_phone' => $filtered_mobile_no,
                                        'duplicate_with' => $get_screen_id->screen_id,
                                        'duplicate_from' => "Add Candidate From Upload Resume",
                                        'duplicate_source' => "Upload Resume",
                                        'last_hold_loop' => $tmp_loop_id,
                                        'date' => today_date(),
                                        'time' => today_time(),
                                        'ip' => get_client_ip(),
                                        'browser' => get_client_browser(),
                                    ]
                                );
                                $add_candidate_history = TicCandidateHistory::create(
                                    [
                                        "cloud_id" => Auth::user()->cloud_id,
                                        "applied_job_id" => $get_job_details->job_id,
                                        "applied_job_title" => $get_job_details->job_title,
                                        "applied_company_name" => $get_job_details->job_company_name,
                                        "applied_company_location" => $get_job_details->job_location,
                                        "screen_id" => $get_screen_id->screen_id,
                                        "applicant_id" => "0",
                                        "candidate_id" => $check_duplicate_candidate->candidate_id,
                                        "activity_type" => "Duplicate",
                                        "activity_notes" => "Attempt to source request declined as the candidate is Duplicate - Source Folder",
                                        "user_id" => Auth::user()->id,
                                        "user_name" => Auth::user()->name,
                                        "date" => today_date(),
                                        "time" => today_time(),
                                        "ip" => get_client_ip(),
                                        "browser" => get_client_browser()
                                    ]
                                );
                                $total_candidate_duplicate++;
                            }
                        }
                    } else {
                        // # CHECKPOINT :-Statement for duplicate candidate check 
                        // # CHECKPOINT :-Statement for duplicate source summary check 
                        $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                            ->where('u_id', Auth::user()->id)
                            ->where('job_id', $get_job_details->job_id)
                            ->where('date', today_date())
                            ->first();

                        // # CHECKPOINT :-If source with userid and job id not found 
                        if (!$check_source_summary) {
                            $candidate_key = generate_candidate_key();
                            $new_file_name = "";
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                            $add_candidate_master = TicCandidateMaster::create(
                                [
                                    'candidate_key' => $candidate_key,
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    'created_date' => today_date(),
                                    'created_time' => today_time(),
                                    'last_modified' => today_date(),
                                    'total_job_offers_count' => "0",
                                    'total_job_applied_count' => "0",
                                ]
                            );
                            $add_candidate_screening = TicCandidateScreening::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "job_id" => $get_job_details->job_id,
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                    "recruiter" => Auth::user()->id,
                                    'source_from' => "Upload Resume",
                                    "screen_status" => "Sourced",
                                    "date" => today_date(),
                                    "time" => today_time()
                                ]
                            );
                            $add_candidate_history = TicCandidateHistory::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "applied_job_id" => $get_job_details->job_id,
                                    "applied_job_title" => $get_job_details->job_title,
                                    "applied_company_name" => $get_job_details->job_company_name,
                                    "applied_company_location" => $get_job_details->job_location,
                                    "screen_id" => $add_candidate_screening->screen_id,
                                    "applicant_id" => "0",
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    "activity_type" => "Sourced",
                                    "activity_notes" => "dynamic notes will be here",
                                    "user_id" => Auth::user()->id,
                                    "user_name" => Auth::user()->name,
                                    "date" => today_date(),
                                    "time" => today_time(),
                                    "ip" => get_client_ip(),
                                    "browser" => get_client_browser()
                                ]
                            );
                            $add_source_summary = TicCandidateSourceSummary::create(
                                [
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'job_id' => $get_job_details->job_id,
                                    'u_id' => Auth::user()->id,
                                    'date' => today_date(),
                                    'time' => today_time(),
                                    'add_from_resume' => "1",
                                    'add_reference' => "",
                                    'total_sourced' => "1"
                                ]
                            );
                            $total_candidate_sourced++;
                        }
                        // # CHECKPOINT :-If source with userid and job id found 
                        else {

                            $candidate_key = generate_candidate_key();
                            $new_file_name = "";
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                            $add_candidate_master = TicCandidateMaster::create(
                                [
                                    'candidate_key' => $candidate_key,
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    'created_date' => today_date(),
                                    'created_time' => today_time(),
                                    'last_modified' => today_date(),
                                    'total_job_offers_count' => "0",
                                    'total_job_applied_count' => "0",
                                ]
                            );
                            $add_candidate_screening = TicCandidateScreening::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "job_id" => $get_job_details->job_id,
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_mobile_no,
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                    "recruiter" => Auth::user()->id,
                                    'source_from' => "Upload Resume",
                                    "screen_status" => "Sourced",
                                    "date" => today_date(),
                                    "time" => today_time()
                                ]
                            );
                            $add_candidate_history = TicCandidateHistory::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "applied_job_id" => $get_job_details->job_id,
                                    "applied_job_title" => $get_job_details->job_title,
                                    "applied_company_name" => $get_job_details->job_company_name,
                                    "applied_company_location" => $get_job_details->job_location,
                                    "screen_id" => $add_candidate_screening->screen_id,
                                    "applicant_id" => "0",
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    "activity_type" => "Sourced",
                                    "activity_notes" => "dynamic notes will be here",
                                    "user_id" => Auth::user()->id,
                                    "user_name" => Auth::user()->name,
                                    "date" => today_date(),
                                    "time" => today_time(),
                                    "ip" => get_client_ip(),
                                    "browser" => get_client_browser()
                                ]
                            );
                            // #update source summary table
                            $get_source_summary = get_source_summary_details($get_job_details->job_id, Auth::user()->id);
                            $last_add_from_resume_count = $get_source_summary->add_from_resume;
                            $incremented_add_from_resume_count = $last_add_from_resume_count + 1;
                            $total_sourced = $get_source_summary->add_candidate + $get_source_summary->add_from_excel + $incremented_add_from_resume_count + $get_source_summary->add_from_db;
                            TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                ->where('u_id', Auth::user()->id)
                                ->where('job_id', $get_job_details->job_id)
                                ->where('date', today_date())
                                ->update(
                                    [
                                        'add_from_resume' => $incremented_add_from_resume_count,
                                        'date' => today_date(),
                                        'time' => today_time(),
                                        'total_sourced' => $total_sourced
                                    ]
                                );
                            $total_candidate_sourced++;
                        }
                    }
                }
                if ($file->getClientOriginalExtension() === "docx") {
                    $email = array();
                    $phone = array();
                    $full_name = array();
                    $phpWord = IOFactory::createReader('Word2007')->load($file->path());
                    $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
                    $objWriter->save('doc.html');
                    $content = file_get_contents(public_path('doc.html'));
                    $test_phone = '/\b[0-9]{3}\s*[-]?\s*[0-9]{3}\s*[-]?\s*[0-9]{4}\b/';
                    preg_match_all($test_phone, $content, $phone1);
                    foreach ($phone1[0] as $phone) {
                        $phone[] = $phone;
                    }
                    $test_patt = "/(?:[a-z0-9!#$%&'+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'+=?^_`{|}~-]+)|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])\")@(?:(?:[a-z0-9](?:[a-z0-9-][a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-][a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
                    preg_match_all($test_patt, $content, $email1);
                    foreach ($email1[0] as $mail) {
                        $email[] = $mail;
                    }
                    $full_name[0] = "";
                    // full_name,phone,email
                    // Logical Insertion Start 


                    $validate_mobile_no = false;
                    $validate_email_id = false;


                    if (preg_match('/^[0-9]{10}+$/', str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', isset($phone[0]) ? $phone[0] : ""))) {
                        $validate_mobile_no = true;
                        $filtered_mobile_no = str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', $phone[0]);
                    } else {
                        $filtered_mobile_no = "";
                        $invalid_mobile_no++;
                    }
                    if (filter_var(isset($email[0]) ? $email[0] : "", FILTER_VALIDATE_EMAIL)) {
                        $validate_email_id = true;
                        $filtered_email_id = strtolower($email[0]);
                    } else {
                        $filtered_email_id = "";
                        $invalid_email_id++;
                    }

                    // check if both email and phone is blank
                    if (trim($filtered_email_id) != "") {

                        if ($validate_mobile_no || $validate_email_id) {

                            $check_duplicate_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $filtered_email_id)->where('job_id', $get_job_details->job_id)->first();
                            $check_duplicate_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $filtered_email_id)->where('job_id', $get_job_details->job_id)->first();

                            if ($check_duplicate_candidate) {

                                $get_screen_id = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_job_details->job_id)->where('candidate_id', $check_duplicate_candidate->candidate_id)->first();
                            }
                            // # CHECKPOINT :-Statement for duplicate candidate check 
                            // # CHECKPOINT :-Statement for duplicate source summary check 
                            $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                ->where('u_id', Auth::user()->id)
                                ->where('job_id', $get_job_details->job_id)
                                ->where('date', today_date())
                                ->first();
                            // // dd($check_source_summary);
                            // // // # CHECKPOINT :-If duplicate candidate not found 
                            if (!$check_duplicate_candidate) {
                                // # CHECKPOINT :-If source with userid and job id not found 
                                if (!$check_source_summary) {
                                    $candidate_key = generate_candidate_key();
                                    $new_file_name = "";
                                    $ext = $file->getClientOriginalExtension();
                                    $filename = $file->getClientOriginalName();
                                    $basename = basename($filename, "." . $ext);
                                    $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    $file->move(public_path('candidate_resumes'), $new_file_name);
                                    $add_candidate_master = TicCandidateMaster::create(
                                        [
                                            'candidate_key' => $candidate_key,
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            'last_hold_loop' => $tmp_loop_id,
                                            'created_date' => today_date(),
                                            'created_time' => today_time(),
                                            'last_modified' => today_date(),
                                            'total_job_offers_count' => "0",
                                            'total_job_applied_count' => "0",
                                        ]
                                    );
                                    $add_candidate_screening = TicCandidateScreening::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "job_id" => $get_job_details->job_id,
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            // 'candidate_alt_phone' => $row[$alt_mobile],
                                            // 'candidate_dob' => $row[$dob_cr],
                                            // 'candidate_location' => $row[$location],
                                            // 'candidate_high_qual' =>  $row[$qualification],
                                            // 'candidate_employer_name' =>  $row[$company_cr],
                                            // 'candidate_designation' =>  $row[$designation],
                                            'last_hold_loop' => $tmp_loop_id,
                                            "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                            "recruiter" => Auth::user()->id,
                                            'source_from' => "Upload Resume",
                                            "screen_status" => "Sourced",
                                            "date" => today_date(),
                                            "time" => today_time()
                                        ]
                                    );
                                    $add_candidate_history = TicCandidateHistory::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "applied_job_id" => $get_job_details->job_id,
                                            "applied_job_title" => $get_job_details->job_title,
                                            "applied_company_name" => $get_job_details->job_company_name,
                                            "applied_company_location" => $get_job_details->job_location,
                                            "screen_id" => $add_candidate_screening->screen_id,
                                            "applicant_id" => "0",
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            "activity_type" => "Sourced",
                                            "activity_notes" => "dynamic notes will be here",
                                            "user_id" => Auth::user()->id,
                                            "user_name" => Auth::user()->name,
                                            "date" => today_date(),
                                            "time" => today_time(),
                                            "ip" => get_client_ip(),
                                            "browser" => get_client_browser()
                                        ]
                                    );
                                    $add_source_summary = TicCandidateSourceSummary::create(
                                        [
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'job_id' => $get_job_details->job_id,
                                            'u_id' => Auth::user()->id,
                                            'date' => today_date(),
                                            'time' => today_time(),
                                            'add_from_resume' => "1",
                                            'add_reference' => "",
                                            'total_sourced' => "1"
                                        ]
                                    );
                                    $total_candidate_sourced++;
                                }
                                // # CHECKPOINT :-If source with userid and job id found 
                                else {

                                    $candidate_key = generate_candidate_key();
                                    $new_file_name = "";
                                    $ext = $file->getClientOriginalExtension();
                                    $filename = $file->getClientOriginalName();
                                    $basename = basename($filename, "." . $ext);
                                    $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    $file->move(public_path('candidate_resumes'), $new_file_name);
                                    // $file->move(public_path('api_resume'), $basename);
                                    // $ext = $file->getClientOriginalExtension();
                                    // $filename = $file->getClientOriginalName();
                                    // $basename = basename($filename, "." . $ext);
                                    // $new_file_name = $candidate_file_name . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    // $file->move(public_path('candidate_resumes'), $new_file_name);
                                    $add_candidate_master = TicCandidateMaster::create(
                                        [
                                            'candidate_key' => $candidate_key,
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            'last_hold_loop' => $tmp_loop_id,
                                            'created_date' => today_date(),
                                            'created_time' => today_time(),
                                            'last_modified' => today_date(),
                                            'total_job_offers_count' => "0",
                                            'total_job_applied_count' => "0",
                                        ]
                                    );
                                    $add_candidate_screening = TicCandidateScreening::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "job_id" => $get_job_details->job_id,
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_mobile_no,
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            // 'candidate_dob' => $row[$dob_cr],
                                            // 'candidate_location' => $row[$location],
                                            // 'candidate_high_qual' =>  $row[$qualification],
                                            // 'candidate_employer_name' =>  $row[$company_cr],
                                            // 'candidate_designation' =>  $row[$designation],
                                            'last_hold_loop' => $tmp_loop_id,
                                            "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                            "recruiter" => Auth::user()->id,
                                            'source_from' => "Upload Resume",
                                            "screen_status" => "Sourced",
                                            "date" => today_date(),
                                            "time" => today_time()
                                        ]
                                    );
                                    $add_candidate_history = TicCandidateHistory::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "applied_job_id" => $get_job_details->job_id,
                                            "applied_job_title" => $get_job_details->job_title,
                                            "applied_company_name" => $get_job_details->job_company_name,
                                            "applied_company_location" => $get_job_details->job_location,
                                            "screen_id" => $add_candidate_screening->screen_id,
                                            "applicant_id" => "0",
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            "activity_type" => "Sourced",
                                            "activity_notes" => "dynamic notes will be here",
                                            "user_id" => Auth::user()->id,
                                            "user_name" => Auth::user()->name,
                                            "date" => today_date(),
                                            "time" => today_time(),
                                            "ip" => get_client_ip(),
                                            "browser" => get_client_browser()
                                        ]
                                    );
                                    // #update source summary table
                                    $get_source_summary = get_source_summary_details($get_job_details->job_id, Auth::user()->id);
                                    $last_add_from_resume_count = $get_source_summary->add_from_resume;
                                    $incremented_add_from_resume_count = $last_add_from_resume_count + 1;
                                    $total_sourced = $get_source_summary->add_candidate + $get_source_summary->add_from_excel + $incremented_add_from_resume_count + $get_source_summary->add_from_db;
                                    TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                        ->where('u_id', Auth::user()->id)
                                        ->where('job_id', $get_job_details->job_id)
                                        ->where('date', today_date())
                                        ->update(
                                            [
                                                'add_from_resume' => $incremented_add_from_resume_count,
                                                'date' => today_date(),
                                                'time' => today_time(),
                                                'total_sourced' => $total_sourced
                                            ]
                                        );
                                    $total_candidate_sourced++;
                                }
                            }

                            // // # CHECKPOINT :-If duplicate candidate found 
                            if ($check_duplicate_candidate) {
                                TicCandidateDuplicateLog::create(
                                    [

                                        'cloud_id' => Auth::user()->cloud_id,
                                        'user_id' => Auth::user()->id,
                                        'user_name' => Auth::user()->name,
                                        'job_id' => $get_job_details->job_id,
                                        'duplicate_name' => ucwords($full_name[0]),
                                        'duplicate_email' => $filtered_email_id,
                                        'duplicate_phone' => $filtered_mobile_no,
                                        'duplicate_with' => $get_screen_id->screen_id,
                                        'duplicate_from' => "Add Candidate From Upload Resume",
                                        'duplicate_source' => "Upload Resume",
                                        'last_hold_loop' => $tmp_loop_id,
                                        'date' => today_date(),
                                        'time' => today_time(),
                                        'ip' => get_client_ip(),
                                        'browser' => get_client_browser(),
                                    ]
                                );
                                $add_candidate_history = TicCandidateHistory::create(
                                    [
                                        "cloud_id" => Auth::user()->cloud_id,
                                        "applied_job_id" => $get_job_details->job_id,
                                        "applied_job_title" => $get_job_details->job_title,
                                        "applied_company_name" => $get_job_details->job_company_name,
                                        "applied_company_location" => $get_job_details->job_location,
                                        "screen_id" => $get_screen_id->screen_id,
                                        "applicant_id" => "0",
                                        "candidate_id" => $check_duplicate_candidate->candidate_id,
                                        "activity_type" => "Duplicate",
                                        "activity_notes" => "Attempt to source request declined as the candidate is Duplicate - Source Folder",
                                        "user_id" => Auth::user()->id,
                                        "user_name" => Auth::user()->name,
                                        "date" => today_date(),
                                        "time" => today_time(),
                                        "ip" => get_client_ip(),
                                        "browser" => get_client_browser()
                                    ]
                                );
                                $total_candidate_duplicate++;
                            }
                        }
                    } else {
                        // # CHECKPOINT :-Statement for duplicate candidate check 
                        // # CHECKPOINT :-Statement for duplicate source summary check 
                        $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                            ->where('u_id', Auth::user()->id)
                            ->where('job_id', $get_job_details->job_id)
                            ->where('date', today_date())
                            ->first();

                        // # CHECKPOINT :-If source with userid and job id not found 
                        if (!$check_source_summary) {
                            $candidate_key = generate_candidate_key();
                            $new_file_name = "";
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                            $add_candidate_master = TicCandidateMaster::create(
                                [
                                    'candidate_key' => $candidate_key,
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    'created_date' => today_date(),
                                    'created_time' => today_time(),
                                    'last_modified' => today_date(),
                                    'total_job_offers_count' => "0",
                                    'total_job_applied_count' => "0",
                                ]
                            );
                            $add_candidate_screening = TicCandidateScreening::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "job_id" => $get_job_details->job_id,
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                    "recruiter" => Auth::user()->id,
                                    'source_from' => "Upload Resume",
                                    "screen_status" => "Sourced",
                                    "date" => today_date(),
                                    "time" => today_time()
                                ]
                            );
                            $add_candidate_history = TicCandidateHistory::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "applied_job_id" => $get_job_details->job_id,
                                    "applied_job_title" => $get_job_details->job_title,
                                    "applied_company_name" => $get_job_details->job_company_name,
                                    "applied_company_location" => $get_job_details->job_location,
                                    "screen_id" => $add_candidate_screening->screen_id,
                                    "applicant_id" => "0",
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    "activity_type" => "Sourced",
                                    "activity_notes" => "dynamic notes will be here",
                                    "user_id" => Auth::user()->id,
                                    "user_name" => Auth::user()->name,
                                    "date" => today_date(),
                                    "time" => today_time(),
                                    "ip" => get_client_ip(),
                                    "browser" => get_client_browser()
                                ]
                            );
                            $add_source_summary = TicCandidateSourceSummary::create(
                                [
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'job_id' => $get_job_details->job_id,
                                    'u_id' => Auth::user()->id,
                                    'date' => today_date(),
                                    'time' => today_time(),
                                    'add_from_resume' => "1",
                                    'add_reference' => "",
                                    'total_sourced' => "1"
                                ]
                            );
                            $total_candidate_sourced++;
                        }
                        // # CHECKPOINT :-If source with userid and job id found 
                        else {

                            $candidate_key = generate_candidate_key();
                            $new_file_name = "";
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                            $add_candidate_master = TicCandidateMaster::create(
                                [
                                    'candidate_key' => $candidate_key,
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    'created_date' => today_date(),
                                    'created_time' => today_time(),
                                    'last_modified' => today_date(),
                                    'total_job_offers_count' => "0",
                                    'total_job_applied_count' => "0",
                                ]
                            );
                            $add_candidate_screening = TicCandidateScreening::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "job_id" => $get_job_details->job_id,
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_mobile_no,
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                    "recruiter" => Auth::user()->id,
                                    'source_from' => "Upload Resume",
                                    "screen_status" => "Sourced",
                                    "date" => today_date(),
                                    "time" => today_time()
                                ]
                            );
                            $add_candidate_history = TicCandidateHistory::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "applied_job_id" => $get_job_details->job_id,
                                    "applied_job_title" => $get_job_details->job_title,
                                    "applied_company_name" => $get_job_details->job_company_name,
                                    "applied_company_location" => $get_job_details->job_location,
                                    "screen_id" => $add_candidate_screening->screen_id,
                                    "applicant_id" => "0",
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    "activity_type" => "Sourced",
                                    "activity_notes" => "dynamic notes will be here",
                                    "user_id" => Auth::user()->id,
                                    "user_name" => Auth::user()->name,
                                    "date" => today_date(),
                                    "time" => today_time(),
                                    "ip" => get_client_ip(),
                                    "browser" => get_client_browser()
                                ]
                            );
                            // #update source summary table
                            $get_source_summary = get_source_summary_details($get_job_details->job_id, Auth::user()->id);
                            $last_add_from_resume_count = $get_source_summary->add_from_resume;
                            $incremented_add_from_resume_count = $last_add_from_resume_count + 1;
                            $total_sourced = $get_source_summary->add_candidate + $get_source_summary->add_from_excel + $incremented_add_from_resume_count + $get_source_summary->add_from_db;
                            TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                ->where('u_id', Auth::user()->id)
                                ->where('job_id', $get_job_details->job_id)
                                ->where('date', today_date())
                                ->update(
                                    [
                                        'add_from_resume' => $incremented_add_from_resume_count,
                                        'date' => today_date(),
                                        'time' => today_time(),
                                        'total_sourced' => $total_sourced
                                    ]
                                );
                            $total_candidate_sourced++;
                        }
                    }
                    //var_dump($phone1,$email1);
                }
                if ($file->getClientOriginalExtension() === "doc") {
                    $email = array();
                    $phone = array();
                    $full_name = array();

                    $full_name[0] = "";
                    $email[0] = "";
                    $phone[0] = "";
                    // full_name,phone,email
                    // Logical Insertion Start 


                    $validate_mobile_no = false;
                    $validate_email_id = false;


                    if (preg_match('/^[0-9]{10}+$/', str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', isset($phone[0]) ? $phone[0] : ""))) {
                        $validate_mobile_no = true;
                        $filtered_mobile_no = str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', $phone[0]);
                    } else {
                        $filtered_mobile_no = "";
                        $invalid_mobile_no++;
                    }
                    if (filter_var(isset($email[0]) ? $email[0] : "", FILTER_VALIDATE_EMAIL)) {
                        $validate_email_id = true;
                        $filtered_email_id = strtolower($email[0]);
                    } else {
                        $filtered_email_id = "";
                        $invalid_email_id++;
                    }

                    // check if both email and phone is blank
                    if (trim($filtered_email_id) != "") {

                        if (true) {

                            $check_duplicate_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $filtered_email_id)->where('job_id', $get_job_details->job_id)->first();
                            $check_duplicate_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $filtered_email_id)->where('job_id', $get_job_details->job_id)->first();

                            if ($check_duplicate_candidate) {

                                $get_screen_id = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_job_details->job_id)->where('candidate_id', $check_duplicate_candidate->candidate_id)->first();
                            }
                            // # CHECKPOINT :-Statement for duplicate candidate check 
                            // # CHECKPOINT :-Statement for duplicate source summary check 
                            $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                ->where('u_id', Auth::user()->id)
                                ->where('job_id', $get_job_details->job_id)
                                ->where('date', today_date())
                                ->first();
                            // // dd($check_source_summary);
                            // // // # CHECKPOINT :-If duplicate candidate not found 
                            if (!$check_duplicate_candidate) {
                                // # CHECKPOINT :-If source with userid and job id not found 
                                if (!$check_source_summary) {
                                    $candidate_key = generate_candidate_key();
                                    $new_file_name = "";
                                    $ext = $file->getClientOriginalExtension();
                                    $filename = $file->getClientOriginalName();
                                    $basename = basename($filename, "." . $ext);
                                    $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    $file->move(public_path('candidate_resumes'), $new_file_name);
                                    $add_candidate_master = TicCandidateMaster::create(
                                        [
                                            'candidate_key' => $candidate_key,
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            'last_hold_loop' => $tmp_loop_id,
                                            'created_date' => today_date(),
                                            'created_time' => today_time(),
                                            'last_modified' => today_date(),
                                            'total_job_offers_count' => "0",
                                            'total_job_applied_count' => "0",
                                        ]
                                    );
                                    $add_candidate_screening = TicCandidateScreening::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "job_id" => $get_job_details->job_id,
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            // 'candidate_alt_phone' => $row[$alt_mobile],
                                            // 'candidate_dob' => $row[$dob_cr],
                                            // 'candidate_location' => $row[$location],
                                            // 'candidate_high_qual' =>  $row[$qualification],
                                            // 'candidate_employer_name' =>  $row[$company_cr],
                                            // 'candidate_designation' =>  $row[$designation],
                                            'last_hold_loop' => $tmp_loop_id,
                                            "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                            "recruiter" => Auth::user()->id,
                                            'source_from' => "Upload Resume",
                                            "screen_status" => "Sourced",
                                            "date" => today_date(),
                                            "time" => today_time()
                                        ]
                                    );
                                    $add_candidate_history = TicCandidateHistory::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "applied_job_id" => $get_job_details->job_id,
                                            "applied_job_title" => $get_job_details->job_title,
                                            "applied_company_name" => $get_job_details->job_company_name,
                                            "applied_company_location" => $get_job_details->job_location,
                                            "screen_id" => $add_candidate_screening->screen_id,
                                            "applicant_id" => "0",
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            "activity_type" => "Sourced",
                                            "activity_notes" => "dynamic notes will be here",
                                            "user_id" => Auth::user()->id,
                                            "user_name" => Auth::user()->name,
                                            "date" => today_date(),
                                            "time" => today_time(),
                                            "ip" => get_client_ip(),
                                            "browser" => get_client_browser()
                                        ]
                                    );
                                    $add_source_summary = TicCandidateSourceSummary::create(
                                        [
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'job_id' => $get_job_details->job_id,
                                            'u_id' => Auth::user()->id,
                                            'date' => today_date(),
                                            'time' => today_time(),
                                            'add_from_resume' => "1",
                                            'add_reference' => "",
                                            'total_sourced' => "1"
                                        ]
                                    );
                                    $total_candidate_sourced++;
                                }
                                // # CHECKPOINT :-If source with userid and job id found 
                                else {

                                    $candidate_key = generate_candidate_key();
                                    $new_file_name = "";
                                    $ext = $file->getClientOriginalExtension();
                                    $filename = $file->getClientOriginalName();
                                    $basename = basename($filename, "." . $ext);
                                    $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    $file->move(public_path('candidate_resumes'), $new_file_name);
                                    // $file->move(public_path('api_resume'), $basename);
                                    // $ext = $file->getClientOriginalExtension();
                                    // $filename = $file->getClientOriginalName();
                                    // $basename = basename($filename, "." . $ext);
                                    // $new_file_name = $candidate_file_name . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                                    // $file->move(public_path('candidate_resumes'), $new_file_name);
                                    $add_candidate_master = TicCandidateMaster::create(
                                        [
                                            'candidate_key' => $candidate_key,
                                            'cloud_id' => Auth::user()->cloud_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            'last_hold_loop' => $tmp_loop_id,
                                            'created_date' => today_date(),
                                            'created_time' => today_time(),
                                            'last_modified' => today_date(),
                                            'total_job_offers_count' => "0",
                                            'total_job_applied_count' => "0",
                                        ]
                                    );
                                    $add_candidate_screening = TicCandidateScreening::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "job_id" => $get_job_details->job_id,
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            'candidate_name' => ucwords($full_name[0]),
                                            'candidate_email' => $filtered_mobile_no,
                                            'candidate_email' => $filtered_email_id,
                                            'candidate_phone' => $filtered_mobile_no,
                                            'candidate_resume' => $new_file_name,
                                            'candidate_resume_original' => $basename . "." . $ext,
                                            // 'candidate_dob' => $row[$dob_cr],
                                            // 'candidate_location' => $row[$location],
                                            // 'candidate_high_qual' =>  $row[$qualification],
                                            // 'candidate_employer_name' =>  $row[$company_cr],
                                            // 'candidate_designation' =>  $row[$designation],
                                            'last_hold_loop' => $tmp_loop_id,
                                            "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                            "recruiter" => Auth::user()->id,
                                            'source_from' => "Upload Resume",
                                            "screen_status" => "Sourced",
                                            "date" => today_date(),
                                            "time" => today_time()
                                        ]
                                    );
                                    $add_candidate_history = TicCandidateHistory::create(
                                        [
                                            "cloud_id" => Auth::user()->cloud_id,
                                            "applied_job_id" => $get_job_details->job_id,
                                            "applied_job_title" => $get_job_details->job_title,
                                            "applied_company_name" => $get_job_details->job_company_name,
                                            "applied_company_location" => $get_job_details->job_location,
                                            "screen_id" => $add_candidate_screening->screen_id,
                                            "applicant_id" => "0",
                                            "candidate_id" => $add_candidate_master->candidate_id,
                                            "activity_type" => "Sourced",
                                            "activity_notes" => "dynamic notes will be here",
                                            "user_id" => Auth::user()->id,
                                            "user_name" => Auth::user()->name,
                                            "date" => today_date(),
                                            "time" => today_time(),
                                            "ip" => get_client_ip(),
                                            "browser" => get_client_browser()
                                        ]
                                    );
                                    // #update source summary table
                                    $get_source_summary = get_source_summary_details($get_job_details->job_id, Auth::user()->id);
                                    $last_add_from_resume_count = $get_source_summary->add_from_resume;
                                    $incremented_add_from_resume_count = $last_add_from_resume_count + 1;
                                    $total_sourced = $get_source_summary->add_candidate + $get_source_summary->add_from_excel + $incremented_add_from_resume_count + $get_source_summary->add_from_db;
                                    TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                        ->where('u_id', Auth::user()->id)
                                        ->where('job_id', $get_job_details->job_id)
                                        ->where('date', today_date())
                                        ->update(
                                            [
                                                'add_from_resume' => $incremented_add_from_resume_count,
                                                'date' => today_date(),
                                                'time' => today_time(),
                                                'total_sourced' => $total_sourced
                                            ]
                                        );
                                    $total_candidate_sourced++;
                                }
                            }

                            // // # CHECKPOINT :-If duplicate candidate found 
                            if ($check_duplicate_candidate) {
                                TicCandidateDuplicateLog::create(
                                    [

                                        'cloud_id' => Auth::user()->cloud_id,
                                        'user_id' => Auth::user()->id,
                                        'user_name' => Auth::user()->name,
                                        'job_id' => $get_job_details->job_id,
                                        'duplicate_name' => ucwords($full_name[0]),
                                        'duplicate_email' => $filtered_email_id,
                                        'duplicate_phone' => $filtered_mobile_no,
                                        'duplicate_with' => $get_screen_id->screen_id,
                                        'duplicate_from' => "Add Candidate From Upload Resume",
                                        'duplicate_source' => "Upload Resume",
                                        'last_hold_loop' => $tmp_loop_id,
                                        'date' => today_date(),
                                        'time' => today_time(),
                                        'ip' => get_client_ip(),
                                        'browser' => get_client_browser(),
                                    ]
                                );
                                $add_candidate_history = TicCandidateHistory::create(
                                    [
                                        "cloud_id" => Auth::user()->cloud_id,
                                        "applied_job_id" => $get_job_details->job_id,
                                        "applied_job_title" => $get_job_details->job_title,
                                        "applied_company_name" => $get_job_details->job_company_name,
                                        "applied_company_location" => $get_job_details->job_location,
                                        "screen_id" => $get_screen_id->screen_id,
                                        "applicant_id" => "0",
                                        "candidate_id" => $check_duplicate_candidate->candidate_id,
                                        "activity_type" => "Duplicate",
                                        "activity_notes" => "Attempt to source request declined as the candidate is Duplicate - Source Folder",
                                        "user_id" => Auth::user()->id,
                                        "user_name" => Auth::user()->name,
                                        "date" => today_date(),
                                        "time" => today_time(),
                                        "ip" => get_client_ip(),
                                        "browser" => get_client_browser()
                                    ]
                                );
                                $total_candidate_duplicate++;
                            }
                        }
                    } else {
                        // # CHECKPOINT :-Statement for duplicate candidate check 
                        // # CHECKPOINT :-Statement for duplicate source summary check 
                        $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                            ->where('u_id', Auth::user()->id)
                            ->where('job_id', $get_job_details->job_id)
                            ->where('date', today_date())
                            ->first();

                        // # CHECKPOINT :-If source with userid and job id not found 
                        if (!$check_source_summary) {
                            $candidate_key = generate_candidate_key();
                            $new_file_name = "";
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                            $add_candidate_master = TicCandidateMaster::create(
                                [
                                    'candidate_key' => $candidate_key,
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    'created_date' => today_date(),
                                    'created_time' => today_time(),
                                    'last_modified' => today_date(),
                                    'total_job_offers_count' => "0",
                                    'total_job_applied_count' => "0",
                                ]
                            );
                            $add_candidate_screening = TicCandidateScreening::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "job_id" => $get_job_details->job_id,
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                    "recruiter" => Auth::user()->id,
                                    'source_from' => "Upload Resume",
                                    "screen_status" => "Sourced",
                                    "date" => today_date(),
                                    "time" => today_time()
                                ]
                            );
                            $add_candidate_history = TicCandidateHistory::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "applied_job_id" => $get_job_details->job_id,
                                    "applied_job_title" => $get_job_details->job_title,
                                    "applied_company_name" => $get_job_details->job_company_name,
                                    "applied_company_location" => $get_job_details->job_location,
                                    "screen_id" => $add_candidate_screening->screen_id,
                                    "applicant_id" => "0",
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    "activity_type" => "Sourced",
                                    "activity_notes" => "dynamic notes will be here",
                                    "user_id" => Auth::user()->id,
                                    "user_name" => Auth::user()->name,
                                    "date" => today_date(),
                                    "time" => today_time(),
                                    "ip" => get_client_ip(),
                                    "browser" => get_client_browser()
                                ]
                            );
                            $add_source_summary = TicCandidateSourceSummary::create(
                                [
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'job_id' => $get_job_details->job_id,
                                    'u_id' => Auth::user()->id,
                                    'date' => today_date(),
                                    'time' => today_time(),
                                    'add_from_resume' => "1",
                                    'add_reference' => "",
                                    'total_sourced' => "1"
                                ]
                            );
                            $total_candidate_sourced++;
                        }
                        // # CHECKPOINT :-If source with userid and job id found 
                        else {

                            $candidate_key = generate_candidate_key();
                            $new_file_name = "";
                            $ext = $file->getClientOriginalExtension();
                            $filename = $file->getClientOriginalName();
                            $basename = basename($filename, "." . $ext);
                            $new_file_name = Str::random(10) . "_" .  str_replace('-', '', today_date_reverse()) . "" . str_replace(array(":", "am", "pm"), "", str_replace(' ', '', today_time()))  . "." . $ext;
                            $file->move(public_path('candidate_resumes'), $new_file_name);
                            $add_candidate_master = TicCandidateMaster::create(
                                [
                                    'candidate_key' => $candidate_key,
                                    'cloud_id' => Auth::user()->cloud_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    'created_date' => today_date(),
                                    'created_time' => today_time(),
                                    'last_modified' => today_date(),
                                    'total_job_offers_count' => "0",
                                    'total_job_applied_count' => "0",
                                ]
                            );
                            $add_candidate_screening = TicCandidateScreening::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "job_id" => $get_job_details->job_id,
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    'candidate_name' => ucwords($full_name[0]),
                                    'candidate_email' => $filtered_mobile_no,
                                    'candidate_email' => $filtered_email_id,
                                    'candidate_phone' => $filtered_mobile_no,
                                    'candidate_resume' => $new_file_name,
                                    'candidate_resume_original' => $basename . "." . $ext,
                                    'last_hold_loop' => $tmp_loop_id,
                                    "job_ownerid" => get_job_ownerid($get_job_details->job_id),
                                    "recruiter" => Auth::user()->id,
                                    'source_from' => "Upload Resume",
                                    "screen_status" => "Sourced",
                                    "date" => today_date(),
                                    "time" => today_time()
                                ]
                            );
                            $add_candidate_history = TicCandidateHistory::create(
                                [
                                    "cloud_id" => Auth::user()->cloud_id,
                                    "applied_job_id" => $get_job_details->job_id,
                                    "applied_job_title" => $get_job_details->job_title,
                                    "applied_company_name" => $get_job_details->job_company_name,
                                    "applied_company_location" => $get_job_details->job_location,
                                    "screen_id" => $add_candidate_screening->screen_id,
                                    "applicant_id" => "0",
                                    "candidate_id" => $add_candidate_master->candidate_id,
                                    "activity_type" => "Sourced",
                                    "activity_notes" => "dynamic notes will be here",
                                    "user_id" => Auth::user()->id,
                                    "user_name" => Auth::user()->name,
                                    "date" => today_date(),
                                    "time" => today_time(),
                                    "ip" => get_client_ip(),
                                    "browser" => get_client_browser()
                                ]
                            );
                            // #update source summary table
                            $get_source_summary = get_source_summary_details($get_job_details->job_id, Auth::user()->id);
                            $last_add_from_resume_count = $get_source_summary->add_from_resume;
                            $incremented_add_from_resume_count = $last_add_from_resume_count + 1;
                            $total_sourced = $get_source_summary->add_candidate + $get_source_summary->add_from_excel + $incremented_add_from_resume_count + $get_source_summary->add_from_db;
                            TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                                ->where('u_id', Auth::user()->id)
                                ->where('job_id', $get_job_details->job_id)
                                ->where('date', today_date())
                                ->update(
                                    [
                                        'add_from_resume' => $incremented_add_from_resume_count,
                                        'date' => today_date(),
                                        'time' => today_time(),
                                        'total_sourced' => $total_sourced
                                    ]
                                );
                            $total_candidate_sourced++;
                        }
                    }
                    //var_dump($phone1,$email1);
                }
            }
            // end of foreach loop for each resume 
            // echo $total_candidate_sourced . "<br>";
            // echo $neither_email_nor_phone_no . "<br>";
            // echo "All : " . $all_canditates_received;job_id
            return redirect()->to(route('view_parsed_candidate_details', ['jobid' => $job_id, 'jobloop' => $tmp_loop_id]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_parsed_candidate_details($job_id, $job_loop)
    {
        $get_file_name = TicCandidateScreening::where('last_hold_loop', $job_loop)->get();
        $get_duplicate_candidate = TicCandidateDuplicateLog::where('last_hold_loop', $job_loop)->get();
        return view('admin.pages.candidate_parsed_from_resume')->with(compact('get_file_name', 'job_id', 'get_duplicate_candidate', 'job_loop'));
    }
    public function delete_resume_parsed($canid, $job_loop)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_screen_details = TicCandidateScreening::where('candidate_id', $canid)
                ->where('last_hold_loop', $job_loop)
                ->where('recruiter', Auth::user()->id)
                ->where('cloud_id', Auth::user()->cloud_id)->first();
            $get_valid_job = TicJobs::where('job_id', $get_screen_details->job_id)->where('cloud_id', Auth::user()->cloud_id)->first();

            if ($get_valid_job) {
                $delete_resume_master = TicCandidateMaster::where('candidate_id', $canid)->delete();
                $delete_resume_screen = TicCandidateScreening::where('candidate_id', $canid)->delete();
                if ($delete_resume_master && $delete_resume_master) {
                    return redirect()->back()->with('success_delete', "Candidate dropped !");
                } else {
                    return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
                }
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function discard_all_resume_parsed($job_loop)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_screen_details = TicCandidateScreening::where('last_hold_loop', $job_loop)
                ->where('cloud_id', Auth::user()->cloud_id)->first();
            $get_valid_job = TicJobs::where('job_id', $get_screen_details->job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            $discard_resume_master = TicCandidateMaster::where('last_hold_loop', $job_loop)->delete();
            $discard_resume_screen = TicCandidateScreening::where('last_hold_loop', $job_loop)->delete();
            return redirect()->to(route('add_candidate_from_excel', ['jobid' => $get_valid_job->job_code]));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }


    public function add_candidate_from_excel($job_id = "")
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                return view('admin.pages.candidate_import_from_excel')->with(compact('job_id'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function process_candidate_from_excel(Request $req)
    {

        $this->validate($req, [
            'excel_file' => 'required|file|mimes:xls,xlsx,csv'
        ]);
        $the_file = $req->file('excel_file');
        $file_name = $req->file('excel_file')->getClientOriginalName();
        $source_time = today_time();
        $get_job_id = get_job_code_details($req->job_id);
        $job_id = $get_job_id->job_id;
        $spreadsheet  = \PhpOffice\PhpSpreadsheet\IOFactory::load($the_file->getRealPath());
        $sheet        = $spreadsheet->getActiveSheet();
        $row_limit    = $sheet->getHighestDataRow();
        $column_limit = $sheet->getHighestDataColumn();
        $row_range    = range(6, $row_limit - 1);
        $column_range = range('F', $column_limit);
        $startcount = 2;
        $data = array();

        foreach ($row_range as $row) {
            $data[] = [
                'r_cell1' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('A' . $row)->getValue()),
                'r_cell2' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('B' . $row)->getValue()),
                'r_cell3' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('C' . $row)->getValue()),
                'r_cell4' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('D' . $row)->getValue()),
                'r_cell5' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('E' . $row)->getValue()),
                'r_cell6' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('F' . $row)->getValue()),
                'r_cell7' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('G' . $row)->getValue()),
                'r_cell8' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('H' . $row)->getValue()),
                'r_cell9' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('I' . $row)->getValue()),
                'r_cell10' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('J' . $row)->getValue()),
                'r_cell11' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('K' . $row)->getValue()),
                'r_cell12' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('L' . $row)->getValue()),
                'r_cell13' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('M' . $row)->getValue()),
                'r_cell14' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('N' . $row)->getValue()),
                'r_cell15' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('O' . $row)->getValue()),
                'r_cell16' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('P' . $row)->getValue()),
                'r_cell17' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('Q' . $row)->getValue()),
                'r_cell18' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('R' . $row)->getValue()),
                'r_cell19' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('S' . $row)->getValue()),
                'r_cell20' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('T' . $row)->getValue()),
                'r_cell21' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('U' . $row)->getValue()),
                'r_cell22' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('V' . $row)->getValue()),
                'r_cell23' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('W' . $row)->getValue()),
                'r_cell24' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('X' . $row)->getValue()),
                'r_cell25' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('Y' . $row)->getValue()),
                'r_cell26' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('Z' . $row)->getValue()),
                'r_cell27' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AA' . $row)->getValue()),
                'r_cell28' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AB' . $row)->getValue()),
                'r_cell29' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AC' . $row)->getValue()),
                'r_cell30' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AD' . $row)->getValue()),
                'r_cell31' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AE' . $row)->getValue()),
                'r_cell32' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AF' . $row)->getValue()),
                'r_cell33' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AG' . $row)->getValue()),
                'r_cell34' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AH' . $row)->getValue()),
                'r_cell35' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AI' . $row)->getValue()),
                'r_cell36' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AJ' . $row)->getValue()),
                'r_cell37' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AK' . $row)->getValue()),
                'r_cell38' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AL' . $row)->getValue()),
                'r_cell39' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AM' . $row)->getValue()),
                'r_cell40' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AN' . $row)->getValue()),
                'r_cell41' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AO' . $row)->getValue()),
                'r_cell42' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AP' . $row)->getValue()),
                'r_cell43' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AQ' . $row)->getValue()),
                'r_cell44' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AR' . $row)->getValue()),
                'r_cell45' => str_replace(array("#", '"', ";", "\n"), '', $sheet->getCell('AZ' . $row)->getValue()),
            ];
            $startcount++;
        }
        // dd($data);
        return view('admin.pages.candidate_excel_file_import_handler')->with(compact('data', 'job_id', 'file_name', 'source_time'));
    }
    public function excel_db_import(Request $tic)
    {
        // return $data;
        // dd($req->job_id);
        $get_job_details = get_job_details($tic->job_id);
        $data = unserialize($tic->test);
        $fullname = $tic->fullname;
        $email = $tic->email;
        $mobile = $tic->mobile;
        $altmobile = isset($tic->altmobile) ? $tic->altmobile : "AZ";
        $whatsapp = isset($tic->whatsapp) ? $tic->whatsapp : "AZ";
        $dob = isset($tic->dob) ? $tic->dob : "AZ";
        $qual = isset($tic->qual) ? $tic->qual : "AZ";
        $company = isset($tic->company) ? $tic->company : "AZ";
        $desgn = isset($tic->designation) ? $tic->designation : "AZ";
        $loc = isset($tic->location) ? $tic->location : "AZ";
        $exp = isset($tic->exp) ? $tic->exp : "AZ";
        $name = "";
        if (true) {

            // For Fullname 
            if ($fullname == "A") {
                $name = "r_cell1";
            } elseif ($fullname == "B") {
                $name = "r_cell2";
            } elseif ($fullname == "C") {
                $name = "r_cell3";
            } elseif ($fullname == "D") {
                $name = "r_cell4";
            } elseif ($fullname == "E") {
                $name = "r_cell5";
            } elseif ($fullname == "F") {
                $name = "r_cell6";
            } elseif ($fullname == "G") {
                $name = "r_cell7";
            } elseif ($fullname == "H") {
                $name = "r_cell8";
            } elseif ($fullname == "I") {
                $name = "r_cell9";
            } elseif ($fullname == "J") {
                $name = "r_cell10";
            } elseif ($fullname == "K") {
                $name = "r_cell11";
            } elseif ($fullname == "L") {
                $name = "r_cell12";
            } elseif ($fullname == "M") {
                $name = "r_cell13";
            } elseif ($fullname == "N") {
                $name = "r_cell14";
            } elseif ($fullname == "O") {
                $name = "r_cell15";
            } elseif ($fullname == "P") {
                $name = "r_cell16";
            } elseif ($fullname == "Q") {
                $name = "r_cell17";
            } elseif ($fullname == "R") {
                $name = "r_cell18";
            } elseif ($fullname == "S") {
                $name = "r_cell19";
            } elseif ($fullname == "T") {
                $name = "r_cell20";
            } elseif ($fullname == "U") {
                $name = "r_cell21";
            } elseif ($fullname == "V") {
                $name = "r_cell22";
            } elseif ($fullname == "W") {
                $name = "r_cell23";
            } elseif ($fullname == "X") {
                $name = "r_cell24";
            } elseif ($fullname == "Y") {
                $name = "r_cell25";
            } elseif ($fullname == "Z") {
                $name = "r_cell26";
            } elseif ($fullname == "AA") {
                $name = "r_cell27";
            } elseif ($fullname == "AB") {
                $name = "r_cell28";
            } elseif ($fullname == "AC") {
                $name = "r_cell29";
            } elseif ($fullname == "AD") {
                $name = "r_cell30";
            } elseif ($fullname == "AE") {
                $name = "r_cell31";
            } elseif ($fullname == "AF") {
                $name = "r_cell32";
            } elseif ($fullname == "AG") {
                $name = "r_cell33";
            } elseif ($fullname == "AH") {
                $name = "r_cell34";
            } elseif ($fullname == "AI") {
                $name = "r_cell35";
            } elseif ($fullname == "AJ") {
                $name = "r_cell36";
            } elseif ($fullname == "AK") {
                $name = "r_cell37";
            } elseif ($fullname == "AL") {
                $name = "r_cell38";
            } elseif ($fullname == "AM") {
                $name = "r_cell39";
            } elseif ($fullname == "AN") {
                $name = "r_cell40";
            } elseif ($fullname == "AO") {
                $name = "r_cell41";
            } elseif ($fullname == "AP") {
                $name = "r_cell42";
            } elseif ($fullname == "AQ") {
                $name = "r_cell43";
            } elseif ($fullname == "AR") {
                $name = "r_cell44";
            }
            // elseif($fullname=="AZ"){$name ="r_cell45"; }
            // For email 
            if ($email == "A") {
                $email_id = "r_cell1";
            } elseif ($email == "B") {
                $email_id = "r_cell2";
            } elseif ($email == "C") {
                $email_id = "r_cell3";
            } elseif ($email == "D") {
                $email_id = "r_cell4";
            } elseif ($email == "E") {
                $email_id = "r_cell5";
            } elseif ($email == "F") {
                $email_id = "r_cell6";
            } elseif ($email == "G") {
                $email_id = "r_cell7";
            } elseif ($email == "H") {
                $email_id = "r_cell8";
            } elseif ($email == "I") {
                $email_id = "r_cell9";
            } elseif ($email == "J") {
                $email_id = "r_cell10";
            } elseif ($email == "K") {
                $email_id = "r_cell11";
            } elseif ($email == "L") {
                $email_id = "r_cell12";
            } elseif ($email == "M") {
                $email_id = "r_cell13";
            } elseif ($email == "N") {
                $email_id = "r_cell14";
            } elseif ($email == "O") {
                $email_id = "r_cell15";
            } elseif ($email == "P") {
                $email_id = "r_cell16";
            } elseif ($email == "Q") {
                $email_id = "r_cell17";
            } elseif ($email == "R") {
                $email_id = "r_cell18";
            } elseif ($email == "S") {
                $email_id = "r_cell19";
            } elseif ($email == "T") {
                $email_id = "r_cell20";
            } elseif ($email == "U") {
                $email_id = "r_cell21";
            } elseif ($email == "V") {
                $email_id = "r_cell22";
            } elseif ($email == "W") {
                $email_id = "r_cell23";
            } elseif ($email == "X") {
                $email_id = "r_cell24";
            } elseif ($email == "Y") {
                $email_id = "r_cell25";
            } elseif ($email == "Z") {
                $email_id = "r_cell26";
            } elseif ($email == "AA") {
                $email_id = "r_cell27";
            } elseif ($email == "AB") {
                $email_id = "r_cell28";
            } elseif ($email == "AC") {
                $email_id = "r_cell29";
            } elseif ($email == "AD") {
                $email_id = "r_cell30";
            } elseif ($email == "AE") {
                $email_id = "r_cell31";
            } elseif ($email == "AF") {
                $email_id = "r_cell32";
            } elseif ($email == "AG") {
                $email_id = "r_cell33";
            } elseif ($email == "AH") {
                $email_id = "r_cell34";
            } elseif ($email == "AI") {
                $email_id = "r_cell35";
            } elseif ($email == "AJ") {
                $email_id = "r_cell36";
            } elseif ($email == "AK") {
                $email_id = "r_cell37";
            } elseif ($email == "AL") {
                $email_id = "r_cell38";
            } elseif ($email == "AM") {
                $email_id = "r_cell39";
            } elseif ($email == "AN") {
                $email_id = "r_cell40";
            } elseif ($email == "AO") {
                $email_id = "r_cell41";
            } elseif ($email == "AP") {
                $email_id = "r_cell42";
            } elseif ($email == "AQ") {
                $email_id = "r_cell43";
            } elseif ($email == "AR") {
                $email_id = "r_cell44";
            }
            // elseif($email=="AZ"){$email_id ="r_cell45"; }
            // For Mobile
            if ($mobile == "A") {
                $mobile_no = "r_cell1";
            } elseif ($mobile == "B") {
                $mobile_no = "r_cell2";
            } elseif ($mobile == "C") {
                $mobile_no = "r_cell3";
            } elseif ($mobile == "D") {
                $mobile_no = "r_cell4";
            } elseif ($mobile == "E") {
                $mobile_no = "r_cell5";
            } elseif ($mobile == "F") {
                $mobile_no = "r_cell6";
            } elseif ($mobile == "G") {
                $mobile_no = "r_cell7";
            } elseif ($mobile == "H") {
                $mobile_no = "r_cell8";
            } elseif ($mobile == "I") {
                $mobile_no = "r_cell9";
            } elseif ($mobile == "J") {
                $mobile_no = "r_cell10";
            } elseif ($mobile == "K") {
                $mobile_no = "r_cell11";
            } elseif ($mobile == "L") {
                $mobile_no = "r_cell12";
            } elseif ($mobile == "M") {
                $mobile_no = "r_cell13";
            } elseif ($mobile == "N") {
                $mobile_no = "r_cell14";
            } elseif ($mobile == "O") {
                $mobile_no = "r_cell15";
            } elseif ($mobile == "P") {
                $mobile_no = "r_cell16";
            } elseif ($mobile == "Q") {
                $mobile_no = "r_cell17";
            } elseif ($mobile == "R") {
                $mobile_no = "r_cell18";
            } elseif ($mobile == "S") {
                $mobile_no = "r_cell19";
            } elseif ($mobile == "T") {
                $mobile_no = "r_cell20";
            } elseif ($mobile == "U") {
                $mobile_no = "r_cell21";
            } elseif ($mobile == "V") {
                $mobile_no = "r_cell22";
            } elseif ($mobile == "W") {
                $mobile_no = "r_cell23";
            } elseif ($mobile == "X") {
                $mobile_no = "r_cell24";
            } elseif ($mobile == "Y") {
                $mobile_no = "r_cell25";
            } elseif ($mobile == "Z") {
                $mobile_no = "r_cell26";
            } elseif ($mobile == "AA") {
                $mobile_no = "r_cell27";
            } elseif ($mobile == "AB") {
                $mobile_no = "r_cell28";
            } elseif ($mobile == "AC") {
                $mobile_no = "r_cell29";
            } elseif ($mobile == "AD") {
                $mobile_no = "r_cell30";
            } elseif ($mobile == "AE") {
                $mobile_no = "r_cell31";
            } elseif ($mobile == "AF") {
                $mobile_no = "r_cell32";
            } elseif ($mobile == "AG") {
                $mobile_no = "r_cell33";
            } elseif ($mobile == "AH") {
                $mobile_no = "r_cell34";
            } elseif ($mobile == "AI") {
                $mobile_no = "r_cell35";
            } elseif ($mobile == "AJ") {
                $mobile_no = "r_cell36";
            } elseif ($mobile == "AK") {
                $mobile_no = "r_cell37";
            } elseif ($mobile == "AL") {
                $mobile_no = "r_cell38";
            } elseif ($mobile == "AM") {
                $mobile_no = "r_cell39";
            } elseif ($mobile == "AN") {
                $mobile_no = "r_cell40";
            } elseif ($mobile == "AO") {
                $mobile_no = "r_cell41";
            } elseif ($mobile == "AP") {
                $mobile_no = "r_cell42";
            } elseif ($mobile == "AQ") {
                $mobile_no = "r_cell43";
            } elseif ($mobile == "AR") {
                $mobile_no = "r_cell44";
            }
            // For Alternate 
            if ($altmobile == "A") {
                $alt_mobile = "r_cell1";
            } elseif ($altmobile == "B") {
                $alt_mobile = "r_cell2";
            } elseif ($altmobile == "C") {
                $alt_mobile = "r_cell3";
            } elseif ($altmobile == "D") {
                $alt_mobile = "r_cell4";
            } elseif ($altmobile == "E") {
                $alt_mobile = "r_cell5";
            } elseif ($altmobile == "F") {
                $alt_mobile = "r_cell6";
            } elseif ($altmobile == "G") {
                $alt_mobile = "r_cell7";
            } elseif ($altmobile == "H") {
                $alt_mobile = "r_cell8";
            } elseif ($altmobile == "I") {
                $alt_mobile = "r_cell9";
            } elseif ($altmobile == "J") {
                $alt_mobile = "r_cell10";
            } elseif ($altmobile == "K") {
                $alt_mobile = "r_cell11";
            } elseif ($altmobile == "L") {
                $alt_mobile = "r_cell12";
            } elseif ($altmobile == "M") {
                $alt_mobile = "r_cell13";
            } elseif ($altmobile == "N") {
                $alt_mobile = "r_cell14";
            } elseif ($altmobile == "O") {
                $alt_mobile = "r_cell15";
            } elseif ($altmobile == "P") {
                $alt_mobile = "r_cell16";
            } elseif ($altmobile == "Q") {
                $alt_mobile = "r_cell17";
            } elseif ($altmobile == "R") {
                $alt_mobile = "r_cell18";
            } elseif ($altmobile == "S") {
                $alt_mobile = "r_cell19";
            } elseif ($altmobile == "T") {
                $alt_mobile = "r_cell20";
            } elseif ($altmobile == "U") {
                $alt_mobile = "r_cell21";
            } elseif ($altmobile == "V") {
                $alt_mobile = "r_cell22";
            } elseif ($altmobile == "W") {
                $alt_mobile = "r_cell23";
            } elseif ($altmobile == "X") {
                $alt_mobile = "r_cell24";
            } elseif ($altmobile == "Y") {
                $alt_mobile = "r_cell25";
            } elseif ($altmobile == "Z") {
                $alt_mobile = "r_cell26";
            } elseif ($altmobile == "AA") {
                $alt_mobile = "r_cell27";
            } elseif ($altmobile == "AB") {
                $alt_mobile = "r_cell28";
            } elseif ($altmobile == "AC") {
                $alt_mobile = "r_cell29";
            } elseif ($altmobile == "AD") {
                $alt_mobile = "r_cell30";
            } elseif ($altmobile == "AE") {
                $alt_mobile = "r_cell31";
            } elseif ($altmobile == "AF") {
                $alt_mobile = "r_cell32";
            } elseif ($altmobile == "AG") {
                $alt_mobile = "r_cell33";
            } elseif ($altmobile == "AH") {
                $alt_mobile = "r_cell34";
            } elseif ($altmobile == "AI") {
                $alt_mobile = "r_cell35";
            } elseif ($altmobile == "AJ") {
                $alt_mobile = "r_cell36";
            } elseif ($altmobile == "AK") {
                $alt_mobile = "r_cell37";
            } elseif ($altmobile == "AL") {
                $alt_mobile = "r_cell38";
            } elseif ($altmobile == "AM") {
                $alt_mobile = "r_cell39";
            } elseif ($altmobile == "AN") {
                $alt_mobile = "r_cell40";
            } elseif ($altmobile == "AO") {
                $alt_mobile = "r_cell41";
            } elseif ($altmobile == "AP") {
                $alt_mobile = "r_cell42";
            } elseif ($altmobile == "AQ") {
                $alt_mobile = "r_cell43";
            } elseif ($altmobile == "AR") {
                $alt_mobile = "r_cell44";
            } elseif ($altmobile == "AZ") {
                $alt_mobile = "r_cell45";
            }
            // For Whatsapp 
            if ($whatsapp == "A") {
                $whatsapp_no = "r_cell1";
            } elseif ($whatsapp == "B") {
                $whatsapp_no = "r_cell2";
            } elseif ($whatsapp == "C") {
                $whatsapp_no = "r_cell3";
            } elseif ($whatsapp == "D") {
                $whatsapp_no = "r_cell4";
            } elseif ($whatsapp == "E") {
                $whatsapp_no = "r_cell5";
            } elseif ($whatsapp == "F") {
                $whatsapp_no = "r_cell6";
            } elseif ($whatsapp == "G") {
                $whatsapp_no = "r_cell7";
            } elseif ($whatsapp == "H") {
                $whatsapp_no = "r_cell8";
            } elseif ($whatsapp == "I") {
                $whatsapp_no = "r_cell9";
            } elseif ($whatsapp == "J") {
                $whatsapp_no = "r_cell10";
            } elseif ($whatsapp == "K") {
                $whatsapp_no = "r_cell11";
            } elseif ($whatsapp == "L") {
                $whatsapp_no = "r_cell12";
            } elseif ($whatsapp == "M") {
                $whatsapp_no = "r_cell13";
            } elseif ($whatsapp == "N") {
                $whatsapp_no = "r_cell14";
            } elseif ($whatsapp == "O") {
                $whatsapp_no = "r_cell15";
            } elseif ($whatsapp == "P") {
                $whatsapp_no = "r_cell16";
            } elseif ($whatsapp == "Q") {
                $whatsapp_no = "r_cell17";
            } elseif ($whatsapp == "R") {
                $whatsapp_no = "r_cell18";
            } elseif ($whatsapp == "S") {
                $whatsapp_no = "r_cell19";
            } elseif ($whatsapp == "T") {
                $whatsapp_no = "r_cell20";
            } elseif ($whatsapp == "U") {
                $whatsapp_no = "r_cell21";
            } elseif ($whatsapp == "V") {
                $whatsapp_no = "r_cell22";
            } elseif ($whatsapp == "W") {
                $whatsapp_no = "r_cell23";
            } elseif ($whatsapp == "X") {
                $whatsapp_no = "r_cell24";
            } elseif ($whatsapp == "Y") {
                $whatsapp_no = "r_cell25";
            } elseif ($whatsapp == "Z") {
                $whatsapp_no = "r_cell26";
            } elseif ($whatsapp == "AA") {
                $whatsapp_no = "r_cell27";
            } elseif ($whatsapp == "AB") {
                $whatsapp_no = "r_cell28";
            } elseif ($whatsapp == "AC") {
                $whatsapp_no = "r_cell29";
            } elseif ($whatsapp == "AD") {
                $whatsapp_no = "r_cell30";
            } elseif ($whatsapp == "AE") {
                $whatsapp_no = "r_cell31";
            } elseif ($whatsapp == "AF") {
                $whatsapp_no = "r_cell32";
            } elseif ($whatsapp == "AG") {
                $whatsapp_no = "r_cell33";
            } elseif ($whatsapp == "AH") {
                $whatsapp_no = "r_cell34";
            } elseif ($whatsapp == "AI") {
                $whatsapp_no = "r_cell35";
            } elseif ($whatsapp == "AJ") {
                $whatsapp_no = "r_cell36";
            } elseif ($whatsapp == "AK") {
                $whatsapp_no = "r_cell37";
            } elseif ($whatsapp == "AL") {
                $whatsapp_no = "r_cell38";
            } elseif ($whatsapp == "AM") {
                $whatsapp_no = "r_cell39";
            } elseif ($whatsapp == "AN") {
                $whatsapp_no = "r_cell40";
            } elseif ($whatsapp == "AO") {
                $whatsapp_no = "r_cell41";
            } elseif ($whatsapp == "AP") {
                $whatsapp_no = "r_cell42";
            } elseif ($whatsapp == "AQ") {
                $whatsapp_no = "r_cell43";
            } elseif ($whatsapp == "AR") {
                $whatsapp_no = "r_cell44";
            } elseif ($whatsapp == "AZ") {
                $whatsapp_no = "r_cell45";
            }

            // For doj 
            if ($dob == "A") {
                $dob_cr = "r_cell1";
            } elseif ($dob == "B") {
                $dob_cr = "r_cell2";
            } elseif ($dob == "C") {
                $dob_cr = "r_cell3";
            } elseif ($dob == "D") {
                $dob_cr = "r_cell4";
            } elseif ($dob == "E") {
                $dob_cr = "r_cell5";
            } elseif ($dob == "F") {
                $dob_cr = "r_cell6";
            } elseif ($dob == "G") {
                $dob_cr = "r_cell7";
            } elseif ($dob == "H") {
                $dob_cr = "r_cell8";
            } elseif ($dob == "I") {
                $dob_cr = "r_cell9";
            } elseif ($dob == "J") {
                $dob_cr = "r_cell10";
            } elseif ($dob == "K") {
                $dob_cr = "r_cell11";
            } elseif ($dob == "L") {
                $dob_cr = "r_cell12";
            } elseif ($dob == "M") {
                $dob_cr = "r_cell13";
            } elseif ($dob == "N") {
                $dob_cr = "r_cell14";
            } elseif ($dob == "O") {
                $dob_cr = "r_cell15";
            } elseif ($dob == "P") {
                $dob_cr = "r_cell16";
            } elseif ($dob == "Q") {
                $dob_cr = "r_cell17";
            } elseif ($dob == "R") {
                $dob_cr = "r_cell18";
            } elseif ($dob == "S") {
                $dob_cr = "r_cell19";
            } elseif ($dob == "T") {
                $dob_cr = "r_cell20";
            } elseif ($dob == "U") {
                $dob_cr = "r_cell21";
            } elseif ($dob == "V") {
                $dob_cr = "r_cell22";
            } elseif ($dob == "W") {
                $dob_cr = "r_cell23";
            } elseif ($dob == "X") {
                $dob_cr = "r_cell24";
            } elseif ($dob == "Y") {
                $dob_cr = "r_cell25";
            } elseif ($dob == "Z") {
                $dob_cr = "r_cell26";
            } elseif ($dob == "AA") {
                $dob_cr = "r_cell27";
            } elseif ($dob == "AB") {
                $dob_cr = "r_cell28";
            } elseif ($dob == "AC") {
                $dob_cr = "r_cell29";
            } elseif ($dob == "AD") {
                $dob_cr = "r_cell30";
            } elseif ($dob == "AE") {
                $dob_cr = "r_cell31";
            } elseif ($dob == "AF") {
                $dob_cr = "r_cell32";
            } elseif ($dob == "AG") {
                $dob_cr = "r_cell33";
            } elseif ($dob == "AH") {
                $dob_cr = "r_cell34";
            } elseif ($dob == "AI") {
                $dob_cr = "r_cell35";
            } elseif ($dob == "AJ") {
                $dob_cr = "r_cell36";
            } elseif ($dob == "AK") {
                $dob_cr = "r_cell37";
            } elseif ($dob == "AL") {
                $dob_cr = "r_cell38";
            } elseif ($dob == "AM") {
                $dob_cr = "r_cell39";
            } elseif ($dob == "AN") {
                $dob_cr = "r_cell40";
            } elseif ($dob == "AO") {
                $dob_cr = "r_cell41";
            } elseif ($dob == "AP") {
                $dob_cr = "r_cell42";
            } elseif ($dob == "AQ") {
                $dob_cr = "r_cell43";
            } elseif ($dob == "AR") {
                $dob_cr = "r_cell44";
            } elseif ($dob == "AZ") {
                $dob_cr = "r_cell45";
            }
            // For qual 
            if ($qual == "A") {
                $qualification = "r_cell1";
            } elseif ($qual == "B") {
                $qualification = "r_cell2";
            } elseif ($qual == "C") {
                $qualification = "r_cell3";
            } elseif ($qual == "D") {
                $qualification = "r_cell4";
            } elseif ($qual == "E") {
                $qualification = "r_cell5";
            } elseif ($qual == "F") {
                $qualification = "r_cell6";
            } elseif ($qual == "G") {
                $qualification = "r_cell7";
            } elseif ($qual == "H") {
                $qualification = "r_cell8";
            } elseif ($qual == "I") {
                $qualification = "r_cell9";
            } elseif ($qual == "J") {
                $qualification = "r_cell10";
            } elseif ($qual == "K") {
                $qualification = "r_cell11";
            } elseif ($qual == "L") {
                $qualification = "r_cell12";
            } elseif ($qual == "M") {
                $qualification = "r_cell13";
            } elseif ($qual == "N") {
                $qualification = "r_cell14";
            } elseif ($qual == "O") {
                $qualification = "r_cell15";
            } elseif ($qual == "P") {
                $qualification = "r_cell16";
            } elseif ($qual == "Q") {
                $qualification = "r_cell17";
            } elseif ($qual == "R") {
                $qualification = "r_cell18";
            } elseif ($qual == "S") {
                $qualification = "r_cell19";
            } elseif ($qual == "T") {
                $qualification = "r_cell20";
            } elseif ($qual == "U") {
                $qualification = "r_cell21";
            } elseif ($qual == "V") {
                $qualification = "r_cell22";
            } elseif ($qual == "W") {
                $qualification = "r_cell23";
            } elseif ($qual == "X") {
                $qualification = "r_cell24";
            } elseif ($qual == "Y") {
                $qualification = "r_cell25";
            } elseif ($qual == "Z") {
                $qualification = "r_cell26";
            } elseif ($qual == "AA") {
                $qualification = "r_cell27";
            } elseif ($qual == "AB") {
                $qualification = "r_cell28";
            } elseif ($qual == "AC") {
                $qualification = "r_cell29";
            } elseif ($qual == "AD") {
                $qualification = "r_cell30";
            } elseif ($qual == "AE") {
                $qualification = "r_cell31";
            } elseif ($qual == "AF") {
                $qualification = "r_cell32";
            } elseif ($qual == "AG") {
                $qualification = "r_cell33";
            } elseif ($qual == "AH") {
                $qualification = "r_cell34";
            } elseif ($qual == "AI") {
                $qualification = "r_cell35";
            } elseif ($qual == "AJ") {
                $qualification = "r_cell36";
            } elseif ($qual == "AK") {
                $qualification = "r_cell37";
            } elseif ($qual == "AL") {
                $qualification = "r_cell38";
            } elseif ($qual == "AM") {
                $qualification = "r_cell39";
            } elseif ($qual == "AN") {
                $qualification = "r_cell40";
            } elseif ($qual == "AO") {
                $qualification = "r_cell41";
            } elseif ($qual == "AP") {
                $qualification = "r_cell42";
            } elseif ($qual == "AQ") {
                $qualification = "r_cell43";
            } elseif ($qual == "AR") {
                $qualification = "r_cell44";
            } elseif ($qual == "AZ") {
                $qualification = "r_cell45";
            }
            // For company 
            if ($company == "A") {
                $company_cr = "r_cell1";
            } elseif ($company == "B") {
                $company_cr = "r_cell2";
            } elseif ($company == "C") {
                $company_cr = "r_cell3";
            } elseif ($company == "D") {
                $company_cr = "r_cell4";
            } elseif ($company == "E") {
                $company_cr = "r_cell5";
            } elseif ($company == "F") {
                $company_cr = "r_cell6";
            } elseif ($company == "G") {
                $company_cr = "r_cell7";
            } elseif ($company == "H") {
                $company_cr = "r_cell8";
            } elseif ($company == "I") {
                $company_cr = "r_cell9";
            } elseif ($company == "J") {
                $company_cr = "r_cell10";
            } elseif ($company == "K") {
                $company_cr = "r_cell11";
            } elseif ($company == "L") {
                $company_cr = "r_cell12";
            } elseif ($company == "M") {
                $company_cr = "r_cell13";
            } elseif ($company == "N") {
                $company_cr = "r_cell14";
            } elseif ($company == "O") {
                $company_cr = "r_cell15";
            } elseif ($company == "P") {
                $company_cr = "r_cell16";
            } elseif ($company == "Q") {
                $company_cr = "r_cell17";
            } elseif ($company == "R") {
                $company_cr = "r_cell18";
            } elseif ($company == "S") {
                $company_cr = "r_cell19";
            } elseif ($company == "T") {
                $company_cr = "r_cell20";
            } elseif ($company == "U") {
                $company_cr = "r_cell21";
            } elseif ($company == "V") {
                $company_cr = "r_cell22";
            } elseif ($company == "W") {
                $company_cr = "r_cell23";
            } elseif ($company == "X") {
                $company_cr = "r_cell24";
            } elseif ($company == "Y") {
                $company_cr = "r_cell25";
            } elseif ($company == "Z") {
                $company_cr = "r_cell26";
            } elseif ($company == "AA") {
                $company_cr = "r_cell27";
            } elseif ($company == "AB") {
                $company_cr = "r_cell28";
            } elseif ($company == "AC") {
                $company_cr = "r_cell29";
            } elseif ($company == "AD") {
                $company_cr = "r_cell30";
            } elseif ($company == "AE") {
                $company_cr = "r_cell31";
            } elseif ($company == "AF") {
                $company_cr = "r_cell32";
            } elseif ($company == "AG") {
                $company_cr = "r_cell33";
            } elseif ($company == "AH") {
                $company_cr = "r_cell34";
            } elseif ($company == "AI") {
                $company_cr = "r_cell35";
            } elseif ($company == "AJ") {
                $company_cr = "r_cell36";
            } elseif ($company == "AK") {
                $company_cr = "r_cell37";
            } elseif ($company == "AL") {
                $company_cr = "r_cell38";
            } elseif ($company == "AM") {
                $company_cr = "r_cell39";
            } elseif ($company == "AN") {
                $company_cr = "r_cell40";
            } elseif ($company == "AO") {
                $company_cr = "r_cell41";
            } elseif ($company == "AP") {
                $company_cr = "r_cell42";
            } elseif ($company == "AQ") {
                $company_cr = "r_cell43";
            } elseif ($company == "AR") {
                $company_cr = "r_cell44";
            } elseif ($company == "AZ") {
                $company_cr = "r_cell45";
            }
            // For desgn 
            if ($desgn == "A") {
                $designation = "r_cell1";
            } elseif ($desgn == "B") {
                $designation = "r_cell2";
            } elseif ($desgn == "C") {
                $designation = "r_cell3";
            } elseif ($desgn == "D") {
                $designation = "r_cell4";
            } elseif ($desgn == "E") {
                $designation = "r_cell5";
            } elseif ($desgn == "F") {
                $designation = "r_cell6";
            } elseif ($desgn == "G") {
                $designation = "r_cell7";
            } elseif ($desgn == "H") {
                $designation = "r_cell8";
            } elseif ($desgn == "I") {
                $designation = "r_cell9";
            } elseif ($desgn == "J") {
                $designation = "r_cell10";
            } elseif ($desgn == "K") {
                $designation = "r_cell11";
            } elseif ($desgn == "L") {
                $designation = "r_cell12";
            } elseif ($desgn == "M") {
                $designation = "r_cell13";
            } elseif ($desgn == "N") {
                $designation = "r_cell14";
            } elseif ($desgn == "O") {
                $designation = "r_cell15";
            } elseif ($desgn == "P") {
                $designation = "r_cell16";
            } elseif ($desgn == "Q") {
                $designation = "r_cell17";
            } elseif ($desgn == "R") {
                $designation = "r_cell18";
            } elseif ($desgn == "S") {
                $designation = "r_cell19";
            } elseif ($desgn == "T") {
                $designation = "r_cell20";
            } elseif ($desgn == "U") {
                $designation = "r_cell21";
            } elseif ($desgn == "V") {
                $designation = "r_cell22";
            } elseif ($desgn == "W") {
                $designation = "r_cell23";
            } elseif ($desgn == "X") {
                $designation = "r_cell24";
            } elseif ($desgn == "Y") {
                $designation = "r_cell25";
            } elseif ($desgn == "Z") {
                $designation = "r_cell26";
            } elseif ($desgn == "AA") {
                $designation = "r_cell27";
            } elseif ($desgn == "AB") {
                $designation = "r_cell28";
            } elseif ($desgn == "AC") {
                $designation = "r_cell29";
            } elseif ($desgn == "AD") {
                $designation = "r_cell30";
            } elseif ($desgn == "AE") {
                $designation = "r_cell31";
            } elseif ($desgn == "AF") {
                $designation = "r_cell32";
            } elseif ($desgn == "AG") {
                $designation = "r_cell33";
            } elseif ($desgn == "AH") {
                $designation = "r_cell34";
            } elseif ($desgn == "AI") {
                $designation = "r_cell35";
            } elseif ($desgn == "AJ") {
                $designation = "r_cell36";
            } elseif ($desgn == "AK") {
                $designation = "r_cell37";
            } elseif ($desgn == "AL") {
                $designation = "r_cell38";
            } elseif ($desgn == "AM") {
                $designation = "r_cell39";
            } elseif ($desgn == "AN") {
                $designation = "r_cell40";
            } elseif ($desgn == "AO") {
                $designation = "r_cell41";
            } elseif ($desgn == "AP") {
                $designation = "r_cell42";
            } elseif ($desgn == "AQ") {
                $designation = "r_cell43";
            } elseif ($desgn == "AR") {
                $designation = "r_cell44";
            } elseif ($desgn == "AZ") {
                $designation = "r_cell45";
            }
            // For location 
            if ($loc == "A") {
                $location = "r_cell1";
            } elseif ($loc == "B") {
                $location = "r_cell2";
            } elseif ($loc == "C") {
                $location = "r_cell3";
            } elseif ($loc == "D") {
                $location = "r_cell4";
            } elseif ($loc == "E") {
                $location = "r_cell5";
            } elseif ($loc == "F") {
                $location = "r_cell6";
            } elseif ($loc == "G") {
                $location = "r_cell7";
            } elseif ($loc == "H") {
                $location = "r_cell8";
            } elseif ($loc == "I") {
                $location = "r_cell9";
            } elseif ($loc == "J") {
                $location = "r_cell10";
            } elseif ($loc == "K") {
                $location = "r_cell11";
            } elseif ($loc == "L") {
                $location = "r_cell12";
            } elseif ($loc == "M") {
                $location = "r_cell13";
            } elseif ($loc == "N") {
                $location = "r_cell14";
            } elseif ($loc == "O") {
                $location = "r_cell15";
            } elseif ($loc == "P") {
                $location = "r_cell16";
            } elseif ($loc == "Q") {
                $location = "r_cell17";
            } elseif ($loc == "R") {
                $location = "r_cell18";
            } elseif ($loc == "S") {
                $location = "r_cell19";
            } elseif ($loc == "T") {
                $location = "r_cell20";
            } elseif ($loc == "U") {
                $location = "r_cell21";
            } elseif ($loc == "V") {
                $location = "r_cell22";
            } elseif ($loc == "W") {
                $location = "r_cell23";
            } elseif ($loc == "X") {
                $location = "r_cell24";
            } elseif ($loc == "Y") {
                $location = "r_cell25";
            } elseif ($loc == "Z") {
                $location = "r_cell26";
            } elseif ($loc == "AA") {
                $location = "r_cell27";
            } elseif ($loc == "AB") {
                $location = "r_cell28";
            } elseif ($loc == "AC") {
                $location = "r_cell29";
            } elseif ($loc == "AD") {
                $location = "r_cell30";
            } elseif ($loc == "AE") {
                $location = "r_cell31";
            } elseif ($loc == "AF") {
                $location = "r_cell32";
            } elseif ($loc == "AG") {
                $location = "r_cell33";
            } elseif ($loc == "AH") {
                $location = "r_cell34";
            } elseif ($loc == "AI") {
                $location = "r_cell35";
            } elseif ($loc == "AJ") {
                $location = "r_cell36";
            } elseif ($loc == "AK") {
                $location = "r_cell37";
            } elseif ($loc == "AL") {
                $location = "r_cell38";
            } elseif ($loc == "AM") {
                $location = "r_cell39";
            } elseif ($loc == "AN") {
                $location = "r_cell40";
            } elseif ($loc == "AO") {
                $location = "r_cell41";
            } elseif ($loc == "AP") {
                $location = "r_cell42";
            } elseif ($loc == "AQ") {
                $location = "r_cell43";
            } elseif ($loc == "AR") {
                $location = "r_cell44";
            } elseif ($loc == "AZ") {
                $location = "r_cell45";
            }
            // For experience 
            if ($exp == "A") {
                $experience = "r_cell1";
            } elseif ($exp == "B") {
                $experience = "r_cell2";
            } elseif ($exp == "C") {
                $experience = "r_cell3";
            } elseif ($exp == "D") {
                $experience = "r_cell4";
            } elseif ($exp == "E") {
                $experience = "r_cell5";
            } elseif ($exp == "F") {
                $experience = "r_cell6";
            } elseif ($exp == "G") {
                $experience = "r_cell7";
            } elseif ($exp == "H") {
                $experience = "r_cell8";
            } elseif ($exp == "I") {
                $experience = "r_cell9";
            } elseif ($exp == "J") {
                $experience = "r_cell10";
            } elseif ($exp == "K") {
                $experience = "r_cell11";
            } elseif ($exp == "L") {
                $experience = "r_cell12";
            } elseif ($exp == "M") {
                $experience = "r_cell13";
            } elseif ($exp == "N") {
                $experience = "r_cell14";
            } elseif ($exp == "O") {
                $experience = "r_cell15";
            } elseif ($exp == "P") {
                $experience = "r_cell16";
            } elseif ($exp == "Q") {
                $experience = "r_cell17";
            } elseif ($exp == "R") {
                $experience = "r_cell18";
            } elseif ($exp == "S") {
                $experience = "r_cell19";
            } elseif ($exp == "T") {
                $experience = "r_cell20";
            } elseif ($exp == "U") {
                $experience = "r_cell21";
            } elseif ($exp == "V") {
                $experience = "r_cell22";
            } elseif ($exp == "W") {
                $experience = "r_cell23";
            } elseif ($exp == "X") {
                $experience = "r_cell24";
            } elseif ($exp == "Y") {
                $experience = "r_cell25";
            } elseif ($exp == "Z") {
                $experience = "r_cell26";
            } elseif ($exp == "AA") {
                $experience = "r_cell27";
            } elseif ($exp == "AB") {
                $experience = "r_cell28";
            } elseif ($exp == "AC") {
                $experience = "r_cell29";
            } elseif ($exp == "AD") {
                $experience = "r_cell30";
            } elseif ($exp == "AE") {
                $experience = "r_cell31";
            } elseif ($exp == "AF") {
                $experience = "r_cell32";
            } elseif ($exp == "AG") {
                $experience = "r_cell33";
            } elseif ($exp == "AH") {
                $experience = "r_cell34";
            } elseif ($exp == "AI") {
                $experience = "r_cell35";
            } elseif ($exp == "AJ") {
                $experience = "r_cell36";
            } elseif ($exp == "AK") {
                $experience = "r_cell37";
            } elseif ($exp == "AL") {
                $experience = "r_cell38";
            } elseif ($exp == "AM") {
                $experience = "r_cell39";
            } elseif ($exp == "AN") {
                $experience = "r_cell40";
            } elseif ($exp == "AO") {
                $experience = "r_cell41";
            } elseif ($exp == "AP") {
                $experience = "r_cell42";
            } elseif ($exp == "AQ") {
                $experience = "r_cell43";
            } elseif ($exp == "AR") {
                $experience = "r_cell44";
            } elseif ($exp == "AZ") {
                $experience = "r_cell45";
            }
        }

        $all_canditates_received = 0;
        $total_candidate_sourced = 0;
        $total_candidate_duplicate = 0;
        $invalid_email_id = 0;
        $invalid_mobile_no = 0;

        foreach ($data as $row) {
            $all_canditates_received++;
            $validate_mobile_no = false;
            $validate_email_id = false;

            if (preg_match('/^[0-9]{10}+$/', str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', $row[$mobile_no]))) {
                $validate_mobile_no = true;
                $filtered_mobile_no = str_replace(array("+91-", '91-', "91 ", "+91", "+91_", "91_"), '', $row[$mobile_no]);
            } else {
                $invalid_mobile_no++;
            }
            if (filter_var($row[$email_id], FILTER_VALIDATE_EMAIL)) {
                $validate_email_id = true;
                $filtered_email_id = strtolower($row[$email_id]);
            } else {
                $invalid_email_id++;
            }

            // only continue if all validation Passed 
            if ($validate_mobile_no || $validate_email_id) {

                $check_duplicate_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $tic->candidate_email)->where('job_id', $get_job_details->job_id)->first();
                $check_duplicate_applicant = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('candidate_email', $tic->candidate_email)->where('job_id', $get_job_details->job_id)->first();
                if ($check_duplicate_candidate) {

                    $get_screen_id = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $get_job_details->job_id)->where('candidate_id', $check_duplicate_candidate->candidate_id)->first();
                }
                // dd($get_screen_id)
                // # CHECKPOINT :-Statement for duplicate candidate check 
                // # CHECKPOINT :-Statement for duplicate source summary check 
                $check_source_summary = TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                    ->where('u_id', Auth::user()->id)
                    ->where('job_id', $tic->job_id)
                    ->where('date', today_date())
                    ->first();
                // dd($check_source_summary);
                // // # CHECKPOINT :-If duplicate candidate not found 
                if (!$check_duplicate_candidate) {
                    // # CHECKPOINT :-If source with userid and job id not found 
                    if (!$check_source_summary) {
                        $candidate_key = generate_candidate_key();
                        $new_file_name = "";

                        $add_candidate_master = TicCandidateMaster::create(
                            [
                                'candidate_key' => $candidate_key,
                                'cloud_id' => Auth::user()->cloud_id,
                                'candidate_name' => ucwords($row[$name]),
                                'candidate_email' => $filtered_email_id,
                                'candidate_phone' => $filtered_mobile_no,
                                'candidate_alt_phone' => $row[$alt_mobile],
                                'candidate_dob' => $row[$dob_cr],
                                'candidate_location' => $row[$location],
                                'candidate_high_qual' =>  $row[$qualification],
                                'candidate_employer_name' =>  $row[$company_cr],
                                'candidate_designation' =>  $row[$designation],
                                'created_date' => today_date(),
                                'created_time' => today_time(),
                                'last_modified' => today_date(),
                                'total_job_offers_count' => "0",
                                'total_job_applied_count' => "0",
                            ]
                        );
                        $add_candidate_screening = TicCandidateScreening::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "job_id" => $tic->job_id,
                                "candidate_id" => $add_candidate_master->candidate_id,
                                'candidate_name' => ucwords($row[$name]),
                                'candidate_email' => $filtered_email_id,
                                'candidate_phone' => $filtered_mobile_no,
                                'candidate_alt_phone' => $row[$alt_mobile],
                                'candidate_dob' => $row[$dob_cr],
                                'candidate_location' => $row[$location],
                                'candidate_high_qual' =>  $row[$qualification],
                                'candidate_employer_name' =>  $row[$company_cr],
                                'candidate_designation' =>  $row[$designation],
                                "job_ownerid" => get_job_ownerid($tic->job_id),
                                "recruiter" => Auth::user()->id,
                                'source_from' => "Excel Import",
                                "screen_status" => "Sourced",
                                "date" => today_date(),
                                "time" => today_time()
                            ]
                        );
                        $add_candidate_history = TicCandidateHistory::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "applied_job_id" => $tic->job_id,
                                "applied_job_title" => $get_job_details->job_title,
                                "applied_company_name" => $get_job_details->job_company_name,
                                "applied_company_location" => $get_job_details->job_location,
                                "screen_id" => $add_candidate_screening->screen_id,
                                "applicant_id" => "0",
                                "candidate_id" => $add_candidate_master->candidate_id,
                                "activity_type" => "Sourced",
                                "activity_notes" => "dynamic notes will be here",
                                "user_id" => Auth::user()->id,
                                "user_name" => Auth::user()->name,
                                "date" => today_date(),
                                "time" => today_time(),
                                "ip" => get_client_ip(),
                                "browser" => get_client_browser()
                            ]
                        );
                        $add_source_summary = TicCandidateSourceSummary::create(
                            [
                                'cloud_id' => Auth::user()->cloud_id,
                                'job_id' => $tic->job_id,
                                'u_id' => Auth::user()->id,
                                'date' => today_date(),
                                'time' => today_time(),
                                'add_from_excel' => "1",
                                'add_reference' => "",
                                'total_sourced' => "1"
                            ]
                        );
                        $total_candidate_sourced++;
                    }
                    // # CHECKPOINT :-If source with userid and job id found 
                    else {

                        $candidate_key = generate_candidate_key();
                        $new_file_name = "";

                        $add_candidate_master = TicCandidateMaster::create(
                            [
                                'candidate_key' => $candidate_key,
                                'cloud_id' => Auth::user()->cloud_id,
                                'candidate_name' => ucwords($row[$name]),
                                'candidate_email' => $filtered_email_id,
                                'candidate_phone' => $filtered_mobile_no,
                                'candidate_alt_phone' => $row[$alt_mobile],
                                'candidate_dob' => $row[$dob_cr],
                                'candidate_location' => $row[$location],
                                'candidate_high_qual' =>  $row[$qualification],
                                'candidate_employer_name' =>  $row[$company_cr],
                                'candidate_designation' =>  $row[$designation],
                                'created_date' => today_date(),
                                'created_time' => today_time(),
                                'last_modified' => today_date(),
                                'total_job_offers_count' => "0",
                                'total_job_applied_count' => "0",
                            ]
                        );
                        $add_candidate_screening = TicCandidateScreening::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "job_id" => $tic->job_id,
                                "candidate_id" => $add_candidate_master->candidate_id,
                                'candidate_name' => ucwords($row[$name]),
                                'candidate_email' => $filtered_mobile_no,
                                'candidate_email' => $filtered_email_id,
                                'candidate_phone' => $filtered_mobile_no,
                                'candidate_dob' => $row[$dob_cr],
                                'candidate_location' => $row[$location],
                                'candidate_high_qual' =>  $row[$qualification],
                                'candidate_employer_name' =>  $row[$company_cr],
                                'candidate_designation' =>  $row[$designation],
                                "job_ownerid" => get_job_ownerid($tic->job_id),
                                "recruiter" => Auth::user()->id,
                                'source_from' => "Excel Import",
                                "screen_status" => "Sourced",
                                "date" => today_date(),
                                "time" => today_time()
                            ]
                        );
                        $add_candidate_history = TicCandidateHistory::create(
                            [
                                "cloud_id" => Auth::user()->cloud_id,
                                "applied_job_id" => $tic->job_id,
                                "applied_job_title" => $get_job_details->job_title,
                                "applied_company_name" => $get_job_details->job_company_name,
                                "applied_company_location" => $get_job_details->job_location,
                                "screen_id" => $add_candidate_screening->screen_id,
                                "applicant_id" => "0",
                                "candidate_id" => $add_candidate_master->candidate_id,
                                "activity_type" => "Sourced",
                                "activity_notes" => "dynamic notes will be here",
                                "user_id" => Auth::user()->id,
                                "user_name" => Auth::user()->name,
                                "date" => today_date(),
                                "time" => today_time(),
                                "ip" => get_client_ip(),
                                "browser" => get_client_browser()
                            ]
                        );
                        // #update source summary table
                        $get_source_summary = get_source_summary_details($tic->job_id, Auth::user()->id);
                        $last_add_candidate_count = $get_source_summary->add_from_excel;
                        $incremented_add_from_excel_count = $last_add_candidate_count + 1;
                        $total_sourced = $get_source_summary->add_candidate + $incremented_add_from_excel_count + $get_source_summary->add_from_resume + $get_source_summary->add_from_db;
                        TicCandidateSourceSummary::where('cloud_id', Auth::user()->cloud_id)
                            ->where('u_id', Auth::user()->id)
                            ->where('job_id', $tic->job_id)
                            ->where('date', today_date())
                            ->update(
                                [
                                    'add_from_excel' => $incremented_add_from_excel_count,
                                    'date' => today_date(),
                                    'time' => today_time(),
                                    'total_sourced' => $total_sourced
                                ]
                            );
                        $total_candidate_sourced++;
                    }
                }

                // # CHECKPOINT :-If duplicate candidate found 
                if ($check_duplicate_candidate) {
                    TicCandidateDuplicateLog::create(
                        [

                            'cloud_id' => Auth::user()->cloud_id,
                            'user_id' => Auth::user()->id,
                            'user_name' => Auth::user()->name,
                            'job_id' => $tic->job_id,
                            'duplicate_name' => ucwords($row[$name]),
                            'duplicate_email' => $filtered_email_id,
                            'duplicate_phone' => $filtered_mobile_no,
                            'duplicate_with' => $get_screen_id->screen_id,
                            'duplicate_from' => "Add Candidate From Excel",
                            'duplicate_source' => "From Excel",
                            'date' => today_date(),
                            'time' => today_time(),
                            'ip' => get_client_ip(),
                            'browser' => get_client_browser(),
                        ]
                    );
                    $add_candidate_history = TicCandidateHistory::create(
                        [
                            "cloud_id" => Auth::user()->cloud_id,
                            "applied_job_id" => $tic->job_id,
                            "applied_job_title" => $get_job_details->job_title,
                            "applied_company_name" => $get_job_details->job_company_name,
                            "applied_company_location" => $get_job_details->job_location,
                            "screen_id" => $get_screen_id->screen_id,
                            "applicant_id" => "0",
                            "candidate_id" => $check_duplicate_candidate->candidate_id,
                            "activity_type" => "Duplicate",
                            "activity_notes" => "Attempt to source request declined as the candidate is Duplicate - Source Excel",
                            "user_id" => Auth::user()->id,
                            "user_name" => Auth::user()->name,
                            "date" => today_date(),
                            "time" => today_time(),
                            "ip" => get_client_ip(),
                            "browser" => get_client_browser()
                        ]
                    );
                    $total_candidate_duplicate++;
                }
            }
        }
        $job_id = $tic->job_id;
        $file_name = $tic->file_name;
        $source_time = $tic->source_time;
        // echo "Total Candidate Received : ".$all_canditates_received."<br>";
        // echo "Total Candidate Sourced : ".$total_candidate_sourced . "<br>";
        // echo "Total Candidate Duplicate : ".$total_candidate_duplicate . "<br>";
        // echo "Total Invalid Email Id : ".$invalid_email_id . "<br>";
        // echo "Total Invalid Mobile Number : ".$invalid_mobile_no . "<br>";
        return view('admin.pages.sourcing_excel_report')->with(compact('job_id', 'file_name', 'source_time', 'all_canditates_received', 'total_candidate_sourced', 'total_candidate_duplicate', 'invalid_email_id', 'invalid_mobile_no'));
    }
    public function parse_pdf(Request $req)
    {

        $email = array();
        $phone = array();
        $full_name = array();
        $file = $req->file('file');
        $ext = $file->getClientOriginalExtension();
        $filename = $file->getClientOriginalName();
        $basename = basename($filename, "." . $ext);

        if ($file->getClientOriginalExtension() === "pdf") {
            $parser = new \Smalot\PdfParser\Parser();
            $pdf = $parser->parseFile($file);
            $textContent = $pdf->getText();
            $pdfText = nl2br($textContent);
            $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
            preg_match_all($test_patt, $pdfText, $email1);
            foreach ($email1[0] as $mail) {
                $email[] = $mail;
            }
            $test_phone = '/\b[0-9]{3}\s*[-]?\s*[0-9]{3}\s*[-]?\s*[0-9]{4}\b/';
            preg_match_all($test_phone, $pdfText, $phone1);
            foreach ($phone1[0] as $phone2) {
                $phone[] = $phone2;
            }
            $words = explode(" ", $pdfText);
            if (count($words) >= 2) {

                $firstname = $words[0];
                $lastname = $words[1];
                $full_name[] = $firstname . " " . $lastname;
            } else {
                $full_name = "Not Detected";
            }
            // $file->move(public_path('api_resume'), $basename);

            return response()->json([
                "data" => compact('phone', 'email', 'full_name'),
                "message" => "File successfully uploaded"
            ]);
        }
        if ($file->getClientOriginalExtension() === "docx") {
            $full_name[0] = "";
            $phpWord = IOFactory::createReader('Word2007')->load($req->file('file')->path());
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('doc.html');
            $content = file_get_contents(public_path('doc.html'));
            $test_phone = '/\b[0-9]{3}\s*[-]?\s*[0-9]{3}\s*[-]?\s*[0-9]{4}\b/';
            preg_match_all($test_phone, $content, $phone1);
            foreach ($phone1[0] as $phone2) {
                $phone[] = $phone2;
            }
            $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
            preg_match_all($test_patt, $content, $email1);
            foreach ($email1[0] as $mail) {
                $email[] = $mail;
            }
            // $file->move(public_path('api_resume'), $basename);

            return response()->json([
                "data" => compact('phone', 'email', 'full_name'),
                "message" => "File successfully uploaded"
            ]);
        }
        if ($file->getClientOriginalExtension() === "rtf") {
            $full_name[0] = "";
            $phpWord = IOFactory::createReader('RTF')->load($req->file('file')->path());
            $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
            $objWriter->save('doc.html');
            $content = file_get_contents(public_path('doc.html'));
            $test_phone = '/\b[0-9]{3}\s*[-]?\s*[0-9]{3}\s*[-]?\s*[0-9]{4}\b/';
            preg_match_all($test_phone, $content, $phone1);
            foreach ($phone1[0] as $phone2) {
                $phone[] = $phone2;
            }
            $test_patt = "/(?:[a-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+=?^_`{|}~-]+)*|\"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*\")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/";
            preg_match_all($test_patt, $content, $email1);
            foreach ($email1[0] as $mail) {
                $email[] = $mail;
            }
            // $file->move(public_path('api_resume'), $basename);

            return response()->json([
                "data" => compact('phone', 'email', 'full_name'),
                "message" => "File successfully uploaded"
            ]);
        }
    }
    public function search_from_database($job_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                return view('admin.pages.search_from_database')->with(compact('job_id'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function search_result_from_database($job_id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_valid_job = TicJobs::where('job_code', $job_id)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_valid_job) {
                $get_cloud_candidates = TicCandidateMaster::where('cloud_id', Auth::user()->cloud_id)->get();
                return view('admin.pages.search_result_from_database')->with(compact('job_id', 'get_cloud_candidates'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_candidate($candidate_key)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $get_candidate_details = TicCandidateMaster::where('candidate_key', $candidate_key)->where('cloud_id', Auth::user()->cloud_id)->first();
            if ($get_candidate_details) {
                return view('admin.pages.view_candidate')->with(compact('get_candidate_details'));
            } else {
                return view('admin.pages.job_not_found')->with('error_msg', "Share Job");
            }
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }




    // |--------------------------------------------------------------------------
    // | Side Menu Client
    // |--------------------------------------------------------------------------
    public function organisation()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $client_details_active = Client::where('cloud_id', Auth::user()->cloud_id)->where('company_status', 'ACTIVE')->get();
            $client_details_inactive = Client::where('cloud_id', Auth::user()->cloud_id)->where('company_status', 'INACTIVE')->get();
            $no_of_active_company = count($client_details_active);
            $no_of_inactive_company = count($client_details_inactive);
            return view('admin.pages.client.organisation', compact('client_details_active', 'client_details_inactive', 'no_of_active_company', 'no_of_inactive_company'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_organisation()
    {

        $users = User::where('cloud_id', Auth::user()->cloud_id)->get();
        return view('admin.pages.client.add_organisation', compact('users'));
    }
    public function add_organisation_post(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            //dd($request->all());
            $logo_image_name = "";

            $profile_image_name = "";

            $agreement_file = "";

            $file_ext = "";

            $fileSize = "";

            $basename = "";

            $validatedData = $request->validate([
                'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'profile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'file' => 'file|mimes:doc,docx,pdf,txt,rtf'
            ], [
                'logo.image' => 'Image type jpg,png,jpeg,gif,svg only allowed.',
                'profile.image' => 'Image type png,gif,svg only allowed.',
                'file' => 'File must be doc,docx,pdf,txt,rtf only allowed'
            ]);

            if (request()->hasFile('logo')) {
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $logo_image_name = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('assets/company_logo'), $logo_image_name);
            }
            if (request()->hasFile('profile')) {
                $file = $request->file('profile');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $profile_image_name = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('assets/profile_image'), $profile_image_name);
            }

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $file_ext = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();
                $filename = $file->getClientOriginalName();
                $file_basename = basename($filename, "." . $file_ext);
                $agreement_file = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $file_ext;
                $file->move(public_path('assets/agreement_file'), $agreement_file);
            }

            if ($request->talent_portal == "Yes") {
                $ticket_type = $request->ticket_type;
                $link = $request->link;
            } else {
                $ticket_type = NULL;
                $link = NULL;
            }

            $client_save = Client::create(
                [
                    'client_name' => $request->client_name,
                    'cloud_id' => Auth::user()->cloud_id,
                    'industry' => $request->industry,
                    'website' => $request->website,
                    'about_client' => strip_tags($request->about_client),
                    'logo' => $logo_image_name,
                    'profile' => $profile_image_name,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'instagram' => $request->instagram,
                    'contract_start' => $request->start,
                    'contract_end' => $request->end,
                    'file' => $basename,
                    'assign_acc_manager' => $request->assign_acc_manager,
                    'expiry' => $request->expiry,
                    'have_any_id' => $request->have_any_id,
                    'id_proof' => $request->id_proof,
                    'talent_portal' => $request->talent_portal,
                    'ticket_type' => $ticket_type,
                    'link' => $link,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );

            if ($client_save) {
                $user_name = Auth::user()->name;
                // dd($client_save->company_id);
                if (is_null($client_save->company_id)) {
                    //dd("updated code");
                    CompanyHistory::where('company_id', $client_save->company_id)->create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'company_id' => $client_save->company_id,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'activity_type' => "modified",
                        'activity_notes' => "The company named $client_save->client_name was modified by $user_name",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser()
                    ]);
                } else {
                    //dd("created code");
                    CompanyHistory::create([
                        'cloud_id' => Auth::user()->cloud_id,
                        'company_id' => $client_save->company_id,
                        'user_id' => Auth::user()->id,
                        'user_name' => Auth::user()->name,
                        'activity_type' => "created",
                        'activity_notes' => "A company named $client_save->client_name was created by $user_name",
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser()
                    ]);
                }

                CompanyAgreement::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'company_id' => $client_save->company_id,
                        'contract_start' => $request->start,
                        'contract_end' => $request->end,
                        'agreement_file' => $agreement_file,
                        'file_size' => $fileSize,
                        'file_ext' => $file_ext,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser()
                    ]
                );
            }

            return redirect(url('/organisation'))->with('success', 'Company Added Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_organisation($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $company = Client::where('company_id', $id)->first();
            return view('admin.pages.client.edit_organisation', compact('company'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_organisation_post(Request $request, $id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $logo_image_name = "";

            $profile_image_name = "";

            $agreement_file = "";

            $file_ext = "";

            $fileSize = "";

            $basename = "";

            $validatedData = $request->validate([
                'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'profile' => 'image|mimes:jpg,png,gif,svg|max:2048',
                'file' => 'file|mimes:doc,docx,pdf,txt,rtf'
            ], [
                'logo.image' => 'Image type jpg,png,jpeg,gif,svg only allowed.',
                'profile.image' => 'Image type png,gif,svg only allowed.',
                'file' => 'File must be doc,docx,pdf,txt,rtf only allowed'
            ]);

            if (request()->hasFile('logo')) {
                $file = $request->file('logo');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $logo_image_name = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('assets/company_logo'), $logo_image_name);
            }
            if (request()->hasFile('profile')) {
                $file = $request->file('profile');
                $ext = $file->getClientOriginalExtension();
                $filename = $file->getClientOriginalName();
                $basename = basename($filename, "." . $ext);
                $profile_image_name = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('assets/profile_image'), $profile_image_name);
            }

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $file_ext = $file->getClientOriginalExtension();
                $fileSize = $file->getSize();
                $filename = $file->getClientOriginalName();
                $file_basename = basename($filename, "." . $file_ext);
                $agreement_file = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $file_ext;
                $file->move(public_path('assets/agreement_file'), $agreement_file);
            }

            if ($request->talent_portal == "Yes") {
                $ticket_type = $request->ticket_type;
                $link = $request->link;
            } else {
                $ticket_type = NULL;
                $link = NULL;
            }

            $client_save = Client::where('company_id', $id)->update(
                [
                    'client_name' => $request->client_name,
                    'cloud_id' => Auth::user()->cloud_id,
                    'industry' => $request->industry,
                    'website' => $request->website,
                    'about_client' => strip_tags($request->about_client),
                    'logo' => $logo_image_name,
                    'profile' => $profile_image_name,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'instagram' => $request->instagram,
                    'contract_start' => $request->start,
                    'contract_end' => $request->end,
                    'file' => $basename,
                    'assign_acc_manager' => $request->assign_acc_manager,
                    'expiry' => $request->expiry,
                    'have_any_id' => $request->have_any_id,
                    'id_proof' => $request->id_proof,
                    'talent_portal' => $request->talent_portal,
                    'ticket_type' => $ticket_type,
                    'link' => $link,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );


            return redirect(url('/organisation'))->with('success', 'Client Added Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function delete_organisation($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            Client::where('id', $id)->delete();
            return back()->with('error', 'Client Deleted Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function change_company_status($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $status = Client::find($id);
            if ($status->company_status == "INACTIVE") {
                $status->company_status = "ACTIVE";
                $status->save();
            } elseif ($status->company_status == "ACTIVE") {
                $status->company_status = "INACTIVE";
                $status->save();
            }
            return back();
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function company_profile($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $company = DB::table('tic_company')
                ->join('users', 'tic_company.cloud_id', 'users.cloud_id')
                ->join('tic_company_agreements', 'tic_company.company_id', 'tic_company_agreements.company_id')
                ->where('tic_company.company_id', $id)
                ->select('tic_company.*', 'users.name as user_name', 'users.profile_image', 'tic_company_agreements.agreement_file', 'tic_company_agreements.file_size', 'tic_company_agreements.file_ext', 'tic_company_agreements.agreement_file_name')
                ->first();
            $company_logs = CompanyHistory::where('company_id', $id)->get();
            //dd($company_logs);
            return view('admin.pages.client.view_company_profile', compact('company', 'company_logs'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function contacts()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $contacts = DB::table('tic_company_contacts')
                ->join('tic_company', 'tic_company_contacts.company_id', '=', 'tic_company.company_id')
                ->where('tic_company.cloud_id', Auth::user()->cloud_id)
                ->select('tic_company_contacts.*', 'tic_company.client_name', 'tic_company.logo')
                ->get();
            //dd($contacts);
            return view('admin.pages.client.contact', compact('contacts'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_contacts()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.client.add_contact');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_contacts_post(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            //dd($request->client_id);
            $phone = "";
            $email = "";
            $this->validate($request, []);

            if (is_array($request->phone)) {
                $phone = implode(',', $request->phone);
            }

            if (is_array($request->email)) {
                $email = implode(',', $request->email);
            }

            Contact::create(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'company_id' => $request->client_id,
                    'location_id' => $request->address_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'designation' => $request->designation,
                    'user_type' => $request->user_type,
                    'phone' => $phone,
                    'email' => $email,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'instagram' => $request->instagram,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );

            return redirect(url('/contacts'))->with('successcontact', 'contacts Added Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_contacts($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $contact = Contact::where('contact_id', $id)->first();
            return view('admin.pages.client.edit_contact', compact('contact'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_contacts_post(Request $request, $id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {

            // dd($request->all());
            $phone = "";
            $email = "";
            $this->validate($request, []);

            if (is_array($request->phone)) {
                $phone = implode(',', $request->phone);
            }

            if (is_array($request->email)) {
                $email = implode(',', $request->email);
            }

            Contact::where('contact_id', $id)->update(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'company_id' => $request->client_id,
                    'location_id' => $request->address_id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'designation' => $request->designation,
                    'user_type' => $request->user_type,
                    'phone' => $phone,
                    'email' => $email,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'linkedin' => $request->linkedin,
                    'instagram' => $request->instagram,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );

            return redirect(url('/contacts'))->with('success', 'contacts Updated Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function delete_contacts()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function location()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {

            $locations = DB::table('tic_company_locations')
                ->join('tic_company', 'tic_company_locations.company_id', '=', 'tic_company.company_id')
                ->join('z_config_city', 'tic_company_locations.country', 'z_config_city.loc_id')
                ->join('z_config_city as state', 'tic_company_locations.state', 'state.loc_id')
                ->where('tic_company.cloud_id', Auth::user()->cloud_id)
                ->select('tic_company_locations.*', 'tic_company.client_name', 'tic_company.logo', 'z_config_city.loc_name as country_name', 'state.loc_name as state_name')
                ->get();
            // dd($locations);
            return view('admin.pages.client.location', compact('locations'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_location()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.client.add_location');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function getState_addLocation($country_id)
    {
        $data = DB::table('z_config_city')
            ->where('z_config_city.parent_country_id', $country_id)
            ->where('z_config_city.parent_state_id', 0)
            ->get(["z_config_city.loc_name", "z_config_city.loc_id"]);
        return $data;
    }
    public function add_location_post(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // dd($request->all());


            Location::create(
                [
                    'company_id' => $request->client_id,
                    'cloud_id' => Auth::user()->cloud_id,
                    'friendly_name' => $request->friendly_name,
                    'city' => $request->city,
                    'country' => $request->country,
                    'address' => $request->address,
                    'postcode' => $request->postcode,
                    'state' => $request->state,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );

            return redirect(url('/location'))->with('successlocation', 'Location Added Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function add_location_ajax(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $add_location = Location::create(
                [
                    'company_id' => $request->client_id,
                    'cloud_id' => Auth::user()->cloud_id,
                    'friendly_name' => $request->friendly_name,
                    'city' => $request->city,
                    'country' => $request->country,
                    'address' => $request->address,
                    'postcode' => $request->postcode,
                    'state' => $request->state,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );
            $get_update_location = Location::where('cloud_id', Auth::user()->cloud_id)->get();
            return $get_update_location;
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_locations($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $location = Location::where('location_id', $id)->first();
            return view('admin.pages.client.edit_location', compact('location'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_location_post(Request $request, $id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $this->validate($request, []);

            Location::where('location_id', $id)->update(
                [
                    'company_id' => $request->client_id,
                    'cloud_id' => $request->cloud_id,
                    'friendly_name' => $request->friendly_name,
                    'city' => $request->city,
                    'country' => $request->country,
                    'address' => $request->address,
                    'postcode' => $request->postcode,
                    'state' => $request->state,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );

            return redirect(url('/location'))->with('success', 'Location Updated Successfully.');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function delete_location()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    // |--------------------------------------------------------------------------
    // | Side Menu Settings
    // |--------------------------------------------------------------------------
    public function setting()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.setting.setting');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function manage_account(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.setting.manage_acc');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function manage_account_post(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            //dd($request->all());

            TicCloud::create(
                [
                    'acc_name' => $request->acc_name,
                    'org_type' => $request->org_type,
                    'phone' => $request->industry,
                    'city' => $request->city,
                    'state' => $request->state,
                    'country' => $request->country,
                    'address' => $request->address,
                    'GSTIN' => $request->GSTIN,
                    'logo' => $request->logo,
                    'industry' => $request->industry,
                    'time_zone' => $request->time_zone,
                    'currency' => $request->currency,
                    'language' => $request->language,
                    'website' => $request->website,
                    'linkedin' => $request->logo,
                    'facebook' => $request->industry,
                    'twitter' => $request->time_zone,
                    'instagram' => $request->instagram,
                    'youtube' => $request->youtube,
                    'EEO_survey' => $request->EEO_survey,
                    'OFCCP_survey' => $request->OFCCP_survey,
                    'GDPR_enabled_status' => $request->GDPR_enabled_status,
                    'GDPR_link_footer_status' => $request->GDPR_link_in_footer_status,
                    'GDPR_status_granted' => $request->GDPR_status_granted,
                    'expiry_duration' => $request->expiry_duration,
                    'privacy_policy_url' => $request->privacy_policy_url,
                    'date' => today_date(),
                    'time' => today_time(),
                    'ip' => get_client_ip(),
                    'browser' => get_client_browser(),
                ]
            );

            return back();
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    // |--------------------------------------------------------------------------
    // | Side Menu Setting Manage Users Functions
    // |--------------------------------------------------------------------------
    public function manage_users(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $users = User::where('cloud_id', Auth::user()->cloud_id)->get();
            //dd($users);
            return view('admin.pages.setting.manage_user', compact('users'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function manage_users_post(Request $request)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            //dd($request->all());
            $profile_image_url = "";

            if (request()->hasFile('profile_image')) {
                $file = request()->file('profile_image');
                $fileName = time() . "." . $file->getClientOriginalExtension();
                $profile_image_url = url('/user_profile_image/' . time() . "." . $file->getClientOriginalExtension());
                $file->move('./user_profile_image/', $fileName);
            }

            User::create(
                [
                    'cloud_id' => Auth::user()->cloud_id,
                    'compay_id' => "",
                    'name' => $request->first_name . ' ' . $request->last_name,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => "",
                    'phone' => $request->phone,
                    'role' => $request->role,
                    'profile_image' => $profile_image_url,
                ]
            );
            return back();
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function view_user_profile($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $user = User::where('id', $id)->first();
            return view('admin.pages.setting.view_profile', compact('user'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function edit_user_profile($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $user = User::where('id', $id)->first();
            return view('admin.pages.setting.edit_profile', compact('user'));
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    // |--------------------------------------------------------------------------
    // | Side Menu Setting Manage Notification Functions
    // |--------------------------------------------------------------------------
    public function manage_notification()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.setting.notification');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    // |--------------------------------------------------------------------------
    // | Side Menu Setting Manage Notification Functions
    // |--------------------------------------------------------------------------
    public function manage_template()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.setting.email_template');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    // |--------------------------------------------------------------------------
    // | Side Menu Setting Manage Roles Functions
    // |--------------------------------------------------------------------------
    public function manage_role()
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            return view('admin.pages.setting.roles');
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    // |--------------------------------------------------------------------------
    // | Side Menu Client Modal
    // |--------------------------------------------------------------------------
    public function agreement_modal_post(Request $request, $id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {

            $fileSize = "";
            $ext = "";
            $file_name = "";
            $new_file_name = "";

            if ($request->hasFile('agreement_file')) {
                $file = $request->file('agreement_file');

                $ext = $file->getClientOriginalExtension();
                $fileSize = $request->file('agreement_file')->getSize();
                $filename = $file->getClientOriginalName();
                $fileurl = url('public/contract/' . $filename);
                $basename = basename($filename, "." . $ext);
                //dd($fileurl);
                $new_file_name = Str::random(10) . "_" . str_replace('-', '_', today_date()) . "_" . str_replace(":", "", str_replace(' ', '', today_time()))  . "." . $ext;
                $file->move(public_path('contract'), $new_file_name);
            }

            $company_agreement = Client::where('company_id', $id)->update([
                'file' => $basename,
                'contract_start' => $request->contract_start,
                'contract_end'  => $request->contract_end,
            ]);

            if ($company_agreement) {
                $file_size_mb =  number_format($fileSize / 1048576, 2);

                CompanyAgreement::create(
                    [
                        'cloud_id' => Auth::user()->cloud_id,
                        'company_id' => $id,
                        'contract_start' => $request->contract_start,
                        'contract_end' => $request->contract_end,
                        'agreement_file' => $new_file_name,
                        'agreement_file_name' => $basename,
                        'file_size' => $file_size_mb,
                        'file_ext' => $ext,
                        'date' => today_date(),
                        'time' => today_time(),
                        'ip' => get_client_ip(),
                        'browser' => get_client_browser(),
                    ]
                );
            }

            return back();
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function company_modal($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $data = Client::where('company_id', $id)->first();
            return $data;
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function location_modal($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $data = DB::table('tic_company_locations')
                ->join('tic_company', 'tic_company_locations.company_id', '=', 'tic_company.company_id')
                ->join('z_config_city', 'tic_company_locations.country', 'z_config_city.loc_id')
                ->join('z_config_city as state', 'tic_company_locations.state', 'state.loc_id')
                ->where('tic_company_locations.location_id', $id)
                ->select('tic_company_locations.*', 'tic_company.logo', 'z_config_city.loc_name as country_name', 'state.loc_name as state_name')
                ->first();
            return $data;
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function contact_modal($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $data = Contact::where('contact_id', $id)->first();
            return $data;
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function agreement_modal($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            $data = Client::where('company_id', $id)->first();
            return $data;
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function get_agreement_modal($id)
    {
        if (Session::has('locked-screen')) {
            return AdminController::lock_screen();
        }
        if (Auth::check()) {
            // $data = CompanyAgreement::where('company_id',$id)->first();
            $data = DB::table('tic_company_agreements')
                ->join('tic_company', 'tic_company_agreements.company_id', 'tic_company.company_id')
                ->select('tic_company_agreements.*', 'tic_company.logo', 'tic_company.client_name', 'tic_company_agreements.agreement_file_name')
                ->where('tic_company_agreements.company_id', $id)
                ->first();

            return $data;
        } else {
            return redirect("login")->withSuccess('You are not allowed to access');
        }
    }
    public function demo_update()
    {
        demo::updateOrCreate(
            [
                'demo_id' => 2
            ],
            [
                'name' => "Akdasdaash"
            ]
        );
        echo "Success";
    }
    // 
}


// if(Session::has('locked-screen')){
//     return AdminController::lock_screen();
// }
// if(Auth::check()){
    
// }
// else{
//     return redirect("login")->withSuccess('You are not allowed to access');

// }

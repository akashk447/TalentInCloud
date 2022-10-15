<?php

use App\Models\JobCategory;
use App\Models\TicCandidateApplicant;
use App\Models\TicCandidateMaster;
use App\Models\TicCandidateScreening;
use App\Models\TicCandidateSourceSummary;
use App\Models\TicJobs;
use App\Models\TicQuestionnaireAnswer;
use App\Models\User;
use App\Models\ZLocation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function getCITY()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $dataArray = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    return array($dataArray);
    // return compact('dataArray');
    // var_dump($dataArray);
}
function get_organisation()
{
  
    $organisation = DB::table('tic_company')
        ->where('cloud_id',Auth::user()->cloud_id)
        ->orderBy('date', 'ASC')
        ->get();

    return $organisation;
}

function get_country(){
    $country = DB::table('z_config_city')
                ->where('z_config_city.parent_state_id',0)
                ->where('z_config_city.parent_country_id',0)
                ->select('z_config_city.loc_id','z_config_city.loc_name')
                ->get();

    return $country;
}
function get_company_location(){
    $company_location = DB::table('tic_company_locations')
                ->where('cloud_id',Auth::user()->cloud_id)
                ->orderBy('location_id','DESC')
                ->get();

    return $company_location;
}
function welcome_greeting()
{

    if (date("H") < 12) {

        return "Good Morning";
    } elseif (date("H") > 11 && date("H") < 17) {

        return "Good Afternoon";
    } elseif (date("H") > 16) {

        return "Good Evening";
    }
}
function valid_date($date)
{
    return date("Y-m-d", strtotime($date));
}
function age_calculater($date)
{

    // printf($date);
    $sdate = $date;
    $edate = today_date();
    $date_diff = abs(strtotime($edate) - strtotime($sdate));
    $years = floor($date_diff / (365 * 60 * 60 * 24));
    $months = floor(($date_diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($date_diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    
    printf("%d years, %d months, %d days", $years, $months, $days);
    // printf("\n");
    // $from = new DateTime($date);
    // $to   = new DateTime('today');

    // return $from->diff($to)->y . " Years & " . $from->diff($to)->m . " Months";
}
function today_date()
{
    $timezone = new DateTimeZone("Asia/Kolkata");
    $date = new DateTime();
    $date->setTimezone($timezone);
    return date('Y-m-d');
}
function today_date_reverse()
{
    $timezone = new DateTimeZone("Asia/Kolkata");
    $date = new DateTime();
    $date->setTimezone($timezone);
    return date('d-m-Y');
}
function today_date_flat(){
    return date('d M Y');
}
function date_tomorrow(){
    return date('d M Y', strtotime('+1 days'));
}
function date_tomorrow_next(){
    return date('d M Y', strtotime('+2 days'));
}
function date_tomorrow_next_next(){
    return date('d M Y', strtotime('+3 days'));
}
function date_yesterday(){
    return date('d M Y', strtotime('-1 days'));
}
function date_yesterday_prev(){
    return date('d M Y', strtotime('-2 days'));
}
function date_yesterday_prev_prev(){
    return date('d M Y', strtotime('-3 days'));
}
function date_after_one_week(){
    return date('d M Y', strtotime('+7 days'));
}
function date_after_one_month(){
    return date('d M Y', strtotime('+30 days'));
}
function date_after_three_months(){
    return date('d M Y', strtotime('+90 days'));
}
function formated_date($date)
{
    $date = date_create($date);
    return date_format($date, "d-M-Y");
}
function today_time()
{
    $timezone = new DateTimeZone("Asia/Kolkata");
    $date = new DateTime();
    $date->setTimezone($timezone);
    return $date->format('H:i:s a');
}
// Function to get the client IP address
function get_client_ip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// Function to get the client IP address
function get_client_browser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version = "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    } elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    } elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    } elseif (preg_match('/Firefox/i', $u_agent)) {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    } elseif (preg_match('/Chrome/i', $u_agent)) {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    } elseif (preg_match('/Safari/i', $u_agent)) {
        $bname = 'Apple Safari';
        $ub = "Safari";
    } elseif (preg_match('/Opera/i', $u_agent)) {
        $bname = 'Opera';
        $ub = "Opera";
    } elseif (preg_match('/Netscape/i', $u_agent)) {
        $bname = 'Netscape';
        $ub = "Netscape";
    }

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent, "Version") < strripos($u_agent, $ub)) {
            $version = $matches['version'][0];
        } else {
            $version = $matches['version'][1];
        }
    } else {
        $version = $matches['version'][0];
    }

    // check if we have a number
    if ($version == null || $version == "") {
        $version = "?";
    }

    // return array(
    //     'userAgent' => $u_agent,
    //     'name'      => $bname,
    //     'version'   => $version,
    //     'platform'  => $platform,
    //     'pattern'    => $pattern
    // );
    return $bname;
}
function generate_job_order_id()
{
    $chars = "123456789abcdefghijklmnopqrstuvwxyz";
    $res = "";
    for ($i = 0; $i < 6; $i++) {
        $res .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return "job-" . strtolower($res);
}

function get_city()
{
    $city = ZLocation::get();
    return $city;
}
function get_industry()
{
    $industry = DB::table('z_industries')
        ->orderBy('industry_name', 'ASC')
        ->get();

    return $industry;
}
function get_functional_area()
{

    $functional_area = DB::table('z_functional_areas')
        ->where('funarea_parent_id', '=', "0")
        ->orderBy('funarea_name', 'ASC')
        ->get();

    return $functional_area;
}
function get_functional_area_name($id)
{

    $functional_area = DB::table('z_functional_areas')
        ->where('funarea_id', '=', $id)
        ->first();

    return $functional_area;
}

function get_time_ago($time)
{
    $time_difference = $time;

    if ($time_difference < 3600) {
        return 'Just Now';
    }
    $condition = array(
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );

    foreach ($condition as $secs => $str) {
        $d = $time_difference / $secs;
        if ($d >= 1) {
            $t = round($d);
            if ($str == 'month') {
                return 'Posted 30+ days ago';
            }
            return 'Posted ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
        }
    }
    echo '<script>alert(' . $d . ')</script>';
}

function get_team_members()
{
    $teams = User::where('cloud_id', Auth::user()->cloud_id)->get();
    return $teams;
}
function generate_candidate_key()
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $candidate_key = "";
    for ($i = 0; $i < 24; $i++) {
        $candidate_key .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return strtolower($candidate_key);
}
function generate_applicant_key()
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $candidate_key = "";
    for ($i = 0; $i < 24; $i++) {
        $candidate_key .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return strtolower($candidate_key);
}
function get_job_ownerid($job_id)
{
    $fetch_id = TicJobs::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)->first();
    return $fetch_id->job_posted_by_userid;
}
// job_posted_by_userid
function get_owner_details($u_id)
{
    $fetch_user = User::where('cloud_id', Auth::user()->cloud_id)->where('id', $u_id)->first();
    return $fetch_user;
}
function get_all_job($job_id)
{
    $alljobs = TicJobs::where('cloud_id', Auth::user()->cloud_id)
        ->whereNotIn('job_id', [$job_id])
        ->get();
    return $alljobs;
}
function get_source_summary_details($job_id, $u_id)
{
    $fetch_id = TicCandidateSourceSummary::where('job_id', $job_id)->where('u_id', $u_id)->where('date', today_date())->first();
    return $fetch_id;
}
function get_job_details($job_id)
{
    $fetch_id = TicJobs::where('job_id', $job_id)->first();
    return $fetch_id;
}
function get_job_code_details($job_id)
{
    $fetch_id = TicJobs::where('job_code', $job_id)->first();
    return $fetch_id;
}
function get_all_degree()
{
    $degree = DB::table('z_degrees')->where('degree_parent_id', '=', "0")
        ->whereNotIn('degree_name', ["Any Graduate", "Graduation Not Required", 'Any Post Graduate', 'Post Graduation Not Required', 'Not Pursuing Graduation'])
        ->orderBy('degree_name', 'ASC')
        ->get();
    return $degree;
}
function get_all_specialization()
{
    $degree = DB::table('z_degrees')->where('degree_parent_id', '!=', "0")
        ->whereNotIn('degree_name', ["Any Graduate", "Graduation Not Required", 'Any Post Graduate', 'Post Graduation Not Required', 'Not Pursuing Graduation', 'Any Specialization'])
        ->orderBy('degree_name', 'ASC')
        ->groupBy('degree_name')
        ->get();
    return $degree;
}
function base64_to_jpeg($base64_string, $output_file = "tmp.pdf")
{
    // open the output file for writing
    $ifp = fopen($output_file, 'wb');


    // we could add validation here with ensuring count( $data ) > 1
    fwrite($ifp, base64_decode($base64_string));

    // clean up the file resource
    fclose($ifp);

    return $output_file;
}

function get_jd_category($category_id){
    $get_jd_category = JobCategory::where('jd_category_id',$category_id)->first();
    return $get_jd_category->jd_category_name;
}


function get_resume_name($candidate_id, $job_id)
{
    $get_candidate = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
        ->where('candidate_id', $candidate_id)
        ->where('job_id', $job_id)->first();
    return $get_candidate->candidate_resume_original;
}
function get_resume_ajax($candidate_id)
{
    $get_resume = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)
        ->where('candidate_id', $candidate_id)
        ->first();
    return $get_resume;
}
function get_pool_list($job_id)
{
    $get_pool = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)->get();
    $pool = 0;
    foreach ($get_pool as $key) {
        $pool++;
    }
    return $pool;
}
function get_submit_quality_list($job_id)
{
    $get_submit_quality = TicCandidateScreening::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)->where('screen_status', "Submitted To Quality")->get();
    $submit_quality = 0;
    foreach ($get_submit_quality as $key) {
        $submit_quality++;
    }
    return $submit_quality;
}
function get_submitted_list($job_id)
{
    $get_submitted = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->where('applicant_status', "Submitted")
    ->orWhere('applicant_status', "Submitted Profile Shortlisted")
    ->get();
    $submitted = 0;
    foreach ($get_submitted as $key) {
        $submitted++;
    }
    return $submitted;
}
function get_inprogress_list($job_id)
{
    $get_inprogress = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_inprogress_applicant_status_list())
    ->get();
    $inprogress = 0;
    foreach ($get_inprogress as $key) {
        $inprogress++;
    }
    return $inprogress;
}
function get_selected_list($job_id)
{
    $get_selected = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_selected_applicant_list())
    ->get();
    $selected = 0;
    foreach ($get_selected as $key) {
        $selected++;
    }
    return $selected;
}
function get_joined_list($job_id)
{
    $get_joined = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_joined_applicant_list())
    ->get();
    $joined = 0;
    foreach ($get_joined as $key) {
        $joined++;
    }
    return $joined;
}




function get_noshow_list($job_id)
{
    $get_joined = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_noshow_applicant_status_list())
    ->get();
    $joined = 0;
    foreach ($get_joined as $key) {
        $joined++;
    }
    return $joined;
}
function get_rejected_list($job_id)
{
    $get_joined = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_rejected_applicant_status_list())
    ->get();
    $joined = 0;
    foreach ($get_joined as $key) {
        $joined++;
    }
    return $joined;
}
function get_onhold_list($job_id)
{
    $get_joined = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_onhold_applicant_status_list())
    ->get();
    $joined = 0;
    foreach ($get_joined as $key) {
        $joined++;
    }
    return $joined;
}
function get_duplicate_list($job_id)
{
    $get_joined = TicCandidateApplicant::where('cloud_id', Auth::user()->cloud_id)->where('job_id', $job_id)
    ->whereIn('applicant_status', get_duplicate_applicant_list())
    ->get();
    $joined = 0;
    foreach ($get_joined as $key) {
        $joined++;
    }
    return $joined;
}




function get_quality_pending_applicant_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Quality Pending');
    return $applicant_status_list;
}
function get_quality_reject_applicant_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Quality Rejected');
    return $applicant_status_list;
}
function get_quality_duplicate_applicant_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Quality Duplicate');
    return $applicant_status_list;
}
function get_all_submitted_applicant_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Submitted');
    array_push($applicant_status_list, 'Submitted Profile Shortlisted');
    array_push($applicant_status_list, 'Snoozed');
    return $applicant_status_list;
}
function get_submitted_applicant_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Submitted');
    return $applicant_status_list;
}
function get_submitted_profile_shortlisted_applicant_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Submitted Profile Shortlisted');
    return $applicant_status_list;
}
function get_submitted_snoozed_status_list()
{
    $applicant_status_list = array();
    array_push($applicant_status_list, 'Snoozed');
    return $applicant_status_list;
}
function get_inprogress_applicant_status_list()
{
    $applicant_inprogress_list = array();
    array_push($applicant_inprogress_list, 'Assessments - Test Initiated');
    array_push($applicant_inprogress_list, 'Assessments - Test Completed');
    array_push($applicant_inprogress_list, 'Assessments - Test Passed');
    array_push($applicant_inprogress_list, 'Schedule Interview - Offline');
    array_push($applicant_inprogress_list, 'Schedule Interview - Online');
    array_push($applicant_inprogress_list, 'Interview Appeared');
    array_push($applicant_inprogress_list, 'Interview Cleared');
    array_push($applicant_inprogress_list, 'Availability Required - L1');
    array_push($applicant_inprogress_list, 'Availability Required - L2');
    array_push($applicant_inprogress_list, 'Availability Required - L3');
    array_push($applicant_inprogress_list, 'Availability Required - L4');
    array_push($applicant_inprogress_list, 'Availability Required - L5');
    array_push($applicant_inprogress_list, 'Schedule Pending - L1');
    array_push($applicant_inprogress_list, 'Schedule Pending - L2');
    array_push($applicant_inprogress_list, 'Schedule Pending - L3');
    array_push($applicant_inprogress_list, 'Schedule Pending - L4');
    array_push($applicant_inprogress_list, 'Schedule Pending - L5');
    return $applicant_inprogress_list;
}
function get_inprogress_applicant_not_appeared_status_list()
{
    $applicant_inprogress_list = array();
    array_push($applicant_inprogress_list, 'Assessments - Test Initiated');
    array_push($applicant_inprogress_list, 'Assessments - Test Completed');
    array_push($applicant_inprogress_list, 'Assessments - Test Passed');
    array_push($applicant_inprogress_list, 'Schedule Interview - Offline');
    array_push($applicant_inprogress_list, 'Schedule Interview - Online');
    array_push($applicant_inprogress_list, 'Interview Cleared');
    array_push($applicant_inprogress_list, 'Availability Required - L1');
    array_push($applicant_inprogress_list, 'Availability Required - L2');
    array_push($applicant_inprogress_list, 'Availability Required - L3');
    array_push($applicant_inprogress_list, 'Availability Required - L4');
    array_push($applicant_inprogress_list, 'Availability Required - L5');
    array_push($applicant_inprogress_list, 'Schedule Pending - L1');
    array_push($applicant_inprogress_list, 'Schedule Pending - L2');
    array_push($applicant_inprogress_list, 'Schedule Pending - L3');
    array_push($applicant_inprogress_list, 'Schedule Pending - L4');
    array_push($applicant_inprogress_list, 'Schedule Pending - L5');
    return $applicant_inprogress_list;
}
function get_inprogress_applicant_appeared_status_list()
{
    $applicant_inprogress_list = array();
    array_push($applicant_inprogress_list, 'Interview Appeared');
    return $applicant_inprogress_list;
}


function get_selected_applicant_list(){
    $applicant_inprogress_list = array();
    array_push($applicant_inprogress_list, 'Selected - For Documentation');
    array_push($applicant_inprogress_list, 'Selected - For Offer');
    array_push($applicant_inprogress_list, 'Offer Released');
    array_push($applicant_inprogress_list, 'Offer Accepted');
    return $applicant_inprogress_list;
}
function get_joined_applicant_list(){
    $applicant_joined_list = array();
    array_push($applicant_joined_list, 'Joined');
    return $applicant_joined_list;
}
function get_onhold_applicant_status_list(){
    $applicant_onhold_list = array();
    array_push($applicant_onhold_list, 'On Hold');
    return $applicant_onhold_list;
}
function get_rejected_applicant_status_list(){
    $applicant_rejected_list = array();
    array_push($applicant_rejected_list, 'Profile Rejected');
    return $applicant_rejected_list;
}
function get_noshow_applicant_status_list(){
    $applicant_noshow_list = array();
    array_push($applicant_noshow_list, 'On Hold');
    return $applicant_noshow_list;
}
function get_duplicate_applicant_list(){
    $applicant_noshow_list = array();
    array_push($applicant_noshow_list, 'Profile Duplicate');
    return $applicant_noshow_list;
}
function get_single_choice_option($question_id){
    $get_options = TicQuestionnaireAnswer::where('cloud_id',Auth::user()->cloud_id)
                 ->where('question_id',$question_id)
                 ->get();
    return $get_options;
}
?>

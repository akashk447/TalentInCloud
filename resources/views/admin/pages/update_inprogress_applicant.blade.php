<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicant Update Inprogress| Talent In Cloud</title>
    @include('admin.include.meta_header')
    <link href="{{ asset('assets/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="page-content pt-2 pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-8">

                            <div class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-2">
                                    <div class="row g-4">
                                        <div class="col-12 col-lg-auto col-sm-12 text-center">
                                            <div class="avatar-md mx-auto mb-3 position-relative img-animate">
                                                <img src="{{ asset('assets/images/candidate-avatar.jpg') }}"
                                                    class="avatar-md rounded-circle" alt="...">
                                                <a href="apps-mailbox.html"
                                                    class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                    <div class="avatar-title bg-transparent">
                                                        <i class=" ri-linkedin-line align-bottom"
                                                            data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                            data-bs-placement="top" title=""
                                                            data-bs-original-title="Linked In"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="badge rounded-pill bg-success mb-2 ">
                                                <i class="mdi mdi-star"></i> 4.2
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col p-0">
                                            <div class="p-2">
                                                @php
                                                    $birthday = valid_date($get_applicant_details->candidate_dob);
                                                    $age = age_calculater($birthday);
                                                @endphp
                                                <h3 class="text-primary mb-1 fs-19 cand-info">
                                                    {{ $get_applicant_details->candidate_name }} <span
                                                        class="badge rounded-pill bg-info fs-10 align-middle p-1 ps-2 pe-2 c-pointer"
                                                        data-bs-toggle="tooltip"
                                                        title="DOB: 24-05-1998">{{ $age }}</span>
                                                </h3>
                                                <div class="hstack gap-2 flex-wrap mb-2 cand-info">
                                                    <div class="me-2">
                                                        <i
                                                            class="ri-phone-line me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">+91
                                                            {{ $get_applicant_details->candidate_phone }} </span>
                                                    </div>
                                                    <div class="me-2">
                                                        <i
                                                            class="ri-mail-line me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">{{ $get_applicant_details->candidate_email }}</span>
                                                    </div>
                                                    <div class="me-2 ">
                                                        <i
                                                            class="ri-map-pin-user-line me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">{!! isset($get_applicant_details->candidate_location)
                                                                ? $get_applicant_details->candidate_location
                                                                : "<span class='text-danger'>Not Mentioned</span>" !!}</span>
                                                    </div>

                                                </div>
                                                <div class="hstack gap-2 flex-wrap mb-2 cand-info">
                                                    <div class="me-2">
                                                        <p class="text-muted"><b>B.tech Electrical Engineer ,
                                                                Currently/Resigned </b>as <b>Project Manager <span
                                                                    class="text-primary">(6Yrs)</span></b> at <b>IBM
                                                            </b> all Overally Experience <b><span
                                                                    class="text-primary">15yrs </span></b> 3 Compnies.
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--end col-->

                                        <div class="col-12 col-lg-auto">
                                            <div class="row text text-primary-50 text-center">
                                                <div class="col-lg-12 col-4 mx-auto ">
                                                    <div class="p-2">
                                                        <h4 class="text-primary mb-1 fs-14 c-pointer"> <i
                                                                class=" ri-edit-2-fill align-middle me-1"></i>Edit</h4>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end col-->

                                    </div>

                                    <div
                                        class="d-flex justify-content-end align-items-center text-primary-50 mx-auto cand-info">
                                        <div class="me-2">
                                            <h4 class="text-muted mb-1 fs-12 c-pointer">Current CTC:- <span
                                                    class="text-primary fs-11">10LPA</span> ,</h4>
                                        </div>
                                        <div class="me-2">
                                            <h4 class="text-muted mb-1 fs-12 c-pointer">Expected CTC:- <span
                                                    class="text-primary fs-11">15LPA</span> ,</h4>
                                        </div>
                                        <div class="me-2">
                                            <h4 class="text-muted mb-1 fs-12 c-pointer">NP:- <span
                                                    class="text-primary fs-11">15.07.2022</span> ,</h4>
                                        </div>
                                        <div>
                                            <h4 class="text-muted mb-1 fs-12 c-pointer">Last Working Days:- <span
                                                    class="text-primary fs-11">30.07.2022</span> </h4>

                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="card mb-2 tele-candidate-info pt-0 pb-2 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-3">
                                    <div class="row">
                                        <div class="col-auto pe-0">
                                            <img class="rounded ms-1"
                                                src="{{ asset('assets/images/companies/amazon.png') }}"
                                                alt="Generic placeholder image" height="32">
                                        </div>
                                        <div class="col ps-0">
                                            <h3 class="mt-0 mb-1 ms-2 fs-20">
                                                <a href="#" class="font-w-600 text-dark" target="_blank"> <b>Bajaj
                                                        Allianz Life Insurance Company Limited</b></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto ps-4">
                                            <i class="ri-briefcase-4-line text-muted fs-12"></i>
                                        </div>
                                        <div class="col ps-0  ">
                                            <p class="text-muted mb-0 fs-11">

                                                Assistant Manager - Business Solutions - IT BI & Data Management
                                                (Snowflake Lead) - (Assistant Manager - Business Solutions - IT BI &
                                                Data Management (Snowflake Lead))
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto ps-4">
                                            <i class="ri-map-pin-line text-muted fs-12"></i>
                                        </div>
                                        <div class="col ps-0  ">
                                            <p class="text-muted fs-11">

                                                Gurgaon / Bangalore / Hyderabad / Noida / Kolkata
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-start mt-1">

                                        <div class="avatar-sm mx-auto position-relative img-animate">
                                            <img src="{{ asset('assets/images/Akash.jpg') }}"
                                                class="avatar-sm rounded-circle" alt="..."
                                                style="height:32px;width:32px">
                                        </div>
                                        <div class="w-100">

                                            <h3 class="mt-0 mb-1 ms-2 fs-13">
                                                <a href="#" class="font-w-600 text-dark" target="_blank"> <b>
                                                        Nibedita Sahoo</b></a>
                                            </h3>
                                            </h6>

                                            <small class="text-muted ms-1"><i
                                                    class="ri-map-pin-line fs-10 me-1 align-middle"></i><b>Bhubaneswar
                                                    ,</b>
                                                <span class="ms-1"><b> <i
                                                            class="ri-phone-line fs-10 me-1 align-middle"></i>
                                                        8989898989</b></span></small>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- update inprogress --}}
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="card">
                                <div class="card-body">

                                    <form id="demo-form" action="{{ route('view_applicant_update_progress_post') }}"
                                        method="POST">
                                        @csrf
                                        <input type="hidden" name="app_key"
                                            value="{{ $get_applicant_details->applicant_key }}">
                                        <div class="row mb-3">
                                            <div class="col-lg-6 ">
                                                <h5 class="font-w-600 text-muted">Update Candidate Status </h5>
                                            </div>
                                            <div class="col-lg-6 text-lg-end">
                                                <h6 class="fs-11 font-w-600 text-muted">Mandatory Fields</h6>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">

                                                <div class="col-lg-4 mt-2">
                                                    <label for="for-priority" class="form-label">Priority <span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="form-group">

                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="radio" class="btn-check " name="priority"
                                                                id="important_check" value="Important"
                                                                {{ $get_applicant_details->priority == 'Important' ? 'checked' : '' }}>
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="important_check">Important</label>
                                                            <input type="radio" class="btn-check " name="priority"
                                                                id="normal_check" value="Normal"
                                                                {{ $get_applicant_details->priority == 'Normal' ? 'checked' : '' }}>
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="normal_check">Normal</label>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 interview_attend_status" id="col-12">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Interview Attend
                                                        Status<span class="text-danger">*</span></label>
                                                    <select class="form-select" name="profile_status"
                                                        id="update_candidate_status">
                                                        <option value="">Select</option>
                                                        <option value="Reschedule Interview">Reschedule Interview
                                                        </option>
                                                        <option value="Availability Required">Availability Required
                                                        </option>
                                                        <option value="Schedule Pending">Schedule Pending</option>
                                                        <option value="Assessments">Assessments</option>
                                                        <option value="Interview Appeared">Interview Appeared/Attended
                                                        </option>
                                                        <option value="Update Information">Update Information</option>
                                                        <option value="No Show">No Show</option>
                                                        <option value="Did Not attend (Not Interested)">Did Not
                                                            Attented</option>
                                                        <option value="On Hold">On Hold</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- required_interview -->
                                            <div class="col-lg-5 required_interview" style="display:none"
                                                id="required_interview">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Select Interview Type
                                                        <span class="text-danger">*</span></label>
                                                    <select class="form-select" name="reschedule_type"
                                                        id="interview_candidate_status">
                                                        <option value="">Select</option>
                                                        <option value="Online">Online</option>
                                                        <option value="Offline">Offline</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- required_availability -->
                                            <div class="col-lg-5 required_availability" style="display:none"
                                                id="required_availability">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Availability <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" name="availablity">
                                                        <option value="" selected>Select</option>
                                                        <option value="L1">Level-1 [L1]</option>
                                                        <option value="L2">Level-2 [L2]</option>
                                                        <option value="L3">Level-3 [L3]</option>
                                                        <option value="L4">Level-4 [L4]</option>
                                                        <option value="L5">Level-5 [L5]</option>
                                                    </select>
                                                    <h4 class="text-info c-pointer fs-12 mt-2 text-end"
                                                        id="specific_slots">Define Specific Slots </h4>
                                                </div>
                                            </div>
                                            <div class="bg-light p-5 fs-18 text-center text-danger"
                                                id="coming_soon_field" style="display:none">
                                                This Section Coming soon
                                            </div>
                                            <!-- required_assessment -->
                                            <div class="col-lg-5 required_assessment" style="display:none"
                                                id="required_assessment">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Select Assessments <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" name="assessment"
                                                        id="assessment_status">
                                                        <option value="" selected>Select</option>
                                                        <option value="Test Initiated">Test Initiated</option>
                                                        <option value="Test Completed">Test Completed</option>
                                                        <option value="Test Passed">Test Passed</option>
                                                        <option value="Test Failed">Test Failed</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- interview candidate online -->
                                        <div class="row" style="display:none"
                                            id="interview_candidate_status_online">
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Re-Schedule Date<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="radio" class="btn-check "
                                                            name="interview_sch_online_date"
                                                            id="in_schedule_date_today34"
                                                            value="{{ today_date_flat() }}">
                                                        <label
                                                            class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                            for="in_schedule_date_today34">Today</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow() }}"
                                                            name="interview_sch_online_date"
                                                            id="in_schedule_date_tomorrow35">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_tomorrow35">Tomorrow</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow_next() }}"
                                                            name="interview_sch_online_date"
                                                            id="in_schedule_date_check1335">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check1335">{{ date('d M', strtotime(date_tomorrow_next())) }}</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow_next_next() }}"
                                                            name="interview_sch_online_date"
                                                            id="in_schedule_date_check2336">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check2336">{{ date('d M', strtotime(date_tomorrow_next_next())) }}</label>
                                                        <input type="text"
                                                            class="form-control flatpickr-input active border border-primary text-primary"
                                                            data-provider="flatpickr" placeholder="Custom"
                                                            name="interview_sch_online_date1" data-date-format="d M Y"
                                                            value="{{ $get_applicant_details->interview_attn_dt }}"
                                                            style="height:36px" id="interview_sch_online">
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Re-Start Time<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="interview_on_start_time" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            @php
                                                                $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                $interval = new DateInterval('PT15M'); // set the interval to 1 minute
                                                                $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod
                                                                
                                                            @endphp
                                                            @foreach ($daterange as $date)
                                                                <option value="{{ $date->format('H:i A') }}"
                                                                    {{ $get_applicant_details->interview_attn_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                    {{ $date->format('H:i A') }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!-- <span class="input-group-text bg-primary border border-primary" id="basic-addon1" style="height:36px"><i class=" ri-time-line fs-15 text-light"></i></span> -->
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Duration<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interview_duration_online"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option value="">Select</option>
                                                                    <option value="1h(10.00AM)"
                                                                        {{ $get_applicant_details->interview_duration == '1h(10.00AM)' ? 'selected' : '' }}>
                                                                        1h(10.00AM)
                                                                    </option>
                                                                    <option value="30min(10.30AM)"
                                                                        {{ $get_applicant_details->interview_duration == '30min(10.30AM)' ? 'selected' : '' }}>
                                                                        30min(10.30AM)
                                                                    </option>
                                                                    <option value="1h(11.00AM)"
                                                                        {{ $get_applicant_details->interview_duration == '1h(11.00AM)' ? 'selected' : '' }}>
                                                                        1h(11.00AM)
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interview
                                                                Round<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select border border-primary"
                                                                    name="interview_round_online"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option selected="">Select Round</option>
                                                                    <option value="Round-1"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                        Round-1</option>
                                                                    <option value="Round-2"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                        Round-2</option>
                                                                    <option value="Round-3"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                        Round-3</option>
                                                                    <option value="Round-4"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                        Round-4</option>
                                                                    <option value="Round-5"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                        Round-5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Video Calling
                                                        Services<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="video_call_online" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            <option value="Quack-O(Preconfigured)" selected=""
                                                                {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                Quack-O(Preconfigured)</option>
                                                            <option value="Zoom (Integration Required)"
                                                                {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                Zoom (Integration Required)
                                                            </option>
                                                            <option
                                                                value="Google Meet (Integration
                                                            Required)"
                                                                {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                Google Meet (Integration
                                                                Required)
                                                            </option>
                                                            <option value="MS Team(Integration Required)"
                                                                {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                MS Team(Integration Required)
                                                            </option>
                                                            {{-- <option value="" {{$get_applicant_details->interview_vdo_service_type=="Round-1"?"selected":""}}>Custom((Text Field To paste
                                                                Link)
                                                            </option> --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interviewer<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interviewer_name_online"
                                                                    id="interviewer_name_online" style="height:36px">
                                                                    <option selected="">Select Interviewer </option>

                                                                </select>
                                                            </div>
                                                            <span class="float-end  fs-10"><a href="#"
                                                                    data-bs-target="#add_interviewer"
                                                                    class="text-secondary" data-bs-toggle="modal">Add
                                                                    Interviewer</a></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interviewer
                                                                Kit<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interviewer_kit_online"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option selected="">Scorecard</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Send Link's<span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="checkbox" class="btn-check "
                                                                name="sch_interview_online_link"
                                                                id="online_int_send_mail_link" checked>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="online_int_send_mail_link"
                                                                data-bs-toggle="tooltip" title="Send Mail">
                                                                <i class="ri-mail-line fs-16 "></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link"
                                                                id="online_int_send_message_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="online_int_send_message_link"
                                                                data-bs-toggle="tooltip" title="Send Message">
                                                                <i class="ri-message-2-line fs-16"></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link"
                                                                id="online_int_send_whatspp_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="online_int_send_whatspp_link"
                                                                data-bs-toggle="tooltip" title="Send Whatspp">
                                                                <i class="ri-whatsapp-line fs-16"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- interview candidate offline -->
                                        <div class="row" style="display:none"
                                            id="interview_candidate_status_offline">
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Re-Schedule Date<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="radio" class="btn-check "
                                                            name="interview_sch_offline_date"
                                                            id="in_schedule_date_today3"
                                                            value="{{ today_date_flat() }}">
                                                        <label
                                                            class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                            for="in_schedule_date_today3">Today</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow() }}"
                                                            name="interview_sch_offline_date"
                                                            id="in_schedule_date_tomorrow3">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_tomorrow3">Tomorrow</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow_next() }}"
                                                            name="interview_sch_offline_date"
                                                            id="in_schedule_date_check133">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check133">{{ date('d M', strtotime(date_tomorrow_next())) }}</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow_next_next() }}"
                                                            name="interview_sch_offline_date"
                                                            id="in_schedule_date_check233">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check233">{{ date('d M', strtotime(date_tomorrow_next_next())) }}</label>
                                                        <input type="text"
                                                            class="form-control flatpickr-input active border border-primary text-primary"
                                                            data-provider="flatpickr" placeholder="Custom"
                                                            name="interview_sch_offline_date1"
                                                            data-date-format="d M Y"
                                                            value="{{ $get_applicant_details->interview_attn_dt }}"
                                                            style="height:36px" id="interview_sch_offline">
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Re-Start Time<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="interview_off_start_time" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            @php
                                                                $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                $interval = new DateInterval('PT15M'); // set the interval to 1 minute
                                                                $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod
                                                                
                                                            @endphp
                                                            @foreach ($daterange as $date)
                                                                <option value="{{ $date->format('H:i A') }}"
                                                                    {{ $get_applicant_details->interview_attn_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                    {{ $date->format('H:i A') }}</option>
                                                            @endforeach
                                                        </select>
                                                        <!-- <span class="input-group-text bg-primary border border-primary" id="basic-addon1" style="height:36px"><i class=" ri-time-line fs-15 text-light"></i></span> -->
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Duration<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interview_duration_offline"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option value="">Select</option>
                                                                    <option value="1h(10.00AM)"
                                                                        {{ $get_applicant_details->interview_duration == '1h(10.00AM)' ? 'selected' : '' }}>
                                                                        1h(10.00AM)
                                                                    </option>
                                                                    <option value="30min(10.30AM)"
                                                                        {{ $get_applicant_details->interview_duration == '30min(10.30AM)' ? 'selected' : '' }}>
                                                                        30min(10.30AM)
                                                                    </option>
                                                                    <option value="1h(11.00AM)"
                                                                        {{ $get_applicant_details->interview_duration == '1h(11.00AM)' ? 'selected' : '' }}>
                                                                        1h(11.00AM)
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interview
                                                                Round<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select border border-primary"
                                                                    name="interview_round_offline"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option selected="">Select Round</option>
                                                                    <option value="Round-1"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                        Round-1</option>
                                                                    <option value="Round-2"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                        Round-2</option>
                                                                    <option value="Round-3"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                        Round-3</option>
                                                                    <option value="Round-4"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                        Round-4</option>
                                                                    <option value="Round-5"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                        Round-5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Select Location<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        @php
                                                            $get_location = get_company_location();
                                                        @endphp
                                                        <select class="form-select  border border-primary"
                                                            name="interview_location_offline" id="branch_location"
                                                            style="height:36px">
                                                            @foreach ($get_location as $company)
                                                                <option value="{{ $company->city }}">
                                                                    {{ $company->city }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <span class="float-end fs-10"><a href="#"
                                                            data-bs-target="#add_location" data-bs-toggle="modal"
                                                            class="text-secondary">Add Location</a></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interviewer<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interviewer_name_offline"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option selected="">Select Interviewer
                                                                    </option>
                                                                    <option value="Akash"
                                                                        {{ $get_applicant_details->interview_taken_by == 'Akash' ? 'selected' : '' }}>
                                                                        Akash</option>
                                                                    <option value="Sarit"
                                                                        {{ $get_applicant_details->interview_taken_by == 'Sarit' ? 'selected' : '' }}>
                                                                        Sarit</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interviewer
                                                                Kit<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interviewer_kit_offline"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option selected="" disabled>Select
                                                                        Scorecard</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Send Link's<span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="checkbox" class="btn-check "
                                                                name="sch_interview_offline_link"
                                                                id="int_send_mail_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="int_send_mail_link" data-bs-toggle="tooltip"
                                                                title="Send Mail">
                                                                <i class="ri-mail-line fs-16 "></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link" id="int_send_message_link"
                                                                disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="int_send_message_link" data-bs-toggle="tooltip"
                                                                title="Send Message">
                                                                <i class="ri-message-2-line fs-16"></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link" id="int_send_whatspp_link"
                                                                disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="int_send_whatspp_link" data-bs-toggle="tooltip"
                                                                title="Send Whatspp">
                                                                <i class="ri-whatsapp-line fs-16"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- initiated_assessment_date --}}
                                        <div class="row" style="display:none" id="initiated_assessment_date">
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Schedule Date<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="radio" class="btn-check "
                                                            name="test_initiated_date" id="in_schedule_date_today"
                                                            value="{{ today_date_flat() }}">
                                                        <label
                                                            class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                            for="in_schedule_date_today">Today</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow() }}" name="test_initiated_date"
                                                            id="in_schedule_date_tomorrow">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_tomorrow">Tomorrow</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow_next() }}"
                                                            name="test_initiated_date" id="in_schedule_date_check1">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check1">{{ date('d M', strtotime(date_tomorrow_next())) }}</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_tomorrow_next_next() }}"
                                                            name="test_initiated_date" id="in_schedule_date_check2">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check2">{{ date('d M', strtotime(date_tomorrow_next_next())) }}</label>
                                                        <input type="text"
                                                            class="form-control flatpickr-input active border border-primary text-primary"
                                                            data-provider="flatpickr" placeholder="Custom"
                                                            name="test_initiated_date1" data-date-format="d M Y"
                                                            style="height:36px" id="test_initiated"
                                                            value="{{ $get_applicant_details->scheduled_date }}">
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Schedule Time<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            id="inputGroupSelect02" style="height:36px"
                                                            name="assessment_sch_time">
                                                            @php
                                                                $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                $interval = new DateInterval('PT15M'); // set the interval to 15 minute
                                                                $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod value="{{ $get_applicant_details->scheduled_date }}
                                                                
                                                            @endphp
                                                            @foreach ($daterange as $date)
                                                                <option value="{{ $date->format('H:i A') }}"
                                                                    {{ $get_applicant_details->scheduled_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                    {{ $date->format('H:i A') }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class=" ri-time-line fs-15 text-light"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Assessment Type<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="assessment_type" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            <option value="" selected>Select</option>
                                                            <option value="Video Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Video Assessment' ? 'selected' : '' }}>
                                                                Video Assessment
                                                            </option>
                                                            <option value="Technical Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Technical Assessment' ? 'selected' : '' }}>
                                                                Technical
                                                                Assessment
                                                            </option>
                                                            <option value="Aptitude Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Aptitude Assessment' ? 'selected' : '' }}>
                                                                Aptitude Assessment
                                                            </option>
                                                            <option value="Online Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Online Assessment' ? 'selected' : '' }}>
                                                                Online Assessment
                                                            </option>
                                                            <option value="Hacker Rank Test"
                                                                {{ $get_applicant_details->interview_ass_type == 'Hacker Rank Test' ? 'selected' : '' }}>
                                                                Hacker Rank Test
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Assessment
                                                        Round<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="assessment_round" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            <option>Select Round</option>
                                                            <option value="Round-1"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                Round-1</option>
                                                            <option value="Round-2"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                Round-2</option>
                                                            <option value="Round-3"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                Round-3</option>
                                                            <option value="Round-4"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                Round-4</option>
                                                            <option value="Round-5"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                Round-5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Assessment
                                                        Services<span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="assessment_services" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            <option value="" selected>Select Services</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Send Link's<span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="checkbox" class="btn-check "
                                                                name="test_initiated_mail" id="initi_send_mail_link"
                                                                checked>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="initi_send_mail_link" data-bs-toggle="tooltip"
                                                                title="Send Mail">
                                                                <i class="ri-mail-line fs-16 "></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check " name=""
                                                                id="initi_send_message_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="initi_send_message_link" data-bs-toggle="tooltip"
                                                                title="Send Message">
                                                                <i class="ri-message-2-line fs-16"></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check " name=""
                                                                id="initi_send_whatspp_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="initi_send_whatspp_link" data-bs-toggle="tooltip"
                                                                title="Send Whatspp">
                                                                <i class="ri-whatsapp-line fs-16"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- completed_assessment_date --}}
                                        <div class="row" style="display:none" id="completed_assessment_date">

                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Appeared Date<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="radio" class="btn-check "
                                                            name="test_appeared_date" id="in_schedule_date_today1"
                                                            value="{{ today_date_flat() }}">
                                                        <label
                                                            class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                            for="in_schedule_date_today1">Today</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_yesterday() }}" name="test_appeared_date"
                                                            id="in_schedule_date_tomorrow1">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_tomorrow1">Yesterday</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_yesterday_prev() }}"
                                                            name="test_appeared_date" id="in_schedule_date_check11">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check11">{{ date('d M', strtotime(date_yesterday_prev())) }}</label>
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_yesterday_prev_prev() }}"
                                                            name="test_appeared_date" id="in_schedule_date_check22">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_check22">{{ date('d M', strtotime(date_yesterday_prev_prev())) }}</label>
                                                        <input type="text"
                                                            class="form-control flatpickr-input active border border-primary text-primary"
                                                            data-provider="flatpickr" placeholder="Custom"
                                                            name="test_appeared_date1" data-date-format="d M Y"
                                                            style="height:36px" id="test_appeared1"
                                                            value="{{ $get_applicant_details->scheduled_date }}">
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Appeared Time<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="test_appeared_time" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            @php
                                                                $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                $interval = new DateInterval('PT15M'); // set the interval to 15 minute
                                                                $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod
                                                                
                                                            @endphp
                                                            @foreach ($daterange as $date)
                                                                <option value="{{ $date->format('H:i A') }}"
                                                                    {{ $get_applicant_details->scheduled_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                    {{ $date->format('H:i A') }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class=" ri-time-line fs-15 text-light"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Assessment Type<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="test_appeared_assessment_type"
                                                            id="inputGroupSelect02" style="height:36px">
                                                            <option value="">Select</option>
                                                            <option value="Video Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Video Assessment' ? 'selected' : '' }}>
                                                                Video Assessment
                                                            </option>
                                                            <option value="Technical Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Technical Assessment' ? 'selected' : '' }}>
                                                                Technical
                                                                Assessment
                                                            </option>
                                                            <option value="Aptitude Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Aptitude Assessment' ? 'selected' : '' }}>
                                                                Aptitude Assessment
                                                            </option>
                                                            <option value="Online Assessment"
                                                                {{ $get_applicant_details->interview_ass_type == 'Online Assessment' ? 'selected' : '' }}>
                                                                Online Assessment
                                                            </option>
                                                            <option value="Hacker Rank Test"
                                                                {{ $get_applicant_details->interview_ass_type == 'Hacker Rank Test' ? 'selected' : '' }}>
                                                                Hacker Rank Test
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Assessment Round<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="test_appeared_assessment_round"
                                                            id="inputGroupSelect02" style="height:36px">
                                                            <option selected="">Select Round</option>
                                                            <option value="Round-1"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                Round-1</option>
                                                            <option value="Round-2"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                Round-2</option>
                                                            <option value="Round-3"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                Round-3</option>
                                                            <option value="Round-4"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                Round-4</option>
                                                            <option value="Round-5"
                                                                {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                Round-5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Assessment Services<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="test_appeared_assessment_services"
                                                            id="inputGroupSelect02" style="height:36px" disabled>
                                                            <option selected="">Select Round</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Send Link's<span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link" name="test_appeared_link"
                                                                id="comp_send_mail_link" checked>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="comp_send_mail_link" data-bs-toggle="tooltip"
                                                                title="Send Mail">
                                                                <i class="ri-mail-line fs-16 "></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link"
                                                                id="comp_send_message_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="comp_send_message_link" data-bs-toggle="tooltip"
                                                                title="Send Message">
                                                                <i class="ri-message-2-line fs-16"></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link"
                                                                id="comp_send_whatspp_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="comp_send_whatspp_link" data-bs-toggle="tooltip"
                                                                title="Send Whatspp">
                                                                <i class="ri-whatsapp-line fs-16"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- interview_appeared_attend -->
                                        <div class="row" style="display:none" id="interview_appeared_attend">
                                            <div class="col-lg-7">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Appeared Date<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input type="radio" class="btn-check "
                                                            value="{{ date_yesterday() }}"
                                                            name="interview_appeared_date"
                                                            id="in_schedule_date_tomorrow1043">
                                                        <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                            for="in_schedule_date_tomorrow1043">Yesterday</label>
                                                        <input type="radio" class="btn-check "
                                                            name="interview_appeared_date"
                                                            id="in_schedule_date_today1201"
                                                            value="{{ today_date_flat() }}">
                                                        <label
                                                            class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                            for="in_schedule_date_today1201">Today</label>

                                                        <input type="text"
                                                            class="form-control flatpickr-input active border border-primary text-primary"
                                                            data-provider="flatpickr" placeholder="Custom"
                                                            name="interview_appeared_date1" data-date-format="d M Y"
                                                            value="{{ $get_applicant_details->interview_attn_dt }}"
                                                            style="height:36px" id="interview_appeared1">
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Appeared Time<span
                                                            class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <select class="form-select  border border-primary"
                                                            name="interview_appeared_time" id="inputGroupSelect02"
                                                            style="height:36px">
                                                            @php
                                                                $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                $interval = new DateInterval('PT15M'); // set the interval to 1 minute
                                                                $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod
                                                                
                                                            @endphp
                                                            @foreach ($daterange as $date)
                                                                <option value="{{ $date->format('H:i A') }}"
                                                                    {{ $get_applicant_details->interview_attn_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                    {{ $date->format('H:i A') }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="input-group-text bg-primary border border-primary"
                                                            id="basic-addon1" style="height:36px"><i
                                                                class=" ri-time-line fs-15 text-light"></i></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-7">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interview Type<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="interview_appeared_type"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option value="">Select Type</option>
                                                                    <option value="Online">Online</option>
                                                                    <option value="Offline">Offline</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Interview
                                                                Round<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select border border-primary"
                                                                    name="interview_appeared_round"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    <option selected="">Select Round</option>
                                                                    <option value="Round-1"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                        Round-1</option>
                                                                    <option value="Round-2"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                        Round-2</option>
                                                                    <option value="Round-3"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                        Round-3</option>
                                                                    <option value="Round-4"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                        Round-4</option>
                                                                    <option value="Round-5"
                                                                        {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                        Round-5</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Taken
                                                                By<span class="text-danger">*</span></label>
                                                            <input type="text" name="interview_appeared_taken_by"
                                                                value="{{ $get_applicant_details->interview_taken_by }}"
                                                                class="form-control border border-primary">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-5">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Send Link's<span
                                                            class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="checkbox" class="btn-check "
                                                                name="interview_appeared_mail_link"
                                                                id="int_appear_send_mail_link" checked>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="int_appear_send_mail_link"
                                                                data-bs-toggle="tooltip" title="Send Mail">
                                                                <i class="ri-mail-line fs-16 "></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link"
                                                                id="int_appear_send_message_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="int_appear_send_message_link"
                                                                data-bs-toggle="tooltip" title="Send Message">
                                                                <i class="ri-message-2-line fs-16"></i>
                                                            </label>
                                                            <input type="checkbox" class="btn-check "
                                                                name="in_job_priority_link"
                                                                id="int_appear_send_whatspp_link" disabled>
                                                            <label class="j_priority btn btn-outline-primary p-1"
                                                                for="int_appear_send_whatspp_link"
                                                                data-bs-toggle="tooltip" title="Send Whatspp">
                                                                <i class="ri-whatsapp-line fs-16"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 secondary_interview_status">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Interview Status <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select border border-primary"
                                                        name="interview_status"
                                                        id="secondary_interview_candidate_status">
                                                        <option value="" selected disabled>Select</option>
                                                        <option value="Result Awaited">Result Awaited</option>
                                                        <option value="Interview Cleared">Interview Cleared</option>
                                                        <option value="Shortlisted">Shortlisted</option>
                                                        <option value="Selected">Selected</option>
                                                        <option value="Offered">Offered</option>
                                                        <option value="Interview Rejected">Interview Rejected</option>
                                                        <option value="Not Interested">Not Interested</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 secondary_interview_type" style="display:none"
                                                id="secondary_interview_type">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Interview Type <span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select border border-primary"
                                                        name="next_interview_type"
                                                        id="interview_candidate_type">
                                                        <option value="0">Select</option>
                                                        <option value="Online_status">Online</option>
                                                        <option value="Offline_status">Offline</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 secondary_documentation" style="display:none"
                                                id="secondary_documentation">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Documentation
                                                        Type<span class="text-danger">*</span></label>
                                                    <select class="form-select border border-primary"
                                                        name="documentation_type"
                                                        id="documentation_candidate_type">
                                                        <option value="0">Select</option>
                                                        <option value="For Documentation">For Documentation</option>
                                                        <option value="For Offer">For Offer</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 secondary_offered" style="display:none"
                                                id="secondary_offered">
                                                <div class="mb-3">
                                                    <label for="basiInput" class="form-label">Offered<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select border border-primary"
                                                        name="offered_released_type"
                                                        id="offered_released_candidate_type">
                                                        <option value="0">Select</option>
                                                        <option value="Offer Released">Offer Released</option>
                                                        <option value="Offer Accepted">Offer Accepted</option>
                                                        <option value="Offer Declined">Offer Declined</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div style="display:none" id="interview_candidate_status_online_status">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Schedule
                                                                Date<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="radio" class="btn-check "
                                                                    name="next_interview_sch_online_date"
                                                                    id="in_schedule_date_today3444"
                                                                    value="{{ today_date_flat() }}">
                                                                <label
                                                                    class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                                    for="in_schedule_date_today3444">Today</label>
                                                                <input type="radio" class="btn-check "
                                                                    value="{{ date_tomorrow() }}"
                                                                    name="next_interview_sch_online_date"
                                                                    id="in_schedule_date_tomorrow3545">
                                                                <label
                                                                    class="j_priority btn btn-outline-primary p-2 fs-12"
                                                                    for="in_schedule_date_tomorrow3545">Tomorrow</label>
                                                                <input type="radio" class="btn-check "
                                                                    value="{{ date_tomorrow_next() }}"
                                                                    name="next_interview_sch_online_date"
                                                                    id="in_schedule_date_check13353">
                                                                <label
                                                                    class="j_priority btn btn-outline-primary p-2 fs-12"
                                                                    for="in_schedule_date_check13353">{{ date('d M', strtotime(date_tomorrow_next())) }}</label>
                                                                <input type="radio" class="btn-check "
                                                                    value="{{ date_tomorrow_next_next() }}"
                                                                    name="next_interview_sch_online_date"
                                                                    id="in_schedule_date_check23363">
                                                                <label
                                                                    class="j_priority btn btn-outline-primary p-2 fs-12"
                                                                    for="in_schedule_date_check23363">{{ date('d M', strtotime(date_tomorrow_next_next())) }}</label>
                                                                <input type="text"
                                                                    class="form-control flatpickr-input active border border-primary text-primary"
                                                                    data-provider="flatpickr" placeholder="Custom"
                                                                    name="next_interview_sch_online_date1"
                                                                    data-date-format="d M Y"
                                                                    value="{{ $get_applicant_details->interview_attn_dt }}"
                                                                    style="height:36px" id="interview_sch_online">
                                                                <span
                                                                    class="input-group-text bg-primary border border-primary"
                                                                    id="basic-addon1" style="height:36px"><i
                                                                        class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Start
                                                                Time<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="next_interview_on_start_time"
                                                                    id="inputGroupSelect02" style="height:36px">
                                                                    @php
                                                                        $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                        $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                        $interval = new DateInterval('PT15M'); // set the interval to 1 minute
                                                                        $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod
                                                                        
                                                                    @endphp
                                                                    @foreach ($daterange as $date)
                                                                        <option value="{{ $date->format('H:i A') }}"
                                                                            {{ $get_applicant_details->interview_attn_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                            {{ $date->format('H:i A') }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!-- <span class="input-group-text bg-primary border border-primary" id="basic-addon1" style="height:36px"><i class=" ri-time-line fs-15 text-light"></i></span> -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput"
                                                                        class="form-label">Duration<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select
                                                                            class="form-select  border border-primary"
                                                                            name="next_interview_duration_online"
                                                                            id="inputGroupSelect02"
                                                                            style="height:36px">
                                                                            <option value="">Select</option>
                                                                            <option value="1h(10.00AM)"
                                                                                {{ $get_applicant_details->interview_duration == '1h(10.00AM)' ? 'selected' : '' }}>
                                                                                1h(10.00AM)
                                                                            </option>
                                                                            <option value="30min(10.30AM)"
                                                                                {{ $get_applicant_details->interview_duration == '30min(10.30AM)' ? 'selected' : '' }}>
                                                                                30min(10.30AM)
                                                                            </option>
                                                                            <option value="1h(11.00AM)"
                                                                                {{ $get_applicant_details->interview_duration == '1h(11.00AM)' ? 'selected' : '' }}>
                                                                                1h(11.00AM)
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput"
                                                                        class="form-label">Interview
                                                                        Round<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select
                                                                            class="form-select border border-primary"
                                                                            name="next_interview_round_online"
                                                                            id="inputGroupSelect02"
                                                                            style="height:36px">
                                                                            <option selected="">Select Round
                                                                            </option>
                                                                            <option value="Round-1"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                                Round-1</option>
                                                                            <option value="Round-2"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                                Round-2</option>
                                                                            <option value="Round-3"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                                Round-3</option>
                                                                            <option value="Round-4"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                                Round-4</option>
                                                                            <option value="Round-5"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                                Round-5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Video Calling
                                                                Services<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="next_video_call_online" id="inputGroupSelect02"
                                                                    style="height:36px">
                                                                    <option value="Quack-O(Preconfigured)"
                                                                        selected=""
                                                                        {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                        Quack-O(Preconfigured)</option>
                                                                    <option value="Zoom (Integration Required)"
                                                                        {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                        Zoom (Integration Required)
                                                                    </option>
                                                                    <option
                                                                        value="Google Meet (Integration
                                                            Required)"
                                                                        {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                        Google Meet (Integration
                                                                        Required)
                                                                    </option>
                                                                    <option value="MS Team(Integration Required)"
                                                                        {{ $get_applicant_details->interview_vdo_service_type == 'Round-1' ? 'selected' : '' }}>
                                                                        MS Team(Integration Required)
                                                                    </option>
                                                                    {{-- <option value="" {{$get_applicant_details->interview_vdo_service_type=="Round-1"?"selected":""}}>Custom((Text Field To paste
                                                                Link)
                                                            </option> --}}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput"
                                                                        class="form-label">Interviewer<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select
                                                                            class="form-select  border border-primary"
                                                                            name="next_interviewer_name_online"
                                                                            id="next_interviewer_name_online"
                                                                            style="height:36px">
                                                                            <option selected="">Select Interviewer
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                    <span class="float-end  fs-10"><a href="#"
                                                                            data-bs-target="#add_interviewer"
                                                                            class="text-secondary"
                                                                            data-bs-toggle="modal">Add
                                                                            Interviewer</a></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput"
                                                                        class="form-label">Interviewer
                                                                        Kit<span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select
                                                                            class="form-select  border border-primary"
                                                                            name="next_interviewer_kit_online"
                                                                            id="inputGroupSelect02"
                                                                            style="height:36px">
                                                                            <option selected="">Scorecard</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Send
                                                                Link's<span class="text-danger">*</span></label>
                                                            <div class="form-group">
                                                                <div class="btn-group btn-group-sm d-flex "
                                                                    role="group"
                                                                    aria-label="Horizontal radio toggle button group">
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="next_sch_interview_online_link"
                                                                        id="online_int_send_mail_link" checked>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="online_int_send_mail_link"
                                                                        data-bs-toggle="tooltip" title="Send Mail">
                                                                        <i class="ri-mail-line fs-16 "></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="in_job_priority_link"
                                                                        id="online_int_send_message_link" disabled>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="online_int_send_message_link"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Send Message">
                                                                        <i class="ri-message-2-line fs-16"></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="in_job_priority_link"
                                                                        id="online_int_send_whatspp_link" disabled>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="online_int_send_whatspp_link"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Send Whatspp">
                                                                        <i class="ri-whatsapp-line fs-16"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display:none" id="interview_candidate_status_offline_status">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Re-Schedule Date<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <input type="radio" class="btn-check "
                                                                    name="next_interview_sch_offline_date"
                                                                    id="in_schedule_date_today443"
                                                                    value="{{ today_date_flat() }}">
                                                                <label
                                                                    class="j_priority btn btn-outline-primary p-2 fs-12  border-top-left-radius-4 border-bottom-left-radius-4"
                                                                    for="in_schedule_date_today443">Today</label>
                                                                <input type="radio" class="btn-check "
                                                                    value="{{ date_tomorrow() }}"
                                                                    name="next_interview_sch_offline_date"
                                                                    id="in_schedule_date_tomorrow433">
                                                                <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                                    for="in_schedule_date_tomorrow433">Tomorrow</label>
                                                                <input type="radio" class="btn-check "
                                                                    value="{{ date_tomorrow_next() }}"
                                                                    name="next_interview_sch_offline_date"
                                                                    id="in_schedule_date_check13312">
                                                                <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                                    for="in_schedule_date_check13312">{{ date('d M', strtotime(date_tomorrow_next())) }}</label>
                                                                <input type="radio" class="btn-check "
                                                                    value="{{ date_tomorrow_next_next() }}"
                                                                    name="next_interview_sch_offline_date"
                                                                    id="in_schedule_date_check233212">
                                                                <label class="j_priority btn btn-outline-primary p-2 fs-12"
                                                                    for="in_schedule_date_check233212">{{ date('d M', strtotime(date_tomorrow_next_next())) }}</label>
                                                                <input type="text"
                                                                    class="form-control flatpickr-input active border border-primary text-primary"
                                                                    data-provider="flatpickr" placeholder="Custom"
                                                                    name="next_interview_sch_offline_date1"
                                                                    data-date-format="d M Y"
                                                                    value="{{ $get_applicant_details->interview_attn_dt }}"
                                                                    style="height:36px" id="interview_sch_offline">
                                                                <span class="input-group-text bg-primary border border-primary"
                                                                    id="basic-addon1" style="height:36px"><i
                                                                        class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                            </div>
        
        
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Re-Start Time<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <select class="form-select  border border-primary"
                                                                    name="next_interview_off_start_time" id="inputGroupSelect02"
                                                                    style="height:36px">
                                                                    @php
                                                                        $begin = (new DateTime())->setTime(8, 0, 0); // create start point
                                                                        $end = (new DateTime())->setTime(22, 15, 00); // create end point
                                                                        $interval = new DateInterval('PT15M'); // set the interval to 1 minute
                                                                        $daterange = new DatePeriod($begin, $interval, $end); // create the DatePeriod
                                                                        
                                                                    @endphp
                                                                    @foreach ($daterange as $date)
                                                                        <option value="{{ $date->format('H:i A') }}"
                                                                            {{ $get_applicant_details->interview_attn_time == $date->format('H:i A') ? 'selected' : '' }}>
                                                                            {{ $date->format('H:i A') }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <!-- <span class="input-group-text bg-primary border border-primary" id="basic-addon1" style="height:36px"><i class=" ri-time-line fs-15 text-light"></i></span> -->
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput" class="form-label">Duration<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="form-select  border border-primary"
                                                                            name="next_interview_duration_offline"
                                                                            id="inputGroupSelect02" style="height:36px">
                                                                            <option value="">Select</option>
                                                                            <option value="1h(10.00AM)"
                                                                                {{ $get_applicant_details->interview_duration == '1h(10.00AM)' ? 'selected' : '' }}>
                                                                                1h(10.00AM)
                                                                            </option>
                                                                            <option value="30min(10.30AM)"
                                                                                {{ $get_applicant_details->interview_duration == '30min(10.30AM)' ? 'selected' : '' }}>
                                                                                30min(10.30AM)
                                                                            </option>
                                                                            <option value="1h(11.00AM)"
                                                                                {{ $get_applicant_details->interview_duration == '1h(11.00AM)' ? 'selected' : '' }}>
                                                                                1h(11.00AM)
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput" class="form-label">Interview
                                                                        Round<span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="form-select border border-primary"
                                                                            name="next_interview_round_offline"
                                                                            id="inputGroupSelect02" style="height:36px">
                                                                            <option selected="">Select Round</option>
                                                                            <option value="Round-1"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-1' ? 'selected' : '' }}>
                                                                                Round-1</option>
                                                                            <option value="Round-2"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-2' ? 'selected' : '' }}>
                                                                                Round-2</option>
                                                                            <option value="Round-3"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-3' ? 'selected' : '' }}>
                                                                                Round-3</option>
                                                                            <option value="Round-4"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-4' ? 'selected' : '' }}>
                                                                                Round-4</option>
                                                                            <option value="Round-5"
                                                                                {{ $get_applicant_details->interview_ass_round == 'Round-5' ? 'selected' : '' }}>
                                                                                Round-5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                        </div>
        
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Select Location<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                @php
                                                                    $get_location = get_company_location();
                                                                @endphp
                                                                <select class="form-select  border border-primary"
                                                                    name="next_interview_location_offline" id="branch_location"
                                                                    style="height:36px">
                                                                    @foreach ($get_location as $company)
                                                                        <option value="{{ $company->city }}">
                                                                            {{ $company->city }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <span class="float-end fs-10"><a href="#"
                                                                    data-bs-target="#add_location" data-bs-toggle="modal"
                                                                    class="text-secondary">Add Location</a></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput" class="form-label">Interviewer<span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="form-select  border border-primary"
                                                                            name="interviewer_name_offline"
                                                                            id="inputGroupSelect02" style="height:36px">
                                                                            <option selected="">Select Interviewer
                                                                            </option>
                                                                            <option value="Akash"
                                                                                {{ $get_applicant_details->interview_taken_by == 'Akash' ? 'selected' : '' }}>
                                                                                Akash</option>
                                                                            <option value="Sarit"
                                                                                {{ $get_applicant_details->interview_taken_by == 'Sarit' ? 'selected' : '' }}>
                                                                                Sarit</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-3">
                                                                    <label for="basiInput" class="form-label">Interviewer
                                                                        Kit<span class="text-danger">*</span></label>
                                                                    <div class="input-group">
                                                                        <select class="form-select  border border-primary"
                                                                            name="interviewer_kit_offline"
                                                                            id="inputGroupSelect02" style="height:36px">
                                                                            <option selected="" disabled>Select
                                                                                Scorecard</option>
        
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
        
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Send Link's<span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-group">
                                                                <div class="btn-group btn-group-sm d-flex " role="group"
                                                                    aria-label="Horizontal radio toggle button group">
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="sch_interview_offline_link"
                                                                        id="int_send_mail_link" disabled>
                                                                    <label class="j_priority btn btn-outline-primary p-1"
                                                                        for="int_send_mail_link" data-bs-toggle="tooltip"
                                                                        title="Send Mail">
                                                                        <i class="ri-mail-line fs-16 "></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="in_job_priority_link" id="int_send_message_link"
                                                                        disabled>
                                                                    <label class="j_priority btn btn-outline-primary p-1"
                                                                        for="int_send_message_link" data-bs-toggle="tooltip"
                                                                        title="Send Message">
                                                                        <i class="ri-message-2-line fs-16"></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="in_job_priority_link" id="int_send_whatspp_link"
                                                                        disabled>
                                                                    <label class="j_priority btn btn-outline-primary p-1"
                                                                        for="int_send_whatspp_link" data-bs-toggle="tooltip"
                                                                        title="Send Whatspp">
                                                                        <i class="ri-whatsapp-line fs-16"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display:none" id="secondary_documentation_offer">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Offered
                                                                Position<span class="text-danger">*</span></label>
                                                            <input type="text" name="offered_position"
                                                                class="form-control border border-primary"
                                                                id="basiInput">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Offered
                                                                CTC<span class="text-danger">*</span></label>
                                                            <input type="text" name="offered_ctc"
                                                                class="form-control  border border-primary"
                                                                id="basiInput">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Expected Date
                                                                Of Joining<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text border border-primary bg-primary"
                                                                    id="basic-addon1" style="height:36px"><i
                                                                        class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                                <input type="text" name="offered_exp_doj"
                                                                    class="form-control flatpickr-input active border border-primary"
                                                                    data-provider="flatpickr"
                                                                    data-date-format="d M Y" id="offered_exp_doj"
                                                                    style="height:36px">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Send
                                                                Link's<span class="text-danger">*</span></label>
                                                            <div class="form-group">
                                                                <div class="btn-group btn-group-sm d-flex "
                                                                    role="group"
                                                                    aria-label="Horizontal radio toggle button group">
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="documentation_link"
                                                                        id="documentation_send_mail_link" checked>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="documentation_send_mail_link"
                                                                        data-bs-toggle="tooltip" title="Send Mail">
                                                                        <i class="ri-mail-line fs-16 "></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="statdocumentation_link"
                                                                        id="documentation_send_message_link" disabled>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="documentation_send_message_link"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Send Message">
                                                                        <i class="ri-message-2-line fs-16"></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="statdocumentation_link"
                                                                        id="documentation_send_whatspp_link" disabled>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="documentation_send_whatspp_link"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Send Whatspp">
                                                                        <i class="ri-whatsapp-line fs-16"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div style="display:none" id="secondary_offered_released">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Offered
                                                                Position<span class="text-danger">*</span></label>
                                                            <input type="text" name="offer_rel_position"
                                                                class="form-control border border-primary"
                                                                id="basiInput">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Offered
                                                                CTC<span class="text-danger">*</span></label>
                                                            <input type="text" name="offer_rel_ctc"
                                                                class="form-control  border border-primary"
                                                                id="basiInput">
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Expected Date
                                                                Of Joining<span class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span
                                                                    class="input-group-text border border-primary bg-primary"
                                                                    id="basic-addon1" style="height:36px"><i
                                                                        class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                                <input type="text" name="offer_rel_exp_doj" id="offer_rel_exp_doj"
                                                                    class="form-control flatpickr-input active border border-primary"
                                                                    data-provider="flatpickr"
                                                                    placeholder="DD-MM-YYYY"
                                                                    data-date-format="d M Y"
                                                                    style="height:36px">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="mb-3">
                                                            <label for="basiInput" class="form-label">Send
                                                                Link's<span class="text-danger">*</span></label>
                                                            <div class="form-group">
                                                                <div class="btn-group btn-group-sm d-flex "
                                                                    role="group"
                                                                    aria-label="Horizontal radio toggle button group">
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="offered_released_link"
                                                                        id="offered_released_send_mail_link" checked>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="offered_released_send_mail_link"
                                                                        data-bs-toggle="tooltip" title="Send Mail">
                                                                        <i class="ri-mail-line fs-16 "></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="statoffered_released_link"
                                                                        id="offered_released_send_message_link"
                                                                        disabled>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="offered_released_send_message_link"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Send Message">
                                                                        <i class="ri-message-2-line fs-16"></i>
                                                                    </label>
                                                                    <input type="checkbox" class="btn-check "
                                                                        name="statoffered_released_link"
                                                                        id="offered_released_send_whatspp_link"
                                                                        disabled>
                                                                    <label
                                                                        class="j_priority btn btn-outline-primary p-1"
                                                                        for="offered_released_send_whatspp_link"
                                                                        data-bs-toggle="tooltip"
                                                                        title="Send Whatspp">
                                                                        <i class="ri-whatsapp-line fs-16"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="mb-3" id="remark_note">
                                            <label for="basiInput" class="form-label">Notes <span
                                                    class="text-danger">*</span></label>
                                            <div class="bubble-editor" id="bubble_editor" style="height: 200px;">

                                            </div>
                                            <input type="hidden" name="notes" id="notes">
                                        </div>


                                        <div class="d-flex justify-content-center">
                                            <button type="button"
                                                    class="btn btn-info btn-border w-lg btn-md me-2" disabled>No Response</button>
                                            <a href="{{ route('view_job_details_tab', ['jobid' => $get_jobowner_details->job_code, 'ctab' => 'submitted']) }}"> <button type="button"
                                                class="btn btn-light btn-border w-lg btn-md me-2">Cancel</button></a>
                                            <button type="submit"
                                                class="btn btn-primary btn-border w-lg me-2 btn-md">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Skills</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-15">
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                        <a href="javascript:void(0);"
                                            class="badge badge-soft-primary">Javascript</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">React Js</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Jquery</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Language</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-15">
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Hindi</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">English</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Odia</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Bengoli</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-1 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-5 mb-4">
                                    <div class="row g-4">

                                        <!--end col-->
                                        <div class="col p-0">
                                            <div class="p-2">
                                                <h3 class="text-primary mb-4 fs-19 cand-info"> Other Information</h3>
                                                <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3"
                                                    role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active All py-3 ps-1"
                                                            data-bs-toggle="tab" id="All" href="#active"
                                                            role="tab" aria-selected="true">
                                                            <i class="ri-store-2-fill me-1 align-bottom"></i> Tab1
                                                            <span
                                                                class="badge bg-primary align-middle ms-1">220</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link py-3 Delivered" data-bs-toggle="tab"
                                                            id="Delivered" href="#inactive" role="tab"
                                                            aria-selected="false">
                                                            <i class="ri-checkbox-circle-line me-1 align-bottom"></i>
                                                            Tab2 <span
                                                                class="badge bg-success align-middle ms-1">30</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link py-3 Delivered" data-bs-toggle="tab"
                                                            id="Delivered" href="#inactive" role="tab"
                                                            aria-selected="false">
                                                            <i class="ri-checkbox-circle-line me-1 align-bottom"></i>
                                                            Tab3 <span
                                                                class="badge bg-success align-middle ms-1">30</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link py-3 Delivered" data-bs-toggle="tab"
                                                            id="Delivered" href="#inactive" role="tab"
                                                            aria-selected="false">
                                                            <i class="ri-checkbox-circle-line me-1 align-bottom"></i>
                                                            Tab4 <span
                                                                class="badge bg-success align-middle ms-1">30</span>
                                                        </a>
                                                    </li>


                                                </ul>

                                            </div>

                                        </div>
                                        <!--end col-->


                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="card mb-1 me-2" style="width:100%;">
                        <div class="card-body">
                            <div class="text-center">
                                <a href="{{ route('view_job_details_tab', ['jobid' => $get_jobowner_details->job_code, 'ctab' => 'inprogress']) }}"><button
                                        type="button" class="btn btn-light btn-border me-2 w-lg">Close
                                        window</button></a>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade zoomIn" id="centermdal" tabindex="-1"
                        aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-center">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="add-notes">Notes <span class="text-danger">*</span></label>
                                        <textarea name="" id="" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="mb-2 text-center">
                                        <button class="btn btn-light btn-border w-lg"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary btn-border w-lg">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- add location modal  --}}
                    <div class="modal fade zoomIn" id="add_location" tabindex="-1"
                        aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-center modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Location</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form method="POST" id="add_location_ajax">
                                                @csrf
                                                <div>
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div id="show_location_field">
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Friendly Name</label>
                                                                        <input type="text" name="friendly_name"
                                                                            class="form-control"
                                                                            id="validationDefault01"
                                                                            placeholder="Enter Friendly Name For Company"
                                                                            required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Organisation
                                                                            Name</label>
                                                                        <select class="form-select"
                                                                            id="choices-single-no-search"
                                                                            name="client_id" data-choices
                                                                            data-choices-search-false>
                                                                            <option>Organisation Name</option>
                                                                            <?php
                                                                            $organisationlist = get_organisation();
                                                                            foreach ($organisationlist as  $value) {
                                                                            ?>
                                                                            <option value="<?= $value->company_id ?>"
                                                                                {{ $get_jobowner_details->company_id == $value->company_id ? 'selected' : '' }}>
                                                                                <?= $value->client_name ?> </option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">City</label>
                                                                        <input type="text" name="city"
                                                                            class="form-control" id="selected_city"
                                                                            placeholder="Enter City Name"
                                                                            required="">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Country</label>
                                                                        <select class="form-select"
                                                                            id="country-dropdown" name="country"
                                                                            data-choices data-choices-search-false>
                                                                            <?php $country = get_country(); ?>
                                                                            <option value="">Select Country
                                                                            </option>
                                                                            @foreach ($country as $c)
                                                                                <option value="{{ $c->loc_id }}"
                                                                                    {{ $c->loc_name == 'India' ? 'selected' : '' }}>
                                                                                    {{ $c->loc_name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-md-6">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Address</label>
                                                                        <input type="text" name="address"
                                                                            class="form-control"
                                                                            id="validationDefault01"
                                                                            placeholder="Enter Address"
                                                                            required="">
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="validationDefault01"
                                                                                    class="form-label">Postcode</label>
                                                                                <input type="number"
                                                                                    name="postcode"
                                                                                    class="form-control"
                                                                                    id="validationDefault01"
                                                                                    placeholder="Enter Postcode"
                                                                                    required="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="validationDefault01"
                                                                                    class="form-label">State</label>
                                                                                <select class="form-control"
                                                                                    id="state-dropdown"
                                                                                    name="state">
                                                                                    <option value="">Select
                                                                                        State</option>

                                                                                </select>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <div class="col-lg-12 text-end">
                                                                        <button data-bs-dismiss="modal"
                                                                            type="button"
                                                                            class="btn btn-light btn-border show_location_template me-1">
                                                                            Cancel</button>
                                                                        <button type="button"
                                                                            id="submit_ajax_location"
                                                                            class="btn btn-primary btn-border w-lg">
                                                                            Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- add interviewer modal  --}}
                    <div class="modal fade zoomIn" id="add_interviewer" tabindex="-1"
                        aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-center modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel">Add Interviewer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="add_interviewer_ajax">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="First Name" class="form-label">First Name <font
                                                            color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-user-3-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="first_name"
                                                            class="form-control form-control-icon"
                                                            placeholder="First Name" id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Last Name" class="form-label">Last Name <font
                                                            color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-user-3-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="last_name"
                                                            class="form-control form-control-icon"
                                                            placeholder="Last Name" id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Designation <font
                                                            color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-account-pin-box-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="designation"
                                                            class="form-control form-control-icon"
                                                            placeholder="Designation" id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">User Type <font
                                                            color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class=" ri-shield-user-line fs-15 text-primary"></i></span>
                                                        <select name="user_type" id="ForminputState"
                                                            class="form-select" required>
                                                            <option value="">Please Select</option>
                                                            <option>Human Resources</option>
                                                            <option>Branch Manager</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone <font
                                                            color="red">*</font></label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-12 ">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text"
                                                                    id="addon-wrapping"><i
                                                                        class="ri-phone-line fs-15 text-primary"></i></span>
                                                                <input type="number" name="phone[]"
                                                                    class="form-control form-control-icon"
                                                                    placeholder="000000000"
                                                                    id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                                    required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Email <font
                                                            color="red">*</font></label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-12 ">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text"
                                                                    id="addon-wrapping"><i
                                                                        class="ri-mail-line fs-15 text-primary"></i></span>
                                                                <input type="text" name="email[]"
                                                                    class="form-control form-control-icon"
                                                                    placeholder="email@example.com"
                                                                    id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                                    required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-12 text-end">
                                                <button data-bs-dismiss="modal" type="button"
                                                    class="btn btn-light btn-border show_location_template me-1">
                                                    Cancel</button>
                                                <button type="button" id="submit_ajax_interviewer"
                                                    class="btn btn-primary btn-border w-lg">
                                                    Save</button>
                                            </div>
                                        </div>
                                    </form>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade zoomIn" id="resume" tabindex="-1"
                        aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <iframe src="assets/images/resume.pdf" width="100%" height="400px"></iframe>
                                    <div class="mb-2 text-center">
                                        <button class="btn btn-light btn-border w-lg"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            @php
            $user_detials = get_owner_details($get_jobowner_details->job_posted_by_userid);
            @endphp
        </div>
    </div>

    @include('admin.include.footer')
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('#country-dropdown').on('change', function() {

                $("#state-dropdown").html('');
                $.ajax({
                    url: window.location.origin + "/get-states-by-country/" + $('#country-dropdown')
                        .val(),
                    type: "get",
                    success: function(result) {
                        console.log(result)
                        $.each(result, function(key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .loc_id + '">' + value.loc_name + '</option>');
                        });
                    }
                });
            });
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#submit_ajax_location').click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#add_location_ajax')[0]);
            var city = $('selected_city').val();
            $("#branch_location").html('');
            $.ajax({
                url: '{{ route('add_location_ajax') }}',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#branch_location").append(
                            `<option value="${value.city}">${value.city}</option>`);
                    });
                    var myModalEl = document.getElementById('add_location')
                    var modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();
                }
            });
        });
        $('#submit_ajax_interviewer').click(function(e) {
            e.preventDefault();
            var formData = new FormData($('#add_interviewer_ajax')[0]);
            $("#interviewer_name_online").html('');
            $.ajax({
                url: '{{ route('add_location_ajax') }}',
                type: 'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $.each(response, function(key, value) {
                        $("#interviewer_name_online").append(
                            `<option value="${value.city}">${value.city}</option>`);
                    });
                    var myModalEl = document.getElementById('add_interviewer')
                    var modal = bootstrap.Modal.getInstance(myModalEl)
                    modal.hide();
                }
            });
        });
        //add class remove class
        $(document).ready(function() {
            $('#update_candidate_status').on('change', function() {
                if ($(this).val() == "Reschedule Interview") {
                    $('.interview_attend_status').removeClass('col-lg-12');
                    $('.interview_attend_status').addClass('col-lg-7');
                    $('.required_interview').css('display', 'inline-block');
                    $('.required_availability').css('display', 'none');
                    $('.required_assessment').css('display', 'none');
                }
                if ($(this).val() == "Availability Required" || $(this).val() == "Schedule Pending") {
                    $('.interview_attend_status').removeClass('col-lg-12');
                    $('.interview_attend_status').addClass('col-lg-7');
                    $('.required_availability').css('display', 'inline-block');
                    $('.required_interview').css('display', 'none');
                    $('.required_assessment').css('display', 'none');
                }
                if ($(this).val() == "Assessments") {
                    $('.interview_attend_status').removeClass('col-lg-12');
                    $('.interview_attend_status').addClass('col-lg-7');
                    $('.required_assessment').css('display', 'inline-block');
                    $('.required_availability').css('display', 'none');
                    $('.required_interview').css('display', 'none');
                }
                if ($(this).val() == "Interview Appeared" || $(this).val() == "Update Information" || $(
                        this).val() == "No Show" || $(this).val() == "Did Not Attented" || $(this).val() ==
                    "On Hold") {
                    $('.interview_attend_status').removeClass('col-lg-7');
                    $('.interview_attend_status').addClass('col-lg-12');
                    $('.secondary_interview_status').removeClass('col-lg-7');
                    $('.secondary_interview_status').addClass('col-lg-12');
                    $('.required_assessment').css('display', 'none');
                    $('.required_availability').css('display', 'none');
                    $('.required_interview').css('display', 'none');
                }
                if ($(this).val() == "Interview Appeared") {
                    $('.interview_attend_status').removeClass('col-lg-7');
                    $('.interview_attend_status').addClass('col-lg-12');
                    $('.required_assessment').css('display', 'none');
                    $('.required_availability').css('display', 'none');
                    $('.required_interview').css('display', 'none');
                }
            });
        });
        //secondary_interview_candidate_status add class remove class
        $(document).ready(function() {
            $('#secondary_interview_candidate_status').on('change', function() {
                if ($(this).val() == "Shortlisted") {
                    $('.secondary_interview_status').removeClass('col-lg-12');
                    $('.secondary_interview_status').addClass('col-lg-7');
                    $('.secondary_interview_type').css('display', 'inline-block');
                    $('.secondary_documentation').css('display', 'none');
                    $('.secondary_offered').css('display', 'none');
                }
                if ($(this).val() == "Selected") {
                    $('.secondary_interview_status').removeClass('col-lg-12');
                    $('.secondary_interview_status').addClass('col-lg-7');
                    $('.secondary_documentation').css('display', 'inline-block');
                    $('.secondary_interview_type').css('display', 'none');
                    $('.secondary_offered').css('display', 'none');
                }
                if ($(this).val() == "Offered") {
                    $('.secondary_interview_status').removeClass('col-lg-12');
                    $('.secondary_interview_status').addClass('col-lg-7');
                    $('.secondary_offered').css('display', 'inline-block');
                    $('.secondary_documentation').css('display', 'none');
                    $('.secondary_interview_type').css('display', 'none');
                }
                if ($(this).val() == "Select_status" || $(this).val() == "Result Awaited" || $(this)
                    .val() == "Interview Cleared" || $(this).val() == "Interview Rejected" || $(this)
                .val() ==
                    "Not Interested") {
                    $('.secondary_interview_status').removeClass('col-lg-7');
                    $('.secondary_interview_status').addClass('col-lg-12');
                    $('.secondary_offered').css('display', 'none');
                    $('.secondary_documentation').css('display', 'none');
                    $('.secondary_interview_type').css('display', 'none');
                }


            });
        });
        //specific slots
        $("#specific_slots").on("click", function() {
            $("#coming_soon_field").toggle(300);
        });
        //assessment_status
        $("#assessment_status").on('change', function() {
            var assessmentfield = $('#assessment_status').val();
            if (assessmentfield == "Test Initiated") {
                $("#initiated_assessment_date").show(300);
                $("#completed_assessment_date").hide(300);
            }
            if (assessmentfield == "Test Completed" || assessmentfield == "Test passed" || assessmentfield ==
                "Test Failed") {
                $("#initiated_assessment_date").hide(300);
                $("#completed_assessment_date").show(300);
            }
        })

        //update candidate status
        $("#update_candidate_status").on("change", function() {
            var updatecandidatestatus = $("#update_candidate_status").val();
            if (updatecandidatestatus == "Reschedule Interview") {
                $("#required_interview").show(300);
                $("#interview_candidate_status_online").hide();
                $("#interview_candidate_status_offline").hide();
                $("#interview_appeared_attend").hide();
                $("#required_availability").hide();
                $("#required_assessment").hide();
                $("#initiated_assessment_date").hide();
                $("#completed_assessment_date").hide();
                $("#coming_soon_field").hide();
            }
            if (updatecandidatestatus == "Interview Appeared") {
                $("#interview_appeared_attend").show(300);
                $("#required_interview").hide();
                $("#interview_candidate_status_online").hide();
                $("#interview_candidate_status_offline").hide();
                $("#required_availability").hide();
                $("#required_assessment").hide();
                $("#initiated_assessment_date").hide();
                $("#completed_assessment_date").hide();
                $("#coming_soon_field").hide();
            }
            if (updatecandidatestatus == "Availability Required") {
                $("#interview_appeared_attend").hide();
                $("#required_interview").hide();
                $("#interview_candidate_status_online").hide();
                $("#interview_candidate_status_offline").hide();
                $("#required_availability").show(300);
                $("#required_assessment").hide();
                $("#initiated_assessment_date").hide();
                $("#completed_assessment_date").hide();
                $("#coming_soon_field").hide();
            }
            if (updatecandidatestatus == "Schedule Pending") {
                $("#interview_appeared_attend").hide();
                $("#required_interview").hide();
                $("#interview_candidate_status_online").hide();
                $("#interview_candidate_status_offline").hide();
                $("#required_availability").show(300);
                $("#required_assessment").hide();
                $("#initiated_assessment_date").hide();
                $("#completed_assessment_date").hide();
                $("#coming_soon_field").hide();
            }
            if (updatecandidatestatus == "Assessments") {
                $("#interview_appeared_attend").hide();
                $("#required_interview").hide();
                $("#interview_candidate_status_online").hide();
                $("#interview_candidate_status_offline").hide();
                $("#required_availability").hide();
                $("#required_assessment").show(300);
                $("#initiated_assessment_date").hide();
                $("#completed_assessment_date").hide();
                $("#coming_soon_field").hide();
            }
            if (updatecandidatestatus == "Update Information" || updatecandidatestatus == "No Show" ||
                updatecandidatestatus == "Did Not Attented" || updatecandidatestatus == "On Hold") {
                $("#interview_appeared_attend").hide();
                $("#required_interview").hide();
                $("#interview_candidate_status_online").hide();
                $("#interview_candidate_status_offline").hide();
                $("#required_availability").hide();
                $("#required_assessment").hide();
                $("#initiated_assessment_date").hide();
                $("#completed_assessment_date").hide();
                $("#coming_soon_field").hide();
            }
        });

        //interview_candidate_status
        $("#interview_candidate_status").on("change", function() {
            var updatecandidateinterviewstatus = $("#interview_candidate_status").val();
            if (updatecandidateinterviewstatus == "Online") {
                $("#interview_candidate_status_online").show(300);
                $("#interview_candidate_status_offline").hide();

            }
            if (updatecandidateinterviewstatus == "Offline") {
                $("#interview_candidate_status_offline").show(300);
                $("#interview_candidate_status_online").hide();

            }
        });

        //secondary_interview_candidate_status
        $("#secondary_interview_candidate_status").on("change", function() {
            var secondaryinterviewcandidatestatus = $("#secondary_interview_candidate_status").val();
            if (secondaryinterviewcandidatestatus == "Select_status" || secondaryinterviewcandidatestatus ==
                "Result Awaited" || secondaryinterviewcandidatestatus == "Interview Cleared") {
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $(".secondary_documentation").hide();
                $("#secondary_documentation_offer").hide();
                $(".secondary_offered").hide();
                $("#secondary_offered_released").hide();
            }
            if (secondaryinterviewcandidatestatus == "Shortlisted") {
                $(".secondary_interview_type").show(300);
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $(".secondary_documentation").hide();
                $("#secondary_documentation_offer").hide();
                $(".secondary_offered").hide();
                $("#secondary_offered_released").hide();
            }
            if (secondaryinterviewcandidatestatus == "Selected") {
                $(".secondary_documentation").show(300);
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $("#secondary_documentation_offer").hide();
                $(".secondary_offered").hide();
                $("#secondary_offered_released").hide();
            }
            if (secondaryinterviewcandidatestatus == "Offered") {
                $(".secondary_offered").show(300);
                $(".secondary_documentation").hide();
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $("#secondary_documentation_offer").hide();
                $("#secondary_offered_released").hide();
            }
            if (secondaryinterviewcandidatestatus == "Interview Rejected" || secondaryinterviewcandidatestatus ==
                "Not Interested") {
                $(".secondary_offered").hide();
                $(".secondary_documentation").hide();
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $("#secondary_documentation_offer").hide();
                $("#secondary_offered_released").hide();
            }
        });

        //interview_candidate_type
        $("#interview_candidate_type").on("change", function() {
            var secondaryinterviewcandidatetype = $("#interview_candidate_type").val();
            if (secondaryinterviewcandidatetype == "Online_status") {
                $("#interview_candidate_status_online_status").show(300);
                $("#interview_candidate_status_offline_status").hide();
            }
            if (secondaryinterviewcandidatetype == "Offline_status") {
                $("#interview_candidate_status_offline_status").show(300);
                $("#interview_candidate_status_online_status").hide();
            }
        });
        //documentation_candidate_type
        $("#documentation_candidate_type").on("change", function() {
            var secondarydocumentationtype = $("#documentation_candidate_type").val();
            if (secondarydocumentationtype == "For Offer") {
                $("#secondary_documentation_offer").show(300);
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $("#secondary_offered_released").hide();
            }
            if (secondarydocumentationtype == "For Documentation") {
                $("#secondary_documentation_offer").hide();
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
                $("#secondary_offered_released").hide();
            }

        });
        //offered_released_candidate_type
        $("#offered_released_candidate_type").on("change", function() {
            var secondaryofferedreleasedtype = $("#offered_released_candidate_type").val();
            if (secondaryofferedreleasedtype == "Offer Released" || secondaryofferedreleasedtype ==
                "Offer Accepted") {
                $("#secondary_offered_released").show(300);
                $("#secondary_documentation_offer").hide();
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
            }

            if (secondaryofferedreleasedtype == "Offer Declined") {
                $("#secondary_offered_released").hide();
                $("#secondary_documentation_offer").hide();
                $(".secondary_interview_type").hide();
                $("#interview_candidate_status_online_status").hide();
                $("#interview_candidate_status_offline_status").hide();
            }

        });
    </script>


    {{-- Akash JS  --}}
    <script>
        var quill = new Quill('#bubble_editor', {
            theme: 'bubble',
            placeholder: 'This message is visible to the Client and Account Manager. Please DO NOT use unprofessional language. For any Escalations or urgent queries, please contact your Account Manager ({{ $user_detials->email }} / {{ $user_detials->phone }})'
        });
        quill.on('text-change', function(delta, source) {
            var justHtml = quill.root.innerHTML;
            $('#notes').val(justHtml);
        });
        $('#test_initiated').flatpickr({
            minDate: "today"
        });
        $('#test_initiated').change(function(e) {
            $(e.target).parents('.input-group').find('input[type="radio"]').each(function(index, element) {
                element.checked = false
            });
        });
        $('#interview_sch_offline').flatpickr({
            minDate: "today"
        });
        $('#interview_sch_offline').change(function(e) {
            $(e.target).parents('.input-group').find('input[type="radio"]').each(function(index, element) {
                element.checked = false
            });
        });
        $('#interview_sch_online').flatpickr({
            minDate: "today"
        });
        $('#interview_sch_online').change(function(e) {
            $(e.target).parents('.input-group').find('input[type="radio"]').each(function(index, element) {
                element.checked = false
            });
        });
        $('#interview_appeared1').flatpickr({
            maxDate: "today"
        });
        $('#interview_appeared1').change(function(e) {
            $(e.target).parents('.input-group').find('input[type="radio"]').each(function(index, element) {
                element.checked = false
            });
        });
        $('#test_appeared1').flatpickr({
            maxDate: "today"
        });
        $('#test_initiated1').change(function(e) {
            $(e.target).parents('.input-group').find('input[type="radio"]').each(function(index, element) {
                element.checked = false
            });
        });
        $('#offered_exp_doj').flatpickr({});
        $('#offer_rel_exp_doj').flatpickr({
            minDate:"today"
        });
        
    </script>



</body>


</html>

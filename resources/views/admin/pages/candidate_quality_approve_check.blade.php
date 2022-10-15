@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">
            @php
                $job_details = get_job_code_details($job_id);
                $get_job_owner_details = get_owner_details($job_details->job_posted_by_userid);
            @endphp
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="{{asset('assets/images/profile-bg.jpg')}}" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-3 ">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="">
                            <img src="{{ asset('assets/images/companies/amazon.png') }}" alt=""
                                class="avatar-sm rounded-3">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col">
                        <div class="">
                            <h3 class="text-white mb-1 fs-15">{{ $job_details->job_title }} </h3>
                            <p class="text-white-75 "> <i
                                    class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{ $job_details->job_company_name }}<i
                                    class="ri-map-pin-user-line ms-2 me-1 text-white-75 fs-16 align-middle"></i>{{ $job_details->job_location }}
                            </p>

                        </div>
                    </div>
                    {{-- <div class="col text-end ">
                        <div class="d-flex align-items-center">
                            <div class="p-1 start-29 top-100 position-absolute translate-middle">
                                <div class="d-flex justify-content-between align-items-center">

                                    <div class="clock"></div>


                                </div>
                            </div>
                            <div class="position-absolute start-96 top-45 translate-middle">
                                <span class="text-white fs-40 c-pointer" onclick="history.back()"><i
                                        class="ri-close-line"></i></span>

                            </div>
                        </div>

                    </div> --}}

                </div>
            </div>
            <div class="row ">
                <div class="col-lg-7">
                    <div class="card">
                        @if ($get_applicant_details->candidate_resume == '' || $get_applicant_details->candidate_resume == null)
                            <div class="card-body">


                                <div class="text-center">
                                    <img src="{{ asset('assets/robot gif/1.gif') }}" alt="" class="img-fluid "
                                        width="50%">
                                    <h2 class="text-primary font-w-500 mb-4">Resume Not found</h2>
                                    <input type="file" class="filepond" name="filepond" multiple
                                        data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                </div>


                            </div>
                        @else
                            <div class="card-body">
                                @if (!strpos($get_applicant_details->candidate_resume, '.pdf'))
                                    <iframe
                                        src="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('candidate_resumes') }}/{{ $get_applicant_details->candidate_resume }}"
                                        width="100%" height="775px"></iframe>
                                @else
                                    <iframe
                                        src="{{ asset('candidate_resumes') }}/{{ $get_applicant_details->candidate_resume }}"
                                        width="100%" height="775px" ></iframe>
                                @endif
                                <div class=" d-flex align-items-center justify-content-center mt-2">
                                    <div class="bd-highlight me-1">
                                        <button type="button"
                                            class="btn btn-primary btn-sm waves-effect waves-light"><i class="ri-upload-cloud-2-fill align-bottom me-1"></i>Update Resume</button>
                                    </div>
                                    
                                    <div class="bd-highlight me-1">
                                        <a target="_blank" href="{{asset('candidate_resumes/')}}/{{$get_applicant_details->candidate_resume}}">
                                        <button type="button"
                                            class="btn btn-danger btn-sm waves-effect waves-light"><i class="ri-download-cloud-2-fill align-bottom me-1"></i>Download Resume</button>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        @endif
                    </div>
                    @if ($job_details->question_set_id != '' || $job_details->question_set_id != null)
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"><i
                                        class=" ri-file-copy-line text-muted fs-17 align-middle"></i> Questionnaire</h4>

                            </div><!-- end card header -->

                            <div class="card-body">
                                questionnaire is available at Questionnaire ID {{ $job_details->question_set_id }}
                            </div> <!-- end card body -->

                        </div>
                    @endif
                    @if ($job_details->evaluate_attachment_name1 != '' || $job_details->evaluate_attachment_name2 != '')
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"><i
                                        class=" ri-file-copy-line text-muted fs-17 align-middle"></i>Evaluate Attachment
                                </h4>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div class="row">
                                    @if ($job_details->evaluate_attachment_name1 != '')
                                        <div class="col-md-6">
                                            <div class="border rounded border-dashed p-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                @if (strpos($job_details->evaluate_attachment_1, '.pdf'))
                                                                    <i class="ri-file-excel-2-line"></i>
                                                                @elseif (strpos($job_details->evaluate_attachment_1, '.doc'))

                                                                @elseif (strpos($job_details->evaluate_attachment_1, '.docx'))

                                                                @elseif (strpos($job_details->evaluate_attachment_1, '.xlsx'))

                                                                @elseif (strpos($job_details->evaluate_attachment_1, '.xls'))
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="fs-13 mb-1"><a href="#"
                                                                class="text-body text-truncate d-block">{{ $job_details->evaluate_attachment_name1 }}</a>
                                                        </h5>
                                                        <div>{{ $job_details->evaluate_attachment_1 }}</div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="d-flex gap-1">
                                                            <a href="{{ asset('evaluate_attachment') }}/{{ $job_details->evaluate_attachment_1 }}"
                                                                target="_blank"><button type="button" disabled
                                                                    class="btn btn-icon text-muted btn-sm fs-18"><i
                                                                        class="ri-download-2-line"></i></button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($job_details->evaluate_attachment_name2 != '')
                                        <div class="col-md-6">
                                            <div class="border rounded border-dashed p-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                <i class="ri-file-excel-2-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="fs-13 mb-1"><a href="#"
                                                                class="text-body text-truncate d-block">{{ $job_details->evaluate_attachment_name1 }}</a>
                                                        </h5>
                                                        <div>{{ $job_details->evaluate_attachment_1 }}</div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="d-flex gap-1">
                                                            <button type="button" disabled
                                                                class="btn btn-icon text-muted btn-sm fs-18"><i
                                                                    class="ri-download-2-line"></i></button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    @endif
                    {{-- candidate history {{ $job_details->job_title }} --}}
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"><i
                                    class=" ri-file-copy-line text-muted fs-17 align-middle"></i> Activity
                                ({{ count($get_history) }})</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Recent<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Recent</a>
                                        <a class="dropdown-item" href="#">Top Rated</a>
                                        <a class="dropdown-item" href="#">Previous</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">

                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content pe-2" style="height:auto;max-height:200px;">
                                    @foreach ($get_history as $candidate_history)
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                @if (Auth::user()->profile_image == '')
                                                    <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt=""
                                                        class="avatar-xs rounded-circle">
                                                @else
                                                    <img src="{{ asset('profile_image') }}/{{ Auth::user()->profile_image }}"
                                                        alt="" class="avatar-xs rounded-circle">
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3 align-items-center">
                                                <h5 class="fs-13">{{ $candidate_history->user_name }} <small
                                                        class="text-muted ms-2"><i
                                                            class="ri-time-line text-muted align-middle fs-13"></i>
                                                        {{ date('d-M-Y', strtotime($candidate_history->date)) }}
                                                        {{ $candidate_history->time }}</small></h5>
                                                <p class="text-muted fs-11">{{ $candidate_history->activity_notes }} .</p>

                                            </div>
                                            <div class="flex-grow-1 ">
                                                <p class="text-end text-muted fs-11">
                                                    {{ $candidate_history->activity_type }}</p>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>

                            </div>


                        </div> <!-- end card body -->

                    </div>
                </div>
                <div class="col-lg-5">
                    <div id="screnning_form">
                        <div class="card mb-2">
                            <div class="card-body">
                                <form class="form-horizontal" action="{{ route('candidate_quality_approve_check_post') }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="job_id" id="job_id"
                                        value="{{ $job_details->job_id }}">
                                    <input type="hidden" name="screen_id" id="screen_id"
                                        value="{{ $get_applicant_details->screen_id }}">
                                    <input type="hidden" name="connect_id" value="{{ $connect_id }}">
                                    <div class="mb-2">
                                        <label for="inputEmail3" class="form-label fs-11"> Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control " id=" " name="candidate_name"
                                            value="{{ $get_applicant_details->candidate_name }}" >

                                    </div>
                                    <div class=" mb-2">
                                        <label for="inputEmail3" class="form-label fs-11"> Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control " id="candidate_email" 
                                            name="candidate_email" readonly value="{{ $get_applicant_details->candidate_email }}">

                                    </div>
                                    <div class=" mb-2">
                                        <label for="inputEmail3" class="form-label fs-11">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <div class="row">
                                            <div class="col-lg-9 pe-0">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class=" ri-phone-line fs-14 text-primary"></i></span>
                                                    <input type="text" class="form-control" placeholder="Phone Number" 
                                                        aria-label="Phone Number" maxlength="10"
                                                        aria-describedby="basic-addon1" name="candidate_phone"
                                                        value="{{ $get_applicant_details->candidate_phone }}">
                                                </div>

                                            </div>
                                            <div class="col-lg-3 text-lg-end ps-0">
                                                <button type="button" id="alt_num"
                                                    class="btn btn-primary btn-xs waves-effect waves-light">Alt
                                                    Num</button>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="mb-2" id="alt_num_field" style="display:none">
                                        <label for="inputEmail3" class="form-label fs-11">Alternate Num.</label>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class=" ri-phone-line fs-14 text-primary"></i></span>
                                                    <input type="text" class="form-control" placeholder="Phone Number"
                                                        aria-label="Phone Number" maxlength="10"
                                                        aria-describedby="basic-addon1"  name="candidate_phone_alt1">
                                                </div>

                                            </div>

                                            <div class="col-12 col-xl-12 mt-2">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class=" ri-phone-line fs-14 text-primary"></i></span>
                                                    <input type="text" class="form-control" placeholder="Phone Number"
                                                        aria-label="Phone Number" maxlength="10"
                                                        aria-describedby="basic-addon1"  name="candidate_phone_alt2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label for="inputEmail3" class="form-label fs-11">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1"><i
                                                    class="ri-calendar-2-line fs-14 text-primary"></i></span>
                                            <input type="text" class="form-control flatpickr-input active"
                                                data-provider="flatpickr" placeholder="DD-MM-YYYY"
                                                data-date-format="d M Y" aria-describedby="basic-addon1" 
                                                name="candidate_dob" value="{{ $get_applicant_details->candidate_dob }}">
                                        </div>
                                    </div>
                                    <div class="mb-2 ">


                                        <label for="validationDefault01" class="form-label fs-11 ">Gender <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group mb-2">

                                            <div class="btn-group btn-group-sm d-flex " role="group"
                                                aria-label="Horizontal radio toggle button group">
                                                <input type="radio" class="btn-check " name="candidate_gender"
                                                    id="vbtn-radio1" value="Male"
                                                    {{ $get_applicant_details->candidate_gender == 'Male' ? 'checked' : '' }} >
                                                <label class="j_priority btn btn-outline-primary p-2" for="vbtn-radio1"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="Male"><i
                                                        class="ri-men-line fs-14"></i></label>
                                                <input type="radio" class="btn-check " name="candidate_gender"
                                                    id="vbtn-radio2" value="Female"
                                                    {{ $get_applicant_details->candidate_gender == 'Female' ? 'checked' : '' }} >
                                                <label class="j_priority btn btn-outline-primary p-2" for="vbtn-radio2"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="Female"><i
                                                        class="ri-women-line fs-14"></i></label>
                                                <input type="radio" class="btn-check " name="candidate_gender"
                                                    id="vbtn-radio3" value="TransGender"
                                                    {{ $get_applicant_details->candidate_gender == 'TransGender' ? 'checked' : '' }} >
                                                <label class="j_priority btn btn-outline-primary p-2" for="vbtn-radio3"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title=""
                                                    data-bs-original-title="TransGender"><i
                                                        class="ri-travesti-line fs-14"></i></label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 mb-2">

                                            <label for="example-date" class="form-label fs-11">Qualification <span
                                                    class="text-danger">*</span></label>
                                            @php
                                                $degrees = get_all_degree();
                                            @endphp
                                            <select style="z-index: 9999" class="form-select" 
                                                id="choices-single-no-search" name="qualification[]" data-choices
                                                data-choices-search-true>
                                                <option value="" disabled>Select</option>
                                                @foreach ($degrees as $degree)
                                                    <option value="{{ $degree->degree_name }}"
                                                        {{ $get_applicant_details->candidate_high_qual == $degree->degree_name ? 'selected' : '' }}>
                                                        {{ $degree->degree_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-12 mb-2">

                                            <label for="example-date" class="form-label fs-11">Specialization <span
                                                    class="text-danger">*</span></label>
                                            @php
                                                $specializations = get_all_specialization();
                                            @endphp
                                            <select class="form-select" id="choices-single-no-search" 
                                                name="specialization[]" data-choices data-choices-search-true
                                                >
                                                <option value="" disabled>Select</option>
                                                @foreach ($specializations as $specialization)
                                                    <option value="{{ $specialization->degree_name }}"
                                                        {{ $get_applicant_details->candidate_specialization == $specialization->degree_name ? 'selected' : '' }}>
                                                        {{ $specialization->degree_name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="col lg-12" id="add_details_field" style="display:none">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-2">
                                                        <label for="example-date" class="form-label fs-11">Course Type <span class="text-muted fs-10">(Optional)</span>
                                                        </label>
                                                        <div class="form-group ">

                                                            <div class="btn-group btn-group-sm d-flex " role="group"
                                                                aria-label="Horizontal radio toggle button group">
                                                                <input type="radio" class="btn-check "
                                                                    name="course_type[]" id="cvbtn-radio1"
                                                                    value="Full Time"
                                                                    {{ $get_applicant_details->candidate_course_type == 'Full Time' ? 'checked' : '' }} >
                                                                <label class="j_priority btn btn-outline-primary p-2"
                                                                    for="cvbtn-radio1">Full Time</label>
                                                                <input type="radio" class="btn-check "
                                                                    name="course_type[]" id="cvbtn-radio2"
                                                                    value="Part Time"
                                                                    {{ $get_applicant_details->candidate_course_type == 'Part Time' ? 'checked' : '' }} >
                                                                <label class="j_priority btn btn-outline-primary p-2"
                                                                    for="cvbtn-radio2">Part Time</label>
                                                                <input type="radio" class="btn-check "
                                                                    name="course_type[]" id="cvbtn-radio3"
                                                                    value="Correspondence/Distance Learning"
                                                                    {{ $get_applicant_details->candidate_course_type == 'Correspondence/Distance Learning' ? 'checked' : '' }} >
                                                                <label class="j_priority btn btn-outline-primary p-2"
                                                                    for="cvbtn-radio3">Correspondence/Distance
                                                                    Learning</label>

                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col lg-12">
                                                    <div class="mb-2 ">
                                                        <label for="example-textarea"
                                                            class="form-label fs-11">University/Institute <span class="text-muted fs-10">(Optional)</span></label>
                                                        <input type="text" class="form-control " name="institute[]"
                                                            value={{ $get_applicant_details->candidate_university }} >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <label for="example-date" class="form-label fs-11">Year Of Passing <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="choices-single-no-search" 
                                                name="passing_year[]" data-choices data-choices-sorting-true
                                                data-choices-search-false>
                                                <option value="">Select</option>
                                                @php
                                                    $passyears = range(date('Y') - 40, date('Y') + 4);
                                                @endphp

                                                @foreach ($passyears as $value)
                                                    <option value="{{ $value }}"
                                                        {{ $get_applicant_details->candidate_passing_year == $value ? 'selected' : '' }}>
                                                        {{ $value }}</option>
                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-lg-6 mb-2">
                                            <label for="example-date" class="form-label fs-11">Percentage <span class="text-muted fs-10">(Optional)</span></label>
                                            <input class="form-control" id="example" type="text"
                                                placeholder="Percentage %" name="percentage[]" 
                                                value={{ $get_applicant_details->candidate_percentage }}>

                                        </div>
                                        <div class="col-lg-12 text-lg-end mb-0 ">
                                            <button type="button" class="btn btn-light btn-border btn-sm " 
                                                id="add_details" data-bs-toggle="tooltip" title="Add Details"><i
                                                    class="ri-add-fill align-middle"></i> Add Details</button>
                                            <button type="button" class="btn btn-light btn-border btn-sm " 
                                                id="add_more" data-bs-toggle="tooltip" title="Add More"
                                                style="display:none"><i class="ri-add-fill align-middle"></i> Add
                                                More</button>

                                        </div>


                                        <div class="mb-2 ">
                                            <label for="validationDefault01" class="form-label fs-11 ">Employement <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-group">

                                                <div class="btn-group btn-group-sm d-flex " role="group"
                                                    aria-label="Horizontal radio toggle button group">
                                                    <input type="radio" class="btn-check " name="job_priority"
                                                        id="fresher_check" value="Fresher">
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        for="fresher_check">Fresher</label>
                                                    <input type="radio" class="btn-check " name="job_priority"
                                                        id="experience_check" value="Experience">
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        for="experience_check">Experience</label>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-12 mb-2 " id="fresher_details" style="display:none">
                                            <label for="validationDefault01" class="form-label fs-11 ">Current Location
                                                <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control " placeholder="Location" 
                                                name="candidate_current_location">
                                        </div>
                                        <div id="experience_details" style="display:none">

                                            <div class="col-lg-12 ">
                                                <div class="mb-2">
                                                    <label for="example-date" class="form-label fs-11">Employeer <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" id="employeer_id" type="text"
                                                        name="employer_name[]" placeholder="" >
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-0">
                                                <div class="form-group " id="empl_checkbox" style="display:none">

                                                    <div class="btn-group btn-group-sm d-flex " role="group"
                                                        aria-label="Horizontal radio toggle button group">
                                                        <input type="radio" class="btn-check " name="employee_type[]"
                                                            id="empl_btn1" value="Current Employer">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            for="empl_btn1">Current Employer</label>
                                                        <input type="radio" class="btn-check " name="employee_type[]"
                                                            id="empl_btn2" value="Previous Employer">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            for="empl_btn2">Previous Employer</label>
                                                        <input type="radio" class="btn-check " name="employee_type[]"
                                                            id="empl_btn3" value="Other Employer">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            for="empl_btn3">Other Employer</label>

                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-2">
                                                <label for="example-date" class="form-label fs-11">Designation <span
                                                        class="text-danger">*</span></label>
                                                <input class="form-control" type="text" placeholder=""
                                                    name="designation[]" >
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 mb-2 pe-2">
                                                    <label for="example-date" class="form-label fs-11">Duration From <span
                                                            class="text-danger">*</span></label>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <select class="form-select" name="duration_month_from[]" >
                                                                <option value="" selected>Select</option>
                                                                <?php $arr_total_exp_to = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                                        foreach($arr_total_exp_to as $val) { ?>
                                                                <option value="<?= $val ?>"><?= $val ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select class="form-select" name="duration_year_from[]" >
                                                                <option value="" selected>Select</option>
                                                                <?php
                                                                $years = range ( date( 'Y' ), date( 'Y') - 40 );
                                                foreach ($years as $value) {
                                                    ?>
                                                                <option value="<?= $value ?>"><?= $value ?></option>
                                                                <?php
                                                }
                                                        ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2 ps-0">
                                                    <div id="duration_to" style="display:none">
                                                        <label for="example-date" class="form-label fs-11">To <span
                                                                class="text-danger">*</span></label>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <select  class="form-select" name="duration_month_to[]">
                                                                    <option value="" selected>Select</option>
                                                                    <?php $arr_total_exp_to = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                                                foreach($arr_total_exp_to as $val) { ?>
                                                                    <option value="<?= $val ?>"><?= $val ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <select class="form-select" name="duration_year_to[]">
                                                                    <option value="" selected>Year</option>
                                                                    <?php
                                                                            $years = range ( date( 'Y' ), date( 'Y') - 40 );
                                                            foreach ($years as $value) {
                                                                ?>
                                                                    <option value="<?= $value ?>"><?= $value ?></option>
                                                                    <?php
                                                            }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-2" id="notice_period" style="display:none">
                                                        <label for="example-date" class="form-label fs-11">Notice Period
                                                            <span class="text-danger">*</span></label>
                                                        <select class="form-select form-select-notice"
                                                            id="choices-single-no-search" name="notice_period[]" 
                                                            data-choices data-choices-search-false>
                                                            <option value="15 Days or Less" selected>15 Days or Less
                                                            </option>
                                                            <?php $arr_total_exp_to = array('Serving Notice','1 Months','2 Months','3 Months','6 Months','Above 6 Months');
                                                        foreach($arr_total_exp_to as $val) { ?>
                                                            <option value="<?php echo $val; ?>"><?php echo $val; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>

                                                    </div>

                                                </div>
                                            </div>

                                            <div id="serving_notice" style="display:none">
                                                <div class="row">
                                                    <div class="col-lg-6 mt-2">
                                                        <label for="example-date" class="form-label fs-12">Please Mention
                                                            Last Working Day </label>

                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="input-group">
                                                            <input type="text" 
                                                                class="form-control flatpickr-input active"
                                                                data-provider="flatpickr" placeholder="DD-MM-YYYY"
                                                                data-date-format="d M Y" aria-label="Phone Number"
                                                                maxlength="10" aria-describedby="basic-addon1">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="ri-calendar-2-line fs-15 text-primary"></i></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <label for="inputEmail3" class="form-label fs-11">Overall Years Of
                                                            Experience <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control " id=" "
                                                            placeholder=" " name="overall_years_experience" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-2">
                                                        <label for="inputEmail3" class="form-label fs-11">No. of Companies
                                                            Worked With <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control " id=" "
                                                            placeholder=" " name="no_of_company_work_with" >
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label for="inputEmail3" class="form-label fs-11">Present CTC <span class="text-muted fs-10">(Per Annum)</span> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control " id=" "
                                                        placeholder=" " name="candidate_present_ctc" >
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label for="inputEmail3" class="form-label fs-11">Expected CTC <span class="text-muted fs-10">(Per Annum)</span> <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control " id=" "
                                                        placeholder=" " name="candidate_expected_ctc" >
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mb-2">
                                                <label for="validationDefault01" class="form-label fs-11 ">Current Job
                                                    Location <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control " placeholder="Location"
                                                    name="candidate_current_job_location" >
                                            </div>
                                            <div class="col-lg-12 text-lg-end mb-2 ">
                                                <button  type="button" class="btn btn-light btn-border btn-sm "
                                                    data-bs-toggle="tooltip" title="Add More"><i
                                                        class="ri-add-fill align-middle"></i> Add More</button>
                                            </div>

                                        </div>
                                        <div class="mb-2">
                                            <label for="inputEmail3" class="form-label fs-11">Pan Number<span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control " id=" " name="candidate_pan" 
                                                value="">
    
                                        </div>
                                        <div class="mb-2">
                                            <label for="example-date" class="form-label fs-11" >Skill Known <span class="text-muted fs-10">(Optional)</span></label>
                                            <input class="form-control " id="choices-text-unique-values" data-choices
                                                data-choices-limit="8" data-choices-text-unique-true 
                                                data-choices-removeItem type="text" name="skillset[]" value="{{$get_applicant_details->candidate_skillset}}"
                                                data-placeholder="E.g. Html, Css, Java, Php, Etc." />
                                        </div>
                                        <div class="mb-2">
                                            <label for="example-date" class="form-label fs-11">Language Known <span class="text-muted fs-10">(Optional)</span></label>
                                            <input class="form-control " id="choices-text-unique-values" data-choices
                                                data-choices-limit="8" data-choices-text-unique-true 
                                                data-choices-removeItem type="text" name="language[]" value="{{$get_applicant_details->candidate_language}}"
                                                data-placeholder="E.g. English, Hindi, Etc" />
                                        </div>
                                        <div class="mb-2">
                                            <label for="example-date" class="form-label fs-11">Affrimative Action <span class="text-muted fs-10">(Optional)</span>
                                            </label>
                                            <div class="form-group mb-2">

                                                <div class="btn-group btn-group-sm d-flex " role="group"
                                                    aria-label="Horizontal radio toggle button group">
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_affrimative_action" id="abtn-radio1"
                                                        value="SC"  {{ $get_applicant_details->candidate_affrimative_action == 'SC' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Schedule Caste"
                                                        for="abtn-radio1">SC</label>
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_affrimative_action" id="abtn-radio2"
                                                        value="ST"  {{ $get_applicant_details->candidate_affrimative_action == 'ST' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Schedule Tribe"
                                                        for="abtn-radio2">ST</label>
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_affrimative_action" id="abtn-radio3"
                                                        value="OBC"  {{ $get_applicant_details->candidate_affrimative_action == 'OBC' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Other Backward Classes"
                                                        for="abtn-radio3">OBC</label>
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_affrimative_action" id="abtn-radio4"
                                                        value="GENERAL"  {{ $get_applicant_details->candidate_affrimative_action == 'GENERAL' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="General"
                                                        for="abtn-radio4">GENERAL</label>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label for="example-date" class="form-label fs-11">Differently Abled <span class="text-muted fs-10">(Optional)</span>
                                            </label>
                                            <div class="form-group mb-2">

                                                <div class="btn-group btn-group-sm d-flex " role="group"
                                                    aria-label="Horizontal radio toggle button group">
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_differently_abled" id="dbtn-radio1"
                                                        value="Development" {{ $get_applicant_details->candidate_differently_abled == 'Development' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Developmentally Disabled"
                                                        for="dbtn-radio1">Development</label>
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_differently_abled" id="dbtn-radio2"
                                                        value="Mental" {{ $get_applicant_details->candidate_differently_abled == 'Mental' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Mentally Disabled"
                                                        for="dbtn-radio2">Mental</label>
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_differently_abled" id="dbtn-radio3"
                                                        value="Physical" {{ $get_applicant_details->candidate_differently_abled == 'Physical' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Physically Disabled"
                                                        for="dbtn-radio3">Physical</label>
                                                    <input type="radio" class="btn-check "
                                                        name="candidate_differently_abled" id="dbtn-radio"
                                                        value="NA" {{ $get_applicant_details->candidate_differently_abled == 'NA' ? 'checked' : '' }} >
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        data-bs-toggle="tooltip" title="Not Applicable"
                                                        for="dbtn-radio">NA</label>


                                                </div>


                                            </div>

                                        </div>
                                        
                                        <div class="col-lg-4 mt-2">
                                            <label for="inputEmail3" class="form-label fs-11">Applied Earlier <span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-lg-8 text-lg-end mt-1">
                                            <div class="form-group ">

                                                <div class="btn-group btn-group-sm d-flex " role="group"
                                                    aria-label="Horizontal radio toggle button group">
                                                    <input  type="radio" class="btn-check " name="job_priority"
                                                        id="applied_yes" value="Yes">
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        for="applied_yes">Yes</label>
                                                    <input  type="radio" class="btn-check " name="job_priority"
                                                        id="applied_no" value="No" checked>
                                                    <label class="j_priority btn btn-outline-primary p-2"
                                                        for="applied_no">No</label>

                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-lg-12 mb-2" id="show_status" style="display:none;">
                                            <div class="row">
                                                <div class="col-6 col-xl-6">
                                                    <select class="form-select" id="example-select"
                                                        name="applied status" >
                                                        <option value="" selected disabled>Applied Status</option>
                                                        <option value="Already Applied">Already Applied</option>
                                                        <option value="Already Attended">Already Attended</option>

                                                    </select>
                                                </div>
                                                <div class="col-6 col-xl-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control flatpickr-input active"
                                                            data-provider="flatpickr" placeholder="DD-MM-YYYY"
                                                            data-date-format="d M Y" aria-label="Phone Number"
                                                            maxlength="10" aria-describedby="basic-addon1" 
                                                            name="candidate_applied_date">
                                                        <span class="input-group-text" id="basic-addon1"><i
                                                                class="ri-calendar-2-line fs-13 text-primary"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="mb-2">
                                            <label for="inputEmail3" class="form-label fs-11">Update Resume <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control " id=" " placeholder=" ">
                                        </div> --}}
                                        {{-- <div class="mb-2">
                                            <label for="inputEmail3" class="form-label fs-11">Call Status <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-select" id="example_select_field" 
                                                onchange="showallfields()" required name="screen_status">
                                                <option value="" selected>Select</option>
                                                <option value="Submit To Quality">Submit To Quality</option>
                                                <option value="Submit To Quality For Other Available Jobs">Submit To
                                                    Quality For Other Available
                                                    Jobs</option>
                                                     <option value="Interested But Cv Update Required">Interested But Cv Update
                                                    Required
                                                </option>
                                                <option value="Interested But Cv Pending">Interested But Cv Pending
                                                </option>
                                                <option value="Interested Confirmation Awaited">Interested Confirmation
                                                    Awaited
                                                </option>
                                                <option value="Call Later">Call later</option>
                                                <option value="Received By Others">Received By Others</option>
                                                <option value="Wrong No">Wrong No</option>
                                                <option value="Profile Incorrect">Profile Incorrect</option>
                                                <option value="Not-Interested">Not Interested </option>
                                            </select>
                                        </div> --}}
                                    </div>{{-- 'Sourced', 'Call Later', 'Submitted', 'Recommendation', 'Not Reachable', 'Call Wait', 'Switch Off', 'No Response', 'Dropped', 'Not-Interested', 'Profile Incorrect', 'Wrong No', 'Received By Others', 'Not In Service' --}}





                                    {{-- <div id="show_interestedfields" class="d-none">
                                        <div class="mb-2 d-none" id="other_jobs" >
                                            <label for="inputEmail3" class="form-label fs-11">Select Job </label>
                                            @php
                                                $get_all_jobs = get_all_job($job_details->job_id);
                                            @endphp
                                            <select class="form-select" id="example-select" name="other_job_transfer">
                                                <option value="" selected disabled>Select</option>
                                                @foreach ($get_all_jobs as $s_jobs)
                                                    <option value="{{ $s_jobs->job_id }}">{{ $s_jobs->job_title }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="inputEmail3" class="form-label fs-11">Reason of job change
                                                ?</label>
                                            <textarea class="form-control " rows="2" placeholder=" " id="submit_quality1"></textarea>
                                        </div>
                                        <div class="mb-2">
                                            <label for="inputEmail3" class="form-label fs-11">Why are you referring this
                                                candidate ?</label>
                                            <textarea class="form-control fs-11" rows="4" id="submit_quality2"
                                                placeholder="This message is visible to the Client and Account Manager. Please DO NOT use unprofessional language. For any Escalations or urgent queries, please contact your Account Manager {{ $get_job_owner_details->name }}({{ $get_job_owner_details->email }} / 8102727276)"></textarea>
                                        </div>
                                    </div>
                                    <div id="show_received_fields" class="d-none">
                                        <div class="live-preview d-none">
    
                                        </div>
                                        <div class="code-view">

                                            <div class="mb-2">
                                                <div class="row">
                                                    <div class="col-6 col-xl-6">
                                                        <label for="inputEmail3" class="form-label fs-11">Remarks Notes<span
                                                                class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-6 col-xl-6 text-lg-end">
                                                        
                                                            <div class="d-flex flex-row align-items-center justify-content-between ">
                                                                <div class="">
                                                                    <label for="labelInput" class="form-label text-muted fs-10"><span> Any Alterante Number Updated ?</span></label>
                                                                </div>
                                                                <!-- Switch sizes -->
                                                                <div class="form-check form-switch">
                                                                    <input type="checkbox" class="form-check-input" id="customSwitchsizesm" checked="" name="show_salary">
                                                                </div>
                                                            </div>
                                                    </div>
    
                                                </div>
                                                
                                                
    
                                                    <div class="mb-2">
                                                        <label for="inputEmail3" class="form-label fs-11">Refered By<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control " id=" " name="candidate_referby"
                                                            value="">
                                                            <label for="inputEmail3" class="form-label fs-11">New Mobile No<span class="text-danger"> *</span></label>
                                                        <input type="text" class="form-control " id=" " name="candidate_new_number"
                                                            value="">
                
                                                    </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div id="show_call_laterfields" class="d-none">
                                        <div class="mb-2">
                                            <label for="inputEmail3" class="form-label fs-11">Remark Notes <span
                                                    class="text-danger">*</span></label>
                                            <textarea class="form-control " rows="2" placeholder=" " name="remark_notes"></textarea>
                                        </div>
                                    </div> --}}



                                    

                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class=" d-flex align-items-center justify-content-center">
                                    <div class="bd-highlight me-1">
                                        <a href="{{route('applicant_quality_duplicate',['jobid'=>$job_details->job_code,'screenid'=>$get_applicant_details->screen_id])}}">
                                        <button type="button"
                                            class="btn btn-primary btn-sm waves-effect waves-light">Duplicate</button></a>
                                    </div>
                                    <div class="bd-highlight me-1">

                                        <button type="submit" 
                                            class="btn btn-success btn-sm waves-effect waves-light">Approve</button>

                                    </div>
                                    <div class="bd-highlight me-1">
                                        <a href="{{route('applicant_quality_reject',['jobid'=>$job_details->job_code,'screenid'=>$get_applicant_details->screen_id])}}"><button type="button"
                                            class="btn btn-danger btn-sm waves-effect waves-light">Reject</button></a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    @if(count($get_questionnaire)>0)

                    @endif
                    
                    </form>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>

    <!--end row-->
    @include('admin.helper_view.call-candidate-screening.modals.submit_success_modal')
    <!-- Second modal dialog -->
    <div class="modal fade zoomIn" id="secondmodal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <lord-icon src="https://cdn.lordicon.com/zpxybbhl.json" trigger="loop"
                        colors="primary:#405189,secondary:#0ab39c" style="width:150px;height:150px">
                    </lord-icon>
                    <div class="mt-4 pt-3">
                        <h4 class="mb-3">Follow-Up Email</h4>
                        <p class="text-muted mb-4">Hide this modal and show the first with the button below Automatically
                            Send your invitees a follow -Up email.</p>
                        <div class="hstack gap-2 justify-content-center">
                            <!-- Toogle to first dialog, `data-bs-dismiss` attribute can be omitted - clicking on link will close dialog anyway -->
                            <button class="btn btn-soft-danger" data-bs-target="#submit_candidate_success"
                                data-bs-toggle="modal" data-bs-dismiss="modal">Back to
                                First
                            </button>
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/timer/compiled/flipclock.js') }}"></script>
    <script src="{{ asset('signup-assets/js/select2.js') }}"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    
    <script>
        FilePond.registerPlugin(

            // encodes the file as base64 data
            FilePondPluginFileEncode,

            // validates the size of the file
            FilePondPluginFileValidateSize,

            FilePondPluginFileValidateType,

            // corrects mobile image orientation
            FilePondPluginImageExifOrientation,

            // previews dropped images
            FilePondPluginImagePreview
        );
        FilePond.create(document.querySelector('.filepond'), {

        });
    </script>
    <script>
        var clock = $('.clock').FlipClock({
            clockFace: 'MinuteCounter',

        });
        $('#candidate_email').keyup(function(e) {
            $.ajax({
                type: "get",
                url: "{{ URL::to('/verify-candidate-email') }}/" + $('#job_id').val() + "/" + $(
                    '#candidate_email').val() + "/" + $('#screen_id').val(),
                success: function(response) {
                    if (response == "found") {
                        Snackbar.show({
                            text: 'This email id is already associated with this job !',
                            pos: 'bottom-center'
                        });
                        $('#candidate_email').val("");
                    }
                }
            });
        });

        function showallfields() {
            var showallfields = document.getElementById("example_select_field").value;
            if (showallfields == "select_id") {
                $('#show_interestedfields').addClass("d-none");
                $('#show_call_laterfields').addClass("d-none");
                $('#show_received_fields').addClass("d-none");
            }
            if (showallfields == "Submit To Quality") {
                $('#show_interestedfields').removeClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').addClass("d-none");
                $('#show_received_fields').addClass("d-none");
            }
            if (showallfields == "Submit To Quality For Other Available Jobs") {
                $('#show_interestedfields').removeClass("d-none");
                $('#other_jobs').removeClass("d-none");
                $('#show_call_laterfields').addClass("d-none");
                $('#show_received_fields').addClass("d-none");
            }
            if (showallfields == "Interested But Cv Update Required") {
                $('#show_interestedfields').removeClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').addClass("d-none");
                $('#show_received_fields').addClass("d-none");
            }
            if (showallfields == "Interested But Cv Pending") {
                $('#show_interestedfields').removeClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').addClass("d-none");
                $('#show_received_fields').addClass("d-none");
            }
            if (showallfields == "Interested Confirmation Awaited") {
                $('#show_interestedfields').addClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').removeClass("d-none");
                $('#show_received_fields').addClass("d-none");
                $('#show_call_laterfields').find('label').show();
            }
            if (showallfields == "Call Later") {
                $('#show_interestedfields').addClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').removeClass("d-none");
                $('#show_received_fields').addClass("d-none");
                $('#show_call_laterfields').find('label').show();
            }
            // show_received_fields
            if (showallfields == "Received By Others") {
                $('#show_interestedfields').addClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_received_fields').removeClass("d-none");
                $('#show_call_laterfields').removeClass("d-none");
                $('#show_call_laterfields').find('label').hide();
            }
            if (showallfields == "Wrong No") {
                $('#show_interestedfields').addClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').removeClass("d-none");
                $('#show_received_fields').addClass("d-none");
                $('#show_call_laterfields').find('label').show();

            }
            if (showallfields == "Profile Incorrect") {
                $('#show_interestedfields').addClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').removeClass("d-none");
                $('#show_received_fields').addClass("d-none");
                $('#show_call_laterfields').find('label').show();

            }
            if (showallfields == "Not-Interested") {
                $('#show_interestedfields').addClass("d-none");
                $('#other_jobs').addClass("d-none");
                $('#show_call_laterfields').removeClass("d-none");
                $('#show_received_fields').addClass("d-none");
                $('#show_call_laterfields').find('label').show();

            }
        }
        $("#alt_num").on("click", function() {
            $("#alt_num_field").toggle(300);
        })
        $("#experience_check").on("click", function() {

            if ($(this).is(':checked')) {
                $("#experience_details").show(300);
                $("#fresher_details").hide(300);
                $('#submit_quality1').attr('disabled', false);
                $('#submit_quality3').attr('disabled', false);

            }
        })
        $("#fresher_check").on("click", function() {

            if ($(this).is(':checked')) {
                $("#fresher_details").show(300);
                $("#experience_details").hide(300);
                $('#submit_quality1').attr('disabled', true);
                $('#submit_quality3').attr('disabled', true);
            }
        })
        $("#applied_yes").on("click", function() {

            if ($(this).is(':checked')) {
                $("#show_status").show(300);
                // alert("demo");
            } else {
                $("#show_status").hide(300);
            }
        })
        $("#applied_no").on("click", function() {

            if ($(this).is(':checked')) {
                $("#show_status").hide(300);
                // alert("demo");
            } else {
                $("#show_status").show(300);
            }
        })

        //show question and answer
        $("#view_question").on("click", function() {
            if (!($('#example_select_field').val() == "")) {

                $("#screnning_form").hide();
                $('#screnning_question_answer').show(300);
            } else {
                Snackbar.show({
                    text: 'Please Select Call Status To Continue !',
                    pos: 'bottom-center'
                });
            }
        });
        //add details
        $("#add_details").on('click', function() {
            $("#add_details_field").toggle(300);
            $('#add_details').hide();
            $('#add_more').show();

        })
        //ADD EXPERIENCE
        $("#employeer_id").on("keyup", function() {
            $("#empl_checkbox").show(300);
        })
        //notice period during time
        $("#empl_btn1").on("click", function() {
            $("#notice_period").show(300);
            $("#duration_to").hide(300);
        })
        $("#empl_btn2").on("click", function() {
            $("#notice_period").hide(300);
            $("#duration_to").show(300);
            $("#serving_notice").hide(300);
        })
        $("#empl_btn3").on("click", function() {
            $("#notice_period").hide(300);
            $("#duration_to").show(300);
            $("#serving_notice").hide(300);
        })
        //serving notice
        $('.form-select-notice').on('change', function() {
            var select_notice = $(".form-select-notice").val();
            if (select_notice == "Serving Notice") {
                $("#serving_notice").show(300);
            } else {
                $("#serving_notice").hide(300);
            }

        });
    </script>
@endsection

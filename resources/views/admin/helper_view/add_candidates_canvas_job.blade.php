<form action="{{ route('add_single_candidates') }}" method="post" enctype="multipart/form-data"
    id="submit_single_candidate">
    @csrf
    {{-- <input type="hidden" name="job_id" id="job-id"> --}}
    <div class="offcanvas offcanvas-end offcanvas-new" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">

        <div class="offcanvas-header d-flex flex-row align-items-center justify-content-between add-manual p-3">
            <div class="">
                <h5 class="offcanvas-title text-white font-w-600 fs-22">Add Candidates Manually <span
                        id="job"></span></h5>
                <small class="fs-13 text-white font-w-600 ">Fill candidate details.</small>
            </div>
            <i class="ri-close-line fs-25 text-white c-pointer" data-bs-dismiss="offcanvas"></i>

        </div>
        <div class="offcanvas-body overflow-hidden p-2">
            <div data-simplebar class="pe-2" style="height: calc(100vh - 112px);">
                <div class="row g-3 mb-5 pb-2 mx-auto ">
                    <div class="border rounded border-dashed p-2">
                        <div class="mb-2 ">
                            <label for="fullnameInput" class="form-label">Upload Resume</label>
                            {{-- <form action="" id="upload-file" method="post" enctype="multipart/form-data"> --}}
                            <div id="upload_process">
                                <input id="upload_resume" class="dropify" type="file" name="file"
                                    accept=".doc,.docx,.pdf,.rtf" />
                            </div>
                            {{-- </form> --}}
                            <div class="card team-box border border-primary upload-resume-cads mb-1"
                                id="resume_processing_card"
                                style="display:none;height:111px;box-shadow: 9px 8px 45px #d6d6d8;">
                                <div class="card-body px-2">
                                    <div class="d-flex align-items-start ms-1 me-1 mb-4">
                                        <i class=" ri-file-3-fill text-primary c-pointer fs-18"></i>
                                        <div class="w-100">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <h5 class="mt-0 ms-1 c-pointer mb-0 fs-14" id="file_name">

                                                </h5>
                                                <small class="text-muted text-end c-pointer"><i
                                                        class="mdi mdi-delete-outline text-danger fs-15"></i></small>

                                            </div>
                                            <p id="file_sz" class="mb-0 fs-12 ms-1"> </p>
                                        </div>

                                    </div>
                                    <div class="progress progress-md ms-1 me-1 mb-1">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                            style="width: 100%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card team-box text-xs-center upload-resume-cads border border-primary mb-1"
                                id="resume_processing"
                                style="display:none;height:111px;box-shadow: 9px 8px 45px #d6d6d8;">
                                <div class="card-body px-2">
                                    <div class="d-flex align-items-center justify-content-center mt-2 mb-1">

                                        <div class="spinner-border text-primary text-center" role="status"
                                            aria-hidden="true"></div>
                                    </div>
                                    <p class="text-center fs-12 mb-1">Please wait till your resume is being parsed</p>
                                </div>
                            </div>
                            <div class="card team-box border border-primary upload-resume-cads mb-1" id="show_resume"
                                style="display:none;height:111px;box-shadow: 9px 8px 45px #d6d6d8;">
                                <div class="card-body px-2 pb-0">
                                    <div class="d-flex align-items-start ms-1 me-1 ">
                                        <i class=" ri-file-3-fill text-primary c-pointer fs-18"></i>
                                        <div class="w-100">
                                            <div class="d-flex align-items-start justify-content-between">
                                                <h5 class="mt-0 ms-1 c-pointer mb-0  fs-14" id="file_name1">

                                                </h5>
                                                <small class="text-muted text-end c-pointer"><i
                                                        class="mdi mdi-delete-outline text-danger fs-15"
                                                        id="sa-warning"></i></small>

                                            </div>
                                            <p id="file_sz1" class="mb-0  fs-12 ms-1"></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer upload-resume-successfull p-1">
                                    <div class="align-items-center ">

                                        <div
                                            class="d-flex align-items-center justify-content-between ms-1 me-1 upload-resume-success">
                                            <div class="d-flex flex-row align-items-center">
                                                <div class="">
                                                    <i
                                                        class="mdi mdi-alert-circle-outline text-warning c-pointer fs-20 align-middle"></i>
                                                </div>
                                                <div>
                                                    <small class=" ms-2 c-pointer fs-12">We recommend you to cross-check
                                                        the details.</small>
                                                </div>
                                            </div>
                                            <div>
                                                {{-- <h6 class="c-pointer fs-13 mb-0"><a href="edit-profile.php" class="text-dark" target="_blank">Edit profile <span><i class="mdi mdi-arrow-right text-primary"></i></span></a> </h6> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="mb-2">
                            <label for="fullnameInput" class="form-label  ">Select Job</label>
                            <select class="form-select" id="job_update_id" name="job_id" data-choices
                                data-choices-search-false data-choices-removeItem>
                                {{-- <option value="ResumeBank" selected disabled>Resume Bank</option> --}}
                                @foreach ($get_cloud_job as $job)
                                    @if ($job->job_status == 'Active')
                                        <option value="{{ $job->job_id }}">{{ $job->job_title }}</option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="simpleinput" class="form-label">Source Name </label>
                                    <select class="form-select" id="choices-single-no-search" name="source_name"
                                        data-choices data-choices-search-false>
                                        {{-- <option>Select Source Type</option> --}}
                                        <option value="Job Portal">Job Portal</option>
                                        <option value="Email">Email</option>
                                        <option value="Internal" selected>Internal</option>
                                        <option value="Others">Others</option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2 ">
                                    <label for="simpleinput" class="form-label">Recruiter </label>
                                    <select class="form-select" id="choices-single-no-search" name="user_id"
                                        data-choices data-choices-search-false>
                                        @php
                                            $cloud_teams = get_team_members();
                                        @endphp
                                        @foreach ($cloud_teams as $team_member)
                                            <option value="{{ $team_member->id }}"
                                                {{ Auth::user()->id == $team_member->id ? 'selected' : '' }}>
                                                {{ $team_member->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        {{-- <div class="mb-2">
                        <label for="fullnameInput" class="form-label">Select Job</label>
                        <select class="form-select" id="choices-single-no-search" name="choices-single-no-search" data-choices data-choices-search-false data-choices-removeItem>
                            <option selected="">UI Developer</option>
                            <option value="1">PHP Developer</option>
                        </select>
                    </div> --}}
                        {{-- <div class="mb-2" style="background: #6377b9">
                            <h5 class="text-light mb-0 fs-14 text-center p-1">Basic Details</h5>
                        </div> --}}
                        {{-- <hr> --}}
                        <div class="mb-1 mt-0">
                            <label for="validationDefault01" class="form-label ">Name Of The Candidate <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="candidate_name" required=""
                                name="candidate_name">
                        </div>

                        <div class="mb-1 mt-2">
                            <label for="validationDefault01" class="form-label">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="candidate_email" required=""
                                name="candidate_email">
                        </div>
                        <div class="mb-1 mt-2">
                            <label for="validationDefault01" class="form-label">Phone number <span
                                    class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-9 pe-0">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">IN
                                            +91</span>
                                        <input type="text" class="form-control" id="candidate_phone"
                                            name="candidate_phone" onkeyup="validate_mo(event)" maxlength="10"
                                            placeholder="000 000 0000" required="">
                                    </div>
                                </div>
                                <div class="col-md-3 text-end ps-0">
                                    <button type="button" class="btn btn-secondary btn-md waves-effect waves-light"
                                        id="showaltnum">Alt Num</button>
                                </div>
                            </div>
                        </div>

                        <div id="alt-num-table" class="mt-1" style="display:none">
                            <div class="row mb-1 mt-1">
                                <div class="col-md-9 pe-0">
                                    <div class="input-group mb-1">
                                        <span class="input-group-text" id="validationTooltipUsernamePrepend">IN
                                            +91</span>
                                        <input type="text" class="form-control" onkeyup="validate_mo(event)"
                                            id="validationTooltipUsername" name="candidate_alt_phone" maxlength="10"
                                            placeholder="000 000 0000">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-1 mt-1">
                            <label for="validationDefault01" class="form-label">DOB</label>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="ri-calendar-2-line fs-15 text-primary"></i></span>
                                <input type="text" name="candidate_dob"
                                    class="form-control flatpickr-input active" data-provider="flatpickr"
                                    placeholder="DD-MM-YY" data-date-format="d M Y" aria-describedby="basic-addon1">
                            </div>
                        </div>

                        <div class="mb-2 mt-1">
                            <label for="validationDefault01" class="form-label ">Gender</label>
                            <div class="form-group mb-2">

                                <div class="btn-group btn-group-sm d-flex " role="group"
                                    aria-label="Horizontal radio toggle button group">
                                    <input type="radio" class="btn-check " name="candidate_gender"
                                        id="Gbtn-radio1" value="Male">
                                    <label class="j_priority btn btn-outline-primary p-2" for="Gbtn-radio1"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                        title="" data-bs-original-title="Male"><i
                                            class="ri-men-line fs-14"></i></label>
                                    <input type="radio" class="btn-check " name="candidate_gender"
                                        id="Gbtn-radio2" value="Female">
                                    <label class="j_priority btn btn-outline-primary p-2" for="Gbtn-radio2"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                        title="" data-bs-original-title="Female"><i
                                            class="ri-women-line fs-14"></i></label>
                                    <input type="radio" class="btn-check " name="candidate_gender"
                                        id="Gbtn-radio3" value="Transgender">
                                    <label class="j_priority btn btn-outline-primary p-2" for="Gbtn-radio3"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                        title="" data-bs-original-title="TransGender"><i
                                            class="ri-travesti-line fs-14"></i></label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="example-textarea" class="form-label">Location</label>
                            <input type="text" class="form-control " name="candidate_location">
                        </div>


                        <div class="mb-2">
                            <label for="example-textarea" class="form-label"> Address</label>
                            <textarea name="candidate_address" placeholder="Bulding Name, street Name, City , State, Pincode"
                                class="form-control" id="example-textarea" rows="2"></textarea>
                        </div>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light"
                            data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false"
                            aria-controls="multiCollapseExample1 multiCollapseExample2">Show Additional Fields</button>
                    </div>

                    <div class="collapse multi-collapse p-0" id="multiCollapseExample1">
                        <div class="border rounded border-dashed p-1">
                            <div class="accordion" id="default-accordion-example">
                                <div class="accordion-item  mb-2">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button ps-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#education_details"
                                            aria-expanded="true" aria-controls="collapseOne">Education Details
                                        </button>
                                    </h2>

                                    <div id="education_details" class="accordion-collapse collapse p-2 "
                                        aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                        <div class="accordion-body p-0" id="add_education_field">
                                            <div class="new_qualification">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date" class="form-label">Qualification
                                                            </label>
                                                            @php
                                                                $degrees = get_all_degree();
                                                            @endphp
                                                            <select style="z-index: 9999" class="form-select"
                                                                id="choices-single-no-search" name="qualification[]"
                                                                data-choices data-choices-search-false>
                                                                <option value="" disabled>Select</option>
                                                                @foreach ($degrees as $degree)
                                                                    <option value="{{ $degree->degree_name }}">
                                                                        {{ $degree->degree_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date"
                                                                class="form-label">Specialization </label>

                                                            @php
                                                                $specializations = get_all_specialization();
                                                            @endphp
                                                            <select class="form-select" id="choices-single-no-search"
                                                                name="specialization[]" data-choices
                                                                data-choices-search-false data-choices-removeItem>
                                                                <option value="" disabled>Select</option>
                                                                @foreach ($specializations as $specialization)
                                                                    <option value="{{ $specialization->degree_name }}">
                                                                        {{ $specialization->degree_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="example-date" class="form-label">Course Type </label>
                                                    <div class="form-group mb-2">

                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="radio" class="btn-check "
                                                                name="course_type[]" id="vbtn-radio1"
                                                                value="Full Time" checked>
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="vbtn-radio1">Full Time</label>
                                                            <input type="radio" class="btn-check "
                                                                name="course_type[]" id="vbtn-radio2"
                                                                value="Part Time">
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="vbtn-radio2">Part Time</label>
                                                            <input type="radio" class="btn-check "
                                                                name="course_type[]" id="vbtn-radio3"
                                                                value="Correspondence/Distance Learning">
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="vbtn-radio3">Correspondence/Distance
                                                                Learning</label>

                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-1">
                                                    <label for="example-textarea"
                                                        class="form-label">University/Institute </label>
                                                    <input type="text" class="form-control " name="institute[]">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date" class="form-label">Year Of
                                                                Passing </label>
                                                            <select class="form-select" id="choices-single-no-search"
                                                                name="passing_year[]" data-choices
                                                                data-choices-sorting-true data-choices-search-false>
                                                                <option value="">Select</option>
                                                                @php
                                                                    $passyears = range(date('Y') - 40, date('Y') + 4);
                                                                @endphp

                                                                @foreach ($passyears as $value)
                                                                    <option value="{{ $value }}">
                                                                        {{ $value }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date" class="form-label">Percentage
                                                            </label>
                                                            <input class="form-control" id="example" type="text"
                                                                placeholder="Percentage %" name="percentage[]">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 d-flex justify-content-end">
                                                    <button onclick="delete_qualification(event)" type="button"
                                                        title="Delete"
                                                        class="btn btn-light btn-border btn-sm d-none me-3"
                                                        id="delete"><i
                                                            class="ri-delete-bin-5-line text-danger"></i>
                                                    </button>
                                                    <button onclick="new_qualification(event)" type="button"
                                                        class="btn btn-light btn-border btn-sm" id="add"><i
                                                            class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i>
                                                        Add More</button>
                                                    {{-- <span class="text-end" style="float:right" > --}}


                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button ps-2" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#experience_details"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            Experience Details
                                        </button>
                                    </h2>
                                    <div id="experience_details" class="accordion-collapse collapse p-2"
                                        aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                                        <div class="accordion-body p-0" id="add_experience_field">

                                            <div class="mb-3">
                                                <label for="example-date" class="form-label">Employeer </label>
                                                <input class="form-control" id="employeer_id" type="text"
                                                    name="employer_name[]" placeholder="">
                                            </div>
                                            <div class="form-group mb-2 " id="empl_checkbox" style="display:none">

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
                                            <div class="row mb-2">
                                                <div class="col-lg-12">
                                                    <label for="example-date" class="form-label">Designation </label>
                                                    <input class="form-control" type="text" placeholder=""
                                                        name="designation[]">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-6">
                                                    <label for="example-date" class="form-label">Duration </label>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <select class="form-select" name="duration_month_from[]">
                                                                <option value="" selected>Select</option>
                                                                <?php $arr_total_exp_to = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
                                                                        foreach($arr_total_exp_to as $val) { ?>
                                                                <option value="<?= $val ?>"><?= $val ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select class="form-select" name="duration_year_from[]">
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
                                                <div class="col-lg-6">
                                                    <div id="duration_to" style="display:none">
                                                        <label for="example-date" class="form-label">To </label>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <select class="form-select"
                                                                    name="duration_month_to[]">
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
                                                                    <option value="<?= $value ?>"><?= $value ?>
                                                                    </option>
                                                                    <?php
                                                    }
                                                            ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-2" id="notice_period" style="display:none">
                                                        <label for="example-date" class="form-label">Notice Period
                                                        </label>
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
                                                        <label for="example-date" class="form-label fs-12">Please
                                                            Mention Last Working Day </label>

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
                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Job Profile </label>
                                                <textarea placeholder="Job Profile" name="job_profile[]" id="" class="form-control" cols="5"
                                                    rows="5"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 text-end">
                                                    <button type="button" class="btn btn-light btn-border btn-sm"
                                                        id=""><i
                                                            class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i>
                                                        Add More</button>
                                                    {{-- <button type="button" class="btn btn-danger btn-border btn-sm" id="remove_experience_filed" style="display:none"><i class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i> Remove Section</button> --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button ps-2 " type="button"
                                            data-bs-toggle="collapse" data-bs-target="#skillset"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Skill Set Details
                                        </button>
                                    </h2>
                                    <div id="skillset" class="accordion-collapse collapse p-2"
                                        aria-labelledby="headingTwo" data-bs-parent="#default-accordion-example">
                                        <div class="accordion-body p-0">

                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Skill Known </label>
                                                <input class="form-control " id="choices-text-unique-values"
                                                    data-choices data-choices-limit="8" data-choices-text-unique-true
                                                    data-choices-removeItem type="text" name="skillset[]"
                                                    data-placeholder="E.g. Html, Css, Java, Php, Etc." />
                                            </div>
                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Language Known</label>
                                                <input class="form-control " id="choices-text-unique-values"
                                                    data-choices data-choices-limit="8" data-choices-text-unique-true
                                                    data-choices-removeItem type="text" name="language[]"
                                                    data-placeholder="E.g. English, Hindi, Etc" />
                                            </div>
                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Affrimative Action
                                                </label>
                                                <div class="form-group mb-2">

                                                    <div class="btn-group btn-group-sm d-flex " role="group"
                                                        aria-label="Horizontal radio toggle button group">
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_affrimative_action" id="abtn-radio1"
                                                            value="SC">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Schedule Caste"
                                                            for="abtn-radio1">SC</label>
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_affrimative_action" id="abtn-radio2"
                                                            value="ST">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Schedule Tribe"
                                                            for="abtn-radio2">ST</label>
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_affrimative_action" id="abtn-radio3"
                                                            value="OBC">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Other Backward Classes"
                                                            for="abtn-radio3">OBC</label>
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_affrimative_action" id="abtn-radio4"
                                                            value="GENERAL">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="General"
                                                            for="abtn-radio4">GENERAL</label>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Differently Abled
                                                </label>
                                                <div class="form-group mb-2">

                                                    <div class="btn-group btn-group-sm d-flex " role="group"
                                                        aria-label="Horizontal radio toggle button group">
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_differently_abled" id="dbtn-radio1"
                                                            value="Development">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Developmentally Disabled"
                                                            for="dbtn-radio1">Development</label>
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_differently_abled" id="dbtn-radio2"
                                                            value="Mental">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Mentally Disabled"
                                                            for="dbtn-radio2">Mental</label>
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_differently_abled" id="dbtn-radio3"
                                                            value="Physical">
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Physically Disabled"
                                                            for="dbtn-radio3">Physical</label>
                                                        <input type="radio" class="btn-check "
                                                            name="candidate_differently_abled" id="dbtn-radio"
                                                            value="NA" checked>
                                                        <label class="j_priority btn btn-outline-primary p-2"
                                                            data-bs-toggle="tooltip" title="Not Applicable"
                                                            for="dbtn-radio" >NA</label>


                                                    </div>


                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-2">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button ps-2 " type="button"
                                            data-bs-toggle="collapse" data-bs-target="#identity_details"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            Identity Details
                                        </button>
                                    </h2>
                                    <div id="identity_details" class="accordion-collapse collapse p-2"
                                        aria-labelledby="headingThree" data-bs-parent="#default-accordion-example">
                                        <div class="accordion-body p-0">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="example-textarea" class="form-label">Pan
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            name="candidate_location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="example-textarea" class="form-label">Aadhar
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            name="candidate_location">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="example-textarea" class="form-label">Voter ID
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            name="candidate_location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-2">
                                                        <label for="example-textarea" class="form-label">Driving
                                                            License No.</label>
                                                        <input type="text" class="form-control"
                                                            name="candidate_location">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-2">
                                                        <label for="example-textarea" class="form-label">Passport
                                                            Number</label>
                                                        <input type="text" class="form-control"
                                                            name="candidate_location">
                                                    </div>
                                                </div>

                                            </div>




                                        </div>
                                    </div>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="offcanvas-foorter border p-3 ">
            <div class="col-12">
                <div class="d-flex justify-content-between">

                    <div>
                        <button type="button" style="width: 150px" class="btn btn-light"
                            id="reset_form">Reset</button>
                    </div>
                    <div>
                        <button style="width: 150px" class="btn btn-secondary" id="submit_candidate"> Add
                            Candidate</button>
                        <button style="width: 150px" class="btn btn-secondary d-none" id="processing">
                            <div class="spinner-border spinner-border-sm text-light" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

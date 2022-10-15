@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content ">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">JOBS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">Add a Job</li>

                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <form action="{{ route('add_jobs_post') }}" method="post" enctype="multipart/form-data"
                                validate>
                                @csrf
                                <div class="card mb-3">

                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class=" col-md-7">
                                                    <div class="form-group mb-2 add-jb">
                                                        <label for="basiInput" class="form-label"> Job Title<span
                                                                class="text-danger">&nbsp;*</span></label>
                                                        <input type="text" maxlength="50" name="job_title"
                                                            class="form-control text-capitalize" id="job_title" autocomplete="off"
                                                             required>
                                                        <ul id="myUL" class="myul">

                                                            <div class="jd-inner-text">
                                                                <h5>Job Descriptions found in our Library</h5>
                                                            </div>
                                                            
                                                            {{-- @foreach ($get_sub_category_list as $sub_category)
                                                                
                                                                <li value="{{ $sub_category->sbc_id }}">
                                                                    <a href="#">{{ $sub_category->sbc_name }}</a>
                                                                    <div class="d-flex mt-1">
                                                                        <span
                                                                            class="badge badge-soft-primary">daa</span>
                                                                        <p class="mb-0 searching text-muted">
                                                                            {{ substr($sub_category->content_list, 0, 60) }}...
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                            @endforeach --}}



                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class=" col-md-2">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label">Job Code<span
                                                                class="text-danger">&nbsp;*</span></label>
                                                        <input type="text" readonly value="{{ strtoupper($job_id) }}"
                                                            name="job_code" class="form-control" id="labelInput" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label">Select Job
                                                            Priority<span class="text-danger">&nbsp;*</span></label>



                                                        <div class="btn-group btn-group-sm d-flex flex-row-reverse"
                                                            role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="radio" class="btn-check " name="job_priority"
                                                                id="vbtn-radio1" value="Hot">
                                                            <label class="j_priority btn btn-outline-primary"
                                                                for="vbtn-radio1">Hot</label>
                                                            <input type="radio" class="btn-check " name="job_priority"
                                                                id="vbtn-radio2" checked="" value="Normal">
                                                            <label class="j_priority btn btn-outline-primary"
                                                                for="vbtn-radio2">Normal</label>
                                                            <input type="radio" class="btn-check " name="job_priority"
                                                                id="vbtn-radio3" value="Bulk">
                                                            <label class="j_priority btn btn-outline-primary"
                                                                for="vbtn-radio3">Bulk</label>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="labelInput" class="form-label"> Job Description<span
                                                        class="text-danger">&nbsp;*</span></label>

                                                <div class="snow-editor" id="job_description" style="height: 200px;">

                                                </div>
                                                <input type="hidden" name="job_desc" id="current_jd" required>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2">
                                                    <label for="labelInput" class="form-label">Must Have Skills

                                                    </label>
                                                    <input type="text" id="choices-text-remove-button" data-choices
                                                        data-choices-limit="15" data-choices-text-unique-true
                                                        data-choices-removeItem
                                                        data-placeholder="Type a skill as keyword and press enter to add as a tag"
                                                        class="form-control" name="must_have_skills" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2">
                                                    <label for="labelInput" class="form-label">Good To Have Skills
                                                        (if any)
                                                    </label>
                                                    <input type="text" id="choices-text-remove-button" data-choices
                                                        data-choices-limit="15" data-choices-text-unique-true
                                                        data-choices-removeItem class="form-control"
                                                        data-placeholder="Type a skill as keyword and press enter to add as a tag"
                                                        name="good_have_skills" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2">
                                                    <label for="labelInput" class="form-label">Attach Job Decription
                                                        (if any)
                                                    </label>
                                                    <input type="file" class="form-control" name="job_attach_jd"
                                                        accept=".xlsx,.xls,.rtf,.pdf" id="attach_jd">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group mb-2">
                                                    <label for="labelInput" class="form-label">Targetted Company (if any)

                                                    </label>
                                                    <input type="text" id="choices-text-remove-button" data-choices
                                                        data-choices-limit="15" data-choices-text-unique-true
                                                        data-choices-removeItem
                                                        data-placeholder="Type your targetted company and press enter to add as a tag"
                                                        class="form-control" name="targetted_company" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Job Publishing<span
                                                class="text-danger">&nbsp;*</span></h4>

                                    </div>
                                    <div class="card-body">

                                        <div class="code-view">
                                            <div class="row gy-4">
                                                <div class=" col-md-6">
                                                    <div class="card bg-light mb-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-1">
                                                                    <!-- Custom Radio Color -->
                                                                    <div class="form-check form-radio-primary mb-3">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="posting_type" id="formradioRight5"
                                                                            checked value="Internal">

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-11">
                                                                    <h6 class=""><b>Internal Posting</b></h6>
                                                                    <small class="text-muted">Visible only to your internal
                                                                        hiring team, having necessary access
                                                                        permissions.</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class=" col-md-6">
                                                    <div class="card bg-light mb-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-lg-1">
                                                                    <!-- Custom Radio Color -->
                                                                    <div class="form-check form-radio-primary mb-3">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="posting_type" id="flexRadioDefault1"
                                                                            {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}
                                                                            value="Public">

                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-11">
                                                                    <h6 class=""><b>Public Posting</b></h6>
                                                                    <small class="text-muted">Visible to public on your
                                                                        website,
                                                                        career portal, social pages and free job
                                                                        boards.</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <label for="basiInput" class="form-label"> Set CV/Resume Upload
                                                            Limit<span class="text-danger">&nbsp;*</span></label>
                                                        <input type="number" maxlength="50" name="job_cv_limit"
                                                            class="form-control text-capitalize" id="basiInput" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="basiInput" class="form-label">Expires On/Valid Till<span
                                                            class="text-danger">&nbsp;*</span></label>
                                                    <div class="input-group">

                                                        <input type="text"
                                                            class="form-control  dash-filter-picker flatpickr-input"
                                                            data-provider="flatpickr" data-date-format="d M Y"
                                                            name="valid_till" readonly="readonly" required>
                                                        <div class="input-group-text bg-primary border-primary text-white">
                                                            <i class="ri-calendar-2-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Secondary Alert -->
                                            {{-- if no email verify --}}
                                            @if (Auth::user()->email_verify == 'No')
                                                <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label fade show"
                                                    role="alert">
                                                    <i class="ri-alert-line label-icon"></i><span>This feature is
                                                        temporarily
                                                        disabled on your account. Please confirm your email address to
                                                        enable
                                                        this
                                                        feature.</span>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Employer Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label">Company<span
                                                                class="text-danger">&nbsp;*</span></label>
                                                        <select class="form-select bg-light mb-3 js-example-basic-single"
                                                            aria-label="Default select example" name="company" required>
                                                            <option bg-light disabled> Select Organization</option>
                                                            @foreach ($get_user_info as $company)
                                                                <option value="{{ $company->client_name }}" selected>
                                                                    {{ $company->client_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-2">
                                                        <?php
                                                        $city = get_city();
                                                        ?>
                                                        <div
                                                            class="d-flex flex-row align-items-center justify-content-between ">
                                                            <label for="labelInput" class="form-label"> Location<span
                                                                    class="text-danger">&nbsp;*</span></label>
                                                            {{-- <div class=""> --}}

                                                            {{-- </div> --}}
                                                            <!-- Switch sizes -->
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customSwitchsizesm" name="show_remote"
                                                                    data-bs-toggle="tooltip"
                                                                    title="Mark this job as Remote/Onsite">
                                                                <label for="labelInput"
                                                                    class="form-label text-muted fs-10">Remote Work</label>


                                                            </div>
                                                        </div>
                                                        <select class="form-select bg-light mb-3 js-example-basic-multiple"
                                                            aria-label="Default select example" name="location[]" multiple
                                                            required>
                                                            @foreach ($city as $loc)
                                                                @if ($loc->loc_order == '0' && $loc->loc_parent_id == '0')
                                                                    <option value="{{ $loc->loc_name }}" disabled>
                                                                        {{ $loc->loc_name }}</option>
                                                                @else
                                                                    <option value="{{ $loc->loc_name }}">
                                                                        {{ $loc->loc_name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Industry<span
                                                                class="text-danger">&nbsp;*</span></label>
                                                        <?php
                                                        $indus = get_industry();
                                                        ?>
                                                        <select required
                                                            class="form-select bg-light mb-3 js-example-basic-single"
                                                            aria-label="Default select example" name="industry">
                                                            <option bg-light disabled> Select Industry</option>
                                                            @foreach ($indus as $industry)
                                                                <option value="{{ $industry->industry_name }}">
                                                                    {{ $industry->industry_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Job Function<span
                                                                class="text-danger">&nbsp;*</span></label>
                                                        <?php
                                                        $area = get_functional_area();
                                                        ?>
                                                        <select required
                                                            class="form-select bg-light mb-3 js-example-basic-single"
                                                            aria-label="Default select example" name="job_function">
                                                            <option bg-light disabled> Select Job Function </option>
                                                            @foreach ($area as $ar)
                                                                <option value="{{ $ar->funarea_name }}">
                                                                    {{ $ar->funarea_name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Employment Details</h4>

                                    </div>
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Employment Type<span
                                                                class="text-danger">&nbsp;*</span>
                                                        </label>
                                                        <select required
                                                            class="form-select bg-light mb-3 js-example-basic-single"
                                                            aria-label="Default select example" name="emp_type">
                                                            {{-- <option disabled> Select Employee Type</option> --}}
                                                            <option value="Full Time" selected> Full Time</option>
                                                            <option value="Part Time"> Part Time </option>
                                                            <option value="Remote"> Remote </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Experience Level<span
                                                                class="text-danger">&nbsp;*</span>
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="number" class="form-control"
                                                                aria-label="Username" name="exp_min" required>
                                                            <span class="input-group-text ">Yrs</span>
                                                            <input type="number" class="form-control"
                                                                aria-label="Server" name="exp_max" required>
                                                            <span class="input-group-text" disabled>Yrs</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Positions<span
                                                                class="text-danger">&nbsp;*</span> </label>
                                                        <input type="number" class="form-control" aria-label="Username"
                                                            name="position" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-lg-5">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Highest
                                                            Qualification<span class="text-danger">&nbsp;*</span>
                                                        </label>
                                                        <select class="form-select bg-light mb-3 js-example-basic-single"
                                                            aria-label="Default select example" name="qualification"
                                                            required>
                                                            <option bg-light disabled> Select Highest Qualification</option>
                                                            @php
                                                                $degrees = get_all_degree();
                                                            @endphp
                                                                @foreach ($degrees as $degree)
                                                                    <option value="{{ $degree->degree_name }}">
                                                                        {{ $degree->degree_name }}</option>
                                                                @endforeach
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-5">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Salary Range (In
                                                            Lakhs)<span class="text-danger">&nbsp;*</span>
                                                        </label>

                                                        <div class="input-group">
                                                            <input type="text" class="form-control cleave-numeral"
                                                                placeholder="100,000" name="sal_min" required>
                                                            <span class="input-group-text ">Min</span>
                                                            <input type="text" class="form-control cleave-numeral"
                                                                placeholder="200,000" name="sal_max" required>
                                                            <span class="input-group-text" disabled>Max</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div
                                                            class="d-flex flex-row align-items-center justify-content-between ">
                                                            <div class="">
                                                                <label for="labelInput"
                                                                    class="form-label text-muted fs-10">Show Salary
                                                                    Details</label>
                                                            </div>
                                                            <!-- Switch sizes -->
                                                            <div class="form-check form-switch">
                                                                <input type="checkbox" class="form-check-input"
                                                                    id="customSwitchsizesm" checked=""
                                                                    name="show_salary">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-2">
                                                    <div class="form-group mb-2">
                                                        <label for="labelInput" class="form-label"> Currency<span
                                                                class="text-danger">&nbsp;*</span></label>
                                                        <select class="form-select bg-light mb-3 js-example-basic-single"
                                                            aria-label="Default select example" name="currency" required>
                                                            <option value="INR" selected> INR </option>
                                                            <option value="USD"> USD </option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                            {{-- <div class="row mt-4">
                                                <div class="col-lg-12 text-lg-end">
                                                    <button id="form1" type="submit"
                                                        class="btn btn-primary btn-border">Save &amp;
                                                        Next</button>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Interview Process & Things To Remember</h4>

                                        {{-- <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">
                                                    <label for="form-grid-showcode" class="form-label text-muted font-11">Add Evaluate Attachment</label>
                                                    <input class="form-check-input code-switcher" type="checkbox"
                                                        id="show_attach">
                                                </div>
                                            </div> --}}

                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="row mb-2">
                                                <div class="col-lg-12">
                                                    <div class="snow-editor" id="things_to_remember"
                                                        style="height: 100px;">

                                                    </div>
                                                    <input type="hidden" name="things_to_remember"
                                                        id="things_to_remember1">
                                                </div>

                                            </div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div id="eval_attach" class="">



                                                    </div>
                                                    <div class="border border-dashed p-2" id="show_attach">
                                                        <h5 class="text-center text-muted mb-0 "
                                                            onclick="addEvaluateAttach(event)"> <i
                                                                class=" ri-add-circle-line me-1 align-middle"></i>Add
                                                            Attachment</h5>
                                                    </div>
                                                </div>



                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-lg-12 text-lg-end">
                                                    <button id="form1" type="submit"
                                                        class="btn btn-primary btn-border">Save &amp;
                                                        Next</button>
                                                </div>
                                            </div>





                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>

                        <div class="col-lg-3">
                            <p class="text-muted mt-3 mb-3">
                                Use common job titles specific to a single opening.
                            </p>
                            <p class="text-muted mb-2">
                                Provide a job description which gives a complete overview of the job. Must include details
                                such as responsibilities, activities, qualifications and skills required for the role.
                            </p>
                            <p class="text-muted mb-2">
                                A minimum length of 200 words is required to publish this job on our partner job boards. Do
                                not include additional contact info such as email, phone or provide an external link to
                                apply.
                            </p>
                            <p class="text-muted mb-2">
                                If you need help drafting that perfect job description, choose from our extensive library of
                                job descriptions crafted especially for you.
                            </p>
                            <p class="text-muted mb-2 ">
                                Set a closing date if you need to unpublish the job from all job boards at once.
                            </p>
                            <div class="col-lg-12 text-lg-center mt-4">
                                <button id="open_job_library" class="btn btn-primary btn-border">Job Description
                                    Library</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.helper_view.job-library.job_library_modal')
            @include('admin.helper_view.job-library.job_library_type_search_modal')
        </div>
    </div>
@endsection
@section('script')
    <!-- quill js -->
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{ asset('signup-assets/js/select2.js') }}"></script>
    <!-- init js -->

    <script>
        var job_library_modal = new bootstrap.Modal(document.getElementById('job_library_modal'), {
            keyboard: false
        })
        var job_library_modal_type_search = new bootstrap.Modal(document.getElementById('job_library_modal_type_search'), {
            keyboard: false
        })
        $('#open_job_library').click(function(e) {
            e.preventDefault();

            job_library_modal.show();
        });
        // $('#job_title').focus(function(e) {
        //     e.preventDefault();
        //     $('#open_job_library').trigger('click');
        // });
        $('#category_load').change(function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "fetch-library-sub-category/" + $('#category_load').val(),
                success: function(response) {
                    $('#items').find('li').remove()
                    response.filename.forEach(element => {
                        $('#items').append(`<li class="list-group-item  justify-content-between align-items-start"
                                        style="cursor: pointer;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold text-muted " id="title_acc_1"><a href="#" onclick="fetch_content(event,${element.sbc_id})">
                                                ${element.sbc_name}</a></div> ${element.sbc_id}
                                        </div>
                                    </li>`);
                    });
                }
            });
        });
        $('#myInput').keyup(function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "search-sub-category/" + $(e.target).val(),
                success: function(response) {
                    $('#items').find('li').remove()
                    response.filename.forEach(element => {
                        $('#items').append(`<li class="list-group-item  justify-content-between align-items-start"
                                        style="cursor: pointer;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold text-muted " id="title_acc_1"><a href="#" onclick="fetch_content(event,${element.sbc_id})">
                                                ${element.sbc_name}</a></div> ${element.sbc_id}
                                        </div>
                                    </li>`);
                    });
                }
            });
        });

        function fetch_content(e, sbc_id) {
            $job_oview = "";
            $response = "";
            $require = "";
            $.ajax({
                type: "get",
                url: "fetch-library-content/" + sbc_id,
                success: function(response) {
                    //    console.log( response.content)
                    $('#content').find('#jo').empty()
                    $('#content').find('#resp').empty()
                    $('#content').find('#req').empty()
                    $('#title').text($(e.target).text());
                    response.content.forEach(element => {
                        if (element.content_type == "Job Overview") {
                            $('#jo').append(`<div class="form-check mb-2"> 
                                    <input class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted">${element.content_list}</label>
                                </div>`);
                        }
                        if (element.content_type == "Responsibilities") {
                            $('#resp').append(`<div class="form-check mb-2"> 
                                    <input class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted">${element.content_list}</label>
                                </div>`);
                        }
                        if (element.content_type == "Requirements") {
                            $('#req').append(`<div class="form-check mb-2"> 
                                    <input class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted">${element.content_list}</label>
                                </div>`);
                        }
                    });
                }
            });
        }

        function fetch_content_init(sbc_id) {
            $job_oview = "";
            $response = "";
            $require = "";
            $.ajax({
                type: "get",
                url: "fetch-library-content-init/" + sbc_id,
                success: function(response) {
                    $('#content').find('#jo').empty()
                    $('#content').find('#resp').empty()
                    $('#content').find('#req').empty()
                    // $('#title').text($(e.target).text());
                    response.content.forEach(element => {
                        if (element.content_type == "Job Overview") {
                            $('#jo').append(`<div class="form-check mb-2"> 
                                    <input class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted text-muted">${element.content_list}</label>
                                </div>`);
                        }
                        if (element.content_type == "Responsibilities") {
                            $('#resp').append(`<div class="form-check mb-2"> 
                                    <input class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted text-muted">${element.content_list}</label>
                                </div>`);
                        }
                        if (element.content_type == "Requirements") {
                            $('#req').append(`<div class="form-check mb-2"> 
                                    <input class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted text-muted">${element.content_list}</label>
                                </div>`);
                        }
                    });
                }
            });
        }

        function side_content_init() {
            $.ajax({
                type: "get",
                url: "fetch-library-sub-category/15",
                success: function(response) {
                    $('#items').find('li').remove()
                    response.filename.forEach(element => {
                        $('#items').append(`<li class="list-group-item  justify-content-between align-items-start"
                                        style="cursor: pointer;">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold text-muted " id="title_acc_1"><a href="#" onclick="fetch_content(event,${element.sbc_id})">
                                                ${element.sbc_name}</a></div> ${element.sbc_id}
                                        </div>
                                    </li>`);
                    });
                }
            });
        }
        side_content_init();
        fetch_content_init("15");
        $(".flatpickr-input").flatpickr({
            minDate: "today"
        });

        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("job_title");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
        
        document.getElementById('switch').onclick = function() {
            var checkboxes = document.querySelectorAll('#content input[type="checkbox"]');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
        document.getElementById('switch1').onclick = function() {
            var checkboxes1 = document.querySelectorAll('#content1 input[type="checkbox"]');
            for (var checkbox of checkboxes1) {
                checkbox.checked = this.checked;
            }
        }
        $('#add_to_job_order').click(function(e) {
            e.preventDefault();
            var count_call = 0;
            $(this).prev().find('#content input[type="checkbox"]').each(function(index, element) {
                if (element.checked == true) {
                    count_call++;
                }
            });
            if (count_call == 0) {
                Snackbar.show({
                    text: 'Please Select Atleast One Job Description To Add !',
                    pos: 'bottom-center'
                });
            } else {

                var job_overview = "";
                var responsibilities = "";
                var requirement = "";
                var bullet = `<ol></ol>`;
                var count_jo = 0;
                var count_res = 0;
                var count_req = 0;
                $(this).prev().find('#content input[type="checkbox"]').each(function(index, element) {
                    // element == this
                    // console.log(element)
                    if (element.checked == true) {
                        if (element.value == "Job Overview") {
                            count_jo++;
                            job_overview = job_overview + `<p>${$(element).next().text()}</p>`
                        } else if (element.value == "Responsibilities") {
                            count_res++;
                            responsibilities = responsibilities + `<li>${$(element).next().text()}</li>`
                        } else if (element.value == "Requirements") {
                            count_req++;
                            requirement = requirement + `<li>${$(element).next().text()}</li>`
                        }
                    }
                });
                quill.root.innerHTML = "";
                if (count_jo > 0) {

                    quill.root.innerHTML = `<h3>Job Overview</h3><hr>`
                    quill.root.innerHTML = quill.root.innerHTML + `<ul>${job_overview}</ul>`
                }
                if (count_res > 0) {
                    quill.root.innerHTML = quill.root.innerHTML + `<hr><h3>Responsibilites</h3><hr>`
                    quill.root.innerHTML = quill.root.innerHTML + `<ul>${responsibilities}</ul>`
                }
                if (count_req > 0) {
                    quill.root.innerHTML = quill.root.innerHTML + `<hr><h3>Requirements</h3><hr>`
                    quill.root.innerHTML = quill.root.innerHTML + `<ul>${requirement}</ul>`
                }
                job_library_modal.hide();
            }


        });
        $('#add_to_job_order1').click(function(e) {
            e.preventDefault();
            var count_call = 0;
            $(this).prev().find('#content1 input[type="checkbox"]').each(function(index, element) {
                if (element.checked == true) {
                    count_call++;
                }
            });
            if (count_call == 0) {
                Snackbar.show({
                    text: 'Please Select Atleast One Job Description To Add !',
                    pos: 'bottom-center'
                });
            } else {

                var job_overview = "";
                var responsibilities = "";
                var requirement = "";
                var bullet = `<ol></ol>`;
                var count_jo = 0;
                var count_res = 0;
                var count_req = 0;
                $(this).prev().find('#content1 input[type="checkbox"]').each(function(index, element) {
                    // element == this
                    // console.log(element)
                    if (element.checked == true) {
                        if (element.value == "Job Overview") {
                            count_jo++;
                            job_overview = job_overview + `<p class="text-muted mb-2">${$(element).next().text()}</p>`
                        } else if (element.value == "Responsibilities") {
                            count_res++;
                            responsibilities = responsibilities + `<li>${$(element).next().text()}</li>`
                        } else if (element.value == "Requirements") {
                            count_req++;
                            requirement = requirement + `<li>${$(element).next().text()}</li>`
                        }
                    }
                });
                quill.root.innerHTML = "";
                if (count_jo > 0) {

                    quill.root.innerHTML = `<h5 class="">Job Overview</h5>`
                    quill.root.innerHTML = quill.root.innerHTML + `${job_overview}`
                }
                if (count_res > 0) {
                    quill.root.innerHTML = quill.root.innerHTML + `<h5 class="mb-3">Responsibilities</h5>`
                    quill.root.innerHTML = quill.root.innerHTML + `<ul class="mb-3" style="gap: 0.5rem; flex: 1 1 auto;display: flex;flex-direction: column;align-self: stretch;">${responsibilities}</ul>`
                }
                if (count_req > 0) {
                    quill.root.innerHTML = quill.root.innerHTML + `<h5 class="mb-3">Requirements</h5>`
                    quill.root.innerHTML = quill.root.innerHTML + `<ul class="mb-3" style="gap: 0.5rem; flex: 1 1 auto;display: flex;flex-direction: column;align-self: stretch;">${requirement}</ul>`
                }
                job_library_modal_type_search.hide();
            }


        });
        function addEvaluateAttach(e) {
            var attach_1 = `<div class="row mb-2">
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="evaluate_attachment_name1"
                                                                    id="form-grid-showcode"
                                                                    placeholder="Define Attachment Name">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="file"
                                                                    name="evaluate_attachment1">

                                                            </div>
                                                        </div>`;
            var attach_2 = `<div class="row mt-2"> <div class="col-lg-6">
                                                                <input class="form-control" type="text"
                                                                    name="evaluate_attachment_name2"
                                                                    id="form-grid-showcode"
                                                                    placeholder="Define Attachment Name">
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input class="form-control" type="file"
                                                                    name="evaluate_attachment2">

                                                            </div>
                                                        </div>`;
            console.log($(e.target).parents('#show_attach').prev().find('.row'))
            if ($(e.target).parents('#show_attach').prev().find('.row').length == 0) {
                $(e.target).parents('#show_attach').prev().append(attach_1)
            } else {
                $(e.target).parents('#show_attach').prev().append(attach_2)
                $(e.target).parents('#show_attach').remove();
            }
        }
        // $('#show_attach').click(function(e) {
        //     // if($(this).is(':checked')){

        //     $('#eval_attach').removeClass("d-none");
        //     // }else{
        //     //     $('#eval_attach').addClass("d-none");
        //     //     $('#eval_attach').hide(300)

        //     // }
        // });
    </script>
    {{-- <script>
        (document.querySelectorAll("[toast-list]") || document.querySelectorAll("[data-choices]") || document
            .querySelectorAll("[data-provider]")) && (document.writeln(
                "<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/toastify-js'><\/script>"), document
            .writeln(
                "<script type='text/javascript' src='{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}'><\/script>"
            ), document.writeln(
                "<script type='text/javascript' src='assets/libs/flatpickr/flatpickr.min.js'><\/script>"));
    </script> --}}
    {{-- <script src="assets/js/pages/form-editor.init.js"></script> --}}
    <script>
        var quill = new Quill('#job_description', {
            theme: 'snow'
        });
        quill.on('text-change', function(delta, source) {
            var justHtml = quill.root.innerHTML;
            $('#current_jd').val(justHtml);
        });
        var quill1 = new Quill('#things_to_remember', {
            theme: 'snow'
        });
        quill1.on('text-change', function(delta, source) {
            var justHtml = quill1.root.innerHTML;
            $('#things_to_remember1').val(justHtml);
            // alert($('#things_to_remember').val())
        });
        $('#attach_jd').change(function(e) {
            myfile = $('#attach_jd').val();
            var ext = myfile.split('.').pop();
            var file_size = this.files[0].size / 1024 / 1024;
            // .xlsx,.xls,.rtf,.pdf
            if (ext == "pdf" || ext == "rtf" || ext == "xlsx" || ext == "xls") {
                if (file_size > 2) {
                    e.preventDefault();
                    $('#attach_jd').val(null);
                    Snackbar.show({
                        text: 'Maximum File Length | 2MB',
                        pos: 'bottom-center'
                    });
                }
            } else {
                e.preventDefault();
                $('#attach_jd').val(null);
                Snackbar.show({
                    text: 'Valid File Type | Pdf , Rtf , Xlsx , Xls',
                    pos: 'bottom-center'
                });
            }

        });
        // console.log(quill.container.innerHTML)
    </script>
    <script>
        $('#myUL').hide();
        $('#job_title').on('keyup', function(e) {
            $('#myUL').show(200);
            var category_name ="";
            $.ajax({
                type: "get",
                url: "search-sub-category/" + $(e.target).val(),
                success: function(response) {
                    $('#myUL').find('a').remove()
                    $('#myUL').find('hr').remove()
                    response.filename.forEach(element => {
                        
                        $('.jd-inner-text').after(`<a href="#" onclick="fetch_searchcontent(event,${element.sbc_id})"> <li value="${element.sbc_id}">
                                                                    ${element.sbc_name}
                                                                    <div class="d-flex mt-1">
                                                                        <span
                                                                            class="badge badge-soft-primary">${element.parent_category_name}</span>
                                                                        <p class="mb-0 searching text-muted">
                                                                            ${element.content_list.substr(0, 50)}
                                                                        </p>
                                                                    </div>
                                                                </li></a>`);
                       

                    });
                }
            });
            

        });
        function fetch_searchcontent(e,sbc_id){
            $job_oview = "";
            $response = "";
            $require = "";
            $.ajax({
                type: "get",
                url: "fetch-library-content/" + sbc_id,
                success: function(response) {
                    //    console.log( response.content)
                    $('#content1').find('#jo').empty()
                    $('#content1').find('#resp').empty()
                    $('#content1').find('#req').empty()
                    response.content.forEach(element => {
                        $('#job_library_modal_type_search #title').text(element.sbc_name);
                        $('#job_title').val(element.sbc_name);
                        if (element.content_type == "Job Overview") {
                            $('#content1 #jo').append(`<div class="form-check mb-2"> 
                                    <input checked class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted">${element.content_list}</label>
                                </div>`);
                        }
                        if (element.content_type == "Responsibilities") {
                            $('#content1 #resp').append(`<div class="form-check mb-2"> 
                                    <input checked class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted">${element.content_list}</label>
                                </div>`);
                        }
                        if (element.content_type == "Requirements") {
                            $('#content1 #req').append(`<div class="form-check mb-2"> 
                                    <input checked class="form-check-input" type="checkbox"  name="acc_check382" value="${element.content_type}" >
                                    <label class="form-check-label text-muted">${element.content_list}</label>
                                </div>`);
                        }
                    });
                }
            });
            
            job_library_modal_type_search.show()

        }
        $('body').click(function() {
            $('#myUL').hide();
        });
    </script>
@endsection

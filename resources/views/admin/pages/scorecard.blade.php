@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">INTERVIEW SCORECARD</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">Interview Scorecard</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9">
                            {{-- <div class="card mb-3">
                                    <div class="card-header align-items-center d-flex">
                                        <h2 class="card-title mb-0 flex-grow-1">Attachments</h2>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <label for="form-grid-showcode"
                                                    class="form-label text-muted font-11"></label>
                                                <input class="form-check-input code-switcher" type="checkbox"
                                                    id="form-grid-showcode" checked>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="d-none live-preview">

                                        </div>
                                        <div class="code-view">
                                            <p class="text-muted mb-3">
                                                Use this interview scorecard to define the competencies that need to be
                                                tested
                                                during the different interview rounds for this job. You can group related
                                                competencies using Sections. You can use Hints to give context on how to
                                                assess
                                                the competencies.
                                            </p>
                                            <div class="row mb-2">
                                                <div class="col-lg-6">
                                                    <input class="form-control" type="text" id="form-grid-showcode"
                                                        placeholder="Attachment-1">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" type="file" name="attachment1">

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input class="form-control" type="text" id="form-grid-showcode"
                                                        placeholder="Attachment-2">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input class="form-control" type="file" name="attachment2">

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div> --}}
                            <div class="card mb-2">
                                <div class="card-body">
                                    <p class="text-muted mb-3">
                                        Use this interview scorecard to define the competencies that need to be tested
                                        during the different interview rounds for this job. You can group related
                                        competencies using Sections. You can use Hints to give context on how to assess
                                        the
                                        competencies.
                                    </p>
                                    <div class="alert alert-primary alert-borderless mb-3" role="alert">
                                        <strong class="fs-14"> NOTE : </strong>A maximum of 50 competencies can be
                                        added to
                                        a scorecard. <a href="#" class="text-primary"> More details <span
                                                class="ms-1"><i
                                                    class=" ri-edit-box-line fs-14 align-middle"></i></span></a>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="fs-12 mb-2">Application selection criteria matrix</h5>
                                        <ol class="alert-primary p-3">
                                            <li class="text-muted fs-10 mb-1 ms-2">Unacceptable (significantly below
                                                criteria)</li>
                                            <li class="text-muted fs-10 mb-1 ms-2">Below Average (generally does not
                                                meet
                                                criteria)</li>
                                            <li class="text-muted fs-10 mb-1 ms-2"> Average (meets criteria)</li>
                                            <li class="text-muted fs-10 mb-1 ms-2">Above Average (exceeds criteria)</li>
                                            <li class="text-muted fs-10 ms-2">Excellent (significantly exceeds criteria)
                                            </li>
                                        </ol>
                                    </div>
                                    <div class="row gy-4 mb-3">
                                        <div class=" col-md-6">
                                            <div class="card bg-light mb-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <!-- Custom Radio Color -->
                                                            <div class="form-check form-radio-primary ">
                                                                <input class="form-check-input" type="radio"
                                                                    onclick="showtemplate()" name="formradiocolor1"
                                                                    id="show_template" checked>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11">
                                                            <h6 class=""><b>Choose from Templates</b></h6>
                                                            <small class="text-muted"> Select an existing Scorercard
                                                                template.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" col-md-6">
                                            <div class="card bg-light mb-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-1">
                                                            <!-- Custom Radio Color -->
                                                            <div class="form-check form-radio-primary  ">
                                                                <input class="form-check-input" type="radio"
                                                                    onclick="showcreatenew()" name="formradiocolor1"
                                                                    id="show_create_new"
                                                                    {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>

                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11">
                                                            <h6 class=""><b>Create New</b></h6>
                                                            <small class="text-muted">Scorercard attached only to this
                                                                job.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{route('attachment_scorecard_templates_post')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="job_id" value="{{ $job_id }}">
                                        <div class="template " id="template_show">
                                            <div class="mb-3">
                                                <label for="form-label" class="form-label text-muted font-11">Select
                                                    Scorercard
                                                    Template </label>
                                                <select class="form-select js-example-basic-single"
                                                    aria-label=".form-select-sm example" id="templates_id" name="scorecard_template_id"
                                                    {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>
                                                    <option selected value="" disabled>Select Scorercard</option>
                                                    @foreach ($get_scorecard_templates as $template)
                                                        <option value="{{$template->scorecard_set_id}}">{{$template->scorecard_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if (Auth::user()->email_verify == 'No')
                                                
                                            <!-- Secondary Alert -->
                                            <div class="mb-3">
                                                <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label fade show"
                                                    role="alert">
                                                    <i class="ri-alert-line label-icon"></i>This feature is temporarily
                                                    disabled on your account. Please confirm your email address to enable
                                                    this
                                                    feature.
                                                    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button> --}}
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row mt-4">
                                                <div class="col-lg-6">
                                                    <button onclick="history.back()"
                                                        class="btn btn-light btn-border me-3" type="button">Back</button>
                                                </div>
                                                <div class="col-lg-6 text-lg-end">
                                                    <a href="{{ url('job-hiring-team') }}/{{ $job_id }}"><button
                                                            class="btn btn-light btn-border me-3" type="button">Skip</button></a>
                                                    <button class="btn btn-primary btn-border" id="submit-exist"
                                                        {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>Save
                                                        &amp;
                                                        Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <form action="{{ route('job_attachment_scorecard_post') }}" method="post">
                                @csrf
                                <input type="hidden" name="job_id" value="{{ $job_id }}">
                                <div style="display:none" id="hide_enablecard">
                                    <div class="card mb-2" id="create_questionare" style="">
                                        <div class="card-header align-items-center d-flex">
                                            <div class="flex-grow-1">
                                                <label for="">abcd</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Set Scorecard Name" name="scorecard_set_name"
                                                    id="scorecard_set_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card ribbon-box border shadow-none  mb-2">
                                        <div class="card-header align-items-center d-flex mb-1">
                                            <div class="flex-grow-1">
                                                <div class="ribbon ribbon-primary round-shape mt-2">Rating</div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-none live-preview">

                                            </div>
                                            <div class="code-view">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-check card-radio card card-light card-animate">
                                                            <input id="star_rating" name="rating" type="radio"
                                                                value="5pointer" class="form-check-input" checked>
                                                            <label class="form-check-label" for="star_rating">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <div id="basic-rater" dir="ltr"></div>
                                                                        <p class="text-muted mb-0 mt-3">5 Pointer Scale
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-check card-radio card card-light card-animate">
                                                            <input id="checkbox_rating" name="rating" type="radio"
                                                                class="form-check-input" value="3pointer">
                                                            <label class="form-check-label" for="checkbox_rating">
                                                                <div class="card-body p-0 pt-3 pb-3">
                                                                    <div class="text-center">

                                                                        <div class="btn-group btn-group-sm "
                                                                            role="group"
                                                                            aria-label="Horizontal radio toggle button group">
                                                                            <input type="radio" class="btn-check"
                                                                                name="rating_type" disabled
                                                                                id="vbtn-radio1">
                                                                            <label class="btn btn-outline-primary"
                                                                                for="vbtn-radio1">GOOD</label>
                                                                            <input type="radio" class="btn-check"
                                                                                name="rating_type" id="vbtn-radio2"
                                                                                checked>
                                                                            <label class="btn btn-outline-primary"
                                                                                for="vbtn-radio2">NEUTRAL</label>
                                                                            <input type="radio" disabled
                                                                                class="btn-check" name="rating_type"
                                                                                id="vbtn-radio3">
                                                                            <label class="btn btn-outline-primary"
                                                                                for="vbtn-radio3">POOR</label>
                                                                        </div>

                                                                        <p class="text-muted mb-0 mt-2">3 Pointer Scale
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-check card-radio card card-light card-animate">
                                                            <input id="numeric_rating" name="rating" type="radio"
                                                                value="Numeric" class="form-check-input">
                                                            <label class="form-check-label" for="numeric_rating">
                                                                <div class="card-body">
                                                                    <div class="text-center">
                                                                        <p class="text-secondary fs-20">00<span
                                                                                class="text-muted">/10</span></p>
                                                                        <p class="text-muted mb-0 mt-2">Numeric Scale
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="accordion custom-accordionwithicon accordion-primary mb-3"
                                                    id="accordionWithicon">
                                                    <div class="accordion-item">
                                                        <h2 class="p-2 mb-0 bg-light" id="accordionwithiconExample1">
                                                            <div
                                                                class="d-flex justify-content-between p-2 align-items-center">

                                                                <div id="basic-rater" dir="ltr" class="star-rating"
                                                                    data-rating="3"
                                                                    style="width: 65px; height: 12px; background-size: 13px"
                                                                    title="1/5">
                                                                    <div class="star-value"
                                                                        style="background-size: 13px; width: 60%;">
                                                                    </div>
                                                                </div>
                                                                <i class="ri-close-line fs-19 align-top" onclick="remove_section(event)"></i>
                                                            </div>

                                                        </h2>
                                                        <div id="questionone" class="accordion-collapse collapse show"
                                                            aria-labelledby="accordionwithiconExample1"
                                                            data-bs-parent="#accordionWithicon">
                                                            <div class="accordion-body">
                                                                <div id="fields">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                required="" name="options[]"
                                                                                placeholder="Add a competency to assess"
                                                                                onkeyup="update_label(event)">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select class="form-select "
                                                                                id="rating_comments"
                                                                                name="options_output[]"
                                                                                aria-label="Default select example">
                                                                                <option value="Rating" selected>Only
                                                                                    Rating
                                                                                </option>
                                                                                <option value="RatingComment">Rating
                                                                                    With
                                                                                    Comments
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div id="rating_with_comments">
                                                                        <div class="row ">
                                                                            <div class="col-lg-12">
                                                                                <textarea name="options_hint[]" required placeholder="A short hint to interviewer" class="form-control"
                                                                                    name="" cols="30" rows="2"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="mb-3 dynamic-insert-row">
                                                    <button class="btn btn-light" id="add_more_rating" type="button">Add
                                                        More Competencies</button>
                                                </div>


                                            </div>

                                        </div>
                                    </div>

                                    <div class="card ribbon-box border shadow-none mb-2" id="create_questionare">
                                        <div class="card-header align-items-center d-flex">
                                            <div class="flex-grow-1">
                                                <div class="ribbon ribbon-primary round-shape mt-2">Additional Question
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">
                                                    {{-- <label for="form-grid-showcode"
                                                        class="form-label text-muted font-11"><b>Change order of
                                                            questions</b>
                                                    </label>
                                                    <input class="form-check-input code-switcher" type="checkbox"
                                                        id="form-grid-showcode" checked> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" id="more_question">
                                            <div class="d-none live-preview">

                                            </div>
                                            <div class="code-view">
                                                <div class=" ">
                                                    <div class="accordion custom-accordionwithicon accordion-info mb-3 random"
                                                        id="accordionWithicon">
                                                        <form action="{{ route('job_questionaire_post') }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionwithiconExample1">
                                                                    <button class="accordion-button question_section"
                                                                        type="button" data-bs-toggle="collapse"
                                                                        data-bs-target="#questionone11"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_iconExamplecollapse1">
                                                                        <i class="ri-question-line me-2 font-18"></i><span
                                                                            class="font-18">Question</span>
                                                                    </button>
                                                                </h2>
                                                                <div id="questionone"
                                                                    class="accordion-collapse collapse show"
                                                                    aria-labelledby="accordionwithiconExample1"
                                                                    data-bs-parent="#accordionWithicon">
                                                                    <div class="accordion-body">
                                                                        <div class="row mb-3">
                                                                            <label for="inputEmail3"
                                                                                class="col-4 col-xl-2 col-form-label">Question</label>
                                                                            <div class="col-8 col-xl-10">
                                                                                <textarea class="form-control validation_textarea question_label" onkeyup="update_label(event)"
                                                                                    placeholder="" name="question"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3 down-option">
                                                                            <label for="inputEmail3"
                                                                                class="col-4 col-xl-2 col-form-label">Field
                                                                                Type</label>
                                                                            <div class="col-8 col-xl-10">
                                                                                <select
                                                                                    class="form-select js-example-basic-single"
                                                                                    id="choose_item"
                                                                                    onchange="update_option(event)"
                                                                                    name="field_type">
                                                                                    <option value="1" disabled
                                                                                        selected>Select</option>
                                                                                    <option value="Yes/No">Yes/No</option>
                                                                                    <option value="Confirm">Confirm
                                                                                    </option>
                                                                                    <option value="Single Line">Single Line
                                                                                    </option>
                                                                                    <option value="Paragraph">Paragraph
                                                                                    </option>
                                                                                    <option value="Single Choice">Single
                                                                                        Choice</option>
                                                                                    <option value="Multiple Choice">
                                                                                        Multiple Choice</option>
                                                                                    <option value="Number">Number</option>
                                                                                    <option value="Email Address">Email
                                                                                        Address</option>
                                                                                    <option value="Date">Date</option>
                                                                                    <option value="Time">Time</option>
                                                                                </select>
                                                                                <small class="text-muted font-10">Choose
                                                                                    the type of field you
                                                                                    wish
                                                                                    to add</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="set_name" id="set-name">
                                                            <input type="hidden" name="job_id"
                                                                value="{{ $job_id }}">
                                                        </form>
                                                    </div>

                                                    <div class="btn-fields">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-6 ">
                                                                <button type="button"
                                                                    class="btn btn-info btn-border add-question-btn"
                                                                    id="add_question">Add Question</button>
                                                            </div>
                                                            <div class="col-lg-6 text-lg-end">
                                                                <button type="button"
                                                                    class="btn btn-light btn-icon waves-effect delete-fields"
                                                                    id="delete_generated_row"><i
                                                                        class="ri-delete-bin-6-line "></i></button>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                               
                                            </div>

                                        </div>


                                    </div>

                                    <div class="card ribbon-box border shadow-none  mb-2">
                                        <div class="card-header align-items-center d-flex mb-1">
                                            <div class="flex-grow-1">
                                                <div class="ribbon ribbon-primary round-shape mt-2">Recommendations</div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">
                                                    <label for="form-grid-showcode"
                                                        class="form-label text-muted font-11"><b>Allow Neutral</b>
                                                    </label>
                                                    <input class="form-check-input code-switcher" id="change_neutral"
                                                        name="neutral_type" value="Yes" type="checkbox" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            {{-- if allow neutral --}}
                                            <div id="neutral">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-success btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-up-line label-icon align-middle fs-16 me-2"></i>Strong
                                                                Hire</button>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-success btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-up-line label-icon align-middle fs-16 me-2"></i>Hire</button>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-warning btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-error-warning-line label-icon align-middle fs-16 me-2"></i>Neutral</button>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-danger btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-down-line label-icon align-middle fs-16 me-2"></i>No
                                                                Hire</button>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-danger btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-down-line label-icon align-middle fs-16 me-2"></i>Strong
                                                                No Hire</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end of if allow neutral --}}

                                            {{-- if no neutral --}}
                                            <div id="no-neutral" class="d-none">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-success btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-up-line label-icon align-middle fs-16 me-2"></i>Strong
                                                                Hire</button>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-success btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-up-line label-icon align-middle fs-16 me-2"></i>Hire</button>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-danger btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-down-line label-icon align-middle fs-16 me-2"></i>No
                                                                Hire</button>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card card-animate">
                                                            <button type="button"
                                                                class="btn btn-danger btn-lg btn-label waves-effect waves-light"><i
                                                                    class="ri-thumb-down-line label-icon align-middle fs-16 me-2"></i>Strong
                                                                No Hire</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end of if no neutral --}}



                                        </div>
                                    </div>

                                    <div class="card ribbon-box border shadow-none  mb-2">
                                        <div class="card-header align-items-center d-flex mb-1">
                                            <div class="flex-grow-1">
                                                <div class="ribbon ribbon-primary round-shape mt-2">Overall Comments</div>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">
                                                    <label for="form-grid-showcode"
                                                        class="form-label text-muted font-11"><b>Minimum
                                                            characters required</b>
                                                    </label>
                                                    <input type="checkbox" class="form-check-input counter_checked"
                                                        name="comments_min_required" value="50" checked>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">

                                            <textarea class="form-control mb-2" rows="5" disabled
                                                placeholder="The Interviewer will have to share overall comments of the interview in this format (If minimum characters required selected)"></textarea>


                                            <div class="row mt-4">
                                                <div class="col-lg-6">
                                                    <button onclick="history.back()"
                                                        class="btn btn-light btn-border me-3">Back</button>
                                                </div>
                                                <div class="col-lg-6 text-lg-end">
                                                    <a href="{{ url('job-hiring-team') }}/{{ $job_id }}"><button
                                                            class="btn btn-light btn-border me-3" type="button">Skip</button></a>
                                                    <button class="btn btn-primary btn-border" id="submit-new"
                                                        {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>Save
                                                        &amp;
                                                        Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-3">

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
@endsection
@section('script')
    <!-- rater-js plugin -->
    <script src="{{ asset('assets/libs/rater-js/index.js') }}"></script>
    <!-- rating init -->
    <script src="{{ asset('assets/js/pages/rating.init.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2.init.js') }}"></script>
    <script>
        $('#submit-exist').click(function (e) { 
            e.preventDefault();
           if($('#templates_id').val()==null){
                Snackbar.show({
                    text: 'Select atleast one scorecard template',
                    pos: 'bottom-center'
                });
            }else{
                $(this).parents('form').submit();
            }
        });
        // show hide card 
        $('#show_template').on('change', function() {
            $('#hide_enablecard').hide(300);
            $('#template_show').show(300);
            $('#create_questionare').hide(300);

        });
        $('#show_create_new').on('change', function() {
            $('#template_show').hide(300);
            $('#hide_enablecard').show(300);
            $('#create_questionare').show(300);

        });
        // get value 
        $('.validation_textarea').on('keyup', function() {
            var textareaVal = $(this).val();
            $('.question_section').html('<i class="ri-question-line me-2 font-18"></i>' + textareaVal);
        });
        //counter checked
        $('.counter_checked').on('change', function() {
            if ($(this).is(':checked')) {
                $('.charNxum').css('display', 'block');
            } else {
                $('.charNxum').css('display', 'none');

            }
        });
        //counter//
        function countChar(val) {
            var len = val.value.length;
            if (len >= 500) {
                val.value = val.value.substring(0, 500);
            } else {
                $('.charNxum').text(500 - len);
            }
        };


        // create append
        $('#add_more_single_choice').on('click', function() {

            $('#input_fields').append(
                '<div class="row mt-2 "id="remove-div"><div class="col-6 col-xl-2"></div><div class="col-8 col-xl-10 remove-fields"><div class="row"><div class="col-6 col-xl-8"> <input type="text" class="form-control" id="basiInput" ></div><div class="col-8 col-xl-4"><div class="d-flex"><div class="me-1"><select class="form-select yes_no_select js-example-basic-single" disabled><option value="1">Select</option><option value="1">Move to Sortlisted</option> <option value="1">Move to Rejected</option></select></div> <div class=""><button type="button" id="button_morefield" class="btn btn-light btn-icon waves-effect delete-fields "><i class="ri-delete-bin-6-line "></i></button></div></div></div></div></div>'
            );

        });
        //Disable and Enable
        $('.yes_no_select').attr('disabled', 'disabled');
        $('.automation_yes_no').on('change', function() {
            if ($(this).is(':checked')) {
                $('.yes_no_select').removeAttr('disabled', 'disabled');
            } else {
                $('.yes_no_select').attr('disabled', 'disabled');

            }
        });
        // neutral-hide
        $('#change_neutral').change(function(e) {
            if ($(this).is(':checked')) {
                $('#neutral').removeClass('d-none')
                $('#no-neutral').addClass('d-none')

            } else {
                $('#neutral').addClass('d-none')
                $('#no-neutral').removeClass('d-none')
            }
        });
        // create append
        $('#add_more_rating').on('click', function(e) {
            e.preventDefault();
            var add_section = `<div class="accordion custom-accordionwithicon accordion-primary mb-3"
                                                    id="accordionWithicon">
                                                    <div class="accordion-item">
                                                        <h2 class="p-2 mb-0 bg-light" id="accordionwithiconExample1">
                                                            <div
                                                                class="d-flex justify-content-between p-2 align-items-center">

                                                                <div id="basic-rater" dir="ltr" class="star-rating"
                                                                    data-rating="3"
                                                                    style="width: 65px; height: 12px; background-size: 13px"
                                                                    title="1/5">
                                                                    <div class="star-value"
                                                                        style="background-size: 13px; width: 60%;">
                                                                    </div>
                                                                </div>
                                                                <i class="ri-close-line fs-19 align-top"
                                                                    onclick="remove_section(event)"></i>
                                                            </div>

                                                        </h2>
                                                        <div id="questionone" class="accordion-collapse collapse show"
                                                            aria-labelledby="accordionwithiconExample1"
                                                            data-bs-parent="#accordionWithicon">
                                                            <div class="accordion-body">
                                                                <div id="fields">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control"
                                                                                required="" name="options[]"
                                                                                placeholder="Add a competency to assess"
                                                                                onkeyup="update_label(event)">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <select class="form-select "
                                                                                id="rating_comments"
                                                                                name="options_output[]"
                                                                                aria-label="Default select example">
                                                                                <option value="Rating" selected>Only
                                                                                    Rating
                                                                                </option>
                                                                                <option value="RatingComment">Rating
                                                                                    With
                                                                                    Comments
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div id="rating_with_comments">
                                                                        <div class="row ">
                                                                            <div class="col-lg-12">
                                                                                <textarea name="options_hint[]" required placeholder="A short hint to interviewer" class="form-control" name=""
                                                                                    cols="30" rows="2"></textarea>
                                                                            </div>
                                                                        </div>

                                                                    </div>


                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>`;
            if ($(this).parents('.dynamic-insert-row').prev('.accordion').length == 0) {
                $(this).parents('.dynamic-insert-row').before(add_section);
            } else {
                $(this).parents('.dynamic-insert-row').prev().after(add_section);
                $(this).parents('.dynamic-insert-row').prev().hide().show(300);
            }
        });

        function update_label(e) {

            $(e.target).parents('.accordion-collapse').prev('h2').find('span').text($(e.target).val())
        }

        function remove_section(e) {
            // $(e.target).closest('.accordion').hide(300);
            $(e.target).closest('.accordion').remove();
        }
        
        //add atachment  
        $("#open_file").on('click', function() {
            $("#add_more_attachment").show(300);
            $("#open_file").hide(300);

        })
        //add atachment1 
        $("#add_more").on('click', function() {
            $("#add_more_attachment1").toggle(300);


        })

        // script for additional question 
        var add_new_question = `<div class="accordion custom-accordionwithicon accordion-info mb-3 random"
                                    id="accordionWithicon">
                                    <form action="{{ route('job_questionaire_post') }}" method="post">
                                            {{ csrf_field() }}
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="accordionwithiconExample1">
                                            <button class="accordion-button question_section" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#questionone11"
                                                aria-expanded="true" aria-controls="accor_iconExamplecollapse1">
                                                <i class="ri-question-line me-2 font-18"></i><span
                                                    class="font-18">Question</span>
                                            </button>
                                        </h2>
                                        <div id="questionone" class="accordion-collapse collapse show"
                                            aria-labelledby="accordionwithiconExample1"
                                            data-bs-parent="#accordionWithicon">
                                            <div class="accordion-body">
                                                <div class="row mb-3">
                                                    <label for="inputEmail3"
                                                        class="col-4 col-xl-2 col-form-label">Question</label>
                                                    <div class="col-8 col-xl-10">
                                                        <textarea class="form-control validation_textarea question_label" onkeyup="update_label(event)"
                                                            placeholder="" name="question"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3 down-option">
                                                    <label for="inputEmail3" class="col-4 col-xl-2 col-form-label">Field
                                                        Type</label>
                                                    <div class="col-8 col-xl-10">
                                                        <select class="form-select js-example-basic-single" id="choose_item"
                                                            onchange="update_option(event)"  name="field_type">
                                                            <option value="1" disabled selected>Select</option>
                                                            <option value="Yes/No">Yes/No</option>
                                                            <option value="Confirm">Confirm</option>
                                                            <option value="Single Line">Single Line</option>
                                                            <option value="Paragraph">Paragraph</option>
                                                            <option value="Single Choice">Single Choice</option>
                                                            <option value="Multiple Choice">Multiple Choice</option>
                                                            <option value="Number">Number</option>
                                                            <option value="Email Address">Email Address</option>
                                                            <option value="Date">Date</option>
                                                            <option value="Time">Time</option>
                                                        </select>
                                                        <small class="text-muted font-10">Choose the type of field you wish
                                                            to add</small>
                                                    </div>
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="set_name" id="set-name">
                                    <input type="hidden" name="job_id" value="{{ $job_id }}">
                                    </form>
                                </div>`;
     var yes_no = `<div class="mb-3 mt-3 random-option" id="option_field_yes_no" > <div class="required-field">
                                                        <div class="row mb-3">
                                                            <div class="col-8 col-xl-2">
                                                            </div>
                                                            <div class="col-8 col-xl-10">
                                                                <div class="row">
                                                                    <div class="col-6 col-xl-8">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox"
                                                                                class="form-check-input" name="is_required">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Required </label>
                                                                        </div>
                                                                        <small class="font-12">Make this field
                                                                            mandatory</small>
                                                                    </div>
                                                                    <div class="col-6 col-xl-4">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox" name="is_automation"
                                                                                class="form-check-input automation_yes_no" onclick="handle_automation(event)">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Automation</label>
                                                                        </div>
                                                                        <small class="font-12" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Enable this switch to take action based on candidates response to this question.">Enable
                                                                            this switch to take . . </small>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-xl-2">

                                                        </div>
                                                        <div class="col-8 col-xl-10">
                                                            <div class="">
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-6 col-xl-8">
                                                                        <label class="form-check-label"
                                                                            for="formradioRight5">
                                                                            If Response is selected as Yes
                                                                        </label>
                                                                    </div>
                                                                    <input type="hidden" name="option1" value="If Response is selected as Yes">
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_yes">
                                                                            <option value="">Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center">
                                                                    <div class="col-6 col-xl-8">
                                                                        <label class="form-check-label"
                                                                            for="formradioRight5">
                                                                            If Response is selected as No
                                                                        </label>
                                                                    </div>
                                                                    <input type="hidden" name="option2" value="If Response is selected as No">
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_no">
                                                                            <option value="">Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;

                                                var confirm = `<div class="mb-3 mt-3 random-option" id="option_field_confirm" >
                                                    <div class="required-field">
                                                        <div class="row mb-3">
                                                            <div class="col-8 col-xl-2">
                                                            </div>
                                                            <div class="col-8 col-xl-10">
                                                                <div class="row">
                                                                    <div class="col-6 col-xl-8">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox"
                                                                                class="form-check-input" name="is_required">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Required </label>
                                                                        </div>
                                                                        <small class="font-12">Make this field
                                                                            mandatory</small>
                                                                    </div>
                                                                    <div class="col-6 col-xl-4">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox" name="is_automation"
                                                                                class="form-check-input automation_yes_no" onclick="handle_automation(event)">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Automation</label>
                                                                        </div>
                                                                        <small class="font-12" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Enable this switch to take action based on candidates response to this question.">Enable
                                                                            this switch to take . . </small>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-xl-2">

                                                        </div>
                                                        <div class="col-8 col-xl-10">
                                                            <div class="">
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-6 col-xl-8">
                                                                        <label class="form-check-label"
                                                                            for="formradioRight5">
                                                                            If Response is Confirmed
                                                                        </label>
                                                                    </div>
                                                                    <input type="hidden" name="option1" value="If Response is Confirmed">
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_yes">
                                                                            <option value="">Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center">
                                                                    <div class="col-6 col-xl-8">
                                                                        <label class="form-check-label"
                                                                            for="formradioRight5">
                                                                            If Response is not confirmed
                                                                        </label>
                                                                    </div>
                                                                    <input type="hidden" name="option2" value="If Response is not confirmed">
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_no">
                                                                            <option value="">Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                                                var single_line = `<div class="required-field random-option" id="required_field" >
                                                    <div class="row mb-3">
                                                        <div class="col-8 col-xl-2">
                                                        </div>
                                                        <div class="col-8 col-xl-10">
                                                            <div class="row">
                                                                <div class="col-6 col-xl-8">
                                                                    <div class="form-check form-switch form-switch-md ">
                                                                        <input type="checkbox" class="form-check-input" name="is_required">
                                                                        <label class="form-check-label"
                                                                            for="customSwitchsizemd">Required </label>
                                                                    </div>
                                                                    <small class="font-12">Make this field
                                                                        mandatory</small>
                                                                </div>
                                                                <div class="col-6 col-xl-4">
                                                                    <div class="form-check form-switch form-switch-md ">
                                                                        <input type="checkbox" class="form-check-input"
                                                                            disabled name="is_automation">
                                                                        <label class="form-check-label"
                                                                            for="customSwitchsizemd">Automation</label>
                                                                    </div>
                                                                    <small class="font-12" data-bs-toggle="tooltip"
                                                                        data-bs-placement="top"
                                                                        title="Enable this switch to take action based on candidates response to this question.">Enable
                                                                        this switch to take . . </small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
                                                var single_choice = `<div class="mb-3 mt-3 random-option" id="option_fields" >
                                                    <div class="required-field">
                                                        <div class="row mb-3">
                                                            <div class="col-8 col-xl-2">
                                                            </div>
                                                            <div class="col-8 col-xl-10">
                                                                <div class="row">
                                                                    <div class="col-6 col-xl-8">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox"
                                                                                class="form-check-input" name="is_required">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Required </label>
                                                                        </div>
                                                                        <small class="font-12">Make this field
                                                                            mandatory</small>
                                                                    </div>
                                                                    <div class="col-6 col-xl-4">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox" name="is_automation"
                                                                                class="form-check-input automation_yes_no" onclick="single_choice_automation(event)">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Automation</label>
                                                                        </div>
                                                                        <small class="font-12" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Enable this switch to take action based on candidates response to this question.">Enable
                                                                            this switch to take . . </small>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="fields">
                                                        <div class="row mb-2">
                                                            <div class="col-6 col-xl-2">

                                                            </div>
                                                            <div class="col-8 col-xl-10">
                                                                <div class="row">
                                                                    <div class="col-6 col-xl-8">
                                                                        <input type="text" class="form-control"
                                                                            id="basiInput" name="single_choices_list[]">
                                                                    </div>
                                                                    <div class="col-6 col-xl-4">

                                                                        <select class="form-select yes_no_select js-example-basic-single" name="single_response[]" disabled>
                                                                            <option value="">Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-2 colxl-2">

                                                        </div>
                                                        <div class="col-8 col-xl-10">
                                                            <button class="btn btn-primary" id="add_more" onclick="add_option_row(event)"
                                                                type="button">Add More</button>
                                                        </div>
                                                    </div>

                                                </div>`;
                                                $('#delete_generated_row').click(function(e) {
            e.preventDefault();
            $(this).parents('.btn-fields').prev().remove();
        });
        var date = `<div class="mb-3 mt-3 random-option" id="option_field_date" >
                                                    <div class="required-field">
                                                        <div class="row mb-3">
                                                            <div class="col-8 col-xl-2">
                                                            </div>
                                                            <div class="col-8 col-xl-10">
                                                                <div class="row">
                                                                    <div class="col-6 col-xl-8">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox"
                                                                                class="form-check-input" name="is_required">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Required </label>
                                                                        </div>
                                                                        <small class="font-12">Make this field
                                                                            mandatory</small>
                                                                    </div>
                                                                    <div class="col-6 col-xl-4">
                                                                        <div class="form-check form-switch form-switch-md "
                                                                            dir="ltr">
                                                                            <input type="checkbox" name="is_automation"
                                                                                class="form-check-input automation_yes_no" onclick="handle_automation(event)">
                                                                            <label class="form-check-label"
                                                                                for="customSwitchsizemd">Automation</label>
                                                                        </div>
                                                                        <small class="font-12" data-bs-toggle="tooltip"
                                                                            data-bs-placement="top"
                                                                            title="Enable this switch to take action based on candidates response to this question.">Enable
                                                                            this switch to take . . </small>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 col-xl-2">

                                                        </div>
                                                        <div class="col-8 col-xl-10">
                                                            <div class="">
                                                                <div class="row mb-3 align-items-center">
                                                                    <div class="col-6 col-xl-8">
                                                                        <label class="form-check-label"
                                                                            for="formradioRight5">
                                                                            If Response is Greater Than Present Date
                                                                        </label>
                                                                        <input type="hidden" name="option1" value="If Response is Greater Than Present Date">
                                                                    </div>
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_yes">
                                                                            <option value="" >Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row align-items-center">
                                                                    <div class="col-6 col-xl-8">
                                                                        <label class="form-check-label"
                                                                            for="formradioRight5">
                                                                            If Response is Smaller Than Present Date
                                                                        </label>
                                                                    </div>
                                                                    <input type="hidden" name="option2" value="If Response is Smaller Than Present Date">
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_no">
                                                                            <option value="" >Select</option>
                                                                            <option value="Shortlisted">Move to Shortlisted
                                                                            </option>
                                                                            <option value="Rejected">Move to Rejected
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;


        function update_label(e) {
            $(e.target).parents('.accordion-collapse').prev('.accordion-header').find('span').text($(e.target).val())
        }
        var add_single_choices_row = `<div class="row mb-2 "id="remove-div">
            <div class="col-6 col-xl-2"></div>
            <div class="col-8 col-xl-10 remove-fields">
                <div class="row">
                    <div class="col-6 col-xl-8"> 
                        <input type="text" class="form-control" id="basiInput" name="single_choices_list[]">
                        </div>
                        <div class="col-8 col-xl-4">
                            <div class="d-flex">
                                <div class="me-1">
                                    <select class="form-select yes_no_select js-example-basic-single" name="single_response[]" disabled>
                                        <option value="">Select</option><option value="Shortlisted">Move to Shortlisted</option> 
                                        <option value="Rejected">Move to Rejected</option>
                                        </select>
                                        </div> 
                                        <div class=""><button class="btn btn-light btn-icon waves-effect delete-fields ">
                                            <i onclick="delete_single_rows(event)" class="ri-delete-bin-6-line "></i>
                                            </button>
                                            </div>
                                            </div>
                                            </div>
                                            </div>
                                            </div>`;
        
        $('#add_question').click(function(e) {
            e.preventDefault();
            if ($(this).parents('.btn-fields').prev().length == 0) {
                $(this).parents('.btn-fields').before(add_new_question);
            } else {
                $(this).parents('.btn-fields').prev().after(add_new_question)
                $(this).parents('.btn-fields').prev().hide().show(300);
            }
        });
        function update_option(e) {
            if ($(e.target).val() == "Yes/No") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(yes_no);
            } else if ($(e.target).val() == "Confirm") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(confirm);
            } else if ($(e.target).val() == "Single Line") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_line);
            } else if ($(e.target).val() == "Paragraph") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_line);
            } else if ($(e.target).val() == "Single Choice") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_choice);
            } else if ($(e.target).val() == "Multiple Choice") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_choice);
            } else if ($(e.target).val() == "Number") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_line);
            } else if ($(e.target).val() == "Email Address") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_line);
            } else if ($(e.target).val() == "Date") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(date);
            } else if ($(e.target).val() == "Time") {
                $(e.target).parents('.down-option').nextAll('div.random-option').remove()
                $(e.target).parents('.down-option').after(single_line);
            }

        }
        function handle_automation(e) {
            if ($(e.target).is(':checked')) {
                $(e.target).parents('.required-field').next('.row').find('select').prop('disabled', false)
            } else {
                $(e.target).parents('.required-field').next('.row').find('select').prop('disabled', true)
            }
        }

        function single_choice_automation(e) {
            if ($(e.target).is(':checked')) {
                $(e.target).parents('.required-field').nextAll('#fields').find('select').prop('disabled', false)
            } else {
                $(e.target).parents('.required-field').nextAll('#fields').find('select').prop('disabled', true)
            }
        }

        function add_option_row(e) {
            $(e.target).parents('.row').prev('#fields').children().last('.row').after(add_single_choices_row);
        }

        function delete_single_rows(e) {
            e.preventDefault();
            $(e.target).closest('.row').remove()
        }
        
    </script>
@endsection

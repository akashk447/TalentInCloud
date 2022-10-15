@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">QUESTIONNAIRE</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">Questionnaire</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="card mb-3">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Questionnaire</h4>

                        </div>
                        <div class="card-body">

                            <div class="row gy-4 mb-2">
                                <div class=" col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <!-- Custom Radio Color -->
                                                    <div class="form-check form-radio-primary mb-3">
                                                        <input class="form-check-input" type="radio"
                                                            onclick="showtemplate()" name="formradiocolor1"
                                                            id="show_template" checked>
                                                    </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <h6 class=""><b>Choose from Templates</b></h6>
                                                    <small class="text-muted"> Select an existing questionnaire
                                                        template.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class=" col-md-6">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <!-- Custom Radio Color -->
                                                    <div class="form-check form-radio-primary mb-3">
                                                        <input class="form-check-input" type="radio"
                                                            {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}
                                                            onclick="showcreatenew()" name="formradiocolor1"
                                                            id="show_create_new">

                                                    </div>
                                                </div>
                                                <div class="col-lg-11">
                                                    <h6 class=""><b>Create New</b></h6>
                                                    <small class="text-muted">Questionnaire attached only to this
                                                        job.</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('job_questionaire_templates_post') }}" method="post">
                                @csrf
                                <div class="template " id="template_show">
                                    <div class="mb-3">
                                        <label for="form-label" class="form-label text-muted font-11">Select Questionnaire
                                            Template </label>
                                        <select class="form-select js-example-basic-single" name="questionnaire_template_id"
                                            aria-label=".form-select-sm example"
                                            {{ Auth::user()->email_verify == 'No' || count($questionnaire_templates) == 0 ? 'disabled' : '' }}>
                                            @if (count($questionnaire_templates) == 0)
                                                <option value="sas" disabled selected> No Questionnaire Added</option>
                                            @else
                                                <option disabled {{ Auth::user()->email_verify == 'No' ? 'selected' : '' }}>
                                                    Select Questionnaire</option>
                                                @if (count($questionnaire_templates) > 0)
                                                    @foreach ($questionnaire_templates as $templates)
                                                        <option value="{{ $templates->question_set_id }}">
                                                            {{ $templates->question_set_name }}</option>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </select>
                                    </div>

                                    <!-- Secondary Alert -->
                                    @if (Auth::user()->email_verify == 'No')
                                        <div class="mb-3">
                                            <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label fade show"
                                                role="alert">
                                                <i class="ri-alert-line label-icon"></i>This feature is temporarily disabled
                                                on
                                                your account. Please confirm your email address to enable this feature.
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            <button onclick="history.back()"
                                                class="btn btn-light btn-border me-3">Back</button>
                                        </div>
                                        <div class="col-lg-6 text-lg-end">
                                            <a href="{{ url('job-attachment-scorecard') }}/{{ $job_id }}"><button
                                                    class="btn btn-light btn-border me-3">Skip</button></a>
                                            <button type="submit" class="btn btn-primary btn-border"
                                                {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>Save
                                                &amp; Next</button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="job_id1" id="job_id" value="{{ $job_id }}">
                            </form>
                            <div class="card card-info " id="hide_enablecard" style="display:none">
                                <div class="card-header align-items-center d-flex">
                                    <h2 class="card-title mb-0 flex-grow-1">Enable Automation</h2>
                                    <div class="flex-shrink-0">
                                        <div class="form-check form-switch form-switch-right form-switch-md">
                                            <label for="form-grid-showcode" class="form-label text-muted font-11"></label>
                                            <input class="form-check-input code-switcher" type="checkbox"
                                                id="form-grid-showcode">
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <p class="card-text font-13 text-white">Move candidates to the desired pipeline stage
                                        based on response to a single question or after successful completion of the
                                        questionnaire.</p>
                                    <div class="live-preview">

                                    </div>
                                    <div class="d-none code-view">
                                        <div class="row d-flex align-items-center mt-4">
                                            <div class="col-lg-7">
                                                <div class="mb-2">
                                                    <h5 class="text-white">Delay trigger of automation by</h5>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-6">
                                                <div class="mb-3">
                                                    <select class="form-control js-example-basic-single" id="choices-single-no-search"
                                                        name="choices-single-no-search" data-choices
                                                        data-choices-search-false data-choices-removeItem>
                                                        <option value="Zero">15 Minutes</option>
                                                        <option value="One">30 Minutes</option>
                                                        <option value="Two">1 Hour</option>
                                                        <option value="Three">4 Hours</option>
                                                        <option value="Four">1 day</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    {{-- <form action="{{route('job_questionaire_post')}}" method="post"> --}}
                    {{-- {{ csrf_field() }} --}}
                    <!-- <div class="app_card"> -->
                    <div class="card mb-3" id="create_questionare" style="display:none">
                        <div class="card-header align-items-center d-flex">
                            <div class="flex-grow-1">
                                <label for="">abcd</label>
                                <input type="text" class="form-control" placeholder="Set Questionnaire Name"
                                    name="question_set_name" id="question_set_name">
                            </div>

                        </div>
                        <div class="card-body" id="more_question">
                            <div class=" ">
                                <div class="accordion custom-accordionwithicon accordion-info mb-3 random"
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
                                                                placeholder="Required example textarea" name="question"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3 down-option">
                                                        <label for="inputEmail3"
                                                            class="col-4 col-xl-2 col-form-label">Field
                                                            Type</label>
                                                        <div class="col-8 col-xl-10">
                                                            <select class="form-select js-example-basic-single" id="choose_item"
                                                                onchange="update_option(event)" name="field_type">
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
                                                            <small class="text-muted font-10">Choose the type of field you
                                                                wish
                                                                to add</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="set_name" id="set-name">
                                        <input type="hidden" name="job_id" value="{{ $job_id }}">
                                    </form>
                                </div>

                                <div class="btn-fields">
                                    <div class="row mb-3">
                                        <div class="col-lg-6 ">
                                            <button class="btn btn-info btn-border add-question-btn" id="add_question">Add
                                                Question</button>
                                        </div>
                                        <div class="col-lg-6 text-lg-end">
                                            <button type="button"
                                                class="btn btn-light btn-icon waves-effect delete-fields"
                                                id="delete_generated_row"><i class="ri-delete-bin-6-line "></i></button>
                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                        <div class="row mt-4 p-3">
                            <div class="col-lg-6">
                                <button onclick="history.back()" class="btn btn-light btn-border me-3">Back</button>
                            </div>
                            <div class="col-lg-6 text-lg-end">
                                <a href="{{ url('job-attachment-scorecard') }}/{{ $job_id }}"><button
                                        class="btn btn-light btn-border me-3">Skip</button></a>
                                <button class="btn btn-primary btn-border" id="submit">Save
                                    &amp;
                                    Next</button>
                            </div>
                        </div>

                    </div>
                    {{-- </form> --}}
                    <!-- </div> -->
                </div>

            </div>
        </div>

    </div>
@endsection
@section('script')
<script src="{{asset('assets/js/pages/select2.init.js')}}"></script>

    <script>
        // show hide card 
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
                                                            placeholder="Required example textarea" name="question"></textarea>
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


        var yes_no = `<div class="mb-3 mt-3 random-option" id="option_field_yes_no" >
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
                                                                            If Response is selected as Yes
                                                                        </label>
                                                                    </div>
                                                                    <input type="hidden" name="option1" value="If Response is selected as Yes">
                                                                    <div class="col-6 col-xl-4">
                                                                        <select class="form-select yes_no_select js-example-basic-single" disabled name="answer_yes">
                                                                            <option value="">Select</option>
                                                                            <option value="Sourced">Move to Sourced
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
                                                                            <option value="Sourced">Move to Sourced
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

        $('#show_create_new').on('change', function() {
            $('#template_show').hide(300);
            $('#hide_enablecard').show(300);
            $('#create_questionare').show(300);
        });
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
                                                                            <option value="Sourced">Move to Sourced
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
                                                                            <option value="Sourced">Move to Sourced
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

        $('#show_template').on('change', function() {
            $('#hide_enablecard').hide(300);
            $('#template_show').show(300);
            $('#create_questionare').hide(300);
        });
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

        $('#add_question').click(function(e) {
            e.preventDefault();
            if ($(this).parents('.btn-fields').prev().length == 0) {
                $(this).parents('.btn-fields').before(add_new_question);
            } else {
                $(this).parents('.btn-fields').prev().after(add_new_question)
                $(this).parents('.btn-fields').prev().hide().show(300);
            }
        });
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
                                                                            <option value="Sourced">Move to Sourced
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
                                                                            <option value="Sourced">Move to Sourced
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
                                                                            <option value="Sourced">Move to Sourced
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
                                        <option value="">Select</option><option value="Sourced">Move to Sourced</option> 
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
        $('#submit').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if ($('#question_set_name').val() == "") {
                $('#question_set_name').focus();
                Snackbar.show({
                    text: 'Questionnaire name is required',
                    pos: 'bottom-center'
                });
            } else {

                var i = 0
                $('#set-name').val($('#question_set_name').val());
                topbar.show();
                var total_question = 0;
                var loop_question = 0;
                $('.accordion form').each(function() {
                    total_question = total_question + 1;
                });
                $('.accordion form').each(function() {
                    loop_question = loop_question + 1;
                    $(this).find('#set-name').val($('#question_set_name').val());
                    $.ajax({
                        type: "post",
                        url: "{{ route('job_questionaire_post') }}",
                        data: $(this).serialize(),
                        success: function(response) {
                            if (total_question == loop_question) {
                                topbar.hide();
                                location.href = "{{ url('job-attachment-scorecard') }}/" + $('#job_id').val();
                            }
                        }
                    });
                    // $(this).submit();
                });
            }
        });
    </script>
@endsection

@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">

                        <form action="{{route('view_applicant_update_selected_post')}}" method="POST">
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
                                <div class="col-lg-12"id="col-12">
                                    <div class="mb-3">
                                        <label for="basiInput" class="form-label">Interview Attend Status<span class="text-danger">*</span></label>
                                        <select class="form-select" name="profile_status" id="selected_candidate_status">
                                            <option value="" selected disabled>Select</option>
                                            <option value="Offered">Offered</option>
                                            <option value="Joined">Joined</option>
                                            <option value="Selected - Not Offered">Selected - Not Offered</option>
                                            <option value="Update Information">Update Information</option>
                                            <option value="Did Not Join (Not Interested)">Did Not Join (Not Interested)</option>
                                            <option value="On Hold">On Hold</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4" style="display:none" id="selected_offered">
                                    <div class="mb-3">
                                        <label for="basiInput" class="form-label">Offered<span class="text-danger">*</span></label>
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
                            <div style="display:none" id="candidate_joined">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="mb-3">
                                            <label for="basiInput" class="form-label">Offered Position<span class="text-danger">*</span></label>
                                            <input name="joined_offer_position" type="text" class="form-control border border-primary" id="basiInput">
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basiInput" class="form-label">Offered CTC<span class="text-danger">*</span></label>
                                            <input name="joined_offer_ctc" type="text" class="form-control  border border-primary" id="basiInput">
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basiInput" class="form-label">Date Of Joining<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text border border-primary bg-primary" id="basic-addon1" style="height:36px"><i class="ri-calendar-2-line fs-15 text-light"></i></span>
                                                <input name="joined_offer_doj" type="text" class="form-control flatpickr-input active border border-primary" data-provider="flatpickr" placeholder="DD-MM-YYY" data-date-format="d M, Y" aria-label="Phone Number" maxlength="10" aria-describedby="basic-addon1" style="height:36px">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basiInput" class="form-label">Employee Code<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input name="joined_offer_emp_code" type="text" class="form-control border border-primary" style="height:36px">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="basiInput" class="form-label">Send Link's<span class="text-danger">*</span></label>
                                            <div class="form-group">
                                                <div class="btn-group btn-group-sm d-flex " role="group" aria-label="Horizontal radio toggle button group">
                                                    <input type="checkbox" class="btn-check " name="candidate_joined_link" id="candidate_joined_send_mail_link" checked>
                                                    <label class="j_priority btn btn-outline-primary p-1" for="candidate_joined_send_mail_link" data-bs-toggle="tooltip" title="Send Mail">
                                                        <i class="ri-mail-line fs-16 "></i>
                                                    </label>
                                                    <input type="checkbox" class="btn-check " name="statcandidate_joined_link" id="candidate_joined_send_message_link" disabled>
                                                    <label class="j_priority btn btn-outline-primary p-1" for="candidate_joined_send_message_link" data-bs-toggle="tooltip" title="Send Message">
                                                        <i class="ri-message-2-line fs-16"></i>
                                                    </label>
                                                    <input type="checkbox" class="btn-check " name="statcandidate_joined_link" id="candidate_joined_send_whatspp_link" disabled>
                                                    <label class="j_priority btn btn-outline-primary p-1" for="candidate_joined_send_whatspp_link" data-bs-toggle="tooltip" title="Send Whatspp">
                                                        <i class="ri-whatsapp-line fs-16"></i>
                                                    </label>
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
                                <button type="button" class="btn btn-light btn-border w-lg btn-md me-2">Cancel</button>
                                <button type="submit" class="btn btn-primary btn-border w-lg me-2 btn-md">Update</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>
        @php
        $user_detials = get_owner_details($get_jobowner_details->job_posted_by_userid);
        @endphp
    </div>
</div>
@endsection
@section('script')
<!-- quill js -->
<script src="{{asset('assets/libs/quill/quill.min.js')}}"></script>
<!-- init js -->
{{-- <script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script> --}}
<script>
    var bubbleEditor = document.querySelectorAll(".bubble-editor")
    if (bubbleEditor) {
        Array.from(bubbleEditor).forEach(function(element) {
            var bubbleEditorData = {
                placeholder: 'This message is visible to the Client and Account Manager. Please DO NOT use unprofessional language. For any Escalations or urgent queries, please contact your Account Manager ({{ $user_detials->email }} / {{ $user_detials->phone }})'

            };
            var isbubbleEditorVal = element.classList.contains("bubble-editor");
            if (isbubbleEditorVal == true) {
                bubbleEditorData.theme = 'bubble'
            }
            new Quill(element, bubbleEditorData);
        });
    }
</script>
<script>
    //add class remove class
    $(document).ready(function() {
        $('#selected_candidate_status').on('change', function() {
            if ($(this).val() == "Offered" ) {
                $('#col-12').removeClass('col-lg-12');
                $('#col-12').addClass('col-lg-8');
                $('#selected_offered').css('display', 'inline-block');
            } else {
                $('#col-12').removeClass('col-lg-8');
                $('#col-12').addClass('col-lg-12');
                $('#selected_offered').css('display', 'none');

            }
        });
    });
    //update candidate status
    $("#selected_candidate_status").on("change", function() {
        var updatecandidatestatus = $("#selected_candidate_status").val();
        if (updatecandidatestatus == "Offered") {
            $('#selected_offered').show(300);
            $('#candidate_joined').hide();
            $('#secondary_offered_released').hide();
        }
        if (updatecandidatestatus == "Joined") {
            $('#candidate_joined').show(300);
            $('#selected_offered').hide();
            $('#secondary_offered_released').hide();
        }
        if (updatecandidatestatus == "Update Information" || updatecandidatestatus == "No Show" || updatecandidatestatus == "Did Not Attented" || updatecandidatestatus == "On Hold") {
            $('#candidate_joined').hide();
            $('#selected_offered').hide();
            $('#secondary_offered_released').hide();
        }

    })
    //offered_released_candidate_type
    $("#offered_released_candidate_type").on("change", function() {
        var offeredcandidatestatus = $("#offered_released_candidate_type").val();
        if (offeredcandidatestatus == "Offer Released" || offeredcandidatestatus == "Offer Accepted") {
            $('#secondary_offered_released').show(300);
        }
        if (offeredcandidatestatus == "Offer Declined") {
            $('#secondary_offered_released').hide();
        }
    })
</script>
@endsection
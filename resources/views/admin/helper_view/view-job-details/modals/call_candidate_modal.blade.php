<div class="modal fade zoomIn" data-bs-backdrop="static" id="callcandidate" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content tele-candi-call "
            style="background-image:url({{ asset('assets/images/candidate-bg.jpg') }});">
            <div class="d-flex justify-content-between ms-2 me-3 mt-1">
                <div class="tele-candi-fee "> Call Manager Assistant</div>
                <div class="tele-candi-fee font-w-500"><span><i class="mdi mdi-phone-in-talk-outline fs-20 "
                            ta-bs-container="#tooltip-container" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="" data-bs-original-title="Previous Status : Connected"></i></span>
                </div>
            </div>
            <div class="modal-body">
                <form action="{{route('call_screening_modal_post')}}" method="post">
                    @csrf
                    <input type="hidden" name="call_start_time_modal" value="{{ today_time() }}">
                <div class="align-items-center">
                    <div class="text-center">
                        <i class="ri-headphone-line text-white" style="font-size:60px"></i>
                        <h1 class="font-w-600 mt-2 text-white" id="caller_name"></h1>
                        <div class="d-flex justify-content-center mt-2">
                            <h1 class="font-w-600  text-white" id="caller_phone"><i
                                    class="mdi mdi-phone-outline fs-22 me-1"></i>
                            </h1>
                        </div>
                        
                        <div class="d-flex justify-content-between mt-2">

                            <div class="form-check form-radio-info mb-1">
                                <input type="radio" name="call_status" id="status1" value="Connected"
                                    class="form-check-input" checked>
                                <label for="call-waiting" class="text-white fs-13">Connected</label>
                            </div>
                            <div class="form-check form-radio-info mb-1">
                                <input type="radio" name="call_status" id="status2" value="Call Wait"
                                    class="form-check-input">
                                <label for="call-waiting" class="text-white fs-13">Call Wait / Num Busy</label>
                            </div>
                            <div class="form-check form-radio-info mb-1">
                                <input type="radio" name="call_status" id="status3" value="Switch Off"
                                    class="form-check-input">
                                <label for="switch-off" class="text-white fs-13">Switch Off</label>
                            </div>
                            <div class="form-check form-radio-info mb-1">
                                <input type="radio" name="call_status" id="status4" value="No Response"
                                    class="form-check-input">
                                <label for="no-response" class="text-white fs-13">No Response</label>
                            </div>
                            <div class="form-check form-radio-info mb-1">
                                <input type="radio" name="call_status" id="status5" value="Not Reachable"
                                    class="form-check-input">
                                <label for="not-reachable" class="text-white fs-13">Not Reachable</label>
                            </div>
                            <div class="form-check form-radio-info mb-1">
                                <input type="radio" name="call_status" id="status6" value="Not In Service"
                                    class="form-check-input">
                                <label for="not-in-service" class="text-white fs-13">Not In Service</label>
                            </div>
                            <input type="hidden" name="post_screen_id" id="post_screen_id" value="">
                        </div>

                    </div>
                </div>
                
                    <div class="tele-candi-button d-flex align-items-start justify-content-between mt-3">
                        <a href="javascript:;" data-bs-dismiss="modal" class="site-button outline-white">Cancel</a>
                        <a href="#" class="site-button outline-white" id="drop_candidate">Drop This
                            Candidate</a>
                        <a {{-- href="http://127.0.0.1:8000/view-job-details/job-i6kpa6" --}} id="proceedBtn" class="site-button outline-white">Proceed</a>
                        <button type="submit" id="submitBtn" class="site-button outline-white d-none">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

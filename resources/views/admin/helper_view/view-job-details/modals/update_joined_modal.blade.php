<div class="modal fade zoomIn" id="update_joined_modal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-header login-modal p-3">
                <h3 class="text-white mb-0 fs-14">Update Joining Details</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pb-0">
                <form action="{{route('update_joined_update_details')}}" method="post" id="submit_update_joined">
                    @csrf
                    <input type="hidden" name="joined_applicant_key" id="joined_applicant_key">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="basiInput" class="form-label">Offered Position<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control border border-primary" id="joined_offer_position" name="joined_offer_position">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basiInput" class="form-label">Offered CTC<span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control  border border-primary" id="joined_offer_ctc" name="joined_offer_ctc">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basiInput" class="form-label">Employee Code<span
                                                class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border border-primary"style="height:36px" id="joined_offer_emp_code" name="joined_offer_emp_code">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="basiInput" class="form-label">Date Of Joining<span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text border border-primary bg-primary" id="basic-addon1"
                                        style="height:36px"><i class="ri-calendar-2-line fs-15 text-light"></i></span>
                                    <input type="text" id="joined_offer_doj" name="joined_offer_doj"
                                        class="form-control flatpickr-input active border border-primary"
                                        data-provider="flatpickr" data-date-format="d M Y"
                                        style="height:36px" readonly="readonly">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="basiInput" class="form-label">Notes <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="" id="" cols="3" rows="3" id="joined_offer_notes" name="joined_offer_notes"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3 text-center">
                                <button type="button" id="update_joined_details" class="btn btn-border btn-primary w-lg">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!--end col-->
    </div>


</div>

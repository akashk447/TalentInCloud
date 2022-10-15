<div id="joined_abscond_modal" data-bs-backdrop="static" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden">
            <div class="modal-header login-modal p-3">
                <h5 class=" text-white mb-0 fs-14" id="zoomInModalLabel">Update Joining Abscond Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body p-3">

                <form action="{{route('update_joined_abscond_last_working')}}" method="POST" id="submit_joined_abscond">
                    @csrf
                    <input type="hidden" name="applicant_key" value="" id="applicant_key">
                    <div class="mb-3">
                        <label class="form-group" for="for-label">Last Working Day<span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line fs-15 text-primary"></i></span>
                            <input type="text" id="joining_abscond_date" name="joining_abscond_date" class="form-control flatpickr-input active" data-provider="flatpickr" placeholder="DD-MM-YYYY" data-date-format="d M Y">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-group" for="for-label">Notes <span class="text-danger">*</span></label>
                        <textarea name="notes" id="" cols="3" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="text-center">
                        <button type="button" id="update_joined_abscond" class="btn btn-primary w-lg">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
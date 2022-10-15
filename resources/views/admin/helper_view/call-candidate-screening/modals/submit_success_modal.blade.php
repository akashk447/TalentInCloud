{{-- This modal will only display on submit to quality and submitted to quality in another job  --}}
<div id="submit_candidate_success" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center ">
                <div class="text-end">
                    <a href="{{route('view_job_details_tab',['jobid'=>$job_id,'ctab'=>"pool"])}}"> <button type="button" class="btn-close text-end"  aria-label="Close"></button></a>
                </div>
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="hover" style="width:150px;height:150px">
                    </lord-icon>
                    <h4 class="mb-3 mt-3 fs-20">Candidate Profile Submitted</h4>
                    <p class="text-muted fs-14 mb-3"> The submitted Profile will go through additional Duplication Checks and screnning by Client</p>
                    <p class="text-muted fs-14 mb-0"> For any Clarification Contact your job Manager </p>
                    <p class="text-muted fs-14 mb-4"> {{ $get_job_owner_details->name }}, {{ $get_job_owner_details->email }} </p>
                    <div class="hstack gap-2 justify-content-center">
                       <a href="{{route('view_job_details_tab',['jobid'=>$job_id,'ctab'=>"pool"])}}"><button class="btn btn-primary"> Submit Another Resume</button></a>
                       <a href="{{route('manage_jobs')}}"> <button class="btn btn-soft-success"><i class="ri-links-line align-bottom"></i> View Active Jobs</button></a>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-light p-3 justify-content-center">
                <p class="mb-0 text-muted">You like our service? <a href="javascript:void(0)" class="link-secondary fw-semibold" data-bs-target="#secondmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Invite Friends</a></p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
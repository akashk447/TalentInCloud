<div class="mt-3 ms-3 me-3" id="submitted_info" style="display:none">
    <div class="ms-3 me-3">
        <div class="table-responsive table-card mb-1">
            @if ($count_submitted_candidate > 0)
                <table class="table align-middle" id="customerTable">
                    <thead class="table-light text-muted">
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="checkAll"
                                        onclick="checkall(event)" value="option">
                                </div>
                            </th>

                            <th class="sort" data-sort="customer_name">Candidate
                            </th>
                            <th class="sort" data-sort="email">
                                Email</th>
                            <th class="sort" data-sort="phone">
                                Phone</th>

                            <th class="sort" data-sort="status">
                                Status</th>
                            <th class="sort" data-sort="action">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        @foreach ($get_all_job_applicants as $source_candidate)
                            @if (in_array($source_candidate->applicant_status,get_all_submitted_applicant_status_list()))
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                value="{{ $source_candidate->candidate_id }}" type="checkbox"
                                                name="chk_child">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary"></a>
                                    </td>
                                    <td class="customer_name">
                                        <a target="_blank"
                                            href="{{ route('view_applicant', ['applikey' => $source_candidate->applicant_key]) }}">
                                            {{ $source_candidate->candidate_name == '' || $source_candidate->candidate_name == null ? 'Anonymous' : $source_candidate->candidate_name }}</a>
                                    </td>
                                    <td class="email">
                                        {{ $source_candidate->candidate_email == '' || $source_candidate->candidate_email == null ? 'NA' : $source_candidate->candidate_email }}
                                    </td>
                                    <td class="phone">
                                        {{ $source_candidate->candidate_phone == '' || $source_candidate->candidate_phone == null ? 'NA' : $source_candidate->candidate_phone }}
                                    </td>

                                    <td class="status"><span
                                            class="badge badge-soft-success text-uppercase">{{ $source_candidate->applicant_status }}</span>
                                    </td>
                                    <input type="hidden" name="" id="resume_id"
                                        value="{{ $source_candidate->candidate_resume }}">
                                    <input type="hidden" name="" id="screen_id"
                                        value="{{ $source_candidate->screen_id }}">
                                    <td style="text-align: center">
                                        @if (in_array($source_candidate->applicant_status,get_submitted_applicant_status_list()) || in_array($source_candidate->applicant_status,get_submitted_profile_shortlisted_applicant_status_list()))
                                            <a href="{{ route('view_applicant_update_submittal', ['applikey' => $source_candidate->applicant_key]) }}"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                title="Change Status For {{ $source_candidate->candidate_name }}">
                                                <button class="btn btn-soft-secondary btn-sm " type="button"data-bs-toggle="tooltip" title="Update">
                                                    <i class="ri-edit-fill align-middle me-1"></i><span class="fs-10">Update</span>
                                                </button>
                                            </a>
                                        @endif
                                        @if (in_array($source_candidate->applicant_status,get_submitted_snoozed_status_list()))
                                            <a href="#"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                title="Change Status For {{ $source_candidate->candidate_name }}">
                                                <button class="btn btn-soft-secondary btn-sm " type="button"data-bs-toggle="tooltip" title="Update">
                                                    <i class="ri-edit-fill align-middle me-1"></i><span class="fs-10">Update</span>
                                                </button>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
            @if ($count_submitted_candidate == 0)
                <div class="noresult">
                    <div class="text-center">
                        <lord-icon class="mt-5" src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                            colors="primary:#121331,secondary:#08a88a" style="width:50px;height:50px">
                        </lord-icon>
                        <h5 class="mt-4">Sorry! No Candidate Found</h5>
                        <p class="text-muted mb-5"> We
                            did not find any
                            selected candidate for this job.</p>
                    </div>
                </div>
            @endif
        </div>
        @if ($count_submitted_candidate != 0)
            <div class="d-flex justify-content-end mb-3">
                <div class="pagination-wrap hstack gap-2">
                    <a class="page-item pagination-prev disabled" href="#">
                        Previous
                    </a>
                    <ul class="pagination listjs-pagination mb-0"></ul>
                    <a class="page-item pagination-next" href="#">
                        Next
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

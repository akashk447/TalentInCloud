<div class="tab-pane" id="submitted_tab" role="tabpanel">
    <div class="ms-3 me-3">
        <div class="table-responsive table-card mb-1">
            @if ($total_submited > 0)
                <table class="table align-middle"
                    id="customerTable">
                    <thead class="table-light text-muted">
                        <tr>
                            <th scope="col" style="width: 50px;">
                                <div class="form-check">
                                    <input class="form-check-input"
                                        type="checkbox"
                                        id="checkAll"
                                        onclick="checkall(event)"
                                        value="option">
                                </div>
                            </th>

                            <th class="sort"
                                data-sort="customer_name">Candidate
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
                        @foreach ($get_sourced_candidates as $source_candidate)
                            @if ($source_candidate->screen_status == 'Submitted To Quality' || $source_candidate->screen_status == 'Quality Rejected' || $source_candidate->screen_status == 'Quality Duplicate' || $source_candidate->screen_status == 'Quality Approved')
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input
                                                class="form-check-input"
                                                value="{{ $source_candidate->candidate_id }}"
                                                type="checkbox"
                                                name="chk_child">
                                        </div>
                                    </th>
                                    <td class="id"
                                        style="display:none;"><a
                                            href="javascript:void(0);"
                                            class="fw-medium link-primary"></a>
                                    </td>
                                    <td class="customer_name">
                                        <a href="{{ route('view_pool_candidate', ['jobcode'=>$job_details->job_code,'screenid'=>$source_candidate->screen_id,'innertab'=>'submitted','key'=>bin2hex(random_bytes(32))]) }}">
                                            {{ $source_candidate->candidate_name == '' || $source_candidate->candidate_name == null ? 'Anonymous' : $source_candidate->candidate_name }}
                                        </a>
                                    </td>
                                    <td class="email">
                                        {{ $source_candidate->candidate_email=="" || $source_candidate->candidate_email==null ?"NA": $source_candidate->candidate_email }}
                                    </td>
                                    <td class="phone">
                                        {{ $source_candidate->candidate_phone=="" || $source_candidate->candidate_phone==null ?"NA": $source_candidate->candidate_phone }}
                                    </td>
                                    
                                    <td class="status"><span
                                        class="badge {{$source_candidate->screen_status=="Quality Reject" || $source_candidate->screen_status=="Quality Duplicate"?"badge-soft-danger":"badge-soft-success"}} text-uppercase">{{$source_candidate->screen_status}}</span>
                                </td>
                                    <input type="hidden" name="" id="screen_id" value="{{ $source_candidate->screen_id }}">
                                    <td>
                                        <ul
                                            class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item edit"
                                                data-bs-toggle="tooltip"
                                                data-bs-trigger="hover"
                                                data-bs-placement="top" 
                                                title="Action Not Allowed - {{$source_candidate->candidate_name}}">
                                                <span class="text-muted" style="cursor: not-allowed"><i class="ri-phone-line fs-16"></i></span>
                                                
                                            </li>
                                            <li class="list-inline-item"
                                                data-bs-toggle="tooltip"
                                                data-bs-trigger="hover"
                                                data-bs-placement="top"
                                                title="Remove Not Allowed - {{$source_candidate->candidate_name}}">
                                                <span class="text-muted" style="cursor: not-allowed"><i class="ri-delete-bin-5-fill fs-16"></i></span>
                                                
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>
                </table>
            @endif
            @if ($total_submited==0)
               
            <div class="noresult">
                <div class="text-center">
                    <lord-icon
                        class="mt-5"
                        src="https://cdn.lordicon.com/msoeawqm.json"
                        trigger="loop"
                        colors="primary:#121331,secondary:#08a88a"
                        style="width:50px;height:50px">
                    </lord-icon>
                    <h5 class="mt-4">Sorry! No Candidate Found</h5>
                    <p class="text-muted mb-5"> We
                        did not find any
                        submitted candidate for this job.</p>
                </div>
            </div>
        @endif
        </div>
        @if ($total_submited != 0)
        <div class="d-flex justify-content-end mb-3">
            <div class="pagination-wrap hstack gap-2">
                <a class="page-item pagination-prev disabled"
                    href="#">
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
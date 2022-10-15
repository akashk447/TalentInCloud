@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">VIEW JOBS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">All Job</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card" id="orderList">
                        <div class="card-header  border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">
                                    <a href="{{route('add_jobs')}}">
                                        <button type="button" class="btn btn-success add-btn" d><i class="ri-add-line align-bottom me-1"></i> Create
                                            Job Order
                                        </button>
                                    </a>
                                </h5>
                                <div class="flex-shrink-0">

                                    {{-- <div class="form-check form-switch form-switch-lg" dir="ltr">
                                        <input type="checkbox" class="form-check-input" id="select_all_jobs" >
                                        <label class="form-check-label" for="customSwitchsizelg">Select All Jobs</label>
                                    </div> --}}
                                    {{-- <button type="button" class="btn btn-info" id="select_all_jobs"><i
                                            class=" ri-file-excel-line align-bottom me-1"></i>Select All Jobs</button> --}}
                                            <button type="button" class="btn btn-info"><i
                                                class=" ri-file-excel-line align-bottom me-1"></i> Export</button>
                                    <button class="btn btn-soft-danger " data-bs-toggle="dropdown" aria-expanded="true">
                                        <i class="ri-more-fill fs-15"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-record-circle-fill me-2 align-bottom text-muted"></i>Extend
                                                Validity</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-record-circle-fill me-2 align-bottom text-muted"></i>Update
                                                Job Priority</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-record-circle-fill me-2 align-bottom text-muted"></i>Change
                                                Job Status</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-record-circle-fill me-2 align-bottom text-muted"></i>Transfer
                                                Job Order</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-record-circle-fill me-2 align-bottom text-muted"></i>Delete
                                                Job Order</a></li>
                                        <li class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-record-circle-fill me-2 align-bottom text-muted"></i>Export to
                                                Excel</a></li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">

                            <div class="row g-3">
                                <div class="col-sm-2 ">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for order ID, customer, order status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class=" col-sm-2">
                                    <div>
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idStatus">
                                            <option value="" disabled>Select Company</option>
                                            @foreach ($get_user_info as $company)
                                                <option value="{{ $company->client_name }}">{{ $company->client_name }}
                                                </option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class=" col-sm-2">
                                    <div>
                                        <?php
                                        $indus = get_industry();
                                        ?>
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idStatus">
                                            <option value="" disabled>Select Industry Type</option>
                                            @foreach ($indus as $industry)
                                                <option value="{{ $industry->industry_name }}">
                                                    {{ $industry->industry_name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class=" col-sm-2">
                                    <div>
                                        <?php
                                        $city = get_city();
                                        ?>
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idStatus">
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
                                <!--end col-->
                                <div class=" col-sm-2">
                                    <div>
                                        <select class="form-control" data-choices data-choices-search-false
                                            name="choices-single-default" id="idPayment">
                                            <option value="">Status</option>
                                            <option value="all" selected>Active</option>
                                            <option value="Mastercard">Expired</option>
                                            <option value="Paypal">InActive</option>

                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class=" col-sm-2">
                                    <div>
                                        <button type="button" class="btn btn-primary w-100" onclick="SearchData();"> <i
                                                class="ri-equalizer-fill me-1 align-bottom"></i>
                                            Filters
                                        </button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->

                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                    @php
                                        $total_active_job = 0;
                                        $total_inactive_job = 0;
                                    @endphp
                                    @foreach ($get_cloud_job as $job)
                                        @if ($job->job_status == 'Active')
                                            @php
                                                $total_active_job++;
                                            @endphp
                                        @endif
                                        @if ($job->job_status == 'InActive')
                                            @php
                                                $total_inactive_job++;
                                            @endphp
                                        @endif
                                    @endforeach
                                    <li class="nav-item">
                                        <a class="nav-link active All py-3" data-bs-toggle="tab" id="All"
                                            href="#home1" role="tab" aria-selected="true">
                                            <i class="ri-store-2-fill me-1 align-bottom"></i> Active Joborder <span
                                                class="badge bg-primary align-middle ms-1">{{ $total_active_job }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered"
                                            href="#profile1" role="tab" aria-selected="false">
                                            <i class="ri-checkbox-circle-line me-1 align-bottom"></i> Expired Joborder
                                            <span
                                                class="badge bg-success align-middle ms-1">{{ $total_inactive_job }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-3 Pickups" data-bs-toggle="tab" id="Pickups"
                                            href="#messages1" role="tab" aria-selected="false">
                                            <i class="ri-truck-line me-1 align-bottom"></i> Closed Joborder <span
                                                class="badge bg-danger align-middle ms-1">{{ $total_inactive_job }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item mt-3 ms-auto">
                                        <div class="form-check form-switch" dir="ltr">
                                                <input type="checkbox" class="form-check-input" id="select_all_jobs" data-bs-toggle="tooltip" title="Select All Jobs">
                                            </div>
                                    </li>

                                </ul>
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="home1" role="tabpanel">
                                        @php
                                            $count_job = 0;
                                        @endphp
                                        @foreach ($get_cloud_job as $job)
                                            @if ($job->job_status == 'Active')
                                                @php
                                                    $count_job++;
                                                @endphp
                                                <div class="card card-animate mb-3"
                                                    style="box-shadow: 2px 4px 14px #d6d6d8;">

                                                    <div class="card-header bg-light align-items-center d-flex p-2">
                                                        <div class="form-check flex-grow-1 ms-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="formCheck6">
                                                            <p class="mb-0 ">Job Code :
                                                                <span><strong>{{ strtoupper($job->job_code) }}</strong></span><span
                                                                    class="ms-3">Job Serial : <span><strong>
                                                                            {{ $count_job }} </strong></span></span>
                                                            </p>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="mb-0"></p>
                                                        </div>
                                                        <div>

                                                            <button type="button" class="btn btn-soft-info btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                                Source
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li><a class="dropdown-item" href="javascript:void(0);"
                                                                        onclick="show_canvas(event,'{{ $job->job_id }}','{{ $job->job_title }}')">
                                                                        Add Manually</a></li>
                                                                <li><a class="dropdown-item" href="{{ route('add_candidate_from_resume', ['jobid' => $job->job_code]) }}">
                                                                        From 
                                                                        Resumes</a></li>

                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('add_candidate_from_excel', ['jobid' => $job->job_code]) }}">
                                                                        From Excel</a></li>
                                                                        
                                                                <li><a class="dropdown-item"
                                                                        href="{{ route('search_from_database', ['jobid' => $job->job_code]) }}">
                                                                        From Database</a></li>

                                                            </ul>


                                                            <button type="button" class="btn btn-soft-info btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <div class="row me-2">
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item" href="job.php"
                                                                                id="add_candidate"><i
                                                                                    class=" ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Add Candidates</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#extend_validity"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Extend Validity</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#transfe_job"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Transfer Job </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="compose-email.php"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Compose Email</a></li>

                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#change_jo_status"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Change Status</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#job_priority"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update Priority</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#update_cv_limit"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update CV Limit</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#update_vacancy"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update Vacancy</a></li>

                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Edit Job </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>Edit
                                                                                Contacts</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_location"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Edit Location</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                id="sa-params"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Delete Job</a></li>

                                                                    </div>
                                                                </div>

                                                            </ul>

                                                        </div>
                                                    </div>


                                                    <div class="card-body p-1">
                                                        <div class="d-flex align-items-start ms-2 me-2 mt-1">
                                                            
                                                            <a href="{{ route('view_job_details', ['jobid'=>$job->job_code]) }}" target="_blank"
                                                                class=""><img class="rounded-circle"
                                                                    src="{{ asset('assets/images/no_company.jpg') }}"
                                                                    alt="Generic placeholder image" height="42"></a>
                                                            <div class="w-100">
                                                                <h4 class="mt-0 mb-1 ms-2"><a href="{{ route('view_job_details', ['jobid'=>$job->job_code]) }}"
                                                                        class="text-dark fs-16">{{ $job->job_title }} <i
                                                                            class="ri-eye-line fs-16 text-muted ms-3 "
                                                                            ata-bs-container="#tooltip-container"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title=""
                                                                            data-bs-original-title="Preview"></i></a>
                                                                    <small
                                                                        class="text-primary float-end mt-1 fs-13 align-items-center">
                                                                        <span class="align-top"><i
                                                                                class="ri-record-circle-fill me-1 text-info"></i></span><span
                                                                            class="text-info align-top">Active</span>
                                                                    </small>
                                                                </h4>
                                                                <small class="text-muted ms-2"><span><i
                                                                            class="ri-building-line me-1  fs-16 align-middle"></i><b>{{$job->job_company_name}}</b></span>
                                                                    <span class="ms-2"><i
                                                                            class="ri-map-pin-user-line me-1 fs-16 align-middle"></i><b>{{ $job->job_location }}{{ isset($job->job_country)?', '.$job->job_location:"" }}</b></span> </small>


                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row justify-content-between text-align-center mt-1 mb-1">
                                                            <div class="col-md-1 text-center ">
                                                               
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"pool"]) }}">
                                                                    <div class="number-step mt-2" title="Candidate Pool">
                                                                        @php
                                                                            $pool_data = get_pool_list($job->job_id);
                                                                        @endphp
                                                                        <h4 class="text-muted mb-0"> <b>{{$pool_data}}</b></h4>
                                                                        <small class="text-muted fs-10">Pool</small>
                                                                    </div>
                                                                </a>

                                                            </div>

                                                            <div class="col-md-1 text-center ">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"qualitysubmit"]) }}">
                                                                <div class="number-step mt-2" title="Submitted Quality">
                                                                    @php
                                                                      $submit_quality_data = get_submit_quality_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0"> <b>{{$submit_quality_data}}</b></h4>
                                                                    <small class="text-muted fs-10">Quality</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"submitted"]) }}">
                                                                <div class="number-step mt-2" title="Submitted to Client">
                                                                    @php
                                                                      $submitted_data = get_submitted_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0"> <b>{{$submitted_data}}</b></h4>
                                                                    <small class="text-muted fs-10">Submitted</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"inprogress"]) }}">
                                                                <div class="number-step mt-2"
                                                                    title="Interview in Progress">
                                                                    @php
                                                                      $inprogress_data = get_inprogress_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted  mb-0"> <b>{{$inprogress_data}}</b></h4>
                                                                    <small class="text-muted fs-10">Progress</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href="{{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"noshow"]) }}">
                                                                <div class="number-step mt-2" title="No Show">
                                                                @php
                                                                      $noshow_data = get_noshow_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted  mb-0"> <b>{{$noshow_data}}</b></h4>
                                                                    <small class="text-muted fs-10">No Show</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"rejected"]) }}">
                                                                <div class="number-step mt-2" title="Rejected">
                                                                @php
                                                                      $rejected_data = get_rejected_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0"> <b>{{$rejected_data}}</b></h4>
                                                                    <small class="text-muted fs-10">Rejected</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"onhold"]) }}">
                                                                <div class="number-step mt-2"
                                                                    title="Shotlisted for Further Interview">
                                                                @php
                                                                      $onhold_data = get_onhold_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0"> <b>{{$onhold_data}}</b></h4>
                                                                    <small class="text-muted fs-10">On Hold</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"selected"]) }}">
                                                                <div class="number-step mt-2"
                                                                    title="Selected in Interview">
                                                                    @php
                                                                      $selected_data = get_selected_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0"> <b>{{$selected_data}} </b></h4>
                                                                    <small class="text-muted fs-10">Selected</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"joined"]) }}">
                                                                <div class="number-step mt-2"
                                                                    title="Onboarding Completed">
                                                                    @php
                                                                      $joined_data = get_joined_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0 "> <b>{{$joined_data}}</b></h4>
                                                                    <small class="text-muted fs-10">Joined</small>
                                                                </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <a href=" {{ route('view_job_details_tab', ['jobid'=>$job->job_code,'ctab'=>"duplicate"]) }}">
                                                                <div class="number-step mt-2"
                                                                    title="Quality Reject / Duplicate">
                                                                @php
                                                                      $duplicate_data = get_duplicate_list($job->job_id);
                                                                    @endphp
                                                                    <h4 class="text-muted mb-0"> <b>{{$duplicate_data}}</b></h4>
                                                                    <small class="text-muted fs-10">QC/Dupli..</small>
                                                                </div></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-footer p-3 bg-light">
                                                        <div class="row justify-content-between">

                                                            <div class="col-lg-4 ">
                                                                <p class="fs-12 mb-0 ms-2"><a href=""
                                                                        class="text-dark job-board-publich">{{ $job->jobboard_publish_status == 'Yes' ? 'Published On Job Boards' : 'Not Published On Job Boards' }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 ">
                                                                <p class="fs-12 mb-0 ms-2">Position Status : <a
                                                                        href=""
                                                                        class="text-decoration-none text-info"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="{{$job->job_position_nos_used}} Filled &nbsp;|&nbsp; {{$job->job_position_nos - $job->job_position_nos_used}} Remaining">
                                                                        {{$job->job_position_nos}} Position Remaining</a></p>
                                                            </div>
                                                            <div class="col-lg-4 text-lg-end ">
                                                                <?php
                                                                $posted_time = $job->time;
                                                                $posted_date = $job->date;
                                                                $time = substr($posted_time, 0, 8);
                                                                $start = new DateTime($posted_date . ' ' . $time);
                                                                $time_diff = time() - $start->getTimestamp();
                                                                $time_ago = get_time_ago($time_diff);
                                                                $date = date('d-M-y', $start->getTimestamp());
                                                                ?>
                                                                <p class="fs-11"><a href=""
                                                                        class="text-decoration-none"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="{{ $date }} | {{ $posted_time }}">
                                                                        {{ $time_ago }}</a> | Account
                                                                    Manager : <a href="#"
                                                                        class="text-decoration-none"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title=" {{ $job->job_posted_by_username }} ">
                                                                        {{ $job->job_posted_by_username }}</a> </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach 

                                    </div>
                                    <div class="tab-pane" id="profile1" role="tabpanel">
                                        @php
                                            $count_job = 0;
                                        @endphp
                                        @foreach ($get_cloud_job as $job)
                                            @if ($job->job_status == 'InActive')
                                                @php
                                                    $count_job++;
                                                @endphp
                                                <div class="card card-animate mb-3"
                                                    style="box-shadow: 2px 4px 14px #d6d6d8;">

                                                    <div class="card-header bg-light align-items-center d-flex p-2">
                                                        <div class="form-check flex-grow-1 ms-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="formCheck6">
                                                            <p class="mb-0 ">Job Code :
                                                                <span><strong>{{ strtoupper($job->job_code) }}</strong></span><span
                                                                    class="ms-3">Job Serial : <span><strong>
                                                                            {{ $count_job }} </strong></span></span>
                                                            </p>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="mb-0"></p>
                                                        </div>
                                                        <div>

                                                            <button type="button" class="btn btn-soft-info btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                                Source
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li><a class="dropdown-item" href="javascript:void(0);"
                                                                        data-bs-toggle="offcanvas"
                                                                        data-bs-target="#offcanvasRight"
                                                                        aria-controls="offcanvasRight"> Add Manually</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="upload-resume.php">
                                                                        From
                                                                        Resumes</a></li>
                                                                <li><a class="dropdown-item" href="upload-from-excel.php">
                                                                        From Excel</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="search-from-database.php">
                                                                        From Database</a></li>

                                                            </ul>


                                                            <button type="button" class="btn btn-soft-info btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <div class="row me-2">
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item" href="job.php"
                                                                                id="add_candidate"><i
                                                                                    class=" ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Add Candidates</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#extend_validity"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Extend Validity</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#transfe_job"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Transfer Job </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="compose-email.php"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Compose Email</a></li>

                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#change_jo_status"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Change Status</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#job_priority"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update Priority</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#update_cv_limit"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update CV Limit</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#update_vacancy"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update Vacancy</a></li>

                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Edit Job </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>Edit
                                                                                Contacts</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_location"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Edit Location</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                id="sa-params"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Delete Job</a></li>

                                                                    </div>
                                                                </div>

                                                            </ul>

                                                        </div>
                                                    </div>


                                                    <div class="card-body p-1">
                                                        <div class="d-flex align-items-start ms-2 me-2 mt-1">
                                                            <a href="view_more-info.php" target="_blank"
                                                                class=""><img class="rounded-circle"
                                                                    src="{{ asset('assets/images/companies/amazon.png') }}"
                                                                    alt="Generic placeholder image" height="42"></a>
                                                            <div class="w-100">
                                                                <h4 class="mt-0 mb-1 ms-2"><a href="view-job-details.php"
                                                                        class="text-dark fs-16">{{ $job->job_title }} <i
                                                                            class="ri-eye-line fs-16 text-muted ms-3 "
                                                                            ata-bs-container="#tooltip-container"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title=""
                                                                            data-bs-original-title="Preview"></i></a>
                                                                    <small
                                                                        class="text-primary float-end mt-1 fs-13 align-items-center">
                                                                        <span class="align-top"><i
                                                                                class="ri-record-circle-fill me-1 text-info"></i></span><span
                                                                            class="text-info align-top">Active</span>
                                                                    </small>
                                                                </h4>
                                                                <small class="text-muted ms-2"><span><i
                                                                            class="ri-building-line me-1  fs-16 align-middle"></i><b>Hiring</b></span>
                                                                    <span class="ms-2"><i
                                                                            class="ri-map-pin-user-line me-1 fs-16 align-middle"></i><b>{{ $job->job_location }},
                                                                            {{ $job->job_state }},
                                                                            {{ $job->job_country }}</b></span> </small>


                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row justify-content-between text-align-center mt-1 mb-1">
                                                            <div class="col-md-1 text-center ">
                                                                <a href="#">
                                                                    <div class="number-step mt-2" title="Candidate Pool">
                                                                        <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                        <small class="text-muted fs-10">Pool</small>
                                                                    </div>
                                                                </a>

                                                            </div>

                                                            <div class="col-md-1 text-center ">
                                                                <div class="number-step mt-2" title="Submitted Quality">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Quality</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2" title="Submitted to Client">
                                                                    <h4 class="text-muted  mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Submitted</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Interview in Progress">
                                                                    <h4 class="text-muted  mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Progress</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2" title="No Show">
                                                                    <h4 class="text-muted  mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">No Show</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2" title="Rejected">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Rejected</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Shotlisted for Further Interview">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">On Hold</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Selected in Interview">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Selected</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Onboarding Completed">
                                                                    <h4 class="text-muted mb-0 "> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Joined</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Quality Reject / Duplicate">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">QC/Dupli..</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-footer p-3 bg-light">
                                                        <div class="row justify-content-between">

                                                            <div class="col-lg-4 ">
                                                                <p class="fs-12 mb-0 ms-2"><a href="job-board.php"
                                                                        class="text-dark job-board-publich">{{ $job->jobboard_publish_status == 'Yes' ? 'Published On Job Boards' : 'Not Published On Job Boards' }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 ">
                                                                <p class="fs-12 mb-0 ms-2">Position Status : <a
                                                                        href=""
                                                                        class="text-decoration-none text-info"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="{{$job->job_position_nos_used}} Filled &nbsp;|&nbsp; {{$job->job_position_nos - $job->job_position_nos_used}} Remaining">
                                                                        {{$job->job_position_nos}} Position Remaining</a></p>
                                                            </div>
                                                            <div class="col-lg-4 text-lg-end ">
                                                                <?php
                                                                $posted_time = $job->time;
                                                                $posted_date = $job->date;
                                                                $time = substr($posted_time, 0, 8);
                                                                $start = new DateTime($posted_date . ' ' . $time);
                                                                $time_diff = time() - $start->getTimestamp();
                                                                $time_ago = get_time_ago($time_diff);
                                                                $date = date('d-M-y', $start->getTimestamp());
                                                                ?>
                                                                <p class="fs-11"><a href=""
                                                                        class="text-decoration-none"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="{{ $date }} | {{ $posted_time }}">
                                                                        {{ $time_ago }}</a> | Account
                                                                    Manager : <a href="#"
                                                                        class="text-decoration-none"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title=" {{ $job->job_posted_by_username }} ">
                                                                        {{ $job->job_posted_by_username }}</a> </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="tab-pane" id="messages1" role="tabpanel">
                                        @php
                                            $count_job = 0;
                                        @endphp
                                        @foreach ($get_cloud_job as $job)
                                            @if ($job->job_status == 'InActive')
                                                @php
                                                    $count_job++;
                                                @endphp
                                                <div class="card card-animate mb-3"
                                                    style="box-shadow: 2px 4px 14px #d6d6d8;">

                                                    <div class="card-header bg-light align-items-center d-flex p-2">
                                                        <div class="form-check flex-grow-1 ms-3">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="formCheck6">
                                                            <p class="mb-0 ">Job Code :
                                                                <span><strong>{{ strtoupper($job->job_code) }}</strong></span><span
                                                                    class="ms-3">Job Serial : <span><strong>
                                                                            {{ $count_job }} </strong></span></span>
                                                            </p>
                                                        </div>
                                                        <div class="flex-grow-1">
                                                            <p class="mb-0"></p>
                                                        </div>
                                                        <div>

                                                            <button type="button" class="btn btn-soft-info btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                                Source
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">

                                                                <li><a class="dropdown-item" href="javascript:void(0);"
                                                                        data-bs-toggle="offcanvas"
                                                                        data-bs-target="#offcanvasRight"
                                                                        aria-controls="offcanvasRight"> Add Manually</a>
                                                                </li>
                                                                <li><a class="dropdown-item" href="upload-resume.php">
                                                                        From
                                                                        Resumes</a></li>
                                                                <li><a class="dropdown-item" href="upload-from-excel.php">
                                                                        From Excel</a></li>
                                                                <li><a class="dropdown-item"
                                                                        href="search-from-database.php">
                                                                        From Database</a></li>

                                                            </ul>


                                                            <button type="button" class="btn btn-soft-info btn-sm"
                                                                data-bs-toggle="dropdown" aria-expanded="true">
                                                                Action
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <div class="row me-2">
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item" href="job.php"
                                                                                id="add_candidate"><i
                                                                                    class=" ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Add Candidates</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#extend_validity"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Extend Validity</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#transfe_job"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Transfer Job </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="compose-email.php"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Compose Email</a></li>

                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#change_jo_status"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Change Status</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#job_priority"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update Priority</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#update_cv_limit"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update CV Limit</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#update_vacancy"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Update Vacancy</a></li>

                                                                    </div>
                                                                    <div class="col-lg-4">
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Edit Job </a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>Edit
                                                                                Contacts</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_location"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Edit Location</a></li>
                                                                        <li><a class="dropdown-item"
                                                                                href="javascript:void(0);"
                                                                                id="sa-params"><i
                                                                                    class="ri-arrow-right-line me-1 align-bottom text-muted"></i>
                                                                                Delete Job</a></li>

                                                                    </div>
                                                                </div>

                                                            </ul>

                                                        </div>
                                                    </div>


                                                    <div class="card-body p-1">
                                                        <div class="d-flex align-items-start ms-2 me-2 mt-1">
                                                            <a href="view_more-info.php" target="_blank"
                                                                class=""><img class="rounded-circle"
                                                                    src="{{ asset('assets/images/companies/amazon.png') }}"
                                                                    alt="Generic placeholder image" height="42"></a>
                                                            <div class="w-100">
                                                                <h4 class="mt-0 mb-1 ms-2"><a href="view-job-details.php"
                                                                        class="text-dark fs-16">{{ $job->job_title }} <i
                                                                            class="ri-eye-line fs-16 text-muted ms-3 "
                                                                            ata-bs-container="#tooltip-container"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-placement="top" title=""
                                                                            data-bs-original-title="Preview"></i></a>
                                                                    <small
                                                                        class="text-primary float-end mt-1 fs-13 align-items-center">
                                                                        <span class="align-top"><i
                                                                                class="ri-record-circle-fill me-1 text-info"></i></span><span
                                                                            class="text-info align-top">Active</span>
                                                                    </small>
                                                                </h4>
                                                                <small class="text-muted ms-2"><span><i
                                                                            class="ri-building-line me-1  fs-16 align-middle"></i><b>Hiring</b></span>
                                                                    <span class="ms-2"><i
                                                                            class="ri-map-pin-user-line me-1 fs-16 align-middle"></i><b>{{ $job->job_location }},
                                                                            {{ $job->job_state }},
                                                                            {{ $job->job_country }}</b></span> </small>


                                                            </div>
                                                        </div>
                                                        <div
                                                            class="row justify-content-between text-align-center mt-1 mb-1">
                                                            <div class="col-md-1 text-center ">
                                                                <a href="#">
                                                                    <div class="number-step mt-2" title="Candidate Pool">
                                                                        <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                        <small class="text-muted fs-10">Pool</small>
                                                                    </div>
                                                                </a>

                                                            </div>

                                                            <div class="col-md-1 text-center ">
                                                                <div class="number-step mt-2" title="Submitted Quality">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Quality</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2" title="Submitted to Client">
                                                                    <h4 class="text-muted  mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Submitted</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Interview in Progress">
                                                                    <h4 class="text-muted  mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Progress</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2" title="No Show">
                                                                    <h4 class="text-muted  mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">No Show</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2" title="Rejected">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Rejected</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Shotlisted for Further Interview">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">On Hold</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Selected in Interview">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Selected</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Onboarding Completed">
                                                                    <h4 class="text-muted mb-0 "> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">Joined</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1 text-center">
                                                                <div class="number-step mt-2"
                                                                    title="Quality Reject / Duplicate">
                                                                    <h4 class="text-muted mb-0"> <b>0 </b></h4>
                                                                    <small class="text-muted fs-10">QC/Dupli..</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="card-footer p-3 bg-light">
                                                        <div class="row justify-content-between">

                                                            <div class="col-lg-4 ">
                                                                <p class="fs-12 mb-0 ms-2"><a href="job-board.php"
                                                                        class="text-dark job-board-publich">{{ $job->jobboard_publish_status == 'Yes' ? 'Published On Job Boards' : 'Not Published On Job Boards' }}</a>
                                                                </p>
                                                            </div>
                                                            <div class="col-lg-4 ">
                                                                <p class="fs-12 mb-0 ms-2">Position Status : <a
                                                                        href=""
                                                                        class="text-decoration-none text-info"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="0 Filled &nbsp;|&nbsp; 1 Remaining">
                                                                        1 Position Remaining</a></p>
                                                            </div>
                                                            <div class="col-lg-4 text-lg-end ">
                                                                <?php
                                                                $posted_time = $job->time;
                                                                $posted_date = $job->date;
                                                                $time = substr($posted_time, 0, 8);
                                                                $start = new DateTime($posted_date . ' ' . $time);
                                                                $time_diff = time() - $start->getTimestamp();
                                                                $time_ago = get_time_ago($time_diff);
                                                                $date = date('d-M-y', $start->getTimestamp());
                                                                ?>
                                                                <p class="fs-11"><a href=""
                                                                        class="text-decoration-none"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="{{ $date }} | {{ $posted_time }}">
                                                                        {{ $time_ago }}</a> | Account Manager : <a href="#"
                                                                        class="text-decoration-none"
                                                                        ata-bs-container="#tooltip-container"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title=" {{ $job->job_posted_by }} ">
                                                                        {{ $job->job_posted_by }}</a> </p>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        {!! $get_cloud_job->links() !!}
                    </div>
                </div>
            </div>

            <!-- right offcanvas -->

            @include('admin.helper_view.add_candidates_canvas_job')

            <!-- Modals -->
            <div id="extend_validity" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">Add days by which date you
                                    can close this Job Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-4 me-4">
                                <div class="mb-2">
                                    <label for="example-date" class="form-label">Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i
                                                class="ri-calendar-2-line fs-15 text-primary"></i></span>
                                        <input type="text" class="form-control flatpickr-input active"
                                            data-provider="flatpickr" placeholder="DD-MM-YY" data-date-format="d M Y"
                                            aria-label="Phone Number" maxlength="10" aria-describedby="basic-addon1"
                                            readonly="readonly">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Notes </label>
                                    <textarea class="form-control" id="example-textarea" rows="3"></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-border me-1">Update</button>
                                    <button type="button" class="btn btn-light btn-border"
                                        data-bs-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div id="transfe_job" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">Transfer Job Order</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-4 me-4">
                                <div class="mb-2">
                                    <small class="text-danger">Make sure the compny has been assigned to the respective
                                        Key Account Executive/Manager before transfering any Job Orders.</small>
                                </div>
                                <div class="mb-2">
                                    <label for="example-date" class="form-label">Executive </label>
                                    <select class="form-control" id="choices-single-no-search"
                                        name="choices-single-no-search" data-choices data-choices-search-false
                                        data-choices-removeItem>
                                        <option value="">Select</option>
                                        <option value="141">Subhashree Jyotsnamayee - Bhubaneswar-HO</option>
                                        <option value="8">Ipsita Pattnaik - Bhubaneswar-HO</option>
                                        <option value="7">Nibedita Sahoo - Bhubaneswar-HO</option>
                                        <option value="1">Manoj Kumar - Bhubaneswar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Notes </label>
                                    <textarea class="form-control" id="example-textarea" rows="3"></textarea>
                                </div>
                                <div class="text-center">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary btn-border me-1">Transfer</button>
                                        <button type="button" class="btn btn-light btn-border"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div id="change_jo_status" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0 ">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">JO-5166 - MANGALAM TANK &
                                    PIPES_HR MANAGER_BHUBANESWAR</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-3">
                                <div class="mb-2">
                                    <h5 class="text-center">Are you sure do you want to <b
                                            class="text-decoration-underline">Close </b> Job-Order ?</h5>
                                </div>
                                <div class="text-center mb-3">
                                    <small class=" ">If you close this Job Order further Recruiter/Vendors will NOT
                                        be able to Schedule Candidates.</small>
                                </div>
                                <div class="mb-2">
                                    <div class="row mb-1">
                                        <div class="col-auto col-sm-sheck">
                                            <small class="">
                                                <input type="radio" name="radiobox" class="form-check-input">
                                            </small>
                                        </div>
                                        <div class="col p-0">
                                            <small class="text-muted">The client has put this requirement on hold
                                                internally and would not want to review further resumes at the
                                                moment.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-auto col-sm-sheck">
                                            <small class="">
                                                <input type="radio" name="radiobox" class="form-check-input">
                                            </small>
                                        </div>
                                        <div class="col p-0">
                                            <small class="text-muted">The client has received sufficient resumes for this
                                                requirement and would evaluate the existing pipeline before requesting for
                                                more profiles.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-auto col-sm-sheck">
                                            <small class="">
                                                <input type="radio" name="radiobox" class="form-check-input">
                                            </small>
                                        </div>
                                        <div class="col p-0">
                                            <small class="text-muted">The client would like to evaluate and process the
                                                pipeline of resumes received for this role before seeking more resumes.
                                                Hence pausing this role.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-auto col-sm-sheck">
                                            <small class="">
                                                <input type="radio" name="radiobox" class="form-check-input">
                                            </small>
                                        </div>
                                        <div class="col p-0">
                                            <small class="text-muted">A candidate has been offered for this role and is
                                                pending to join.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-auto col-sm-sheck">
                                            <small class="">
                                                <input type="radio" name="radiobox" class="form-check-input">
                                            </small>
                                        </div>
                                        <div class="col p-0">
                                            <small class="text-muted">A candidate has been hired for this role and this
                                                requisition would be closed shortly.</small>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-auto col-sm-sheck">
                                            <small class="">
                                                <input type="radio" name="radiobox" class="form-check-input">
                                            </small>
                                        </div>
                                        <div class="col p-0">
                                            <small class="text-muted">Closed on Hirexpress Reason Not Required.</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mb-3">
                                    <input type="checkbox" name="hobbies[]" value="ski" class="form-check-input"
                                        checked="">
                                    <label class="text-dark" for="hobby1"> Click Here to Close this JO <b
                                            class="text-decoration-underline">Without</b> mail to Vendors </label>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-border w-lg me-1">Yes</button>
                                    <button type="button" class="btn btn-light btn-border w-lg"
                                        data-bs-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div id="job_priority" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">Update Job Priority</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <h4 class="text-center ms-2">Select Job Priority * </h4>
                                </div>
                                <div class="row mt-4 mb-4 p-4 ps-4 pe-4">
                                    <div class="col-md-4">
                                        <label class="btn btn-info btn-border w-lg">
                                            <input type="radio" name="j_type" id="j_type" class="align-middle"
                                                autocomplete="off" value="Normal Jobs" checked=""> Normal Jobs
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="btn btn-success btn-border w-lg">
                                            <input type="radio" name="j_type" id="j_type" class="align-middle"
                                                autocomplete="off" value="Bulk Openings"> Bulk Openings
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="btn btn-danger btn-border w-lg ">
                                            <input type="radio" name="j_type" id="j_type" class="align-middle"
                                                autocomplete="off" value="Hot Jobs"> Hot Jobs
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center mb-1">
                                    <button type="submit" class="btn btn-primary btn-border w-lg me-1">Update</button>
                                    <button type="button" class="btn btn-light btn-border w-lg"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div id="update_cv_limit" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">Update CV Limit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-4 me-4 mt-3">
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">Current CV Limit <span
                                            class="text-danger">*</span>: </label>
                                    <input type="text" class="form-control" id="validationCustom04" value="100"
                                        required="">
                                </div>
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">Extend CV Limit <span
                                            class="text-danger">*</span>:</label>
                                    <input type="text" class="form-control" id="validationCustom04" required="">
                                </div>
                                <div class="text-center mb-1 mt-4">
                                    <button type="submit" class="btn btn-primary btn-border w-lg me-1">Update</button>
                                    <button type="button" class="btn btn-light btn-border w-lg"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div id="update_vacancy" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">Update No of Vacancy</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-4 me-4 mt-3">
                                <div class="mb-3">
                                    <label for="validationCustom04" class="form-label">No of Vacancy * <span
                                            class="text-danger">*</span>: </label>
                                    <input type="number" class="form-control" id="validationCustom04"
                                        value="100" required="">
                                </div>

                                <div class="text-center mb-1 mt-4">
                                    <button type="submit" class="btn btn-primary btn-border w-lg me-1">Update</button>
                                    <button type="button" class="btn btn-light btn-border w-lg"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div id="edit_location" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="card bg-pattern mb-0">
                            <div class="modal-header card-header p-3 bg-light">
                                <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">View/Edit First Round
                                    Interviewer/Address</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-4 me-4 mt-2">
                                <div class="mb-2">
                                    <label for="validationCustom04" class="form-label">Interviewer Name * : </label>
                                    <input type="text" class="form-control" id="validationCustom04"
                                        required="">
                                </div>
                                <div class="mb-2">
                                    <label for="validationCustom04" class="form-label">Designation * : </label>
                                    <input type="text" class="form-control" id="validationCustom04"
                                        required="">
                                </div>
                                <div class="mb-2">
                                    <label for="validationCustom04" class="form-label">Contact no * : </label>
                                    <input type="number" class="form-control" maxlength="10"
                                        id="validationCustom04" required="">
                                </div>
                                <div class="mb-2">
                                    <label for="validationCustom04" class="form-label">Email ID * : </label>
                                    <input type="email" class="form-control" id="validationCustom04"
                                        required="">
                                </div>
                                <div class="mb-2">
                                    <label for="validationCustom04" class="form-label">Adress * : </label>
                                    <textarea class="form-control" id="example-textarea" rows="2"></textarea>
                                </div>

                                <div class="text-center mb-1 mt-2">
                                    <button type="submit" class="btn btn-primary btn-border w-lg me-1">Save</button>
                                    <button type="button" class="btn btn-light btn-border w-lg "
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>

    </div>
@endsection
@section('script')
    <!-- quill js -->
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>

    <!-- init js -->
    {{-- <script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script> --}}
    <script src="{{ asset('assets/libs/dropify/js/dropify.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/pages/select2.init.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/pages/form-file-upload.init.js') }}"></script> --}}
   
    <script>
        function validate_mo(evt) {
            // console.log(evt)
            var theEvent = evt || window.event;
            // Handle paste
            if (theEvent.type === 'paste') {
                key = event.clipboardData.getData('text/plain');
            } else {
                // Handle key press
                var key = theEvent.keyCode || theEvent.which;
                key = String.fromCharCode(key);
            }
            var regex = /[0-9]|\./;
            if (!regex.test(key)) {
                theEvent.returnValue = false;
                if (theEvent.preventDefault) theEvent.preventDefault();
            }
        }
        var new_qualification_section = `<div class="new_qualification">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date" class="form-label">Qualification
                                                            </label>
                                                            <select class="form-select" id="choices-single-no-search"
                                                                name="qualification[]" data-choices
                                                                data-choices-search-false data-choices-removeItem>
                                                                <option value="">Select</option>
                                                                <option value="1">B.tech</option>
                                                                <option value="2">MBA</option>
                                                                <option value="3">BAC</option>
                                                                <option value="3">BCA</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date"
                                                                class="form-label">Specialization </label>

                                                            <select class="form-select" id="choices-single-no-search"
                                                                name="specialization[]" data-choices
                                                                data-choices-search-false data-choices-removeItem>
                                                                <option value="">Select</option>
                                                                <option value="1">B.tech</option>
                                                                <option value="2">MBA</option>
                                                                <option value="3">BAC</option>
                                                                <option value="3">BCA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-2">
                                                    <label for="example-date" class="form-label">Course Type </label>
                                                    <div class="form-group mb-2">

                                                        <div class="btn-group btn-group-sm d-flex " role="group"
                                                            aria-label="Horizontal radio toggle button group">
                                                            <input type="radio" class="btn-check "
                                                                name="course_type[]" id="vbtn-radio1"
                                                                value="Full Time" checked>
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="vbtn-radio1">Full Time</label>
                                                            <input type="radio" class="btn-check "
                                                                name="course_type[]" id="vbtn-radio2"
                                                                value="Part Time">
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="vbtn-radio2">Part Time</label>
                                                            <input type="radio" class="btn-check "
                                                                name="course_type[]" id="vbtn-radio3"
                                                                value="Correspondence/Distance Learning">
                                                            <label class="j_priority btn btn-outline-primary p-2"
                                                                for="vbtn-radio3">Correspondence/Distance
                                                                Learning</label>

                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="mb-2 mt-1">
                                                    <label for="example-textarea"
                                                        class="form-label">University/Institute </label>
                                                    <input type="text" class="form-control " name="institute[]">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date" class="form-label">Year Of
                                                                Passing </label>
                                                            <select class="form-select" id="choices-single-no-search"
                                                                name="passing_year[]" data-choices data-choices-sorting-true
                                                                data-choices-search-false >
                                                                <option value="">Select</option>
                                                                @php
                                                                    $passyears = range ( date( 'Y') - 40,date( 'Y') + 4 );
                                                                @endphp
                                                               
                                                                @foreach ($passyears as $value)
                                                                    <option value="{{$value}}">{{$value}}</option>
                                                                @endforeach
                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-2">
                                                            <label for="example-date" class="form-label">Percentage
                                                            </label>
                                                            <input class="form-control" id="example" type="text"
                                                                placeholder="Percentage %" name="percentage[]">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>`;

        function new_qualification(e) {
            e.preventDefault();
            if ($(e.target).parents('.row').prev().length == 0) {
                $(e.target).parents('.row').before(new_qualification_section);
                $('#add').text("Add More");
                $('#delete').removeClass("d-none");
            } else {
                $(e.target).parents('.row').prev('.new_qualification').after(new_qualification_section);
                $('#add').text("Add More");
                $('#delete').removeClass("d-none");
                $(e.target).parents('.row').prev('.new_qualification').hide().show(300);
            }

        }

        function delete_qualification(e) {
            e.preventDefault();
            $(e.target).parents('.row').prev().remove();
            if($(e.target).parents('.row').prev().length == 0){
                $('#add').text("Add");
                $('#delete').addClass("d-none");
            }
            // if($(e.target).parents('.row').prev('.new_qualification').length == 1){
            //     $('#delete').addClass("d-none");
            // }
        }
        //ADD EXPERIENCE
        $("#employeer_id").on("focus", function() {
            $("#empl_checkbox").show(300);
        })



        $("#empl_btn1").on("click", function() {
            $("#notice_period").show(300);
            $("#duration_to").hide(300);
        })
        $("#empl_btn2").on("click", function() {
            $("#notice_period").hide(300);
            $("#serving_notice").hide(300);
            $("#duration_to").show(300);
        })
        $("#empl_btn3").on("click", function() {
            $("#notice_period").hide(300);
            $("#serving_notice").hide(300);
            $("#duration_to").show(300);
        })

        var drEvent = $('.dropify').dropify();

        function show_canvas(e, job_id, job_title) {
            e.preventDefault();
            var myOffcanvas = document.getElementById('offcanvasRight')
            var bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas)
            $('#job-id').val(job_id);
            $('#job-id1').text(job_id);
            bsOffcanvas.show();
        }
        //RESUME POST 
        $('#upload_resume').change(function(e) {
            // e.preventDefault();
            $('#submit_candidate').attr('disabled',true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData();
            formData.append('file', $('#upload_resume')[0].files[0]);
            $.ajax({
                type: "post",
                url: "{{ route('parse_pdf') }}",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(response) {
                    setTimeout(() => {
                        $('#candidate_name').val(response.data.full_name[0]);
                        $('#candidate_email').val(response.data.email[0]);
                        $('#candidate_phone').val(response.data.phone[0]);
                        $('#submit_candidate').attr('disabled',false);

                    }, 7000);
                }
            });
        });



        $("#empl_btn1").on("click", function() {
            $("#notice_period").show(300);
            $("#duration_to").hide(300);
        })
        $("#empl_btn2").on("click", function() {
            $("#notice_period").hide(300);
            $("#duration_to").show(300);
        })
        // $("#add_experience").on("click", function() {
        //     $("#remove_experience").show();
        //     $("#add_experience").hide();
        // })
        // $("#remove_experience").on("click", function() {
        //     $("#remove_experience").hide();
        //     $("#add_experience").show();
        // })
        // //end  
        // // add education
        // $('#add_education').on('click', function() {
        //     $("#remove_education").show();
        //     $("#add_education").hide();
        // });
        // $('#remove_education').on('click', function() {
        //     $("#remove_education").hide();
        //     $("#add_education").show();
        // });

        //end
        // add Skillset
        $('#add_skillset').on('click', function() {
            $("#remove_skillset").show();
            $("#add_skillset").hide();
        });
        $('#remove_skillset').on('click', function() {
            $("#remove_skillset").hide();
            $("#add_skillset").show();
        });

        //end
        // add Source
        $('#add_source').on('click', function() {
            $("#remove_source").show();
            $("#add_source").hide();
        });
        $('#remove_source').on('click', function() {
            $("#remove_source").hide();
            $("#add_source").show();
        });

        //end
        $('#showaltnum').on('click', function() {
            $('#alt-num-table').toggle(500);
        });
        $('#add_candidate').on('click', function() {
            location.href = "view-job-details.php";
            $("#candidates_tab").show();
        });

        function loadmodal() {

            var upload_process = $("#upload_process");
            var resume_processing_card = $("#resume_processing_card");
            var resume_processing = $("#resume_processing");
            var show_resume = $("#show_resume");


            setTimeout(function() {
                upload_process.hide();
                resume_processing_card.show();
                setTimeout(function() {
                    resume_processing_card.hide();
                    resume_processing.show();
                    setTimeout(function() {
                        resume_processing.hide();
                        show_resume.show();
                        setTimeout(function() {

                        }, 1000)
                    }, 3000)
                }, 3000)

            }, 1000)
        }
        $(document).ready(function() {
            $('#upload_resume').change(function(e) {
                var file_size = ((this.files[0].size) / 1024 / 1024).toFixed(2) + " MB";
                $('#file_sz').text(file_size);
                $('#file_sz1').text(file_size);
                $('#file_name').text("Importing... " + $(this).val().replace(/C:\\fakepath\\/i, ''));
                $('#file_name1').text("Imported " + $(this).val().replace(/C:\\fakepath\\/i, ''));

                loadmodal();

                // myModal.show(400);
            });
        });
        @if (Session::has('duplicate'))
            Snackbar.show({
                text: '{{ Session::get('duplicate') }}',
                pos: 'bottom-center'
            });
        @endif
        $('#submit_candidate').click(function(e) {
            e.preventDefault();
            var check_blank = 0;
            $('#processing').removeClass('d-none');
            $('#submit_candidate').addClass('d-none');
            var pattern = new RegExp(
                /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i
            );
            if ($('#candidate_name').val() == "") {
                check_blank++;
                $('#processing').addClass('d-none');
                $('#submit_candidate').removeClass('d-none');
                Snackbar.show({
                    text: 'Candidate name is required !',
                    pos: 'bottom-center'
                });
                $('#candidate_name').focus();

            } else if ($('#candidate_email').val() == "") {
                check_blank++;
                Snackbar.show({
                    text: 'Candidate email is required !',
                    pos: 'bottom-center'
                });
                $('#candidate_email').focus();
                $('#processing').addClass('d-none');
                $('#submit_candidate').removeClass('d-none');
            } else if (!pattern.test($('#candidate_email').val())) {
                check_blank++;
                Snackbar.show({
                    text: 'Candidate email is not valid !',
                    pos: 'bottom-center'
                });
                $('#candidate_email').focus();
                $('#processing').addClass('d-none');
                $('#submit_candidate').removeClass('d-none');
            } else if ($('#candidate_phone').val() == "") {
                check_blank++;
                Snackbar.show({
                    text: 'Candidate phone is required !',
                    pos: 'bottom-center'
                });
                $('#candidate_phone').focus();
                $('#processing').addClass('d-none');
                $('#submit_candidate').removeClass('d-none');
            }
            if (check_blank == 0) {

                // $('#submit_single_candidate').submit();
                var formData = new FormData($('#submit_single_candidate')[0]);
                $.ajax({
                    url: '{{ route('add_single_candidates') }}',
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        $('#processing').addClass('d-none');
                        $('#submit_candidate').removeClass('d-none');
                        if (data == "exist") {
                            Snackbar.show({
                                text: 'Candidate Already Exist In Cloud!',
                                pos: 'bottom-center'
                            });
                            $("#show_resume").hide();
                            $("#upload_process").show();
                            var drEvent = $('.dropify').dropify();
                            drEvent = drEvent.data('dropify');
                            drEvent.resetPreview();
                            drEvent.clearElement();
                            $('#submit_single_candidate')[0].reset();

                        }
                        if (data == "Inserted") {
                            Snackbar.show({
                                text: 'Candidate Added Successfully !',
                                pos: 'bottom-center'
                            });
                            $("#show_resume").hide();
                            $("#upload_process").show();
                            var drEvent = $('.dropify').dropify();
                            drEvent = drEvent.data('dropify');
                            drEvent.resetPreview();
                            drEvent.clearElement();
                            $('#submit_single_candidate')[0].reset();
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }

        });
        $('#sa-warning').click(function(e) {
            e.preventDefault();
            $("#show_resume").hide();
            $("#upload_process").show();
            var drEvent = $('.dropify').dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
        });
        $('#reset_form').click(function(e) {
            e.preventDefault();
            $("#show_resume").hide();
            $("#upload_process").show();
            var drEvent = $('.dropify').dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            $('#submit_single_candidate')[0].reset();
            Snackbar.show({
                text: 'Form reset done !',
                pos: 'bottom-center'
            });
        });
        $('.form-select-notice').on('change', function() {
        var select_notice = $(".form-select-notice").val();
        if (select_notice == "Serving Notice") {
            $("#serving_notice").show(300);
        } else {
            $("#serving_notice").hide(300);
        }

    });
    $('#select_all_jobs').click(function (e) { 
        // console.log($(e.target).parents('body').find('div#home1').find('input[type="checkbox"]'))
        $(e.target).parents('body').find('div#home1').find('input[type="checkbox"]').each(function(index, element) {
                element.checked = $(e.target).is(':checked');
                // $(e.target).parents('body').find('div#home1').find('.card-header').css("background-color", "yellow !important");
            });
    });
   
    </script>
@endsection

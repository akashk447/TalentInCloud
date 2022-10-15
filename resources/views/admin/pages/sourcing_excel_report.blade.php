@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-soft-warning">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="assets/images/brands/slack.png" alt=""
                                                            class="avatar-xs">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    @php
                                                        $job_details = get_job_details($job_id);
                                                    @endphp
                                                    <h4 class="fw-bold">{{ $job_details->job_title }} </h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-user-3-fill align-bottom me-1"></i>
                                                            {{ Auth::user()->name }}</div>
                                                        <div class="vr"></div>
                                                        <div>Source Date : <span
                                                                class="fw-medium">{{ date('d M Y', strtotime(today_date())) }}</span>
                                                        </div>
                                                        <div class="vr"></div>
                                                        <div>Extracted File : <span
                                                                class="fw-medium">{{ $file_name }}</span></div>
                                                        {{-- <div class="vr"></div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">

                                    </div>
                                </div>

                                
                            </div>
                            <!-- end card body -->
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="project-overview" role="tabpanel">
                            <div class="row">
                                <div class="col-xl-9 col-lg-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-muted">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Extracted File Summary</h6>
                                                {{-- <p>It will be as simple as occidental in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p> --}}
                                                
                                                <ul class="ps-4 vstack gap-2">
                                                    <li>Total Candidate Serialized For Extraction :  {{$all_canditates_received}}</li>
                                                    <li>Total Candidate Added To Cloud Pool : {{$total_candidate_sourced}}</li>
                                                    <li>Total Candidate Duplicate For This Job : {{$total_candidate_duplicate}}</li>
                                                    <li>Nullable/UnReadable Invalid Email Id : {{$invalid_email_id}}</li>
                                                    <li>Nullable/UnReadable Invalid Mobile Number : {{$invalid_mobile_no}}</li>
                                                </ul>



                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <div class="row">

                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Sourced Date :</p>
                                                                <h5 class="fs-15 mb-0">
                                                                    {{ date('d M Y', strtotime(today_date())) }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Sourced Time :</p>
                                                                <h5 class="fs-15 mb-0">{{ $source_time }}</h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                @php
                                                                    $start = strtotime(substr($source_time, 0, 8));
                                                                    $end = strtotime(substr(today_time(), 0, 8));
                                                                    $mins = ($end - $start) / 60;
                                                                    $time_taken = round(abs($mins) / 60,2). " minute";
                                                                @endphp
                                                                <p class="mb-2 text-uppercase fw-medium">Total Time Taken :
                                                                </p>
                                                                <div class="badge bg-danger fs-12">{{$time_taken}}</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 col-sm-6">
                                                            <div>
                                                                <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                                                <div class="badge bg-warning fs-12">Completed</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-3 border-top border-top-dashed mt-4">
                                                    <h6 class="mb-3 fw-semibold text-uppercase">Resources</h6>
                                                    <div class="row g-3">
                                                        <div class="col-xxl-4 col-lg-6">
                                                            <div class="border rounded border-dashed p-2">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="flex-shrink-0 me-3">
                                                                        <div class="avatar-sm">
                                                                            <div
                                                                                class="avatar-title bg-light text-secondary rounded fs-24">
                                                                                <i class="ri-file-excel-2-line"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <h5 class="fs-13 mb-1"><a href="#"
                                                                                class="text-body text-truncate d-block">{{ $file_name }}</a>
                                                                        </h5>
                                                                        <div>Extracted</div>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <div class="d-flex gap-1">
                                                                            <button type="button" disabled
                                                                                class="btn btn-icon text-muted btn-sm fs-18"><i
                                                                                    class="ri-download-2-line"></i></button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end col -->

                                                        <!-- end col -->
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->


                                    <!-- end card -->
                                </div>
                                <!-- ene col -->
                                <div class="col-xl-3 col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            {{-- <h5 class="card-title mb-4">dasas</h5> --}}
                                            <div class="col-12">
                                                {{-- <button type="button" class="btn btn-ghost-secondary btn-icon waves-effect me-1"><i class="ri-attachment-line fs-16"></i></button> --}}
                                                <a href="{{route('manage_jobs')}}" class="btn btn-success">Back To Excel Import</a>
                                            </div>
                                        </div>
                                        <!-- end card body -->
                                    </div>
                                    <!-- end card -->


                                    <!-- end card -->


                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end tab pane -->

                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/pages/project-overview.init.js') }}"></script>
@endsection

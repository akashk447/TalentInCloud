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
                                                @if($company->logo)
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{asset('assets/logo_image/').'/'.$company->logo}}" alt="" class="avatar-xs image_src">
                                                    </div>
                                                @else
                                                    <div class="avatar-title bg-white rounded-circle">
                                                        <img src="{{asset('assets/images/noimg.png')}}" alt="" class="avatar-xs image_src">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div>
                                                <h4 class="fw-bold">{{ $company->client_name }}</h4>
                                                <div class="hstack gap-3 flex-wrap">
                                                    <div><i class="ri-building-line align-bottom me-1"></i> {{ $company->user_name }} </div>
                                                    <div class="vr"></div>
                                                    <div>Create Date : <span class="fw-medium">{{ date('d M,Y', strtotime($company->contract_start)) }}</span></div>
                                                    <div class="vr"></div>
                                                    <div>Due Date : <span class="fw-medium">{{ $company->contract_end }}</span></div>
                                                    <div class="vr"></div>
                                                    <div class="badge rounded-pill bg-info fs-12">New</div>
                                                    <div class="badge rounded-pill bg-danger fs-12">High</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="hstack gap-1 flex-wrap">
                                        <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                            <i class="ri-star-fill"></i>
                                        </button>
                                        <button type="button" class="btn py-0 fs-16 text-body">
                                            <i class="ri-share-line"></i>
                                        </button>
                                        <button type="button" class="btn py-0 fs-16 text-body">
                                            <i class="ri-flag-line"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#project-overview" role="tab">
                                        Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-documents" role="tab">
                                        Documents
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-activities" role="tab">
                                        Activities
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#project-team" role="tab">
                                        Team
                                    </a>
                                </li>
                            </ul>
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
                        <div class="row h-100">
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-money-dollar-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                                    Total Invested</p>
                                                <h4 class=" mb-0">$<span class="counter-value" data-target="2390.68">0</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge badge-soft-success"><i class="ri-arrow-up-s-fill align-middle me-1"></i>6.24
                                                    %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-arrow-up-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">
                                                    Total Change</p>
                                                <h4 class=" mb-0">$<span class="counter-value" data-target="19523.25">0</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge badge-soft-success"><i class="ri-arrow-up-s-fill align-middle me-1"></i>3.67
                                                    %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-arrow-down-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Day
                                                    Change</p>
                                                <h4 class=" mb-0">$<span class="counter-value" data-target="14799.44">0</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge badge-soft-danger"><i class="ri-arrow-down-s-fill align-middle me-1"></i>4.80
                                                    %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-lg-3 col-md-6">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                    <i class="ri-arrow-down-circle-fill align-middle"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-uppercase fw-semibold fs-12 text-muted mb-1">Day
                                                    Change</p>
                                                <h4 class=" mb-0">$<span class="counter-value" data-target="14799.44">0</span></h4>
                                            </div>
                                            <div class="flex-shrink-0 align-self-end">
                                                <span class="badge badge-soft-danger"><i class="ri-arrow-down-s-fill align-middle me-1"></i>4.80
                                                    %<span>
                                                    </span></span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                        <div class="row ">
                            <div class="col-xl-9 col-lg-8">
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="text-muted">
                                            <h6 class="mb-3 fw-semibold text-uppercase">Summary</h6>
                                            @if (strlen($company->about_client)>200)
                                            <p>{!! substr($company->about_client,0,200) !!}</p>
                                            <div>
                                                <button type="button" class="btn btn-link link-success p-0">Read more</button>
                                            </div>
                                            @else
                                            <p>{!! $company->about_client !!}</p>
                                            @endif


                                            {{-- <ul class="ps-4 vstack gap-2">
                                                <li>Product Design, Figma (Software), Prototype</li>
                                                <li>Four Dashboards : Ecommerce, Analytics, Project,etc.</li>
                                                <li>Create calendar, chat and email app pages.</li>
                                                <li>Add authentication pages.</li>
                                                <li>Content listing.</li>
                                            </ul> --}}


                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <div class="row">

                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Create Date :</p>
                                                            <h5 class="fs-15 mb-0">{{ date('d M,Y', strtotime($company->date)) }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Due Date :</p>
                                                            <h5 class="fs-15 mb-0">{{ $company->contract_end }}</h5>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Priority :</p>
                                                            <div class="badge bg-danger fs-12">High</div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="col-lg-3 col-sm-6">
                                                        <div>
                                                            <p class="mb-2 text-uppercase fw-medium">Status :</p>
                                                            @if($company->company_status == "INACTIVE")
                                                            <div class="badge bg-danger fs-12">{{ $company->company_status }}</div>
                                                            @endif
                                                            @if($company->company_status == "ACTIVE")
                                                            <div class="badge bg-success fs-12">{{ $company->company_status }}</div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-3 border-top border-top-dashed mt-4">
                                                <h6 class="mb-3 fw-semibold text-uppercase">Resources</h6>
                                                <div class="row g-3">
                                                    <div class="col-xxl-4 col-lg-6">
                                                        @if($company->agreement_file)
                                                        <div class="border rounded border-dashed p-2">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 me-3">
                                                                    <div class="avatar-sm">
                                                                        <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                            <i class="ri-folder-zip-line"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="flex-grow-1 overflow-hidden">
                                                                    <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">{{ $company->agreement_file_name }}</a></h5>
                                                                    <div>{{ $company->file_size }} KB</div>
                                                                </div>
                                                                <!-- <div class="flex-shrink-0 ms-2">
                                                                    <div class="d-flex gap-1">
                                                                        <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                                        <div class="dropdown">
                                                                            <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                <i class="ri-more-fill"></i>
                                                                            </button>
                                                                            <ul class="dropdown-menu">
                                                                                <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                                <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div>NO RESOURCES FOUND</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- end row -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card card-animate">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Company Logs</h4>
                                        <div class="flex-shrink-0">
                                            {{-- <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted">Recent<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Recent</a>
                                                    <a class="dropdown-item" href="#">Top Rated</a>
                                                    <a class="dropdown-item" href="#">Previous</a>
                                                </div>
                                            </div> --}}
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div data-simplebar style="height: 300px;" class="px-3 mx-n3 mb-2">
                                            @foreach ($company_logs as $log)
                                            <div class="d-flex mb-4">
                                                @if($log->profile_image)
                                                <div class="flex-shrink-0">
                                                    <img src="{{asset('assets/user_profile_image/').'/'.$log->profile_image}}" alt="" class="avatar-xs rounded-circle" />
                                                </div>
                                                @else
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('assets/images/users/user-dummy-img.jpg') }}" alt="" class="avatar-xs rounded-circle" />
                                                </div>
                                                @endif
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-13">{{ $log->user_name }} <small class="text-muted ms-2">{{ date('d M,Y', strtotime($log->date)) }} - {{$log->time}}</small></h5>
                                                    <p class="text-muted">{{ $log->activity_notes }}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- ene col -->
                            <div class="col-xl-3 col-lg-4">
                                {{-- <div class="card card-animate">
                                    <div id="line_chart_basic" data-colors='["--vz-primary","--vz-success", "--vz-gray-300"]' class="apex-charts" dir="ltr"></div>
                                </div> --}}
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Skills</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-16">
                                            <div class="badge fw-medium badge-soft-secondary">UI/UX</div>
                                            <div class="badge fw-medium badge-soft-secondary">Figma</div>
                                            <div class="badge fw-medium badge-soft-secondary">HTML</div>
                                            <div class="badge fw-medium badge-soft-secondary">CSS</div>
                                            <div class="badge fw-medium badge-soft-secondary">Javascript</div>
                                            <div class="badge fw-medium badge-soft-secondary">C#</div>
                                            <div class="badge fw-medium badge-soft-secondary">Nodejs</div>
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card card-animate">
                                    <div class="card-header align-items-center d-flex border-bottom-dashed">
                                        <h4 class="card-title mb-0 flex-grow-1">Members</h4>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                                            <div class="vstack gap-3">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a></h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button" class="btn btn-light btn-sm">Message</button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end member item -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                                            HB
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a></h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button" class="btn btn-light btn-sm">Message</button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end member item -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a></h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button" class="btn btn-light btn-sm">Message</button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end member item -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer Carter</a></h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button" class="btn btn-light btn-sm">Message</button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end member item -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <div class="avatar-title bg-soft-success text-success rounded-circle">
                                                            AC
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a></h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button" class="btn btn-light btn-sm">Message</button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end member item -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-xs flex-shrink-0 me-3">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a></h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex align-items-center gap-1">
                                                            <button type="button" class="btn btn-light btn-sm">Message</button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon btn-sm fs-16 text-muted dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end member item -->
                                            </div>
                                            <!-- end list -->
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->

                                <div class="card card-animate">
                                    <div class="card-header align-items-center d-flex border-bottom-dashed">
                                        <h4 class="card-title mb-0 flex-grow-1">Attachments</h4>
                                        <div class="flex-shrink-0">
                                            <button type="button" class="btn btn-soft-info btn-sm"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload</button>
                                        </div>
                                    </div>

                                    <div class="card-body">

                                        <div class="vstack gap-2">
                                            <!-- <div class="border rounded border-dashed p-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                <i class="ri-folder-zip-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">App-pages.zip</a></h5>
                                                        <div>2.2MB</div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="d-flex gap-1">
                                                            <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                    <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="border rounded border-dashed p-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                <i class="ri-file-ppt-2-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">Velzon-admin.ppt</a></h5>
                                                        <div>2.4MB</div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="d-flex gap-1">
                                                            <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                    <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> -->

                                            @if($company->agreement_file)
                                            <div class="border rounded border-dashed p-2">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar-sm">
                                                            <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                <i class="ri-folder-zip-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1 overflow-hidden">
                                                        <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">{{ $company->agreement_file_name }}</a></h5>
                                                        <div>{{ $company->file_size }}</div>
                                                    </div>
                                                    <div class="flex-shrink-0 ms-2">
                                                        <div class="d-flex gap-1">
                                                            <!-- <button type="button" class="btn btn-icon text-muted btn-sm fs-18"><i class="ri-download-2-line"></i></button>
                                                            <div class="dropdown">
                                                                <button class="btn btn-icon text-muted btn-sm fs-18 dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill"></i>
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <li><a class="dropdown-item" href="#"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Rename</a></li>
                                                                    <li><a class="dropdown-item" href="#"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                                                </ul>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @else
                                            <div>NO ATTACHMENTS FOUND</div>
                                            @endif
                                            {{-- <div class="mt-2 text-center">
                                                <button type="button" class="btn btn-success">View more</button>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- end card body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane fade" id="project-documents" role="tabpanel">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h5 class="card-title flex-grow-1">Documents</h5>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless align-middle mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">File Name</th>
                                                        <th scope="col">Type</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Upload Date</th>
                                                        <th scope="col" style="width: 120px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-light text-secondary rounded fs-24">
                                                                        <i class="ri-folder-zip-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h5 class="fs-14 mb-0"><a href="javascript:void(0)" class="text-dark">{{ $company->agreement_file }}</a></h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $company->file_ext }} File</td>
                                                        <td>{{ $company->file_size }} KB</td>
                                                        <td>12 Dec 2021</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);" class="btn btn-soft-secondary btn-sm btn-icon" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <i class="ri-more-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end">
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill me-2 align-bottom text-muted"></i>View</a></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-download-2-fill me-2 align-bottom text-muted"></i>Download</a></li>
                                                                    <li class="dropdown-divider"></li>
                                                                    <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill me-2 align-bottom text-muted"></i>Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div class="text-center mt-3">
                                            <a href="javascript:void(0);" class="text-success "><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </a>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane fade" id="project-activities" role="tabpanel">
                        <div class="card card-animate">
                            <div class="card-body">
                                <h5 class="card-title">Activities</h5>
                                <div class="acitivity-timeline py-3">
                                    @foreach ($company_logs as $log)
                                    <div class="acitivity-item d-flex">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">{{ $log->user_name }} <span class="badge bg-soft-primary text-primary align-middle">New</span></h6>
                                            <p class="text-muted mb-2">{{ $log->activity_notes }}</p>
                                        </div>
                                    </div><br>
                                    @endforeach
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!-- end tab pane -->
                    <div class="tab-pane fade" id="project-team" role="tabpanel">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div class="d-flex">
                                    <div class="search-box me-2">
                                        <input type="text" class="form-control" placeholder="Search member...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-auto">
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#inviteMembersModal"><i class="ri-share-line me-1 align-bottom"></i> Invite Member</button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="team-list list-view-filter">
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Nancy Martino</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Team Leader & HR</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">225</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">197</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn active">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                                        HB
                                                    </div>
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Henry Baird</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Full Stack Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">352</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">376</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn active">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Frank Hook</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Project Manager</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">164</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">182</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Jennifer Carter</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">UI/UX Designer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">225</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">197</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <div class="avatar-title bg-soft-success text-success rounded-circle">
                                                        ME
                                                    </div>
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Megan Elmore</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Team Leader & Web Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">201</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">263</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Alexis Clarke</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Backend Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">132</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">147</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <div class="avatar-title bg-soft-info text-info rounded-circle">
                                                        NC
                                                    </div>
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Nathan Cole</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Front-End Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">352</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">376</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Joseph Parker</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Team Leader & HR</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">64</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">93</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <img src="assets/images/users/avatar-5.jpg" alt="" class="img-fluid d-block rounded-circle" />
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Erica Kernan</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Web Designer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">345</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">298</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                            <div class="card team-box card-animate">
                                <div class="card-body px-4">
                                    <div class="row align-items-center team-row">
                                        <div class="col team-settings">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <div class="flex-shrink-0 me-2">
                                                        <button type="button" class="btn fs-16 p-0 favourite-btn">
                                                            <i class="ri-star-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col text-end dropdown">
                                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill fs-17"></i>
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-eye-fill text-muted me-2 align-bottom"></i>View</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-star-fill text-muted me-2 align-bottom"></i>Favourite</a></li>
                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-fill text-muted me-2 align-bottom"></i>Delete</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="team-profile-img">
                                                <div class="avatar-lg img-thumbnail rounded-circle">
                                                    <div class="avatar-title border bg-light text-primary rounded-circle">
                                                        DP
                                                    </div>
                                                </div>
                                                <div class="team-content">
                                                    <a href="#" class="d-block">
                                                        <h5 class="fs-16 mb-1">Donald Palmer</h5>
                                                    </a>
                                                    <p class="text-muted mb-0">Wed Developer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col">
                                            <div class="row text-muted text-center">
                                                <div class="col-6 border-end border-end-dashed">
                                                    <h5 class="mb-1">97</h5>
                                                    <p class="text-muted mb-0">Projects</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="mb-1">135</h5>
                                                    <p class="text-muted mb-0">Tasks</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col">
                                            <div class="text-end">
                                                <a href="pages-profile.php" class="btn btn-light view-btn">View Profile</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end card-->
                        </div>
                        <!-- end team list -->

                        <div class="row g-0 text-center text-sm-start align-items-center mb-3">
                            <div class="col-sm-6">
                                <div>
                                    <p class="mb-sm-0">Showing 1 to 10 of 12 entries</p>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-sm-6">
                                <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                                    <li class="page-item disabled"> <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a> </li>
                                    <li class="page-item"> <a href="#" class="page-link">1</a> </li>
                                    <li class="page-item active"> <a href="#" class="page-link">2</a> </li>
                                    <li class="page-item"> <a href="#" class="page-link">3</a> </li>
                                    <li class="page-item"> <a href="#" class="page-link">4</a> </li>
                                    <li class="page-item"> <a href="#" class="page-link">5</a> </li>
                                    <li class="page-item"> <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a> </li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div>
                    <!-- end tab pane -->
                </div>
            </div>
            <!-- end col -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="inviteMembersModal" tabindex="-1" aria-labelledby="inviteMembersModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header p-3 ps-4 bg-soft-success">
                        <h5 class="modal-title" id="inviteMembersModalLabel">Members</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="search-box mb-3">
                            <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                            <i class="ri-search-line search-icon"></i>
                        </div>

                        <div class="mb-4 d-flex align-items-center">
                            <div class="me-2">
                                <h5 class="mb-0 fs-13">Members :</h5>
                            </div>
                            <div class="avatar-group justify-content-center">
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Brent Gonzalez">
                                    <div class="avatar-xs">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle img-fluid">
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Sylvia Wright">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-secondary">
                                            S
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Ellen Smith">
                                    <div class="avatar-xs">
                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="rounded-circle img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="mx-n4 px-4" data-simplebar style="max-height: 225px;">
                            <div class="vstack gap-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Nancy Martino</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-light btn-sm">Add</button>
                                    </div>
                                </div>
                                <!-- end member item -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs flex-shrink-0 me-3">
                                        <div class="avatar-title bg-soft-danger text-danger rounded-circle">
                                            HB
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Henry Baird</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-light btn-sm">Add</button>
                                    </div>
                                </div>
                                <!-- end member item -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Frank Hook</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-light btn-sm">Add</button>
                                    </div>
                                </div>
                                <!-- end member item -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Jennifer Carter</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-light btn-sm">Add</button>
                                    </div>
                                </div>
                                <!-- end member item -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs flex-shrink-0 me-3">
                                        <div class="avatar-title bg-soft-success text-success rounded-circle">
                                            AC
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Alexis Clarke</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-light btn-sm">Add</button>
                                    </div>
                                </div>
                                <!-- end member item -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs flex-shrink-0 me-3">
                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="img-fluid rounded-circle">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fs-13 mb-0"><a href="#" class="text-body d-block">Joseph Parker</a></h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <button type="button" class="btn btn-light btn-sm">Add</button>
                                    </div>
                                </div>
                                <!-- end member item -->
                            </div>
                            <!-- end list -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light w-xs" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success w-xs">Invite</button>
                    </div>
                </div>
                <!-- end modal-content -->
            </div>
            <!-- modal-dialog -->
        </div>
        <!-- end modal -->
    </div>
</div>
@endsection
@section('script')

@endsection
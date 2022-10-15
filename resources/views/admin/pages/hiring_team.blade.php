@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content ">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">HIRING TEAM</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">Add a Job</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card mb-3">
                                <div class="card-header align-items-center d-flex">
                                    <h3 class="card-title mb-0 flex-grow-1"><span class="align-top">Team Members</span></h3>
                                    <div class="flex-shrink-0 font-f-R mt-10" data-bs-toggle="modal"
                                        data-bs-target="#zoomInModal">
                                        <h6 class="text-lg-end c-pointer text-info">
                                            <i class="ri-user-add-line me-1 font-18"></i><span class="font-15 align-top">Invite your Team</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="align-items-center d-flex mb-3">
                                        <p class=" mb-0 flex-grow-1 ">Assign Team Members.</p>
                                        <div class="flex-shrink-0 ">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <label for="form-grid-showcode" class="form-label text-muted font-11">
                                                    Assign all team members</label>
                                                <input class="form-check-input code-switcher" type="checkbox"
                                                    id="assign-all" name="assign_all" value="all"
                                                    {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="live-preview">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="card card-light mb-0 card-animate">
                                                    <div class="card-body">
                                                        <form action="{{ route('job_hiring_team_post') }}" method="post"
                                                            id="submit-hiring-team">
                                                            @csrf
                                                            <div class="row">
                                                                <input type="hidden" name="job_id"
                                                                    value="{{ $job_id }}">
                                                                <input type="hidden" name="assign" id="assign">
                                                                @foreach ($get_team as $team)
                                                                    <input type="hidden" name="team_id[]"
                                                                        value="{{ $team->id }}">
                                                                    <div class="col-xl-4">
                                                                        <div class="card mb-3">
                                                                            <div class="card-body ">
                                                                                <div class="d-flex align-items-center">
                                                                                    <div class="me-2">
                                                                                        <img src="{{ asset('assets/images/Akash.jpg') }}"
                                                                                            alt=""
                                                                                            class="avatar-sm rounded-circle">
                                                                                    </div>
                                                                                    <div class="me-4">
                                                                                        <h5 class="c-pointer">
                                                                                            {{ $team->name }}<br> <small
                                                                                                class="text-muted font-12 ">{{ $team->email }}</small>
                                                                                        </h5>
                                                                                    </div>
                                                                                    <div class="mt-10">
                                                                                        <h6 class="c-pointer"><i
                                                                                                class="ri-delete-back-2-line font-15"></i>
                                                                                        </h6>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                                {{-- <select multiple="multiple" id="myMulti">
                                                                    <option>Item 1</option>
                                                                    <option>item 2</option>
                                                                    <option>item 3</option>
                                                                    <option>item 4</option>
                                                                    
                                                                  </select> --}}
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-none code-view">
                                    <div class="card-body">
                                        <div class="profile-timeline">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingOne">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-primary rounded-circle">
                                                                        <!-- <i class="ri-shopping-bag-line"></i> -->
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-15 mb-0 fw-semibold">NEW </h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingTwo">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-secondary rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-15 mb-1 fw-semibold">SCREEN </h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingThree">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-success rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-15 mb-1 fw-semibold">INTERVIEW </h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFour">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-info rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">OFFER</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFive">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-warning rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">HIRE</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseFive" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFive">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-dark rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">ON HOLD</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapsesix" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFive">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseseeven" aria-expanded="false" aria-controls="collapseseeven">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title text-primary bg-danger rounded-circle">

                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">REJECT</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseseeven" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFive">
                                                        <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">WITHDRAW</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseeight" class="accordion-collapse collapse show" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="card card-light mb-0 card-animate">
                                                                        <div class="card-body ">
                                                                            <div class="row">
                                                                                <div class="col-xl-5">
                                                                                    <div class="card mb-0">
                                                                                        <div class="card-body">
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="me-2">
                                                                                                    <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-sm rounded-circle">

                                                                                                </div>
                                                                                                <div class="me-4">
                                                                                                    <h5 class="c-pointer">saroj swain <small class="text-muted font-12 ">saroj@solution.in</small></h5>

                                                                                                </div>
                                                                                                <div class="mt-10">
                                                                                                    <h6 class="c-pointer"><i class="ri-delete-back-2-line font-15"></i></h6>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end accordion-->
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-header align-items-center d-flex">
                                    <h3 class="card-title mb-0 flex-grow-1"><span class="align-top"> Recruiting
                                            Agencies</span> </h3>
                                    <div class="flex-shrink-0 font-f-R mt-10">
                                        <h6 class="text-lg-end c-pointer text-info ">
                                            <i class="ri-user-add-line me-1 font-18 "></i><span
                                                class="font-15 align-top">Invite Recruiter</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="card card-light mb-3 card-animate" style="height:100px">
                                                <div class="card-body ">

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Secondary Alert -->
                                    @if (Auth::user()->email_verify == 'No')
                                        <div class="mb-3">
                                            <div class="alert alert-warning alert-dismissible alert-label-icon rounded-label fade show"
                                                role="alert">
                                                <i class="ri-alert-line label-icon"></i>This feature is temporarily disabled
                                                on your account. Please confirm your email address to enable this feature.
                                                <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row mt-4 ">
                                        <div class="col-lg-6">
                                            <button onclick="history.back()"
                                                class="btn btn-light btn-border me-3">Back</button>
                                        </div>
                                        @if (!Session::has('posting_type'))
                                            
                                        <div class="col-lg-6 text-lg-end">
                                            <a href="{{ url('job-share-social') }}/{{ $job_id }}"><button
                                                    class="btn btn-light btn-border me-3">Skip</button></a>
                                            <button class="btn btn-primary btn-border" id="submit-hiring"
                                                {{ Auth::user()->email_verify == 'No' ? 'disabled' : '' }}>Save &amp;
                                                Next</button>
                                        </div>
                                        @else
                                        <div class="col-lg-6 text-lg-end">
                                            <a href="{{route('manage_jobs')}}"><button class="btn btn-primary btn-border">Finish Posting</button></a>
                                            
                                        </div>
                                        
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div id="zoomInModal" data-bs-backdrop="modal" class="modal fade zoomIn" tabindex="-1"
                        aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="card mb-0">
                                    <div class="card-header align-items-center d-flex">
                                        <h2 class="mb-0 flex-grow-1 font-f-R">Invite your Team</h2>
                                        <div class="flex-shrink-0 font-f-R">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="choices-text-unique-values" class="form-label text-muted">
                                                Administrators</label>
                                            <input class="form-control " id="choices-text-unique-values" data-choices
                                                data-choices-text-unique-true type="text"
                                                value="Project-A, Project-B" />
                                            <small class="text-muted font-10 font-f-R">Have full access to your Jobsoid
                                                account. Can view Jobs and Candidates of all users.</small>
                                        </div>
                                        <div class="mb-4">
                                            <label for="choices-text-unique-values" class="form-label text-muted">
                                                Managers</label>
                                            <input class="form-control" id="choices-text-unique-values" data-choices
                                                data-choices-text-unique-true type="text"
                                                value="Project-A, Project-B" />
                                            <small class="text-muted font-10 font-f-R">Have full access to own data and
                                                read-only access to others’ data unless authorized.</small>
                                        </div>
                                        <div class="mb-4">
                                            <label for="choices-text-unique-values" class="form-label text-muted">
                                                Users</label>
                                            <input class="form-control" id="choices-text-unique-values" data-choices
                                                data-choices-text-unique-true type="text"
                                                value="Project-A, Project-B" />
                                            <small class="text-muted font-10 font-f-R">Have least access rights and cannot
                                                view data created by others unless authorized.</small>
                                        </div>
                                        <div class="text-lg-end">
                                            <button type="button" class="btn btn-primary ">Invite</button>
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.modal -->
                </div>
            </div>





        </div>
    </div>
@endsection
@section('script')

<script src="{{ asset('assets/js/pages/select2.init.js') }}"></script>
    <script>
        $('#submit-hiring').click(function(e) {
            e.preventDefault();
            if ($('#assign-all').is(':checked')) {
                $('#assign').val("All");
            }
            else{
                $('#assign').val("selected");
            }
            $('#submit-hiring-team').submit();
        });
    </script>
@endsection

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Applicant | Talent In Cloud</title>
    @include('admin.include.meta_header')


</head>

<body>


    <div class="page-content pt-2 pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-8">

                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-2">
                                    <div class="row g-4">
                                        <div class="col-12 col-lg-auto col-sm-12 text-center">
                                            <div class="avatar-md mx-auto mb-3 position-relative img-animate">
                                                <img src="{{ asset('assets/images/candidate-avatar.jpg') }}"
                                                    class="avatar-md rounded-circle" alt="...">
                                                <a href="apps-mailbox.html"
                                                    class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                    <div class="avatar-title bg-transfer">
                                                        {{-- substr($username, 0, 1) --}}
                                                        @php
                                                            $name_list = explode(' ', $get_applicant_details->candidate_name);
                                                        @endphp
                                                        {{-- {{var_dump($name_list)}} --}}
                                                        <span
                                                            class="text-light">{{ isset($name_list[0]) ? substr($name_list[0], 0, 1) : '' }}{{ isset($name_list[1]) ? substr($name_list[1], 0, 1) : '' }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col p-0">
                                            <div class="p-2">
                                                <h3 class="text-primary mb-1 fs-19 cand-info">
                                                    {{ $get_applicant_details->candidate_name }}</h3>
                                                <!-- <p class=" text-primary-75">Owner &amp; Founder</p> -->
                                                <div class="hstack gap-2 flex-wrap mb-2 cand-info">
                                                    <div class="me-2">
                                                        <i
                                                            class="ri-phone-line me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">+91
                                                            {{ $get_applicant_details->candidate_phone }} </span>
                                                    </div>
                                                    <div class="me-2">
                                                        <i
                                                            class="ri-mail-line me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">{{ $get_applicant_details->candidate_email }}</span>
                                                    </div>
                                                    <div class="me-2 ">
                                                        <i
                                                            class="ri-map-pin-user-line me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">{{ $get_applicant_details->candidate_location }}</span>
                                                    </div>

                                                </div>
                                                <div class="hstack gap-2 flex-wrap mb-2 cand-info">
                                                    <div class="me-2">
                                                        <p class="text-muted"><b>Currently/Resigned </b>as <b>Project
                                                                Manager <span class="text-primary">(6Yrs)</span></b> at
                                                            <b>IBM </b> all Overally Experience <b><span
                                                                    class="text-primary">15yrs </span></b> 3 Compnies.
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <!--end col-->

                                        <div class="col-12 col-lg-auto">
                                            <div class="row text text-primary-50 text-center">
                                                <div class="col-lg-12 col-4 mx-auto ">
                                                    <div class="p-2">
                                                        <h4 class="text-primary mb-1 fs-14 c-pointer"> <i
                                                                class=" ri-edit-2-fill align-middle me-1"></i>Edit</h4>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end col-->

                                    </div>

                                    <div
                                        class="d-flex justify-content-end align-items-center text-primary-50 mx-auto cand-info">
                                        <div class="me-2">
                                            <h4 class="text-muted mb-1 fs-12 c-pointer">NP:- <span
                                                    class="text-primary fs-11">15.07.2022</span> </h4>

                                        </div>
                                        <div>
                                            <h4 class="text-muted mb-1 fs-12 c-pointer">Last Working Days:- <span
                                                    class="text-primary fs-11">30.07.2022</span> </h4>

                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-1">
                                    <div class="row">
                                        <div class="col-auto pe-0">
                                            <img class="rounded ms-1" src="{{ asset('assets/images/no_company.jpg') }}"
                                                alt="Generic placeholder image" height="32">
                                        </div>
                                        <div class="col ps-0">
                                            <h3 class="mt-0 mb-1 ms-2 fs-20">
                                                <a href="#" class="font-w-600 text-dark" target="_blank">
                                                    <b>{{ $get_jobowner_details->job_company_name }}</b></a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto ps-4">
                                            <i class="ri-briefcase-4-line text-muted fs-12"></i>
                                        </div>
                                        <div class="col ps-0  ">
                                            <p class="text-muted mb-0 fs-11">

                                                {{ $get_jobowner_details->job_title }} ,
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto ps-4">
                                            <i class="ri-map-pin-line text-muted fs-12"></i>
                                        </div>
                                        <div class="col ps-0  ">
                                            <p class="text-muted fs-11">

                                                {{ $get_jobowner_details->job_location }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start justify-content-start mt-1">

                                        <div class="avatar-sm mx-auto position-relative img-animate">
                                            <img src="assets/images/users/avatar-2.jpg" class="avatar-sm rounded-circle"
                                                alt="..." style="height:32px;width:32px">
                                        </div>
                                        <div class="w-100">

                                            <h3 class="mt-0 mb-1 ms-2 fs-13">
                                                <a href="#" class="font-w-600 text-dark" target="_blank">
                                                    <b>{{ $get_jobowner_details->job_posted_by_username }}</b></a>
                                            </h3>
                                            </h6>
                                            @php
                                                $owner_info = get_owner_details($get_jobowner_details->job_posted_by_userid);
                                            @endphp
                                            <small class="text-muted ms-1"><i
                                                    class="ri-map-pin-line fs-10 me-1 align-middle"></i><b>Bhubaneswar
                                                    ,</b>
                                                <span class="ms-1"><b> <i
                                                            class="ri-phone-line fs-10 me-1 align-middle"></i>
                                                        {{ $owner_info->phone }}</b></span></small>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-2">
                                    <div class="row g-4">

                                        <!--end col-->
                                        <div class="col p-0">
                                            <div class="p-2">
                                                <h3 class="text-primary mb-4 fs-19 cand-info"> All Personal Information
                                                </h3>
                                                <div class="row hstack  flex-wrap mb-2 cand-info">
                                                    <div class="col-lg-4 col-sm-4">
                                                        <i
                                                            class="mdi mdi-book-education me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">{{ $get_applicant_details->candidate_high_qual }}
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <i
                                                            class="ri-calendar-fill me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">{{ $get_applicant_details->candidate_dob }}</span>
                                                    </div>
                                                    <div class="col-lg-4 col-sm-4">
                                                        <i
                                                            class="ri-money-cny-circle-fill me-1 text-muted fs-13 align-middle"></i><span
                                                            class="text-muted fs-12">Rs. 300000</span>
                                                    </div>


                                                </div>

                                            </div>

                                        </div>
                                        <!--end col-->

                                        <div class="col-12 col-lg-auto">
                                            <div class="row text text-primary-50 text-center">
                                                <div class="col-lg-12 col-4 mx-auto ">
                                                    <!-- Dropdown Variant -->
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-primary dropdown-toggle btn-sm"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Action</button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#centermdal">Add Notes</a>
                                                            <a class="dropdown-item" href="{{route('view_applicant_update_submittal',['applikey'=>$get_applicant_details->applicant_key])}}">Change
                                                                Status</a>
                                                        </div>
                                                    </div><!-- /btn-group -->
                                                </div>

                                            </div>
                                        </div>
                                        <!--end col-->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body pb-3">
                                    <h4 class="card-title mb-4">Questionnaires</h4>
                                    <div class="row mb-2">
                                        <div class="col-auto pe-0">

                                            <i class="mdi mdi-file-edit-outline fs-22 me-2 text-muted"></i>
                                        </div>
                                        <div class="col ps-0">
                                            <h6 class="text-muted fs-12 mb-0">Screen candidates on relevant questions
                                                with intelligent questionnaires.
                                            </h6>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1"><i
                                            class=" ri-file-copy-line text-muted fs-17 align-middle"></i> Activity ({{count($get_history)}})
                                    </h4>
                                    <div class="flex-shrink-0">
                                        <div class="dropdown card-header-dropdown">
                                            <a class="text-reset dropdown-btn" href="#"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted">Recent<i
                                                        class="mdi mdi-chevron-down ms-1"></i></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Recent</a>
                                                <a class="dropdown-item" href="#">Top Rated</a>
                                                <a class="dropdown-item" href="#">Previous</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body mb-2">

                                    <div data-simplebar="init" style="height: 300px;" class="px-3 mx-n3 mb-2">
                                        <div class="simplebar-wrapper" style="margin: 0px -16px;">
                                            <div class="simplebar-height-auto-observer-wrapper">
                                                <div class="simplebar-height-auto-observer"></div>
                                            </div>
                                            <div class="simplebar-mask">
                                                <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                                    <div class="simplebar-content-wrapper" tabindex="0"
                                                        role="region" aria-label="scrollable content"
                                                        style="height: 100%; overflow: hidden scroll;">
                                                        <div class="simplebar-content" style="padding: 0px 16px;">
                                                            @foreach ($get_history as $history)
                                                            <div class="d-flex">
                                                                <div class="flex-shrink-0">
                                                                    @if (Auth::user()->profile_image == '')
                                                                        <img src="{{ asset('assets/images/profile-bg.jpg') }}"
                                                                            alt=""
                                                                            class="avatar-xs rounded-circle">
                                                                    @else
                                                                        <img src="{{ asset('profile_image') }}/{{ Auth::user()->profile_image }}"
                                                                            alt=""
                                                                            class="avatar-xs rounded-circle">
                                                                    @endif
                                                                </div>
                                                                <div class="flex-grow-1 ms-3 align-items-center">
                                                                    <h5 class="fs-13">{{$history->user_name}} <small
                                                                            class="text-muted ms-2"><i
                                                                                class="ri-time-line text-muted align-bottom fs-13"></i>{{$history->date}} {{$history->time}}</small></h5>
                                                                    <p class="text-muted">{{$history->activity_notes}}</p>

                                                                </div>
                                                                <div class="flex-grow-1 ">
                                                                    <p class="text-end text-muted mb-1">{{$history->activity_type}}</p>
                                                                    {{-- <p class="text-end mb-0"> <i
                                                                            class="ri-eye-line text-primary fs-14"></i>
                                                                    </p> --}}
                                                                </div>
                                                            </div>
                                                            @endforeach


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- end card body -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-header align-items-center d-flex border-bottom-dashed p-1">
                                    <h4 class="card-title mb-0 flex-grow-1 ms-3">Attachments</h4>
                                    <div class="flex-shrink-0 me-3">
                                        <button type="button" class="btn btn-soft-primary btn-sm"><i
                                                class="ri-upload-2-fill me-1 align-bottom"></i> Upload</button>
                                    </div>
                                </div>
                                <div class="card-body pb-3">
                                    <div class="vstack gap-2">
                                        <div class="border rounded border-dashed p-1">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm" style="height: 2rem;width: 2rem;">
                                                        <div
                                                            class="avatar-title bg-light text-secondary rounded fs-20">
                                                            <i class="mdi mdi-file-pdf-box"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-12 mb-1"><a href="#"
                                                            class="text-body text-truncate d-block text-muted">saroj-kumar-swain-resume.pdf</a>
                                                    </h5>
                                                    <div class="fs-11 text-muted">2.2MB</div>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="d-flex gap-2">
                                                        <button type="button"
                                                            class="btn btn-icon text-muted btn-sm fs-13 mt-1"><span
                                                                class="badge badge-soft-primary p-1">Resume</span></button>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-icon text-muted btn-sm fs-18 dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                        Preview</a></li>
                                                                <li><a class="dropdown-item" href="#"><i
                                                                            class="ri-download-2-fill align-bottom me-2 text-muted"></i>
                                                                        Download</a></li>
                                                                <li><a class="dropdown-item" href="#"><i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="border rounded border-dashed p-1">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm" style="height: 2rem;width: 2rem;">
                                                        <div
                                                            class="avatar-title bg-light text-secondary rounded fs-20">
                                                            <i class="mdi mdi-microsoft-word"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 overflow-hidden">
                                                    <h5 class="fs-12 mb-1"><a href="#"
                                                            class="text-body text-truncate d-block text-muted">Dipti-Ranjan.Docx</a>
                                                    </h5>
                                                    <div class="fs-11 text-muted">2.4MB</div>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <div class="d-flex gap-2">
                                                        <button type="button"
                                                            class="btn btn-icon text-muted btn-sm fs-13 mt-1"><span
                                                                class="badge badge-soft-primary p-1">Resume</span></button>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-icon text-muted btn-sm fs-18 dropdown"
                                                                type="button" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="ri-more-fill"></i>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#"><i
                                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                                        Preview</a></li>
                                                                <li><a class="dropdown-item" href="#"><i
                                                                            class="ri-download-2-fill align-bottom me-2 text-muted"></i>
                                                                        Download</a></li>
                                                                <li><a class="dropdown-item" href="#"><i
                                                                            class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                                        Delete</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Skills</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-15">
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Javascript</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">React Js</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Jquery</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card mb-2 tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Language</h5>
                                    <div class="d-flex flex-wrap gap-2 fs-15">
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Hindi</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">English</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Odia</a>
                                        <a href="javascript:void(0);" class="badge badge-soft-primary">Bengoli</a>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="card tele-candidate-info pt-0 pb-0 job-board-card-new card-animate rounded-3"style="margin-bottom:80px">
                                <div class="card-body pb-0">
                                    <h5 class="card-title mb-4">Profile Statistics</h5>
                                    <div class="row ">
                                        <div class="col-lg-4">
                                            <div class="card tele-candidate-info job-board-card-new card-animate"
                                                style="box-shadow: 0px 0px 15px rgb(56 152 226 / 30%);">
                                                <p class="fs-12 text-muted text-center mb-0 p-2">Profile Matches</p>
                                                <div class="text-center">
                                                    <img src="assets/images/chart-image1.png" class="img-fluid"
                                                        width="69%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card tele-candidate-info job-board-card-new card-animate"
                                                style="box-shadow: 0px 0px 15px rgb(56 152 226 / 30%);">
                                                <p class="fs-12 text-muted text-center mb-0 p-2">Completed</p>

                                                <div class="text-center">
                                                    <img src="assets/images/chart-image.png" class="img-fluid"
                                                        width="70%" style="height:75px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="card tele-candidate-info job-board-card-new card-animate"
                                                style="box-shadow: 0px 0px 15px rgb(56 152 226 / 30%);">
                                                <p class="fs-12 text-muted text-center mb-0 p-2">Stats</p>
                                                <div class="text-center">
                                                    <img src="assets/images/chart-image2.png" class="img-fluid"
                                                        width="70%" style="height:75px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-1 me-2" style="position: fixed;bottom: 0;width:100%;">
                        <div class="card-body">
                            <div class="text-center">
                                <button type="button" class="btn btn-light btn-border me-2 w-lg"
                                    onclick="window.top.close()">Close</button>
                                <button type="button" class="btn btn-primary btn-border w-lg">Save</button>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade zoomIn" id="centermdal" tabindex="-1"
                        aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-center">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="add-notes">Notes <span class="text-danger">*</span></label>
                                        <textarea name="" id="" class="form-control" rows="5"></textarea>
                                    </div>
                                    <div class="mb-2 text-center">
                                        <button class="btn btn-light btn-border w-lg"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary btn-border w-lg">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin.include.footer')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}



</body>


</html>

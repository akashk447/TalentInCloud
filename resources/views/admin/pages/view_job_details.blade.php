@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">VIEW JOB DETAILS </h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">All Job</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div class="pt-4 ">
                <div class="row g-4">

                    <!--end col-->
                    <div class="col">
                        <div class="p-2">
                            @php
                                $job_details = get_job_code_details($job_id);
                            @endphp
                            <h3 class="text-white mb-1">{{ $job_details->job_title }} <span class="fs-10 text-muted ">&nbsp;[{{ strtoupper($job_id) }}]</span></h3>
                            <p class="text-white-75 "> <i
                                    class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{ $job_details->job_company_name }}<i
                                    class="ri-map-pin-user-line ms-2 me-1 text-white-75 fs-16 align-middle"></i>{{ $job_details->job_location }}
                            </p>

                        </div>
                    </div>
                    <div class="col text-lg-end">
                        <button type="button" class="btn btn-info btn-animation waves-effect waves-light"
                            data-text="Publish"><span><i
                                    class="ri-volume-vibrate-line me-2 fs-13 align-middle"></i>Publish</span></button>
                        <button type="button" class="btn btn-light btn-animation waves-effect waves-light"
                            data-text="Unpublish" data-bs-toggle="modal" data-bs-target=".unpublish-modal"><span><i
                                    class="ri-volume-vibrate-line me-2 fs-13 align-middle"></i>Unpublish</span></button>

                    </div>
                    <!--end col-->


                </div>
                <!--end row-->
            </div>
            <!--   modal  -->
            <div class="modal fade bs-example-modal-sm zoomIn publish-modal" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="">Publish</h5>
                                </div>
                                <div>
                                    <button type="button" class="btn-close text-lg-end" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>


                        </div>

                        <div class="card-body text-center">
                            <h4><span><i
                                        class="ri-volume-vibrate-line me-2 fs-20 text-primary align-middle me-3"></i></span>Are
                                you sure?</h4>
                        </div>
                        <div class="card-footer">
                            <div class="hstack gap-2 justify-content-end  me-2">
                                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade bs-example-modal-sm zoomIn unpublish-modal" tabindex="-1" role="dialog"
                aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <h5 class="">UnPublish</h5>
                                </div>
                                <div>
                                    <button type="button" class="btn-close text-lg-end" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                            </div>


                        </div>

                        <div class="card-body text-center">
                            <h4><span><i class="ri-alert-line me-2 fs-20 text-primary align-middle me-3"></i></span>Are you
                                sure?</h4>
                        </div>
                        <div class="card-footer">
                            <div class="hstack gap-2 justify-content-end  me-2">
                                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14  ps-2" data-bs-toggle="tab" href="#info_tab" role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Info</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" active data-bs-toggle="tab" href="#candidates_tab"
                                        role="tab">
                                        <i class="ri-list-unordered d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Candidates</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#share_tab" role="tab">
                                        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Share</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#advertise_tab" role="tab">
                                        <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Advertise</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#analytics_tab" role="tab">
                                        <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Analytics</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#activities_tab"
                                        role="tab">
                                        <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                            class="d-none d-md-inline-block">Activities</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Edit"><i
                                        class="ri-edit-box-line align-bottom"></i></button>
                                <a href="compose-email.php">
                                    <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="" data-bs-original-title="Compose Mail"><i
                                            class="ri-mail-add-line align-bottom"></i></button>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Copy"><i
                                        class="ri-file-copy-2-line align-bottom"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Pdf"><i
                                        class="ri-file-pdf-line align-bottom"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Change Status"><i
                                        class="ri-inbox-archive-line align-bottom"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Delete"><i
                                        class="ri-delete-bin-6-line align-bottom"></i></button>

                            </div>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content pt-4 text-muted">
                            <div class="tab-pane active" id="info_tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="card card-animate mb-2">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Info</h5>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="d-flex mb-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light me-2"><i
                                                                        class="ri-coupon-line"></i></button>
                                                                <div>
                                                                    <h5 class="fs-13 mb-0">Donald Risher</h5>
                                                                    <p class="fs-11 mb-0 text-muted">Q002</p>
                                                                </div>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="d-flex mb-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light me-2"><i
                                                                        class="ri-calendar-2-line"></i></button>
                                                                <div>
                                                                    <h5 class="fs-13 mb-0">Post On Job</h5>
                                                                    <p class="fs-11 mb-0 text-muted">Posted On 16 Jul 2022
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex mb-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light me-2"><i
                                                                        class="ri-calendar-2-line"></i></button>
                                                                <div>
                                                                    <h5 class="fs-13 mb-0">Create On Job</h5>
                                                                    <p class="fs-11 mb-0 text-muted">Created On 23 Oct 2021
                                                                    </p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex mb-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light me-2"><i
                                                                        class="ri-calendar-check-line"></i></button>
                                                                <div>
                                                                    <h5 class="fs-13 mb-0">Last Unpublished On Job</h5>
                                                                    <p class="fs-11 mb-0 text-muted"
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title=""
                                                                        data-bs-original-title="Resumebuzz career's Portal &#013; LinkedIn &#013; Glassdoor &#013; Monster &#013; Upward &#013; Indeed &#013; Facebook Career's">
                                                                        Last Unpublished 15 Jun 2022 from Resume..</p>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex mb-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light me-2"><i
                                                                        class="ri-map-pin-line"></i></button>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-13 mb-0">Location</h5>
                                                                    <p class="fs-11 mb-0 text-muted">Quacklabs-Bhubaneswar
                                                                        <i class=" ri-edit-line align-middle c-pointer"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_location"></i>
                                                                    </p>

                                                                </div>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="d-flex mb-2">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-icon waves-effect waves-light me-2"><i
                                                                        class="ri-phone-line"></i></button>
                                                                <div class="flex-grow-1">
                                                                    <h5 class="fs-13 mb-0">Contacts</h5>
                                                                    <p class="fs-11 mb-0 text-muted">Quacklabs-Bhubaneswar
                                                                        <i class=" ri-edit-line align-middle c-pointer"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_contacts"></i>
                                                                    </p>

                                                                </div>

                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <div class="card card-animate mb-2">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <h6 class="ont-15 ">Industry : </h6>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <span class="text-muted ms-2">{{$get_valid_job->job_industry}}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <h6 class="ont-15 ">Type : </h6>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <span class="text-muted ms-2">{{$get_valid_job->job_emp_type}}</span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <h6 class="ont-15 ">Positions : </h6>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <span class="text-muted ms-2">{{$get_valid_job->job_position_nos}}<i
                                                                class=" ri-edit-line align-middle c-pointer"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#update_vacancy"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <h6 class="ont-15 ">Experience : </h6>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <span class="text-muted ms-2">{{$get_valid_job->job_exp_min}} - {{$get_valid_job->job_exp_max}} years</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-animate mb-2">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">Skills</h5>
                                                <div class="d-flex flex-wrap gap-2 fs-15">

                                                    <a href="javascript:void(0);" class="badge badge-soft-primary">PHP</a>
                                                    

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-animate mb-2">
                                            <div class="card-header align-items-center d-flex border-bottom-dashed">
                                                <h4 class="card-title mb-0 flex-grow-1">JD & Attachments</h4>
                                                <div class="flex-shrink-0">
                                                    <button type="button" class="btn btn-soft-info btn-sm"><i
                                                            class="ri-upload-2-fill me-1 align-bottom"></i> Upload</button>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <div
                                                    class="d-flex gap-2 justify-content-between mb-3 border rounded border-dashed p-2">
                                                    <div class="d-flex gap-2 justify-content-start">
                                                        <div class="avatar-xs">
                                                            <span
                                                                class="avatar-title badge-soft-primary text-primary rounded fs-10">
                                                                Doc
                                                            </span>
                                                        </div>

                                                        <div class="text-muted ">
                                                            <small class="fs-12 fw-bold">Ubold-sketch-design.doc</small>
                                                            <p class="mb-0 fs-10">2.3 MB</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="ri-arrow-down-circle-line text-primary fs-18  align-middle"
                                                            title="Download"></i>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex gap-2 justify-content-between border rounded border-dashed p-2">
                                                    <div class="d-flex gap-2 justify-content-start">
                                                        <div class="avatar-xs">
                                                            <span
                                                                class="avatar-title badge-soft-primary text-primary rounded fs-10">
                                                                Word
                                                            </span>
                                                        </div>

                                                        <div class="text-muted ">
                                                            <small class="fs-12 fw-bold">Ubold-sketch.word</small>
                                                            <p class="mb-0 fs-10">2.3 MB</p>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <i class="ri-arrow-down-circle-line text-primary fs-18  align-middle"
                                                            title="Download"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-animate mb-2">
                                            <div class="card-header border-bottom-dashed">
                                                <h5 class="card-title mb-0">Questionnaire & Scorecard</h5>
                                            </div>
                                            <div class="card-body pb-0">

                                                <div
                                                    class="d-flex gap-2 justify-content-between mb-3 border rounded border-dashed p-2">
                                                    <div>
                                                        <h5 class="text-muted fs-14">No Questionnaire</h5>
                                                    </div>
                                                    <div>
                                                        <a href="job-questionnaire.php"><i
                                                                class=" ri-add-circle-line text-primary fs-15  align-middle"
                                                                title="Download"></i><span
                                                                class="fs-15 text-dark ms-1">Add</span></a>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex gap-2 justify-content-between mb-3 border rounded border-dashed p-2">
                                                    <div>
                                                        <h5 class="text-muted fs-14 ">No Scorecard</h5>
                                                    </div>
                                                    <div>
                                                        <a href="job-scorecard.php"><i
                                                                class=" ri-add-circle-line text-primary fs-15  align-middle"
                                                                title="Download"></i><span
                                                                class="fs-15 text-dark ms-1">Add</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card card-animate mb-2">
                                            <div class="card-body pb-0 mb-2">
                                                <h5 class="card-title mb-4">Hiring Managers</h5>
                                                <div class="d-flex gap-2 justify-content-between mb-3 ">
                                                    <div class="d-flex gap-2 justify-content-start">
                                                        <div class="avatar-xs">
                                                            <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                                                alt="" class="img-fluid rounded-circle">
                                                        </div>

                                                        <div class="text-muted mt-1">
                                                            <a href=""><span class="align-middle"> <small
                                                                        class="fs-15 fw-bold ">Nibedita
                                                                        Sahoo</small></span></a>

                                                        </div>
                                                    </div>

                                                    <div class="mt-1">
                                                        <span data-bs-toggle="modal"
                                                            data-bs-target="#add_hiring_manager"><i
                                                                class=" ri-add-circle-line text-primary fs-15  align-middle c-pointer"
                                                                title="Download"></i><span
                                                                class="fs-15 text-dark ms-1 c-pointer">Add</span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-8">
                                        <div class="card card-animate">
                                            <div class="card-header pb-1 pt-2">
                                                <h4 class="text-muted">Description</h4>
                                            </div>

                                            <div class="card-body">
                                                {!!$get_valid_job->job_description!!}
                                                {{-- <h5 class="">Job Overview</h5>
                                                <p class="text-muted mb-2">
                                                    We are searching for a professional PHP Developer to join our
                                                    Development team on an immediate basis. As a PHP Developer, you will be
                                                    working under our Senior PHP Developer and a team of full-stack
                                                    developers to build outstanding web applications; both client-side as
                                                    well as server-side applications.
                                                </p>

                                                <h5 class="mb-3">Responsibilities</h5>
                                                <ul class="mb-3" style="gap: 0.5rem; flex: 1 1 auto;display: flex;flex-direction: column;align-self: stretch;">
                                                    <li>
                                                        Collaborate with the team members to understand the client
                                                        requirements.
                                                    </li>
                                                    <li>
                                                        Coordinate with the design team for the mockups and wireframes.
                                                    </li>
                                                    <li>
                                                        Write clean and well-structured codes.
                                                    </li>
                                                    <li>
                                                        Produce detailed technical product descriptions.
                                                    </li>
                                                    <li>
                                                        Troubleshoot, test and maintain the core product software along with
                                                        the databases to ensure strong functionality and optimization.
                                                    </li>
                                                    <li>
                                                        Contribute to all the software development phases.
                                                    </li>
                                                    <li>
                                                        Follow the industry’s best practices for writing clean code.
                                                    </li>
                                                    <li>
                                                        Develop and deploy the latest features that facilitate the relevant
                                                        tools and procedures if required.
                                                    </li>
                                                    <li>
                                                        Improve the code-base of our products in a significant manner.
                                                    </li>
                                                </ul>
                                                <h5 class="mb-3">Requirements</h5>
                                                <ul style="margin-bottom: 0px;gap: 0.5rem; flex: 1 1 auto;display: flex;flex-direction: column;align-self: stretch;">
                                                    <li>
                                                        Bachelor’s degree in Engineering, Computer Science or related field.
                                                        Candidates having a Master’s degree in Software Engineering will
                                                        also be considered.
                                                    </li>
                                                    <li>
                                                        2+ years of experience as PHP Developer, Software Developer, Web
                                                        Developer or related roles.
                                                    </li>
                                                    <li>
                                                        Knowledge of open-source projects such as Drupal, Joomla, Wikis,
                                                        osCommerce and many others.
                                                    </li>
                                                    <li>
                                                        Exceptional knowledge of object-oriented design and related
                                                        concepts.
                                                    </li>
                                                    <li>
                                                        Update on the latest web technologies including HTML, CSS, AJAX,
                                                        JavaScript, etc.
                                                    </li>
                                                    <li>
                                                        Experience in implementing the common 3rd party APIs such as
                                                        Facebook, Google, etc.
                                                    </li>
                                                    <li>
                                                        Knowledge of developing web services will be preferred.
                                                    </li>
                                                    <li>
                                                        Should possess a passion for coding practices and best designs.
                                                    </li>
                                                    <li>
                                                        An mindset to developing bold ideas.
                                                    </li>
                                                </ul> --}}
                                            </div><!-- end card body -->
                                        </div><!-- end card -->
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane " id="candidates_tab" role="tabpanel">
                                <div class="row">

                                    <div class="col-xl-3">
                                        <div class="card">
                                            <div class="card-body ">
                                                @include('admin.helper_view.view-job-details.smart_filter.smart_filter')
                                                
                                                <div class="row mt-2">
                                                    <div class="col-lg-12">
                                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                                            id="accordionlefticon">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionlefticonExample1">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#candidate_owner"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_lefticonExamplecollapse1">
                                                                        Candidate Owner
                                                                    </button>
                                                                </h2>
                                                                <div id="candidate_owner"
                                                                    class="accordion-collapse collapse "
                                                                    aria-labelledby="accordionlefticonExample1"
                                                                    data-bs-parent="#accordionlefticon" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Nibedita Sahoo
                                                                                </h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                                            id="accordionlefticon">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionlefticonExample1">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#candidate_rating"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_lefticonExamplecollapse1">
                                                                        Rating
                                                                    </button>
                                                                </h2>
                                                                <div id="candidate_rating"
                                                                    class="accordion-collapse collapse "
                                                                    aria-labelledby="accordionlefticonExample1"
                                                                    data-bs-parent="#accordionlefticon" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <div id="basic-rater" dir="ltr">
                                                                                </div>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-5-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                                            id="accordionlefticon">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionlefticonExample1">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#candidate_source"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_lefticonExamplecollapse1">
                                                                        Source
                                                                    </button>
                                                                </h2>
                                                                <div id="candidate_source"
                                                                    class="accordion-collapse collapse "
                                                                    aria-labelledby="accordionlefticonExample1"
                                                                    data-bs-parent="#accordionlefticon" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Indeed</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-2-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">LinkedIn</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-2-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Monster</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                                            id="accordionlefticon">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionlefticonExample1">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#candidate_location"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_lefticonExamplecollapse1">
                                                                        Location
                                                                    </button>
                                                                </h2>
                                                                <div id="candidate_location"
                                                                    class="accordion-collapse collapse "
                                                                    aria-labelledby="accordionlefticonExample1"
                                                                    data-bs-parent="#accordionlefticon" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Bhubaneswar
                                                                                </h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Cuttack</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-4-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Sambalpur</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-3-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">Balasore</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-4-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                                            id="accordionlefticon">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionlefticonExample1">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#candidate_education"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_lefticonExamplecollapse1">
                                                                        Education
                                                                    </button>
                                                                </h2>
                                                                <div id="candidate_education"
                                                                    class="accordion-collapse collapse "
                                                                    aria-labelledby="accordionlefticonExample1"
                                                                    data-bs-parent="#accordionlefticon" style="">
                                                                    <div class="accordion-body">
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">+2 Arts</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">10th</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">BCA</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="text-muted fs-15">MCA</h5>
                                                                            </div>
                                                                            <div class="flex-shrink-0 ">
                                                                                <i
                                                                                    class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-lg-12">
                                                        <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box"
                                                            id="accordionlefticon">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header"
                                                                    id="accordionlefticonExample1">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#candidate_attributes"
                                                                        aria-expanded="true"
                                                                        aria-controls="accor_lefticonExamplecollapse1">
                                                                        Custom Attributes
                                                                    </button>
                                                                </h2>
                                                                <div id="candidate_attributes"
                                                                    class="accordion-collapse collapse "
                                                                    aria-labelledby="accordionlefticonExample1"
                                                                    data-bs-parent="#accordionlefticon" style="">
                                                                    <div class="accordion-body">

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-9">
                                        <div class="card">

                                            <div class="card-body">

                                                <!-- Swiper -->

                                                <div class="swiper project-swiper ">

                                                    <div class="swiper-wrapper c-grabbing">
                                                        @php
                                                            $count_sourced_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_sourced_candidates as $sourced_candidate)
                                                        {{-- @if ($sourced_candidate->screen_status=="Sourced") --}}
                                                        @php
                                                             $count_sourced_candidate++;
                                                        @endphp   
                                                        {{-- @endif --}}
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_pool">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Pool</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-10">
                                                                                {{ $get_sourced_candidates->total() }}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_quality_submit_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $quality_candidate)
                                                            @if ($quality_candidate->applicant_status=="Quality Pending" || $quality_candidate->applicant_status=="Quality Reject" || $quality_candidate->applicant_status=="Quality Duplicate")
                                                                @php
                                                                    $count_quality_submit_candidate++;
                                                                @endphp   
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_quality">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Quality</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-10">
                                                                                {{$count_quality_submit_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_submitted_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $quality_candidate)
                                                            @if (in_array($quality_candidate->applicant_status,get_all_submitted_applicant_status_list()))
                                                                @php
                                                                    $count_submitted_candidate++;
                                                                @endphp   
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_submitted">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Submitted</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_submitted_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_inprogress_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $inprogress_candidate)
                                                            @if (in_array($inprogress_candidate->applicant_status,get_inprogress_applicant_status_list()))
                                                                @php
                                                                    $count_inprogress_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_progress">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Progress</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_inprogress_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_noshow_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $noshow_candidate)
                                                            @if (in_array($noshow_candidate->applicant_status,get_noshow_applicant_status_list()))
                                                                @php
                                                                    $count_noshow_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_noshow">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted"> No
                                                                                    Show</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_noshow_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_rejected_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $rejected_candidate)
                                                            @if (in_array($rejected_candidate->applicant_status,get_rejected_applicant_status_list()))
                                                                @php
                                                                    $count_rejected_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_rejected">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Rejected</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_rejected_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                        $count_onhold_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $onhold_candidate)
                                                            @if (in_array($onhold_candidate->applicant_status,get_onhold_applicant_status_list()))
                                                                @php
                                                                    $count_onhold_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_onhold">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted"> On
                                                                                    Hold</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_onhold_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        {{-- selected application total count  --}}
                                                        @php
                                                            $count_selected_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $selected_candidate)
                                                            @if (in_array($selected_candidate->applicant_status,get_selected_applicant_list()))
                                                                @php
                                                                    $count_selected_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_selected">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Selected</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_selected_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_joined_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $joined_candidate)
                                                            @if (in_array($joined_candidate->applicant_status,get_joined_applicant_list()))
                                                                @php
                                                                    $count_joined_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_joined">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    Joined</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_joined_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_duplicate_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $duplicate_candidate)
                                                            @if (in_array($duplicate_candidate->applicant_status,get_duplicate_applicant_list()))
                                                                @php
                                                                    $count_duplicate_candidate++;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_duplicate">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    QC/Dupli..</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_duplicate_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        @php
                                                        $count_all_candidate = 0;
                                                        @endphp
                                                        @foreach ($get_all_job_applicants as $all_candidate)
                                                                @php
                                                                    $count_all_candidate++;
                                                                @endphp
                                                        @endforeach
                                                        <div class="swiper-slide swiper-slide-new" id="click_all">
                                                            <div
                                                                class="card profile-project-card shadow-none profile-project-primary mb-0">
                                                                <div class="card-body p-2">
                                                                    <div class="d-flex">
                                                                        <div
                                                                            class="flex-grow-1 text-muted overflow-hidden">
                                                                            <h5 class="fs-13 text-truncate mb-1">
                                                                                <a href="#" class="text-muted">
                                                                                    All</a>
                                                                            </h5>

                                                                        </div>
                                                                        <div class="flex-shrink-0 ms-2">
                                                                            <div class="badge badge-soft-primary fs-12">
                                                                                {{$count_all_candidate}}</div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>



                                            </div>
                                            <hr class="mt-0 mb-0 ms-3 me-3">

                                            <hr class="mt-0 mb-0 ms-3 me-3">
                                            <div class="mt-2 ms-3 me-3" id="pool_info">
                                                <ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3 fs-10"
                                                    role="tablist">
                                                    @php
                                                        $total_sourced = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_sourced)
                                                        @if ($count_sourced->screen_status == 'Sourced')
                                                            @php
                                                                $total_sourced++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item active">
                                                        <a class="nav-link ps-1" data-bs-toggle="tab" href="#sourced_tab" $get_valid_job
                                                            role="tab" aria-selected="false"> Sourced <span
                                                                class="badge bg-primary rounded-circle">{{isset($filter)?$total_sourced:get_total_sourced_candidate($get_valid_job->job_id) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_attempted = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_attempted)
                                                        @if ($count_attempted->screen_status == 'Not Reachable' ||
                                                            $count_attempted->screen_status == 'Call Wait' ||
                                                            $count_attempted->screen_status == 'Switch Off' ||
                                                            $count_attempted->screen_status == 'No Response')
                                                            @php
                                                                $total_attempted++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1" data-bs-toggle="tab"
                                                            href="#attempted_tab" role="tab" aria-selected="false">
                                                            Attempted <span
                                                                class="badge bg-secondary rounded-circle">{{isset($filter)?$total_attempted:get_total_attempted_candidate($get_valid_job->job_id) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_call_later = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_call_later)
                                                        @if ($count_call_later->screen_status == 'Call Later')
                                                            @php
                                                                $total_call_later++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1" data-bs-toggle="tab"
                                                            href="#call_later_tab" role="tab" aria-selected="false">
                                                            Call Later <span
                                                                class="badge bg-success rounded-circle">{{isset($filter)?$total_call_later:get_total_call_later_candidate($get_valid_job->job_id) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_not_interested = 0;
                                                    @endphp
                                                     
                                                    @foreach ($get_sourced_candidates as $count_not_interested)
                                                        @if ($count_not_interested->screen_status == 'Not-Interested' ||
                                                            $count_not_interested->screen_status == 'Dropped' ||
                                                            $count_not_interested->screen_status == 'Profile Incorrect' ||
                                                            $count_not_interested->screen_status == 'Wrong No' ||
                                                            $count_not_interested->screen_status == 'Received By Others' ||
                                                            $count_not_interested->screen_status == 'Not In Service')
                                                            @php
                                                                $total_not_interested++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1 " data-bs-toggle="tab"
                                                            href="#not_interested_tab" role="tab"
                                                            aria-selected="true">
                                                            Not Interested <span
                                                                class="badge bg-danger rounded-circle">{{isset($filter)?$total_not_interested:get_total_not_interested_candidate($get_valid_job->job_id) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_interested = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_interested)
                                                        @if ($count_interested->screen_status == 'Interested But Cv Update Required' || $count_interested->screen_status == 'Interested But Cv Pending' || $count_interested->screen_status == 'Interested Confirmation Awaited')
                                                            @php
                                                                $total_interested++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1  " data-bs-toggle="tab"
                                                            href="#interested_tab" role="tab" aria-selected="true">
                                                            Interested <span
                                                                class="badge bg-warning rounded-circle">{{isset($filter)?$total_interested:get_total_interested_candidate($get_valid_job->job_id) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_submited = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_submited)
                                                        @if ($count_submited->screen_status == 'Submitted To Quality' || $count_submited->screen_status == 'Quality Rejected' || $count_submited->screen_status == 'Quality Duplicate' || $count_submited->screen_status == 'Quality Approved')
                                                            @php
                                                                $total_submited++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1  " data-bs-toggle="tab"
                                                            href="#submitted_tab" role="tab" aria-selected="true">
                                                            Submitted <span
                                                                class="badge bg-info rounded-circle">{{isset($filter)?$total_submited:get_total_submited_candidate($get_valid_job->job_id) }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_recommendation = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_recommendation)
                                                        @if ($count_recommendation->screen_status == 'Recommendation')
                                                            @php
                                                                $total_recommendation++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1  " data-bs-toggle="tab"
                                                            href="#reference_tab" role="tab" aria-selected="true">
                                                            Recommendation <span
                                                                class="badge bg-dark rounded-circle">{{ $total_recommendation }}</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item ms-auto c-pointer">
                                                        <span onclick="opencallmodal(event)"><i
                                                                class="ri-headphone-line align-middle fs-18 me-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title=""
                                                                data-bs-original-title="Call Candidate "></i></span>
                                                        <button
                                                            class="btn btn-soft-primary btn-icon waves-effect btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false"><i
                                                                class="mdi mdi-dots-vertical"></i></button>
                                                        <div class="dropdown-menu dropdownmenu-primary">
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="offcanvas"
                                                                data-bs-target="#offcanvasRight"
                                                                aria-controls="offcanvasRight"> Add Candidate </a>
                                                            <a class="dropdown-item" href="upload-resume.php"> Upload
                                                                Entire Folder</a>
                                                            <a class="dropdown-item" href="upload-from-excel.php"> Import
                                                                Form Excel </a>
                                                            <a class="dropdown-item" href="search-from-database.php">
                                                                Source Form Database </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#change_another_joborder"> Change Mandates
                                                            </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="offcanvas" data-bs-target="#addreference"
                                                                aria-controls="addreference"> Add Reference </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#transfer_candidate"> Transfer Candidate
                                                            </a>
                                                            <a class="dropdown-item" href="review-candidate.php"> Review
                                                                Candidate </a>
                                                            <a class="dropdown-item" href="#"
                                                                onClick="deleteMultiple()" id="close-modal"> Delete
                                                                Candidate </a>
                                                        </div>
                                                    </li>

                                                </ul>
                                                <!-- right offcanvas -->
                                                <div class="offcanvas offcanvas-end offcanvas-new" tabindex="-1"
                                                    id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

                                                    <div
                                                        class="offcanvas-header d-flex flex-row align-items-center justify-content-between bg-primary p-3">
                                                        <div class="">
                                                            <h5 class="offcanvas-title text-white font-w-600 fs-22">Add
                                                                Candidates Manually</h5>
                                                            <small class="fs-13 text-white font-w-600 ">Fill candidate
                                                                details.</small>
                                                        </div>
                                                        <button type="button" class="btn-close text-reset mb-0 fs-15"
                                                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                    </div>
                                                    <div class="offcanvas-body p-2 overflow-hidden">
                                                        <div data-simplebar class="pe-2"
                                                            style="height: calc(100vh - 112px);">
                                                            <form action="javascript:void(0);"
                                                                class="row g-3 mb-5 pb-2 mx-auto ">
                                                                <div class="border rounded border-dashed p-2">
                                                                    <div class="mb-2 ">
                                                                        <label for="fullnameInput"
                                                                            class="form-label">Upload Resume</label>
                                                                        <div id="upload_process">
                                                                            <input id="upload_resume" type="file"
                                                                                class="dropify"
                                                                                accept=".doc,.docx,.pdf,.rtf" />
                                                                        </div>
                                                                        <div class="card team-box border border-primary upload-resume-cads mb-1"
                                                                            id="resume_processing_card"
                                                                            style="display:none;height:100px;box-shadow: 9px 8px 45px #d6d6d8;">
                                                                            <div class="card-body px-2">
                                                                                <div
                                                                                    class="d-flex align-items-start ms-1 me-1 mb-4">
                                                                                    <i
                                                                                        class=" ri-file-3-fill text-primary c-pointer fs-18"></i>
                                                                                    <div class="w-100">
                                                                                        <div
                                                                                            class="d-flex align-items-start justify-content-between">
                                                                                            <h5 class="mt-0 ms-1 c-pointer mb-0 fs-14"
                                                                                                id="file_name">

                                                                                            </h5>
                                                                                            <small
                                                                                                class="text-muted text-end c-pointer"><i
                                                                                                    class="mdi mdi-delete-outline text-danger fs-15"></i></small>

                                                                                        </div>
                                                                                        <p id="file_sz"
                                                                                            class="mb-0 fs-12 ms-1"> </p>
                                                                                    </div>

                                                                                </div>
                                                                                <div
                                                                                    class="progress progress-md ms-1 me-1 mb-1">
                                                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                                                        role="progressbar"
                                                                                        aria-valuenow="75"
                                                                                        aria-valuemin="0"
                                                                                        aria-valuemax="100"
                                                                                        style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card team-box text-xs-center upload-resume-cads border border-primary mb-1"
                                                                            id="resume_processing"
                                                                            style="display:none;height:100px;box-shadow: 9px 8px 45px #d6d6d8;">
                                                                            <div class="card-body px-2">
                                                                                <div
                                                                                    class="d-flex align-items-center justify-content-center mt-2 mb-1">

                                                                                    <div class="spinner-border text-primary text-center"
                                                                                        role="status" aria-hidden="true">
                                                                                    </div>
                                                                                </div>
                                                                                <p class="text-center fs-12 mb-1">Please
                                                                                    wait till your resume is being parsed
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card team-box border border-primary upload-resume-cads mb-1"
                                                                            id="show_resume"
                                                                            style="display:none;height:100px;box-shadow: 9px 8px 45px #d6d6d8;">
                                                                            <div class="card-body px-2 pb-0">
                                                                                <div
                                                                                    class="d-flex align-items-start ms-1 me-1 ">
                                                                                    <i
                                                                                        class=" ri-file-3-fill text-primary c-pointer fs-18"></i>
                                                                                    <div class="w-100">
                                                                                        <div
                                                                                            class="d-flex align-items-start justify-content-between">
                                                                                            <h5 class="mt-0 ms-1 c-pointer mb-0  fs-14"
                                                                                                id="file_name1">

                                                                                            </h5>
                                                                                            <small
                                                                                                class="text-muted text-end c-pointer"><i
                                                                                                    class="mdi mdi-delete-outline text-danger fs-15"
                                                                                                    id="sa-warning"></i></small>

                                                                                        </div>
                                                                                        <p id="file_sz1"
                                                                                            class="mb-0  fs-12 ms-1"></p>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div
                                                                                class="card-footer upload-resume-successfull p-1">
                                                                                <div class="align-items-center ">

                                                                                    <div
                                                                                        class="d-flex align-items-center justify-content-between ms-1 me-1 upload-resume-success">
                                                                                        <div
                                                                                            class="d-flex flex-row align-items-center">
                                                                                            <div class="">
                                                                                                <i
                                                                                                    class="mdi mdi-alert-circle-outline text-warning c-pointer fs-20 align-middle"></i>
                                                                                            </div>
                                                                                            <div>
                                                                                                <small
                                                                                                    class=" ms-2 c-pointer fs-12">Check
                                                                                                    the data entered
                                                                                                </small>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <h6
                                                                                                class="c-pointer fs-13 mb-0">
                                                                                                <a href="edit-profile.php"
                                                                                                    class="text-dark"
                                                                                                    target="_blank">Edit
                                                                                                    profile <span><i
                                                                                                            class="mdi mdi-arrow-right text-primary"></i></span></a>
                                                                                            </h6>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>



                                                                    <div class="mb-2">
                                                                        <label for="fullnameInput"
                                                                            class="form-label  ">Select Job</label>
                                                                        <select class="form-select"
                                                                            id="choices-single-no-search"
                                                                            name="choices-single-no-search" data-choices
                                                                            data-choices-search-false
                                                                            data-choices-removeItem>
                                                                            <option selected="">UI Developer</option>
                                                                            <option value="1">PHP Developer</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="fullnameInput"
                                                                            class="form-label  ">Select Recruiter</label>
                                                                        <select class="form-select"
                                                                            id="choices-single-no-search"
                                                                            name="choices-single-no-search" data-choices
                                                                            data-choices-search-false
                                                                            data-choices-removeItem>
                                                                            <option selected="">UI Developer</option>
                                                                            <option value="1">PHP Developer</option>

                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <h5 class="text-muted mb-0 fs-14">Basic Details
                                                                        </h5>
                                                                    </div>
                                                                    <div class="mb-1 mt-0">
                                                                        <label for="validationDefault01"
                                                                            class="form-label ">Name Of The Candidate
                                                                            *</label>
                                                                        <input type="text" class="form-control"
                                                                            id="validationDefault01">
                                                                    </div>

                                                                    <div class="mb-1 mt-1">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Email *</label>
                                                                        <input type="email" class="form-control"
                                                                            id="validationDefault01">
                                                                    </div>
                                                                    <div class="mb-1 mt-1">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">Phone number *</label>
                                                                        <div class="row">
                                                                            <div class="col-md-9 pe-0">
                                                                                <div class="input-group mb-1">
                                                                                    <span class="input-group-text"
                                                                                        id="validationTooltipUsernamePrepend">IN
                                                                                        +91</span>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="validationTooltipUsername"
                                                                                        maxlength="10"
                                                                                        placeholder="000 000 0000">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 text-end ps-0">
                                                                                <button type="button"
                                                                                    class="btn btn-primary btn-md waves-effect waves-light"
                                                                                    id="showaltnum">Alt Num</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div id="alt-num-table" class="mt-1"
                                                                        style="display:none">
                                                                        <div class="row mb-1 mt-1">
                                                                            <div class="col-md-9 pe-0">
                                                                                <div class="input-group mb-1">
                                                                                    <span class="input-group-text"
                                                                                        id="validationTooltipUsernamePrepend">IN
                                                                                        +91</span>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="validationTooltipUsername"
                                                                                        maxlength="10"
                                                                                        placeholder="000 000 0000">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2 mt-1">
                                                                        <label for="validationDefault01"
                                                                            class="form-label">DOB *</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1"><i
                                                                                    class="ri-calendar-2-line fs-15 text-primary"></i></span>
                                                                            <input type="text"
                                                                                class="form-control flatpickr-input active"
                                                                                data-provider="flatpickr"
                                                                                placeholder="DD-MM-YY"
                                                                                data-date-format="d M Y"
                                                                                aria-label="Phone Number" maxlength="10"
                                                                                aria-describedby="basic-addon1">
                                                                        </div>
                                                                    </div>

                                                                    <div class="mb-2 mt-1">
                                                                        <label for="validationDefault01"
                                                                            class="form-label mb-0">Gender *</label>
                                                                        <div class="form-group mb-2">

                                                                            <div class="btn-group btn-group-sm d-flex "
                                                                                role="group"
                                                                                aria-label="Horizontal radio toggle button group">
                                                                                <input type="radio" class="btn-check "
                                                                                    name="job_priority" id="Gbtn-radio1"
                                                                                    value="Hot">
                                                                                <label
                                                                                    class="j_priority btn btn-outline-primary p-2"
                                                                                    for="vbtn-radio1"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-trigger="hover"
                                                                                    data-bs-placement="top" title=""
                                                                                    data-bs-original-title="Male"><i
                                                                                        class="ri-men-line fs-14"></i></label>
                                                                                <input type="radio" class="btn-check "
                                                                                    name="job_priority" id="Gbtn-radio2"
                                                                                    value="Normal">
                                                                                <label
                                                                                    class="j_priority btn btn-outline-primary p-2"
                                                                                    for="Gbtn-radio2"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-trigger="hover"
                                                                                    data-bs-placement="top" title=""
                                                                                    data-bs-original-title="Female"><i
                                                                                        class="ri-women-line fs-14"></i></label>
                                                                                <input type="radio" class="btn-check "
                                                                                    name="job_priority" id="Gbtn-radio3"
                                                                                    value="Bulk">
                                                                                <label
                                                                                    class="j_priority btn btn-outline-primary p-2"
                                                                                    for="Gbtn-radio3"
                                                                                    data-bs-toggle="tooltip"
                                                                                    data-bs-trigger="hover"
                                                                                    data-bs-placement="top" title=""
                                                                                    data-bs-original-title="TransGender"><i
                                                                                        class="ri-travesti-line fs-14"></i></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-2">
                                                                        <label for="example-textarea"
                                                                            class="form-label">Location <i
                                                                                class="mdi mdi-alert-circle-outline font-10"></i></label>
                                                                        <input type="text" class="form-control ">
                                                                    </div>


                                                                    <div class="mb-2">
                                                                        <label for="example-textarea"
                                                                            class="form-label"> Address <i
                                                                                class="mdi mdi-alert-circle-outline font-10"></i></label>
                                                                        <textarea placeholder="Bulding Name, street Name, City , State, Pincode" class="form-control"
                                                                            id="example-textarea" rows="2"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button type="button"
                                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target=".multi-collapse"
                                                                        aria-expanded="false"
                                                                        aria-controls="multiCollapseExample1 multiCollapseExample2">Show
                                                                        Additional Fields</button>
                                                                </div>

                                                                <div class="collapse multi-collapse p-0"
                                                                    id="multiCollapseExample1">
                                                                    <div class="border rounded border-dashed p-1">
                                                                        <div class="accordion"
                                                                            id="default-accordion-example">
                                                                            <div class="accordion-item  mb-2">
                                                                                <h2 class="accordion-header"
                                                                                    id="headingOne">
                                                                                    <button class="accordion-button p-3"
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#education_details"
                                                                                        aria-expanded="true"
                                                                                        aria-controls="collapseOne">
                                                                                        Education Details
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="education_details"
                                                                                    class="accordion-collapse collapse p-2 "
                                                                                    aria-labelledby="headingOne"
                                                                                    data-bs-parent="#default-accordion-example">
                                                                                    <div class="accordion-body pe-0 ps-0 new_qualification"
                                                                                        id="add_education_field">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="mb-2">
                                                                                                    <label
                                                                                                        for="example-date"
                                                                                                        class="form-label">Qualification
                                                                                                    </label>
                                                                                                    <select
                                                                                                        class="form-select"
                                                                                                        id="choices-single-no-search"
                                                                                                        name="choices-single-no-search"
                                                                                                        data-choices
                                                                                                        data-choices-search-false
                                                                                                        data-choices-removeItem>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Select</option>
                                                                                                        <option
                                                                                                            value="1">
                                                                                                            B.tech</option>
                                                                                                        <option
                                                                                                            value="2">
                                                                                                            MBA</option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            BAC</option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            BCA</option>

                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-6">
                                                                                                <div class="mb-2">
                                                                                                    <label
                                                                                                        for="example-date"
                                                                                                        class="form-label">Specialization
                                                                                                    </label>

                                                                                                    <select
                                                                                                        class="form-select"
                                                                                                        id="choices-single-no-search"
                                                                                                        name="choices-single-no-search"
                                                                                                        data-choices
                                                                                                        data-choices-search-false
                                                                                                        data-choices-removeItem>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Select</option>
                                                                                                        <option
                                                                                                            value="1">
                                                                                                            B.tech</option>
                                                                                                        <option
                                                                                                            value="2">
                                                                                                            MBA</option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            BAC</option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            BCA</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="mb-2">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Course
                                                                                                Type </label>
                                                                                            <div class="form-group mb-2">

                                                                                                <div class="btn-group btn-group-sm d-flex "
                                                                                                    role="group"
                                                                                                    aria-label="Horizontal radio toggle button group">
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio1"
                                                                                                        value="Hot"
                                                                                                        checked>
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio1">Full
                                                                                                        Time</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio2"
                                                                                                        value="Normal">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio2">Part
                                                                                                        Time</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio3"
                                                                                                        value="Bulk">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio3">Correspondence/Distance
                                                                                                        Learning</label>

                                                                                                </div>


                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mb-2 mt-1">
                                                                                            <label for="example-textarea"
                                                                                                class="form-label">University/Institute
                                                                                            </label>
                                                                                            <input type="text"
                                                                                                class="form-control ">
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col-lg-6">
                                                                                                <div class="mb-2">
                                                                                                    <label
                                                                                                        for="example-date"
                                                                                                        class="form-label">Percentage
                                                                                                    </label>
                                                                                                    <input
                                                                                                        class="form-control"
                                                                                                        id="example"
                                                                                                        type="text"
                                                                                                        placeholder="Percentage %">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-6">
                                                                                                <div class="mb-2">
                                                                                                    <label
                                                                                                        for="example-date"
                                                                                                        class="form-label">Year
                                                                                                        Of Passing </label>
                                                                                                    <select
                                                                                                        class="form-select"
                                                                                                        id="choices-single-no-search"
                                                                                                        name="choices-single-no-search"
                                                                                                        data-choices
                                                                                                        data-choices-search-false
                                                                                                        data-choices-removeItem>
                                                                                                        <option
                                                                                                            value="">
                                                                                                            Select</option>
                                                                                                        <option
                                                                                                            value="1">
                                                                                                            2019</option>
                                                                                                        <option
                                                                                                            value="2">
                                                                                                            2020</option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            2021</option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            2022</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-12 text-end">
                                                                                                <button
                                                                                                    class="btn btn-light btn-border btn-sm"
                                                                                                    id="add_more_education"><i
                                                                                                        class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i>
                                                                                                    Add More</button>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="accordion-item mb-2">
                                                                                <h2 class="accordion-header"
                                                                                    id="headingOne">
                                                                                    <button class="accordion-button"
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#experience_details"
                                                                                        aria-expanded="true"
                                                                                        aria-controls="collapseOne">
                                                                                        Experience Details
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="experience_details"
                                                                                    class="accordion-collapse collapse p-2"
                                                                                    aria-labelledby="headingOne"
                                                                                    data-bs-parent="#default-accordion-example">
                                                                                    <div class="accordion-body pe-0 ps-0"
                                                                                        id="add_experience_field">

                                                                                        <div class="mb-3">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Employeer
                                                                                            </label>
                                                                                            <input class="form-control"
                                                                                                id="employeer_id"
                                                                                                type="text"
                                                                                                placeholder="">
                                                                                        </div>
                                                                                        <div class="form-group mb-2 "
                                                                                            id="empl_checkbox"
                                                                                            style="display:none">

                                                                                            <div class="btn-group btn-group-sm d-flex "
                                                                                                role="group"
                                                                                                aria-label="Horizontal radio toggle button group">
                                                                                                <input type="radio"
                                                                                                    class="btn-check "
                                                                                                    name="employee"
                                                                                                    id="empl_btn1"
                                                                                                    value="Hot">
                                                                                                <label
                                                                                                    class="j_priority btn btn-outline-primary p-2"
                                                                                                    for="empl_btn1">Current
                                                                                                    Employer</label>
                                                                                                <input type="radio"
                                                                                                    class="btn-check "
                                                                                                    name="employee"
                                                                                                    id="empl_btn2"
                                                                                                    value="Normal">
                                                                                                <label
                                                                                                    class="j_priority btn btn-outline-primary p-2"
                                                                                                    for="empl_btn2">Previous
                                                                                                    Employer</label>
                                                                                                <input type="radio"
                                                                                                    class="btn-check "
                                                                                                    name="employee"
                                                                                                    id="empl_btn3"
                                                                                                    value="Bulk">
                                                                                                <label
                                                                                                    class="j_priority btn btn-outline-primary p-2"
                                                                                                    for="empl_btn3">Other
                                                                                                    Employer</label>

                                                                                            </div>


                                                                                        </div>
                                                                                        <div class="row mb-2">
                                                                                            <div class="col-lg-12">
                                                                                                <label for="example-date"
                                                                                                    class="form-label">Designation
                                                                                                </label>
                                                                                                <input
                                                                                                    class="form-control"
                                                                                                    type="text"
                                                                                                    placeholder="">
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="row mb-2">
                                                                                            <div class="col-lg-6">
                                                                                                <label for="example-date"
                                                                                                    class="form-label">Duration
                                                                                                </label>
                                                                                                <div class="row">
                                                                                                    <div class="col-lg-6">
                                                                                                        <select
                                                                                                            class="form-select">
                                                                                                            <option
                                                                                                                selected>
                                                                                                                Month
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="1">
                                                                                                                January
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="2">
                                                                                                                February
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                March
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                April
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="4">
                                                                                                                May</option>
                                                                                                            <option
                                                                                                                value="5">
                                                                                                                June
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="6">
                                                                                                                July
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="7">
                                                                                                                August
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="8">
                                                                                                                Septmber
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="7">
                                                                                                                October
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="8">
                                                                                                                November
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="8">
                                                                                                                Desember
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                    <div class="col-lg-6">
                                                                                                        <select
                                                                                                            class="form-select">
                                                                                                            <option
                                                                                                                value="">
                                                                                                                Year
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="1">
                                                                                                                2017
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="2">
                                                                                                                2018
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                2019
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                2020
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                2021
                                                                                                            </option>
                                                                                                            <option
                                                                                                                value="3">
                                                                                                                2022
                                                                                                            </option>
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-lg-6">
                                                                                                <div id="duration_to"
                                                                                                    style="display:none">
                                                                                                    <label
                                                                                                        for="example-date"
                                                                                                        class="form-label">To
                                                                                                    </label>
                                                                                                    <div class="row">
                                                                                                        <div
                                                                                                            class="col-lg-6">
                                                                                                            <select
                                                                                                                class="form-select">
                                                                                                                <option
                                                                                                                    selected>
                                                                                                                    Month
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="1">
                                                                                                                    January
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2">
                                                                                                                    February
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    March
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    April
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="4">
                                                                                                                    May
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="5">
                                                                                                                    June
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="6">
                                                                                                                    July
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="7">
                                                                                                                    August
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="8">
                                                                                                                    Septmber
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="7">
                                                                                                                    October
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="8">
                                                                                                                    November
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="8">
                                                                                                                    Desember
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-lg-6">
                                                                                                            <select
                                                                                                                class="form-select">
                                                                                                                <option
                                                                                                                    value="">
                                                                                                                    Year
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="1">
                                                                                                                    2017
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="2">
                                                                                                                    2018
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    2019
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    2020
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    2021
                                                                                                                </option>
                                                                                                                <option
                                                                                                                    value="3">
                                                                                                                    2022
                                                                                                                </option>
                                                                                                            </select>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="mb-2"
                                                                                                    id="notice_period"
                                                                                                    style="display:none">
                                                                                                    <label
                                                                                                        for="example-date"
                                                                                                        class="form-label">Notice
                                                                                                        Period </label>
                                                                                                    <select
                                                                                                        class="form-select"
                                                                                                        id="choices-single-no-search"
                                                                                                        name="choices-single-no-search"
                                                                                                        data-choices
                                                                                                        data-choices-search-false
                                                                                                        data-choices-removeItem>
                                                                                                        <option
                                                                                                            value=""
                                                                                                            disabled>Serving
                                                                                                            Notice Period
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="1">
                                                                                                            15 Days Or Less
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="2">
                                                                                                            1 Months
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            2 Months
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            3 Months
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            6 Months
                                                                                                        </option>
                                                                                                        <option
                                                                                                            value="3">
                                                                                                            More Than 6
                                                                                                            Months</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                        <div class="mb-2">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Job
                                                                                                Profile </label>
                                                                                            <textarea placeholder="Job Profile" name="" id="" class="form-control" cols="5"
                                                                                                rows="5"></textarea>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="col-lg-12 text-end">
                                                                                                <button
                                                                                                    class="btn btn-light btn-border btn-sm"
                                                                                                    id="add_more_experience"><i
                                                                                                        class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i>
                                                                                                    Add More</button>
                                                                                                <button
                                                                                                    class="btn btn-danger btn-border btn-sm"
                                                                                                    id="remove_experience_filed"
                                                                                                    style="display:none"><i
                                                                                                        class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i>
                                                                                                    Remove Section</button>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="accordion-item mb-2">
                                                                                <h2 class="accordion-header"
                                                                                    id="headingTwo">
                                                                                    <button class="accordion-button "
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#skillset"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseTwo">
                                                                                        Skillset Details
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="skillset"
                                                                                    class="accordion-collapse collapse p-2"
                                                                                    aria-labelledby="headingTwo"
                                                                                    data-bs-parent="#default-accordion-example">
                                                                                    <div class="accordion-body pe-0 ps-0">

                                                                                        <div class="mb-2">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Skill
                                                                                                Set </label>
                                                                                            <input class="form-control "
                                                                                                id="choices-text-unique-values"
                                                                                                data-choices
                                                                                                data-choices-text-unique-true
                                                                                                type="text"
                                                                                                value="Html, Css" />
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Language
                                                                                            </label>
                                                                                            <input class="form-control "
                                                                                                id="choices-text-unique-values"
                                                                                                data-choices
                                                                                                data-choices-text-unique-true
                                                                                                type="text"
                                                                                                value="odia, Hindi" />
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Affrimative
                                                                                                Action </label>
                                                                                            <div class="form-group mb-2">

                                                                                                <div class="btn-group btn-group-sm d-flex "
                                                                                                    role="group"
                                                                                                    aria-label="Horizontal radio toggle button group">
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio1"
                                                                                                        value="Hot">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio1">SC</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio2"
                                                                                                        value="Normal">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio2">ST</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio3"
                                                                                                        value="Bulk">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio3">OBC</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="job_priority"
                                                                                                        id="vbtn-radio4"
                                                                                                        value="Bulk">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio3">GENERAL</label>
                                                                                                </div>


                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="mb-2">
                                                                                            <label for="example-date"
                                                                                                class="form-label">Differently
                                                                                                Abled </label>
                                                                                            <div class="form-group mb-2">

                                                                                                <div class="btn-group btn-group-sm d-flex "
                                                                                                    role="group"
                                                                                                    aria-label="Horizontal radio toggle button group">
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="differently_abled"
                                                                                                        id="dbtn-radio1"
                                                                                                        value="developmental">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio1">Development</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="differently_abled"
                                                                                                        id="dbtn-radio2"
                                                                                                        value="mental">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio2">Mental</label>
                                                                                                    <input type="radio"
                                                                                                        class="btn-check "
                                                                                                        name="differently_abled"
                                                                                                        id="dbtn-radio3"
                                                                                                        value="physical">
                                                                                                    <label
                                                                                                        class="j_priority btn btn-outline-primary p-2"
                                                                                                        for="vbtn-radio2">Physical</label>


                                                                                                </div>


                                                                                            </div>

                                                                                        </div>



                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header"
                                                                                    id="headingThree">
                                                                                    <button class="accordion-button "
                                                                                        type="button"
                                                                                        data-bs-toggle="collapse"
                                                                                        data-bs-target="#source"
                                                                                        aria-expanded="false"
                                                                                        aria-controls="collapseThree">
                                                                                        Source Details
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="source"
                                                                                    class="accordion-collapse collapse p-2"
                                                                                    aria-labelledby="headingThree"
                                                                                    data-bs-parent="#default-accordion-example">
                                                                                    <div class="accordion-body pe-0 ps-0">

                                                                                        <div class="p-2">
                                                                                            <div class="mb-2">
                                                                                                <label for="simpleinput"
                                                                                                    class="form-label">Source
                                                                                                    Type </label>
                                                                                                <select
                                                                                                    class="form-select"
                                                                                                    id="choices-single-no-search"
                                                                                                    name="choices-single-no-search"
                                                                                                    data-choices
                                                                                                    data-choices-search-false
                                                                                                    data-choices-removeItem>
                                                                                                    <option>Select Source
                                                                                                        Type</option>
                                                                                                    <option
                                                                                                        value="AK">
                                                                                                        Pravasini Sahoo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="HI">
                                                                                                        Avinash Pattnaik
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="HI">
                                                                                                        Srabani Puthal
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="simpleinput"
                                                                                                    class="form-label">Source
                                                                                                    Name </label>
                                                                                                <select
                                                                                                    class="form-select"
                                                                                                    id="choices-single-no-search"
                                                                                                    name="choices-single-no-search"
                                                                                                    data-choices
                                                                                                    data-choices-search-false
                                                                                                    data-choices-removeItem>
                                                                                                    <option>Select Source
                                                                                                        Type</option>
                                                                                                    <option
                                                                                                        value="AK">
                                                                                                        Pravasini Sahoo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="HI">
                                                                                                        Avinash Pattnaik
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="HI">
                                                                                                        Srabani Puthal
                                                                                                    </option>
                                                                                                </select>

                                                                                            </div>
                                                                                            <div class="mb-1 mt-1">
                                                                                                <label for="simpleinput"
                                                                                                    class="form-label">Recruiter
                                                                                                </label>
                                                                                                <select
                                                                                                    class="form-select"
                                                                                                    id="choices-single-no-search"
                                                                                                    name="choices-single-no-search"
                                                                                                    data-choices
                                                                                                    data-choices-search-false
                                                                                                    data-choices-removeItem>
                                                                                                    <option>Select</option>
                                                                                                    <option
                                                                                                        value="AK">
                                                                                                        Pravasini Sahoo
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="HI">
                                                                                                        Avinash Pattnaik
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="HI">
                                                                                                        Srabani Puthal
                                                                                                    </option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>


                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                    <div class="offcanvas-foorter border p-3 ">
                                                        <div class="col-12">
                                                            <div class="text-end">
                                                                <button class="btn btn-primary"> Create</button>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="tab-content text-muted ">
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.sourced_tab')
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.attempted_tab')
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.call_later_tab')
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.not_interested_tab')
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.interested_tab')
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.submitted_tab')
                                                    @include('admin.helper_view.view-job-details.pool-tab-content.recommendation_tab')
                                                </div>

                                                @include('admin.helper_view.view-job-details.modals.remove_candidate_modal')
                                                @include('admin.helper_view.view-job-details.modals.call_candidate_modal')
                                                @include('admin.helper_view.view-job-details.modals.call_validate_modal')
                                                @include('admin.helper_view.view-job-details.modals.duplicate_candidate_modal')
                                                @include('admin.helper_view.view-job-details.modals.validate_call_candidate_modal')
                                                {{-- include call modal --}}

                                            </div>
                                            {{-- quality info tab  --}}
                                            @include('admin.helper_view.view-job-details.quality-tab-content.quality_info_tab')
                                            
                                            {{-- submitted info tab  --}}
                                            @include('admin.helper_view.view-job-details.submit-tab-content.submit_info_tab')
                                            
                                            {{-- progress info tab  --}}
                                            @include('admin.helper_view.view-job-details.progree-tab-content.progress_info_tab')
                                            
                                            {{-- noshow info tab  --}}
                                            @include('admin.helper_view.view-job-details.noshow_tab_content.noshow_info_tab')
                                           
                                            {{-- rejected info  --}}
                                            @include('admin.helper_view.view-job-details.rejected_tab_content.rejected_info_tab')
                                            
                                            {{-- on hold info  --}}
                                            @include('admin.helper_view.view-job-details.onhold_tab_content.onhold_info_tab')
                                            {{-- selected info  --}}
                                            @include('admin.helper_view.view-job-details.selected_tab_content.selected_info_tab')
                                            {{-- joined info  --}}
                                            @include('admin.helper_view.view-job-details.joined_tab_content.joined_info_tab')
                                            {{-- duplicate info  --}}
                                            @include('admin.helper_view.view-job-details.duplicate_tab_content.duplicate_info_tab')
                                            {{-- all info  --}}
                                            @include('admin.helper_view.view-job-details.all_tab_content.all_info_tab')
                                            
                                            @include('admin.helper_view.view-job-details.modals.joining_abscond')
                                            @include('admin.helper_view.view-job-details.modals.update_joined_modal')

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane " id="share_tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card card-animate mb-2">
                                            <div class="row g-0">
                                                <div class="col-md-5">
                                                    <img class="rounded-start h-100 img-fluid  object-cover"
                                                        src="{{ asset('assets/images/php-developer-image.png') }}"
                                                        alt="Card image">
                                                </div>
                                                <div class="col-md-7">
                                                    <div class="card-header">
                                                        <h5 class="card-title mb-0">PHP Developer</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <p class="card-text fs-12 mb-2">Job Overview We are searching for
                                                            a professional PHP Developer to join our Development team on an
                                                            immediate basis. As a PHP Developer, you will be working under
                                                            our Senior PHP Developer and a team of full-stac...</p>
                                                        <p class="card-text"><small class="text-muted">Last updated 3
                                                                mins ago</small></p>
                                                    </div>

                                                </div>
                                                <div class="card-footer">
                                                    <p class="card-text mb-2 fs-13">We are Hiring! Are you the candidate
                                                        we are looking for? Send your applications to us right away!</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card card-animate mb-2">
                                            <div class="card-body">
                                                <p class="text-muted fs-12 mb-5">Click on below social networks to share
                                                    this job.</p>
                                                <div class="row mb-3">
                                                    <div class="col-lg-2">
                                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                            <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                                                class="avatar-md rounded-circle" alt="...">
                                                            <a href="apps-mailbox.html"
                                                                class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                <div class="avatar-title bg-transparent">
                                                                    <i class="ri-facebook-fill align-bottom"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                            <img src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                                                                class="avatar-md rounded-circle" alt="...">
                                                            <a href="apps-mailbox.html"
                                                                class="btn btn-info btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                <div class="avatar-title bg-transparent">
                                                                    <i class="ri-twitter-fill align-bottom"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                            <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                                                class="avatar-md rounded-circle" alt="...">
                                                            <a href="apps-mailbox.html"
                                                                class="btn btn-danger btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                <div class="avatar-title bg-transparent">
                                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                            <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                class="avatar-md rounded-circle" alt="...">
                                                            <a href="apps-mailbox.html"
                                                                class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                <div class="avatar-title bg-transparent">
                                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                            <img src="{{ asset('assets/images/users/avatar-6.jpg') }}"
                                                                class="avatar-md rounded-circle" alt="...">
                                                            <a href="apps-mailbox.html"
                                                                class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                <div class="avatar-title bg-transparent">
                                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                            <img src="{{ asset('assets/images/users/avatar-7.jpg') }}"
                                                                class="avatar-md rounded-circle " alt="...">
                                                            <a href="apps-mailbox.html"
                                                                class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                <div class="avatar-title bg-transparent">
                                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="show_customise_field" style="display:none">
                                                    <div class="row mb-3">
                                                        <div class="col-lg-1">
                                                            <div class="avatar-sm img-animate">
                                                                <span class="avatar-title bg-primary rounded fs-3">
                                                                    <i class="ri-facebook-line text-light"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11">
                                                            <div class="card border card-border-light mb-0">
                                                                <div class="card-body share-card-new p-1">
                                                                    <p class="text-muted">We are Hiring! Are you the
                                                                        candidate we are looking for? Send your applications
                                                                        to us right away!</p>
                                                                </div>
                                                            </div>
                                                            <small class="text-muted fs-10">183 characters left</small>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-lg-1">
                                                            <div class="avatar-sm img-animate">
                                                                <span class="avatar-title bg-secondary rounded fs-3">
                                                                    <i class="ri-linkedin-fill text-light"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11">
                                                            <div class="card border card-border-light mb-0">
                                                                <div class="card-body share-card-new p-1">
                                                                    <p class="text-muted">We are Hiring! Are you the
                                                                        candidate we are looking for? Send your applications
                                                                        to us right away!</p>
                                                                </div>
                                                            </div>
                                                            <small class="text-muted fs-10">183 characters left</small>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        <div class="col-lg-1">
                                                            <div class="avatar-sm img-animate">
                                                                <span class="avatar-title bg-info rounded fs-3">
                                                                    <i class="ri-twitter-line text-light"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-11">
                                                            <div class="card border card-border-light mb-0">
                                                                <div class="card-body share-card-new p-1">
                                                                    <p class="text-muted">We are Hiring! Are you the
                                                                        candidate we are looking for? Send your applications
                                                                        to us right away!</p>
                                                                </div>
                                                            </div>
                                                            <small class="text-muted fs-10">183 characters left</small>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-lg-6 ">
                                                        <h6 class="c-pointer" id="customise_network">Customize for each
                                                            network </h6>
                                                    </div>
                                                    <div class="col-lg-6 text-lg-end">
                                                        <button type="button"
                                                            class="btn btn-light btn-icon waves-effect me-1"><i
                                                                class="ri-time-line fs-15"></i></button>
                                                        <button class="btn btn-primary btn-border me-1">Share</button>
                                                        <button class="btn btn-light btn-border">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-4">
                                        <div class="card card-animate mb-2">
                                            <div class="card-body bg-light">
                                                <p class="card-text mb-2 fs-13">Share this post on your social networks
                                                    and use the power of your connections to reach a more focused audience.
                                                    Click on the respective pages or profiles to share this job on the
                                                    connected social media networks. You can also post this job at a later
                                                    date and time using the scheduler.</p>
                                            </div>

                                        </div>

                                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate"
                                            id="accordionnesting">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordionnestingExample1">

                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accor_nestingExamplecollapse1"
                                                        aria-expanded="false"
                                                        aria-controls="accor_withouticoncollapse1">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-2">
                                                                <img class="rounded-start img-fluid "
                                                                    src="{{ asset('assets/images/php-developer-image.png') }}"
                                                                    width="100%" alt="Card image">
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <h6 class="align-middle d-flex fs-12">How Does Age
                                                                    Verification Work?<i
                                                                        class="ri-checkbox-circle-fill text-info "></i>
                                                                </h6>
                                                                <small class="text-muted">2 Month ago</small>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="accor_nestingExamplecollapse1"
                                                    class="accordion-collapse collapse  "
                                                    aria-labelledby="accordionnestingExample1"
                                                    data-bs-parent="#accordionnesting" style="">
                                                    <div class="accordion-body">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class="ri-facebook-fill align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-linkedin-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate"
                                            id="accordionnesting">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordionnestingExample1">

                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accor_nestingExamplecollapse2"
                                                        aria-expanded="false"
                                                        aria-controls="accor_withouticoncollapse1">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-2">
                                                                <img class="rounded-start img-fluid "
                                                                    src="{{ asset('assets/images/php-developer-image.png') }}"
                                                                    width="100%" alt="Card image">
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <h6 class="align-middle d-flex fs-12">How Does Age
                                                                    Verification Work?<i
                                                                        class="ri-checkbox-circle-fill text-info "></i>
                                                                </h6>
                                                                <small class="text-muted">2 Month ago</small>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="accor_nestingExamplecollapse2"
                                                    class="accordion-collapse collapse  "
                                                    aria-labelledby="accordionnestingExample1"
                                                    data-bs-parent="#accordionnesting" style="">
                                                    <div class="accordion-body">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-facebook-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-linkedin-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate"
                                            id="accordionnesting">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordionnestingExample1">

                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accor_nestingExamplecollapse3"
                                                        aria-expanded="false"
                                                        aria-controls="accor_withouticoncollapse1">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-2">
                                                                <img class="rounded-start img-fluid "
                                                                    src="{{ asset('assets/images/php-developer-image.png') }}"
                                                                    width="100%" alt="Card image">
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <h6 class="align-middle d-flex fs-12">How Does Age
                                                                    Verification Work?<i
                                                                        class="ri-checkbox-circle-fill text-info "></i>
                                                                </h6>
                                                                <small class="text-muted">2 Month ago</small>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="accor_nestingExamplecollapse3"
                                                    class="accordion-collapse collapse  "
                                                    aria-labelledby="accordionnestingExample1"
                                                    data-bs-parent="#accordionnesting" style="">
                                                    <div class="accordion-body">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-linkedin-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-facebook-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate mb-2"
                                            id="accordionnesting">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="accordionnestingExample1">

                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#accor_nestingExamplecollapse4"
                                                        aria-expanded="false"
                                                        aria-controls="accor_withouticoncollapse1">
                                                        <div class="row mt-2">
                                                            <div class="col-lg-2">
                                                                <img class="rounded-start img-fluid "
                                                                    src="{{ asset('assets/images/php-developer-image.png') }}"
                                                                    width="100%" alt="Card image">
                                                            </div>
                                                            <div class="col-lg-10">
                                                                <h6 class="align-middle d-flex fs-12">How Does Age
                                                                    Verification Work?<i
                                                                        class="ri-checkbox-circle-fill text-info "></i>
                                                                </h6>
                                                                <small class="text-muted">2 Month ago</small>
                                                            </div>
                                                        </div>
                                                    </button>
                                                </h2>
                                                <div id="accor_nestingExamplecollapse4"
                                                    class="accordion-collapse collapse  "
                                                    aria-labelledby="accordionnestingExample1"
                                                    data-bs-parent="#accordionnesting" style="">
                                                    <div class="accordion-body">
                                                        <div class="d-flex align-items-center">
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-linkedin-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                                <div
                                                                    class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                                    <img src="{{ asset('assets/images/users/avatar-5.jpg') }}"
                                                                        class="avatar-md rounded-circle" alt="...">
                                                                    <a href="apps-mailbox.html"
                                                                        class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                                        <div class="avatar-title bg-transparent">
                                                                            <i class=" ri-facebook-line align-bottom"></i>
                                                                        </div>
                                                                    </a>
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

                            <div class="tab-pane " id="advertise_tab" role="tabpanel">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/facebook-careers-tab.png') }}"
                                                                    class="img-fluid rounded-circle job-board-img"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Your personalized mobile friendly careers site hosted on
                                                                    Jobsoid to showcase your talent brand.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/facebook-careers-tab.png') }}"
                                                                    class="img-fluid rounded-circle job-board-img"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Job openings displayed on your company Website with the
                                                                    Website Integration plugin.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/website-careers-page.png') }}"
                                                                    class="img-fluid rounded-circle job-board-img"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Job openings displayed on your company Facebook page
                                                                    with the Career Tab integration plugin.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <h5 class="text-muted">Free Job Boards</h5>
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/indeed.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Indeed.com is a global Job search engine available in
                                                                    over 60 countries and 28 languages
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/monster.png') }}"
                                                                    class="img-fluid rounded-circle" width="50%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Monster.com is a leading global employment solution
                                                                    available in around 40 countries that connects employers
                                                                    to their prospective candidates.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/glassdoor.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Glassdoor one of the fastest growing Job board with
                                                                    millions of company reviews, salary reports etc.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/linkedin.png') }}"
                                                                    class="img-fluid rounded-circle" width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Limited Listings are free job postings visible to active
                                                                    candidates when they search for jobs on LinkedIn.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/ziprecruiter.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Organic version of ZipRecruiter job search engine which
                                                                    circulates job postings to over 50+ job boards.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/adzuna.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Adzuna is a job search engine based in the UK, operating
                                                                    websites in over 11 countries.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/careerjet.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Careerjet is a leading search engine available in 90
                                                                    countries and 28 languages.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/jooble.png') }}"
                                                                    class="img-fluid rounded-circle" width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Jooble is a job search engine available in over 60
                                                                    countries worldwide.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/trovit.png') }}"
                                                                    class="img-fluid rounded-circle" width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Trovit is a classifieds search engine available in over
                                                                    51 countries worldwide.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/jobrapido.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Job Rapido is a global job aggregator headquartered in
                                                                    Milan, reaching out to 58 countries.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/jobisjob.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    JobisJob is a search engine for job offers available in
                                                                    over 25 countries.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/mercadojobs.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Mercadojobs is a global job board with over 7 million
                                                                    unique visitors every month.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/jobomas.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Jobomas is a leading job site in Latin America with 21 M
                                                                    registered users, also available globally.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/drjobs.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    DrJobs is a premium job search engine in GCC & Asian
                                                                    Countries.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/jora.png') }}"
                                                                    class="img-fluid rounded-circle " width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Jora is a worldwide job search aggregator in almost
                                                                    every continent around the globe.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/neuvoo.png') }}"
                                                                    class="img-fluid rounded-circle" width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Neuvoo is a job posting site available in over 65
                                                                    countries worldwide.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/gigajob.png') }}"
                                                                    class="img-fluid rounded-circle" width="60%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Gigajobs is an international job search platform
                                                                    operating in about 140 countries across the world.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                            <div class="col-md-6 col-xl-3 mb-3">
                                                <div class="widget-rounded-circle card job-board-card-new card-animate">
                                                    <div class="card-body job-board-card">
                                                        <div class="align-items-center job-board-content">
                                                            <div class="img-hover">
                                                                <img src="{{ asset('assets/images/upward.png') }}"
                                                                    class="img-fluid rounded-circle" width="45%"
                                                                    alt="user-img">
                                                            </div>
                                                            <div class="content-text ms-1 me-1">
                                                                <small class="text-muted">
                                                                    Upward.net is a leading job board that is connected to
                                                                    over 100+ job sites for better job promotions.
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <div class="text-center mt-3">
                                                            <button type="button"
                                                                class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light">
                                                                Publish</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div> <!-- end col-->

                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane " id="analytics_tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Sourcing Channels</h4>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="doughnut" class="chartjs-chart"
                                                    data-colors='["--vz-primary", "--vz-light"]'></canvas>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">Pipeline Status</h4>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="pieChart" class="chartjs-chart"
                                                    data-colors='["--vz-success", "--vz-light"]'></canvas>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <h5 class="">Sourcing Performance</h5>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-pills nav-customs nav-danger mb-3"
                                                            role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-bs-toggle="tab"
                                                                    href="#views_tab" role="tab">Views</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab"
                                                                    href="#both_tab" role="tab">Both</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-bs-toggle="tab"
                                                                    href="#chart_candidates_tab"
                                                                    role="tab">Candidates</a>
                                                            </li>

                                                        </ul>
                                                        <div class="tab-content text-muted">
                                                            <div class="tab-pane active" id="views_tab"
                                                                role="tabpanel">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div id="area_chart_spline"
                                                                            data-colors='["--vz-primary", "--vz-success"]'
                                                                            class="apex-charts" dir="ltr"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane" id="both_tab" role="tabpanel">

                                                            </div>
                                                            <div class="tab-pane" id="chart_candidates_tab"
                                                                role="tabpanel">

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="input-group">
                                                            <select class="form-select" id="inputGroupSelect02">
                                                                <option selected="">Today</option>
                                                                <option value="1">Yesterday</option>
                                                                <option value="2">Last Week</option>
                                                                <option value="3">This Week</option>
                                                                <option value="3">Last month</option>
                                                                <option value="3">This month</option>
                                                                <option value="3">Last Year</option>
                                                                <option value="3">This Year</option>

                                                            </select>
                                                            <label class="input-group-text" for="inputGroupSelect02"> <i
                                                                    class="ri-calendar-2-line"></i></label>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane " id="activities_tab" role="tabpanel">

                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-sm-flex align-items-center">
                                            <h5 class="card-title flex-grow-1 mb-0">Activities Status</h5>
                                            <div class="flex-shrink-0 mt-2 mt-sm-0">
                                                <a href="javasccript:void(0;)"
                                                    class="btn btn-soft-info btn-sm mt-2 mt-sm-0"><i
                                                        class="ri-map-pin-line align-middle me-1"></i> Change Address</a>
                                                <a href="javasccript:void(0;)"
                                                    class="btn btn-soft-danger btn-sm mt-2 mt-sm-0"><i
                                                        class="mdi mdi-archive-remove-outline align-middle me-1"></i>
                                                    Cancel Order</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="profile-timeline">
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingOne">
                                                        <a class="accordion-button p-2 shadow-none"
                                                            data-bs-toggle="collapse" href="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-primary rounded-circle">
                                                                        <i class="ri-shopping-bag-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-15 mb-0 fw-semibold">Order Placed -
                                                                        <span class="fw-normal">Wed, 15 Dec 2021</span>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <h6 class="mb-1">An order has been placed.</h6>
                                                            <p class="text-muted">Wed, 15 Dec 2021 - 05:34PM</p>

                                                            <h6 class="mb-1">Seller has proccessed your order.</h6>
                                                            <p class="text-muted mb-0">Thu, 16 Dec 2021 - 5:48AM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingTwo">
                                                        <a class="accordion-button p-2 shadow-none"
                                                            data-bs-toggle="collapse" href="#collapseTwo"
                                                            aria-expanded="false" aria-controls="collapseTwo">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-primary rounded-circle">
                                                                        <i class="mdi mdi-gift-outline"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-15 mb-1 fw-semibold">Packed - <span
                                                                            class="fw-normal">Thu, 16 Dec 2021</span></h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo" class="accordion-collapse collapse show"
                                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <h6 class="mb-1">Your Item has been picked up by courier
                                                                patner</h6>
                                                            <p class="text-muted mb-0">Fri, 17 Dec 2021 - 9:45AM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingThree">
                                                        <a class="accordion-button p-2 shadow-none"
                                                            data-bs-toggle="collapse" href="#collapseThree"
                                                            aria-expanded="false" aria-controls="collapseThree">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div class="avatar-title bg-primary rounded-circle">
                                                                        <i class="ri-truck-line"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-15 mb-1 fw-semibold">Shipping - <span
                                                                            class="fw-normal">Thu, 16 Dec 2021</span></h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="accordion-collapse collapse show"
                                                        aria-labelledby="headingThree"
                                                        data-bs-parent="#accordionExample">
                                                        <div class="accordion-body ms-2 ps-5 pt-0">
                                                            <h6 class="fs-14">RQK Logistics - MFDS1400457854</h6>
                                                            <h6 class="mb-1">Your item has been shipped.</h6>
                                                            <p class="text-muted mb-0">Sat, 18 Dec 2021 - 4.54PM</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFour">
                                                        <a class="accordion-button p-2 shadow-none"
                                                            data-bs-toggle="collapse" href="#collapseFour"
                                                            aria-expanded="false">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div
                                                                        class="avatar-title bg-light text-primary rounded-circle">
                                                                        <i class="ri-takeaway-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">Out For Delivery
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="accordion-item border-0">
                                                    <div class="accordion-header" id="headingFive">
                                                        <a class="accordion-button p-2 shadow-none"
                                                            data-bs-toggle="collapse" href="#collapseFile"
                                                            aria-expanded="false">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0 avatar-xs">
                                                                    <div
                                                                        class="avatar-title bg-light text-primary rounded-circle">
                                                                        <i class="mdi mdi-package-variant"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h6 class="fs-14 mb-0 fw-semibold">Delivered</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end accordion-->
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>

                        </div>
                    </div>





                    <!-- Modal Blur -->
                    <div id="add_hiring_manager" class="modal fade zoomIn" tabindex="-1"
                        aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog  modal-lg">
                            <div class="modal-content">
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                <div class="card mb-0">
                                    <div class="card-header align-items-center d-flex">
                                        <h3 class="mb-0 flex-grow-1 font-f-R">Add Hiring Manager</h3>
                                        <div class="flex-shrink-0 font-f-R">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="align-items-center d-flex mb-3">
                                            <p class=" mb-0 flex-grow-1 ">Assign Team Members per pipeline Stage.</p>
                                            <div class="flex-shrink-0 ">
                                                <div class="form-check form-switch form-switch-right form-switch-md">
                                                    <label for="form-grid-showcode"
                                                        class="form-label text-muted font-11"></label>
                                                    <input class="form-check-input code-switcher" type="checkbox"
                                                        id="form-grid-showcode" checked>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-none  live-preview">

                                        </div>

                                        <div class="code-view">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="card card-light mb-0 card-animate">
                                                        <div class="card-body pb-0">
                                                            <div class="row">
                                                                <div class="col-xl-4">
                                                                    <div class="card ">
                                                                        <div class="card-body">
                                                                            <div class="d-flex align-items-center gap-2">
                                                                                <div class="avatar-xs">
                                                                                    <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                                                                        alt=""
                                                                                        class="img-fluid rounded-circle">
                                                                                </div>
                                                                                <div class="me-4 mt-1">
                                                                                    <h5 class="c-pointer fs-13">Nibedita
                                                                                        Sahoo<br><small
                                                                                            class="text-muted fs-11">info@quacklabs.in</small>
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
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-lg-end">
                                        <button type="button" class="btn btn-primary ">Save</button>
                                        <button type="button" class="btn btn-light"
                                            data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.modal -->
                    <div id="change_another_joborder" class="modal fade zoomIn" tabindex="-1"
                        aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog  modal-dialog-centered">
                            <div class="modal-content">
                                <div class="card bg-pattern mb-0">

                                    <div class="modal-body">
                                        <div class="text-center">
                                            <h5 class="mb-3">Change Another Job-Order ?</h5>
                                            <div class="mb-3 ps-4 pe-4">
                                                <select id="heard" class="form-select" required="">
                                                    <option value="">Select..</option>
                                                    <option value="press">Press</option>
                                                    <option value="net">Internet</option>
                                                    <option value="mouth">Word of mouth</option>
                                                    <option value="other">Other..</option>
                                                </select>
                                            </div>
                                            <div class="">
                                                <button type="button"
                                                    class="btn btn-primary width-md waves-effect waves-light"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- offcanvas-2 -->
                    <div class="offcanvas offcanvas-end  " tabindex="-1" id="addreference"
                        aria-labelledby="offcanvasRightLabel">

                        <div
                            class="offcanvas-header d-flex flex-row align-items-center justify-content-between bg-primary p-3">
                            <div class="">
                                <h5 class="offcanvas-title text-white font-w-600 fs-22">Add Refrences</h5>
                                <small class="fs-13 text-white font-w-600 ">Fill candidate details.</small>
                            </div>
                            <button type="button" class="btn-close text-reset mb-0 fs-15" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body p-2 overflow-hidden">
                            <div data-simplebar class="pe-2" style="height: calc(100vh - 112px);">

                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Name</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Mobile No </label>
                                    <input type="text" id="example-palaceholder" maxlength="10"
                                        class="form-control" placeholder="Mobile Num.">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-4 col-xl-4">
                                            <label for="example-palaceholder" class="form-label">Confidential </label>
                                        </div>
                                        <div class="col-4 col-xl-4">
                                            <div class="form-check mb-2 form-check-primary">
                                                <input class="form-check-input rounded-circle" type="radio"
                                                    name="checked_radio" value="" id="customckeck11"
                                                    checked="">
                                                <label class="form-check-label" for="customckeck11">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-4 col-xl-4">
                                            <div class="form-check mb-2 form-check-primary ">
                                                <input class="form-check-input rounded-circle" type="radio"
                                                    name="checked_radio" value="" id="customckeck11">
                                                <label class="form-check-label" for="customckeck11">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="heard" class="form-label">Joborder </label>
                                    <select class="form-select" id="choices-single-no-search"
                                        name="choices-single-no-search" data-choices data-choices-search-false
                                        data-choices-removeItem>
                                        <option selected="">Joborder</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Notes </label>
                                    <textarea required="" class="form-control" rows="4"></textarea>
                                </div>


                            </div>
                        </div>
                        <div class="offcanvas-foorter border p-3">
                            <div class="text-center">
                                <button type="button" class="btn btn-light btn-border me-1">Save &amp; Add
                                    more</button>
                                <button type="button" class="btn btn-primary btn-border">Save</button>
                            </div>
                        </div>
                    </div>

                    <!--end tab-pane-->
                </div>
                <!--end tab-content-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- modal -->
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
                            <input type="text" class="form-control" id="validationCustom04" required="">
                        </div>
                        <div class="mb-2">
                            <label for="validationCustom04" class="form-label">Designation * : </label>
                            <input type="text" class="form-control" id="validationCustom04" required="">
                        </div>
                        <div class="mb-2">
                            <label for="validationCustom04" class="form-label">Contact no * : </label>
                            <input type="number" class="form-control" maxlength="10" id="validationCustom04"
                                required="">
                        </div>
                        <div class="mb-2">
                            <label for="validationCustom04" class="form-label">Email ID * : </label>
                            <input type="email" class="form-control" id="validationCustom04" required="">
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
    <div id="edit_contacts" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="card bg-pattern mb-0">
                    <div class="modal-header card-header p-3 bg-light">
                        <h5 class="modal-title  ms-4 fs-13" id="myCenterModalLabel">Edit Contacts</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body ms-4 me-4 mt-2">
                        <div class="mb-2">
                            <label for="validationCustom04" class="form-label">Interviewer Name * : </label>
                            <input type="text" class="form-control" id="validationCustom04">
                        </div>

                        <div class="mb-2">
                            <label for="validationCustom04" class="form-label">Contact no * : </label>
                            <input type="number" class="form-control" maxlength="10" id="validationCustom04">
                        </div>
                        <div class="mb-2">
                            <label for="validationCustom04" class="form-label">Email ID * : </label>
                            <input type="email" class="form-control" id="validationCustom04">
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
                            <input type="number" class="form-control" id="validationCustom04" value="100"
                                required="">
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
    <div id="transfer_candidate" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="card bg-pattern mb-0">

                    <div class="modal-body ms-4 me-4">
                        <h5 class="mb-4">Selecte Recruiter to Transfer these Candidate(s)</h5>
                        <div class="mb-3">
                            <select class="form-select" id="choices-single-no-search" name="choices-single-no-search"
                                data-choices data-choices-search-false data-choices-removeItem>
                                <option selected="">Abhinash</option>
                                <option selected="">Subhashree</option>

                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea required="" placeholder="Note" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="text-center mb-2">
                            <button type="button" class="btn btn-light btn-border"
                                data-bs-dismiss="modal">cancel</button>
                            <button type="button" class="btn btn-primary btn-border me-1">Transfer</button>

                        </div>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div id="status_changes" data-bs-backdrop="static" data-bs-keyboard="false"
    class="modal fade zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center ">
                <div class="text-end">
                    <button type="button" data-bs-dismiss="modal" class="btn-close text-end"
                            aria-label="Close"></button>
                </div>
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="hover"
                        style="width:150px;height:150px">
                    </lord-icon>
                    <h4 class="mb-5 mt-3 fs-20">Yeah !!! Applicant Updated Sucessfully.</h4> 
                    
                </div>
            </div>
            <div class="modal-footer bg-light p-3 justify-content-center">
                <a href="#" class="link-secondary fw-semibold"
                    data-bs-dismiss="modal">Close</a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection
@section('script')
    <script src="{{ asset('assets/libs/rater-js/index.js') }}"></script>
    <!-- rating init -->
    <script src="{{ asset('assets/js/pages/rating.init.js') }}"></script>
    <script src="{{ asset('assets/timer/compiled/flipclock.js') }}"></script>
    {{-- for dragging tab  --}}
    <script src="{{asset('assets/js/pages/profile.init.js')}}"></script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script>
        FilePond.registerPlugin(

            // encodes the file as base64 data
            FilePondPluginFileEncode,

            // validates the size of the file
            FilePondPluginFileValidateSize,

            FilePondPluginFileValidateType,

            // corrects mobile image orientation
            FilePondPluginImageExifOrientation,

            // previews dropped images
            FilePondPluginImagePreview
        );
        FilePond.create(document.querySelector('.filepond'), {
            acceptedFileTypes: ['application/pdf', 'application/msword', 'application/rtf'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise

                    resolve(type);
                }),
            allowFileEncode: true,
            storeAsFile: true,
            onupdatefiles: (files) => {
                // $('#upload_ajax_resume').trigger("click");
                upload_modal_resume();
            },
            // onprocessfiles:()=>console.log("files"),

        });
    </script>
    <script>
        $('#joining_abscond_date').flatpickr({
            maxDate:'today'
        });
        $('#joined_offer_doj').flatpickr({
            maxDate:'today'
        });
        function open_joined_abscond_modal(e,applicant_key){
            var joined_abscond_modal = new bootstrap.Modal(document.getElementById('joined_abscond_modal'), {
                keyboard: false
            })
            $('#applicant_key').val(applicant_key);
            joined_abscond_modal.show();
        }
        function open_joined_update_modal(e,applicant_key,offer_position,offer_ctc,emp_code,actual_doj){
            var update_joined_modal = new bootstrap.Modal(document.getElementById('update_joined_modal'), {
                keyboard: false
            })
            $('#joined_applicant_key').val(applicant_key);
            $('#joined_offer_position').val(offer_position);
            $('#joined_offer_ctc').val(offer_ctc);
            $('#joined_offer_emp_code').val(emp_code);
            $('#joined_offer_doj').val(actual_doj);
            update_joined_modal.show();
        }
        $('#update_joined_abscond').click(function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($('#submit_joined_abscond')[0]);
            $.ajax({
                type: "post",
                url: "{{route('update_joined_abscond_last_working')}}",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function (response) {
                    if(response.data=="Success"){
                        var joined_abscond_modal = document.getElementById('joined_abscond_modal')
                        var joined_abscond_modal = bootstrap.Modal.getInstance(joined_abscond_modal)
                        joined_abscond_modal.hide();
                        Snackbar.show({
                            text: 'Applicant Updated Successfully..',
                            pos: 'bottom-center'
                        });
                    }
                }
            });
        });
        $('#update_joined_details').click(function (e) { 
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($('#submit_update_joined')[0]);
            $.ajax({
                type: "post",
                url: "{{route('update_joined_update_details')}}",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function (response) {
                    // if(response.data=="Success"){
                        var update_joined_modal = document.getElementById('update_joined_modal')
                        var update_joined_modal = bootstrap.Modal.getInstance(update_joined_modal)
                        update_joined_modal.hide();
                        Snackbar.show({
                            text: 'Joining Details Has Been Updated..',
                            pos: 'bottom-center'
                        });
                    // }
                }
            });
        });
        $("body").bind('copy', function() {
            Snackbar.show({
                text: 'Copied To Clipboard..',
                pos: 'bottom-center'
            });
        });	
        $('#filter').click(function (e) { 
            e.preventDefault();
            $smart_filter_name=$('#smart_filter_name').val();
            if($smart_filter_name.length==0){
                Snackbar.show({
                text: 'Type Atleast 3 Character To Search..',
                pos: 'bottom-center'
            });
            }else if($smart_filter_name.length==1){
                Snackbar.show({
                text: 'Type 2 More Character To Search..',
                pos: 'bottom-center'
            });
            }
            else if($smart_filter_name.length==2){
                Snackbar.show({
                text: 'Type 1 More Character To Search..',
                pos: 'bottom-center'
            });
            }
            else{
                $(this).parents('form').submit();
            }
        });
        $('#smart_filter_name').keypress(function(event){
	
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                event.preventDefault();
                $smart_filter_name=$('#smart_filter_name').val();
            if($smart_filter_name.length==0){
                Snackbar.show({
                text: 'Type Atleast 3 Character To Search..',
                pos: 'bottom-center'
            });
            }else if($smart_filter_name.length==1){
                Snackbar.show({
                text: 'Type 2 More Character To Search..',
                pos: 'bottom-center'
            });
            }
            else if($smart_filter_name.length==2){
                Snackbar.show({
                text: 'Type 1 More Character To Search..',
                pos: 'bottom-center'
            });
            }
            else{
                $(this).parents('form').submit();
            }
            }
        });
        @if (Session::has('remove_success'))
            Snackbar.show({
                text: '{{ Session::get('remove_success') }}',
                pos: 'bottom-center'
            });
        @endif
        
        @if (Session::has('duplicate_candidate'))
            Snackbar.show({
                text: '{{ Session::get('duplicate_candidate') }}',
                pos: 'bottom-center'
            });
            var duplicateCandidateModal = new bootstrap.Modal(document.getElementById('duplicate_candidate_modal'), {
                keyboard: false
            });
            duplicateCandidateModal.show();
        @endif
        
        $('#toggle_check').click(function(e) {
            if ($(this).is(':checked')) {
                $('#mobile_num_field').attr('disabled', true);
                $('#check_email_id').attr('disabled', true);
                $('#valid_btn').attr('disabled', true);
                $('#status_select').attr('disabled', true);
            } else {
                $('#mobile_num_field').attr('disabled', false);
                $('#check_email_id').attr('disabled', false);
                $('#valid_btn').attr('disabled', false);
                $('#status_select').attr('disabled', false);
            }
        });

        function toggleTB() {
            var check2 = document.getElementById("form_Check_email");
            if (check2.checked) {
                document.getElementById('check_email_id').disabled = true;
                // $('#status_select').attr('disabled',true);

            } else {
                document.getElementById('check_email_id').disabled = false;
                // $('#status_select').attr('disabled',false);

            }

        }
        // get modal status radio 


        function createCookie(name, value, days) {
                var expires;
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    expires = "; expires=" + date.toGMTString();
                } else {
                    expires = "";
                }
                document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
            }

            function open_single_call_modal(e) {
            e.preventDefault();
            var callModal = new bootstrap.Modal(document.getElementById('callcandidate'), {
                keyboard: false
            });
            var callValidateModal = new bootstrap.Modal(document.getElementById('callvalidatemodal'), {
                keyboard: false
            });
            var get_current_name = $(e.target).parents('tr').find('.customer_name').text().trim();
            var get_current_phone = $(e.target).parents('tr').find('.phone').text().trim();
            var get_email = $(e.target).parents('tr').find('.email').text().trim();
            var get_name = $(e.target).parents('tr').find('.customer_name').text().trim();
            var filtered_email = "";
            var filtered_name = "";
            if (!(get_email == "NA" || get_email == "" || get_email == null)) {
                filtered_email = get_email;
            }
            if (!(get_name == "Anonymous" || get_name == "" || get_name == null)) {
                filtered_name = get_name;
            }
            $('#caller_name').text($(e.target).parents('tr').find('.customer_name').text().trim());
            $('#validate_name').val($(e.target).parents('tr').find('.customer_name').text().trim());
            $('#check_email_id').val(filtered_email);
            $('#validate_name').val(filtered_name);
            $('#caller_phone').text($(e.target).parents('tr').find('.phone').text().trim());
            // screen_id_modal
            var screen_id = $(e.target).parents('td').prev().val();
            $('#screen_id_modal').val(screen_id);

            var get_resume = $(e.target).parents('td').prev().prev().val();
            if(!get_resume==""){
                $('#hide_previous_resume').addClass("d-none");
                $('#show_ajax_resume').removeClass("d-none");
            }
            var get_candidate_id = $(e.target).parents('td').prev().prev().prev().val();
            $('#candidate_id_val').val(get_candidate_id);
            let find_file_ext = get_resume.indexOf(".pdf");
            if(find_file_ext>0){
                $('#new_ajax_resume').attr('src','{{URL::to('/')}}'+'/candidate_resumes/'+get_resume)
            }else{
                $('#new_ajax_resume').attr('src','https://view.officeapps.live.com/op/embed.aspx?src={{URL::to('/')}}'+'/candidate_resumes/'+get_resume)
            }
            
            $(e.target).parents('body').find('#post_screen_id').val(screen_id)
            $('#drop_candidate').attr("href", '{{ url('/drop-candidate/') }}/' + screen_id)
            $('#drop_candidate_validate').attr("href", '{{ url('/drop-candidate/') }}/' + screen_id)
            $('#proceedBtn').attr("href", '{{ url('/call-candidate-screening/') }}/' + screen_id + '/{{ $job_id }}')

            if (get_current_phone == "NA" || get_current_phone == "") {
                callValidateModal.show();
                var clock = $('.clock').FlipClock({
                    clockFace: 'MinuteCounter',
                });
            } else {
                callModal.show();
            }
        }
        @if (Session::has('reverse_data'))
            var returnCallValidateModal = new bootstrap.Modal(document.getElementById('callcandidate'), {
                keyboard: false
            });
            $('#caller_name').text('{{ Session::get('reverse_data')->candidate_name }}');
            $('#caller_phone').text('{{ Session::get('reverse_data')->candidate_phone }}');
            $('#post_screen_id').val('{{ Session::get('reverse_data')->screen_id }}');
            $('#drop_candidate').attr("href",
                '{{ url('/drop-candidate/') }}/{{ Session::get('reverse_data')->screen_id }}')
            $('#proceedBtn').attr("href",
                '{{ url('/call-candidate-screening/') }}/{{ Session::get('reverse_data')->screen_id }}/{{ $job_id }}'
                )
            returnCallValidateModal.show();
        @endif

        function upload_modal_resume(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($('#resume')[0]);
            $.ajax({
                type: "post",
                url: "{{ route('upload_resume') }}",
                data: formData,
                processData: false, // tell jQuery not to process the data
                contentType: false, // tell jQuery not to set contentType
                success: function(response) {
                    console.log(response)
                    if (response.status == "success") {
                        if (!(response.filename.indexOf(".pdf") > 0)) {

                            $('#new_ajax_resume').attr("src",
                                "https://view.officeapps.live.com/op/embed.aspx?src={{ asset('candidate_resumes') }}/" +
                                response.filename);
                        } else {
                            $('#new_ajax_resume').attr("src", "{{ asset('candidate_resumes') }}/" +
                                response.filename);

                        }
                        $('#hide_previous_resume').addClass("d-none");
                        $('#show_ajax_resume').removeClass("d-none");
                        $('#check_resume_exist').val(response.filename);
                    }
                }
            });
        }
        function remove_candidate_modal(e) {
            e.preventDefault();
            var removeCandidateModal = new bootstrap.Modal(document.getElementById('deleteRecordModal'), {
                keyboard: false
            });
            var candidate_id = $(e.target).parents('tr').find('th').find('input').val();
            $('#delete_candidate').attr("href", '{{ url('/remove-candidate/') }}/' + candidate_id)
            removeCandidateModal.show()

        }
    </script>
    <script>
        $('#customise_network').on('click', function() {
            $('#show_customise_field').css('display', 'block');
        });
        $("#click_pool").on("click", function() {
            $('#click_pool').children('.card').addClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#pool_info').show(300);
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_quality").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').addClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_submitted").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').addClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_progress").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').addClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_noshow").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').addClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_rejected").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').addClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_onhold").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').addClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_duplicate").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').addClass('tab_active')
            $('#all_info').hide();
        });
        $("#click_all").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').show();
        });
        $("#click_selected").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').addClass('tab_active')
            $('#click_joined').children('.card').removeClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#joined_info').hide();
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        $("#click_joined").on("click", function() {
            $('#pool_info').hide();
            $('#candidate_info').hide();
            $('#quality_info').hide();
            $('#submitted_info').hide();
            $('#progress_info').hide();
            $('#noshow_info').hide();
            $('#rejected_info').hide();
            $('#onhold_info').hide();
            $('#selected_info').hide();
            $('#joined_info').show();
            $('#click_pool').children('.card').removeClass('tab_active')
            $('#click_submitted').children('.card').removeClass('tab_active')
            $('#click_quality').children('.card').removeClass('tab_active')
            $('#click_progress').children('.card').removeClass('tab_active')
            $('#click_selected').children('.card').removeClass('tab_active')
            $('#click_joined').children('.card').addClass('tab_active')
            $('#click_noshow').children('.card').removeClass('tab_active')
            $('#click_rejected').children('.card').removeClass('tab_active')
            $('#click_onhold').children('.card').removeClass('tab_active')
            $('#click_duplicate').children('.card').removeClass('tab_active')
            $('#duplicate_info').hide();
            $('#all_info').hide();
        });
        
        //call status
        $('input[type=radio][name=call_status]').change(function() {
            if (this.value == 'Connected') {
                $('#proceedBtn').removeClass("d-none");
                $('#submitBtn').addClass("d-none");
            } else {
                $('#proceedBtn').addClass("d-none");
                $('#submitBtn').removeClass("d-none");
            }
        });
        //dropify
        // $('.dropify').dropify();

        //ADD EXPERIENCE
        $("#employeer_id").on("keyup", function() {
            $("#empl_checkbox").show(300);
        });
        $("#employeer_id").on("keydown", function() {
            $("#empl_checkbox").hide(300);
        });


        $("#empl_btn1").on("click", function() {
            $("#notice_period").show(300);
            $("#duration_to").hide(300);
        })
        $("#empl_btn2").on("click", function() {
            $("#notice_period").hide(300);
            $("#duration_to").show(300);
        });


        $('#add_more_experience').on('click', function() {
            var addexperiencefields = ` <div class="accordion-body pe-0 pt-2 ps-0"id="add_experience_field">

                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Previous Employeer </label>
                                                <span class="text-end" style="float:right">
                                                                        <i class="ri-delete-bin-5-line text-danger"></i>

                                                                    </span>
                                                <input class="form-control" id="employeer_id" type="text" placeholder="">
                                            </div>
                                            
                                            <div class="row mb-2">
                                                <div class="col-lg-12">
                                                    <label for="example-date" class="form-label">Previous Designation </label>
                                                    <input class="form-control" type="text" placeholder="">
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-lg-6">
                                                    <label for="example-date" class="form-label">Duration </label>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <select class="form-select">
                                                                <option selected>Month</option>
                                                                <option value="1">January</option>
                                                                <option value="2">February</option>
                                                                <option value="3">March</option>
                                                                <option value="3">April</option>
                                                                <option value="4">May</option>
                                                                <option value="5">June</option>
                                                                <option value="6">July</option>
                                                                <option value="7">August</option>
                                                                <option value="8">Septmber</option>
                                                                <option value="7">October</option>
                                                                <option value="8">November</option>
                                                                <option value="8">Desember</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <select class="form-select">
                                                                <option value="">Year</option>
                                                                <option value="1">2017</option>
                                                                <option value="2">2018</option>
                                                                <option value="3">2019</option>
                                                                <option value="3">2020</option>
                                                                <option value="3">2021</option>
                                                                <option value="3">2022</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div id="duration_to" >
                                                        <label for="example-date" class="form-label">To </label>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <select class="form-select">
                                                                    <option selected>Month</option>
                                                                    <option value="1">January</option>
                                                                    <option value="2">February</option>
                                                                    <option value="3">March</option>
                                                                    <option value="3">April</option>
                                                                    <option value="4">May</option>
                                                                    <option value="5">June</option>
                                                                    <option value="6">July</option>
                                                                    <option value="7">August</option>
                                                                    <option value="8">Septmber</option>
                                                                    <option value="7">October</option>
                                                                    <option value="8">November</option>
                                                                    <option value="8">Desember</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <select class="form-select">
                                                                    <option value="">Year</option>
                                                                    <option value="1">2017</option>
                                                                    <option value="2">2018</option>
                                                                    <option value="3">2019</option>
                                                                    <option value="3">2020</option>
                                                                    <option value="3">2021</option>
                                                                    <option value="3">2022</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
 
                                                </div>
                                            </div>

                                            <div class="mb-2">
                                                <label for="example-date" class="form-label">Job Profile </label>
                                                <textarea placeholder="Job Profile" name="" id="" class="form-control" cols="5" rows="5"></textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 text-end">
                                                    <button class="btn btn-light btn-border btn-sm" id="add_more_experience"><i class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i> Add More</button>
                                                </div>
                                            </div>

                                            </div>`;
            $('#add_experience_field').append(addexperiencefields);
            $('#add_more_experience').hide();


        });
        //end  
        // add education
        $('#add_more_education').on('click', function() {
            var addeducationfields = ` <div class="accordion-body pe-0 ps-0"id="add_education_field">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <label for="example-date" class="form-label">Qualification </label>
                                                                    <select class="form-select" id="choices-single-no-search" name="choices-single-no-search" data-choices data-choices-search-false data-choices-removeItem>
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
                                                                    <label for="example-date" class="form-label">Specialization </label>
                                                                    <span class="text-end" style="float:right">
                                                                        <i class="ri-delete-bin-5-line text-danger"></i>

                                                                    </span>
                                                                    <select class="form-select" id="choices-single-no-search" name="choices-single-no-search" data-choices data-choices-search-false data-choices-removeItem>
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

                                                                <div class="btn-group btn-group-sm d-flex " role="group" aria-label="Horizontal radio toggle button group">
                                                                    <input type="radio" class="btn-check " name="job_priority" id="vbtn-radio1" value="Hot" checked>
                                                                    <label class="j_priority btn btn-outline-primary p-2" for="vbtn-radio1">Full Time</label>
                                                                    <input type="radio" class="btn-check " name="job_priority" id="vbtn-radio2" value="Normal">
                                                                    <label class="j_priority btn btn-outline-primary p-2" for="vbtn-radio2">Part Time</label>
                                                                    <input type="radio" class="btn-check " name="job_priority" id="vbtn-radio3" value="Bulk">
                                                                    <label class="j_priority btn btn-outline-primary p-2" for="vbtn-radio3">Correspondence/Distance Learning</label>

                                                                </div>


                                                            </div>
                                                        </div>
                                                        <div class="mb-2 mt-1">
                                                            <label for="example-textarea" class="form-label">University/Institute </label>
                                                            <input type="text" class="form-control ">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <label for="example-date" class="form-label">Percentage </label>
                                                                    <input class="form-control" id="example" type="text" placeholder="Percentage %">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="mb-2">
                                                                    <label for="example-date" class="form-label">Year Of Passing </label>
                                                                    <select class="form-select" id="choices-single-no-search" name="choices-single-no-search" data-choices data-choices-search-false data-choices-removeItem>
                                                                        <option value="">Select</option>
                                                                        <option value="1">2019</option>
                                                                        <option value="2">2020</option>
                                                                        <option value="3">2021</option>
                                                                        <option value="3">2022</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12 text-end">
                                                            <button class="btn btn-light btn-border btn-sm"id="add_more_education"><i class="ri-arrow-right-line me-1 fs-15 text-primary align-middle"></i> Add More</button>
                                                            </div>
                                                        </div>
                                                    </div>`;
            $('#add_education_field').append(addeducationfields);
            $('#add_more_education').hide();

        });


        //end
        $('#showaltnum').on('click', function() {
            $('#alt-num-table').toggle(500);
        });
        //add candidate 
        $('#create_manu').on('click', function() {
            $('#add_candidate').modal("hide");
            $('#offcanvasRight').offcanvas("show");
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
    </script>
    <script>
        function checkall(e) {
            $(e.target).parents('thead').next('tbody').find('input[type="checkbox"]').each(function(index, element) {
                element.checked = $(e.target).is(':checked');
            });
        }
        //redirect to specific tab qualitysubmit submitted
        $(document).ready(function() {
            
            // @if(isset($ctab) == 'pool')
            // alert('Pool');
            //     $('a[href="#candidates_tab"]').tab('show')
            //     $('#click_pool').trigger('click');
            // @elseif (isset($ctab) == 'qualitysubmit')
            // alert("quality_submit");
            //     $('a[href="#candidates_tab"]').tab('show')
            //     $('#click_quality').trigger('click');
            // @elseif (isset($ctab) == 'submitted')
            // alert("submitted");
            //     $('a[href="#candidates_tab"]').tab('show')
            //     $('#click_submitted').trigger('click');
            // @endif

            @isset($ctab)
                @if($ctab=="pool")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_pool').trigger('click');
                $('#click_pool').children('.card').addClass('tab_active')

                @endif
                @if($ctab=="qualitysubmit")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_quality').trigger('click');
                $('#click_quality').children('.card').addClass('tab_active')

                @endif
                @if($ctab=="submitted")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_submitted').trigger('click');
                $('#click_submitted').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="inprogress")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_progress').trigger('click');
                $('#click_progress').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="selected")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_selected').trigger('click');
                $('#click_selected').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="joined")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_joined').trigger('click');
                $('#click_joined').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="noshow")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_noshow').trigger('click');
                $('#click_noshow').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="rejected")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_rejected').trigger('click');
                $('#click_rejected').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="onhold")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_onhold').trigger('click');
                $('#click_onhold').children('.card').addClass('tab_active')
                @endif
                @if($ctab=="duplicate")
                $('a[href="#candidates_tab"]').tab('show')
                $('#click_duplicate').trigger('click');
                $('#click_duplicate').children('.card').addClass('tab_active')
                @endif
            @endisset
            

            
        });


        @if (Session::has('success_status_change'))
        var status_changes = new bootstrap.Modal(document.getElementById('status_changes'), {
                keyboard: false
            });
            status_changes.show();
        @endif


        function opencallmodal(e) {
            e.preventDefault()
            var callModal = new bootstrap.Modal(document.getElementById('callcandidate'), {
                keyboard: false
            });
            var editlocationModal = new bootstrap.Modal(document.getElementById('edit_location'), {
                keyboard: false
            });

            var count_call = 0;
            $(e.target).parents('ul').next().next().find('input[type="checkbox"]').each(function(index, element) {
                if (element.checked == true) {
                    count_call++;
                }
            });
            if (count_call == 0) {
                Snackbar.show({
                    text: 'Please Select Atleast One Candidate To Call !',
                    pos: 'bottom-center'
                });
            } else {

                $(e.target).parents('ul').next().next().find('input[type="checkbox"]').each(function(index, element) {
                    if (element.checked == true) {
                        if (element.value == "option") {

                        } else {
                            callModal.show();
                        }

                    }
                });
            }
        }
        // function opencallmodal(e) {
        //     var callModal = new bootstrap.Modal(document.getElementById('callcandidate'), {
        //         keyboard: false
        //     });
        //     var editlocationModal = new bootstrap.Modal(document.getElementById('edit_location'), {
        //         keyboard: false
        //     });

        //     var count_call = 0;
        //     $(e.target).parents('ul').next().next().find('input[type="checkbox"]').each(function(index, element) {
        //         if (element.checked == true) {
        //             count_call++;
        //         }
        //     });
        //     if (count_call == 0) {
        //         Snackbar.show({
        //             text: 'Please Select Atleast One Candidate To Call !',
        //             pos: 'bottom-center'
        //         });
        //     } else {

        //         var bar = new Promise((resolve, reject) => {
        //             $(e.target).parents('ul').next().next().find('input[type="checkbox"]').each((index,
        //             element) => {
        //                 if (element.checked == true) {
        //                     if (!(element.value == "option")) {
        //                         console.log(element.value)
        //                     }
        //                 }
        //                 resolve();
        //             });
        //         });

        //         bar.then(() => {
        //             console.log('All done!');
        //         });
        //     }
        // }
    </script>
@endsection

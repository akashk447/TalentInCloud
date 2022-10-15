@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SHARE</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                            <li class="breadcrumb-item active">Share</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card card-animate mb-2">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img class="rounded-start h-100 img-fluid  object-cover" src="{{asset('assets/images/php-developer-image.png')}}" alt="Card image">
                                </div>
                                <div class="col-md-7">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">PHP Developer</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text fs-12 mb-2">Job Overview We are searching for a professional PHP Developer to join our Development team on an immediate basis. As a PHP Developer, you will be working under our Senior PHP Developer and a team of full-stac...</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <p class="card-text mb-2 fs-13">We are Hiring! Are you the candidate we are looking for? Send your applications to us right away!</p>
                                </div>
                            </div>

                        </div>
                        <div class="card card-animate mb-2">
                            <div class="card-body">
                                <p class="text-muted fs-12 mb-5">Click on below social networks to share this job.</p>
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                            <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                            <a href="apps-mailbox.html" class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                <div class="avatar-title bg-transparent">
                                                    <i class="ri-facebook-fill align-bottom"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                            <img src="{{asset('assets/images/users/avatar-3.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                            <a href="apps-mailbox.html" class="btn btn-info btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                <div class="avatar-title bg-transparent">
                                                    <i class="ri-twitter-fill align-bottom"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                            <img src="{{asset('assets/images/users/avatar-4.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                            <a href="apps-mailbox.html" class="btn btn-danger btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                <div class="avatar-title bg-transparent">
                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                            <img src="{{asset('assets/images/users/avatar-5.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                            <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                <div class="avatar-title bg-transparent">
                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                            <img src="{{asset('assets/images/users/avatar-6.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                            <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                <div class="avatar-title bg-transparent">
                                                    <i class=" ri-linkedin-line align-bottom"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                            <img src="{{asset('assets/images/users/avatar-7.jpg')}}" class="avatar-md rounded-circle " alt="...">
                                            <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
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
                                                    <p class="text-muted">We are Hiring! Are you the candidate we are looking for? Send your applications to us right away!</p>
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
                                                    <p class="text-muted">We are Hiring! Are you the candidate we are looking for? Send your applications to us right away!</p>
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
                                                    <p class="text-muted">We are Hiring! Are you the candidate we are looking for? Send your applications to us right away!</p>
                                                </div>
                                            </div>
                                            <small class="text-muted fs-10">183 characters left</small>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-5">
                                    <div class="col-lg-6 ">
                                        <h6 class="c-pointer" id="customise_network">Customize for each network </h6>
                                    </div>
                                    <div class="col-lg-6 text-lg-end">
                                        <button type="button" class="btn btn-light btn-icon waves-effect me-1"><i class="ri-time-line fs-15"></i></button>
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
                                <p class="card-text mb-2 fs-13">Share this post on your social networks and use the power of your connections to reach a more focused audience.
                                    Click on the respective pages or profiles to share this job on the connected social media networks. You can also post this job at a later date and time using the scheduler.</p>
                            </div>

                        </div>

                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate" id="accordionnesting">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionnestingExample1">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_nestingExamplecollapse1" aria-expanded="false" aria-controls="accor_withouticoncollapse1">
                                        <div class="row mt-2">
                                            <div class="col-lg-2">
                                                <img class="rounded-start img-fluid " src="{{asset('assets/images/php-developer-image.png')}}" width="100%" alt="Card image">
                                            </div>
                                            <div class="col-lg-10">
                                                <h6 class="align-middle d-flex fs-12">How Does Age Verification Work?<i class="ri-checkbox-circle-fill text-info "></i></h6>
                                                <small class="text-muted">2 Month ago</small>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="accor_nestingExamplecollapse1" class="accordion-collapse collapse  " aria-labelledby="accordionnestingExample1" data-bs-parent="#accordionnesting" style="">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                        <div class="avatar-title bg-transparent">
                                                            <i class="ri-facebook-fill align-bottom"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-5.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
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

                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate" id="accordionnesting">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionnestingExample1">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_nestingExamplecollapse2" aria-expanded="false" aria-controls="accor_withouticoncollapse1">
                                        <div class="row mt-2">
                                            <div class="col-lg-2">
                                                <img class="rounded-start img-fluid " src="{{asset('assets/images/php-developer-image.png')}}" width="100%" alt="Card image">
                                            </div>
                                            <div class="col-lg-10">
                                                <h6 class="align-middle d-flex fs-12">How Does Age Verification Work?<i class="ri-checkbox-circle-fill text-info "></i></h6>
                                                <small class="text-muted">2 Month ago</small>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="accor_nestingExamplecollapse2" class="accordion-collapse collapse  " aria-labelledby="accordionnestingExample1" data-bs-parent="#accordionnesting" style="">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-5.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                        <div class="avatar-title bg-transparent">
                                                            <i class=" ri-facebook-line align-bottom"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
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

                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate" id="accordionnesting">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionnestingExample1">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_nestingExamplecollapse3" aria-expanded="false" aria-controls="accor_withouticoncollapse1">
                                        <div class="row mt-2">
                                            <div class="col-lg-2">
                                                <img class="rounded-start img-fluid " src="{{asset('assets/images/php-developer-image.png')}}" width="100%" alt="Card image">
                                            </div>
                                            <div class="col-lg-10">
                                                <h6 class="align-middle d-flex fs-12">How Does Age Verification Work?<i class="ri-checkbox-circle-fill text-info "></i></h6>
                                                <small class="text-muted">2 Month ago</small>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="accor_nestingExamplecollapse3" class="accordion-collapse collapse  " aria-labelledby="accordionnestingExample1" data-bs-parent="#accordionnesting" style="">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                        <div class="avatar-title bg-transparent">
                                                            <i class=" ri-linkedin-line align-bottom"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
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

                        <div class="accordion custom-accordionwithicon accordion-border-box mb-2 card-animate mb-2" id="accordionnesting">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionnestingExample1">

                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_nestingExamplecollapse4" aria-expanded="false" aria-controls="accor_withouticoncollapse1">
                                        <div class="row mt-2">
                                            <div class="col-lg-2">
                                                <img class="rounded-start img-fluid " src="{{asset('assets/images/php-developer-image.png')}}" width="100%" alt="Card image">
                                            </div>
                                            <div class="col-lg-10">
                                                <h6 class="align-middle d-flex fs-12">How Does Age Verification Work?<i class="ri-checkbox-circle-fill text-info "></i></h6>
                                                <small class="text-muted">2 Month ago</small>
                                            </div>
                                        </div>
                                    </button>
                                </h2>
                                <div id="accor_nestingExamplecollapse4" class="accordion-collapse collapse  " aria-labelledby="accordionnestingExample1" data-bs-parent="#accordionnesting" style="">
                                    <div class="accordion-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                        <div class="avatar-title bg-transparent">
                                                            <i class=" ri-linkedin-line align-bottom"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="flex-shrink-0 chat-user-img online align-self-center me-2 ms-0">
                                                <div class="avatar-md mx-auto mb-4 position-relative img-animate">
                                                    <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="avatar-md rounded-circle" alt="...">
                                                    <a href="apps-mailbox.html" class="btn btn-primary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
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
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row  ">
                            <div class="col-lg-6">
                                <button onclick="history.back()" class="btn btn-light btn-border me-3">Back</button>
                            </div>
                            <div class="col-lg-6 text-lg-end">
                                <a href="{{ url('job-advertise-social') }}/{{ $job_id}}"><button class="btn btn-light btn-border me-3">Skip</button></a>
                                <a href="{{ url('job-advertise-social') }}/{{ $job_id}}"><button class="btn btn-primary btn-border">Save &amp; Next</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
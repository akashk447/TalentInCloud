@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <div class="profile-foreground position-relative mx-n4 mt-n4">
            <div class="profile-wid-bg bg-primary">
                <!-- <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" /> -->
            </div>
        </div>
        <div class="pt-4 mb-2 mb-lg-0 ">
            <div class="row g-4">
                <div class="col-auto">
                    <div class="avatar-lg">
                        <img src="{{asset('assets/images/candidate-avatar.jpg')}}" alt="user-img" class="img-thumbnail rounded-circle" />
                    </div>
                </div>
                <!--end col-->
                <div class="col">
                    <div class="p-2">
                        <h3 class="text-white mb-1">{{$get_candidate_details->candidate_name}}</h3>
                        <p class="text-white-75 fs-12">Senior Software Engineer </p>
                        <div class="hstack text-white-50 gap-1">

                            <div class="me-2"><i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Hexaware Technology </div>
                            <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>{{isset($get_candidate_details->candidate_location) && !$get_candidate_details->candidate_location==""?$get_candidate_details->candidate_location:"Not Mentioned"}}</div>
                            <div class="me-2"><i class="ri-calendar-line me-1 text-white-75 fs-16 align-middle"></i>26-04-1995</div>

                        </div>
                    </div>
                </div>
                <!--end col-->
                

            </div>
            <!--end row-->
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-body pt-0 pb-4">

                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="ri-calendar-fill text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Experience Time </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>6 Years</b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="ri-money-cny-circle-fill text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Offered Salary </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>$750 / month</b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class=" ri-genderless-fill text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Gender </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>{{$get_candidate_details->candidate_gender}}</b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="ri-calendar-fill text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Age </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>30-35</b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="mdi mdi-book-education text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Qualification </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>{{isset($get_candidate_details->candidate_high_qual)&& !$get_candidate_details->candidate_high_qual==""?$get_candidate_details->candidate_high_qual:"Not Mentioned"}}</b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="mdi mdi-language-haskell text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Languages </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>{{$get_candidate_details->candidate_language}} </b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="ri-mail-fill text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Email </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>{{$get_candidate_details->candidate_email}}</b></p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 justify-content-start mt-2 mb-2">
                                <div>
                                    <i class="ri-phone-fill text-primary fs-20 align-middle"></i>
                                </div>
                                <div class="mt-2">
                                    <h5 class="fs-14 text-muted mb-0"><b>Phone Number </b></h5>
                                    <p class="text-primary mb-0 fs-12"><b>{{$get_candidate_details->candidate_phone}}</b></p>
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Social Profiles</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <div>
                                    <a href="javascript:void(0);" class="avatar-xs d-block">
                                        <span class="avatar-title rounded-circle fs-16 bg-primary text-light">
                                            <i class="ri-facebook-fill"></i>
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="avatar-xs d-block">
                                        <span class="avatar-title rounded-circle fs-16 bg-info">
                                            <i class="ri-twitter-fill"></i>
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="avatar-xs d-block">
                                        <span class="avatar-title rounded-circle fs-16 bg-danger">
                                            <i class="ri-instagram-fill"></i>
                                        </span>
                                    </a>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="avatar-xs d-block">
                                        <span class="avatar-title rounded-circle fs-16 bg-secondary">
                                            <i class="ri-linkedin-fill"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-body ">
                            <h5 class="card-title mb-3">Skills</h5>
                            <div class="d-flex flex-wrap gap-2 fs-15">
                                <a href="javascript:void(0);" class="badge badge-soft-primary">Photoshop</a>
                                <a href="javascript:void(0);" class="badge badge-soft-primary">illustrator</a>
                                <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                <a href="javascript:void(0);" class="badge badge-soft-primary">Javascript</a>
                                <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                            </div>
                        </div><!-- end card body -->
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center d-flex border-bottom-dashed">
                            <h4 class="card-title mb-0 flex-grow-1">JD &amp; Attachments</h4>
                            <div class="flex-shrink-0">
                                <button type="button" class="btn btn-soft-info btn-sm"><i class="ri-upload-2-fill me-1 align-bottom"></i> Upload</button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="d-flex gap-2 justify-content-between mb-3 border rounded border-dashed p-2">
                                <div class="d-flex gap-2 justify-content-start">
                                    <div class="avatar-xs">
                                        <span class="avatar-title badge-soft-primary text-primary rounded fs-10">
                                            Doc
                                        </span>
                                    </div>

                                    <div class="text-muted ">
                                        <small class="fs-12 fw-bold">Ubold-sketch-design.doc</small>
                                        <p class="mb-0 fs-10">2.3 MB</p>
                                    </div>
                                </div>
                                <div>
                                    <i class="ri-arrow-down-circle-line text-primary fs-18  align-middle" title="Download"></i>
                                </div>
                            </div>
                            <div class="d-flex gap-2 justify-content-between border rounded border-dashed p-2">
                                <div class="d-flex gap-2 justify-content-start">
                                    <div class="avatar-xs">
                                        <span class="avatar-title badge-soft-primary text-primary rounded fs-10">
                                            Word
                                        </span>
                                    </div>

                                    <div class="text-muted ">
                                        <small class="fs-12 fw-bold">Ubold-sketch.word</small>
                                        <p class="mb-0 fs-10">2.3 MB</p>
                                    </div>
                                </div>
                                <div>
                                    <i class="ri-arrow-down-circle-line text-primary fs-18  align-middle" title="Download"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-body">
                            <iframe src="{{asset('candidate_resumes')}}/{{$get_candidate_details->candidate_resume}}" width="100%" height="755px"></iframe>
                            <!-- <h5 class="card-title mb-3">About</h5>
                            <p class="fs-13 font-f-h line-h text-muted">
                                Hello my name is Nicole Wells and web developer from Portland. In pharetra orci dignissim, blandit mi semper, ultricies diam. Suspendisse malesuada suscipit nunc non volutpat. Sed porta nulla id orci laoreet tempor non consequat enim. Sed vitae aliquam velit. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam.
                            </p>
                            <p class="fs-13 font-f-h line-h text-muted">
                                Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum aliquam. Mauris nec erat ut libero vulputate pulvinar.
                            </p> -->

                        </div>
                    </div>

                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0  me-2">Details</h4>
                            <div class="flex-shrink-0 ms-auto">
                                <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#today" role="tab" aria-selected="true">
                                            Education
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#workexp" role="tab" aria-selected="false">
                                            Work & Experience
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#awards" role="tab">
                                            Awards
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="today" role="tabpanel">
                                    <div class="profile-timeline">
                                        <div class="accordion accordion-flush" id="todayExample">
                                            <div class="accordion-item border-0">
                                                <div class="accordion-header" id="headingOne">
                                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseOne" aria-expanded="true">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-xs">
                                                                <div class="avatar-title bg-light text-primary rounded-circle">
                                                                    B
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="fs-14 mb-1">
                                                                    Bachlors in Fine Arts <span class="badge bg-soft-primary text-primary align-middle">2012 - 2016</span>
                                                                </h6>
                                                                <small class="text-muted">Modern College</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body ms-2 ps-5">
                                                        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item border-0">
                                                <div class="accordion-header" id="headingTwo">
                                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapseTwo" aria-expanded="false">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-xs">
                                                                <div class="avatar-title bg-light text-primary rounded-circle">
                                                                    C
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="fs-14 mb-1">
                                                                    Computer Science <span class="badge bg-soft-primary text-primary align-middle">2016 - 2018</span>
                                                                </h6>
                                                                <small class="text-muted">Harvard University</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body ms-2 ps-5">
                                                        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end accordion-->
                                    </div>
                                </div>
                                <div class="tab-pane" id="workexp" role="tabpanel">
                                    <div class="profile-timeline">
                                        <div class="accordion accordion-flush" id="weeklyExample">
                                            <div class="accordion-item border-0">
                                                <div class="accordion-header" id="heading6">
                                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse6" aria-expanded="true">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-xs">
                                                                <div class="avatar-title bg-light text-primary rounded-circle">
                                                                    W
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="fs-14 mb-1">
                                                                    Web Designer <span class="badge bg-soft-primary text-primary align-middle">May 5, 2018 - May 6, 2019</span>
                                                                </h6>
                                                                <small class="text-muted">TCB Studio</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="collapse6" class="accordion-collapse collapse show" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body ms-2 ps-5">
                                                        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item border-0">
                                                <div class="accordion-header" id="heading7">
                                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse7" aria-expanded="false">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-xs">
                                                                <div class="avatar-title bg-light text-primary rounded-circle">
                                                                    U
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="fs-14 mb-1">
                                                                    UX Engineer <span class="badge bg-soft-primary text-primary align-middle">May 5, 2020 - May 8, 2021</span>
                                                                </h6>
                                                                <small class="text-muted">Dropbox Inc.</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="collapse7" class="accordion-collapse collapse show" aria-labelledby="heading6" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body ms-2 ps-5">
                                                        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end accordion-->
                                    </div>
                                </div>
                                <div class="tab-pane" id="awards" role="tabpanel">
                                    <div class="profile-timeline">
                                        <div class="accordion accordion-flush" id="monthlyExample">
                                            <div class="accordion-item border-0">
                                                <div class="accordion-header" id="heading11">
                                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse11" aria-expanded="false">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-xs">
                                                                <div class="avatar-title bg-light text-primary rounded-circle">
                                                                    P
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="fs-14 mb-1">
                                                                    Perfect Attendance Programs <span class="badge bg-soft-primary text-primary align-middle">2018 - 2019</span>
                                                                </h6>

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="collapse11" class="accordion-collapse collapse show" aria-labelledby="heading11" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body ms-2 ps-5">
                                                        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item border-0">
                                                <div class="accordion-header" id="heading12">
                                                    <a class="accordion-button p-2 shadow-none" data-bs-toggle="collapse" href="#collapse12" aria-expanded="true">
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 avatar-xs">
                                                                <div class="avatar-title bg-light text-primary rounded-circle">
                                                                    T
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 ms-3">
                                                                <h6 class="fs-14 mb-1">
                                                                    Top Performer Recognition <span class="badge bg-soft-primary text-primary align-middle">2018 - 2019</span>
                                                                </h6>

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div id="collapse12" class="accordion-collapse collapse show" aria-labelledby="heading12" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body ms-2 ps-5">
                                                        Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer vehicula rhoncus molestie.
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end accordion-->
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div>

                </div>
            </div>

        </div>

    </div>
    <!--end col-->
</div>
@endsection
@section('script')
<!-- aos js -->
<script src="{{asset('assets/libs/aos/aos.js')}}"></script>
<!-- prismjs plugin -->
<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>
<!-- animation init -->
<script src="{{asset('assets/js/pages/animation-aos.init.js')}}"></script>
@endsection
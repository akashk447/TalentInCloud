@extends('admin.layout.layout')
@section('main_content')
<div class="page-content pt-75">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div data-aos="zoom-in">
                    <div class="card mb-2 card-animate">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <p class="text-muted mb-0 fs-12">
                                        <b>75 </b> Found, from candidates active in last 6 months
                                    </p>
                                    <p class="text-muted mb-0 fs-12">
                                        You searched Option of : Keywoard - <b>ss</b>,
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                     
                                        <ul class="pagination pagination-md pagination-separated justify-content-end mb-0">
                                            <li class="page-item disabled">
                                                <a href="#" class="page-link">← Previous</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">1</a>
                                            </li>
                                            <li class="page-item active">
                                                <a href="#" class="page-link">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a href="#" class="page-link">3</a>
                                            </li>
                                            
                                            <li class="page-item">
                                                <a href="#" class="page-link">Next →</a>
                                            </li>
                                        </ul>
                                   

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xl-3">
                <div data-aos="zoom-in">
                    <div class="card">
                        <div class="card-body ">
                            <div class="d-flex align-items-center mb-3">

                                <div class="flex-grow-1">
                                    <div class="">
                                        <h5 class="fs-20 mb-1 text-muted"> <span class="me-2"><i class="ri-filter-2-line fs-25 text-muted align-middle"></i></span>Smart Filter </h5>

                                    </div>
                                </div>
                                <div class="flex-shrink-0 ms-2">
                                    <div class="form-check form-switch form-switch-right form-switch-md">
                                        <label for="form-grid-showcode" class="form-label text-muted font-11"></label>
                                        <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-1">
                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                        <span class="input-group-text"><i class="ri-search-line fs-15"></i></span>

                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <label for="form-grid-showcode" class="form-label text-muted font-11"></label>
                                                <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">

                                            </div>
                                            <small class="text-muted ms-1 fs-13">Show Archived</small>
                                        </div>
                                        <div class="flex-shrink-0 ">
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionlefticonExample1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#candidate_owner" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse1">
                                                    Candidate Owner
                                                </button>
                                            </h2>
                                            <div id="candidate_owner" class="accordion-collapse collapse " aria-labelledby="accordionlefticonExample1" data-bs-parent="#accordionlefticon" style="">
                                                <div class="accordion-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Nibedita Sahoo</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
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
                                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionlefticonExample1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#candidate_rating" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse1">
                                                    Rating
                                                </button>
                                            </h2>
                                            <div id="candidate_rating" class="accordion-collapse collapse " aria-labelledby="accordionlefticonExample1" data-bs-parent="#accordionlefticon" style="">
                                                <div class="accordion-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <div id="basic-rater" dir="ltr"></div>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-5-circle text-primary fs-18 align-middle me-2"></i>
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
                                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionlefticonExample1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#candidate_source" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse1">
                                                    Source
                                                </button>
                                            </h2>
                                            <div id="candidate_source" class="accordion-collapse collapse " aria-labelledby="accordionlefticonExample1" data-bs-parent="#accordionlefticon" style="">
                                                <div class="accordion-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Indeed</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-2-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">LinkedIn</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-2-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Monster</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
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
                                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionlefticonExample1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#candidate_location" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse1">
                                                    Location
                                                </button>
                                            </h2>
                                            <div id="candidate_location" class="accordion-collapse collapse " aria-labelledby="accordionlefticonExample1" data-bs-parent="#accordionlefticon" style="">
                                                <div class="accordion-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Bhubaneswar</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Cuttack</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-4-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Sambalpur</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-3-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">Balasore</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-4-circle text-primary fs-18 align-middle me-2"></i>
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
                                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionlefticonExample1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#candidate_education" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse1">
                                                    Education
                                                </button>
                                            </h2>
                                            <div id="candidate_education" class="accordion-collapse collapse " aria-labelledby="accordionlefticonExample1" data-bs-parent="#accordionlefticon" style="">
                                                <div class="accordion-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">+2 Arts</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">10th</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">BCA</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h5 class="text-muted fs-15">MCA</h5>
                                                        </div>
                                                        <div class="flex-shrink-0 ">
                                                            <i class="mdi mdi-numeric-1-circle text-primary fs-18 align-middle me-2"></i>
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
                                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="accordionlefticonExample1">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#candidate_attributes" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse1">
                                                    Custom Attributes
                                                </button>
                                            </h2>
                                            <div id="candidate_attributes" class="accordion-collapse collapse " aria-labelledby="accordionlefticonExample1" data-bs-parent="#accordionlefticon" style="">
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
            </div>

            <div class="col-xl-9">
                <div data-aos="zoom-in">
                    <div class="card ">
                        <div class="card-header">
                            <div class="row g-3">
                                <div class="col-xl-1 col-sm-4 pe-0">
                                    <div class="form-check fs-15">
                                        <input class="form-check-input mt-2" type="checkbox" id="formCheck6">
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 ps-0">
                                    <div>
                                        <select class="form-control  " data-choices data-choices-search-false name="choices-single-default" id="idPayment">
                                            <option value="">Select Payment</option>
                                            <option value="all" selected>All</option>
                                            <option value="Mastercard">Mastercard</option>
                                            <option value="Paypal">Paypal</option>
                                            <option value="Visa">Visa</option>
                                            <option value="COD">COD</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-4 ps-0">
                                    <div>
                                        <select class="form-control  " data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                            <option value="">Status</option>
                                            <option value="all" selected>All</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Pickups">Pickups</option>
                                            <option value="Returns">Returns</option>
                                            <option value="Delivered">Delivered</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-sm-4">
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-6">
                                            <button type="button" class="btn btn-primary w-100 mb-1"> </i>
                                                Add to Job
                                            </button>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <button type="button" class="btn btn-primary w-100 mb-1"> </i>
                                                Back to Job
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            @foreach ($get_cloud_candidates as $candidate)
                                
                            <div data-aos="zoom-in">
                                <div class="card ribbon-box card-animate mb-2" style="box-shadow: 9px 4px 45px rgb(56 65 74 / 15%);">
                                    <!-- <div class="ribbon ribbon-primary ribbon-shape top-80 start-0 z-999">Primary</div> -->
                                    <div class="card-body p-2">

                                        <div class="row g-4">
                                            <div class="col-auto pe-0">
                                                <div class="form-check fs-15">
                                                    <input class="form-check-input mt-2" type="checkbox" id="formCheck6">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-lg-auto ps-0 text-center">
                                                <div class="avatar-md mx-auto mb-3 position-relative img-animate">
                                                    <img src="{{asset('assets/images/candidate-avatar.jpg')}}" class="avatar-md rounded-circle" alt="..." width="100%">
                                                    <a href="#" class="btn btn-secondary btn-xs position-absolute bottom-0 end-0 rounded-circle avatar-xs">
                                                        <div class="avatar-title bg-transparent">
                                                            <i class=" ri-linkedin-line align-bottom" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="Linked In"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="badge rounded-pill bg-success mb-2 ">
                                                    <i class="mdi mdi-star"></i> 4.2
                                                </div>

                                            </div>
                                            <!--end col-->
                                            <div class="col ps-0 ">
                                                <div class="p-2 cand-info">
                                                    
                                                    <a href="{{ route('view_candidate', ['cankey'=>$candidate->candidate_key]) }}" class="">
                                                    <h3 class="text-primary mb-1">{{$candidate->candidate_name}} <span class="badge rounded-pill bg-info fs-10 align-middle p-1 ps-2 pe-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="" data-bs-original-title="DOB: 24-05-1998">25 Years</span></h3>
                                                    </a>
                                                    <div class="hstack gap-2 flex-wrap mb-2 cand-info">
                                                        <div class="me-2">
                                                            <i class="ri-phone-line me-1 text-muted fs-12 align-middle"></i><span class="text-muted fs-12">+91 {{$candidate->candidate_phone}} </span>
                                                        </div>
                                                        <div class="me-2">
                                                            <i class="ri-mail-line me-1 text-muted fs-12 align-middle"></i><span class="text-muted fs-12">{{$candidate->candidate_email}}</span>
                                                        </div>
                                                        <div class="me-2 fs-12 text-muted"><i class="ri-map-pin-user-line me-1 text-muted fs-12 align-middle"></i>{{$candidate->candidate_location}}</div>

                                                    </div>
                                                    <div class="hstack  gap-1 mb-2">
                                                        <div class="text-muted fs-11"><b> B.tech Electrical Engineer Currently/Resigned </b> as <b>Project Manager (6 Yrs) </b>at <b>IBM </b>having all Overally Experience <b>15yrs</b> in 3 Companies.</div>

                                                    </div>
                                                    <div class="d-flex flex-wrap gap-2 fs-16 cand-info">
                                                        <div class="badge fw-medium badge-soft-secondary">UI/UX</div>
                                                        <div class="badge fw-medium badge-soft-secondary">Figma</div>
                                                        <div class="badge fw-medium badge-soft-secondary">HTML</div>
                                                        <div class="badge fw-medium badge-soft-secondary">CSS</div>
                                                        <div class="badge fw-medium badge-soft-secondary">Javascript</div>
                                                        <div class="badge fw-medium badge-soft-secondary">C#</div>
                                                        <div class="badge fw-medium badge-soft-secondary">Nodejs</div>
                                                    </div>

                                                </div>

                                            </div>

                                            <!--end col-->

                                            <div class="col-12 col-lg-auto order-last order-lg-0">
                                                <div class="row text text-primary-50  ">

                                                    <div class="col-lg-12  text-center">

                                                        <div class="p-2">
                                                            <i class="ri-calendar-line me-2 text-muted fs-12 align-middle text-muted"></i><span class="text-muted">26-04-1995</span>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 ">
                                                    <div class="d-flex gap-3 align-items-center">
                                                        <div class="score_card">
                                                            <div class="score_card_value">
                                                                <span>0</span>
                                                                <label>Score</label>
                                                            </div>
                                                            <canvas height="50" width="50"></canvas>
                                                        </div>
                                                        <div class="score_card">
                                                            <div class="score_card_value">
                                                                <span>0</span>
                                                                <label>Score</label>
                                                            </div>
                                                            <canvas height="50" width="50"></canvas>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-lg-12  text-center">

                                                    <div class="p-2">
                                                        <a href="#" class="btn btn-light view-btn">View Profile</a>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                        </div>

                                    </div>
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
@endsection
@section('script')
 <!-- rater-js plugin -->
 <script src="{{asset('assets/libs/rater-js/index.js')}}"></script>
 <!-- rating init -->
 <script src="{{asset('assets/js/pages/rating.init.js')}}"></script>
<!-- aos js -->
<script src="{{asset('assets/libs/aos/aos.js')}}"></script>
<!-- prismjs plugin -->
<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>
<!-- animation init -->
<script src="{{asset('assets/js/pages/animation-aos.init.js')}}"></script>
@endsection
<div class="modal fade zoomIn" id="callvalidatemodal" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-body p-0" style="overflow-x: hidden">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="profile-foreground position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg">
                                <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt=""
                                    class="profile-wid-img" />
                            </div>
                        </div>
                        <div class="pt-3 ">
                            <div class="row g-4">
                                <div class="col-auto">
                                    <div class="">
                                        <img src="{{ asset('assets/images/companies/amazon.png') }}" alt=""
                                            class="avatar-sm rounded-3">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col">
                                    <div class="">
                                        <h3 class="text-white mb-1 fs-15">{{ $job_details->job_title }} </h3>
                                        <p class="text-white-75 "> <i
                                                class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{ $job_details->job_company_name }}<i
                                                class="ri-map-pin-user-line ms-2 me-1 text-white-75 fs-16 align-middle"></i>{{ $job_details->job_location }}
                                        </p>

                                    </div>
                                </div>
                                <div class="col text-end ">
                                    <div class="d-flex align-items-center">
                                        <div class="p-1 start-44 top-100 position-absolute translate-middle">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="clock"></div>
                                             </div>
                                        </div>
                                        <div class="position-absolute start-96 top-45 translate-middle">
                                            <span class="text-white fs-40 c-pointer" data-bs-dismiss="modal"><i
                                                    class="ri-close-line"></i></span>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-8">
                                <div class="card" id="hide_previous_resume">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="{{ asset('assets/robot gif/1.gif') }}" alt="" class="img-fluid "
                                                width="50%">
                                            <h2 class="text-primary font-w-500 mb-4">Resume Not found</h2>
                                            <form action="{{ route('upload_resume') }}" method="post" id="resume"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="file" class="filepond" multiple data-max-file-size="3MB"
                                                    data-max-files="1" name="file[]" id="ajaxfile">
                                                <input type="hidden" name="candidate_id" id="candidate_id_val"
                                                    value="">
                                                <button type="button" class="d-none" id="upload_ajax_resume">dasd</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card d-none" id="show_ajax_resume">
                                    <div class="card-body">
                                        <iframe id="new_ajax_resume"
                                            src="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('candidate_resumes') }}/"
                                            width="100%" height="775px"></iframe>
            
                                    </div>
                                    <input type="hidden" name="check_resume_exist" id="check_resume_exist" value="">
                                </div>


                            </div>
                            <div class="col-lg-4">

                                <div class="card mb-2  "style="box-shadow: 9px 4px 45px rgb(56 65 74 / 15%);">
                                    <div class="card-body">
                                        
                                        <form class="form-horizontal" method="POST" action="{{route('call_validate_modal_post')}}">
                                            @csrf
                                            <input type="hidden" name="job_id_modal" value="{{ $job_id }}">
                                            <input type="hidden" name="screen_id_modal" id="screen_id_modal">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h4 class="text-muted">
                                                        Validate Email Address
                                                    </h4>
                                                </div>
                                                <div class="col-lg-4">

                                                </div>
                                            </div>
                                            <hr>
                                            <div class=" mb-4">
                                                <label for="inputEmail3" class="form-label"> Name </label>
                                                <input type="text" class="form-control" name="modal_candidate_name" required id="validate_name">
                                            </div>
                                            <div class=" mb-4">

                                                <div class="align-items-center d-flex me-3">
                                                    <div class="flex-grow-1">
                                                        <label for="inputEmail3" class="form-label"> Mobile No.</label>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <label for="form-grid-showcode"
                                                                class="form-label text-muted fs-11"><b>Don't have Mobile no ?</b> </label>
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="toggle_check"
                                                                 data-bs-toggle="tooltip" title="Don't have Mobile no ?">
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control mb-1"
                                                    placeholder="Phone Number" maxlength="10" required name="modal_candidate_mobile" id="mobile_num_field">

                                            </div>
                                            <div class=" mb-4">
                                                <div class="align-items-center d-flex me-3">
                                                    <div class="flex-grow-1">
                                                        <label for="inputEmail3" class="form-label"> Email ID</label>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="form-check form-switch form-switch-right mb-2">
                                                            <label for="form-grid-showcode"
                                                                class="form-label text-muted fs-11"><b>Don't have Email
                                                                    Id ?</b> </label>
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="form_Check_email"
                                                                onClick="toggleTB()" data-bs-toggle="tooltip" title="Don't have Email Id ?">
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="email" class="form-control mb-1" placeholder="Email Id" id="check_email_id" required name="modal_candidate_email">
                                            </div>
                                            



                                       
                                    </div>
                                </div>
                                <div class="card "style="box-shadow: 9px 4px 45px rgb(56 65 74 / 15%);">
                                    <div class="card-body p-4">
                                        <div class=" d-flex align-items-center justify-content-center">

                                            <div class="bd-highlight me-3">
                                                <a  id="drop_candidate_validate">
                                                <button type="button" id="view_question" name="drop_candidate"
                                                    class="btn btn-danger btn-border ">Drop Candidate</button>
                                                </a>
                                            </div>
                                            <div class="bd-highlight">
                                                <button type="submit"
                                                    class="btn btn-primary btn-border w-lg"id="valid_btn">Validate &
                                                    Proceed</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>




                            </div>
                            <div class="col-lg-12">
                                <div
                                    class="card card-animate mb-0"style="box-shadow: 9px 4px 45px rgb(56 65 74 / 15%);">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"><i
                                                class=" ri-file-copy-line text-muted fs-17 align-middle"></i> Activity
                                            (1)</h4>
                                        <div class="flex-shrink-0">
                                            <div class="dropdown card-header-dropdown">
                                                <a class="text-reset dropdown-btn" href="#"
                                                    data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
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

                                    <div class="card-body pb-0">

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
                                                                <div class="d-flex">
                                                                    <div class="flex-shrink-0">
                                                                        <img src="{{asset('assets/images/profile-bg.jpg')}}"
                                                                            alt=""
                                                                            class="avatar-xs rounded-circle">
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3 align-items-center">
                                                                        <h5 class="fs-13">Joseph Parker <small
                                                                                class="text-muted ms-2"><i
                                                                                    class="ri-time-line text-muted align-middle fs-13"></i>
                                                                                05:47AM</small></h5>
                                                                        <p class="text-muted">I am getting message from
                                                                            customers that when they place order always
                                                                            get error message .</p>

                                                                    </div>
                                                                    <div class="flex-grow-1 ">
                                                                        <p class="text-end text-muted ">Connected</p>
                                                                    </div>
                                                                </div>
                                                                

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
                        </div>

                    </div>
                    <div class="text-center ">
                        <button type="button" class="btn btn-light w-lg text-primary "data-bs-dismiss="modal">Close
                            Window</button>

                    </div>
                </div>

            </div>
        </div>
        <!--end col-->
    </div>


</div>

@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt="" class="profile-wid-img" />
                </div>
            </div>
            <div data-aos="zoom-in">
                <div class="pt-3 ">
                    <div class="row g-4">
                        <div class="col-auto">
                            <div class="">
                                <img src="{{ asset('assets/images/candidate-avatar.jpg') }}" alt=""
                                    class="avatar-sm rounded-3">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col">
                            <div class="">
                                <h3 class="text-white mb-1 fs-15">{{ $get_job_details->job_title }}</h3>
                                <p class="text-white-75 "> <i
                                        class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>{{ $get_job_details->job_company_name }}<i
                                        class="ri-map-pin-user-line ms-2 me-1 text-white-75 fs-16 align-middle"></i>{{ $get_job_details->job_location }}
                                </p>

                            </div>
                        </div>
                        <div class="col-auto">
                            @if (isset($prev_candidate->screen_id))
                               
                           <a href="{{ route('view_pool_candidate', ['jobcode'=>$get_job_details->job_code,'screenid' => $prev_candidate->screen_id,'innertab'=>$inner_tab,'key'=>bin2hex(random_bytes(32))]) }}"><button type="button" class="btn btn-secondary waves-effect waves-light me-2" data-bs-toggle="tooltip" title="Previous"><span><i class=" ri-arrow-left-line fs-13 align-middle me-2"></i>Prev</span></button></a> 
                           @else
                           <button disabled type="button" class="btn btn-success waves-effect waves-light me-2" data-bs-toggle="tooltip" title="Next"><span>Next<i class=" ri-arrow-right-line fs-13 align-middle ms-2"></i></span></button>
                           @endif
                            
                           @if (isset($next_candidate->screen_id))
                               
                           <a href="{{ route('view_pool_candidate', ['jobcode'=>$get_job_details->job_code,'screenid' => $next_candidate->screen_id,'innertab'=>$inner_tab,'key'=>bin2hex(random_bytes(32))]) }}"><button type="button" class="btn btn-success waves-effect waves-light me-2" data-bs-toggle="tooltip" title="Next"><span>Next<i class=" ri-arrow-right-line fs-13 align-middle ms-2"></i></span></button></a> 
                           @else
                           <button disabled type="button" class="btn btn-success waves-effect waves-light me-2" data-bs-toggle="tooltip" title="Next"><span>Next<i class=" ri-arrow-right-line fs-13 align-middle ms-2"></i></span></button>
                           @endif
                       
                        </div>
                        <div class="col text-lg-end ">
                            <a href="{{route('manage_jobs')}}"> <button type="button" 
                                class="btn btn-info  waves-effect waves-light me-2" data-bs-toggle="tooltip"
                                title="Go Back"><span><i
                                        class="ri-arrow-go-back-fill fs-13 align-middle"></i></span></button></a>
                            @if ($get_candidate_details->screen_status=="Submitted To Quality")
                            <button type="button" disabled class="btn btn-light btn-animation waves-effect waves-light me-2"
                            data-text="Share JD & Call" data-bs-toggle="tooltip" title="Share JD & Call"><span><i
                                    class="ri-share-forward-fill me-2 fs-13 align-middle"></i>Share &
                                Call</span></button>
                            <button type="button" disabled class="btn btn-info btn-animation waves-effect waves-light"
                                data-text="Call Now" data-bs-toggle="tooltip" title="Call Now"><span><i
                                        class="ri-phone-fill me-2 fs-13 align-middle"></i>Call Now</span></button>
                            @else
                            
                            <a href="{{ route('view_pool_candidate_call_jdshare', ['screenid' => $get_candidate_details->screen_id,'key'=>bin2hex(random_bytes(32))]) }}">
                            <button type="button" class="btn btn-light btn-animation waves-effect waves-light me-2"
                                data-text="Share JD & Call" data-bs-toggle="tooltip" title="Share JD & Call"><span><i
                                        class="ri-share-forward-fill me-2 fs-13 align-middle"></i>Share &
                                    Call</span></button></a>
                            <a href="{{ route('view_pool_candidate_call', ['screenid' => $get_candidate_details->screen_id,'key'=>bin2hex(random_bytes(32))]) }}">
                                <button type="button" class="btn btn-info btn-animation waves-effect waves-light"
                                    data-text="Call Now" data-bs-toggle="tooltip" title="Call Now"><span><i
                                            class="ri-phone-fill me-2 fs-13 align-middle"></i>Call Now</span></button></a>
                            @endif


                        </div>

                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-8">
                    <div data-aos="zoom-in">
                        <div class="card" id="hide_previous_resume">
                            @if ($get_candidate_details->candidate_resume == '' || $get_candidate_details->candidate_resume == null)
                                <div class="card-body">


                                    <div class="text-center">
                                        <img src="{{ asset('assets/robot gif/1.gif') }}" alt="" class="img-fluid "
                                            width="50%">
                                        <h2 class="text-primary font-w-500 mb-4">Resume Not found</h2>
                                        <form action="{{ route('upload_resume') }}" method="post" id="submit_resume"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" class="filepond" multiple data-max-file-size="3MB"
                                                data-max-files="1" name="file[]" id="ajaxfile">
                                            <input type="hidden" name="candidate_id"
                                                value="{{ $get_candidate_details->candidate_id }}">
                                            <button type="button" class="d-none" id="upload_ajax_resume">dasd</button>
                                        </form>
                                    </div>


                                </div>
                            @else
                                <div class="card-body">
                                    @if (!strpos($get_candidate_details->candidate_resume, '.pdf'))
                                        <iframe
                                            src="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('candidate_resumes') }}/{{ $get_candidate_details->candidate_resume }}"
                                            width="100%" height="775px"></iframe>
                                    @elseif (strpos($get_candidate_details->candidate_resume, '.rtf'))
                                        {{-- new div for dowload resume  --}}
                                    @else
                                        <iframe
                                            src="{{ asset('candidate_resumes') }}/{{ $get_candidate_details->candidate_resume }}"
                                            width="100%" height="775px"></iframe>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="card d-none" id="show_ajax_resume">
                            <div class="card-body">
                                <iframe id="new_ajax_resume"
                                    src="https://view.officeapps.live.com/op/embed.aspx?src={{ asset('candidate_resumes') }}/{{ $get_candidate_details->candidate_resume }}"
                                    width="100%" height="775px"></iframe>

                            </div>
                            <input type="hidden" name="check_resume_exist" id="check_resume_exist"
                                value="{{ $get_candidate_details->candidate_resume }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div data-aos="zoom-in">
                        <div class="card mb-2 card-animate" id="screnning_form">
                            <div class="card-body pt-0 pb-4">
                                <div class="row mb-3 mt-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-user-3-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0"><b>Name </b></h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_name }}</b></p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-phone-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0"><b>Mobile No </b></h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_phone }}</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-mail-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Email ID </h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_email }}</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-calendar-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Date of Birth </h5>
                                        <p class="text-primary mb-0 fs-12"><b>{{ $get_candidate_details->candidate_dob }}
                                                (25 Years)</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="mdi mdi-book-education text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Qualification</h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_high_qual }}</b></p>

                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="mdi mdi-book-education text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Speclization</h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_specialization }}</b></p>

                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="mdi mdi-book-education text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">University / Type</h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_course_type }}</b></p>

                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="mdi mdi-book-education text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Passing Year / Percentage</h5>
                                        <p class="text-primary mb-0 fs-12">
                                            <b>{{ $get_candidate_details->candidate_passing_year }} /
                                                {{ $get_candidate_details->candidate_percentage }}%</b></p>

                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class=" ri-user-2-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Employer </h5>
                                        <p class="text-primary mb-0 fs-12"><b>Quacklabs Technology Private Limted.</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class=" ri-user-2-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Designation </h5>
                                        <p class="text-primary mb-0 fs-12"><b>Software Engineer </b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class=" ri-user-2-fill text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Duration </h5>
                                        <p class="text-primary mb-0 fs-12"><b>March 2021 - Till Date (5.4 Years)</b></p>
                                        <p class="text-primary mb-0 fs-12"><b>Currently Serving Notice - LWD:
                                                12-Aug-2022</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-pantone-line text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Pan card </h5>
                                        <p class="text-primary mb-0 fs-12"><b>SQH234HT45</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-pantone-line text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Adhar Card </h5>
                                        <p class="text-primary mb-0 fs-12"><b>4444 5555 7777</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-pantone-line text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Votor ID </h5>
                                        <p class="text-primary mb-0 fs-12"><b>VKID-3001789</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class="ri-roadster-line text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Driving Licence </h5>
                                        <p class="text-primary mb-0 fs-12"><b>OD-A-33764534234</b></p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-auto pe-0">
                                        <i class=" ri-profile-line text-primary fs-20 align-middle"></i>
                                    </div>
                                    <div class="col ps-2">
                                        <h5 class="fs-14 text-muted mb-0">Pass Port </h5>
                                        <p class="text-primary mb-0 fs-12"><b>6798-8976-8987-8987-87</b></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1"><i
                                    class=" ri-file-copy-line text-muted fs-17 align-middle"></i> Activity
                                ({{ count($get_history) }})</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted">Recent<i class="mdi mdi-chevron-down ms-1"></i></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="">
                                        <a class="dropdown-item" href="#">Recent</a>
                                        <a class="dropdown-item" href="#">Top Rated</a>
                                        <a class="dropdown-item" href="#">Previous</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">


                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                <div class="simplebar-content" style="height:auto;max-height:200px;">

                                    @foreach ($get_history as $candidate_history)
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                @if (Auth::user()->profile_image == '')
                                                    <img src="{{ asset('assets/images/profile-bg.jpg') }}" alt=""
                                                        class="avatar-xs rounded-circle">
                                                @else
                                                    <img src="{{ asset('profile_image') }}/{{ Auth::user()->profile_image }}"
                                                        alt="" class="avatar-xs rounded-circle">
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3 align-items-center">
                                                <h5 class="fs-13">{{ $candidate_history->user_name }} <small
                                                        class="text-muted ms-2"><i
                                                            class="ri-time-line text-muted align-middle fs-13"></i>
                                                        {{ date('d-M-Y', strtotime($candidate_history->date)) }}
                                                        {{ $candidate_history->time }}</small></h5>
                                                <p class="text-muted fs-11">{{ $candidate_history->activity_notes }} .</p>

                                            </div>
                                            <div class="flex-grow-1 ">
                                                <p class="text-end text-muted fs-11">
                                                    {{ $candidate_history->activity_type }}</p>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>



                        </div>
                        <!-- end card body -->
                    </div>
                </div>

            </div>
            <div class="col-lg-12">
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-body">
                            <div class="text-center">
                                <button type="button" onclick="history.back()"
                                    class="btn btn-light btn-border w-lg">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/libs/aos/aos.js') }}"></script>
    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <!-- animation init -->
    <script src="{{ asset('assets/js/pages/animation-aos.init.js') }}"></script>
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
                $('#upload_ajax_resume').trigger("click");
            },
            // onprocessfiles:()=>console.log("files"),

        });
    </script>
    <script>
        //RESUME POST 
        $('#upload_ajax_resume').click(function(e) {
            // e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var formData = new FormData($('#submit_resume')[0]);
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
        });
    </script>
    <script>
        function generate_token() {
            //edit the token allowed characters
            var a = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".split("");
            var b = [];
            for (var i = 0; i < 32; i++) {
                var j = (Math.random() * (a.length - 1)).toFixed(0);
                b[i] = a[j];
            }
            return b.join("");
        }
    </script>
@endsection

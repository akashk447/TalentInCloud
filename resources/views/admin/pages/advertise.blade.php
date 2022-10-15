@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">ADVERTISE</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                            <li class="breadcrumb-item active">Add a Job</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/facebook-careers-tab.png')}}" class="img-fluid rounded-circle job-board-img" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Your personalized mobile friendly careers site hosted on Jobsoid to showcase your talent brand.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/facebook-careers-tab.png')}}" class="img-fluid rounded-circle job-board-img" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Job openings displayed on your company Website with the Website Integration plugin.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/website-careers-page.png')}}" class="img-fluid rounded-circle job-board-img" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Job openings displayed on your company Facebook page with the Career Tab integration plugin.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
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
                                        <img src="{{asset('assets/images/indeed.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Indeed.com is a global Job search engine available in over 60 countries and 28 languages
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/monster.png')}}" class="img-fluid rounded-circle" width="50%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Monster.com is a leading global employment solution available in around 40 countries that connects employers to their prospective candidates.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/glassdoor.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Glassdoor one of the fastest growing Job board with millions of company reviews, salary reports etc.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/linkedin.png')}}" class="img-fluid rounded-circle" width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Limited Listings are free job postings visible to active candidates when they search for jobs on LinkedIn.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/ziprecruiter.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Organic version of ZipRecruiter job search engine which circulates job postings to over 50+ job boards.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/adzuna.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Adzuna is a job search engine based in the UK, operating websites in over 11 countries.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/careerjet.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Careerjet is a leading search engine available in 90 countries and 28 languages.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/jooble.png')}}" class="img-fluid rounded-circle" width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Jooble is a job search engine available in over 60 countries worldwide.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/trovit.png')}}" class="img-fluid rounded-circle" width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Trovit is a classifieds search engine available in over 51 countries worldwide.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/jobrapido.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Job Rapido is a global job aggregator headquartered in Milan, reaching out to 58 countries.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/jobisjob.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            JobisJob is a search engine for job offers available in over 25 countries.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/mercadojobs.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Mercadojobs is a global job board with over 7 million unique visitors every month.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/jobomas.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Jobomas is a leading job site in Latin America with 21 M registered users, also available globally.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/drjobs.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            DrJobs is a premium job search engine in GCC & Asian Countries.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/jora.png')}}" class="img-fluid rounded-circle " width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Jora is a worldwide job search aggregator in almost every continent around the globe.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/neuvoo.png')}}" class="img-fluid rounded-circle" width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Neuvoo is a job posting site available in over 65 countries worldwide.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/gigajob.png')}}" class="img-fluid rounded-circle" width="60%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Gigajobs is an international job search platform operating in about 140 countries across the world.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                    <div class="col-md-6 col-xl-3 mb-3">
                        <div class="widget-rounded-circle card job-board-card-new card-animate">
                            <div class="card-body job-board-card">
                                <div class="align-items-center job-board-content">
                                    <div class="img-hover">
                                        <img src="{{asset('assets/images/upward.png')}}" class="img-fluid rounded-circle" width="45%" alt="user-img">
                                    </div>
                                    <div class="content-text ms-1 me-1">
                                        <small class="text-muted">
                                            Upward.net is a leading job board that is connected to over 100+ job sites for better job promotions.
                                        </small>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="button" class="btn btn-sm btn-light job-board-btn-default waves-effect waves-light"> Publish</button>
                                </div>
                            </div>

                        </div>
                    </div> <!-- end col-->

                </div>

            </div>
            <div class="row mt-3">
                <div class="col-lg-12 text-center mb-2">
                <button onclick="history.back()" class="btn btn-light btn-border me-3">Back</button>
                    <a href="{{route('manage_jobs')}}"><button class="btn btn-primary btn-border">Finish Posting</button></a>
                </div>
            </div>
        </div> 

    </div>
</div>
@endsection
@section('script')
<!-- quill js -->
<script src="{{asset('assets/libs/quill/quill.min.js')}}"></script>

<!-- init js -->
<script src="{{asset('assets/js/pages/form-editor.init.js')}}"></script>
@endsection
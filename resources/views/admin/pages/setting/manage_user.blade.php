@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">MANAGE USERS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-2">
                                        <div class="col-sm-4">
                                            <div class="search-box">
                                                <input type="text" class="form-control"
                                                    placeholder="Search for name, tasks, projects or something...">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-sm-auto ms-auto">
                                            <div class="list-grid-nav hstack gap-1">
                                                <button type="button" id="grid-view-button"
                                                    class="btn btn-soft-info nav-link btn-icon fs-14 active filter-button"><i
                                                        class="ri-grid-fill"></i></button>
                                                <button type="button" id="list-view-button"
                                                    class="btn btn-soft-info nav-link  btn-icon fs-14 filter-button"><i
                                                        class="ri-list-unordered"></i></button>
                                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                                    aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i
                                                        class="ri-more-2-fill"></i></button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                                    <li><a class="dropdown-item" href="#">All</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Week</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Month</a></li>
                                                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                                                </ul>
                                                <button class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#addmembers"><i
                                                        class="ri-add-fill me-1 align-bottom"></i> Add Members</button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div>
                                        <div class="team-list grid-view-filter row">
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-9.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Administrator</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite1"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite1" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);" id="dropdownMenuLink2"
                                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink2">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img ">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-2.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
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
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">197</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="{{ Route('view_profile') }}"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-12.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Manager</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite12"
                                                                                class="bookmark-input bookmark-hide"
                                                                                checked />
                                                                            <label for="favourite12" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink3"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink3">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <div
                                                                            class="avatar-title bg-soft-danger text-danger rounded-circle">
                                                                            HB
                                                                        </div>
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Henry Baird</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Full Stack Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">225</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">197</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-11.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite2"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite2" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink4"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink4">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-3.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
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
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">182</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-1.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Partner</span></span>

                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite3"
                                                                                class="bookmark-input bookmark-hide"
                                                                                checked>
                                                                            <label for="favourite3" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink5"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink5">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-8.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Jennifer Carter</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">UI/UX Designer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">241</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">204</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-10.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Clients</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite4"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite4" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink6"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink6">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <div
                                                                            class="avatar-title bg-soft-success text-success rounded-circle">
                                                                            ME
                                                                        </div>
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Megan Elmore</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Team Leader & Web
                                                                            Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">201</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">263</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-2.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite6"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite6" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink7"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink7">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-4.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
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
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">147</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-4.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite9"
                                                                                class="bookmark-input bookmark-hide"
                                                                                checked />
                                                                            <label for="favourite9" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink8"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink8">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <div
                                                                            class="avatar-title bg-soft-info text-info rounded-circle">
                                                                            NC
                                                                        </div>
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Nathan Cole</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Front-End Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">225</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">197</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-7.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite7"
                                                                                class="bookmark-input bookmark-hide"
                                                                                checked>
                                                                            <label for="favourite7" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink9"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink9">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-6.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Joseph Parker</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Full Stack Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">64</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">93</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-3.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite8"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite8" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink10"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink10">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-5.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Erica Kernan</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Web Designer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">345</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">298</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-5.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite10"
                                                                                class="bookmark-input bookmark-hide"
                                                                                checked>
                                                                            <label for="favourite10" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink11"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink11">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <div
                                                                            class="avatar-title border bg-light text-primary rounded-circle">
                                                                            DP
                                                                        </div>
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Donald Palmer</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Wed Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">97</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">135</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-8.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite5"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite5" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink12"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink12">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <img src="assets/images/users/avatar-7.jpg"
                                                                            alt=""
                                                                            class="img-fluid d-block rounded-circle" />
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Jack Gough</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">React Js Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">87</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">121</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col">
                                                <div class="card team-box">
                                                    <div class="team-cover">
                                                        <img src="assets/images/small/img-6.jpg" alt=""
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="card-body p-4">
                                                        <span class="ribbon-three ribbon-three-info "><span
                                                                class="fs-10 mt-1">Recruiter</span></span>
                                                        <div class="row align-items-center team-row">
                                                            <div class="col team-settings">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <div class="bookmark-icon flex-shrink-0 me-2">
                                                                            <input type="checkbox" id="favourite11"
                                                                                class="bookmark-input bookmark-hide">
                                                                            <label for="favourite11" class="btn-star">
                                                                                <svg width="20" height="20">
                                                                                    <use xlink:href="#icon-star" />
                                                                                </svg>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col text-end dropdown">
                                                                        <a href="javascript:void(0);"
                                                                            id="dropdownMenuLink13"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            <i class="ri-more-fill fs-17"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                                            aria-labelledby="dropdownMenuLink13">
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                            </li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="javascript:void(0);"><i
                                                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="team-profile-img">
                                                                    <div
                                                                        class="avatar-lg img-thumbnail rounded-circle flex-shrink-0">
                                                                        <div
                                                                            class="avatar-title bg-soft-success text-success rounded-circle">
                                                                            MW
                                                                        </div>
                                                                    </div>
                                                                    <div class="team-content">
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="#offcanvasExample"
                                                                            aria-controls="offcanvasExample">
                                                                            <h5 class="fs-16 mb-1">Marie Ward</h5>
                                                                        </a>
                                                                        <p class="text-muted mb-0">Backend Developer</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-4 col">
                                                                <div class="row text-muted text-center">
                                                                    <div class="col-6 border-end border-end-dashed">
                                                                        <h5 class="mb-1">145</h5>
                                                                        <p class="text-muted mb-0">Jobs Associated</p>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <h5 class="mb-1">210</h5>
                                                                        <p class="text-muted mb-0">Candidates</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-lg-2 col">
                                                                <div class="text-end">
                                                                    <a href="view-profile.php"
                                                                        class="btn btn-light view-btn">View Profile</a>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                                                </div>
                                                <!--end card-->
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="text-center mb-3">
                                                    <a href="javascript:void(0);" class="text-success"><i
                                                            class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>
                                                        Load More </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->

                                        <!-- Modal -->
                                        <div class="modal fade" id="addmembers" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="myModalLabel">Add New Members</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-muted fs-12">Discover the power of collaborative
                                                            hiring. The Beginner Plan allows you to have just one user
                                                            account. To add more users, kindly upgrade to a higher plan.<a
                                                                href="#" class="text-info"> Learn more</a> about
                                                            managing users.</p>
                                                        <form>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="teammembersName"
                                                                            class="form-label">First Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="teammembersName" placeholder="Enter name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="teammembersName"
                                                                            class="form-label">Last Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="teammembersName" placeholder="Enter name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-3">
                                                                        <label for="designation"
                                                                            class="form-label">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            id="designation" placeholder="Enter Email">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="totalProjects"
                                                                            class="form-label">Mobile</label>
                                                                        <div class="input-group flex-nowrap">
                                                                            <span class="input-group-text"
                                                                                id="addon-wrapping"><i
                                                                                    class="ri-phone-line fs-15 text-primary"></i></span>
                                                                            <input type="text"
                                                                                class="form-control form-control-icon"
                                                                                id="pf_contact_person"
                                                                                placeholder="+91 8917550895 "
                                                                                value="+91">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="mb-3">
                                                                        <label for="totalTasks"
                                                                            class="form-label">Role</label>
                                                                        <div class="input-group">
                                                                            <label class="input-group-text"
                                                                                for="inputGroupSelect01"><i
                                                                                    class="ri-shield-user-line fs-15 text-primary"></i></label>
                                                                            <select class="form-select"
                                                                                id="inputGroupSelect01">
                                                                                <option selected>Administrator</option>
                                                                                <option value="1">Account Manager
                                                                                </option>
                                                                                <option value="1">Recruiter</option>
                                                                                <option value="1">Vendor Partner
                                                                                </option>
                                                                                <option value="1">Clients</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="mb-4">
                                                                        <label for="formFile" class="form-label">Profile
                                                                            Image</label>
                                                                        <input class="form-control" type="file"
                                                                            id="formFile">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="hstack gap-2 justify-content-end">
                                                                        <button type="button" class="btn btn-light"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-success">Add
                                                                            Member</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!--end modal-content-->
                                            </div>
                                            <!--end modal-dialog-->
                                        </div>
                                        <!--end modal-->

                                        <div class="offcanvas offcanvas-end border-0" tabindex="-1"
                                            id="offcanvasExample">
                                            <!--end offcanvas-header-->
                                            <div class="offcanvas-body profile-offcanvas p-0">
                                                <div class="team-cover">
                                                    <img src="assets/images/small/img-9.jpg" alt=""
                                                        class="img-fluid" />
                                                </div>
                                                <div class="p-3">
                                                    <div class="team-settings">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="bookmark-icon flex-shrink-0 me-2">
                                                                    <input type="checkbox" id="favourite13"
                                                                        class="bookmark-input bookmark-hide">
                                                                    <label for="favourite13" class="btn-star">
                                                                        <svg width="20" height="20">
                                                                            <use xlink:href="#icon-star" />
                                                                        </svg>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col text-end dropdown">
                                                                <a href="javascript:void(0);" id="dropdownMenuLink14"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <i class="ri-more-fill fs-17"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end"
                                                                    aria-labelledby="dropdownMenuLink14">
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-eye-line me-2 align-middle"></i>View</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-star-line me-2 align-middle"></i>Favorites</a>
                                                                    </li>
                                                                    <li><a class="dropdown-item"
                                                                            href="javascript:void(0);"><i
                                                                                class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <div class="p-3 text-center">
                                                    <img src="assets/images/users/avatar-2.jpg" alt=""
                                                        class="avatar-lg img-thumbnail rounded-circle mx-auto">
                                                    <div class="mt-3">
                                                        <h5 class="fs-15"><a href="javascript:void(0);"
                                                                class="link-primary">Nancy Martino</a></h5>
                                                        <p class="text-muted">Team Leader & HR</p>
                                                    </div>
                                                    <div class="hstack gap-2 justify-content-center mt-4">
                                                        <div class="avatar-xs">
                                                            <a href="javascript:void(0);"
                                                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                                                <i class="ri-facebook-fill"></i>
                                                            </a>
                                                        </div>
                                                        <div class="avatar-xs">
                                                            <a href="javascript:void(0);"
                                                                class="avatar-title bg-soft-success text-success rounded fs-16">
                                                                <i class="ri-slack-fill"></i>
                                                            </a>
                                                        </div>
                                                        <div class="avatar-xs">
                                                            <a href="javascript:void(0);"
                                                                class="avatar-title bg-soft-info text-info rounded fs-16">
                                                                <i class="ri-linkedin-fill"></i>
                                                            </a>
                                                        </div>
                                                        <div class="avatar-xs">
                                                            <a href="javascript:void(0);"
                                                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                                                <i class="ri-dribbble-fill"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row g-0 text-center">
                                                    <div class="col-6">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1">124</h5>
                                                            <p class="text-muted mb-0">Jobs Associated</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-6">
                                                        <div class="p-3 border border-dashed border-start-0">
                                                            <h5 class="mb-1">81</h5>
                                                            <p class="text-muted mb-0">Candidates</p>
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                                <div class="p-3">
                                                    <h5 class="fs-15 mb-3">Personal Details</h5>
                                                    <div class="mb-3">
                                                        <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Number
                                                        </p>
                                                        <h6>+(256) 2451 8974</h6>
                                                    </div>
                                                    <div class="mb-3">
                                                        <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Email
                                                        </p>
                                                        <h6>nancymartino@email.com</h6>
                                                    </div>
                                                    <div>
                                                        <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">
                                                            Location</p>
                                                        <h6 class="mb-0">Carson City - USA</h6>
                                                    </div>
                                                </div>
                                                <div class="p-3 border-top">
                                                    <h5 class="fs-15 mb-4">File Manager</h5>
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-shrink-0 avatar-xs">
                                                            <div
                                                                class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                                                <i class="ri-image-2-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1"><a href="javascript:void(0);">Images</a>
                                                            </h6>
                                                            <p class="text-muted mb-0">4469 Files</p>
                                                        </div>
                                                        <div class="text-muted">
                                                            12 GB
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-shrink-0 avatar-xs">
                                                            <div
                                                                class="avatar-title bg-soft-secondary text-secondary rounded fs-16">
                                                                <i class="ri-file-zip-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1"><a href="javascript:void(0);">Documents</a>
                                                            </h6>
                                                            <p class="text-muted mb-0">46 Files</p>
                                                        </div>
                                                        <div class="text-muted">
                                                            3.46 GB
                                                        </div>
                                                    </div>
                                                    <div class="d-flex mb-3">
                                                        <div class="flex-shrink-0 avatar-xs">
                                                            <div
                                                                class="avatar-title bg-soft-success text-success rounded fs-16">
                                                                <i class="ri-live-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1"><a href="javascript:void(0);">Media</a>
                                                            </h6>
                                                            <p class="text-muted mb-0">124 Files</p>
                                                        </div>
                                                        <div class="text-muted">
                                                            4.3 GB
                                                        </div>
                                                    </div>
                                                    <div class="d-flex">
                                                        <div class="flex-shrink-0 avatar-xs">
                                                            <div
                                                                class="avatar-title bg-soft-primary text-primary rounded fs-16">
                                                                <i class="ri-error-warning-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1"><a href="javascript:void(0);">Others</a>
                                                            </h6>
                                                            <p class="text-muted mb-0">18 Files</p>
                                                        </div>
                                                        <div class="text-muted">
                                                            846 MB
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end offcanvas-body-->
                                            <div
                                                class="offcanvas-foorter border p-3 hstack gap-3 text-center position-relative">
                                                <button class="btn btn-light w-100"><i
                                                        class="ri-question-answer-fill align-bottom ms-1"></i> Send
                                                    Message</button>
                                                <a href="view-profile.php" class="btn btn-primary w-100"><i
                                                        class="ri-user-3-fill align-bottom ms-1"></i> View Profile</a>
                                            </div>
                                        </div>
                                        <!--end offcanvas-->
                                    </div>
                                </div><!-- end col -->
                            </div>

                            <!--end row-->
                        </div>

                    </div>


                </div>
            </div>



        </div>
    </div>
@endsection
@section('script')
@endsection

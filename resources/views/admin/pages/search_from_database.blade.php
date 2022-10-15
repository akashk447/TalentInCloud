@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">SEARCH FROM DATABASE</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Manage Jobs</a></li>
                            <li class="breadcrumb-item active">Form Database</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Advanced Search</h4>
                            <div class="flex-shrink-0">
                                <div class="form-check form-switch form-switch-right form-switch-md">
                                    <label for="form-grid-showcode" class="form-label text-muted font-11">Boolean</label>
                                    <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode">
                                </div>
                            </div>
                        </div>

                        <div class="card-body mb-3">

                            <div class="code-view d-none">
                                <form action="javascript:void(0);" class="g-3">
                                    <div>
                                        <label for="exampleFormControlTextarea5" class="form-label">Boolean Search</label>
                                        <textarea placeholder="More Power ! Try Something Like : (Java OR J2EE) And PHP Not Css" class="form-control" id="exampleFormControlTextarea5" rows="7"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="live-preview ">
                                <form action="javascript:void(0);" class="row g-3">
                                    <div class="col-md-2">
                                        <label for="fullnameInput" class="form-label">Search in :</label>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">

                                            <div class="col-md-5">
                                                <div class="form-check form-radio-primary">
                                                    <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5" checked="">
                                                    <label class="form-check-label" for="formradioRight5">
                                                        Resume Title & Key Skills
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-radio-primary  ">
                                                    <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5" checked="">
                                                    <label class="form-check-label" for="formradioRight5">
                                                        Resume Synopsis
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-check form-radio-primary  ">
                                                    <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5" checked="">
                                                    <label class="form-check-label" for="formradioRight5">
                                                        Entire Resume
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <label for="labelInput" class="form-label">Any keywords</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" id="fullnameInput" placeholder="Type Any Of Keywords">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="labelInput" class="form-label">All mandatory keywords</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" id="inputEmail4" placeholder="All The Keyword">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <label for="labelInput" class="form-label">Exclude keywords</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control" id="inputPassword4" placeholder="Excluding Keywords">
                                        </div>
                                    </div>




                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="labelInput" class="form-label"> Experience Level </label>

                                        <div class="input-group">
                                            <input type="number" class="form-control" aria-label="Username">
                                            <span class="input-group-text ">Yrs</span>
                                            <input type="number" class="form-control" aria-label="Server">
                                            <span class="input-group-text" disabled="">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label for="labelInput" class="form-label"> Annual Salary From</label>

                                        <div class="input-group">
                                            <input type="number" class="form-control" aria-label="Username" placeholder="100,000">
                                            <span class="input-group-text ">From</span>
                                            <input type="number" class="form-control" aria-label="Server" placeholder="200,000">
                                            <span class="input-group-text" disabled="">Upto</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="search_location">
                    <div class="card mb-2 mt-1">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Locations
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates by their current, preferred or both types of location</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <div class="form-check mb-3">
                                <input class="form-check-input" id="form-check-input" type="checkbox" id="formCheck6">
                                <label class="form-check-label" for="formCheck6">
                                    At any Location
                                </label>
                            </div>
                            <div class="search-box mb-3" id="search_box">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                            <div class="mb-3" id="prefer_location">
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate"><i class=" ri-map-pin-user-line label-icon align-middle rounded-pill fs-16 me-2"></i>Add Prefered Location</button>
                            </div>
                            <div class="bg-light p-1 " id="prefer_location_field" style="display:none">
                                <div class="align-items-center d-flex mb-3">
                                    <div class="ps-1 flex-grow-1 mb-0">
                                        <label class="form-check-label" for="formCheck6">
                                            Preferred locations
                                        </label>
                                        <p class="text-muted fs-11 mb-0">Filter and find candidates who are willing to relocate</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <i class="ri-delete-back-2-fill fs-20 text-primary close-field c-pointer"></i>
                                    </div>
                                </div>

                                <div class="search-box mb-3 ">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_noticeperiod">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Notice Period
                                <p class="text-muted fs-11 mb-0 mt-1">You can define the maximum duration of notice period</p>
                            </h4>


                        </div>
                        <div class="card-body">

                            <div class="row justify-content-center mt-3">
                                <div class="col-lg-2">
                                    <div class="card-title fs-10 text-center text-muted">Immediate</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="immediate" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="immediate">
                                            <div class="count-num text-center text-muted fs-20"> 0 </div>
                                        </label>
                                    </div>


                                </div>
                                <div class="col-lg-2">
                                    <div class="card-title fs-10 text-center text-muted">Upto 15 days</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="upto_15_days" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="upto_15_days">
                                            <div class="count-num text-center text-muted fs-20"> 15 </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="card-title fs-10 text-center text-muted">Upto 30 days</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="upto_30_days" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="upto_30_days">
                                            <div class="count-num text-center text-muted fs-20"> 30 </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2">
                                    <div class="card-title fs-10 text-center text-muted">Upto 45 days</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="upto_45_days" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="upto_45_days">
                                            <div class="count-num text-center text-muted fs-20"> 45 </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2">
                                    <div class="card-title fs-10 text-center text-muted">Upto 2 Months</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="upto_2_months" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="upto_2_months">
                                            <div class="count-num text-center text-muted fs-20"> 2m </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-2">
                                    <div class="card-title fs-10 text-center text-muted">Upto 3 Months</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="upto_3_months" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="upto_3_months">
                                            <div class="count-num text-center text-muted fs-20"> 3m </div>
                                        </label>
                                    </div>

                                </div>
                                <div class="form-check mb-2 mt-2 ms-4">
                                    <input class="form-check-input" type="checkbox" id="formCheck6" checked="">
                                    <label class="form-check-label" for="formCheck6">
                                        Also include profiles who did not update notice period
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div data-aos="zoom-in" style="display:none" id="add_function_roles">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Function & Roles
                                <p class="text-muted fs-11 mb-0 mt-1">Filter profiles by a function or a specific role within a function</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <select class="form-select">
                                <option selected="">Function & Roles</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_citizenship">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Citizenship
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates by their citizenship, permanent residency or work permits</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <select class="form-select">
                                <option selected="">Search...</option>
                                <option selected="">Indian</option>
                                <option selected="">German</option>
                                <option selected="">Mexico</option>
                                <option selected="">Australian</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_industry">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Industry
                                <p class="text-muted fs-11 mb-0 mt-1">You can define industries that candidates have worked in or are currently working in</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <select class="form-select">
                                <option selected="">SEARCH...</option>
                                <option selected="">IT/COMPUTERS-SOFTWARE</option>
                                <option selected="">TELECOM</option>
                                <option selected="">CONSTRUCTION & ENGINEERING</option>
                                <option selected="">EDUCATION</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_education">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Education
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates by their area of study, specialisation or degree from any institution</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <select class="form-select">
                                    <option selected="">Select UG Qualification</option>
                                    <option>Bachelor Of Arts</option>
                                    <option value="1">Bachelor Of Architecture</option>
                                    <option value="2">Bachelor Of Commerce </option>
                                    <option value="3">Bachelor Of Technology</option>

                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-2">
                                    <div class="form-check form-radio-primary ">
                                        <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5" checked="">
                                        <label class="form-check-label" for="formradioRight5">
                                            and
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check form-radio-primary  ">
                                        <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5">
                                        <label class="form-check-label" for="formradioRight5">
                                            or
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">

                                <select class="form-select">
                                    <option selected="">Select PG Qualification</option>
                                    <option>Bachelor Of Arts</option>
                                    <option value="1">Bachelor Of Architecture</option>
                                    <option value="2">Bachelor Of Commerce </option>
                                    <option value="3">Bachelor Of Technology</option>

                                </select>
                            </div>
                            <div class="mb-3" id="ppg_qualification_btn">
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light ">+ Add PPG/Doctorate qualification</button>
                            </div>
                            <div style="display:none" id="add_ppg_qualification">
                                <div class="row mb-3">
                                    <div class="col-lg-2">
                                        <div class="form-check form-radio-primary ">
                                            <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5" checked="">
                                            <label class="form-check-label" for="formradioRight5">
                                                and
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-check form-radio-primary  ">
                                            <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5">
                                            <label class="form-check-label" for="formradioRight5">
                                                or
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">

                                    <select class="form-select">
                                        <option selected="">Select PPG Qualification</option>
                                        <option>Bachelor Of Arts</option>
                                        <option value="1">Bachelor Of Architecture</option>
                                        <option value="2">Bachelor Of Commerce </option>
                                        <option value="3">Bachelor Of Technology</option>

                                    </select>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_age">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Age
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates by defining an age grou</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="labelInput" class="form-label">Minimum</label>
                                    <select class="form-select">
                                        <option selected="">18 Years</option>
                                        <option value="1">20 Years</option>
                                        <option value="2">21 Years </option>
                                        <option value="3">22 Years</option>

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="labelInput" class="form-label">Maximum</label>
                                    <select class="form-select">
                                        <option selected="">20 Years</option>
                                        <option value="1">22 Years</option>
                                        <option value="2">23 Years</option>
                                        <option value="3">24 Years</option>

                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_gender">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Gender
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates based on Gender</p>
                            </h4>


                        </div>
                        <div class="card-body ">
                            <div class="row d-flex justify-content-center align-items-center mt-3 ">
                                <div class="col-lg-3">

                                    <div class="card-title fs-15 text-center text-muted">Men</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="men" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="men">
                                            <div class="count-num text-center text-muted "><i class="ri-men-line fs-25"></i></div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card-title fs-15 text-center text-muted">Women</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="women" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="women">
                                            <div class="count-num text-center text-muted "><i class=" ri-women-line fs-25"></i></div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="card-title fs-15 text-center text-muted">TransGender</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="TransGender" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="TransGender">
                                            <div class="count-num text-center text-muted "><i class="ri-travesti-line fs-25"></i></div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-3">
                                    <div class="card-title fs-15 text-center text-muted">Any</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="Any" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border border-none" for="Any">
                                            <div class="count-num text-center text-muted "><i class=" ri-genderless-line fs-25"></i></div>
                                        </label>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_company">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Company
                                <p class="text-muted fs-11 mb-0 mt-1">You can include or exclude profiles who is a current, a past employee or both for any company</p>
                            </h4>


                        </div>
                        <div class="card-body ">
                            <div class="mb-3">
                                <label for="basiInput" class="form-label">Include <span class="text-muted">(Select value from the list or press enter to add)</span></label>
                                <select class="form-select">
                                    <option selected="">Type To search this List</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="basiInput" class="form-label">Exclude <span class="text-muted">(Select value from the list or press enter to add)</span></label>
                                <select class="form-select">
                                    <option selected="">Type To search this List</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_designation">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Designation

                            </h4>


                        </div>
                        <div class="card-body ">
                            <p class="text-muted fs-11">You can search for profiles having Current designation, Previous designation or either Current or Previous designation" as per the selection. Select a value from the list or press enter to add new.</p>
                            <div class="mb-3">
                                <label for="basiInput" class="form-label">Include <span class="text-muted">(Select value from the list or press enter to add)</span></label>
                                <select class="form-select">
                                    <option selected="">Type To search this List</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_job_type">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Job type
                                <p class="text-muted fs-11 mb-0 mt-1">Filter profiles that have a preference for the type of work</p>
                            </h4>


                        </div>
                        <div class="card-body ">
                            <div class="row d-flex justify-content-center align-items-center mt-3 ">
                                <div class="col-lg-4">

                                    <div class="card-title fs-15 text-center text-muted">Permanent Full time</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="full_time" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="full_time">
                                            <div class="count-num text-center text-muted "><i class="ri-time-line fs-25"></i></div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Permanent Part time</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="part_time" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="part_time">
                                            <div class="count-num text-center text-muted "><i class="ri-timer-2-line fs-25"></i></div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Contract</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="contract" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="contract">
                                            <div class="count-num text-center text-muted "><i class=" ri-money-dollar-box-line fs-25"></i></div>
                                        </label>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_language">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Languages
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates by languages that they know</p>
                            </h4>


                        </div>
                        <div class="card-body ">
                            <div class="mb-3">
                                <select class="form-select">
                                    <option selected="">Choose...</option>
                                    <option selected="">Eglish</option>
                                    <option selected="">Hindi</option>
                                    <option selected="">Odia</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-2">
                                    <div class="form-check form-radio-primary ">
                                        <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5" checked="">
                                        <label class="form-check-label" for="formradioRight5">
                                            and
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check form-radio-primary  ">
                                        <input class="form-check-input" type="radio" name="formradiocolor1" id="formradioRight5">
                                        <label class="form-check-label" for="formradioRight5">
                                            or
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <select class="form-select">
                                    <option selected="">Choose...</option>
                                    <option selected="">Eglish</option>
                                    <option selected="">Hindi</option>
                                    <option selected="">Odia</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_differently_abled">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Differently abled
                                <p class="text-muted fs-11 mb-0 mt-1">Monster celebrates your company's decision to take affirmative actions</p>
                            </h4>


                        </div>
                        <div class="card-body ">
                            <div class="row d-flex justify-content-center align-items-center mt-3 ">
                                <div class="col-lg-4">

                                    <div class="card-title fs-15 text-center text-muted">Developmental</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="developmental" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="developmental">
                                            <div class="count-num text-center text-muted "><i class="ri-emotion-line fs-25"></i></div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Mental</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="mental" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="mental">
                                            <div class="count-num text-center text-muted "><i class="ri-user-5-line fs-25"></i></div>
                                        </label>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Physical</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="physical" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="physical">
                                            <div class="count-num text-center text-muted "><i class=" ri-riding-line fs-25"></i></div>
                                        </label>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_us_visa">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">US visa status
                                <p class="text-muted fs-11 mb-0 mt-1">Filter candidates by their work authorisation or citizenship for United States of America</p>
                            </h4>


                        </div>
                        <div class="card-body">

                            <div class="row justify-content-center mt-3">
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Have H1 Visa</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="have_h1" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="have_h1">
                                            <div class="count-num text-center text-muted fs-20">H1</div>
                                        </label>
                                    </div>


                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Have L1 Visa</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="have_l1" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="have_l1">
                                            <div class="count-num text-center text-muted fs-20">L1</div>
                                        </label>
                                    </div>
                  

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">TN Permit Holder</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="permit_holder" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="permit_holder">
                                            <div class="count-num text-center text-muted fs-20">TN</div>
                                        </label>
                                    </div>
                                    

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Green Card Holder</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="card_holder" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="card_holder">
                                            <div class="count-num text-center text-muted"><i class=" ri-bank-card-line fs-20 text-muted"></i></div>
                                        </label>
                                    </div>
                                    

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">US Citizen</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="us_citizen" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="us_citizen">
                                            <div class="count-num text-center text-muted"><i class="ri-building-2-line fs-20 text-muted"></i></div>
                                        </label>
                                    </div>
                                    

                                </div>
                                <div class="col-lg-4">
                                    <div class="card-title fs-15 text-center text-muted">Authoriz.. to work in the US</div>
                                    <div class="form-check card-radio card-animate" style="box-shadow: 0 1px 2px rgb(56 65 74 / 15%);">
                                        <input id="authosiz_us" name="shippingMethod" type="radio" class="form-check-input" checked="">
                                        <label class="form-check-label border borde-noner" for="authosiz_us">
                                            <div class="count-num text-center text-muted"> <i class="ri-user-follow-line fs-20 text-muted"></i></div>
                                        </label>
                                    </div>
                                     

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in" style="display:none" id="add_special_filter">
                    <div class="card mb-2">
                        <div class="card-header align-items-center d-flex p-2 ms-2 me-2">
                            <h4 class="card-title mb-0 flex-grow-1">Special filters
                                <p class="text-muted fs-11 mb-0 mt-1">Narrow down your search</p>
                            </h4>


                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-4  ">
                                    <p class="text-muted fs-13">PROFILES</p>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck6">
                                        <label class="form-check-label" for="formCheck6">
                                            Only confidential profiles
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck6">
                                        <label class="form-check-label" for="formCheck6">
                                            Unseen profiles
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <p class="text-muted fs-13">VERIFICATION</p>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck6">
                                        <label class="form-check-label" for="formCheck6">
                                            Verified email
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck6">
                                        <label class="form-check-label" for="formCheck6">
                                            Verified mobile
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <p class="text-muted fs-13">EQUAL OPPORTUNITY</p>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="formCheck6">
                                        <label class="form-check-label" for="formCheck6">
                                            Exclude confidential profiles
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">

                        <div class="card-body mb-3 mt-3">
                            <div class="d-flex flex-wrap gap-2 mb-3 mb-lg-0">
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="location_btn"><i class=" ri-map-pin-user-line label-icon align-middle rounded-pill fs-16 me-2"></i> Location</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="notice_period_btn"><i class="ri-building-line label-icon align-middle rounded-pill fs-16 me-2"></i> Notice Period </button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="function_rol_btn"><i class="ri-user-smile-line label-icon align-middle rounded-pill fs-16 me-2"></i> Function & Roles</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="citizen_btn"><i class="ri-user-smile-line label-icon align-middle rounded-pill fs-16 me-2"></i> Citizenship</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="industry_btn"><i class="ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2 "></i> Industry</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="education_btn"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 me-2"></i> Education</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="age_btn"><i class="ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2 "></i> Age</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="gender_btn"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 me-2"></i> Gender</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="company_btn"><i class="ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2 "></i> Company</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="designation_btn"><i class="ri-user-smile-line label-icon align-middle rounded-pill fs-16 me-2"></i> Designation</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="job_type_btn"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 me-2"></i> Job Type</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="language_btn"><i class="ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2 "></i> Language</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="differently_btn"><i class="ri-user-smile-line label-icon align-middle rounded-pill fs-16 me-2"></i> Differently abled</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="us_visa_btn"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 me-2"></i>US visa status</button>
                                <button type="button" class="btn btn-light btn-label rounded-pill card-animate w-lg" id="special_filter_btn"><i class="ri-error-warning-line label-icon align-middle rounded-pill fs-16 me-2 "></i> Special Filters</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-body">
                            <div class="p-2 d-flex justify-content-center text-center">
                                
                                <a href="{{ route('search_result_from_database', ['jobid'=>$job_id]) }}" class=""><button class="btn btn-primary btn-border me-3">Search</button></a>
                                <button class="btn btn-light btn-border ">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center d-flex pt-3 pb-3" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="card-title mb-0 flex-grow-1">Recent Searches <i class=" ri-question-line align-middle fs-15"></i></div>

                            <div class="flex-shrink-0">
                                <i class=" ri-add-line align-middle"></i>
                            </div>
                        </div>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                            <div class="accordion-body p-1">
                                <div class="card-body p-1">
                                    <div class="border rounded border-dashed p-2 mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">Keyword-sales</a></h5>
                                                <div>Search Dt: 19-04-2022</div>
                                            </div>

                                            <div class="flex-shrink-0 ">
                                                <a href="#" class="text-info">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border rounded border-dashed p-2 mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">Keyword-sales</a></h5>
                                                <div>Search Dt: 19-04-2022</div>
                                            </div>

                                            <div class="flex-shrink-0 ">
                                                <a href="#" class="text-info">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border rounded border-dashed p-2 mb-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="flex-shrink-0 me-3">
                                                <h5 class="fs-13 mb-1"><a href="#" class="text-body text-truncate d-block">Keyword-sales</a></h5>
                                                <div>Search Dt: 19-04-2022</div>
                                            </div>

                                            <div class="flex-shrink-0 ">
                                                <a href="#" class="text-info">Search</a>
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center d-flex p-2" data-bs-toggle="collapse" data-bs-target="#saved_search" aria-expanded="true" aria-controls="collapseOne">
                            <div class="card-title mb-0 flex-grow-1">Saved Searches </div>

                            <div class="flex-shrink-0">
                                <i class=" ri-add-line align-middle"></i>
                            </div>
                        </div>
                        <div id="saved_search" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#default-accordion-example">
                            <div class="accordion-body pt-0 ps-1">
                                <div class="card-body pt-2 ps-1 pb-1">
                                    <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link  All py-3 ps-1" data-bs-toggle="tab" id="All" href="#nav-badge-home" role="tab" aria-selected="true">
                                                Personal<span class="badge bg-primary align-middle ms-1">220</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#nav-badge-profile" role="tab" aria-selected="false">
                                                Shared <span class="badge bg-success align-middle ms-1">30</span>
                                            </a>
                                        </li>


                                    </ul>

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane  " id="nav-badge-home" role="tabpanel">

                                            <p class="text-muted mb-2 personal_demo ms-2"> Demo.. <b class="text-center">27-Aug-2022</b></p>
                                            <p class="text-muted mb-2 personal_demo ms-2"> Demo.. <b class="text-center">27-Aug-2022</b></p>
                                            <p class="text-muted mb-2 personal_demo ms-2"> Demo.. <b class="text-center">27-Aug-2022</b></p>
                                            <p class="text-muted mb-2 personal_demo ms-2"> Demo.. <b class="text-center">27-Aug-2022</b></p>
                                        </div>
                                        <div class="tab-pane active" id="nav-badge-profile" role="tabpanel">
                                            <!-- <p class="text-danger shared_demo mb-0">No Share Searches Saved so far!</p> -->
                                            <div class="p-2 mb-1 ">
                                                <div class="py-1 text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#405189,secondary:#0ab39c" style="width:52px;height:52px">
                                                    </lord-icon>
                                                    <h5 class="mt-4 mb-0">Sorry! No Result Found</h5>
                                                </div>
                                            </div>

                                        </div>


                                    </div>

                                    <div class="col-lg-12 mt-4 text-center ">
                                        <button type="button" class="btn btn-soft-primary  btn-sm w-lg" data-text="Button"><span>View All</span></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos="zoom-in">
                    <div class="card card-animate mb-2">
                        <div class="card-header align-items-center ">
                            <div class="text-center">
                                <img src="assets/images/secure.png" alt="secure image" width="15%" class="img-fluid mb-3">
                                <p class="text-muted mb-0 fs-18">Search Suggestion for You!</p>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="mb-2">
                                <li class="mb-2">Please use proper keyword in keyword field. like Candidate name, phone no, location, experiencs, salary etc..</li>
                                <li class="mb-2">Use multiple location you can selected to search proper data to search</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection
@section('script')
<!-- aos js -->
<script src="{{asset('assets/libs/aos/aos.js')}}"></script>
<!-- prismjs plugin -->
<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>
<!-- animation init -->
<script src="{{asset('assets/js/pages/animation-aos.init.js')}}"></script>
<script>
    //for location
    $("#location_btn").on("click", function() {
        $("#search_location").toggle(300);
    })
    $("#prefer_location").on("click", function() {
        $("#prefer_location_field").toggle(300);
        $("#prefer_location").css('display', 'none');
    })
    $(".close-field").on("click", function() {
        $("#prefer_location_field").hide(300);
        $("#prefer_location").css('display', 'block');
    })
    $("#form-check-input").on("click", function() {
        if ($(this).is(':checked')) {
            $("#search_box").hide(300);
        } else {
            $("#search_box").show(300);
        }
    })
    //for notice period 
    $("#notice_period_btn").on("click", function() {
        $("#add_noticeperiod").toggle(300);
    })
    //for function & Role 
    $("#function_rol_btn").on("click", function() {
        $("#add_function_roles").toggle(300);
    })
    //for citizen 
    $("#citizen_btn").on("click", function() {
        $("#add_citizenship").toggle(300);
    })
    //for industry 
    $("#industry_btn").on("click", function() {
        $("#add_industry").toggle(300);
    })
    //for Education  
    $("#education_btn").on("click", function() {
        $("#add_education").toggle(300);
    })
    //for Age   
    $("#age_btn").on("click", function() {
        $("#add_age").toggle(300);
    })
    //for gender  
    $("#gender_btn").on("click", function() {
        $("#add_gender").toggle(300);
    })
    //for company 
    $("#company_btn").on("click", function() {
        $("#add_company").toggle(300);
    })
    //for designation
    $("#designation_btn").on("click", function() {
        $("#add_designation").toggle(300);
    })
    //for job Type
    $("#job_type_btn").on("click", function() {
        $("#add_job_type").toggle(300);
    })
    //for language
    $("#language_btn").on("click", function() {
        $("#add_language").toggle(300);
    })
    //for Differently abled
    $("#differently_btn").on("click", function() {
        $("#add_differently_abled").toggle(300);
    })
    //for US visa
    $("#us_visa_btn").on("click", function() {
        $("#add_us_visa").toggle(300);
    })
    //for special filter
    $("#special_filter_btn").on("click", function() {
        $("#add_special_filter").toggle(300);
    })


    //ppg qualification 
    $("#ppg_qualification_btn").on("click", function() {
        $("#add_ppg_qualification").show(300);
        $("#ppg_qualification_btn").hide(300);
    })
    //saved searches
    // $("#personal_btn").on("click", function() {
    //     $(".personal_demo").show(300);
    //     $(".shared_demo").hide(300);
    // })
    // $("#shared_btn").on("click", function() {
    //     $(".personal_demo").hide(300);
    //     $(".shared_demo").show(300);
    // })
    //click on card
    $(".card-hover").on("click", function() {
        $(this).css("color", "red");
    })
</script>
@endsection
@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">EDIT CLIENTS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                                <li class="breadcrumb-item active">Edit Clients</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ url('/edit-organisation-post',$company->company_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9">
                                <div data-aos="zoom-in">
                                    <div class="card mb-2">
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="OrganisationName" class="form-label">Client/Company
                                                            Name <font color="red">*</font></label>
                                                        <input type="text" name="client_name" class="form-control"
                                                            placeholder="Company Name" id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend" value="{{ $company->client_name }}" required>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Industry" class="form-label">Industry <font
                                                                color="red">*</font></label>
                                                        <?php
                                                            $industrylist = get_industry(); 
                                                        ?>
                                                        <select name="industry" id="ForminputState" class="form-select"
                                                            data-choices data-choices-sorting="true" required>
                                                            <option value="">Please Select</option>
                                                            @foreach ($industrylist as $value)
                                                                <option value="{{ $value->industry_name }}" {{ $value->industry_name == $company->industry ? 'selected' : '' }}>{{ $value->industry_name }}</option>
                                                            @endforeach 
                                                        </select>
                                                    </div>
                                                </div>
                                                <!--end col-->

                                                <!-- <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="phonenumberInput" class="form-label">Phone </label>
                                                                <div class="row mb-2">
                                                                    <div class="col-md-10 pe-0">
                                                                        <div class="input-group flex-nowrap">
                                                                            <span class="input-group-text" id="addon-wrapping"><i class="ri-phone-line fs-15 text-primary"></i></span>
                                                                            <input type="text" class="form-control form-control-icon" placeholder="+91 8917550895 " id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-end">
                                                                        <button type="button" class="btn btn-light btn-icon waves-effect" id="add_alt_num"><i class=" ri-add-line"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div id="alternate_num" style="display:none">
                                                                    <div class="row ">
                                                                        <div class="col-md-10 pe-0">
                                                                            <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping"><i class="ri-phone-line fs-15 text-primary"></i></span>
                                                                                <input type="text" class="form-control form-control-icon" placeholder="Alternate Num.." id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2 ">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div> -->
                                                <!--end col-->
                                                <!-- <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="emailidInput" class="form-label">Email</label>
                                                                <div class="row mb-2">
                                                                    <div class="col-md-10 pe-0">
                                                                        <div class="input-group flex-nowrap">
                                                                            <span class="input-group-text" id="addon-wrapping"><i class="ri-mail-line fs-15 text-primary"></i></span>
                                                                            <input type="text" class="form-control form-control-icon" placeholder="example@gamil.com" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 text-end">
                                                                        <button type="button" class="btn btn-light btn-icon waves-effect" id="add_email"><i class=" ri-add-line"></i></button>
                                                                    </div>
                                                                </div>
                                                                <div id="alt_email_adress" style="display:none">
                                                                    <div class="row ">
                                                                        <div class="col-md-10 pe-0">
                                                                            <div class="input-group flex-nowrap">
                                                                                <span class="input-group-text" id="addon-wrapping"><i class="ri-mail-line fs-15 text-primary"></i></span>
                                                                                <input type="text" class="form-control form-control-icon" placeholder="example@gamil.com" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2 text-end">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                <!--end col-->
                                                <!-- <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="address1ControlTextarea" class="form-label">Work Address</label>
                                                                <div id="work_address">
                                                                    <div class="row mb-3">
                                                                        <div class="col-md-11 pe-0">
                                                                            <input type="text" class="form-control" placeholder="Address " id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                        </div>
                                                                        <div class="col-md-1 text-end">
                                                                            <button type="button" class="btn btn-light btn-icon waves-effect add_more_address" id=""><i class=" ri-add-line"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div> -->
                                                <!--end col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="Website" class="form-label">Website</label>
                                                        <div class="row mb-2">
                                                            <div class="col-md-12">
                                                                <input type="url" name="website" value="{{ $company->website }}" class="form-control"
                                                                    placeholder="Website " id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend">
                                                            </div>
                                                            {{-- <div class="col-md-1 text-end">
                                                                <button type="button" class="btn btn-light btn-icon waves-effect" id="add_more_website"><i class=" ri-add-line"></i></button>
                                                            </div> --}}
                                                        </div>
                                                        {{-- <div id="add_website" style="display:none">
                                                            <div class="row ">
                                                                <div class="col-md-11 pe-0">
                                                                    <input type="text" class="form-control" placeholder="Website " id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                </div>
                                                                <div class="col-md-1 text-end">
                                                                </div>
                                                            </div>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">About
                                                            Client/Company</label>
                                                        <textarea class="ckeditor-classic" name="about_client" id="about_client">{!! $company->about_client !!}</textarea>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Attach Logo</label>
                                                        <input type="file" name="logo" class="form-control "
                                                            id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            @error('logo') is-invalid @enderror>
                                                        @error('logo')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        {{-- <div class="mb-3">
                                                            <label for="ForminputState" class="form-label">Logo Now:</label>
                                                            <img src="{{$company->logo}}" alt="">
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Attach
                                                            Profile</label>
                                                        <input type="file" name="profile" class="form-control "
                                                            id="validationTooltipUsername" value=""
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            @error('profile') is-invalid @enderror>
                                                        @error('profile')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="Facebook" class="form-label">Facebook</label>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text"
                                                                id="validationTooltipUsernamePrepend"><i
                                                                    class="ri-facebook-line fs-15 text-primary"></i></span>
                                                            <input type="text" name="facebook"
                                                                class="form-control form-control-icon"
                                                                id="validationTooltipUsername"
                                                                aria-describedby="validationTooltipUsernamePrepend"
                                                                placeholder="e.g. www.facebook.id" value="{{ $company->facebook }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Twitter</label>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text"
                                                                id="validationTooltipUsernamePrepend"><i
                                                                    class="ri-twitter-line fs-15 text-primary"></i></span>
                                                            <input type="text" name="twitter"
                                                                class="form-control form-control-icon"
                                                                id="validationTooltipUsername"
                                                                aria-describedby="validationTooltipUsernamePrepend"
                                                                placeholder="e.g. www.twitter.id" value="{{ $company->twitter }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">LinkedIn</label>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text"
                                                                id="validationTooltipUsernamePrepend"><i
                                                                    class="ri-linkedin-line fs-15 text-primary"></i></span>
                                                            <input type="text" name="linkedin"
                                                                class="form-control form-control-icon" id="iconrightInput"
                                                                id="validationTooltipUsername"
                                                                aria-describedby="validationTooltipUsernamePrepend"
                                                                placeholder="e.g. www.linkedin.id" value="{{ $company->linkedin }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="ForminputState" class="form-label">Instagram</label>
                                                        <div class="input-group flex-nowrap">
                                                            <span class="input-group-text"
                                                                id="validationTooltipUsernamePrepend"><i
                                                                    class=" ri-instagram-line fs-15 text-primary"></i></span>
                                                            <input type="text" name="instagram"
                                                                class="form-control form-control-icon" id="iconrightInput"
                                                                id="validationTooltipUsername"
                                                                aria-describedby="validationTooltipUsernamePrepend"
                                                                placeholder="e.g. www.instagram.id" value="{{ $company->instagram }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end col-->


                                                <!--end col-->
                                            </div>
                                            <!--end row-->

                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div data-aos="zoom-out-right">
                                    <p class="text-muted fs-15 mb-1"><b>Manage Clients</b></p>
                                    <p class="text-muted">
                                        Do you have a company with more than one office? You can use "Locations" to store
                                        information about every office of your company and use it across Resumebuzz.
                                    </p>
                                    <p class="text-muted fs-15 mb-1"><b>Where is this shown/used?</b></p>
                                    <p class="text-muted mb-2">1. This reflects in your career page - candidates apply to
                                        jobs in their preferred locations.
                                    </p>
                                    <p class="text-muted mb-2">2. While making an offer to a candidate, you can choose the
                                        location where you would like to hire the candidate.
                                    </p>
                                    <p class="text-muted mb-2">3. This reflects in your career page - candidates apply to
                                        jobs in their preferred locations.
                                    </p>
                                    <p class="text-muted mb-2">4. While making an offer to a candidate, you can choose the
                                        location where you would like to hire the candidate.
                                    </p>
                                    <p class="text-muted mb-2">5. This reflects in your career page - candidates apply to
                                        jobs in their preferred locations.
                                    </p>
                                    <p class="text-muted mb-2">6. While making an offer to a candidate, you can choose the
                                        location where you would like to hire the candidate.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div data-aos="zoom-in">
                                    <div class="card mb-2">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Add Contract Details (Optional)</h4>
                                            <div class="flex-shrink-0">
                                                <div class="form-check form-switch form-switch-right form-switch-md">

                                                    <input class="form-check-input code-switcher" type="checkbox"
                                                        id="form-grid-showcode" checked="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="live-preview">

                                            </div>
                                            <div class="code-view">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="OrganisationName" class="form-label">Contract Start Date</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line fs-15 text-primary"></i></span>
                                                            <input type="text" name="start" class="form-control flatpickr-input active" data-provider="flatpickr" placeholder="DD-MM-YY" data-date-format="d M, Y" aria-label="Phone Number" maxlength="10" aria-describedby="basic-addon1" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="OrganisationName" class="form-label">Contract End Date</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line fs-15 text-primary"></i></span>
                                                            <input type="text" name="end" class="form-control flatpickr-input active" data-provider="flatpickr" placeholder="DD-MM-YY" data-date-format="d M, Y" aria-label="Phone Number" maxlength="10" aria-describedby="basic-addon1" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                    <label for="OrganisationName" class="form-label">Attach Agreement</label>
                                                        <input type="file" class="form-control ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div data-aos="zoom-out-right">
                                    <p class="text-muted fs-15 mb-1"><b>Manage Clients</b></p>
                                    <p class="text-muted">
                                        Do you have a company with more than one office? You can use "Locations" to store
                                        information about every office of your company and use it across Resumebuzz.
                                        Do you have a company with more than one office? You can use "Locations" to store
                                        information about and use it across Resumebuzz.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div data-aos="zoom-in">
                                    <div class="card mb-2">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Company Settings (All Fields Mandatory)
                                            </h4>
                                            <!-- <div class="flex-shrink-0">
                                                    <div class="form-check form-switch form-switch-right form-switch-md">

                                                        <input class="form-check-input code-switcher" type="checkbox" id="form-grid-showcode" checked="">
                                                    </div>
                                                </div> -->
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="nameInput" class="form-label">Assign Account
                                                            Manage</label>
                                                        <select class="form-control" id="choices-single-no-search"
                                                            name="assign_acc_manager" data-choices
                                                            data-choices-search-false data-choices-removeItem>
                                                            <option value="Bibhudutta Dash">Bibhudutta Dash</option>
                                                            <option value="Manoj Sahoo">Manoj Sahoo</option>
                                                            <option value="Bibhudutta Dash">Bibhudutta Dash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="websiteUrl" class="form-label">Applicant
                                                            Expiry</label>
                                                        <div class="form-icon right">
                                                            <input type="text" name="expiry"
                                                                class="form-control form-control-icon" id="iconrightInput" value="expiry"
                                                                placeholder=" ">
                                                            <i class="text-muted">In days</i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-lg-4">

                                                </div>
                                                <div class="col-lg-8">

                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <label for="websiteUrl" class="form-label">Do you need to add any ID
                                                        proof while uploading candidate?</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-check form-radio-primary mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="have_any_id" value="Yes" id="have_id">
                                                                <label class="form-check-label" for="formradioRight5">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 ">
                                                            <div class="form-check form-radio-primary mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="have_any_id" value="No" id="have_no_id">
                                                                <label class="form-check-label" for="formradioRight5">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="have_id_type" style="display:none">
                                                <div class="row mb-3">
                                                    <div class="col-lg-6">
                                                        <label for="websiteUrl" class="form-label">Please select any ID proof.</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-check form-radio-primary mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="id_proof" value="passport" id="formradioRight5">
                                                                    <label class="form-check-label" for="formradioRight5">PASSPORT</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <div class="form-check form-radio-primary mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="id_proof" value="pan" id="formradioRight5">
                                                                    <label class="form-check-label" for="formradioRight5">PAN</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <label for="websiteUrl" class="form-label">Does The Client Has A
                                                        Talent Portal?</label>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-check form-radio-primary mb-3">

                                                                <input class="form-check-input" type="radio"
                                                                    name="talent_portal" id="portal_checked"
                                                                    value="Yes">
                                                                <label class="form-check-label" for="formradioRight5">
                                                                    Yes
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 ">
                                                            <div class="form-check form-radio-primary mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="talent_portal" id="portal_no_checked"
                                                                    value="No">
                                                                <label class="form-check-label" for="formradioRight5">
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="ticket_number_type" style="display:none">
                                                <div class="row mb-3">
                                                    <div class="col-lg-6">
                                                        <label for="websiteUrl" class="form-label">Does The Portal
                                                            Generates An Application ID?</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="form-check form-radio-primary mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="ticket_type" value="internal"
                                                                        id="formradioRight5" checked>
                                                                    <label class="form-check-label" for="formradioRight5">
                                                                        Internal
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 ">
                                                                <div class="form-check form-radio-primary mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="ticket_type" value="client"
                                                                        id="formradioRight5">
                                                                    <label class="form-check-label" for="formradioRight5">
                                                                        Client
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-lg-6">
                                                        <label for="websiteUrl" class="form-label">What Is The Portal
                                                            Link?</label>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" name="link" type="text" value="{{ $company->portal_link }}"
                                                            placeholder="e . g : www.abc.com">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div data-aos="zoom-out-right">
                                    <p class="text-muted fs-15 mb-1"><b>Manage Clients</b></p>
                                    <p class="text-muted">
                                        Do you have a company with more than one office? You can use "Locations" to store
                                        information about every office of your company and use it across Resumebuzz.
                                    </p>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-9">
                                <div data-aos="zoom-in">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <button type="button" onclick="history.back()"
                                                        class="btn btn-light">Cancel</button>

                                                </div>
                                                <div class="col-lg-6 ">
                                                    <div class="text-end">
                                                        <button type="reset" class="btn btn-light me-2">Reset</button>
                                                        <button type="submit" class="btn btn-primary w-lg">Save</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

<script src="{{ asset('assets/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('about_client');
</script>

<script src="{{ asset('assets/js/pages/form-editor.init.js') }}"></script>
<script src="{{asset('assets/libs/aos/aos.js')}}"></script>
<!-- prismjs plugin -->
<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>
<!-- animation init -->
<script src="{{asset('assets/js/pages/animation-aos.init.js')}}"></script>
<script>
    $('#portal_checked').on('click', function() {
        if ($(this).is(':checked')) {
            $('#ticket_number_type').css('display', 'block');
        } else {
            $('#ticket_number_type').css('display', ' none');

        }
    });
    $('#portal_no_checked').on('click', function() {
        if ($(this).is(':checked')) {
            $('#ticket_number_type').css('display', 'none');
        } else {
            $('#ticket_number_type').css('display', ' block');

        }
    });

    $('#add_alt_num').on('click', function() {
        $('#alternate_num').toggle(300);
    })
    $('#add_email').on('click', function() {
        $('#alt_email_adress').toggle(300);
    })

    $('#have_id').on('click', function() {
        if ($(this).is(':checked')) {
            $('#have_id_type').css('display', 'block');
        } else {
            $('#have_id_type').css('display', ' none');

        }
    });
    $('#have_no_id').on('click', function() {
        if ($(this).is(':checked')) {
            $('#have_id_type').css('display', 'none');
        } else {
            $('#have_id_type').css('display', ' block');

        }
    });
</script>
@endsection

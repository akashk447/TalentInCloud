@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">MANAGE ACCOUNT</h4>

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
                        <div class="col-lg-9">
                            <form action="{{ Route('manage_account_post') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <p class="text-muted">Update your organization details including address, currency and
                                            timezone. This section needs to be completed for all features to function correctly.
                                            <a href="#" class="text-info">Learn more</a> about managing company account.
                                        </p>
                                        <h4 class="fs-16 mt-4 mb-3">Contact Info</h4>
                                        <div class="bg-light  p-3">
                                            <div class="row mb-4 mt-2">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Name</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-user-3-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="acc_name" class="form-control form-control-icon"
                                                            id="acc_name" placeholder="Enter Name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Organization
                                                        Type</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-building-line fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="org_type" id="org_type">
                                                            <option value="Corporate Hiring Manager">Corporate Hiring Manager</option>
                                                            <option value="Staffing & Recruiting Agency">Staffing & Recruiting Agency</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Contact No.</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-phone-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="phone" class="form-control form-control-icon"
                                                            id="phone" placeholder="+91 8917550895 " value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">City</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-map-pin-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="city" class="form-control form-control-icon"
                                                            id="city" placeholder="Enter City Name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">State</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-map-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="state" class="form-control form-control-icon"
                                                            id="state" placeholder="Enter State Name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Country</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-flag-line fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="country" id="country">
                                                            <option value="India"> India</option>
                                                            <option value="Indonesia"> Indonesia</option>
                                                            <option value="Iran"> Iran</option>
                                                            <option value="Ireland"> Ireland</option>
                                                            <option value="Italy"> Italy</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Address</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <textarea name="address" class="form-control" id="address" cols="30" rows="2"></textarea>
                                                </div>
                                            </div>
    
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">GSTIN</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-percent-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="GSTIN" class="form-control form-control-icon"
                                                            id="gstin" placeholder=" " value=" ">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Upload Logo</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <input type="file" class="filepond filepond-input-multiple" multiple
                                                        name="logo" id="logo" data-allow-reorder="true" data-max-file-size="3MB"
                                                        data-max-files="3">
                                                </div>
                                            </div>
                                        </div>
    
                                        <h4 class="fs-16 mt-4 mb-3">Regional</h4>
                                        <div class="bg-light  p-3">
                                            <div class="row mb-4 mt-2">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Industry</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-building-3-line fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="industry" id="industry">
                                                            <option value="">Select Industry</option>
                                                            <?php 
                                                                $industrylist = get_industry();   
                                                                foreach ($industrylist as  $value) {
                                                            ?>
                                                            <option value="<?= $value->industry_name ?>">
                                                                <?= $value->industry_name ?> </option>
                                                            <?php
                                                            }    
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Time Zone</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-globe-line fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="time_zone" id="time_zone">
                                                            <option value="(+05:30) Asia/Bhubaneswar" selected>(+05:30) Asia/Bhubaneswar</option>
                                                            <option value="(+05:00) Asia/Kolkata">(+05:00) Asia/Kolkata</option>
                                                            <option value="(+05:00) Asia/Dacca">(+05:00) Asia/Dacca</option>
                                                            <option value="(+05:00) Asia/Dhaka">(+05:00) Asia/Dhaka</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Currency</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-exchange-dollar-line fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="currency" id="currency">
                                                            <option value="inr" selected>Indian Rupee</option>
                                                            <option value="krona">Iceland Krona</option>
                                                            <option value="hryvnia">Hryvnia</option>
                                                            <option value="gurani">Guarani</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Language</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-english-input fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="language" id="language">
                                                            <option value="en" selected>English</option>
                                                            <option value="fr">French</option>
    
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <h4 class="fs-16 mt-4 mb-3">Web & Social</h4>
                                        <div class="bg-light  p-3">
                                            <div class="row mb-4 mt-2">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Website</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-global-line fs-15 text-primary"></i></span>
                                                        <input type="url" class="form-control form-control-icon" name="website"
                                                            id="website" placeholder="Enter Website" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">LinkedIn</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-linkedin-line fs-15 text-primary"></i></span>
                                                        <input type="text" class="form-control form-control-icon" name="linkedin"
                                                            id="linkedin" placeholder="Enter Linkedin Id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Facebook</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-facebook-line fs-15 text-primary"></i></span>
                                                        <input type="text" class="form-control form-control-icon" name="facebook"
                                                            id="facebook" placeholder="Enter Facebook Id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Twitter</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-twitter-line fs-15 text-primary"></i></span>
                                                        <input type="text" class="form-control form-control-icon" name="twitter"
                                                            id="twitter" placeholder="Enter Twitter Id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Instagram</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-instagram-line fs-15 text-primary"></i></span>
                                                        <input type="text" class="form-control form-control-icon" name="instagram"
                                                            id="instagram" placeholder="Enter Instagram Id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">You-tube</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-youtube-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="youtube" class="form-control form-control-icon"
                                                            id="youtube" placeholder="Enter Youtube Id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                                        <h4 class="fs-16 mt-4 mb-3">EEOC Compliance</h4>
                                        <div class="bg-light  p-3">
                                            <div class="row mb-4 mt-2">
                                                <div class="col-lg-3 mt-2">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                        <input type="checkbox" name="EEO_survey" class="form-check-input"
                                                            id="eeo_survey">
                                                        <label class="form-check-label" for="customSwitchsizelg">EEO Survey &
                                                            Reporting</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                        <input type="checkbox" name="OFCCP_survey" class="form-check-input"
                                                            id="OFCCP_survey">
                                                        <label class="form-check-label" for="customSwitchsizelg">OFCCP
                                                            Survey</label>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
    
                                        <h4 class="fs-16 mt-4 mb-3">GDPR Compliance</h4>
                                        <div class="bg-light  p-3">
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                        <input type="checkbox" name="GDPR_enabled_status" class="form-check-input"
                                                            id="GDPR_enabled_status">
                                                        <label class="form-check-label" for="customSwitchsizelg">GDPR
                                                            Enabled</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                        <input type="checkbox" name="GDPR_link_in_footer_status" class="form-check-input"
                                                            id="GDPR_link_in_footer_status">
                                                        <label class="form-check-label" for="customSwitchsizelg"> GDPR link in
                                                            Email Footer on all candidate emails</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                                                        <input type="checkbox" name="GDPR_status_granted" class="form-check-input"
                                                            id="GDPR_status_granted">
                                                        <label class="form-check-label" for="customSwitchsizelg">Keep GDPR
                                                            Status as Granted when candidate is Hired</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Profile
                                                        Expiry</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group">
                                                        <label class="input-group-text" for="inputGroupSelect01"><i
                                                                class="ri-24-hours-line fs-15 text-primary"></i></label>
                                                        <select class="form-select" name="expiry_duration" id="expiry_duration">
                                                            <option value="1">1 Month</option>
                                                            <option value="3">3 Month</option>
                                                            <option value="6">6 Month</option>
                                                            <option value="12">12 Month</option>
                                                            <option value="24">24 Month</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-4 ">
                                                <div class="col-lg-3 mt-2">
                                                    <label for="nameInput" class="form-label text-muted">Privacy Policy
                                                        URL</label>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i
                                                                class="ri-fingerprint-2-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="privacy_policy_url" class="form-control form-control-icon"
                                                            id="privacy_policy_url" placeholder="Enter Privacy Profile" value=" ">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card p-2 mb-2">
                                    <div class="text-end ">
    
                                        <button class="btn btn-light btn-border">Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-border me-2 ">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-3 mt-3">
                            <h4 class="text-muted fs-15"><b>Setting up basic information</b></h4>
                            <p class="text-muted">Would you like your HR portal to reflect your company's brand identity?
                                You can use these settings to upload your logo, a custom favicon and even change URL of the
                                HR portal to your own domain like <b>people.yourcompany.com</b></p>
                            <h4 class="text-muted fs-15"><b>Where is this shown/used?</b></h4>
                            <p class="mb-1 text-muted">1. Your employee portal will have the logo, favicon, portal name and
                                URL which you setup here.</p>
                            <p class="mb-1 text-muted">2. When you publish jobs to job boards, the 'company name' and
                                'industry' given here will be used.</p>
                            <p class="text-muted">3. Most of the emails and notifications sent from the HR portal will have
                                the company name in the signature by default.</p>
                            <h4 class="text-muted fs-15"><b>Resource article(s)</b></h4>
                            <a href="#" class="text-info">How to Setup your Employee Portal?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
    @endsection

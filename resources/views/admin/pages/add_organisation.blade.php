@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">ADD ORGANISATION</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                                <li class="breadcrumb-item active">Add Organisation</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                   
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card">
                                <div class="card-body">
                                    <form action="javascript:void(0);">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="OrganisationName" class="form-label">Organisation
                                                        Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Organisation Name" id="validationTooltipUsername"
                                                        aria-describedby="validationTooltipUsernamePrepend" required="">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Industry" class="form-label">Industry</label>
                                                    <select id="ForminputState" class="form-select" data-choices
                                                        data-choices-sorting="true">
                                                        <option selected>Please Select</option>
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
                                            <!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone </label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-10 pe-0">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping"><i
                                                                        class="ri-phone-line fs-15 text-primary"></i></span>
                                                                <input type="text" class="form-control form-control-icon"
                                                                    placeholder="+91 8917550895 "
                                                                    id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-end">
                                                            <button type="button"
                                                                class="btn btn-light btn-icon waves-effect"
                                                                id="add_alt_num"><i class=" ri-add-line"></i></button>
                                                        </div>
                                                    </div>
                                                    <div id="alternate_num" style="display:none">
                                                        <div class="row ">
                                                            <div class="col-md-10 pe-0">
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i
                                                                            class="ri-phone-line fs-15 text-primary"></i></span>
                                                                    <input type="text"
                                                                        class="form-control form-control-icon"
                                                                        placeholder="Alternate Num.."
                                                                        id="validationTooltipUsername"
                                                                        aria-describedby="validationTooltipUsernamePrepend"
                                                                        required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 ">
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Email</label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-10 pe-0">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping"><i
                                                                        class="ri-mail-line fs-15 text-primary"></i></span>
                                                                <input type="text" class="form-control form-control-icon"
                                                                    placeholder="example@gamil.com"
                                                                    id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                                    required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 text-end">
                                                            <button type="button"
                                                                class="btn btn-light btn-icon waves-effect"
                                                                id="add_email"><i class=" ri-add-line"></i></button>
                                                        </div>
                                                    </div>
                                                    <div id="alt_email_adress" style="display:none">
                                                        <div class="row ">
                                                            <div class="col-md-10 pe-0">
                                                                <div class="input-group flex-nowrap">
                                                                    <span class="input-group-text" id="addon-wrapping"><i
                                                                            class="ri-mail-line fs-15 text-primary"></i></span>
                                                                    <input type="text"
                                                                        class="form-control form-control-icon"
                                                                        placeholder="example@gamil.com"
                                                                        id="validationTooltipUsername"
                                                                        aria-describedby="validationTooltipUsernamePrepend"
                                                                        required="">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 text-end">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="address1ControlTextarea" class="form-label">Work
                                                        Address</label>
                                                    <div id="work_address">
                                                        <div class="row mb-3">
                                                            <div class="col-md-11 pe-0">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Address " id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-1 text-end">
                                                                <button type="button"
                                                                    class="btn btn-light btn-icon waves-effect add_more_address"
                                                                    id=""><i class=" ri-add-line"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="Website" class="form-label">Website</label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-11 pe-0">
                                                            <input type="text" class="form-control"
                                                                placeholder="Website " id="validationTooltipUsername"
                                                                aria-describedby="validationTooltipUsernamePrepend"
                                                                required="">
                                                        </div>
                                                        <div class="col-md-1 text-end">
                                                            <button type="button"
                                                                class="btn btn-light btn-icon waves-effect"
                                                                id="add_more_website"><i
                                                                    class=" ri-add-line"></i></button>
                                                        </div>
                                                    </div>
                                                    <div id="add_website" style="display:none">
                                                        <div class="row ">
                                                            <div class="col-md-11 pe-0">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Website " id="validationTooltipUsername"
                                                                    aria-describedby="validationTooltipUsernamePrepend"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-1 text-end">
                                                            </div>
                                                        </div>
                                                    </div>
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
                                                        <input type="text" class="form-control form-control-icon"
                                                            id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required="">
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
                                                        <input type="text" class="form-control form-control-icon"
                                                            id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required="">
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
                                                        <input type="text" class="form-control form-control-icon"
                                                            id="iconrightInput" id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required="">
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
                                                        <input type="text" class="form-control form-control-icon"
                                                            id="iconrightInput" id="validationTooltipUsername"
                                                            aria-describedby="validationTooltipUsernamePrepend"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="ForminputState" class="form-label">About us</label>
                                                    <textarea class="form-control" id=" " rows="3" placeholder="Enter your message"></textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary me-1">Save</button>
                                                    <button type="submit" class="btn btn-light">Cancel</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <div class="col-lg-3">

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
    <script src="assets/libs/prismjs/prism.js"></script>
    <script>
        $('#add_alt_num').on('click', function() {
            $('#alternate_num').toggle(300);
        })
        $('#add_email').on('click', function() {
            $('#alt_email_adress').toggle(300);
        })
        $('#add_more_website').on('click', function() {
            $('#add_website').toggle(300);
        })
        $('.add_more_address').on('click', function() {
            var adds = `<div class="row mb-3"><div class="col-md-11 pe-0">
                                                                    <input type="text" class="form-control" placeholder="Address " id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required="">
                                                                </div>
                                                                <div class="col-md-1 text-end">
                                                                    <button type="button" class="btn btn-light btn-icon waves-effect add_more_address" ><i class=" ri-add-line"></i></button>
                                                                </div>
                                                            </div>
                                                            `;
            $('#work_address').append(adds);

        })
    </script>
@endsection

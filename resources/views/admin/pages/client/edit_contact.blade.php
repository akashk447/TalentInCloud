@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">EDIT CONTACTS</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                            <li class="breadcrumb-item active">Edit Contacts</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form name="contract_form" action="{{ Route('edit_contacts_post',['id' => $contact->contact_id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="card mb-2">
                                <div class="card-body">
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="First Name" class="form-label">First Name <font color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="ri-user-3-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="first_name" value="{{ $contact->first_name }}" class="form-control form-control-icon" placeholder="First Name" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Last Name" class="form-label">Last Name <font color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="ri-user-3-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="last_name" value="{{ $contact->last_name }}" class="form-control form-control-icon" placeholder="Last Name" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Designation <font color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i class="ri-account-pin-box-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="designation" value="{{ $contact->designation }}" class="form-control form-control-icon" placeholder="Designation" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">User Type <font color="red">*</font></label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="addon-wrapping"><i class=" ri-shield-user-line fs-15 text-primary"></i></span>
                                                        <select name="user_type" id="ForminputState" class="form-select" required>
                                                            <option value="">Please Select</option>
                                                            <option value="Human Resources" {{ "Human Resources" == $contact->user_type ? 'selected' : '' }}>Human Resources</option>
                                                            <option value="Branch Manager" {{ "Branch Manager" == $contact->user_type ? 'selected' : '' }}>Branch Manager</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone <font color="red">*</font></label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-10 pe-0">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping"><i class="ri-phone-line fs-15 text-primary"></i></span>
                                                                <input type="number" name="phone[]" class="form-control form-control-icon" placeholder="000000000" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                                                    <input type="text" name="phone[]" class="form-control form-control-icon" placeholder="Alternate Num.." id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend">
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
                                                    <label for="emailidInput" class="form-label">Email <font color="red">*</font></label>
                                                    <div class="row mb-2">
                                                        <div class="col-md-10 pe-0">
                                                            <div class="input-group flex-nowrap">
                                                                <span class="input-group-text" id="addon-wrapping"><i class="ri-mail-line fs-15 text-primary"></i></span>
                                                                <input type="text" name="email[]" class="form-control form-control-icon" placeholder="email@example.com" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
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
                                                                    <input type="text" name="email[]" class="form-control form-control-icon" placeholder="example@gamil.com" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend">
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
                                                    <label for="address1ControlTextarea" class="form-label">Select Organisation <font color="red">*</font></label>
                                                    <select id="ForminputState" name="client_id" class="form-select" data-choices data-choices-sorting="true" required>
                                                        <option value="">Please Select</option>
                                                        <?php $organisationlist = get_organisation();   ?>
                                                        @foreach ($organisationlist as $col)
                                                        <option value="{{ $col->company_id }}" {{ $col->company_id == $contact->company_id ? 'selected' : '' }}>{{ $col->client_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="Website" class="form-label">Select Address</label>
                                                    <select id="ForminputState" name="address_id" class="form-select" data-choices data-choices-sorting="true">
                                                        <option value="">Please Select</option>
                                                        <option value="address1" {{ "address1" == $contact->address_id ? 'selected' : '' }}>address1</option>
                                                        <option value="address2" {{ "address2" == $contact->address_id ? 'selected' : '' }}>address2</option>
                                                        <option value="address3" {{ "address3" == $contact->address_id ? 'selected' : '' }}>address3</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="Facebook" class="form-label">Facebook</label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="ri-facebook-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="facebook" value="{{ $contact->facebook }}" class="form-control form-control-icon" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" placeholder="e.g. www.facebook.id">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ForminputState" class="form-label">Twitter</label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="ri-twitter-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="twitter" value="{{ $contact->twitter }}" class="form-control form-control-icon" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" placeholder="e.g. www.twitter.id">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ForminputState" class="form-label">LinkedIn</label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class="ri-linkedin-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="linkedin" value="{{ $contact->linkedin }}" class="form-control form-control-icon" id="iconrightInput" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" placeholder="e.g. www.linkedin.id">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="ForminputState" class="form-label">Instagram</label>
                                                    <div class="input-group flex-nowrap">
                                                        <span class="input-group-text" id="validationTooltipUsernamePrepend"><i class=" ri-instagram-line fs-15 text-primary"></i></span>
                                                        <input type="text" name="instagram" value="{{ $contact->instagram }}" class="form-control form-control-icon" id="iconrightInput" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" placeholder="e.g. www.instagram.id">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->


                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    
                                </div>
                                <div class="col-lg-3">

                                </div>
                            </div>
                        </div>
                    </div>
                
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="button" onclick="history.back()" class="btn btn-light">Cancel</button>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="text-end">
                                            <button type="reset" class="btn btn-light" onclick="window.location.reload(true);">Reset</button>
                                            <button type="submit" class="btn btn-primary w-lg">Save</button>
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
<script src="assets/libs/prismjs/prism.js"></script>
<script src="{{asset('assets/libs/aos/aos.js')}}"></script>
<!-- animation init -->
<script src="{{asset('assets/js/pages/animation-aos.init.js')}}"></script>
<script>
    $('#add_alt_num').on('click', function() {
        $('#alternate_num').toggle(300);
    })
    $('#add_email').on('click', function() {
        $('#alt_email_adress').toggle(300);
    })
</script>
@endsection

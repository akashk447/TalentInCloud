@extends('admin.layout.layout')
@section('main_content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">EDIT LOCATION</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clients</a></li>
                            <li class="breadcrumb-item"><a href="manage-location.php">Manage Location</a></li>
                            <li class="breadcrumb-item active">Edit Location</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <form action="{{ url('edit-location',$location->location_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div data-aos="flip-right">
                    <div class="card">
                        <div class="card-body">
                            <div id="show_location_field">
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">Friendly Name</label>
                                        <input type="text" name="friendly_name" value="{{ $location->friendly_name }}" class="form-control" id="validationDefault01" placeholder="Enter Friendly Name For Company" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">Organisation Name</label>
                                        <select class="form-select" id="choices-single-no-search" name="client_id" data-choices data-choices-search-false data-choices-removeItem>
                                            <option>Organisation Name</option>
                                            <?php $organisationlist = get_organisation();   ?>
                                            @foreach ($organisationlist as $col)
                                                <option value="{{ $col->company_id }}" {{ $col->company_id == $location->company_id ? 'selected' : '' }}>{{ $col->client_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">City</label>
                                        <input type="text" name="city" value="{{ $location->city }}" class="form-control" id="validationDefault01" placeholder="Enter City Name" required="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">Country</label>
                                        <select class="form-select" id="country-dropdown" name="country" data-choices data-choices-search-false >
                                            <?php $country = get_country() ?>
                                            <option value="">Select Country</option>
                                            @foreach($country as $c)
                                            <option value="{{ $c->loc_id }}" {{$location->country==$c->loc_id?"selected":""}}>{{ $c->loc_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="validationDefault01" class="form-label">Address</label>
                                        <input type="text" name="address" value="{{ $location->address }}" class="form-control" id="validationDefault01" placeholder="Enter Address" required="">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="validationDefault01" class="form-label">Postcode</label>
                                                <input type="number" name="postcode" value="{{ $location->postcode }}" class="form-control" id="validationDefault01" placeholder="Enter Postcode" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="validationDefault01" class="form-label">State</label>
                                                <select class="form-control" id="state_dropdown" name="state"  >
                                                    
                                                </select>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-lg-12 text-end">
                                        <button class="btn btn-light btn-border show_location_template me-1"> Cancel</button>
                                        <button type="submit" class="btn btn-primary btn-border w-lg"> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            
            <div class="col-lg-3">
                <div data-aos="zoom-out-right">
                    <p class="text-muted fs-15 mb-1"><b>Manage Locations</b></p>
                    <p class="text-muted">
                        Do you have a company with more than one office? You can use "Locations" to store information about every office of your company and use it across Resumebuzz.
                    </p>
                    <p class="text-muted fs-15 mb-1"><b>Where is this shown/used?</b></p>
                    <p class="text-muted mb-2">1. This reflects in your career page - candidates apply to jobs in their preferred locations.
                    </p>
                    <p class="text-muted mb-2">2. While making an offer to a candidate, you can choose the location where you would like to hire the candidate.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('script')
<script src="{{asset('assets/libs/aos/aos.js')}}"></script>
<!-- prismjs plugin -->
<script src="{{asset('assets/libs/prismjs/prism.js')}}"></script>
<!-- animation init -->
<script src="{{asset('assets/js/pages/animation-aos.init.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
            $("#state_dropdown").html('');
            $.ajax({
                url: window.location.origin+"/get-states-by-country/"+$('#country-dropdown').val(),
                type: "get",
                success: function(result) {
                    console.log(result)
                    $.each(result, function(key, value) {
                        // console.log('<option value="' + value.loc_id + '">' + value.loc_name + '</option>');
                        $("#state_dropdown").append('<option value="' + value.loc_id + '">' + value.loc_name + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection

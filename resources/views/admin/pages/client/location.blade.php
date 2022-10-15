@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">MANAGE LOCATION</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                                <li class="breadcrumb-item active">Manage Location</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            {{-- @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" id="notification_fade" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <div class="flex-grow-1">
                                    <a href="{{ route('add_location1') }}" class="">
                                        <button class="btn btn-info add-btn"><i class="ri-add-fill me-1 align-bottom"></i>
                                            Add location</button>
                                    </a>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="hstack text-nowrap gap-2">
                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                        {{-- <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#addmembers"><i class="ri-filter-2-line me-1 align-bottom"></i>
                                            Filters</button> --}}
                                        <button class="btn btn-soft-success">Export</button>
                                        <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                            aria-expanded="false" class="btn btn-soft-info"><i
                                                class="ri-more-2-fill"></i></button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <li><a class="dropdown-item" href="#">All</a></li>
                                            <li><a class="dropdown-item" href="#">Last Week</a></li>
                                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                                            <li><a class="dropdown-item" href="#">Last Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end col-->
                <div class="col-lg-12">

                    <div class="card" id="companyList">
                        <div class="card-header">
                            <div class="row g-2">
                                <div class="col-md-3">
                                    <div class="search-box">
                                        <input type="search" class="form-control search"
                                            placeholder="Search for company...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <div class="col-md-auto ms-auto">
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="text-muted">Sort by: </span>
                                        <select class="form-control mb-0" data-choices data-choices-search-false
                                            id="choices-single-default">
                                            <option value="Owner">A - Z</option>
                                            <option value="Owner">Add Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="table-responsive table-card mb-3">
                                    <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="checkAll"
                                                            value="option">
                                                    </div>
                                                </th>
                                                <th class="sort" data-sort="name" scope="col">Company Name</th>
                                                <th class="sort" data-sort="owner" scope="col">Freindly Name</th>
                                                <th class="sort" data-sort="location" scope="col">Address</th>
                                                <th class="sort" data-sort="location" scope="col">Postcode</th>
                                                <th class="sort" data-sort="location" scope="col">City</th>
                                                <th class="sort" data-sort="star_value" scope="col">State</th>
                                                <th class="sort" data-sort="industry_type" scope="col">Country</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">
                                            @foreach ($locations as $location)
                                                <tr>
                                                    <th scope="row">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="chk_child"
                                                                value="option1">
                                                        </div>
                                                    </th>
                                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                                            class="fw-medium link-primary">#VZ001</a></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                @if($location->logo)
                                                                    <img src="{{asset('assets/company_logo/').'/'.$location->logo}}" alt=""
                                                                    class="avatar-xxs rounded-circle image_src">
                                                                @else
                                                                    <img src="{{asset('assets/images/no_company.jpg')}}" alt=""
                                                                        class="avatar-xxs rounded-circle image_src">
                                                                @endif
                                                            </div>
                                                            <a data-bs-toggle="offcanvas" href="{{ url('/get-location-detail',$location->location_id) }}" aria-controls="offcanvasExample"  onclick="quick_view(event)">
                                                                <div class="flex-grow-1 ms-2 name" id="{{ url('/get-location-detail',$location->location_id) }}">{{ $location->client_name }}</div>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="owner">{{ $location->friendly_name }}</td>
                                                    <td class="location">{{ $location->address }}</td>
                                                    <td class="location">{{ $location->postcode }}</td>
                                                    <td class="location">{{ $location->city }}</td>
                                                    <td><span class="star_value">{{ $location->state_name }}</span></td>
                                                    <td class="industry_type">{{ $location->country_name }}</td>
                                                    <td>
                                                        <ul class="list-inline hstack gap-2 mb-0">
                                                            
                                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                data-bs-trigger="hover" data-bs-placement="top"
                                                                title="Edit">
                                                                <a class="edit-item-btn" href="{{ url('/edit-location',$location->location_id) }}"><i
                                                                        class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                            </li>
                                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                                data-bs-trigger="hover" data-bs-placement="top"
                                                                title="Delete">
                                                                <a class="remove-item-btn" data-bs-toggle="modal"
                                                                    href="#deleteRecordModal">
                                                                    <i class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="noresult" style="display: none">
                                        <div class="text-center">
                                            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                            </lord-icon>
                                            <h5 class="mt-2">Sorry! No Result Found</h5>
                                            <p class="text-muted mb-0">We've searched more than 150+ companies
                                                We did not find any
                                                companies for you search.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="pagination-wrap hstack gap-2">
                                        <a class="page-item pagination-prev disabled" href="#">
                                            Previous
                                        </a>
                                        <ul class="pagination listjs-pagination mb-0"></ul>
                                        <a class="page-item pagination-next" href="#">
                                            Next
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0">
                                        <div class="modal-header bg-soft-info p-3">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <input type="hidden" id="id-field" />
                                                <div class="row g-3">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <div class="position-relative d-inline-block">
                                                                <div class="position-absolute bottom-0 end-0">
                                                                    <label for="company-logo-input" class="mb-0"
                                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                                        title="Select Image">
                                                                        <div class="avatar-xs cursor-pointer">
                                                                            <div
                                                                                class="avatar-title bg-light border rounded-circle text-muted">
                                                                                <i class="ri-image-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </label>
                                                                    <input class="form-control d-none" value=""
                                                                        id="company-logo-input" type="file"
                                                                        accept="image/png, image/gif, image/jpeg">
                                                                </div>
                                                                <div class="avatar-lg p-1">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        <img src="assets/images/users/multi-user.jpg"
                                                                            id="companylogo-img"
                                                                            class="avatar-md rounded-circle object-cover" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h5 class="fs-13 mt-3">Company Logo</h5>
                                                        </div>
                                                        <div>
                                                            <label for="companyname-field" class="form-label">Name</label>
                                                            <input type="text" id="companyname-field"
                                                                class="form-control" placeholder="Enter company name"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="owner-field" class="form-label">Owner
                                                                Name</label>
                                                            <input type="text" id="owner-field" class="form-control"
                                                                placeholder="Enter owner name" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="industry_type-field" class="form-label">Industry
                                                                Type</label>
                                                            <select class="form-select" id="industry_type-field">
                                                                <option value="">Select industry type</option>
                                                                <option value="Computer Industry">Computer
                                                                    Industry</option>
                                                                <option value="Chemical Industries">Chemical
                                                                    Industries</option>
                                                                <option value="Health Services">Health Services
                                                                </option>
                                                                <option value="Telecommunications Services">
                                                                    Telecommunications Services</option>
                                                                <option value="Textiles: Clothing, Footwear">
                                                                    Textiles: Clothing, Footwear</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="star_value-field"
                                                                class="form-label">Rating</label>
                                                            <input type="text" id="star_value-field"
                                                                class="form-control" placeholder="Enter rating"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="location-field"
                                                                class="form-label">location</label>
                                                            <input type="text" id="location-field"
                                                                class="form-control" placeholder="Enter location"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="employee-field"
                                                                class="form-label">Employee</label>
                                                            <input type="text" id="employee-field"
                                                                class="form-control" placeholder="Enter employee"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="website-field" class="form-label">Website</label>
                                                            <input type="text" id="website-field" class="form-control"
                                                                placeholder="Enter website" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="contact_email-field" class="form-label">Contact
                                                                Email</label>
                                                            <input type="text" id="contact_email-field"
                                                                class="form-control" placeholder="Enter contact email"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="since-field" class="form-label">Since</label>
                                                            <input type="text" id="since-field" class="form-control"
                                                                placeholder="Enter since" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                                        Company</button>
                                                    <button type="button" class="btn btn-success"
                                                        id="edit-btn">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end add modal-->

                            <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1"
                                aria-labelledby="deleteRecordLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body p-5 text-center">
                                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                                colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                                            </lord-icon>
                                            <div class="mt-4 text-center">
                                                <h4 class="fs-semibold">You are about to delete a company ?</h4>
                                                <p class="text-muted fs-14 mb-4 pt-1">Deleting your company will
                                                    remove all of your information from our database.</p>
                                                <div class="hstack gap-2 justify-content-center remove">
                                                    <button
                                                        class="btn btn-link link-success fw-medium text-decoration-none"
                                                        data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i>
                                                        Close</button>
                                                    <button class="btn btn-danger" id="delete-record">Yes,
                                                        Delete It!!</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end delete modal -->

                            <div id="location_save_success" data-bs-backdrop="static" data-bs-keyboard="false"
                                class="modal fade zoomIn" tabindex="-1" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body text-center ">
                                            <div class="text-end">
                                                <button type="button" data-bs-dismiss="modal" class="btn-close text-end"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="text-center">
                                                <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="hover"
                                                    style="width:150px;height:150px">
                                                </lord-icon>
                                                <h4 class="mb-5 mt-3 fs-20">Yeah !!! Location Saved Sucessfully.</h4> 
                                                <p class="text-muted fs-14 mb-5">Appreciate, You have added your location to your cloud. Now, We suggest to add contact/interviewers for this company for a seamless operation ahead.</p>
                                                
                                                <div class="hstack gap-2 justify-content-center">
                                                    <a href="{{route('add_location')}}"><button type="button" 
                                                        class="btn btn-soft-success"><i
                                                            class="ri-links-line align-bottom"></i> Add More
                                                            Location</button></a> 
                                                    <a href="{{route('add_contacts')}}"><button class="btn btn-primary"> Add
                                                            Contact</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bg-light p-3 justify-content-center">
                                            <a href="{{route('admin_dashboard')}}" class="link-secondary fw-semibold"
                                                data-bs-target="#secondmodal" data-bs-toggle="modal"
                                                data-bs-dismiss="modal">Go to Dashboard</a>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>

                        </div>
                    </div>
                    <!--end card-->

                </div>


            </div>
            <!--end row-->
            <!--offcanvas-->
            <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="offcanvasExample">
                <!--end offcanvas-header-->
                <div class="offcanvas-body profile-offcanvas p-0">
                    <div class="team-cover">
                        <img src="{{ asset('assets/images/auth-one-bg.jpg') }}" alt="" class="img-fluid" />
                    </div>
                    <div class="p-3">
                        <div class="team-settings">
                            <div class="row">
                                <div class="col">
                                    <div class="bookmark-icon flex-shrink-0 me-2">
                                        <input type="checkbox" id="favourite13" class="bookmark-input bookmark-hide">
                                        <label for="favourite13" class="btn-star">
                                            <svg width="20" height="20">
                                                <use xlink:href="#icon-star" />
                                            </svg>
                                        </label>
                                    </div>
                                </div>
                                <div class="col text-end dropdown">
                                    <a href="javascript:void(0);" id="dropdownMenuLink14" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ri-more-fill fs-17"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink14">
                                        <!-- <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-2 align-middle"></i>View</a></li> -->
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-star-line me-2 align-middle"></i>Favorites</a></li>
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <div class="p-3 text-center">
                        <img src="{{ asset('assets/images/companies/no_company.jpg') }}" id="logo" alt="" class="avatar-lg img-thumbnail rounded-circle mx-auto">
                        <div class="mt-3">
                            <h5 class="fs-15"><a href="javascript:void(0);" class="link-primary" id="address">Nancy Martino</a></h5>
                            <p class="text-muted" id="friendly_name">Team Leader & HR</p>
                        </div>
                        {{-- <div class="hstack gap-2 justify-content-center mt-4">
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
                                <a href="javascript:void(0);" class="avatar-title bg-soft-info text-info rounded fs-16">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </div>
                            <div class="avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-soft-danger text-danger rounded fs-16">
                                    <i class="ri-dribbble-fill"></i>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row g-0 text-center">
                        <div class="col-6">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1">0</h5>
                                <p class="text-muted mb-0">Jobs Associated</p>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <div class="p-3 border border-dashed border-start-0">
                                <h5 class="mb-1">0</h5>
                                <p class="text-muted mb-0">Candidates</p>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="p-3">

                        <div class="table-responsive table-card">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium" scope="row">City</td>
                                        <td id="city">No City</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">State</td>
                                        <td id="state">No State</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Country</td>
                                        <td id="country">No Country</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Address</td>
                                        <td id="address_below">No address</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Postcode</td>
                                        <td id="postcode"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!--end offcanvas-body-->
                {{-- <div class="offcanvas-foorter border p-3 hstack gap-3 text-center position-relative">
                    <button class="btn btn-light w-100"><i class="ri-question-answer-fill align-bottom ms-1"></i> Send
                        Message</button>
                    <a href="view-organisation-profile.php" class="btn btn-primary w-100"><i
                            class="ri-user-3-fill align-bottom ms-1"></i> View Profile</a>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="assets/js/pages/crm-companies.init.js"></script>
<script>
    // 
    @if (Session::has('successlocation'))
            var location_save_success = new bootstrap.Modal(document.getElementById('location_save_success'), {
                keyboard: false
            });
            location_save_success.show();
        @endif
    function quick_view(e) {
        e.preventDefault();
        console.log(e.target.id);
        $.ajax({
            type: "get",
            url: e.target.id,
            success: function(response) {
                console.log(response);
                if(response.log == null || response.log == ""){
                    $('#logo').attr('src', "/assets/images/no_company.jpg");
                }else{
                    $('#logo').attr('src', "/assets/company_logo/" + response.logo);
                }
                $('#friendly_name').text(response.friendly_name);
                $('#city').text(response.city);
                $('#state').text(response.state_name);
                $('#country').text(response.country_name);
                $('#address').text(response.address);
                $('#address_below').text(response.address);
                $('#postcode').text(response.postcode);
                $("#offcanvasExample").offcanvas('show');
            }
        });
    }
</script>
@endsection

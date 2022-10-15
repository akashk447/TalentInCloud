@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">MANAGE COMPANY</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Company</a></li>
                                <li class="breadcrumb-item active">Manage Company</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <div class="flex-grow-1">
                                    <a href="{{ route('add_organisation1') }}" class="">
                                        <button class="btn btn-info add-btn"><i class="ri-add-fill me-1 align-bottom"></i>
                                            Add Company</button>
                                    </a>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="hstack text-nowrap gap-2">
                                        <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                                class="ri-delete-bin-2-line"></i></button>
                                        <!-- <button class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#addmembers"><i class="ri-filter-2-line me-1 align-bottom"></i>
                                                Filters</button>  -->
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
                                            <option value="Company">A - Z</option>
                                            <option value="Owner">Add Date</option>
                                            <!-- {{-- <option value="location">Location</option> --}} -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-tabs-custom nav-success mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active All py-3" data-bs-toggle="tab" id="All" href="#active"
                                        role="tab" aria-selected="true">
                                        <i class="ri-store-2-fill me-1 align-bottom"></i> Active Companies <span
                                            class="badge bg-primary align-middle ms-1">{{ $no_of_active_company }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link py-3 Delivered" data-bs-toggle="tab" id="Delivered" href="#inactive"
                                        role="tab" aria-selected="false">
                                        <i class="ri-checkbox-circle-line me-1 align-bottom"></i> In-Active Companies <span
                                            class="badge bg-success align-middle ms-1">{{ $no_of_inactive_company }}</span>
                                    </a>
                                </li>


                            </ul>
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="active" role="tabpanel">
                                    <div>
                                        <div class="table-responsive table-card mb-3">
                                            @if ($no_of_active_company > 0)
                                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col" style="width: 50px;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="checkAll" value="option">
                                                                </div>
                                                            </th>
                                                            <th class="sort" data-sort="name" scope="col">Company
                                                                Name</th>
                                                            <th class="sort" data-sort="owner" scope="col">Website
                                                            </th>
                                                            <th class="sort" data-sort="industry_type" scope="col">
                                                                Industry Type</th>
                                                            <th class="sort" data-sort="name" scope="col">Rating
                                                            </th>
                                                            <th class="sort" data-sort="name" scope="col">Contract
                                                                Validity</th>
                                                            <th class="sort" data-sort="name" scope="col">Agreement
                                                                File
                                                            </th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach ($client_details_active as $detail)
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="chk_child" value="option1">
                                                                    </div>
                                                                </th>
                                                                <td class="id" style="display:none;"><a
                                                                        href="javascript:void(0);"
                                                                        class="fw-medium link-primary">#VZ001</a></td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0">
                                                                            @if ($detail->logo)
                                                                                <img src="{{ asset('assets/company_logo/') . '/' . $detail->logo }}"
                                                                                    alt=""
                                                                                    class="avatar-xxs rounded-circle image_src">
                                                                            @else
                                                                                <img src="{{ asset('assets/images/no_company.jpg') }}"
                                                                                    alt=""
                                                                                    class="avatar-xxs rounded-circle image_src">
                                                                            @endif
                                                                        </div>
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="{{ url('/get-company-detail', $detail->company_id) }}"
                                                                            aria-controls="offcanvasExample"
                                                                            onclick="quick_view(event)">
                                                                            <div class="flex-grow-1 ms-2 name"
                                                                                id="{{ url('/get-company-detail', $detail->company_id) }}">
                                                                                {{ $detail->client_name }}</div>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td class="owner">{{ $detail->website }}</td>
                                                                <td class="location">{{ $detail->industry }}</td>
                                                                <td><span class="star_value">3</span> <i
                                                                        class="ri-star-fill text-warning align-bottom"></i>
                                                                </td>
                                                                <td class="industry_type">
                                                                    {{ $detail->contract_end }}
                                                                </td>
                                                                <td class="industry_type text-center">
                                                                    @if ($detail->file == '')
                                                                        <a href="{{ url('/add-agreement-detail', $detail->company_id) }}"
                                                                            data-bs-toggle="modal"
                                                                            onclick="agreement_add(event)">
                                                                            <i class="ri-folder-add-line text-muted fs-20"
                                                                                id="{{ url('/add-agreement-detail', $detail->company_id) }}"></i>
                                                                        </a>
                                                                    @else
                                                                        <!-- {{-- {{$detail->file}} --}} -->
                                                                        <a href="{{ url('/get-agreement-detail', $detail->company_id) }}"
                                                                            data-bs-toggle="modal"
                                                                            onclick="agreement_view(event)">
                                                                            <i class="ri-file-fill text-muted fs-17"
                                                                                id="{{ url('/get-agreement-detail', $detail->company_id) }}"></i>
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="View">
                                                                            <a href="{{ url('/view-company-profile', $detail->company_id) }}"
                                                                                class="view-item-btn"><i
                                                                                    class="ri-eye-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Edit">
                                                                            <a href="{{ url('edit-organisation', $detail->company_id) }}"
                                                                                class="edit-item-btn"><i
                                                                                    class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Status">
                                                                            <a class="status"
                                                                                href="{{ url('/change-company-status', $detail->company_id) }}"
                                                                                data-confirm="Are you sure you want to change the status of the company?"><i
                                                                                    class="ri-toggle-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Delete">
                                                                            <a class="remove-item-btn"
                                                                                data-bs-toggle="modal"
                                                                                href="#deleteRecordModal">
                                                                                <i
                                                                                    class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                        colors="primary:#121331,secondary:#08a88a"
                                                        style="width:75px;height:75px">
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
                                </div>
                                <div class="tab-pane" id="inactive" role="tabpanel">
                                    <div>
                                        <div class="table-responsive table-card mb-3">
                                            @if ($no_of_inactive_company > 0)
                                                <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th scope="col" style="width: 50px;">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="checkAll" value="option">
                                                                </div>
                                                            </th>
                                                            <th class="sort" data-sort="name" scope="col">Company
                                                                Name</th>
                                                            <th class="sort" data-sort="owner" scope="col">Website
                                                            </th>
                                                            <th class="sort" data-sort="industry_type" scope="col">
                                                                Industry Type</th>
                                                            <th class="sort" data-sort="name" scope="col">Rating
                                                            </th>
                                                            <th class="sort" data-sort="name" scope="col">Contract
                                                                Validity</th>
                                                            <th class="sort" data-sort="name" scope="col">Agreement
                                                                File
                                                            </th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="list form-check-all">
                                                        @foreach ($client_details_inactive as $detail)
                                                            <tr>
                                                                <th scope="row">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            name="chk_child" value="option1">
                                                                    </div>
                                                                </th>
                                                                <td class="id" style="display:none;"><a
                                                                        href="javascript:void(0);"
                                                                        class="fw-medium link-primary">#VZ001</a></td>
                                                                <td>
                                                                    <div class="d-flex align-items-center">
                                                                        <div class="flex-shrink-0">
                                                                            @if ($detail->logo)
                                                                                <img src="{{ asset('assets/company_logo/') . '/' . $detail->logo }}"
                                                                                    alt=""
                                                                                    class="avatar-xxs rounded-circle image_src">
                                                                            @else
                                                                                <img src="{{ asset('assets/images/noimg.png') }}"
                                                                                    alt=""
                                                                                    class="avatar-xxs rounded-circle image_src">
                                                                            @endif
                                                                        </div>
                                                                        <a data-bs-toggle="offcanvas"
                                                                            href="{{ url('/get-company-detail', $detail->company_id) }}"
                                                                            aria-controls="offcanvasExample"
                                                                            onclick="quick_view(event)">
                                                                            <div class="flex-grow-1 ms-2 name"
                                                                                id="{{ url('/get-company-detail', $detail->company_id) }}">
                                                                                {{ $detail->client_name }}</div>
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                                <td class="owner">{{ $detail->website }}</td>
                                                                <td class="location">{{ $detail->industry }}</td>
                                                                <td><span class="star_value">3</span> <i
                                                                        class="ri-star-fill text-warning align-bottom"></i>
                                                                </td>
                                                                <td class="industry_type">
                                                                    {{ $detail->contract_end }}
                                                                </td>
                                                                <td class="industry_type text-center">
                                                                    @if ($detail->file == '')
                                                                        <a class="btn btn-muted"
                                                                            href="{{ url('/add-agreement-detail', $detail->company_id) }}"
                                                                            data-bs-toggle="modal"
                                                                            onclick="agreement_add(event)">
                                                                            <i class="ri-folder-add-line text-muted fs-20"
                                                                                id="{{ url('/add-agreement-detail', $detail->company_id) }}"></i>
                                                                        </a>
                                                                    @else
                                                                        <!-- {{-- {{$detail->file}} --}} -->
                                                                        <a class="btn btn-primary"
                                                                            href="{{ url('/get-agreement-detail', $detail->company_id) }}"
                                                                            data-bs-toggle="modal"
                                                                            onclick="agreement_view(event)">
                                                                            <i class="ri-file-fill text-muted fs-17"
                                                                                id="{{ url('/get-agreement-detail', $detail->company_id) }}"></i>
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <ul class="list-inline hstack gap-2 mb-0">
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="View">
                                                                            <a href="{{ url('/view-company-profile', $detail->company_id) }}"
                                                                                class="view-item-btn"><i
                                                                                    class="ri-eye-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Edit">
                                                                            <a href="{{ url('edit-organisation', $detail->company_id) }}"
                                                                                class="edit-item-btn"><i
                                                                                    class="ri-pencil-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Status">
                                                                            <a class="status"
                                                                                href="{{ url('/change-company-status', $detail->company_id) }}"
                                                                                data-confirm="Are you sure you want to change the status of the company?"><i
                                                                                    class="ri-toggle-fill align-bottom text-muted"></i></a>
                                                                        </li>
                                                                        <li class="list-inline-item"
                                                                            data-bs-toggle="tooltip"
                                                                            data-bs-trigger="hover"
                                                                            data-bs-placement="top" title="Delete">
                                                                            <a class="remove-item-btn"
                                                                                data-bs-toggle="modal"
                                                                                href="#deleteRecordModal">
                                                                                <i
                                                                                    class="ri-delete-bin-fill align-bottom text-muted"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            @endif
                                            <div class="noresult" style="display: none">
                                                <div class="text-center">
                                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                                        colors="primary:#121331,secondary:#08a88a"
                                                        style="width:75px;height:75px">
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
                                </div>
                            </div>
                            <div class="modal fade" id="agreement" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-0">
                                        <div class="modal-header bg-soft-info p-3">
                                            <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" id="close-modal"></button>
                                        </div>
                                        <form id="url" action="" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row g-3">
                                                    <div class="col-lg-12">
                                                        <div class="text-center">
                                                            <div class="position-relative d-inline-block">
                                                                <div class="position-absolute bottom-0 end-0">
                                                                    <label for="company-logo-input" class="mb-0"
                                                                        data-bs-toggle="tooltip" data-bs-placement="right"
                                                                        title="Select Image">
                                                                        <div class="avatar-xs cursor-pointer">
                                                                            {{-- <div
                                                                                class="avatar-title bg-light border rounded-circle text-muted">
                                                                                <i class="ri-image-fill"></i>
                                                                            </div> --}}
                                                                        </div>
                                                                    </label>
                                                                    {{-- <input class="form-control d-none" value=""
                                                                        id="company-logo-input" type="file"
                                                                        accept="image/png, image/gif, image/jpeg"> --}}
                                                                </div>
                                                                <div class="avatar-lg p-1">
                                                                    <div class="avatar-title bg-light rounded-circle">
                                                                        <img src="{{ asset('assets/images/noimg.png') }}"
                                                                            id="company_logo"
                                                                            class="avatar-md rounded-circle object-cover" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h5 class="fs-13 mt-3" id="company_name">Company Logo</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="owner-field" class="form-label">Contract Start
                                                                Date</label>
                                                            <input type="text" name="contract_start"
                                                                class="form-control flatpickr-input active"
                                                                data-provider="flatpickr" placeholder="DD-MM-YY"
                                                                data-date-format="d M, Y" aria-label="Phone Number"
                                                                maxlength="10" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="industry_type-field" class="form-label">Contract
                                                                End Date</label>
                                                            <input type="text" name="contract_end"
                                                                class="form-control flatpickr-input active"
                                                                data-provider="flatpickr" placeholder="DD-MM-YY"
                                                                data-date-format="d M, Y" aria-label="Phone Number"
                                                                maxlength="10" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div>
                                                            <label for="since-field" class="form-label">Attach
                                                                Agreement</label>
                                                            <input type="file" name="agreement_file" id="since-field"
                                                                class="form-control" placeholder="Upload file" required />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="add-btn">Add
                                                        Agreement File</button>
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

                            <div class="modal fade" data-bs-backdrop="static" id="view_details" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content border-0">
                                        <div class="card mb-0">
                                            <div class="card-body pb-0 px-2 pt-1 bg-light">
                                                <div class="row mb-1">
                                                    <div class="col-md">
                                                        <div class="row align-items-center g-3">
                                                            <div class="col-md-auto">
                                                                <div class="avatar-md">
                                                                    <div class="avatar-title bg-white rounded-circle">
                                                                        <img src="" alt=""
                                                                            class="avatar-xs" id="logo_company">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md">
                                                                <div>
                                                                    <h4 class="fw-bold" id="agreement_name"></h4>
                                                                    <div class="hstack gap-3 flex-wrap">
                                                                        <div class="fs-11">
                                                                            <span>File - Type : <span
                                                                                    id="file_type"></span></span> |
                                                                            <span>Size : <span
                                                                                    id="file_size"></span></span>MB |
                                                                            <i
                                                                                class="ri-calendar-line align-bottom me-1"></i>
                                                                            <span class="fw-medium me-2" id="date">15
                                                                                Sep, 2022
                                                                            </span>
                                                                            <i class="ri-time-line align-bottom"></i> <span
                                                                                class="fw-medium me-2"
                                                                                id="time">10.30AM</span><i
                                                                                class=" ri-user-3-line align-bottom "></i>
                                                                            <span class="fw-medium"
                                                                                id="user">{{ Auth::user()->name }}</span>
                                                                        </div>


                                                                        <div class="vr"></div>
                                                                        <div class="badge rounded-pill bg-info fs-11">New
                                                                        </div>
                                                                        <div class="badge rounded-pill bg-danger fs-11">
                                                                            High</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-auto">
                                                        <div class="hstack gap-1 flex-wrap mt-2">
                                                            <button type="button"
                                                                class="btn py-0 fs-11 favourite-btn active">
                                                                <span class="fw-medium me-1"> Validity :
                                                                    <span class="text-muted" id="contract_start"></span> -
                                                                    <span class="text-muted" id="contract_end"></span>
                                                                </span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="card-body pb-5 px-4 ">
                                                <!-- <iframe src="" id="agreement_file_view"></iframe> -->
                                            </div>
                                            <div class="row p-2 me-2">
                                                <div class="col-lg-12 text-lg-end">
                                                    <button class="btn btn-light btn-border"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="company_save_success" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                                <h4 class="mb-5 mt-3 fs-20">Yeah !!! Company Saved Sucessfully.</h4> 
                                                <p class="text-muted fs-14 mb-5">Appreciate, You have added your client/company to your cloud. Now, We suggest to add location to this company for a seamless operation ahead.</p>
                                                
                                                <div class="hstack gap-2 justify-content-center">
                                                    <a href="{{route('add_organisation')}}"><button type="button" 
                                                        class="btn btn-soft-success"><i
                                                            class="ri-links-line align-bottom"></i> Add More
                                                        Company</button></a> 
                                                    <a href="{{route('add_location')}}"><button class="btn btn-primary"> Add
                                                            Location</button></a>
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
                                        <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="ri-eye-line me-2 align-middle"></i>View</a></li>
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
                        <img src="{{ asset('assets/images/no_company.jpg') }}" id="company_offcanvas_logo"
                            alt="" class="avatar-lg img-thumbnail rounded-circle mx-auto">
                        <div class="mt-3">
                            <h5 class="fs-15"><a href="javascript:void(0);" class="link-primary"
                                    id="company_offcanvas_name">Nancy Martino</a></h5>
                            <a href="http://" target="_blank" rel="noopener noreferrer">
                                <p class="text-muted" id="name_sub_website">Website Not Added</p>
                            </a>
                        </div>
                        <div class="hstack gap-2 justify-content-center mt-4">
                            <div class="avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-soft-secondary text-secondary rounded fs-16" id="facebook">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </div>
                            <div class="avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-soft-success text-success rounded fs-16" id="twitter">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </div>
                            <div class="avatar-xs">
                                <a href="javascript:void(0);" class="avatar-title bg-soft-info text-info rounded fs-16"
                                    id="linkedin">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </div>
                            <div class="avatar-xs">
                                <a href="javascript:void(0);"
                                    class="avatar-title bg-soft-danger text-danger rounded fs-16" id="instagram">
                                    <i class="ri-instagram-fill"></i>
                                </a>
                            </div>
                        </div>
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

                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Information</h6>
                        <p class="text-muted mb-4"><span id="about_company">NO INFORMATION ABOUT COMPANY</span></p>
                        <div class="table-responsive table-card">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-medium" scope="row">Industry Type</td>
                                        <td id="industry_type"></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Location</td>
                                        <td>No Location Added</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="fw-medium" scope="row">Employee</td>
                                        <td>10-50</td>
                                    </tr> --}}
                                    <tr>
                                        <td class="fw-medium" scope="row">Rating</td>
                                        <td id="company_rating"></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Website</td>
                                        <td>
                                            <a href="" class="link-primary text-decoration-underline"
                                                id="company_website"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium" scope="row">Contact Email</td>
                                        <td id="company_contact_email">No Contact Email Till! Please Add!</td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="fw-medium" scope="row">Since</td>
                                        <td>1995</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!--end offcanvas-body-->
                <div class="offcanvas-foorter border p-3 hstack gap-3 text-center position-relative">
                    <a href="" class="btn btn-primary w-100" id="view_profile"><i
                            class="ri-user-3-fill align-bottom ms-1"></i> View Profile</a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        var search = $('#search').val();
        if (search == "") {
            $().html("");

        }
        // 
        @if (Session::has('success'))
            var company_save_success = new bootstrap.Modal(document.getElementById('company_save_success'), {
                keyboard: false
            });
            company_save_success.show();
        @endif
    </script>

    <script src="assets/js/pages/crm-companies.init.js"></script>
    <script>
        function quick_view(e) {
            e.preventDefault();
            console.log(e.target.id);
            $.ajax({
                type: "get",
                url: e.target.id,

                success: function(response) {
                    var logo = response.logo;
                    console.log(response.logo);
                    $('#facebook').attr('href', response.facebook);
                    $('#linkedin').attr('href', response.linkedin);
                    $('#instagram').attr('href', response.instagram);
                    $('#twitter').attr('href', response.twitter);
                    $('#company_offcanvas_name').text(response.client_name);
                    if (logo == null || logo == "") {
                        $("#company_offcanvas_logo").attr('src', "/assets/images/no_company.jpg");
                    } else {
                        $("#company_offcanvas_logo").attr('src', "/assets/company_logo/" + response.logo);
                    }
                    $('#industry_type').text(response.industry);
                    $('#company_rating').text(response.company_rating).append(
                        '<span><i class="ri-star-fill text-warning align-bottom"></i></span>');
                    $('#name_sub_website').text(response.website);
                    $('#company_website').text(response.website);
                    $('#view_profile').attr('href', "/view-company-profile/" + response.company_id);
                    $("#profile_id").attr('src', response.company_id);
                    $("#about_company").text(response.about_client);
                    $("#offcanvasExample").offcanvas('show');
                }
            });
        }
    </script>
    <script>
        function agreement_view(e) {
            e.preventDefault();
            console.log(e.target.id);
            $.ajax({
                type: "get",
                url: e.target.id,

                success: function(response) {
                    console.log(response.logo);
                    if (response.logo == null) {
                        $('#logo_company').attr('src', "/assets/images/companies/no_company.png");
                    } else {
                        $('#logo_company').attr('src', "/assets/company_logo/" + response.logo);
                    }
                    // $('#agreement_file_view').attr('src', "/assets/agreement_file/" + response.agreement_file);
                    $('#agreement_name').text(response.agreement_file_name);
                    $('#file_name').text(response.file);
                    $('#file_type').text(response.file_ext);
                    $('#file_size').text(response.file_size);
                    $('#date').text(response.date);
                    $('#time').text(response.time);
                    $('#created_by').text(response.client_name);
                    $('#contract_start').text(response.contract_start);
                    $('#contract_end').text(response.contract_end);
                    $("#view_details").modal('show');
                }
            });
        }
    </script>
    <script>
        function agreement_add(e) {
            e.preventDefault();
            console.log(e.target.id);
            $.ajax({
                type: "get",
                url: e.target.id,

                success: function(response) {
                    console.log(response.agreement_file_name);
                    // $('#logo').text(response.file);
                    $('#agreement_name').text(response.agreement_file_name);
                    $('#company_name').text(response.client_name);
                    $('#url').attr('action', "/agreement_modal_post/" + response.company_id);
                    $("#agreement").modal('show');
                }
            });
        }
    </script>
    <script>
        var statusLinks = document.querySelectorAll('.status');

        for (var i = 0; i < statusLinks.length; i++) {
            statusLinks[i].addEventListener('click', function(event) {
                event.preventDefault();

                var choice = confirm(this.getAttribute('data-confirm'));

                if (choice) {
                    window.location.href = this.getAttribute('href');
                }
            });
        }
    </script>
@endsection

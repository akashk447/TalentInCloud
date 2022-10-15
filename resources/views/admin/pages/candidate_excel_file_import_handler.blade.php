@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ route('excel_db_import') }}" method="post" enctype="multipart/form-data" id="submit_form">
                @csrf
            <div class="row">
                <div class="col-md-4">
                        <input type="hidden" name="job_id" value="{{ $job_id }}">
                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-user-3-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="  fw-semibold fs-12 text-muted mb-0">Name</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index:9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="fullname" id="check_name" required>
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class="ri-mail-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="  fw-semibold fs-12 text-muted mb-0">Mail ID</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index:9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="email" id="check_email" required>
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-smartphone-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="  fw-semibold fs-12 text-muted mb-0">Mobile</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="mobile" id="check_mobile" required>
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-phone-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="  fw-semibold fs-12 text-muted mb-0">Alt Mobile</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="altmobile">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-phone-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Whatsapp</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="whatsapp">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-calendar-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Dob</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="dob">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-group-2-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Qualification</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="qual">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-building-3-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Company</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="company">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-user-2-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Designation</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="designation">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-map-pin-user-fill align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Location</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <select class=" form-select form-select-new" name="location">
                                                        <option value="" selected disabled>Select
                                                        </option>

                                                        <?php
                                                        $alphachar = array_merge(range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR']);
                                                        ?>
                                                        @foreach ($alphachar as $key)
                                                            <option value="{{ $key }}">
                                                                {{ $key }}</option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-number-1 align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">Start Index</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <input type="number" class="form-control form-index">


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card team-box card-animate mb-2">
                            <div class="card-body px-4">
                                <div class="border shadow-none" style="background-color:#EEEEEE">
                                    <div class="row d-flex align-items-center justify-content-between ">
                                        <div class="col-lg-5">
                                            <div>
                                                <div class="d-flex flex-row align-items-center ">
                                                    <div class="avatar-xs flex-shrink-0">
                                                        <span
                                                            class="avatar-title bg-light text-primary rounded-circle fs-3">
                                                            <i class=" ri-number-9 align-middle"></i>
                                                        </span>

                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="fw-semibold fs-12 text-muted mb-0">End Index</h6>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-1" style="z-index: 9999">
                                            <div class="right"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="background-color:#fff">
                                                <div class="d-flex flex-row align-items-center justify-content-between ">
                                                    <input type="number" class="form-control form-index">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        
                    
                </div>
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body table-responsive items" style="height:924px">
                            <table class="table table-bordered table-sm" style="white-space:nowrap;width:100%;">

                                <thead style="background-color: #cbcbcb;color:rgb(0, 0, 0);text-align:center">
                                    <?php
                                    $alphachar = array_merge(['SL No'], range('A', 'Z'), ['AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AZ']);
                                    ?>
                                    @foreach ($alphachar as $key)
                                        <th style="width:auto">{{ $key }}</th>
                                    @endforeach
                                </thead>
                                <tbody class="" style="overflow:scroll">

                                    @if (!empty($data))
                                        @php
                                            $total_row = 0;
                                        @endphp
                                        @foreach ($data as $row)
                                            @php
                                                $total_row++;
                                            @endphp
                                            <tr>
                                                <td
                                                    style="width:auto;background-color:#cbcbcb !important;color:rgb(0, 0, 0);text-align:center">
                                                    {{ $total_row }}</td>
                                                <td style="width:auto">{{ $row['r_cell1'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell2'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell3'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell4'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell5'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell6'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell7'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell8'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell9'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell10'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell11'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell12'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell13'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell14'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell15'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell16'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell17'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell18'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell19'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell20'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell21'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell22'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell23'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell24'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell25'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell26'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell27'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell28'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell29'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell30'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell31'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell32'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell33'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell34'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell35'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell36'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell37'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell38'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell39'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell40'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell41'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell42'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell43'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell44'] }}</td>
                                                <td style="width:auto">{{ $row['r_cell45'] }}</td>

                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>

                                            <td colspan="10">There are no data.</td>

                                        </tr>
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class=" d-flex align-items-center justify-content-center mt-2">
                            <input type="hidden" name="test" value="{{ serialize($data) }}">
                                <button type="button"  class="btn btn-outline-danger width-lg waves-effect waves-light me-3"
                                    onclick="history.back();" id="cancel_import">Cancel
                                    Import</button>
                                <button type="submit" class="btn btn-primary width-lg waves-effect waves-light me-4"
                                    id="continue">Continue</button>
                            
                        </div>
                    </div>
                </div>
                {{-- <div class="text-center mt-2 mb-4 ms-3"> --}}
                    {{-- <input type="hidden" name="extracted_data[]" value="{{$data}}"> --}}
                    
                {{-- </div> --}}
            </div>
            <input type="hidden" name="file_name" value="{{$file_name}}">
            <input type="hidden" name="source_time" value="{{$source_time}}">
            
        </form>
        </div>
    </div>
@endsection
@section('script')
    
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/profile.init.js') }}"></script>
    <script>
        const slider = document.querySelector('.items');
        let isDown = false;
        let startX;
        let scrollLeft;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            startX = e.pageX - slider.offsetLeft;
            scrollLeft = slider.scrollLeft;
        });
        slider.addEventListener('mouseleave', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });
        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - slider.offsetLeft;
            const walk = (x - startX) * 3; //scroll-fast
            slider.scrollLeft = scrollLeft - walk;
            console.log(walk);
        });
        $('#continue').click(function (e) { 
            
            e.preventDefault();
            var check_blank = 0;
            if ($('#check_name').val() == null) {
                check_blank++;
                Snackbar.show({
                    text: 'Assign Column For Candidate Name To Continue',
                    pos: 'bottom-center'
                });
                $('#check_name').focus();
            } else if ($('#check_email').val() == null) {
                check_blank++;
                Snackbar.show({
                    text: 'Assign Column For Candidate Email To Continue',
                    pos: 'bottom-center'
                });
                $('#check_email').focus();
            } else if ($('#check_mobile').val() == null) {
                check_blank++;
                Snackbar.show({
                    text: 'Assign Column For Candidate Mobile To Continue',
                    pos: 'bottom-center'
                });
                $('#check_mobile').focus();
            }
            if (check_blank == 0) {
                topbar.show()
                $('#continue').prop("disabled",true)
                $('#cancel_import').prop("disabled",true)
                
                $('#submit_form').submit();
            }
        });
    </script>
@endsection

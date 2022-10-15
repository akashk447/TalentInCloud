<ul class="nav nav-tabs nav-border-top nav-border-top-primary mb-3 fs-10"
                                                    role="tablist">
                                                    @php
                                                        $total_sourced = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_sourced)
                                                        @if ($count_sourced->screen_status == 'Sourced')
                                                            @php
                                                                $total_sourced++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item active">
                                                        <a class="nav-link ps-1" data-bs-toggle="tab" href="#sourced_tab"
                                                            role="tab" aria-selected="false">
                                                            Sourced <span
                                                                class="badge bg-primary rounded-circle">{{ $total_sourced }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_attempted = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_attempted)
                                                        @if ($count_attempted->screen_status == 'Attempted')
                                                            @php
                                                                $total_attempted++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1" data-bs-toggle="tab"
                                                            href="#attempted_tab" role="tab" aria-selected="false">
                                                            Attempted <span
                                                                class="badge bg-secondary rounded-circle">{{ $total_attempted }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_call_later = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_call_later)
                                                        @if ($count_call_later->screen_status == 'Call Later')
                                                            @php
                                                                $total_call_later++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1" data-bs-toggle="tab"
                                                            href="#call_later_tab" role="tab" aria-selected="false">
                                                            Call Later <span
                                                                class="badge bg-success rounded-circle">{{ $total_call_later }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_not_interested = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_not_interested)
                                                        @if ($count_not_interested->screen_status == 'Not Interested')
                                                            @php
                                                                $total_not_interested++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1 " data-bs-toggle="tab"
                                                            href="#not_interested_tab" role="tab"
                                                            aria-selected="true">
                                                            Not Interested <span
                                                                class="badge bg-danger rounded-circle">{{ $total_not_interested }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_interested = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_interested)
                                                        @if ($count_interested->screen_status == 'Interested')
                                                            @php
                                                                $total_interested++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1  " data-bs-toggle="tab"
                                                            href="#interested_tab" role="tab" aria-selected="true">
                                                            Interested <span
                                                                class="badge bg-warning rounded-circle">{{ $total_interested }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_submited = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_submited)
                                                        @if ($count_submited->screen_status == 'Submitted')
                                                            @php
                                                                $total_submited++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1  " data-bs-toggle="tab"
                                                            href="#submitted_tab" role="tab" aria-selected="true">
                                                            Submitted <span
                                                                class="badge bg-info rounded-circle">{{ $total_submited }}</span>
                                                        </a>
                                                    </li>
                                                    @php
                                                        $total_recommendation = 0;
                                                    @endphp
                                                    @foreach ($get_sourced_candidates as $count_recommendation)
                                                        @if ($count_recommendation->screen_status == 'Recommendation')
                                                            @php
                                                                $total_recommendation++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <li class="nav-item">
                                                        <a class="nav-link ps-1  " data-bs-toggle="tab"
                                                            href="#reference_tab" role="tab" aria-selected="true">
                                                            Recommendation <span
                                                                class="badge bg-dark rounded-circle">{{ $total_recommendation }}</span>
                                                        </a>
                                                    </li>

                                                    <li class="nav-item ms-auto c-pointer">
                                                        <span onclick="opencallmodal(event)"><i
                                                                class="ri-headphone-line align-middle fs-18 me-2"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title=""
                                                                data-bs-original-title="Call Candidate "></i></span>
                                                        <button
                                                            class="btn btn-soft-primary btn-icon waves-effect btn-sm dropdown"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false"><i
                                                                class="mdi mdi-dots-vertical"></i></button>
                                                        <div class="dropdown-menu dropdownmenu-primary">
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="offcanvas"
                                                                data-bs-target="#offcanvasRight"
                                                                aria-controls="offcanvasRight"> Add Candidate </a>
                                                            <a class="dropdown-item" href="upload-resume.php"> Upload
                                                                Entire Folder</a>
                                                            <a class="dropdown-item" href="upload-from-excel.php"> Import
                                                                Form Excel </a>
                                                            <a class="dropdown-item" href="search-from-database.php">
                                                                Source Form Database </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#change_another_joborder"> Change Mandates
                                                            </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="offcanvas" data-bs-target="#addreference"
                                                                aria-controls="addreference"> Add Reference </a>
                                                            <a class="dropdown-item" href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#transfer_candidate"> Transfer Candidate
                                                            </a>
                                                            <a class="dropdown-item" href="review-candidate.php"> Review
                                                                Candidate </a>
                                                            <a class="dropdown-item" href="#"
                                                                onClick="deleteMultiple()" id="close-modal"> Delete
                                                                Candidate </a>
                                                        </div>
                                                    </li>

                                                </ul>
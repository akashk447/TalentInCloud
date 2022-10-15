@php
error_reporting(0);
@endphp
@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content pt-75">
        <div class="container-fluid">

            <div class="card ">
                <div class="card-header add-manual p-3">
                    <h5 class="text-white font-w-600 ms-2 fs-20">Upload Candidates Resume </h5>
                    <p class="text-white font-w-600 ms-2 mb-0">Fill and Upload candidates resumes</p>
                </div>

                <div class="" id="showing_resume">
                    <div class="card-body ">
                        <div class="showing-card-body-resume">
                            <h4 class="mb-3 fs-17 ms-2">Showing {{ count($get_file_name) }} Resume</h4>
                            @foreach ($get_file_name as $file)
                                <div id="need_attention">
                                    <div id="need_attentionone">
                                        <small class="text-muted ms-2">Needs attention</small>
                                        <div class="card shadow-none border mt-2 border ms-2">
                                            <div class="d-flex align-items-start ms-1 me-1 mt-0 p-2">
                                                <i class="mdi mdi-account-circle c-pointer fs-20 text-muted"></i>
                                                <div class="w-100">
                                                    <h5 class="mt-0 ms-2 c-pointer">
                                                        {{ $file->candidate_resume_original }}<br><span
                                                            class="fs-10 text-muted">Upload successfully</span></h5>

                                                </div>

                                                <a
                                                    href="{{ route('delete_resume_parsed', ['canid' => $file->candidate_id, 'jobloop' => $file->last_hold_loop]) }}">
                                                    <small class="text-muted float-end c-pointer"><i
                                                            class="mdi mdi-delete-outline text-danger fs-20"
                                                            id="deleteConfirm"></i></small></a>

                                            </div>
                                            <div class="align-items-center upload-resume-successfull p-2">
                                                <div class="d-flex align-items-center justify-content-between ms-1 me-1">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="">
                                                            <i
                                                                class="mdi mdi-alert-circle-outline text-warning c-pointer fs-20 align-middle"></i>
                                                        </div>
                                                        <div>
                                                            <small class=" ms-2 c-pointer fs-12">Check the data entered
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <h6 class="c-pointer fs-13 mb-0"><a href="#" class="text-dark"
                                                                target="_blank">Edit profile <span><i
                                                                        class="mdi mdi-arrow-right text-primary"></i></span></a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                            @foreach ($get_duplicate_candidate as $duplicate_candidate)
                                <div id="completed_card">
                                    <div id="completed_cardone">
                                        <small class="text-muted ms-2">Duplicate Found
                                            ({{ count($get_duplicate_candidate) }})</small>
                                        <div class="card shadow-none border mt-2 border ms-2">
                                            <div class="d-flex align-items-start ms-1 me-1 mt-0 p-2">
                                                <i class="mdi mdi-account-circle c-pointer fs-20"></i>
                                                <div class="w-100">
                                                    @php
                                                        $resume = get_resume_name($duplicate_candidate->duplicate_with, $duplicate_candidate->job_id);
                                                    @endphp
                                                    <h5 class="mt-0 ms-2 c-pointer">{{ $resume }}<br><span
                                                            class="fs-10 text-muted">Error</span></h5>

                                                </div>

                                            </div>
                                            <div class="align-items-center complete-resume p-2">
                                                <div class="d-flex align-items-center justify-content-between ms-1 me-1">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="">
                                                            <i
                                                                class="mdi mdi-close text-primary c-pointer fs-20 align-middle"></i>
                                                        </div>
                                                        <div>
                                                            <small class="mt-2 ms-2 c-pointer fs-12 text-danger">Duplicate
                                                                Found
                                                            </small>
                                                        </div>
                                                    </div>
                                                    {{-- <div>
                                                    <h6 class="c-pointer fs-13 mb-0"><a href="#"
                                                            class="text-dark" target="_blank">Edit profile <span><i
                                                                    class="mdi mdi-arrow-right text-primary"></i></span></a>
                                                    </h6>
                                                </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endforeach
                        </div>

                        <div class="card-footer p-2 bg-light">
                            <!-- <hr class="border-hr"> -->
                            <div class="d-flex flex-row mt-1 justify-content-between">
                                <div class="">

                                    <a href="{{ route('discard_all_resume_parsed', ['jobloop' => $job_loop]) }}">
                                        <button type="button"
                                            class="btn alert-light btn-sm waves-effect waves-light text-dark"><i
                                                class="mdi mdi-delete-outline fs-15 me-1"></i> Discard All</button>
                                    </a>
                                </div>
                                <div class="">

                                    <small class="text-muted">Want to add more resumes to the list? <span><a
                                                href="{{ route('add_candidate_from_resume', ['jobid' => $job_id]) }}"><button
                                                    type="button"
                                                    class="btn alert-light btn-sm waves-effect waves-light text-dark"
                                                    id="backtouploadresume">Click Here</button></a></span></small>

                                </div>
                                <div class="">
                                    <a href="{{ route('manage_jobs') }}">
                                        <button type="button"
                                            class="btn btn-secondary btn-sm waves-effect waves-light">Done</button>
                                    </a>
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
    <script>
        $(document).ready(function() {
            @if (Session::has('success_delete'))
                Snackbar.show({
                    text: "{{ Session::get('success_delete') }}",
                    pos: 'bottom-center'
                });
            @endif
        });
    </script>
@endsection

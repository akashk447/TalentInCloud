@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content pt-75">
        <div class="container-fluid">
            <div class="card mb-2">
                <div class="upload-resumes" style="background: #405189">
                    <div class="d-flex flex-row align-items-center justify-content-start p-2">
                        <div class="">
                            <h5 class="text-white font-w-600  font-20">Import From CSV/Excel File</h5>
                            <p class="font-10 text-white font-w-600 mb-0">Please Select a CSV file to import</p>
                        </div>

                    </div>
                </div>

                <div>
                    <div class="card-body mb-4">
                        <!-- <input name="file"  type="file" multiple /> -->
                        <form action="{{route('process_candidate_from_excel')}}" id="excel_process" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- <input name="file1" type="file"  data-height="100" /> --}}
                            <input type="file" class="dropify" accept=".xls,.xlsx,.csv" data-height="300" id="open_file" name="excel_file"  />
                            <input type="hidden" name="job_id" value="{{$job_id}}">
                        </form>
                        {{-- <div class="row align-items-center mt-3">
                            <div class="col-lg-6  ">
                                <p class=" mb-0 font-20">...Or just import from your previous pending data</p>
                            </div>
                            <div class="col-lg-6  ">
                                <div class="form-group ">
                                    <select class="form-select" onchange="changevalue()" id="changingvalue">
                                        <option selected="">Open this select menu</option>
                                        <option value="one">One</option>
                                        <option value="one">Two</option>
                                        <option value="one">Three</option>
                                    </select>
                                </div>

                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>
            <div id="uploadfile" class="modal fade zoomIn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="zoomInModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body ">
                            <div class=" p-2 bg-light processing-file" id="overall_processing">
                                <div class="p-1 d-flex flex-row justify-content-center me-2 align-items-center">
                                    <div class="me-2 " id="allnotcheck">
                                        <!-- <div class="spinner-border text-primary spinner-border-sm me-2">
                                        </div> -->
                                        <span class="spinner-border spinner-border-sm flex-shrink-0" role="status">

                                        </span>
                                    </div>
                                    <div class="me-2 " id="allcheck1" style="display:none">
                                        <i class="ri-checkbox-circle-line me-2 text-success fs-13"></i>
                                        <!-- <span class="spinner-grow spinner-grow-sm flex-shrink-0" role="status">
                                                        </span> -->
                                    </div>
                                    <div class="">
                                        <h5 class="text-dark mb-0 fs-14" id="update_process">Processing , Please Wait</h5>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-center mt-3 mb-1" id="file_name"></h3>
                            <div class="ms-3 mb-1" id="uploadingfile">
                                <div class="d-flex flex-row align-items-center mt-3">
                                    <div class="me-2">
                                        <div class="spinner-border text-primary spinner-border-sm me-2">
                                        </div>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Uploading file </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="fileuploaded ms-3 mb-1" id="fileuploaded" style="display:none">
                                <div class="d-flex flex-row align-items-center mt-3 ">
                                    <div class="me-2">
                                        <i class="ri-checkbox-circle-line me-2 text-success fs-13"></i>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">File Uploaded</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="loadingtsheets ms-3 mb-1" id="loadingtsheets">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="me-2">
                                        <div class="spinner-grow spinner-grow-sm me-2"></div>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Parse Data </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="loadingtsheetsone ms-3  mb-1" id="loadingtsheetsone" style="display:none">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="me-2">
                                        <div class="spinner-border text-primary spinner-border-sm me-2">
                                        </div>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Parsing Data</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="loadingtsheetstwo ms-3 mb-1" id="loadingtsheetstwo" style="display:none">
                                <div class="d-flex flex-row align-items-center ">
                                    <div class="me-2">
                                        <i class="ri-checkbox-circle-line me-2 text-success fs-13"></i>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Data Parsed</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="selectsheets ms-3 mb-0" id="selectsheets">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="me-2">
                                        <div class="spinner-grow spinner-grow-sm me-2"></div>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Filtering Data</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="selectsheetsone ms-3 mb-0" id="selectsheetsone" style="display:none">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="me-2">
                                        <div class="spinner-border text-primary spinner-border-sm me-2"></div>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Serializing Data</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="selectsheetstwo ms-3 mb-0" id="selectsheetstwo" style="display:none">
                                <div class="d-flex flex-row align-items-center ">
                                    <div class="me-2">
                                        <i class="ri-checkbox-circle-line me-2 text-success fs-13"></i>
                                    </div>
                                    <div class="">
                                        <h5 class="mb-0 fs-14">Filteration & Serialization Done </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row align-items-center mt-3 justify-content-between  me-3">
                                <div class="ms-3">
                                    <button type="button" class="btn btn-outline-danger width-md waves-effect waves-light" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                <div id="processedbutton">
                                    <button type="button" id="processedbutton1" class="btn btn-primary width-md waves-effect waves-light" disabled>Processing...</button>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{-- <script src="{{asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script> --}}

    <script src="{{asset('assets/libs/dropify/js/dropify.min.js')}}"></script>
   
    
    <!-- Init js-->
    {{-- <script src="{{asset('assets/js/pages/form-file-upload.init.js')}}"></script> --}}
    <script>
        $('.dropify').dropify();
        
        $('#processedbutton1').click(function (e) { 
            e.preventDefault();
            $('#excel_process').submit();
        });
        function loadmodal() {

            var uploadingfile = $("#uploadingfile");
            var fileuploaded = $("#fileuploaded");
            var loadingtsheets = $("#loadingtsheets");
            var loadingtsheetsone = $("#loadingtsheetsone");
            var loadingtsheetstwo = $("#loadingtsheetstwo");
            var selectsheets = $("#selectsheets");
            var selectsheetsone = $("#selectsheetsone");
            var selectsheetstwo = $("#selectsheetstwo");
            var allnotcheck = $("#allnotcheck");
            var allcheck = $("#allcheck");
            var processedbutton = $("#processedbutton");
            var continuebutton = $("#continuebutton");
            fileuploaded.hide();
            loadingtsheetsone.hide();
            loadingtsheetstwo.hide();
            selectsheetsone.hide();
            selectsheetstwo.hide();
            continuebutton.hide();


            setTimeout(function() {
                uploadingfile.hide();
                fileuploaded.show();
                setTimeout(function() {
                    loadingtsheets.hide();
                    loadingtsheetsone.show();
                    setTimeout(function() {
                        loadingtsheetsone.hide();
                        loadingtsheetstwo.show();
                        setTimeout(function() {
                            selectsheets.hide();
                            selectsheetsone.show();
                            setTimeout(function() {
                                selectsheetsone.hide();
                                selectsheetstwo.show();
                                setTimeout(function() {
                                    allnotcheck.hide();
                                    allcheck.show();
                                    $("#processedbutton1").prop('disabled',
                                        false);
                                        $("#processedbutton1").text('Continue')
                                        $('#update_process').html('<i class="ri-checkbox-circle-line me-2 text-success fs-13"></i>'+"Processed.. Please Continue");
                                }, 100)
                            }, 3000)
                        }, 100)
                    }, 3000)


                }, 100)

            }, 2000)
        }
        $(document).ready(function() {
            $('#open_file').change(function(e) {
                $("#processedbutton1").prop('disabled', true);

                $('#file_name').text("Importing... " + $(this).val().replace(/C:\\fakepath\\/i, ''));
                var myModal = new bootstrap.Modal(document.getElementById('uploadfile'), {
                    keyboard: false
                });
                loadmodal();

                myModal.show(400);
            });
        });
    </script>
@endsection

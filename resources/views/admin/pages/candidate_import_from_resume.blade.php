@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content pt-75">
        <div class="container-fluid">
            
            <div class="card mb-2">
                <form action="{{ route('parse_candidate_from_resume') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job_id }}">
                    <div class="card-header add-manual p-3">
                        <h5 class="text-white font-w-600 ms-2 fs-20">Upload Candidates Resume</h5>
                        <p class="text-white font-w-600 ms-2 mb-0">Fill and Upload candidates resumes</p>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title text-dark mt-2 ms-2 mb-3">Select resumes to convert into smart cards</h4>
                        
                        <input type="file" class="filepond" name="file[]" multiple data-max-file-size="1024MB"
                            data-max-files="50" id="resume_upload" />

                    </div>
                    <div class="card-footer p-2">
                        <div class="col-12">
                            <div class="text-center">
                                <button type="button" onclick="history.back();"
                                    class="btn btn-outline-danger btn-animation waves-effect waves-light"
                                    data-text="Previous"><span>Back</span></button>

                                <button type="submit" class="btn btn-secondary btn-animation waves-effect waves-light"
                                    data-text="Upload" disabled id="upload_resume"><span>Upload</span></button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- filepond js -->
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.min.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
    <script>
        /*
                                    We want to preview images, so we need to register the Image Preview plugin
                                    */
        FilePond.registerPlugin(

            // encodes the file as base64 data
            FilePondPluginFileEncode,

            // validates the size of the file
            FilePondPluginFileValidateSize,

            FilePondPluginFileValidateType,

            // corrects mobile image orientation
            FilePondPluginImageExifOrientation,

            // previews dropped images
            FilePondPluginImagePreview
        );
        FilePond.create(document.querySelector('.filepond'), {
            acceptedFileTypes: ['application/pdf', 'application/msword', 'application/rtf'],
            fileValidateTypeDetectType: (source, type) =>
                new Promise((resolve, reject) => {
                    // Do custom type detection here and return with promise

                    resolve(type);
                }),
            allowFileEncode: true,
            storeAsFile: true,

            // onprocessfilestart: (file) => {
            //     topbar.show();
            // },

            onupdatefiles: (files) => {
                console.log("adsasd");
                $('#upload_resume').attr('disabled', false);
            },
            onprocessfiles:()=>console.log("files"),
            onremovefile: function(error, file) {
                Snackbar.show({
                    text: 'File Removed !',
                    pos: 'bottom-center'
                });
            },
            // onprocessfiles: () => {
            //     console.log('onprocessfiles');
            //     $('#upload_resume').attr('disabled', false);
            //     topbar.hide();

            // },
        });
        
    </script>
    <script>
        // $('.dropify').dropify({
        //     messages: {
        //         'default': 'Drag and drop resumes here or click to select',
        //         'replace': 'Click upload to proceed further.',
        //         'remove': 'Remove',
        //         'error': 'Ooops, something wrong happended.'
        //     },
        //     tpl: {

        //         filename: '<p class="dropify-filename">All files attached successfully</p>',

        //     }
        // });
    </script>
@endsection

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Talent In Cloud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- jsvectormap css -->
    <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

   

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/snackbar.min.css') }}">
    <script src="{{ asset('assets/js/snackbar.min.js') }}"></script>
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (request()->routeIs('add_jobs'))
        <link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.snow.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/libs/quill/quill.bubble.css') }}">

    {{-- <link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css"> --}}
    <link rel="stylesheet" href="{{asset('assets/libs/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/dropzone/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('assets/libs/aos/aos.css')}}" />
    {{-- For File Pond  --}}
    <!-- Filepond css -->
    <link rel="stylesheet" href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css">
    <link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
    <link rel="stylesheet" href="{{asset('assets/timer/compiled/flipclock.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('assets/libs/filepond/filepond.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}"> --}}
    


</head>

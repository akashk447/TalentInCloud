    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/topbar.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/skylo.js') }}"></script> --}}
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

    <!-- apexcharts -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/libs/jsvectormap/maps/world- merc.js') }}"></script> --}}

    <!--Swiper slider js-->
    <script src="{{ asset('assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    @if (request()->routeIs('add_jobs'))
        <script src="{{ asset('assets/libs/cleave.js/cleave.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/form-masks.init.js') }}"></script>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    {{-- <script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script> --}}
    {{-- <script src="{{asset('assets/multi/js/index.js')}}"></script> --}}
    <script></script>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            aboutText: 'ssdsd',
            introMessage: "✋ Hi! I'm form Tutsmake.org"
        };
    </script>
   
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}
    {{-- <script>
        function doesConnectionExist() {
            var xhr = new XMLHttpRequest();
            var file = "https://app.talentincloud.com";
            var randomNum = Math.round(Math.random() * 10000);

            xhr.open('HEAD', file, true);
            xhr.send();

            xhr.addEventListener("readystatechange", processRequest, false);
            
            

            function processRequest(e) {
                if (xhr.readyState == 4) {
                    if (xhr.status >= 200 && xhr.status < 304) {
                        sessionStorage.removeItem('active')
                            Snackbar.show({
                                text: 'Valid Internet connection',
                                pos: 'bottom-center'
                            });
                       
                    } else {
                        sessionStorage.setItem("active", "yes");
                        Snackbar.show({
                            text: 'No valid Internet connection',
                            pos: 'bottom-center'
                        });
                    }
                }
            }
        }
        setInterval(() => {
            doesConnectionExist();
        }, 10000);
    </script> --}}
    <script>
        topbar.config({
            autoRun: true,
            barThickness: 5,
            barColors: {
                '0': 'rgba(26,  188, 156, .9)',
                '.25': 'rgba(52,  152, 219, .9)',
                '.50': 'rgba(241, 196, 15,  .9)',
                '.75': 'rgba(230, 126, 34,  .9)',
                '1.0': 'rgba(211, 84,  0,   .9)'
            },
            shadowBlur: 10,
            shadowColor: 'rgba(0,   0,   0,   .6)'
        })

        // topbar.show();
        // setTimeout(() => {
        //     topbar.hide()
        // }, 3000);
        // function checkNetConnection() {
        //     jQuery.ajaxSetup({
        //         async: false
        //     });
        //     re = "";
        //     r = Math.round(Math.random() * 10000);
        //     $.get("https://app.talentincloud.com", {
        //         // subins: r
        //     }, function(d) {
        //         re = true;
        //     }).error(function() {
        //         re = false;
        //     });
        //     return re;
        // }
        // setInterval(() => {
        //     var check = checkNetConnection();
        //     if(!check){
        //         Snackbar.show({
        //             text: 'No valid Internet connection',
        //             pos: 'bottom-center'
        //         });
        //     }
        //     else{
        //         Snackbar.show({
        //             text: 'You are online now',
        //             pos: 'bottom-center'
        //         });
        //     }
        // }, 2000);
        $('#log-off').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "Your current session will be cleared, and you will need to log in again",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: 'green',
                confirmButtonText: 'Yes, Log Off ',
                cancelButtonText: 'Stay Logged In'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.href = "{{ route('log_out') }}"
                }
            })
        });
    </script>
    <script type="text/javascript">
        var timeleft = 3000;
        var downloadTimer = setInterval(function() {
            timeleft--;
            // console.log(timeleft);
            if (timeleft <= 0)
                location.reload();
        }, 1000);
        $('body').click(function(e) {
            // e.preventDefault();
            timeleft = 3000;
        });
        $('body').keyup(function(e) {
            // e.preventDefault();
            timeleft = 3000;
        });

       
    </script>

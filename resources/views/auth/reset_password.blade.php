<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Reset Password Email Template</title>
    <meta name="description" content="Reset Password Email Template.">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/topbar.js')}}"></script>
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
   </script>
   <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }

        .custom-field {
            position: relative;
            font-size: 14px;
            border-top: 20px solid transparent;
            margin-bottom: 5px;
            --field-padding: 12px;
        }

        .custom-field input {
            border: none;
            -webkit-appearance: none;
            -ms-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: #f2f2f2;
            padding: 10px;
            border-radius: 3px;
            width: 250px;
            outline: none;
            font-size: 20px;
            text-align: center
        }

        .custom-field .placeholder {
            position: absolute;
            left: var(--field-padding);
            width: calc(100% - (var(--field-padding) * 2));
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            top: 22px;
            line-height: 100%;
            transform: translateY(-50%);
            color: #aaa;
            transition:
                top 0.3s ease,
                color 0.3s ease,
                font-size 0.3s ease;
        }

        .custom-field input.dirty+.placeholder,
        .custom-field input:focus+.placeholder,
        .custom-field input:not(:placeholder-shown)+.placeholder {
            top: -10px;
            font-size: 10px;
            color: #222;
        }

        .custom-field .error-message {
            width: 100%;
            display: flex;
            align-items: center;
            padding: 0 8px;
            font-size: 12px;
            background: #d30909;
            color: #fff;
            height: 24px;
        }

        .custom-field .error-message:empty {
            opacity: 0;
        }

        /* ONE */
        .custom-field.one input {
            background: none;
            border: 2px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .custom-field.one input+.placeholder {
            left: 8px;
            padding: 0 5px;
        }

        .custom-field.one input.dirty,
        .custom-field.one input:not(:placeholder-shown),
        .custom-field.one input:focus {
            border-color: #222;
            transition-delay: 0.1s
        }

        .custom-field.one input.dirty+.placeholder,
        .custom-field.one input:not(:placeholder-shown)+.placeholder,
        .custom-field.one input:focus+.placeholder {
            top: 0;
            font-size: 10px;
            color: #222;
            background: #fff;
            width: auto
        }

        /* TWO */
        .custom-field.two input {
            border-radius: 0;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            background:
                linear-gradient(90deg, #222, #222) center bottom/0 0.15em no-repeat,
                linear-gradient(90deg, #ccc, #ccc) left bottom/100% 0.15em no-repeat,
                linear-gradient(90deg, #fafafa, #fafafa) left bottom/100% no-repeat;
            transition: background-size 0.3s ease;
        }

        .custom-field.two input.dirty,
        .custom-field.two input:not(:placeholder-shown),
        .custom-field.two input:focus {
            background-size: 100% 0.15em, 100% 0.1em, 100%;
        }

        /* THREE */
        .custom-field.three {
            --draw-duration: 0.1s;
            --draw-color: #222;
            --draw-line-width: 2px;
            --draw-easing: linear;
        }

        .custom-field.three .border {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            transform: none;
            display: flex;
            align-items: center;
            padding-left: 12px;
            borde-radius: 3px;
        }

        .custom-field.three .border::after,
        .custom-field.three .border::before {
            content: "";
            width: 0;
            height: 0;
            display: inline-block;
            position: absolute;
            border-radius: 3px;
        }

        .custom-field.three .border::before {
            left: 0;
            bottom: 0;
            border-right: 0px solid var(--draw-color);
            border-bottom: 0px solid var(--draw-color);
            transition:
                border 0s linear calc(var(--draw-duration) * 4),
                height var(--draw-duration) var(--draw-easing) calc(var(--draw-duration) * 2),
                width var(--draw-duration) var(--draw-easing) calc(var(--draw-duration) * 3);
        }

        .custom-field.three .border::after {
            right: 0;
            top: 0;
            border-left: 0px solid var(--draw-color);
            border-top: 0px solid var(--draw-color);
            transition:
                border 0s linear calc(var(--draw-duration) * 2),
                height var(--draw-duration) var(--draw-easing),
                width var(--draw-duration) var(--draw-easing) var(--draw-duration);
        }

        .custom-field.three input:focus~.border::before,
        .custom-field.three input:not(:placeholder-shown)~.border::before,
        .custom-field.three input.dirty~.border::before,
        .custom-field.three input:focus~.border::after,
        .custom-field.three input:not(:placeholder-shown)~.border::after,
        .custom-field.three input.dirty~.border::after {
            width: 100%;
            height: 100%;
            border-width: var(--draw-line-width);
        }

        .custom-field.three input:not(:placeholder-shown)~.border::before,
        .custom-field.three input.dirty~.border::before,
        .custom-field.three input:focus~.border::before {
            transition-delay: 0s, var(--draw-duration), 0s;
        }

        .custom-field.three input:not(:placeholder-shown)~.border::after,
        .custom-field.three input.dirty~.border::after,
        .custom-field.three input:focus~.border::after {
            transition-delay:
                calc(var(--draw-duration) * 2),
                calc(var(--draw-duration) * 3),
                calc(var(--draw-duration) * 2);
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <!--100% body table-->
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="{{route('login')}}" title="logo" target="_blank">
                                <img style="width: 267px;height:90px" src="{{ asset('assets/images/logo-dark.png') }}"
                                    title="logo" alt="logo">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1
                                            style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">
                                            You have
                                            requested to reset your password</h1>
                                        {{-- <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span> --}}
                                        <label class="custom-field two " >
                                            <input style="margin-top: 20px;color:#455056" type="email" placeholder="&nbsp;" value="{{$email}}" />
                                            {{-- <span class="placeholder">Enter URL</span> --}}
                                          </label>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin-top:20px;">
                                            We cannot simply send you your old password. A unique link to reset your
                                            password has been generated for you. To reset your password, click the
                                            following link and follow the instructions.
                                        </p>
                                        
                                        <a href="#!" id="send-link"
                                            style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                            Password</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p
                                style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">
                                &copy; <strong>www.talentincloud.com</strong></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!--/100% body table-->
</body>
<script>
    $('#send-link').click(function (e) { 
        e.preventDefault();
        topbar.show();
        $.ajax({
            type: "get",
            url: "/reset-password-send/{{$email}}",
            success: function (response) {
                if(response=="sent"){
                    topbar.hide();
                    alert('New password page will be here');
                }else{
                    topbar.hide();
                    alert('something went wrong');
                }
            }
        });
    });
</script>
</html>

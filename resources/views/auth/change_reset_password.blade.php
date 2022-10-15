<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm.png') }}">
    <title>Change Password - Talent In Cloud</title>
    <style>
        body {
            background: #f9f9f9;
            font: 16px 'Helvetica Neue', Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        .panel {
            background: #f9f9f9;
            margin: 40px auto;
            width: 300px;
            border: 1px solid #46464C;
            border-radius: 3px;
            padding: 40px;
            /* box-shadow: 1px 3px #26272C; */
        }

        .panel__avatar {
            background: #fff;
            /* border: 2px solid #46393D; */
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 40px;
            display: block;
        }

        .inputs__item {
            padding-bottom: 40px;
        }

        .inputs__label {
            color: #A64C41;
            display: block;
        }

        .inputs__input {
            border: none;
            border-bottom: 1px solid #6B6C70;
            background: #f9f9f9;
            display: block;
            width: 100%;
            padding: 10px 0;
            font: 16px 'Helvetica Neue', Helvetica, sans-serif;
            color: #A64C41;
        }

        .inputs__input:focus {
            outline: none;
        }

        .inputs__item--new .inputs__label,
        .inputs__item--new .inputs__input {
            color: #6498BB;
        }

        .inputs__item--cta {
            text-align: center;
            padding-bottom: 0;
            padding-top: 20px;
        }

        .btn {
            border: none;
            background: #A64C41;
            color: #C8BDA0;
            font-size: 20px;
            border-radius: 3px;
            padding: 12px 50px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="panel">
        <img class="panel__avatar"
            src="{{asset('assets/images/reset.png')}}" alt="avatar" />
        <form action="" method="post" class="inputs">
            
            <div class="inputs__item inputs__item--new">
                <label for="new-password" class="inputs__label">New password</label>
                <input type="password" name="new_password" class="inputs__input" id="new-password" value="password" />
            </div>
            <div class="inputs__item inputs__item--new">
                <label for="new-password" class="inputs__label">Confirm New password</label>
                <input type="password" name="confirm_new_password" class="inputs__input" id="confirm-new-password" value="password" />
            </div>
            <div class="inputs__item inputs__item--cta">
                <input type="submit" class="btn" value="RESET" />
            </div>
        </form>
    </div>
</body>

</html>

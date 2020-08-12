<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Login page</title>
</head>
<body>

</body>

<div >
    <h1>~USER MANAGEMENT~</h1>
    <img src="../Public/img/user-management.jpg" alt="logo" width="120px" height="80px">
    <div class="login">
        <form method="post" action="{{ url('login/login') }}">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

            @if($errors->has('not_login'))
                <div style="color: red"><h2>* {{ $errors->first('not_login') }}</h2></div>
            @endif

            <div class="field">

                <label for="email"><strong>Email: </strong></label><br>
                <input type="text" id="email" name="email">
                @if($errors->has('email'))
                    <div style="color: red">* {{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="field">

                <label for="password"><strong>Password: </strong></label><br>
                <input type="password" id="password" name="password" >
                @if($errors->has('password'))
                    <div style="color: red">* {{ $errors->first('password') }}</div>
                @endif
            </div>
            <div>
                <input type="submit" name="login" value="login" class="button">
            </div>
            </body>
            </html>

        </form>

        <a href="https://www.facebook.com/v7.0/dialog/oauth?
        response_type=code&
        client_id=711452766301403&
        redirect_uri=https://quanly.com/login/index&
        state=eciphp&
        scope=email&
        auth_type=rerequest">
            <img src="../Public/img/loginFB.png" alt="login facebook" width="200px" height="50px"></a>
    </div>
</div>
</body>

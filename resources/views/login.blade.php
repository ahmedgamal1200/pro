<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <title>Login</title>

    <!-- استدعاء الملفات من فولدر front -->
    <link rel="stylesheet" href="{{ asset('front/sign.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/bootstrap.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400&display=swap" />
</head>
<body>

<div class="sign-in">
    <div class="web-title-wrapper">
        <bre style="color: #db1bbe;" class="get">GET JOB</bre>
    </div>
    <div class="welcome-back-parent">
        <div class="welcome-back">Welcome Back</div>
        <form action="{{ route('login') }}" method="post">
            @csrf
         <div class="frame-parent">
            <div class="email">
                <p>Email :</p>
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="password">
                <p>Password :</p>
                <input type="password" placeholder="Password" name="password">
            </div>
            <button type="submit" class="sign-in1">Sign in</button>

            <div class="dont-have-an-container">
                <span>Don’t have an account?</span>
                <a class="sign" href="{{ route('register') }}" style="text-decoration: none;"> Sign Up</a>
            </div>
         </div>

        </form>
    </div>

    <!-- استدعاء ملفات الجافاسكربت -->
    <script src="{{ asset('front/popper.min.js') }}"></script>
    <script src="{{ asset('front/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('front/bootstrap.js') }}"></script>
    <script src="{{ asset('front/main.js') }}"></script>

</body>
</html>

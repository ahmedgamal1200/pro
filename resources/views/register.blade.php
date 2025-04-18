<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <!-- استدعاء ملفات CSS من فولدر front -->
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/bootstrap.css') }}">

    <!-- روابط خارجية -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>

<body>
<div class="nav">
    <div class="get">GET JOP</div>
</div>

<div class="container">
    <div class="right">
        <h1>Find the Best Jobs in Egypt</h1>
        <ul class="job-list">
            <li>Apply for jobs easily</li>
            <li>Receive alerts for the best jobs</li>
            <li>Get discovered by top companies</li>
            <li>Explore the right jobs & career opportunities</li>
        </ul>
        <p class="trusted">Trusted by over <strong>45,000 companies</strong></p>
    </div>

    <div class="left">
        <h2>Create an Account</h2>
        <p>Please enter your data</p>


        <form action="{{ route('register') }}" method="POST">
            @csrf

            <!-- إظهار الأخطاء الخاصة بكل حقل -->
            @if ($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif
            <input class="box name" type="text" placeholder="YOUR NAME" name="name" required>

            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif
            <input class="box email" type="email" placeholder="EMAIL" name="email" required>

            @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif
            <input class="box password" type="password" placeholder="PASSWORD" name="password" required>

            @if ($errors->has('user_type'))
                <div class="error">{{ $errors->first('user_type') }}</div>
            @endif
            <select id="dropdown" name="type">
                <option name="type">Have a Business or Company</option>
                <option name="type">Search About jobs</option>
            </select>

            <button class="b5" type="submit">Create Account</button>
        </form>

        <!-- عرض الأخطاء العامة إذا كانت موجودة -->
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <p>Already have an account? <a class="a1" href="sign.html">Sign in</a></p>
    </div>
</div>

<!-- استدعاء ملفات JS من فولدر front -->
<script src="{{ asset('front/popper.min.js') }}"></script>
<script src="{{ asset('front/jquery-3.7.1.js') }}"></script>
<script src="{{ asset('front/bootstrap.js') }}"></script>
<script src="{{ asset('front/main.js') }}"></script>

</body>
</html>

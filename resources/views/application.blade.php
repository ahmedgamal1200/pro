<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('front/application/style.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Airstrike:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gotham+Pro:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />
    <link rel="stylesheet" href="{{ asset('front/application/bootstrap.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="ss">
    <div class="navbar">
        <div>
            <div class="web-title-wrapper">
                <bre style="color: #db1bbe;" class=" get">GET JOB</bre>
            </div>
        </div>
        <div>
            <div class="menu">
                <a href="{{ route('posts.index') }}">HOME</a>
                <a href="{{ route('showApplications') }}">JOBS</a>
                <a href="{{ route('users.profile') }}">PROFILE</a>
            </div>
        </div>
    </div>

    <div class="list">
        <h2>LISTS OF APPLICANT</h2>
        @foreach($app as $data)
        <div class="member">
            <img class="user-img" src="{{ asset('img/' . $data->image)  }}">
            <pre class="user-name">{{ $data->name }}</pre>
            <div class="mem">
                <div class="view">
                    <a href="{{ route('applicants.show', $data->id )}}" style="text-decoration: none;">View</a>
                </div>

                <div class="chat">
                    <a href="" style="text-decoration: none;">Chat</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="footer">
        <div class="foo">
            <div class="web-title-wrapper">
                <bre style="color: #db1bbe;" class=" get">GET JOB</bre>
            </div>
        </div>

        <div class="co">
            <div class="row">
                <div class="col-4">
                        <pre class="foo2">
                            <strong>supervision</strong>
                            Dr.Mohamed Abdelrahman
                        </pre>
                </div>
                <div class="col-4">
                        <pre class="foo3">
                            <strong>prepared by</strong>
                            Mohamed Ashraf
                            Yasmin Elbana
                        </pre>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</div>

<!-- JS Files -->
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="{{ asset('front/application/main.js') }}"></script>
</body>
</html>

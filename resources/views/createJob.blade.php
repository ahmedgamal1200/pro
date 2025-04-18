<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">
    <title>Create New Job</title>

    <link rel="stylesheet" href="{{ asset('front/create-job/style.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Airstrike:wght@400&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Gotham+Pro:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap" />
    <link rel="stylesheet" href="{{ asset('front/create-job/bootstrap.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="ss">
    <div class="navbar">
        <div class="web-title-wrapper">
            <span style="color: #db1bbe;" class="get">GET JOB</span>
        </div>
        <div class="menu">
            <a href="{{ route('posts.index') }}">HOME</a>
            <a href="{{ route('showApplications') }}">JOBS</a>
            <a href="{{ route('users.profile') }}">PROFILE</a>
        </div>
    </div>

    <div class="HOME" id="home">
        <div class="content">
            <h1 class="name" id="name">All Jobs</h1>

            <form action="{{ route('createJob') }}" method="POST" enctype="multipart/form-data" style="max-width: 500px; margin: 0 auto; text-align: center;">
                @csrf
                <div class="job-item" style="display: flex; flex-direction: column; gap: 30px; align-items: center;">
                    <label for="name" style="font-size: 18px; color: #db1bbe;">
                        <strong>Name:</strong>
                        <input type="text" id="name" name="name" style="padding: 15px; font-size: 18px; border: 1px solid #db1bbe; border-radius: 5px; width: 100%; max-width: 400px;">
                    </label>

                    <label for="job_title" style="font-size: 18px; color: #db1bbe;">
                        <strong>Job Title:</strong>
                        <input type="text" id="job_title" name="job_title" style="padding: 15px; font-size: 18px; border: 1px solid #db1bbe; border-radius: 5px; width: 100%; max-width: 400px;">
                    </label>

                    <label for="type" style="font-size: 18px; color: #db1bbe;">
                        <strong>Type:</strong>
                        <input type="text" id="type" name="type" style="padding: 15px; font-size: 18px; border: 1px solid #db1bbe; border-radius: 5px; width: 100%; max-width: 400px;">
                    </label>

                    <label for="requirements" style="font-size: 18px; color: #db1bbe;">
                        <strong>Requirements:</strong>
                        <textarea id="requirements" name="requirements" style="padding: 15px; font-size: 18px; border: 1px solid #db1bbe; border-radius: 5px; width: 100%; max-width: 400px; height: 150px;"></textarea>
                    </label>

                    <label for="requirements" style="font-size: 18px; color: #db1bbe;">
                        <strong>Upload Image:</strong>
                    <input type="file" name="image" id="image" accept="image/*" required style="padding: 15px; font-size: 18px; border: 1px solid #db1bbe; border-radius: 5px; width: 100%; max-width: 400px; height: 150px;"><br>
                </div>

                <button type="submit" style="padding: 15px 25px; background-color: #db1bbe; color: white; border: none; border-radius: 5px; font-size: 18px; cursor: pointer;">
                    Save Changes
                </button><br><br>
            </form>
        </div>







        <div class="manag" id="manag">
            <div class="edite1"></div>
            <div class="btn">
                <i class="fa-solid fa-list" id="hid1"></i>
                <div class="edite" id="edite1">Edit</div>
            </div>
            <div class="Owner">
                <h6>Owners</h6>
                <pre id="Owner-content">Mohamed Ashraf</pre>
                <textarea id="Owner-input"></textarea>
            </div>
            <div class="Manager">
                <h6>Managers</h6>
                <pre id="Manager-content">Mohamed Ashraf, Rokaia Shahin</pre>
                <textarea id="Manager-input"></textarea>
            </div>
            <div class="Team">
                <h6>Team Members</h6>
                <pre id="Team-content">Yomna, Yasmeen</pre>
                <textarea id="Team-input"></textarea>
            </div>
            <div class="Contact">
                <h6>Contact Numbers</h6>
                <pre id="Contact-content">0100-----------</pre>
                <textarea id="Contact-input"></textarea>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="foo">
            <div class="web-title-wrapper">
                <span style="color: #db1bbe;" class="get">GET JOB</span>
            </div>
        </div>
        <div class="co">
            <div class="row">
                <div class="col-4">
                        <pre class="foo2">
                            <strong>Supervision</strong>
                            Dr. Mohamed Abdelrahman
                        </pre>
                </div>
                <div class="col-4">
                        <pre class="foo3">
                            <strong>Prepared by</strong>
                            Mohamed Ashraf, Yasmin Elbana
                        </pre>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="{{ asset('front/create-job/main.js') }}"></script>
</body>
</html>

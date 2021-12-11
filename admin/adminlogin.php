<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/normalize.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
    <section>
        <div class="col-sm-12 padd-lr-off">

            <header >
                <h1>Q-u-i-z</h1>
            </header>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="main">
                    <div class="title">
                        <h4>
                            Admin Sign In
                        </h4>
                    </div>
                    <div class="container" style="display:contents;">
                        <form action="" method="post" autocomplete="off">
                            <div class="username">
                                <label for="name">Username</label>
                                <input type="text" name="name" id="username" placeholder="Enter your username"
                                    required="text">
                            </div>
                            <div class="password">
                                <label for="pass">Password</label>
                                <input type="text" name="pass" id="password" placeholder="Enter your password"
                                    required="password">
                            </div>
                            <div class="submission">
                                <button type="submit" id="submit" onclick="sendlogin();">Sign-In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </section>
    <script type="text/javascript">
        function sendlogin() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var token = "<?php echo password_hash("logintoken",PASSWORD_DEFAULT);?>"
            if (username != "" & password != "") {
                $.ajax(
                    {
                        type: 'Post',
                        url: "ajax/login.php",
                        data: { username: username, password: password, token: token },
                        success: function (data) {
                            if (data == 0) {
                                // alert('login successfull');
                                window.location = "adduniversity.php";
                            }
                            else {
                                alert(data)
                            }
                        }
                    });
            } else {
                alert("Please fill all the fields")
            }
        }
    </script>
    <script type="text/javascript">
        $('form').submit(function (e) {
            e.preventDefault();
        });
    </script>
</body>

</html>
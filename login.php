<!DOCTYPE html class="h-100">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Forgot Password System</title>
</head>

<body class="bg-info">
    <div class="container text-center">
        <div class="row h-100 align-items-center">
            <div class="col-m-5 mx-auto">
                <form action="" class="card text-left py-3">
                    <p id="feedback"></p>
                    <div class="card-body">
                        <h1 class="mb-2">Login</h1>
                        <label for="email mt-5">Email Address</label>
                        <div class="form-group">
                            <input type="email" name="" id="email" class="form-control" placeholder="Email">
                        </div>
                        <label for="password">Password</label>
                        <div class="form-group">
                            <input type="password" name="" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <small>
                                <a href="http://devbox.com/forgotPasswordSystem/forgot-password.php">Forgot your
                                    password? </a>
                            </small>
                        </div>
                        <button type="button" class="btn alert alert-danger px-5 btn-block">Login </button>
                        <div class="form-group mt-3 text-center">
                            <small>Don't have an account?<a href="http://devbox.com/forgotPasswordSystem/sign-up.php"
                                    for="button" class="text-danger">
                                    Sign up</a>
                            </small>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="./js/main.js"></script>
</body>

</html>
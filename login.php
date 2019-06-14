<?php require 'header.php'; ?>
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
<?php require 'footer.php'; ?>
<?php require 'header.php'; ?>
<div class="container text-center">
    <div class="row h-100 align-items-center">
        <div class="col-md-5 mx-auto">
            <form id="login-form" class="card text-left py-3 needs-validation">
                <div class="card-body">
                    <h1 class="mb-2">Login</h1>
                    <div class="invalid-feedback text-center my-3" id="main_feedback">
                        Fields cannot be empty.
                    </div>
                    <label for="email mt-5">Email Address</label>
                    <div class="form-group">
                        <input type="email" name="email" id="loginEmail" class="form-control" placeholder="Email"
                            required>
                        <div class="email_error invalid-feedback">
                            Please provide your email
                        </div>
                    </div>
                    <label for="password">Password</label>
                    <div class="form-group">
                        <input type="password" name="password" id="loginPassword" class="form-control"
                            placeholder="Password" required>
                        <div class="password_error invalid-feedback">
                            Please provide a password
                        </div>
                    </div>
                    <div class="form-group">
                        <small>
                            <a href="http://devbox.com/forgotPasswordSystem/forgot-password.php">Forgot your
                                password? </a>
                        </small>
                    </div>
                    <button type="button" id="loginBtn" class="btn alert alert-danger px-5 btn-block">Login</button>
                    <div class=" form-group mt-3 text-center">
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
<?php require 'header.php'; ?>
<div class="container text-center">
    <div class="row h-100 align-items-center">
        <div class="col-md-5 mx-auto">
            <form action="" class="needs-validation card text-left py-3" id="form" novalidate>
                <div class="card-body">
                    <h1 class="mb-3">Sign Up</h1>
                    <div class="invalid-feedback text-center" id="main_feedback">
                        Fields cannot be empty.
                    </div>
                    <label for="name">Full Name</label>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
                        <div class="name_error invalid-feedback">
                            Please provide your full name
                        </div>
                    </div>
                    <label for="email">Email Address</label>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                        <div class="email_error invalid-feedback">
                            Please provide your email
                        </div>
                    </div>
                    <label for="password">Password</label>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                            required>
                        <div class="password_error invalid-feedback">
                            Please provide a password
                        </div>
                    </div>
                    <label for="confirm-password">Confirm Password</label>
                    <div class="form-group mb-4">
                        <input type="password" name="confirm-password" id="confirm-password" class="form-control"
                            placeholder="Password" required>
                        <div class="confirm_password_error invalid-feedback mb-3">
                            Please confirm password
                        </div>
                    </div>
                    <button type="submit" class="btn alert alert-danger px-5 btn-block">Create
                        Account</button>
                    <div class="form-group mt-3 text-center">
                        <small>Already have an account?
                            <a href="http://devbox.com/forgotPasswordSystem/login.php" for="button" class="text-danger">
                                Sign in
                            </a>
                        </small>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<?php require 'header.php'; ?>
<div class="container text-center">
    <div class="row mt-5 pt-5">
        <div class="col-md-5 mx-auto">
            <form action="" class="card text-left py-3">
                <div class="col-md-6 text-center mx-auto">
                    <img src="images/logo.png" class="img-fluid" alt="logo">
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="email" name="" id="email" class="text-center form-control"
                            placeholder="Your email address">
                    </div>
                    <p id="feedback"></p>
                    <div class="text-center mt-3">
                        <button type="button" class="btn alert btn-primary btn-block">Reset my
                            Password</button>
                        <small>
                            <a href="http://devbox.com/forgotPasswordSystem/login.php">
                                <i class="fa fa-arrow-left"></i> Return to HomePage
                            </a>
                        </small>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<?php require 'header.php'; ?>
<div class="container h-100 row align-items-center w-100 mx-auto justify-items-center">
    <div class="card w-100 shadow-lg px-5 pb-5">
        <div class="d-flex justify-content-end pt-4">
            <div class="alert alert-warning rounded rounded-circle pt-1 px-2">
                <a href="./sign-up.php" title="Dashboard">
                    <i class="fa fa-home mt-2"></i>
                </a>
            </div>
            <div class="alert alert-primary rounded rounded-circle pt-1 px-2 mx-3">
                <a href="./sign-up.php" title="Sign Out">
                    <i class="fas fa-sign-out-alt mt-2"></i>
                </a>
            </div>
            <div class="alert alert-danger rounded rounded-circle pt-1 px-2">
                <a href="./sign-up.php" title="Settings">
                    <i class="fas fa-cog mt-2"></i>
                </a>
            </div>
        </div>
        <p class="ml-5 pl-3">Welcome,</p>
        <h3 class="mb-5 ml-5 pl-3" id="loggedUser">
            User</h3>
        <div class="grid">
            <div class="row">
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fas fa-user-tag rounded rounded-circle alert alert-primary p-3"></i>
                    <h5>Discounts</h5>
                </div>
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fa fa-id-badge rounded-circle alert alert-success p-4"></i>
                    <h5>Profile</h5>
                </div>
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fa fa-users rounded-circle alert alert-danger p-3"></i>
                    <h5>Colleagues</h5>
                </div>
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fas fa-folder-plus rounded-circle alert alert-warning p-3"></i>
                    <h5>Documents</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fa fa-clipboard rounded-circle alert alert-danger p-3"></i>
                    <h5>Checklists</h5>
                </div>
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="far fa-clock rounded-circle alert alert-info p-3"></i>
                    <h5>Time Off</h5>
                </div>
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fa fa-building rounded-circle alert alert-primary p-4"></i>
                    <h5>Company</h5>
                </div>
                <div class="col-md-3 display-4 text-center p-0 mb-4">
                    <i class="fas fa-chart-line rounded-circle alert alert-success p-3"></i>
                    <h5>Reports</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
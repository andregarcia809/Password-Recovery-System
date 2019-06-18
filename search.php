<?php require 'header.php'; ?>
<div class="container text-center">
    <div class="row h-100 align-items-center">
        <div class="col-md-9 mx-auto">
            <h1 class="mb-3 ml-3">Searcher</h1>
            <form class="needs-validation card text-left alert alert-primary" id="searchForm" novalidate>
                <div class="invalid-feedback text-center" id="main_feedback">
                    Fields cannot be empty.
                </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <input type="text" name="query" id="query" class="form-control"
                            placeholder="Search Colleagues...." required>
                    </div>
                    <div class="col-md-4">
                        <select name="column" id="column" class="form-control">
                            <option value="">Select Filter</option>
                            <option value="firstName"> First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="email">Email</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit"
                            class="btn alert alert-info w-100 text-center d-flex justify-content-center m-0"
                            id="searchBtn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--    <link rel="stylesheet" href="/server/App/static/style.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Register</title>
</head>
<body>
<div class="container" id="conRegister">

    <form action="/user/create" class="was-validated" method="post" id="regForm">
        <div class="form-group card-body">
            <div class="card-title">
                <h2 class="">Registration form</h2>
            </div>

            <div class="col-md-6">
                <label for="uname" class="col-sm-2 col-form-label">Username:</label>
                <input type="text" class="form-control" id="uname" placeholder="Enter username" name="name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-6">
                <label for="email" class="col-sm-2 col-form-label"> Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter E-mail" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-6">
                <label for="pwd" class="col-sm-2 col-form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-6">
                <select class="form mb-3 form-select" aria-label="Default select example" name="gender_id">
                    <option selected>Select gender status</option>
                    <option value="0">Not known</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="9">Not applicable</option>
                </select>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                <label class="form-check-label g-recaptcha" for="myCheck"
                       data-sitekey="6LfPh0UhAAAAAPPUx5BXJ_pBpY0H61hUN6p1tdSB">I dont robot.</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Registration</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>
<?php
if (@!$_POST["g-recaptcha-response"]) {
    exit("Вы еще не зарегестрированы");
} else {
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $key = "6LfPh0UhAAAAABpHPT3OBj-RXdFJWBoOCReY6wcZ";
    $query = array(
        "secret" => $key,
        "response" => $_POST["g-recaptcha-response"],

    );
}
//?>
<!--<script src="/server/App/static/register.js"></script>-->
<script async src="https://www.google.com/recaptcha/api.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

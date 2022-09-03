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
    <title>Register</title>
</head>
<body>
<div class="container" id="conRegister">

    <form action="/user/update" class="was-validated" method="post" id="regForm">
        <div class="form-group card-body">
            <div class="card-title">
                <h2 class="">Edit form</h2>
            </div>
            <input type="hidden" value="<?= $id ?? ''?>" name="id">
            <div class="col-md-6">
                <label for="uname" class="col-sm-2 col-form-label">Username:</label>
                <input type="text" class="form-control" id="uname" value="<?= $name ?? ''?>" name="name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-6">
                <label for="email" class="col-sm-2 col-form-label"> Email:</label>
                <input type="email" class="form-control" id="email" value="<?= $email ?? ''?>" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-6">
                <label for="pwd" class="col-sm-2 col-form-label">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter new password" name="pass" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="col-6">
                <?php
                    $gender_id = isset($gender_id) ? (int) $gender_id : -1;
                ?>
                <select class="form mb-3 form-select" aria-label="Default select example" name="gender_id">
                    <option><?= ($gender_id < 0 || $gender_id > 3) ? 'selected ' : '' ?>Select gender status</option>
                    <option <?= $gender_id === 0 ? 'selected ' : '' ?>value="0">Not known</option>
                    <option <?= $gender_id === 1 ? 'selected ' : '' ?>value="1">Male</option>
                    <option <?= $gender_id === 2 ? 'selected ' : '' ?>value="2">Female</option>
                    <option <?= $gender_id === 3 ? 'selected ' : '' ?>value="9">Not applicable</option>
                </select>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                <label class="form-check-label" for="myCheck">I agree on blabla.</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
<!--<script src="/server/App/static/register.js"></script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

<script>

    // $('#regForm').on('submit', function (e) {
    //     e.preventDefault()
    //     let $form = $(this),
    //         name = $form.find("input[name='name']").val(),
    //         email = $form.find("input[name='email']").val(),
    //         password = $form.find("input[name='password']").val(),
    //         gender = $form.find("select[name='gender']").val(),
    //         url = $form.attr("action");
    //     $.post(
    //         url,
    //         {gender: gender, email: email, password: password, submit: 'submit'},
    //         function (data, status) {
    //             $('.success').text("Status: " + status);
    //         }
    //     );
    //     console.log(123);
    //     $('input').eq(0).val('');
    //     $('input').eq(1).val('');
    //
    //
    // })
</script>
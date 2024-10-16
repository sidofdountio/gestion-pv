<?php

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../../css/style.css">

    <title>CHORISTE-LOGIN</title>
</head>

<body>
    <div class="container">
        <div class="row pt-3 mt-5 ">
            <div class="col-md-4">
                <h3 class="text-primary">GESTION PV LOGIN</h3>
                <p>
                    
                </p>
            </div>
            <div class="col-md-8 p-4">
                <form class="row g-3 needs-validation" method="post" action="login.php" novalidate>
                    <?php
                    if (isset($error) && count($error) > 0) {

                        foreach ($error as $message) {
                            echo '<div class="alert alert-danger">' . $message . '</div> ';
                        }
                    }
                    ?>
                    <div class="col-md-12">
                        <label for="validationCustom01" class="form-label">User email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="examp@gmail.com" required>
                        <div class="valid-feedback">
                            Please provide email.
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please provide valid password!
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary submit p-2" type="submit" name="valid_form">Log In</button>
                    </div>
                    <div class="col-lg-12">
                        <p>
                            If you not yet have an account
                            <a href="http://localhost/gestion-pv/pages/auth/register.php" class="btn btn-warning"> registe here</a>
                        </p>
                    </div>
                    <div class="col-12">

                        <p class="form-label">
                            <a href="#" class="btn btn-primary">Forgot password</a>
                        </p>

                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../js/bootstrap.bundle.min.js" ></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>
<?php

require '../../db/connection.php';

if (isset($_POST['registe_valid_forms'])) {
    $SQL_numberOfUser = 'SELECT COUNT(*) FROM users';
    $numberOfUser = $PDO->query($SQL_numberOfUser);
    $n = $numberOfUser->fetch(PDO::FETCH_COLUMN);
    // LIMITE NUMBER OF USERS.
    if ($n >= 4) {
        $error[] = " <b class='text-uppercase'>This app</b> can't have only 4 users.";
    } else {
        if (
            isset($_POST['email']) && !empty(isset($_POST['email'])) &&
            isset($_POST['password']) && !empty(isset($_POST['password']))
        ) {

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $pass_hash = password_hash($password, PASSWORD_BCRYPT);
            // $date = date('Y-m-d H:i:s');
            $date = date('Y-m-d');


            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $SQL_SELECT = 'SELECT * FROM users WHERE email=:email';
                $req = $PDO->prepare($SQL_SELECT);
                $req->bindParam(':email', $email);
                $req->execute();

                if ($req->rowCount() == 0) {

                    $SQL_INSERT = "INSERT INTO users(email,password,create_at) VALUES (:email,:password,:create_at)";

                    try {
                        $REQ_INSERT = $PDO->prepare($SQL_INSERT);
                        $PARAM = [
                            ":email" => $email,
                            ":password" => $pass_hash,
                            ":create_at" => $date
                        ];
                        $REQ_INSERT->execute($PARAM);

                        header('Location: login.php');
                        $message[] = "Users account has been created successfuly !<br> Youn cant log now!";
                    } catch (PDOException $e) {
                        // echo "ERROR".$e->getMessage();
                        $error[] = "Email already exist ... !";
                    }
                } else {
                    $error[] = "A user already exist wuth this email addresse !";
                }
            } else {
                $error[] = "Email address is not valid";
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="login.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <?php
        echo "<div>";
        print_r($_POST);
        echo "</div>";
        ?>
        <div class="row pt-5 mt-5 shadow-none p-3 mb-5 rounded">
            <div class="col-lg-4 p-4">
                <h3 class="text-primary">Register</h3>

            </div>
            <div class="col-lg-8 p-4 login-form">
                <form class="row g-3 needs-validation p-4" method="post" action="register.php" novalidate>

                    <?php
                    if (isset($message)) {

                        foreach ($message as $message) {
                            echo '<div class="alert alert-success">' . $message . '</div>';
                        }
                    }
                    if (isset($error) && count($error) > 0) {

                        foreach ($error as $message) {
                            echo '<div class="alert alert-danger">' . $message . '</div> ';
                        }
                    }
                    ?>
                    <div class="col-md-12 mb-2">
                        <label for="validationCustom01" class="form-label">User email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="examp@gmail.com" required>
                        <div class="valid-feedback">
                            Please provide email.
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <div class="invalid-feedback">
                            Please provide valid password!
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <button class="btn btn-primary submit" type="submit" name="registe_valid_forms">Create user account</button>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-12">
                            <p>Already have an account ?<a class="btn btn-link" href="http://localhost/gestion-pv/pages/auth/login.php">Log to the app</a></p>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../../js/bootstrap.bundle.min.js"></script>

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
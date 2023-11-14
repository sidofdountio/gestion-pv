<?php
require '../db/connection.php';
require '../config/utils.php';



if (isset($_POST['valid_form'])) {
    if (
        isset($_POST['email']) && !empty(isset($_POST['email'])) &&
        isset($_POST['password']) && !empty(isset($_POST['password']))
    ) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $pass_hash = password_hash($password, PASSWORD_BCRYPT);

        $SQL = 'SELECT * FROM users WHERE email = ?';


        $req = $PDO->prepare($SQL);
        $req->bindParam(1, $email);
        $req->execute();

        // if(filter_var($email,FILTER_VALIDATE_EMAIL));

        if ($req->rowCount() > 0) {
            $users = $req->fetch(PDO::FETCH_OBJ);

            if (password_verify($password, $users->password)) {

                init_php_session();
                // echo $users->password;
                $_SESSION['email'] = $email;
                header('Location: ../index.php');
            } else {
                $error[] = "Wrong email or password !";
            }
        } else {
            $error[] = "Wrong email or password !";
        }
    } else {
        $error[] = "Email and password are required !";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="../css/style.css">
    <title>CHORISTE-LOGIN</title>
</head>

<body>
    <div class="container">
        <div class="row pt-3 mt-5 shadow-none p-3 mb-5 bg-light rounded">
            <div class="col-lg-5 p-4">
                <h3 class="text-primary">CHORISTE LOGIN</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
            <div class="col-lg-7 p-4">
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
                        <button class="btn btn-primary submit p-2" type="submit" name="valid_form">Connect to the app</button>
                    </div>
                    <div class="col-lg-12">
                        <p>
                            If you not yet have an account
                            <a href="http://localhost/presence-management/pages/register.php" class="btn btn-warning"> registe here</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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
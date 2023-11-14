<?php
require '../db/connection.php';
require '../config/utils.php';
init_php_session();
is_logged();


$uploadDir = "images/";


if (isset($_POST['addChoristeForm'])) {

    if (
        isset($_POST['firstName']) ||
        isset($_POST['lastName']) ||
        isset($_POST['addresse']) ||
        isset($_POST['phone']) ||
        isset($_POST['email']) ||
        isset($_POST['sexe']) ||
        isset($_POST['image'])

    ) {

        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $addresse = trim($_POST['addresse']);
        $company = trim($_POST['company']);
        $phone = trim($_POST['phone']);
        $image = trim($_POST['image']);
        $sexe = trim($_POST['sexe']);

        if (
            !empty($firstName) && !empty($lastName) && !empty($email) && !empty($addresse) && !empty($sexe)
            && !empty($phone) && !empty($_FILES['image']['name'])
        ) {

            $uploadFile = "";

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Invalid email";
            } else {

                $uploadStatus = 1;
                if (!empty($_FILES['image']['name'])) {
                    // PATH INFO
                    $fileName = basename($_FILES['image']['name']);
                    $targetFilePath = $uploadDir . $fileName;
                    $fileType = pathinfo($targetFileDir, PATHINFO_EXTENSION);

                    if (file_exists($targetFilePath)) {
                        $error[] = "Sorry, File already exist !";
                        $uploadStatus = 0;
                    } else {
                        if ($_FILES['image']['size'] > 500000) {
                            $error[] = "Sorry, Your file is too large!";
                            $uploadStatus = 0;
                        } else {
                            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                            if (in_array($fileType, $allowTypes)) {
                                $error[] = "Sorry ! only JPG, PNG AND JPEG are allowed";
                                $uploadStatus = 0;
                            } else {

                                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                                    $uploadFile = $fileName;
                                    $uploadStatus = 1;
                                } else {
                                    $error[] = "Sorry! an error occured";
                                    $uploadStatus = 0;
                                }
                            }
                        }
                    }
                }

                if ($uploadStatus == 1) {


                    $SQL1 = 'SELECT * FROM choriste WHERE email=:email';
                    $Req = $PDO->prepare($SQL1);
                    $Req->bindParam(":email", $email);
                    $Req->execute();
                    if ($Req->rowCount() == 0) {

                        $INSERT = 'INSERT INTO choriste (firstName,lastName,email,sexe,addresse,phone,company,image) 
                            VALUES (:firstName,:lastName,:email,:sexe,:addresse,:phone,:company,:image)';
                        try {
                            $req1 = $PDO->prepare($INSERT);
                            $PARAM = [
                                ":firstName" => $firstName,
                                ":lastName"  => $lastName,
                                ":email"     => $email,
                                ":sexe" => $sexe,
                                ":addresse"  => $addresse,
                                ":phone"  => $phone,
                                ":company" => $company,
                                ":image"  => $_FILES['image']['name']
                            ];

                            $req1->execute($PARAM);
                            // $error[] = "ok";
                            header('Location: http://localhost/presence-management/');
                        } catch (PDOException $th) {
                            //throw $th;
                            $error[] = $th;
                        }
                    } else {
                        $error[] = "An choriste whit this email already exist !";
                    }
                }
            }
        } else {
            $error[] = "All field are requiered";
        }
    }
}


?>


<!-- HEADER START -->

<?php require '../partials/header.php'; ?>
<!-- CSS  -->
<link rel="stylesheet" href="../css/style.css">

<title>Presence-management</title>
</head>
<!-- HEADER END -->

<body>

    <!--Navbar section start-->
    <?php include("../partials/navbar.php") ?>

    <!--Navbar-section end-->
    <!--Sidebar section start-->

    <?php include('../partials/sidebar.php') ?>

    <!--sidebar section end-->
    <!--Main section start-->

    <main class="pt-5 mt-5">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-uppercase text-primary">Add choriste /</h5>
                </div>
                <div class="col-lg-6 mb-2">
                    <h5 class="text-primary">organisation, <?php echo $_SESSION['email']  ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="container ">
                    <form autocomplete="off" class="row g-3 needs-validation shadow-sm p-3 mb-5 bg-body rounded" method="POST" action="addChoriste.php" novalidate enctype="multipart/form-data">

                        <?php
                        if (isset($error) && count($error) > 0) {

                            foreach ($error as $message) {
                                echo '<div class="alert alert-danger">' . $message . '</div> ';
                            }
                        }
                        ?>
                        <div class="col-lg-6 col-md-6">

                            <div class="mb-2">
                                <label for="validationCustom01" class="form-label">First name</label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="first Name" required>
                                <div class="valid-feedback">
                                    Please provide first name.
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="validationCustom01" class="form-label">Last name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="last Name" required>
                                <div class="valid-feedback">
                                    Please provide last name.
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="validationCustom02" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="examp@gmail.com" required>
                                <div class="valid-feedback">
                                    Please provide email.
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="validationCustom03" class="form-label">Address</label>
                                <input type="text" class="form-control" id="addresse" name="addresse" placeholder=" rond point express" required>
                                <div class="valid-feedback">
                                    Please provide address.
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="mb-2">
                                <label for="validationCustom04" class="form-label">Phone number</label>

                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+237 696444654" required>
                                <div class="valid-feedback">
                                    Please provide phone number.
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="validationCustom06" class="col-form-label">Sexe</label>
                                <select name="sexe" id="sexe" class="form-select" required>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                                <div class="valid-feedback">
                                    Please provide a company.
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="validationCustom05" class="form-label">Company</label>
                                <input type="text" class="form-control" id="company" name="company" placeholder="Your company or school" required>
                                <div class="valid-feedback">
                                    Please provide a company.
                                </div>
                            </div>

                            <div class="mb-2">
                                <label for="validationCustom06" class="form-label">Select image</label>

                                <input type="file" name="image" id="image" class="form-control" required>
                                <div class="valid-feedback">
                                    Please provide a image.
                                </div>
                            </div>
                            <div class="mb-2">
                                <button class="btn btn-primary" type="submit" name="addChoristeForm">add choriste</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>



    </main>
    <!--Main section end-->

    <!-- JS SOURCE -->
    <script src="../js/chart.js"></script>
    <script src="../js/script.js"></script>
    <script>



    </script>

    <!-- Food start -->
    <?php include('../partials/footer.php') ?>
    <!-- Food end -->
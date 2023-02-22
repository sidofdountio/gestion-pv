<?php
require '../db/connection.php';
require '../config/utils.php';
init_php_session();
is_logged();


$choristeId = $_GET['choristeId'];
$SQL = 'SELECT * FROM choriste WHERE choristeId=:choristeId';
$req = $PDO->prepare($SQL);
$req->bindParam(":choristeId", $choristeId);
$req->execute();
$choristeToUpdate = $req->fetch(PDO::FETCH_OBJ);

if (isset($_POST['editeChoristeForm'])) {
    // print_r($_POST);
    if (
        isset($_POST['firstName']) ||
        isset($_POST['lastName']) ||
        isset($_POST['addresse']) ||
        isset($_POST['phone']) ||
        isset($_POST['sexe']) ||
        isset($_POST['email'])

    ) {
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);
        $email = trim($_POST['email']);
        $addresse = trim($_POST['addresse']);
        $company = trim($_POST['company']);
        $phone = trim($_POST['phone']);
        $sexe = trim($_POST['sexe']);
        $choristeId = trim($_POST['choristeId']);

        if (
            !empty($firstName) && !empty($lastName) && !empty($email) && !empty($addresse)
            && !empty($phone) && !empty($sexe)
        ) {
            $error[] = "ok not empty";
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "Invalid email";
            } else {

                $SQLUPDATE = 'UPDATE choriste SET  firstName=:firstName, lastName=:lastName, email=:email, addresse=:addresse,phone=:phone,company=:company,sexe=:sexe  WHERE choristeId =:choristeId';

                $reqU = $PDO->prepare($SQLUPDATE);
                $PARAM = [
                    ":firstName" => $firstName,
                    ":lastName"  => $lastName,
                    ":email"     => $email,
                    ":sexe"     => $sexe,
                    ":addresse"  => $addresse,
                    ":phone"  => $phone,
                    ":company" => $company,
                    ":choristeId" => $choristeId
                ];

                $reqU->execute($PARAM);
                // $error[] = "ok ok";
                header("Location: http://localhost/presence-management/pages/listOfChoriste.php");
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

    <main class="">
        <div class="container ">
            <div class="row pt-5 mt-5 ">
                <div class="col-lg-6">
                    <h5 class="text-uppercase text-primary">Add choriste /</h5>
                </div>
                <div class="col-lg-6 mb-2">
                    <h5 class="text-primary">organisation, <?php echo $_SESSION['email']  ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="container ">
                    <form autocomplete="off" class="row g-3 needs-validation shadow-sm p-3 mb-5 bg-body rounded" method="POST" action="editeChoriste.php">

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
                                <input type="text" class="form-control" value="<?= $choristeToUpdate->firstName; ?>" id="firstName" name="firstName" placeholder="first Name">

                            </div>
                            <div class="mb-2">
                                <label for="validationCustom01" class="form-label">Last name</label>
                                <input type="text" class="form-control" value="<?= $choristeToUpdate->lastName; ?>" id="lastName" name="lastName" placeholder="last Name">
                                <input type="hidden" value="<?= $choristeToUpdate->choristeId; ?>" id="choristeId" name="choristeId">
                            </div>

                            <div class="mb-2">
                                <label for="validationCustom02" class="form-label">Email</label>
                                <input type="text" class="form-control" value="<?= $choristeToUpdate->email; ?>" id="email" name="email" placeholder="examp@gmail.com">

                            </div>

                            <div class="mb-2">
                                <label for="validationCustom03" class="form-label">Address</label>
                                <input type="text" class="form-control" value="<?= $choristeToUpdate->addresse; ?>" id="addresse" name="addresse" placeholder=" rond point express">

                            </div>

                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="mb-2">
                                <label for="validationCustom06" class="form-label">Sexe</label>
                                <input type="tel" class="form-control" value="<?= $choristeToUpdate->sexe; ?>" id="sexe" name="sexe" placeholder="example: Male">
                            </div>
                            <div class="mb-2">
                                <label for="validationCustom04" class="form-label">Phone number</label>
                                <input type="tel" class="form-control" value="<?= $choristeToUpdate->phone; ?>" id="phone" name="phone" placeholder="+237 696444654">
                            </div>

                            <div class="mb-2">
                                <label for="validationCustom05" class="form-label">Company</label>
                                <input type="text" class="form-control" value="<?= $choristeToUpdate->company; ?>" id="company" name="company" placeholder="Your company or school">

                            </div>

                            <div class="mb-2">
                                <button class="btn btn-primary" type="submit" name="editeChoristeForm">Valid</button>
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
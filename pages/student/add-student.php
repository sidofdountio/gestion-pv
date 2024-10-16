<!-- HEADER START -->
<?php require '../../partials/header.php'; ?>
<!-- CSS  -->
<link rel="stylesheet" href="../../css/style.css">
<title>Add-New-student</title>
</head>
<!-- HEADER END -->

<body>

    <!--Navbar section start-->
    <?php include("../../partials/navbar.php") ?>

    <!--Navbar-section end-->
    <!--Sidebar section start-->

    <?php include('../../partials/sidebar.php') ?>

    <!--sidebar section end-->
    <!--Main section start-->

    <main class="pt-5 mt-5">
        <div class="container ">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-uppercase text-primary">Add New Student /</h5>
                </div>
                <div class="col-lg-6 mb-2">
                    <h5 class="text-primary">organisation, <?php echo $_SESSION['email']  ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="container ">
                    <form autocomplete="off" class=" p-3" method="POST" action="add-student.php" novalidate enctype="multipart/form-data">
                        <?php
                        if (isset($error) && count($error) > 0) {

                            foreach ($error as $message) {
                                echo '<div class="alert alert-danger">' . $message . '</div> ';
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col">
                                <div class="mb-2">
                                    <label for="name" class="form-label">First Name</label>
                                    <input type="text " class="form-control" id="firstName"  >
                                </div>
                                <div class="mb-2">
                                    <label for="name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" >
                                </div>
                            </div>
                            <div class="col">

                            </div>
                        </div>



                    </form>
                </div>

            </div>
        </div>



    </main>
    <!--Main section end-->

    <!-- JS SOURCE -->
    <script src="../../js/script.js"></script>
    <script>



    </script>

    <!-- Food start -->
    <?php include('../../footer.php') ?>
    <!-- Food end -->
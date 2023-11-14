<?php
require '../db/connection.php';
require '../config/utils.php';
require '../service/choristeService.php';

init_php_session();
is_logged();

$SQL = 'SELECT * FROM choriste';
$req = $PDO->prepare($SQL);
$req->execute();

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
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-uppercase text-primary">list of choriste /</h5>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-primary">Organisation, <?php echo $_SESSION['email']  ?></h5>
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-lg-4 col-md-3 mb-2 ">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h2 class="mb-1 fw-bold"><?= $NUMBEROFCHORISTE ?></h2>
                                    <div class="mb-1">Number of chorister</div>
                                </div>
                                <div class="widget pt-5">
                                    <span class="material-symbols-sharp">person_filled</span>
                                </div>
                            </div>
                            <div class="row">
                                <span class="material-symbols-sharp text-warning">upgrade</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 mb-2">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h4 class="mb-1 fw-bold"><?=$NUMBEROFMALE?></h4>
                                    <div class="mb-1">Male choriste</div>
                                </div>
                                <div class="pt-5">
                                    <span class="material-symbols-sharp">person_filled</span>
                                </div>
                            </div>

                            <div class="row">
                                <span class="material-symbols-sharp text-warning">upgrade</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h4 class="mb-1 fw-bold"><?= $NUMBEROFFEMALE ?> </h4>
                                    <div class="mb-1 p-1">Female choriste</div>
                                </div>
                                <div class="pt-5">
                                    <span class="material-symbols-sharp">person_filled</span>
                                </div>
                            </div>

                            <div class="row">
                                <span class="material-symbols-sharp text-warning">upgrade</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <?php 
                        if(isset($error) && count($error) >0){
                            foreach($error as $message){
                                echo "<div class='alert alert-success'>".$message."</div>";
                            }
                        }
                        ?>
                        <div class="card card-header">
                            <a href="http://localhost/presence-management/pages/addChoriste.php" class="btn btn-info"> add choriste</a>
                        </div>
                        <div class="card card-body">
                            <div class="table-responsive">
                                <table id="listOfChoriste" class="display" style="width:100%">
                                    <thead class="">
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Email</th>
                                            <th>Sexe</th>
                                            <th>Phone number</th>
                                            <th>Addresse</th>
                                            <th>Company</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php while ($choriste = $req->fetch(PDO::FETCH_OBJ)) : ?>

                                            <tr>
                                                <td><?= $choriste->choristeId; ?></td>
                                                <td><?= $choriste->firstName; ?></td>
                                                <td><?= $choriste->lastName; ?></td>
                                                <td><?= $choriste->email; ?></td>
                                                <td><?= $choriste->sexe; ?></td>
                                                <td><?= $choriste->phone; ?></td>
                                                <td><?= $choriste->addresse; ?></td>
                                                <td><?= $choriste->company; ?></td>
                                                <td><img class="profile" src="../pages/images/<?= $choriste->image; ?>" alt="<?= $choriste->firstName ?>" srcset=""></td>
                                                <td>
                                                    <a href="editeChoriste.php?choristeId=<?= $choriste->choristeId; ?>" class="btn btn-primary">Edite</a>
                                                    <a href="deleteChoriste.php?choristeId=<?= $choriste->choristeId; ?>" onclick=" confirm('Are you sure you want to delete this entry');" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>First name</th>
                                            <th>Last name</th>
                                            <th>Email</th>
                                            <th>Sexe</th>
                                            <th>Phone number</th>
                                            <th>Addresse</th>
                                            <th>Company</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $('#listOfChoriste').DataTable();
        });
    </script>


    <!-- Food start -->
    <?php include('../partials/footer.php') ?>
    <!-- Food end -->
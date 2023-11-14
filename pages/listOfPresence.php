<?php
require '../db/connection.php';
require '../config/utils.php';
require '../service/choristeService.php';
init_php_session();
is_logged();

$DATEFORMAT = date('Y-m-d');
$CURRENTDATE = date($DATEFORMAT);

// Number of presence choriste in current date.
$SQL_COUNT = 'SELECT COUNT(*) FROM presence WHERE presentAt=:presentAt';
$reqNumberodpresence = $PDO->prepare($SQL_COUNT);
$reqNumberodpresence->bindParam(":presentAt", $CURRENTDATE);
$reqNumberodpresence->execute();
$NUMBEROFPRESENTCHORISTE = $reqNumberodpresence->fetch(PDO::FETCH_COLUMN);

// list of presence.
$SQL = 'SELECT * FROM presence WHERE presentAt=:presentAt';
$req = $PDO->prepare($SQL);
$req->bindParam(":presentAt", $CURRENTDATE);
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
                    <h5 class="text-uppercase text-primary">List of presence /</h5>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-primary">organisation, <?php echo $_SESSION['email']  ?></h5>
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
                                    <h4 class="mb-1 fw-bold"><?= $NUMBEROFMALE ?></h4>
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
            <div class="row mb-1">
                <div class="col-sm-4">
                    <button onclick="printTable()" class="btn btn-primary fw-bold"><span class="material-symbols-sharp">print</span></button>
                </div>
                <div class="col-sm-4">
                    <button type="button" class="btn btn-primary">Number of presence 
                        <span class="badge bg-secondary"><?= $NUMBEROFPRESENTCHORISTE?></span>
                    </button>
                </div>
                <div class="col-sm-4">
                    <span class="text-muted"><?= $CURRENTDATE ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        
                        <div class="card card-body">
                            <div class="table-responsive">
                                <table class="display" style="width: 100%" id="listOfPresence">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Last name</th>
                                            <th>Date</th>
                                            <th>Is presence</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                        <?php if ($NUMBEROFPRESENTCHORISTE > 0) {
                                            while ($choriste = $req->fetch(PDO::FETCH_OBJ)) { ?>
                                                <tr>
                                                    <td><?= $choriste->presesenceId ?></td>
                                                    <td><?= $choriste->choristeName ?></td>
                                                    <td><?= $choriste->presentAt ?></td>
                                                    <td><img class="check" src="../images/check.png" alt="" srcset=""></td>
                                                </tr>

                                            <?php }
                                        } else { ?>
                                            <tr>
                                                
                                                <td colspan="8" class="text-center fw-bold text-danger fs-1">No present choriste today! <?= $CURRENTDATE ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th><?= $CURRENTDATE ?></th>
                                            <th>Last name</th>
                                            <th>Date</th>
                                            <th>Mark the presence</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
    <!--Main section end-->

    <!-- JS SOURCE -->
    <script src="../js/chart.js"></script>
    <script src="../js/script.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#listOfPresence').DataTable();

        // });



        function printTable() {

            html2canvas($('#listOfPresence')[0], {
                onrendered: function(canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("list-of-presence.pdf");
                }
            });

        }
    </script>
    <!-- Food start -->
    <?php include('../partials/footer.php') ?>
    <!-- Food end -->
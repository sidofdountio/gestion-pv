<?php
/*
    Author: SIDOF DOUNTIO.
    Email: sidofdountio406@gmail.com
**/
require 'db/connection.php';
require 'config/utils.php';
require 'model/choriste.php';
require 'service/choristeService.php';
require  'pages/chartjs.php';
init_php_session();
is_logged();



?>


<!-- HEADER START -->
<?php require 'partials/header.php'; ?>
<!-- CSS  -->
<link rel="stylesheet" href="css/style.css">

<title>Presence-management</title>
</head>
<!-- HEADER END -->

<body>

    <!--Navbar section start-->
    <?php include("partials/navbar.php") ?>

    <!--Navbar-section end-->
    <!--Sidebar section start-->

    <?php include('partials/sidebar.php') ?>

    <!--sidebar section end-->
    <!--Main section start-->
    <main class="mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-uppercase text-primary">home /</h5>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-primary">organisation, <?php echo $_SESSION['email']  ?></h5>
                    <span>Activite principale <b>name of the choriste</b></span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-4 col-md-3 mb-2 ">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h2 class="mb-1 fw-bold"><?= $NUMBEROFCHORISTE; ?></h2>
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
                                    <h4 class="mb-1 fw-bold"><?= $NUMBEROFMALE; ?></h4>
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
            <!-- Marck each presence -->
            <div class="row mb-1">

                <div class="col-lg-12">
                    <!-- style="min-height: 485px" -->
                    <h3 class="">Mark each presence</h3>
                    <div class="card">
                        <div class="card-head" id="message">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive" id="displayChoriste">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Chartjs  -->
            <div class="row mb-1">
                <!-- FIRST CHART START-->
                <?php   ?>
                <div class="col-lg-6 col-md-6 mb-2">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">presence monitoring</h3>
                                <a class="nav-link" href="#"><i class="bi bi-three-dots"></i></a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex">
                            </div>
                            <div class="position-relative mb-1">
                                <canvas id="more-presence" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIRST CHART START-->
            </div>
    </main>
    <!--Main section end-->

    <!-- MODAL CONFIRM THE PRESENECE  -->
    <div class="modal fade" id="mackPresent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Confirm that this entry is present today</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <span id="names"></span>
                        <input type="text" id="name" class="form-control" disabled>
                        <input type="hidden" id="choristeId">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" id="not_present" class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                    <button type="button" id="confirm" class="btn btn-danger" onclick="markPresent()">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL FORM END -->
    <!-- JS SOURCE -->
    <!-- <script src="js/chart.js"></script> -->
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            getChoriste();
            var btnClose = $('.btn-close');
            // btnClose.css("background-color", "red");

            presenceProgresse();
        });

        function getChoriste() {
            var displayData = true;
            $.ajax({
                type: "POST",
                url: 'pages/displayChoriste.php',
                data: {
                    displaySend: displayData
                },
                success: function(data, status) {
                    $('#displayChoriste').html(data);
                    console.log("Fetching choriste ...")
                }
            });
        }

        // function to confirm presence that return an schoriste objet by id.
        function confirmePresence(choristeId) {
            // Get the choriste id and set display it on the modal.
            $('#choristeId').val(choristeId);
            $.post("pages/confirm.php", {
                    choristeId: choristeId
                },
                function(data, status) {
                    var choriste = JSON.parse(data);
                    console.log(choriste);
                    $('#name').val(choriste.lastName);
                });
            $('#mackPresent').modal("show");
        }

        /* Function to mark presence of choriste by specific id get from modal.**/
        function markPresent() {
            var choristeId = $('#choristeId').val();
            var choristeName = $('#name').val();
            $.ajax({
                type: "POST",
                url: "pages/present.php",
                data: {
                    choristeIdIsPresent: choristeId,
                    choristeName: choristeName
                },
                dataType: "json",
                cache: false,
                success: function(response) {

                    if (response.status == 1) {
                        $('#message').html('<p  class="text-center">' + response.message + '</p>').fadeOut(2000);
                        $('#mackPresent').modal("hide");
                    } else {
                        $('#message').html('<p  class="text-center alert alert-danger">' + response.message + '</p>').fadeOut(2000);
                        $('#mackPresent').modal("hide");
                    }
                }
            })
        }

        function presenceProgresse() {
            $(function() {
                'use strict'
                var ticksStyle = {
                    fontColor: '#495057',
                    fontStyle: 'bold'
                }
                var mode = 'index';
                var intersect = true;
                const name = <?php echo json_encode($CHORISTEPRESENT) ?>;
                const number = <?php echo json_encode($NUMBER) ?>;
                console.log(number);
                var $salesChart = $('#more-presence')
                // eslint-disable-next-line no-unused-vars
                var salesChart = new Chart($salesChart, {
                    type: 'bar',
                    data: {
                        labels: name,
                        datasets: [{
                                backgroundColor: '#007bff',
                                borderColor: '#007bff',
                                data: number
                            },
                            {
                                backgroundColor: '#ced4da',
                                borderColor: '#ced4da',
                                data: [7, 17, 27, 20, 18, 15, 20]
                            }
                        ]
                    },
                    options: {
                        maintainAspectRatio: false,
                        tooltips: {
                            mode: mode,
                            intersect: intersect
                        },
                        hover: {
                            mode: mode,
                            intersect: intersect
                        },
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Presence progresse"
                        },
                        scales: {
                            yAxes: [{
                                // display: false,
                                gridLines: {
                                    display: true,
                                    lineWidth: '4px',
                                    color: 'rgba(0, 0, 0, .1)',
                                    zeroLineColor: 'transparent'
                                },
                                ticks: $.extend({
                                    beginAtZero: true,
                                    // Include a dollar sign in the ticks
                                    callback: function(value) {
                                        if (value >= 1000) {
                                            value /= 1000
                                            value += 'k'
                                        }
                                        return '$' + value
                                    }
                                }, ticksStyle)
                            }],
                            xAxes: [{
                                display: true,
                                gridLines: {
                                    display: false
                                },
                                ticks: ticksStyle
                            }]
                        }
                    }
                })

            })

        }
    </script>

    <!-- Food start -->
    <?php include('partials/footer.php') ?>
    <!-- Food end -->
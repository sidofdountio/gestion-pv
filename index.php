<?php
/*
    Author      : SIDOF DOUNTIO.
    Email       : sidofdountio406@gmail.com
    Gihub       : 
    LinkedIn    :
**/
require 'db/connection.php';
require 'config/utils.php';
require  'pages/chartjs.php';
init_php_session();
is_logged();
?>


<!-- HEADER START -->
<?php require 'partials/header.php'; ?>
<link rel="stylesheet" href="css/style.css">


<title>Gestion de PV</title>
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
                    <h5 class="text-uppercase text-primary">home</h5>
                </div>
                <div class="col-lg-6">
                    <h5 class="text-primary">organisation, <?php echo $_SESSION['email']  ?></h5>
                    <span>Activities </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-lg-4 col-md-3 mb-2 ">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h2 class="mb-1 fw-bold"><?= 0 ?></h2>
                                    <div class="mb-1">Number of student</div>
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
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h4 class="mb-1 fw-bold"><?= 0; ?></h4>
                                    <div class="mb-1">Male Student</div>
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
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-auto  bd-highlight">
                                    <h4 class="mb-1 fw-bold"><?= 0 ?> </h4>
                                    <div class="mb-1 p-1">Female Student</div>
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


        </div>
    </main>
    <!--Main section end-->

    <!-- JS SOURCE -->
    <!-- <script src="js/chart.js"></script> -->
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            getChoriste();
            var btnClose = $('.btn-close');
            // btnClose.css("background-color", "red");
        });




        function presenceProgresse() {
            $(function() {
                'use strict'
                var ticksStyle = {
                    fontColor: '#495057',
                    fontStyle: 'bold'
                }
                var mode = 'index';
                var intersect = true;
                // const name = <?php //echo json_encode($CHORISTEPRESENT) 
                                ?>;
                // const number = <?php //echo json_encode($NUMBER) 
                                    ?>;
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
    <script src="js/bootstrap.min.js"></script>
    <?php include('partials/footer.php') ?>
    <!-- Food end -->
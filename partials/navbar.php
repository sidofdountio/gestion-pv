

<nav class="navbar navbar-expand-lg  fixed-top navbar-dark bg-dark">
    <div class="container ">
        <!-- offcanvas trigger -->
        <button class="navbar-toggler me-2 " type="button"
                data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon" id="toggler" data-bs-target="#offcanvasExample"></span>
        </button>
        <!-- offcanvas trigger -->
        <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Gestion PV</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" id="toggler"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="dropdown nav-item novisibleinphone">
                    <a href="#" class="nav-link" data-bs-toggle="dropdown">
                        <i class="bi bi-bell-fill"></i>
                        <span class="notification p-0">1</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end menu" aria-labelledby="navbarDropdown">
                    </ul>
                </li>
                <!-- user log -->
                <li class="nav-item">
                    <a class="nav-link"> <?php echo $_SESSION['email']?>
                        <span><i class="bi bi-person-circle"></i></span>
                    </a>
                    
                </li>
            </ul>
            <!-- user log -->

        </div>
    </div>
</nav>




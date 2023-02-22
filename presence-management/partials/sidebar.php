<div class="offcanvas offcanvas-start sidebar-nav bg-success" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body">
        <nav class="navbar-dark">
            <ul class="navbar-nav">
                <li>
                    <a href="http://localhost/presence-management" class="nav-link px-3 active ">
                        <span class="me-2"><i class="bi bi-grid-fill"></i></span>
                        <span>Home</span>
                    </a>
                </li>
                <!-- user -->
                <li>
                    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-2"><i class="bi bi-person-fill"></i></span> <span>Choriste</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div>
                            <ul class="navbar-nav ps-3">
                                <!-- MANAGE CHORISTE START -->
                                <li>
                                    <a href="http://localhost/presence-management/pages/addChoriste.php" class="nav-link px-3 mb-2">
                                        <span class="me-2">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </span>
                                        <span>Add a choriste</span>
                                    </a>
                                </li>
                                <!-- user list -->
                                <li>
                                    <a href="http://localhost/presence-management/pages/listOfChoriste.php" class="nav-link px-3 mb-2">
                                        <span class="me-2">
                                            <i class="bi bi-people-fill"></i>
                                        </span>
                                        <span>Manage choriste</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!-- MANAGE CHORISTE END -->


                <!-- LIST OF PRESENCE -->
                <li>
                    <a href="http://localhost/presence-management/pages/listOfPresence.php" class="nav-link px-3  me-2">
                        <span class="me-2">
                            <i class="bi bi-star-fill"></i>
                        </span><span>List of presence</span>
                    </a>

                </li>

                <!--  -->
                <li>
                    <a href="#" class="nav-link px-3 me-2 text-danger fw-bold">
                        <span class="me-2">
                            <i class="bi bi-box-arrow-left"></i>
                        </span>
                        <span>Log out</span>
                    </a>
                </li>
                <!--  -->
            </ul>
        </nav>
    </div>
</div>
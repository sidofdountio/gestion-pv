<div class="offcanvas offcanvas-start sidebar-nav " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

    <div class="offcanvas-body">
        <nav class="navbar ">
            <ul class="navbar-nav text-dark">
                <li>
                    <a href="http://localhost/gestion-pv" class="nav-link px-3 active text-dark ">
                        <span class="me-2"><i class="bi bi-grid-fill"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- user -->
                <li>
                    <a class="nav-link px-3 sidebar-link text-dark" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                        <span class="me-2"><i class="bi bi-person-fill"></i></span> <span>Students</span>
                        <span class="right-icon ms-auto">
                            <i class="bi bi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <div>
                            <ul class="navbar-nav ps-3">
                                <!-- MANAGE CHORISTE START -->
                                <li>
                                    <a href="http://localhost/gestion-pv/pages/student/add-student.php" class="nav-link px-3 mb-2 text-dark">
                                        <span class="me-2">
                                            <i class="bi bi-person-plus-fill"></i>
                                        </span>
                                        <span>Add New Choriste</span>
                                    </a>
                                </li>
                                <!-- user list -->
                                <li>
                                    <a href="http://localhost/gestion-pv/pages/student/student-list.php" class="nav-link px-3 mb-2 text-dark">
                                        <span class="me-2">
                                            <i class="bi bi-people-fill"></i>
                                        </span>
                                        <span>List student</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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
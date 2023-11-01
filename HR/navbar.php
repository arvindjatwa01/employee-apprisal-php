<?php 
    session_start();
    include("../connection.php");
    if(isset($_SESSION['admin-name'])){
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand mx-3" href="index.php">Happy Performer</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" style="justify-content: center;">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="index.php">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link" href="adddepartment.php">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Department</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manager">
                    <a class="nav-link" href="manager.php">
                        <i class="fa fa-fw fa-table"></i>
                        <span class="nav-link-text">Manager</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                    <a class="nav-link" href="employee.php">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Employee</span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
                    <a class="nav-link" href="sendapprial.php">
                        <i class="fa fa-fw fa-file"></i>
                        <span class="nav-link-text">Send Apprisal </span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
            <a class="navbar-brand mx-2" href="index.php">HR Deshboard</a>
                <li class="nav-item">
                    <form class="form-inline my-2 my-lg-0 mr-lg-2" action="search.php">
                        <div class="input-group">>
                            <input class="form-control" type="text" placeholder="Search for...">
                            <span class="input-group-append">
                                <input type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                            </span>
                        </div>
                    </form>
                </li>
                <li class="nav-item dropdown useralert">
                    <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts
                            <span class="badge badge-pill badge-warning">6 New</span>
                        </span>
                        <span class="indicator text-warning d-none d-lg-block">
                            <i class="fa fa-fw fa-circle"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu alert-submenu" aria-labelledby="alertsDropdown">
                        <h6 class="dropdown-header ">New Alerts:</h6>
                        <?php
                        $sql = "SELECT employee.*, emp_questuon.* FROM emp_questuon LEFT JOIN employee 
                        ON emp_questuon.employeeID = employee.e_id
                        ORDER BY emp_question_id DESC";
                        $result= mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <a class="dropdown-item" href="apprisal.php">
                            <span class="text-default">
                                <strong>
                                    <?php echo $row['e_name']; ?> Submit Apprisal</strong>
                            </span>
                            <span class="small float-right text-muted"><?php $date = $row['submit_time']; 
                                    $c_date = new DateTime($date);
                                    echo $c_date->format('d M, h:iA '); ?></span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.</div>
                        </a>

                        
                        <div class="dropdown-divider"></div>
                        <?php }?>
                        <a class="dropdown-item small" href="#">View all alerts</a>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                        <i class="fa fa-fw fa-sign-out"></i> HR </a>
                </li> -->
                <li class="nav-item username">
                    <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="logout" data-bs-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false" >
                       HR@happyper.in
                    </a>
                        <div class="dropdown-menu logoutnav">
                            <a class="dropdown-item" href="logout.php">
                                <i class="fa fa-fw fa-sign-out"></i>Logout
                            </a>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    }else{
        header("Location: login.php");
    }
?>
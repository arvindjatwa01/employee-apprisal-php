<?php 
    session_start();
    include("../connection.php");
    if(isset($_SESSION['employename'])){
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
                    <a class="nav-link" href="empapprisal.php">
                        <i class="fa fa-fw fa-wrench"></i>
                        <span class="nav-link-text">Apprisal's</span>
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
            <a class="navbar-brand mx-5" href="index.php">Employee Deshboard( <?php
            $departmentName = $_SESSION['emp_depart_id'];
            $sql1 = "SELECT * FROM department WHERE depart_id = '$departmentName'";
            $result1 = mysqli_query($conn, $sql1);
            if($row1 = mysqli_fetch_assoc($result1)){
                echo $row1['depart_name'];
            }
            
            ?> )</a>
            
                <li class="nav-item dropdown useralert">
                <?php 
                    $employeId = $_SESSION['e_id'];
                    $mangID = $_SESSION['emp_man_id'];
                    $MaindepartmentId = $_SESSION['emp_depart_id'];
                    $sql = "SELECT * FROM main_department_apprisal WHERE anotherDEmp = $employeId OR 
                    anodepartMan = $mangID OR maindepart = $MaindepartmentId AND appri = 1";
                   
                    $result = mysqli_query($conn, $sql) or die("Failed");
                    $row = mysqli_fetch_assoc($result);
                    if($row){
                        $date = $row['appri_time']; 
                        $c_date = new DateTime($date);
                        // echo $c_date->format('d M, h:iA ');
                
                    echo '<a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-bs-toggle="dropdown"
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
                        <a class="dropdown-item" href="empapprisal.php">
                            <span class="text-default">
                                <strong>HR send an Apprisal</strong>
                            </span>
                            <span class="small float-right text-muted">'.$c_date->format('d M, h:iA ').'</span>
                            <div class="dropdown-message small">This is an automated server response message. All
                                systems are online.</div>
                        </a>
                    </div>'; 
                    }else{
                        echo '<a class="nav-link" id="alertsDropdown" href="#">
                        <i class="fa fa-fw fa-bell"></i>
                        <span class="d-lg-none">Alerts
                            <span class="badge badge-pill badge-warning">6 New</span>
                        </span>
                    </a>';
                    }?>
                    
                </li>
                <li class="nav-item username">
                    <a class="nav-link dropdown-toggle" href="#" id="logout" data-bs-toggle="dropdown"
                     aria-haspopup="true" aria-expanded="false" >
                        <?php echo $_SESSION['e_name']; ?>
                    </a>
                    <div class="dropdown-menu mr-lg-2 logoutnav">
                        <a class="dropdown-item" href="logout.php">
                            <i class="fa fa-fw fa-sign-out"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
<?php
    }else{
        header("Location: login.php");
    }
?>
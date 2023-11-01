<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Department</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <?php include("navbar.php"); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="d-flex flex-row-reverse mb-2">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-depart">ADD
                    MANAGER
                </button>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Manager's Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Emp. Id</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include("connection.php");
                                    $sql = "SELECT manager.*, department.* FROM manager LEFT JOIN department 
                                    ON manager.d_m_id = department.depart_id ORDER BY manager.m_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td>
                                        <a href="" class="text-decoration-none" data-bs-toggle="modal"
                                            data-bs-target="#mandetails<?php echo $row['m_id'];?>"><?php echo $row['m_emp_id']; ?></a>
                                    </td>
                                    <td><?php echo $row['m_name']; ?></td>
                                    <td><?php echo $row['m_mobile']; ?></td>
                                    <td><?php echo $row['m_desig']; ?></td>
                                    <td><?php echo $row['depart_name']; ?></td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updatemanager<?php echo $row['m_id']; ?>">
                                            <i class='far fa-edit'></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletemanager<?php echo $row['m_id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Details Modal -->

                                <div class="modal fade" id="mandetails<?php echo $row['m_id'];?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <?php echo $row['m_name']; ?> Detail </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12" style="display: flex;">
                                                        <div class="col-6">
                                                            <p><b>Manager Name: </b> <?php echo $row['m_name']; ?></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><b>Manager Emp. Id : </b> <?php echo $row['m_emp_id']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="display: flex;">
                                                        <div class="col-6">
                                                            <p><b>Email: </b> <?php echo $row['m_email']; ?></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><b>Contact No : </b> <?php echo $row['m_mobile']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="display: flex;">
                                                        <div class="col-6">
                                                            <p><b>Address: </b> <?php echo $row['m_address']; ?></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><b>Password : </b> <?php echo $row['m_password']; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="display: flex;">
                                                        <div class="col-6">
                                                            <p><b>Designaton: </b> <?php echo $row['m_desig']; ?></p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p><b>Department : </b> <?php echo $row['depart_name']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12" style="display: flex;">
                                                        
                                                        <div class="col-6">
                                                            <p><b>Start Time : </b> <?php $date = $row['start_time']; 
                                    $c_date = new DateTime($date);
                                    echo $c_date->format('M d, Y '); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Update Department Model -->
                                <div class="modal fade" id="updatemanager<?php echo $row['m_id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-uppercase" id="exampleModalLabel">update
                                                    department</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pt-0 pb-0">
                                                <form action="action.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['m_id']; ?>"
                                                        name="up_m_id">

                                                    <label class="form-label">Employee Id:</label>
                                                    <input type="text" class="form-control mb-2"
                                                        value="<?php echo $row['m_emp_id']; ?>" name="up_memp_id">

                                                    <label class="form-label">Manager Name:</label>
                                                    <input type="text" class="form-control mb-2" name="upmanagername"
                                                        value="<?php echo $row['m_name']; ?>" required>

                                                    <label class="form-label">Contact No. :</label>
                                                    <input type="text" maxlength="10"
                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                        onpaste="return false" class="form-control mb-2"
                                                        name="upmanagermobile" value="<?php echo $row['m_mobile']; ?>"
                                                        required>

                                                    <label class="form-label">Email:</label>
                                                    <input type="email" class="form-control mb-2" name="upmanageremail"
                                                        value="<?php echo $row['m_email']; ?>" required>

                                                    <label class="form-label">Address :</label>
                                                    <input type="text" class="form-control mb-2" name="upmanageraddress"
                                                        value="<?php echo $row['m_address']; ?>" required>

                                                    <label class="form-label">Password :</label>
                                                    <input type="text" class="form-control mb-2" name="upmanagerpass"
                                                        value="<?php echo $row['m_password']; ?>" required>

                                                    <label class="form-label">Department :</label>
                                                    <select class="form-select mb-2" aria-label="Default select example"
                                                        name="upMdepartment">

                                                        <?php
                                                            $sql1 = "SELECT * FROM department";

                                                            $result2 = mysqli_query($conn, $sql1);
                                                            while($row1 = mysqli_fetch_assoc($result2)) {
                                                                if($row['d_m_id'] == $row1['depart_id']){
                                                                    $active = "selected";
                                                                }else{
                                                                    $active = "";
                                                                }
                                                                echo "<option ".$active." value=".$row1['depart_id'].">" . $row1["depart_name"] . "</option>";
                                                            }
                                                            
                                                        ?>
                                                    </select>
                                                    <label class="form-label">Employee Id:</label>
                                                    <input type="text" class="form-control" name="upmanagerdesignation"
                                                        value="<?php echo $row['m_desig']; ?>" required>

                                                    <input type="submit" class="btn btn-primary mt-2 mb-2"
                                                        value="Update" name="isupManger">

                                                </form>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Department Model -->

                                <div class="modal fade" id="deletemanager<?php echo $row['m_id']; ?>" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-uppercase" id="exampleModalLabel">update
                                                    department</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body pt-0 pb-0">
                                                <form action="action.php" method="POST">
                                                    <input type="hidden" value="<?php echo $row['m_id']; ?>"
                                                        name="up_id">
                                                    <h6>Are you sure to want to delete
                                                        <?php echo "<b>Mr/Mrs ". $row['m_name'] ."</b>"; ?> ?
                                                    </h6>
                                                </form>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    onclick="managerdelete(<?php echo $row['m_id']; ?>)">Yes</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                                    aria-label="Close">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <?php include("footer.php"); ?>
        <!-- Add Department Model -->
        <div class="modal fade" id="add-depart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-uppercase" id="exampleModalLabel">add Manager</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-0">
                        <form id="departForm" method="POST">
                            <label class="form-label">Employee Id:</label>
                            <input type="text" class="form-control mb-2" id="manageremp_id"
                                placeholder="Enter Employee Id" required>

                            <label class="form-label">Manager Name :</label>
                            <input type="text" class="form-control mb-2" id="managername"
                                placeholder="Enter Manager Name" required>

                            <label class="form-label">Contact No. :</label>
                            <input type="text" maxlength="10"
                                onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false"
                                class="form-control mb-2" id="managermobile" placeholder="Enter Manager Contact No. "
                                required>

                            <label class="form-label">Email :</label>
                            <input type="email" class="form-control mb-2" id="manageremail"
                                placeholder="Enter Manager Email Address" required>

                            <label class="form-label">Address :</label>
                            <input type="text" class="form-control mb-2" id="manageraddress"
                                placeholder="Enter Manager Current Address" required>

                            <label class="form-label">Password :</label>
                            <input type="password" class="form-control mb-2" id="managerpassword"
                                placeholder="Create Manager Password" required>

                            <label class="form-label">Manager Department :</label>
                            <select class="form-select mb-2" aria-label="Default select example" id="Mdepartment">
                                <option>Select Department</option>
                                <?php
                                    $mysql = "SELECT * FROM department";
                                    $result1 = mysqli_query($conn, $mysql);
                                    while($row = mysqli_fetch_assoc($result1)) {
                                        echo "<option value=".$row['depart_id'].">" . $row["depart_name"] . "</option>";
                                    }
                                ?>
                            </select>

                            <label class="form-label">Designation :</label>
                            <input type="text" class="form-control" id="managerdesignation"
                                placeholder="Enter Manager Desigation" required>

                            <input type="button" class="btn btn-primary mt-2" onclick="addmanager()" value="Submit">

                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function addmanager() {
        var emp_idManager = document.getElementById("manageremp_id").value;
        var nameManager = document.getElementById("managername").value;
        var emailManager = document.getElementById("manageremail").value;
        var addressManager = document.getElementById("manageraddress").value;
        var mobileManager = document.getElementById("managermobile").value;
        var deprtManager = document.getElementById("Mdepartment").value;
        var desigManager = document.getElementById("managerdesignation").value;
        var passManager = document.getElementById("managerpassword").value;

        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                nameManager: nameManager,
                emailManager: emailManager,
                addressManager: addressManager,
                mobileManager: mobileManager,
                deprtManager: deprtManager,
                desigManager: desigManager,
                passManager: passManager,
                emp_idManager: emp_idManager,
                isaddManager: true
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    }

    function managerdelete(delm_id) {

        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                delmanager: delm_id,
                isdelmanager: true
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    }
    </script>
</body>

</html>
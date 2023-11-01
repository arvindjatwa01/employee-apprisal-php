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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-depart">ADD DEPARTMENT
                </button>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Department Table
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include("connection.php");
                                    $sql = "SELECT * FROM department ORDER BY depart_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td><?php echo $row['depart_name']; ?></td>
                                    <td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updatedepart<?php echo $row['depart_id']; ?>">
                                            <i class='far fa-edit'></i>
                                        </button>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deletedepart<?php echo $row['depart_id']; ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!-- Update Department Model -->
                                <div class="modal fade" id="updatedepart<?php echo $row['depart_id']; ?>" tabindex="-1"
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
                                                    <input type="hidden" value="<?php echo $row['depart_id']; ?>"
                                                        name="up_id">
                                                    <input type="text" class="form-control" name="updepartname"
                                                        value="<?php echo $row['depart_name']; ?>" required>
                                                    <input type="submit" class="btn btn-primary mt-2 mb-2"
                                                        value="Update" name="isupdepart">

                                                </form>
                                            </div>
                                            <div class="modal-footer"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Department Model -->

                                <div class="modal fade" id="deletedepart<?php echo $row['depart_id']; ?>" tabindex="-1"
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
                                                    <input type="hidden" value="<?php echo $row['depart_id']; ?>"
                                                        name="up_id">
                                                    <h6>Are you sure to want to delete
                                                        <?php echo "<b>". $row['depart_name'] ."</b>"; ?> Department ?
                                                    </h6>
                                                </form>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                    onclick="departdelete(<?php echo $row['depart_id']; ?>)">Yes</button>
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
                        <h4 class="modal-title text-uppercase" id="exampleModalLabel">add department</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pb-0">
                        <form id="departForm" method="POST">
                            <input type="text" class="form-control" id="departname" placeholder="Enter Department Name"
                                required>
                            <input type="button" class="btn btn-primary mt-2" onclick="adddapert()" value="Submit">

                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function adddapert() {
        var namedepart = document.getElementById("departname").value;

        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                department: namedepart,
                isadddepart: true
            },
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    }

    function departdelete(deldepa_id) {

        $.ajax({
            url: 'action.php',
            type: 'post',
            data: {
                deldepart: deldepa_id,
                isdeldepart: true
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
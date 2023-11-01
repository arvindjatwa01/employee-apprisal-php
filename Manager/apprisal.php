<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Employe Appraisal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include("navbar.php"); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <?php if (empty(isset($_GET['id']))) {
            ?>
                <div class="card mb-3" id="tableappri">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Apprisal's Employees Table
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Emp. Id</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Email</th>
                                        <th>Department</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = $_SESSION['m_id'];
                                    $b = $_SESSION['d_id'];

                                    $sql = "SELECT * FROM main_department_apprisal mda WHERE 
                                    mda.anodepartMan = '$a' ORDER BY mda_id DESC";
                                    $result = mysqli_query($conn, $sql);
                                    $row1 = mysqli_fetch_assoc($result);
                                    $c = $row1['maindepart'];
                                    $d = $row1['anodepartMan'];
                                    $EmployeId = $row1['anotherDEmp'];

                                    $sql1 = "SELECT employee.*, emp_questuon.* FROM emp_questuon LEFT JOIN employee 
                                        ON emp_questuon.employeeID = employee.e_id";
                                    $result1 = mysqli_query($conn, $sql1);
                                    while ($row = mysqli_fetch_assoc($result1)) {


                                    ?>
                                        <tr>
                                            <td><a href="?id=<?php echo $row['e_id']; ?>" class="text-decoration-none" id="employeeID" onclick="view()">
                                                    <?php echo $row['e_empid']; ?></a>
                                            </td>
                                            <td><?php echo $row['e_name']; ?></td>
                                            <td><?php echo $row['e_mobile']; ?></td>
                                            <td><?php echo $row['e_email']; ?></td>
                                            <td><?php 
                                            $departQ = "SELECT * FROM department WHERE depart_id = '".$row['e_d_id']."'";
                                            $departR = mysqli_query($conn, $departQ);
                                            $departRow = mysqli_fetch_assoc($departR);
                                            echo $departRow['depart_name']; ?></td>
                                            
                                            <td><?php if ($row['status'] != 1) {
                                                    echo "pending";
                                                } else {
                                                    echo "Submited";
                                                }
                                                ?></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } else {
                $EMPID = $_GET['id'];

            ?>
                <div class="row" id="managerview">
                    <div class="col-12">
                        <div class="contact-page-form" method="post">
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-primary" href="apprisal.php">Go Back</a>
                            </div>

                            <form action="action.php" method="post" enctype="multipart/form-data">

                                <div class="row">
                                    <?php
                                    $mnagerId = $_SESSION['m_id'];
                                    $sql = "SELECT employee.*, emp_questuon.*, managerfeed.* FROM emp_questuon LEFT JOIN employee 
                                ON emp_questuon.employeeID = employee.e_id LEFT JOIN managerfeed ON emp_questuon.employeeID = managerfeed.employe_Id 
                                WHERE emp_questuon.managerId = $mnagerId 
                                AND employeeID = $EMPID";


                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <label class="form-label"><b>Employee Name :</b></label>
                                                    <input class="form-control" type="text" value="<?php echo $row['e_name']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <label class="form-label"><b>Designation :</b></label>
                                                    <input type="text" class="form-control" value="<?php echo $row['e_desig']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12  mb-2">
                                                <div class="single-input-field">
                                                    <label class="form-label"><b>Email :</b></label>
                                                    <input class="form-control" type="text" value="<?php echo $row['e_email']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <label class="form-label"><b>Employee ID Number :</b></label>
                                                    <input class="form-control" type="text" value="<?php echo $row['e_empid']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <label class="form-label"><b>Mobile :</b></label>
                                                    <input class="form-control" type="text" value="<?php echo $row['e_mobile']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <label class="form-label"><b>Manager Name :</b></label>
                                                    <input class="form-control" type="text" value="<?php echo $_SESSION['m_name']; ?>" readonly />
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <a href="#demo" class="btn btn-primary" data-bs-toggle="collapse">Performance
                                                        Review - Past Year</a>
                                                    <div id="demo" class="collapse">
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label mb-0"><b>1. Describe all the good work you
                                                                        have
                                                                        done in your department and the organization in the past one
                                                                        year?</b></label>
                                                                <p class="mb-0"><?php echo $row['question1'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question1img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion1'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion1img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" placeholder="Describe Your Answer" id="question1" name="questionM1text" />
                                                                        <input class="form-control mt-2" type="file" name="questionM1img" placeholder="Your Name" onchange="return fileValidation1()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question1img" title="Only Images allowed" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img1err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>2. Let us know where you have brought
                                                                        savings
                                                                        or increased business of the organisation.</b></label>
                                                                <p class="mb-0"><?php echo $row['question2'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question2img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion2'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion2img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input type="text" class="form-control" placeholder="Describe Your Answer" id="question2" name="questionM2text" />
                                                                        <input class="form-control mt-1" type="file" name="questionM2img" placeholder="Your Name" onchange="return fileValidation2()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question2img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img2err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>
                                                                        3. Describe any difficult situation because of which you did
                                                                        not
                                                                        get
                                                                        the result that you wanted during the last one
                                                                        year.</b></label>
                                                                <p class="mb-0"><?php echo $row['question3'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question3img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion3'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion3img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" placeholder="Describe Your Answer" id="question3" name="questionM3text" />
                                                                        <input class="form-control mt-1" type="file" name="questionM3img" placeholder="Your Name" onchange="return fileValidation3()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question3img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img3err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>4. Describe what has helped you in
                                                                        achieving
                                                                        your goals/ target during the last one year.</b></label>
                                                                <p class="mb-0"><?php echo $row['question4'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question4img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion4'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion4img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" placeholder="Describe Your Answer" id="question4" name="questionM4text" />
                                                                        <input class="form-control mt-1" type="file" name="questionM4img" placeholder="Your Name" onchange="return fileValidation4()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question4img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img4err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>5. Please list your area(s) of
                                                                        strength.</b></label>
                                                                <p class="mb-0"><?php echo $row['question5'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question5img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion5'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion5img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" placeholder="Describe Your Answer" id="question5" name="questionM5text" />
                                                                        <input class="form-control mt-1" type="file" name="questionM5img" placeholder="Your Name" onchange="return fileValidation5()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question5img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img5err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>6. How did you improve your skills? Did
                                                                        you
                                                                        also help your team members to learn new skills
                                                                        ?</b></label>
                                                                <p class="mb-0"><?php echo $row['question6'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question6img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion6'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion6img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" name="questionM6text" placeholder="Describe Your Answer" id="question6" />
                                                                        <input class="form-control mt-1" type="file" name="questionM6img" placeholder="Your Name" onchange="return fileValidation6()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question6img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img6err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>7. Please list your area(s) of
                                                                        improvement.</b></label>
                                                                <p class="mb-0"><?php echo $row['question7'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question7img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion7'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion7img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" name="questionM7text" placeholder="Describe Your Answer" id="question7" />
                                                                        <input class="form-control mt-1" type="file" placeholder="Your Name" onchange="return fileValidation7()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question7img" name="questionM7img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img7err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>8. Is there any other information you
                                                                        would
                                                                        like to share with your supervisor/manager regarding your
                                                                        work
                                                                        performance?</b></label>
                                                                <p class="mb-0"><?php echo $row['question8'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question8img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion8'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion8img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" name="questionM8text" placeholder="Describe Your Answer" id="question8" />
                                                                        <input class="form-control mt-1" type="file" onchange="return fileValidation8()" placeholder="Your Name" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="question8img" name="questionM8img" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img8err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field q9">
                                                                <label class="form-label"><b>9. List down your goals for the next
                                                                        year.
                                                                        (SMART goals). Also, please tell what will be the result of
                                                                        those
                                                                        goals? Definition of elements of SMART: S-Specific
                                                                        <br>M-Measurable
                                                                        <br>A -Achievable
                                                                        <br>R-Realistic
                                                                        <br>T-Time-boundv</b></label>
                                                                <p class="mb-0"><?php echo $row['question9'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['question9img']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['Mquestion9'] . '</p>
                                                                            <img src="mimages/' . $row['Mquestion9img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <input class="form-control" type="text" name="questionM9text" placeholder="Describe Your Answer" id="question9" />
                                                                        <input class="form-control mt-1" type="file" onchange="return fileValidation9()" placeholder="Your Name" id="question9img" name="questionM9img" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any
                                                                            reference(choose only Image).</div>
                                                                        <span id="img9err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <a href="#demo1" class="btn btn-primary" data-bs-toggle="collapse">Coaching and
                                                        Development Plan</a>
                                                    <div id="demo1" class="collapse">
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label"><b>1. Coaching + Development Plan
                                                                        (Completed in partnership by manager
                                                                        and employee)</b></label>
                                                                <p>Please mention two development areas that will help you to
                                                                    perform your current role in good
                                                                    way;<br><b>a) Development Area:</b><br>Support Needed:</p>
                                                                <p class="mb-0"><?php echo $row['planAtext'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['planAimg']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['MquestionC1'] . '</p>
                                                                            <img src="mimages/' . $row['MquestionC1img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <textarea class="form-control mt-2" id="a1" rows="2" name="planMAtext" placeholder="Describe Your Opinion"></textarea>
                                                                        <input class="form-control mt-1" type="file" name="imageC1" onchange="return fileValidationC1()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="imageC1" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                                                                            Image).</div>
                                                                        <span id="imgC1err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label mb-0"><b>b) Development Area:</b></label>
                                                                <p>Support Needed:</p>
                                                                <p class="mb-0"><?php echo $row['planBtext'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['planBimg']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['MquestionC2'] . '</p>
                                                                            <img src="mimages/' . $row['MquestionC1img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <textarea class="form-control mt-2" id="a1" rows="2" name="planMBtext" placeholder="Describe Your Opinion"></textarea>
                                                                        <input class="form-control mt-1" type="file" name="imageC2" onchange="return fileValidationC2()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="imageC2" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                                                                            Image).</div>
                                                                        <span id="imgC2err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label mb-0"><b>2. Please mention your career
                                                                        objectives and two development
                                                                        areas which will help you to achieve these
                                                                        objectives.</b></label>
                                                                <p><b>a) Career Interest:</b><br>Support Needed:</p>
                                                                <p class="mb-0"><?php echo $row['careerAtext'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['careerAimg']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['MquestionC3'] . '</p>
                                                                            <img src="mimages/' . $row['MquestionC1img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <textarea class="form-control mt-2" id="a1" rows="2" name="careerMAtext" placeholder="Describe Your Opinion"></textarea>
                                                                        <input class="form-control mt-1" type="file" name="imageC3" onchange="return fileValidationC3()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="imageC3" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                                                                            Image).</div>
                                                                        <span id="imgC3err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2">
                                                            <div class="single-input-field">
                                                                <label class="form-label mb-0"><b>b) Career Interests:</b></label>
                                                                <p>Support Needed:</p>
                                                                <p class="mb-0"><?php echo $row['careerBtext'] ?></p>
                                                                <img src="../Employe/eimages/<?php echo $row['careerBimg']; ?>" alt="" height="100"><br>

                                                                <div class="shadow mt-2 mb-2 bg-body rounded" style="border-top: 2px solid rgba(0,0,0,.15);">
                                                                    <label class="form-label mb-0"><b><?php echo  $_SESSION['m_name']; ?>
                                                                            Opinion :</b></label>
                                                                    <?php
                                                                    if ($row['employe_Id'] == $EMPID) {
                                                                        echo '<p class="mb-0">' . $row['MquestionC4'] . '</p>
                                                                            <img src="mimages/' . $row['MquestionC1img'] . '" alt="" height="100"><br>';
                                                                    } else {
                                                                    ?>
                                                                        <textarea class="form-control mt-2" id="a1" rows="2" name="careerMBtext" placeholder="Describe Your Opinion"></textarea>
                                                                        <input class="form-control mt-1" type="file" name="imageC4" onchange="return fileValidationC4()" accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="imageC4" />
                                                                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                                                                            Image).</div>
                                                                        <span id="imgC4err"></span>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-6 col-xs-12 mb-2">
                                                <div class="single-input-field">
                                                    <a href="#demo2" class="btn btn-primary" data-bs-toggle="collapse">Performance /
                                                        Skills Assessment (Rate on the scale of 1 to 5)</a>
                                                    <div id="demo2" class="collapse">
                                                        <div class="container-fluid d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Job
                                                                knowledge and skills -</div>
                                                            <p><?php echo $row['rating1']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Quality
                                                                of Work - </div>
                                                            <p><?php echo $row['rating2']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Initiative and motivation - </div>
                                                            <p><?php echo $row['rating3']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Team
                                                                Work - </div>
                                                            <p><?php echo $row['rating4']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Ethics
                                                                and Integrity - </div>
                                                            <p><?php echo $row['rating5']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Discipline(Following Rules and
                                                                Processes) -
                                                            </div>
                                                            <p><?php echo $row['rating6']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Attitude
                                                                (like adaptility, cooperation,
                                                                docile, follows instructions etc.) - </div>
                                                            <p><?php echo $row['rating7']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Communication Skills - </div>
                                                            <p><?php echo $row['rating8']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Leadership Skills - </div>
                                                            <p><?php echo $row['rating9']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Accountability - </div>
                                                            <p><?php echo $row['rating10']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Attention to details - </div>
                                                            <p><?php echo $row['rating11']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Problem
                                                                Solving Skills - </div>
                                                            <p><?php echo $row['rating12']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Result
                                                                Oriented - </div>
                                                            <p><?php echo $row['rating13']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Confident and Tact - </div>
                                                            <p><?php echo $row['rating14']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Sense of
                                                                Urgency - </div>
                                                            <p><?php echo $row['rating15']; ?></p>
                                                        </div>

                                                        <div class="container-fluid mb-2 d-flex d-flex">
                                                            <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i>
                                                                Attendance -</div>

                                                            <p><?php echo $row['rating16']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                            $sql2 = "SELECT * FROM managerfeed where employe_Id = '$EMPID'";
                                            $result2 = mysqli_query($conn, $sql2);
                                            if (mysqli_num_rows($result2) > 0) {
                                                $row2 = mysqli_fetch_assoc($result2);
                                                $ratingM = $row2['manager_rating'];
                                                $suggestionM = $row2['man_suggestion'];
                                                $a = '<div class="col-md-12 col-sm-6 col-xs-12 mb-2">
                                    <div class="single-input-field">';


                                                $a .= '<a href="#demo3" class="btn btn-primary" data-bs-toggle="collapse">Overall
                                            Performance Rating (select one)</a>';
                                                $a .=
                                                    '<div id="demo3" class="collapse">
                                            <div class="container-fluid mb-2">

                                                <div class="form-check form-check-inline mt-3 mx-3">
                                                    <label class="form-check-label" for="inlineRadio1"> <b>' . $ratingM . '</b></label>';
                                                if ($ratingM == 'Exceeds Expectations') {
                                                    $a .= '<p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        All accountabilities of my current job are fulfilled.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Results consistently exceeded agreed upon performance and
                                                        development objectives.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Results signal clear potential for development towards more
                                                        challenging position.
                                                    </p>';
                                                }
                                                if ($ratingM == 'Meets Expectations') {
                                                    $a .= ' <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        All accountabilities of my current job are fulfilled.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        The majority of results met, agreed upon performance and development
                                                        objectives.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Further growth or development in job specific areas may be suggested
                                                        to enhance performance over the current performance.
                                                    </p>';
                                                }
                                                if ($ratingM == 'Largely Meet Expectations') {
                                                    $a .= '<p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Most of the accountabilities of my current job are fulfilled.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Can perform at repetitive jobs only.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Cannot be given higher responsibility.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Needs to be trained technically and behaviourally.
                                                    </p>';
                                                }
                                                if ($ratingM == 'Needs Improvement') {
                                                    $a .= '<p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Results agreed on some performance and development objectives;
                                                        however, overall results fail to meet accountabilities and the
                                                        requirements of the current job..
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Urgent need for self-development is suggested along with coaching
                                                        and training to support meeting defined performance standards within
                                                        a defined time period.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Additional action, e.g. reassignment, may be required.
                                                    </p>';
                                                }
                                                if ($ratingM == 'Does Not Meet Expectations') {
                                                    $a .= '<p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        In spite of constant guidance and training, I am not able to deliver
                                                        the accountabilities of my current job.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Lack of Interest.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Attitude needs to be improved.
                                                    </p>';
                                                }
                                                $a .= '</div>
                                            </div>
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Suggestion if any :</b></label>
                                                <textarea class="form-control" id="suggestion" rows="2"
                                                    name="suggestion">' . $suggestionM . '</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>';

                                                $a .= '
                                <div class="col-md-12 col-sm-6 col-xs-12  mb-2">
                                    
                                </div>';
                                                echo $a;
                                            } else {
                                                $b = '
                                    <div class="col-md-12 col-sm-6 col-xs-12 mb-2">
                                        <div class="single-input-field">
                                        <a href="#demo4" class="btn btn-primary" data-bs-toggle="collapse">Overall
                                                Performance Rating (select one)</a>
                                            <div id="demo4" class="collapse">
                                                <div class="container-fluid mb-2">
                                                    <div class="form-check form-check-inline mt-3">
                                                        <input class="form-check-input" type="radio" name="ratingM"
                                                            id="ratingP1" value="Exceeds Expectations">
                                                        <label class="form-check-label" for="inlineRadio1"> <b>Exceeds
                                                            Expectations:</b></label>
                                                    </div>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        All accountabilities of my current job are fulfilled.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Results consistently exceeded agreed upon performance and
                                                        development objectives.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Results signal clear potential for development towards more
                                                        challenging position.
                                                    </p>
                                                </div>
                                                <div class="container-fluid mb-2">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ratingM"
                                                            id="ratingP1" value="Meets Expectations">
                                                        <label class="form-check-label" for="inlineRadio1"> <b>Meets
                                                                Expectations:</b></label>
                                                    </div>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        All accountabilities of my current job are fulfilled.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        The majority of results met, agreed upon performance and development
                                                        objectives.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Further growth or development in job specific areas may be suggested
                                                        to enhance performance over the current performance.
                                                    </p>
                                                </div>
                                                <div class="container-fluid mb-2">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ratingM"
                                                            id="ratingP1" value="Largely Meet Expectations">
                                                        <label class="form-check-label" for="inlineRadio1"> <b>Largely Meet
                                                                Expectations:</b></label>
                                                    </div>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Most of the accountabilities of my current job are fulfilled.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Can perform at repetitive jobs only.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Cannot be given higher responsibility.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Needs to be trained technically and behaviourally.
                                                    </p>
                                                </div>
                                                <div class="container-fluid mb-2">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ratingM"
                                                            id="ratingP1" value="Needs Improvement">
                                                        <label class="form-check-label" for="inlineRadio1"> <b>Needs
                                                                Improvement:</b></label>
                                                    </div>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Results agreed on some performance and development objectives;
                                                        however, overall results fail to meet accountabilities and the
                                                        requirements of the current job..
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Urgent need for self-development is suggested along with coaching
                                                        and training to support meeting defined performance standards within
                                                        a defined time period.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Additional action, e.g. reassignment, may be required.
                                                    </p>
                                                </div>
                                                <div class="container-fluid mb-2">

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ratingM"
                                                            id="ratingP1" value="Does Not Meet Expectations">
                                                        <label class="form-check-label" for="inlineRadio1"> <b>Does Not Meet
                                                                Expectations:</b></label>
                                                    </div>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        In spite of constant guidance and training, I am not able to deliver
                                                        the accountabilities of my current job.
                                                    </p>
                                                    <p class="mb-0">
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Lack of Interest.
                                                    </p>
                                                    <p>
                                                        <i class="fa-solid fa-caret-right mx-1"></i>
                                                        Attitude needs to be improved.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="' . $row['employeeID'] . '" name="empId">
                                    <input type="hidden" value="' . $row['managerId'] . '" name="managerId">
                                    <div class="col-md-12 col-sm-6 col-xs-12  mb-2">
                                        <div class="single-input-field">
                                            <label class="form-label"><b>Suggestion if any :</b></label>
                                            <textarea class="form-control" id="suggestion" rows="2"
                                                name="suggestion"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-primary" value="Submit" name="managerAppsub" />
                                    
                                </div>';
                                                echo $b;
                                            }
                                        }
                                    } else {

                                        $unfill = "SELECT * FROM employee WHERE e_id = $EMPID";
                                        $Unfill_query = mysqli_query($conn, $unfill);
                                        $row4 = mysqli_fetch_assoc($Unfill_query);
                                        $EmployeName = $row4['e_name'];
                                        echo
                                        '<div class="d-flex justify-content-center">
                                        <h3>' . $EmployeName . ' Not submited the Apprisal form Till Now</h3>
                                    </div>';
                                    } ?>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <?php include("footer.php"); ?>

    </div>
    <script>
        function fileValidation1() {
            var fileInput = document.getElementById('question1img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img1err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }

        }

        function fileValidation2() {
            var fileInput = document.getElementById('question2img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img2err');
                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }

        }

        function fileValidation3() {
            var fileInput = document.getElementById('question3img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img3err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                console.log(imgerr);
                return false;
            }

        }

        function fileValidation4() {
            var fileInput = document.getElementById('question4img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img4err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                console.log(imgerr);
                return false;
            }
        }

        function fileValidation5() {
            var fileInput = document.getElementById('question5img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img5err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                console.log(imgerr);
                return false;
            }
        }

        function fileValidation6() {
            var fileInput = document.getElementById('question6img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img6err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidation7() {
            var fileInput = document.getElementById('question7img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img7err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidation8() {
            var fileInput = document.getElementById('question8img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img8err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidation9() {
            var fileInput = document.getElementById('question9img');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img9err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }

        }

        function fileValidationC1() {
            var fileInput = document.getElementById('imageC1');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('imgC1err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidationC2() {
            var fileInput = document.getElementById('imageC2');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('imgC2err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidationC3() {
            var fileInput = document.getElementById('imageC3');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('imgC3err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidation4() {
            var fileInput = document.getElementById('imageC4');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('imgC4err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }
    </script>

    <!-- <script src="manager.js"></script> -->

</body>

</html>
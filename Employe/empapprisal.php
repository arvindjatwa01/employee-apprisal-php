<html>

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css"
        integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Employe Appraisal</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-1.2.6.min.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/jquery-ui-personalized-1.5.2.packed.js"></script>
    <script language="JavaScript" type="text/javascript" src="/js/sprinkle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Navigation-->
    <?php include("navbar.php"); ?>
    <div class="content-wrapper">
        <?php 
        
        $employeId = $_SESSION['e_id'];
        $mangID = $_SESSION['emp_man_id'];
        $MaindepartmentId = $_SESSION['emp_depart_id'];
        $sql = "SELECT * FROM main_department_apprisal WHERE (anotherDEmp = $employeId OR 
        anodepartMan = $mangID OR maindepart = $MaindepartmentId) AND appri = 1";
        $result = mysqli_query($conn, $sql) or die("Failed");
        $row = mysqli_fetch_assoc($result);
        
        if($row){
            $sql3 = "SELECT * FROM emp_questuon  WHERE employeeID = '$employeId'";
            $result3 =mysqli_query($conn, $sql3);
            if(mysqli_num_rows($result3) > 0){
                $row3 = mysqli_fetch_assoc($result3);
                $submitTime = $row3['submit_time'];
                $c_date = new DateTime($date);
                                    
                echo '<div class="container-fluid">
                <div class="text-center pt-2">
                    <h3>You submitted the apprial form on '.$c_date->format('d M, Y h:iA ').' Please contact to HR</h3>
                </div>
                </div>
                ';
            }else{
           $truedata = '<form enctype="multipart/form-data" id="uploadForm" action="action.php">
            <div class="main-div" id="maindiv1">
                <div class="container-fluid">
                    <div class="pt-2">
                        <h6>Our company’s Employee Development Program provides the framework through which employees
                            and
                            their managers can reflect on their own performance progress, provide and receive
                            performance
                            feedback, assess current capability and develop and agree on an action plan for current
                            and/or
                            future career development needs. It also provides a means through which individual and team
                            performance goals can be linked with the company’s strategic vision, mission and goals.</h6>
                    </div>
                    <div class="pt-2">
                        <h6>Participation in the Performance Development Program is an essential and valuable part of
                            every
                            employee’s employment experience at our company.</h6>
                    </div>

                    <div class="text-center pt-2">
                        <h5>WISH YOU GOOD LUCK!</h5>
                        <h5>GO AHEAD!</h5>
                    </div>

                    <!-- Auto Filled Data Of Employee -->

                    <div class="row" id="auto">
                        <div class="col-12">
                            <div class="contact-page-form" method="post">
                                <form action="" method="post">

                                    <div class="row">';
                                    ?>
        <?php 
                        $sql1 = "SELECT employee.*, manager.* FROM employee LEFT JOIN manager ON 
                        employee.e_m_id = manager.m_id WHERE e_email = '".$_SESSION['employename']."'";
                                
                        $result1 = mysqli_query($conn, $sql1) or die("Qyuery Failed ");
                        while($row1 = mysqli_fetch_assoc($result1)){
                    ?>
        <?php $truedata.= '<div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Name :</b></label>
                                                <input class="form-control" type="text"
                                                    value="'.$row1['e_name'].'" name="name" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Designation :</b></label>
                                                <input type="text" class="form-control"
                                                    value="'.$row1['e_desig'].'" name="email" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12  mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Email :</b></label>
                                                <input class="form-control" type="text"
                                                    value="'. $row1['e_email'].'" name="phone" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Employee ID Number :</b></label>
                                                <input class="form-control" type="text" id="employe-id"
                                                    value="'. $row1['e_empid'].'" name="subject" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Mobile :</b></label>
                                                <input class="form-control" type="text"
                                                    value="'. $row1['e_mobile'] .'" name="subject" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>Manager Name :</b></label>
                                                <input class="form-control" type="text"
                                                    value="'. $row1['m_name'] .'" name="subject" />

                                            </div>
                                        </div>'; } 
                                        
                                   $truedata.= '</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

            //  ********* Asking Querstion to Employee`s ********* //

            $truedata .= '<div class="main-div" id="maindiv2" style="display: none;">
                <div class="container-fluid">
                    <div class="row" id="question">
                        <div class="col-12">
                            <div class="contact-page-form" method="post">
                                <form action="action.php" method="post" enctype="multipart/form-data" id="mainform">

                                    <div class="row">';

                                    $sql2 = "SELECT employee.*, manager.* FROM employee LEFT JOIN manager ON 
                                    employee.e_m_id = manager.m_id WHERE e_email = '".$_SESSION['employename']."'";
                                    $result2 = mysqli_query($conn, $sql2) or die("Qyuery Failed ");
                                    while($row2 = mysqli_fetch_assoc($result2)){ ?>


        <?php $truedata.= '<input class="form-control" type="hidden" value="'.$row2['m_id'] .'"
                                            placeholder="Subject" id="managerId" name="managerId" />
                                        <input class="form-control" type="hidden" value="'. $row2['e_id'] .'"
                                            placeholder="Subject" id="employeeId" name="employeeId" />';
                                         }?>
        <?php $truedata.= '<div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>1. Describe all the good work you have done
                                                        in
                                                        your department and the organization in the past one
                                                        year?</b></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Describe Your Answer" id="question1"
                                                    name="question1text" required />
                                                <input class="form-control" type="file" name="question1img"
                                                    placeholder="Your Name" onchange="return fileValidation1()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question1img" title="Only Images allowed"/>
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img1err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>2. Let us know where you have brought
                                                        savings
                                                        or increased business of the organisation.</b></label>
                                                <input type="text" class="form-control"
                                                    placeholder="Describe Your Answer" id="question2"  name="question2text" required />
                                                <input class="form-control mt-1" type="file" name="question2img"
                                                    placeholder="Your Name" onchange="return fileValidation2()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question2img" />
                                                <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img2err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>
                                                        3. Describe any difficult situation because of which you did not
                                                        get
                                                        the result that you wanted during the last one year.</b></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Describe Your Answer" id="question3" name="question3text" />
                                                <input class="form-control mt-1" type="file" name="question3img"
                                                    placeholder="Your Name" onchange="return fileValidation3()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question3img" />
                                                <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img3err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>4. Describe what has helped you in
                                                        achieving
                                                        your goals/ target during the last one year.</b></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Describe Your Answer" id="question4" name="question4text" />
                                                <input class="form-control mt-1" type="file" name="question4img"
                                                    placeholder="Your Name" onchange="return fileValidation4()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question4img" />
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img4err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>5. Please list your area(s) of
                                                        strength.</b></label>
                                                <input class="form-control" type="text"
                                                    placeholder="Describe Your Answer" id="question5"  name="question5text"/>
                                                <input class="form-control mt-1" type="file" name="question5img"
                                                    placeholder="Your Name" onchange="return fileValidation5()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question5img" />
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img5err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>6. How did you improve your skills? Did you
                                                        also help your team members to learn new skills ?</b></label>
                                                <input class="form-control" type="text" name="question6text"
                                                    placeholder="Describe Your Answer" id="question6" />
                                                <input class="form-control mt-1" type="file" name="question6img"
                                                    placeholder="Your Name" onchange="return fileValidation6()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question6img" />
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img6err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>7. Please list your area(s) of
                                                        improvement.</b></label>
                                                <input class="form-control" type="text" name="question7text"
                                                    placeholder="Describe Your Answer" id="question7" />
                                                <input class="form-control mt-1" type="file" placeholder="Your Name"
                                                    onchange="return fileValidation7()"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question7img" name="question7img" />
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img7err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field">
                                                <label class="form-label"><b>8. Is there any other information you would
                                                        like to share with your supervisor/manager regarding your work
                                                        performance?</b></label>
                                                <input class="form-control" type="text" name="question8text"
                                                    placeholder="Describe Your Answer" id="question8" />
                                                <input class="form-control mt-1" type="file"
                                                    onchange="return fileValidation8()" placeholder="Your Name"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff"
                                                    id="question8img" name="question8img" />
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img8err"></span>
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <div class="single-input-field q9">
                                                <label class="form-label"><b>9. List down your goals for the next year.
                                                        (SMART goals). Also, please tell what will be the result of
                                                        those
                                                        goals? Definition of elements of SMART: S-Specific
                                                        <br>M-Measurable
                                                        <br>A -Achievable
                                                        <br>R-Realistic
                                                        <br>T-Time-boundv</b></label>
                                                <input class="form-control" type="text" name="question9text"
                                                    placeholder="Describe Your Answer" id="question9" />
                                                <input class="form-control mt-1" type="file"
                                                    onchange="return fileValidation9()" placeholder="Your Name"
                                                    id="question9img" name="question9img"
                                                    accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" />
                                                    <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only Image).</div>
                                                <span id="img9err"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <input type="submit" class="btn btn-primary mb-2" value="Submit"
                                                style="display: none;" id="quesfill" name="quesfill" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>';
        $truedata.= '<div class="d-flex justify-content-center">
            <input type="button" class="btn btn-primary mb-2" value="Submit" id="autofill" onclick="autofill()" />

        </div>';
        echo $truedata;
                                        }
        }else{
            echo '<div class="container-fluid">
            <div class="text-center pt-2">
                <h3>You do not have any Apprisal form</h3>
            </div>
            </div>';
        }
        
        
        ?>



        <?php include("footer.php"); ?>
        <script>
        function autofill() {
            document.getElementById('maindiv1').style.display = 'none';
            document.getElementById('maindiv2').style.display = 'block';
            document.getElementById('autofill').style.display = 'none';
            document.getElementById('quesfill').style.display = 'block';
        }

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
        </script> 
    </div>
    <script src="manager.js"></script>



</body>

</html>
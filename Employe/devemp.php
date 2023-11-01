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
        <div class="d-flex justify-content-center mb-2">
            <h4>Coaching and Development Plan</h4>
        </div>
        <div class="container-fluid">
            <form action="action.php" method="POST" enctype="multipart/form-data">
                <?php 
                    $sql = "SELECT emp_question_id FROM emp_questuon ORDER BY emp_question_id DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                    $row = mysqli_fetch_assoc($result);
                ?>
                <input type="hidden" value="<?php echo $row['emp_question_id']; ?>" name="lastQId">
                <div class="mb-2">
                    <div class="single-input-field">
                        <label class="form-label"><b>1. Coaching + Development Plan (Completed in partnership by manager
                                and employee)</b></label>
                        <p>Please mention two development areas that will help you to perform your current role in good
                            way;<br><b>a) Development Area:</b><br>Support Needed:</p>
                        <textarea class="form-control" id="a1" rows="2" name="planAtext" required></textarea>
                        <input class="form-control mt-1" type="file" name="image1" onchange="return fileValidation1()"
                            accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="image1" />
                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                            Image).</div>
                        <span id="img1err"></span>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="single-input-field">
                        <label class="form-label mb-0"><b>b) Development Area:</b></label>
                        <p>Support Needed:</p>
                        <textarea class="form-control" id="a1" rows="2" name="planBtext" required></textarea>
                        <input class="form-control mt-1" type="file" name="image2" onchange="return fileValidation2()"
                            accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="image2" />
                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                            Image).</div>
                        <span id="img2err"></span>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="single-input-field">
                        <label class="form-label mb-0"><b>2. Please mention your career objectives and two development
                                areas which will help you to achieve these objectives.</b></label>
                        <p><b>a) Career Interest:</b><br>Support Needed:</p>
                        <textarea class="form-control" id="a1" rows="2" name="careerAtext" required></textarea>
                        <input class="form-control mt-1" type="file" name="image3" onchange="return fileValidation3()"
                            accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="image3" />
                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                            Image).</div>
                        <span id="img3err"></span>
                    </div>
                </div>
                <div class="mb-2">
                    <div class="single-input-field">
                        <label class="form-label mb-0"><b>b) Career Interests:</b></label>
                        <p>Support Needed:</p>
                        <textarea class="form-control" id="a1" rows="2" name="careerBtext" required></textarea>
                        <input class="form-control mt-1" type="file" name="image4" onchange="return fileValidation4()"
                            accept="image/jpeg,image/jpg,image/gif,image/png,image/bmp,image/tiff" id="image4" />
                        <div id="emailHelp" class="form-text">Please Upload if you have any reference(choose only
                            Image).</div>
                        <span id="img4err"></span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input class="btn btn-primary" type="submit" value="Submit" name="development">
                </div>
            </form>
        </div>
        <?php include("footer.php"); ?>
        <script>
        function fileValidation1() {
            var fileInput = document.getElementById('image1');

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
            var fileInput = document.getElementById('image2');

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
            var fileInput = document.getElementById('image3');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img3err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }

        function fileValidation4() {
            var fileInput = document.getElementById('image4');

            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.bmb|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(filePath)) {
                var imgerr = document.getElementById('img4err');

                imgerr.innerHTML = 'Sorry, only accepted files are .jpg,.png,.bmb,.gif,.jpeg';
                imgerr.style.color = 'red';
                fileInput.value = '';
                return false;
            }
        }
        </script>
    </div>
    <script src="../main.js"></script>



</body>

</html>
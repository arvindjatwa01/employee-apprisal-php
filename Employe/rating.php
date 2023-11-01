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
            <h4>Give Rating To Yourself</h4>
        </div>
        <form action="action.php" method="POST">
            <?php 
                    $sql = "SELECT emp_question_id FROM emp_questuon ORDER BY emp_question_id DESC LIMIT 1";
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
                    $row = mysqli_fetch_assoc($result);
                ?>
            <input type="hidden" value="<?php echo $row['emp_question_id']; ?>" name="lastQId">

            <!-- <input type="hidden" value=""> -->
            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Job knowledge and skills -</div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating1" id="ratingA1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating1" id="ratingA2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating1" id="ratingA3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating1" id="ratingA4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating1" id="ratingA5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Quality of Work - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating2" id="ratingB1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating2" id="ratingB2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating2" id="ratingB3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating2" id="ratingB4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating2" id="ratingB5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Initiative and motivation - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating3" id="ratingC1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating3" id="ratingC2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating3" id="ratingC3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating3" id="ratingC4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating3" id="ratingC5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Team Work - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating4" id="ratingD1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating4" id="ratingD2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating4" id="ratingD3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating4" id="ratingD4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating4" id="ratingD5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Ethics and Integrity - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating5" id="ratingE1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating5" id="ratingE2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating5" id="ratingE3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating5" id="ratingE4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating5" id="ratingE5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Discipline(Following Rules and
                    Processes) -
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating6" id="ratingF1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating6" id="ratingF2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating6" id="ratingF3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating6" id="ratingF4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating6" id="ratingF5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Attitude (like adaptility, cooperation,
                    docile, follows instructions etc.) - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating7" id="ratingG1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating7" id="ratingG2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating7" id="ratingG3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating7" id="ratingG4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating7" id="ratingG5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Communication Skills - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating8" id="ratingH1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating8" id="ratingH2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating8" id="ratingH3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating8" id="ratingH4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating8" id="ratingH5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Leadership Skills - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating9" id="ratingI1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating9" id="ratingI2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating9" id="ratingI3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating9" id="ratingI4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating9" id="ratingI3" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Accountability - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating10" id="ratingJ1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating10" id="ratingJ2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating10" id="ratingJ3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating10" id="ratingJ4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating10" id="ratingJ5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Attention to details - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating11" id="ratingK1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating11" id="ratingK2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating11" id="ratingK3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating11" id="ratingK4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating11" id="ratingK5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Problem Solving Skills - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating12" id="ratingL1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating12" id="ratingL2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating12" id="ratingL3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating12" id="ratingL4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating12" id="ratingL5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Result Oriented - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating13" id="ratingM1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating13" id="ratingM2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating13" id="ratingM3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating13" id="ratingM4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating13" id="ratingM5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Confident and Tact - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating14" id="ratingN1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating14" id="ratingN2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating14" id="ratingN3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating14" id="ratingN4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating14" id="ratingN5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Sense of Urgency - </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating15" id="ratingO1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating15" id="ratingO2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating15" id="ratingO3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating15" id="ratingO4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating15" id="ratingO5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>

            <div class="container-fluid mb-2 d-flex d-flex">
                <div class="col-6"><i class="fa-solid fa-caret-right mx-1"></i> Attendance -</div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating16" id="ratingP1" value="1">
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating16" id="ratingP2" value="2">
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating16" id="ratingP3" value="3">
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating16" id="ratingP4" value="4">
                    <label class="form-check-label" for="inlineRadio3">4</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="rating16" id="ratingP5" value="5">
                    <label class="form-check-label" for="inlineRadio3">5</label>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" value="Submit" name="ratingbtn">
            </div>
        </form>
        <?php include("footer.php"); ?>
        </script>
    </div>
    <script src="../main.js"></script>



</body>

</html>
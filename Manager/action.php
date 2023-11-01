<?php
include("../connection.php");
if (isset($_POST['managerAppsub'])) {

    $upload_folder = "mimages/";
    $rating = $_POST['ratingM'];
    $suggestion = $_POST['suggestion'];
    $empId = $_POST['empId'];
    $managerId = $_POST['managerId'];
    $opinion1 = $_POST['questionM1text'];
    $opinion2 = $_POST['questionM2text'];
    $opinion3 = $_POST['questionM3text'];
    $opinion4 = $_POST['questionM4text'];
    $opinion5 = $_POST['questionM5text'];
    $opinion6 = $_POST['questionM6text'];
    $opinion7 = $_POST['questionM7text'];
    $opinion8 = $_POST['questionM8text'];
    $opinion9 = $_POST['questionM9text'];


    $opinion1img = $_FILES['questionM1img']['name'];
    $file_location1 = $upload_folder . basename($opinion1img);
    move_uploaded_file($_FILES['questionM1img']['tmp_name'], $file_location1);
    
    $opinion2img = $_FILES['questionM2img']['name'];
    $file_location2 = $upload_folder . basename($opinion2img);
    move_uploaded_file($_FILES['questionM2img']['tmp_name'], $file_location2);
    
    
    $opinion3img = $_FILES['questionM3img']['name'];
    $file_location3 = $upload_folder . basename($opinion3img);
    move_uploaded_file($_FILES['questionM3img']['tmp_name'], $file_location3);
    
    
    $opinion4img = $_FILES['questionM4img']['name'];
    $file_location4 = $upload_folder . basename($opinion4img);
    move_uploaded_file($_FILES['questionM4img']['tmp_name'], $file_location4);
    
    
    $opinion5img = $_FILES['questionM5img']['name'];
    $file_location5 = $upload_folder . basename($opinion5img);
    move_uploaded_file($_FILES['questionM5img']['tmp_name'], $file_location5);
    
    
    $opinion6img = $_FILES['questionM6img']['name'];
    $file_location6 = $upload_folder . basename($opinion6img);
    move_uploaded_file($_FILES['questionM6img']['tmp_name'], $file_location6);
    
    
    $opinion7img = $_FILES['questionM7img']['name'];
    $file_location7 = $upload_folder . basename($opinion7img);
    move_uploaded_file($_FILES['questionM7img']['tmp_name'], $file_location7);
    
    
    $opinion8img = $_FILES['questionM8img']['name'];
    $file_location8 = $upload_folder . basename($opinion8img);
    move_uploaded_file($_FILES['questionM8img']['tmp_name'], $file_location8);
    
    
    $opinion9img = $_FILES['questionM9img']['name'];
    $file_location9 = $upload_folder . basename($opinion9img);
    move_uploaded_file($_FILES['questionM9img']['tmp_name'], $file_location9);


    $opinionC1 = $_POST['planMAtext'];
    $opinionC2 = $_POST['planMBtext'];
    $opinionC3 = $_POST['careerMAtext'];
    $opinionC4 = $_POST['careerMBtext'];

    $opinionC1img = $_FILES['imageC1']['name'];
    $opinionC2img = $_FILES['imageC2']['name'];
    $opinionC3img = $_FILES['imageC3']['name'];
    $opinionC4img = $_FILES['imageC4']['name'];


    $sql = "INSERT INTO managerfeed(manager_Id, employe_Id, manager_rating, man_suggestion, Mquestion1, 
    Mquestion2, Mquestion3, Mquestion4, Mquestion5, Mquestion6, Mquestion7, Mquestion8, Mquestion9, Mquestion1img, 
    Mquestion2img, Mquestion3img, Mquestion4img, Mquestion5img, Mquestion6img, Mquestion7img, Mquestion8img, Mquestion9img, 
    MquestionC1, MquestionC2, MquestionC3, MquestionC4, MquestionC1img, MquestionC2img, MquestionC3img, MquestionC4img) 
    VALUES('$managerId', '$empId', '$rating', '$suggestion', '$opinion1', '$opinion2', '$opinion3', '$opinion4', 
    '$opinion5', '$opinion6', '$opinion7', '$opinion8', '$opinion9', 
    '$opinion1img', '$opinion2img', '$opinion3img', '$opinion4img', '$opinion5img', '$opinion6img', '$opinion7img', 
    '$opinion8img', '$opinion9img', 
    '$opinionC1', '$opinionC2', '$opinionC3', '$opinionC4', '$opinionC1img', '$opinionC2img', '$opinionC3img', '$opinionC4img')";


    $sql1 = "UPDATE emp_questuon SET status = 1 WHERE employeeID = '$empId'";


       $result = mysqli_multi_query($conn, $sql) or die("Insert query Failed");
       $result1 = mysqli_multi_query($conn, $sql1) or die("Update query Failed");
       if($result AND $result1){
           header("Location: apprisal.php");
       }else{
           echo "Something Went Wrong";
       }
}

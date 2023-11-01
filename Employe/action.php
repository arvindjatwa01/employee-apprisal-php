<?php
include("../connection.php");
if(isset($_POST['quesfill'])){
    $managerId = $_POST['managerId'];
    $employeId = $_POST['employeeId'];
    $upload_folder = "eimages/";

    $image1 = $_FILES['question1img']['name'];
    $file_location1 = $upload_folder . basename($image1);
    move_uploaded_file($_FILES['question1img']['tmp_name'], $file_location1);

    $image2 = $_FILES['question2img']['name'];
    $file_location2 = $upload_folder . basename($image2);
    move_uploaded_file($_FILES['question2img']['tmp_name'], $file_location2);

    $image3 = $_FILES['question3img']['name'];
    $file_location3 = $upload_folder . basename($image3);
    move_uploaded_file($_FILES['question3img']['tmp_name'], $file_location3);

    $image4 = $_FILES['question4img']['name'];
    $file_location4 = $upload_folder . basename($image4);
    move_uploaded_file($_FILES['question4img']['tmp_name'], $file_location4);
    
    $image5 = $_FILES['question5img']['name'];
    $file_location5 = $upload_folder . basename($image5);
    move_uploaded_file($_FILES['question5img']['tmp_name'], $file_location5);
    
    $image6 = $_FILES['question6img']['name'];
    $file_location6 = $upload_folder . basename($image6);
    move_uploaded_file($_FILES['question6img']['tmp_name'], $file_location6);

    $image7 = $_FILES['question7img']['name'];
    $file_location7 = $upload_folder . basename($image7);
    move_uploaded_file($_FILES['question7img']['tmp_name'], $file_location7);

    $image8 = $_FILES['question8img']['name'];
    $file_location8 = $upload_folder . basename($image8);
    move_uploaded_file($_FILES['question8img']['tmp_name'], $file_location8);

    $image9 = $_FILES['question9img']['name'];
    $file_location9 = $upload_folder . basename($image9);
    move_uploaded_file($_FILES['question9img']['tmp_name'], $file_location9);

    $Q1 =  $_POST['question1text'];
    $Q2 =  $_POST['question2text'];
    $Q3 =  $_POST['question3text'];
    $Q4 =  $_POST['question4text'];
    $Q5 =  $_POST['question5text'];
    $Q6 =  $_POST['question6text'];
    $Q7 =  $_POST['question7text'];
    $Q8 =  $_POST['question8text'];
    $Q9 =  $_POST['question9text'];

    $sql ="INSERT INTO emp_questuon(question1, question2, question3, question4, question5, question6, question7, 
    question8, question9, question1img, question2img, question3img, question4img, question5img, question6img, 
    question7img, question8img, question9img ,managerId, employeeID) VALUES('$Q1', '$Q2', '$Q3', '$Q4', '$Q5', '$Q6', 
    '$Q7', '$Q8', '$Q9', '$image1', '$image2', '$image3', '$image4', '$image5', '$image6', '$image7', '$image8', '$image9', 
    '$managerId', '$employeId')";
    
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: devemp.php");
    }else{
        echo "Failed";
    }
}

if(isset($_POST['development'])){
    $upload_folder = "eimages/";

    $image1 = $_FILES['image1']['name'];
    $file_locationA1 = $upload_folder . basename($image1);
    move_uploaded_file($_FILES['image1']['tmp_name'], $file_locationA1);

    $image2 = $_FILES['image2']['name'];
    $file_locationA2 = $upload_folder . basename($image2);
    move_uploaded_file($_FILES['image2']['tmp_name'], $file_locationA2);

    
    $image3 = $_FILES['image3']['name'];
    $file_locationA3 = $upload_folder . basename($image3);
    move_uploaded_file($_FILES['image3']['tmp_name'], $file_locationA3);

    
    $image4 = $_FILES['image4']['name'];
    $file_locationA4 = $upload_folder . basename($image4);
    move_uploaded_file($_FILES['image4']['tmp_name'], $file_locationA4);

    $lastQId = $_POST['lastQId'];
    $planAtext = $_POST['planAtext'];
    $planBtext = $_POST['planBtext'];
    $careerAtext = $_POST['careerAtext'];
    $careerBtext = $_POST['careerBtext'];

    $sql = "UPDATE emp_questuon SET planAtext = '$planAtext', planAimg = '$image1', planBtext = '$planBtext', 
    planBimg = '$image2', careerAtext='$careerAtext', careerAimg = '$image3', careerBtext = '$careerBtext', 
    careerBimg = '$image4' WHERE emp_question_id = '$lastQId'";

    $result = mysqli_query($conn, $sql) or die("Quewry Failed");
    if($result){
        header("Location: rating.php");
    }else{
        echo "<script>alert('Somerthing Went Wrong')</script>";
    }

}

if(isset($_POST['ratingbtn'])){
    $rating1 = $_POST['rating1'];
    $rating2 = $_POST['rating2'];
    $rating3 = $_POST['rating3'];
    $rating4 = $_POST['rating4'];
    $rating5 = $_POST['rating5'];
    $rating6 = $_POST['rating6'];
    $rating7 = $_POST['rating7'];
    $rating8 = $_POST['rating8'];
    $rating9 = $_POST['rating9'];
    $rating10 = $_POST['rating10'];
    $rating11 = $_POST['rating11'];
    $rating12 = $_POST['rating12'];
    $rating13 = $_POST['rating13'];
    $rating14 = $_POST['rating14'];
    $rating15 = $_POST['rating15'];
    $rating16 = $_POST['rating16'];
    $lastQId = $_POST['lastQId'];

    $sql ="UPDATE emp_questuon SET rating1 = '$rating1', rating2 = '$rating2', rating3 = '$rating3', 
    rating4 = '$rating4', rating5 = '$rating5', rating6 = '$rating6', rating7 = '$rating7', rating8 = '$rating8',
    rating9 = '$rating9', rating10 = '$rating10', rating11 = '$rating11', rating12 = '$rating12', 
    rating13 = '$rating13', rating14 = '$rating14', rating15 = '$rating15', rating16 = '$rating16' WHERE
    emp_question_id = '$lastQId'";
    $result= mysqli_query($conn, $sql) or die("Query Failed");
    if($result){
        header("Location: empapprisal.php");
    }else{
        echo "Rated Failed"; 
    }

}

?>
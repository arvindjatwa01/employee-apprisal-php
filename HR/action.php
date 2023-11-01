<?php
include('connection.php');

// ########### Department Add ########### // 

if(isset($_POST['isadddepart'])){
    $Name = mysqli_real_escape_string($conn, $_POST['department']);
    
    $sql = "INSERT INTO department(depart_name) VALUES('$Name')";
    $result = mysqli_query($conn, $sql) or die("Query Failed : Insert Department");
    if($result){
        echo "Department Added Successfully";
    }else{
        echo "Something Went Wrong";
    }

}

// ############# Department Update ########## //

if(isset($_POST['isupdepart'])){
    $update_id = $_POST['up_id'];
    $departName = $_POST['updepartname'];

    $sql = "UPDATE department SET depart_name = '$departName' WHERE depart_id = $update_id";
    $result = mysqli_query($conn, $sql) or die("Query Failed: Update Department");
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
        window.location.href='adddepartment.php';
        </script>");
    }else{
        echo "<script>window.location.href='adddepartment.php';</script>";
    }
}

// ############# Department Delete ########## //

if(isset($_POST['isdeldepart'])){
    $deldepart_id = $_POST['deldepart'];
    $sql = "DELETE FROM department WHERE depart_id = $deldepart_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Department Delete Successfully";
    }else{
        echo "Something Went Wrong";
    }
}

// ############ Add Manager ############ //


if(isset($_POST['isaddManager'])){
    $Name = mysqli_real_escape_string($conn, $_POST['nameManager']);
    $Email = mysqli_real_escape_string($conn, $_POST['emailManager']);
    $Address = mysqli_real_escape_string($conn, $_POST['addressManager']);
    $Mobile = mysqli_real_escape_string($conn, $_POST['mobileManager']);
    $depart = mysqli_real_escape_string($conn, $_POST['deprtManager']);
    $Desgi = mysqli_real_escape_string($conn, $_POST['desigManager']);
    $MempId = mysqli_real_escape_string($conn, $_POST['emp_idManager']);
    $Mpass = mysqli_real_escape_string($conn, $_POST['passManager']);

    $sql1 = "SELECT * FROM manager WHERE m_email = '$Email' OR m_mobile = '$Mobile' OR m_emp_id = '$MempId'";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
    
    $count = mysqli_num_rows($result1);
    if($count > 0 ){
        echo "The manger Employee Id/ Mobile / Email is already present in the Manager Data";
    }else{
        $sql = "INSERT INTO manager(m_emp_id, m_name, m_address, m_email, d_m_id, m_mobile, m_desig, m_password) 
        VALUES('$MempId', '$Name', '$Address', '$Email', '$depart', '$Mobile', '$Desgi' , '$Mpass');";
        $result = mysqli_query($conn, $sql) or die("Query Failed : Insert Manager");
        if($result){
            echo "Manager Added Successfully";
        }else{
            echo "Manager Addiation Failed";
        }
    }
}

// ############ Update Manager ############ //

if(isset($_POST['isupManger'])){
    $managerId = $_POST['up_m_id'];
    $managerName = $_POST['upmanagername'];
    $managerEmail = $_POST['upmanageremail'];
    $managerAddress = $_POST['upmanageraddress'];
    $managerMobile = $_POST['upmanagermobile'];
    $managerdepart = $_POST['upMdepartment'];
    $managerDesig = $_POST['upmanagerdesignation'];
    $managerEmpId = $_POST['up_memp_id'];
    $managerPass = $_POST['upmanagerpass'];

    $sql = "UPDATE manager SET m_emp_id = '$managerEmpId', m_name = '$managerName', m_email = '$managerEmail', 
    m_address = '$managerAddress', m_password = '$managerPass', m_mobile = '$managerMobile', 
    d_m_id = '$managerdepart', m_desig = '$managerDesig' WHERE m_id = $managerId";
    
    $result = mysqli_query($conn, $sql) or die("Query Failed: Update Manager");
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
        window.location.href='manager.php';
        </script>");
    }else{
        echo "<script>window.location.href='manager.php';</script>";
    }
}

// ############# Manager Delete ########## //

if(isset($_POST['isdelmanager'])){
    $delmanager_id = $_POST['delmanager'];
    $sql = "DELETE FROM manager WHERE m_id = $delmanager_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Manager Delete Successfully";
    }else{
        echo "Something Went Wrong";
    }
}

// ########### Select  Department ########### //

// if(isset($_POST['department_id']))
// {
// 	$id=$_POST['department_id'];

// 	$sql="SELECT manager.*, department.* from department LEFT JOIN manager ON department.depart_id = manager.d_m_id where depart_id='$id'";
// 	$result=mysqli_query($conn,$sql) or die("Query FAiled");
// 	while($row = mysqli_fetch_assoc($result)){
// 		echo $row['m_name'];
// 	}
// }

 
// Include the database config file 
 
if(!empty($_POST["country_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM manager WHERE d_m_id = ".$_POST['country_id'].""; 
    
    $result = $conn->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Manager</option>'; 
        while($row = $result->fetch_assoc()){  
            echo '<option value="'.$row['m_id'].'">'.$row['m_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Manager not available</option>'; 
    } 
}


// ************ Add Employee ************* //

if(isset($_POST['isaddemployee'])){
    $Name = mysqli_real_escape_string($conn, $_POST['nameemployee']);
    $Email = mysqli_real_escape_string($conn, $_POST['emailemployee']);
    $Address = mysqli_real_escape_string($conn, $_POST['addressemployee']);
    $Mobile = mysqli_real_escape_string($conn, $_POST['mobileemployee']);
    $depart = mysqli_real_escape_string($conn, $_POST['deprtemployee']);
    $manager = mysqli_real_escape_string($conn, $_POST['manageremployee']);
    $Desgi = mysqli_real_escape_string($conn, $_POST['desigemployee']);
    $EempId = mysqli_real_escape_string($conn, $_POST['EmpIdemployee']);
    $Epass = mysqli_real_escape_string($conn, $_POST['passemployee']);

    $sql1 = "SELECT * FROM employee WHERE e_email = '$Email' OR e_mobile = '$Mobile' OR e_empid = '$EempId'";
    $result1 = mysqli_query($conn, $sql1) or die("Query Failed");
    
    $count = mysqli_num_rows($result1);
    if($count > 0 ){
        echo "The Employee Employee Id/ Mobile / Email is already present in the Manager Data";
    }else{

        $sql = "INSERT INTO employee(e_empid, e_name, e_address, e_email, e_d_id, e_m_id, e_mobile, e_desig, e_password) 
        VALUES('$EempId', '$Name', '$Address', '$Email', '$depart', '$manager', '$Mobile', '$Desgi', '$Epass')";
        $result = mysqli_query($conn, $sql) or die("Query Failed : Insert Manager");
        if($result){
            echo "Employee Added Successfully";
        }else{
            echo "Employee Addiation Failed";
        }
    }

}

// ********** Update Employee ************* //


if(!empty($_POST["department_id"])){ 
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM manager WHERE d_m_id = ".$_POST['department_id'].""; 
    
    $result = $conn->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select Manager</option>'; 
        while($row = $result->fetch_assoc()){ 
            echo '<option value="'.$row['m_id'].'">'.$row['m_name'].'</option>'; 
        } 
    }else{ 
        echo '<option value="">Manager not available</option>'; 
    } 
}



if(isset($_POST['isupemployee'])){
    $employeeId = $_POST['up_m_id'];
    $employeeName = $_POST['upemployeename'];
    $employeeEmail = $_POST['upemployeeemail'];
    $employeeAddress = $_POST['upemployeeaddress'];
    $employeeMobile = $_POST['upemployeermobile'];
    $employeeDepart = $_POST['upemployeedepart'];
    $employeeDesig = $_POST['upemployeedesignation'];
    $employeeEmpId = $_POST['up_empid'];
    $employeePass = $_POST['upemployeepass'];
    $employeeManger = $_POST['upempManager'];

    $sql = "UPDATE employee SET e_empid = '$employeeEmpId', e_name = '$employeeName', e_email = '$employeeEmail', 
    e_address = '$employeeAddress', e_password = '$employeePass', e_mobile = '$employeeMobile', 
    e_m_id = '$employeeManger', e_d_id = '$employeeDepart', e_desig = '$employeeDesig' WHERE e_id = $employeeId";
   
    $result = mysqli_query($conn, $sql) or die("Query Failed: Update Employee");
    if($result){
        echo ("<script LANGUAGE='JavaScript'>
        window.location.href='employee.php';
        </script>");
    }else{
        echo "<script>window.location.href='employee.php';</script>";
    }
}

// ############# Manager Delete ########## //

if(isset($_POST['isdelemployee'])){
    $delemployee_id = $_POST['delemployee'];
    $sql = "DELETE FROM employee WHERE e_id = $delemployee_id";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "Employee Delete Successfully";
    }else{
        echo "Something Went Wrong";
    }
}

// ************ Send Apprisal By HR ********** //
// if(isset($_POST['sendapp'])){
    
//     $Adepartment = $_POST['Adepartment'];
//     $AManager = $_POST['Manager'];
//     $appri = 1;
//     $sql = "INSERT INTO main_department_apprisal(anodepart, anodepartMan, appri)
//     VALUES('$Adepartment', '$AManager', $appri)";
//     $result = mysqli_query($conn, $sql)or die('Query Failed: 1st time insert');
//     if($result){
//         $lastId = mysqli_insert_id($conn);
//         $dpoption = $_POST['dpoption'];
//         foreach($dpoption as $item){
//             $sql1= "UPDATE main_department_apprisal SET maindepart = '$item' WHERE mda_id = '$lastId'";
//             $result1 = mysqli_query($conn, $sql1)or die('Query Failed: 1st time updation');
//         }
//         header("Location: sendapprial.php");
//     }else{
//         echo "Something Went Wrong";
//     }
// }

if(!empty($_POST["favorite_id"])){ 
    // Fetch state data based on the specific country 
    $favId = $_POST['favorite_id'];
    $query = "SELECT * FROM manager WHERE d_m_id IN ($favId, ',')"; 
    
    $result = $conn->query($query); 
     
    // Generate HTML of state options list 

    if($result->num_rows > 0){ 
        
        // echo '<option value="">Select Manager</option>'; 
        while($row = $result->fetch_assoc()){
            echo '<label for="'.$row['m_id'].'"><input id="selManager" name="selManager[]" type="checkbox" value="'.$row['m_id'].'">'.' '. $row["m_name"] .'</label>'; 
            // echo '<option value="'.$row['m_id'].'">'.$row['m_name'].'</option>';
        } 
    }else{ 
        echo '<option value="">Manager not available</option>'; 
    } 
}

if(isset($_POST['sendapp'])){
    $appri = 1;
    $Mainseldepart = $_POST['1stseldepart'];
    $AdepartmentMan = $_POST['selManager']; 
    $ids = implode(', ', $AdepartmentMan);
    $a = "SELECT * FROM employee WHERE e_m_id IN ($ids)";
    $b = mysqli_query($conn, $a) or die("Select Query Failed");

    while($row = mysqli_fetch_assoc($b)) 
    {
        $empId = $row['e_id'];
        $mangerId = $row['e_m_id'];
           
        $sql = "INSERT INTO main_department_apprisal(maindepart, anodepartMan, anotherDEmp, appri)
        VALUES('$Mainseldepart','$mangerId', '$empId', $appri)"; 
        $result = mysqli_query($conn, $sql)or die('Query Failed: time insert');
    }
    if($result){
        echo "Inserted Successfully";
    }else{
        echo "oops Failed";
    }
}

?>
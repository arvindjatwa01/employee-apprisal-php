<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Employee</title>
    <link rel="stylesheet" href="mainstyle.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome on Happy Performer</h2>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <p>
                            <label>Username or email address<span>*</span></label>
                            <input type="text" placeholder="Username or Email" name="employename" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" name="Epassword" placeholder="Password" required>
                        </p>
                        <p>
                            <input type="submit" value="Login" name="managerlogin" />
                        </p>
                    </form>
                    <?php 
                        
                        if(isset($_POST['managerlogin'])){

                            include("../connection.php");
                            if(empty($_POST['employename'] || $_POST['Epassword'])){
                                echo '<script>alert("All Fileds must be entered")</script>';
                                die();
                            }else{
                                $username = mysqli_real_escape_string($conn, $_POST['employename']);
                                $password = mysqli_real_escape_string($conn, $_POST['Epassword']);
    
                                $sql = "SELECT * FROM employee WHERE e_email = '$username' AND e_password = '$password'";
                                
                                $result = mysqli_query($conn, $sql) OR die("Query Failed");
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        session_start();
                                        $_SESSION['employename'] = $row['e_email'];
                                        $_SESSION['e_id'] = $row['e_id'];
                                        $_SESSION['e_name'] = $row['e_name'];
                                        $_SESSION['e_empid'] = $row['e_empid'];
                                        $_SESSION['emp_man_id'] = $row['e_m_id'];
                                        $_SESSION['emp_depart_id'] = $row['e_d_id'];
                                        header("Location: index.php");
                                    }
                                }else{
                                    echo '<script>alert("Username and Password are not match")</script>';
                                }
                            }
                        }
                        
                        ?>
                        
                </div>
            </div>
        </div>
    </div>
</body>

</html>
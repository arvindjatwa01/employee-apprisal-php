<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Manager</title>
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
                            <input type="text" placeholder="Username or Email" name="managername" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" name="Mpassword" placeholder="Password" required>
                        </p>
                        <p>
                            <input type="submit" value="Login" name="managerlogin" />
                        </p>
                    </form>
                    <?php 
                        
                        if(isset($_POST['managerlogin'])){

                            include("../connection.php");
                            if(empty($_POST['managername'] || $_POST['Mpassword'])){
                                echo '<script>alert("All Fileds must be entered")</script>';
                                die();
                            }else{
                                $username = mysqli_real_escape_string($conn, $_POST['managername']);
                                $password = mysqli_real_escape_string($conn, $_POST['Mpassword']);
    
                                $sql = "SELECT * FROM manager WHERE m_email = '$username' AND m_password = '$password'";
                                
                                $result = mysqli_query($conn, $sql) OR die("Query Failed");
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        session_start();
                                        $_SESSION['managername'] = $row['m_email'];
                                        $_SESSION['m_id'] = $row['m_id'];
                                        $_SESSION['m_name'] = $row['m_name'];
                                        $_SESSION['d_id'] = $row['d_m_id'];
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
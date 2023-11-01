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
                            <input type="text" placeholder="Username or Email" name="admin-name" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input type="password" name="password" placeholder="Password" required>
                        </p>
                        <p>
                            <input type="submit" value="Login" name="managerlogin" />
                        </p>
                    </form>
                    <?php 
                        
                        if(isset($_POST['managerlogin'])){

                            include("../connection.php");
                            if(empty($_POST['admin-name'] || $_POST['password'])){
                                echo '<script>alert("All Fileds must be entered")</script>';
                                die();
                            }else{
                                $username = mysqli_real_escape_string($conn, $_POST['admin-name']);
                                $password = mysqli_real_escape_string($conn, $_POST['password']);
    
                                $sql = "SELECT * FROM hr WHERE email = '$username' AND password = '$password'";
                                
                                $result = mysqli_query($conn, $sql) OR die("Query Failed");
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        session_start();
                                        $_SESSION['admin-name'] = $row['email'];
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
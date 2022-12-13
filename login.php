<?php 

require_once 'system/init.php';

if(isset($_SESSION['logged']) && $_SESSION['logged'] == TRUE){

    header('location: dashboard.php');

}

if(isset($_POST['btn_login'])){

    $UserLogin = $_POST['username'];
    $UserPassword = $_POST['password'];

    login_system($UserLogin, $UserPassword);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CMS</title>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="descritpion" content="opis">
    <meta name="keywords" content="keywords">
    <meta name="author" content="...">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link type="text/css" rel="stylesheet" href="assets/css/login-form.css">
    <link type="text/css" rel="stylesheet" href="assets/css/responsive.css">
    <link type="text/css" rel="stylesheet" href="assets/css/fonts.css">
    <!-- CDN -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/regular.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/v5-font-face.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/v4-shims.min.css">
</head>
<body>

    <div class="form-container">
        <div class="form-logo"><img src="assets/images/logo.png" alt=""></div>
        <form action="login.php" method="post">
            <?php 
            
                if(isset($errorMsg)){

                    echo '<div class="error">' . $errorMsg . '</div>';
                    
                }

            ?>
            <label for="username"><i class="fa fa-user"></i> Username</label>
            <input type="text" name="username">
            <label for="password"><i class="fa fa-key"></i> Password</label>
            <input type="password" name="password">
            <button type="submit" name="btn_login">Login</button>
        </form>
        <div class="form-footer">YOON Group &copy; 2022</div>
    </div>

</body>
</html>
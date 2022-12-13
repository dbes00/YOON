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
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/login-form.css">
    <link type="text/css" rel="stylesheet" href="assets/css/responsive.css">
    <link type="text/css" rel="stylesheet" href="assets/css/fonts.css">
    <!-- CDN -->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/regular.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/solid.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/v5-font-face.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/v4-shims.min.css">
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <div class="grid-layout">
    <!-- Header section -->
    <header class="header">
      <div class="header-profile">
        <div class="header-profile__clock"><div id="clock"></div></div>
        <div class="header-profile__profile">
          <!-- Profile icon -->
          <i onclick="menuToggle();" class="fa-sharp fa-solid fa-user-large"></i>
          <!-- Profile details -->
          <div class="profile-menu">
            <h3><?php echo $_SESSION['user_name'] . ' ' . $_SESSION['user_surname']; ?><br /><span>Position</span></h3>
            <ul>
              <li><img src="assets/images/icons/avatar.png" /><a href="#">My profile</a></li>
              <li><img src="assets/images/icons/log-out.png" /><a href="logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
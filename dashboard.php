<?php
require_once 'system/init.php';

if(!isset($_SESSION['logged']) && $_SESSION['logged'] == FALSE){

  header('location: login.php');

} else {

load_template('header');
load_template('nav');

?>
    <!-- Main section -->
    <main class="main">
        <div class="main-header">
          <div class="main-header__heading">Hello <b><?php echo $_SESSION['user_name'] . ' ' . $_SESSION['user_surname']; ?></b></div>
          <!--<div class="main-header__updates">Recent Items</div>--> <!-- Right side --> 
        </div> 
        <!-- IT Assets -->
        <div class="main-title">
          <div class="main-title-left">IT Assets</div>
          <div class="main-title-right">Last Update: 21.11.2022</div>
        </div>
        <!-- Overview card -->
        <div class="main-overview">
            <!-- Employees card -->
            <div class="overview-card">
              <div class="overview-card__icon"><i class="fa fa-users"></i><div class="text">Employees</div></div>
              <div class="overview-card__info">2</div>
            </div>    
            <!-- Computers card -->
            <div class="overview-card">
              <div class="overview-card__icon"><i class="fa fa-computer"></i><div class="text">Computers</div></div>
              <div class="overview-card__info"><?php countComputers(); ?></div>
            </div>
            <!-- Mobile phone card -->
            <div class="overview-card">
              <div class="overview-card__icon"><i class="fa fa-mobile"></i><div class="text">Mobile Phone</div></div>
              <div class="overview-card__info">6</div>
            </div>
            <!-- Monitor card -->
            <div class="overview-card">
              <div class="overview-card__icon"><i class="fa fa-television"></i><div class="text">Monitor</div></div>
              <div class="overview-card__info">2</div>
            </div>
        </div>
    </main>
<?php 
load_template('footer');
}
?>
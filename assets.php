<?php
require_once 'system/init.php';

if(!isset($_SESSION['logged']) && $_SESSION['logged'] == FALSE){

  header('location: login.php');

} else {

load_template('header');
load_template('nav');

?>
    <!-- IT assets section -->
    <main class="main">
        <div class="main-assets-menu">
            <ul>
              <li><a href="assets.php?cat=computers">Computers</a></li>
              <li><a href="assets.php?cat=mobile">Mobile Phone</a></li>
              <li><a href="assets.php?cat=monitor">Monitor</a></li>
            </ul>
        </div>
        <div class="main-assets-table">
<?php

## Routing

if(isset($_GET['cat']) && $_GET['cat'] == 'computers' && isset($_GET['edit'])){
  load_view('edit_computers');
} else if(isset($_GET['cat']) && $_GET['cat'] == 'computers' && isset($_GET['add'])){
  load_view('add_computers');
} else if(isset($_GET['cat']) && $_GET['cat'] == 'computers' && isset($_GET['delete'])){
  load_view('delete_computers');
} else if(isset($_GET['cat']) && $_GET['cat'] == 'computers') {
  load_view('show_computers');
} else if(!isset($_GET['cat'])){
  load_view('show_computers');
}

?>               
        </div>
    </main>
<?php 
load_template('footer');
}
?>

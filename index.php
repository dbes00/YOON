<?php 

require_once 'system/init.php';

if(isset($_SESSION['logged']) && $_SESSION['logged'] = TRUE){
    
    header('location: dashboard.php');

} else {

    header('location: login.php');

}

?>
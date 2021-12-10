<?php
    if(!isset($_SESSION['user'])){
       $_SESSION['message'] ="<div class='error text-center'>Please Login To Access Admin Panel.</div>";
       header('location:'.HOMEURL.'admin/login.php');
    }

?>
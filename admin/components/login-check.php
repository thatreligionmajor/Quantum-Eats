<?php 
    //authorization - access control
    //check whether the user is logged in
    if(!isset($_SESSION['user']))
    {
        //user is not logged in
        $_SESSION['not-logged-in-msg'] = "<div class='error'>Please log in to access admin panel</div>";
        //redirect to login page with message
        header('location:'.SITEURL.'admin/login.php');
    }
?>
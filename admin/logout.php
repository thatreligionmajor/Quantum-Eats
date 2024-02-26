<?php
    //include constants for SITEURL
    include('../config/constants.php');
    //end the session
    session_destroy();
    //redirect to the login page
    header('location:'.SITEURL.'admin/login.php');
?>
<?php 
    include('../config/constants.php');
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        //get the value and delete
        echo "Get Value and Delete Image";
    }
    else 
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }
?>
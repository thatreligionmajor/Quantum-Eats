<?php 
    //include constants
    include('../config/constants.php');
    //get the id of the admin to be deleted
    $id = $_GET['id'];
    //create sql query to delete the admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";
    //execute sql query
    $res = mysqli_query($conn, $sql);
    //check whether the query was successful
    if($res==true) {
        //admin successfully deleted
        // echo "admin deleted";
        //create session variable to display the message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted</div>";
        //redirect to manage admin page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else {
        //error deleting admin
        // echo "failed to delete admin";
        $_SESSION['delete'] = "<div class-'error'>Failed to Delete Admin</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    //redirect to the manage admin page with message (success/error)
?>
<?php 
    include('../config/constants.php');
    //check whether the id and image_name value is set or not
    if(isset($_GET['id']) && isset($_GET['image_name']))
    {
        //get the value and delete
        echo "Get Value and Delete Image";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];
        
        //remove the physical image file if available
        if($image_name != "")
        {
            $path = "../images/foods/".$image_name;
            $remove = unlink($path);

            //if failed to remove image, then add an error message and stop the process
            if($remove==false)
            {
                $_SESSION['remove'] = "<div class='error'>Failed to Remove Image</div>";
                header('location:'.SITEURL.'admin/manage-food.php');
                die();
            }
        }

        //delete data from the database
        //sql query to delete data from the database
        $sql = "DELETE FROM tbl_food WHERE id = $id";
        //execute query
        $res = mysqli_query($conn, $sql);

        //check if the data was deleted successfully
        if($res==true)
        {
            $_SESSION['delete'] = "<div class='success'>Food Deleted Successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['delete'] = "<div class='error'>Failed to Delete Food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
    }
    else 
    {
        //redirect to manage food page
        $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access</div>";
        header('location:'.SITEURL.'admin/manage-food.php');
    }
?>
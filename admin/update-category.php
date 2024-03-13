<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Update Category</h1>
                    <br />

                    <br />
                    <br />
                    <br />
                    <!-- <a href="add-admin.php" class ="button btn-primary">Add Admin</a> -->
                    <br />
                    <?php
                        //check whether id is set
                        if(isset($_GET['id']))
                        {
                            //get the id and all other details
                            $id = $_GET['id'];
                            //create sql query to get all other details
                            $sql = "SELECT * FROM tbl_category WHERE id=$id";
                            //execute sql query
                            $res = mysqli_query($conn, $sql);
                            //count the rows to check whether the id is valid
                            $count = mysqli_num_rows($res);
                            if($count==1)
                            {
                                //get all the data
                                $row = mysqli_fetch_assoc($res);
                                $title = $row['title'];
                                $current_image = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                            }
                            else
                            {
                                //redirect to manage category with session message
                                $_SESSION['no-category-found'] = "<div class='error'>Category Not Found</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                            }
                        }
                        else
                        {
                            //redirect to manage catefory
                            header('location:'.SITEURL.'/admin/manage-category.php');
                        }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <table class="tbl-30">
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" value="<?php echo $title; ?>" placeholder=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>Current Image:</td>
                                <td>
                                    <?php 
                                        if($current_image != "")
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/categories/<?php echo $current_image; ?>" width="50%" />
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<div class=='error'>Image Not Added</div>";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>New Image:</td>
                                <td>
                                    <input type="file" name="image" />
                                </td>
                            </tr>
                            <tr>
                                <td>Featured:</td>
                                <td>
                                    <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes" /> Yes
                                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="featured" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td>Active:</td>
                                <td>
                                    <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes" /> Yes
                                    <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>" >
                                    <input type="submit" name="submit" value="Update Category" class="button btn-secondary" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php 
                        if(isset($_POST['submit']))
                        {
                            //echo  "Clicked";
                            //1. get all values from form
                            $id = $_POST['id'];
                            $title = $_POST['title'];
                            $current_image = $_POST['current_image'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];

                            //2. update the new image
                            //a. check whether new image is selected
                            if(isset($_FILES['image']['name']))
                            {
                                //i. get the image details
                                $image_name = $_FILES['image']['name'];
                                if($image_name!="")
                                {
                                    //image available
                                    
                                }
                                else
                                {
                                    $image_name = $current_image;
                                }
                            }
                            else
                            {
                                //ii. 
                                $image_name = $current_image;
                            }
                            //3. update the database
                            $sql2 = "UPDATE tbl__category SET 
                                title = 
                                $title',
                                featured = $featured,
                                active = $active
                                WHERE id = $id
                                ";
                                $res = mysqli_query($conn, $sql2);
                            //4. redirect to manage category with a message
                            //a. check whether query executed
                            if($res2==true)
                            {
                                //updated
                                $_SESSION['update'] = "<div class='success'>Category Updated Successfully</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                            }
                            else
                            {
                                //failed 
                                $_SESSION['update'] = "<div class='error'>Failed to Updated Category </div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                            }
                        }
                    ?>

                </div>                
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>
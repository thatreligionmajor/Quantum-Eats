<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Add Category</h1>
                    <!-- Button to Add Category -->
                    <br />
                    <?php 
                        if(isset($_SESSION['add']))
                        {
                            echo$_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['upload']))
                        {
                            echo$_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <!--  -->
                    <br />
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <table class="tbl-30">
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" placeholder="Category Name" />
                                </td>
                            </tr>
                            <tr>
                                <td>Select Image: </td>
                                <td>
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Featured: </td>
                                <td>
                                    <input type="radio" name="featured" value="Yes" /> Yes
                                    <input type="radio" name="featured" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td>Active: </td>
                                <td>
                                    <input type="radio" name="active" name="active" value="Yes" /> Yes
                                    <input type="radio" name="active" name="active" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Add Category" class="button btn-secondary" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php 
                        //check whether submit button is clicked
                        if(isset($_POST['submit']))
                        {
                            //get the value from the category form
                            $title = $_POST['title'];
                            
                            //for radio input type, we need to check whether the button is selected or not
                            if(isset($_POST['featured']))
                            {
                                //get the value from the category form
                                $featured = $_POST['featured'];
                            }
                            else
                            {
                                //set the default value
                                $featured = "No";
                            }

                            if(isset($_POST['active']))
                            {
                                $active = $_POST['active'];
                            }
                            else
                            {
                                $active = "No";
                            }

                            //check whether the image is selected or not and set the value for image name
                            // print_r($_FILES['image']);
                            // die(); //break the code here
                            if(isset($_FILES['image']['name']))
                            {
                                //upload the image
                                //to upload an image, we need the image name, source  path, and destination path
                                $image_name=$_FILES['image']['name'];
                                
                                //upload the image only if image is selected
                                if($image_name != "")
                                {
                                    //auo rename the image
                                    //get the extension of our image
                                    $ext = end(explode('.', $image_name));
                                    //rename the image
                                    $image_name = "food_category_".rand(000, 999).'.'.$ext;
    
                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "../images/categories/".$image_name;
    
                                    //upload the image
                                    $upload = move_uploaded_file($source_path, $destination_path);
                                    //check whether the image is uploaded
                                    if($upload==false)
                                    {
                                        //set message
                                        $_SESSION['upload']   = "<div class='error'>Failed to Upload Image</div>";
                                        //if not, stop the process and redirect with an error message
                                        header('location:'.SITEURL.'admin/add-category.php');
                                        //stop the process
                                        die();
                                    }
                                }
                            }
                            else 
                            {
                                //don't upload the image and set the image_name value as blank
                                $image_name="";
                            }

                            //sql query to insert a new category into the database
                            $sql = "INSERT INTO tbl_category SET
                                title='$title',
                                image_name='$image_name',
                                featured='$featured',
                                active='$active'   
                            ";
                            //execute the query and save in the database
                            $res = mysqli_query($conn, $sql);
                            // check whether the query was executed and data added
                            if($res==true)
                            {
                                //query executed and category added
                                $_SESSION['add'] = "<div class='success'>Category Added Successfully</div>";
                                //redirect to the manage category page
                                header('location:'.SITEURL.'admin/manage-category.php');
                            }
                            else{
                                //failed to add category
                                $_SESSION['add'] = "<div class='error'>Failed to Add Category</div>";
                                //redirect to the manage category page
                                header('location:'.SITEURL.'admin/add-category.php');
                            }
                        }
                    ?>

                </div>  
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>


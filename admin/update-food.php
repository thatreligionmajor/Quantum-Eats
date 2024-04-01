<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Update Food</h1>
                    <br />

                    <br />
                    <br />
                    <br />
                    <br />
                    <?php
                        //check whether id is set
                        if(isset($_GET['id']))
                        {
                            //get all the details
                            $id = $_GET['id'];
                            //create sql query
                            $sql2 = "SELECT * FROM tbl_food WHERE id =$id";
                            //execute sql query
                            $res2= mysqli_query($conn, $sql2);
                            //get the value based on the query
                            $row2 = mysqli_fetch_assoc($res2);
                            //get the individual values of the selected food
                            $title = $row2['title'];
                            $description = $row2['description'];
                            $price = $row2['price'];
                            $current_image = $row2['image_name'];
                            $current_category = $row2['category_id'];
                            $featured = $row2['featured'];
                            $active = $row2['active'];
                        }
                        else
                        {
                            header('location:'.SITEURL.'admin/manage-food.php');
                        }
                    ?>
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <table class="tbl-30">
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" value="<?php echo $title; ?>" placeholder="<?php echo $title; ?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td>
                                    <textarea name="description" cols="30" rows="10"><?php echo $description ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Price: </td>
                                <td>
                                    <input type="number" name="price" value="<?php echo $price?>"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Current Image:</td>
                                <td>
                                    <?php 
                                        if($current_image != "")
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/foods/<?php echo $current_image; ?>" alt="<?php echo $title ?>" width="50%" />
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
                                <td>Category: </td>
                                <td>
                                    <select name="category">

                                        <option value="" disabled selected>Select Food</option>
                                        <?php 
                                            $sql = "SELECT * FROM tbl_category WHERE active='YES'";
                                            $res = mysqli_query($conn, $sql);
                                            $count = mysqli_num_rows($res);

                                            if($count>0)
                                            {
                                                //category is available
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    $category_title = $row['title'];
                                                    $category_id = $row['id'];

                                                    //echo "<option value='$category_id'>$category_title</option>";
                                                    ?>
                                                    <option <?php if($current_category==$category_id) {echo "selected";}; ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                //category not available
                                                echo "<option value='0'>Category Unavailable</option>";
                                            }
                                        ?>

                                    </select>
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
                                    <input type="submit" name="submit" value="Update Food" class="button btn-secondary" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php

                        if(isset($_POST['submit']))
                        {
                            //echo "Button Clicked";
                            //1. Get all the data from the form
                            $id = $_POST['id'];
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $current_image = $_POST['current_image'];
                            $category = $_POST['category'];
                            
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];

                            //2. Upload the image if selected
                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];
                                if($image_name != "")
                                {
                                    //A. Uploading New Image
                                    $ext = end(explode('.', $image_name));
                                    $image_name = "Food-Name-".rand(0000, 9999).'.'.$ext; 

                                    $src_path = $_FILES['image']['tmp_name'];
                                    $dest_path = "../images/food/".$image_name;

                                    $upload = move_uploaded_file($src_path, $dest_path);

                                    if($upload==false)
                                    {
                                        $_SESSION['upload'] = "<div class='error'>Failed to Upload New Image</div>";
                                        header('location:'.SITEURL.'admin/manage-food.php');
                                        die();
                                    }

                            //3. Remove the image if the new image is uploaded and current image exists                                    if($current_image!="")
                                    {
                                        $remove_path = "../images/foods/".$current_image;
                                        $remove = unlink($remove_path);

                                        //check if the image was removed
                                        if($remove == false)
                                        {
                                            $_SESSION['remove'] = "<div class = 'error'>Failed to Remove Current Image</div>";
                                            header('location:'.SITEURL.'admin/manage-food.php');
                                            die();
                                        }
                                    }
                                }
                            }
                            else
                            {
                                $image_name = $current_image;
                            }
                            
                            //4. Update the food in the database
                            //5. Redirect to Manage food with session message
                        }

                    ?>

                </div>                
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>
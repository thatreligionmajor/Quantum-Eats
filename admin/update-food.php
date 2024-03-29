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
                                    <textarea name="description" cols="30" rows="10"></textarea>
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
                                            <img src="<?php echo SITEURL; ?>images/foods/<?php echo $current_image; ?>" width="50%" />
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
                                                    <option value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
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

                    ?>

                </div>                
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>
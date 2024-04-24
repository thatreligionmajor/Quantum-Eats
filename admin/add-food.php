<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Add Food</h1>
                    <br />
                    <?php 
                        if(isset($_SESSION['upload']))
                        {
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }                    
                    ?>
                    <br />
                    <br />
                    <br />
                    <br />
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <table class="tbl-30">
                            <tr>
                                <th colspan="2">Add a Food Item</th>
                            </tr>
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" placeholder="Food Name"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Description: </td>
                                <td>
                                    <textarea name="description" cols="30" rows="5" placeholder="This culinary masterpiece sounds like your next bestseller."></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Price: </td>
                                <td>
                                    <input type="number" name="price" placeholder="00.00" min="0.00" max="10000.00" step="0.01"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Select Image: </td>
                                <td>
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <tr>
                                <td>Category: </td>
                                    <td>
                                    <select name="category">
                                        <option value="" disabled selected>Select Category</option>
                                            <?php
                                                //create PHP code to display the categories from the database
                                                //1. create SQL query to get all Active Categories from the database
                                                //a. the query
                                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                                //b. the execution
                                                $res = mysqli_query($conn, $sql);
                                                //c. count rows to check whether there are categories
                                                $count = mysqli_num_rows($res);
                                                //2. display categories on the dropdown
                                                if($count>0)
                                                {
                                                    //there are categories
                                                    while($row=mysqli_fetch_assoc($res))
                                                    {
                                                        //get the details of the categories
                                                        $id = $row['id'];
                                                        $title = $row['title'];
                                                        ?>
                                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    //there are no categories
                                                    ?>
                                                    <option value="0">No Categories Found</option>
                                                    <?php
                                                }
                                            ?>
                                    </select>
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
                                    <input type="submit" name="submit" value="Add Food" class="button btn-secondary" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php
                        //check whether the buttons is clicked
                        if(isset($_POST['submit']))
                        {
                            //add the food to the database
                            //1. get the data from the form
                            //A. get input data
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $price = $_POST['price'];
                            $category = $_POST['category'];

                            //B. get radio data
                            if(isset($_POST['featured']))
                            {
                                $featured = $_POST['featured'];
                            }
                            else
                            {
                                $featured = "No"; //this is the default value
                            }
                            if(isset($_POST['active']))
                            {
                                $active = $_POST['active'];
                            }
                            else
                            {
                                $active = "No";
                            }

                            //2. upload the image if selected
                            //A. check if the image is selected
                            if(isset($_FILES['image']['name']))
                            {
                                //i. get the details of the image
                                $image_name = $_FILES['image']['name'];
                                //ii. check whether the image is selected
                                if($image_name!="")
                                {
                                    //a. rename the image
                                    $tmp = explode('.', $image_name); // end(); requires you to pass a variable
                                    $ext = end($tmp);
                                    $image_name = "Food-Name-".rand(0000,9999).".".$ext;
                                    //b. get the source path and destination path
                                    $src= $_FILES['image']['tmp_name'];
                                    $dst = "../images/foods/".$image_name;
                                    //c. upload the image
                                    $upload = move_uploaded_file($src, $dst);
                                    //d. check whether the image uploaded
                                    if($upload==false)
                                    {
                                        //redirect with an error message
                                        $_SESSION['upload'] ="<div class='error'>Failed to Upload Image</div>";
                                        header('location:'.SITEURL.'admin/add-food.php');
                                        //stop the process
                                        die();
                                    }
                                }
                            }
                            else
                            {
                                //i. save a default value
                                $image_name = "";
                            }
                            //3. insert the data into the database
                            //A. create an sql query
                            $sql2 = "INSERT INTO tbl_food SET
                            title = '$title',
                            description = '$description',
                            price = $price,
                            image_name = '$image_name',
                            category_id = $category,
                            featured = '$featured',
                            active = '$active'
                            ";
                            //B. execute the sql query
                            $res2 = mysqli_query($conn, $sql2);
                            //C. check whether the data was inserted
                            if($res2==true)
                            {
                                //i. data inserted successfully
                                $_SESSION['add'] = "<div class='success'>Food Added Successfully</div>";
                                header("location:".SITEURL."admin/manage-food.php");
                            }
                            else
                            {
                                //ii. redirect with message to the manage-food page
                                $_SESSION['add'] = "<div class='error'>Failed to Add Food</div>";
                                header("location:".SITEURL."admin/add-food.php");
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>
<?php include('components/navbar.php'); ?>

<section>
    <main>
        <div class="main">
            <div class="wrapper">
            <div class="header">
                    <h1>Food Manager</h1>
                    <br />
                    <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['remove']))
                        {
                            echo $_SESSION['remove'];
                            unset($_SESSION['remove']);
                        }
                        if(isset($_SESSION['unauthorized']))
                        {
                            echo $_SESSION['unauthorized'];
                            unset($_SESSION['unauthorized']);
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <a href="<?php echo SITEURL; ?>admin/add-food.php" class ="button btn-primary">Add Food</a>
                    <br />
                </div>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php

                    // create sql query to get all food data
                    $sql = "SELECT * FROM tbl_food";
                    // execute sql query
                    $res = mysqli_query($conn, $sql);
                    // count rows to check whether there is data
                    $count =  mysqli_num_rows($res);

                    //create a serial number variable and set the default value as 1
                    $sn=1;

                    if($count>0)
                    {
                        //get the food from the database and display it here
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the value from the individual columns in the database table
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            $featured=$row['featured'];
                            $active=$row['active'];
                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td>$<?php echo $price; ?></td>
                                <td>
                                    <?php 
                                        if($image_name=="")
                                        {
                                            echo "<div class='error'>No Image Available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/foods/<?php echo $image_name;?>" alt="<?php echo $title; ?>" width="10%" />
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="#" class ="button btn-secondary">Update Food</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class ="button btn-danger">Delete Food</a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        //there is no food in the database
                        echo 
                        "<tr>
                            <td class='error' colspan ='7'>
                                Please add an item to the menu.
                            </td>
                        </tr>";
                    }

                    ?>
                    
                </table>
            </div>
        </div>
    </main>
</section>

<?php include('components/footer.php'); ?>
<?php include('components/navbar.php'); ?>

<section>
    <main>
        <div class="main">
            <div class="wrapper">
            <div class="header">
                    <h1>Category Manager</h1>
                    <!-- Button to Add Admin -->
                    <br />
                    <?php 
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if(isset($_SESSION['remove']))
                        {
                            echo $_SESSION['remove'];
                            unset($_SESSION['remove']);
                        }
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['no-category-found']))
                        {
                            echo $_SESSION['no-category-found'];
                            unset($_SESSION['no-category-found']);
                        }
                        if(isset($_SESSION['update']))
                        {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <a href="<?php echo SITEURL; ?>admin/add-category.php" class ="button btn-primary">Add Category</a>
                    <br />
                </div>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    <?php 
                    //query to get all categories from database
                        $sql= "SELECT * FROM tbl_category";
                        //execute query
                        $res = mysqli_query($conn, $sql);
                        //count rows
                        $count = mysqli_num_rows($res);
                        //create serial number
                        $sn=1;

                        //check whether we have data in the database
                        if($count > 0)
                        {
                            //we have data
                            //get the data and display it
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td>
                                        <?php 
                                            if($image_name!="" && $image_name!=null)
                                            {
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/categories/<?php echo $image_name; ?>" alt="<?php echo $title ?>" width="10%" >
                                                <?php
                                            }
                                            else 
                                            {
                                               echo "<div class='error'>No Image Available</div>";
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class ="button btn-secondary">Update Category</a>
                                        <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class ="button btn-danger">Delete Category</a>
                                    </td>
                                </tr>

                                <?php
                            }
                        }
                        else{
                            //we do not have data
                            ?>
                                <tr>
                                    <td colspan="6">
                                        <div class="error">
                                            No Category Added
                                        </div>
                                    </td>
                                </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </main>
</section>

<?php include('components/footer.php'); ?>
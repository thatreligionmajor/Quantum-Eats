<?php include('components/navbar.php');?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Admin Manager</h1>
                    <!-- Button to Add Admin -->
                    <br />
                    <?php  
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add']; //displaying session message
                            unset($_SESSION['add']); //removing session message
                        }
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <a href="add-admin.php" class ="button btn-primary">Add Admin</a>
                    <br />

                </div>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                        //query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        //execute query
                        $res = mysqli_query($conn, $sql);

                        //check whether the query is executed successfully
                        if($res==TRUE)
                        {
                            // count rows to check database data
                            $count = mysqli_num_rows($res); //function to get all rows in db
                            $sn=1; //create a variable and assign the value
                            //check the number of rows
                            if($count>0)
                            {
                                //data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //while loop to get data from database
                                    //will run as long as there is data in database
                                    //get individual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    //display the values in our table
                                    ?>
                                        <tr>
                                            <td><?php echo $sn++; ?> </td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="#" class ="button btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class ="button btn-danger">Delete Admin</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else 
                            {
                                //no data in db
                            }

                        }
                    ?>
                </table>
            </div>
        </div>
    </main>
</section>
<!-- Main Content Section Ends -->
<?php include('components/footer.php');?>
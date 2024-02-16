<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Update Admin</h1>
                    <!-- Button to Update Admin -->
                    <br />
                    <?php 
                        
                    ?>
                    <br />
                    <br />
                    <br />
                    <!-- <a href="add-admin.php" class ="button btn-primary">Add Admin</a> -->
                    <br />
                    <?php
                        //get the id of the selected admin
                        $id-$_GET['id'];
                        //create sql query to get the data
                        $sql="SELECT * FROM tbl_admin";
                        //execute the query
                        $res=mysqli_query($conn, $sql);
                        //check if the query is successful
                        if($res==true) {
                            //check whether the dat is available or not
                            $count = mysqli_num_rows($res);
                        }
                        else {
                            //check whether we have admin data or not
                            if($count==1) {
                                //details
                                // echo "Admin Available";
                                $row=mysqli_fetch_assoc($res);
                                $full_name = $row['full_name'];
                                $username = $row['username'];
                            }
                            else {
                                //redirect to manage admin page
                                header('location:'.SITEURL.'admin/manage-admin.php');
                            }
                        }
                    ?>
                    <form action="" method="POST" >
                        <table class="tbl-30">
                            <tr>
                                <th>Label</th>
                                <th>Input</th>
                            </tr>
                            <tr>
                                <td>Full Name: </td>
                                <td>
                                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Username: </td>
                                <td>
                                    <input type="text" name="username" value="<?php echo $username; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Password: </td>
                                <td>
                                    <input type="password" name="password" value="">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="update admin" class="button btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                
            </div>
        </div>
    </main>
</section>

<?php 
    //check wether the submit button is clicked
    if(isset($_POST['submit'])) {
        //echo "button clicked"
    }
    else {
        echo 
    }
?>

<?php include('components/footer.php'); ?>
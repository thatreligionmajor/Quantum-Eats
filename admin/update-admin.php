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
                        // 
                    ?>
                    <br />
                    <br />
                    <br />
                    <!-- <a href="add-admin.php" class ="button btn-primary">Add Admin</a> -->
                    <br />
                    <?php
                        //1. get the id of the selected admin
                        $id=$_GET['id'];
                        //2. create sql query to get the data
                        $sql="SELECT * FROM tbl_admin WHERE id=$id";
                        //execute the query
                        $res=mysqli_query($conn, $sql);
                        //check if the query is successful
                        if($res==true) {
                            //check whether the data is available or not
                            $count = mysqli_num_rows($res);
                            //check whether we have admin data or not
                            if($count==1) {
                                // echo "Admin Available";
                                $row=mysqli_fetch_assoc($res);
                                //details
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
                            <!-- <tr>
                                <td>Password: </td>
                                <td>
                                    <input type="password" name="password" value="">
                                </td>
                            </tr> -->
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
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
    if(isset($_POST['submit'])) 
    {
        //echo "button clicked"
        //get all the values from the form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        //create a SQL query to update Admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username' 
        WHERE id = '$id'
        ";
        //execute the query
        $res = mysqli_query($conn, $sql);
        //check execution
        if($res==true) 
        {
            $_SESSION['upadate'] = "<div class='success'>Admin Updated</div>";
            //redirect back to admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        } else {
            //failed to update admim
            //check execution
            $_SESSION['upadate'] = "<div class='error'>Error Updating Admin</div>";
            //redirect back to admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('components/footer.php'); ?>
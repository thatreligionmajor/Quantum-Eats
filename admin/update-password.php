<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Change Password</h1>
                    <br />
                    <?php 
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <!-- <a href="add-admin.php" class ="button btn-primary">Add Admin</a> -->
                    <br />
                    
                    <form action="" method="POST" >
                        <table class="tbl-30">
                            <tr>
                                <th>Label</th>
                                <th>Input</th>
                            </tr>
                            <tr>
                                <td>Current Password: </td>
                                <td>
                                    <input type="password" name="current_pasword" placeholder="Current Password">
                                </td>
                            </tr>
                            <tr>
                                <td>New Password: </td>
                                <td>
                                    <input type="password" name="new_password" placeholder="New Password">
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password: </td>
                                <td>
                                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <input type="submit" name="submit" value="change password" class="button btn-secondary">
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
    if(isset($_POST['submit']))
    {
        //echo "clicked";
        //1. Get the data from the form
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_pasword=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        //2. Check whether the user with Current ID and Current Password Exists
        $sql = "SELECT * FROM tbl_admin WHERE id =$id AND password = '$current_password'";
        //3. Execute the query
        $res = mysqli_query($conn, $sql);
        if($res==true) 
        {
            $count=mysqli_num_rows($res);
            if($count==1) 
            {
                //user exists and password can be changed
                echo "User Found";
            }
            else 
            {
                //User does not exist, send a message and redirect
                $SESSION['user-not-found'] = "<div class='error'>User Not Found</div>";
            }
        }
        //4. Check whether the New Password and Confirm Password match
        //5. Change Password
    }
?>

<?php include('components/footer.php'); ?>
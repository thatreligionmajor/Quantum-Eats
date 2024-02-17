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
        //2. Check whether the user with Current ID and Current Password Exists
        //3. Check whether the New Password and Confirm Password match
        //4. Change Password
    }
?>

<?php include('components/footer.php'); ?>
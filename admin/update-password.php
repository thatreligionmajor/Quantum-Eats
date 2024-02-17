<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Change Password</h1>
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

<?php include('components/footer.php'); ?>
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
                            if($count)
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
                                    <input type="text" name="full_name" value="">
                                </td>
                            </tr>
                            <tr>
                                <td>Username: </td>
                                <td>
                                    <input type="text" name="username" value="">
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

<?php include('components/footer.php'); ?>
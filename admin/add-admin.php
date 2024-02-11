<?php include('components/navbar.php');?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Add Admin</h1>
                    <!-- Button to Add Admin -->
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
                                    <input type="text" name="full_name" placeholder="your name">
                                </td>
                            </tr>
                            <tr>
                                <td>Username: </td>
                                <td>
                                    <input type="text" name="username" placeholder="your username">
                                </td>
                            </tr>
                            <tr>
                                <td>Password: </td>
                                <td>
                                    <input type="password" name="password" placeholder="your password">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="add admin" class="btn-secondary">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                
            </div>
        </div>
    </main>
</section>

<?php include('components/footer.php');?>
<?php 
    //process the value from form and save it in the database
    //check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //button clicked
        // echo "button clicked";

        //1. get the form data`
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //password encryption with md5
        //2. SQL Query to save the data into the database
        $sql = "INSERT INTO tbl_admin SET 
        full_name = '$full_name',
        username= '$username',
        password = '$password'
        ";
        
        //$res = mysqli_query($conn, $sql) or die(mysquli_error());
    }
?>
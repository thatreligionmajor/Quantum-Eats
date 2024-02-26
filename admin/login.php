<?php include('components/navbar.php');?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper login text-center rounded">
                <h1>Login</h1>
                <br>
                <?php
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset ($_SESSION['login']);
                    }
                ?>
                <br>
                <!-- Login Form Starts Here -->
                <form action="" method="POST">
                    <div class="inputContainer">
                        <input type="text" name="username" placeholder="Username" class="input">
                        <label for="" class="label">Username</label>
                    </div>
                    <!-- <br> -->
                    <div class="inputContainer">
                        <input type="password" name="password" placeholder="Password" class="input">
                        <label for="" class="label">Password</label>
                    </div>
                    <!-- <br> -->
                    <input type="submit" name="submit" value="Login" class="button btn-primary">
                    <br>
                </form>
                <!-- Login Form Ends Here -->
            </div>
        </div>
    </main>
</section>
<!-- Main Content Section Ends -->
<?php include('components/footer.php');?>

<?php
    // check whether the button is clicked
    if(isset($_POST['submit']))
    {
        // login process
        //1. get the data from the login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        //2. sql query to check whether the user with username and password exists
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        //3. execute the sql query
        $res = mysqli_query($conn, $sql);
        //4. count the rows to check whether the user exists
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            //user available and login successful
            $_SESSION['login'] = "<div class='success'>Login Successful</div>";
            //redirect to the home page
            header('location:'.SITEURL.'admin/');
        }
        else{
            //user not available and login failed
            $_SESSION['login'] = "<div class='error text-center'>username or password did not match</div>";
            //redirect to the home page
            header('location:'.SITEURL.'admin/login.php');
        }

    }
?>
<?php include('../config/constants.php');?>
<!-- Main Content Section Starts -->
<html>
<head>
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <!-- <h1>Admin Panel</h1> -->
    <!-- No Login Check Navbar Section Starts -->
    <section>
        <div class="menu text-center">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!-- No Login Check Navbar Section Ends -->
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

                        if(isset($_SESSION['not-logged-in-msg']))
                        {
                            echo $_SESSION['not-logged-in-msg'];
                            unset($_SESSION['not-logged-in-msg']);
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
</body>
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
            $_SESSION['user'] = $username; //to check login status and logout will unset
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
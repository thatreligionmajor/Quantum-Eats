<?php include('components/navbar.php');?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper login text-center">
                <h1>Login</h1>
                <!-- Login Form Starts Here -->
                <form action="" method="POST">
                    Username: <br>
                    <input type="text" name="username" placeholder="Enter your username"><br>
                    Password:<br>
                    <input type="password" name="password" placeholder="Enter your password"><br>
                    <input type="submit" name="submit" value="Login" class="button btn-primary"><br>
                </form>
                <!-- Login Form Ends Here -->
            </div>
        </div>
    </main>
</section>
<!-- Main Content Section Ends -->
<?php include('components/footer.php');?>
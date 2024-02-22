<?php include('components/navbar.php');?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper login text-center rounded">
                <h1>Login</h1>
                <br>
                <!-- Login Form Starts Here -->
                <form action="" method="POST">
                    <div class="inputContainer">
                        <input type="text" name="username" placeholder="Enter your username" class="input">
                        <label for="" class="label">Username</label>
                    </div>
                    <!-- <br> -->
                    <div class="inputContainer">
                        <input type="password" name="password" placeholder="Enter your password" class="input">
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
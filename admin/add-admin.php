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
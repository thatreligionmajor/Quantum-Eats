<?php include('components/navbar.php'); ?>

<section>
    <main>
        <div class="main">
            <div class="wrapper">
            <div class="header">
                    <h1>Food Manager</h1>
                    <!-- Button to Add Admin -->
                    <br />
                    <br />
                    <br />
                    <br />
                    <a href="<?php echo SITEURL; ?>admin/add-food.php" class ="button btn-primary">Add Food</a>
                    <br />
                </div>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1. </td>
                        <td>Your Name</td>
                        <td>yourusername</td>
                        <td>
                            <a href="#" class ="button btn-secondary">Update Admin</a>
                            <a href="#" class ="button btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2. </td>
                        <td>Your Name</td>
                        <td>yourusername</td>
                        <td>
                            <a href="#" class ="button btn-secondary">Update Admin</a>
                            <a href="#" class ="button btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3. </td>
                        <td>Your Name</td>
                        <td>yourusername</td>
                        <td>
                            <a href="#" class ="button btn-secondary">Update Admin</a>
                            <a href="#" class ="button btn-danger">Delete Admin</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </main>
</section>

<?php include('components/footer.php'); ?>
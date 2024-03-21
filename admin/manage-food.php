<?php include('components/navbar.php'); ?>

<section>
    <main>
        <div class="main">
            <div class="wrapper">
            <div class="header">
                    <h1>Food Manager</h1>
                    <br />
                    <?php
                        if(isset($_SESSION['add']))
                        {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <a href="<?php echo SITEURL; ?>admin/add-food.php" class ="button btn-primary">Add Food</a>
                    <br />
                </div>
                <table class="tbl-full">
                    <tr>
                        <th>Serial Number</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
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
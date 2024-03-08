<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Update Category</h1>
                    <br />
                    <?php 
                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                        }
                    ?>
                    <br />
                    <br />
                    <br />
                    <!-- <a href="add-admin.php" class ="button btn-primary">Add Admin</a> -->
                    <br />
                    
                    <form action="" method="POST" enctype="multipart/form-data" >
                        <table class="tbl-30">
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" value="" placeholder=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>Current Image:</td>
                                <td>
                                    Image will be displayed here
                                </td>
                            </tr>
                            <tr>
                                <td>New Image:</td>
                                <td>
                                    <input type="file" name="image" />
                                </td>
                            </tr>
                            <tr>
                                <td>Featured:</td>
                                <td>
                                    <input type="radio" name="featured" value="Yes" /> Yes
                                    <input type="radio" name="featured" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td>Active:</td>
                                <td>
                                    <input type="radio" name="active" value="Yes" /> Yes
                                    <input type="radio" name="active" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Update Category" class="button btn-secondary" />
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
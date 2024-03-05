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
                    
                    <form action="" method="POST" >
                        <table class="tbl-30">
                            <?php echo "Update Category"; ?>
                        </table>
                    </form>
                </div>                
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>
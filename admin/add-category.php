<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Add Category</h1>
                    <!-- Button to Add Category -->
                    <br />
                    <?php 
                        //ifelse
                    ?>
                    <br />
                    <br />
                    <br />
                    <!--  -->
                    <br />
                    <form action="" method="POST" >
                        <table class="tbl-30">
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" placeholder="Category Name" />
                                </td>
                            </tr>
                            <tr>
                                <td>Featured: </td>
                                <td>
                                    <input type="radio" name="featured" value="Yes" /> Yes
                                    <input type="radio" name="featured" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td>Active: </td>
                                <td>
                                    <input type="text" name="active" placeholder="Category Name" />
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
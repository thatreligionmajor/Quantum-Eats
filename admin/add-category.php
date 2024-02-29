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
                                    <input type="radio" name="active" name="active" value="Yes" /> Yes
                                    <input type="radio" name="active" name="active" value="No" /> No
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Add Category" class="button btn-secondary" />
                                </td>
                            </tr>
                        </table>
                    </form>

                    <?php 
                        //check whether submit button is clicked
                        if(isset($_POST['submit']))
                        {
                            //get the value from the category form
                            $title = $_POST['title'];
                            
                            //for radio input type, we need to check whether the button is selected or not
                            if(isset($_POST['featured']))
                            {
                                //get the value from the category form
                                $featured = $_POST['featured'];

                            }
                            else
                            {
                                //set the default value
                                $featured = "No";
                            }

                            if(isset($_POST['active']))
                            {
                                $active = $_POST['active'];
                            }
                            else{
                                $active = "No";
                            }
                        }
                    ?>

                </div>  
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>


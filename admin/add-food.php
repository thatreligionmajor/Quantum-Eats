<?php include('components/navbar.php'); ?>
<!-- Main Content Section Starts -->
<section>
    <main>
        <div class="main">
            <div class="wrapper">
                <div class="header">
                    <h1>Add Food</h1>
                    <br />
                    <?php 
                        
                    ?>
                    <br />
                    <br />
                    <br />
                    <br />
                    <form action="" method="POST" >
                        <table class="tbl-30">
                            <tr>
                                <th colspan="2">Add a Food Item</th>
                            </tr>
                            <tr>
                                <td>Title: </td>
                                <td>
                                    <input type="text" name="title" placeholder="Food Name"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Description: </td>
                                <td>
                                    <textarea name="description" cols="30" rows="5" placeholder="This culinary masterpiece sounds like your next bestseller."></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Price: </td>
                                <td>
                                    <input type="number" name="price" placeholder="00.00" min="0.00" max="10000.00" step="0.01"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Select Image: </td>
                                <td>
                                    <input type="file" name="image">
                                </td>
                            </tr>
                            <td>Category: </td>
                                <td>
                                   <select name="category">
                                       <option value="" disabled selected>Select Category</option>
                                        <?php
                                            //create PHP code to display the categories from the database
                                            //1. create SQL query to get all Active Categories from the database
                                            //a. the query
                                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                            //b. the execution
                                            $res = mysqli_query($conn, $sql);
                                            //c. count rows to check whether there are categories
                                            $count = mysqli_num_rows($res);
                                            //2. display categories on the dropdown
                                            if($count>0)
                                            {
                                                //there are categories
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                    //get the details of the categories
                                                    $id = $row['id'];
                                                    $title = $row['title'];
                                                    ?>
                                                    <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                                    <?php
                                                }
                                            }
                                            else{
                                                //there are no categories
                                                ?>
                                                <option value="0">No Categories Found</option>
                                                <?php
                                            }
                                        ?>
                                   </select>
                            </td>
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
                                    <input type="submit" name="submit" value="Add Food" class="button btn-secondary" />
                                </td>
                            </tr>
                        </table>
                    </form>
                    <?php
                    
                    ?>
                </div>
            </div>
        </div>
    </main>
</section>
<?php include('components/footer.php'); ?>
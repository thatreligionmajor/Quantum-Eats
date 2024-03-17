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
                                        <option value="1">Breakfast</option>
                                        <option value="2">Lunch</option>
                                        <option value="3">Dinner</option>
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
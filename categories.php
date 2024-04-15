<?php include('components-front/navbar.php'); ?>

<!-- Categories  Start -->
<section class="categories">
        <div class="container">
            <h2 class="section-header text-center">Molecular Moments</h2>
            <div class="row blur">

                <?php 
                    //display all active categories
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            ?>

                            <a href="#" class="linkrow">
                                <div class="catcard shadow bigger">
                                        <h3 class="card-title"><?php echo $title; ?></h3>
                                        <?php
                                            if($image_name=="")
                                            {
                                                echo "<div class='error'>Image Not Found</div>";
                                            }
                                            else
                                            {
                                                ?>
                                                     <img src="<?php echo SITEURL; ?>images/categories/<?php echo $image_name;?>" alt="<?php echo $title ?>" class="img-responsive cat-img" />
                                                <?php
                                            }
                                        ?>
                                </div>
                            </a>

                            <?php
                        }
                    }
                    else
                    {
                        echo "<div class='error'>Category Not Found</div>";
                    }
                ?>

                

                <!-- <a href="#" class="linkrow" >
                    <div class="catcard shadow bigger">
                        <h3 class="card-title">Lunch</h3>
                        <img src="images/quinoa-fusion-salad-cloud.jpg" alt="lunch" class="img-responsive cat-img" />
                    </div>
                </a>
                <a href="#" class="linkrow" >
                    <div class="catcard shadow bigger">
                        <h3 class="card-title">Dinner</h3>
                        <img src="images/galactic-gourmet-steak.jpg" alt="dinner" class="img-responsive cat-img" />
                    </div>
                </a> -->
            </div>
        </div>
    </section>
    <!-- Categories End -->

<?php include('components-front/footer.php'); ?>
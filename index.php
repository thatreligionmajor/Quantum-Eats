   <?php include('components-front/navbar.php'); ?>
   <!--  Search Start -->
    <section class="search text-center">
        <div class="container">
            <form action="">
                <input type="search" name="search" id="search" placeholder="what are you craving?">
                <input type="submit" value="Search" class="search-button button-primary button" />
            </form>
        </div>
    </section>
    <!-- Search End -->
    <!-- Categories  Start -->
    <section class="categories">
        <div class="container">
            <h2 class="section-header text-center">Molecular Moments</h2>
            <div class="row blur">

                <?php 
                //sql query to display data from database
                $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //execute query
                $res = mysqli_query($conn, $sql);
                //count rows to check whether there is a category
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //get the values of the category
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>

                        <a href="category-foods.php" class="linkrow">
                            <div class="catcard shadow bigger">
                                    <h3 class="card-title"><?php echo $title; ?></h3>

                                    <?php 
                                        // check whether the category has an image
                                        if($image_name =="") 
                                        {
                                            echo "<div class='error'>Image Not Available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/categories/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive cat-img" />
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
                    echo "<div class='error'>No Category Added</div>";
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
    <!-- Menu Start -->
    <section class="menu">
        <div class="container">
            <h2 class="section-header menu-header text-center">Quantum Laboratory</h2>
            <div class="row">
                <div class="menucard shadow">
                    <div class="menu-img">
                        <img src="images/spherified-olive-pearls.jpg" alt="spherified olive pearls" class="img-rounded">
                    </div>
                    <div class="menucard-right">
                        <h4 class="menu-item">spherified olive pearls</h4>
                        <p class="menu-price">$12.99</p>
                        <p class="menu-description">each pearl is a culinary marvel, encapsulating the essence of the Mediterranean sun</p>
                        <br />
                        <a href="#" class="button button-primary menu-button linktext">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                              </svg>
                        </a>
                    </div>
                </div>
                <div class="menucard shadow">
                    <div class="menu-img">
                        <img src="images/molecular-forest-sorbet.jpg" alt="molecular forest sorbet" class="img-rounded">
                    </div>
                    <div class="menucard-right">
                        <h4 class="menu-item">molecular forest sorbet</h4>
                        <p class="menu-price">$10.99</p>
                        <p class="menu-description">liquid nitrogen transforms forest fruits into a refreshing and whimsical frozen experience</p>
                        <br />
                        <a href="#" class="button button-primary menu-button linktext">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                              </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="menucard shadow">
                    <div class="menu-img">
                        <img src="images/seared-matcha-infused-tofu.jpg" alt="seared matcha-infused tofu" class="img-rounded">
                    </div>
                    <div class="menucard-right">
                        <h4 class="menu-item">seared matcha-infused tofu</h4>
                        <p class="menu-price">$16.99</p>
                        <p class="menu-description">showcases the delicate balance of seared tofu infused with the earthy essence of matcha</p>
                        <br />
                        <a href="#" class="button button-primary menu-button linktext">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="menucard shadow">
                    <div class="menu-img">
                        <img src="images/truffle-infusion-eruption.jpg" alt="truffle infusion eruption" class="img-rounded">
                    </div>
                    <div class="menucard-right">
                        <h4 class="menu-item">truffle infusion eruption</h4>
                        <p class="menu-price">$18.99</p>
                        <p class="menu-description">a culinary volcano of truffle essence, erupting with umami notes, served with edible gold flakes</p>
                        <br />
                        <a href="#" class="button button-primary menu-button linktext">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="menucard shadow">
                    <div class="menu-img">
                        <img src="images/green-velvet-gazpacho.jpg" alt="green velvet gazpacho" class="img-rounded">
                    </div>
                    <div class="menucard-right">
                        <h4 class="menu-item">green velvet gazpacho</h4>
                        <p class="menu-price">$14.99</p>
                        <p class="menu-description">green tomatoes and cucumber pearls create a refreshing and vibrant chilled soup</p>
                        <br />
                        <a href="#" class="button button-primary menu-button linktext">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="menucard shadow">
                    <div class="menu-img">
                        <img src="images/deconstructed-tiramisu-sphere.jpg" alt="deconstructed tiramisu sphere" class="img-rounded">
                    </div>
                    <div class="menucard-right">
                        <h4 class="menu-item">deconstructed tiramisu sphere</h4>
                        <p class="menu-price">$16.99</p>
                        <p class="menu-description">an edible work of art, combining layers of coffee, mascarpone, and cocoa in perfect harmony</p>
                        <br />
                        <a href="#" class="button button-primary menu-button linktext">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                              </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Menu End -->
    <?php include('components-front/footer.php'); ?>
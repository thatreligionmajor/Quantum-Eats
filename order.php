<?php include('components-front/navbar.php'); ?>

<section class="menu">
    <div class="container">
        <h2 class="section-header menu-header text-center">Confirm Your Order</h2>
        <form action="" method="POST" class="order">    
            <fieldset>
                <legend>Selected Item</legend>
                <div>
                    <img src="<?php ?>" >
                </div>
                <div>
                    <h3>Title</h3>

                    <p>$ price</p>

                    <div>qty</div>

                    
                </div>
            </fieldset>
        </form>
    
        <form>
            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="First Last" class="input-responsive" required>
        
                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="(123) 456-7890" class="input-responsive" required>
        
                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="email@email.com" class="input-responsive" required>
        
                <div class="order-label">Address"</div>
                <textarea type="text" name="address" rows="10" placeholder="Street; City, State, Zip" class="input-responsive" required></textarea>
        
                <input type="submit" name="submit" value="Confirm Order" class="button btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<?php include('components-front/footer.php'); ?>
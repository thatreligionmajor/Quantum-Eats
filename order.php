<?php include('components-front/navbar.php'); ?>

<div>Order</div>

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

<?php include('components-front/footer.php'); ?>
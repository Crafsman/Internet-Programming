
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="send-email.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> Suburb</label>
            <input type="text" id="city" name="city" placeholder="Rockdale" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NSW" required>
              </div>
              <div class="col-50">
                <label for="country">Country</label>
                <input type="text" id="country" name="country" placeholder="Australia" required>
              </div>
            </div>
          </div>
       
        </div>

        <input type="submit" value="Purchase" class="btn">
      </form>
    </div>
  </div>
  

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="send-email.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Contact Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name <span style="color:red">
*
</span></label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe"  required >
            <label for="email"><i class="fa fa-envelope"></i> Email <span style="color:red">
*
</span></label>
            <label id="validate_email_message" style="color:red"></label>
            <input type="text" id="email" name="email" placeholder="john@example.com" onblur="validate()" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address <span style="color:red">
*
</span></label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> Suburb <span style="color:red">
*
</span></label>
            <input type="text" id="city" name="city" placeholder="Rockdale" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State <span style="color:red">
*
</span></label>
                <input type="text" id="state" name="state" placeholder="NSW" required>
              </div>
              <div class="col-50">
                <label for="country">Country <span style="color:red">
*
</span></label>
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

<script type="text/javascript">



$(document).ready(function(){

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}


    $("#email").blur(function(){
      var $result = $("#validate_email_message");
      var email = $("#email").val();
      $result.text("");
      $result.hide();

    if (validateEmail(email)) {
      $result.hide();
    } else {
      $result.show();
      $result.text(email + " is not valid :(");
      $result.css("color", "red");
    }

    });
});

</script>

<?php

session_start();

include("includes/db.php");
include("includes/header.php");
include("functions/functions.php");
include("includes/main.php");
include("includes/validate.php");

?>

<!--css-->
<link rel="stylesheet" href="styles/validate.css">

<div id="content" ><!-- content Starts -->
  <div class="container" ><!-- container Starts -->

    <div class="col-md-12" ><!-- col-md-12 Starts -->

      <div class="box" ><!-- box Starts -->

        <div class="box-header" ><!-- box-header Starts -->

        <center><!-- center Starts -->

        <h2> Register A New Account </h2>

        </center><!-- center Ends -->

      </div><!-- box-header Ends -->

      <form action="#" method="post" id="register"><!-- form Starts -->

        <div class="form-group" ><!-- form-group Starts -->

          <label>First Name</label>

          <input type="text" maxlength="50" class="form-control" id="c_fname" name="c_fname" >

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

          <label> Last Name</label>

          <input type="text" maxlength="50" class="form-control" id="c_lname" name="c_lname" >

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

          <label> Email </label>

          <input type="email" class="form-control" id="c_email" name="c_email" maxlength="40" onkeyup="checkEmail(this.value)" >
          <div id="c_email_error"></div>
        </div><!-- form-group Ends -->


        <div class="form-group">

          <label>Password</label>

          <input type="password" class="form-control" maxlength="50" id="c_password" name="c_password" onkeyup="checkPasswordStrength(this.value)" >
          <div id="c_password_error"></div>
        </div>

        <div class="form-group"><!-- form-group Starts -->

          <label> Address </label>

          <input type="text" class="form-control" maxlength="50" id="c_address" name="c_address" >

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

          <label> City </label>

          <input type="text" class="form-control" maxlength="25" id="c_city" name="c_city" >

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

          <label>Pincode</label>

          <input type="number" maxlength="5" class="form-control" id="c_pincode" name="c_pincode" >

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

          <label> Country </label>

          <input type="text" maxlength="25" class="form-control" id="c_country" name="c_country" >

        </div><!-- form-group Ends -->

        <div class="form-group"><!-- form-group Starts -->

          <label> Contact Number </label>

          <input type="number" maxlength="10" size="10" class="form-control" id="c_contact_no" name="c_contact_no" >

        </div><!-- form-group Ends -->

        <div class="text-center"><!-- text-center Starts -->

          <input type="submit" class="btn btn-primary" name="register" id="submit" value="Register">

        </div><!-- text-center Ends -->

      </form><!-- form Ends -->

      </div><!-- box Ends -->

    </div><!-- col-md-12 Ends -->



  </div><!-- container Ends -->
</div><!-- content Ends -->



<?php

include("includes/footer.php");

?>

<script src="js/jquery.min.js"> </script>

<script src="js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.6.3/js/foundation.min.js"></script>

<script>
  var error = false;
  $(document).foundation();
  function checkEmail(str) 
  {
    if (str.length == 0) {
        document.getElementById("c_email_error").innerHTML = "";
        return;
    } 
    else 
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              if(this.responseText == "Available"){
                error = false;
              } else {
                error = true;
              }
              document.getElementById("c_email_error").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "checkmail.php?c_email="+str, true);
        xmlhttp.send();
    }
  }

function checkPasswordStrength(password){
      var strength = 0
      //console.log(strength+" "+password);
      if(password.length==0)
      {
        $('#c_password_error').html('')
      }
      if (password.length < 6) {
          // $('#c_password_error').removeClass()
          // $('#c_password_error').addClass('short')
          $('#c_password_error').html('Too short')
      }
      //console.log(strength+" "+password);
      if (password.length > 7) strength += 1

      if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))  strength += 1

      if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))  strength += 1 

      if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 1

      if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/)) strength += 1
      //console.log(strength);
      if (strength < 2 ) {
          //$('#c_password_error').removeClass()
          $('#c_password_error').addClass('text-danger')
          $('#c_password_error').html('Weak')
      } else if (strength == 2 ) {
          //$('#c_password_error').removeClass()
          //$('#c_password_error').addClass('good')
          $('#c_password_error').html('Good')
      } else {
          //$('#c_password_error').removeClass()
          //$('#c_password_error').addClass('strong')
          $('#c_password_error').html('Strong')
      }
    }

    //function validateForm(){
    $('#submit').click(function(e) {
    e.preventDefault();
    var fname = $('#c_fname').val();
    var lname = $('#c_lname').val();
    var email = $('#c_email').val();
    var password = $('#c_password').val();
    var address= $('#c_address').val();
    var city= $('#c_city').val();
    var pin= $('#c_pincode').val();
    var country = $('#c_country').val();
    var contact_no = $('#c_contact_no').val();
    
    console.log(fname);
    console.log(lname);
    
    $(".error").remove();
    //var error = false;

    if (fname.length < 1) {
      //$('#c_name_error').html("*required");
      $('#c_fname').after('<span class="error">required</span>');
      error=true;
      console.log('fname error');
    }
    if (lname.length < 1) {
      //$('#c_name_error').html("*required");
      $('#c_lname').after('<span class="error">required</span>');
      error=true;
      console.log('lname error');
    }
    // console.log(error);
    if (email.length < 1) {
      //$('#c_email_error').html("*required");
      $('#c_email').after('<span class="error">required</span>');
      error=true;
      console.log('email error');
    } else {
      var regEx = /^[A-Za-z0-9][A-Za-z0-9._%+-]{0,63}@(?:[A-Za-z0-9-]{1,63}\.){1,125}[A-Za-z]{2,63}$/;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        // $('#c_email_error').html("*Enter valid email");
        $('#c_email').after('<span class="error">Enter valid email</span>');
        error=true;
        console.log('email reg  error');
      } 
    }

    if (password.length < 8) {
      //$('#c_password_error').html("*required");
      $('#c_password').after('<span class="error">Enter valid password</span>');
      error=true;
      console.log('psw error ');
    }

    if (address.length < 1) {
      // $('#c_address_error').html("*required");
      $('#c_address').after('<span class="error">required</span>');
      error=true;
      console.log('add error');

    }

    if (city.length < 1) {
      // $('#c_city_error').html("*required");
      $('#c_city').after('<span class="error">required</span>');
      error=true;
    }
    
    if (pin.length < 1) {
      // $('#c_pincode_error').html("*required");
      $('#c_pincode').after('<span class="error">required</span>');
      error=true;
      console.log('pincode error ');
    }
    else{
      if(pin.length != 5){
        // $('#c_pincode_error').html("please enter valid 5 digit pincode");
        $('#c_pincode').after('<span class="error">please enter valid 5 digit pincode</span>');
        error=true;
        console.log('pincode length error ');
      }
    } 
    
    if (country.length < 1) {
      // $('#c_country_error').html("*required");
      $('#c_country').after('<span class="error">required</span>');
      error=true;
      console.log('country error ');
    }

    if (contact_no.length < 1) {
      // $('#c_contact_no').html("*required");
      $('#c_contact_no').after('<span class="error">required</span>');
      error=true;
      console.log('contact error ');
    }
    else {
      if(contact_no.length != 10){
        // $('#c_pincode_error').html("please enter valid 10 digit contact number");
        $('#c_contact_no').after('<span class="error">please enter valid 10 digit contact number</span>');
        error=true;
        console.log('contact length ');
      }
    }
    console.log(error);
    if(error==false)
    {
      $.post("insert_customers.php", {
        fname:fname,
        lname:lname,
        email:email,
        password:password,
        address:address,
        city:city,
        pin:pin,
        country: country,
        contact_no: contact_no
        }, function(data) {
          if (data == 'Success') {
            //$("form")[0].reset();
              console.log(data);
              window.location = "index.php";
          }
        console.log(data);
      });
    }
  });
</script>

</body>

</html>

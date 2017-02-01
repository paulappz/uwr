

    $(function() {
    //----- OPEN
    $('[data-popup-open]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-open');
        $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

        e.preventDefault();
    });

    //----- CLOSE
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

        e.preventDefault();
    });
});




function validateSignupForm() {

    var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
 var fname = document.forms["myForm1"]["fullname"].value;
  var uname = document.forms["myForm1"]["username"].value;
    var pword = document.forms["myForm1"]["password"].value;
  var cpword = document.forms["myForm1"]["cpassword"].value;
  var femail = document.forms["myForm1"]["email"].value;
  var state = document.forms["myForm1"]["selectstate"].value;

 var fnamelenght =  document.getElementById("fullname").value.length;
var unamelenght =  document.getElementById("username").value.length;
 var pwordlenght =  document.getElementById("password").value.length;

if (fname == "") {
document.forms["myForm1"]["fullname"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Enter your fullname";
     return false;

    }




  if (fnamelenght <= 5) {
document.forms["myForm1"]["fullname"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Fullname --> 6 characters minimum";
     return false;

    }
  if( uname == "" )
   {
     document.forms["myForm1"]["username"].focus() ;
   document.getElementById("errorBox1").innerHTML = "    Enter your Username";
     return false;
   }

   if (unamelenght <= 3) {
document.forms["myForm1"]["username"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Username --> 4 characters minimum";
     return false;

    }


     if (femail == "" )
 {
  document.forms["myForm1"]["email"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Enter your email";
  return false;
  }else if(!emailRegex.test(femail)){
document.forms["myForm1"]["email"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Enter a valid email";
  return false;
  }


 if(pword == "")
  {
   document.forms["myForm1"]["password"].focus() ;
   document.getElementById("errorBox1").innerHTML = "Enter your password";
   return false;
  }

    if (pwordlenght <= 5) {
document.forms["myForm1"]["password"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Password --> 6 characters minimum";
     return false;

    }


  if (cpword == "" )
 {
  document.forms["myForm1"]["cpassword"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Comfirm password";
  return false;
  }

  if(cpword !=  pword){
   document.forms["myForm1"]["cpassword"].focus() ;
   document.getElementById("errorBox1").innerHTML = "Password are not matching, re-enter again";
   return false;
   }



      if (state == "---Select State---") {
document.forms["myForm1"]["selectstate"].focus() ;
  document.getElementById("errorBox1").innerHTML = "Select Your State of Residence";
     return false;

    }


}



  function validateLoginForm() {
var emailRegex = /^[A-Za-z0-9._]*\@[A-Za-z]*\.[A-Za-z]{2,5}$/;
  var femail = document.forms["myForm2"]["email"].value;
    var pword = document.forms["myForm2"]["password"].value;

              if (femail == "" )
 {
  document.forms["myForm2"]["email"].focus() ;
  document.getElementById("errorBox2").innerHTML = "Enter your email";
  return false;
  }else if(!emailRegex.test(femail)){
document.forms["myForm2"]["email"].focus() ;
  document.getElementById("errorBox2").innerHTML = "Enter a valid email";
  return false;
  }
 if(pword == "")
  {
   document.forms["myForm2"]["password"].focus() ;
   document.getElementById("errorBox2").innerHTML = "enter the password";
   return false;
  }

  }




    
    var end = new Date('02/01/2017 8:00 AM');

    var _second = 1000;
    var _minute = _second * 60;
    var _hour = _minute * 60;
    var _day = _hour * 24;
    var timer;

    function showRemaining() {
        var now = new Date();
        var distance = end - now;
        if (distance < 0) {

            clearInterval(timer);
            document.getElementById('countdown').innerHTML = 'EXPIRED!';

            return;
        }
        var days = Math.floor(distance / _day);
        var hours = Math.floor((distance % _day) / _hour);
        var minutes = Math.floor((distance % _hour) / _minute);
        var seconds = Math.floor((distance % _minute) / _second);




        document.getElementById('clock').innerHTML = days + '<span class="dhm">days</span>:';
        document.getElementById('clock').innerHTML += hours + '<span class="dhm">hrs.</span>:';
        document.getElementById('clock').innerHTML += minutes + '<span class="dhm">mins.</span>:';
        document.getElementById('clock').innerHTML += seconds + '<span class="dhm">secs.</span>';
    }

    timer = setInterval(showRemaining, 1000);

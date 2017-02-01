
    <?php 
    require_once("db_con.php");
    
if(isset($_POST['submit'])){ 

    
     
 $fullname = strip_tags($_POST['fullname']);
 $username = strip_tags($_POST['username']);
 $upass = strip_tags($_POST['password']);
 $email = strip_tags($_POST['email']);
  $selectstate = strip_tags($_POST['selectstate']);
 
  $fullname = $con->real_escape_string($fullname);
 $username = $con->real_escape_string($username);
 $upass = $con->real_escape_string($upass);
 $email = $con->real_escape_string($email);
 $selectstate = $con->real_escape_string($selectstate);
 
 
 
 $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
 
 $check_email = $con->query("SELECT `user_email` FROM `uwr_users` WHERE user_email = '$email'");
 $count=$check_email->num_rows;
 
 if ($count==0) {
  
 $query=" INSERT INTO `uwr_users`( `user_fullname`, `user_username`, `user_password`, `user_email`, `user_state`) VALUES ('$fullname','$username','$hashed_password','$email','$selectstate') ";

  if ($con->query($query)) {
    /*$msg =*/ echo "<div id='errorBox'>
     successfully registered !
     </div>";
      header('Location: profile.html');
    exit();
     
  }else {
   /*$msg =*/ echo "<div id='errorBox'>
       error while registering !
     </div>";
  }
  
 } else {
  
  
 /*$msg =*/ echo "<div id='errorBox'>
     sorry email already taken !
    </div>";
   
 }
 
 $con->close();
}


?>
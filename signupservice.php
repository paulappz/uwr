
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
  
 $query=" INSERT INTO `uwr_users`( `user_fullname`, `user_username`, `user_password`, `user_email`, `user_state`,`Reg_status`,`uploaded_img`, `uwrsocial_img`) VALUES ('$fullname','$username','$hashed_password','$email','$selectstate','0','','') ";

  if ($con->query($query)) {
    /*$msg =*/
    
    $msg = 'successfully registered!, You can now login';
  echo "<script language='javascript'> alert('" .$msg. "');
window.location = 'index.html';
</script>";
    exit();
     
  }else {
         $msg = 'error while registering!';
  echo "<script language='javascript'> alert('" .$msg. "');
window.location = 'index.html';
</script>";

  }
  
 } else {
  
      $msg = 'sorry email already taken!';
  echo "<script language='javascript'> alert('" .$msg. "');
window.location = 'index.html';
</script>";

   
 }
 
 $con->close();
}


?>
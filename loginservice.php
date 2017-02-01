
    <?php 
     session_start();
     require_once("db_con.php");
     
    if (isset($_SESSION['userSession'])) {
 header("Location: profile.php");
 exit;
}
   
    
if (isset($_POST['submit'])) {
 
 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);
 
 $email = $con->real_escape_string($email);
 $password = $con->real_escape_string($password);
 
 
 $query = $con->query("SELECT * FROM `uwr_users` WHERE user_email ='$email'");
 $row=$query->fetch_array();
 
 $count = $query->num_rows; // if email/password are correct returns must be 1 row
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo  password_verify($hashed_password, $row['user_password']);


 if ($count==1) {
  $_SESSION['userSession'] = $row['user_id'];
  $_SESSION['userSession_fullname'] = $row['user_fullname'];
  $_SESSION['userSession_username'] = $row['user_username'];
  $_SESSION['userSession_email'] = $row['user_email'];
    $_SESSION['userSession_state'] = $row['user_state'];
     $_SESSION['userSession_status'] = $row['Reg_status']; 
  header("Location: profile.php");
 } else {
 /* $msg =   echo "<div id='errorBox'>
     Invalid Username or Password !
    </div>";
  */  
 }
 $con->close();
}


?>
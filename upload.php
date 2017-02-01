
<?php
 session_start();
    require_once("db_con.php");
    

$dir = "image/";
$temp = explode(".", $_FILES["image"]["name"]);
$newfilename =  $_SESSION['userSession'] . '.' . end($temp);
move_uploaded_file($_FILES["image"]["tmp_name"], $dir . $newfilename);

 $file=$dir.$newfilename;
 $user_id = $_SESSION['userSession'];

 //$query=" UPDATE `uwr_users` SET `uploaded_img`= $file WHERE `user_id`=$user_id";
$query="UPDATE `uwr_users` SET `uploaded_img`= '$file' WHERE `user_id`=$user_id";

  if ($con->query($query)) {
    echo "<div class='Greenstatusimg'> successfully uploaded </div>";
   echo "<div id='data'> <img id='uploadedimg' src='". $file ."' height='200' width='200'> </div>";   
    echo "<div class='cropdiv'> <a id='cropbtn' href='badge.php'>Process Badge</a> </div></div>";
    $_SESSION['userimg'] = $file;
    exit();
     
  }else {
       echo "<div class='Redstatusimg'> error while uploading, Try again !</div>";  
  }
  
  
 $con->close();

     
?>
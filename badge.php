<?php
    session_start();
     require_once("db_con.php");
     
    if (!isset($_SESSION['userimg'])) {
 header("Location: profile.php");
 exit;
}
   

// If not a POST request, display page below:
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="utf-8">
    <title>UWR- Urban Warrior Race</title>
     <link href="https://fonts.googleapis.com/css?family=Jura" rel="stylesheet">

      <script type="text/javascript" src="appjs/jquery-3.1.1.min.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
 <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
   <script src="appjs/badge-crop.js"></script>
        <link href="css/badge.css" rel="stylesheet">
   
</head>
<body>
        
 
  <div class="Nav">
      
    
   <div class="logoutdiv"> <a id="logoutbtn" href="logout.php">LogOut</a> </div>
    <div id="logo"> <img  src="img/logo.png" hiegth="45" width="63"></div>
    <div class="abtdiv"> <a id="abtbtn" href="about.html">About</a> </div>
  <!--      <a href="#" class="button Register">Register</a>  <a href="#" class="button Login">Login</a> -->
   </div>

        <div class="container1"> 
                
        <div class="navprof">
           <a href="#" class="badgenav"> <div style="background-color:black; color:wheat"  class="contnav cnpos31"> Get Badge </div></a>
          
             </div>
            
             
   <?php            
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 65;
    $targ_h = 65;
	$jpeg_quality = 90;
    
	$src = $_SESSION['userimg'];
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
 
	imagejpeg($dst_r,$src,$jpeg_quality);


echo "<div  class='cont badge' style='background-color:wheat; color:wheat'> 
        <canvas width='209' height='339' id='canvas' style='border-radius:33px; color:wheat'>Hello</canvas>

 <a href='#' class='button' id='btn-download'><div style='margin:0 auto'>Download</div></a>
 
  </div> 
  <div class='bckdiv'><a id='bckbtn' href='profile.php'>Back to Profile</a></div>
  </div>
   
   </body>

</html>
  
<script>
var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');

var img2 = loadImage('img/fram2bk.png', main);
var img1 = loadImage('img/fram2.png', main);
var img3 = loadImage('". $src . "', main);
var text = '" .$_SESSION['userSession_username']. "';
var Regcode = 'UWR /" .$_SESSION['userSession']. "';

var imagesLoaded = 0;
function main() {
    imagesLoaded += 1;

    if(imagesLoaded == 3) {
        // composite now
       
ctx.fillStyle='#000';
ctx.font='bold 14px Agency FB';       
 
        ctx.drawImage(img2, 0, 0);
        ctx.drawImage(img3, 73, 40); 
           ctx.drawImage(img1, 50, 25);
        ctx.fillText(text,85, 134);
 
    }
}

function loadImage(src, onload) {
    var img = new Image();
    
    img.onload = onload;
    img.src = src;

    return img;
}


var button = document.getElementById('btn-download');
button.addEventListener('click', function (e) {
    var dataURL = canvas.toDataURL('image/png');
    button.href = dataURL;
});

</script>";

	exit;
} 

    ?>           
               
              <div  class="cont badge">   
		<!-- This is the image we're attaching Jcrop to -->
		<img src="<?php echo $_SESSION['userimg']; ?>" id="cropbox" />

		<!-- This is the form that our event handler fills -->
		<form action="badge.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
            
			<input type="submit" value="Crop Image" id="cropbtn" />
		</form>

     </div>

          
     </div>
        
</body>

</html>



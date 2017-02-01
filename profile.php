<?php  

 session_start();
     require_once("db_con.php");
     
    if (!isset($_SESSION['userSession'])) {
 header("Location: index.html");
 exit;
}
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
    <script src="appjs/profile.js"></script>
 <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
  <link rel="stylesheet" href="css/profile.css" type="text/css" />

    
</head>
<body>
        
 
  <div class="Nav">
      
   
    <div class="logoutdiv"> <a id="logoutbtn" href="logout.php">LogOut</a> </div>
    <div id="logo"> <img  src="img/logo.png" hiegth="45" width="63"></div>
    <div class="abtdiv"> <a id="abtbtn" href="about.html">About</a> </div>
   </div>
    
   
  
        
        <div class="container1"> 
     
        <div class="navprof">
            
           <a href="#" class="paynav" > <div class="contnav "> Make Payment </div></a> 
         <a href="#" class="verifynav" >  <div class="contnav cnpos21"> Verify Payment </div></a> 
           <a href="#" class="badgenav"> <div class="contnav cnpos31"> Get Badge </div></a>
           
           
             </div>
             <div class="cont pay"  > 
                    <div class="contdetails"> 
                        
                        
                        <div>  <span> Name </span> <?php echo $_SESSION['userSession_fullname']; ?> </div>
                       <div>   <span> Registration Code </span> UWR / <?php echo  $_SESSION['userSession']; ?> /PYT   </div>
                         <div>    <span> State </span> <?php echo $_SESSION['userSession_state']; ?> </div>
                 
                            
                            
                            <h4> Payment Details </h4>
                        <div>    <span> Bank Name </span>  GTBank  </div>
                              <div>      <span>Account Number </span> 0111480288 </div>
                                
                       </div>
                       <div class="veri"> Send a SMS in this format { Name - Reg.No - DateofPayment} to 08068492563 <br>
                        e.g Oluyege Paul - UWR/00001/PYT - Feb 1</div>
                </div> 
            
            
            <div class="cont verify " style="display:none" >
                      <div class="contdetails"> 
                     
                          
                          <div class="Redstatus"></div> <div class="Greenstatus"></div>
                         <div class="veribtndiv"> <a id="veribtn" href="#">Verify</a> </div>
                        <div class="veriimg">  <img id="verified" src="img/verified.png" > </div>
                      </div>             
                </div> 
                
        
            <div  class="cont badge" style="display:none"> 
                
<div class="fileup"> 
<input type="file" name="file" id="file" class="inputfile" data-multiple-caption="{count} files selected" multiple />
<label for="file">Choose a file</label>
  <button onclick="uploadFile();">Upload</button>
  </div>
  
                            <div id="data"> </div>
 
     </div>

          
     </div>
        
</body>

</html>
<script>
    $(function(){
          //  $(".badgenav").prop('disabled', true);
    $(".pay").show();
   $(".verify").hide();
   $(".badge").hide();
    
    $(".paynav").on("click", function(){
       
            $(".pay").show();
   $(".verify").hide();
   $(".badge").hide();
    });
    
     $(".verifynav").on("click", function(){
       
    $(".pay").hide();
   $(".verify").show();
   $(".badge").hide();
    });
    
  $(".badgenav").on("click", function(){
       
            $(".pay").hide();
   $(".verify").hide();
   $(".badge").show();
    });
      $("#veribtn").val("<?php echo $_SESSION['userSession_status']; ?>"); 
      
    if ( $("#veribtn").val() == 1) {
        $("div.Greenstatus").text('Your Payment has been verified!, You can now upload your picture in the final registration process to get your badge');
         $("a#veribtn").text('Verified!');  }

     else {
             $("div.Redstatus").text('Your Payment hasnt been verified, Send your payment details in a Text to 08068492563');
             $("a#veribtn").text('Not Verified');
             $(".badgenav").on("click", function(){
       
            $(".pay").hide();
   $(".verify").show();
   $(".badge").hide();
   alert("You can't access badge without Payment verification!");
    });
        }
    });
       </script>
<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css";>
    <script src="https://kit.fontawesome.com/1c2bffb59b.js" crossorigin="anonymous"></script>
    <meta name="google-signin-client_id" content="722682528489-53ofu5k3la8jk3j5sgpt66rnkms3ta6b.apps.googleusercontent.com">
                <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
    
    <title>Document</title>
</head>
<body>
    <div class="login">
        <img src="download.jpeg" class="avatar">
         <h1>Login Here</h1>
         <form method="POST" action="login.php">
             <p>Username</p>
               <input type="text" name="username" placeholder="Enter Username" required>
               <p>Password</p>
               <input type="password" name="password" placeholder="Enter Password" required>
               <input type="submit" name="" value="submit">
               <a href="forgot.html">Forgot your Password?</a><br>
               <a href="create.html">Create an account</a>
               
         </form>

     
         <?php
         if(isset($_SESSION['USER_ID'])){
                 ?>
                 <a href="javascript:void(0)" onclick="logout()">Logout</a>
                 <?php
         }else{
                 ?>
                 <div class="g-signin2" data-onsuccess="gmailLogIn"></div>
                 <?php
         }
         ?>
         
         <script>
         
         function logout(){
             var auth2 = gapi.auth2.getAuthInstance();
             auth2.signOut();  
             jQuery.ajax({
                         url:'logout.php',
                         success:function(result){
                                 window.location.href="index.php";
                         }
                 });
             
         }
         
         function onLoad(){
                gapi.load('auth2',function (){
                       gapi.auth2.init();
                }); 
         }
         
         function gmailLogIn(userInfo){
                 var userProfile=userInfo.getBasicProfile();
                 
                 
                 jQuery.ajax({
                         url:'login_check.php',
                         type:'post',
                         data:'user_id='+userProfile.getId()+'&name='+userProfile.getName()+'&image='+userProfile.getImageUrl()+'&email='+userProfile.getEmail(),
                         success:function(result){
                                 window.location.href="index.php";
                         }
                 });
         }
         </script>
         
         <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>   
    </div>
</body>
</html> 
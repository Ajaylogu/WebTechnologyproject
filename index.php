<?php
   include("DB.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $myusername = mysqli_real_escape_string($db,$_POST['firstname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['lastname']); 
      $sql = "SELECT firstname FROM details WHERE firstname = '$myusername' and lastname = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row	
      if($count == 1) {
         
         header("location: welcom.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            background:url("c2.jpg");
           background-repeat=no-repeat;
           background-size:cover;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "white">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "firstname" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "lastname" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:blue; margin-top:10px"><?php echo "Note:your username and password should be lesser then Eightcharecres"; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
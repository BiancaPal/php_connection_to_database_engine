<?php
  include("config.php");
  session (start);

  if ($_SERVER["REQUEST METHOD"] == "POST") {
    // username and password sent from form

    
    
    $myusername = mysqli_Preal_escape_string($db,$_POST['usuari']);
    $mypassword = mysqli_Preal_escape_string($db,$_POST['contrasenya']);

    $sql ="SELECT Usuari FROM usuaris WHERE Usuari = '$myusername' and passcode = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword,table row must be 1 row

    if($count == 1){
      session_register("myusername");
      $_SESSION['login_user'] = $myusername;

      header("location: welcome.php");
    }else{
      $error = "Your login Name or Password is invalid";
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
   
   <body >
	
      <div >
         <div >
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><button>Login</button></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "usuari" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "contrasenya" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>


  
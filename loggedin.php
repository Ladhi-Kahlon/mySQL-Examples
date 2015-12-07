<?php 

    include("connection.php");
    
    $error = "";
    
    $qry = "SELECT `EMail` FROM `Users` WHERE `email`='".mysqli_real_escape_string($con, $_POST['email2'])."'";
       
    $result = mysqli_query($con, $qry);
          
            //if rows return other than zero, then e-mail is already registered 
            $rows = mysqli_num_rows($result);
            
            if ($rows) {
                $error.="email in db";
            } else {
                $error.= "ok to enter";
            }
            
            echo $error;
    
    
?>

<form method="post">
    
    <input type="email" name="email2" id="email2" value = "<?php echo $_POST['email2']; ?>"/>
    <input type="password" name="password2" />
    <input type="submit" name="submit2" value="Sign Up Email Test" />
    
</form>
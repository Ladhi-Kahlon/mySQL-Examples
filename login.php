<?php

    session_start();

    //code to log use out $_GET is passed back from main page with value of 1
    //session_destroy function will delete/remove any session variables.
    if ($_GET['logout']==1 AND $_SESSION['id']) {
        
        session_destroy();
        $message = "You have been logged out. Have a nice date!";
        
    }
    
	include("connection.php");

    #$error = "";
    
    //if submit variable returns a value then run this code>>, ++added if variable value is = to "Sign up" then run this code >>
    if ($_POST['submit']=="Sign Up") {
        //if e-mail variable is blank/null
        if (!$_POST['email']) {
            //add error to $error to variable
            $error.="<br />Please enter e-mail address";
            //if it is not null, check valid e-mail string
        } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
           $error.="<br >Please enter a valid e-mail address"; 
        }
        //check password value if exists NOT
        if (!$_POST['password']) {
            //if password null add to error $error.
            $error.="<br />Please enter password";
          //if password varaible has value  
        } else {
            //first check for minimum character  
            if (strlen($_POST['password']) < 8 ) {
                $error.="<br />Password must be at least 8 character long";
            }
            //using reg-ex, check to see if password has at least one CAPITOL letter
            if (!preg_match('`[A-Z]`',$_POST['password'])) {
                $error.="<br />Password must include at least one capitol letter";
            }
        }
        if ($error) $error = "There were error(s) in your signup details: ".$error;
        
        else {
            
            //check to see e-mail already exists in the database
            //mysqli_real_escapte_string is used to guard againts sql injection example: '); SELECT * FROM user
            
            $qry = "SELECT * FROM `Users` WHERE `EMail`='".mysqli_real_escape_string($con, $_POST['email'])."'";
       
            $result = mysqli_query($con, $qry);
          
            //if rows return other than zero, then e-mail is already registered 
            $rows = mysqli_num_rows($result);
            
            if ($rows) {
                $error = "E-Mail address is already registered.";
            } else {
                $qry = "INSERT INTO `Users` (`EMail`, `Password`) VALUES ('".mysqli_real_escape_string($con, $_POST['email'])."','".md5(md5($_POST['email']).$_POST['password'])."')";
                
                //qry execution
                mysqli_query($con, $qry);
                //confirmation for the user.
                $success="You have been singed up. Do you want to log in?";
                //get the ID from the users table with the latest user ID.
                $_SESSION['id']=mysqli_insert_id($con);
                
                //print_r($_SESSION); 
                //re-direct to main page...
                header("Location:mainpage.php");
            }
            
        }
        
    }
    
    //if system variable with submit pram has log in value then run this code >>
    if ($_POST['submit']=="Log In") {
        
        //check to see if email and password is in the database
        $qry = "SELECT * FROM `Users` WHERE `EMail`='".mysqli_real_escape_string($con, $_POST['loginemail'])."' AND `Password` ='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."' LIMIT 1";
  

        $result = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($result);
        if ($row) {
            $_SESSION['id']=$row['ID'];
            //print_r($_SESSION);
            //redirect to logged in page.
            header("Location:mainpage.php");
        } else {
            $error = "User name or password incorrect. Please try again";
        }
/*
        if($result=mysqli_query($con, $qry)) {
            
            $row = mysqli_fetch_array($result);
            
            if($row) {
                $_SESSION['id']=$row['ID'];
                print_r($_SESSION);
                //redirect to logged in page.
            } else echo "Incorrect user name or password. Please try again";
            
        } else echo "Services temparty unavailable. Please try again later";
      
*/        

        
    }

?>
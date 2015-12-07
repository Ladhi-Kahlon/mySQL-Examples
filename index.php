<?php 

    session_start();

    include("login.php");   
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta  name="viewport" content="width=device-width, initialscale=1">
		
		<title>Secret Landing Page</title>
		
		<!-- Bootstrap plug-in -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
		<!-- [if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<style type="text/css">
			
			.navbar-brand {
				font-size: 1.6em;
			}
			#topContainer {
				background-image: url(images/background-picjumbo3.jpg);
				height: 100px;
				width: 100%;
				background-size: cover;
			}
			#topRow {
				margin-top: 100px;
				text-align: center;
				font-family: "Times New Roman", Times, serif;
				
			}
			#topRow h1 {
				font-size: 310%;
				text-transform: uppercase;
				color: #94768C;
			}
			.bold {
				font-size: bold;
			}
			.margin-top {
				margin-top: 25px;
			}
			.margin-top-email {
				margin-top: 50px;
			}
			.margin-top-submit-btn {
				margin-top: 53px;
			}
			.center {
				text-align: center;
			}
			.title {
				margin-top: 50px;
				font-size: 260%;
			}
			.marginBottom{
				margin-bottom: 30px;
			}
		
		</style>
	
	</head>
	
	<body data-spy="scroll" data-target=".navbar-collapse">
		
		<div class="navbar navbar-default navbar-fixed-top">	
			<div class="container">
				
				<div class="navbar-header">
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">{Log-In Example}</a>
				</div> <!--navbar header end-->
				
				<div class="collapse navbar-collapse">
						<!--<ul class="nav navbar-nav">
							<li class="active"><a href="#home">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#help">Help</a></li>
						</ul>-->
					
					<form class="navbar-form navbar-right" method="post">
						<div class="form-group">
							<input type="email" name="loginemail" placeholder="Email" class="form-control" value="<?php echo addslashes($_POST['loginemail']); ?>" />
						</div> <!-- navbar e-mail input form end-->
						<div class="form-group">
							<input type="password" name="loginpassword" placeholder="Password" class="form-control" value="<?php echo addslashes($_POST['loginpassword']); ?>" />
						</div>
						<input type="submit" name="submit" class="btn btn-primary" value="Log In"/>
						<!--<button type="submit" class="btn btn-primary">Sign Up</button>-->
					</form>	
				</div><!--navbar collapse end-->
			</div><!--navbar container end-->
		</div> <!--navbar div end-->
		
		<div class="container contentContainer" id="topContainer">			
			<div class="row">	
				<div class="col-md-6 col-md-offset-3" id="topRow">
					<h1 class="margin-top">Sign-up/Log-In page example</h1>
                    
                    <?php //error message
                        if($error) {
                            echo '<div class="alert alert-danger">'.addslashes($error).'</div>';
                        }
                    ?>

                    <?php //success logout message
                        if($message) {
                            echo '<div class="alert alert-success">'.addslashes($message).'</div>';
                        }
                    ?>
					<form class="margin-top-email" method="post">
                        <p class="lead">Sign-up to access secret diary!</p>
                        
						<div class="form-group">
                            <!--<label for="email">E-Mail Address: </label>-->
							<input class="form-control" type="email" name="email" placeholder="Enter your e-mail address" value="<? echo addslashes($_POST['email']); ?>" />
                        </div>
                        
                        <div class="form-group">
                            <!--<label for="password">Password </label>-->
							<input class="form-control" type="password" name="password" placeholder="Enter your password" value="<? echo addslashes($_POST['password']); ?>" />
                         </div>
                        
						<input type="submit" name="submit" class="btn btn-primary btn-lg" value="Sign Up" />
                        
					</form>
				
				</div>		
			</div>
		</div> <!--top container end-->

	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
		<script>
			
			$(".contentContainer").css("min-height",$(window).height()); //background image height based on window size

		</script>
		
	</body>

</html>



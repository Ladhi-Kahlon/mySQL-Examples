<?php
    
    session_start();

    include("connection.php");

    $qry = "SELECT * FROM `Users` WHERE ID='".$_SESSION['id']."' LIMIT 1";
    //execute qry
    $result = mysqli_query($con, $qry);
    //get data
    $row = mysqli_fetch_array($result);
    //assing it to
    $diary = $row['Diary'];
    
    //assign e-mail name to $email variable
    $name = $row['EMail'];

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta  name="viewport" content="width=device-width, initialscale=1">
		
		<title>Secret Diary</title>
		
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
		
		</style>
	
	</head>
	
	<body data-spy="scroll" data-target=".navbar-collapse">
		
		<div class="navbar navbar-default navbar-fixed-top">	
			<div class="container">
				<div class="navbar-header pull-left">
					<a class="navbar-brand">The Secret Page <span class="glyphicon glyphicon-stats"></span></a>
				</div> <!--navbar header end-->
				
				<div class="pull-right">
						<ul class="nav navbar-nav">
                            <li><a href="index.php?logout=1"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
						</ul>
				</div><!--navbar collapse end-->
                
			</div><!--navbar container end-->
            
		</div> <!--navbar div end-->
		
		<div class="container contentContainer" id="topContainer">			
			<div class="row">	
				<div class="col-md-8 col-md-offset-2" id="topRow">
                  <span class="lead">Welcome: <?php echo $name ?></span>  
                    <textarea class="form-control" placeholder="Enter your thoughts here..."><?php echo $diary; ?></textarea>

				</div>		
			</div>
		</div> <!--top container end-->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		
		<script>
			
			$(".contentContainer").css("min-height",$(window).height()); //background image height based on window size
            
            $("textarea").css("min-height",$(window).height()-350);
            
            //keyup function will update the db
            $("textarea").keyup(function(){
                //run updatediary.php this is using regex,
                //"diary" in here is the varaible and value is from testarea is passed.
                $.post("updatediary.php", {diary:$("textarea").val()});
            })

		</script>
		
	</body>

</html>
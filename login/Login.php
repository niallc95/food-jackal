<?php
if(isset($_COOKIE['user'])){
	header("Location: ../index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FoodJackal | Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-item.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.5/slate/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">FoodJackal</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="">Services</a>
                    </li>
                    <li>
                        <a href="Contact">Contact</a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
				<li>
				 <form class="navbar-form" action="search.php?go" method="post" role="search">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" name="srchterm" id="srchterm">
			<div class="input-group-btn">
				<button class="btn btn-default" name ="submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
		</form>
		</li>
					<li>
					<a href="Signup">Signup</a>
				</li>
				<li>
					<a href="Login">Login</a>
				</li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    <?php
    if(isset($_SESSION['error'])){
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$_SESSION['error'].' 
</div>';
    }
    ?>
	
            <div class="jumbotron">	
			  <center><h1 class=" ">Login</h1></center>
 <form action="check.php"  method="post" >
    <div class="form-group">
      <label for="usr">E-mail:</label>
      <input type="email" class="form-control" id="email"  name="email">
    </div><form role="form">
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="pass" id="pass" placeholder ="Enter in your password.">
    </div>
    <div class="col-sm-offset-0 col-sm-10">
        <input type = "submit" name ="submit" class="btn btn-success"  value="Submit!"/>
   </div>

      </div>
  </form>
      </div>
        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; FoodJackal 2015</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Shop Item - Start Bootstrap Template</title>

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
        <?php include('../includes/header.php'); ?>




        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <div class="col-md-3">
                    <p class="lead">Sign Up</p>
                </div>

                <div class="col-md-6">

                    <form role="form" method="post" action="signupsuccess" onSubmit="return validate(this);" name="form">
                        <br>
                        <br>   
                        <br>
                        <br>
                        <label>First Name:</label>
                        <input type="text" class="form-control" name="fname">

                        <br>

                        <label>Last Name:</label>
                        <input type="text" class="form-control"  name="lname">

                        <br>
                        
                        <label>Address:</label>
                        <input type="text" class="form-control"  name="address">

                        <br>
                        
                        <label>Date of Birth:</label>
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" name="dob">

                        <br>

                        

                        <label>E-mail:</label>
                        <input type="text" class="form-control"  name="email">

                        <br>

                        <label>Password:</label>
                        <input type="password" class="form-control"  placeholder ="Enter in your password here:" name="pass">
                        
                        <br>
                        
                        <label>Re Enter Password:</label>
                        <input type="password" class="form-control" placeholder ="Enter in your password here:" name="pass2">
                        <br>
                        <input type = "submit" class="btn btn-success" value="Submit!" formaction="db_post.php" name="post"/>                    
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

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Food Jackal - Customer Signup</title>

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

	<!-- AngularJS -->
	<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script> 
        
	<!-- JQuery -->
	<script src= "../javascript/jquery-1.11.3-jquery.min.js"></script>

	<!-- Ajax form submit -->
	<script type="text/javascript">
            $(document).ready(function ()
            {


                $(document).on('submit', '#reg-form', function ()
                {

                    //var fn = $("#fname").val();
                    //var ln = $("#lname").val();

                    //var data = 'fname='+fn+'&lname='+ln;

                    var data = $(this).serialize();


                    $.ajax({
                        type: 'POST',
                        url: 'customer-post.php',
                        data: data,
                        success: function (data)
                        {
                            $("#reg-form").fadeOut(500).hide(function ()
                            {
                                $(".result").fadeIn(500).show(function ()
                                {
                                    $(".result").html(data);
                                });
                            });

                        }//Close Success
                    });
                    return false;
                });
            });
        </script>
	
	<style type="text/css">
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse; 
	    margin-top:100px;
	}
	th, td {
	    padding: 5px;
	    text-align: center;
	}td{
		width:50%;
	}
	
	</style>
	
	
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
		
		    <!-- DIV to display data after ajax function -->
		    <div  class="result">

		    </div>

                    <form ng-app="myApp" method="post" id="reg-form" ng-controller="validateCtrl" name="myForm">
                        <br>
                        <br>   
                        <br>
                        <br>
                        
			<label>First Name:</label>
                        <input type="text" 
				class="form-control" 
				name="fname" 
				ng-model="fname" 
				required>
			  <span style="color:red" ng-show="myForm.fname.$dirty && myForm.fname.$invalid">
			  	<span ng-show="myForm.fname.$error.required">Firstname is required.</span>
			  </span>
                        <br>

                        <label>Last Name:</label>
                        <input type="text" 
				class="form-control" 
				name="lname" 
				ng-model="lname" 
				required>
			  <span style="color:red" ng-show="myForm.lname.$dirty && myForm.lname.$invalid">
			  	<span ng-show="myForm.lname.$error.required">Lastname is required.</span>
			  </span>

                        <br>

                        <label>Address:</label>

			<input type="text" 
				class="form-control" 
				name="address" 
				ng-model="address" 
				required>
			  <span style="color:red" ng-show="myForm.address.$dirty && myForm.address.$invalid">
			  	<span ng-show="myForm.address.$error.required">Address is required.</span>
			  </span>
                        <br>

                        <label>Date of Birth:</label>
			
			<input type="text" 
				class="form-control" 
				placeholder="yyyy-mm-dd" 
				name="dob" 
				ng-model="dob" 
				ng-pattern='/^[0-9]{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])/' 
				required>
			  <span style="color:red" ng-show="myForm.dob.$dirty && myForm.dob.$invalid">
			  	<span ng-show="myForm.dob.$error.required">D.O.B is required.</span>
				<span ng-show="myForm.dob.$error.">Invalid date format.</span>
			  </span>

                        <br>



                        <label>E-mail:</label>

			<input type="email" 
			       class="form-control" 
                               name="email" 
                               ng-model="email" 
                               required>
			  <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
				  <span ng-show="myForm.email.$error.required">Email is required.</span>
				  <span ng-show="myForm.email.$error.email">Invalid email address.</span>
			  </span>

                        <br>

                        <label>Password:</label>
                        <input type="password" 
				class="form-control" 
				name="pw1" 
				ng-model="pw1" 
				required>
			  <span style="color:red" ng-show="myForm.pw1.$dirty && myForm.pw1.$invalid">
			  	<span ng-show="myForm.pw1.$error.required">Password is required.</span>
			  </span>

                        <br>

                        <label>Confirm Password:</label>
                        <input type="password" 
				class="form-control" 
				name="pw2" 
				ng-model="pw2" 
				required>
			  <span style="color:red" ng-show="myForm.pw2.$dirty && myForm.pw2.$invalid">
			  	<span ng-show="myForm.pw2.$error.required">Password Confimation is required.</span>
			  </span>
				                       
			<br>

			<input type="submit" value="Register" class="btn btn-success" ng-disabled="myForm.fname.$dirty && myForm.fname.$invalid || 				myForm.lname.$dirty && myForm.lname.$invalid || myForm.address.$dirty && myForm.address.$invalid || myForm.email.$dirty && 				myForm.email.$invalid || myForm.dob.$dirty && myForm.dob.$invalid || myForm.pw1.$dirty && myForm.pw1.$invalid
			|| myForm.pw2.$dirty && myForm.pw2.$invalid" >              
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



        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
	
	


	
	
	<script>
		var app = angular.module('myApp', []);
		app.controller('validateCtrl', function($scope) {
		    $scope.fname = 'John';
		    $scope.lname = 'Doe';
		    $scope.address = '';
		    $scope.dob= null;
		    $scope.email = '';
		    $scope.pw1 = '';
		    $scope.pw2 = '';

		});

		
		
	</script>

    </body>

</html>

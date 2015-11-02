<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Graham Murray" >

    	<!-- Customer CSS-->
        <link type="text/css" rel="stylesheet" href="../../css/custom.css"/>





        <title>Food Jackal - Vendor Registration</title>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<?php include('../../includes/links.php')?>
        
	
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
                        url: 'vendor-post.php',
                        data: data,
                        success: function (data)
                        {         
                            $(".result").fadeIn(500).show(function ()
                            {
                                $(".result").html(data);
                            });
                            
                        }//Close Success
                    });
                    return false;
                });
            });
		
        </script>

        <!-- Reset Form after submission -->
        <script type="text/javascript">

			function resetForm() {
			    document.getElementById("reg-form").reset();
			}
		</script>

		<!-- Reset password  -->
        <script type="text/javascript">
			function resetPassword() {
	            //Needs to fixed
			    document.getElementById("passphrase1").reset();
			    document.getElementById("passphrase2").reset();
			}
		</script>
	
	<style type="text/css">
	table, th, td {
	    border: 1px solid black;
	    border-collapse: collapse; 
	    margin-top:20px;
	}
	th, td {
	    padding: 5px;
	    text-align: center;
	}td{
		width:50%;
	}
	.error{
	color:red;	
	text-align:center;
	}
	</style>
	
	
    </head>



    <body>

        <!-- Navigation -->
        <?php include('../../includes/header.php');?>




        <!-- Page Content -->
        <div class="container top-margin-content">
            <div class="row">
            	
            	<h2 class="lead center-text">Vendor Registration</h2>
                <div class="col-md-6">
                    <form ng-app="myApp" style="margin-top:-20px;" method="post" id="reg-form" ng-controller="validateCtrl" name="myForm">
                        <br>
                        <br>   
                        <br>
                        <br>
                        
						<label>Company Name:</label>
			                        <input type="text" 
							class="form-control"
							placeholder="Spar"
							name="companyName" 
							ng-model="companyName" 
							required>
					     	<span style="color:red" ng-show="myForm.companyName.$dirty && myForm.companyName.$invalid">
						  	s	<span ng-show="myForm.companyName.$error.required">Company Name is required.</span>
						  	</span>
			                
			                <br>

			                <label>Address Line 1:</label>
			                <input type="text" 
							class="form-control" 
							name="addressLine1" 
							ng-model="addressLine1" 
							required>
						  <span style="color:red" ng-show="myForm.addressLine1.$dirty && myForm.addressLine1.$invalid">
						  	<span ng-show="myForm.addressLine1.$error.required">Address Line 1 is required.</span>
						  </span>

                         <br>

			            <label>Address Line 2:</label>
						<input type="text" 
							class="form-control" 
							name="addressLine2" 
							ng-model="addressLine2" 
							required>
						<span style="color:red" ng-show="myForm.addressLine2.$dirty && myForm.addressLine2.$invalid">
							<span ng-show="myForm.addressLine2.$error.required">Address Line 2 is required.</span>
						</span>
			            
			            <br>

			       		<label>City:</label>
						<input type="text" 
							class="form-control" 
							placeholder="Dublin" 
							name="city" 
							ng-model="city"  
							required>
						<span style="color:red" ng-show="myForm.city.$dirty && myForm.city.$invalid">
							<span ng-show="myForm.city.$error.required">City is required.</span>
						</span>

			            <br>

			            <label>Phone Number:</label>
						<input type="text" 
							class="form-control" 
							placeholder="(01)8372356" 
							name="phone" 
							ng-pattern="/^\s*(\(?\s*\d{1,4}\s*\)?\s*[\d\s]{5,10})\s*$/"
							ng-model="phone"  
							required>
						<span style="color:red" ng-show="myForm.phone.$dirty && myForm.phone.$invalid">
							<span ng-show="myForm.phone.$error.required">City is required.</span>
							<span ng-show="myForm.phone.$error">Invalid Phone Number Format.</span>
						</span>

			            <br>


						<label>Company Description:</label>
						<textarea 
							id="description" 
							class="form-control" 
							rows ="10"
							ng-model="description"  
							name="description"
							placeholder="Enter a small description of what foods your company provides. Roughly 20-40 words."
							required>
						</textarea>
			            <span style="color:red" ng-show="myForm.description.$dirty && myForm.description.$invalid">
							<span ng-show="myForm.description.$error.required">A brief description is required.</span>
						</span>


			            <br>

			            <label>E-mail:</label>
						<input type="email" 
						       class="form-control" 
			                   name="email" 
			                   ng-model="email"
			                   placeholder="username@domain.com"
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
							id="passphrase1"
							ng-minlength="6" 
							required>
						<span style="color:red" ng-show="myForm.pw1.$dirty && myForm.pw1.$invalid">
							<span ng-show="myForm.pw1.$error">Password is required.</span>
							<span ng-show="myForm.pw1.$error.minlength">Password must be at least 6 characters long.</span>
						</span>

			            <br>

			            <label>Confirm Password:</label>
			            <input type="password" 
							class="form-control" 
							name="pw2" 
							ng-model="pw2"
							id="passphrase2"
							required>
						<span style="color:red" ng-show="myForm.pw2.$dirty && myForm.pw2.$invalid">
							<span ng-show="myForm.pw2.$error.required">Password Confimation is required.</span>
						</span>
							                       
						<br>

						<input type="submit" value="Register" class="btn btn-success" ng-disabled="myForm.companyName.$dirty && myForm.companyName.$invalid || myForm.addressLine1.$dirty && myForm.addressLine1.$invalid || myForm.addressLine2.$dirty && myForm.addressLine2.$invalid || myForm.city.$dirty && myForm.city.$invalid || myForm.email.$dirty && myForm.email.$invalid || myForm.phone.$dirty && myForm.phone.$invalid || myForm.pw1.$dirty && myForm.pw1.$invalid
						|| myForm.pw2.$dirty && myForm.pw2.$invalid || myForm.description.$dirty && myForm.description.$invalid" >              
                    </form>		   
				
					<!-- DIV to display data after ajax function -->
			    	<div  class="result">
			    		<!-- Form submission results displayed here-->
			    	</div>
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

	

	<script>
		var app = angular.module('myApp', []);
		app.controller('validateCtrl', function($scope) {
		    $scope.companyName = '';
		    $scope.addressLine1 = '';
		    $scope.addressLine2 = '';
		    $scope.phone = '';
		    $scope.description = '';
		    $scope.email = '';
		    $scope.pw1 = '';
		    $scope.pw2 = '';

		});

		
		
	</script>

    </body>

</html>

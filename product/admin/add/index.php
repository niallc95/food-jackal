<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Graham Murray" >

        <title>Food Jackal - Add Products</title>


        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	<?php include('../../../includes/links.php')?>
        


	<!-- Ajax form submit -->
	<script type="text/javascript">
            
	
	$(document).ready(function ()
            {


                $(document).on('submit', '#add-form', function ()
                {

                    //var fn = $("#fname").val();
                    //var ln = $("#lname").val();

                    //var data = 'fname='+fn+'&lname='+ln;

                    var data = $(this).serialize();


                    $.ajax({
                        type: 'POST',
                        url: 'product-post.php',
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
			    document.getElementById("add-form").reset();
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
	.success{
	color:green;	
	text-align:center;
	}
	</style>
	
	
    </head>



    <body>

        <!-- Navigation -->
        <?php include('../../../includes/header.php');?>




        <!-- Page Content -->
        <div class="container" style="margin-top:100px">

        <div class="row">


         <p class="lead text-left">Add New Product to Listing</p>

        <div class="col-md-12">
	

            <form ng-app="myApp" method="post" id="add-form" ng-controller="validateCtrl" name="myForm">
            <br>
            <br>   
            <br>
            <br>
                        
			<label>Product Title:</label>
                <input type="text" 
				class="form-control"
				style="width:70%"
				name="productTitle" 
				ng-model="productTitle"
				placeholder="Chicken Wrap" 
				required>
			  <span style="color:red" ng-show="myForm.productTitle.$dirty && myForm.productTitle.$invalid">
			  	<span ng-show="myForm.productTitle.$error.required">Title is required.</span>
			  </span>
                        <br>

			<label>Price: &euro;</label>
				<input type="text" 
				class="form-control"
				style="width:20%" 
				name="productPrice" 
				ng-model="productPrice"
				placeholder="8.99"
				ng-pattern="/^[0-9]+([,.][0-9]+)?$/" 
				required>
			  <span style="color:red" ng-show="myForm.productPrice.$dirty && myForm.productPrice.$invalid">
			  	<span ng-show="myForm.productPrice.$error.required">A price is required</span>
			  	<span ng-show="myForm.productPrice.$error.required">Invalid Price format is 00.00 or 0.00 or 000.00</span>
			  </span>

            <br>

            <label>Item Description:</label>
			<textarea 
				id="description" 
				class="form-control" 
				rows ="10"
				ng-model="description"  
				name="description"
				placeholder="Enter a small description of the item"
				required>
			</textarea>
            <span style="color:red" ng-show="myForm.description.$dirty && myForm.description.$invalid">
				<span ng-show="myForm.description.$error.required">A brief description is required.</span>
			</span>
            
            <br>


				<input type="submit" value="Add Product" class="btn btn-success" ng-disabled="myForm.productTitle.$dirty && myForm.productTitle.$invalid || myForm.productPrice.$dirty && myForm.productPrice.$invalid || myForm.description.$dirty && myForm.description.$invalid">              
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



        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
	
	


	
	
	<script>
		var app = angular.module('myApp', []);
		app.controller('validateCtrl', function($scope) {
		    $scope.productTitle = '';
		    $scope.productPrice = '';
		    $scope.description = '';
		});

		
		
	</script>

    </body>

</html>

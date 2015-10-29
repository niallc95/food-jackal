<html>
<head>
	<title>Ajax Image Upload Using PHP and jQuery</title>
	<link rel="stylesheet" href="../../css/image-upload-style.css" />
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="image-upload-script.js"></script>

	
</head>
<body>
		<div class="main">
			<h1>Upload Images for Post</h1><br/>
			<hr>
			<center>
				<form id="uploadimage" action="" method="post" enctype="application/x-www-form-urlencoded">
					<div id="image_preview"><img id="previewing" src="./images/noimage.png" /></div>
						<hr id="line">
					<div id="selectImage">
						<label>Select Your Image</label><br/>
						<input type="file" name="file" id="file" required />
						<input type="submit" value="Upload" class="submit" />
					</div>
				</form>
			</center>
		</div>
		<h4 id='loading' >loading..</h4>
		<div id="message"></div>
</body>
</html>

<?php
/*
 * @category  Image upload for vendor logo
 * @file      ajax-image-upload.php
 * @data      29/10/15
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/
if (isset($_FILES["file"]["type"])) {
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $folderYear = date("Y");
    $folderDate = date("d-m-Y");
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
            ) && ($_FILES["file"]["size"] < 300000)//Approx. 300kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        }if(!file_exists("uploaded/".$folderYear."/".$folderDate) && !is_dir("uploaded/".$folderYear."/".$folderDate) || !file_exists("uploaded/".$folderYear) && !is_dir($folderYear)){
			if(!file_exists("uploaded/".$folderYear) && !is_dir($folderYear)){
				mkdir("uploaded/".$folderYear,0755);//755 for permissions
			}if(!file_exists("uploaded/".$folderYear."/".$folderDate) && !is_dir("uploaded/".$folderYear."/".$folderDate)){
				mkdir("uploaded/".$folderYear."/".$folderDate,0755);//755 for permissions
			}
        }else{
			if (file_exists("uploaded/".$folderYear."/".$folderDate."/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
            } else {





                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = "uploaded/".$folderYear."/".$folderDate."/" . $_FILES['file']['name']; // Target path where file is to be stored
                move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
                echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
                echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "<b>Path: </b><span>www.mediasnoop.eu/graham-murray/blog/ajax-upload/uploaded/".$folderYear."/".$folderDate."/</span>" . $_FILES["file"]["name"] . "";
                echo "<br>";
                echo "<br>";
                echo "<span>Javascript & PHP Code written by Graham Murray &copy; www.graham-murray.com</span>";
				#echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>"; Removed as its a security risk
            }
        }
    } else {
        echo "<span id='invalid'>***Invalid file Size or Type Max file file 300kB***<span>";
    }
}

?>

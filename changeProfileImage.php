<?php

include 'header.php';
require 'islogged.php';

if(isset($_POST['id'])){
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["getFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $id = $_POST['id'];
    $myFile = "$target_dir/$id.jpg";

// Check if file already exists and delete if true (not ready yet)
    if (file_exists($target_file)) {
        unlink($myFile) or die("Couldn't delete file");
    }

// Check file size
    if ($_FILES["getFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" ) {
        echo "Sorry, only JPG files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        exit();
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["getFile"]["tmp_name"], $myFile)) {
            echo "The file ". basename( $_FILES["getFile"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }
    header("Refresh: 0; url=profile.php");
} else {
    header('Location: index.php');
}
?>
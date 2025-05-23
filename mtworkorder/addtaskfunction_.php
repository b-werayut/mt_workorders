<?php
session_start();
include '../config/db.php';

if(isset($_POST['firstname'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $company = $_POST['company'];
    $status = $_POST['status'];
    $equipment = $_POST['equipment'];
    $date = $_POST['date'];
    $timezone = date('Y-m-d H:i:s',strtotime($date));
    $query = $conn->prepare(" INSERT INTO task (firstname, lastname, username, phonenumber, company, status, equipment, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
    $query->execute(array($firstname, $lastname, $username, $phonenumber, $company, $status, $equipment, $timezone));

    if(!$query){
        echo 0;
    }

    $filename = $_FILES["fileToUpload"]["name"];
    $tempname = $_FILES["fileToUpload"]["tmp_name"];
    $folder = "../media/uploads/" . $filename;

    // Get all the submitted data from the form
    $sql = "INSERT INTO media (filename) VALUES ('$filename')";

    // Execute query
    $query = $conn->query($sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        // echo "<h3>&nbsp; Image uploaded successfully!</h3>";
        echo 1;
    } else {
        // echo "<h3>&nbsp; Failed to upload image!</h3>";
        echo 2;
    }

  }

  // local upload //

  // $target_dir = "../media/uploads/";
  //   $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  //   $uploadOk = 1;
  //   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  //   // Check if image file is a actual image or fake image
  //   if(isset($_POST["submit"])) {
  //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  //     if($check !== false) {
  //       echo "File is an image - " . $check["mime"] . ".";
  //       $uploadOk = 1;
  //     } else {
  //       echo "File is not an image.";
  //       $uploadOk = 0;
  //     }
  //   }

  //   // Check if file already exists
  //   // if (file_exists($target_file)) {
  //   //   echo "Sorry, file already exists.";
  //   //   $uploadOk = 0;
  //   // }

  //   // Check file size
  //   if ($_FILES["fileToUpload"]["size"] > 500000) {
  //     echo "Sorry, your file is too large.";
  //     $uploadOk = 0;
  //   }

  //   // Allow certain file formats
  //   if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  //   && $imageFileType != "gif" ) {
  //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  //     $uploadOk = 0;
  //   }

  //   // Check if $uploadOk is set to 0 by an error
  //   if ($uploadOk == 0) {
  //     echo "Sorry, your file was not uploaded.";
  //   // if everything is ok, try to upload file
  //   } else {
  //     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
  //       $res = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

  //       if(isset($res)){
  //       echo 1;
  //       }

  //     } else {
  //       echo "Sorry, there was an error uploading your file.";
  //     }
  //   }

  // local upload //

  
$conn = null;

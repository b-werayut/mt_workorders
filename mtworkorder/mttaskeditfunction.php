<?php
session_start();
include '../config/db.php';


    if(isset($_POST['iduser'])){
        $idpost = $_POST['iduser'];
        $usernamepost = $_POST['username'];
        $phonenumberpost = $_POST['phonenumber'];
        $titlepost = $_POST['title'];
        $datepost = $_POST['date'];
        $equipmentpost = $_POST['equipment'];
        $subequipmentpost = $_POST['subequipment'];
        $notepost = $_POST['note'];
        
        
        $target_dir = "../media/uploads/";
        $extension = explode('.', $_FILES['fileToUpload']['name']);
        $new_name = rand(10000,50000) . '.' . $extension[1];
        $target_file = $target_dir . $new_name;
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // $target_file = $target_dir . uniqid() . basename($_FILES["fileToUpload"]["name"]);
        // $target_filedb = basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if($check !== false) {
              // echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            } else {
              // echo "File is not an image.";
              echo 2;
              $uploadOk = 0;
              exit;
            }

          // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
          
          // Check file size
          if ($_FILES["fileToUpload"]["size"] > 500000) {
            // echo "Sorry, your file is too large.";
            echo 3;
            $uploadOk = 0;
            exit;
          }

           // Check imgname character
           if(strlen($new_name) > 50){
            // echo "Your imagename is longer.";
            echo 4;
            $uploadOk = 0;
            exit;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo 5;
            $uploadOk = 0;
            exit;
          }
            
            $query = $conn->prepare(" UPDATE task SET title = ? , equipment = ?, subequipment = ?, note = ?, img = ? WHERE id = ? ");
            $query->execute(array($titlepost, $equipmentpost, $subequipmentpost, $notepost, $new_name, $idpost));

            if($query){
                
              // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              // echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              echo 6;
              exit;
            }else {    

              if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              $query2 = $conn->prepare(" SELECT img FROM task WHERE id=? ");
              $query2->execute(array($idpost));
              $resp = $query2->fetch(PDO:: FETCH_ASSOC);
              echo $new_name;

          }
        }
            }else {
                echo 0;
            }
          }

    
$conn = null;
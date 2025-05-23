<?php
session_start();
include '../config/db.php';

if (isset($_POST['username'])){
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $title = $_POST['title'];
    $dateval = new DateTime(strtotime($_POST['date'], date_default_timezone_set("Asia/Bangkok")));
    $datevalf = $dateval->format("Y-m-d H:i:s");
    $equipment = $_POST['equipment'];
    $subequipment = $_POST['subequipment'];
    $note = $_POST['note'];
    $statustask = 1;
    
    $target_dir = "../media/uploads/";
    $extension = explode('.', $_FILES['fileToUpload']['name']);
    $new_name = rand(10000,50000) . '.' . $extension[1];
    $target_file = $target_dir . $new_name;
    // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    // $target_file = $target_dir . uniqid() . basename($_FILES["fileToUpload"]["name"]);
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
            // if (file_exists($target_file)) {
            //     echo "Sorry, file already exists.";
            //     $uploadOk = 0;
            // }
          
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
            
            $query = $conn->prepare(" INSERT INTO task (username, phonenumber, title, status, equipment, subequipment, date, note, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ");
            $query->execute(array($username, $phonenumber, $title, $statustask, $equipment, $subequipment, $datevalf, $note, trim($new_name)));

            if($query){

                // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
                echo 6;
                exit;
            }else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
              echo 1;
            }
            }
            }else {
              echo 0;
            }
          }

    //Send task start
    // if (isset($_POST['id'])){
    //     $id = $_POST['id'];
    //     $id = base64_decode($_POST['id']);
    //     $query =  $conn->prepare(" UPDATE task SET status='2' WHERE id = ? ");
    //     $query->execute(array($id));

    //     if($query){
    //         echo 8;
    //     }
       
    //  }
    

     if (isset($_POST['idtask'])){
      $id = $_POST['idtask'];
      $ide = base64_decode($id);
      $query =  $conn->prepare(" UPDATE task SET status='2' WHERE id = ? ");
      $query->execute(array($ide));

      if($query){
        $stmt = $conn->prepare(" SELECT * FROM task WHERE id = ?");
        $stmt->execute(array($ide));
        $resp = $stmt->fetch(PDO:: FETCH_ASSOC);
        $titles = $resp['title'];
        $equipments = $resp['equipment'];
        $subequipments = $resp['subequipment'];
        $img = $resp['img'];
        $dat = $resp['date'];
        $datedb = new DateTime($dat);
        $buddhistYear = date('Y') + 543;
        $thaiMonthName = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
        $thaiDayName = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤษหัสบดี', 'ศุกร์', 'เสาร์'];
        $month = $thaiMonthName[date('m')-1];
        $week = date('w');
        $datedbformat = $datedb -> format("d {$month} {$buddhistYear}");
        $datedbformat2 = $datedb -> format('H:i:s');
        $datf = $thaiDayName[$week].' ที่ '.$datedbformat; 
        $timef = ' เวลา '.$datedbformat2;

        $sToken = "xzxu9c1wo776yXczI73dmtC3X4OtjkkJOR4cdzooCkI";
        $sMessage = "\n";
        $sMessage .= "แจ้งเตือนรายการใบแจ้งซ่อม\r\n";
        $sMessage .= "วัน: ".$datf."\n";
        $sMessage .= "เวลา: ".$timef."\n";
        $sMessage .= "รหัสใบแจ้งซ่อม: ".$id."\n";
        $sMessage .= "เรื่อง: ".$titles."\n";
        $sMessage .= "หมวดอุปกรณ์: ".$equipments."\n";
        $sMessage .= "ประเภทอุปกรณ์: ".$subequipments;
        // $imageFile = new CURLFILE('./media/uploads/789.jpg');
        $sticker_package_id = '2';  // Package ID sticker
		    $sticker_id = '34'; 

        $data =  [
            'message' => $sMessage,
            'stickerPackageId' => $sticker_package_id,
    		    'stickerId' => $sticker_id
            // ,'imageFile' => $imageFile
          ];

        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data); 
        $headers = array( 'Content-type: multipart/form-data', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        //Result error 
        if(curl_error($chOne)) 
        { 
          echo 'error:' . curl_error($chOne); 
        } 
        else { 
          $result_ = json_decode($result, true); 
          // echo "status : ".$result_['status']; echo "message : ". $result_['message'];
        } 
        curl_close( $chOne );

          echo 8;
      }
      }
  //Send task end


  //onchange update db function start
  if(isset($_POST['idchange'])){
    
    $idchange = base64_decode($_POST['idchange']);
    $title = $_POST['title'];
    $querychange = $conn->prepare(" UPDATE task SET title = '$title' WHERE id = ? ");
    $querychange->execute(array($idchange));

    if($querychange){
        echo $title;
    }

  }
  //onchange update db function end



$conn = null;

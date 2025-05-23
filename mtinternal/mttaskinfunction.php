<?php 

include_once '../config/db.php';

//infoview function start
try{
if(isset($_POST['id'])){
    $idselect = base64_decode($_POST['id']);
    $query = $conn->prepare(" SELECT * FROM task WHERE id = ? ");
    $query->execute(array($idselect));
    $res = $query->fetch(PDO:: FETCH_ASSOC);
    $datedb = $res['date'];

      $datedb = $res['date'];
      $datedb = new DateTime($datedb);
      $years = date('Y')+ 543;
      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
      $days =  $week[date('w')];
      // $thmonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
      $months = $thmonth[date('m')-1];
      $datenew = $datedb->format("{$days} j {$months} {$years} : H:i น.");
    
      $resp = [
        "id" => 71,
        "username" => $res['username'],
        "phonenumber" => $res['phonenumber'],
        "title" => $res['title'],
        "status" => $res['status'],
        "equipment" => $res['equipment'],
        "subequipment" => $res['subequipment'],
        "date" => $datenew,
        "note" => $res['note'],
        "img" => $res['img']
      ];

    echo json_encode($resp);

}
}catch(PDOExeption $e){
    echo "Somithing wentwrong : ".$e->getMessage();
}
//infoview function end

//accept function start
if(isset($_POST['idtaskaccept'])){

  $idtaskaccept = base64_decode($_POST['idtaskaccept']);
  $queryaccept = $conn->prepare(" UPDATE task SET status = 5 WHERE id = ? ");
  $queryaccept->execute(array($idtaskaccept));
  
  if($queryaccept){
    echo 5;
  }

}
//accept function start

//reject function start
if(isset($_POST['idtaskreject'])){
    $idtaskreject = base64_decode($_POST['idtaskreject']);
    $queryreject = $conn->prepare(" UPDATE task SET status = 8 WHERE id = ? ");
    $queryreject->execute(array($idtaskreject));

    if($queryreject){
      echo 6;
    }
}
//reject function end

//success function start
if(isset($_POST['idsuccess'])){
   $idsuccess = base64_decode($_POST['idsuccess']);
   $querysuccess = $conn->prepare(" UPDATE task SET status = '10' WHERE id = ? ");
   $querysuccess->execute(array($idsuccess));

   if($querysuccess){
      echo 10;
   }
}
//success function end



$conn = null;
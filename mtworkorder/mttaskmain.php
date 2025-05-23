<?php 
session_start();
include '../config/db.php';

// if(!isset($_SESSION['username'])){
//   header("location: index.php");
// }

?>

<!DOCTYPE html><!--
* CoreUI PRO Bootstrap Admin Template
* @version v5.1.0
* @link https://coreui.io/product/bootstrap-dashboard-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license/)
-->
<html lang="en">
  <head>
    <base href="../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,SCSS,HTML,RWD,Dashboard">
    <title>MT Service Main</title>
    <link rel="manifest" href="./assets/favicon/manifest.json">
    <link rel="stylesheet" href="./css/css.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico"/>
    <!-- Vendors styles-->
    <link rel="stylesheet" href="./vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="./css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="./css/examples.css" rel="stylesheet">
    <script src="./js/config.js"></script>
    <script src="./js/color-modes.js"></script>
    <link href="./vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/sweetalert2.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="./css/dataTables.min.css"/>
    <link rel="stylesheet" href="./css/tempus-dominus.min.css"/>
    <link rel="stylesheet" href="./css/font/kanit.css"/>
  </head>
  <style>
    .cardhover{
      transition: transform .2s;
    }
    .cardbodyh{
      transition: transform .2s;
    }
    .cardhover:hover{
      transform: scale(1.1);
      z-index: 999;
    }
    .card-bodyh:hover{
      background-color: #F5F5F5;
    }
    .opac{
      opacity: 0.6;
      transition: transform .2s;
    }
    .opac:hover{
      opacity: 1;
    }
    
    .labeladdtask{
    transform: translateY(-50%) scale(.9);
    margin: 0em;
    margin-left: 1.3em;
    padding: 0.4em;
    padding-bottom: 0px;
    background-color: white;
    /* color: rgb(150, 150, 200); */ /*Original Color*/
    color: white;
    top: -13;
    }
  
    .custom-file-button input[type=file] {
  margin-left: -2px !important;
}
.custom-file-button input[type=file]::-webkit-file-upload-button {
  display: none;
}
.custom-file-button input[type=file]::file-selector-button {
  display: none;
}
.custom-file-button:hover label {
  background-color: #dde0e3;
  cursor: pointer;
}
  </style>
  <body>
  <?php include 'menu-sidebar.php'; ?>


    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include 'header.php'; ?>

      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold" data-coreui-i18n="หน้าหลัก">หน้าหลัก</div>
          <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active"><a style="text-decoration: none; color: black;" href="./mtworkorder/mttask.php" data-coreui-i18n="Task table">Task table</a>
              </li>
              <li class="breadcrumb-item avtive"><a style="" href="./mtworkorder/mttaskedit.php" data-coreui-i18n="Edit">Edit</a>
              </li>
            </ol>
          </nav> -->

        <div class="container">
        <div class="row">
              <div class="card mb-4">
                <div class="card-body p-4 col-12">
                  <div class="row m-0 p-0">
                    <div class="col">
                      <!-- <div class="card-title fs-4 fw-semibold" data-coreui-i18n="Service task">Service task</div>
                      <div class="card-subtitle text-body-secondary mb-4" data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered users</div>
                    </div> -->
                    <!-- <div class="col-auto ms-auto">
                      <button class="btn btn-secondary bt-shadow-hover" onclick="location.href='./mtworkorder/mttaskadd.php'" id="addtask">
                        <svg class="icon me-2">
                        <use xlink:href="/backend/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                        </svg><span class="fw-bold" data-coreui-i18n="Add Task">Add Task</span>
                      </button>
                    </div> -->
                
      

      <div class="card-deck text-center m-0 p-0 d-flex align-items-center justify-content-center" style="flex-wrap: wrap;">
        <div class="card cardhover my-4 box-shadow col-md-3 opac" data-bs-toggle="modal" data-bs-target="#addtaskmodal" style="border-radius: 0px 0px 0px 0px; cursor: pointer;">
          <div class="card-header" style="border-radius: 0;">
            <h5 class="my-0 ">สร้าง</h5>
          </div>
          <div class="card-body card-bodyh" style="cursor: pointer;">
            <!-- <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1> -->
             <div class="div">
            <img src="./assets/img/create.png" width="130" alt="" class="mb-3">
            </div>
            <!-- <ul class="list-unstyled mt-3 mb-4 ">
              <li>10 users included</li>
              <li>2 GB of storage</li>
              <li>Email support</li>
              <li>Help center access</li>
            </ul> -->
            <button type="button" class="btn btn-lg btn-block btn-outline-primary fs-6" data-bs-toggle="modal" data-bs-target="#addtaskmodal">สร้างใบแจ้งซ่อม</button>
          </div>
        </div>
        <div class="card cardhover my-4 box-shadow col-md-3 opac" style="border-radius: 0; cursor: pointer;" onclick="showtask()" >
          <div class="card-header" style="border-radius: 0;">
            <h5 class="my-0 ">ใบแจ้งซ่อมที่รอการอณุมัติ</h5>
          </div>
          <div class="card-body card-bodyh" style="cursor: pointer;">
            <div class="div">
          <img src="./assets/img/wait.png" width="130" alt="" class="mb-3">
          </div>
            <!-- <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 users included</li>
              <li>10 GB of storage</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul> -->
            <?php 
            $querydb = $conn->query(" SELECT count(status) FROM task WHERE status LIKE '2' ");
            $crows = $querydb->fetchColumn();
            ?>
            <button type="button" id="showtaskbutton" class="btn btn-lg btn-block btn-outline-primary fs-6">มีจำนวณ( <?= ' '.$crows.' ใบ'; ?> )</button>
          </div>
        </div>
        <div class="card cardhover my-4 box-shadow col-md-3 opac" style="border-radius: 0; cursor: pointer;" onclick="showtask1()" >
          <div class="card-header" style="border-radius: 0;">
            <h5 class="my-0 ">ใบแจ้งซ่อมที่กำลังดำเนินการ</h5>
          </div>
          <div class="card-body card-bodyh" style="cursor: pointer;">
            <div class="div">
          <img src="./assets/img/process.png" width="130" alt="" class="mb-3">
          </div>
            <!-- <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>20 users included</li>
              <li>10 GB of storage</li>
              <li>Priority email support</li>
              <li>Help center access</li>
            </ul> -->
            <?php 
            $querydb = $conn->query(" SELECT count(status) FROM task WHERE status LIKE '5' ");
            $rows = $querydb->fetchColumn();
            ?>
            <button type="button" id="showtaskbutton" class="btn btn-lg btn-block btn-outline-primary fs-6">มีจำนวณ( <?= ' '.$rows.' ใบ'; ?> )</button>
          </div>
        </div>
        <div class="card cardhover my-4 box-shadow col-md-3 opac" style="border-radius: 0px 0px 0px 0px; cursor: pointer;" onclick="showtask2()" >
          <div class="card-header" style="border-radius: 0;">
            <h5 class="my-0 ">ใบแจ้งซ่อมที่เสร็จแล้ว</h5>
          </div>
          <div class="card-body card-bodyh" style="cursor: pointer;">
          <div class="div">
          <img src="./assets/img/success.png" width="130" alt="" class="mb-3">
          </div>
            <!-- <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
            <ul class="list-unstyled mt-3 mb-4">
              <li>30 users included</li>
              <li>15 GB of storage</li>
              <li>Phone and email support</li>
              <li>Help center access</li>
            </ul> -->
            <?php 
              $query = $conn->query(" SELECT count(status) FROM task WHERE status LIKE '10' ");
              $count = $query->fetchColumn();
            ?>
            <button type="button" id="showdata" class="btn btn-lg btn-block btn-outline-primary fs-6">มีจำนวณ( <?= ' '.$count.' ใบ'; ?> )</button>
          </div>
        </div>

                </div>
            </div>
            </div>
            </div>


            <!-- dbtable start -->
<div class="row dbtable0" style="display: none;">
            <div class="col-xl-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-title fs-4 fw-semibold">ใบแจ้งซ่อมที่รอการอณุมัติ</div>
                      <!-- <div class="card-subtitle text-body-secondary mb-4" data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered users</div> -->
                    </div>
                    <div class="col-auto ms-auto">
                      <button class="btn btn-secondary bt-shadow-hover" id="closetask">
                        <!-- <use xlink:href="/backend/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use> -->
                        <span class="fw-bold text-uppercase" data-coreui-i18n="X">X</span>
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive" style="padding-bottom: 5rem;">
                  <table class="table table-hover table-striped table-bordered" id="data0" >
                  <thead>
    <tr>
      <!-- <th scope="col"><svg class="icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use></svg></th> -->
      <!-- <th scope="col">Num</th> -->
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <!-- <th scope="col" style="text-align: left;" >Phonenumber</th> -->
      <th scope="col" class="text-center">Status</th>
      <th scope="col">Equipment</th>
      <th scope="col">Subequipment</th>
      <th scope="col">Date/Time</th>
      <!-- <th scope="col" class="text-center">Send</th> -->
      <th scope="col" class="d-none" >Tool</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $query = $conn->query(" SELECT * FROM task WHERE status LIKE '2' ");
    $numrows = 0;
    while($rows = $query->fetch(PDO:: FETCH_ASSOC)){
        $id = $rows['id'];
        $username = $rows['username'];
        $phonenumber = $rows['phonenumber'];
        $status = $rows['status'];
        $equipment = $rows['equipment'];
        $subequipment = $rows['subequipment'];
        $date = $rows['date'];
        $idenc = base64_encode($id)??NULL;
        $numrows++;

?>
      <tr>
      <!-- <th scope="row"><?php //echo $i; ?></th> -->
      <!-- <td style="text-align: center;"><?php //echo $numrows; ?></td> -->
      <td style="text-align: center;"><?php echo $rows['id']; ?></td>
      <td><?php echo $username; ?></td>
      <!-- <td style="text-align: left;" ><?php //echo $phonenumber; ?></td> -->
      <td class="text-center" id="statustable" >
      <?php 
      if($status == 10){ 
        echo "<div style=\"font-size: 11px; cursor: default;\" class=\"badge bg-success-gradient\">เสร็จสิ้น</div>";
      }else if($status == 1){
        echo "<div style=\"cursor: default;\" class=\"badge bg-dark-gradient\">สร้าง</div>";
      }else if($status == 2){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-dark-gradient\">รออณุมัติ</div>";
      }else if($status == 5){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-warning-gradient\">กำลังดำเนินการซ่อม</div>";
      }else if($status == 8){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-danger-gradient\">ยกเลิก</div>";
      }
      ?>
      </td>
      <td><?php echo $equipment; ?></td>
      <td><?php echo $subequipment; ?></td>
      <td>
      <?php 
      date_default_timezone_set("Asia/Bangkok");
      $date = new DateTime($date);
      $years = date('Y')+ 543;
      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
      $days =  $week[date('w')];
      // $thmonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
      $months = $thmonth[date('m')-1];
      $datenew1 = $date->format("{$days} j {$months} {$years} : H:i น.");
      echo $datenew1;
      ?>
      </td>
      <!-- <td class="text-center">
        <div>
        <button class="btn btn-outline-success btn-sm" onclick="sendTask('<?php //$idenc; ?>')">SEND</button>
        </div>
      </td> -->
      <td class="d-none" >
        <div class="dropdown">
              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><button class="dropdown-item d-none" href="#" data-bs-toggle="modal" data-bs-target="#infomodal" onclick="infoview('<?= $idenc; ?>')" >Info</button><form action="mtworkorder/mttaskedit.php" method="POST" ><button class="dropdown-item" type="submit" name="id" value="<?php echo $idenc;?>">Edit</button></form><a class="dropdown-item" href="./mtworkorder/report.php" target="blank" data-coreui-i18n="Report">Report</a><button class="dropdown-item text-danger" href="#" onclick="deletetask()" data-coreui-i18n="delete">Delete</button></div>
        </div>
      </td>                      
    </tr>
          
      <?php } ?>
  </tbody>
</table>
                </div>
              </div>
            </div>
          </div>
          </div>
<!-- dbtable end -->

            <!-- dbtable start -->
<div class="row dbtable" style="display: none;">
            <div class="col-xl-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-title fs-4 fw-semibold" data-coreui-i18n="ใบแจ้งซ่อมที่กำลังดำเนินการ">ใบแจ้งซ่อมที่กำลังดำเนินการ</div>
                      <!-- <div class="card-subtitle text-body-secondary mb-4" data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered users</div> -->
                    </div>
                    <div class="col-auto ms-auto">
                      <button class="btn btn-secondary bt-shadow-hover" id="closetask1">
                        <!-- <use xlink:href="/backend/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use> -->
                        <span class="fw-bold text-uppercase" data-coreui-i18n="X">X</span>
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive" style="padding-bottom: 5rem;">
                  <table class="table table-hover table-striped table-bordered" id="data" >
                  <thead>
    <tr>
      <!-- <th scope="col"><svg class="icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use></svg></th> -->
      <!-- <th scope="col">Num</th> -->
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <!-- <th scope="col" style="text-align: left;" >Phonenumber</th> -->
      <th scope="col" class="text-center">Status</th>
      <th scope="col">Equipment</th>
      <th scope="col">Subequipment</th>
      <th scope="col">Date/Time</th>
      <!-- <th scope="col" class="text-center">Send</th> -->
      <th scope="col" class="d-none" >Tool</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $query = $conn->query(" SELECT * FROM task WHERE status LIKE '5' ");
    $numrows = 0;
    while($rows = $query->fetch(PDO:: FETCH_ASSOC)){
        $id = $rows['id'];
        $username = $rows['username'];
        $phonenumber = $rows['phonenumber'];
        $status = $rows['status'];
        $equipment = $rows['equipment'];
        $subequipment = $rows['subequipment'];
        $date = $rows['date'];
        $idenc = base64_encode($id)??NULL;
        $numrows++;

?>
      <tr>
      <!-- <th scope="row"><?php //echo $i; ?></th> -->
      <!-- <td style="text-align: center;"><?php //echo $numrows; ?></td> -->
      <td style="text-align: center;"><?php echo $rows['id']; ?></td>
      <td><?php echo $username; ?></td>
      <!-- <td style="text-align: left;" ><?php //echo $phonenumber; ?></td> -->
      <td class="text-center" id="statustable" >
      <?php 
      if($status == 10){ 
        echo "<div style=\"font-size: 11px; cursor: default;\" class=\"badge bg-success-gradient\">เสร็จสิ้น</div>";
      }else if($status == 1){
        echo "<div style=\"cursor: default;\" class=\"badge bg-dark-gradient\">สร้าง</div>";
      }else if($status == 2){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-dark-gradient\">รออณุมัติ</div>";
      }else if($status == 5){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-warning-gradient\">กำลังดำเนินการซ่อม</div>";
      }else if($status == 8){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-danger-gradient\">ยกเลิก</div>";
      }
      ?>
      </td>
      <td><?php echo $equipment; ?></td>
      <td><?php echo $subequipment; ?></td>
      <td>
      <?php 
      date_default_timezone_set("Asia/Bangkok");
      $date = new DateTime($date);
      $years = date('Y')+ 543;
      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
      $days =  $week[date('w')];
      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
      $months = $thmonth[date('m')-1];
      $datenew2 = $date->format("{$days} j {$months} {$years} : H:i น.");
      echo $datenew2;
      ?>
      </td>
      <!-- <td class="text-center">
        <div>
        <button class="btn btn-outline-success btn-sm" onclick="sendTask('<?php //$idenc; ?>')">SEND</button>
        </div>
      </td> -->
      <td class="d-none" >
        <div class="dropdown">
              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><button class="dropdown-item d-none" href="#" data-bs-toggle="modal" data-bs-target="#infomodal" onclick="infoview('<?= $idenc; ?>')" >Info</button><form action="mtworkorder/mttaskedit.php" method="POST" ><button class="dropdown-item" type="submit" name="id" value="<?php echo $idenc;?>">Edit</button></form><a class="dropdown-item" href="./mtworkorder/report.php" target="blank" data-coreui-i18n="Report">Report</a><button class="dropdown-item text-danger" href="#" onclick="deletetask()" data-coreui-i18n="delete">Delete</button></div>
        </div>
      </td>                      
    </tr>
          
      <?php } ?>
  </tbody>
</table>
                </div>
              </div>
            </div>
          </div>
          </div>
<!-- dbtable end -->

 
 <!-- dbtable start -->
 <div class="row showdata" style="display: none;">
            <div class="col-xl-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-title fs-4 fw-semibold" data-coreui-i18n="ใบแจ้งซ่อมที่เสร็จแล้ว">ใบแจ้งซ่อมที่เสร็จแล้ว</div>
                      <!-- <div class="card-subtitle text-body-secondary mb-4" data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered users</div> -->
                    </div>
                    <div class="col-auto ms-auto">
                      <button class="btn btn-secondary bt-shadow-hover" id="closetask2">
                        <!-- <use xlink:href="/backend/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use> -->
                        <span class="fw-bold text-uppercase" data-coreui-i18n="X">X</span>
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive" style="padding-bottom: 5rem;">
                  <table class="table table-hover table-striped table-bordered" id="data2" >
                  <thead>
    <tr>
      <!-- <th scope="col"><svg class="icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use></svg></th> -->
      <!-- <th scope="col">Num</th> -->
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <!-- <th scope="col" style="text-align: left;" >Phonenumber</th> -->
      <th scope="col" class="text-center">Status</th>
      <th scope="col">Equipment</th>
      <th scope="col">Subequipment</th>
      <th scope="col">Date/Time</th>
      <th scope="col" class="d-none" >Tool</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $query = $conn->query(" SELECT * FROM task WHERE status LIKE '10' ");
    $numrow2 = 0;
    while($rows = $query->fetch(PDO:: FETCH_ASSOC)){
        $id = $rows['id'];
        $username = $rows['username'];
        $phonenumber = $rows['phonenumber'];
        $status = $rows['status'];
        $equipment = $rows['equipment'];
        $subequipment = $rows['subequipment'];
        $date = $rows['date'];
        $idenc = base64_encode($id)??NULL;
        $numrow2++;

?>
      <tr>
      <!-- <th scope="row"><?php //echo $i; ?></th> -->
      <!-- <td style="text-align: center;"><?php //echo $numrow2; ?></td> -->
      <td style="text-align: center;"><?php echo $rows['id']; ?></td>
      <td><?php echo $username; ?></td>
      <!-- <td style="text-align: left;" ><?php //echo $phonenumber; ?></td> -->
      <td class="text-center" id="statustable" >
      <?php 
      if($status == 10){ 
        echo "<div style=\"font-size: 11px; cursor: default;\" class=\"badge bg-success-gradient\">เสร็จสิ้น</div>";
      }else if($status == 1){
        echo "<div style=\"cursor: default;\" class=\"badge bg-dark-gradient\">สร้าง</div>";
      }else if($status == 2){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-dark-gradient\">รออณุมัติ</div>";
      }else if($status == 5){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-warning-gradient\">กำลังดำเนินการซ่อม</div>";
      }else if($status == 8){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-danger-gradient\">ยกเลิก</div>";
      }
      ?>
      </td>
      <td><?php echo $equipment; ?></td>
      <td><?php echo $subequipment; ?></td>
      <td>
      <?php 
      date_default_timezone_set("Asia/Bangkok");
      $date = new DateTime($date);
      $years = date('Y')+ 543;
      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
      $days =  $week[date('w')];
      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
      $months = $thmonth[date('m')-1];
      $datenew3 = $date->format("{$days} j {$months} {$years} : H:i น.");
      echo $datenew3;
      ?>
      </td>
      <td class="d-none" >
        <div class="dropdown">
              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end"><button class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#infomodal" onclick="infoview('<?= $idenc; ?>')" >Info</button><form action="mtworkorder/mttaskedit.php" method="POST" ><button class="dropdown-item" type="submit" name="id" value="<?php echo $idenc;?>">Edit</button></form><a class="dropdown-item" href="./mtworkorder/report.php" target="blank" data-coreui-i18n="Report">Report</a><button class="dropdown-item text-danger" href="#" onclick="deletetask()" data-coreui-i18n="delete">Delete</button></div>
        </div>
      </td>                      
    </tr>
          
      <?php } ?>
  </tbody>
</table>
                </div>
              </div>
            </div>
          </div>
<!-- dbtable end -->
                  </div>
                  <?php include 'footer.php'; ?>
              
<!-- Modal info start-->
<div class="modal fade" id="infomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #2b3245;">
        <h5 class="modal-title text-center fw-bold w-100 text-white text-uppercase" id="exampleModalLabel"><?= $company; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <img  style="width: 100%;" id="infoimg" src="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- Modal info end-->

<!-- Modal addtask start-->
<div class="modal fade" id="addtaskmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="background-color: #2b3245; ">
    <div class="modal-header text-center " style="background-color: #2b3245; ">
        <h5 class="modal-title col text-uppercase h4 fw-medium" id="exampleModalLabel" style="color: white;" >สร้างใบแจ้งซ่อม</h5>
        <button type="button" class="btn-close btn-warning" style="color: black;" id="closeaddtaskmodal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    <div class="card shadow-2-strong card-registration" style="background-color: #f3f3f3; border-radius: 0px 0px 5px 5px;">
          <div class="card-body p-4 mt-3">
            <!-- submit -->
            <form id="submitform" enctype="multipart/form-data">
          <div class="row">

          <div class="col-md-6 col-sm-12 pb-4">
              <div class="inputGroupedit">
                    <input type="text" required="" id="username" name="username" value="<?= $_SESSION['username']; ?>" class="form-control-lg"   readonly style="background-color: #e7e7e7cc;" />
                    <label class="labeladdtask" for="username" style="background-color: transparent;">Username</label>
              </div>
          </div>

          <div class="col-md-6 col-sm-12 pb-2">
          <div class="inputGroupedit">
              <input type="text" required="" id="phonenumber" name="phonenumber" value="<?= $_SESSION['telephonenumber']; ?>" class="form-control-lg "  readonly style="background-color: #e7e7e7cc;"/>
              <label class="labeladdtask" for="phonenumber" style="background-color: transparent;" >เบอร์โทรติดต่อ</label>
            </div>
          </div>
          </div>

          <!-- Text input -->

          <div class="row mb-2">
          <div class="col-md-12 ">
              <div class="inputGroupedit2 inputGroupedit">
                    <input type="text" required="" id="title" name="title" value="" class="form-control-lg" />
                    <label for="title" style="top: 6px" >หัวเรื่อง</label>
              </div>
          </div>

          <!-- <div class="col">
            <div class="inputGroupedit">
                <input type="text" required="" id="companyname" name="companyname" value="" class="form-control-lg" />
                <label for="company" >ชื่อบริษัท</label>
              </div>
          </div> -->
          </div>
            
            <div class="col-md-12 col-sm-12  p-4 mb-3" style="background-color: #47587a; border-radius: 10px">

                <div class="row">
                <div class="col-md-4 col-sm-12 py-2">
                <div class=" col-md-12 col-sm-12 text-center ">
                <h6 class="text-uppercase text-black fw-bold text-white">วันและเวลาที่แจ้งซ่อม </h6>
                </div>  
                <div class="input-group w-100">
                      <?php 
                      date_default_timezone_set("Asia/Bangkok");
                      $date = new DateTime();
                      $years = date('Y')+ 543;
                      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
                      $days =  $week[date('w')];
                      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                      $months = $thmonth[date('m')-1];
                      $dates = $date->format("{$days} j {$months} {$years} : H:i:s น.");
                      ?>
                      <input type="text" placeholder="กรุณาเลือกวันที่แจ้งซ่อม" id="datetimepicker1" name="date" value="<?= $dates ?>" class="form-control " readonly style="background-color: white; font-size: 13px;"/>
                      <div class="input-group-text" style="padding: 10px"><i class="fa fa-calendar text-secondary"></i></div>
                    </div>
            </div> 

            <div class="col-md-4 col-sm-12 py-2">
            <div class=" col-md-12 col-sm-12 text-center">
            <h6 class="text-uppercase text-black fw-bold text-white">หมวดอุปกรณ์ </h6>
            </div>
            <div class="input-group">
                    <select style="cursor: pointer;" id="equipment" name="equipment" class="form-select w-100" aria-label="form-select-sm example" aria-label="Default select example">
                          <option value="1">กรุณาเลือกหมวดอุปกรณ์</option>
                          <?php
                          $query = $conn->prepare(" SELECT id,equipment FROM equipment ");
                          $query->execute();
                          while($res = $query->fetch(PDO:: FETCH_ASSOC)){
                          ?>
                          <option value="<?php echo $res['equipment']; ?>"><?php echo $res['equipment']; ?></option>
                          <?php } ?>
                    </select>
                    </div>
            </div>

            <div class="col-md-4 col-sm-12 py-2">
            <div class=" col-md-12 text-center">
            <h6 class="text-uppercase text-black fw-bold text-white">ประเภทอุปกรณ์ </h6>
            </div>
            <div class="input-group">
                    <select style="cursor: pointer;" id="subequipment" name="subequipment" class="form-select w-100" aria-label="form-select-sm example" aria-label="Default select example" disabled>
                          <option value="1">กรุณาเลือกประเภทอุปกรณ์</option>
                          <?php
                          $query = $conn->prepare(" SELECT id,equipment FROM equipment ");
                          $query->execute();
                          while($res = $query->fetch(PDO:: FETCH_ASSOC)){
                          ?>
                          <option value="<?php echo $res['equipment']; ?>"><?php echo $res['equipment']; ?></option>
                          <?php } ?>
                    </select>
                    </div>
                    <div class="py-2 d-flex justify-content-center align-items-center col-12 ">
                    <span style="height: 10px;" id="equipmentstatus"></span>
                    </div>
            </div>
            </div>
            

          <div class="col-md-12 col-sm-12 mb-2 py-2">
          <textarea required="" class="w-100" id="note" name="note" rows="4" placeholder="หมายเหตุ" style="border-radius: 8px; text-indent: 10px;"></textarea>
          <!-- <label class="form-label" for="form6Example7">หมายเหตุ</label> -->
          </div>
          </div>

          <div class="col-md-12 mb-2 py-2 text-center bg-white w-100">

            <div class="file-uploader py-2" style="cursor: pointer;">
            <label name="upload-label" class="upload-img-btn">
            <input type="file" class="form-control imgchange" name="fileToUpload" style="display:none; cursor: pointer;" />
            <img class="preview-1" src="./assets/img/file-upload.png" style="width:150px!important;  cursor: pointer;" />
            <div>
            <span class="" for=""  style="cursor: pointer;">กรุณาเลือกไฟล์ภาพ</span>
            </div>
            </label>
            
            </div>

             </div>


              <div class="row align-items-center justify-content-center pb-3">
              <div class="col-6 text-center">
                <input data-mdb-ripple-init class="btn btn-secondary  bt-shadow-hover mx-2 mb-2" type="reset" value="Clear" />
                <input data-mdb-ripple-init class="btn btn-success bt-shadow-hover sub mb-2" type="submit" value="Add task"></input>
              </div>
              </div>
              
              </form>

              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
          </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- Modal addtask end-->




    <!-- CoreUI and necessary plugins-->
    <script src="./vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="./vendors/simplebar/js/simplebar.min.js"></script>
    <script src="./vendors/i18next/js/i18next.min.js"></script>
    <script src="./vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
    <script src="./vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
    <script src="./js/i18next.js"></script>
    <!-- <script src="./js/calendar-dashboard.js"></script> -->
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <!-- Plugins and scripts required by this view-->
    <!-- <script src="./vendors/chart.js/js/chart.umd.js"></script> -->
    <script src="./vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="./vendors/@coreui/utils/js/index.js"></script>
    <!-- <script src="./js/main.js"></script> -->
    <script src="./js/date-time-picker.js"></script>
    <!-- Popperjs -->
    <script src="./js/popper.min.js"></script>
    <!-- Tempus Dominus JavaScript -->
    <script src="./js/tempus-dominus.min.js"></script>
    <!-- Tempus Dominus Styles -->


    <!-- js -->
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/ajax-jquery.min.js"></script>
    <script src="./js/dataTables.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

  </body>
</html>

<script type="text/javascript">

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                $('.preview-1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    } 
    
$(".imgchange").change(function(){
    readURL(this);
});

function equipmentStatus(){
  let equipment = $('#equipment');
  let subequipment = $('#subequipment');
  let equipmentstatus = $('#equipmentstatus');

  equipmentstatus.text('กรุณาเลือกหมวดอุปกรณ์');
  equipmentstatus.css('color','red');

  equipment.change(()=>{
    if(equipment.val() == 1 ){
      equipmentstatus.text('กรุณาเลือกหมวดอุปกรณ์ก่อน');
      equipmentstatus.css('color','red');
    }else{
      equipmentstatus.text("");
    }
  })
}
equipmentStatus()

$('#equipment').change(()=>{
let subequipment = $('#subequipment');

if($('#equipment').val() == 1){
  subequipment.attr('disabled', true);
  subequipment.val('1');
}else{
  subequipment.attr('disabled', false)

}

})

function sendTask(id){
// $("#sendtask").click((e)=>{
  event.preventDefault();
  Swal.fire({
    title: "กำลังส่งใบแจ้งซ่อม",
    // html: "I will close in <b></b> milliseconds.",
    didOpen: () => {
    Swal.showLoading();
  }
  })
  $.ajax({
        url: './mtworkorder/mttaskaddfunction.php',
        type: 'POST',
        data: 'id='+id,
        success: (resp)=>{
          if(resp == 8){
          setTimeout(()=>{
            Swal.fire({
          text: "ส่งใบแจ้งซ่อมสำเร็จ !",
          icon: "success",
          showConfirmButton: false,
          confirmButtonColor: "#51cc8a",
          });
          },1500)
        }
        }
      })
    setTimeout(()=>{
      window.location.reload();
    },2500);
  }


$('#submitform').submit(function (e){
  e.preventDefault();
  let equipment = $('#equipment');
  let subequipment = $('#subequipment');

  if(subequipment.val() == 1 || equipment.val() == 1){
    swal.fire({ 
          title: 'โปรดใส่ประเภทอุปกรณ์ให้ครบ',
          icon: 'warning',
          showConfirmButton: false
        });
    exit;
  }else{
    Swal.fire({
    title: "กำลังสร้างใบแจ้งซ่อม",
    // html: "I will close in <b></b> milliseconds.",
    didOpen: () => {
    Swal.showLoading();
  }
  })
    $.ajax({
      url: './mtworkorder/mttaskaddfunction.php',
      type: 'POST',
      data: new FormData(this),
      dataType: false,
      contentType: false,
      cache: false,
      processData: false,
      success: (res)=>{
        if(res == 1){        
        setTimeout(()=>{
          swal.fire({ 
          title: 'สร้างใบแจ้งซ่อมสำเร็จ!',
          icon: 'success',
          showConfirmButton: false
        });
        },1500)
        setTimeout(()=>{
          // location.href="./mtworkorder/mttaskadd.php?id="+res;
          location.href="./mtworkorder/mttaskadd.php";
        },3500)  
      }else if(res == 2){  
        setTimeout(()=>{
        swal.fire({ 
          text: 'กรุณาใช้ไฟล์รูปภาพ!',
          icon: 'error',
          showConfirmButton: true
        });
      },1500)
      }else if(res == 3){  
        setTimeout(()=>{
        swal.fire({ 
          text: 'ไฟล์ใหญ่เกินไป กรุณาใช้ไฟล์ขนาดไม่เกิน 400kb !',
          icon: 'error',
          showConfirmButton: true
        });
      },1500)
      }else if(res == 4){  
        setTimeout(()=>{
        swal.fire({ 
          text: 'ชื่อไฟล์ภาพยาวเกินไป กรุณาใช้ชื่อไม่เกิน 40 ตัวอักษร !',
          icon: 'error',
          showConfirmButton: true
        });
      },1500)
      }else if(res == 5){  
        setTimeout(()=>{
        swal.fire({ 
          text: 'กรุณาใช้ไฟล์ภาพนามสกุล JPG, JPEG, PNG , GIF !',
          icon: 'error',
          showConfirmButton: true
        });
      },1500)
      }else if(res == 6){ 
        setTimeout(()=>{ 
        swal.fire({ 
          text: 'อัพโหลดรูปภาพไม่สำเร็จ !',
          icon: 'error',
          showConfirmButton: true
        });
      },1500)
      }
    }
    })
  }
})

$('#closetask').click(()=>{
  $(".dbtable0").fadeOut(400);
})

$('#closetask1').click(()=>{
  $(".dbtable").fadeOut(400);
})

$('#closetask2').click(()=>{
  $(".showdata").fadeOut(400);
})

function showtask(){
  if($(".dbtable0").css("display") == "none"){
     $(".dbtable0").fadeIn(500);
     $(".dbtable").fadeOut(200);
     $(".showdata").fadeOut(200);
  }else{
     $(".dbtable0").fadeOut(200);
  }
};

function showtask1(){
  if($(".dbtable").css("display") == "none"){
     $(".dbtable").fadeIn(500);
     $(".showdata").fadeOut(200);
     $(".dbtable0").fadeOut(200);
  }else{
     $(".dbtable").fadeOut(200);
  }
};

function showtask2(){
  if($(".showdata").css("display") == "none"){
    $(".showdata").fadeIn(500);
    $(".dbtable").fadeOut(200);
    $(".dbtable0").fadeOut(200);
  }else{
    $(".showdata").fadeOut(200);
  }
}



// $(document).ready(function(){

// $("#addtaskform").on('submit', function(e){
//     e.preventDefault();

//     swal.fire({
//     title: 'Now loading',
//     allowEscapeKey: false,
//     allowOutsideClick: false,
//     // timer: 2000,
//     didOpen: () => {
//     Swal.showLoading();
//     }
//     })
    
//     $.ajax({
//     type: 'POST',
//     url: './mtworkorder/addtaskfunction.php',
//     data: new FormData(this),
//     dataType: false,
//     contentType: false,
//     cache: false,
//     processData: false,
//     success: function(res){
//         if(res == 1){
//         setTimeout(()=>{
//           swal.fire({ 
//           title: 'Finished!',
//           icon: 'success',
//           showConfirmButton: false
//         });
//         },1300);
//         }else if(res == 2){
//           setTimeout(()=>{
//           Swal.fire({
//           icon: "error",
//           title: "Oops...",
//           text: "Something went wrong!",
//           footer: '<a href="#">Why do I have this issue?</a>'
//         })
//         },1300);
//         }
//         setTimeout(()=>{
//           location.reload();
//         },2500);
//     }
//   })
//     })
// })


function infoview(e){

  var idselect = 'id='+e;

  $.ajax({
    url:'./mtworkorder/mttaskinfoview.php',
    type: 'POST',
    data: idselect,
    success:(res)=>{
      if(res){
        var filename = res;
        var path = './media/uploads/'+filename;
        $("#infoimg").attr("src",path);
      }
    }
    })
  }

function deletetask(){
  let id = 'id=<?php  if(!isset($idenc)){$idenc = 0;} echo $idenc;  ?>';

  Swal.fire({
  title: "Are you sure?",
  text: "You won't be delete this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#51cc8a",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
  }).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
    url: './mtworkorder/mttaskdeletefunction.php',
    type: 'POST',
    data: id,
    success:(res)=>{
        if(res == 1){
      Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success",
      showConfirmButton: false
    });  
      setTimeout(()=>{
                    location.reload();   
                    },1800);        
        }else if(res == 4){
          Swal.fire("Something went wrong!");
        }
    }
  })
  }
});
}

function clear(){
  $("#firstname").val("");
  $("#lastname").val("");
  $("#username").val("");
  $("#phonenumber").val("");
  $("#company").val("");
  $("#equipment").val("1");
  $("#date").val("");
  $("#fileToUpload").val("");
}

//logout
$(".menu-logout").click(()=>{
  location.href="../logout.php";
})

//data table
new DataTable('#data0', {
  order: [[0, 'desc']],
    
    layout: {
         topEnd: {
             search: {
                 placeholder: 'ค้นหา'
             }
         }
     },
     language: {
        zeroRecords: '" ไม่พบข้อมูลที่ค้นหา "',
        info: 'แสดง _END_ รายการ จากทั้งหมด _MAX_ รายการ',
        infoFiltered: '',
        infoEmpty: 'ไม่พบรายการ',
        emptyTable: '" ไม่มีข้อมูลในตาราง "',
        lengthMenu: "แสดง _MENU_ รายการ",
    }
});

new DataTable('#data', {
  order: [[0, 'desc']],
    
    layout: {
         topEnd: {
             search: {
                 placeholder: 'ค้นหา'
             }
         }
     },
     language: {
        zeroRecords: '" ไม่พบข้อมูลที่ค้นหา "',
        info: 'แสดง _END_ รายการ จากทั้งหมด _MAX_ รายการ',
        infoFiltered: '',
        infoEmpty: 'ไม่พบรายการ',
        emptyTable: '" ไม่มีข้อมูลในตาราง "',
        lengthMenu: "แสดง _MENU_ รายการ",
    }
});

new DataTable('#data2', {
  order: [[0, 'desc']],
    
    layout: {
         topEnd: {
             search: {
                 placeholder: 'ค้นหา'
             }
         }
     },
     language: {
        zeroRecords: '" ไม่พบข้อมูลที่ค้นหา "',
        info: 'แสดง _END_ รายการ จากทั้งหมด _MAX_ รายการ',
        infoFiltered: '',
        infoEmpty: 'ไม่พบรายการ',
        emptyTable: '" ไม่มีข้อมูลในตาราง "',
        lengthMenu: "แสดง _MENU_ รายการ",
    }
});

</script>

<?php $conn = null; ?>
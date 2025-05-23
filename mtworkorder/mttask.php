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
    <title>MT Service Table</title>
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
    <link rel="stylesheet" href="./css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./css/sweetalert2.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="./css/dataTables.min.css"/>
    <link rel="stylesheet" href="./css/tempus-dominus.min.css"/>
    <link rel="stylesheet" href="./css/font/kanit.css"/>
    <script src="./js/config.js"></script>
    <script src="./js/color-modes.js"></script>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/ajax-jquery.min.js"></script>
    <script src="./js/dataTables.min.js"></script>
  </head>

  <style>
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

  input[type=checkbox] {
    display: none;
    }

    .containerimgshow img {
      transition: transform 0.25s ease;
      cursor: zoom-in;
    }

    input[type=checkbox]:checked ~ label > img {
      transform: scale(3);
      cursor: zoom-out;
    }
  </style>
  
  <body>
    
  <?php include 'menu-sidebar.php'; ?>

    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include 'header.php'; ?>

      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold" data-coreui-i18n="ตารางใบแจ้งซ่อม">ตารางใบแจ้งซ่อม</div>
          <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active"><a style="text-decoration: none; color: black;" href="./mtworkorder/mttask.php" data-coreui-i18n="Task table">Task table</a>
              </li>
              <li class="breadcrumb-item avtive"><a style="" href="./mtworkorder/mttaskedit.php" data-coreui-i18n="Edit">Edit</a>
              </li>
            </ol>
          </nav> -->

<!-- dbtable start -->
<div class="row">
            <div class="col-xl-12">
              <div class="card">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col">
                      <!-- <div class="card-title fs-4 fw-semibold" data-coreui-i18n="ตารางใบแจ้งซ่อม">ตารางใบแจ้งซ่อม</div>
                      <div class="card-subtitle text-body-secondary mb-4" data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered users</div> -->
                    </div>
                    <div class="col-auto ms-auto">
                      <button class="btn btn-secondary bt-shadow-hover" data-bs-toggle="modal" data-bs-target="#addtaskmodal">
                        <svg class="icon me-2">
                        <use xlink:href="/backend/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                        </svg><span class="fw-bold" data-coreui-i18n="สร้างใบแจ้งซ่อม">สร้างใบแจ้งซ่อม</span>
                      </button>
                    </div>
                  </div>
                  <div class="table-responsive" style="padding-bottom: 5rem;">
                  <table class="table table-hover table-striped table-bordered" id="data" >
  <thead>
    <tr>
      <!-- <th scope="col"><svg class="icon"><use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use></svg></th> -->
      <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col" style="text-align: left;" >Phonenumber</th>
      <th scope="col" class="text-center">Title</th>
      <th scope="col" class="text-center">Status</th>
      <th scope="col">Equipment</th>
      <th scope="col">Subequipment</th>
      <!-- <th scope="col">Img</th> -->
      <th scope="col">Date/Time</th>
      <!-- <th scope="col" class="text-center">Send</th> -->
      <th scope="col">Tool</th>
    </tr>
  </thead>
  <tbody>
    <?php 

    $query = $conn->query(" SELECT * FROM task ");

    while($rows = $query->fetch(PDO:: FETCH_ASSOC)){
        $id = $rows['id'];
        $username = $rows['username'];
        $phonenumber = $rows['phonenumber'];
        $title = $rows['title'];
        $status = $rows['status'];
        $equipment = $rows['equipment'];
        $subequipment = $rows['subequipment'];
        $image = $rows['img'];
        $date = $rows['date'];
        $idenc = base64_encode($id)??NULL;

        $result = substr($phonenumber, 0, 3);
        $result .= "****";
        $result .= substr($phonenumber, 7, 5);

?>
      <tr>
      <!-- <th scope="row"><?php //echo $i; ?></th> -->
      <td style="text-align: center;"><?php echo $rows['id']; ?></td>
      <td><?php echo $username; ?></td>
      <td style="text-align: left;" ><?php echo $result; ?></td>
      <td style="text-align: left;" ><?php echo $title; ?></td>
      <td class="text-center" id="statustable" >
      <?php 
      
      if($status == 10){ 
        echo "<div style=\"font-size: 11px; cursor: default;\" class=\"badge bg-success-gradient \">เสร็จสิ้น</div>";
      }else if($status == 1){
        echo "<div style=\"cursor: default;\" class=\"badge bg-dark-gradient \">สร้าง</div>";
      }else if($status == 2){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-dark-gradient \">รออณุมัติ</div>";
      }else if($status == 5){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-warning-gradient \">กำลังดำเนินการซ่อม</div>";
      }else if($status == 8){
        echo "<div style=\"font-size: 10px; cursor: default;\" class=\"badge bg-danger-gradient \">ยกเลิก</div>";
      }

      ?>
      </td>
      <td><?= $equipment; ?></td>
      <td><?= $subequipment; ?></td>
      <!-- <td><?php //$image; ?></td> -->
      <td>
      <?php 
      date_default_timezone_set("Asia/Bangkok");
      $datedb = new DateTime($date);
      $years = date('Y')+ 543;
      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
      $days =  $week[date('w')];
      // $thmonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
      $months = $thmonth[date('m')-1];
      $dateSet =  date('d', strtotime($date));
      $datenews = $datedb->format("{$days} j {$months} {$years} : H:i น.");
      echo $datenews;
      ?>
      </td>
      <!-- <td class="text-center">
        <div>
          <button class="btn btn-outline-success btn-sm" onclick="sendTask('<?php //$idenc; ?>')">SEND</button>
        </div>
      </td> -->
      <td>
        <div class="dropdown">
              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button" data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg class="icon">
                  <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                </svg>
              </button>
              <div class="dropdown-menu dropdown-menu-end">
                <button class="dropdown-item " href="#" data-bs-toggle="modal" data-bs-target="#infomodal" onclick="infoview('<?= $idenc; ?>')" >Info</button>
                <form action="mtworkorder/mttaskedit.php" method="POST" >
                <button class="dropdown-item" name="id" value="<?php echo $idenc;?>"  <?php if($status == 5 || $status == 10 || $status == 8){ echo 'style="display: none;"'; } ?> >Edit</button>
              </form>
                <form method="POST" action="./mtworkorder/report.php" target="blank" >
                <input class="d-none" name="idtaskreport" type="text" value="<?= $idenc ?>" >
                <button class="dropdown-item" data-coreui-i18n="Report" type="submit">Report</button>
              </form>
              <button class="dropdown-item text-success" href="#" onclick="sendTask('<?= $idenc; ?>')" data-coreui-i18n="Send"  <?php if($status == 5 || $status == 10 || $status == 8){ echo 'style="display: none;"'; } ?> >Send</button>
              <button class="dropdown-item text-danger" href="#" onclick="deletetask()" data-coreui-i18n="delete" <?php if($status == 5 || $status == 10 || $status == 8){ echo 'style="display: none;"'; } ?> >Delete</button>
            </div>
        </div>
      </td>                      
    </tr>
          
      <?php } ?>
  </tbody>
</table>
                </div>
              </div>
          </div>
          <?php include 'footer.php'; ?>
<!-- dbtable end -->


    

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
                      // $thmonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                      $thmonth = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
                      $months = $thmonth[date('m')-1];
                      $dates = $date->format("{$days} ที่ d {$months} {$years} : H:i น.");
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

            <!-- <div class="col-md-12 col-sm-12 container pb-3 input-group custom-file-button w-50 justify-content-center">
              <span class="" for="">กรุณาเลือกไฟล์</span>
            </div> -->

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


<!-- Modal info start-->
<div class="modal fade" id="infomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #2b3245;">
        <h5 class="modal-title text-center fw-bold w-100 text-white text-uppercase" id="exampleModalLabelview"></h5>
        <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="content pt-4 px-4">
      <form id="editform" enctype="multipart/form-data">
          <div class="row">

          <div class="col-md-6 col-sm-12 pb-4">
              <div class="inputGroupedit">
                    <input type="text" required="" id="usernameview" name="username" value="" class="form-control-lg" readonly style="background-color: #e7e7e7cc;" />
                    <label class="labeladdtask" for="username" style="background-color: transparent;">Username</label>
              </div>
          </div>

          <div class="col-md-6 col-sm-12 pb-2">
          <div class="inputGroupedit">
              <input type="text" required="" id="phonenumberview" name="phonenumber" value="" class="form-control-lg "  readonly style="background-color: #e7e7e7cc;"/>
              <label class="labeladdtask" for="phonenumber" style="background-color: transparent;" >เบอร์โทรติดต่อ</label>
            </div>
          </div>
          </div>

          <!-- Text input -->

          <div class="row mb-2">
          <div class="col-md-12 ">
              <div class="inputGroupedit">
                    <input type="text" readonly required="" id="titleview" name="title" value="" class="form-control-lg" />
                    <label class="labeladdtask" for="title" style="top: 0px; padding: 0.2rem; left: 3px;" >หัวเรื่อง</label>
              </div>
          </div>

          </div>
            
            <div class="col-md-12 col-sm-12  p-4 mb-3" style="background-color: #47587a; border-radius: 10px">

                <div class="row">
                <div class="col-md-4 col-sm-12 py-2">
                <div class=" col-md-12 col-sm-12 text-center ">
                <h6 class="text-uppercase text-black fw-bold text-white">วันและเวลาที่แจ้งซ่อม </h6>
                </div>  
                <div class="input-group w-100">

                      <input type="text" placeholder="กรุณาเลือกวันที่แจ้งซ่อม" readonly id="datetimepicker1view" name="date" value="" class="form-control " readonly style="background-color: white; font-size: 14px; text-align: center;"/>
                      <div class="input-group-text" style="padding: 10px"><i class="fa fa-calendar text-secondary"></i></div>
                    </div>
            </div> 

            <div class="col-md-4 col-sm-12 py-2">
            <div class=" col-md-12 col-sm-12 text-center">
            <h6 class="text-uppercase text-black fw-bold text-white">หมวดอุปกรณ์ </h6>
            </div>
            <div class="input-group">
                    <select style="cursor: pointer;" disabled id="equipment" name="equipment" class="form-select w-100" aria-label="form-select-sm example" aria-label="Default select example" >
                      <option id="opeqview" value=""></option>
                    </select>
                    </div>
            </div>

            <div class="col-md-4 col-sm-12 py-2">
            <div class=" col-md-12 text-center">
            <h6 class="text-uppercase text-black fw-bold text-white">ประเภทอุปกรณ์ </h6>
            </div>
            <div class="input-group">

                    <select style="cursor: pointer; display: block;" disabled id="subequipment" name="subequipment" class="form-select w-100 " aria-label="form-select-sm example" aria-label="Default select example" >
                    <option id="opsubeqview" value=""></option>
                    </select>

                    <!-- </div>
                    <div class="py-2 d-flex justify-content-center align-items-center col-12 ">
                    <span style="height: 10px;" id="equipmentstatus"></span>
                    </div> -->

            </div>
            </div>
            

          <div class="col-md-12 col-sm-12 mb-2 py-2">
          <label class="labelnote text-white mx-2 pb-1" for="form6Example7">หมายเหตุ</label>
          <textarea required="" class="w-100" id="noteview" name="note" readonly rows="4" placeholder="หมายเหตุ" style="border-radius: 8px; text-indent: 10px;"></textarea>
          </div>
          </div>
        
  
              <div class="col-md-6 col-sm-12 container pb-3 input-group custom-file-button w-50 d-none">
                <label class="input-group-text" for="inputGroupFile">กรุณาเลือกไฟล์ภาพ</label>
                <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" value="">
              </div>
        
              <div class="col-md-12 col-sm-12 containerimgshow text-center pb-4 d-flex justify-content-center align-item-center">
              <div>
              <input type="checkbox" id="zoomCheck"> 
              <label for="zoomCheck">
              <img id="imgshowview" src="" class=" w-50 ">
              </label>
              </div>
              </div>
              
              <div class="row align-items-center justify-content-center pb-3 d-none">
              <div class="col-6 text-center">
                <input data-mdb-ripple-init class="btn btn-secondary  bt-shadow-hover mx-2 mb-2" onclick="location.href='./mtworkorder/mttask.php'" type="button" value="กลับ" />
                <input data-mdb-ripple-init class="btn btn-primary bt-shadow-hover sub mb-2 text-white" type="submit" form="editform" value="บันทึก"></input>
                <input data-mdb-ripple-init class="btn btn-success  bt-shadow-hover mx-2 mb-2 text-white" type="button" value="ส่งใบแจ้งซ่อม" />
              </div>
              
              </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>


</div>
<!-- Modal info end-->

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
    <script src="./js/sweetalert2.all.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>

  </body>
</html>

<script type="text/javascript">

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                // var num = $(input).attr('class','form-control imgchange');
                $('.preview-1').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    } 
    
    $(".imgchange").change(function(){
        readURL(this);
    });


function sendTask(id){
  // event.preventDefault();
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
        data: 'idtask='+id,
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
    },3000);
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
          window.location.href="./mtworkorder/mttaskadd.php";
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

function infoview(e){
var idselect = 'id='+e;
$.ajax({
  url:'./mtinternal/mttaskinfunction.php',
  type: 'POST',
  data: idselect,
  success:(res)=>{
    const data = JSON.parse(res);
    let selectequipment = $('#equipment');
    let selectsubequipment = $('#subequipment');
    // console.log(data);
    $('#usernameview').val(data.username);
    $('#phonenumberview').val(data.phonenumber);
    $('#titleview').val(data.title);
    $('#exampleModalLabelview').text('ใบแจ้งซ่อมเลขที่ '+data.id);
    $('#datetimepicker1view').val(data.date);
    $('#opeqview').attr("value", data.equipment).text(data.equipment);
    $('#opsubeqview').attr("value", data.equipment).text(data.subequipment);
    $('#noteview').val(data.note);
    $('#imgshowview').attr("src",'/backend/media/uploads/'+data.img);
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

//logout
$(".menu-logout").click(()=>{
  location.href="../logout.php";
})

//data table
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

// function toDateInputValue(){
// let today = new Date();
// let dd = today.getDate();
// let mm = today.getMonth() + 1;
// // let yyyy = today.getFullYear() + 543;
// let yyyy = today.getFullYear();
// let hh = today.getHours();
// let min = today.getMinutes();
// let sec = today.getSeconds();
// //let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(); //get h:i:s

// if (dd < 10) {
//     dd = '0' + dd;
// }
// if (mm < 10) {
//     mm = '0' + mm;
// }
// if (hh < 10) {
//   hh = '0' + hh;
// }
// if (min < 10) {
//   min = '0' + min;
// }
// if (sec < 10) {
//   sec = '0' + sec;
// }

// today = dd + '/' + mm + '/' + yyyy + ' ' + hh + ':' + min + ':' + sec;

// // setTimeout(toDateInputValue, 500);

// return today;
// };
// document.getElementById('datetimepicker1').value = toDateInputValue();

</script>

<?php $conn = null; ?>
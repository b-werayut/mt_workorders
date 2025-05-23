<?php 
session_start();
include '../lib/cdn.php';
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
    <title>MT Service</title>
    <link rel="apple-touch-icon" sizes="57x57" href="./assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="./assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="./assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="./assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="./assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="./assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="./assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="./assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="./assets/favicon/manifest.json">
    <link rel="stylesheet" href="./css/css.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="./assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="./vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="./css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="./css/examples.css" rel="stylesheet">
    <script src="./js/config.js"></script>
    <script src="./js/color-modes.js"></script>
    <link href="./vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
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


  </style>
  <body>
    
  <?php include 'menu-sidebar.php'; ?>

    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include 'header.php'; ?>

      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          


<div class="row" style="justify-content: center;">
<div class="fs-2 fw-semibold col-xl-12" data-coreui-i18n="รายละเอียดใบแจ้งซ่อม">รายละเอียดใบแจ้งซ่อม</div>
            <div class="col-xl-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="./mtworkorder/mttaskmain.php" data-coreui-i18n="หน้าหลัก">หน้าหลัก</a>
              </li>
              <li class="breadcrumb-item active"><span data-coreui-i18n="หน้าสร้างใบงาน">หน้าสร้างใบงาน</span>
              </li>
            </ol>
          </nav>
              <div class="card mb-4">
                <div class="card-body ">
                  <div class="row pt-4" style="justify-content: center;">
  <form class="col-xl-8" id="submitform" enctype="multipart/form-data">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-2">

    <div class="col">
        <div class="inputGroupedit">
              <input type="text" required="" id="username" name="username" value="<?= $_SESSION['username']; ?>" class="form-control-lg"   readonly style="background-color: #e7e7e7cc;" />
              <label class="labeladdtask" for="username" style="background-color: transparent;">Username</label>
        </div>
    </div>

    <div class="col">
    <div class="inputGroupedit">
        <input type="text" required="" id="phonenumber" name="phonenumber" value="<?= $_SESSION['telephonenumber']; ?>" class="form-control-lg "  readonly style="background-color: #e7e7e7cc;"/>
        <label class="labeladdtask" for="phonenumber" style="background-color: transparent;" >เบอร์โทรติดต่อ</label>
      </div>
    </div>
  </div>


  <?php 

  // $idpost = $_GET['id'];
  $querydb = $conn->query(" SELECT * FROM task ORDER BY id DESC");
  $rows = $querydb->fetch(PDO:: FETCH_ASSOC);

  $id = $rows['id'];
  $idenc = base64_encode($rows['id']);
  $title = $rows['title'];
  $equipment = $rows['equipment'];
  $subequipment = $rows['subequipment'];
  $datepost = $rows['date'];
  $note = $rows['note'];
  $img = $rows['img'];

  ?>
  <!-- Text input -->

  <div class="row mt-3 mb-2">
  <div class="col">
        <div class="inputGroupedit">
              <input type="text" required="" id="title" name="title" value="<?=  $title; ?>" class="form-control-lg txtdata" />
              <label for="title">หัวเรื่อง</label>
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
      $date = new DateTime($datepost);
      $years = date('Y')+ 543;
      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤษหัสบดี', 'ศุกร์', 'เสาร์'];
      $days =  $week[date('w')];
      $thmonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
      $months = $thmonth[date('m')-1];
      $dates = $date->format("{$days} j {$months} {$years} : H:i:s น.");
      ?>
      <input type="text" id="datetimepicker1" name="date" value="<?= $dates ?>" class="form-control txtdata" readonly style="background-color: white; font-size: 11px;"/>
      <div class="input-group-text" style="padding: 10px"><i class="fa fa-calendar text-secondary"></i></div>
    </div>
</div> 

<div class="col-md-4 col-sm-12 py-2">
<div class=" col-md-12 col-sm-12 text-center">
<h6 class="text-uppercase text-black fw-bold text-white">หมวดอุปกรณ์ </h6>
</div>
<div class="input-group">
    <select style="cursor: pointer;" id="equipment" name="equipment" class="form-select w-100 txtdata" aria-label="form-select-sm example" aria-label="Default select example" disabled>
          <?php
          $query = $conn->query(" SELECT subequipment,equipment,img FROM task ORDER BY id DESC");
          // $query->execute();
          $resp = $query->fetch(PDO:: FETCH_ASSOC);
          ?>
          <option value="<?= $resp['equipment']; ?>"><?= $resp['equipment']; ?></option>
          
    </select>
    </div>
</div>

    <div class="col-md-4 col-sm-12 py-2">
    <div class=" col-md-12 text-center">
    <h6 class="text-uppercase text-black fw-bold text-white">ประเภทอุปกรณ์ </h6>
    </div>
    <div class="input-group">
    <select style="cursor: pointer;" id="subequipment" name="subequipment" class="form-select w-100 txtdata" aria-label="form-select-sm example" aria-label="Default select example" disabled>
       
          <option value="<?= $resp['subequipment']; ?>"><?= $resp['subequipment']; ?></option>
          
    </select>
    </div>
    <div class="py-2 d-flex justify-content-center align-items-center col-12 ">
    <span style="height: 10px;" id="equipmentstatus"></span>
    </div>
</div>
</div>

      

  <div class=" mb-2 py-2">
    <textarea required="" class="w-100 txtdata" id="note" name="note" rows="4" placeholder="หมายเหตุ" style="border-radius: 8px; text-indent: 10px;"><?= $note; ?></textarea>
    <!-- <label class="form-label" for="form6Example7">หมายเหตุ</label> -->
  </div>

  <div class="row  text-center w-100 text-white " >
    <h4>รูปภาพ</h4>
    </div>
  
  <!-- test -->

  


    
    <div class="col-md-6 col-sm-12 container pb-3 input-group custom-file-button w-50">
                <label class="input-group-text" for="inputGroupFile">กรุณาเลือกไฟล์</label>
                <input type="file" class="form-control imgchange" name="fileToUpload" style="display_:none;" />
                <!-- <input type="file" class="form-control" name="fileToUpload" id="fileToUpload"> -->
              </div>

  <div class="col-md-12 mb-2 py-2 text-center bg-white w-100">

  <div class="file-uploader">

<label name="upload-label" class="upload-img-btn">
<!-- <input type="file" class="upload-field-1" style="display:none;" /> -->
<img class="preview-1" src="<?= './media/uploads/'.$img; ?>" style="width:150px!important;" />
</label>

<!-- <label name="upload-label" class="upload-img-btn">
<input type="file" class="upload-field-2" style="display:none;" />
<img class="preview-2" src="https://upload.wikimedia.org/wikipedia/commons/3/3a/Torchlight_viewmag_plus.png" style="width:150px!important;" />
</label> -->

</div>

  </div>

  </div>

  </div>
  
  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input
      class="form-check-input me-2"
      type="checkbox"
      value=""
      id="confirmbox"
      style="cursor: pointer;"
    />
    <a class="form-check-label" style="cursor: pointer;" id="confirmboxtext">กรุณาติ๊กถูกเพื่อยืนยันการส่งใบแจ้งซ่อม ! </a>
  </div>

  <!-- Submit button -->
   <div class="d-flex justify-content-center ">
   <div class="mx-1">
   <button data-mdb-ripple-init type="button" class="btn btn-secondary bt-shadow-hover mb-4 text-white" onclick="location.href='./mtworkorder/mttaskmain.php'" >Back</button>
   </div>
    <div class="mx-1">
   <button data-mdb-ripple-init id="clear" class="btn btn-warning bt-shadow-hover mb-4 ">Clear</button>
   </div>
   <div class="mx-1">
  <button data-mdb-ripple-init type="submit" class="btn btn-success text-white bt-shadow-hover mb-4 ">ส่งใบแจ้งซ่อม</button>
  </div>
  </form>
                </div>
              </div>
              <?php  include 'footer.php';  ?>
            </div>
          </div>
          

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
    <script>
    </script>
  </body>
</html>

<script>

//backup fileupload!!
// function readURL(input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();            
//             reader.onload = function (e) {
//                 var num = $(input).attr('class').split('-')[2];
//                 $('.file-uploader .preview-'+num).attr('src', e.target.result);
//             }

//             reader.readAsDataURL(input.files[0]);
//         }
//     } 
    
//     $("[class^=upload-field-]").change(function(){
//         readURL(this);
//     });

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


$('#equipment').css('color','rgb(116 116 116)');
$('#subequipment').css('color','rgb(116 116 116)');
function eqcolor(){
  $('#equipment').change(()=>{
    $('#equipment').css('color','black');
    $('#subequipment').css('color','black');

    if($('#equipment').val() == 1){
      $('#equipment').css('color','rgb(116 116 116)');
      $('#subequipment').css('color','rgb(116 116 116)');
    }
});
}
eqcolor()


function equipmentstatus(){
let equipment = $("#equipment");
let equipmentstatus = $("#equipmentstatus");

        equipmentstatus.text("*กรุณาเลือกหมวดอุปกรณ์ก่อน");
        equipmentstatus.css("color","red");
        
equipment.change(()=>{
  if(equipment.val() == 1){
        equipmentstatus.text("*กรุณาเลือกหมวดอุปกรณ์ก่อน");
        equipmentstatus.css("color","red");
      }else{
        equipmentstatus.text("");
      }
})    
  }
equipmentstatus()

function cfboxtext(){
let cfboxtext = $("#confirmboxtext");
let cfbox = $("#confirmbox");
cfboxtext.click(()=>{
if(cfbox.prop("checked") == false){
   cfbox.prop("checked", true);
}else{
   cfbox.prop("checked", false);
}
})
}
cfboxtext()


// $(".txtdata").change(function(){
//   let title = $('#title').val();
//   let dateval = $('#datetimepicker1').val();
//   let equipmentval = $('#equipment').val();
//   let subequipmentval = $('#subequipment').val();
//   let datastr = 'idchange=<?= $idenc; ?>&date='+dateval+'&equipment='+equipmentval+'&subequipment='+subequipmentval+'&title='+title;
//   $.post('./mtworkorder/mttaskaddfunction.php', datastr, function(resp){
//       title.resp;
//       dateval.resp;
//       equipmentval.resp;
//       subequipmentval.resp;

//     });
// })


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


$("#equipment").change(()=>{
let equipment = $("#equipment").val();
let subequipment = $("#subequipment");

if(equipment == 1){
  subequipment.prop("disabled", true);
  subequipment.val("1");
}else{
  subequipment.prop("disabled", false);
}
})

$("#clear").click(()=>{
   $("#title").val('');
  //  $("#lastname").val('');
  //  $("#phonenumber").val('');
  //  $("#companyname").val('');
  //  $("#equipment").val('1');
  //  $("input[name='status']").prop('checked', false);
  //  $("#datetimepicker1").val('');
   $("#note").val('');
})

//logout
$(".menu-logout").click(()=>{
  location.href="../logout.php";
})

//data table
new DataTable('#data');

    
</script>
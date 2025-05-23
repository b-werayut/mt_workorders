<?php 
session_start();
include '../lib/cdn.php';
include '../config/db.php';

// if(!isset($_SESSION['username'])){
//   header("location: index.php");
// }

if(isset($_POST['id'])){
    $idpost = base64_decode($_POST['id']);
    $query = $conn->prepare(" SELECT * FROM task WHERE id = ? ");
    $query->execute(array($idpost));
    $resp = $query->fetch(PDO:: FETCH_ASSOC);
    $idenc = base64_encode($resp['id']);
}

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

    input[type=checkbox] {
    display: none;
    }

    .containerimgshow img {
      transition: transform 0.25s ease;
      cursor: zoom-in;
    }

    input[type=checkbox]:checked ~ label > img {
      transform: scale(2);
      cursor: zoom-out;
    }
    
  </style>
  <body>
    
  <?php include 'menu-sidebar.php'; ?>

    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include 'header.php'; ?>

      <div class="body flex-grow-1">
        <div class="container-lg px-4 col-10">
        <div class="fs-2 fw-semibold" data-coreui-i18n="แก้ไขใบแจ้งซ่อม">แก้ไขใบแจ้งซ่อม</div>

        <div class="card shadow-2-strong card-registration" style="background-color: #f3f3f3; border-radius: 0px 0px 5px 5px;">
          <div class="card-body p-4 mt-3">
            <!-- submit -->
            <form id="editform" enctype="multipart/form-data">
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
                    <input type="text" required="" id="title" name="title" value="<?= $resp['title']; ?>" class="form-control-lg" />
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
                      $date = new DateTime($resp['date']);
                      $years = date('Y')+ 543;
                      $week = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสษบดี', 'ศุกร์', 'เสาร์'];
                      $days =  $week[date('w')];
                      $thmonth = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
                      $months = $thmonth[date('m')-1];
                      $dates = $date->format("{$days} j {$months} {$years} : H:i น.");
                      ?>
                      <input type="text" placeholder="กรุณาเลือกวันที่แจ้งซ่อม" id="datetimepicker1" name="date" value="<?= $dates ?>" class="form-control " readonly style="background-color: white; font-size: 14px; text-align: center;"/>
                      <div class="input-group-text" style="padding: 10px"><i class="fa fa-calendar text-secondary"></i></div>
                    </div>
            </div> 

            <div class="col-md-4 col-sm-12 py-2">
            <div class=" col-md-12 col-sm-12 text-center">
            <h6 class="text-uppercase text-black fw-bold text-white">หมวดอุปกรณ์ </h6>
            </div>
            <div class="input-group">
                    <select style="cursor: pointer;" id="equipment" name="equipment" class="form-select w-100" aria-label="form-select-sm example" aria-label="Default select example" >
                          <option value="<?= $resp['equipment']; ?>"><?= $resp['equipment']; ?></option>
                          <?php 
                          $queryeq = $conn->query(" SELECT * FROM equipment ");
                          while($eqdb = $queryeq->fetch(PDO:: FETCH_ASSOC)){
                            if($resp['equipment'] == $eqdb['equipment']){
                              continue;
                            }
                          ?>
                          <option value="<?= $eqdb['equipment']; ?>"><?= $eqdb['equipment']; ?></option>
                          <?php } ?>
                    </select>
                    </div>
            </div>

            <div class="col-md-4 col-sm-12 py-2">
            <div class=" col-md-12 text-center">
            <h6 class="text-uppercase text-black fw-bold text-white">ประเภทอุปกรณ์ </h6>
            </div>
            <div class="input-group">

                    <select style="cursor: pointer; display: block;" id="subequipment" name="subequipment" class="form-select w-100 " aria-label="form-select-sm example" aria-label="Default select example" >
                    <option value="<?= $resp['subequipment']; ?>"><?= $resp['subequipment']; ?></option>
                    <?php 
                          $queryeq = $conn->query(" SELECT * FROM equipment ");
                          while($eqdb = $queryeq->fetch(PDO:: FETCH_ASSOC)){
                            if($resp['subequipment'] == $eqdb['equipment']){
                              continue;
                            }
                          ?>
                          <option value="<?= $eqdb['equipment']; ?>"><?= $eqdb['equipment']; ?></option>
                          <?php } ?>
                    </select>

                    <!-- </div>
                    <div class="py-2 d-flex justify-content-center align-items-center col-12 ">
                    <span style="height: 10px;" id="equipmentstatus"></span>
                    </div> -->

            </div>
            </div>
            

          <div class="col-md-12 col-sm-12 mb-2 py-2">
          <textarea required="" class="w-100" id="note" name="note" rows="4" placeholder="หมายเหตุ" style="border-radius: 8px; text-indent: 10px;"><?= $resp['note']; ?></textarea>
          <!-- <label class="form-label" for="form6Example7">หมายเหตุ</label> -->
          </div>
          </div>
        
  
              <div class="col-md-6 col-sm-12 container pb-3 input-group custom-file-button w-50">
                <label class="input-group-text" for="inputGroupFile">กรุณาเลือกไฟล์</label>
                <input type="file" class="form-control imgchange" name="fileToUpload" id="fileToUpload">
              </div>
              <input type="text" class="form-control d-none" name="iduser" value="<?= $idpost ?>">
        

              <div class="col-md-12 col-sm-12 containerimgshow text-center pb-4 d-flex justify-content-center align-item-center">
              <div>
              <input type="checkbox" id="zoomCheck"> 
              <label for="zoomCheck">
              <img id="imgshow" src="./media/uploads/<?= $resp['img'];?>" class="w-50">
              </label>
              </div>
              </div>
              
              <div class="row align-items-center justify-content-center pb-3">
              <div class="col-6 text-center">
                <input data-mdb-ripple-init class="btn btn-secondary  bt-shadow-hover mx-2 mb-2" onclick="location.href='./mtworkorder/mttask.php'" type="button" value="กลับ" />
                <input data-mdb-ripple-init class="btn btn-primary bt-shadow-hover sub mb-2 text-white d-none" type="submit" form="editform" value="ตรวจสอบ"></input>
                <input  id="sendtaskbtn" onclick='sendTask("<?= $idenc; ?>")' disabled data-mdb-ripple-init disabled class="btn btn-success bt-shadow-hover mx-2 mb-2 text-white" type="button" value="ส่งใบแจ้งซ่อม" />
              </div>
              
              </form>

                </div>
              </div>
            </div>
          </div>
          <br>

          <?php include 'footer.php'; ?>

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

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();            
            reader.onload = function (e) {
                // var num = $(input).attr('class','form-control imgchange');
                $('#imgshow').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    } 
    
    $(".imgchange").change(function(){
        readURL(this);
    });

function disabledsend(){
  let uploadinput = $('#fileToUpload').val();
  let imgshow = $('#imgshow');

if(imgshow.attr("src")  == ''){
  $('#sendtaskbtn').attr("disabled", true);
}else{
  $('#sendtaskbtn').attr("disabled", false);
}
}
disabledsend()
  

  $('#editform').submit(function(e){
  e.preventDefault();
  let upload = $('#fileToUpload').val();
  if(upload == ''){
    Swal.fire({
    icon: "error",
    text: "กรุณา Upload ไฟล์ภาพ!",
    showConfirmButton: true
    });
  }else{
  Swal.fire({
  // title: "กำลังบันทึกฟอร์ม",
  html: "กำลังบันทึกฟอร์ม",
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading();
  }
})
  $.ajax({
    url: './mtworkorder/mttaskeditfunction.php',
    type: 'POST',
    data: new FormData(this),
    dataType: false,
    contentType: false,
    cache: false,
    processData: false,
    success: (resp)=>{
          
      if(resp == 3){
        setTimeout(()=>{
          Swal.fire({
            icon: "error",
            text: "กรุณาใช้ไฟล์ภาพขนาดไม่เกิน 50kb",
            showConfirmButton: true
          });
        },1500)
      }else{
      setTimeout(()=>{
        Swal.fire({
          position: "center",
          icon: "success",
          title: "บันทึกสำเร็จ",
          showConfirmButton: false,
          timer: 1500
        });
        $('#imgshow').attr("src","./media/uploads/"+resp);
        $('#sendtaskbtn').attr("disabled", false);
      },1500);
    }
    }
  })
}
})

function sendTask(id){
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
      window.location="./mtworkorder/mttask.php";
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
          text: "กรุณาใช้ไฟล์ภาพขนาดไม่เกิน 50kb",
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

$("#clear").click(()=>{
   $("#firstname").val('');
   $("#lastname").val('');
   $("#phonenumber").val('');
   $("#companyname").val('');
   $("#equipment").val('1');
   $("input[name='status']").prop('checked', false);
   $("#datetimepicker1").val('');
   $("#note").val('');
})

//logout
$(".menu-logout").click(()=>{
  location.href="../logout.php";
})




</script>
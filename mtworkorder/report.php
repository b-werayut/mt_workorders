<?php
include '../lib/cdn.php';
include '../config/db.php'

?>
<style>
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
    position: relative;
}

* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.page {
    width: 210mm;
    min-height: 297mm;
    padding: 20mm;
    margin: 10mm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
    padding: 1cm;
    border: 1px #cccc solid;
    height: 257mm;
    /* outline: 2cm #FFEAEA solid; */
}

@page {
    size: A4;
    margin: 0;
}

@media print {

    html,
    body {
        width: 210mm;
        height: 297mm;
    }

    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}

table {
    font-size: 9px;
}

.icon {
    cursor: pointer;
    position: absolute;
    right: 448;
    top: 50;
}

/* .date{
        cursor: pointer;
        position: absolute;
        right: 447px;
        top: 86px;
    } */

.icon:hover {
    opacity: 0.5;
}

.arrow {
    cursor: pointer;
    position: absolute;
    left: 440;
    top: 51;
    font-size: 16px;
}

.fa-arrow-left:hover {
    opacity: 7;
}

.arrow a {
    text-decoration: none;
    color: black;
}

.arrow:hover {
    opacity: 0.5;
}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/sweetalert2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="../css/dataTables.min.css" />
    <link rel="stylesheet" href="../css/tempus-dominus.min.css" />
    <link rel="stylesheet" href="../css/font/kanit.css" />
    <link rel="icon" type="image/x-icon" href="../assets/favicon/favicon.ico" />
</head>

<body>

<?php

date_default_timezone_set("Asia/Bangkok");
      $datepr = date("Y/m/d H:i:s");
      $datepr = new DateTime($datepr);
      $buddhistYear = date('Y') + 543;
      $thaiMonthName = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
      $thaiDayName = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤษหัสบดี', 'ศุกร์', 'เสาร์'];
      $month = $thaiMonthName[date('m')-1];
      $week = date('w');
      $datedbformat = $datepr -> format("j {$month} {$buddhistYear}");
      $datedbformat2 = $datepr -> format('H:i:s');
      $datenewpr = "วัน$thaiDayName[$week] $datedbformat เวลา $datedbformat2"; 


if(isset($_POST['idtaskreport'])){
      $idtaskreport = base64_decode($_POST['idtaskreport']);
      $queryreport = $conn->prepare(" SELECT * FROM task WHERE id = ? ");
      $queryreport->execute(array($idtaskreport));
      $resp = $queryreport->fetch(PDO:: FETCH_ASSOC);

      $datedb = $resp['date'];
      $datedb = new DateTime($datedb);
      $buddhistYear = date('Y') + 543;
      $thaiMonthName = ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'];
      $thaiDayName = [ 'อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤษหัสบดี', 'ศุกร์', 'เสาร์'];
      $month = $thaiMonthName[date('m')-1];
      $week = date('w');
      $datedbformat = $datedb -> format("j {$month} {$buddhistYear}");
      $datedbformat2 = $datedb -> format('H:i:s');
      $datenew = "วัน$thaiDayName[$week] $datedbformat เวลา $datedbformat2"; 

}

?>

    <div id="print" onclick="printpage()" class="icon">
        <i class="fa-solid fa-print"></i><a> Print</a>
    </div>

    <div id="arrow" class="arrow">
        <i class="fa-solid fa-arrow-left"></i><a href="../mtworkorder/mttask.php"> Back</a>
    </div>

    <div class="book" style="padding-bottom: .1rem;">

        <div class="page">
            <div class="subpage">
                <div class="date" style="text-align: right;">
                    <p class="" style="font-size: 12px;">วันที่ออกใบ: <?= $datenewpr; ?></p>
                </div>
                <div class="head text-center">
                    <h4 class="text-uppercase fw-bold" style="color: #000;">Report</h2>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div>
                        <label class="" for="username"
                            style="background-color: transparent; font-size: 14px;">Username</label>
                    </div>
                    <div>
                        <input type="text" required="" id="username" name="username" value="<?= $resp['username']; ?>"
                            class="form-control-lg w-100" readonly style="background-color_: #e7e7e7cc; font-size: 14px;" />
                    </div>
                </div>

                <div class="col-md-12 col-sm-12">
                    <div>
                        <label class="" for="phonenumber"
                            style="background-color: transparent; font-size: 14px;">เบอร์โทรติดต่อ</label>
                    </div>
                    <div>
                        <input type="text" required="" id="phonenumber" name="phonenumber" value="<?= $resp['phonenumber']; ?>"
                            class="form-control-lg w-100" readonly style="background-color_: #e7e7e7cc; font-size: 14px;" />
                    </div>
                </div>

                <!-- Text input -->
                <div class="col-md-12 col-sm-12 pb-2">
                    <div class="">
                        <div>
                            <label class="labeladdtask" for="title"
                                style="top: 0px; padding: 0.2rem; left: 3px; font-size: 14px;">หัวเรื่อง</label>
                        </div>
                        <div>
                            <input style="font-size: 14px;" type="text" readonly required="" id="title" name="title" value="<?= $resp['title']; ?>"
                                class="form-control-lg w-100" />
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 py-2">
                    <div class=" col-md-12 col-sm-12 text-center ">
                        <h6 class="text-uppercase text-black fw-bold " style="font-size: 14px;">วันและเวลาที่แจ้งซ่อม
                        </h6>
                    </div>
                    <div class="input-group w-100">
                        <input type="text" id="datetimepicker1" name="date" value="<?= $datenew; ?>" class="form-control " readonly style="background-color: white; font-size: 14px; text-align: center;" />
                        <div class="input-group-text" style="padding: 10px"><i class="fa fa-calendar text-secondary"></i></div>
                    </div>


                    <div class="col-md-12 col-sm-12 py-2">
                        <div class=" col-md-12 col-sm-12 text-center">
                            <h6 class="text-uppercase text-black fw-bold " style="font-size: 14px;">หมวดอุปกรณ์ </h6>
                        </div>
                        <div class="input-group">
                            <select style="cursor: pointer;" disabled id="equipment" name="equipment"
                                class="form-select w-100" aria-label="form-select-sm example"
                                aria-label="Default select example">
                                <option class="text-center" id="opeq" value="<?= $resp['equipment']; ?>"><?= $resp['equipment']; ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 py-2">
                        <div class=" col-md-12 text-center">
                            <h6 class="text-uppercase text-black fw-bold " style="font-size: 14px;">ประเภทอุปกรณ์ </h6>
                        </div>
                        <div class="input-group">

                            <select style="cursor: pointer; display: block;" disabled id="subequipment"
                                name="subequipment" class="form-select w-100 " aria-label="form-select-sm example"
                                aria-label="Default select example">
                                <option class="text-center" id="opsubeq" value="<?= $resp['subequipment']; ?>"><?= $resp['subequipment']; ?></option>
                            </select>

                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12 mb-2 py-2">
                        <label class="labelnote  mx-2 pb-1" for="form6Example7">หมายเหตุ</label>
                        <textarea required="" class="w-100" id="note" name="note" readonly rows="4" placeholder=""
                            style="border-radius: 8px; text-indent: 10px;"><?= $resp['note']; ?></textarea>
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 containerimgshow text-center pb-4 d-flex justify-content-center align-item-center">
                    <div>
                            <img id="imgshow" src="../media/uploads/<?= $resp['img'] ?>" class=" w-50 ">
                    </div>
                </div>

            </div>
            </div>

            <!-- <div class="page">
            <div class="subpage">
            <div class="head text-center">
                <h4 class="text-uppercase fw-bold" style="color: #000;">Report</h2>
            </div>
            <div class="row" style="padding: 0; margin: 0;">
          <div class="table-responsive" style="padding: 0; margin: 0;">
          <table class="table table-hover table-striped table-bordered" id="data" >
          <thead>
            <tr>
            <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Firstname</th>
              <th scope="col">Lastname</th>
              <th scope="col">Telephonenumber</th>
              <th scope="col">Gender</th>
            </tr>
          </thead>
          <tbody>
    <?php 
    
    $query = $conn->query(" SELECT * FROM usersdata WHERE id BETWEEN 31 AND 60");
    $table = 0;
    
    while($rows = $query->fetch(PDO:: FETCH_ASSOC)){ 
        
        $id = $rows['id'];
        $firstname = $rows['firstname'];
        $lastname = $rows['lastname'];
        $username = $rows['username'];
        $phonenumber = $rows['telephonenumber'];
        $gender = $rows['gender'];
        $idenc = base64_encode($id);

        ?>
        <tr>
        <td style="text-align: center;"><?php echo $rows['id']; ?></td>
        <td style="text-align: center;"><?php echo $rows['username']; ?></td>
        <td style="text-align: center;"><?php echo $rows['firstname']; ?></td>
        <td style="text-align: center;"><?php echo $rows['lastname']; ?></td>
        <td style="text-align: center;"><?php echo $rows['telephonenumber']; ?></td>
        <td style="text-align: center;"><?php echo $rows['gender']; ?></td>
        </tr>
      
      <?php } ?>
  </tbody>
    </table>
                </div>
    </div>
</div>
</div>

<div class="page">
    <div class="subpage">
    <div class="head text-center">
        <h4 class="text-uppercase fw-bold" style="color: #000;">Report</h2>
    </div>
    <div class="row" style="padding: 0; margin: 0;">
  <div class="table-responsive" style="padding: 0; margin: 0;">
  <table class="table table-hover table-striped table-bordered" id="data" >
  <thead>
    <tr>
    <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Telephonenumber</th>
      <th scope="col">Gender</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    $query = $conn->query(" SELECT * FROM usersdata WHERE id BETWEEN 61 AND 90");
    $table = 0;
    
    while($rows = $query->fetch(PDO:: FETCH_ASSOC)){ 
        
        $id = $rows['id'];
        $firstname = $rows['firstname'];
        $lastname = $rows['lastname'];
        $username = $rows['username'];
        $phonenumber = $rows['telephonenumber'];
        $gender = $rows['gender'];
        $idenc = base64_encode($id);

        ?>
        <tr>
        <td style="text-align: center;"><?php echo $rows['id']; ?></td>
        <td style="text-align: center;"><?php echo $rows['username']; ?></td>
        <td style="text-align: center;"><?php echo $rows['firstname']; ?></td>
        <td style="text-align: center;"><?php echo $rows['lastname']; ?></td>
        <td style="text-align: center;"><?php echo $rows['telephonenumber']; ?></td>
        <td style="text-align: center;"><?php echo $rows['gender']; ?></td>
        </tr>
      
      <?php } ?>
  </tbody>
    </table>
                </div>
    </div>
</div>
</div>-->

    <script src="../js/date-time-picker.js"></script>
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/ajax-jquery.min.js"></script>
    <script src="../js/dataTables.min.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script type="text/javascript">
function printpage() {
    $("#print").hide();
    $("#arrow").hide();
    $("#print").hide();
    $(".subpage").css("border", "none");
    window.print();
    $("#print").show();
    $("#arrow").show();
    $("#print").show();
    $(".subpage").css("border", "1px #D3D3D3 solid");
}
</script>
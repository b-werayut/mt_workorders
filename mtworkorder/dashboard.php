<?php
session_start();
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
    <title>MT Service Dashboard</title>
    <link rel="manifest" href="./assets/favicon/manifest.json">
    <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico"/>
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
    <script src="./js/chart@4.4.6.js"></script>
  </head>
  <body>
    
  <?php include 'menu-sidebar.php'; ?>

    <div class="wrapper d-flex flex-column min-vh-100">

      <?php include 'header.php'; ?>
      
      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold" data-coreui-i18n="แดชบอร์ด">แดชบอร์ด</div>
          <nav aria-label="breadcrumb">
            <!-- <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="#" data-coreui-i18n="home">Home</a>
              </li>
              <li class="breadcrumb-item active"><span data-coreui-i18n="dashboard">Dashboard</span>
              </li>
            </ol> -->
          </nav>

          <div class="row">
            <div class="col-xl-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card overflow-hidden mb-4">
                    <div class="card-body p-4 pb-0">
                      <div class="row">
                        <div class="col">
                          <div class="card-title fs-4 fw-semibold " data-coreui-i18n="Piechart">Piechart</div>
                        </div>
                        <div class="col text-end text-primary fs-4 fw-semibold d-none">$613.200</div>
                      </div>
                      <div class="card-subtitle text-body-secondary "><span> 1 มกราคม 2567 </span> - <span> 12 ธันวาคม 2567 </span></div>
                    </div>
                    <!-- /.start chart-->
                  <div class="col-md-12  p-4 pt-0 pb-5" style="width: 100%;">
                    <canvas class="chart" id="piechart"></canvas>
                  </div>
                  <!-- /.end chart-->
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-8">
              <div class="card mb-4">
                <div class="card-body p-4 pb-0">
                  <div class="card-title fs-4 fw-semibold" data-coreui-i18n="Linechart">Linechart</div>
                  <div class="card-subtitle text-body-secondary "><span> 1 มกราคม 2567 </span> - <span> 12 ธันวาคม 2567 </span></div>
                  <!-- /.start chart-->
                  <div class="col-md-12 p-2" style="width: 100%;">
                    <canvas class="chart" id="linechart"></canvas>
                  </div>
                  <!-- /.end chart-->
                </div>
              </div>
            </div>
          </div>
              

    <!-- footer-->
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.row-->
        </div>
      </div>
      <?php include 'footer.php'; ?>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="./vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="./vendors/simplebar/js/simplebar.min.js"></script>
    <script src="./vendors/i18next/js/i18next.min.js"></script>
    <script src="./vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
    <script src="./vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
    <script src="./js/i18next.js"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="./vendors/chart.js/js/chart.umd.js"></script>
    <script src="./vendors/@coreui/utils/js/index.js"></script>
  </body>
</html>
<script>
  
let monthTh = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
// piechart chart start
const ctx = document.getElementById('piechart');
const datapie = {
      labels: [
            'เสร็จแล้ว',
            'รอดำเนินการ',
            'ยกเลิก'
          ],
      datasets: [{
        data: [300, 50, 100],
        backgroundColor: [
      '#51cc8a',
      'orange',
      'red'
    ],
        hoverOffset: 10
      }]
    };

    new Chart(ctx, {
      type: 'doughnut',
      data: datapie
    });
// piechart chart end

// line chart start
const ctxbar = document.getElementById('linechart');
const dataline = {
  labels: monthTh,
  datasets: [
  {
    label: 'เสร็จแล้ว',
    data: [0, 19, 70, 41, 36, 65, 20, 95, 49, 60, 41, 16],
    borderColor: '#51cc8a',
    fill: false,
    tension: 0.1
  },
  {
    label: 'รอดำเนินการ',
    data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
    borderColor: 'orange',
    fill: false,
    tension: 0.1
  },
  {
    label: 'ยกเลิก',
    data: [80, 29, 70, 31, 16, 65, 30, 85, 29, 40, 61, 76],
    borderColor: 'red',
    fill: false,
    tension: 0.1
  }],
};

  new Chart(ctxbar, {
    type: 'line',
    data: dataline,
    options: {
      scales: {
        y: {
          stacked: false
        }
      }
    }
  });
// line chart end

</script>
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
    <title>Google Map</title>
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="icon" type="image/x-icon" href="./assets/favicon/favicon.ico"/>
    <meta name="theme-color" content="#ffffff">
    <!-- Vendors styles-->
    <link rel="stylesheet" href="vendors/simplebar/css/simplebar.css">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link href="css/examples.css" rel="stylesheet">
    <link href="css/css.css" rel="stylesheet">
    <script src="js/config.js"></script>
    <script src="js/color-modes.js"></script>
  </head>
  <body>
    <?php include_once 'menu-sidebar.php' ?>

    <div class="wrapper d-flex flex-column min-vh-100">

    <?php include_once 'header.php' ?>
    
      <div class="body flex-grow-1">
        <div class="container-lg px-4">
          <div class="fs-2 fw-semibold">แผนที่</div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="#" data-coreui-i18n="หน้าหลัก">หน้าหลัก</a>
              </li>
              <!-- <li class="breadcrumb-item"><span data-coreui-i18n="plugins">Plugins</span>
              </li> -->
              <li class="breadcrumb-item active"><span>แผนที่</span>
              </li>
            </ol>
          </nav>
          <div class="card mb-4">
            <div class="card-header">Google Maps
              <!-- <a class="badge bg-danger-gradient ms-2 text-decoration-none" href="https://coreui.io/pricing/?framework=bootstrap">CoreUI Pro Integration</a> -->
            </div>
            <div class="card-body">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3992.4577820901523!2d99.86312667516249!3d13.69611039858028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e321a8a6a5170b%3A0x5a9b375f4cc01b32!2sNetwork%20Link%20Co.%2CLtd.!5e1!3m2!1sth!2sth!4v1728458401275!5m2!1sth!2sth" height="600" style="border:0; width: 100%;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
      
      <?php include_once 'footer.php'; ?>
      <!-- <footer class="footer px-4">
        <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io/product/bootstrap-dashboard-template/">Bootstrap Admin Template</a> © 2023 creativeLabs.</div>
        <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/docs/">CoreUI PRO UI Components</a></div>
      </footer> -->
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
    <script src="vendors/simplebar/js/simplebar.min.js"></script>
    <script src="vendors/i18next/js/i18next.min.js"></script>
    <script src="vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script>
    <script src="vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script>
    <script src="js/i18next.js"></script>
    <script>
      const header = document.querySelector('header.header');

      document.addEventListener('scroll', () => {
        if (header) {
          header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
        }
      });
    </script>
    <!-- Plugins and scripts required by this view-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASyYRBZmULmrmw_P9kgr7_266OhFNinPA"></script>
    <script src="js/google-maps.js"></script>
    <script>
    </script>

  </body>
</html>
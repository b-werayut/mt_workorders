<?php 

// $conn = new mysqli("127.0.0.1","root","","test");

// if($conn -> connect_error){
//     die("Connection failed:".$conn -> connect_errror);
// }

    try{
    $conn = new PDO("sqlsrv:Server=127.0.0.1;Database=backenddb", "root", "root");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
    echo 'Connection failed.<br>'. $e->getMessage();
    }
    
    // try {
    //     $conn = new PDO("sqlsrv:Server=127.0.0.1;Database=backenddb", "root", "root");
    //     // ตั้งค่าการจัดการข้อผิดพลาด
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     echo "Connection successful.";
    // } catch (PDOException $e) {
    //     echo 'Connection failed: ' . $e->getMessage();
    // }


    // phpinfo();  
 

    
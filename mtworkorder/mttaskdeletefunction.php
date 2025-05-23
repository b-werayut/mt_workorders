<?php

include '../config/db.php';

if(isset($_POST['id'])){

    $id = $_POST['id'];
    $iddec = base64_decode($id);

    try{
    $query = $conn->prepare(" DELETE FROM task WHERE id= ? ");
    $query->execute(array($iddec));

    if($query->rowCount()){
    echo 1 ;
    }

    }catch(PDOExeption $e){
            echo 'Something went wrong'.$e->getMessage();
    }

}else{
    echo 4 ;
}

$conn = null;


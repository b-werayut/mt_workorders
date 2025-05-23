<?php 

include_once '../config/db.php';

try{
if($_POST['id']){
    $idselect = base64_decode($_POST['id']);
    $query = $conn->prepare(" SELECT * FROM media WHERE id=? ");
    $query->execute(array($idselect));
    $res = $query->fetch(PDO:: FETCH_ASSOC);
    echo $res['filename'];
}else{
    echo 2;
}
}catch(PDOExeption $e){
    echo "Somithing wentwrong : ".$e->getMessage();
}

$conn = null;
<?php 
include 'config/db.php';

if(isset($_POST['username'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordenc = md5($password);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $userlevel = 'm';
    $telephonenumber = $_POST['telephonenumber'];
    
    try{
    $query = $conn->prepare(" SELECT * FROM account WHERE username = ? ");
    $query->execute(array($username));
    $rows =  $query->fetch(PDO::FETCH_ASSOC);
    $usernamedb = $rows['username']??NULL;

        if($username == $usernamedb){
            echo 1;
        }else{

        $query = $conn->prepare(" INSERT INTO account (username,passwords,firstname,lastname,userlevel,telephonenumber) VALUES (?, ?, ?, ?, ?, ?) ");
        $query->execute(array($username, $passwordenc, $firstname, $lastname, $userlevel, $telephonenumber));

        if($query->rowCount()){
            echo 2;
        }else{
            echo 3;
        }
        
    }
    } catch(PDOException $e){
        echo 'Error'.$e->getMessage();
    }
}else{
    header("location: index.php");
}
    
$conn=null;
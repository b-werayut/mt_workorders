<?php 
session_start();
include 'config/db.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordenc = md5($password);


        try{
         $query = $conn->prepare(" SELECT * FROM account WHERE username = ? AND passwords = ? ");
         $query->execute(array($username, $passwordenc));
         
         if($query->rowCount()){
                $rows = $query->fetch(PDO:: FETCH_ASSOC);
                $_SESSION['username'] = $rows['username'];
                $_SESSION['firstname'] = $rows['firstname'];
                $_SESSION['lastname'] = $rows['lastname'];
                $_SESSION['telephonenumber'] = $rows['telephonenumber'];
                $_SESSION['success'] = "<div>Login Success</div>";
                $userlevel = $rows['userlevel'];
                $passworddb = $rows['passwords'];

                if($userlevel == 'a'){
                    echo 0;
                }else if($userlevel == 'm'){
                    echo 1;
                }

                }else{
                    
                            $query = $conn->prepare(" SELECT username FROM account WHERE username = ? ");
                            $query->execute(array($username));
                            $res = $query->fetch(PDO:: FETCH_ASSOC);
                            $usernamedb = $res['username']??NULL;
                            $passworddb = $res['passwords']??NULL;
                            
                            if($usernamedb != $username){
                                echo 2;
                            }else if($passworddb != $passwordenc){
                                echo 3;
                            }else{
                                echo 4 ;
                            }
               
                }
            } catch(PDOExeption $e){
                echo 'Something wentwrong'.$e->getMessage();
            }

                }else{
                    header("location: index.php");
                    }

$conn=null;
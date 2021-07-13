<?php   

session_start();

$conn = mysqli_connect(
    'localhost:3306', //Addres
    'root', //User
    '', //Password
    'citas'//DataBase Name
);


if (isset($conn)){
    //echo 'DB IS CONNECT si';
}
?>
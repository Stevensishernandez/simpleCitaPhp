<?php 

include("db.php");

if (isset($_GET['id'])){
    $id =$_GET['id'];
    $query = "DELETE FROM cita WHERE cit_id= $id";

    $result = mysqli_query($conn,$query);

    if(!$result){
        $_SESSION['message']='user could not be removed ';
    $_SESSION['message_type'] = 'danger';
    
    }else{
        $_SESSION['message']='User was removed';
        $_SESSION['message_type'] = 'danger';
    }

    
    header("Location: ../index.php");
}

?>
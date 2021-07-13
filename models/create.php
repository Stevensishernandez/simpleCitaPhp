<?php 

// Include the db conexion 
include("../db.php");

//$_POST has all value's components with name attribute inside the form-group
if (isset($_POST['create'])) {
    $cit_nombre = $_POST['firstName'];
    $cit_descripcion = $_POST['description'];
    //First we need to create a object date type
    //Next We need to parse objecto to string with "format" and specify the format
    $cit_dateInicio = date_format(date_create($_POST['Start']), "y/m/d : H:i:s");
    $cit_dateFinal = date_format(date_create($_POST['End']), "y/m/d : H:i:s");
    //make the query to add the user to db
    $query = "INSERT INTO cita(cit_nombre, cit_descripcion, cit_dateInicio, cit_dateFinal ) 
                VALUES ('$cit_nombre', '$cit_descripcion', '$cit_dateInicio', '$cit_dateFinal' )";

    
    //$result return a boolean 
    $result = mysqli_query($conn, $query);

    //if the request is successful, it's true
    if(!$result){
        die("Fallado");
    }

    $_SESSION['message']= 'cita saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("Location: ../index.php");
}



?>
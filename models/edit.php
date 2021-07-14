<?php 

    include("../db.php");

    if (isset($_POST['update'])){
        $id = $_GET['id'];
        $cit_nombre = $_POST['firstName'];
        $cit_descripcion = $_POST['description'];
        //First we need to create a object date type
        //Next We need to parse objecto to string with "format" and specify the format
        $cit_dateInicio = date_format(date_create($_POST['Start']), "y/m/d H:i:s");
        $cit_dateFinal = date_format(date_create($_POST['End']), "y/m/d H:i:s");

        $query = "UPDATE cita SET 
            cit_nombre='$cit_nombre', cit_descripcion='$cit_descripcion', cit_dateInicio='$cit_dateInicio', cit_dateFinal='$cit_dateFinal'
            WHERE cit_id=$id";

        $result = mysqli_query($conn, $query); 

        var_dump($result);
        if(!$result){
            die("Fallado");
        }

        $_SESSION['message']= 'cita was edited';
        $_SESSION['message_type'] = 'warning';

        header("Location: ../index.php");
    }

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM cita WHERE cit_id=$id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1 ){
            $row = mysqli_fetch_array($result);
            $cit_nombre = $row['cit_nombre'];
            $cit_descripcion =  $row['cit_descripcion'];
            //First we need to create a object date type
            //Next We need to parse objecto to string with "format" and specify the format
            $cit_dateInicio =  date_format(date_create($row['cit_dateInicio']), "Y-m-d") . 'T' . date_format(date_create($row['cit_dateInicio']), "H:i:s");
            $cit_dateFinal =  date_format(date_create($row['cit_dateFinal']), "Y-m-d") . 'T' . date_format(date_create($row['cit_dateFinal']), "H:i:s");
        }
    }

    

?>

<!-- Call the header.php for use many times -->
<?php include("../includes/header.php"); ?>

<br>
<div class="container p-4">

    <div class="row">
        <div class="col-md-4 mx-auto">
            <h1>Editar Citas</h1>
                <form action="edit.php?id=<?php echo $id?>" method="POST">
                
                    <div class="form-group">
                    
                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input class="form-control" name="firstName" placeholder="Example name" value="<?php echo $cit_nombre; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripcion</label>
                            <input class="form-control" name="description" placeholder="Example description" value="<?php echo $cit_descripcion; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha Inicio</label>
                            <input class="form-control" type="datetime-local" id="Start" name="Start" value="<?php echo $cit_dateInicio; ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha Fin</label>
                            <input class="form-control" type="datetime-local" id="End" name="End" value="<?php echo $cit_dateFinal; ?>">
                        </div>

                        <input type = "submit" class="btn btn-success btn-block" name="update" value="edit" >
                    </div>
                </form>

        </div>
    </div>
</div>
<?php include("../includes/footer.php"); ?>
<!-- Call DataBase -->
<?php
include("db.php");
?>


<!-- Call the header.php for use many times -->
<?php include("includes/header.php"); ?>

<!-- Body starts here -->
<br>
<div class="container p-4">

    <div class="row">
        <h1>Citas</h1>
        <div class="col-md-4">
        
            <!-- Check in own session variable if exist message -->
            <?php  if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?=$_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <!-- unset is usted to destroy a single session variable -->    
            <?php  unset($_SESSION['message']); }?>
            
            <form action="models/create.php" method="POST">
                <div class="form-group">
                    
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" name="firstName" placeholder="Example name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <input class="form-control" name="description" placeholder="Example description">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha Inicio</label>
                        <input class="form-control" type="datetime-local" id="Start" name="Start" value="2021-07-13T18:00:00">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha Fin</label>
                        <input class="form-control" type="datetime-local" id="End" name="End" value="2021-07-13T18:00:00">
                    </div>

                    
            
                    <input type = "submit" class="btn btn-success btn-block" name="create" value="Crear" >
                </div>
                
            </form>

        </div>
        <div class="col-md-8">
            <table class="table caption-top">
                <caption>List of citas</caption>
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delte</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php  
                    $query = "SELECT * FROM cita";
                    $result_users = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result_users)){ ?>
                        <tr>
                        <th scope="row"> <?php echo $row['cit_id'] ?>  </th>
                        <td> <?php echo $row['cit_nombre'] ?> </td>
                        <td> <?php echo $row['cit_descripcion'] ?> </td>
                        <td> <?php echo $row['cit_dateInicio'] ?> </td>
                        <td> <?php echo $row['cit_dateFinal'] ?></td>
                        <td>
                            <!-- Concat the id -->
                            <a href="models/edit.php?id=<?php echo $row['cit_id'] ?>" class="btn btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="models/delete.php?id=<?php echo $row['cit_id'] ?>" class="btn btn-danger">
                                <i class="fas fa-minus-circle"></i>
                            </a>
                        </td>
                        </tr>
                    <?php }
                     ?>
                </tbody>
            </table>
        </div>

    </div>

</div>



<!-- Call the footer.php for use many times -->
<?php include("includes/footer.php"); ?>
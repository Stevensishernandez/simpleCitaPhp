<?php
include("db.php");
?>

<?php  
    $data = array();
    $query = "SELECT * FROM cita";
    $result_users = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result_users))
    {
    $data[] = array(
    'id'   => $row["cit_id"],
    'title'   => $row["cit_nombre"],
    'start'   => $row["cit_dateInicio"],
    'end'   => $row["cit_dateFinal"]
    );
    }

    echo json_encode($data);
?>



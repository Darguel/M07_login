<?php 

    $connect = mysqli_connect("localhost", $username, $password, $database);
    if(!$connect){
        echo "Error de conexión: " . mysqli_connect_error();
    }
    else{
        echo "La conexión y subida de datos a sido un exito!";
    }
    mysqli_close($connect);
?>

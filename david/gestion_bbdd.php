<?php 

    include "dbConfig.php";
    
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PSW, DB_NAME);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $active = $_POST['active'];

    if(!$connect){
        echo "Error de conexión: " . mysqli_connect_error();
    }
    else{
        $query = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) VALUES ('$id','$name','$surname','$password','$email','$rol','$active')";
        $user = mysqli_query($connect, $query);
        header ('Location: resultat.php');
    }

    mysqli_close($connect);
?>
<?php 

    $username="root";
    $password="";
    $database="users";

    $connect = mysqli_connect("localhost", $username, $password, $database);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    $active = $_POST['active'];

    var_dump($connect);
    if(!$connect){
        echo "Error de conexión: " . mysqli_connect_error();
    }
    else{
        $query = "INSERT INTO `user`(`user_id`, `name`, `surname`, `password`, `email`, `rol`, `active`) VALUES ('$id','$name','$surname','$password','$email','$rol','$active')";
        $user = mysqli_query($connect, $query);
    }

    mysqli_close($connect);
?>
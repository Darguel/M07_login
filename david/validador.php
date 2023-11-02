<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        include "dbConfig.php";
        $mail = $_POST["mail"];
        $password = $_POST["password"];

        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

        try {

            $query = "SELECT user_id, email, password, rol, name, surname FROM user WHERE email = '$mail' AND password = '$password'";
            $resultado = mysqli_query($connect, $query);
        
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);

                $_SESSION['rol'] = $row['rol'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['loggedIn'] = true;
                
                
                header ('Location: index.php');
                
            }
            else {
                include "login.html";
                echo "Las credenciales de inicio de sesion son incorrectas";
            }
        } 
        catch (Exception $e) {
            include "login.html";
            echo "No se ha podido conectar con la base de datos " . $e->getMessage();
        } 
        finally {
            mysqli_close($connect);
        }
    ?>
</body>
</html>
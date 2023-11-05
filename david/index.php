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
        $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

        if($_SESSION['loggedIn']){

            if ($_SESSION['rol'] == 'alumnat') {
                echo "<h2> Hola " . $_SESSION['name'] . ", eres un " . $_SESSION['rol'] . "!</h2>";

    ?>
    <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Mostrar Información</a>
    <a href="desconectar.php">Desconectar</a>
    <?php
            } 
            elseif ($_SESSION['rol'] == 'professorat') {
                echo "<h2> Hola " . $_SESSION['name'] . ", eres un " . $_SESSION['rol'] . "!</h2>";
                $query = "SELECT name, surname FROM user";
                $resultado = mysqli_query($connect, $query);

                echo "<h3>Lista de usuarios en la base de datos:</h3>";
                
                if ($resultado && mysqli_num_rows($resultado) > 0) {
                    $usuarios = array();
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        $usuarios[] = $row;
                    }
                    
                    foreach ($usuarios as $usuario) {
                        $name = $usuario['name'];
                        $surname = $usuario['surname'];
                        echo "Nombre del usuario: $name $surname <br>";
                    }
                }
            }
        }
        else{
            header ('Location: login.php');
        }

    ?>
</body>
</html>
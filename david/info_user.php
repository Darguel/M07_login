<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        if (isset($_GET["user_id"])) {
            $user_id = $_GET["user_id"];

            include "dbConfig.php";

            $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);
            $query = "SELECT * FROM user WHERE user_id = '$user_id'";

            $result = mysqli_query($connect, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                echo "<h1>Información detallada del usuario:</h1><br>";
                echo "<b>Nombre:</b> " . $user['name'] . "<br>";
                echo "<b>Apellido:</b> " . $user['surname'] . "<br>";
                echo "<b>Email:</b> " . $user['email'] . "<br>";
                echo "<b>Rol:</b> " . $user['rol'] . "<br>";
                echo "<b>Activo: </b>" . $user['active'] . "<br>";
            } else {
                echo "Usuario no encontrado o sin permisos para acceder a esta información.";
                header('Location: index.php');
            }
        ?>
            <a href="index.php">Volver</a>
        <?php

        } else {
        echo "ID del usuario no proporcionada.";
        header('Location: login.html');
        }

    ?>

</body>
</html>
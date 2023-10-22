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

            $query = "SELECT email, password, rol, name, surname FROM user WHERE email = '$mail' AND password = '$password'";
            $resultado = mysqli_query($connect, $query);
        
            if ($resultado && mysqli_num_rows($resultado) > 0) {
                $row = mysqli_fetch_assoc($resultado);

                $rol = $row['rol'];
                $name = $row['name'];
                $surname = $row['surname'];
                
                if ($rol == 'alumnat') {
                    echo "Soy un alumno";
                    echo "Nombre: $name <br>";
                    echo "Apellido: $surname <br>";
                    echo "Correo: $mail <br>";
                } 
                elseif ($rol == 'professorat') {
                    echo "Hola " . $name . ", eres profesora!!";
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
                else{
                    include "login.html";
                    echo "No estas registrado";
                }
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
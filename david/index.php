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
        include "idioma.php";


        if (!isset($_COOKIE[$cookieLang])) {
            
            $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

        if($_SESSION['loggedIn']){

            if ($_SESSION['rol'] == 'alumnat') {
                echo "<h2> Hola " . $_SESSION['name'] . ", eres un " . $_SESSION['rol'] . "!</h2>";

    ?>
        <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
        <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
        <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
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
                ?>
                    <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                    <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                    <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
                    <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Mostrar Información</a>
                    <a href="desconectar.php">Desconectar</a>
                <?php
            }
        }
        else{
            header ('Location: login.php');
        }

    
            
        } else if(isset($_COOKIE[$cookieLang])){
            if($_COOKIE[$cookieLang] == "es"){
                $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

                if($_SESSION['loggedIn']){
        
                    if ($_SESSION['rol'] == 'alumnat') {
                        echo "<h2> Hola " . $_SESSION['name'] . ", eres un " . $_SESSION['rol'] . "!</h2>";
        
            ?>
                <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
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
                        ?>
                            <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                            <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                            <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
                            <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Mostrar Información</a>
                            <a href="desconectar.php">Desconectar</a>
                        <?php
                    }
                }
                else{
                    header ('Location: login.php');
                }
        
            }
            else if($_COOKIE[$cookieLang] == "cat"){
                $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

                if($_SESSION['loggedIn']){
        
                    if ($_SESSION['rol'] == 'alumnat') {
                        echo "<h2> Hola " . $_SESSION['name'] . ", ets  un " . $_SESSION['rol'] . "!</h2>";
        
            ?>
                <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
                <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Mostrar Informació</a>
                <a href="desconectar.php">Desconectar</a>
            <?php
                    } 
                    elseif ($_SESSION['rol'] == 'professorat') {
                        echo "<h2> Hola " . $_SESSION['name'] . ", eres un " . $_SESSION['rol'] . "!</h2>";
                        $query = "SELECT name, surname FROM user";
                        $resultado = mysqli_query($connect, $query);
        
                        echo "<h3>Llista d'usuaris en la base de dades:</h3>";
                        
                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            $usuarios = array();
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $usuarios[] = $row;
                            }
                            
                            foreach ($usuarios as $usuario) {
                                $name = $usuario['name'];
                                $surname = $usuario['surname'];
                                echo "Nom d'usuari: $name $surname <br>";
                            }
                        }
                        ?>
                            <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                            <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                            <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
                            <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Mostrar Información</a>
                            <a href="desconectar.php">Desconectar</a>
                        <?php
                    }
                }
                else{
                    header ('Location: login.php');
                }
        
            }
            else if($_COOKIE[$cookieLang] == "en"){
                $connect =  mysqli_connect(DB_HOST,DB_USER,DB_PSW,DB_NAME);

                if($_SESSION['loggedIn']){
        
                    if ($_SESSION['rol'] == 'alumnat') {
                        echo "<h2> Hello " . $_SESSION['name'] . ", you are " . $_SESSION['rol'] . "!</h2>";
        
            ?>
                <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
                <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Show Info</a>
                <a href="desconectar.php">Disconnect</a>
            <?php
                    } 
                    elseif ($_SESSION['rol'] == 'professorat') {
                        echo "<h2> Hola " . $_SESSION['name'] . ", eres un " . $_SESSION['rol'] . "!</h2>";
                        $query = "SELECT name, surname FROM user";
                        $resultado = mysqli_query($connect, $query);
        
                        echo "<h3>List of users on database:</h3>";
                        
                        if ($resultado && mysqli_num_rows($resultado) > 0) {
                            $usuarios = array();
                            while ($row = mysqli_fetch_assoc($resultado)) {
                                $usuarios[] = $row;
                            }
                            
                            foreach ($usuarios as $usuario) {
                                $name = $usuario['name'];
                                $surname = $usuario['surname'];
                                echo "User Name: $name $surname <br>";
                            }
                        }
                        ?>
                            <a href="idioma.php?idioma=cat" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'cat') ? 'color: red;' : 'color: blue;'; ?>">CAT</a>
                            <a href="idioma.php?idioma=es" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'es') ? 'color: red;' : 'color: blue;'; ?>">ES</a>
                            <a href="idioma.php?idioma=en" style="<?php echo (isset($_COOKIE['lang']) && $_COOKIE['lang'] === 'en') ? 'color: red;' : 'color: blue;'; ?>">EN</a>
                            <a href="info_user.php?user_id=<?php echo $_SESSION["user_id"]; ?>  ">Mostrar Información</a>
                            <a href="desconectar.php">Desconectar</a>
                        <?php
                    }
                }
                else{
                    header ('Location: login.php');
                }
        
            }
        }
    ?>
</body>
</html>
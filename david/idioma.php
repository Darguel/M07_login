<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        
        $cookieLang = "lang";

        $cookieCat = "cat";
        $cookieEs = "es";
        $cookieEn = "en";

        $tempsDuracio = time() + 300;

        if (isset($_GET['idioma'])) {
            $idioma = $_GET['idioma'];

            if ($idioma == $cookieCat) {
                setcookie($cookieLang, $cookieCat, $tempsDuracio); 
            } 
            elseif ($idioma == $cookieEs) {
                setcookie($cookieLang, $cookieEs, $tempsDuracio); 
            } 
            elseif ($idioma == $cookieEn) {
                setcookie($cookieLang, $cookieEn, $tempsDuracio); 
            }
           
            header('Location: index.php');
        }
    ?>
</body>
</html>
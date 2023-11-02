<?php

    $_SESSION['loggedIn'] = false;
    session_destroy();
    header ('Location: login.php');

?>
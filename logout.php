<?php
if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION)){
    session_destroy();
    echo "Saliendo...";
    header('Location: login.php');
}
?>
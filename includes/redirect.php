<?php 

// Fichero php: Se utiliza cuando un usuario no esta logeado 

// Si no existe la session que se inicie
if(!isset($_SESSION)){
    session_start();
}

// Si no existe la session de user, se hace un redirección
if(!isset($_SESSION['user'])){
    header('Location: index.php');
}

?>
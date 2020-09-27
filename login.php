<?php

// Iniciar la sesion y la conexion
require_once 'includes/conexion.php';
// session_start();

// Recoger datos del formulario 
if(isset($_POST)){

    // Si se logea correctamente se eliminara la session de error antiguo
    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }

    // Recoge datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Consulta para comprobar las credenciales del usuario
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $login = mysqli_query($conexion, $sql);

    // Si login da true y el numero de filas que devuelve la consulta es igual o mayor a 1
    if($login && mysqli_num_rows($login) == 1){
        // devuelve un array asociativo por cada fila de lo que ha sacado en la DB y lo guarda en user
        $user= mysqli_fetch_assoc($login);
        
        // var_dump($user);
        // die();

        // Comprobar la contraseña, con la original y la hash que viene en user[]
        $verify = password_verify($password, $user['password']);


        if($verify){           
            // Utilizar una sesion para guardar los datos del usuario logeado
            $_SESSION['user'] = $user;

        }else{
            // Si algo falla enviar una session con el fallo
            $_SESSION['error_login'] = "Login incorrecto";
        }
    }else{
        $_SESSION['error_login'] = "Login incorrecto";
    }

}
// Redirigir al index.php
header('Location: index.php');
?>
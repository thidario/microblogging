<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';

    // Cuando no existe la session, crearlo
    if(!isset($_SESSION)){
        session_start();
    }
    
    /*  mysqli_real_escape_string,  scape, no lo interpreta como parte del lenguaje, se enfoca en el INSERT "''" 
        Lo que entré sera como string, esto evitando usar las comillas simples o dobles y que la bd devuelva un error 
        Implementado el scape ya se podra ingresar comillas simples y dobles
    */

    // Recoger los valores del form
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conexion, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($conexion, $_POST['lastname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : false;

    // Array de errores
    $errors = array();


    // VALIDAR NAME
    // . !is_numeric => es igual a un string y si no hay un numero del 0-9
    if(!empty($name) && !is_numeric($name) && !preg_match("/[0-9]/", $name)){
        $name_validate = true;
        // echo "El campo nombre es valido";
    }else{
        $name_validate = false;
        $errors['name'] = "El campo nombre no es valido";
    }

    // VALIDAR LASTNAME
    // . !is_numeric => es igual a un string y si no hay un numero del 0-9
    if(!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)){
        $lastname_validate = true;
        // echo "El campo apellido es valido";
    }else{
        $lastname_validate = false;
        $errors['lastname'] = "El campo apellido no es valido";
    }

    // VALIDAR EMAIL
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validate = true;
    }else{
        $email_validate = false;
        $errors['email'] = "El campo email no es valido";
    }

    // VALIDAR PASSWORD
    if(!empty($password)){
        $password_validate = true;
    }else{
        $password_validate = false;
        $errors['password'] = "El campo password no es valido";
    }

    $save_user = false;// estado, solo para pruebas
    if(count($errors) == 0){
        $save_user = true;

        // CIFRAR LA CONTRASEÑA
        // cost, es el coste o el numero de veces que se cifra la contraseña, en este caso sera 4
        $password_secure = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]) ;

        // INSERTAR USUARIO EN LA BASE DE DATOS
        $sql = "INSERT INTO users VALUES(null, '$name', '$lastname', '$email', '$password_secure', CURDATE());";
        $save = mysqli_query($conexion, $sql);

        // Verifica que errores produce el sql y lo para con die()
        // var_dump(mysqli_error($conexion));
        // die();

        if($save){
            $_SESSION['success'] = "El registro se ha completado con exito";
        }else{
            $_SESSION['errors']['general'] = "Fallo al guardar el usuario";
        }


    }else{
        $_SESSION['errors'] = $errors;
        // header('Location: index.php');
    }
}

header('Location: index.php');

?>
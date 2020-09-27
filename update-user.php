<?php

if(isset($_POST)){
    require_once 'includes/conexion.php';
    
    /*  mysqli_real_escape_string,  scape, no lo interpreta como parte del lenguaje, se enfoca en el INSERT "''" 
        Lo que entré sera como string, esto evitando usar las comillas simples o dobles y que la bd devuelva un error 
        Implementado el scape ya se podra ingresar comillas simples y dobles
    */

    // Recoger los valores del form
    $name = isset($_POST['name']) ? mysqli_real_escape_string($conexion, $_POST['name']) : false;
    $lastname = isset($_POST['lastname']) ? mysqli_real_escape_string($conexion, $_POST['lastname']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false;

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


    $save_user = false; // estado, solo para pruebas
    if(count($errors) == 0){
        $save_user = true;
        
        // Obtiene la session del usuario, para hacer una comprobacion if 
        $user = $_SESSION['user'];

        // COMPROBAR SI EL EMAIL YA EXISTE
        $sql = "SELECT id, email FROM users WHERE email = '$email'";
        $isset_email = mysqli_query($conexion, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);//convierte en un array asociativo de la consulta enterior

        // Si el id seleccionado del usuario es igual al id de la session
        if($isset_user['id'] == $user['id'] || empty($isset_user)){
        // ACTUALIZAR USUARIO EN LA BASE DE DATOS
            $user = $_SESSION['user'];
            $sql = "UPDATE users SET name = '$name', lastname = '$lastname', email = '$email' WHERE id = $user[id]";
            $save = mysqli_query($conexion, $sql);

            if($save){
                // Si se guarda, se actualiza los valores de la session
                $_SESSION['user']['name'] = $name;
                $_SESSION['user']['lastname'] = $lastname;
                $_SESSION['user']['email'] = $email;

                $_SESSION['success'] = "Tus datos se han actualizado con exito";
            }else{
                $_SESSION['errors']['general'] = "Fallo al actualizar tus datos";
            }
        }else{
            $_SESSION['errors']['general'] = "El usuario ya existe";
        }

    }else{
        $_SESSION['errors'] = $errors;
        // header('Location: index.php');
    }
}

header('Location: my-data.php');

?>
<?php

if(isset($_POST)){
    // Conexion a la base de datos
    require_once 'includes/conexion.php';

    /*  mysqli_real_escape_string,  scape, no lo interpreta como parte del lenguaje, se enfoca en el INSERT "''" 
        Lo que entré sera como string, esto evitando usar las comillas simples o dobles y que la bd devuelva un error 
        Implementado el scape ya se podra ingresar comillas simples y dobles
    */

    // Obtener los datos del form
    $title = isset($_POST['title']) ? mysqli_real_escape_string($conexion, $_POST['title']) : false;
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conexion, $_POST['description']) : false;
    $category = isset($_POST['category']) ? (int)$_POST['category'] : false;
    $user = $_SESSION['user']['id'];
    
    // Array de errores
    $errors = array();

    // Validar los datos del form
    if(empty($title)){
        $errors['title'] = "El titulo no es valido";
    }

    if(empty($description)){
        $errors['description'] = "La description no es valida";
    }

    if(empty($category) && !is_numeric($category)){
        $errors['category'] = "La categoria no es valida";
    }

    // var_dump($errors);
    // die();

    // Si no hay errores, ejecutar la consulta
    if(count($errors) == 0){
        // Si el action viene con el parametro edit
        if(isset($_GET['edit'])){

            $post_id = $_GET['edit'];
            $user_id = $_SESSION['user']['id'];

            // Actualizara cuando el id de la entrada se igual al id de la entrada que viaja por GET y cuando el user sea el dueño
            $sql = "UPDATE posts SET title = '$title', description = '$description', category_id = $category WHERE id = $post_id AND user_id = $user_id";
        }else{
            $sql = "INSERT INTO posts VALUES (null, $user, $category, '$title', '$description', CURDATE())";
        }
        $save = mysqli_query($conexion, $sql);

        // var_dump('Hola 1');
        // die();
        
        header('Location: index.php');
    }else{ // Si se produce un error que se ejecute el bloque
        // var_dump('Hola 2');
        // die();

        $_SESSION['errors_post'] = $errors;

        // Si se esta editando que haga una redireccion y si no esta editando que se haga una redireccion a create
        if(isset($_GET['edit'])){
            header("Location: update-post.php?id=".$_GET['edit']);
        }else{
            header('Location: create-post.php');
        }
    }

}


?>
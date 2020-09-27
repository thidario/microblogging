<?php

function viewErrors($errors, $campo){
    $alert = '';

    if(isset($errors[$campo]) && !empty($campo)){
        $alert = "<div class='alert alert-error'>".$errors[$campo].'</div>';
    }

    return $alert;
}

function deleteErrors(){
    $deleted = false;

    if(isset($_SESSION['errors'])){
        $_SESSION['errors'] = null;
        $deleted = true;
        // $deleted = session_unset($_SESSION['errors']); // session_unset libera todas las variables de sesion actualmente registrada
    }

    if(isset($_SESSION['success'])){
        $_SESSION['success'] = null;
        $deleted = true;
        // session_unset($_SESSION['success']);
    }

    if(isset($_SESSION['errors_post'])){
        $_SESSION['errors_post'] = null;
        $deleted = true;
    }
    

    return $deleted;
}

function getCategories($conexion){
    $sql = "SELECT * FROM categories ORDER BY id ASC;";
    $categories = mysqli_query($conexion, $sql);

    $result = array();
    // Si categories da true y el numero de filas que devuelve la consulta es igual o mayor a 1
    if($categories && mysqli_num_rows($categories) >= 1){
        $result = $categories;
    }

    return $result;
}

function getCategory($conexion, $id){
    $sql = "SELECT * FROM categories WHERE id = $id";
    $categories = mysqli_query($conexion, $sql);

    $result = array();
    // Si categories da true y el numero de filas que devuelve la consulta es igual o mayor a 1
    if($categories && mysqli_num_rows($categories) >= 1){
        $result = mysqli_fetch_assoc($categories);
    }

    return $result;
}

function getPosts($conexion, $limit = null, $category = null){
    $sql =  "SELECT p.* , c.name AS 'category' FROM posts p 
                INNER JOIN categories c ON p.category_id = c.id
                    ";

    if(!empty($category)){
        $sql .= "WHERE p.category_id = $category ";
    }

    $sql .= "ORDER BY p.id DESC ";

    if($limit){
        // $sql = $sql."LIMIT 4";
        $sql .= "LIMIT 4";
    }
    
    $posts = mysqli_query($conexion, $sql);
    $result = array();

    // Si posts da true y el numero de filas que devuelve la consulta es igual o mayor a 1
    if($posts && mysqli_num_rows($posts) >= 1){
        $result = $posts;
    }
    return $result;
}

function getPost($conexion, $id){

    $sql = "SELECT p.*, c.name AS 'category', CONCAT(u.name, ' ', u.lastname) AS 'user' FROM posts p INNER JOIN categories c ON p.category_id = c.id INNER JOIN users u ON p.user_id = u.id WHERE p.id = $id";

    $post = mysqli_query($conexion, $sql);
    
    $result = array();

    // Si posts da true y el numero de filas que devuelve la consulta es igual o mayor a 1
    if($post && mysqli_num_rows($post) >= 1){
        // posts se convierte en un array asociativo
        $result = mysqli_fetch_assoc($post);
    }

    return $result;

}
?>
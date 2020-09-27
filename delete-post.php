<?php
require_once 'includes/conexion.php';

// si existe un usuario logeado y si existe un post por GET se encuentra en un <a>
if(isset($_SESSION['user']) && isset($_GET['id'])){
    
    $post_id = $_GET['id'];
    
	$user_id = $_SESSION['user']['id'];
    // Eliminara cuando el id de la entrada se igual al id de la entrada que viaja por GET y cuando el user sera el dueño
    $sql = "DELETE FROM posts WHERE user_id = $user_id AND id = $post_id";
    
    $delete = mysqli_query($conexion, $sql);
    
}

header("Location: index.php");



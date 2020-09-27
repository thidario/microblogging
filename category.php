    <?php require_once 'includes/conexion.php'; ?>
    <?php require_once 'includes/helpers.php'; ?>
    
    <!-- Si el id de una categoria_actual no existe, hacer una redireccion -->
    <?php 
        // $_GET array super global que viaja por la url
        $category_current = getCategory($conexion, $_GET['id']);
            if(!isset($category_current['id'])){
                header('Location: index.php');
            }
    ?>
    
    <!-- HEADER -->
    <?php require_once 'includes/header.php' ?>
    <!-- CONTAINER -->
    <!-- SIDEBAR -->
    <?php require_once 'includes/sidebar.php' ?>   

    <!-- MAIN -->
    <div id="main">
        <h1><?=$category_current['name']?> publicados</h1>
        <?php $posts = getPosts($conexion, null, $_GET['id']) ?>
        <!-- Si posts no esta vacio y el numero de filas que devuelve la consulta es igual o mayor a 1 -->
        <?php if(!empty($posts) && mysqli_num_rows($posts)): ?>
            <!-- Por cada fila que recorra obtenga un array asociativo -->
            <?php while($post = mysqli_fetch_assoc($posts)): ?>

                <div class="block">
                <article class="post">
                    <a href="post-detail.php?id=<?=$post['id']?>">
                        <h2><?=$post['title'] ?></h2>
                        <span class="date"><?=$post['category']. ' | '. $post['date']  ?></span>
                        <!-- Substrae la descripcion iniciando de 0 a 180 caracteres -->
                        <p><?=substr($post['description'], 0, 180)."..." ?></p>
                    </a>
                </article>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert">No hay posts en esta categoria</div>
        <?php endif;?>
        
    </div> <!-- END MAIN -->

    <!-- FOOTER -->
    <?php require_once 'includes/footer.php' ?> 
</body>

</html>
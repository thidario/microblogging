<!-- HEADER -->
<?php require_once 'includes/header.php' ?>

<!-- CONTAINER -->

<!-- SIDEBAR -->
<?php require_once 'includes/sidebar.php' ?>   

<!-- MAIN -->
<div id="main">
    <h1>entradas recientes</h1>
    <?php $posts = getPosts($conexion, true) ?>
    <?php if(!empty($posts)): ?>
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
    <?php endif; ?>
    
    <div id="ver-todas">
        <a href="posts.php">Todas las entradas</a>
    </div>
</div> <!-- END MAIN -->

<!-- FOOTER -->
<?php require_once 'includes/footer.php' ?> 
</body>

</html>
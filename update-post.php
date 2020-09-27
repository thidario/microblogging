<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!-- Si el id de un post_actual no existe, hacer una redireccion -->
<?php 
    // $_GET array super global que viaja por la url
    $post_current = getPost($conexion, $_GET['id']);
        if(!isset($post_current['id'])){
            header('Location: index.php');
        }
?>

<!-- HEADER -->
<?php require_once 'includes/header.php' ?>
<!-- CONTAINER -->
<!-- SIDEBAR -->
<?php require_once 'includes/sidebar.php' ?>   
        
    <!-- MAIN -->
<div id="main-editar">
    <h1>Editar Publicación</h1>
    <!-- Se le asigna un flag edit=1 para indicar que sera una edicion -->
    <div class="block-editar">
    <form action="save-post.php?edit=<?=$post_current['id']?>" method="POST">
        <label for="title">Título:</label>
        <input type="text" name="title" value="<?=$post_current['title']?>">
        <?php echo isset($_SESSION['errors_post']) ? viewErrors($_SESSION['errors_post'], 'title') : ''; ?>


        <label for="description">Venga, ¡pon algo!</label>
        <textarea name="description" id="" cols="100" rows="10"><?=$post_current['description']?></textarea>
        <?php echo isset($_SESSION['errors_post']) ? viewErrors($_SESSION['errors_post'], 'description') : ''; ?>

        <label for="category">Categoría</label>
        <select name="category" id="category">
            <?php $categories = getCategories($conexion) ?>
                <?php if(!empty($categories)): ?>
                    <!-- Por cada fila que recorra obtenga un array asociativo -->
                    <?php while($category = mysqli_fetch_assoc($categories)):?>
                        <option value="<?=$category['id']?>" <?= ($category['id'] == $post_current['category_id']) ? 'selected = "selected"' : ''?>>
                            <?=$category['name'] ?>      
                        </option>
                    <?php endwhile;?>
                <?php endif;?>
        </select>
        
        <?php echo isset($_SESSION['errors_post']) ? viewErrors($_SESSION['errors_post'], 'category') : ''; ?>

        <input type="submit" value="Actualizar">
    </form>
</div>
    <?php deleteErrors(); ?>
</div> <!-- END MAIN -->


<!-- FOOTER -->
<?php require_once 'includes/footer.php' ?> 

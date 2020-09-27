<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>

<!-- MAIN -->
<div id="main-editar">
    <h1>crear publicación</h1>
    <div class="block-editar">
    <form action="save-post.php" method="POST">
        <label for="title">Título:</label>
        <input type="text" name="title">
        <!-- añade el título del post y sino indica el mensaje de error -->
        <?php echo isset($_SESSION['errors_post']) ? viewErrors($_SESSION['errors_post'], 'title') : ''; ?>
        <!-- lo mismo que el anterior pero con la descripción -->
        <label for="description">Venga, ¡pon algo!</label>
        <textarea name="description" id="" cols="100" rows="10"></textarea>
        <?php echo isset($_SESSION['errors_post']) ? viewErrors($_SESSION['errors_post'], 'description') : ''; ?>

        <label for="category">Categoría</label>
        <select name="category" id="category">
            <?php $categories = getCategories($conexion) ?>
                <?php if(!empty($categories)): ?>
                    <!-- Por cada fila que recorra obtenga un array asociativo -->
                    <?php while($category = mysqli_fetch_assoc($categories)):?>
                        <option value="<?=$category['id']?>">
                            <?=$category['name'] ?>
                        </option>
                    <?php endwhile;?>
                <?php endif;?>
        </select>
        
        <?php echo isset($_SESSION['errors_post']) ? viewErrors($_SESSION['errors_post'], 'category') : ''; ?>

        <input type="submit" value="Publicar">
    </form>
</div>
    <?php deleteErrors(); ?>
</div> <!-- END MAIN -->
    
<!-- FOOTER -->
 <?php require_once 'includes/footer.php' ?> 
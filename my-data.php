<?php require_once 'includes/redirect.php';?>
<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>


<!-- MAIN -->
<div id="main-editar">
    <h1>actualizar mis datos</h1>

<!-- MOSTRAR ERRORES -->
    <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-successfully">
            <?=$_SESSION['success']?>
        </div>
    <?php elseif(isset($_SESSION['errors']['general'])): ?>
        <div class="alert alert-error">
            <?=$_SESSION['errors']['general']?>
        </div>
    <?php endif; ?>
    
    <div class="block-editar">
    <form action="update-user.php" method="POST">

        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?= $_SESSION['user']['name']?>">
        <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'name') : ''; ?>

        <label for="lastname">Apellidos</label>
        <input type="text" name="lastname" value="<?= $_SESSION['user']['lastname']?>">
        <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'lastname') : ''; ?>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $_SESSION['user']['email']?>">
        <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'email') : ''; ?>

        <input type="submit" name="submit" value="Actualizar">
    </form>
</div>
    <?php deleteErrors(); ?>
</div> <!-- END MAIN -->

<!-- FOOTER -->
<?php require_once 'includes/footer.php' ?> 
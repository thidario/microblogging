<!-- SIDEBAR -->
 <aside id="sidebar">
    <?php if(isset($_SESSION['user'])): ?>
    <div id="user-login" class="block-aside">
        <h3>Bienvenido, <?=$_SESSION['user']['name']; ?></h3>
        <!-- Button -->
        <a href="create-post.php" class="boton boton-misdatos">Crear Post</a>
        <a href="my-data.php" class="boton boton-misdatos">Mis datos</a>
        <a href="logout.php" class="boton boton-misdatos">Logout</a>
        <!-- <form action="logout.php" method="post">
            <input type="submit" value="Logout">
        </form> -->
    </div>
    <?php endif; ?>
    
    <?php if(!isset($_SESSION['user'])): ?>
    <div id="login" class="block-aside">
        <h3>Inicia Sesión</h3>
        
        <?php if(isset($_SESSION['error_login'])): ?>
            <div id="user-login" class="alert alert-error">
                <?=$_SESSION['error_login'] ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Entrar">
        </form>
    </div>
    <div id="register" class="block-aside">
        <h3>Regístrate</h3>

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

        <form action="register.php" method="POST">

            <label for="name">Nombre</label>
            <input type="text" name="name">
            <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'name') : ''; ?>

            <label for="lastname">Apellidos</label>
            <input type="text" name="lastname">
            <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'lastname') : ''; ?>

            <label for="email">Email</label>
            <input type="email" name="email">
            <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'email') : ''; ?>

            <label for="password">Password</label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errors']) ? viewErrors($_SESSION['errors'], 'password') : ''; ?>

            <input type="submit" name="submit" value="Registrarte">
        </form>
        <?php deleteErrors(); ?>
    </div>
    <?php endif; ?>
</aside>
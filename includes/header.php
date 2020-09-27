<?php require_once 'conexion.php' ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RAMÉ | HOME</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="icon" href="assets/img/favicon.png">
</head>

<body>
    <!-- HEADER -->
    <header id="header" style="background-position: center 0px;">
        <!-- LOGO -->
            <a class="logo" href="index.php"><img src="assets/img/logo01.png" alt="logo"></a>
       
        <!-- MENU -->
        <nav id="nav">
            <ul>
                <li><a href="index.php">Home</a></li> 
                <?php $categories = getCategories($conexion); ?>
                <?php if(!empty($categories)): ?>
                    <!-- Por cada fila que recorra obtenga un array asociativo -->
                    <?php while($category = mysqli_fetch_assoc($categories)): ?>
                        <li><a href="category.php?id=<?=$category['id'] ?>"><?=$category['name'] ?> </a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <!-- CONTAINER -->
    <div id="container">
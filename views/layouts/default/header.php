<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Николай Ангелов - Гари</title>
    <link rel="stylesheet" href="../content/styles/mainStyle.css">
    <link rel="stylesheet" href="../content/styles/formStyle.css">
    <link rel="stylesheet" href="../content/styles/bootstrap.min.css">
    <link rel="author" href="humans.txt">
</head>
<body>
<div class="container">
    <header>
        <div class="page-header">
            <img src="../content/images/gary-header.jpg" alt="Nikolai Angelov - Gary">
                <?php if (!$this->isLoggedIn): ?>
                <div class="login">
                    <a href="/account/login">Вход</a>
                </div>
                <?php endif ?>
                <?php if ($this->isLoggedIn): ?>
                    <div class="login">
                        <span>Здравей, <?php echo $_SESSION['username']; ?></span>

                        <form action="/account/logout"><input type="submit" value="Изход"/></form>
                    </div>
                <?php endif ?>
            <a href="/"><h1>Николай Ангелов - Гари</h1></a>
        </div>
    </header>
    <nav class="nav-header">
        <ul class="nav-container">
            <li class="item"><a href="/home">Home</a></li>
            <li class="item"><a href="/exhibitions">Изложби</a></li>
            <li class="item"><a href="/paintings">Картини</a></li>
            <li class="item"><a href="/events">Събития</a></li>
            <li class="item"><a href="">Контакти</a></li>
        </ul>
    </nav>
<?php include_once('messages.php'); ?>
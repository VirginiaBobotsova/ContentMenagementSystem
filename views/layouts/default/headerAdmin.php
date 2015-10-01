<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Администраторски панел</title>
    <link rel="stylesheet" href="../content/styles/adminStyle.css">
    <link rel="stylesheet" href="../content/styles/bootstrap.min.css">
    <link rel="author" href="humans.txt">
</head>
<body>
<div class="container">
    <header>
        <div class="page-header">
            <div class="login">
                <a href="/home/index">www.nikolaiangelov-gary</a>
            </div>
            <?php if ($this->isLoggedIn): ?>
                <div class="login">
                    <span>Здравей, <?php echo $_SESSION['username']; ?></span>

                    <form action="/admin/logout"><input type="submit" value="Изход"/></form>
                </div>
            <?php endif ?>
            <h1>Администраторски панел</h1>
        </div>
    </header>
    <nav class="nav-header">
        <div class="nav">
        <ul>
            <li><a href="/admin/controlPanel" class="m">Настройки</a></li>
            <li><a href="/">Създай</a>
                <ul>
                    <li><a href="/admin/createExhibition">Изложба</a></li>
                    <li><a href="/admin/createPainting">Картина</a></li>
                    <li><a href="/admin/createEvent">Събитие</a></li>
                </ul>
            </li>
            <li><a href="/admin/controlPanel">Редактирай</a>
                <ul>
                    <li><a href="/admin/editAllExhibitions">Изложба</a></li>
                    <li><a href="/admin/editPainting">Картина</a></li>
                    <li><a href="/admin/editEvent">Събитие</a></li>
                </ul>
            </li>
            <li><a href="/admin/controlPanel">Изтрий</a>
                <ul>
                    <li><a href="/admin/deleteExhibition">Изложба</a></li>
                    <li><a href="/admin/deletePainting">Картина</a></li>
                    <li><a href="/admin/deleteEvent">Събитие</a></li>
                </ul>
            </li>
            <li><a href="/admin/controlPanel">Потребители</a></li>
        </ul>
        </div>
    </nav>
<?php include_once('messages.php'); ?>
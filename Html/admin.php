<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/admin_style.css">
    <meta>
    <title>SNCFT Admin</title>
</head>

<body>
    <div class="page">
        <header>
            <div id="all_logo">
                <img src="../Image/logo0.svg" alt="Logo" id="logo">
                <span id='title'>SNCFT</span>
            </div>
            <h1>Bienvenue dans le menu de gestion</h1>
            <div>
                <a href="client.php" id='deco'>Deconnexion</a>
            </div>
        </header>
        <hr>
        <div id="main">
            <ul>
                <li><a href="../Html/ligne.php">Gérer les lignes</a></li>
                <li><a href="../Html/train.php">Gérer les trains</a></li>
                <li><a href="../Html/tarif.php">Gérer les tarifs et les prix de billets</a></li>
                <li><a href="../Html/promotion.php">Promotions de voyage</a></li>
            </ul>
        </div>
    </div>

</body>
<script src="connection_app.js"></script>

</html>
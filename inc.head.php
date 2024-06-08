<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <meta name="description" content="<?php echo $metaDescription ?>">
    <style>
        <?php include("style.css") ?>
    </style>
</head>

<body>
    <header id="zindex">
        <h1><a href="index.php">VG</a></h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION["mail"])) { ?>
                    <li><a href="profil.php">Salut <?php echo $nom_prenoms ?></a></li>
                    <li><a href="deco.php?deco=mail&page=<?php echo basename($_SERVER["PHP_SELF"]) . "&" . $_SERVER["QUERY_STRING"] ?>">Se deconnecter</a></li>
                <?php } else { ?>
                    <li><a href="index.php">Formulaire</a></li>
                <?php } ?>
                <?php if (isset($_SESSION["admin"])) { ?>
                    <li><a href="deco.php?deco=admin&page=<?php echo basename($_SERVER["PHP_SELF"]) . "&" . $_SERVER["QUERY_STRING"] ?>">Se deconnecter la session Admin</a></li>
                <?php } ?>
                <li><a href="jeux.php">Jeux</a></li>
                <li><a href="consoles.php">Consoles</a></li>
                <li id="nav1"><a href="" id="nav2">NAV</a></li>
            </ul>
        </nav>
    </header>
    <menu>
        <?php if (isset($_SESSION["mail"])) { ?>
            <li><a href="profil.php">Salut <?php echo $nom_prenoms ?></a></li>
            <li><a href="deco.php?deco=mail&page=<?php echo basename($_SERVER["PHP_SELF"]) . "&" . $_SERVER["QUERY_STRING"] ?>">Se deconnecter</a></li>
        <?php } else { ?>
            <li><a href="index.php">Formulaire</a></li>
        <?php } ?>
        <?php if (isset($_SESSION["admin"])) { ?>
            <li><a href="deco.php?deco=admin&page=<?php echo basename($_SERVER["PHP_SELF"]) . "&" . $_SERVER["QUERY_STRING"] ?>">Se deconnecter la session Admin</a></li>
        <?php } ?>
        <li><a href="jeux.php">Jeux</a></li>
        <li><a href="consoles.php">Consoles</a></li>
    </menu>
    <main>
        <?php if (isset($_GET["message"])) {
            $message = $_GET["message"];
        }
        if (isset($message)) { ?>
            <p id="message"><?php echo $message ?></p>
        <?php } ?>
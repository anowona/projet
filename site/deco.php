<?php
session_start();

$page = $_GET["page"];
if (isset($_GET["deco"])) {
    $deco = $_GET["deco"];
    if ($deco == "mail") {
        if (isset($_SESSION["mail"])) {
            unset($_SESSION["mail"]);
        }
        echo 'mail';
    } else if ($deco == "admin") {
        if (isset($_SESSION["admin"])) {
            unset($_SESSION["admin"]);
        }
        echo 'admin';
    }
}
if (isset($_GET["codeConsole"])) {
    $page .= "?codeConsole=" . $_GET["codeConsole"];
}
if (isset($_GET["codeJeu"])) {
    $page .= "?codeJeu=" . $_GET["codeJeu"];
}
header("Location: $page");

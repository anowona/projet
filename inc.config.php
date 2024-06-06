<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cours_projetphpklk";

//Creation de la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connexion failed :" . mysqli_connect_error());
}

//////////////////////////////////////////////////////////////////

if (isset($_SESSION["mail"])) {
    if (basename($_SERVER["PHP_SELF"]) == "index.php") {
        header("Location: jeux.php");
    }

    $mail = mysqli_real_escape_string($conn, $_SESSION["mail"]);

    $sql = "SELECT * FROM internaute WHERE mail='$mail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $nom_prenoms = $row["nom_prenoms"];
        $mail = $row["mail"];
        $adresse = $row["adresse"];
        $sexe = $row["sexe"];
        $pays = $row["pays"];
        $date_inscr = $row["date_inscr"];
    }
} else {
    if (basename($_SERVER["PHP_SELF"]) == "profil.php" or basename($_SERVER["PHP_SELF"]) == "modifInternaute.php") {
        header("Location: index.php");
    }
}

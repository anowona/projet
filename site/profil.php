<?php
include("inc.config.php");

$sqlij = "SELECT * FROM relation_internautejeuvideo WHERE mail='$mail'";
$resultij = mysqli_query($conn, $sqlij);

$title = "$nom_prenoms's Profil";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2>Profil</h2>
<p><a href="modifInternaute.php">Modifier votre profil</a></p>

<ul>
    <li><b>Nom et Prenoms:</b> <?php echo $nom_prenoms ?></li>
    <li><b>Email:</b> <?php echo $mail ?></li>
    <li><b>Adresse:</b> <?php echo $adresse ?></li>
    <li><b>Sexe:</b> <?php echo $sexe ?></li>
    <li><b>Pays:</b> <?php echo $pays ?></li>
    <li><b>Date d'inscription:</b> <?php echo $date_inscr ?></li>
</ul>

<?php
if (mysqli_num_rows($resultij) > 0) {
?>
    <h3>Jeux enregistrés</h3>
<?php
    while ($rowij = mysqli_fetch_assoc($resultij)) {
        $codeJeu = $rowij["codeJeu"];
        $sqljv = "SELECT * FROM jeuvideo WHERE codeJeu='$codeJeu'";
        $resultjv = mysqli_query($conn, $sqljv);
        while ($rowjv = mysqli_fetch_assoc($resultjv)) {
            include("inc.article.php");
        }
    }
}
?>


<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
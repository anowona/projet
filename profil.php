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
    <li>Nom et Prenoms: <?php echo $nom_prenoms ?></li>
    <li>Email: <?php echo $mail ?></li>
    <li>Adresse: <?php echo $adresse ?></li>
    <li>Sexe: <?php echo $sexe ?></li>
    <li>Pays: <?php echo $pays ?></li>
    <li>Date d'inscription: <?php echo $date_inscr ?></li>
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
    ?>
            <article>
                <table id="jeux">
                    <tr>
                        <td id="gauche"><img src="photo/<?php echo $rowjv["photo"] ?>" alt=""></td>
                        <td id="droit">
                            <h3><a href="jeu.php?codeJeu=<?php echo $rowjv["codeJeu"] ?>"><?php echo $rowjv["titre"] ?></a></h3>
                            <p><?php echo $rowjv["description"] ?></p>
                        </td>
                    </tr>
                </table>
            </article>
<?php
        }
    }
}
?>


<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
<?php
include("inc.config.php");

$sqljv = "SELECT * FROM jeuvideo";
$resultjv = mysqli_query($conn, $sqljv);


$title = "Jeux";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2>Jeux</h2>
<?php
if (mysqli_num_rows($resultjv) > 0) {
    while ($rowjv = mysqli_fetch_assoc($resultjv)) {
?>
        <article>
            <table id="jeux">
                <tr>
                    <td id="gauche">
                        <a href="jeu.php?codeJeu=<?php echo $rowjv["codeJeu"] ?>">
                            <img src="photo/<?php echo $rowjv["photo"] ?>" alt="">
                        </a>
                    </td>
                    <td id="droit">
                        <h3>
                            <a href="jeu.php?codeJeu=<?php echo $rowjv["codeJeu"] ?>">
                                <?php echo $rowjv["titre"] ?>
                            </a>
                        </h3>
                        <p><?php echo $rowjv["description"] ?></p>
                    </td>
                </tr>
            </table>
        </article>
<?php
    }
}
?>
<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
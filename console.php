<?php
include("inc.config.php");

if (isset($_GET["codeConsole"])) {
    $codeConsole = $_GET["codeConsole"];
} else {
	header("Location: consoles.php");
}

$sqlc = "SELECT * FROM console WHERE codeConsole='$codeConsole'";
$resultc = mysqli_query($conn, $sqlc);

if (mysqli_num_rows($resultc) > 0) {
    $rowc = mysqli_fetch_assoc($resultc);

    $designation = $rowc["designation"];
    $marque = $rowc["marque"];
}

$sqlcj = "SELECT * FROM relation_consolejeuvideo WHERE codeConsole='$codeConsole'";
$resultcj = mysqli_query($conn, $sqlcj);

$title = "$designation - Console";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2><?php echo $designation ?></h2>
<p><?php echo $marque ?></p>
<?php if (isset($_SESSION["admin"])) { ?>
    <p><a href="modifConsole.php?codeConsole=<?php echo $codeConsole ?>">Modifier la console</a></p>
<?php } ?>
<?php
if (mysqli_num_rows($resultcj) > 0) {
    while ($rowcj = mysqli_fetch_assoc($resultcj)) {
        $codeJeu = $rowcj["codeJeu"];
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
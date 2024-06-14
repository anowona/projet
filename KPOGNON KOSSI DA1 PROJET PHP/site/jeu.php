<?php
include("inc.config.php");

if (isset($_GET["codeJeu"])) {
    $codeJeu = $_GET["codeJeu"];
} else {
	header("Location: jeux.php");
    exit;
}

$sqljv = "SELECT * FROM jeuvideo WHERE codeJeu='$codeJeu'";
$resultjv = mysqli_query($conn, $sqljv);

if (mysqli_num_rows($resultjv) > 0) {
    $rowjv = mysqli_fetch_assoc($resultjv);

    $codeJeu = $rowjv["codeJeu"];
    $titre = $rowjv["titre"];
    $typeJeu = $rowjv["typeJeu"];
    $description = $rowjv["description"];
    $fonctionnement = $rowjv["fonctionnement"];
    $editeur = $rowjv["editeur"];
    switch ($rowjv["mode"]) {
        case 0:
            $mode = "";
            break;
        case 1:
            $mode = "En ligne";
            break;
        case 2:
            $mode = "Hors connexion";
            break;
        case 3:
            $mode = "Les 2";
            break;

        default:
            $mode = "";
            break;
    }
    $photo = $rowjv["photo"];
    $dateAjout = $rowjv["dateAjout"];
}

if (isset($_POST["enregistrer"])) {
    $sqle = "INSERT INTO relation_internautejeuvideo(mail,codeJeu) 
        VALUE('{$mail}','{$codeJeu}')";
    if (mysqli_query($conn, $sqle)) {
        $message = "Le jeu a été enregistré dans votre profil.<br>";
    } else {
        $message = "Error:" . $sqle . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["supprimer"])) {
    $sqls = "DELETE FROM relation_internautejeuvideo WHERE codeJeu='$codeJeu'";
    if (mysqli_query($conn, $sqls)) {
        $message = "Le jeu a été supprimé de votre profil!";
    } else {
        $message = "Erreur pendant la suppression du jeu: " . mysqli_error($conn);
    }
}

$sqlcj = "SELECT * FROM relation_consolejeuvideo WHERE codeJeu='$codeJeu'";
$resultcj = mysqli_query($conn, $sqlcj);

$title = "$titre - Jeu";
$metaDescription = "$description";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2><?php echo $titre ?></h2>
<?php if (isset($_SESSION["admin"])) { ?>
    <p><a href="modifJeu.php?codeJeu=<?php echo $codeJeu ?>">Modifier le jeu</a></p>
<?php } ?>
<div class="float gauche">
    <img src="photo/<?php echo $photo ?>" alt="Photo de <?php echo $titre ?>">
</div>
<div class="float droit">
    <?php if (isset($_SESSION["mail"])) { ?>
        <form action="" method="POST" id="es">
            <?php
            $sqlr = "SELECT * FROM relation_internautejeuvideo WHERE mail='$mail' AND codeJeu='$codeJeu'";
            $resultr = mysqli_query($conn, $sqlr);
            if (mysqli_num_rows($resultr) > 0) {
            ?>
                <input type="submit" value="Supprimer" name="supprimer">
            <?php } else { ?>
                <input type="submit" value="Enregistrer" name="enregistrer">
            <?php } ?>
        </form>
    <?php } ?>

    <div id="details">
        <p><b>Type:</b> <?php echo $typeJeu ?></p>
        <p><b>Fonctionnement:</b> <?php echo $fonctionnement ?></p>
        <p><b>Editeur:</b> <?php echo $editeur ?></p>
        <p><b>Mode:</b> <?php echo $mode ?></p>
        <p><b>Date d'ajout:</b> <?php echo $dateAjout ?></p>
        <p><b>Consoles:</b>
            <?php
            if (mysqli_num_rows($resultcj) > 0) {
                $rowcj = mysqli_fetch_assoc($resultcj);
                $codeConsole = $rowcj["codeConsole"];
                $sqlc = "SELECT * FROM console WHERE codeConsole='$codeConsole'";
                $resultc = mysqli_query($conn, $sqlc);
                $rowc = mysqli_fetch_assoc($resultc);
                echo "<a href='console.php?codeConsole=$codeConsole'>" . $rowc["designation"] . "</a>";
                while ($rowcj = mysqli_fetch_assoc($resultcj)) {
                    $codeConsole = $rowcj["codeConsole"];
                    $sqlc = "SELECT * FROM console WHERE codeConsole='$codeConsole'";
                    $resultc = mysqli_query($conn, $sqlc);
                    $rowc = mysqli_fetch_assoc($resultc);
                    echo ", " . "<a href='console.php?codeConsole=$codeConsole'>" . $rowc["designation"] . "</a>";
                }
            }
            ?>
        </p>
    </div>
</div>
<br id="cb">
<p>description: <?php echo $description ?></p>
<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
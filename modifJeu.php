<?php
include("inc.config.php");

$sqlc = "SELECT * FROM console";
$resultc = mysqli_query($conn, $sqlc);


if (isset($_GET["codeJeu"]) AND isset($_SESSION["admin"])) {
    $codeJeu = $_GET["codeJeu"];
    $sqlj = "SELECT * FROM jeuvideo WHERE codeJeu='$codeJeu'";
    $resultj = mysqli_query($conn, $sqlj);

    if (mysqli_num_rows($resultj) > 0) {
        $rowj = mysqli_fetch_assoc($resultj);
        $titre = $rowj["titre"];
        $typeJeu = $rowj["typeJeu"];
        $description = $rowj["description"];
        $fonctionnement = $rowj["fonctionnement"];
        $editeur = $rowj["editeur"];
        $mode = $rowj["mode"];
	$photo = $rowj["photo"];
    }
} else {
	header("Location: jeux.php");
}

if (isset($_POST["supprimer"])) {

 $sqls = "DELETE FROM jeuvideo WHERE codeJeu='$codeJeu'";
            mysqli_query($conn, $sqls);

$sqlq = "SELECT * FROM relation_consolejeuvideo WHERE codeJeu='$codeJeu'";
    $resultq = mysqli_query($conn, $sqlq);
    if (mysqli_num_rows($resultq) > 0) {
        while (mysqli_fetch_assoc($resultq)) {
            $sqld = "DELETE FROM relation_consolejeuvideo WHERE codeJeu='$codeJeu'";
            mysqli_query($conn, $sqld);
        }
    }	
if (file_exists("photo/$photo")) {
            unlink("photo/$photo");
        }

$message = "Jeu supprimé avec succes";
header("Location: jeux.php?message=$message");

}

if (isset($_POST["modifier"])) {
    $titre = mysqli_real_escape_string($conn, $_POST["titre"]);
    $typeJeu = mysqli_real_escape_string($conn, $_POST["typeJeu"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $fonctionnement = mysqli_real_escape_string($conn, $_POST["fonctionnement"]);
    $editeur = mysqli_real_escape_string($conn, $_POST["editeur"]);
    $mode = mysqli_real_escape_string($conn, $_POST["mode"]);
    /////////////////////// PHOTOREUPLOAD /////////////////////////////////////////////////////////////////////
    if (isset($_FILES["photo"])) {
        $target_dir = "photo/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists("photo/$codeJeu.$imageFileType")) {
            unlink("photo/$codeJeu.$imageFileType");
        }

        // Check file size
        if ($_FILES["photo"]["size"] > 500000) {
            $message .= "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message .= "Sorry, your file was not uploaded.<br>";
            // if everything is ok, try to upload file
        } else {
            $photo = $codeJeu . "." . $imageFileType;
            $newFile = $target_dir . $photo;
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $newFile)) {
                $message .= "The file " . htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.<br>";
            } else {
                $message .= "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
    /////////////////////////// /PHOTOREUPLOAD////////////////////////////////////////////////////////////////////


    $sqlm = "UPDATE jeuvideo SET titre='{$titre}', typeJeu='{$typeJeu}', description='{$description}', fonctionnement='{$fonctionnement}', editeur='{$editeur}', mode='{$mode}', photo='{$photo}' WHERE codeJeu='$codeJeu'";
    if (mysqli_query($conn, $sqlm)) {
        $message = "Le jeu a été mis à jour avec succes";
    } else {
        $message = "Error: " . $sqlm . "<br>" . mysqli_error($conn);
    }

    $sqlq = "SELECT * FROM relation_consolejeuvideo WHERE codeJeu='$codeJeu'";
    $resultq = mysqli_query($conn, $sqlq);
    if (mysqli_num_rows($resultq) > 0) {
        while (mysqli_fetch_assoc($resultq)) {
            $sqld = "DELETE FROM relation_consolejeuvideo WHERE codeJeu='$codeJeu'";
            mysqli_query($conn, $sqld);
        }
    }

    $codeConsole = $_POST["codeConsole"];
    foreach ($codeConsole as $value) {
        $sql = "INSERT INTO relation_consolejeuvideo(codeConsole,codeJeu) 
        VALUE('{$value}','{$codeJeu}')";
        mysqli_query($conn, $sql);
    }

    header("Location:jeu.php?codeJeu=$codeJeu&message=$message");
}


$title = "Modifier le jeu";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<form action="" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Modifier Jeu Video</legend>
        <table>
            <tr>
                <td><label for="titre">Titre</label></td>
                <td><input type="text" name="titre" id="titre" value="<?php echo $titre ?>"></td>
            </tr>
            <tr>
                <td><label for="typeJeu">typeJeu</label></td>
                <td><input type="text" name="typeJeu" id="typeJeu" value="<?php echo $typeJeu ?>"></td>
            </tr>
            <tr>
                <td><label for="description">description</label></td>
                <td><textarea name="description" id="description"><?php echo $description ?></textarea></td>
            </tr>
            <tr>
                <td><label for="fonctionnement">fonctionnement</label></td>
                <td><input type="text" name="fonctionnement" id="fonctionnement" value="<?php echo $fonctionnement ?>"></td>
            </tr>
            <tr>
                <td><label for="editeur">Editeur</label></td>
                <td><input type="text" name="editeur" id="editeur" value="<?php echo $editeur ?>"></td>
            </tr>
            <tr>
                <td><label for="mode">Modes: </label></td>
                <td>
                    <select name="mode" id="mode" required>
                        <option value="0" <?php if ($mode == 0) {
                                                echo "selected";
                                            } ?>></option>
                        <option value="1" <?php if ($mode == 1) {
                                                echo "selected";
                                            } ?>>En ligne</option>
                        <option value="2" <?php if ($mode == 2) {
                                                echo "selected";
                                            } ?>>Hors connexion</option>
                        <option value="3" <?php if ($mode == 3) {
                                                echo "selected";
                                            } ?>>Les 2</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="photo">photo</label></td>
                <td><input type="file" name="photo" id="photo"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td><label for="">Consoles</label></td>
                <td><?php
                    if (mysqli_num_rows($resultc) > 0) {
                        while ($rowc = mysqli_fetch_assoc($resultc)) {
                            $codeConsole = $rowc["codeConsole"];
                            $designation = $rowc["designation"];
                            $sqlcj = "SELECT * FROM relation_consolejeuvideo WHERE codeConsole='$codeConsole' AND codeJeu='$codeJeu'";
                            $resultcj = mysqli_query($conn, $sqlcj);
                    ?>
                            <input type="checkbox" name="codeConsole[]" id='<?php echo $codeConsole ?>' value='<?php echo $codeConsole ?>' <?php if (mysqli_num_rows($resultcj) > 0) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                            <label for='<?php echo $codeConsole ?>'><?php echo $designation ?></label><br>

                    <?php }
                    } ?>
                </td>
            </tr>
        </table>
        <br>

        <input type="submit" value="Modifier le jeu video" name="modifier">
	<input type="submit" value="Supprimer le jeu video" name="supprimer" onclick="return confirm('Voulez vous vraiment supprimer le jeu video?')">
    </fieldset>
</form>

<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
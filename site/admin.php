<?php
include("inc.config.php");

$_SESSION["admin"] = "admin";

$sqlc = "SELECT * FROM console";
$resultc = mysqli_query($conn, $sqlc);

$message = "";

if (isset($_POST["console"])) {
    ////////// keygenerator //////////
    do {
        include("inc.keygenerator.php");
        $codeConsole =  "c" . $keyString;
        $sqlk = "SELECT * FROM console WHERE codeConsole='$codeConsole'";
        $resultk = mysqli_query($conn, $sqlk);
    } while (mysqli_num_rows($resultk) > 0);
    ////////// /keygenerator //////////
    $designation = mysqli_real_escape_string($conn, $_POST["designation"]);
    $marque = mysqli_real_escape_string($conn, $_POST["marque"]);

    $sql = "INSERT INTO console(codeConsole,designation,marque) 
    VALUE('{$codeConsole}','{$designation}','{$marque}')";
    if (mysqli_query($conn, $sql)) {
        $message = "La console a eté ajoutée avec succes";
        header("Location: admin.php?message=$message");
    } else {
        $message = "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
}

if (isset($_POST["jeuvideo"])) {
    ////////// keygenerator //////////
    do {
        include("inc.keygenerator.php");
        $codeJeu =  "j" . $keyString;
        $sqlk = "SELECT * FROM jeuvideo WHERE codeJeu='$codeJeu'";
        $resultk = mysqli_query($conn, $sqlk);
    } while (mysqli_num_rows($resultk) > 0);
    ////////// /keygenerator //////////
    $titre = mysqli_real_escape_string($conn, $_POST["titre"]);
    $typeJeu = mysqli_real_escape_string($conn, $_POST["typeJeu"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $fonctionnement = mysqli_real_escape_string($conn, $_POST["fonctionnement"]);
    $editeur = mysqli_real_escape_string($conn, $_POST["editeur"]);
    $mode = mysqli_real_escape_string($conn, $_POST["mode"]);
    /////////////////////// PHOTOUPLOAD /////////////////////////////////////////////////////////////////////
    $photo = "";
    if (isset($_FILES["photo"])) {
        $target_dir = "photo/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
    /////////////////////////// /PHOTOUPLOAD////////////////////////////////////////////////////////////////////
    $dateAjout = date('Y-m-d');

    $sql = "INSERT INTO jeuvideo(codeJeu,titre,typeJeu,description,fonctionnement,editeur,mode,photo,dateAjout) 
    VALUE('{$codeJeu}','{$titre}','{$typeJeu}','{$description}','{$fonctionnement}','{$editeur}','{$mode}','{$photo}','{$dateAjout}')";
    if (mysqli_query($conn, $sql)) {
        $message .= "Le jeu a eté ajoutée avec succes.<br>";
        header("Location: jeu.php?codeJeu=$codeJeu");
    } else {
        $message .= "Error:" . $sql . "<br>" . mysqli_error($conn);
    }

    $codeConsole = $_POST["codeConsole"];
    foreach ($codeConsole as $value) {
        $sql = "INSERT INTO relation_consolejeuvideo(codeConsole,codeJeu) 
        VALUE('{$value}','{$codeJeu}')";
        mysqli_query($conn, $sql);
    }
}

$title = "Admin";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2>Admin</h2>

<section>
    <form action="" method="POST">
        <fieldset>
            <legend>Ajouter Console</legend>
            <table>
                <tr>
                    <td><label for="designation">Designation*:</label></td>
                    <td><input type="text" name="designation" id="designation" required></td>
                </tr>
                <tr>
                    <td><label for="marque">Marque:</label></td>
                    <td><input type="text" name="marque" id="marque"></td>
                </tr>
            </table>
            <br>

            <input type="submit" value="Inserer la console" name="console">
        </fieldset>
    </form>
</section>

<br>
<!-- ///////////////////////////////////////////////////////////////////////////// -->
<br>

<section>
    <form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Ajouter Jeu Video</legend>
            <table>
                <tr>
                    <td><label for="titre">Titre*</label></td>
                    <td><input type="text" name="titre" id="titre" required></td>
                </tr>
                <tr>
                    <td><label for="typeJeu">typeJeu</label></td>
                    <td><input type="text" name="typeJeu" id="typeJeu"></td>
                </tr>
                <tr>
                    <td><label for="description">description</label></td>
                    <td><textarea name="description" id="description"></textarea></td>
                </tr>
                <tr>
                    <td><label for="fonctionnement">fonctionnement</label></td>
                    <td><input type="text" name="fonctionnement" id="fonctionnement"></td>
                </tr>
                <tr>
                    <td><label for="editeur">Editeur*</label></td>
                    <td><input type="text" name="editeur" id="editeur" required></td>
                </tr>
                <tr>
                    <td><label for="mode">Modes: </label></td>
                    <td>
                        <select name="mode" id="mode" required>
                            <option value="0"></option>
                            <option value="1">En ligne</option>
                            <option value="2">Hors connexion</option>
                            <option value="3">Les 2</option>
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
                    <td><label>Consoles</label></td>
                    <td><?php
                        if (mysqli_num_rows($resultc) > 0) {
                            while ($rowc = mysqli_fetch_assoc($resultc)) {
                        ?>

                                <input type="checkbox" name="codeConsole[]" id='<?php echo $rowc["codeConsole"] ?>' value='<?php echo $rowc["codeConsole"] ?>'>
                                <label for='<?php echo $rowc["codeConsole"] ?>'><?php echo $rowc["designation"] ?></label><br>

                        <?php }
                        } ?>
                    </td>
                </tr>
            </table>
            <br>

            <input type="submit" value="Inserer le jeu video" name="jeuvideo">
        </fieldset>
    </form>
</section>
<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
<?php
include("inc.config.php");



if (isset($_POST["supprimer"])) {

    $sqls = "DELETE FROM internaute WHERE mail='$mail'";
    mysqli_query($conn, $sqls);

    $sqlq = "SELECT * FROM relation_internautejeuvideo WHERE mail='$mail'";
    $resultq = mysqli_query($conn, $sqlq);
    if (mysqli_num_rows($resultq) > 0) {
        while (mysqli_fetch_assoc($resultq)) {
            $sqld = "DELETE FROM relation_internautejeuvideo WHERE mail='$mail'";
            mysqli_query($conn, $sqld);
        }
    }

    $message = "Profil supprimé avec succes";
    header("Location: consoles.php?message=$message");
}

if (isset($_POST["modifier"])) {
    $redir = 1;
    $nom_prenoms = mysqli_real_escape_string($conn, $_POST["nom_prenoms"]);
    $mailn = mysqli_real_escape_string($conn, $_POST["mail"]);

    if ($mail != $mailn) {
        $sqlq = "SELECT * FROM relation_internautejeuvideo WHERE mail='$mail'";
        $resultq = mysqli_query($conn, $sqlq);
        if (mysqli_num_rows($resultq) > 0) {
            while ($rowq = mysqli_fetch_assoc($resultq)) {
                $codeJeu = $rowq["codeJeu"];
                $sqli = "INSERT INTO relation_internautejeuvideo(mail, codeJeu) 
            VALUE('{$mailn}','{$codeJeu}')";
                if (mysqli_query($conn, $sqli)) {
                    $sqld = "DELETE FROM relation_internautejeuvideo WHERE mail='$mail'";
                    mysqli_query($conn, $sqld);
                } else {
                    $redir = 0;
                    echo "Errroorr";
                }
            }
        }
    }

    $adresse = mysqli_real_escape_string($conn, $_POST["adresse"]);
    $sexe = mysqli_real_escape_string($conn, $_POST["sexe"]);
    $pays = mysqli_real_escape_string($conn, $_POST["pays"]);
    $sqlm = "UPDATE internaute SET nom_prenoms='{$nom_prenoms}', mail='{$mailn}', adresse='{$adresse}', sexe='{$sexe}', pays='{$pays}' WHERE mail='$mail'";
    if (mysqli_query($conn, $sqlm)) {
        $message .= "Le profile a été mise à jour avec succes<br>";
        $_SESSION["mail"] = $mailn;
    } else {
        $message .= "Error: " . $sqlm . "<br>" . mysqli_error($conn);
    }
    if (!empty($_POST["ancient"]) and !empty($_POST["mot_passe"])) {

        $ancient = mysqli_real_escape_string($conn, $_POST["ancient"]);
        $mot_passe = mysqli_real_escape_string($conn, $_POST["mot_passe"]);

        $sqlmp = "SELECT * FROM internaute WHERE mail='$mail'";
        $resultmp = mysqli_query($conn, $sql);
        if (mysqli_num_rows($resultmp) > 0) {
            $rowmp = mysqli_fetch_assoc($resultmp);
            $verify = password_verify($ancient, $rowmp["mot_passe"]);
            if ($verify) {
                $mot_passe = password_hash($mot_passe, PASSWORD_BCRYPT);
                $sqlp = "UPDATE internaute SET mot_passe='{$mot_passe}' WHERE mail='$mail'";
                if (mysqli_query($conn, $sqlp)) {
                    $message .= "Le mot de passe a été mis à jour avec succes";
                } else {
                    $message .= "Error: " . $sqlm . "<br>" . mysqli_error($conn);
                }
            } else {
                $message = "Ancient mode de passe erronés!";
                $redir = 0;
            }
        }
    } else {
        $message .= "Le mot de passe n'a pas été mis à jour";
    }
    if ($redir == 1) {
        header("Location:profil.php?message=$message");
    }
}


$title = "Modifier la console";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>
<h2>Modifier profil</h2>
<form action="" method="POST">
    <fieldset>
        <legend>Informations</legend>
        <table>
            <tr>
                <td>
                    <label for="nom_prenoms">Nom et Prenoms*: </label>
                </td>
                <td>
                    <input type="text" name="nom_prenoms" id="nom_prenoms" required value="<?php echo $nom_prenoms ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mail">Email*: </label>
                </td>
                <td>
                    <input type="email" name="mail" id="mail" required value="<?php echo $mail ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="adresse">Adresse: </label>
                </td>
                <td>
                    <input type="text" name="adresse" id="adresse" value="<?php echo $adresse ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Sexe*: </label>
                </td>
                <td>
                    <input type="radio" name="sexe" id="sexem" value="M" required <?php if ($sexe == "M") {
                                                                                        echo "checked";
                                                                                    } ?>>
                    <label for="sexem">Masculin</label>
                    <br>
                    <input type="radio" name="sexe" id="sexef" value="F" required <?php if ($sexe == "F") {
                                                                                        echo "checked";
                                                                                    } ?>>
                    <label for="sexef">Feminin</label>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pays">Pays: </label>
                </td>
                <td>
                    <input type="text" name="pays" id="pays" value="<?php echo $pays ?>">
                </td>
            </tr>

        </table>
        <br>
    </fieldset>
    <fieldset>
        <legend>Mot de passe</legend>
        <table>
            <tr>
                <td><label for="ancient">ancient mot de passe</label></td>
                <td><input type="password" name="ancient" id="ancient"></td>
            </tr>
            <tr>
                <td><label for="mot_passe">Nouveau mot de passe</label></td>
                <td><input type="password" name="mot_passe" id="mot_passe"></td>
            </tr>
        </table>

    </fieldset>

    <input type="submit" value="Modifier le profil" name="modifier">
    <input type="submit" value="Supprimer le profil" name="supprimer" onclick="return confirm('Voulez vous vraiment supprimer le profil?')">
</form>

<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
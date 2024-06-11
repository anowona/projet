<?php
include("inc.config.php");

if (isset($_POST["connexion"])) {
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $mot_passe = mysqli_real_escape_string($conn, $_POST["mot_passe"]);

    $sql = "SELECT * FROM internaute WHERE mail='$mail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $verify = password_verify($mot_passe, $row["mot_passe"]);
        if ($verify) {
            $_SESSION["mail"] = $mail;
            header("Location: profil.php");
            exit;
        } else {
            $message = "Identifiants erronés!";
        }
    } else {
        $message = "Identifiants erronés!";
    }
}

if (isset($_POST["inscription"])) {
    $nom_prenoms = mysqli_real_escape_string($conn, $_POST["nom_prenoms"]);
    $mail = mysqli_real_escape_string($conn, $_POST["mail"]);
    $mot_passe = mysqli_real_escape_string($conn, $_POST["mot_passe"]);
    $mot_passe = password_hash($mot_passe, PASSWORD_BCRYPT);
    $adresse = mysqli_real_escape_string($conn, $_POST["adresse"]);
    $sexe = mysqli_real_escape_string($conn, $_POST["sexe"]);
    $pays = mysqli_real_escape_string($conn, $_POST["pays"]);
    $date_inscr = date('Y-m-d');

    $sql = "SELECT * FROM internaute WHERE mail='$mail'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        $sql = "INSERT INTO internaute(nom_prenoms,mail,mot_passe,adresse,sexe,pays,date_inscr)
        VALUE('{$nom_prenoms}','{$mail}','{$mot_passe}','{$adresse}','{$sexe}','{$pays}','{$date_inscr}')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION["mail"] = $mail;
            header("Location: profil.php");
            exit;
        } else {
            $message = "Error:" . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $message = "Cet email existe deja!";
    }
}

$title = "Formulaire";
$metaDescription = "Inscrivez vous et connectez vous ici";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>
<section>
    <h2>Connexion</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Connexion</legend>
            <table>
                <tr>
                    <td>
                        <label for="mail">Email: </label>
                    </td>
                    <td>
                        <input type="email" name="mail" id="mail" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mot_passe">Password: </label>
                    </td>
                    <td>
                        <input type="password" name="mot_passe" id="mot_passe" maxlength="20" required><br>
                    </td>
                </tr>
            </table>
            <br>

            <input type="submit" value="Se connecter" name="connexion">
        </fieldset>
    </form>
</section>

<br>
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////// -->
<br>

<section>
    <h2>Inscription</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Inscription</legend>
            <table>
                <tr>
                    <td>
                        <label for="nom_prenoms">Nom et Prenoms*: </label>
                    </td>
                    <td>
                        <input type="text" name="nom_prenoms" id="nom_prenoms" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mail">Email*: </label>
                    </td>
                    <td>
                        <input type="email" name="mail" id="mail" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mot_passe">Password*: </label>
                    </td>
                    <td>
                        <input type="password" name="mot_passe" id="mot_passe" maxlength="20" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse: </label>
                    </td>
                    <td>
                        <input type="text" name="adresse" id="adresse">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Sexe: </label>
                    </td>
                    <td>
                        <input type="radio" name="sexe" id="sexem" value="M">
                        <label for="sexem">Masculin</label>
                        <br>
                        <input type="radio" name="sexe" id="sexef" value="F">
                        <label for="sexef">Feminin</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pays">Pays: </label>
                    </td>
                    <td>
                        <input type="text" name="pays" id="pays">
                    </td>
                </tr>

            </table>
            <br>

            <input type="submit" value="S'inscrire" name="inscription">
        </fieldset>
    </form>
</section>


<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
<?php
include("inc.config.php");

if (isset($_GET["codeConsole"])) {
    $codeConsole = $_GET["codeConsole"];
    $sqlc = "SELECT * FROM console WHERE codeConsole='$codeConsole'";
    $resultc = mysqli_query($conn, $sqlc);

    if (mysqli_num_rows($resultc) > 0) {
        $rowc = mysqli_fetch_assoc($resultc);
        $designation = $rowc["designation"];
        $marque = $rowc["marque"];
    }
}

if (isset($_POST["modifier"])) {
    $designation = mysqli_real_escape_string($conn, $_POST["designation"]);
    $marque = mysqli_real_escape_string($conn, $_POST["marque"]);
    $sqlm = "UPDATE console SET designation='{$designation}', marque='{$marque}' WHERE codeConsole='$codeConsole'";
    if (mysqli_query($conn, $sqlm)) {
        $message = "La console a été mise à jour avec succes";
    } else {
        $message = "Error: " . $sqlm . "<br>" . mysqli_error($conn);
    }
    header("Location:console.php?codeConsole=$codeConsole&message=$message");
}


$title = "Modifier la console";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<form action="" method="POST">
    <fieldset>
        <legend>Modifier la console</legend>
        <table>
            <tr>
                <td><label for="designation"></label></td>
                <td><input type="text" name="designation" id="designation" value="<?php echo $designation ?>"></td>
            </tr>
            <tr>
                <td><label for="marque"></label></td>
                <td><input type="text" name="marque" id="marque" value="<?php echo $marque ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Modifier" name="modifier">
    </fieldset>
</form>

<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
<?php
include("inc.config.php");

$sqljv = "SELECT * FROM jeuvideo";
$resultjv = mysqli_query($conn, $sqljv);


$title = "Jeux";
$metaDescription = "Les jeux video";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2>Jeux</h2>
<?php
if (mysqli_num_rows($resultjv) > 0) {
    while ($rowjv = mysqli_fetch_assoc($resultjv)) {
        include("inc.article.php");
    }
}
?>
<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
<?php
include("inc.config.php");

$sqlc = "SELECT * FROM console";
$resultc = mysqli_query($conn, $sqlc);


$title = "Consoles";
$metaDescription = "plouf";
//////////////////////////////// HEAD ////////////////////////////////////////////////////////////////
include("inc.head.php");
//////////////////////////////// /HEAD ////////////////////////////////////////////////////////////////
?>

<h2>Consoles</h2>
<ul>
    <?php
    if (mysqli_num_rows($resultc) > 0) {
        while ($rowc = mysqli_fetch_assoc($resultc)) {
    ?>
            <li><a href="console.php?codeConsole=<?php echo $rowc["codeConsole"] ?>"><?php echo $rowc["designation"] ?></a></li>
    <?php
        }
    }
    ?>
</ul>

<?php
//////////////////////////////// FOOTER ////////////////////////////////////////////////////////////////
include("inc.footer.php");
//////////////////////////////// /FOOTER ////////////////////////////////////////////////////////////////
?>
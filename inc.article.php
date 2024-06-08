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
<?php
require('./gabarits/header.php');
//test de présence des variable nécéssaires
if (!isset($_GET["nombreEleves"]) || !isset($_GET["nombreNotes"])) {
    echo "Vous avez oubliez une valeur";
    return;
}

//attribution des variables
$nombreDeLigne = $_GET["nombreEleves"];
$nombreDeColonne = $_GET["nombreNotes"];
$index = 1;
?>

<h2>Formulaire D'entrée des notes</h2>
<!-- génération du formulaire -->
<table class="table">
    <thead>
        <tr>
            <td>
                Nom de l'élève
            </td>
            <?php
            for ($n = 0; $n < $nombreDeColonne; $n++) {
                echo "
               <td>
                    Note $index
                </td>
               ";
                $index++;
            }
            ?>
        </tr>
    </thead>
    <tbody id="formulaireAjoutEleve">
        <form method="post" action="validationDesDonnees.php">
            <?php
            if (!isset($_GET["nombreEleves"]) || !isset($_GET["nombreNotes"])) {
                echo "Vous avez oublié une valeur";
                return;
            }
            for ($i = 0; $i < $nombreDeLigne; $i++) {
                echo "<tr class=\"ligneAjoutDeNotes\">
                    <td>
                        <input type=\"text\" name=\"noms[$i]\" placeholder=\"Entrez le nom de l'élève\" required/>
                    </td>";
                for ($k = 0; $k < $nombreDeColonne; $k++) {
                    echo "<td>
                            <input type=\"number\" name=\"notes[$i][$k]\" required min=\"0\" max=\"20\" />
                            </td>";
                }
                echo "</tr>";
            }
            ?>
    </tbody>
</table>
<input type="submit">
</form>

<?php
require('./gabarits/footer.php');
?>
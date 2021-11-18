<?php
require('./gabarits/header.php')
?>
<!-- Generation du tableau -->
<table class="table">
    <thead>
        <tr>
            <th>Liste de notes</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('sommeDesNotes.php');
        include('calculDeMoyenne.php');
        $nombreDeNotes = count($tableauNotes[0]);
        ?>
        <tr>
            <th class="table-info" scope="row">Noms</th>
            <?php
            for ($i = 0; $i < $nombreDeNotes; $i++) {
                echo "<th class=\"table-info\" scope=\"row\">Note " . $i + 1 . "</th>";
            }

            ?>
            <th class="table-info" scope="row">Moyenne</th>
        </tr>
        <?php
        $tableauMoyenne = [];
        foreach ($tableauNomsNotes as $noms => $notes) {
            $somme = sommeDesNotes($notes);
            $moyenne = calculDeMoyenne($somme, count($notes));
            array_push($tableauMoyenne, $moyenne);
            echo  "<tr>";
            echo  "<th scope=\"row\" >$noms</th>";
            foreach ($notes as $index => $note) {
                echo "<td>$note/20</td>";
            }
            echo "<td>" . number_format($moyenne, 2, ',', '') . "/20</td>
                        </tr>";
        }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <?php

            $moyenneGeneral = calculDeMoyenne(sommeDesNotes($tableauMoyenne), count($tableauMoyenne));
            $nombreDeNotes = $nombreDeNotes + 1;
            echo "<td colspan=\"$nombreDeNotes\">
                        Moyenne général :
                    </td>
                    <td>
                    " . number_format($moyenneGeneral, 2, ',', '') . "
                       /20
                    </td>"
            ?>
        </tr>
    </tfoot>
</table>
<p>Un fichier texte est automatiquement générer</p>
<!-- Exportation des données -->
<?php
//Formatage des données pour le fichier texte                   
$donneFormater = "";
foreach ($tableauNomsNotes as $nom => $notes) {
    $donneFormater = $donneFormater . "  $nom => notes "
        . implode('/20 , ',  $notes) . "/20" . '   Moyenne  '
        . number_format(calculDeMoyenne(
            sommeDesNotes($notes),
            count($notes)
        ), 2, ',', '') . "/20" . "\n";
}
$fichier = fopen('Releve_de_notes.txt', 'w+');
fwrite($fichier, $donneFormater);
fclose($fichier)
?>
<?php
require('./gabarits/footer.php')
?>
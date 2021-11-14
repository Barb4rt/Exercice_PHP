<?php
    require('./gabarits/header.php')
?> 
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
                    for ($i=0; $i < $nombreDeNotes ; $i++) { 
                        echo "<th class=\"table-info\" scope=\"row\">Note " . $i + 1 . "</th>";
                    }
                    
                    ?>
                    <th class="table-info" scope="row">Moyenne</th>
                </tr>
                <?php
                $tableauMoyenne = [];
                foreach ($tableauNomsNotes as $noms => $notes) 
                {
                    $somme = sommeDesNotes($notes);
                    $moyenne = calculDeMoyenne($somme, count($notes));
                    array_push($tableauMoyenne, $moyenne) ;
                    echo  "<tr>";
                        echo  "<th scope=\"row\" >$noms</th>";
                            foreach ($notes as $index => $note) 
                            {
                                echo"<td>$note</td>";     
                            }
                        echo"<td> $moyenne </td>
                        </tr>";
                        }
                    ?>
            </tbody>
            <tfoot>
                <tr>
                    <?php
                    
                    $moyenneGeneral = calculDeMoyenne(sommeDesNotes($tableauMoyenne), count($tableauMoyenne));
                    $nombreDeNotes = $nombreDeNotes + 1;
                    echo"<td colspan=\"$nombreDeNotes\">
                        Moyenne général :
                    </td>
                    <td>
                       $moyenneGeneral 
                    </td>"
                    ?> 
                </tr>
            </tfoot>
        </table>
        <?php
    require('./gabarits/footer.php')
?> 
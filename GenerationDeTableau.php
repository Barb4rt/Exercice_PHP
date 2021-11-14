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
                ?>
                <tr> 
                    <th class="table-info" scope="row">Noms</th>
                    <th class="table-info" scope="row">Note 1</th>
                    <th class="table-info" scope="row" >Note 2</th>
                    <th class="table-info" scope="row">Note 3</th>
                    <th class="table-info" scope="row">Note 4</th>
                    <th class="table-info" scope="row">Somme</th>
                    <th class="table-info" scope="row">Moyenne</th>
                </tr>
                <?php
                $listeDesMoyenne = array();
                foreach ($tableauNomsNotes as $noms => $notes) 
                {   
                    $somme = sommeDesNotes($notes);
                    $moyenne = calculDeMoyenne($somme, count($notes));
                    array_push($listeDesMoyenne, $moyenne);
                    print_r($listeDesMoyenne);
                    echo  "<tr>";
                        echo  "<th scope=\"row\" >$noms</th>";
                            foreach ($notes as $index => $note) 
                            {
                                echo"<td>$note</td>";

                            }
                        echo"<td> $somme </td>
                            <td> $moyenne </td>
                        </tr>";
                    }
                echo "
                    <tr>
                        <td>
                            Moyenne général
                        </td>
                        <td>
                        ".calculDeMoyenne(sommeDesNotes($listeDesMoyenne), count($listeDesMoyenne))."
                        </td>
                    </tr>
                        "
                    ?>
            </tbody>
        </table>
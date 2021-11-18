<?php
    if ( isset($_POST["noms"]) && isset($_POST["notes"]) ) {
        $tableauNoms = $_POST["noms"];
        $tableauNotes = $_POST["notes"];
        $tableauNomsNotes = array_combine($tableauNoms,$tableauNotes);
        return include("affichageDuTableau.php");
    }

<?php
// Calcule la somme des notes attends un tableau renvoie un decimal
 function sommeDesNotes( array $tableauDeDonnees) :float
 {  
    $somme = 0;
    foreach ($tableauDeDonnees as $donnees => $donne) 
    {
        $somme = $somme + $donne;
    }
    return $somme;
 }
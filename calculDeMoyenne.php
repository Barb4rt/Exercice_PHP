<?php

function calculDeMoyenne( float $somme , int $longueurDuTableau) : float
{
    if($longueurDuTableau > 0){
        return $somme/$longueurDuTableau; 
    }
    return error_reporting("Données non comformes") ;
}
<?php

//
// Fonction permettant de savoir si un internaute est connecté ou pas
//
function internauteEstConnecte(){
    if(!isset($_SESSION["membre"])) return false;
    else return true;
}

//
// Fonction permettant de savoir si un internaute est administrateur du site
//
function internauteEstConnecteEtEstAdmin(){
    if(internauteEstConnecte() && $_SESSION["membre"]["statut"] == 1){
        return true;
    } else {
        return false;
    }
    
}

?>
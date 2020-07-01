<!DOCTYPE html>
<html>
<head>
    <title>Boutique PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="inc/css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
    <body>

        <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link active" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                <?php if(internauteEstConnecteEtEstAdmin()) { ?>
                <a class="nav-item nav-link" href="gestion_commandes.php">Gestion des produits</a>
                <a class="nav-item nav-link" href="gestion_produits.php">Gestion des commandes</a>
                <a class="nav-item nav-link" href="contact.php">Contact</a>

                <!-- Si l'internaute est connecté il pourra se déconnecter -->
                    <a href="index.php?action=deconnexion" title="Me déconnecter">
                        <svg id="button_disconnect" class="bi bi-x-circle-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                        </svg>
                    </a>
                <?php } ?>
                </div>
            </div>
        </nav>
            
        <div class="row">
            
            <?php if(internauteEstConnecteEtEstAdmin()) { ?>

                <div class="col-md-2">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="ajout_produit.php"> Ajouter un produit </a>
                        </li>
                        <li class="list-group-item">
                            <a href="gestion_produits.php"> Gestion des produits </a>
                        </li>
                        <li class="list-group-item">
                            <a href="liste_produits.php"> Liste des produits </a>
                        </li>
                        <li class="list-group-item">
                            <a href="gestion_commandes.php"> Gestion des commandes </a>
                        </li>
                        <li class="list-group-item">
                            <a href="contact.php"> Contact </a>
                        </li>
                        <li class="list-group-item">
                            <a href="liste_contact.php"> Liste demandes de contact </a>
                        </li>
                    </ul>
                </div>
            
            <?php } ?>


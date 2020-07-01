<?php

require_once("inc/init.php");

    // L'idée générale est de pouvoir se connecter à son profil

    // si je suis dans le cadre d'une deconnexion
    if(isset($_GET["action"]) && $_GET["action"] == "deconnexion"){
        unset($_SESSION["membre"]); // je supprimer ma session membre dans ma session
    }

    // SI je tente de me connecter
    if($_POST){

        // Je récupère les infos liées au pseudo renseigné
        $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]' ");
        if($r->rowCount() >= 1) { // si j'ai des données liées au pseudo renseigné

            // Je fetch les données récupérées
            $membre = $r->fetch(PDO::FETCH_ASSOC);

            if(password_verify($_POST["mdp"], $membre["mdp"])) { // Si le mot de passe renseigné
                // dans le formulaire est le même que le mot de passe du pseudo en BDD

                // je créé ma session
                $_SESSION["membre"]["id_membre"] = $membre["id_membre"];
                $_SESSION["membre"]["nom"] = $membre["nom"];
                $_SESSION["membre"]["prenom"] = $membre["prenom"];
                $_SESSION["membre"]["email"] = $membre["email"];
                $_SESSION["membre"]["civilite"] = $membre["civilite"];
                $_SESSION["membre"]["code_postal"] = $membre["code_postal"];
                $_SESSION["membre"]["adresse"] = $membre["adresse"];
                $_SESSION["membre"]["ville"] = $membre["ville"];
                $_SESSION["membre"]["statut"] = $membre["statut"];

            } else {
                $content .= "<div class=\"alert alert-danger\" role=\"alert\">
                Veuillez vérifier votre mot de passe!
              </div>";
            }

        } else {
            $content .= "<div class=\"alert alert-danger\" role=\"alert\">
                Veuillez vérifier votre pseudo!
              </div>";
        }
    }


require_once("inc/header.php");


// Si l'internaute est connecté j'affiche le contenu du backoffice
if(internauteEstConnecteEtEstAdmin()){ ?>

    <div class="col-md-10">
        <h1> Bienvenu sur votre BackOffice </h1>
        <p> Sélectionner l'une des rubriques dans la colonnes de gauche </p>
    </div>
<!-- Sinon je lui demande de se connecter -->
<?php } else { ?>

    <h1 style="font-size:16px;width:100%" class="text-center"> Connectez-vous en tant qu'administrateur pour accéder à votre BackOffice </h1>

    <div class="row col-md-10 mx-auto justify-content-center">

        <div class="col-12"> <?php echo $content; ?> </div>

        <div class="w-100"> </div>

        <form action="" method="post">

        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" placeholder="Entrez votre pseudo" name="pseudo">
        </div>

        <div class="form-group">
            <label for="mdp">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name="mdp">
        </div>
        
        <button type="submit" class="btn btn-primary">Me connecter</button>

        </form>

    </div>

<?php } ?>


<?php
require_once("inc/footer.php");
?>
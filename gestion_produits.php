<?php

require_once("inc/init.php");


////////////////////////////////////////////
//////////// RÉCUPÉRATION DES PRODUITS À AFFICHER ////////////////
////////////////////////////////////////////

$r = $pdo->query("SELECT * FROM produit");


require_once("inc/header.php");

?>

<div class="col-md-10">
    <div class="table-responsive">

        <table class="table col-md-12">
            <thead class="thead-dark">
                <tr>

                    <!-- JE RÉCUPÈRE LE NOM DE MES COLONNES EN BDD -->
                    <!-- POUR GÉNÉRER LES TH DE MA TABLE HTML DYNAMIQUEMENT -->

                    <?php for($i=0; $i< $r->columnCount(); $i++ ) { ?>
                        <th> <?php echo $r->getColumnMeta($i)["name"]; ?> </th>
                    <?php } ?>

                </tr>
            </thead>
            <tbody>

                <!-- JE FETCH DANS LE JEU DE RÉSULTAT DE MA REQUÊTE SQL (PDOSTATEMENT)-->
                <!-- J'itère dans tous les produits -->
                <?php while($produit = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                    
                    <tr>
                        <!-- J'itère dans toutes les infos du produit dans lequel j'itère -->
                        <?php foreach($produit as $indice => $valeur) {
                            if($indice == "photo") { ?>
                                <td> <img class="img-fluid" style="width:40px" src="<?php echo $valeur; ?>">  </td>
                           <?php  } else{ ?>
                            <td> <?php echo $valeur;  ?>  </td>
                           <?php } ?>

                        <?php } ?>                    
                    </tr>
                    
                <?php } ?>

            </tbody>
        </table>

    </div>
</div>


<?php
require_once("inc/footer.php");
?>
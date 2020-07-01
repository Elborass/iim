<?php
require_once("inc/init.php");

// Récupération des demandes de contact
$r = $pdo->query("SELECT * FROM contact");

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
                <!-- J'itère dans toutes les demandes de contact -->
                <?php while($contact = $r->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                        <!-- J'itère dans toutes les infos de la demande de contact dans laquelle j'itère -->
                        <?php foreach($contact as $indice => $valeur) { ?>
                            <td> <?php echo $valeur;  ?>  </td>
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
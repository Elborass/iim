<?php
require_once("inc/init.php");

// Récupération des commandes en BDD
$r = $pdo->query("SELECT * FROM commande");

require_once("inc/header.php");

?>
<div class="col-md-10">
   <div class="table-responsive">

      <table class="table col-md-12">
         <thead class="thead-dark">

            <!-- JE RÉCUPÈRE LE NOM DE MES COLONNES EN BDD -->
            <!-- POUR GÉNÉRER LES TH DE MA TABLE HTML DYNAMIQUEMENT -->
            <tr>
               <?php for($i=0; $i< $r->columnCount(); $i++ ) { ?>
               <th> <?php echo $r->getColumnMeta($i)["name"]; ?> </th>
               <?php } ?>
            </tr>

         </thead>

         <tbody>

            <!-- JE FETCH DANS LE JEU DE RÉSULTAT DE MA REQUÊTE SQL (PDOSTATEMENT)-->
            <?php
               // J'itère dans toutes les commandes
               while($commande = $r->fetch(PDO::FETCH_ASSOC)){
                  echo "<tr>";
                  // J'itère dans toutes les infos de la commande dans laquelle j'itère
                  foreach($commande as $valeur){
                     echo "<td>" . $valeur . "</td>";   
                  }
                  echo "</tr>";
               }
               ?>
         </tbody>
      </table>

   </div>
</div>

<?php
require_once("inc/footer.php");
?>
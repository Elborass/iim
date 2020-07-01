<?php
require_once("inc/init.php");

// Récupération des produits
$r = $pdo->query("SELECT * FROM produit");

require_once("inc/header.php");

?>

<div class="col-md-10">

    <div class="row">
        <!-- J'itère dans tous les produits -->
        <?php while($produit = $r->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="card col-4">
                <img class="card-img-top" src="<?php echo $produit["photo"]; ?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $produit["titre"]; ?></h5>
                    <p class="card-text"><?php echo $produit["description"]; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
        
</div>


<?php
require_once("inc/footer.php");
?>
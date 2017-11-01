<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body>

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">THE COLLECTIONS</h1>
<h2 class="superhead">SUPERSSTUF COLLECTED IN A SHOPPING CART</h2>
<div class="container content-container">
    <article>
        <div class="row">
            <div class="col s12">
                <h3><i class="material-icons">shopping_cart</i>SUPERCART COLLECTIONS</h3>
                <p><hr></p>
                <p>Shopping carts are always very well curated selections of the best you can get. <br>These are the shopping card selections form other users.</p>
            </div>
        </div>
        <div class="row">
            <div class="col m8 s12">
                <p>
                    <?php

                    while ($collectionrow = $collections->fetchArray()) {
                        echo "<a href='/Supershop/collection/id/".$collectionrow['id']."'>
                        <h3>'".$collectionrow['collection_title']."'</h3></a>";
                        echo "<h5>selected by ".$collectionrow['username']."</h5>";
                        echo "<p>".$collectionrow['comment']."</p>";
                    }


                    ?>
                </p>
            </div>

        </div>

    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body>

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">YOUR SHOPPINGCART - </h1>
<h2 class="superhead">THIS IS WHAT YOU GOT TO SHARE</h2>
<div class="container content-container">
    <article>
        <div class="row">
            <div class="col s12">
                <h3>Your Superproduct shoppinglist</h3>
            </div>
            <div class="col s6 offset-s1">

                    <?php
                    foreach ($cartitems as $itemkey => $itemvalue) {

                        echo "<i>id:".$itemkey."</i>";

                        $entity = $allentities[$itemkey];
                        echo "<h5>".$entity->getArtistname()."</h5>";
                        echo "<div class=\"content-container__listbox-subheader\">".$entity->getTitle()."</div>";
                        echo "<div class=\"content-container__listbox-tools left-align\">";
                        echo "<a href=\"/Supershop/removefromcart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">remove_shopping_cart</i></a>";
                        echo "<a href=\"/Supershop/addtocart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">add_shopping_cart</i></a>";
                        echo "</div>";

                    }?>


            </div>

            <div class="col s12">
                <hr>
            <a href="/Supershop/Checkout">Checkout and share now</a>
            </div>
        </div>

    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

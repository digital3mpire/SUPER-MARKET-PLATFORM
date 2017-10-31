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
                <h3><i class="material-icons">shopping_cart</i> Your Superproduct shoppinglist</h3>
                <p><hr></p>

            </div>
            <div class="col s6 offset-s1">

                    <?php
                    if (!empty($cartitems)) {
                        foreach ($cartitems as $itemkey => $itemvalue) {

                            $entity = $allentities[$itemkey];
                            echo "<div class=\"content-container__listbox-item\">";
                                echo "<h5>".$entity->getArtistname()."</h5>";
                                echo "<div class=\"content-container__listbox-subheader\">".$entity->getTitle()."</div>";
                                echo "<div class=\"content-container__listbox-tools left-align\">";

                                if (array_key_exists($entity->getAssetid(),$cartitems)) {
                                    echo "<a href=\"/Supershop/removefromcart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">remove_shopping_cart</i></a>";
                                    echo "<i class=\"material-icons lighten \">add_shopping_cart</i>";
                                } else {
                                    echo "<i class=\"material-icons lighten\">remove_shopping_cart</i>";
                                    echo "<a href=\"/Supershop/addtocart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">add_shopping_cart</i></a>";
                                }
                                echo "</div>";
                            echo "</div>";

                        }
                    } else {
                        echo "your shopping cart is empty.<br><a href=\"/Entity/\">GO SHOPPING!</a>";
                    }
                    ?>


            </div>

            <div class="col s12">
                <p><hr></p>
                <a href="/Supershop/Checkout"><h5 class="right-align">Checkout and share now ></h5></a>
            </div>
        </div>

    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

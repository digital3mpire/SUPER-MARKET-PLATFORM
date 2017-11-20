<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body class="shopping">
<!-- <div class="contentoverlay" id="contentoverlay">
<iframe src="https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET"></iframe>
</div>-->
<?php $this->load->view('partials/navigation.php');?>

<h1 class="superhead">ALL SUPER PRODUCTS</h1>
<h2 class="superhead">Art as an open source product</h2>
<div class="container content-container z-depth-3">
    <article>
        <div class="row content-container__list">

            <?php

            foreach ($allentities as $entity) {

                echo "<div class=\"col s6 m6 l3 content-container__listbox\">";
                echo "<div class=\"content-container__listbox-tools right-align\">";
                    if (array_key_exists($entity->getAssetid(),$cartitems)) {
                        echo "<a href=\"/Supershoppingcart/removefromcart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">remove_shopping_cart</i></a>";
                        echo "<i class=\"material-icons lighten \">add_shopping_cart</i>";
                    } else {
                        echo "<i class=\"material-icons lighten\">remove_shopping_cart</i>";
                        echo "<a href=\"/Supershoppingcart/addtocart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">add_shopping_cart</i></a>";
                    }
                //echo "<i class=\"material-icons show-super-product\">queue</i>";
                echo "</div>";

                echo "<a href='https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/tree/master/".$entity->getLinktocontent()."' target='_blank'>";

                echo "<div class=\"content-container__listbox-img right-align\">";
                    if (array_key_exists($entity->getAssetid(),$cartitems)) {
                        echo "<img src=\"".$entity->getThumbnail()."\" alt=\"name\" class=\"selected\" title=\"THE WRONG X\">";
                    } else {
                        echo "<img src=\"".$entity->getThumbnail()."\" alt=\"name\" title=\"THE WRONG X\">";
                    }
                echo "</div>";
                echo "<div class=\"content-container__listbox-mediatype\">";
                echo $entity->getMediatype();
                echo "</div>";
                echo "<div class=\"content-container__listbox-text\">";
                echo "<h6>".$entity->getTitle()."</h6>";
                echo "<div class=\"content-container__listbox-subheader\">".$entity->getArtistname()."</div>";
                echo "</div>";
                echo "</div>";
                echo "</a>";


            }?>

        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

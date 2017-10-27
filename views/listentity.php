<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body>
<div class="contentoverlay" id="contentoverlay">
<iframe src="https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET"></iframe>
</div>
<?php $this->load->view('partials/navigation.php');?>

<h1 class="superhead">A MARKET AFTER THE MARKET ON STEROIDS</h1>

<div class="container content-container">
    <article>
        <div class="row content-container__list">

            <?php foreach ($allentities as $entity) {

                echo "<div class=\"col s3 content-container__listbox\">";
                echo "<h5>".$entity->getTitle()."</h5>";
                echo "<img src=\"".$entity->getThumbnail()."\" alt=\"name\" title=\"THE WRONG X\" class=\"show-super-product\">";
                echo "<div class=\"content-container__listbox-subheader\">".$entity->getArtistname()."</div>";
                echo "<div class=\"content-container__listbox-tools right-align\">";
                echo "<a href=\"/Supershop/removefromcart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">remove_shopping_cart</i></a>";
                echo "<a href=\"/Supershop/addtocart/id/".$entity->getAssetid()."\"><i class=\"material-icons\">add_shopping_cart</i></a>";
                echo "<i class=\"material-icons show-super-product\">queue</i>";
                echo "</div>";
                echo "</div>";


            }?>

        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

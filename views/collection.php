<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body class="collection-page">



<!-- menue -->
<div class="overlay" id="overlay">
    <nav class="overlay-menu">
        <ul>
            <li><a href="/" class="menue-link">HOME</a></li>
            <li><a href="/Supershop/listentity" class="menue-link">Available products</a></li>
            <li><a href="/Brands" class="menue-link">Art brands</a></li>
            <li><a href="/Supershop/collections" class="menue-link">Curated Collections</a></li>
            <li><a href="/Supershop/narrative" class="menue-link">Narrrative (About)</a></li>
            <li><a href="/Supershoppingcart/showcart" class="menue-link">Your Shoppingcart</a></li>
            <li><a href="/Supershop/checkout" class="menue-link">Checkout</a></li>

            <!-- <li><a href="/Welcome/about" class="menue-link">About</a></li>-->
            <li><a href="https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/" class="menue-link">GitHub</a></li>
            <li><a href="http://thewrong.org" class="menue-link">THE WRONG</a></li>
        </ul>
    </nav>
</div>
<div class="row nav-container-collection">

    <div class="col s1 m1 ">

        <div class="button_container" id="toggle">
            <span class="top"></span>
            <span class="middle"></span>
            <span class="bottom"></span>
        </div>

    </div>
    <div class="col s2 m2">
        <h4 class="collection-menue left-align">MENUE</h4>
    </div>
</div>
<hr>

<?php
if (!empty($artcollectionwidgets)) {
?>

<!-- <i class="material-icons" id="toggle">menu</i>-->
<h1 class="superhead"><?=$artcollection_title;?></h1>
<h2 class="superhead"><i class="material-icons">shopping_cart</i> SUPERCOLLECTED by <?=$artcollection_username;?></h2>
<div class="fullsize-box"><h4><?=$artcollection_comment?></h4></div>
        <h1 class="superhead headline-collection"> </h1>
        <div class="row content-collection">
            <?php
                foreach($artcollectionwidgets as $widget) {
                    echo "<div class=\"col m6 s12\">";
                    echo $widget;
                    echo "</div>";
                };

            ?>
        </div>
        <!-- menue overlay -->
        <p>&nbsp;</p>
<?php
}
?>

</body>
</html>

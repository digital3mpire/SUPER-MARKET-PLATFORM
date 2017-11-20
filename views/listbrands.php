<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body class="brands">

<?php $this->load->view('partials/navigation.php');?>

<h1 class="superhead">OUR FREEMIUM ART BRANDS - WATCH OUT 4 UPDATES</h1>
<h2 class="superhead">We offer best products from finest art brands</h2>
<div class="container content-container z-depth-3">
    <article>
        <div class="row content-container__list">
            <div class="col s12">
            <?php

            $store = array();
            foreach ($allentities as $entity) {
                if (!in_array($entity->getArtistname(),$store)) {

                    echo "<h2 class='center-align'>".$entity->getArtistname()."</h2>";

                }
                $store[] = $entity->getArtistname();
            }?>
            </div>
        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

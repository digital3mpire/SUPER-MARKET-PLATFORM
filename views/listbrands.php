<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body>

<?php $this->load->view('partials/navigation.php');?>

<h1 class="superhead">OUR FREEMIUM ART BRANDS <br>- WATCH OUT 4 UPDATES</h1>

<div class="container content-container">
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

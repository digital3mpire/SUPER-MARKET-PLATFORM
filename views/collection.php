<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body class="collection-page">

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">A COLLECTION</h1>
<h2 class="superhead">IS ONES FINEST SELECTION</h2>
<div class="container content-container">
    <article>
        <div class="row">
            <div class="col s12">
                <h3><i class="material-icons">shopping_cart</i>A SUPERCART COLLECTION BY <?=$artcollection_username;?></h3>
                <p><hr></p>
                <p>
                    <?=$artcollection_username;?> commented this on hisher collection:<br>
                    "<i><?=$artcollection_comment;?></i>"
                </p>
                </div>
        </div>
    </article>
</div>
<h1 class="superhead headline-collection"> <?=$artcollection_title;?></h1>
<div class="row content-collection">

    <?php

    foreach($artcollection as $artwork) {

        echo "<div class=\"col l4 m6 s12\">";
        echo "<a href='https://github.com/digital3mpire/SUPER-INFORMATION-HIGH-MARKET/tree/master/".$artwork->getLinktocontent()."' target='_blank'>";
        echo "<img src=\"".$artwork->getThumbnail()."\" class=\"responsive-img\">";
        echo "</a>";
        echo "</div>";


    }
    ?>


</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

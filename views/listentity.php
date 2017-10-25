<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body>

<?php $this->load->view('partials/navigation.php');?>

<div class="container content-container">
    <article>
        <div class="row">
            <div class="col s12"><h1>A MARKET AFTER THE MARKET ON STEROIDS</h1></div>

        </div>
        <div class="row content-container__list">

            <?php foreach ($allentities as $entity) {

                echo "<div class=\"col s3 content-container__listbox\">";
                echo "<h5>".$entity['header']."</h5>";
                echo "<img src=\"/product_entites/meta/img/index.jpg\" alt=\"name\" title=\"THE WRONG X\">";
                echo "<div class=\"content-container__listbox-subheader\">Subheader</div>";
                echo "<div class=\"content-container__listbox-tools right-align\">";
                echo "<a href=\"/Entity/addtocart/id/1\"><i class=\"material-icons\">add_shopping_cart</i></a>";
                echo "<i class=\"material-icons\">queue</i>";
                echo "</div>";
                echo "</div>";


            }?>
            <div class="col s3 content-container__listbox">

                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>
                <div class="content-container__listbox-tools right-align">
                    <a href="/Entity/addtocart/id/1"><i class="material-icons">add_shopping_cart</i></a>
                    <i class="material-icons">queue</i>
                </div>
            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

            <div class="col s3 content-container__listbox">
                <h5>DEEEP STRUCTURE</h5>
                <img src="/product_entites/meta/img/index.jpg" alt="name" title="THE WRONG X">
                <div class="content-container__listbox-subheader">Subheader</div>

            </div>

        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

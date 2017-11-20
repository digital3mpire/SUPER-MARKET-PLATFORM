<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body class="checkout">

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">CHECKOUT SUCCESS</h1>
<h2 class="superhead">YOUR COLLECTION</h2>
<div class="container content-container">
    <article>
        <div class="row">

            <div class="col s12">
                <h3><i class="material-icons">share</i> YOU SUPER COLLECTION WITH TITLE '<?php echo $formdata['collection_title']; ?>'</h3>
                <p><hr></p>
                <p>Your supercollection has been saved.<br>And you can use the link below to visit it or share it with friends</p>


            </div>
            <div class="col s6">

               <h5>
                    <a href="/Supershop/collection/id/<?php echo $collection_id;?>">
                    '<?php echo $formdata['collection_title']; ?>' by <?php echo $formdata['username'];?>
                    </a>
               </h5>
            </div>
        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

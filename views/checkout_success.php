<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header.php');?>
<body>

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">CHECKOUT SUCCESS</h1>
<h3 class="superhead">PAY WITH ATTENTION</h3>
<div class="container content-container">
    <article>
        <div class="row">

            <div class="col s12">
                <h3><i class="material-icons">share</i> Supercheckout and Share</h3>
                <p><hr></p>
                <p>this is the checkout. here you can pay your superproduct collcetion with a share on social and antisocial medias</p>

            </div>
            <div class="col s6">

                <?php
                $hidden = array('username' => 'Joe', 'member_id' => '234');
                echo form_open('Supershop/checkout_confirm', 'class="checkout_confirm" id="checkout_confirm"', $hidden);
                echo form_input('username', 'your name');
                echo form_input('emai', 'your email');

                echo form_input('collection_title', 'name of your collection');
                echo form_textarea('comment', 'a comment to your collection',array('class' => 'materialize-textarea'));
                echo form_submit('chceckou_collection', 'Checkout',array('class'=>'btn waves-effect waves-light'));


                ?>
            </div>
        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

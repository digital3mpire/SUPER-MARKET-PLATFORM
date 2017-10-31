<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php $this->load->view('partials/header.php');?>
<body>

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">CHECKOUT</h1>
<h2 class="superhead">PAY WITH SOCIAL ATTENTION</h2>
<div class="container content-container">
    <article>
        <div class="row">

            <div class="col s12">
                <h3><i class="material-icons">share</i> Supercheckout and Share</h3>
                <p><hr></p>
                <p>this is the checkout. here you can pay your superproduct collcetion with a share on social and antisocial medias</p>

            </div>

            <div class="col s12">
                <h5>Your collection contains</h5>
                <p>
                    <?php
                    if (!empty($cartitems)) {
                        foreach ($cartitems as $itemkey => $itemvalue) {

                            $entity = $allentities[$itemkey];
                            echo $entity->getArtistname()." <i>'".$entity->getTitle()."'</i>, ";

                        }
                    } else {
                        echo "your shopping cart is empty.<br><a href=\"/Entity/\">GO SHOPPING!</a>";
                    }
                    ?>
                </p>
            </div>
            <div class="col s8">

                <h5>Meta Data for your collection</h5>
                <span class="form-error-message"><?php echo validation_errors();?></span>
            </div>
            <?php echo form_open('Supershop/checkout_step1', 'class="checkout_confirm" id="checkout_confirm"');
            echo form_hidden('status', $status);
            echo form_hidden('paynow', 'not_payed');
            ?>
                <div class="col input-field s8">
                    <input type="text" name="collection_title" value="<?php echo set_value('collection_title'); ?>" size="50" class="form-input"/>
                    <label for="collection_title">What is the title of the collection?</label>
                </div>
                <div class="col input-field s8">
                    <input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" class="form-input"/>
                    <label for="username">Whats your name?</label>
                </div>
                <div class="col input-field s8">
                    <input type="text" name="useremail" value="<?php echo set_value('useremail'); ?>" size="50" class="form-input"/>
                    <label for="email">Whats your E-Mail?</label>
                </div>

                <div class="col input-field s8">
                        <textarea name="comment" cols="40" rows="10"  class="materialize-textarea form-input"/><?php echo set_value('collection_title'); ?></textarea>
                        <label for="comment">Please feel free to leave a comment on your selection</label>
                </div>
                <!-- <div class="col s8">
                    <h5>Pay with a share or a tweet</h5>


                        <p>
                        <input name="paynow" type="radio" id="pay_twitter" value="pay_twitter"/>
                        <label for="pay_twitter">Twitter Tweet</label>
                    </p>
                    <p>

                        <input name="paynow" type="radio" id="pay_fb" value="pay_fb"/>
                        <label for="pay_fb">Facebook Share</label>
                    </p>

                </div>-->
                <div class="col input-field s8">
                   <p> <?php echo form_submit('checkout_collection', 'Checkout',array('class'=>'btn waves-effect waves-light')); ?></p>
                </div>
            </form>
        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<?php $this->load->view('partials/header.php');?>

<body>
<div id="fb-root"></div>
<script></script>

<?php $this->load->view('partials/navigation.php');?>
<h1 class="superhead">CHECKOUT</h1>
<h2 class="superhead">PAY WITH SOCIAL ATTENTION</h2>
<div class="container content-container">
    <article>
        <div class="row">

            <div class="col s12">
                <h3><i class="material-icons">share</i> Supercheckout and Share</h3>
                <p><hr></p>
                <p>Now ist time to pay your selection and collection witha simple tweet or share. Its up to you...</p>

            </div>

            <div class="col s12">
                <h5>How would you like to pay</h5>
                <p>
                    <?php

                    if ($formdata['paynow'] == 'pay_twitter') {


                        echo "<h3>pay with a tweet</h3>";


                    }

                    if ($formdata['paynow'] == 'pay_fb') {

echo "<h3>pay with fb share</h3>";



                        ?>


                    <!-- Load Facebook SDK for JavaScript -->
                        <script type="text/javascript">

                        </script>
                <div id="bodyarea">
                    <div class="share_fb">Share on facebook</div>
                </div>
                <?php

                    }

                    if (!empty($formdata)) {
                        foreach ($formdata as $itemkey => $itemvalue) {

echo $itemvalue;
                        }
                    }
                    ?>
                </p>
            </div>


        </div>
    </article>
</div>

<!-- menue overlay -->

<?php $this->load->view('partials/footer.php');?>

</body>
</html>

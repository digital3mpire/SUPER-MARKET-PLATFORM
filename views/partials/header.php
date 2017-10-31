<head>
    <title>SUPER-INFORMATION-HIGH-MARKET</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Bangers" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="<?php echo base_url('00_css/superhigh.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('00_css/hamburger.css'); ?>">


    <script src="<?php echo base_url('00_js/jquery-3.2.1.min.js'); ?>"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>


    <style type="text/css">


    </style>
    <script type="text/javascript">


        jQuery.noConflict();
        (function($) {
            $(function() {

                $('.form-input').on('click', function() {
                    $(this).val('');
                });

                $('#toggle').click(function() {
                    $(this).toggleClass('active');
                    $('#overlay').toggleClass('open');
                });

                $('.show-super-product').click(function() {
                    $(this).toggleClass('active');
                    $('.contentoverlay').toggleClass('open');
                });
                $('.contentoverlay').click(function() {
                    $(this).toggleClass('active');
                    $('.contentoverlay').toggleClass('open');
                });





            });



        })(jQuery);
    </script>
</head>
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

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.10';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

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


                $("#bodyarea").on('click', '.share_fb', function(event) {
                    alert("hallo");
                    event.preventDefault();
                    var that = $(this);
                    var post = that.parents('article.post-area');
                    $.ajaxSetup({ cache: true });
                    $.getScript('//connect.facebook.net/en_US/sdk.js', function(){
                        FB.init({
                            appId: '373378533093977',
                            version: 'v2.3' // or v2.0, v2.1, v2.0
                        });
                        FB.ui({
                                method: 'share',
                                title: 'Title Goes here',
                                description: 'Description Goes here. Description Goes here. Description Goes here. Description Goes here. Description Goes here. ',
                                href: 'https://developers.facebook.com/docs/',
                            },
                            function(response) {
                                if (response && !response.error_code) {
                                    alert('Posting completed.');
                                } else {
                                    alert('Error while posting.');
                                }
                            });
                    });
                });




            });



        })(jQuery);
    </script>
</head>
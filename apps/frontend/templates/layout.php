<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <meta name="author" content="">
        <?php use_helper('jQuery'); ?>
        <?php echo jq_add_plugins_by_name(array('ui')) ?>
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Mobile Specific Metas
  ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="format-detection" content="telephone=no">


        <?php include_title() ?>
        <link rel="shortcut icon" href="/images/favicon.ico" />	<!-- Favicons
            ================================================== -->

        <link rel="shortcut icon" href="/images/favicon.ico">
        <link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png" />
        <?php include_stylesheets() ?>
        <?php include_javascripts() ?>
        <script type="text/javascript">
              var _gaq = _gaq || [];
              _gaq.push(['_setAccount', 'UA-5876917-31']);
              _gaq.push(['_trackPageview']);

              (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
              })();
        </script>
    </head>
    <body>
        <div class="container">	
            <?php include_component('gabarit', 'header') ?>
            <div class="two-thirds column">    
                <?php echo $sf_content ?>
            </div>           
            <?php include_component('gabarit', 'menuSecondaire') ?>
            <?php include_component('gabarit', 'outils') ?>
        </div>
        <?php include_component('gabarit', 'footer') ?>
    </body>
</html>

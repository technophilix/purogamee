<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177275356-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-177275356-1');
    </script>
    <?php
    if (isset($ogdes)) {
        $descrip = $ogdes;
    } else {
        $descrip = getSlogan();
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="google-site-verification" content="fDdy_9ujpIKYPN8fA04PFjyoEXil_OpmcENHiPFwYzQ" />
    <meta name="p:domain_verify" content="20dde98ac4963549ae23c2d7b1081150" />
    <meta name="theme-color" content="#4285f4">
    <meta name="google-site-verification" content="v4OYnCjX3icV07KHcY-u41UfHULwykf2ZhD8Kdocv34" />
    <meta name="title" content="<?php echo $title . "|" . getSlogan() ?>">
    <title><?php echo $title ?></title>

    <!-- For-Mobile-Apps -->

    <!--<meta name="keywords" content="" />-->
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //For-Mobile-Apps -->
    <link rel="icon" href="<?php echo base_url() ?>uploads/siteetc/cestuss_head.png" type="image/png" sizes="16x16">
    <!-- Custom Theme files -->
    <meta name="description" content="<?php echo $descrip ?>">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Chicle&family=Lato&family=Lobster&family=Ubuntu&display=swap" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>includes/main/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url() ?>includes/main/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="<?php echo base_url() ?>includes/main/css/style.css?<?php echo time() ?>">

    <meta charset="UTF-8">
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="CESTUSS" />
    <meta property="og:url" content="<?php echo base_url(uri_string()) ?>" />

    <?php
    if (isset($ogimage)) {

        $social =  base_url() . $ogimage;
    } else {
        $social = getLogo();;
    }
    ?>



    <meta property="og:image" content="<?php echo $social ?>" />
    <!-- <meta property="og:image:url" content="<?php echo preg_replace("/^https:/i", "http:", $social) ?>" /> -->
    <meta property="og:image:alt" content="<?php echo $title ?>" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:description" content="<?php echo $descrip ?>">


    <!-- Site Title -->


    <meta name="twitter:card" content="summary_large_image">
    <!-- If you want you can mention the twitter profile of your website -->
    <meta name="twitter:site" content="@Team_Omegist">
    <!-- You have to mention the title of the webpage -->
    <meta name="twitter:title" content="<?php echo $title ?>">
    <!-- You have to mention a 2-4 lines description about the webpage -->
    <meta name="twitter:description" content="<?php echo $descrip ?>">
    <!-- If you want you can embed a URL of a image representing the content of your webpage. This image will be displayed in the preview and will make your post look more attractive. -->
    <meta name="twitter:image" content="<?php echo $social ?>">
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
   <!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//api.technophilix.com/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Article",
            "headline": "<?php echo $title ?>",
            "image": "<?php echo $social ?>",
            "author": {
                "@type": "Person",
                "name": "<?php if (isset($author->name)) echo $author->name; ?>"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Bohemiaana",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo getLogo() ?>"
                }
            },
            "datePublished": "<?php if (isset($postcontent->publish_date)) {
                                    echo date("Y-m-d", strtotime($postcontent->publish_date));
                                } else {
                                    echo "2020-0605";
                                } ?>"
        }
    </script>



</head>
<style>
    .navbar-toggler:focus {
        outline: none;
    }

    .p2 {
        margin-top: 25px;

    }

    .p2 a {

        color: black;
    }

    .mynav {

        background-color: #f4f459;
        font-family: Georgia !important;

    }


    .navbar-nav li a {

        font-weight: bold;
        color: black !important;
    }

    nav fa {

        font-weight: bold;
        color: black !important;
    }

    .navmiddle {
        transform: translateX(-50%);
        left: 50%;
        position: absolute;
        height: 80px;

    }

    .brand-centered {
        display: flex;
        justify-content: center;
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
    }

    .navbar-brand {
        display: flex;
        align-items: center;
    }

    .nav-item .nav-link {

        font-family: Georgia !important;
    }

    .dropdown-item {
        color: black !important;
    }
</style>


<!-- Body-Starts-Here -->

<body>
    <header style="background-color: #ffffff;">
        <!-- Navbar -->
        <div class="container-fluid mb-0">
            <div class="row p-2" id="firstheader">
                <div class="navbar-brand">

                    <a href="<?php echo base_url() ?>"> <img src="<?php echo base_url() ?>uploads/siteetc/newlogo.png" id="logo" class="img-fluid" style="height: 80px;width: auto;" alt="logo"> </a>
                </div>


                <div class="col-sm text-right" id="firstmenu" style="margin-top: 1%">
                    <!-- <a href="<?php echo base_url() ?>/home" >Home </a> -->
                    <a href="<?php echo base_url() ?>aboutus"> About Us </a>
                    <a href="<?php echo base_url() ?>contact">| Contact Us </a>
                    <!-- <a href="<?php echo base_url() ?>contact">| Publications </a> -->
                    <a href="" data-toggle="modal" data-target="#modalLoginForm">| <i class="fa fa-search"></i> </a>
                    <div class="modal fade" id="modalLoginForm" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-left text-capitalize" style=" border-bottom: 1px solid #ffffff !important;">
                                    Search for any query...
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="<?php echo base_url() ?>search">
                                        <input type="text" placeholder="Search" aria-label="Search" class="form-control" name="search">

                                    </form>



                                </div>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg mynav " id="myheader">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars" style="color:white"></span>
            </button>
            <!-- Navbar brand -->
            <a class="navbar-brand text-uppercase text-dark" href="<?php echo base_url() ?>"><i class="fa fa-home" id="homeicon" style="color:white"></i>

                <img src="<?php echo base_url() ?>uploads/siteetc/cestuss_head.png" class="img-fluid" id="middlelogo" style="height: 45px; width: auto;">
            </a>

            <a href="" data-toggle="modal" data-target="#modalLoginForm2" id="mobilesearch"><i class="fa fa-search" style="color:white"></i> </a>

            <div class="modal fade" id="modalLoginForm2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-left text-capitalize" style=" border-bottom: 1px solid #ffffff !important;">
                            Search for any query...
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="<?php echo base_url() ?>search">
                                <input type="text" placeholder="Search" aria-label="Search" class="form-control" name="search">

                            </form>



                        </div>

                    </div>
                </div>
            </div>
            <!-- Collapse button -->


            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">

                <!-- Links -->
                <ul class="navbar-nav mx-auto">

                    <?php
                    $i = 0;


                    foreach ($menu as $m) { ?>
                        <li class="nav-link"><a href="<?php echo base_url() . "category/" . $m->caturl ?>" style="font-family:Noto Serif Bengali !important"><?php echo $m->categoryname ?></a>
                        </li>


                    <?php
                    }  ?>


                    <!-- <li><a href="archive.html">Archive</a></li>
							<li><a href="category.html">Category</a></li>-->
                    <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            $i = 0;
                            foreach (array_slice($menu, 9, 116) as $m) { ?>
                                <a class="dropdown-item" href="<?php echo base_url() . "category/" . $m->categoryname ?>" style="color:black !important"><?php echo $m->categoryname ?></a>

                            <?php } ?>
                        </div>
                    </li> -->
                </ul>
                <!-- Links -->



            </div>
            <!-- Collapsible content -->

        </nav>


        <!-- End of Navbar -->

    </header>
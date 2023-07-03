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
        <meta name="p:domain_verify" content="20dde98ac4963549ae23c2d7b1081150"/>
        <meta name="theme-color" content="#4285f4">
        <meta name="google-site-verification" content="v4OYnCjX3icV07KHcY-u41UfHULwykf2ZhD8Kdocv34" />
        <meta name="title" content ="<?php echo $title ."|".getSlogan() ?>">
        <title><?php echo $title ?></title>
       
        <!-- For-Mobile-Apps -->
       
        <!--<meta name="keywords" content="" />-->
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //For-Mobile-Apps -->
        <link rel="icon" href="<?php echo getLogo() ?>" type="image/png" sizes="16x16">
        <!-- Custom Theme files -->
        <meta name="description"  content="<?php echo $descrip ?>">
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
        <!-- <link rel="stylesheet" href="<?php echo base_url() ?>includes/main/css/style.css?<?php echo time() ?>"> -->

        <meta charset="UTF-8">
        <meta property="og:locale" content="en_US" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="Omegist" />
        <meta property="og:url" content="<?php echo base_url(uri_string())?>" />
 
        <?php
        if (isset($ogimage)) {

            $social = base_url() . $ogimage;
        } else {
            $social = getLogo();
            ;
        }
        ?>
        <meta property ="og:image" content="<?php echo $social ?>">
        <meta property="og:title" content="<?php echo $title ?>" />
        <meta property="og:description" content="<?php echo $descrip ?>">


        <!-- Site Title -->


        <meta name="twitter:card" content="summary_large_image">
        <!-- If you want you can mention the twitter profile of your website -->
        <meta name="twitter:site" content="@Team_Omegist">
        <!-- You have to mention the title of the webpage -->
        <meta name="twitter:title" content="<?php echo $title ?>">
        <!-- You have to mention a 2-4 lines description about the webpage -->
        <meta name="twitter:description" content= "<?php echo $descrip ?>">
        <!-- If you want you can embed a URL of a image representing the content of your webpage. This image will be displayed in the preview and will make your post look more attractive. -->
        <meta name="twitter:image" content="<?php echo $social ?>">
        <link rel='dns-prefetch' href='//fonts.googleapis.com' />
        
        
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "<?php echo $title ?>",
  "image": "<?php echo $social ?>",  
  "author": {
    "@type": "Person",
    "name": "<?php if(isset($author->name)) echo $author->name ; ?>"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "Omegist",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo getLogo() ?>"
    }
  },
  "datePublished": "<?php if(isset($postcontent->publish_date)) {echo date("Y-m-d",strtotime($postcontent->publish_date)); } else {echo "2020-0605";} ?>"
}
</script>
        
        
        
    </head>
    <body class="container">

    <div class="typewriter"><h1>বোহেমিয়ানা</h1></div>

</body>

<script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/bootstrap.min.js"></script> 
   <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->

</html>
<style>
/* GLOBAL STYLES */
body {
    background-image: url("<?php echo base_url() ?>includes/images/cover.jpg");  
  background-repeat: no-repeat;
  background-size: cover;
  padding-top: 15em;
  display: flex;
  justify-content: center;
}

/* DEMO-SPECIFIC STYLES */
.typewriter h1 {
  color: #ff0000;
  font-size: 12em;
  font-family: monospace;
  overflow: hidden; /* Ensures the content is not revealed until the animation */
  border-right: .15em solid orange; /* The typwriter cursor */
  white-space: nowrap; /* Keeps the content on a single line */
  margin: 0 auto; /* Gives that scrolling effect as the typing happens */
  letter-spacing: 0em; /* Adjust as needed */
  animation: 
    typing 3.5s steps(30, end),
    blink-caret .5s step-end infinite;
}

/* The typing effect */
@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

/* The typewriter cursor effect */
@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: transparent }
}
</style>
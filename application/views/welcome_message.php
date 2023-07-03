<?php $this->load->view('header'); ?>
<style>
  #intro {
    background-image: url("<?php echo base_url() ?>includes/images/cover.jpg");
    height: 80vh;
    background-repeat: no-repeat;
    background-size: cover;
  }

  /* Height for devices larger than 576px */
  @media (min-width: 992px) {
    #intro {
      margin-top: -58.59px;
    }
  }

  #myheader {
    margin-bottom: 0px;
  }

  .navbar .nav-link {
    color: #fff !important;
  }

  @media screen and (min-width: 800px) {
    .carousel-inner>.carousel-item img {
      height: 70vh;
    }
  }
</style>
<?php
$bgcolor = ["#65C18C", "#C1F4C5","#FFBED8","#FF7BA9", "#C0D8C0", "#F5EEDC", "#F5EEDC", "#ECB390"];

?> 

<!-- Background image -->
<!--Carousel Wrapper-->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">


    <?php for ($i = 1; $i < 8; $i++) { ?>
      <div class="carousel-item <?php if ($i == 1) {
                                  echo "active ";
                                } ?>">
        <img class="d-block w-100" src="<?php echo base_url() ?>includes/images/slider/1.jpg" alt="First slide">
      </div>
    <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!--/.Carousel Wrapper-->
<!-- Background image -->

<div class="container-fluid">
  <section class="my-5">
    <?php $f = array_slice($latest, 0); ?>
    <!-- main row -->
    <div class="row">


      <div class="col-sm-9">
      <div class="paper">
        
          <h2><?php echo $issue->name ?></h2>
          <p><?php echo $issue->description ?></p>

<div style="padding-left:5%">
<?php foreach($latest as $lt){  ?> 

<h5><?php echo get_category($lt->category).": ". $lt->title ?></h5>
<p>লিখেছেন: <?= getAuthorfromID($lt->post_author) ?><br/>
<a href="<?= base_url($lt->posturl)?>" style="color:white">পড়ুন</a></p>


<?php  } ?>

</div>

      </div>

      </div>
      <div class=" col-sm-3" style="border-left:2px solid #adadad">
<h3>আর্কাইভ</h3>



     
    </div>


      <?php $fourth = array_slice($latest, 28, 8); ?>

      <?php foreach ($fourth as $s) { ?>

        <div class="col-sm-3 mt-3">
          <img src="<?= base_url() . $s->coveriamge ?>" alt="" class="img-fluid mb-2">

          <a href="#!" class="<?= $color[array_rand($color)] ?>">
            <h6 class="font-weight-bold mb-3"><?php echo get_category($s->category) ?></h6>
          </a>
          <!-- Post title -->
          <h4 class="font-weight-bold mb-3"><strong><?php echo $s->title ?></strong></h4>
          <!-- Excerpt -->
          <p><?php echo post_gist($s->abstract, 200) ?></p>
          <!-- Post data -->
          <p><a><strong><?php echo getAuthorfromID($s->post_author) ?></strong></a>, <i class="fas fa-eye"></i> <?php echo $s->viewes ?> </p>
          <!-- Read more button -->
          <a class="btn btn-secondary btn-md mb-lg-0 mb-4" href="<?php echo base_url() ?>article/<?php echo $s->posturl ?>" style="font-size:0.9em">পড়ুন</a>



        </div>


      <?php } ?>
    </div>

    <!-- end main row -->


  </section>
</div>
<?php $this->load->view('footer'); ?>
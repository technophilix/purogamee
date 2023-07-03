<?php $this->load->view('header'); ?>

<style>
  a {
    text-decoration: none !important;

  }

  .card {
    border-radius: 10px;

  }

  .card-title {

    text-overflow: ellipsis !important;
    font-size: 1.0em;
    /*        color: black !important;*/
  }

  p {
    font-weight: 400;
  }

  .card-text {
    font-family: Roboto;
    font-weight: bold;
  }

  #subscribe {
    border-left: 3px solid white
  }

  .avatar {
    width: 50% !important;
    height: 50% !important;

  }

  @media only screen and (max-width: 768px) {
    #subscribe {
      border-left: none;
    }
  }
</style>

<div class="container mt-5">

  <h3 class="mt-3"><?= $category->categoryname  ?></h3>
  <div class="row mt-5">
    <!-- <pre><?php var_dump($categorypost) ?></pre> -->

    <?php foreach ($categorypost as $pt) { ?>
      <div class="col-sm-4 col-xs-12 mt-3">
        <!-- Card -->
        <div class="card">

          <!-- Card image -->
          <div class="view overlay">
            <img class="card-img-top" src="<?php echo base_url() . $pt->coveriamge ?>" alt="<?php echo $pt->title ?>">
            <a href="<?php echo base_url() ?>article/<?php echo $pt->posturl ?>">
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body">

            <!-- Title -->
            <a href="<?php echo base_url().$pt->posturl ?>">
              <h3><?php echo $pt->title ?></h3>
            </a>
            <!-- Text -->
            <p class="card-text">
              <img src="<?php echo getAuthorImgfromID($pt->post_author) ?>" style="width:40px; height: 40px; border-radius: 50%;"> | by : <?php echo getAuthorfromID($pt->post_author) ?>


            </p>
            <!-- Button -->


          </div>

        </div>


      </div>
    <?php  } ?>

  </div>


</div>
<?php $this->load->view('footer'); ?>
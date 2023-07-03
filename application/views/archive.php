<?php $this->load->view('header'); ?>
<style>



</style>


<div class="container-fluid mt-3" style="padding: 6%">

    <?php foreach ($archivepage as $ac) { ?>
        <!-- Grid row -->
        <div class="row mb-5">

            <!-- Grid column -->
            <div class="col-lg-5 col-xl-4">

                <!-- Featured image -->
                <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                    <img class="img-fluid" src="<?php echo $ac->coveriamge ?>" alt="<?php echo $ac->title ?>">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-lg-7 col-xl-8">

                <!-- Post title -->
                <h3 class="font-weight-bold mb-3"><strong><?php echo $ac->title ?></strong></h3>
                <!-- Excerpt -->
                <p class="dark-grey-text">

                    <?php echo $ac->abstract ?>
                </p>
                <!-- Post data -->
                <p><a class="font-weight-bold"><?php echo getAuthorfromID($ac->post_author) ?></a> <br /> <?php echo date("d M, Y", strtotime($ac->publish_date)) ?></p>
                <!-- Read more button -->
                <a class="btn btn-danger btn-md" href="<?php echo base_url() ?>article/<?php echo $ac->posturl ?>">Read more</a>

            </div>
            <!-- Grid column -->

        </div>

    <?php } ?>
    <!-- Grid row -->





</div>



<?php $this->load->view('footer'); ?>
<?php $this->load->view('header'); ?>


<div class="container mt-3">

    <div class="row ">
        <div class="col-sm-6">

            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.933280777425!2d88.37299511495772!3d22.469141385236114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0271a7cf96d631%3A0xa776290b0bf8f47e!2s12%2C%2017%2F1%2C%20Baishnabghata%20Ln%2C%20Laxmi%20Narayan%20Colony%2C%20Garia%2C%20Kolkata%2C%20West%20Bengal%20700047!5e0!3m2!1sen!2sin!4v1626152192736!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
        <div class="col-sm-6">


            <!--Form with header-->

            <form action="" method="post">
                <div class="card border rounded-4" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2">
                            <h3><i class="fa fa-envelope"></i> Contact</h3>
                            <!--                                    <p class="m-0">Con gusto te ayudaremos</p>-->
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Your Name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                </div>
                                <input type="email" class="form-control" id="nombre" name="email" placeholder="ejemplo@gmail.com" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                </div>
                                <textarea class="form-control" placeholder="Message" required></textarea>
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Send" class="btn btn-orange btn-block rounded-0 py-2">
                        </div>
                    </div>

                </div>
            </form>
            <!--Form with header-->


        </div>
    </div>
</div>


<!--Section: Content-->
<!-- <section class="w-100 text-center white-text d-md-flex justify-content-between p-5 mt-5  blue lighten-1">
    <div class="col-sm-6 ">
        <h3 class="font-weight-bold mb-md-0 mb-4 mt-2 pt-1 text-justify text-right">Subscribe <br /> For Newsletter</h3>
    </div>
    <div class="col-sm-6" id="subscribe">
        <form method="post" action="<?php echo base_url() ?>addsubscription">

            <div class="input-group md-form form-sm form-2 pl-0">
                <input class="form-control my-0 py-1 lime-border" type="text" placeholder="Subscribe" aria-label="Subscribe" name="subscribe">
                <div class="input-group-append">
                    <button type="submit" class="input-group-text lime lighten-2" id="basic-text1" value=""><i class="fas fa-paper-plane text-grey" aria-hidden="true"></i> </button>
                </div>
            </div>
        </form>
    </div>
</section> -->
<!--Section: Content-->


<?php $this->load->view('footer'); ?>
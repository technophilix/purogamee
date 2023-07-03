<?php $this->load->view('backoffice/header'); ?>
<style>
    .img-responsive {
        width: 300px;
        height: 100px;
    }

    .drop-shadow {
        -webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
    }

    .hip-grid {
        height:460px !important;
        margin: 1.5rem auto;
    }

    .hip-pagination {
        margin-top: 4%;
        margin-bottom: 4%;
    }

    .hip-pagination>a.active {

        background-color: green;
        padding: 1%;
        font-size: 1.3em;
        color: white;
        border-radius: 50%;



    }

    #html-item-pagination {

        height: auto !important;
    }
</style>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo $title ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $title ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">

            <div class="box-body">
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">

                            <div id="html-item-pagination" class="hip-grid">

                                <?php foreach ($fetchmedia as $fmedia) {  ?>
                                    <div class="hip-item ">
                                        <?php if (imageType($fmedia->type) == "image") { ?>
                                            <a href="<?php echo base_url() ?>backoffice/mediadetails/<?php echo $fmedia->mediakey ?>"> <img src="<?php echo base_url() . $fmedia->path ?>" alt="<?php echo $fmedia->name ?>" class="img-thumbnail img-responsive" style="height:250px;"> </a>
                                            <p class="text-center mt-3"><strong><?php echo $fmedia->name ?></strong></p>

                                        <?php } else if (imageType($fmedia->type) == "word") { ?>
                                            <a href="<?php echo base_url() ?>backoffice/mediadetails/<?php echo $fmedia->mediakey ?>"> <img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>includes/images/word.png" alt="<?php echo $fmedia->name ?>" class="img-thumbnail img-responsive" style="height:250px;"> </a>
                                            <p class="text-center mt-3"><strong><?php echo $fmedia->name ?></strong></p>
                                        <?php } else if (imageType($fmedia->type) == "pdf") { ?>
                                            <a href="<?php echo base_url() ?>backoffice/mediadetails/<?php echo $fmedia->mediakey ?>"> <img class="img-responsive img-thumbnail" src="<?php echo base_url() ?>includes/images/pdf.png" alt="<?php echo $fmedia->name ?>" class="img-thumbnail img-responsive" style="height:250px;"> </a>
                                            <p class="text-center mt-3"><strong><?php echo $fmedia->name ?></strong></p>
                                        <?php  } ?>
                                    </div>
                                <?php } ?>

                            </div>






                        </div>
                        <div class="row">

                            <h4 class="centeredText">Upload Media (Image, PDF, Doc are allowed)</h4>
                            <span class="form_error"> <?php echo $this->session->flashdata('upload_error'); ?> </span>
                            <form enctype="multipart/form-data" accept-charset="utf-8" method="post" action="<?php echo base_url() ?>backoffice/file_upload">

                                <label>Caption : </label>
                                <input type="text" class="form-control" value="" name="name">
                                <span class="form_error"><?php echo form_error('name'); ?></span> <br />
                                <span class="form_error"><?php echo form_error('caption'); ?></span> <br />
                                <label>Album : </label>
                                <input type="text" class="form-control" value="" name="album"> <br />
                                <label>Image : </label>
                                <input type="file" multiple="" class="form-control" name="images[]"> <br />
                                <span class="form_error"><?php echo form_error('images'); ?></span> <br /><br />
                                <button class="btn mybutton" type="submit" name="save" id="">Upload</button>

                            </form>




                        </div>

                    </div>

                </div>
            </div><!-- /.box-body -->

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<?php $this->load->view('backoffice/footer') ?>
<script>
    $(document).ready(function() {
        $('#posttable').DataTable({

        });
    });

    $(document).ready(function() {
        $("#html-item-pagination").hip({
            itemHeight: '320px',
            itemsPerPage: 16,
            itemsPerRow: 4,
            itemGaps: '30px',
            filter: true,
            filterPos: 'center',
            paginationPos: 'left'
        });
    });
</script>
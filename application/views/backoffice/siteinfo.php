<?php $this->load->view('backoffice/header'); ?>



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

        <div class="col-sm-8">
            <form method="post" action="<?php echo base_url() ?>backoffice/updatesiteinfo" enctype="multipart/form-data">
                <label>Site Name :</label> <input type="text" name="name" value="<?php echo $siteinfo->name ?>" class="form-control">
                <span class="form_error"><?php echo form_error('name'); ?></span> <br /><br />

                <label>Slogan :</label> <input type="text" name="slogan" value="<?php echo $siteinfo->slogan ?>" class="form-control">
                <span class="form_error"><?php echo form_error('slogan'); ?></span> <br /><br />

                <label>Url :</label> <input type="text" name="url" value="<?php echo $siteinfo->url ?>" class="form-control">
                <span class="form_error"><?php echo form_error('url'); ?></span> <br /><br />

                <label>Add Banner:</label> <input type="text" name="add1" value="<?php echo $siteinfo->add1 ?>" class="form-control">
                <span class="form_error"><?php echo form_error('add1'); ?></span> <br /><br />

                <label>Add Banner Link:</label> <input type="text" name="add2" value="<?php echo $siteinfo->add2 ?>" class="form-control">
                <span class="form_error"><?php echo form_error('add2'); ?></span> <br /><br />

                <label>Description :</label> <textarea name="description" class="form-control"> <?php echo $siteinfo->description ?> </textarea>
                <span class="form_error"><?php echo form_error('logo'); ?></span> <br /><br />


                <input type="submit" class="btn mybutton" value="Update">

            </form>
        </div>

        <div class="col-sm-4">

            <?php if ($siteinfo->logo == "" | $siteinfo->logo == NULL) { ?>

                <center> <img src="<?php echo base_url() ?>includes/images/logobackoffice.png" class="img-circle" style="width: 80px;height: 80px;"> </center> <br>
            <?php } else { ?>
                <center> <img src="<?php echo base_url() . $siteinfo->logo ?>" class="img-circle" style="width: 80px;height: 80px;"> </center> <br>

            <?php } ?>
            <form method="post" action="<?php echo base_url() ?>backoffice/updatesitelogo" enctype="multipart/form-data">
                <label>Logo :</label> <input type="file" name="logo" class="form-control"> <br /><br />
                <span class="form_error"> <?php echo $this->session->flashdata('upload_error');  ?> </span>

                <input type="submit" class="btn mybutton" value="Update">
            </form>
        </div>


    </div>
</div>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view('backoffice/footer'); ?>
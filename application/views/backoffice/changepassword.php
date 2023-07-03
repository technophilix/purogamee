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
                <form method="post" action="<?php echo base_url() ?>backoffice/updatepassword">
                        <label>Current Password :</label> <input type="password" name="cpassword" class="form-control">
                        <span class="form_error"><?php echo form_error('cpassword'); ?></span> <br /><br />

                        <label>New Password :</label> <input type="password" name="npassword" class="form-control">
                        <span class="form_error"><?php echo form_error('npassword'); ?></span> <br /><br />

                        <label>Confirm Password :</label> <input type="password" name="cfpassword" class="form-control">
                        <span class="form_error"><?php echo form_error('cfpassword'); ?></span> <br /><br />

                        <input type="submit" class="btn mybutton" value="Update">

                </form>
        </div>
</div>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $this->load->view('backoffice/footer'); ?>
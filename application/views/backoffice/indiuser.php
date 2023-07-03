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
            <?php if (isset($user)) {  ?>
              <div class="col-sm-8">
                <form method="post" action="<?php echo base_url() ?>backoffice/updateuserinfo/<?php echo $user->idbackoffice ?>" enctype="multipart/form-data">
                  <label> Name :</label> <input type="text" name="name" value="<?php echo $user->name ?>" class="form-control">
                  <span class="form_error"><?php echo form_error('name'); ?></span> <br /><br />

                  <!-- <label> User Name :</label> <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control"> -->
                  <!-- <span class="form_error"><?php echo form_error('username'); ?></span> <br /><br /> -->

                  <label> Email :</label> <input type="email" name="email" value="<?php echo $user->email ?>" class="form-control">
                  <span class="form_error"><?php echo form_error('email'); ?></span> <br /><br />

                  <!--  <label>Designation :</label> <input type="text" name="designation" value="<?php echo $user->designation ?>" class="form-control">
                  <span class="form_error"><?php echo form_error('designation'); ?></span> <br /><br />

                   <label>Facebook :</label> <input type="text" name="social1" value="<?php echo $user->social1 ?>" class="form-control">
          <span class="form_error"><?php echo form_error('social1'); ?></span> <br /><br />
          <label>Twitter :</label> <input type="text" name="social2" value="<?php echo $user->social2 ?>" class="form-control">
          <span class="form_error"><?php echo form_error('social2'); ?></span> <br /><br />
          <label>InstaGram :</label> <input type="text" name="social3" value="<?php echo $user->social3 ?>" class="form-control">
          <span class="form_error"><?php echo form_error('social3'); ?></span> <br /><br />
          <label>LinkedIN :</label> <input type="text" name="social4" value="<?php echo $user->social4 ?>" class="form-control">
          <span class="form_error"><?php echo form_error('social4'); ?></span> <br /><br /> -->
                  <label>Description :</label> <textarea name="descriptions" class="form-control"><?php echo $user->descriptions ?></textarea>
                  <span class="form_error"><?php echo form_error('descriptions'); ?></span> <br /><br />


                  <input type="submit" class="btn mybutton" value="Update">

                </form>
              </div>

              <div class="col-sm-4">


                <center> <img src="<?php echo base_url() . $user->profilepic ?>" class="img-circle" style="width: 80px;height: 80px;"> </center> <br>

                <form method="post" action="<?php echo base_url() ?>backoffice/updateuserlogo/<?php echo $user->idbackoffice ?>" enctype="multipart/form-data">
                  <label>Logo :</label> <input type="file" name="profilepic" class="form-control"> <br /><br />
                  <span class="form_error"> <?php echo $this->session->flashdata('upload_error');  ?> </span>

                  <input type="submit" class="btn mybutton" value="Update">
                </form>
              </div>
            <?php } else { ?>
              <div class="col-sm-8">
                <form method="post" action="<?php echo base_url() ?>backoffice/updateuserinfo" enctype="multipart/form-data">
                  <label> Name :</label> <input type="text" name="name" class="form-control">
                  <span class="form_error"><?php echo form_error('name'); ?></span> <br /><br />
                  <!-- <label> User Name :</label> <input type="text" name="username" class="form-control">
                  <span class="form_error"><?php echo form_error('username'); ?></span> <br /><br /> -->

                  <label> Email :</label> <input type="email" name="email" class="form-control">
                  <span class="form_error"><?php echo form_error('email'); ?></span> <br /><br />
                  <!-- <label>Designation :</label> <input type="text" name="designation" class="form-control">
                  <span class="form_error"><?php echo form_error('designation'); ?></span> <br /><br />
                  <label>Facebook :</label> <input type="text" name="social1" class="form-control">
                  <span class="form_error"><?php echo form_error('social1'); ?></span> <br /><br />
                  <label>Twitter :</label> <input type="text" name="social2" class="form-control">
                  <span class="form_error"><?php echo form_error('social2'); ?></span> <br /><br />
                  <label>InstaGram :</label> <input type="text" name="social3" class="form-control">
                  <span class="form_error"><?php echo form_error('social3'); ?></span> <br /><br />
                  <label>LinkedIN :</label> <input type="text" name="social4" class="form-control"> -->
                  <span class="form_error"><?php echo form_error('social4'); ?></span> <br /><br />
                  <label>Description :</label> <textarea name="descriptions" class="form-control"></textarea>
                  <span class="form_error"><?php echo form_error('descriptions'); ?></span> <br /><br />


                  <input type="submit" class="btn mybutton" value="Add User">

                </form>
              </div>

            <?php  } ?>

          </div>
        </div>
      </div><!-- /.box-body -->

    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('backoffice/footer'); ?>
<?php $this->load->view('backoffice/header');?>


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

<div class="container-fluid" style="margin-top: 4%; margin-bottom: 4%">
<?php switch($type) {
    case "Error" :
    
    ?>    
<div class="alert alert-danger" role="alert" style="box-shadow: 0 0 8px #D0D0D0; colo:white; min-height: 100px; font-size: 2.1em ; border-radius: 10px">
  <?php echo $message; ?>
</div>
  <?php break;
    case "Warning" :
    
    ?>   
<div class="alert alert-warning" role="alert"  style="box-shadow: 0 0 8px #D0D0D0; colo:white; min-height: 100px; font-size: 2.1em ; border-radius: 10px">
 <?php echo $message; ?>
</div>
 
   <?php break;
    case "Info" :
    
    ?>    
<div class="alert alert-info" role="alert"  style="box-shadow: 0 0 8px #D0D0D0; colo:white; min-height: 100px; font-size: 2.1em ; border-radius: 10px">
<?php echo $message; ?>
</div>
<?php } ?>
</div>
</div>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

  
<?php $this->load->view('backoffice/footer');?>
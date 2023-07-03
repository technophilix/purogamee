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
    
    <div class="col-sm-6" style="margin-top: 2%; text-align: center">
       
        
        <a href="<?php echo base_url()?>backoffice/database_backup" class="btn btn-danger" a>Database back-up</a>  
        
        
        
    </div> 
    
    
     <div class="col-sm-6" style="margin-top: 2%; text-align: center">
        
         <a href="<?php echo base_url()?>backoffice/upload_backup" class="btn btn-success" a>Media back-up</a>  
        
       
     </div> 
    
    
    
</div>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->



<?php $this->load->view('backoffice/footer'); ?>
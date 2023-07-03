<?php $this->load->view('backoffice/header');?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $title ?>
            <!-- <small>it all starts here</small> -->
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
<div class="container-fluid" style="margin-bottom: 8%" >
    <div class="col-sm-6">
   
        <fieldset >  
            <legend style="font-weight: bold">Categories</legend>
       
    <?php if( !empty($treeview)){ ?>       
            <ul style="list-style: none;font-size: 18px;" >
           
           
          <?php 
          foreach($treeview as $tview) {?> 
           
                <li><?php echo "<i class='{$tview->icon }'></i> ". $tview->categoryname ?> 
                    <?php if($tview->categoryname !="Uncategorised") { ?>
                    <a href="<?php echo base_url()?>backoffice/updateCategory/<?php echo $tview->idcategory ?>" title="Edit" class="" style="color:green" ><i class="fa fa-edit"></i></a>
                    <a href="#" title="Delete" class="delcat" style="color:RED" onclick="myfunction(<?php echo $tview->idcategory ?>)"><i class="fa fa-trash"></i></a>
                    <?php } ?>
                 <ul style="list-style: none; font-size: 18px;">
                        
                   <?php
   if( !empty($tview->subs)) { 
  foreach ($tview->subs as $sub)  {
?>  
                     <li><?php echo "<i class='fa {$sub->icon }'></i> ". $sub->categoryname ?>
                         
                          <a href="<?php echo base_url()?>backoffice/updateCategory/<?php echo $sub->idcategory ?>" class="" style="color:green" ><i class="fa fa-edit"></i></a>
                         <a href="#" class="delcat" style="color:RED" onclick="myfunction(<?php echo $sub->idcategory ?>)"><i class="fa fa-trash"></i></a>
                        
                     
                     </li> 
           
                    
                 
    <?php } 
    
   }
  
    ?>   
              </ul>       
    
          </li>
  <?php } ?>
            </ul> 
            
    <?php }
    
    else  {
        
        echo "No category has been created yet...";
    }
    
    
    ?>
            
        </fieldset>
      </div>
    <div class="col-sm-6">
    <form  method="post" action="<?php echo base_url()?>backoffice/addcategory">
        <label>Category name:</label><input type="text" name="categoryname" id="categoryname" class="form-control" >
        <span class="form_error"><?php echo form_error('categoryname'); ?></span> <br/><br/>
      <label>Category Slug:</label><input type="text" name="caturl" id="caturl" class="form-control">
      <span class="form_error"><?php echo form_error('caturl'); ?></span> <br /><br />
        <label>Category Icon (fa icon class <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_new">link</a>):</label><input type="text" name="icon" id="icon" placeholder="Put fa icon 5.14 class" class="form-control" ><br/><br/>
       
        <label>Category Image:</label><input type="text" name="categoryimage" id="categoryimage" placeholder="Put category image link" class="form-control" ><br/><br/>
        <label>Parent Category :</label>
     <select class="form-control" name="parentid">
         
         <option selecet="selected" value="0">No parent</option>  
         
         <?php
         foreach($fetchcat as $cat)
             
         { ?>
        
         <option  value="<?php echo $cat->idcategory ?>"><?php echo $cat->categoryname ?></option> 
             
    <?php          
         }
       ?>
      </select>
     <span class="form_error"><?php echo form_error('parentid'); ?></span> <br/><br/>
     
        <label>Category Description:</label><textarea name="categorydes" id="categorydes" rows="6" class="form-control" > </textarea>
        <span class="form_error"><?php echo form_error('categorydes'); ?></span> <br/><br/>
        
        
       <input type="submit" class="btn mybutton" value="ADD" >
    
    
    
    
    </form>
  </div>
</div>
    </div>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php $this->load->view('backoffice/footer');?>

<script type="text/javascript">

function myfunction(idcategory){
$.confirm({
    icon: 'fa fa-warning',
    title: 'Confirm!',
    content: 'Are you sure to delete the category? <br/> All its sub-categories will also be deleted..',
    type: 'red',
    buttons: {
        confirm: function () {
         window.location = "<?php echo base_url()?>backoffice/deletecategory/"+idcategory;
        },
        cancel: function () {
            $.alert('Canceled!');
        }
      }
});
}   





</script>
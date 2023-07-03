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
            <li><a href="#"><i class="fa fa-dashboard"></i> Issue</a></li>
            
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

<h2><?php echo $title ?></h2>
        <?php echo validation_errors(); ?>
        
        
        <form method="post" action="<?php echo base_url('backoffice/createissuecontroller'); ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" value="<?php echo $type=='C'? '':$update->name ?>"  name="name" id="name">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="text" class="form-control" value="<?php echo $type=='C'? '':$update->image ?>"  name="image" id="image">
            </div>
            <div class="form-group">
                <label for="image">Description:</label>
                <textarea class="form-control" rows="10" name="description"   id="description" ><?php echo $type=='C'? '':$update->description ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Publish Date:</label>
                <input type="date" class="form-control" name="date" value="<?php echo $type=='C'? '':date("Y-m-d", strtotime($update->date)) ?>"  id="image">
            </div>
            <input type="hidden" name="type" value="<?= $type ?>" />
            <input type="hidden" name="idissue" value="<?php echo $type=='C'? 0:$update->idissue ?>" />
            <button type="submit" class="btn btn-success w-100">Submit</button>
        </form>




        <h2>Issue List</h2>
    
        <table class="table table-bordered" style="margin-top: 3%" >
            <tr>
                <th>Name</th>
                <th>Image</th>
               
                <!-- <th>Update Date</th> -->
                <th>Date</th>
                 <th>Create Date</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($issues as $issue) { ?>
                <tr>
                    <td><?php echo $issue['name']; ?></td>
                    <td><?php echo $issue['image']; ?></td>
                  <td><?php echo $issue['date']; ?></td> 
                   <td><?php echo $issue['create_date']; ?></td>
                    <!-- <td><?php echo $issue['update_date']; ?></td> -->
                    
                    <td>
                        <a href="<?php echo base_url('backoffice/createissue/' . $issue['idissue']); ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="<?php echo base_url('backoffice/deleteissue/' . $issue['idissue']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this issue?')">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
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
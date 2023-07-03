<?php $this->load->view('backoffice/header');

?>



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

            <div class="col-sm-5">
              <?php if (imageType($details->type) == "image") { ?>
                <img class="img-responsive" src="<?php echo base_url() . $details->path ?>" alt="<?php echo $details->name ?>">
              <?php } else if (imageType($details->type) == "word") { ?>
                <img class="img-responsive" src="<?php echo base_url() ?>includes/images/word.png" alt="<?php echo $details->name ?>">

              <?php } else if (imageType($details->type) == "pdf") { ?>
                <img class="img-responsive" src="<?php echo base_url() ?>includes/images/pdf.png" alt="<?php echo $details->name ?>">


              <?php } ?>
            </div>
            <div class="col-sm-7">

              <table class="table table-striped ">

                <tr>

                  <td> <label>Media Type :</label></td>
                  <td><?php echo imageType($details->type) ?></td>
                </tr>
                <tr>

                  <td><label>Media Url:</label></td>
                  <td> <a href="<?php echo base_url() . $details->path ?>" target="_new"><span id="myDiv" style="margin-right:6%"> <?php echo base_url() . $details->path ?></span> </a>
                <button onclick="copyToClipboard()" class="btn btn-success">
  <i class="fas fa-copy"></i> Copy
</button>
         </td>       
                
                </tr>
                <tr>

                  <td><label>Date :</label></td>
                  <td><?php echo date_format(date_create($details->createdate), "d M, Y") ?></td>
                </tr>
                <tr>

                  <td><label>Delete :</label></td>
                  <td><a href="<?php echo base_url() . "backoffice/deletemedia/" . $details->mediakey ?>" class="btn btn-danger">Delete</a></td>
                </tr>


              </table>
            </div>



          </div>
        </div>
      </div><!-- /.box-body -->

    </div><!-- /.box -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('backoffice/footer'); ?>
<script>
   function copyToClipboard() {
    // Get the content of the div
    var content = document.getElementById('myDiv').innerText;

    // Create a temporary textarea element
    var textarea = document.createElement('textarea');
    textarea.value = content;
    document.body.appendChild(textarea);

    // Copy the content from the textarea
    textarea.select();
    document.execCommand('copy');

    // Remove the temporary textarea
    document.body.removeChild(textarea);

    // Show a success message (optional)
    alert('Content copied to clipboard!');
  }
</script>
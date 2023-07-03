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
  <div class="container-fluid" style="margin-bottom: 8%">
    <?php echo "<h2>Update " . $category->categoryname . "</h2>" ?>
    <div class="col-sm-12">
      <form method="post" action="<?php echo base_url() ?>backoffice/updatecat/<?php echo $category->idcategory ?>">
        <label>Category name:</label><input type="text" name="categoryname" id="categoryname" class="form-control" value="<?php echo $category->categoryname ?>">
        <span class="form_error"><?php echo form_error('categoryname'); ?></span> <br /><br />
      <label>Category Url:</label><input type="text" name="caturl" id="caturl" class="form-control" value="<?php echo $category->caturl ?>">
                <span class="form_error"><?php echo form_error('caturl'); ?></span> <br /><br />
        <label>Category Icon (fa icon class <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_new">link</a>):</label><input type="text" name="icon" id="icon" placeholder="Put fa icon 5.14 class" class="form-control" value="<?php echo $category->icon ?>"><br /><br />

        <label>Category Image:</label><input type="text" name="categoryimage" id="categoryimage" placeholder="Put category image link" class="form-control" value="<?php echo $category->categoryimage ?>"><br /><br />
        <label>Parent Category :</label>
        <select class="form-control" name="parentid">

          <option selecet="selected" value="0">No parent</option>

          <?php
          foreach ($fetchcat as $cat) { ?>

            <option value="<?php echo $cat->idcategory ?>" <?php if ($category->parentid == $cat->idcategory) {
                                                              echo 'selected';
                                                            } ?>><?php echo $cat->categoryname ?></option>

          <?php
          }
          ?>
        </select>
        <span class="form_error"><?php echo form_error('parentid'); ?></span> <br /><br />

        <label>Category Description:</label><textarea name="categorydes" id="categorydes" rows="6" class="form-control"><?php echo $category->categorydes ?>  </textarea>
        <span class="form_error"><?php echo form_error('categorydes'); ?></span> <br /><br />


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
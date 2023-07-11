<?php $this->load->view('backoffice/header'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="border:none !important">
        <h1>
            <?php echo  "New " . ucfirst($post->post_type) ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active"><?php echo  "New " . ucfirst($post->post_type) ?></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <!-- <script src="<?php echo base_url() ?>includes/ckeditor/ckeditor.js?<?php echo time() ?>"></script> -->
                <script src="<?php echo base_url() ?>includes/ckeditor/ckeditor.js?<?php echo time() ?>"></script>
                <div class="content">
                    <div class="container-fluid">
                        <?php if (!empty($post)) { ?>
                            <div class="col-sm-9">
                                <form method="post" id="content_form" action="<?php echo base_url() ?>backoffice/svaepostcontent/<?php echo $post->post_key ?>">
                                    <label><?php echo  ucfirst($post->post_type) ?> Url : </label><br />
                                    <?php if ($post->update_status == 'Y' & $post->post_type=="post") {
                                        echo base_url() . "article/" ;  ?>
                                        
                                         <input type="text" name="posturl" value="<?php echo $post->posturl ?>" style="width: 300px"> <br /><br />
                                        <?php }elseif($post->update_status == 'Y' & $post->post_type=="page") {
                                            
                                           echo base_url(); ?>
                                         <input type="text" name="posturl" value="<?php echo $post->posturl ?>" style="width: 300px"> <br /><br />
                                        <?php     } ?>
                                       
                                  <label>Author : <span class="form_error"><?php echo form_error('post_author'); ?></span></label>
                                    <select name="post_author[]" class="form-control" id="choices-multiple-remove-button" placeholder="Search authors to select" multiple="multiple">
                                        <?php foreach ($authors as $ath) { ?>
                                            <option value="<?php echo $ath->idbackoffice ?>" <?php if (in_array($ath->idbackoffice, explode(',', $post->post_author))) {
                                                                                                    echo "selected";
                                                                                                } ?>>
                                                <?php echo $ath->name  ?> </option>
                                        <?php } ?>
                                    </select>
                                    <br />

                                    <!--                 <input type="text" name="post_author"  value ="<?php if (isset($post->post_author)) {
                                                                                                            echo $post->post_author;
                                                                                                        } else {
                                                                                                            echo $this->session->userdata('name');
                                                                                                        } ?>" class="form-control" >  <br/>   -->

                                    <label>Title : <span class="form_error"><?php echo form_error('title');
                                                                            if (null !== $this->session->flashdata('same_title')) {
                                                                                echo $this->session->flashdata('same_title');
                                                                            } ?></span></label> <input type="text" name="title" value="<?php if (isset($post->title)) {
                                                                                                                                            echo $post->title;
                                                                                                                                        } ?>" class="form-control"> <br />


                                    <?php if ($post->post_type == 'post') { ?>
                                        <label>Abstract : <span class="form_error"><?php echo form_error('abstract'); ?></span></label>
                                        <textarea id="abstract" name="abstract" class="form-control" rows="5"><?php if (isset($post->abstract)) {
                                                                                                                    echo $post->abstract;
                                                                                                                } ?></textarea><br />
                                    <?php } ?>


                                       <label>Select Issue</label>

                                       <select name="issue" class="form-control">

                                       <option value="0">Select Issue</option>
                                       <?php foreach($issue as $is){ ?>
                                        <option value="<?php echo $is['idissue'] ?>" 
                                        <?php if(isset($post->issue) && $post->issue==$is['idissue']){echo "selected";} ?>
                                        
                                        ><?= $is['name'] ?></option>
                                        <?php } ?>
                                       </select> <br/><br/>



                                    <label>Content : <span class="form_error"><?php echo form_error('content'); ?></span></label>
                                    <textarea id="content" name="content" rows="50"><?php if (isset($post->content)) {
                                                                                        echo $post->content;
                                                                                    } ?></textarea><br />
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace('content', {
                                            filebrowserUploadUrl: '<?php echo base_url() ?>backoffice/ckeditor_upload',
                                            filebrowserUploadMethod: 'form'
                                        });
                                    </script>

                                    <label>Tags <span class="form_error"><?php echo form_error('tags'); ?></span></label>
                                    <input type="text" id="tags-input" name="tags" value="<?php if (isset($post->tags)) {
                                                                                                echo $post->tags;
                                                                                            } ?>" data-role="tagsinput" class="form-control" /> <br /><br />


                                    <input type="hidden" value="<?= $post->idpost ?>" name="idpost" >



<input type="submit" value="save" class="btn mybutton">




                                </form>

                            </div>

                            <div class="col-sm-3">

                                <div class="row">
                                    <?php if (isset($post->title)) { ?>
                                        <form action="<?php echo base_url() ?>backoffice/publishstatus/<?php echo $post->post_key ?>" method="post">



                                            <a target="_new" class="btn btn-primary" href="<?php if ($post->update_status == 'Y') echo base_url() . "" . $post->posturl ?>" style="float: left;"> View </a>
                                            <input type="submit" value="Publish" class="btn btn-primary" style="float: right;">




                                        </form>

                                    <?php } ?>
                                </div>

                                <div class="row" style="padding-left: 5%; margin-top: 15%">

                                    <?php if ($post->post_type == 'post') { ?>
                                        <label> Choose category </label><br />


                                        <?php if (!empty($treeview)) { ?>
                                            <ul style="list-style: none">


                                                <?php
                                                foreach ($treeview as $tview) {


                                                    if (chekinstring($post->category, $tview->idcategory) | ($post->category == "" & $tview->categoryname == "Uncategorised")) {
                                                        $checked = "checked";
                                                    } else {

                                                        $checked = "";
                                                    }


                                                ?>



                                                    <li><?php echo '<input type="checkbox" form="content_form" value="' . $tview->idcategory . '" name="category[]" ' . $checked . '> ' . $tview->categoryname ?>

                                                        <ul style="list-style: none">

                                                            <?php
                                                            if (!empty($tview->subs)) {
                                                                foreach ($tview->subs as $sub) {

                                                                    if (chekinstring($post->category, $sub->idcategory)) {
                                                                        $checked = "checked";
                                                                    } else {

                                                                        $checked = "";
                                                                    }
                                                            ?>
                                                                    <li><?php echo '<input type="checkbox" form="content_form" value="' . $sub->idcategory . '" name="category[]" ' . $checked . '> ' . $sub->categoryname ?>
                                                                    </li>



                                                            <?php }
                                                            }

                                                            ?>
                                                        </ul>

                                                    </li>
                                                <?php } ?>
                                            </ul>

                                    <?php } else {

                                            echo "No category has been created yet...";
                                        }
                                    } /* end od page if else */
                                    ?>

                                </div>

                                <div class="row" id="cover" style="align-content: center;padding-left: 5%;margin-top: 3%">
                                    <label> Upload Image </label><br />

                                    <?php if (isset($post->coveriamge)) {
                                        echo '<img class="img-responsive" src="' . base_url() . $post->coveriamge . '">';
                                    } ?> <br />

                                    <form enctype="multipart/form-data" method="post" action="<?php echo base_url() ?>backoffice/uploadcover/<?php echo $post->post_key ?>">


                                        <input type="file" id="upload" name="coveriamge" placeholder="click here to upload cover image" />
                                        <a style="text-decoration: none; cursor: pointer;" id="upload_link">Click here to
                                            upload cover image</a>

                                        <br /><br /> <input type="submit" value="Save" class="btn">

                                    </form>

                                    <span class="form_error"> <?php echo $this->session->flashdata('upload_error'); ?>
                                    </span>
                                    <span class="form_error"><?php echo form_error('coveriamge'); ?></span>

                                </div>
                            </div>

                        <?php } else {
                            show_404();
                        }

                        ?>
                    </div>
                </div>
            </div><!-- /.box-body -->

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->





<?php $this->load->view('backoffice/footer'); ?>

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style type="text/css">
    #upload {
        display: none
    }
</style>

<script>
    $(function() {
        $("#upload_link").on('click', function(e) {
            e.preventDefault();
            $("#upload:hidden").trigger('click');
        });
    });

    $(document).ready(function() {

        var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
            removeItemButton: true,
            maxItemCount: 22555,
            searchResultLimit: 22555,
            renderChoiceLimit: 552225
        });


    });
</script>
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

        <form method="post" action="<?php echo base_url() ?>backoffice/sendnewsletter">


            <label>Subscriber List</label> </br>
            <input type="text" id="tags-input" name="mail" value="
                   <?php
                    foreach ($maillist as $mlist) {


                        echo $mlist->mail . ', ';
                    }
                    ?>

                   " data-role="tagsinput" class="form-control" /> <br /><br />


            <label>News Letter</label> </br>

            <textarea id="newsletter" name="newsletter" row="70">
   <div class="row">          
<p style="text-align: center; margin-bottom: 3%">  
 <img src="<?php echo getLogo(); ?>" class="img-circle" style="width: 60px;height: 60px" > 
   
<h3 style="font-weight: bold; text-align: center"> NEWSLETTER</h3>
    
</p>
    </div>
<div class="row">

                    <?php foreach ($newsletter as $nwsltr) { ?>
        
        
        
          <div class="col-sm-2 text-center">
              <img src="<?php echo base_url() . $nwsltr->coveriamge ?>" class="img-circle" height="65" width="65" alt="Avatar">
            </div>
            <div class="col-sm-10">
                <a href="<?php echo base_url() ?>article/<?php echo $nwsltr->posturl ?>" target="_new" style="text-decoration: none; color:#337ab7" >     <h4><b><?php echo $nwsltr->title ?> </a></b><br/><small><?php echo date("d F, Y", strtotime($nwsltr->publish_date)) ?></small></h4>
              <p><?php echo $nwsltr->abstract ?></p>
              <br>
            </div>

        
                        <?php }
                        ?>

    <p style="text-align:center">
        Want to change how you receive these emails? <br/>
        <a href="<?php echo base_url() ?>unsubscribe" target="_new"> You can un-subscribe from this list. </a>
        
    </p>    
    
</div>

                            </textarea>


            <script>
                var editor = new Jodit("#newsletter", {
                    zIndex: 0,
                    readonly: !1,
                    activeButtonsInReadOnly: ["source", "fullsize", "print", "about", "dots"],
                    toolbarButtonSize: "middle",
                    theme: "default",
                    saveModeInCookie: !1,
                    spellcheck: !0,
                    editorCssClass: !1,
                    triggerChangeEvent: !0,
                    width: "auto",
                    height: 350,
                    minHeight: 100,
                    direction: "",
                    language: "auto",
                    debugLanguage: !1,
                    i18n: "en",
                    tabIndex: -1,
                    toolbar: !0,
                    enter: "P",
                    defaultMode: Jodit.MODE_WYSIWYG,
                    useSplitMode: !1,
                    colorPickerDefaultTab: "background",
                    imageDefaultWidth: 300,
                    removeButtons: [],
                    disablePlugins: [],
                    extraButtons: [],
                    sizeLG: 900,
                    sizeMD: 700,
                    sizeSM: 400,
                    sizeSM: 400,
                    buttons: ["source", "|", "bold", "strikethrough", "underline", "italic", "|", "ul", "ol", "|", "outdent", "indent", "|", "font", "fontsize", "brush", "paragraph", "|", "image", "video", "table", "link", "|", "align", "undo", "redo", "|", "hr", "eraser", "symbol", "fullsize"],
                    buttonsXS: ["bold", "image", "|", "brush", "paragraph", "|", "align", "|", "undo", "redo", "|", "eraser", "dots"],
                    events: {},
                    textIcons: !1
                });
            </script>

            <br /><br />

            <center><button type="submit" class="btn btn-danger"><i class="fas fa-paper-plane"></i> Send mail</button></center>

        </form>


    </div>
</div>
            </div><!-- /.box-body -->
           
          </div><!-- /.box -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $this->load->view('backoffice/footer'); ?>
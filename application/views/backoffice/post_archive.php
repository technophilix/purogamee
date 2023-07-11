<?php $this->load->view('backoffice/header'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<style>
    .panel.with-nav-tabs .panel-heading {
        padding: 5px 5px 0 5px;
    }

    .panel.with-nav-tabs .nav-tabs {
        border-bottom: none;
    }

    .panel.with-nav-tabs .nav-justified {
        margin-bottom: -1px;
    }

    /********************************************************************/
    /*** PANEL INFO ***/
    .with-nav-tabs.panel-info .nav-tabs>li>a,
    .with-nav-tabs.panel-info .nav-tabs>li>a:hover,
    .with-nav-tabs.panel-info .nav-tabs>li>a:focus {
        color: #31708f;
    }

    .with-nav-tabs.panel-info .nav-tabs>.open>a,
    .with-nav-tabs.panel-info .nav-tabs>.open>a:hover,
    .with-nav-tabs.panel-info .nav-tabs>.open>a:focus,
    .with-nav-tabs.panel-info .nav-tabs>li>a:hover,
    .with-nav-tabs.panel-info .nav-tabs>li>a:focus {
        color: #31708f;
        background-color: #bce8f1;
        border-color: transparent;
    }

    .with-nav-tabs.panel-info .nav-tabs>li.active>a,
    .with-nav-tabs.panel-info .nav-tabs>li.active>a:hover,
    .with-nav-tabs.panel-info .nav-tabs>li.active>a:focus {
        color: #31708f;
        background-color: #fff;
        border-color: #bce8f1;
        border-bottom-color: transparent;
    }

    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu {
        background-color: #d9edf7;
        border-color: #bce8f1;
    }

    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>li>a {
        color: #31708f;
    }

    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>li>a:hover,
    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>li>a:focus {
        background-color: #bce8f1;
    }

    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>.active>a,
    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>.active>a:hover,
    .with-nav-tabs.panel-info .nav-tabs>li.dropdown .dropdown-menu>.active>a:focus {
        color: #fff;
        background-color: #31708f;
    }

    #sortable tr:hover {
    cursor:move;
}
</style>




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
                <div class="container-fluid">
                    <div class="row" style="padding: 3%">
                        <div class="panel with-nav-tabs panel-info">
                            <div class="panel-heading">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab1info" data-toggle="tab" style="color:green">Posts (<i class="far fa-file-word"></i>)</a></li>
                                    <li><a href="#tab2info" data-toggle="tab" style="color:red">Trash (<i class="fas fa-trash"></i>) </a></li>


                                </ul>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="tab1info">
                                        <table id="posttable" class="table table-responsive  table-striped table-bordered">
                                            <thead>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Categories</th>
                                                <th>Issue</th>
                                                <!--                            <th>Tags</th>    -->
                                                <th>Publish Date</th>
                                                <th>Publish Status</th>
                                                <th>Post view</th>
                                                <th>Edit/Delete</th>
                                            </thead>
                                            <tbody id="sortable">
                                                <?php $count = 1;
                                                foreach ($post as $postdata) { ?>
                                                    <tr id="<?php echo $postdata->idpost ?>">
                                                        <td><?php echo $count ?></td>
                                                        <td><b><?php echo $postdata->title ?></b></td>
                                                        <td><?php echo ucfirst($postdata->post_type) ?></td>
                                                        <td><?php echo get_category($postdata->category) ?></td>
                                                       <td><?php echo $postdata->name ?></td>
                                                        <td><?php if($postdata->publish_date!=null){echo date("d F, Y", strtotime($postdata->publish_date));}else{echo date("d F, Y", strtotime($postdata->update_date));} ?></td>
                                                        <td><?php echo $postdata->publish_status ?></td>
                                                        <td><?php echo $postdata->viewes ?></td>
                                                        <td><a title="Edit the post" href="<?php echo base_url() ?>backoffice/newpost/<?php echo $postdata->post_key ?>" style="color:green;text-decoration: none"><i class="fa fa-edit"></i> </a> | <a href="#" title="Send to trash" onclick='sendToTrash("<?php echo $postdata->post_key ?>", "<?php echo $postdata->title ?>")' style="color:red;text-decoration: none"> <i class="fa fa-trash"></i> </a> </td>
                                                    </tr>
                                                <?php $count++;
                                                } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="tab2info">
                                        <table id="posttable" class="table table-responsive  table-striped table-bordered">
                                            <thead>
                                                <th>#</th>
                                                <th>Title</th>
                                                <th>Type</th>
                                                <th>Categories</th>
                                                <!--                            <th>Tags</th>    -->
                                                <th>Publish Date</th>
                                                <th>Publish Status</th>
                                                <th>Post view</th>
                                                <th>Edit/Delete</th>
                                            </thead>
                                            <tbody>
                                                <?php $count = 1;
                                                foreach ($posttrash as $postdata) { ?>
                                                    <tr>
                                                        <td><?php echo $count ?></td>
                                                        <td><b><?php echo $postdata->title ?></b></td>
                                                        <td><?php echo ucfirst($postdata->post_type) ?></td>
                                                        <td><?php echo get_category($postdata->category) ?></td>
                                                        <!--                                        <td><?php echo $postdata->tags ?></td>-->
                                                        <td><?php echo date("d F, Y", strtotime($postdata->publish_date)) ?></td>
                                                        <td><?php echo $postdata->publish_status ?></td>
                                                        <td><?php echo $postdata->viewes ?></td>
                                                        <td><a title="Restore Post" href="<?php echo base_url() ?>backoffice/getpostagain/<?php echo $postdata->post_key ?>" style="color:green;text-decoration: none"><i class="fas fa-redo"></i> </a> | <a href="#" title="Delete Permanently" onclick='sendToTrash2("<?php echo $postdata->post_key ?>", "<?php echo $postdata->title ?>")' style="color:red;text-decoration: none"> <i class="fa fa-trash"></i> </a> </td>
                                                    </tr>
                                                <?php $count++;
                                                } ?>
                                            </tbody>

                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div><!-- /.box-body -->

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('backoffice/footer'); ?>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#posttable').DataTable({

        });
    });


    function sendToTrash(postkey, title) {

        $.confirm({
            icon: 'fa fa-warning',
            title: 'Confirm!',
            content: 'Are you sure to delete the post <b><i>' + title + '</i></b> ?',
            type: 'red',
            buttons: {
                confirm: function() {
                    window.location = "<?php echo base_url() ?>backoffice/deletepost/" + postkey;
                },
                cancel: function() {
                    $.alert('Canceled!');
                }
            }
        });
    }

    function sendToTrash2(postkey, title) {

        $.confirm({
            icon: 'fa fa-warning',
            title: 'Confirm!',
            content: 'Are you sure to delete the post <b><i>' + title + '</i></b> ?',
            type: 'red',
            buttons: {
                confirm: function() {
                    window.location = "<?php echo base_url() ?>backoffice/deletepostpermanently/" + postkey;
                },
                cancel: function() {
                    $.alert('Canceled!');
                }
            }
        });
    }
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function(e) {
        window.location.hash = e.target.hash;
    })


    $(function() {
        $('#sortable').sortable({
            stop: function() {
                var ids = '';
                $('#sortable tr').each(function() {
                    id = $(this).attr('id');
                    if (ids == '') {
                        ids = id;
                    } else {
                        ids = ids + ',' + id;
                    }
                })
                $.ajax({
                    url: "<?php echo base_url() . 'backoffice/changerowrank/' ?>",
                    dataType: "json",
                    data: {
                        ids: ids,
 
                    },
                    type: 'post',
                    success: function(data) {

                        
                        // $("#tab1info").load(location.href+" #tab1info>*","");
                       alert('Order saved successfully');
                    }
                })

                console.log(ids)
            }
        });
    });




</script>
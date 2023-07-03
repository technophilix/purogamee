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
                <div class="container-fluid">

                    <div class="row" style="margin-top: 4%; margin-bottom: 4%; padding: 3%;">
                        <p>
                            <a href="<?php echo base_url() ?>backoffice/adduser" class="btn btn-primary"><i class="fa fa-plus"></i> Add user</a>
                        </p>


                        <table id="usertable" class="table table-responsive  table-striped table-bordered">
                            <thead>
                                <th>#</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Bio</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>

                                <?php


                                $count = 1;
                                foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><img src="<?php echo base_url() . $user->profilepic ?>" class="img-circle" style="width: 80px;height: 80px;"></td>
                                        <td><?php echo $user->name ?></td>
                                        <td><?php echo $user->descriptions ?></td>
                                        <td><a href="<?php echo base_url() ?>backoffice/adduser/<?php echo $user->idbackoffice ?>"><i class=" fa fa-edit"></i></a></td>
                                        <td> <a href="#" title="Delete Permanently" onclick="sendToTrash2('<?php echo $user->idbackoffice ?>', '<?php echo $user->name ?>')" style="color:red;text-decoration: none"> <i class="fa fa-trash"></i> </a></td>
                                    </tr>

                                <?php
                                    $count++;
                                } ?>

                            </tbody>



                        </table>

                    </div>

                </div>
            </div><!-- /.box-body -->

        </div><!-- /.box -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $this->load->view('backoffice/footer'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#usertable').DataTable({

        });
    });

    function sendToTrash2(idbackoffice, title) {

        $.confirm({
            icon: 'fa fa-warning',
            title: 'Confirm!',
            content: 'Are you sure to delete the user <b><i>' + title + '</i></b> ?',
            type: 'red',
            buttons: {
                confirm: function() {
                    window.location = "<?php echo base_url() ?>backoffice/deleteuser/" + idbackoffice;
                },
                cancel: function() {
                    $.alert('Canceled!');
                }
            }
        });
    }
</script>
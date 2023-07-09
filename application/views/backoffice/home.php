
<?php $this->load->view('backoffice/header');

if ($this->uri->segment(3) === "email_success")
{
?>


 <?php }

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fas fa-tachometer-alt"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo count($totalpost) ?></h3>
                  <p>Total posts</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="<?php echo base_url() ?>backoffice/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo rand(1,2) ?><sup style="font-size: 20px">%</sup></h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo count($totaluser) ?></h3>
                  <p>User Registrations</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo base_url() ?>backoffice/user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>65</h3>
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 connectedSortable">
              <!-- Custom tabs (Charts with tabs)-->
              <div class="nav-tabs-custom" style="padding:2%">


              <div class="card">
              <div class="header">
                        <h4 class="title">Views</h4>
                        <p class="category"> Select dates</p>
                    </div>
                    <div class="content">  
               <label>Start Date</label>        
              <input type="date" name="start-date"class="form-control" /><br/>
              <label>End Date</label>  
              <input type="date" name="start-date"class="form-control" />
                <!-- Tabs within a box -->
                </div> 

                </div> 
              </div><!-- /.nav-tabs-custom -->
   <!-- quick email widget -->
              <div class="box box-info">
                <div class="box-header">
                  <i class="fa fa-comments"></i>
                  <h3 class="box-title">Approve Comments</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div>
                <div class="box-body">
                <div class="row">
            

            <div class="col-md-12">
                <div class="card ">
                    <div class="header">
                        <h4 class="title"></h4>
                        <p class="category"><?php echo sizeof($comments)?> comments are waiting for approval </p>
                    </div>
                    <div class="content">
                        <div class="table-full-width">
                            <table class="table">
                                <tbody>
                                     <?php foreach($comments as $comment) {?> 
                                                                           
                                      <tr>
                                        <td style="text-align: justify; "><?php echo 
                                        
                                        '<b>'.$comment->name. " leave a comment to the post ". get_title($comment->post_key) ." on ".date("d F, Y", strtotime($comment->date)).'</b><br/><br/>'.
                                        
                                        $comment->comment ?></td>
                                        <td style="text-align: justify"></td>
                                        <td class="td-actions text-right">
                                            <a type="button" href="<?php echo base_url() ?>/backoffice/approve/<?php echo $comment->idcomments?>" rel="tooltip" title="Approve Comments" class="btn btn-info btn-simple btn-xs">
                                                <i class="fa fa-check-square"></i>
                                            </a>
                                            <a type="button" rel="tooltip" href="<?php echo base_url() ?>/backoffice/deleteComment/<?php echo $comment->idcomments?>" title="Delete Comment" class="btn btn-danger btn-simple btn-xs">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                
                                   <?php } ?>
                                
                                 
                             
                                 
                                </tbody>
                            </table>
                        </div>

                        <div class="footer">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </div>
               
              </div>

            </section><!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-5 connectedSortable">

              <!-- Map box -->
              <div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                    <button class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                  </div><!-- /. tools -->

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    Visitors
                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div><!-- /.box-body-->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-1"></div>
                      <div class="knob-label">Visitors</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <div id="sparkline-2"></div>
                      <div class="knob-label">Online</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <div id="sparkline-3"></div>
                      <div class="knob-label">Exists</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div>
              </div>
              <!-- /.box -->

              <!-- solid sales graph -->
              <div class="box box-solid bg-teal-gradient">
                <div class="box-header">
                  <i class="fa fa-th"></i>
                  <h3 class="box-title">Server Graph</h3>
                  <div class="box-tools pull-right">
                    <button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body border-radius-none">
                  <div class="chart" id="line-chart" style="height: 250px;"></div>
                </div><!-- /.box-body -->
                <div class="box-footer no-border">
                  <div class="row">
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <input type="text" class="knob" data-readonly="true" value="<?php echo $server["cpu"] ?>" data-width="60" data-height="60" data-fgColor="#39CCCC">
                      <div class="knob-label">CPU Usage</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                      <input type="text" class="knob" data-readonly="true" value="<?php echo $server["ram"] ?>" data-width="60" data-height="60" data-fgColor="#39CCCC">
                      <div class="knob-label">Ram Usage</div>
                    </div><!-- ./col -->
                    <div class="col-xs-4 text-center">
                      <input type="text" class="knob" data-readonly="true" value="4" data-width="60" data-height="60" data-fgColor="#39CCCC">
                      <div class="knob-label">Space Occupied</div>
                    </div><!-- ./col -->
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
  </section><!-- right col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php $this->load->view('backoffice/footer'); ?>
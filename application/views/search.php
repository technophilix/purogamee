<?php $this->load->view('header'); ?>

<style>
    a {
        text-decoration:  none !important;
       
    }
</style>
<div class="container mt-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Search</a></li>
    <li class="breadcrumb-item active"><?php echo $squery ?></li>
  </ol>
</nav>
   
     <?php
     
    
                    if (sizeof($categorypost) == 0) {
                        
                     echo '<div class="alert alert-primary" role="alert" style="margin-top:5%">
  There are no post to show...
</div>';   
                        
                    } else {
                        foreach ($categorypost as $catpost) {
                            ?> 
                        


    <div class="col-md-12 my-4">
        
        <div class="row">

    <!-- Grid column -->
    <div class="col-lg-5">

      <!-- Featured image -->
      <div class="overlay rounded z-depth-2 mb-lg-0 mb-4">
        <img class="img-thumbnail" src="<?php echo base_url() . $catpost->coveriamge ?>" alt="Sample image">
        <a>
          <div class="mask rgba-white-slight"></div>
        </a>
      </div>

    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

      <!-- Category -->
      <a href="#!" class="green-text">
          <h6 class="font-weight-bold mb-3"><i class="fas fa-user pr-2"></i><?php echo getAuthorfromID($catpost->post_author) ?> | <i class="fa fa-calendar"></i> <?php echo date("d F, Y", strtotime($catpost->publish_date)) ?>
<!--          | <i class="icon-comment"></i> <a href="#"><?php echo $catpost->count ?> Comment(s)</a>
          | <i class="fa fa-eye"></i> <a href="#"><?php echo ($catpost->viewes != null ? $catpost->viewes : 0) ?>-->
          
          </h6>
      </a>
      <!-- Post title -->
      <h3 class="font-weight-bold mb-3"><strong> <?php echo $catpost->title ?></strong></h3>
      <!-- Excerpt -->
      <p><?php if($catpost->abstract!= ""){echo $catpost->abstract ;}else {echo  post_gist(strip_tags($catpost->content)) ;} ?></p>
      <!-- Post data -->
      <p><i class="fa fa-tags"></i> <?php $tags = explode (",", $catpost->tags); 
          
          foreach($tags as $tag) {
          ?>
          <a href="<?php echo base_url()?>tags/<?php echo $tag ?>"><span class="badge badge-pill badge-secondary py-1"><?php echo $tag ?></span></a> 
     
      <?php  } ?>
           </p> 
      <!-- Read more button -->
      <a class="btn aqua-gradient btn-md" href="<?php echo base_url() . 'article/' . $catpost->posturl ?>">Read more</a>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

    </div>
               
 
     <?php 
     
                        }
     
          }?>
    </div>  
<?php $this->load->view('footer'); ?>
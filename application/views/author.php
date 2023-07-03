<?php $this->load->view('header'); ?>

<style>
    a {
        text-decoration:  none !important;
       
    }

    .card {
        border-radius: 10px; 
        
    }
    
    .card-title {
        
        text-overflow: ellipsis !important;
        font-size: 1.0em;
        color: black !important;
    }
    
    p {
          font-weight:  400;
    }
    
    .card-text {
        font-family: Roboto;
        font-weight: bold;
    }
    
    #subscribe {
        border-left:  3px solid white
    }
    
    #authorimg {
         width: 100%;height: 100%; border-radius: 50% ; border:3px solid #c4c2c2
    }
    
   @media only screen and (max-width: 768px) {
  #subscribe {
        border-left:  none;
    }
    
    #authdes h2, h5{
        
        text-align: center;
        margin-top: 5%;
    }
  
     #authdes p{
        
        text-align: justify;
        padding: 4%;
    }
    #authorimg {
         width: 70%;
         height: 70%; 
         border-radius: 50% ; 
         border:3px solid #c4c2c2 ;
         margin-left: auto;
         margin-right: auto;
        
    }
}

@media screen and (min-width: 600px)  {
        .mobile-break { display: none; }
    }
</style>
<div class="container mt-3">
<!--  <div class="w-100 text-center white-text justify-content-between py-5 deep-purple lighten-1">

      <h1 class="text-center text-shadow" ><?php echo getAuthorfromID(rawurldecode($this->uri->segment(3, 0))) ?></h1>
      
      
  </div>-->
 
   <div class="row mt-5" >
       
       
     <div class="col-sm-4 align-items-center order-sm-12">
      <div class="view">
            <img src="<?php echo getAuthorImgfromID($author->idbackoffice) ?>" class="img-fluid" id="authorimg" alt="<?php echo getAuthorfromID($author->idbackoffice) ?>" >
        </div>
    </div>
      <div class="col-sm-8 mb-4 order-sm-1 " id="authdes" >

       
   <div>
          
    <h2 class="font-weight-bold mb-4"><?php echo getAuthorfromID($author->idbackoffice) ?></h2>
  <h5 class="font-weight-bold mb-4"><?php echo $author->designation ?></h5>
          <p><?php echo getAuthorDes($author->idbackoffice) ?></p>

 <a href="<?php echo $author->social1 ?>" class="btn btn-fb btn-sm"><i class="fab fa-facebook-f"></i></a>
<!--Twitter-->
<a href="<?php echo $author->social2 ?>" class="btn btn-tw btn-sm"><i class="fab fa-twitter"></i></a>
<!--Google +-->
<a href="<?php echo $author->social3 ?>"  class="btn btn-insta btn-sm"><i class="fab fa-instagram"></i></a>
<!--Linkedin-->
<a href="<?php echo $author->social4 ?>" class="btn btn-li btn-sm"><i class="fab fa-linkedin-in"></i></a>

        </div>
      </div>
      
   
     
         
         </div>
<div class="row mt-5 p-2">
    <h3 >Posts from <br class="mobile-break"><?php echo $author->name ?></h3>
</div>
    
    <div class="row mt-3">
        
<?php foreach($authorpost as $pt) { ?>              
<div class="col-sm-4 col-xs-12 mt-3">
                    <!-- Card -->
<div class="card">

  <!-- Card image -->
  <div class="view overlay">
    <img class="card-img-top" src="<?php echo base_url().$pt->coveriamge ?>"
      alt="<?php echo $pt->title ?>">
    <a href="<?php echo base_url()?>article/<?php echo $pt->posturl ?>">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <a href="<?php echo base_url()?>article/<?php echo $pt->posturl ?>"> <h4 class="card-title"><?php echo $pt->title ?></h4> </a>
    <!-- Text -->
    <p class="font-weight-regular indigo-text py-.5">
        <i class="fa fa-calendar"></i> <?php echo date ("d F, Y" , strtotime($pt->publish_date)) ?>
        <h6 class="font-weight-regular indigo-text py-.5"><a href="<?php echo base_url()."category/".get_category($pt->category, false) ?>"> <?php echo get_category($pt->category) ?> </a></h6>

    
    </p>
    <!-- Button -->


  </div>

</div>
                    
                    
                </div>
  <?php  } ?>   
        
    </div>
    
    
    </div>  
<?php $this->load->view('footer'); ?>
<?php $this->load->view('header') ?>
<style>
    @font-face {
    font-family: 'kalpurush';
    src: url(../fonts/kalpurush.ttf) ;
/*    unicode-range: U+00-FF, U+980-9FF;*/
}

body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif;
    background: #f9f9f9
}

.gg-box {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    grid-auto-rows: 200px;
    grid-gap: 8px
}

.gg-box img {
    object-fit: cover;
    cursor: pointer;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.02);
    border-radius: 10px
}

.gg-box img:hover {
    opacity: .5;
    transition: all 0.5s ease;
}

#gg-screen {
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 1;
    top: 0;
    left: 0;
    background: rgba(255, 255, 255, 1);
    z-index: 9999;
    text-align: center;
  
}

#gg-screen .gg-image {
    height: 100%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    
        
}

#gg-screen .gg-image img {
    max-width: 50%;
    max-height: auto;
    margin: 0 auto
}

#gg-screen name {
    display: block
}

.gg-btn {
    width: 50px;
    height: 50px;
    background: none;
    color: #000000;
    text-align: center;
    line-height: 47px;
    vertical-align: middle;
    cursor: pointer;
    -moz-transition: all .4s ease;
    -o-transition: all .4s ease;
    -webkit-transition: all .4s ease;
    transition: all .4s ease;
    font-size: 25px;
    /*border:1px solid rgba(0,0,0,0.05);*/
    box-sizing: border-box;
    padding-left: 2px;
    position: fixed;
    bottom: 10px
}

.gg-btn:hover {
    background: rgba(255, 255, 255, 0.8);
    color: black
}

.gg-close {
    top: 10px
}

.gg-close,
.gg-next {
    right: 10px
}

.gg-prev {
    left: 10px
}

.gg-prev,
.gg-next {
    bottom: 50%;
    font-size: 40px;
}

@media(min-width:478px) {
    .gg-box img:nth-child(3n+0) {
        grid-row-end: span 2
    }
}

@media(max-width:768px) {
    .gg-box {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        grid-auto-rows: 150px;
        grid-gap: 6px
    }
}

@media(max-width:450px) {
    .gg-box {
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        grid-auto-rows: 100px;
        grid-gap: 4px
    }
}


</style>
<script src="https://cdn.jsdelivr.net/sharer.js/latest/sharer.min.js"></script>

<div class="container" style="margin-top: 10%">
    <h2 style="font-weight: bold; text-align: center; text-decoration: underline; margin-bottom: 3%">Gallery</h2>
   
      <div class="gg-container">
      <div class="gg-box">
          
          <?php for($i=1; $i< 56; $i++) {?>
         <img src="<?php echo base_url().'includes/images/gallery/gallery ('.$i.').jpg' ?>" class="img-thumbnail">
    
         
         
         
           <?php } ?>
          
          
      </div>  
     </div> 
    
</div>
<?php $this->load->view('footer') ?>

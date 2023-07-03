<?php $this->load->view('header');?>	

<style>
    .newsletter {
    position: relative;
    padding-top: 4%;
   padding-left: 30%;
    flex-grow: 1;
}

.newsletter svg {
    position: absolute;
    z-index: 0;
    top: -90px;
    left: 60px;
    fill: #fcdbe8;
}

.newsletter .newsletter-title {
    margin-bottom: 40px;
    font-family: IMFell DW,Times,Georgia,serif;
    font-weight: 400;
    font-style: italic;
    color: #1107ff;
    font-size: 4.0625rem;
    letter-spacing: -.02em;
    line-height: .9230769231;
    position: relative;
    z-index: 999;
}

.newsletter .newsletter-text {
    color: rgba(17,7,255,.8);
/*    padding-right: 140px;*/
    position: relative;
    z-index: 999;
    font-size: 16px;
    max-width: 450px;
}

.newsletter .newsletter-form {
    position: relative;
    max-width: 355px;
    margin-top: 23px;
    z-index: 999;
}

.newsletter .newsletter-form input {
    height: 55px;
    width: 100%;
    padding: 18px 135px 17px 30px;
    font-family: IM Fell English,Times,Georgia,serif;
    font-weight: 400;
    font-style: italic;
    border: 1px solid black;
    border-radius: 20px;
    outline: none;
    background-color: #fff;
    color: #1107ff;
    font-size: 1.125rem;
    line-height: 1;
}

.newsletter .newsletter-form button {
    font-family: Sofia Pro,Helvetica,Arial,sans-serif;
    font-weight: 700;
    font-style: normal;
    width: 116px;
    height: 36px;
    transition: background-color .3s cubic-bezier(.165,.84,.44,1);
    border-radius: 15px;
    background-color: #ff66a0;
    color: #fff;
    font-size: .875rem;
    line-height: 1;
    position: absolute;
    right: 9px;
    bottom: 9px;
    display: inline-block;
    margin: 0;
    padding: 0;
    border: 0px;
    outline: none;
    text-decoration: none;
    cursor: pointer;
}


</style>

<section class="contact-page-area pt-50 pb-120">
<div class="container" style="margin-top:4%;margin-bottom: 4%">
	<div class="newsletter js-rollover" data-radius="50">
<!--      <svg viewBox="0 0 694 549" width="694" height="549">
        <path d="M74.7,439.6c58.9,76.3,152.2,113.1,224.6,109C585.8,532.3,734.2,295,684.7,94.2C658.7-11.3,508.1-8.6,433.6,9.8C384.1,22,329.1,47.8,277.8,60.4c-42.5,10.5-90,7.2-130.4,17.1C60.4,99-21.1,201.9,4.9,307.6C16.7,355.3,45.2,401.4,74.7,439.6z"></path>
      </svg>-->

       <p class="newsletter-text">Don’t miss anything anymore. We promise we will not spam you!</p>

      <form method="post" action="<?php echo base_url()?>unsubmail" class="newsletter-form" >
        <input type="email" name="subscribe" id="email" placeholder="Enter your email" required/>
        <button type="submit" class="button">Un-Subscribe</button>
      </form>
       
        <?php  if ($this->uri->segment(2) === "success")
{  
     
  echo '<br/><br/><h3 style="color :RED"> You are un-subscribed from our mailing list. </h3>'   ;
}     ?>
    </div>
    

 
 
    
</div>
</section>

<?php $this->load->view('footer');?>
 <!-- jQuery -->
 <!-- Footer -->
 <!-- 
one time modal -->
<style>
     .table-borderless>tbody>tr>td,
     .table-borderless>tbody>tr>th,
     .table-borderless>tfoot>tr>td,
     .table-borderless>tfoot>tr>th,
     .table-borderless>thead>tr>td,
     .table-borderless>thead>tr>th {
         border: none;
     }
 </style>
 <div class="modal fade" id="eBookModal" role="dialog">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">

                 <img src="<?php echo base_url() ?>uploads/siteetc/cestuss_head.png" style="width:200px; height: 68px;">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>


             </div>
             <div class="modal-body">
                 গোটা পৃথিবী নাকি এখন গ্লোবাল ভিলেজে পরিণত হয়েছ! অন্তর্জালে হাতের মুঠোয় চলে আসছে সমস্ত তথ্য। কিন্তু গোটা পৃথিবী হাতের মুঠোয় আনতে গিয়ে ঘরের কাছের শিশির বিন্দু চোখের আড়ালে চলে যাচ্ছে নাতো? এই প্রশ্ন নিয়েই পথ চলা শুরু ‘পুরোগামী’-এর। ‘পুরোগামী’ চেনা পরিবেশে চেনা জিনিসের কার্যকারণ, যুক্তি আরও একবার মনে করিয়ে দিতে চায় সবাইকে। ‘পুরোগামী’-এর ইচ্ছে এইটুকুই।

             </div>
         </div>
     </div>
 </div>
 <!-- end of one time modal -->

 <div class="modal" tabindex="-1" role="dialog" id="getCodeModal">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header" style="border-bottom: 0 none !important;">
                 <img src="<?php echo getLogo() ?>" style="width:40px; height: 40px;">


             </div>
             <div class="modal-body" id="getCode">

             </div>
             <div class="modal-footer" style="border-top: 0 none !important ;">

                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Ok</button>
             </div>
         </div>
     </div>
 </div>
 <footer class="page-footer font-small red darken-4 pt-4 mt-3">

     <!-- Footer Links -->
     <div class="container-fluid text-center text-md-left">

         <!-- Grid row -->
         <div class="row">

             <!-- Grid column -->
             <div class="col-md-4 mt-md-0 mt-3">

                 <!-- Content -->
                 <img src="<?php echo base_url() ?>includes/images/logotmfooter.png" class="img-fluid" id="logo" style="height: 50px;width: auto;">
                 <p style="margin-top:2%">
                     <a class="btn-floating btn-sm btn-fb" type="button" role="button" href="https://www.facebook.com/Bohemiaana/"><i class="fab fa-facebook-f"></i></a>
                     <!--Twitter-->
                     <a class="btn-floating btn-sm btn-tw" type="button" role="button" href="#"><i class="fab fa-twitter"></i></a>
                     <a class="btn-floating btn-sm btn-pin" type="button" role="button" href="#"><i class="fab fa-pinterest"></i></a>
                     <a class="btn-floating btn-sm btn-insta" type="button" role="button" href="#"><i class="fab fa-instagram"></i></a>
                 </p>

                 <div style="margin-top:2%" class="justify-content-center" id="subsfooter">
                     <div class="input-group mb-3">
                         <input type="email" class="form-control" placeholder="Subcribe Purogami" aria-label="Recipient's username" id="frormsubfoot" aria-describedby="button-addon2">
                         <div class="input-group-append">
                             <button class="btn btn-md btn-success m-0 px-3 py-2 z-depth-0 waves-effect" type="button" id="button-addon2">Go</button>
                         </div>
                     </div>
                 </div>



             </div>
             <!-- Grid column -->

             <hr class="clearfix w-100 d-md-none pb-3">

             <div class="col-sm-4 text-justify">
                 গোটা পৃথিবী নাকি এখন গ্লোবাল ভিলেজে পরিণত হয়েছ! অন্তর্জালে হাতের মুঠোয় চলে আসছে সমস্ত তথ্য। কিন্তু গোটা পৃথিবী হাতের মুঠোয় আনতে গিয়ে ঘরের কাছের শিশির বিন্দু চোখের আড়ালে চলে যাচ্ছে নাতো? এই প্রশ্ন নিয়েই পথ চলা শুরু ‘পুরোগামী’-এর। ‘পুরোগামী’ চেনা পরিবেশে চেনা জিনিসের কার্যকারণ, যুক্তি আরও একবার মনে করিয়ে দিতে চায় সবাইকে। ‘পুরোগামী’-এর ইচ্ছে এইটুকুই।

             </div>

             <div class="col-sm-4">
                 <h6>Contact</h6>
                 <table class="table table-responsive table-borderless" style="color:white">

                     <!-- <tr>
                         <td><i class="fas fa-mobile-alt"></i></td>
                         <td>9830465710 | 9433264972</td>
                     </tr> -->

                     <tr>
                         <td><i class="fas fa-envelope"></i></td>
                         <td>purogamisahityo@gmail.com</td>
                     </tr>
                     <tr>
                         <td><i class="fas fa-map-marker-alt"></i></td>
                         <td>C/o Apurba Dasgupta <br />
                             Makaltala choto jhilpar, Bally- Durgapur,<br />

                             Howrah- 711205</td>
                     </tr>
                 </table>



             </div>

         </div>

     </div>
     <!-- Grid row -->

     </div>
     <!-- Footer Links -->

     <!-- Copyright -->
     <div class="footer-copyright text-center py-3" style="background-color: #403d3d">
         <p style="color:white"> <a href="<?php echo base_url() ?>">Home </a> | <a href="<?php echo base_url() ?>aboutus">About </a>| <a href="<?php echo base_url() ?>contact">Contact Us
             </a> </a></p>

         <div class="text-center">
             <a href="<?php echo base_url() ?>privecy">Privacy Policy. &nbsp; &nbsp;</a>
             <a href="<?php echo base_url() ?>">© 2019-<?php echo date("Y") ?> পূরোগামী &nbsp;</a>
             <a href="<?php echo base_url() ?>">All Right Reserved. &nbsp;&nbsp; </a>
             <a href="https://www.technophilix.com">Designed and Developed : Technophilix &nbsp;&nbsp; </a>
         </div>

         <!-- Copyright -->

 </footer>
 <!-- Footer -->
 <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/jquery.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/bootstrap.min.js"></script>
 <!-- Bootstrap tooltips -->
 <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/popper.min.js"></script>
 <!-- Bootstrap core JavaScript -->
 <!-- MDB core JavaScript -->
 <script type="text/javascript" src="<?php echo base_url() ?>includes/main/js/mdb.min.js"></script>
 <!-- Your custom scripts (optional) -->
 <script>
     /*$('.navbar .dropdown > a').click(function() {
 if (!$(this).hasClass("parent-clicked")) {
    $(this).addClass("parent-clicked");
  } else {
    location.href = this.href;
  }
});
*/

     $(document).ready(function() {
         // jQuery code

         ///////////////// fixed menu on scroll for desctop
         //  if ($(window).width() > 992) {

         var navbar_height = $('.navbar').outerHeight();

         $(window).scroll(function() {
             if ($(this).scrollTop() > 200) {
                 $('.navbar-wrap').css('height', navbar_height + 'px');
                 $('#myheader').addClass("fixed-top");
                 $('#homeicon').hide();
                 $('#middlelogo').show();

             } else {
                 $('#myheader').removeClass("fixed-top");
                 $('.navbar-wrap').css('height', 'auto');
                 $('#middlelogo').hide();
                 $('#homeicon').show();
             }
         });
         //  } // end if


     }); // jquery end

     $("#basic-text1").click(function() {

         var subscribe = document.getElementById('subemailid').value;
         //        var dataString = 'discounted='+discounted+'&idproduct='+idproduct+'&name='+name+'&imagepath='+imagepath+'&iduser='+iduser+'&quantity='+quantity;

         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "web/addsubscription/" ?>',
             dataType: 'HTML',
             data: {
                 subscribe: subscribe

             },
             cache: false,
             success: function(data) {

                 $("#getCode").html(data);
                 $("#getCodeModal").modal('show');

             }
         });


     });

     $("#button-addon2").click(function() {

         var subscribe = document.getElementById('frormsubfoot').value;
         //        var dataString = 'discounted='+discounted+'&idproduct='+idproduct+'&name='+name+'&imagepath='+imagepath+'&iduser='+iduser+'&quantity='+quantity;

         $.ajax({
             type: 'POST',
             url: '<?php echo base_url() . "web/addsubscription/" ?>',
             dataType: 'HTML',
             data: {
                 subscribe: subscribe

             },
             cache: false,
             success: function(data) {

                 $("#getCode").html(data);
                 $("#getCodeModal").modal('show');

             }
         });


     });

     // $(document).ready(function() {
     //     // Check if user saw the modal
     //     var key = 'hadModal',
     //         hadModal = localStorage.getItem(key);

     //     // Show the modal only if new user
     //     if (!hadModal) {
     //         $('#eBookModal').modal('show');
     //     }

     //     // If modal is displayed, store that in localStorage
     //     $('#eBookModal').on('shown.bs.modal', function() {
     //         localStorage.setItem(key, true);
     //     })
     // });
 </script>


 <script src="<?php echo base_url() ?>includes/js/grid-gallery.min.js"></script>

 </body>

 </html>
<?php $this->load->view('header'); ?>
<style>


.card-title {

    text-overflow: ellipsis !important;
    font-size: 1.0em;
    color: black !important;
    text-align: left;
}

#content {

    margin-top: 4%;
    text-align: left !important;
    text-justify: initial;
    font-weight: 400;
    /*        word-spacing: 0.1em;*/
}

#content p {
    line-height: 1.6em;
    font-size: 1.0em;
    /*font-family: Georgia;*/
    text-align: justify !important;
}



#content table {
    width: 100% !importantimportant;
    font-size1.2em;
}

figcaption {
    display: table-caption;
    caption-side: bottom;
}

@media only screen and (max-width: 768px) {
    #content p {
        line-height: 1.9em;
        font-size: 1.0em;
        text-align: justify !important;
        ;
    }

    #content img {
        max-width: 100% !important;
        height: auto !important;
    }
}


#social {
    display: flex;
    justify-content: flex-end
}


a {

    white-space: -moz-pre-wrap !important;
    /* Mozilla, since 1999 */
    white-space: -webkit-pre-wrap;
    /* Chrome & Safari */
    white-space: -pre-wrap;
    /* Opera 4-6 */
    white-space: -o-pre-wrap;
    /* Opera 7 */
    white-space: pre-wrap;
    /* CSS3 */
    word-wrap: break-word;
    /* Internet Explorer 5.5+ */
    word-break: break-all;
    white-space: normal;

}

blockquote {
    background: #f9f9f9;
    border-left: 10px solid #ce4634;
    margin: 1.5em 10px;
    padding: 0.5em 10px;
    quotes: "";
}

blockquote:before {
    color: #ccc;
    content: "";
    font-size: 4em;
    line-height: 0.1em;
    margin-right: 0.25em;
    vertical-align: -0.4em;
}

blockquote p {
    display: inline;
}
</style>
<div class="container-fluid " style="margin-bottom: 4%; padding-left:5%; padding-right:5%">
    <div class="row" style="margin-top: 6%">
        <div class="col-sm-12">
            <h1 style="font-weight: bold"><?php echo $title ?></h1>
            <div class="row mt-5" style="border-top: 0px; border-bottom: 0px; margin-top: 4%;">
                <div class="col-sm-12" style="font-family: 'notoserif', sans-serif;">


              <?php if ($postcontent->post_type == "post") {
            echo $postcontent->publish_date!=null?"Published: " . date("d F, Y", strtotime($postcontent->publish_date)):"Published: " . date("d F, Y", strtotime($postcontent->create_date));
          } ?>


                    <!-- AddToAny BEGIN -->
<!--                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style ">-->
<!---->
<!--                        <a class="a2a_button_facebook m-2"></a>-->
<!--                        <a class="a2a_button_twitter m-2"></a>-->
<!--                        <a class="a2a_button_pinterest m-2"></a>-->
<!--                        <a class="a2a_button_whatsapp m-2"></a>-->
<!--                    </div>-->
<!--                    <script async src="https://static.addtoany.com/menu/page.js"></script>-->
                    <!-- AddToAny END -->


					<!-- <div class="btn-group d-flex justify-content-end" role="group" aria-label="Button Panel">
						<button class="btn btn-sm btn-dark btn-icon" onclick="increaseFontSize()">
							<i class="fas fa-font"></i> Font Increase
						</button>
						<button class="btn btn-sm btn-dark btn-icon" onclick="toggleNightMode()">
							<i class="fas fa-moon"></i> Night Mode
						</button>
						<button class="btn btn-sm btn-dark btn-icon" onclick="listenToText()">
							<i class="fas fa-volume-up"></i> Listen
						</button>
						<button class="btn btn-sm btn-dark btn-icon" onclick="shareContent()">
							<i class="fas fa-share-alt"></i> Share
						</button>
						<button class="btn btn-sm btn-dark btn-icon" onclick="downloadContent()">
							<i class="fas fa-download"></i> Download
						</button>
					</div> -->



                </div>
            </div>
             <?php if ($postcontent->post_type =='post') { ?>
                <div class="col-sm-12"  style="font-family: 'notoserif'; sans-serif;"><strong>Author</strong>:<?= $author->name ?></div>
                 
<!--                    <img class="img-fluid" src="--><?php //echo base_url() . $postcontent->coveriamge ?><!--"-->
<!--                        style="margin-top: 8%;" alt="--><?php //echo $postcontent->title ?><!--">-->
                    <?php } ?>

                    <?php if ($postcontent->post_type =='post') { ?>
                    <div id="content" class="mt-5 mr-4 text-justify" style="font-size:0.8em">

                        <i><?php echo $postcontent->abstract ?></i>

                    </div>

                    <?php } ?>

                    <div id="content" class="mt-5 mr-4 ">

                   <?php     echo add_responsive_class($postcontent->content)

						
						?>

                    </div>


            </div>


        </div>




    </div>


    <?php $this->load->view('footer'); ?>

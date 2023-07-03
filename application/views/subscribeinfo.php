<?php $this->load->view('header'); ?>

<style>
    .box {
	margin: auto;
}

.heading {
	font-weight: bold;
	font-size: 30px;
}

.sub-heading {
	border-top: 1px solid #E0E0E0;
	border-bottom: 1px solid #E0E0E0;
	padding: 8px 0 8px 0;
	margin-top: 20px;
	margin-bottom: 35px;
}

.card {
	padding: 8%;
	padding-bottom: 30px;
	padding-top: 35px;
	margin-top: 60px;
	margin-bottom: 80px;
	background-color: #ffffff;
	border-radius: 0;
}

textarea[name="message"] {
	resize: none;
}

#e-mail {
	height: 45px;
}

#message {
	height: 120px;
}

input.input-box, textarea.input-box {
	background-color : #E0E0E0;
	border: #616161;
	color: #000000;
	font-size: 15px;
	padding: 15px auto 15px auto !important;
	height: 50px !important;
}

input.input-box:focus, textarea.input-box:focus {
	background-color: #212121;
	color: #ffffff;
}

.rm-border:focus {
	border-color: inherit;
	-webkit-box-shadow: none;
	box-shadow: none;
}

form .form-control::-webkit-input-placeholder { 
  	color: #9E9E9E;
}

::-moz-placeholder {
  	color: #9E9E9E !important;
}

input.btn-black {
	background-color: #000000;
	color: #ffffff;
	font-weight: bold;
	height: 50px;
    width:100%
}

.thanks {
	color: #000000 !important;
	text-align: center;
}

.thanks:hover {
	color: #00000 !important;
	text-decoration: underline;
}

.conditions {
	font-size: 12px;
	color: #BDBDBD;
	text-align: center;
}
</style>

    <div class="bg-grey">
	<div class="container">
		<div class="row justify justify-content-center">
			<div class="col-12 col-lg-9 col-xl-8">
				<form class="">
					
					<div class="card">
						<div class="row justify-content-center">
						<div class="col-md-9 col-11">
						<div class="row mt-0">
							<div class="col-md-12 ">
								<h4 class="text-center heading">Subscribe to access the journals.</h4>
								<p class="text-center sub-heading">Contact with our admins</p>
							</div>
						</div>

						<div class="form-group row mb-3">
							<div class="col-md-12 mb-0">
								<input id="e-mail" type="text" placeholder="ENTER YOUR EMAIL" name="email" class="form-control input-box rm-border text-center">
							</div>
						</div>

						<div class="form-group row justify-content-center mb-0">       
			                <div class="col-md-12 px-3">
			                  	<input type="submit" value="GET IT NOW!" class="btn w-100  btn-black rm-border">
			                </div>
			            </div>

			            <div class="form-group row justify-content-center mb-0">       
			                <div class="col-md-12 px-3 mt-4">
			                  	<a href="<?php echo base_url() ?>"><p class="thanks">No Thanks</p></a>
			                </div>
			            </div>

			            <div class="form-group row justify-content-center mb-0">       
			                <div class="col-md-12 px-3">
			                  	<p class="conditions">  Ordinary Member: Rs. 500/-; Life Member :Rs.2000/</p>
			                </div>
			            </div>
					</div>
					</div>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>






<?php $this->load->view('footer'); ?>
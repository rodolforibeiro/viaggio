	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="<?php echo base_url();?>">Home</a></li>
			<li class="active">Personal Profile</li>
		</ol>

		<?php if (isset($msg)) echo $msg; ?>

		<div class="row">
		<?php  if (isset($formErrors)) { if($formErrors){?>
		<div class="alert alert-danger">
			<?=$formErrors?>
		</div>
		<?php } } ?>		
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<!-- <p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.html">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p> 
							<hr>-->

							<form class="form-control" style="border: none" action="<?= base_url("index.php/welcome/cadastrar") ?>"  method="post">
							    <div class="top-margin">
									<label>Username</label>
									<input type="text" class="form-control" name="username" id="user" value="<?=set_value('username')?>">
								</div>
								<div class="top-margin">
									<label>First Name</label>
									<input type="text" class="form-control" name="firstname" id="fname" value="<?=set_value('firstname')?>">
								</div>
								<div class="top-margin">
									<label>Last Name</label>
									<input type="text" class="form-control" name="lastname" id="lname" value="<?=set_value('lastname')?>">
								</div>
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="email"  id="email" value="<?=set_value('email')?>"><br />

									<!-- <input type="text" class="form-control" name="inputemail" id="email"> --> 
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="password" id="password">
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="confirmpassword" id="confirmpassword">
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox"> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" type="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	
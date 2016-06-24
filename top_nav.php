
	<div class="top_nav">
		<div class="nav_menu">
			<nav class="" role="navigation">
				<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="nav toggle col-md-3 col-sm-3 col-xs-12">
					<a id="menu_toggle"><i class="fa fa-bars"></i></a>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-12" align="right">
				<a class=" user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false" >
						<?php 
							$pageID = '';
							if (!(empty($_GET['pageID']))) {
								$pageID = $_GET['pageID']; 
							}
							if($pageID == ''){ 
								$pageID = '';
							} 
		
							echo "<h2 style='text-transform: capitalize;'>",$pageID,"</h2>";
						?>
					</a>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12" align="right">
					<ul class="nav navbar-nav navbar-right">
					<li class="">
						<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

							<?php
								include('connect.php');
							
								$name_query = "SELECT * from users where email='$email'";
								$result_name = mysqli_query($con,$name_query);
								$name_row = mysqli_fetch_assoc($result_name);
								$name = $name_row['name'];
								$last_name = $name_row['last_name'];
								$url = $name_row['url'];
								$path = "images/".$url ;
								
							?>

							<img src="<?php echo $path ;?>" alt="">
							<?php
								echo $name.' '.$last_name;
								
							?>
							<span class=" fa fa-angle-down"></span>
						</a>
						<ul class="dropdown-menu dropdown-usermenu pull-right">
							<li>
								<a data-toggle="modal" data-target="#profile_image">Update Profile Picture</a>
							</li>
							<li>
								<a data-toggle="modal" data-target="#profile">My Profile</a>
							</li>
							<li>
								<a data-toggle="modal" data-target="#password">Change Password</a>
							</li>
							<li>
								<a href="javascript:;">Help</a>
							</li>
							<li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
							</li>
						</ul>
					</li>
				</div>
				</div>
					<!--<li role="presentation" class="dropdown">
						<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-envelope-o"></i>
							<span class="badge bg-green">6</span>
						</a>
						<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
							<li>
								<a>
									<span class="image">
										<img src="images/img.jpg" alt="Profile Image" />
									</span>
									<span>
										<span>John Smith</span>
										<span class="time">3 mins ago</span>
									</span>
									<span class="message">
										Film festivals used to be do-or-die moments for movie makers. They were where...
									</span>
								</a>
							</li>
							<li>
								<div class="text-center">
									<a href="inbox.html">
										<strong>See All Alerts</strong>
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</li>
						</ul>
					</li>-->
				</ul>
			</nav>
		</div>
	</div>
	<!-- Update Profile Picture Modal -->
	<div class="modal fade" id="profile_image" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<div class="x_panel">
						<div class="x_content"> 
							<h2 align="center">Update Profile Picture</h2><br />
							<form id="demo-form2" method="post"  action="profile_image_update.php" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Profile Image <span class="required">(upto 2MB)</span></label>
									<div class="col-md-6 col-sm-6 col-xs-12" align="center">
										<input type="file" name="user_image" id="user_image" class="form-control "> 
										<input type="hidden" name="email1" class="form-control" value="<?php echo $email;?>" > 
									</div>
								</div>

								<div><HR WIDTH="100%" NOSHADE></div>
								<div class="col-md-12 col-sm-12 col-xs-12 " align="right">
									<button  type="submit" class="btn btn-success">Update</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Profile Modal -->
	<div class="modal fade" id="profile" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<div class="x_panel">
						<div class="x_content"> 
							<h2 align="center">User Profile</h2><br />
							<form id="demo-form2" method="post"  action="profile_update.php" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Client <span class="required"></span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="client" id="client" class="form-control" value="<?php 
											
											$list_query_name = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
											$run_list_name = mysqli_fetch_array($list_query_name);
											$first_name = $run_list_name['name'];
											$user_client = $run_list_name['client'];
											$last_name = $run_list_name['last_name'];
											
											$list_query_client = mysqli_query($con,"SELECT * FROM clients WHERE id='$user_client'");
											$run_list_client = mysqli_fetch_array($list_query_client);
											$client_name = $run_list_client['name'];
										
										echo $client_name;?>" disabled> 
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title <span class="required"></span>*</label>
									<div class="col-md-2 col-sm-6 col-xs-12">
										<select class="form-control col-md-7 col-xs-12" name="title">
											<option value="Mr">Mr.</option>
											<option value="Mrs">Mrs.</option>
											<option value="Miss">Miss</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">First Name <span class="required"></span>*</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<?php 
										?>
										<input name="first_name" id="first_name" class="form-control" value="<?php echo $first_name;?>"> 
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Last Name <span class="required"></span>*</label>
									<div class="col-md-6 col-sm-6 col-xs-12" align="center">
										<input name="last_name" id="last_name" class="form-control" value="<?php echo $last_name;?>"> 
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email ID <span class="required"></span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="email" id="email" class="form-control" value="<?php echo $email;?>" disabled> 
										<input type="hidden" name="email1" class="form-control" value="<?php echo $email;?>" > 
										<input type="hidden" name="added_by" value="<?php echo $idofuser; ?>">
									</div>
								</div>
								<div><HR WIDTH="100%" NOSHADE></div>
								<div class="col-md-12 col-sm-12 col-xs-12 " align="right">
									<button  type="submit" class="btn btn-success">Update</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>	

<!-- Change Password Modal -->
	<div class="modal fade" id="password" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
					<div class="x_panel">
						<div class="x_content"> 
							<h2 align="center">Change Password</h2><br/>

							<form id="demo-form2" name="frmChange" method="post"  action="password_update.php" data-parsley-validate class="form-horizontal form-label-left" onSubmit="return validatePassword()">
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Email ID <span class="required"></span></label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input name="email" id="email" class="form-control" value="<?php echo $email;?>" disabled>
										<input type="hidden" name="email1" id="email1"class="form-control" value="<?php echo $email;?>" > 
										<input type="hidden" name="added_by1" id="added_by1" value="<?php echo $idofuser; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Current Password <span class="required"></span>*</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" name="old_pass" id="old_pass" class="form-control"> 
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">New Password <span class="required"></span>*</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" name="new_pass" id="new_pass" class="form-control"> 
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="name">Confirm Password <span class="required"></span>*</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="password" name="confirm_pass" id="confirm_pass" class="form-control"> 
									</div>
								</div>
								<div><HR WIDTH="100%" NOSHADE></div>
								<div class="col-md-12 col-sm-12 col-xs-12 " align="right">
									<button  type="submit" class="btn btn-success">Update</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		var new_pass = document.getElementById('new_pass');
		var confirm_pass = document.getElementById('confirm_pass');

		var checkPasswordValidity = function() {
			if (new_pass.value != confirm_pass.value) {
				new_pass.setCustomValidity('Passwords must match.');
			} else {
				new_pass.setCustomValidity('');
			}        
		};

		new_pass.addEventListener('change', checkPasswordValidity, false);
		confirm_pass.addEventListener('change', checkPasswordValidity, false);
	</script>
	
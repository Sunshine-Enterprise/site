
<?php
$id = user('id');
$query = "SELECT * FROM users WHERE id = $id";
$info = query($query);
echo '<pre>';
//print_r($info);
echo '</pre>';





?>


<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit profile</h2>
					<p>Confirm your information for your next interview.</p>
				</div>
				<!-- Edit Personal Info -->
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="widget personal-info">
                        <form method="post">
							<h3 class="widget-header user">Edit Personal Information</h3>
								<!-- First Name -->
                                <?php foreach ($info as $row ): ?>
								<div class="form-group">
									<label for="first-name">First Name</label>
									<input type="text" value='<?=$row['fname']?>' class="form-control" id="first-name">
								</div>
								<!-- Last Name -->
								<div class="form-group">
									<label for="last-name">Last Name</label>
									<input type="text" value='<?=$row['lname']?>' class="form-control" id="last-name">
								</div>
                                <!-- Comunity Email -->
                                <div class="form-group">
                                    <label for="comunity-name">Email</label>
                                    <input type="text" value='<?=$row['email']?>' class="form-control" id="comunity-name">
                                </div>
                                <!-- Zip Phone -->
                                <div class="form-group">
                                    <label for="zip-code">Phone Number</label>
                                    <input type="text" value='<?=$row['phone']?>' class="form-control" id="zip-code">
                                </div>
                                <!-- Zip Phone -->
                                <div class="form-group">
                                    <label for="zip-code">State</label>
                                    <input type="text" value='<?=$row['state']?>' class="form-control" id="zip-code">
                                </div>
                                <!-- Zip Phone -->
                                <div class="form-group">
                                    <label for="zip-code">City</label>
                                    <input type="text" value='<?=$row['city']?>' class="form-control" id="zip-code">
                                </div>
                                <?php endforeach; ?> 
								
								<!-- Submit button -->
								<button class="btn btn-transparent">Save My Changes</button>
							</form>
						</div>
					</div>

			  

					<div class="col-lg-6 col-md-6">
						<!-- Change Password -->
					<div class="widget change-password">
						<h3 class="widget-header user">Edit Password</h3>
						<form method="post">
							<!-- Current Password -->
							<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="password" class="form-control" id="current-password">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" class="form-control" id="new-password">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" class="form-control" id="confirm-password">
							</div>
							<!-- Submit Button -->
							<button class="btn btn-transparent">Change Password</button>
						</form>
					</div>

                    <div class="col-lg-12 col-md-12 p-0">
                    <div class="widget personal-info">
                            <form method="post">
                                <label for="zip-code">Resume:</label></br>
                                <div class="form-group choose-file d-inline-flex">
                                    <i class="fa fa-file text-center px-3"></i>
                                    <input type="file" class="form-control-file mt-2 pt-1" id="input-file">
                                </div>
                            </form>
                        <button class="btn btn-transparent">Update my Resume</button>
                    </div>
                    </div> 

                </div>   

					</div>
				</div>
                
		</div>
        <a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/user">Go back</a>
	</div>

</section>

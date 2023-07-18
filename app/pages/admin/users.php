
<?php if($action == 'add'):?>
  <div class="container">
    <div class="row">
       <div class="col-12">
    <form method="post">
            <fieldset class="p-4">
            <div class="row">
          <!---First Name---------------------------->

                <div class="col">
                <input value="<?=old_value('fname')?>" type="text" class="form-control mb-3" placeholder="First name*" name="fname" >
                <?php if(!empty($errors['fname'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['fname']?></div>
                <?php endif; ?>
                </div>

          <!---Last Name--------------------------->
                      
                <div class="col">
                <input value="<?=old_value('lname')?>" type="text" class="form-control mb-3" placeholder="Last name*" name="lname" >
                <?php if(!empty($errors['lname'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['lname']?></div>
                <?php endif; ?>  
              </div>
            </div>

                <div class="row">
          <!---Password--------------------------->

                <div class="col">
                    <input value="<?=old_value('password1')?>" class="form-control mb-3" type="password" placeholder="Password*" name="password1" >
                <?php if(!empty($errors['password1'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['password1']?></div>
                <?php endif; ?>
                  </div> 
                <div class="col"> 
                    <input value="<?=old_value('password2')?>" class="form-control mb-3" type="password" placeholder="Confirm your password*" name="password2" >
                <?php if(!empty($errors['password2'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['password2']?></div>
                <?php endif; ?>
                  </div>

              </div>

              <div class="row">
          <!---Phone--------------------------->
                <div class="col">
                  <input value="<?=old_value('phone')?>" class="form-control mb-3" type="text" placeholder="Phone Number*" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" />
                  <?php if(!empty($errors['phone'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['phone']?></div>
                  <?php endif; ?>
                </div>  
              </div>
            
              <div class="row">
          <!---Email--------------------------->
              <div class="col"> 
                  <input value="<?=old_value('email')?>" class="form-control mb-3" type="text" placeholder="Email*" name="email">  
                  <?php if(!empty($errors['email'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['email']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>       
            <div class="row">

            
          <!---Email--------------------------->
              <div class="col"> 
                  <select name="role" id="" class="form-control mb-3 w-100">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="employeer"> Employeer </option>
                    <option value="recluiter">Recluiter</option>
                  </select>
                  <?php if(!empty($errors['role'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['role']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>       


            <div class="row">

          <!---State--------------------------->
                <div class="col">
                    <input value="<?=old_value('state')?>" class="form-control mb-3" type="text" placeholder="State*" name="state">
                    <?php if(!empty($errors['state'])):?>
                      <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                    <?php endif; ?>
                </div> 
          <!---City--------------------------->                    
                <div class="col">
                <input value="<?=old_value('city')?>" class="form-control mb-3" type="text" placeholder="City*" name="city">
                      <?php if(!empty($errors['city'])):?>
                        <div class="text-danger mb-3">
                          <?='* '.$errors['city']?>
                        </div>
                      <?php endif; ?> 
                </div> 
          <!---ZipCode--------------------------->                  
                <div class="col">
                    <input value="<?=old_value('zipcode')?>" class="form-control mb-3" type="text" placeholder="ZipCode*" name="zipcode">
                      <?php if(!empty($errors['zipcode'])):?>
                          <div class="text-danger mb-3">
                            <?='* '.$errors['zipcode']?>
                          </div>
                        <?php endif; ?> 
                </div>  
            </div>


              <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Create</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/users">Go back</a>

            </fieldset>
          </form>
</div>
</div>
</div>
</div>

<?php elseif($action == 'edit'):?>
  <div class="container">
    <div class="row">
       <div class="col-12">
    <form method="post">
            <fieldset class="p-4">
              <?php if(!empty($row)):?>
            <div class="row">

          <!---First Name---------------------------->

                <div class="col">
                <input value="<?=old_value('fname', $row['fname'])?>" type="text" class="form-control mb-3" placeholder="First name*" name="fname" >
                <?php if(!empty($errors['fname'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['fname']?></div>
                <?php endif; ?>
                </div>

          <!---Last Name--------------------------->
                      
                <div class="col">
                <input value="<?=old_value('lname', $row['lname'])?>" type="text" class="form-control mb-3" placeholder="Last name*" name="lname" >
                <?php if(!empty($errors['lname'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['lname']?></div>
                <?php endif; ?>  
              </div>
            </div>

                <div class="row">
          <!---Password--------------------------->

                <div class="col">
                    <input value="<?=old_value('password1')?>" class="form-control mb-3" type="password" placeholder="Password*" name="password1" >
                <?php if(!empty($errors['password1'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['password1']?></div>
                <?php endif; ?>
                  </div> 
                <div class="col"> 
                    <input value="<?=old_value('password2')?>" class="form-control mb-3" type="password" placeholder="Confirm your password*" name="password2" >
                <?php if(!empty($errors['password2'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['password2']?></div>
                <?php endif; ?>
                  </div>

              </div>

              <div class="row">
          <!---Phone--------------------------->
                <div class="col">
                  <input value="<?=old_value('phone'), $row['phone']?>" class="form-control mb-3" type="text" placeholder="Phone Number*" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');" />
                  <?php if(!empty($errors['phone'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['phone']?></div>
                  <?php endif; ?>
                </div>  
              </div>

          <?php if($row['role'] == 'admin'):?>
          <!------------------------------------>
          <!---Photo--------------------------->
          <!----------------------------------->
              <div class="row">
                <div class="col-6">
                <div class="input-group">

          <div class="custom-file mb-3">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
                </div>  
              </div>
          <!----------------------------------->
          <!---Photo--------------------------->
          <!----------------------------------->
          <?php endif; ?>

              <div class="row">
          <!---Email--------------------------->
              <div class="col"> 
                  <input value="<?=old_value('email'), $row['email']?>" class="form-control mb-3" type="text" placeholder="Email*" name="email">  
                  <?php if(!empty($errors['email'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['email']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>       
            
            <div class="row">
          <!---State--------------------------->
                <div class="col">
                    <input value="<?=old_value('state'), $row['state']?>" class="form-control mb-3" type="text" placeholder="State*" name="state">
                    <?php if(!empty($errors['state'])):?>
                      <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                    <?php endif; ?>
                </div> 
          <!---City--------------------------->                    
                <div class="col">
                <input value="<?=old_value('city'), $row['city']?>" class="form-control mb-3" type="text" placeholder="City*" name="city">
                      <?php if(!empty($errors['city'])):?>
                        <div class="text-danger mb-3">
                          <?='* '.$errors['city']?>
                        </div>
                      <?php endif; ?> 
                </div> 
          <!---ZipCode--------------------------->                  
                <div class="col">
                    <input value="<?=old_value('zipcode'), $row['zipcode']?>" class="form-control mb-3" type="text" placeholder="ZipCode*" name="zipcode">
                      <?php if(!empty($errors['zipcode'])):?>
                          <div class="text-danger mb-3">
                            <?='* '.$errors['zipcode']?>
                          </div>
                        <?php endif; ?> 
                </div>  
            </div>

            <div class="row">
          <!---Role--------------------------->
              <div class="col"> 
                <select  class="w-100" type="text" placeholder="Role*" name="role">
                   <option <?=old_select('role','user',$row['role'])?> value="user">User</option>
                    <option <?=old_select('role','admin',$row['role'])?> value="admin">Admin</option>
                    <option <?=old_select('role','employeer',$row['role'])?> value="employeer"> Employeer </option>
                    <option <?=old_select('role','recluiter',$row['role'])?> value="recluiter">Recluiter</option>
                </select>              
              </div>
            </div>

              <button type="submit" class="btn btn-warning font-weight-bold mt-3 border" data-toggle="modal" data-target="#CreateAccount">Save</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3" href="<?=ROUTE?>/admin/users">Go back</a>

            </fieldset>
            <?php else: ?> 
            <div class='alert alert-danger text center'>User not found</div>
            <?php endif; ?> 
          </form>
</div>
</div>
</div>
</div>

<?php elseif($action == 'delete'):?>
  
  <div class="container">
  <h3>Delete User</h3>
    <div class="row">
       <div class="col-12">
    <form method="post">
          <fieldset class="p-4">
            <?php if(!empty($row)):?>
              <div class="row">
                 <div class="col">
                      <input value="<?=old_value('fname'), $row['fname']?>" class="form-control mb-3" disabled type="text" placeholder="ZipCode*" name="zipcode">
                  </div>  
              </div>
              <div class="row">
                 <div class="col">
                      <input value="<?=old_value('lname'), $row['lname']?>" class="form-control mb-3" disabled type="text" placeholder="ZipCode*" name="zipcode">
                  </div>  
              </div>
              <div class="row">
                 <div class="col">
                      <input value="<?=old_value('email'), $row['email']?>" class="form-control mb-3" disabled type="text" placeholder="ZipCode*" name="zipcode">
                  </div>  
              </div>
              <div class="row">
                 <div class="col">
                      <input value="<?=old_value('phone'), $row['phone']?>" class="form-control mb-3" disabled type="text" placeholder="ZipCode*" name="zipcode">
                  </div>  
              </div>
              <?php endif; ?>  
          </fieldset>
          <button type="submit" class="btn btn-danger font-weight-bold mt-3" data-toggle="modal" data-target="#DeleteUser">Delete</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/users">Go back</a>
    </form>
 </div>   
 </div>   
 </div>   
 </div>   
<?php else:?>


<?php
$limit = 5;
$offset = ($PAGE['page_number']-1) * $limit;
$query = "SELECT * FROM users order by id desc limit $limit offset $offset";
$rows = query($query);

?>
                <!-- Recently Favorited -->
  <div class="container">
    <div class="row">
       <div class="col-12">
					<h3 class="widget-header">Sunshine Users</h3>
					<table class="table table-responsive">
						<thead>
							<tr>
                <th scope="col">Role</th>                      
								<th scope="col">Name</th>
								<th scope="col">L-Name</th>
								<th scope="col">Phone</th>
								<th scope="col">Email</th>
								<th scope="col">State</th>
								<th scope="col">City</th>
								<th scope="col">ZipCode</th>                      
								<th scope="col">Action</th>                      
								<th scope="col">Action</th>                      
						   
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($rows)):?>
                            <?php foreach($rows as $row):?>
							<tr class="">
              <td>
                  <?php if($row['role'] == 'user'){
                      echo'<p class="bg-success text-light border rounded p-2 text-center">user<p>';

                  }elseif($row['role'] == 'employeer'){
                    echo'<p class="bg-warning text-dark border rounded p-2 text-center">employeer<p>';                      
                  
                  }elseif($row['role'] == 'admin'){
                    
                    echo'<p class="bg-primary text-light border rounded p-2 text-center">admin<p>';
                  
                  }elseif($row['role'] == 'recluiter'){
                    
                    echo'<p class="bg-info text-light border rounded p-2 text-center">Recluiter<p>';
                  
                  }
                  
                  ?>
                </td>
								<td scope="row"><?=$row['fname']?></td>
								<td><?=$row['lname']?></td>
								<td><?=$row['phone']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['state']?></td>
								<td><?=$row['city']?></td>
								<td><?=$row['zipcode']?></td>
								
								<td> 
                  <a href="<?=ROUTE.'/admin/users/edit/'?><?=$row['id']?>" data-toggle="tooltip" data-placement="top" title="Edit" class="edit">
                      <i class="fa fa-pencil"></i>
                  </a>
                </td>
								<td>
                  <a href="<?=ROUTE.'/admin/users/delete/'?><?=$row['id']?>" data-toggle="tooltip" data-placement="top" title="Delete" class="delete">
                      <i class="fa fa-trash"></i>
                  </a>
                </td>
							</tr>
                            <?php endforeach;  ?>
                            <?php  endif; ?>
						</tbody>
					</table>
        <a href="<?=ROUTE.'/admin/users/add'?>">
            <button  type="submit" class="btn btn-warning btn-sm">
              Create new User
            </button>
        </a>
        <a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/admin">Go back</a>

        </div>
      </div>
      </div>
      </div>

				<!-- pagination -->
				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="<?=$PAGE['prev_link'] ?>" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="<?=$PAGE['first_link'] ?>">1</a></li>
							
							<li class="page-item">
								<a class="page-link" href="<?=$PAGE['next_link'] ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>

                    <?php endif;?>
				<!-- pagination -->


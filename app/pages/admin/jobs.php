

<?php if($action == 'add'):?>
  <div class="container">
    <div class="row">
       <div class="col-12">

         <form method="post">
            <fieldset class="p-1">
            <!---jobname--------------------------->
              <div class="row">
                <div class="col">
                  <input value="<?=old_value('jobname')?>"  class="form-control mb-3" type="text" placeholder="Job name*" name="jobname" />
                  <?php if(!empty($errors['jobname'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['jobname']?></div>
                  <?php endif; ?>
                </div>  
              </div>

            <!---industry--------------------------->
              <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('industry')?>" class="form-control mb-3 w-100" placeholder="Industry*" name="industry"> 
                  <?php
                  $query = "SELECT * FROM industries order by IndustryId desc";
                  $industries = query($query);
                  ?>
                    <option value="">--Choose Industry--</option>
                  <?php if(!empty($industries)): ?>
                        <?php foreach($industries as $industry): ?>
                                <option value="<?php echo $industry['IndustryId']?>"> <?php echo $industry['Nameindustry'] ?></option>
                        <?php endforeach; ?> 
                  <?php endif; ?> 
                   
                </select> 
                  <?php if(!empty($errors['industry'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['industry']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>
              
              <!---description--------------------------->
              <div class="row">
                <div class="col">
                    <div class="sform-floating">
                        <textarea placeholder="SEO description" rows="2" class="form-control" type="text" placeholder="Description*" name="description"></textarea>
                    </div>
                </div>  
              </div>    
                    <br>
              <div class="row">

                <div class="col">
                    <div class="sform-floating">
                        <textarea id='summernote' class="form-control" name="content" /></textarea>
                    </div>
                </div>  
              </div>    
                    <br>

            <!---time--------------------------->
              <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('time')?>" class="form-control mb-3 w-100" placeholder="Time*" name="time"> 
                    <option value =''>--Choose Time--</option>
                    <option value ='full-time'>Full-time</option>
                    <option value ='part-time'>Part-time</option>
                    <option value ='temporal'>Temporal</option>
                    <option value ='contract'>Contract</option>
                </select> 
                  <?php if(!empty($errors['time'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['time']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>  
            
              <div class="row">
                  <!---State--------------------------->
                <div class="col">
                <input value="<?=old_value('state')?>" class="form-control mb-3" type="text" placeholder="State*" name="state" />
                  <?php if(!empty($errors['state'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                  <?php endif; ?>
                </div> 
          <!---City--------------------------->                    
                <div class="col">
                <input value="<?=old_value('city')?>" class="form-control mb-3" type="text" placeholder="City*" name="city" />
                  <?php if(!empty($errors['city'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['city']?></div>
                  <?php endif; ?>
                </div> 
          <!---ZipCode--------------------------->                  
                <div class="col">
                <input value="<?=old_value('zipcode')?>" class="form-control mb-3" type="text" placeholder="Zipcode*" name="zipcode" />
                  <?php if(!empty($errors['zipcode'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['zipcode']?></div>
                  <?php endif; ?>
                </div>  
            </div>

            <!---Salary--------------------------->
            <div class="row">
                <div class="col">
                <input value="<?=old_value('salary')?>" class="form-control mb-3" type="text" placeholder="Salary*" name="salary" />
                  <?php if(!empty($errors['salary'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['salary']?></div>
                  <?php endif; ?>
                  </div> 
            <!---Company Name--------------------------->
                <div class="col"> 
                <input value="<?=old_value('company')?>" class="form-control mb-3" type="text" placeholder="Company name*" name="company" />
                  <?php if(!empty($errors['company'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['company']?></div>
                  <?php endif; ?>
                  </div>
              </div>
            <!---positions--------------------------->
            <div class="row">
                <div class="col">
                  <input value="<?=old_value('positions')?>" class="form-control mb-3" type="text" placeholder="Positions*" name="positions" />
                  <?php if(!empty($errors['positions'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['positions']?></div>
                  <?php endif; ?>
                </div>  
              </div>
              
            <!---status--------------------------->
            <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('status')?>" class="form-control mb-3 w-100" placeholder="Status*" name="status"> 
                    <option value ='1'>--Define status--</option>
                    <option value ='1'>Active</option>
                    <option value ='0'>Innactive</option>
                </select> 
                  <?php if(!empty($errors['status'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['status']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div> 
              <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Create</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/jobs">Go back</a>

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

  <div class="">
    <form method="post">
            <fieldset class="p-4">
              <?php if(!empty($row)):?>
            <div class="row">
                <div class="col">
                  <input value="<?=old_value('job_name', $row['job_name'])?>" type="text" class="form-control mb-3" placeholder="Job name*" name="job_name" >
                  <?php if(!empty($errors['job_name'])):?>
                      <div class="text-danger mb-3"><?='* '.$errors['job_name']?></div>
                  <?php endif; ?>
                </div>
            </div>

             <!---industry--------------------------->
             <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('industry')?>" class="form-control mb-3 w-100" placeholder="Industry*" name="industry"> 
                  <?php
                  $query = "SELECT * FROM industries order by IndustryId desc";
                  $industries = query($query);
                  ?>
                    <option value="">--Choose Industry--</option>
                  <?php if(!empty($industries)): ?>
                        <?php foreach($industries as $industry): ?>
                                <option <?=old_select('industry_id',$industry['IndustryId'],$row['industry_id'])?> value="<?=$industry['IndustryId']?>"> <?=$industry['Nameindustry'] ?></option>
                        <?php endforeach; ?> 
                  <?php endif; ?> 
                   
                </select> 
                  <?php if(!empty($errors['industry'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['industry']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>
              
              <!---description--------------------------->
              <div class="row">
                <div class="col">
                    <div class="sform-floating">
                        <textarea rows="4" place-holder='Add description'  class="form-control" type="content" placeholder="Description*" id="floatingInput" name="description"><?=old_value('description', $row['description'])?></textarea>
                    </div>
                  <?php if(!empty($errors['description'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['description']?></div>
                  <?php endif; ?>
                </div>  
              </div>    
                    <br>
              <!---content--------------------------->
              <div class="row">
                <div class="col">
                    <div class="sform-floating">
                        <textarea id='summernote' class="form-control" type="content" placeholder="Description*" id="floatingInput" name="content"><?=old_value('description', $row['content'])?></textarea>
                    </div>
                  <?php if(!empty($errors['description'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['description']?></div>
                  <?php endif; ?>
                </div>  
              </div>    
                    <br>

            <!---time--------------------------->
              <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('time')?>" class="form-control mb-3 w-100" placeholder="Time*" name="time">              
                    <option <?=old_select('time','',$row['time'])?> value  =''>--Choose Time--</option>
                    <option <?=old_select('time','full-time',$row['time'])?> value ='full-time'>Full-time</option>
                    <option <?=old_select('time','part-time',$row['time'])?> value ='part-time'>Part-time</option>
                    <option <?=old_select('time','temporal',$row['time'])?> value ='temporal'>Temporal</option>
                    <option <?=old_select('time','contract',$row['time'])?> value ='contract'>Contract</option>
                </select> 
                  <?php if(!empty($errors['time'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['time']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>  
            
              <div class="row">
                  <!---State--------------------------->
                <div class="col">
                <input value="<?=old_value('state', $row['state'])?>" type="text" class="form-control mb-3" placeholder="State*" name="state" >
                  <?php if(!empty($errors['state'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                  <?php endif; ?>
                </div> 
          <!---City--------------------------->                    
                <div class="col">
                <input value="<?=old_value('city', $row['city'])?>" type="text" class="form-control mb-3" placeholder="City*" name="city" >
                  <?php if(!empty($errors['city'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['city']?></div>
                  <?php endif; ?>
                </div> 
          <!---ZipCode--------------------------->                  
                <div class="col">
                <input value="<?=old_value('zipcode', $row['zipcode'])?>" type="text" class="form-control mb-3" placeholder="Zipcode*" name="zipcode" >
                  <?php if(!empty($errors['zipcode'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['zipcode']?></div>
                  <?php endif; ?>
                </div>  
            </div>

            <!---Salary--------------------------->
            <div class="row">
                <div class="col">
                <input value="<?=old_value('salary', $row['salary'])?>" type="text" class="form-control mb-3" placeholder="Salary*" name="salary" >
                  <?php if(!empty($errors['salary'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['salary']?></div>
                  <?php endif; ?>
                  </div> 
            <!---Company Name--------------------------->
                <div class="col"> 
                <input value="<?=old_value('company', $row['company_name'])?>" type="text" class="form-control mb-3" placeholder="Company name*" name="company" >
                  <?php if(!empty($errors['company'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['company']?></div>
                  <?php endif; ?>
                  </div>
              </div>
            <!---positions--------------------------->
            <div class="row">
                <div class="col">
                <input value="<?=old_value('positions', $row['positions'])?>" type="text" class="form-control mb-3" placeholder="Positions*" name="positions" >
                  <?php if(!empty($errors['positions'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['positions']?></div>
                  <?php endif; ?>
                </div>  
              </div>
              
            <!---status--------------------------->
            <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('status')?>" class="form-control mb-3 w-100" placeholder="Status*" name="status"> 
                    <option <?=old_select('status','1',$row['status'])?> value ='1'>--Define status--</option>
                    <option <?=old_select('status','1',$row['status'])?> value ='1'>Active</option>
                    <option <?=old_select('status','2',$row['status'])?> value ='0'>Innactive</option>
                </select> 
                  <?php if(!empty($errors['status'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['status']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div> 



              <button type="submit" class="btn btn-warning font-weight-bold mt-3 border" data-toggle="modal" data-target="#CreateAccount">Save</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3" href="<?=ROUTE?>/admin/jobs">Go back</a>

            </fieldset>
            <?php else: ?> 
            <div class='alert alert-danger text center'>User not found</div>
            <?php endif; ?> 
          </form>
       </div>
      </div>
    </div>
  </div>
<?php elseif($action == 'duplicate'):?>
  <div class="container">
    <div class="row">
       <div class="col-12">

  <div class="">
    <form method="post">
            <fieldset class="p-4">
              <?php if(!empty($row)):?>
            <div class="row">
                <div class="col">
                  <input value="<?=old_value('job_name', $row['job_name'])?>" type="text" class="form-control mb-3" placeholder="Job name*" name="job_name" >
                  <?php if(!empty($errors['job_name'])):?>
                      <div class="text-danger mb-3"><?='* '.$errors['job_name']?></div>
                  <?php endif; ?>
                </div>
            </div>

             <!---industry--------------------------->
             <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('industry')?>" class="form-control mb-3 w-100" placeholder="Industry*" name="industry"> 
                  <?php
                  $query = "SELECT * FROM industries order by IndustryId desc";
                  $industries = query($query);
                  ?>
                    <option value="">--Choose Industry--</option>
                  <?php if(!empty($industries)): ?>
                        <?php foreach($industries as $industry): ?>
                                <option <?=old_select('industry_id',$industry['IndustryId'],$row['industry_id'])?> value="<?=$industry['IndustryId']?>"> <?=$industry['Nameindustry'] ?></option>
                        <?php endforeach; ?> 
                  <?php endif; ?> 
                   
                </select> 
                  <?php if(!empty($errors['industry'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['industry']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>
              
              <!---description--------------------------->
              <div class="row">
                <div class="col">
                    <div class="sform-floating">
                        <textarea rows="4" place-holder='Add description'  class="form-control" type="content" placeholder="Description*" id="floatingInput" name="description"><?=old_value('description', $row['description'])?></textarea>
                    </div>
                  <?php if(!empty($errors['description'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['description']?></div>
                  <?php endif; ?>
                </div>  
              </div>    
                    <br>
              <!---content--------------------------->
              <div class="row">
                <div class="col">
                    <div class="sform-floating">
                        <textarea id='summernote' class="form-control" type="content" placeholder="Description*" id="floatingInput" name="content"><?=old_value('description', $row['content'])?></textarea>
                    </div>
                  <?php if(!empty($errors['description'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['description']?></div>
                  <?php endif; ?>
                </div>  
              </div>    
                    <br>

            <!---time--------------------------->
              <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('time')?>" class="form-control mb-3 w-100" placeholder="Time*" name="time">              
                    <option <?=old_select('time','',$row['time'])?> value  =''>--Choose Time--</option>
                    <option <?=old_select('time','full-time',$row['time'])?> value ='full-time'>Full-time</option>
                    <option <?=old_select('time','part-time',$row['time'])?> value ='part-time'>Part-time</option>
                    <option <?=old_select('time','temporal',$row['time'])?> value ='temporal'>Temporal</option>
                    <option <?=old_select('time','contract',$row['time'])?> value ='contract'>Contract</option>
                </select> 
                  <?php if(!empty($errors['time'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['time']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>  
            
              <div class="row">
                  <!---State--------------------------->
                <div class="col">
                <input value="<?=old_value('state', $row['state'])?>" type="text" class="form-control mb-3" placeholder="State*" name="state" >
                  <?php if(!empty($errors['state'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                  <?php endif; ?>
                </div> 
          <!---City--------------------------->                    
                <div class="col">
                <input value="<?=old_value('city', $row['city'])?>" type="text" class="form-control mb-3" placeholder="City*" name="city" >
                  <?php if(!empty($errors['city'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['city']?></div>
                  <?php endif; ?>
                </div> 
          <!---ZipCode--------------------------->                  
                <div class="col">
                <input value="<?=old_value('zipcode', $row['zipcode'])?>" type="text" class="form-control mb-3" placeholder="Zipcode*" name="zipcode" >
                  <?php if(!empty($errors['zipcode'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['zipcode']?></div>
                  <?php endif; ?>
                </div>  
            </div>

            <!---Salary--------------------------->
            <div class="row">
                <div class="col">
                <input value="<?=old_value('salary', $row['salary'])?>" type="text" class="form-control mb-3" placeholder="Salary*" name="salary" >
                  <?php if(!empty($errors['salary'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['salary']?></div>
                  <?php endif; ?>
                  </div> 
            <!---Company Name--------------------------->
                <div class="col"> 
                <input value="<?=old_value('company', $row['company_name'])?>" type="text" class="form-control mb-3" placeholder="Company name*" name="company" >
                  <?php if(!empty($errors['company'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['company']?></div>
                  <?php endif; ?>
                  </div>
              </div>
            <!---positions--------------------------->
            <div class="row">
                <div class="col">
                <input value="<?=old_value('positions', $row['positions'])?>" type="text" class="form-control mb-3" placeholder="Positions*" name="positions" >
                  <?php if(!empty($errors['positions'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['positions']?></div>
                  <?php endif; ?>
                </div>  
              </div>
              
            <!---status--------------------------->
            <div class="row">
              <div class="col md-12"> 
                  <select value="<?=old_value('status')?>" class="form-control mb-3 w-100" placeholder="Status*" name="status"> 
                    <option <?=old_select('status','1',$row['status'])?> value ='1'>--Define status--</option>
                    <option <?=old_select('status','1',$row['status'])?> value ='1'>Active</option>
                    <option <?=old_select('status','2',$row['status'])?> value ='0'>Innactive</option>
                </select> 
                  <?php if(!empty($errors['status'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['status']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div> 



              <button type="submit" class="btn btn-warning font-weight-bold mt-3 border" data-toggle="modal" data-target="#CreateAccount">Save</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3" href="<?=ROUTE?>/admin/jobs">Go back</a>

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
    <div class="row">
      <div class="col-12">
         <h3>Delete Job</h3>
<div class="">
    <form method="post">
          <fieldset class="p-4">
            <?php if(!empty($row)):?>
              <div class="row">
                <div class="col">
                  <input value="<?=old_value('job_name', $row['job_name'])?>" type="text" class="form-control mb-3" placeholder="Job name*" name="job_name" >
                    <?php if(!empty($errors['job_name'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['job_name']?></div>
                    <?php endif; ?>
                  </div>
              </div>

              <div class="row">
                <div class="col">
                  <input value="$ <?=old_value('salary', $row['salary'])?>" type="text" class="form-control mb-3" disabled placeholder="Salary*" name="salary" >
                    <?php if(!empty($errors['salary'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['salary']?></div>
                    <?php endif; ?>
                  </div>
                <div class="col">
                  <input value="<?=old_value('time', $row['time'])?>" type="text" class="form-control mb-3" placeholder="Time*" disabled name="time" >
                    <?php if(!empty($errors['time'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['time']?></div>
                    <?php endif; ?>
                  </div>
              </div>

              <div class="row">
                <div class="col">
                  <input value="<?=old_value('state', $row['state'])?>" type="text" class="form-control mb-3" placeholder="State*" disabled name="state" >
                    <?php if(!empty($errors['state'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['state']?></div>
                    <?php endif; ?>
                  </div>
                  <div class="col">
                  <input value="<?=old_value('city', $row['city'])?>" type="text" class="form-control mb-3" placeholder="City*" disabled name="city" >
                    <?php if(!empty($errors['city'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['city']?></div>
                    <?php endif; ?>
                  </div>
                  <div class="col">
                  <input value="<?=old_value('zipcode', $row['zipcode'])?>" type="text" class="form-control mb-3" placeholder="Zipcode*" disabled name="zipcode" >
                    <?php if(!empty($errors['zipcode'])):?>
                        <div class="text-danger mb-3"><?='* '.$errors['zipcode']?></div>
                    <?php endif; ?>
                  </div>
              </div>

              
              <?php endif; ?>  
          </fieldset>
          <button type="submit" class="btn btn-danger font-weight-bold mt-3" data-toggle="modal" >Delete</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/jobs">Go back</a>
    </form>
 </div>   
      </div>   
    </div>   
  </div>   
<?php else:?>


<?php

$limit = 5;
$offset = ($PAGE['page_number']-1) * $limit;
//$query = "SELECT * FROM jobs order by id desc limit $limit offset $offset";
$query = "SELECT j.id,	j.status, j.job_name, j.time, j.state, j.zipcode, j.city, j.zipCode, j.salary, j.company_name, j.positions, i.Nameindustry, u.email FROM `jobs` as j 
INNER JOIN industries as i on j.industry_id = i.IndustryId
INNER JOIN users as u on j.user_id = u.id limit $limit offset $offset ";
$rows = query($query);


?>
                <!-- Recently Favorited -->
<div class="container">
  <div class="row">
     <div class="col-12">
					<h3 class="widget-header">Sunshine Jobs</h3>
          <div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead>
							<tr>
                      
								<th scope="col">#</th>
								<th scope="col">Job</th>
								<th scope="col">Status</th>
								<th scope="col">Time</th>
								<th scope="col">State</th>
								<th scope="col">City</th>
								<th scope="col">ZipCode</th>
								<th scope="col">Salary</th>
								<th scope="col">Company</th>
								<th scope="col">Positions</th>
								<th scope="col">Industry</th>
								<th scope="col">Autor</th>
								<th scope="col">Duplicate</th>
								<th scope="col">Edit</th>
								<th scope="col">Delete</th>
						   
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; if(!empty($rows)):?>
                            <?php foreach($rows as $row):?>
							<tr class="">
								<td scope="row"><?=$i++?></td>
								<td scope="row"><strong><?=$row['job_name']?></strong></td>
								<td scope="row">
                  <?php if($row['status'] == '1'){
                    echo'<p class="bg-success text-light border rounded p-2 text-center">Active<p>';
                    
                  }elseif($row['status'] == '0'){
                    echo'<p class="bg-danger text-light border rounded p-2 text-center ">Innactive<p>';                      
                  }
                ?>
                </td>
								<td scope="row"><?=$row['time']?></td>
								<td scope="row"><?=$row['state']?></td>
								<td scope="row"><?=$row['city']?></td>
								<td scope="row"><?=$row['zipcode']?></td>
								<td scope="row"><?=$row['salary']?></td>
								<td scope="row"><?=$row['company_name']?></td>
								<td scope="row"><?=$row['positions']?></td>
                <td scope="row"><?=$row['Nameindustry'] ?></td>
                <td scope="row"><?=$row['email'] ?></td>
                </td>
							
								
                <td class='text-center'> 
                  <a href="<?=ROUTE.'/admin/jobs/duplicate/'?><?=$row['id']?>" data-toggle="tooltip" data-placement="top" title="Duplicate" class="duplicate">
                      <i class="fa fa-files-o bg-info text-light p-2 rounded rounded-circle"></i> 
                  </a>
                </td>
								<td class='text-center'> 
                  <a href="<?=ROUTE.'/admin/jobs/edit/'?><?=$row['id']?>" data-toggle="tooltip" data-placement="top" title="Edit" class="edit">
                      <i class="fa fa-pencil bg-primary text-light p-2 rounded rounded-circle"></i> 
                  </a>
                </td>
								<td class='text-center'>
                  <a href="<?=ROUTE.'/admin/jobs/delete/'?><?=$row['id']?>" data-toggle="tooltip" data-placement="top" title="Delete" class="delete">
                      <i class="fa fa-trash bg-danger text-light p-2 rounded rounded-circle"></i>
                  </a>
                </td>
							</tr>
                            <?php endforeach;  ?>
                            <?php  endif; ?>
						</tbody>
					</table>
          </div>
        <a href="<?=ROUTE.'/admin/jobs/add'?>" class="mt-2">
            <button  type="submit" class="btn btn-warning btn-sm">
              Post new job
            </button>
        </a>

        <a type="submit" class="btn btn-light font-weight-bold border float-right" href="<?=ROUTE?>/admin">Go back</a>

        </div>
        </div>
        </div>
        </div>

				<!-- pagination -->
				<div class="pagination justify-content-center mt-4">
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
                </div>
                

                    <?php endif;?>

				<!-- pagination -->



<?php if($action == 'add'):?>
  <div class="container">
    <div class="row">
      <div class="col-12">
    <form method="post">
            <fieldset class="p-4">
              <div class="row">
          <!---Phone--------------------------->
                <div class="col">
                  <input value="<?=old_value('Nameindustry')?>" class="form-control mb-3" type="text" placeholder="Industry Name*" name="Nameindustry" />
                  <?php if(!empty($errors['Nameindustry'])):?>
                    <div class="text-danger mb-3"><?='* '.$errors['Nameindustry']?></div>
                  <?php endif; ?>
                </div>  
              </div>
            
              <div class="row">
          <!---Status--------------------------->
              <div class="col md-12"> 
                  <select value="<?=old_value('disabled')?>" class="form-control mb-3 w-100" placeholder="Status*" name="disabled"> 
                    <option value ='1'>Define status</option>
                    <option value ='1'>Active</option>
                    <option value ='0'>Innactive</option>
                </select> 
                  <?php if(!empty($errors['disabled'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['disabled']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>       
            


              <button type="submit" class="btn btn-warning font-weight-bold mt-3" data-toggle="modal" data-target="#CreateAccount">Create</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/industries">Go back</a>

            </fieldset>
          </form>
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

          <!---Industry Name---------------------------->

                <div class="col">
                <input value="<?=old_value('Nameindustry', $row['Nameindustry'])?>" type="text" class="form-control mb-3" placeholder="Industry name*" name="Nameindustry" >
                <?php if(!empty($errors['Nameindustry'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['Nameindustry']?></div>
                <?php endif; ?>
                </div>
                </div>


            <div class="row">
          <!---Status--------------------------->
              <div class="col md-12"> 
                  <select value="<?=old_value('disabled')?>" class="form-control mb-3 w-100" placeholder="Status*" name="disabled"> 
                    <option value ='1'>Define status</option>
                    <option value ='1'>Active</option>
                    <option value ='0'>Innactive</option>
                </select> 
                  <?php if(!empty($errors['disabled'])):?>
                  <div class="text-danger mb-3">
                      <?='* '.$errors['disabled']?>
                  </div>
                  <?php endif; ?> 
                  </div>  
              </div>  


              <button type="submit" class="btn btn-warning font-weight-bold mt-3 border" data-toggle="modal" data-target="#CreateAccount">Save</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3" href="<?=ROUTE?>/admin/industries">Go back</a>

            </fieldset>
            <?php else: ?> 
            <div class='alert alert-danger text center'>User not found</div>
            <?php endif; ?> 
          </form>
</div>
</div>
</div>
<?php elseif($action == 'delete'):?>
  <div class="container">
    <div class="row">
      <div class="col-12">
<h3>Delete Industry</h3>
<div class="">
    <form method="post">
          <fieldset class="p-4">
            <?php if(!empty($row)):?>
              <div class="row">
                 <div class="col">
                  <label for="">Industry Name</label>
                      <input value="<?=old_value('Nameindustry'), $row['Nameindustry']?>" class="form-control mb-3" disabled type="text" placeholder="Industry Name*" name="Nameindustry">
                  </div>  
              </div>
              <?php endif; ?>  
          </fieldset>
          <button type="submit" class="btn btn-danger font-weight-bold mt-3" data-toggle="modal">Delete</button>
              <a type="submit" class="btn btn-light font-weight-bold mt-3 border" href="<?=ROUTE?>/admin/industries">Go back</a>
    </form>
 </div>   
<?php else:?>


<?php
$limit = 4;
$offset = ($PAGE['page_number']-1) * $limit;
$query = "SELECT * FROM industries order by IndustryId desc limit $limit offset $offset";
$rows = query($query);

?>
                <!-- Recently Favorited -->
  <div class="container">
    <div class="row">
      <div class="col-12">
					<h3 class="widget-header">Sunshine Industries</h3>
          <div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead>
							<tr>
                <th scope="col">#</th>                      
								<th scope="col">Industry Name</th>
								<th scope="col">Keyword</th>
								<th scope="col">Disabled</th>
								<th scope="col">Action</th>
								<th scope="col">Action</th>
                      
						   
							</tr>
						</thead>
						<tbody>
                            <?php $i=1; if(!empty($rows)):?>
                            <?php foreach($rows as $row):?>

							<tr class="">
								<td scope="row"><?=$i++?></td>
								<td scope="row"><?=$row['Nameindustry']?></td>
								<td scope="row"><?=$row['slug']?></td>
								<td scope="row">
                  <?php
                   $status =  $row['disabled'];
                  if($status == 0){
                    echo 'Innactive';
                  }else{
                    echo'Active';
                  }
                  ?>
                </td>
							
								
								<td> 
                  <a href="<?=ROUTE.'/admin/industries/edit/'?><?=$row['IndustryId']?>" data-toggle="tooltip" data-placement="top" title="Edit" class="edit">
                      <i class="fa fa-pencil"></i>
                  </a>
                </td>
								<td>
                  <a href="<?=ROUTE.'/admin/industries/delete/'?><?=$row['IndustryId']?>" data-toggle="tooltip" data-placement="top" title="Delete" class="delete">
                      <i class="fa fa-trash"></i>
                  </a>
                </td>
							</tr>
                            <?php endforeach;  ?>
                            <?php  endif; ?>
						</tbody>
					</table>
          </div>
          </div>
          </div>
        <a href="<?=ROUTE.'/admin/industries/add'?>">
            <button  type="submit" class="btn btn-warning btn-sm">
              Add new Industry 
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


<?php
$limit = 3;
$offset = ($PAGE['page_number']-1) * $limit;
$query = "SELECT * FROM users WHERE role = 'employeer' order by id desc limit $limit offset $offset ";
$rows = query($query);

?>
                <!-- Recently Favorited -->
				<div class="container">
    <div class="row">
       <div class="col-12">
					<h3 class="widget-header">Sunshine Users</h3>
					<div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead>
							<tr>
                <th scope="col">Role</th>                      
								<th scope="col">Name</th>
								<th scope="col">L-Name</th>
								<th scope="col">Phone</th>
								<th scope="col">Email</th>
								<th scope="col">State</th>
								<th scope="col">City</th>
						   
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($rows)):?>
                            <?php foreach($rows as $row):?>
							<tr class="">
              <td>
                  <?php if($row['role'] == 'employeer'){
                    echo'<p class="bg-warning text-dark border rounded p-2 text-center">employeer<p>';                      
                  
                  }elseif($row['role'] == 'admin'){
                    
                    echo'<p class="bg-primary text-light border rounded p-2 text-center">admin<p>';
                  
                  }elseif($row['role'] == 'developer'){
                    
                    echo'<p class="bg-info text-light border rounded p-2 text-center">developer<p>';
                  
                  }
                  
                  ?>
                </td>
								<td scope="row"><?=$row['fname']?></td>
								<td><?=$row['lname']?></td>
								<td><?=$row['phone']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['state']?></td>
								<td><?=$row['city']?></td>
								
							</tr>
                            <?php endforeach;  ?>
                            <?php  endif; ?>
						</tbody>
						</div>
					</table>
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







<?php
$limit = 3;
$offset = ($PAGE['page_number']-1) * $limit;
$query = "SELECT * FROM aplications order by id desc limit $limit offset $offset";
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
								<th scope="col">Name</th>
								<th scope="col">Phone</th>
								<th scope="col">Email</th>               
								<th scope="col">Job Name</th>               
								<th scope="col">Date</th>
								<th scope="file_path">C.V</th>
         
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($rows)):?>
                            <?php foreach($rows as $row):?>
							<tr class="pt-3">

								<td class='p-2'><?=$row['name']?></td>
								<td><?=$row['phone']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['date']?></td>
								<td class="mt-0"> <a href= "<?=ROUTE.'seu-usa/public//app/pages/requests/'.$row['file_path']?>" class='btn btn-warning text-dark p-3'>Downloand</a></td>
							</tr>
                            <?php endforeach;  ?>
                            <?php  endif; ?>
						</tbody>
					</table>
					</div>
					<a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/admin">Go back</a>
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


				<!-- pagination -->


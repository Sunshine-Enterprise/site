


<?php
$limit = 10;
$offset = ($PAGE['page_number']-1) * $limit;
$query = "SELECT * FROM visits order by id asc limit $limit offset $offset";

$rows = query($query);

$i=1;

?>
                <!-- Recently Favorited -->

					<div class="container">
    				<div class="row">
       				<div class="col-12">
					<h3 class="widget-header">Sunshine Visits</h3>
					<div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead>
							<tr>
								<th scope="col">Visit</th>
                                <th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col">Phone</th>
								<th scope="col">Reason</th>
								<th scope="col">Date</th>            
								<th scope="col">Time</th>            
								
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($rows)):?>
								<?php foreach($rows as $row):?>
									<tr class="">
										
										<td><?=$i++?></td>
										<td><?=$row['name']?></td>
										<td><?=$row['email']?></td>
										<td><?=$row['phone']?></td>
										<td style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width:10px; "><?=$row['visit']?></td>
										<td><?=$row['date']?></td>
										<td><?=$row['time']?></td>
										
									</tr>
									<?php endforeach;  ?>
									<?php  endif; ?>
								</tbody>
									</table>
								</div>
							<a type="submit" class="btn btn-danger text-light" href="<?=ROUTE?>/admin/pdf">Generate PDF</a>
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
							<li class="page-item"><a class="page-link" href="<?=$PAGE['first_link'] ?>">2</a></li>
							<li class="page-item"><a class="page-link" href="<?=$PAGE['first_link'] ?>">3</a></li>
							
							<li class="page-item">
								<a class="page-link" href="<?=$PAGE['next_link'] ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>

<style>
    
</style>
				<!-- pagination -->


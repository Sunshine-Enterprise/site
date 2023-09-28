


<?php
$limit = 3;
$offset = ($PAGE['page_number']-1) * $limit;
$query = "SELECT * FROM requests order by requests.id desc limit $limit offset $offset";
$rows = query($query);
include('download.php');

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
								<th scope="col">Soliciting</th>
								<th scope="col">Email</th>
								<th scope="col">Date</th>
								<th scope="col">File</th>            
         
							</tr>
						</thead>
						<tbody>
                            <?php if(!empty($rows)):?>
                            <?php foreach($rows as $row):?>
							<tr class="">

								<td><?=$row['name']?></td>
								<td><?=$row['phone']?></td>
								<td><?=$row['soliciting']?></td>
								<td><?=$row['email']?></td>
								<td><?=$row['date']?></td>
								<td> <a href= "download?file_id=<?=$row['id']?>">Download</a></td>

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


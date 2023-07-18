<?php
$limit = 10;
$offset = ($PAGE['page_number']-1) * $limit;

$url = $_GET['url'];
$url = explode("/", $url);
//print_r($url);

$industry = $url[3];
$query = "SELECT * FROM jobs where industry_id = $industry";
//$rows = query_row($query, ['id'=>$id]);
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
								<th scope="col"></th>
								<th scope="col">Job</th>
                                <th scope="col">Time</th>
								<th scope="col">Salary</th>
								<th scope="col">State</th>
								<th scope="col">City</th>
								<th scope="col">Date Open</th>            
							</tr>
						</thead>
						<tbody>
							<?php if(!empty($rows)):?>
								<?php foreach($rows as $row):?>
									<tr class="">
										<th scope="row">
											<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
											</div>
										</th>

										<td><?=$row['job_name']?></td>
										<td><?=$row['time']?></td>
										<td><?='$'.$row['salary']?></td>
										<td><?=$row['state']?></td>
										<td><?=$row['city']?></td>
										<td><?=$row['date']?></td>
										
									</tr>
									<?php endforeach;  ?>
									<?php  endif; ?>
								</tbody>
									</table>
								</div>
							<a type="submit" class="btn btn-warning text-light" href="<?=ROUTE?>/admin/pdf">Apply</a>
					<a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/user">Go back</a>
        </div>
        </div>
        </div>
        </div>




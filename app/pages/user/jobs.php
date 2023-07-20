<?php
$limit = 10;
$offset = ($PAGE['page_number']-1) * $limit;

$url = $_GET['url'];
$url = explode("/", $url);
//print_r($url);

$industry = $url[2];
$query = "SELECT * FROM jobs WHERE industry_id = '$industry'";
//$query = "SELECT * FROM jobs WHERE industries.IndustryId = candidates.industry_id";
//SELECT * FROM jobs INNER JOIN candidates on candidates.job_id = jobs.id INNER JOIN industries on industries.IndustryId = candidates.industry_id
//;
//$query = "";
//$rows = query_row($query, ['id'=>$id]);
$rows = query($query);
$i=1;


if(isset($_POST) & !empty($_POST)){

	//Getting DATA
	$user = user('id');        

	$data['user'] = user('id');
	$data['date']= date("Y-m-d");
	$data['industry'] = $industry;

	$app = ($_POST['application']);
	//echo $_POST;
	$num = count($_POST['application']);
	//echo($num);
	
	
	if($num > 1){
		for ($i=0; $i< $num; $i++) {
			echo $aplications = $app[$i];
			$query = "INSERT INTO `candidates` (`user_id`, `date`, `industry_id`, `job_id`, `file_path`,  `resume`) 
                  VALUES (:user, :date, :industry,  $aplications, '',  '')";
				  query($query, $data);

				  $_SESSION['candidate'] = 'Thanks';
				 // $point + $num;
		
		//unset($_SESSION['candidate']);
		}
	}else{

		print_r($_POST['application'][0]);

		$app = ($_POST['application'][0]);
		$data['app'] = $app;
		$query = "INSERT INTO `candidates` (`user_id`, `date`, `industry_id`, `job_id`, `file_path`,  `resume`) 
                  VALUES (:user, :date, :industry,  :app, '',  '')";
				  query($query, $data);

				  $_SESSION['candidate'] = 'Thanks';
				
	}

	//$query = "INSERT INTO candidates ";
}
?>

		<div class="container">
		<div class="row">
		<div class="col-12">
			<?php 
			if(isset($_SESSION['candidate'])){

			print'	<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
					<strong> '.$_SESSION['candidate'].': </strong> for applying for submit your applicattion.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
				unset($_SESSION['candidate']);
			}
		
			//	unset($_SESSION['candidate']);
				
			?>
			<?php 
				$query ="SELECT job_id FROM candidates INNER JOIN jobs on candidates.job_id = jobs.id WHERE candidates.industry_id = '$industry'";
				$match = query($query);
				//print_r($match);
			?>
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
			    <?php
					$proff = "SELECT job_id, user_id FROM candidates WHERE job_id != 0 && user_id = $user";
					$result = query($proff);
					echo "<pre>";
					print_r($result); // Important RESULT
					echo "</pre>";
					if($result){
						$total = count($result);
						for ($i=0; $i < $total; $i++) { 
							print_r($result[$i]['job_id']); 
							$_SESSION['candidate_app'] = 'disabled = true'; 
							$count=0;
							echo $total;
						}
					}else{
						$total = null;
					}

					?>
			<form method="POST"> 
				<tbody>
					
					<?php if(!empty($rows)):?>
						<?php $point = 0;  ?>
						<?php foreach($rows as $row): ?>
							<tr class="">
								<?php if(  $row['id'] /*\==  != $result[$point]['job_id'] */ ){ ?>
									<th scope="row">		
										<div class="form-check">
											<input  
											<?php /* for ($i=0; $i < $total; $i++) : */?>
												<?php /*  if(  $row['id']  != $result[$total]['job_id']  ): */?>
												<?php /*  endif; */?>
											<?php /* endfor; */ ?>
										name="application[]" class="form-check-input" type="checkbox" value="<?=$row['id']?>"/>
										<?php // if(isset($result[$point]['job_id'])){ 
											echo $point;

													if($result[$point]['job_id'] == $row['id']){

												//	echo $result[$point]['job_id'];
												}
											//	} 
										  ?>
									</div>
								</th>

						<?php  }else{ ?>
							<th scope="row">
									<div class="form-check">
										<input name="application[]" disabled class="form-check-input" type="checkbox" value="<?=$row['id']?>"/>
									</div>
							</th>
						<?php } ?>
							<td><?=$row['job_name']?></td>
							<td><?=$row['time']?></td>
							<td><?='$'.$row['salary']?></td>
							<td><?=$row['state']?></td>
							<td><?=$row['city']?></td>
							<td><?=$row['date']?></td>
							
						</tr>
						<?php $point ++;?>
						<?php endforeach;  ?>
						<?php  endif; ?>
					</tbody>
						</table>
					</div>
			<button  type="submit" class="btn btn-warning btn-sm">
				Apply
			</button>
			</form>
				<a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/user">Go back</a>
			</div>
			</div>
			</div>
			</div>


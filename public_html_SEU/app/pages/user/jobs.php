<?php
$limit = 10;
$offset = ($PAGE['page_number']-1) * $limit;

$url = $_GET['url'];
$url = explode("/", $url);
//print_r($url);

$industry = $url[2];
//echo $industry;
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

		//print_r($_POST['application'][0]);

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
					$proff = "SELECT job_id FROM candidates WHERE job_id != 0 && industry_id = $industry && user_id = $user";
					$result = query($proff);
					echo "<pre>";
					//print_r($result); // Important RESULT
					echo "</pre>";

					?>
			<form method="POST"> 
				<tbody>
					
					<?php if(!empty($rows)):?>
						<?php // print_r($result[0]['job_id']);  ?>
						<?php // print_r($result[1]['job_id']);  ?>
						<?php $point = 0;  ?>
							<?php 
									//echo $row['id'];
									$query = "SELECT job_id FROM candidates WHERE $industry != null && user_id = $user";
									$matchs =  query($query);
									//print_r($matchs);
									//$number = count($matchs[0]);
									//echo "<pre>";
									//echo($number);
									//echo "</pre>"; 
									
							?>
						<?php foreach($rows as $row): ?>
							<?php // echo $result[$point]['job_id']; ?>
							<tr class="">
								<th scope="row">		
									<div class="form-check">
										<input id='check[<?=$point?>]' <?php if(isset($_SESSION['applied'])){} ?>   
										 name='application[]'  class="form-check-input" type="checkbox" value="<?=$row['id']?>"
										<?php 
										if($result){
											$contar = count($result);

											
											if($result > 0){
												for ($i=0; $i < $contar; $i++) { 
													if($result[$i]['job_id'] == $row['id']){
														echo 'disabled'?> /> 

														<?php
														//$_SESSION['applied'] = print('disabled ');
														echo '<div class="alert alert-success text-center py-0 px-1 m-0" role="alert"><p class="h7 m-0 text-success">Applied <i class="fa fa-check-circle" aria-hidden="true"></i></p> </div>';
														//echo $point.'/';
														?> 
														<?php
													}
												}
											}else{
												if($result[0]['job_id'] == $row['id']){
													echo '<div class="alert alert-warning text-center" role="alert">Applied</div>'; 
											}	
											}
											//echo ' --- '.$total.' --- ';
										}
										?>
										<?php // echo $row['id']; ?>
									</div>
								</th>
							<td><strong><a href="<?=ROUTE.'/user/view/'?><?=$row['id']?>"><?=$row['job_name']?></a></strong></td>
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


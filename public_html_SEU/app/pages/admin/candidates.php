<?php if($action == 'info'):?>
    
    <?php
     $count = 1;
     $id = $url[3] ?? null;
     $query = "Select users.fname, users.phone, users.state as s, users.city as c, users.email, users.lname, jobs.id, jobs.job_name,
     jobs.salary, jobs.time, industries.Nameindustry, jobs.state, jobs.city,
     jobs.date, jobs.status 
     FROM candidates 
     INNER JOIN jobs on candidates.job_id = jobs.id 
     INNER JOIN users on candidates.user_id = users.id 
     INNER JOIN industries on candidates.industry_id = industries.IndustryId 
     where candidates.job_id != '' && candidates.user_id = '$id'";
     $row = query($query);
     echo '<pre>';
    // print_r($row);
     echo '</pre>';
    
    ?>
    
    <section class="dashboard section">
	<!-- Container Start -->
	<div class="container">
		<!-- Row Start -->
		<div class="row">
			<div class="col-lg-4">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user-dashboard-profile">
						<!-- User Image -->
						<!-- User Name -->
						<h5 class="text-center"><?=$row[0]['fname'].' '?><?=$row[0]['lname']?></h5>
						<p><?=$row[0]['email'].' '?></p>
						<p><?=$row[0]['phone'].' '?></p>
						<p><?=$row[0]['s'].' / '?><?=$row[0]['c']?></p>
					</div>
					<!-- delete-account modal -->
					<!-- delete account popup modal start-->
				</div>
			</div>


			<div class="col-lg-8">
				<!-- Recently Favorited -->
				<div class="widget dashboard-container my-adslist">
					<h3 class="widget-header">Aplications</h3>
					<table class="table table-responsive product-dashboard-table">
						<thead>
							<tr>
								<th>Job Info</th>
								<th>Salary</th>
								<th class="text-center">Category</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
                        <?php if(isset($row)): ?>
                                <?php foreach($row as $rows):?>
							<tr>
								<td class="product-details">
									<h3 class="title"><?=$rows['job_name']?></h3>
									<span class="add-id"><strong>Time:</strong><?=$rows['time']?></span>
									<span><strong>Posted on: </strong><time><?=$rows['date']?></time> </span>
									<span class="status active"><strong>Status</strong><?=$rows['status']?></span>
									<span class="location"><strong>Location</strong><?=$rows['state'].' / '.$rows['city']?></span>
								</td>
								<td class="product-category"><span class="categories"><?='$'.$rows['salary']?></span></td>
								<td class="product-category"><span class="categories"><?=$rows['Nameindustry']?></span></td>
								<td class="action" data-title="Action">
									<div class="">
										<ul class="list-inline justify-content-center">
											<li class="list-inline-item">
												<a data-toggle="tooltip" data-placement="top" title="View" class="view" 
                                                href="<?=ROUTE.'/admin/candidates/watch/'?><?=$rows['id']?>">
												<i class="fa fa-eye"></i>
												</a>
											</li>
										</ul>
									</div>
								</td>
							</tr>
                            <?php endforeach;?>
                            <?php endif; ?>
							<tr>								
						</tbody>
					</table>
                    <a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/admin/candidates">Go Back</a>

				</div>
			</div>
		</div>
		<!-- Row End -->
	</div>
	<!-- Container End -->
</section>
<?php elseif($action == 'watch'):?>

<div class="container">
<div class="row">
<div class="col-12">
        
        <?php

        $id = $url[3] ?? null;

        //echo $id;

        $query = "select jobs.*,industries.Nameindustry from jobs join industries on jobs.industry_id = industries.IndustryId where jobs.id = :id limit 1";
        $row = query_row($query, ['id'=>$id]);
        ?>

        <article class="single-post">
        <div class="row">
            <div class="col">
            <h2><?=$row['job_name']?></h2>
            </div>
            <div class="col">
                <h2 class="text-right">$ <?=$row['salary']?> <i class="fa fa-money" aria-hidden="true"></i></h2>
            </div>
        </div>

        <div class="row">
                <div class="col">
                    <ul class="list-inline">
                        <li class="list-inline-item"><?=$row['date']?></li>
                    </ul>
                </div>
                <div class="col">
                    <ul class="list-inline">
                        <li class="text-right"><?=$row['time']?></li>
                    </ul>
                </div>
        </div>
        <?=$row['state'].' - '?><?=$row['city']?></p>
        <h4>Job Description:</h4></br>
        <?=$row['content']?>

        </article>
        <?php // $query2 = "SELECT user_id FROM candidates WHERE job_id = '$id'"; ?>
        <?php // $back = query($query2);?>
</div>   
</div>   
</div>    

<?php else:?>

<?php
$count = 1;
$query = "Select * from candidates INNER JOIN users on candidates.user_id = users.id where candidates.job_id != '' GROUP BY user_id HAVING COUNT(*) > 1";
// Select * from candidates where candidates.job_id != '' GROUP BY user_id HAVING COUNT(*) > 1;
$row = query($query);

?>

<div class="container">
  <div class="row">
     <div class="col-12">
					<h3 class="widget-header">Candidates Sunshine</h3>
          <div class="table-responsive">
					<table class="table table-hover table-fixed">
						<thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">State</th>
                            <th scope="col">City</th>
                            <th scope="col">ZipCode</th>
                            <th scope="col">Resume</th>
                            <th scope="col">Jobs Applied</th>
                        </tr>
						</thead>
						<tbody>
                            <?php if(isset($row)): ?>
                                <?php foreach($row as $rows):?>
                                    <?php // if($rows['user_id'] == $rows['user_id']): ?>
                             <tr class="">
                                <td scope="row"><?=$count?></td>
                                <td scope="row"><strong><a href="<?=ROUTE.'/admin/candidates/info/'?><?=$rows['id']?>"> <?=$rows['fname'].' '?><?=$rows['lname']?></a></strong></td>
                                <td scope="row"><?=$rows['phone']?></td>
                                <td scope="row"><?=$rows['email']?></td>
                                <td scope="row"><?=$rows['state']?></td>
                                <td scope="row"><?=$rows['city']?></td>
                                <td scope="row"><?=$rows['zipcode']?></td>
                                <td scope="row">Download</td>
                                <td scope="row"><?=$rows['id']?></td>
                                
                            </tr>
                            <?php // endif; ?>
                                <?php $count++; ?>        
                                <?php endforeach;?>
                            <?php endif; ?>
                            </tbody>
					</table>
          </div>
          <br>

<a type="submit" class="btn btn-light font-weight-bold border" href="<?=ROUTE?>/admin">Back</a>
</div>
</div>
</div>


<?php endif;?>


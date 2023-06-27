<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    
    $sql = 'SELECT * FROM visits'; 
    $rows = query($sql);
    $i=1;
    ?>
    <h3 class="widget-header">Sunshine Visits</h3>
					<table class="table table-flex">
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
								<td><?=$row['visit']?></td>
								<td><?=$row['date']?></td>
								<td><?=$row['time']?></td>
								
							</tr>
                            <?php endforeach;  ?>
                            <?php  endif; ?>
						</tbody>
					</table>
</head>
<body>
    
</body>
</html>
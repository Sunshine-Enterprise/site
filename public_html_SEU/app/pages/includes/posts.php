

<div class="product-grid-list">
	<div class="row mt-30">
		<div class="col-lg-12 col-md-12">
				<!-- product card -->
			<div class="product-item bg-light">
				<div class="card">
					<div class="thumb-content">
						<div class="my-4">
							<p><div class="price font-weight-bold rounded">$<?= $row['salary']?> /hr</div> </p>
						</div>
					</div>
						<div class="card-body">
							<div class="row">
								<div class='col'>
									<h4 class="card-title text-start"><a href="<?=ROUTE?>/job/<?=$row['slug']?>"><?=$row['job_name']?></a></h4>
								</div>
								<div class='col float-end'>
								<h4 class="text-right"><?= $row['state']?><?=' / '. $row['city']?></h4>
								</div>
							</div>
							<a href="<?=ROUTE?>/job/<?=$row['slug']?>">
								<ul class="list-inline product-meta">
									<li class="list-inline-item">
										<i class="fa fa-folder-open-o"></i> <?= $row['Nameindustry']?>
									</li>
									<li class="list-inline-item">
										<i class="fa fa-calendar"></i> <?= $row['date']?>
									</li>
								</ul>
							</a>	
							<p class="card-text"><?= $row['description']?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
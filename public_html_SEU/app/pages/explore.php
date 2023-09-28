<?php

include '../app/pages/includes/header.php';

?>


<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Positions From Sunshine Enterprise USA</h2>
					<p><?php date('Y-m-d')?> </p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div class="category-sidebar">
					<div class="widget category-list">
					<h4 class="widget-header">All Categories</h4>
				<?php
				//$query = "SELECT * FROM jobs";
				$query = "select * from industries order by IndustryId desc";
				$rows = query($query);

				if($rows){
					foreach($rows as $row){
						?>
						<ul class="category-list">
							<li><a href="<?=ROUTE?>/industry/<?=$row['slug']?>"<?=$row['Nameindustry']?>><?=$row['Nameindustry']?><span><i class="fa fa-briefcase" aria-hidden="true"></i></span></a></li>
						</ul>
						<?php
					}
				}else{
				?>
				<div class="alert alert-danger" role="alert">We can't find more industries</div>
				<?php
				}
			?>
</div>

				</div>
			</div>
			<div class="col-lg-9 col-md-8">


			<?php

				$limit = 3;
				$offset = ($PAGE['page_number']-1) * $limit;
				$query = "select jobs.*,industries.Nameindustry from jobs join industries on jobs.industry_id = industries.IndustryId && jobs.status = 1 order by id desc limit $limit offset $offset";
			
				$rows = query($query);
				if($rows){
					foreach($rows as $row){
						include '../app/pages/includes/posts.php';
					}
				}else{
				?>
				<div class="alert alert-danger" role="alert">We can't find more jobs</div>
				<?php
				}
			?>
		
			<!--------------------------Start the pagination------------------------------------>
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
							<li class="page-item"><a class="page-link" href="<?=$PAGE['first_link'] ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
							
							<li class="page-item">
								<a class="page-link" href="<?=$PAGE['next_link'] ?>" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>




<?php

include '../app/pages/includes/footer.php';

?>
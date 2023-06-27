<?php
ob_start();
include '../app/pages/includes/header_general.php';ob_end_flush();
?>


<section class="section-sm pb-0">
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
							<li><a href="<?=ROUTE?>/industry/<?=$row['slug']?>"<?=$row['Nameindustry']?>><?=$row['Nameindustry']?><span><i class="fa fa-briefcase" aria-hidden="true"></i>
 </span></a></li>
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

<!--------------------------------------------------------------------->
			<div class="col-lg-9 col-md-8">
			<?php
                $slug = $url[1] ?? null;   
                if($slug)
                {
                   $query = "select jobs.*,industries.Nameindustry from jobs join industries on jobs.industry_id = industries.IndustryId where jobs.slug = :slug limit 1";
			       $row = query_row($query, ['slug'=>$slug]);
                }     

				if(!empty($row)){
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
                    <h4>Job Description:</h4>
					<p><?=$row['content']?></p>

                    <div class="row">

                        <div class="col-6">
                        <?php
                                showSharer("https://seu-usa.com/job/pipe-layer", "Apply here!");
                        ?>
                        </div>
                        <div class="col-6">
                                <ul class="list-inline">
                                    <li class="text-right"><h4>Positions Avaible: <?=$row['positions']?></h4> </li>
                                </ul>
                        </div>
                    </div>

				</article>
                <?php   
				}else{
				?>
				<div class="alert alert-danger" role="alert">We can't find more jobs</div>
				<?php
				}
			?>
			</div>
            
            <div class="col-lg-3 col-md-4"></div>
            <!------------------------------------------------------------------------------------>
            <?php
          
            if(!empty($_POST)){
                $errors = [];
                if(empty($_POST['name'])){
                    $errors['name'] = 'Please provide your Full Name';
                }
                if(empty($_POST['email'])){
                    $errors['email'] = 'Please provide your Email';
                }
                if(empty($_POST['phone'])){
                    $errors['phone'] = 'Please provide your Phone';
                }
                if(empty($errors)){
                    $data = [];
                    $data['id_job']= $row['id'];
                    $data['name']= $_POST['name'];
                    $data['email']= $_POST['email'];
                    $data['phone']= $_POST['phone'];
                    $data['date'] = date('Y-m-d');

                    //here save the information about the requests on the folder
                    //define which folder for requests
                    define ('SITE_ROOT', realpath(dirname(__FILE__)));
                    define("SMARTY_DIR", SITE_ROOT."/aplications/");
                    
                    $targetFile = SMARTY_DIR.basename($_FILES['pdfFile']['name']);
                    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

                    
                    //PDF size
                    if($fileType != 'pdf' || $_FILES["pdfFile"]["size"] > 900000){
                        echo 'is too much size 2MB';
                    }
                    else{
                        
                    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $targetFile)) {

                        $filename = $_FILES["pdfFile"]["name"];
                        $folder = $targetFile;

                        
                        $data['filename'] = $filename;
                        $data['folder'] = $folder;
                            
                        $_SESSION['aplication'] 
                        ='<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
                         <strong>Thanks: </strong> '.$_POST['name'].' for submit your applicattion.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
    
                        $query = "insert into `aplications` (`id_job`, `name`, `email`, `phone`, `file_name`, `file_path`, `date`) 
                        values(:id_job, :name, :email, :phone, :filename, :folder, :date)";
                        sleep(0.5);
                        query($query, $data);
                        }
                    }
                }
            
              }
            ?>

            <div class="col-lg-9 col-md-8">
                <div class="block comment">
                        <h4>Apply Here</h4>
                        <?php
                     if(isset($_SESSION['aplication'])){
                        echo $_SESSION['aplication'];
                        unset($_SESSION['aplication']);
                    }
                    ?>
                    <form method="post">
                        <!-- Message -->
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <!-- Name -->
                                <div class="form-group mb-30">
                                    <label for="name">Full Name:</label>
                                    <input name="name"  type="text" class="form-control" id="name" required="">
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <!-- Email -->
                                <div class="form-group mb-30">
                                    <label for="email">Email:</label>
                                    <input name="email"  type="email" class="form-control" id="email" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <!-- Email -->
                                <div class="form-group mb-30">
                                    <label for="email">Phone Number:</label>
                                    <input name="phone"  type="number" class="form-control" id="email" required="">
                                </div>
                            </div>
                        
                            <div class="col-sm-12 col-md-6">
                                <!-- Name -->
                                <div class="form-group mb-30">
                                    <label for="name">Curriculum:</label>
                                    <div class="custom-file">
                                <input type="file" class="custom-file-input" name="pdfFile" id="pdfFile" >
                                <span class="d-block"> 
                                <label class="custom-file-label" for="customFileLangHTML" data-browse="<?php if (isset($fileType)){ echo $fileType;} else{ echo 'Select pdf file';}?>"></label>
                                </div>
                                </div>
                            </div>
                            
                        </div>
                        <br>
                       
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-transparent w-100">Submit</button>
                            </div>

                            <div class="col text-center">
                            <a class="btn btn-light font-weight-bold mt-2 w-100" href="<?=ROUTE?>/explore">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
            <!------------------------------------------------------------------------------------>
		</div>
	</div>
</section>

<style>
.custom-file-label{
    height: 50px !important;
    box-shadow: 0 0 10px #ffc107 none;
}
.custom-file-input~.custom-file-label[data-browse]::after {
    content: attr(data-browse);
    height: 48px !important;
    padding: 1rem;
}

.custom-file-input {
    border:1px solid #ffc107;
    box-shadow: 0 0 10px #ffc107 !important;
}
</style>



<?php

include '../app/pages/includes/footer.php';

?>
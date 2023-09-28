
<?php 

$id = $url[2] ?? null;

$query = "select jobs.*,industries.Nameindustry from jobs join industries on jobs.industry_id = industries.IndustryId where jobs.id = :id limit 1";
$row = query_row($query, ['id'=>$id]);


//$id = $url[2];
//echo $url[3];

$query = "SELECT industry_id FROM jobs WHERE id = '$id'";
$industryID = query($query);

$back = $industryID['0']['industry_id'];
?>

<?php
 if(isset($_POST['submit'])){
    $user = user('id');  

    $_SESSION['aplication_candidate'] = 'Thanks';
    echo $_SESSION['aplication_candidate'];
    
    $url = $_GET['url'];
    $url = explode("/", $url);

    $app =  $url[2];

    //-------------------------------
    $data['app'] = $app;
    $data['user'] = user('id');
	$data['date']= date("Y-m-d");
    
    
    //-------------------------------
    $query = "SELECT industry_id from jobs where id = $app";
    $industry = query($query);
    $id_industry = $industry[0]['industry_id']; 

    $data['industry'] = $id_industry;

    echo $id_industry;

    $query = "INSERT INTO `candidates` (`user_id`, `date`, `industry_id`, `job_id`, `file_path`,  `resume`) 
    VALUES (:user, :date, :industry,  :app, '',  '')";
    query($query, $data);
    redirect('user/jobs/'.$id_industry.'');
    

 }
?>


<div class="container">
<div class="row">
<div class="col-12">
    
    <form method="post">
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

  <a type="submit" class="btn btn-light font-weight-bold border text-center" href="<?=ROUTE?>/user/jobs/<?=$back?>">Back</a>
  <button name="submit" type="submit" class="float-right btn btn-warning btn-sm">
    Apply
  </button>
  </form>

</div>   
</div>   
</div>  



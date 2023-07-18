<div class="container">
  <div class="row">
      <div class="col-12">

<div class="row row-cols-1 row-cols-md-1 g-6">

  <div class="col">
    <div class="card h-100">
      <div class="card-body">
            <h2 class="card-title ">Welcome:  <i class="fa fa-user float-right" aria-hidden="true"></i></h2>
            <?php echo user('fname').' '.user('lname');?>
        <p class="card-text">
        </p>
      </div>
    </div>
  </div>
</div>
<br>

<?php
    $industry = "SELECT COUNT(IndustryId) FROM industries";
    $limit = query($industry);
    

    $user = user('id');
    $query = "SELECT * FROM `candidates` INNER JOIN industries on candidates.industry_id = industries.IndustryId WHERE candidates.user_id = '$user' && candidates.job_id = 0";
    $row = query($query);
    //SELECT * FROM `candidates` INNER JOIN industries on candidates.industry_id LIKE industries.IndustryId;
?>
<!--------------------------------------------------------------------------->
<div class="row row-cols-1 row-cols-md-2 g-6">

<?php foreach ($row as $rows) : ?>
<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/user/jobs/<?=$rows['industry_id']?>">
        <h2 class="card-title">Explore Jobs on: <?= $rows['Nameindustry']?></h2>
        </a>
    </div>
    </div>   
</div>
<?php endforeach; ?>


<br>

</div>
</div>
</div>
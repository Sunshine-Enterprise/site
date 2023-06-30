
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
  <div class="col mt-3">
    <div class="card h-100">
      <div class="card-body">
            <h2 class="card-title ">Upload your CV here:  <i class="fa fa-folder float-right" aria-hidden="true"></i></h2>
            <div class="input-group mb-3">

              <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02">
                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
              </div>
              <div class="input-group-append">
              </div>
            </div>

        <p class="card-text">
        </p>
      </div>
    </div>
  </div>
</div>
<br>

<?php
    $query = "select * from industries where disabled = 1 order by IndustryId";
    $row = query($query);
?>
<!--------------------------------------------------------------------------->
<div class="row row-cols-1 row-cols-md-2 g-6">

<?php foreach ($row as $rows) : ?>
<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>">
        <h2 class="card-title">Explore Jobs on: <?= $rows['Nameindustry']?></h2>
        </a>
    </div>
    </div>   
</div>
<?php endforeach; ?>


<br>
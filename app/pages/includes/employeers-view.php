
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
<!--------------------------------------------------------------------------->
<div class="row row-cols-1 row-cols-md-2 g-6">

<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/employeer/sheadule">
        <h2 class="card-title">Scheadule: <i class="fa fa-calendar float-right" aria-hidden="true"></i></h2>
        </a>
    </div>
    </div>   
</div>

<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/employeer/clock">
        <h2 class="card-title ">Clock: <i class="fa fa-clock-o float-right" aria-hidden="true"></i></h2>
        </a>
    </div>
    </div>   
</div>
<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/employeer/tasks">
        <h2 class="card-title ">Tasks: <i class="fa fa-tasks float-right" aria-hidden="true"></i></h2>
        </a>
    </div>
    </div>   
</div>


<br>
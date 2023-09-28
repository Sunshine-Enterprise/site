<div class="container">
<div class="row">
    <div class="col-12">



<div class="row row-cols-1 row-cols-md-1 g-6">

  <div class="col">
    <div class="card h-100">
      <div class="card-body">
            <h2 class="card-title ">Welcome:  <i class="fa fa-user float-right p-2 rounded rounded-circle bg-warning" aria-hidden="true"></i></h2>
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

<div class="col mt-3">
    <div class="card">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/jobs">
        <h2 class="card-title">Jobs: <?=$jobs['num'] ?><i class="fa fa-bullhorn float-right p-2 rounded rounded-circle bg-warning" aria-hidden="true"></i></h2>
        </a>
    </div>
      
    </div>   
</div>

<div class="col mt-3">
    <div class="card">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/industries">
        <h2 class="card-title ">Industries: <?=$industry['num'] ?><i class="fa fa-sitemap float-right p-2 rounded rounded-circle bg-warning" aria-hidden="true"></i></h2>
        </a>
    </div>
    </div>   
</div>
<br>

<div class="col mt-3">
    <div class="card">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/requests">
        <h2 class="card-title ">Requests: <?=$request['num'] ?><i class="fa fa-id-badge float-right p-2 rounded rounded-circle bg-warning" aria-hidden="true"></i></h2> 
        </a>
    </div>

    </div>   
</div>
<br>
<div class="col mt-3">
    <div class="card">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/aplications">
        <h2 class="card-title ">Aplications: <?=$aplication['num'] ?><i class="fa fa-handshake-o float-right p-1 rounded rounded-circle bg-warning" aria-hidden="true"></i></h2>
        </a>
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
        <a href="<?=ROUTE?>/admin/employeers">
        <h2 class="card-title ">Employees: <?=$employeer['num'] ?><i class="fa fa-black-tie float-right p-2 rounded rounded-circle bg-warning" aria-hidden="true"></i></h2>
        </a>
    </div>

    </div>   
</div>
<br>
<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/users">
        <h2 class="card-title">App Users: <?=$user['num'] ?><i class="fa fa-users float-right bg-warning p-2 rounded rounded-circle" aria-hidden="true"></i></h2>
        </a>
    </div>
    </div>   
</div>
<div class="col mb-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/candidates">
        <h2 class="card-title">Candidates: <?=$candidate['num'] ?><i class="fa fa-users float-right bg-warning p-2 rounded rounded-circle" aria-hidden="true"></i></h2>
        </a>
    </div>
    </div>   
</div>


</div>

        
</div>
</div>
</div>
<style>
@media (max-width: 480px) {
    .row {
        margin-bottom: 20px;
    }
   
}
</style>
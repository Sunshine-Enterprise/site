
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

<div class="col">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/jobs">
        <h2 class="card-title">Jobs: <i class="fa fa-bullhorn float-right" aria-hidden="true"></i></h2>
        </a>
    </div>
        <div class="card-footer">
            <ul class="list-group ">
                <a href="<?=ROUTE?>/admin/jobs">
                <li class="list-group-item d-flex justify-content-between lh-sm border-0 p-0 my-4 bg-gray">
                    <div class='pt-3'>
                    <h6 class="my-0">Number of jobs:</h6>
                    </div>
                    <span class="text-body-secondary w-50 text-center"> <p class='bg-warning w-25 h5 float-right rounded-circle mt-2 py-1 text-dark'><?=$jobs['num'] ?></p></span>
                </li>
                </a>
            </ul> 
        </div>
    </div>   
</div>

<div class="col">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/industries">
        <h2 class="card-title ">Industries: <i class="fa fa-sitemap float-right" aria-hidden="true"></i></h2>
        </a>
    </div>
        <div class="card-footer">
            <ul class="list-group ">
            <a href="<?=ROUTE?>/admin/industries">
                <li class="list-group-item d-flex justify-content-between lh-sm border-0 p-0 my-4 bg-gray">
                    <div class='pt-3'>
                    <h6 class="my-0">Number of Industries:</h6>
                    </div>
                    <span class="text-body-secondary w-50 text-center"> <p class='bg-warning w-25 h5 float-right rounded-circle mt-2 py-1 text-dark'><?=$industry['num'] ?></p></span>
                </li>
            </a>
            </ul> 
        </div>
    </div>   
</div>
<br>
<div class="col mt-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/requests">
        <h2 class="card-title ">Talent Requests: <i class="fa fa-id-badge float-right" aria-hidden="true"></i></h2> 
        </a>
    </div>
        <div class="card-footer">
            <ul class="list-group ">
            <a href="<?=ROUTE?>/admin/requests">
                <li class="list-group-item d-flex justify-content-between lh-sm border-0 p-0 my-4 bg-gray">
                    <div class='pt-3'>
                    <h6 class="my-0">Number of requests:</h6>
                    </div>
                    <span class="text-body-secondary w-50 text-center"> <p class='bg-warning w-25 h5 float-right rounded-circle mt-2 py-1 text-dark'><?=$request['num'] ?></p></span>
                </li>
                </a>
            </ul> 
        </div>
    </div>   
</div>
<br>
<div class="col mt-3">
    <div class="card h-100">
        <div class="card-body bg-white">
        <a href="<?=ROUTE?>/admin/requests">
        <h2 class="card-title ">Aplications: <i class="fa fa-handshake-o float-right" aria-hidden="true"></i></h2>
        </a>
    </div>
        <div class="card-footer">
            <ul class="list-group ">
            <a href="<?=ROUTE?>/admin/requests">
                <li class="list-group-item d-flex justify-content-between lh-sm border-0 p-0 my-4 bg-gray">
                    <div class='pt-3'>
                    <h6 class="my-0">Number of aplications:</h6>
                    </div>
                    <span class="text-body-secondary w-50 text-center"> <p class='bg-warning w-25 h5 float-right rounded-circle mt-2 py-1 text-dark'><?=$request['num'] ?></p></span>
                </li>
            </a>
            </ul> 
        </div>
    </div>   
</div>  
</div>
<br>
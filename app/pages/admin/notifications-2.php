
<?php
    if(!empty($_POST)){
      
    }
?>
<div class="container">
<div class="row">
<div class="col-6">
<section class="advt-post bg-light py-5">
  <div class="container">
    <form method="POST" enctype="multipart/form-data" action='notifications-3'>

          <div class="col">
            <h3>Insert the number of users</h3>
          </div>

          <div class="col-lg-12">
            <h6 class="font-weight-bold pt-4 pb-1">Number of people:</h6>
            <input name="people" type="text" placeholder="Insert the number of messages" class="form-control bg-white">
          </div>
        <br>
          <div class="row">
              <div class="col text-center">
                  <button type="submit" class="btn btn-transparent w-100">Create</button>
              </div>
  
              <div class="col text-center">
              <a href="notifications" class="btn btn-transparent w-100 bg-secondary border-0 text-light">Back</a>
              </div>
          </div>
        </form>
    
  </div>
  </div>



  <div class="col-6 bg-gray">
    <?php
      $query = "SELECT u.email, n.date_user, n.phone, n.message FROM notifications as n inner join users as u on n.user_id = u.id limit 7";
      $rows = query($query);
    ?>
    <section class="advt-post py-5">
      <div class="container">
        <form method="POST" enctype="multipart/form-data" class="">
        <div class="col">
            <h3>History of messages</h3>
          </div>
          <div class="table-responsive">
          <table class="table">
  <thead>

    <tr>
      <th scope="col">
      </th>
      <th scope="col">Autor:</th>
      <th scope="col">Message:</th>
      <th scope="col">Phone:</th>
    </tr>

  </thead>
  <tbody>
  <?php if(!empty($rows)):?>
  <?php foreach($rows as $row):?>
    <tr class="">
      <th scope="col">
      </th>
      <td scope="col"><?=$row['email']?></td>
      <td scope="col" class="" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width:10px; "><?=$row['message']?></td>
      <td scope="col"><?=$row['phone']?></td>
    </tr>
  <?php endforeach;  ?>
  <?php  endif; ?>  
  </tbody>
  </div>
</table>
        </form>
      </div>
    </section>
  </div>

</div>
  </div>
</section>
<script src="<?=ROUTE?>/assets/js/javascript.js"></script>
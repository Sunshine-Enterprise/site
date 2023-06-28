
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



  <div class="col bg-gray">
    <?php
      $query = "SELECT * FROM notifications order by id ";

      $rows = query($query);
    ?>
    <section class="advt-post py-5">
      <div class="container">
        <form method="POST" enctype="multipart/form-data">
        <div class="col">
            <h3>History of messages</h3>
          </div>
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
    <tr>
      <th scope="col">
      </th>
      <td scope="col"><?=$row['user_id']?></td>
      <td scope="col"><?=$row['message']?></td>
      <td scope="col"><?=$row['phone']?></td>
    </tr>
  <?php endforeach;  ?>
  <?php  endif; ?>  
  </tbody>
</table>
        </form>
      </div>
    </section>
  </div>

</div>
  </div>
</section>
<script src="<?=ROUTE?>/assets/js/javascript.js"></script>

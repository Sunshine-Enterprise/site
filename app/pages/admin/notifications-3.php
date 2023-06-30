<?php



if(!empty($_POST)){
  
        $errors =[];
        if( empty($_POST['phone'])){
            $errors['phone'] = 'Please fill the phone number';
        }
        if(empty($_POST['message'])){
          $errors['message'] = 'Please fill the content message';
        }

      if(isset($_POST['submit']) && empty($errors)){
          
        //  $phones = $_POST['submit'];
          
          require '../vendor/autoload.php';

          //twilio
          $sid = 'AC5817ca6fa49d1d61353b7727ca0611ac';
          $token = 'b19c889c75d3fe429ca4f2daa949460e';
          $data = [];
          $data['user_id'] = $user_id = user('id');
          $data['message'] = $_POST['message'];
          $data['date_user'] = date('l jS \of F Y');
          $data['current_date'] = date('Y-m-d');

          $client = new Twilio\Rest\Client($sid, $token);
          
          foreach ($_POST['phone'] as $key => $val) {

            for ($i=0; $i < $key; $i++) { 
              $phones[$key] = $val;
              echo "<pre>";
              $data['phone'] = $val;
              //echo $phones[$key];
              echo "</pre>";


              //echo $data['phone'];
           
           $query = "INSERT INTO `notifications` (`user_id`, `phone`, `message`, `date_user`, `date`) 
            values(:user_id, :phone, :message, :date_user, :current_date)";
            }
            

           
           // echo 'hecho';
           // $message = $client->messages->create($_POST['phone'][$key], array('from' => '+14075373124','body' => $_POST['message']));             

           query($query, $data);    
          }
    }        
}

?>

<div class="container">
<div class="row">
<div class="col-6">
<section class="advt-post bg-light py-5">
  <div class="container">
    <form method="POST" enctype="multipart/form-data" class="">

          <div class="col">
            <h3>Insert the number of users</h3>
          </div>

          <div class="col-lg-12">
          <?php if(isset($_POST['people'])){?>

              <h6 class="font-weight-bold pt-4 pb-1">Number of people: <?= $_POST['people'] ?></h6>
          <?php } else{ ?>

            <div class="alert alert-success alert-dismissible fade show text-center mt-0" role="alert">
                <strong>The messages have been sended</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
         <?php }?>
            
            <div class="form-group">

                <?php
                if(isset($_POST['people'])){
                    $num =  $_POST['people'];
                    for ($i=1; $i <= $num; $i++) { 
                        ?>                        
                        <input class="form-control bg-white my-2" 
                        id="phone-number" name="phone[]" type="text" placeholder="<?='# '.$i?> Phone Number">
                        <?php
                    }
                }
                ?>
                </div>
            
                <?php
            
            if(isset($_POST['people'])){ ?>            
            <h6 class="font-weight-bold pt-4 pb-1">Message Text:</h6>
            <textarea cols="1" rows="3"  type="text"  class="form-control bg-white" name="message">
            <?php } else{
                //delete the textarea
            } ?>
            <?php
            if(isset($_POST['soliciting'])){
              old_value('soliciting');
            }
            ?></textarea>
            
          </div>

        <br>

      <!-- submit button -->
      <?php if(!empty($errors['terms'])):?>
                <div class="text-danger mb-3"><?='* '.$errors['terms']?></div>
          <?php endif; ?>
          <div class="row">
              <div class="col text-center">
                  <button type="submit" name="submit" class="btn btn-transparent w-100">Send</button>
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
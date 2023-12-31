
<?php
    if(!empty($_POST)){
        require '../vendor/autoload.php';

        //twilio
        $sid = 'AC5817ca6fa49d1d61353b7727ca0611ac';
        $token = 'b19c889c75d3fe429ca4f2daa949460e';

        $client = new Twilio\Rest\Client($sid, $token);

        $message = $client->messages->create(
          
            $_POST['phone'], array(
            'from' => '+14075373124',
            'body' => $_POST['message']
            
        ));
        if($message){
            $_SESSION['notification'] ='<div class="alert alert-success alert-dismissible fade show text-center mt-0" role="alert">
            <strong>The message has been send</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }else{
            $_SESSION['notification'] ='<div class="alert alert-danger alert-dismissible fade show text-center mt-3" role="alert">
            <strong>The message cannot be send</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
        }

        

    }
    ?>
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-5 col-sm-12">
<section class="advt-post bg-light py-5 rounded">
  <div class="container">
    <form method="POST" enctype="multipart/form-data">
      <?php

    require '../vendor/autoload.php';


        ?>

      <!-- seller-information start -->
          <?php
              if(!empty($_POST)){
                $errors =[];
                if( empty($_POST['phone'])){
                    $errors['phone'] = 'Please fill the phone number';
                }
                if(empty($_POST['message'])){
                  $errors['message'] = 'Please fill the content message';
                }

                if(empty($errors)){
                  $data = [];
                  $data['user_id'] = $user_id = user('id');
                  $data['phone'] = $_POST['phone'];
                  $data['message'] = $_POST['message'];
                  $data['date_user'] = date('l jS \of F Y');
                  $data['current_date'] = date('Y-m-d');

                  $query = "INSERT INTO `notifications` (`user_id`, `phone`, `message`, `date_user`, `date`) values(:user_id, :phone, :message, :date_user, :current_date)";
               
              
                  query($query, $data);

                      echo $_SESSION['notification'];
                      unset($_SESSION['notification']);
                      sleep(1);
                }
              }else{

              }

          ?>
          <div class="col">
            <h3>Send Message to customer</h3>
          </div>

          <div class="col-lg-12">
            <h6 class="font-weight-bold pt-4 pb-1">Phone Number:</h6>
            <input onkeydown="phoneNumberFormatter()" id="phone-number" name="phone" type="text" placeholder="Phone Number" class="form-control bg-white">
            <?php if(!empty($errors['name'])):?>
                  <div class="text-danger mb-3"><?='* '.$errors['name']?></div>
            <?php endif; ?>  

           
            <h6 class="font-weight-bold pt-4 pb-1">Message Text:</h6>
            <textarea cols="1" rows="3"  type="text"  class="form-control bg-white" name="message">
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
                  <button type="submit" class="btn btn-transparent w-100">Send</button>
              </div>
  
              <div class="col text-center">
              <a href="notifications-2" class="btn btn-transparent w-100 bg-secondary border-0 text-light">More +1</a>
              </div>
          </div>
        </form>
    
  </div>
  </div>



  <div class="col-md-6 col-lg-7 col-sm-12">
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
          <table class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>

      <th scope="col">Autor:</th>
      <th scope="col">Message:</th>
      <th scope="col">Phone:</th>
    </tr>

  </thead>
  <tbody>
  <?php if(!empty($rows)):?>
  <?php foreach($rows as $row):?>
    <tr class="">

      <td scope="col"><?=$row['email']?></td>
      <td scope="col" class=""><?=$row['message']?></td>
      <td scope="col" style="width: 150px;"><?=$row['phone']?></td>
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

<?php
date_default_timezone_set("America/New_York");

include '../app/pages/includes/header_general.php';?>

<?php
if(!empty($_POST)){
    $errors = [];
    

    if(empty($_POST['name'])) { $errors['name'] = "Please provide full your name";}
    if(empty($_POST['email'])) { $errors['email'] = "Please fill your email";}
    if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) { $errors['email']='Email not valid';}
    if(empty($_POST)) { $errors['phone'] = "Please fill your phone";}
    if(strlen($_POST['phone']) < 10) { $errors['phone'] = "Phone must to have 10 caracters";}
    if(empty($_POST['visit'])) {$errors['visit'] = "Please provide the reason for your visit";} 
    if(empty($_POST['terms'])) {$errors['terms'] = 'Please accept the terms';}

if(empty($errors)){
    $data=[];
    $currentDate = date('Y-m-d');
    $hour = date('h:i');
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['visit'] = $_POST['visit'];
    $data['date'] = $currentDate;
    $data['time'] = $hour;
    $query = "INSERT INTO visits (`name`, `email`, `phone`, `visit`, `date`, `time`) values(:name, :email, :phone, :visit, :date, :time)";
    query($query, $data);

    //Send message for visits

    require '../vendor/autoload.php';

    //twilio
    $sid = 'AC5817ca6fa49d1d61353b7727ca0611ac';
    $token = 'fa430db4f797c8a16f569ce42a9bd933';
    
    $client = new Twilio\Rest\Client($sid, $token);

    $message = $client->messages->create(

        $_POST['phone'], array(
            'from' => '+14075373124',
            'body' => 'Thanks for visit Sunshine Enterprese USA dear: '.$_POST['name']
            
        ));
     
       ?>
       <div class="container">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Thanks for your visit!</strong>
        <br> here you can look your last jobs.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        </div>
        <script>
        setTimeout(function(){
            window.location.href = '<?=ROUTE?>/explore'; 
            },2500);
        </script>
       <?php
     
      
}
}

?>


<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-us-content p-4">
                    <h5>Thanks for your visit</h5>
                    <h1 class="pt-3">Welcome to Sunshine Enterprise USA</h1>
                    <p class="pt-3 pb-5">Quality, Integrity, Professionalism and Commitment</p>
                </div>
            </div>
            <div class="col-md-6">
                    <form method="post">
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input value="<?=old_value('name')?>" name="name" type="text" placeholder="Full Name *" class="form-control" >
                                        <?php if(!empty($errors['name'])):?>
                                                <div class="text-danger mb-3"><?='* '.$errors['name']?></div>
                                        <?php endif; ?>  
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input value="<?=old_value('email')?>" name="email" type="email" placeholder="Email *" class="form-control" >
                                        <?php if(!empty($errors['email'])):?>
                                                <div class="text-danger mb-3"><?='* '.$errors['email']?></div>
                                        <?php endif; ?> 
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input onkeydown="phoneNumberFormatter()" id="phone-number" value="<?=old_value('phone')?>" name="phone" type="text" placeholder="Phone *" class="form-control py-3" >
                                        <?php if(!empty($errors['phone'])):?>
                                                <div class="text-danger mb-3"><?='* '.$errors['phone']?></div>
                                        <?php endif; ?> 
                                    </div>
                                </div>   
                            </div>
                            
                            <textarea value='value="<?=old_value('visit')?>"' name="visit" id="" placeholder="Reason for your visit *" class="border w-100 p-3 mt-3 mt-lg-4" style="height: 175px;"></textarea>
                            <?php if(!empty($errors['visit'])):?>
                                                <div class="text-danger mb-3"><?='* '.$errors['visit']?></div>
                                        <?php endif; ?> 
                            <div class="row">
                                <div class="col">
                                    <div class="loggedin-forgot d-inline-flex my-3">
                                        <input <?=old_checked('terms')?> name="terms" type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2 pt-3">You accept our <a class="text-information font-weight-bold" href="terms">Terms & Conditions</a></label>
                                    </div> 
                                    <?php if(!empty($errors['terms'])):?>
                                                <div class="text-danger mb-3"><?='* '.$errors['terms']?></div>
                                        <?php endif; ?>                 
                                </div>
                            </div>

                            <div class="btn-grounp text-left">
                                <button type="submit"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-warning mt-2 float-right">SUBMIT</button>
                            </div>
                        </fieldset>

                            <!---------------------------->
                            <!-------ALERT SECTION-------->
                            <!---------------------------->
                        
                            <!---------------------------->
                            <!------ALERT SECTION--------->
                            <!---------------------------->
                            
                    </form>
            </div>
        </div>
    </div>
</section>




<?php

include '../app/pages/includes/footer.php';

?>
<?php
  if(!empty($_POST)){
    if(isset($_POST)){
      
      $errors = [];
      if(empty($_POST['name'])){
        $errors['name'] = 'Please Insert your Full name';
      }
      if(empty($_POST['phone'])){
        $errors['phone'] = 'Please Insert your Phone';
      }
      if(empty($_POST['email'])){
        $errors['email'] = 'Please Insert your Email';
      }
      if(empty($_POST['email'])){
        $errors['email'] = 'Please Insert your Email';
      }
      if(empty($_POST['city'])){
        $errors['city'] = 'Please Insert your City';
      }
      if(empty($_POST['state'])){
        $errors['state'] = 'Please Insert your State';
      }
      if(empty($_POST['zipcode'])){
        $errors['zipcode'] = 'Please Insert your de';
      }
      if(empty($_POST['request'])){
        $errors['request'] = 'Please Insert your request';
      }
      
      else{
        $data = [];
        $data['name'] = $_POST['name'];
        $data['phone'] = $_POST['phone'];
        $data['email'] = $_POST['email'];
        $data['city'] = $_POST['city'];
        $data['state'] = $_POST['state'];
        $data['zipcode'] = $_POST['zipcode'];
        $data['request'] = $_POST['request'];
        $data['terms'] = $_POST['terms'];
        $data['date'] = date("Y-m-d");

              
        $query = "INSERT INTO `requests` 
        (`name`, `phone`, `email`, `city`, `state`, `zipcode`, `request`) 
        VALUES (:name, :phone, :email, :city, :state, :zipcode, :request)";

        query($query, $data);

        $_SESSION['request'] ='<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
      <strong>Dear user:</strong> your request has been sent successfully.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';

      redirect('home');
      }

    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sunshine Project Management</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   </head>
  <body>
    <!---NAVBAR-->
    <nav class="top-nav" id="home">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-auto">
            <!--<p class="top">
                  <i class="fa fa-envelope text-dark"></i>
                  <span>executive@spmconstructions.com</span>
                </p>-->
                <p class="top">
                  <i class="fa fa-volume-control-phone text-dark"></i>
                  <span class="fw-bold">+1 (407)-768-1231</span>
                </p>
            </div>
            <div class="col-auto">
                <div class="social">
                 <a href="https://www.facebook.com/SunshineProjectManagement"> <i class="fa fa-facebook text-dark"></i></a>
                 <a href="https://www.instagram.com/sunshineprojectmanagement"> <i class="fa fa-instagram text-dark"></i></a>
                 <a href="https://www.linkedin.com/company/sunshine-project-management"> <i class="fa fa-linkedin text-dark"></i></a>
                </div>
            </div>

          </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="<?=ROUTE?>"><span></span><img src="assets/img/spmlogo_new.png" alt="" width="50px" height="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="services">Concrete</a></li>
                <li><a class="dropdown-item" href="services">Masonry</a></li>
                <li><a class="dropdown-item" href="services">Demolition</a></li>
                <li><a class="dropdown-item" href="services">OutDoor Design</a></li>
                <li><a class="dropdown-item" href="services">Landscaping</a></li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="about" id="menu">About</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="team" id="menu">Team</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="projects" id="menu">Projects</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="carrers" id="menu">Carrers</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-brand" aria-current="page" href="request" id="menu">Contact Us</a>
            </li>
            
          </ul>
          
        </div>
      </div>
    </nav>

    <!---/NAVBAR-->
<!---SECTION-->
    <section class="bg-cover pt-5 shadow-2">
        <div class="container">
            <div class="">
                
                <div class="row justify-content-center">
                    
                <div class="col-md-7 col-lg-8">
                <h3 class="h1 text-center mt-0 shadow-5">Job Application</h3>
                <h4 class="text-center fst-italic">Founding</h4>
                <p class="text-center pb-5 display-5 h6" id="subtitle-about">Founding in 2022</p>

                  <form class="needs-validation" novalidate="">

                    <div class="row g-3">
                      <div class="col-sm-6 mb-1">
                        <label id="form-contact" for="firstName" class="form-label fw-bold">First name</label>
                        <input id="form-input" type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="name">
                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
          
                      <div class="col-sm-6 mb-1">
                        <label id="form-contact" for="lastName" class="form-label fw-bold">Last name</label>
                        <input id="form-input" type="text" class="form-control" id="lastName" placeholder="" value="" required="" name="lastname">
                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
                      
                      <div class="col-sm-6 mb-1">
                        <label id="form-contact" for="firstName" class="form-label fw-bold">Phone Number</label>
                        <input id="form-input" type="text" class="form-control" id="firstName" placeholder="" value="" required="" name="phone">
                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
          
                      <div class="col-sm-6 mb-1">
                        <label id="form-contact" for="lastName" class="form-label fw-bold">Email</label>
                        <input id="form-input" type="text" class="form-control" id="lastName" placeholder="" value="" required="" name="email">
                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
          
          
          
                      <div class="col-md-5">
                        <label id="form-contact" for="country" class="form-label fw-bold">City</label>
                        <input id="form-input" class="form-control" id="country" required="" name="city"/>

                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
          
                      <div class="col-md-4">
                        <label id="form-contact" for="state" class="form-label fw-bold" name="state">State</label>
                        <select id="form-input" class="form-select" id="state" required="">
                          <option value="">Choose...</option>
                          <option>CA</option>
                          <option>FL</option>
                          <option>NC</option>
                          <option>SC</option>
                          <option>GA</option>
                        </select>
                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
          
                      <div class="col-md-3 mt-3">
                        <label id="form-contact" for="zip" class="form-label fw-bold">Zip</label>
                        <input id="form-input" type="text" class="form-control" id="zip" placeholder="" required="" name="zipcode">
                        <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                      </div>
                    </div>
                    

                    <div class="col-sm-12 pt-3">
                      <label id="form-contact" for="lastName" class="form-label fw-bold">Resume</label>
                      <input id="form-input" type="file" class="form-control" id="lastName" placeholder="" value="" required="" name="resume">
                      <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>
                    </div>
                    
                    <br>
                    <br>
                    <hr class="my-3">
          
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="same-address" name="terms">
                      <label id="form-contact" class="form-check-label" for="same-address">Accept Terms and Conditions</label>
                    </div>
                    <div id="form-contact" class="form-text text-danger fw-bold"> First Name is Required</div>

                    <br>
                     
                    <button id="button-input" class="w-100 btn btn-primary btn-lg rounded border-0 mt-4" type="submit">Submit Application</button>
                  </form>
                </div>
              </div>

        </div>
      </div>
  </section>
    <!---/SECTION-->

<!---FOOTER-->
<div class="container-fluid bg-light">
  <div class="container">
    <footer class="pt-5">
      <div class="row">
        
              <div class="col-6 col-md-2 mb-3">
                  <h5 class="text-dark fw-bold fst-italic">Services</h5>
                  <ul class="nav flex-column">
                      <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Concrete</a></li>
                      <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Masonry</a></li>
                      <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Pavers</a></li>
                      <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Demolition</a></li>
                      <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Design</a></li>
                  </ul>
              </div>
              
              <div class="col-6 col-md-2 mb-3">
                  <h5 class="text-dark fw-bold fst-italic">Careers</h5>
                  <ul class="nav flex-column">
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Concrete</a></li>
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                  </ul>
              </div>
              
              <div class="col-md-6 offset-md-1 mb-3">
                  <form>
                      <h5>Get in touch</h5>
                      <p>Insert your email to contact you:</p>
                      <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                          <label for="newsletter1" class="visually-hidden">Email address</label>
                          <input id="form-input" id="newsletter1" type="text" class="form-control" placeholder="Email address">
                          <button class="btn" id='submit-email' type="button"> <p class="fw-semibold m-0">Submit</p> </button>
                      </div>
                  </form>
                
                <div class="row text-center pt-4">
                  <div class="col">
                    <p class="top">
                      <i class="fa fa-home text-secondary"></i>
                      <span class="fw-bold text-secondary">500 Winderley Place, Suite 218, Maitland FL 32751</span>
                    </p>
                  </div>
                </div>
                
                <div class="row text-center">
                  <div class="col-sm">
                    <p class="top">
                      <i class="fa fa-envelope-o text-secondary"></i>
                      <span class="fw-bold text-secondary">jobs@spmconstructions.com</span>
                    </p>
                  </div>
                  <div class="col-sm pr-3">
                    <p class="top">
                      <i class="fa fa-phone text-secondary"></i>
                      <span class="fw-bold text-secondary">+1 (407) 951-1386</span>
                    </p>
                  </div>

                </div>
              </div>
            </div>
          </div>
          
          <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 mt-4 border-top">
            <p>© Sunshine Project Management.</p>
            <ul class="list-unstyled d-flex">
              <a href="https://www.facebook.com/SunshineProjectManagement"> <i class="fa fa-facebook text-dark m-3"></i></a>
              <a href="https://www.instagram.com/sunshineprojectmanagement"> <i class="fa fa-instagram text-dark m-3"></i></a>
              <a href="https://www.linkedin.com/company/sunshine-project-management"> <i class="fa fa-linkedin text-dark m-3"></i></a>
            </ul>
            
          </div>
        </footer>
      </div>
    </div>
  <!---/FOOTER-->
</body>
</html>

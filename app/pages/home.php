<?php

  if(!empty($_POST)){
    if(isset($_POST)){

      $errors = [];
        if(empty($_POST['email'])){
            $errors['email'] = 'Please Insert your email';
        }else{

            $data = [];
            $data['email'] = $_POST['email'];
            $query = "INSERT INTO emails(email) Values(:email)";

            query($query, $data);

            $_SESSION['request'] = '<div class="alert alert-success alert-dismissible fade show text-center mt-3" role="alert">
            <strong>Dear user:</strong> your request has been sent successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>';
            
          redirect('home');
          
          /*  
          class Computer{

            public $brand;
            public $color;
            public $name;

            function set_brand($brand){
              $this->brand = $brand;
            }
            function set_color($color){
              $this->color = $color;
            }
            function set_name($name){
              $this->name = $name;
            }


            function set_brand($brand){
              return $this->brand;
              }
            }
            
            function set_color($color){
              return $this->color;
            }
            function set_name(){
              return $this->name;
            }
              */
          }
          class House{

          }

        }
    }
  
?>

<?php
 class Computer{
  public $mouse = 'HP';
  protected $screen = 'LG';
  private $keyboard = 'ASUS';

  function printG(){
    echo $this->mouse.'</br>';
    echo $this->screen.'</br>';
    echo $this->keyboard.'</br>';
  }
  
}

$device1 = new Computer;

//echo ($device1->keyboard)

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
    <link href="<?=ROUTE?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
   </head>
  <body>
    <!---NAVBAR-->
    <nav class="top-nav" id="home">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-auto">
            <!--
              <p class="top">
                <i class="fa fa-envelope text-dark"></i>
                <span>executive@spmconstructions.com</span>
              </p>
              -->
                <p class="top">
                  <i class="fa fa-volume-control-phone text-dark"></i>
                  <a  href="tel:4077681231">
                    <span class="fw-bold">(407)-768-1231</span>
                  </a>
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

    <!---SLIDER-->
    <div class="slider-wrapper" id="banner">
    <!--min-vh-100-->
    <div class="slide1 py-5 bg-cover d-flex align-items-center" id='hero-slider'>
        <div class="container">
        <?php
          if(isset($_SESSION['request'])){
              echo $_SESSION['request'];
              unset($_SESSION['request']);
         }
      ?>
          <div class="row">
            <div class="col-12">
              <h3 class="text-light text-uppercase h1" id="title">Sunshine Project Management</h3>
              <h6 class="text-light displa-3 h3 fst-italic pb-3" id="title">Specialist on construction sector</h6>
              <a href="request" class="btn btn-brand"> <p class="h2 text-dark fw-semibold"  id="subtitle">Contact Us</p></a>
              <a href="application" class="btn btn-outline-warning border-light shadow-3"><p class="h2 fw-semibold text-light" id="contact2">Work with us</p></a>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
    <!---/SLIDER-->
    
<!---SECTION-->
    <section class="mt-2" id="main-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-12 info-box my3">
                    <i id="icono"class="fa fa-question-circle-o display-3" aria-hidden="true"></i>
                    <div>                  
                      <h5 id="subtitle">Construction</h5>
                      <p class="text-justify" id="text"> Google LLC is an American multinational technology company focusing on artificial intelligence, online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, and consumer electronics</p>
                    </div>
                  </div>
                  <div class="col-12 info-box my3">
                    <i id="icono"class="fa fa-cogs display-3" aria-hidden="true"></i>
                    <div>                  
                      <h5 id="subtitle">Improvement</h5>
                      <p class="text-justify" id="text"> Google LLC is an American multinational technology company focusing on artificial intelligence, online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, and consumer electronics</p>
                    </div>
                  </div>
                  <div class="col-12 info-box my3">
                    <i id="icono"class="fa fa-building display-3" aria-hidden="true"></i>
                    <div>                  
                      <h5 id="subtitle">Maintenance</h5>
                      <p class="text-justify" id="text"> Google LLC is an American multinational technology company focusing on artificial intelligence, online advertising, search engine technology, cloud computing, computer software, quantum computing, e-commerce, and consumer electronics</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-5">
                <img src="assets/img/gallery/crane.webp" class="rounded" alt="">
              </div>
        </div>
      </div>
  </section>
    <!---/SECTION-->
 
    <!---SECTION-->
    <section class="pb-2" id="services">
      <div class="container mb-5">
        <div class="row g-3">
          <div class="col-12 intro text-center">
            <h6 class="text-center">Give us a call for an estimate today.</h6>
            <h2 class="text-center" id="subtitle">What We Do ?</h2>
            <p class="text-center fst-italic">Sunshine Project Management provides an effortless and efficient solution to your projects in Central FL. </p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6 pb-">
            <a href="services">
              <div class="card_services rounded p-0">
                <img src="assets/img/gallery/concrete.webp" class="rounded-top" alt="">
                <div class="overlay">
                  <h3 class="text-light fst-italic text-center" style="margin-top: 50%;"></h3>
                </div>
                <div class="cart-body p-3 text-center">
                  <h5>Concrete</h5>
                  <p class="text-justify">We specialize in all aspects of structural concrete,
                    including foundations, slabs, poured-in-place and tilt-up wall.</p>
                  </div>
                </div>
              </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
            <a href="services">
            <div class="card_services rounded p-0">
              <img src="assets/img/gallery/mansory.webp" class="rounded-top" alt="">
              <div class="overlay">
                <h3 class="text-light fst-italic text-center" style="margin-top: 50%;"></h3>
              </div>
              <div class="cart-body p-3 text-center">
                <h5>Mansory</h5>
                <p class="text-justify">
                  Masonry structures, ranging from heavy structural building walls to decorative
                  finishes in CMU or Brick applications.
                </p>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
            <a href="services">
            <div class="card_services rounded p-0">
              <img src="assets/img/gallery/pavers.webp" class="rounded-top" alt="">
              <div class="overlay">
                <h3 class="text-light fst-italic text-center" style="margin-top: 50%;"></h3>
              </div>
              <div class="cart-body p-3 text-center">
                <h5>Pavers</h5>
                <p class="text-justify">SPM specializes in Brick Pavers
                   maintenance and installation of driveways,
                    pool decks, patios, walkways, fire pits,
                    and retaining walls.</p>
              </div>
            </div>
            </a>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
            <a href="services">
            <div class="card_services rounded p-0">
              <img src="assets/img/gallery/demolition.webp" class="rounded-top" alt="">
              <div class="overlay">
                <h3 class="text-light fst-italic text-center" style="margin-top: 50%;"></h3>
              </div>
              <div class="cart-body p-3 text-center">
                <h5>Demolition</h5>
                <p class="text-justify">Our years of experience enable us to understand. We specialize in demolition, and rubble removal services.
                </p>
              </div>
            </div>
            </a>
          </div>
        </div>
        </div>
      </div>
  </section>
<!---/SECTION-->

    <!---SECTION-->
    <section  id="main-section" class="py-1" id="services">
      <div class="container mb-5">
        <div class="row g-3">
          <div class="col-12 intro text-center ">
            <h2 class=" text-center text-dark shadow-2 pt-1 h1" id="about">Our Job<h2>
              <p class="text-center display-5 h6" id="subtitle-about">Last Projects</p>

              <ul class="nav nav-pills my-3 text-center " id="pills-tab" role="tablist">

                <li class="nav-item px-2" role="presentation">
                  <button class="nav-link active text-dark" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Costco Project</button>
                </li>

                <li class="nav-item px-2" role="presentation">
                  <button class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Gallery</button>
                </li>

              </ul>
              
              <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                    <div>

                      <div class="row py-2">
                          <div class="col-12 col-md-12">
                            <video autoplay loop muted plays-inline class="back-video">
                                <source src="assets/img/projects/1690633576748.mov" type="video/mp4">
                            </video>
                          </div>
                      </div>
                          
                    </div>
                </div>

                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                  <div>

                    <div class="row">
                        <div class="col-12 col-md-12 pb-2">
                          <p class="lh-lg display-3 text-center fst-italic" id="p-job"> Job pouring concrete for the new build-up Costco fuel station in Clermont</p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                          <img src="assets/img/gallery/cotsco3.webp" id="img-jobs" class="pt-3" height="280px" alt="">
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                          <img src="assets/img/gallery/cotsco2.webp" id="img-jobs" class="pt-3" height="280px" alt="">
                        </div>

                        <div class="col-12 col-sm-12 col-lg-4">
                          <img src="assets/img/gallery/cotsco1.webp" id="img-jobs" class="pt-3" height="280px" alt="">
                        </div>
                    </div>
                        
                  </div>
                </div>
                <!----
                  <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
                    <div>
                      
                    <div class="row py-2">
                        <div class="col-12 col-md-12">
                          <p class="lh-lg display-3 text-center" id="p-job"> Google LLC is an American multinational technology company</p>
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                          <img src="assets/img/horizontal/pexels-tirachard-kumtanom-450064.jpg" class="rounded-top pt-3" height="250px" alt="">
                        </div>

                        <div class="col-12 col-sm-6 col-lg-4">
                          <img src="assets/img/horizontal/pexels-tirachard-kumtanom-450064.jpg" class="rounded-top pt-3" height="250px" alt="">
                        </div>
                        
                        <div class="col-12 col-sm-12 col-lg-4">
                          <img src="assets/img/horizontal/pexels-tirachard-kumtanom-450064.jpg" class="rounded-top pt-3" height="250px" alt="">
                        </div>
                      </div>
                  ---->
                        
                  </div>
                </div>
              </div>

          </div>
        </div>
      </div>
    </section>
<!---/SECTION-->

<!---SECTION-->
<div class="slide3 py-5 bg-cover d-flex align-items-center py-5">
  <div class="container">
    <div class="row">

            <h4 class="text-light h1 text-center" id="text-Contact" id="form-index">Visit Us</h4>
             <a class="text-center display-5 h6 pb-4 text-light fst-italic" id="subtitle-about" href="team">Meet our Team</a> 

            <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">                     
                        <h5 class="text-light h4 py-2 text-center fst-italic" id="text-Contact"> <i class="fa fa-home" aria-hidden="true"></i> Office:</h5>
                        <h4 class="h5 text-secondary text-light fw-semibold" id="visit-p"> 500 Winderley Pl, Suite 218</h4>
                        <h4 class="h5 text-secondary text-light fw-semibold" id="visit-p"> Maitland FL 32751</h4>
                    </div>
                    
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">                     
                        <h5 class="text-light h4 py-2 text-center fst-italic" id="text-Contact"><i class="fa fa-phone" aria-hidden="true"></i> Phone Numbers:</h5>
                        <a  href="tel:4079511386">
                          <h4 class="h5 text-light fw-semibold" id="visit-p"> +1 (407) 951-1386</h4>
                        </a>
                        
                        <a  href="tel:4079511386">
                          <h4 class="h5 text-light fw-semibold" id="visit-p"> +1 (407) 951-1386</h4>
                        </a>

                    </div>
                    
                    <div class="col-12 pt-2 col-sm-12 col-md-6 col-lg-6">
                    <h5 class="text-light h4 text-center fst-italic" id="text-Contact"><i class="fa fa-envelope" aria-hidden="true"></i> Email:</h5>
                    <a href="mailto:jobs@spmconstructions.com">
                      <h4 class="h5 text-light fw-semibold pb-3" id="visit-p"> jobs@spmconstructions.com</h4>                     
                    </a>
                    </div>
                </div>
 
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.918909018602!2d-81.3975872229792!3d28.632192375665078!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e770fd549cb1bb%3A0x9ad924b582b60007!2s500%20Winderley%20Pl%2C%20Maitland%2C%20FL%2032751!5e0!3m2!1sen!2sus!4v1692369958068!5m2!1sen!2sus" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
    </div>
            

        
        <!--<form method="post">
          <div class="row mb-4">
            <div class="col">
              <div class="form-outline">
                <input type="text"  id="form-input" class="form-control" />
                <label class="form-label text-light fw-bold" for="form6Example1" id="form-index">First name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-outline">
                <input type="text"  id="form-input" class="form-control" />
                <label class="form-label text-light fw-bold" for="form6Example2" id="form-index">Last name</label>
              </div>
            </div>
          </div>
        
        
          <div class="form-outline mb-4">
            <input type="email" id="form-input"  class="form-control" />
            <label class="form-label text-light fw-bold" for="form6Example5" id="form-index">Email</label>
          </div>
        
          <div class="form-outline mb-4">
            <input type="number" id="form-input" class="form-control" />
            <label class="form-label text-light fw-bold" for="form6Example6" id="form-index">Phone</label>
          </div>
        
          <div class="form-outline mb-4">
            <textarea class="form-control"  id="form-input" rows="4"></textarea>
            <label class="form-label text-light fw-bold" for="form6Example7" id="form-index">Additional information</label>
          </div>

          <button type="submit" class="btn btn-block mb-4 w-100" id="submit">
            <p class="h4 m-0">Submit</p></button>
        </form> -->
  </div>
</div>
<!---/SECTION-->

<!---FOOTER-->
<div class="container-fluid bg-light">
  <div class="container" id="email-send">
    <footer class="pt-5">
      <div class="row">
        
              <div class="col-6 col-md-2 mb-3">
                  <h5 class="text-dark fw-bold fst-italic">Services</h5>
                  <ul class="nav flex-column">
                      <li class="nav-item mb-2 fw-semibold"><a href="carrers" class="nav-link p-0 text-muted">Contact Us</a></li>
                      <li class="nav-item mb-2 fw-semibold"><a href="carrers" class="nav-link p-0 text-muted">Get Quote</a></li>
                  </ul>
              </div>
              
              <div class="col-6 col-md-2 mb-3">
                  <h5 class="text-dark fw-bold fst-italic">Work With Us</h5>
                  <ul class="nav flex-column">
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Contact Us</a></li>
                  <li class="nav-item mb-2 fw-semibold"><a href="#" class="nav-link p-0 text-muted">Apply</a></li>
                  </ul>
              </div>
              
              <div class="col-md-6 offset-md-1 mb-3">
                  <form method="POST" <?php if(!empty($errors['email-send'])):?> action="form-input" <?php endif; ?>>
                      <h5>Get in touch</h5>
                      <p>Insert your email to contact you:</p>
                      <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <form method="POST">
                          <label for="newsletter1" class="visually-hidden">Email address</label>
                          <input id="form-input" id="newsletter1" type="text" class="form-control" name="email" placeholder="Email address">
                          <button class="btn" id='submit-email' type="submit"> <p class="fw-semibold m-0">Submit</p> </button>
                        </form>
                      </div>
                      <?php if(!empty($errors['email'])): ?>
                      <div id="form-contact" class="form-text text-danger fw-semibold"> First Name is Required</div>
                      <?php endif; ?>
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
                      <a href="mailto:jobs@spmconstructions.com">
                        <span class="fw-bold text-secondary">jobs@spmconstructions.com</span>
                      </a>
                    </p>
                  </div>
                  <div class="col-sm pr-3">
                    <p class="top">
                      <i class="fa fa-phone text-secondary"></i>
                      <a  href="tel:4079511386">
                      <span class="fw-bold text-secondary">+1 (407) 951-1386</span>
                      </a>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>     
    
    <!-- 
      <script src="assets/js/bootstrap.min.js"></script>     
      <script src="assets/js/jquery.js"></script>     
      <script src="assets/js/owl.carousel.min.js"></script>     
      
      <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    -->
    
  </body>
</html>


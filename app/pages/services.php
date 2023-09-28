
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
                  <span class="fw-bold">(407)-768-1231</span>
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
    <section class="mt-5">
      <div class="container">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 info-box my3" id="services">
                            <div>                  
                            <h5 id="subtitle">Masonry</h5>
                            <p class="text-justify" id="text">Masonry structures, ranging from heavy structural building walls to decorative finishes in CMU or Brick applications. Often decorative site walls and retaining walls are included in our scope.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="assets/img/gallery/masonry.webp"  class="rounded float-right" alt="">
            </div>
        </div>    
       
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 info-box my3" id="services">
                            <div>                  
                            <h5 id="subtitle">Concrete</h5>
                            <p class="text-justify" id="text">We specialize in all aspects of structural concrete, including foundations, slabs, poured-in-place and tilt-up wall construction, elevated post-tension slabs, slabs over metal pan decks, etc.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="assets/img/gallery/concrete.webp"  class="rounded float-right" alt="">
            </div>
        </div>

        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 info-box my3" id="services">
                            <div>                  
                            <h5 id="subtitle">Pavers</h5>
                            <p class="text-justify" id="text">SPM specializes in Brick Pavers maintenance and installation of driveways, pool decks, patios, walkways, fire pits, outdoor kitchens, and retaining walls.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="assets/img/gallery/pavers.webp"  class="rounded float-right" alt="">
            </div>
        </div>

        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 info-box my3" id="services">
                            <div>                  
                            <h5 id="subtitle">Demolition</h5>
                            <p class="text-justify" id="text">Our years of experience enable us to understand and anticipate our customers’ needs before they do. We specialize in demolition, excavating, grading, and rubble removal services.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="assets/img/gallery/demo.webp"  class="rounded float-right" alt="">
            </div>
        </div>
        
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 info-box my3" id="services">
                            <div>                  
                            <h5 id="subtitle">Out Door Design</h5>
                            <p class="text-justify" id="text">A beautiful outdoor space is a wonderful way to get the most use out of your property. Relaxing and Entertaining don’t have to be limited to within the four walls of your home. Many memories are created with friends and family in the backyard.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="assets/img/gallery/outdoor.webp"  class="rounded float-right" alt="">
            </div>
        </div>

        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-12 info-box my3" id="services">
                            <div>                  
                            <h5 id="subtitle">Landscaping</h5>
                            <p class="text-justify" id="text">SPM will provide service from plan development through the entire installation process. It is important to us that your outdoor investment is well managed with our hands-on approach as well as attention to detail.</p>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <img src="assets/img/gallery/landscape.webp"  class="rounded float-right" alt="">
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


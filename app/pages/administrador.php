<?php
if(!login_status())
{
//  redirect('login');
header('Location: /admin' );
}

$section = $url[1] ?? 'home';
          
//define the new action pages on Array
$action = $url[2] ?? 'view';

// id for edit and delete
$id = $url[3] ?? '0';

$filename = "../app/pages/admin/".$section.".php";
if(!file_exists($filename)){
  $filename = "../app/pages/admin/404.php";
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sunshine Project Management</title>
    <link rel="icon" type="image/x-icon" href="<?=ROUTE?>/assets/img/favicon.ico">

    <link rel="stylesheet" href="<?=ROUTE?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=ROUTE?>/assets/css/styles.css">
    <link href="<?=ROUTE?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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
        <a class="navbar-brand" href="<?=ROUTE?>"><span></span><img src="<?=ROUTE?>/assets/img/spmlogo_new.png" alt="" width="50px" height="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?=ROUTE?>" id="menu">Post Article</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?=ROUTE?>" id="menu">Post Jobs</a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?=ROUTE?>" id="menu">Post Projects</a>
            </li>

            <li class="nav-item">
              <a class="btn btn-brand" aria-current="page" href="<?=ROUTE?>" id="menu">Exit</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>

    <!---/NAVBAR-->



<section class="dashboard section">

        <?php
            //here is starts the crud
            require_once $filename;
          
        ?>

</section>


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
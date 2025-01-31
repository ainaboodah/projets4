<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Parking</title>

        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap-icons.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/apexcharts.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/tooplate-mini-finance.css');?>" rel="stylesheet">
<!--

Tooplate 2135 Mini Finance

https://www.tooplate.com/view/2135-mini-finance

Bootstrap 5 Dashboard Admin Template

-->

    </head>
    
    <body>
        <header class="navbar sticky-top flex-md-nowrap">
            <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
                <a class="navbar-brand" href="index.html">
                    Accueil
                </a>
            </div>

            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <form class="custom-form header-form ms-lg-3 ms-md-3 me-lg-auto me-md-auto order-2 order-lg-0 order-md-0" action="#" method="get" role="form">
                <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search">
            </form>
        </header>

        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-3 d-md-block sidebar collapse">
                    <div class="position-sticky py-4 px-3 sidebar-sticky">
                        <ul class="nav flex-column h-100">
                            <li class="nav-item">
                                <a class="nav-link active disabled" aria-current="page" href="<?php echo site_url('accueil');?>">
                                    Accueil
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('rendezvous');?>">
                                    Rendez-Vous
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('devis');?>">
                                    Devis
                                </a>
                            </li>
                            <!--

                            <li class="nav-item">
                                <a class="nav-link" href="profile.html">
                                    <i class="bi-person me-2"></i>
                                    Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="setting.html">
                                    <i class="bi-gear me-2"></i>
                                    Settings
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="help-center.html">
                                    <i class="bi-question-circle me-2"></i>
                                    Help Center
                                </a>
                            </li>

                            <li class="nav-item featured-box mt-lg-5 mt-4 mb-4">
                                <img src="images/credit-card.png" class="img-fluid" alt="">

                                <a class="btn custom-btn" href="#">Upgrade</a>
                            </li>

                            <li class="nav-item border-top mt-auto pt-2">
                                <a class="nav-link" href="#">
                                    <i class="bi-box-arrow-left me-2"></i>
                                    Logout
                                </a>
                            </li>
                            -->
                        </ul>
                    </div>
                </nav>

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0">Accueil</h1>

                        <small class="text-muted">Heure D'ouverture 8h a 18h</small>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-7 col-12">
                            <div class="custom-block custom-block-balance">
                                <small></small>

                                <h2 class="mt-2 mb-3">Type De Service</h2>

                                <div class="custom-block-numbers d-flex align-items-center">
                                    <span>Réparation simple</span>
                                    <span>Réparation standard</span>
                                    <span>Réparation complexe</span>
                                    <span>Entretien</span>

                                </div>

                                <div class="d-flex">
                                    <div>
                                        <small>Valid Date</small>
                                        <p>12/2028</p>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-block custom-block-exchange">
                                <h5 class="mb-4">Tarifs</h5>

                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img src="images/flag/united-states.png" class="exchange-image img-fluid" alt="">

                                        <div>
                                            <p>Réparation simple </p>
                                            <h6>150.000Ar</h6>
                                        </div>
                                    </div>

                                    <div class="ms-auto me-4">
                                        <small>Duré</small>
                                        <h6>1h</h6>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img src="images/flag/singapore.png" class="exchange-image img-fluid" alt="">

                                        <div>
                                            <p>Réparation standard</p>
                                            <h6>300.000AR</h6>
                                        </div>
                                    </div>

                                    <div class="ms-auto me-4">
                                        <small>Duré</small>
                                        <h6>2h</h6>
                                    </div>

                                </div>

                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img src="images/flag/united-kingdom.png" class="exchange-image img-fluid" alt="">

                                        <div>
                                            <p>Réparation complexe</p>
                                            <h6>800.000Ar</h6>
                                        </div>
                                    </div>

                                    <div class="ms-auto me-4">
                                        <small>Duré</small>
                                        <h6>8h</h6>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                    <div class="d-flex align-items-center">
                                        <img src="images/flag/australia.png" class="exchange-image img-fluid" alt="">

                                        <div>
                                            <p>Entretien</p>
                                            <h6>300.000Ar</h6>
                                        </div>
                                    </div>

                                    <div class="ms-auto me-4">
                                        <small>Duré</small>
                                        <h6>2h30</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--
                        <div class="col-lg-5 col-12">
                            <div class="custom-block custom-block-profile-front custom-block-profile text-center bg-white">
                                <div class="custom-block-profile-image-wrap mb-4">
                                    <img src="images/medium-shot-happy-man-smiling.jpg" class="custom-block-profile-image img-fluid" alt="">

                                    <a href="setting.html" class="bi-pencil-square custom-block-edit-icon"></a>
                                </div>

                                <p class="d-flex flex-wrap mb-2">
                                    <strong>Name:</strong>

                                    <span>Thomas Edison</span>
                                </p>

                                <p class="d-flex flex-wrap mb-2">
                                    <strong>Email:</strong>
                                    
                                    <a href="#">
                                        thomas@site.com
                                    </a>
                                </p>

                                <p class="d-flex flex-wrap mb-0">
                                    <strong>Phone:</strong>

                                    <a href="#">
                                        (60) 12 345 6789
                                    </a>
                                </p>
                            </div>

                            <div class="custom-block custom-block-bottom d-flex flex-wrap">
                                <div class="custom-block-bottom-item">
                                    <a href="#" class="d-flex flex-column">
                                        <i class="custom-block-icon bi-wallet"></i>

                                        <small>Top up</small>
                                    </a>
                                </div>

                                <div class="custom-block-bottom-item">
                                    <a href="#" class="d-flex flex-column">
                                        <i class="custom-block-icon bi-upc-scan"></i>

                                        <small>Scan & Pay</small>
                                    </a>
                                </div>

                                <div class="custom-block-bottom-item">
                                    <a href="#" class="d-flex flex-column">
                                        <i class="custom-block-icon bi-send"></i>

                                        <small>Send</small>
                                    </a>
                                </div>

                                <div class="custom-block-bottom-item">
                                    <a href="#" class="d-flex flex-column">
                                        <i class="custom-block-icon bi-arrow-down"></i>

                                        <small>Request</small>
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block custom-block-transations">
                                <h5 class="mb-4">Recent Transations</h5>

                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="images/profile/senior-man-white-sweater-eyeglasses.jpg" class="profile-image img-fluid" alt="">

                                        <div>
                                            <p>
                                                <a href="transation-detail.html">Daniel Jones</a>
                                            </p>

                                            <small class="text-muted">C2C Transfer</small>
                                        </div>
                                    </div>

                                    <div class="ms-auto">
                                        <small>05/12/2023</small>
                                        <strong class="d-block text-danger"><span class="me-1">-</span> $250</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap align-items-center mb-4">
                                    <div class="d-flex align-items-center">
                                        <img src="images/profile/young-beautiful-woman-pink-warm-sweater.jpg" class="profile-image img-fluid" alt="">

                                        <div>
                                            <p>
                                                <a href="transation-detail.html">Public Bank</a>
                                            </p>

                                            <small class="text-muted">Mobile Reload</small>
                                        </div>
                                    </div>

                                    <div class="ms-auto">
                                        <small>22/8/2023</small>
                                        <strong class="d-block text-success"><span class="me-1">+</span> $280</strong>
                                    </div>
                                </div>

                                <div class="d-flex flex-wrap align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="images/profile/young-woman-with-round-glasses-yellow-sweater.jpg" class="profile-image img-fluid" alt="">

                                        <div>
                                            <p><a href="transation-detail.html">Store</a></p>

                                            <small class="text-muted">Payment Received</small>
                                        </div>
                                    </div>

                                    <div class="ms-auto">
                                        <small>22/8/2023</small>
                                        <strong class="d-block text-success"><span class="me-1">+</span> $280</strong>
                                    </div>
                                </div>

                                <div class="border-top pt-4 mt-4 text-center">
                                    <a class="btn custom-btn" href="wallet.html">
                                        View all transations
                                        <i class="bi-arrow-up-right-circle-fill ms-2"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="custom-block primary-bg">
                                <h5 class="text-white mb-4">Send Money</h5>

                                <a href="#">
                                    <img src="images/profile/young-woman-with-round-glasses-yellow-sweater.jpg" class="profile-image img-fluid" alt="">
                                </a>

                                <a href="#">
                                    <img src="images/profile/young-beautiful-woman-pink-warm-sweater.jpg" class="profile-image img-fluid" alt="">
                                </a>

                                <a href="#">
                                    <img src="images/profile/senior-man-white-sweater-eyeglasses.jpg" class="profile-image img-fluid" alt="">
                                </a>

                                <div class="profile-rounded">
                                    <a href="#">
                                        <i class="profile-rounded-icon bi-plus"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-lg-12 col-12">
                                    <p class="copyright-text">Copyright © Mini Finance 2048 
                                    - Design: <a rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                                </div>

                            </div>
                        </div>
                    </footer> -->
                </main>

            </div>
        </div>

    </body>
</html>
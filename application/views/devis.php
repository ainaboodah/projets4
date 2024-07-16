<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Devis</title>

        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap-icons.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/apexcharts.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/tooplate-mini-finance.css');?>" rel="stylesheet">
        <style>
            button {
                cursor: pointer;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%; /* Full height to center the button vertically */
                width: 100%; /* Full width to center the button horizontally */
            }

            .center-button {
                background-color: #00000093; /* Light color for the button */
                padding: 1em;
                border: none;
                border-radius: 30px;
                font-weight: 600;
                color: #ffffff;
            }
        </style>
<!--

Tooplate 2135 Mini Finance

https://www.tooplate.com/view/2135-mini-finance

Bootstrap 5 Dashboard Admin Template

-->
    </head>
    
    <body>
        <header class="navbar sticky-top flex-md-nowrap">
            <div class="col-md-3 col-lg-3 me-0 px-3 fs-6">
                <a class="navbar-brand" href="Devis.html">
                    Devis
                </a>
            </div>



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
                                <a class="nav-link " aria-current="page" href="<?php echo site_url('accueil');?>">
                                    Accueil
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('rendezvous');?>">
                                    Rendez-Vous
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link active disabled" href="<?php echo site_url('devis');?>">
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
                        <h1 class="h2 mb-0">Devis</h1>
                    </div>
                    <form action="" name="devis_user">
                        <div class="row my-4">
                            <div class="col-lg-12 col-12">
                                <div class="custom-block custom-block-transation-detail bg-white">
    <!--eto mila any le details avany am base-->
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="custom-block-transation-detail-item mt-4">
                                            <h6>ID Devis</h6>

                                        </div>

                                        <div class="custom-block-transation-detail-item mt-4 mx-auto px-4">
                                            <h6>Type de Service</h6>

                                        </div>

                                        <div class="custom-block-transation-detail-item mt-4 ms-lg-auto px-lg-3 px-md-3">
                                            <h6>Heure</h6>

                                        </div>

                                        <div class="custom-block-transation-detail-item mt-4 ms-auto me-auto">
                                            <h6>Total</h6>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="" name="print_devis">
                        <div class="container">
                            <button class="center-button">Print Devis</button>
                        </div>
                    </form>
<!--
                    <footer class="site-footer">
                        <div class="container">
                            <div class="row">
                                
                                <div class="col-lg-12 col-12">
                                    <p class="copyright-text">Copyright © Mini Finance 2048 
                                    - Design: <a rel="sponsored" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
                                </div>

                            </div>
                        </div>
                    </footer>
                    -->
                </main>

            </div>
        </div>
    </body>
</html>
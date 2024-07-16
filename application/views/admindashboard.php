<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="Tooplate">

        <title>Mini Finance Dashboard Template</title>

        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/bootstrap-icons.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/apexcharts.css');?>" rel="stylesheet">

        <link href="<?php echo base_url('assets/css/tooplate-mini-finance.css');?>" rel="stylesheet">
        <style>
            #car-details {
                background-color: #f8f9fa;
                padding: 15px;
                border-radius: 5px;
            }
            
            #details-list {
                list-style-type: none;
                padding: 0;
            }
            
            #details-list li {
                margin-bottom: 10px;
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
                <a class="navbar-brand" href="admindashboard.html">
                    Admin Dashboard
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
                                <a class="nav-link active disabled" aria-current="page">
                                    Admin Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('listRdv'); ?>">
                                    Liste Des Rendez-Vous
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="configurationdate.html">
                                    Configuration Des Dates
                                </a>
                            </li>

                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('serviceadminview'); ?>">
                                    Services
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="adminfileinsert.html">
                                    Insert A File 
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo site_url('loginAsUserAdmin'); ?>">
                                    Login As User
                                </a>
                            </li>

                            <li class="nav-item border-top mt-auto pt-2">
                                <a class="nav-link" href="<?php echo site_url('logoutadmin'); ?>">
                                    Logout
                                </a>
                            </li>


                        </ul>
                    </div>
                </nav>

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0">DashBoard</h1>

                        <small class="text-muted">Bienvenue Dans Le DasbBoard</small>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-7 col-12">
                            <div class="custom-block custom-block-balance">
                                <small>Montant Total De Chiffre D'affaire</small>
                                <!--EXEMPLE-->
                                <h2 class="mt-2 mb-3">$254,800</h2>
                            </div>

                            <div class="custom-block bg-white">
                                <h5 class="mb-4">Historique De Transaction Non-Payés Et Payés</h5>
                                <!--ETO NY ATAO LE nonPAYE REHETRA ANATINA CHART-->
                                <div id="chart"></div>
                            </div>

                            <div class="custom-block custom-block-exchange">
                                <h5 class="mb-4">Chiffre D'affaire Par Type De Voiture</h5>

                                <select id="car-type-select" class="form-control mb-4">
                                    <!--MAKA ANY AM BASE NY TYPE DE VOITURE REHETRA FA EXEMPLE FTSN REO-->
                                    <option value="" selected disabled>Selectionner le type de voiture</option>
                                    <option value="sedan">Sedan</option>
                                    <option value="suv">SUV</option>
                                    <option value="truck">Truck</option>
                                    
                                </select>
                                <button type="submit" class="btn btn-primary">Afficher</button>
                            </div>
                            <div class="custom-block custom-block-exchange">
                                <h5 class="mb-4">Nombre De Voiture Traité Par Jour</h5>
                                <form action="<?php echo site_url('admin/display_car_counts'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="start_date">Date de Début</label>
                                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">Date de Fin</label>
                                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Afficher</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
        </div>
    </body>
</html>
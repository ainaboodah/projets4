<?php if (isset($admin_id)) { ?>
    <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Tooplate">
        <title>DashBoard</title>
        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-icons.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/apexcharts.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/tooplate-mini-finance.css'); ?>" rel="stylesheet">
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
                                <a class="nav-link" aria-current="page" href="<?php echo site_url('admin/dashboard') ?>">
                                    Admin Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo site_url('welcome/login') ?>">
                                    Login As User
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('admin/to_rdv') ?>">
                                    Liste Des Rendez-Vous
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('admin/payment') ?>">
                                    Devis
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('admin/datereference') ?>">
                                    Configuration Des Dates
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('admin/get_services') ?>">
                                    Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo site_url('admin/import') ?>">
                                    Import Service et travaux
                                </a>
                            </li>
                            <li class="nav-item border-top mt-auto pt-2">
                                <a class="nav-link" href="<?php echo site_url('admin/logout') ?>">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
<?php } else { ?>
    
<?php } ?>

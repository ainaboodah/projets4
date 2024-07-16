<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rendez-Vous</title>

        <!-- CSS FILES -->      
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@300;400;700&display=swap" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap-icons.css');?>" rel="stylesheet">
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
                <a class="navbar-brand" href="rendezvous.html">
                    Rendez-Vous
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
                                <a class="nav-link" aria-current="page" href="<?php echo site_url('accueil');?>">
                                    Accueil
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link active disabled" href="<?php echo site_url('rendezvous');?>">
                                    Rendez-Vous
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo site_url('devis');?>">
                                    Devis
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </nav>

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0">Rendez-Vous</h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-7 col-12">
                            <div class="custom-block bg-white">

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                        <h6 class="mb-4">Rendez-Vous</h6>

                                        <form class="custom-form profile-form" action="<?php echo site_url('takeRdv'); ?>" method="get" role="form" name="rendezvous">
                                            <p>Choix de Date</p>
                                            <input class="form-control" type="date" name="daty" id="profile-name">
                                            <p>Heure de Debut</p>
                                            <input class="form-control" type="number" name="heure" id="profile-name" placeholder="1h" min="0" max="23">
                                            <p>Type de Service</p>
                                            <select class="form-control" name="typeservice" id="profile-service">
                                                <?php foreach($services as $service): ?>
                                                    <option value="<?php echo $service['id_service']; ?>"><?php echo $service['nom']; ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <div class="d-flex">
                                                <button type="button" class="form-control me-3" name="supp">
                                                    Supprimer
                                                </button>

                                                <button type="submit" class="form-control ms-2" name="valid_rendezvous">
                                                    Valider
                                                </button>
                                            </div>
                                        </form>
                                    </div>  
                                </div>
                            </div>
                        </div>
                </main>

            </div>
        </div>
    </body>
</html>
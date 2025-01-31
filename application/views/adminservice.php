<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>Services</title>

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
                    Service
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
                                <a class="nav-link" aria-current="page" href="<?php echo site_url('admindashbord'); ?>">
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
                                <a class="nav-link active" href="adminservice.html">
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
                        <h1 class="h2 mb-0">Services</h1>
                    </div>

                    <main
	class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start"
>
	<div class="title-group mb-3">
		<h1 class="h2 mb-0">Services</h1>
	</div>

	<div class="row my-4">
		<div class="col-lg-12 col-12">
			<div class="custom-block bg-white">
				<h5 class="mb-4">Liste rdv</h5>
				<form action="">
					<div class="table-responsive">
						<table class="account-table table">
							<thead>
								<tr>
									<th scope="col">ID Devis</th>

									<th scope="col">Type De Service</th>

									<th scope="col">Heure</th>

									<th scope="col">Total</th>

									<th scope="col">Numero Voiture</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<!--exemple mila ovaina-->
									<td>1</td>
									<td>10:00</td>
									<td>Wash</td>
									<td>AB123CD</td>
									<td>5</td>
									<td>$20</td>
									<td><button class="btn btn-primary">Payer</button></td>
								</tr>
							</tbody>
						</table>
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-12 col-12">
			<div class="custom-block bg-white">
				<h5>Suppression Des Donnees De Base</h5>

				<div>
					<p>Boutton pour supprimer les donnees du base</p>

					<div class="d-flex">
						<a href="<?php echo site_url('admin/reset_bdd'); ?>">
							<button type="button" class="form-control me-3" name="supbase">
								supprimer
							</button>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-12 col-12">
			<div class="custom-block bg-white">
				<h5 class="mb-4">Services</h5>
				<form action="">
					<div class="table-responsive">
					<?php if (isset($table)) : ?>
						<div class="account-table table">
							<?php echo $table; ?>
						</div>
					<?php else: ?>
						<p>No services found.</p>
					<?php endif; ?>
						<!-- <table class="account-table table">
							<thead>
								<tr>
									<th scope="col">ID</th>

									<th scope="col">Type De Service</th>

									<th scope="col">Montant</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									exemple mila ovaina-->
									<!-- <td>1</td>
									<td>Service Simple</td>
									<td>AB123CD</td>
									<td>$20</td>
									<td>
										<button class="btn btn-primary">editer</button
										><button class="btn btn-primary">Supprimer</button>
									</td>
								</tr>
							</tbody>
						</table> --> 
					</div>
				</form>
			</div>
		</div>

		<div class="col-lg-7 col-12">
			<div class="custom-block custom-block-balance">
				<p>Insert Service</p>
				<form action="" name="insertservice">
					<div>
						<p>ID</p>
						<input
							class="form-control"
							type="Text"
							name="profile-name"
							id="profile-name"
						/>
						<p>Type De Service</p>
						<input
							class="form-control"
							type="Text"
							name="profile-name"
							id="profile-name"
						/>
						<p>Total</p>
						<input
							class="form-control"
							type="Number"
							name="profile-email"
							id="profile-email"
						/>

						<div class="d-flex">
							<button type="button" class="form-control me-3" name="add">
								Ajouter
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

                </main>

            </div>
        </div>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/apexcharts.min.js"></script>
        <script src="js/custom.js"></script>
    </body>
</html>
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

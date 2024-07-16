<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
    <div class="title-group mb-3">
        <h1 class="h2 mb-0">List Des Devis</h1>
    </div>
    <div class="row my-4">
		<div class="col-lg-12 col-12">
			<div class="custom-block bg-white">
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
									<td><a href="<?php base_url('admin/confirm_paiement') ?>"><button class="btn btn-primary">Payer</button></a></td>
								</tr>
							</tbody>
						</table>
					</div>
			</div>
		</div>
</main>
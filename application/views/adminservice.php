<main
	class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start"
>
	<div class="title-group mb-3">
		<h1 class="h2 mb-0">Services</h1>
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
				<div class="table-responsive">
    <table class="account-table table">
        <thead>
            <tr>
                <th scope="col">Type De Service</th>
                <th scope="col">Duree</th>
                <th scope="col">Prix</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
            <tr>
                <td><?php echo $service->nom; ?></td>
                <td><?php echo $service->duree; ?></td>
                <td><?php echo $service->prix; ?></td>
                <td>
                    <a href="<?php echo site_url('admin/edit_service/' . $service->id_service); ?>" class="btn btn-primary">Editer</a>
                    <a href="<?php echo site_url('admin/delete_service/' . $service->id_service); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table> 
</div>
			</div>
		</div>

		<div class="col-lg-7 col-12">
			<div class="custom-block custom-block-balance">
				<p>Insert Service</p>
				<?php echo form_open('admin/create_service') ?>
					<div>
						<p>Type De Service</p>
						<input
							class="form-control"
							type="Text"
							name="nom"
							id="profile-name"
						/>
						<p>Duree en h</p>
						<input
							class="form-control"
							type="Number"
							name="duree"
							id="profile-email"
						/>
						<p>Prix</p>
						<input
							class="form-control"
							type="Number"
							name="prix"
							id="profile-email"
						/>
						<div class="d-flex">
							<button type="button" class="form-control me-3" name="add">
								Ajouter
							</button>
						</div>
					</div>
				<?php echo form_close() ?>
			</div>
		</div>
	</div>
</main>

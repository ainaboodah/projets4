<main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
	<div class="title-group mb-3">
		<h1 class="h2 mb-0">Settings</h1>
	</div>
<?php echo $admin_id ?>
	<div class="row my-4">
		<div class="col-lg-7 col-12">
			<div class="custom-block bg-white">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
						<h6 class="mb-4">Insert File</h6>
						<?php echo form_open_multipart('admin/do_import'); ?>
						<!-- <form class="custom-form profile-form" action="#" method="post" role="form"> -->
							<div class="input-group mb-1">
								<p>Service Csv</p>
								<div>
									<input type="file" class="form-control" id="inputGroupFile02" placeholder="Services" name="services" accept=".csv"/>
								</div>
							</div>
							<div class="input-group mb-1">
								<p>Traveaux Csv</p>
								<div>
									<input type="file" class="form-control" id="inputGroupFile02" placeholder="Traveaux" name="travaux" accept=".csv" />
								</div>
							</div>

							<div class="d-flex">
								<button type="reset" class="form-control me-3">
									Supprimer
								</button>

								<button type="submit" class="form-control ms-2">Ajouter</button>
							</div>
							<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
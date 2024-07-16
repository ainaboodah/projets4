

                <main class="main-wrapper col-md-9 ms-sm-auto py-4 col-lg-9 px-md-4 border-start">
                    <div class="title-group mb-3">
                        <h1 class="h2 mb-0">Configuration Des Dates </h1>
                    </div>

                    <div class="row my-4">
                        <div class="col-lg-7 col-12">
                            <div class="custom-block bg-white">

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                        <h6 class="mb-4">Dates</h6>
                                        <?php echo form_open('admin/set_reference', array('class' => 'custom-form profile-form')) ?>
                                            <p>Configurer une date</p>
                                            <input class="form-control" type="date" name="dateref" id="profile-name">
                                            <div class="d-flex">
                                                <button type="reset" class="form-control me-3" >
                                                    Supprimer
                                                </button>

                                                <button type="submit" class="form-control ms-2">
                                                    Valider
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                </main>

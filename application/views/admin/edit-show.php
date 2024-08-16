<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Show Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="editshow" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <input type="hidden" name="id" value="<?= $show['id'] ?>">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">EXHIBITIONS NAME *</label>
                                    <input class="form-control" type="text" name="name" id="name" value="<?= $show['name'] ?>" required>
                                    <?=form_error('name', '<p class="help-block">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="date">EXHIBITIONS DATE *</label>
                                    <input class="form-control" type="text" name="date" id="date" value="<?=$show['date']; ?>" required>
                                    <?=form_error('date', '<p class="help-block">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="venue">EXHIBITIONS VENUE *</label>
                                    <input class="form-control" type="text" name="venue" id="venue" value="<?=$show['venue']; ?>" required>
                                    <?=form_error('venue', '<p class="help-block">', '</p>'); ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="booth">EXHIBITIONS BOOTH NO *</label>
                                    <input class="form-control" type="text" name="booth" id="booth" value="<?=$show['booth']; ?>" required>
                                    <?=form_error('booth', '<p class="help-block">', '</p>'); ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Submit</button>
                        </div>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php $this->load->view('admin/footer'); ?>
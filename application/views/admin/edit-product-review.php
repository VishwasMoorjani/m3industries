<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Review Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <input type="hidden" name="id" value="<?php echo $review['id']; ?>">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Review Title *</label>
                                    <input class="form-control" type="text" name="name" value="<?= $review['name'] ?>" id="name" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="rating">Rating</label>
                                    <input class="form-control" type="number" name="rating" min="1" max="5" value="<?= $review['rating'] ?>" id="rating" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <label for="review">Review</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea class="form-control" name="review"><?= $review['review'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary mt-5">Submit</button>
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
<script>
    CKEDITOR.replace('review');
</script>
<?php $this->load->view('admin/footer'); ?>
<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Category Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="addsubcategory" enctype="multipart/form-data">
                <input type="hidden" name="parent" value="products">
                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Category Title *</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                                
                            </div>
                            <!--<div class="col-12 col-sm-6 mt-3 mt-sm-0">-->
                            <!--    <div class="input-group input-group-static m-2">-->
                            <!--        <label for="category">Parent Category</label>-->
                            <!--        <select class="form-control" id="" name="parent">-->
                            <!--            <option value="">Select Category</option>-->
                            <!--            <?php foreach ($categories as $category) { ?>-->
                            <!--                <option value="<?=$category['link'] ?>"><?=$category['name'] ?></option>-->
                            <!--            <?php  } ?>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Images</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="image" accept="image/*" required />
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg success">' . $_SESSION['error_msg'] . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </div>
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
<script>
    dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
        evt.preventDefault();
    };

    dropContainer.ondrop = function(evt) {
        // pretty simple -- but not for IE :(
        images.files = evt.dataTransfer.files;

        // If you want to use some of the dropped files
        const dT = new DataTransfer();
        dT.items.add(evt.dataTransfer.files[0]);
        dT.items.add(evt.dataTransfer.files[3]);
        images.files = dT.files;

        evt.preventDefault();
    };
</script>
<?php $this->load->view('admin/footer'); ?>
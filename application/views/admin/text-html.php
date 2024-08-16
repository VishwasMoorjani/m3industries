<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Text To HTML</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            
        <form method="post">
            <label>Text</label>
            <textarea class="form-control" name="description" id="text"></textarea>
            <br/>
            <label>HTML</label>
            <textarea cols="140" id="html"><?=isset($_POST['description'])?$_POST['description']:''?></textarea>
            <button class="btn btn-primary" onclick="converttohtml()">Submit</button>
        </form>
        </div>        
    </div>
</div>

<script>
    CKEDITOR.replace('description');
    CKEDITOR.config.width = '100%';
</script>
<?php $this->load->view('admin/footer'); ?>
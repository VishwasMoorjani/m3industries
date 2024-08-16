<?php include("head.php"); ?>
<?php include("header.php"); ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- Card header -->
        <div class="card-header pb-0">
          <div class="d-lg-flex">
            <div>
              <h5 class="mb-0">All Products</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="addproducts" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Product</a>
                 <!-- <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#import">
                  Import
                </button> -->
                <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog mt-lg-10">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                        <a class="btn btn-outline-primary btn-sm mb-0" href="<?=base_url('admin/exportexcel');?>">Download Sample Excel</a>
                      </div>
                      <?php echo form_open_multipart('admin/import',array('name' => 'spreadsheet')); ?>
                      <div class="modal-body">
                        <p>You can browse your computer for a file.</p>
                        <div class="input-group input-group-dynamic mb-3">
                          <!--<label class="form-label">Browse file...</label>-->
                          <input type="file" class="form-control" name="upload_file" onfocus="focused(this)" onfocusout="defocused(this)" required>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="importCheck" checked="">
                          <label class="custom-control-label" for="importCheck">I accept the terms and conditions</label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn bg-gradient-primary btn-sm">Upload</button>
                        <button type="button" class="btn bg-gradient-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                      </div>
                      <?php echo form_close();?>
                    </div>
                  </div>
                </div>
                <!-- <a href="<?=base_url('admin/exportproducts');?>" class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1">Export</a> -->
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="products-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Publish</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($products as $product) { ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <a href="<?=base_url('product/').$product['link'];?>" target="_blank"><img src="<?= base_url('assets/front/images/' . $product['featured_image']) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"></a>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $product['name']; ?></h6>
                          <!-- <p class="text-xs text-secondary mb-0">john@creative-tim.com</p> -->
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $product['category']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">₹ <?= $product['saleprice']; ?></p>
                      <p class="text-xs text-secondary mb-0"><strike>₹ <?= $product['price']; ?></strike></p>
                      <p class="text-xs mb-0" style="color:#f00"><?= $product['discount']; ?>% off</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $product['quantity']; ?></p>
                    </td>                    
                    <td class="align-middle text-center text-sm">
                      <?php if ($product['status'] == 1) { ?>
                        <a href="<?= base_url('admin/deactivate/product/' . $product['link']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($product['status'] == 0) { ?>
                        <a href="<?= base_url('admin/activate/product/' . $product['link']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?= date("F j, Y", strtotime($product['date_added'])); ?></span>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('admin/addimages/' . $product['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fa fa-file-image"></i>Images
                      </a>&nbsp;
                      <a href="<?= base_url('admin/editproduct/' . $product['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('admin/delete/product/' . $product['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</main>



<?php include("footer.php"); ?>

<!--   Core JS Files   -->
<script>
  if (document.getElementById('products-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
      searchable: true,
      fixedHeight: false,
      perPage: 20
    });

    // document.querySelectorAll(".export").forEach(function(el) {
    //   el.addEventListener("click", function(e) {
    //     var type = el.dataset.type;

    //     var data = {
    //       type: type,
    //       filename: "material-" + type,
    //     };

    //     if (type === "csv") {
    //       data.columnDelimiter = ",";
    //     }

    //     dataTableSearch.export(data);
    //   });
    // });
  };
</script>
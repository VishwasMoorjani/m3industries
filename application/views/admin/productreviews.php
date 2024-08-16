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
              <h5 class="mb-0">All Product Reviews</h5>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="reviews-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Review</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Publish</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($reviews as $review) { ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $review['name']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                        <?= $review['rating']; ?>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <?php if ($review['status'] == 1) { ?>
                        <a href="<?= base_url('admin/deactivate/productreviews/' . $review['id']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($review['status'] == 0) { ?>
                        <a href="<?= base_url('admin/activate/productreviews/' . $review['id']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo date("F j, Y", strtotime($review['date'])); ?></span>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('admin/editproductreviews/' . $review['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('admin/delete/productreviews/' . $review['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
  if (document.getElementById('reviews-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#reviews-list", {
      searchable: true,
      fixedHeight: false,
      perPage: 20
    });

    document.querySelectorAll(".export").forEach(function(el) {
      el.addEventListener("click", function(e) {
        var type = el.dataset.type;

        var data = {
          type: type,
          filename: "material-" + type,
        };

        if (type === "csv") {
          data.columnDelimiter = ",";
        }

        dataTableSearch.export(data);
      });
    });
  };
</script>
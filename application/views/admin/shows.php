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
              <h5 class="mb-0">All Shows</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="addshow" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Show</a>
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="shows-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">EXHIBITIONS NAME</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">EXHIBITIONS DATE</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">VENUE</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">BOOTH NO.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($shows as $show) { ?>
                  <tr>
                    <td>
                        <?=$i++?>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?=$show['name']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?=$show['date']; ?></p>
                    </td>
                    <td>
                    <p class="text-xs font-weight-bold mb-0"><?=$show['venue'];?></p>
                    </td> 
                    <td>
                    <p class="text-xs font-weight-bold mb-0"><?=$show['booth'];?></p>
                    </td> 
                    <td class="align-middle text-center text-sm">
                      <?php if ($show['status'] == 1) { ?>
                        <a href="<?= base_url('admin/deactivate/shows/' . $show['id']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($show['status'] == 0) { ?>
                        <a href="<?= base_url('admin/activate/shows/' . $show['id']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('admin/editshow/' . $show['name']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('admin/delete/shows/' . $show['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                      </a>
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
  if (document.getElementById('shows-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#shows-list", {
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
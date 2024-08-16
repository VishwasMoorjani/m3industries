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
              <h5 class="mb-0">All Orders</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="orders-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Total Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Method</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Order</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($orders as $order) { ?>
                  <tr>
                    <td>
                        <?=$i++?>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?=$order['order_id']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?=$order['userName']; ?></p>
                      <p class="text-xs text-secondary mb-0"><?=$order['userEmail']; ?></p>
                    </td>
                    <td>
                    <p class="text-xs font-weight-bold mb-0"><?=($order['currency'] == 'USD')?'₹ ':'₹ ';?> <?=$order['totalAmount']; ?></p>
                    </td> 
                    <td>
                    <p class="text-xs font-weight-bold mb-0"><?=$order['paymentMethod']; ?></p>
                    </td>
                    <td>
                    <p class="text-xs font-weight-bold mb-0"><?=$order['status']; ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=date("F j, Y",strtotime($order['order_date'])); ?></span>
                    </td>
                    <td class="align-middle">
                      <a href="<?=base_url('admin/orderdetails/'. $order['order_id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-eye"></i>View
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
  if (document.getElementById('orders-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#orders-list", {
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
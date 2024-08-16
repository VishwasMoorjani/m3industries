<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Sales (in ₹)</p>
              <h5 class="font-weight-bolder mb-0">
                ₹ <?php echo(number_format((float)$totalsales, 2)); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Customers</p>
              <h5 class="font-weight-bolder mb-0">
              <?php echo($customer); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Products</p>
              <h5 class="font-weight-bolder mb-0">
              <?php echo($totalproducts); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Category</p>
              <h5 class="font-weight-bolder mb-0">
                <?php echo($totalcategory); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Sub Category</p>
              <h5 class="font-weight-bolder mb-0">
              <?php echo($totalsubcategory); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Total Orders</p>
              <h5 class="font-weight-bolder mb-0">
              <?php echo($totalorders); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>    
    <div class="col-sm-4 mt-4">
      <div class="card">
        <div class="card-body p-3 position-relative">
          <div class="row">
            <div class="col-7 text-start">
              <p class="text-sm mb-1 text-capitalize font-weight-bold">Today Orders</p>
              <h5 class="font-weight-bolder mb-0">
              <?php echo($todayorders); ?>
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Top Selling Products</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Value</th>
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">QR</th> -->
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($products as $product){ ?>
                
                <tr>
                  <td>
                    <div class="d-flex px-3 py-1">
                      <div>
                        <img src="<?=base_url('assets/front/images/'. $product['featured_image']) ?>" class="avatar me-3" alt="image">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?=$product['name']; ?></h6>
                        <!-- <p class="text-sm font-weight-normal text-secondary mb-0"><span class="text-success">8.232</span> orders</p> -->
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm font-weight-normal mb-0">₹ <?=$product['price']; ?></p>
                  </td>
                  <!-- <td class="align-middle text-center text-sm">
                    <div>
                        <img src="<?=base_url('assets/front/img/qr/'. $product['qrimage']) ?>" class="avatar me-3" style= "border-radius:0px;" alt="image">
                      </div>
                  </td> -->
                  <td class="align-middle text-end">
                    <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                      <p class="text-sm font-weight-normal mb-0"><?=$product['category']; ?></p>
                    </div>
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
<?php $this->load->view('admin/footer'); ?>
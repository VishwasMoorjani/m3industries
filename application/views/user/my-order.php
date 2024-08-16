<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php');?>




  <!-- orderaa -->

  <section id="orderaa">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <ul class="contacttab list-unstyled">
            <li><a href="my-account.php">My Account</a></li>
            <li class="active"><a href="my-order.php">My Orders</a></li>
            <li><a href="my-wishlist.php">Wishlist</a></li>
            <li><a href="login.php">Log Out</a></li>
          </ul>
        </div>


        <div class="col-md-8">
          <h4>Orders History</h4>

          <div class="table-responsive">
            <table class="table ">
              <thead class="table-light">
                <tr style="text-align: center;">
                  <th>Order Id</th>
                  <th>Date</th>
                  <th>Payment Status</th>
                  <th>Total Amount</th>
                  <th>Order Status</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <tr style="text-align: center;">
                  <td>1</td>
                  <td>May 10, 2018</td>
                  <td>Completed</td>
                  <td>₹174025.00 For 1 Item</td>
                  <td>Kurta</td>
                  <td><a href="order-list.php" class="vivee">View</a></td>

                </tr>

                <tr style="text-align: center;">
                  <td>2</td>
                  <td>May 10, 2018</td>
                  <td>Processing</td>
                  <td>₹174017.00 For 1 Item</td>
                  <td>Kurta</td>
                  <td><a href="order-list.php" class="vivee">View</a></td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>


      </div>
    </div>

  </section>



  <!-- footer -->

  <?php include('footer.php');?>
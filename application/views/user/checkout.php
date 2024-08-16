<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php');?>




<!-- checkou -->
  <section id="checkou">
    <div class="container">
      <h2>CHECKOUT</h2>
    </div>
  </section>


  <!-- checoct -->
  <section id="checoct">
    <div class="container">
      <div class="row checoctmn">

        <div class="col-md-7">
          <div class="checoctinr">
            <h3>SHIPPING DETAILS</h3>

            <form class="from row g-3 needs-validation" novalidate>
              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Country</label>
                <select class="form-select" id="validationCustom04" required>
                  <option selected disabled value="">Select Country</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
              </div>

              <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>


              <div class="col-md-6">
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>


              <div class="col-md-3">
                <label for="validationCustom05" class="form-label">State</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">

                </div>
              </div>
              <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>

              <button class="btn btn6" type="submit">Save Shipping Address</button>


            </form>


          </div>
        </div>


        <div class="col-md-5">
          <div class="checoctinra">


            <h3>REVIEW YOUR ORDER</h3>

            <div class="table-responsive">
              <table>

                <thead>

                  <tr>
                    <th>PRODUCT</th>
                    <th></th>
                    <th>AMOUNT</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><img src="assets/front/imagesproduct1.jpg" alt=""></td>
                    <td><span class="moon">FAB STREETS Rayon <br>Peplum Kurta Dupatta</span> <span class="qty">QTY:
                        15</span></td>
                    <td>₹1099</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="table-responsive mt-4">
              <table>
                <tbody>
                  <tr>
                    <th class="wiiii">SUBTOTAL</th>
                    <td>₹1850</td>
                  </tr>

                  <tr>
                    <th class="wiiii">SHIPPING CHARGES</th>
                    <td>₹1450</td>
                  </tr>

                  <tr>
                    <th class="wiiii">GRAND TOTAL</th>
                    <td>₹1740</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <a href="#" class="pay">PAY NOW </a>


          </div>
        </div>

      </div>
    </div>
  </section>

  <section id="checocta">
    <div class="container">
      <div class="row">

        <div class="col-md-7">
          <div class="checoctinr">
            <h3>BILLING DETAILS</h3>


            <form class="from row g-3 needs-validation" novalidate>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Same as Shipping address
                </label>
              </div>



              <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Country</label>
                <select class="form-select" id="validationCustom04" required>
                  <option selected disabled value="">Select Country</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                  <option>Albania</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid state.
                </div>
              </div>

              <div class="col-md-12">
                <label for="validationCustom03" class="form-label">Address</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>


              <div class="col-md-6">
                <label for="validationCustom03" class="form-label">City</label>
                <input type="text" class="form-control" id="validationCustom03" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>


              <div class="col-md-3">
                <label for="validationCustom05" class="form-label">State</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">

                </div>
              </div>
              <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Mobile</label>
                <input type="text" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>

              <div class="col-md-6">
                <label for="validationCustom05" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom05" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>

              <button class="btn btn6" type="submit">Save Billing Address</button>


            </form>


          </div>
        </div>
      </div>

    </div>
  </section>



  <!-- footer -->
  <?php include('footer.php');?>
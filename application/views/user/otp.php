
<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php');?>
  
 

   <!-- otp -->
   <section id="otp">
    <div class="container">
      <h2>ENTER YOUR OTP</h2>
      <p>Please enter your otp:</p>

      <form class="mb-3 row justify-content-center">
        <div class="col-12">
          <input type="otp" name="otp" placeholder="Enter otp" class="form-control" required>
        </div>

        <div class="col-12">
          <a href="password.php" class="view w-100" >Submit</a>
          <!-- <button type="submit" class="view w-100" name="submit">Submit</button> -->
        </div>
      </form>

      <!-- <p>Remember your password? <a href="login.php">Back to login</a></p> -->

    </div>
  </section>



  <?php include('footer.php');?>
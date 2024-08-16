<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php');?>



  <!-- register -->
  <section id="register">
    <div class="container">
      <h2>REGISTER</h2>
      <p>Please fill in the information below:</p>

      <form class="mb-3 row justify-content-center">
        <div class="col-12">
          <input type="name" name="name" placeholder="Name" class="form-control" required>
        </div>

        <div class="col-12">
          <input type="number" min="1000000000" max="9999999999" name="mobile" placeholder="Phone" class="form-control" required>
        </div>

        <div class="col-12">
          <input type="email" name="email" placeholder="Email" class="form-control" required>
        </div>

        <div class="col-12">
          <input type="password" name="password" placeholder="password" class="form-control" required>
        </div>

        <!-- <div class="forgot"><a href="#">Forgot password?</a></div> -->

        <div class="col-12">
          <button type="submit" class="view w-100" name="submit">Create my account</button>
        </div>
      </form>

      <p>have an account ? <a href="<?=base_url('user/login');?>">Log in</a></p>

      <!-- <ul class="list-unstyled">
        <li class="justify-content-between d-flex align-items-center facebook">
          <a href="#">Sign in with Facebook</a> <i class="fa-brands fa-facebook-f"></i>
        </li>
        <li class="justify-content-between d-flex align-items-center google">
          <a href="#">Sign in with Google</a> <i class="fa-brands fa-google"></i>
        </li>
        <li class="justify-content-between d-flex align-items-center twitter ">
          <a href="#">Sign in with Twitter</a> <i class="fa-brands fa-twitter"></i>
        </li>
      </ul> -->

    </div>
  </section>


  <!-- footer -->

  <?php include('footer.php');?>
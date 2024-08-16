<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php');?>



 <!-- forgot -->
  <section id="forgot">
    <div class="container">
      <h2>RECOVER PASSWORD</h2>
      <p>Please enter your email:</p>

      <form class="mb-3 row justify-content-center">
        <div class="col-12">
          <input type="email" name="email" placeholder="Email" class="form-control" required>
        </div>

        <div class="col-12">
          <!-- <button type="submit" class="view w-100" name="submit">Recover</button> -->
          <button class="view w-100" type="submit" name="">Recover</button>
        </div>
      </form>

      <p>Remember your password? <a href="<?=base_url('user/login');?>" class="back">Back to login</a></p>

    </div>
  </section>


  <!-- footer -->

  <?php include('footer.php');?>
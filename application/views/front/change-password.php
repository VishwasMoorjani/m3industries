<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php'); ?>

<section class="wpo-page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="wpo-breadcumb-wrap">
                    <h2>New Password</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>New Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="otp-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="image-contain">
                    <img src="<?=base_url('assets/front/images/login.png');?>" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="sendotp">
                    <div class="log-in-box">

                        <div class="log-in-title">
                            <h3>Make a new password</h3>
                        </div>

                        <div class="input-box">
                            <form action="login.php" method="post">
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <div class="input-group">
                                            <input type="password" name="new-pass" id="newpass" class="form-control"
                                                placeholder="Enter New Password">
                                            <button type="button" class="input-group-text"
                                                onclick="togglePasswordVisibility('newpass')">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <div class="input-group">
                                            <input type="password" name="confirm-pass" id="confirmpass"
                                                class="form-control" placeholder="Enter Confirm Password">
                                            <button type="button" class="input-group-text"
                                                onclick="togglePasswordVisibility('confirmpass')">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="submit" class="theme-btn">Verify</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('footer.php');?>
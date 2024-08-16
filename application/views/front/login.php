<?php
$title = "M3 Industries";
$description = "";
$keyword = "";
include('header.php'); ?>





<div class="wpo-login-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form class="login wpo-accountWrapper" action="#">

                    <div class="wpo-accountForm form-style">
                        <div class="fromTitle">
                            <h2>Login</h2>
                            <p>Sign into your pages account</p>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <label>Email</label>
                                <input type="text" id="email" name="email" placeholder="demo@gmail.com">
                            </div>
                            <div class="mb-3 col-lg-12 col-md-12 col-12">
                                <div class="input-group">
                                    <input type="password" name="confirm-pass" id="confirmpass" class="form-control" placeholder="Enter Confirm Password">
                                    <button type="button" class="input-group-text" onclick="togglePasswordVisibility('confirmpass')">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="check-box-wrap">
                                    <div class="input-box">
                                        <input type="checkbox" id="fruit4" name="fruit-4" value="Strawberry">
                                        <label for="fruit4">Remember Me</label>
                                    </div>
                                    <div class="forget-btn">
                                        <a href="forgot.php">Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                                <button type="submit" class="wpo-accountBtn">Login</button>
                            </div>
                        </div>

                        <p class="subText">Don't have an account? <a href="register.php">Create free account</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('footer.php');?>
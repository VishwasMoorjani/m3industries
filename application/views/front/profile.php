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
                    <h2>Verify Code</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>Verify Code</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="section profile-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <!-- My Account Menu Start -->
                <div class="my-account-menu mt-6">

                    <div class="profile-box">
                        <div class="cover-image">
                            <img src="<?=base_url('assets/front/images/user-cover-img.jpg');?>" class="img-fluid blur-up lazyload" alt="">
                        </div>
                        <div class="profile-contain">
                            <div class="profile-image">
                                <div class="position-relative">
                                    <img src="<?=base_url('assets/front/images/user-pic.jpg');?>" class="blur-up lazyload update_img" alt="">
                                    <div class="cover-icon">
                                        <i class="fa fa-pencil" aria-hidden="true">
                                            <input type="file" onchange="readURL(this,0)">
                                        </i>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-name">
                                <h3>Neeta</h3>
                                <h6 class="text-content">neeta@gmail.com</h6>
                            </div>
                        </div>
                    </div>

                    <ul class="nav account-menu-list flex-column">
                        <li>
                            <a class="active" data-bs-toggle="pill" href="#pills-dashboard"><i
                                    class="fa fa-tachometer"></i> Dashboard</a>
                        </li>
                        <!-- <li>
                            <a data-bs-toggle="pill" href="#pills-orderhistory"><i class="fa fa-shopping-cart"></i>
                                Order History</a>
                        </li> -->
                        <li>
                            <a data-bs-toggle="pill" href="#pills-address"><i class="fa fa-map-marker"></i> Address</a>
                        </li>
                        <li>
                            <a data-bs-toggle="pill" href="#pills-account"><i class="fa fa-user"></i> Account
                                Details</a>
                        </li>
                        <li>
                            <a href="login.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <!-- My Account Menu End -->
            </div>

            <div class="col-lg-9 col-md-8">
                <!-- Tab content start -->
                <div class="tab-content my-account-tab" id="pills-tabContent">

                    <div class="tab-pane fade show active" id="pills-dashboard">
                        <div class="my-account-dashboard account-wrapper mt-5">
                            <h4 class="account-title">Dashboard</h4>
                            <div class="welcome-dashboard">
                                <h4>Welcome to Dashboard</h4>
                            </div>

                            <div class="dashboard-home">

                                <div class="dashboard-user-name">
                                    <h6 class="text-content">Hello, <b class="text-title">User</b></h6>
                                    <p class="text-content">From your My Account Dashboard you have the ability to view
                                        a snapshot of your recent account activity and update your account information.
                                        Select a link below to view or edit information.</p>
                                </div>

                                <div class="total-box">
                                    <div class="row g-sm-4 g-3">
                                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="totle-contain">
                                                <div class="totle-detail">
                                                    <h5>Total Order</h5>
                                                    <h3>120</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="totle-contain">
                                                <div class="totle-detail">
                                                    <h5>Total Pending Order</h5>
                                                    <h3>5</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="totle-contain">
                                                <div class="totle-detail">
                                                    <h5>Total Wishlist</h5>
                                                    <h3>50</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="dashboard-title">
                                    <h3>Account</h3>
                                </div>

                                <div class="row g-4">
                                    <div class="col-xxl-6">
                                        <div class="dashboard-contant-title">
                                            <h4>Contact Information <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#editname">Edit</a>
                                            </h4>
                                        </div>
                                        <div class="dashboard-detail">
                                            <p class="text-content"> Neeta </p>
                                            <p class="text-content"> neeta@gmail.com</p>
                                            <p class="text-content"> +91 5673467843</p>
                                            <a class="changepass" href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#change-password"> Change Password</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="dashboard-contant-title">
                                            <h4>Address Book
                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                    data-bs-target="#addnewAddress">Add New Address</a>
                                            </h4>
                                        </div>

                                        <div class="row g-4">
                                            <div class="col-xxl-6">
                                                <div class="dashboard-detail">
                                                    <h5 class="text-content">Default Billing Address</h5>
                                                    <p class="text-content">284, Gandhi Path W, Opp. Style & Scissors,
                                                        Guru Jhambeshwar Nagar A, Vaishali Nagar, Jaipur, Rajasthan
                                                        302021</p>
                                                    <a class="changepass" href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editadress">Edit
                                                        Address</a>
                                                </div>
                                            </div>

                                            <div class="col-xxl-6">
                                                <div class="dashboard-detail">
                                                    <h5 class="text-content">Default Shipping Address</h5>
                                                    <p class="text-content">284, Gandhi Path W, Opp. Style & Scissors,
                                                        Guru Jhambeshwar Nagar A, Vaishali Nagar, Jaipur, Rajasthan
                                                        302021</p>
                                                    <a class="changepass" href="javascript:void(0)"
                                                        data-bs-toggle="modal" data-bs-target="#editadress">Edit
                                                        Address</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <!-- <div class="tab-pane fade" id="pills-orderhistory">
                        <div class="my-account-download account-wrapper mt-5">
                            <h4 class="account-title">Order History</h4>

                            <div class="order-contain">
                                <div class="order-box dashboard-bg-box">
                                    <div class="order-container">
                                        <div class="order-icon">
                                            <i class="fa fa-cube" aria-hidden="true"></i>
                                        </div>
                                        <div class="order-detail">
                                            <h4>Delivered <span>Pending</span></h4>
                                        </div>
                                    </div>

                                    <div class="product-order-detail">
                                        <a href="product-left-thumbnail.php" class="order-image">
                                            <img src="<?=base_url('assets/front/images/collection/1.jpg');?>" class="blur-up lazyload" alt="">
                                        </a>
                                        <div class="order-wrap">
                                            <ul class="product-size">
                                                <li>
                                                    <div class="size-box">
                                                        <h6 class="text-content"> Order Id : </h6>
                                                        <h5><a href="order-success.php"> order_476614956685</a></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h6 class="text-content">Date : </h6>
                                                        <h5><a href="">14-Feb-2023, 12:02 PM</a></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h6 class="text-content">Amount : </h6>
                                                        <h5>₹300</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h6 class="text-content">Payment Method : </h6>
                                                        <h5>Paypal</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h6 class="text-content">Order Status : </h6>
                                                        <h5>Cancelled</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <button class="btn theme-btn"
                                                            onclick="location.href = 'products.php';"
                                                            type="submit">Re-order</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="order-box dashboard-bg-box">
                                    <div class="order-container">
                                        <div class="order-icon">
                                            <i class="fa fa-cube" aria-hidden="true"></i>
                                        </div>
                                        <div class="order-detail">
                                            <h4>Delivered <span class="success-bg">Success</span></h4>
                                        </div>
                                    </div>

                                    <div class="product-order-detail">
                                        <a href="product-left-thumbnail.php" class="order-image">
                                            <img src="<?=base_url('assets/front/images/collection/1.jpg');?>" alt="" class="blur-up lazyload">
                                        </a>
                                        <div class="order-wrap">
                                            <ul class="product-size">
                                                <li>
                                                    <div class="size-box">
                                                        <h5 class="text-content"> Order Id : </h5>
                                                        <h5><a href="order-success.php"> order_476614956685</a></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h5 class="text-content">Date : </h5>
                                                        <h5><a href="">14-Feb-2023, 12:02 PM</a></h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h5 class="text-content">Amount : </h5>
                                                        <h5>₹300</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h5 class="text-content">Payment Method : </h5>
                                                        <h5>Paypal</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <h5 class="text-content">Order Status : </h5>
                                                        <h5>Dispatched</h5>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="size-box">
                                                        <button class="btn theme-btn"
                                                            onclick="location.href = 'products.php';"
                                                            type="submit">Re-order</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div> -->


                    <div class="tab-pane fade" id="pills-address">
                        <div class="my-account-address account-wrapper">
                            <div class="row">
                                <div class="col-md-12 mt-6">
                                    <h4 class="account-title">User Address Details</h4>
                                    <div class="account-address">
                                        <a class="btn theme-btn" data-bs-toggle="modal" data-bs-target="#addnewcontact"
                                            href="javascript:void(0)"><i class="fa fa-edit"></i> Add New Address</a>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-6 addres-contain">
                                    <div class="add-box">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack" id="1" checked="">
                                        </div>

                                        <h4 class="account-title">Billing address</h4>
                                        <div class="account-address">
                                            <h6 class="name">Name: Neeta</h6>
                                            <p><b>Mail Id:</b> <a href="mailto:info@petzoo.com"> info@petzoo.com</a></p>
                                            <p><b>Mobile:</b> <a href="tel:9101412312225">+91 7726077877</a></p>
                                            <p><b>Address:</b> 284, Gandhi Path W, Opp. Style & Scissors, Guru
                                                Jhambeshwar Nagar A, Vaishali Nagar, Jaipur, Rajasthan 302021</p>
                                            <a class="btn theme-btn" data-bs-toggle="modal"
                                                data-bs-target="#editAddress" href="javascript:void(0)"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            <a class="btn theme-btn close_button" data-bs-toggle="modal"
                                                data-bs-target="#removeAddress" href="javascript:void(0)"><i
                                                    class="fa fa-edit"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-6 addres-contain">
                                    <div class="add-box">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                id="flexRadioDefault2" checked="">
                                        </div>

                                        <h4 class="account-title">Shipping address</h4>
                                        <div class="account-address">
                                            <h6 class="name">Name: Neeta</h6>
                                            <p><b>Mail Id:</b> <a href="mailto:info@petzoo.com"> info@petzoo.com</a></p>
                                            <p><b>Mobile:</b> <a href="tel:9101412312225">+91 7726077877</a></p>
                                            <p><b>Address:</b> 284, Gandhi Path W, Opp. Style & Scissors, Guru
                                                Jhambeshwar Nagar A, Vaishali Nagar, Jaipur, Rajasthan 302021</p>
                                            <a class="btn theme-btn" data-bs-toggle="modal"
                                                data-bs-target="#editAddress" href="javascript:void(0)"><i
                                                    class="fa fa-edit"></i> Edit</a>
                                            <a class="btn theme-btn close_button" data-bs-toggle="modal"
                                                data-bs-target="#removeAddress" href="javascript:void(0)"><i
                                                    class="fa fa-edit"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-account">
                        <div class="my-account-details account-wrapper mt-6">
                            <h4 class="account-title">Account Details</h4>

                            <div class="dashboard-profile">

                                <div class="profile-about dashboard-bg-box">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="dashboard-title mb-3">
                                                <h3>Basic Info</h3>
                                            </div>
                                            <div class="profile-detail dashboard-bg-box">
                                                <div class="profile-name-detail">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#editProfile">Edit</a>
                                                </div>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Name :</td>
                                                            <td>Neeta</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Gender :</td>
                                                            <td>Female</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Birthday :</td>
                                                            <td>21/05/1997</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone Number :</td>
                                                            <td>
                                                                <a href="javascript:void(0)"> +91 9654738954</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address :</td>
                                                            <td>284, Gandhi Path W, Opp. Style & Scissors, Guru
                                                                Jhambeshwar Nagar A, Vaishali Nagar, Jaipur, Rajasthan
                                                                302021</td>
                                                        </tr>
                                                    </tbody>


                                                </table>
                                            </div>




                                            <div class="dashboard-title mb-3">
                                                <h3>Login Details</h3>
                                            </div>

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Email :</td>
                                                            <td>
                                                                <a href="javascript:void(0)">neeta@gmail.com
                                                                    <span data-bs-toggle="modal"
                                                                        data-bs-target="#editlogin">Edit</span></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Password :</td>
                                                            <td>
                                                                <a href="change-password.php">●●●●●●
                                                                    <span data-bs-toggle="modal">Change</span></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- Tab content End -->
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header mb-3">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?= base_url(); ?>" target="_blank">
                <img src="<?=base_url(sitelogo)?>" style="max-height: 60px ; border-radius:20px;" alt="" srcset="">
            </a>

        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('admin/dashboard'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-tachometer "></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" href="#products">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Products</span>
                    </a>
                    <div class="collapse px-3" id="products">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/products'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Products</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link text-white "
                                    href="<?= base_url('admin/subcategories'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Categories</span>
                                </a>
                            </li>
                                        
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/colors'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-palette" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Colors</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/sizes'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-ruler" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Sizes</span>
                                </a>
                            </li> -->
                            <!--  <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/stones'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-diamond" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Stones</span>
                                </a>
                            </li> -->
                            <!--<li class="nav-item">-->
                            <!--    <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false"-->
                            <!--        href="#nav-category">-->
                            <!--        <div-->
                            <!--            class="text-white text-center me-2 d-flex align-items-center justify-content-center">-->
                            <!--            <i class="fa fa-sitemap" aria-hidden="true"></i>-->
                            <!--        </div>-->
                            <!--        <span class="nav-link-text ms-1">Category</span>-->
                            <!--    </a>-->
                            <!--    <div class="collapse " id="nav-category">-->
                            <!--        <ul class="nav nav-sm flex-column">-->
                            <!--            <li class="nav-item">-->
                            <!--                <a class="nav-link text-white " href="<?= base_url('admin/categories'); ?>">-->
                            <!--                    <span class="nav-link-text ms-1">Category</span>-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--            <li class="nav-item">-->
                            <!--                <a class="nav-link text-white "-->
                            <!--                    href="<?= base_url('admin/subcategories'); ?>">-->
                            <!--                    <span class="nav-link-text ms-1">Sub-Category</span>-->
                            <!--                </a>-->
                            <!--            </li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link text-white " href="<?= base_url('admin/childcategories'); ?>">-->
                                        <!--        <span class="nav-link-text ms-1">Child-Category</span>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</li>-->
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/texthtml'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-code" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Text To HTML</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/dropimages'); ?>">
                                    <div
                                        class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="fa fa-image" aria-hidden="true"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">All Images</span>
                                </a>
                            </li> -->
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                   <a class="nav-link text-white" href="<?= base_url('admin/blogs'); ?>">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="fa fa-blog" aria-hidden="true"></i>
                       </div>
                       <span class="nav-link-text ms-1">Blogs</span>
                   </a>
                </li>


                <!-- <li class="nav-item">
                   <a class="nav-link text-white" href="<?= base_url('admin/productreviews'); ?>">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="fa fa-star" aria-hidden="true"></i>
                       </div>
                       <span class="nav-link-text ms-1">Product Reviews</span>
                   </a>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('admin/certificates'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-certificate "></i>
                        </div>
                        <span class="nav-link-text ms-1">Certificate</span>
                    </a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('admin/coupons'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Coupons</span>
                    </a>
                </li> -->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link text-white" href="<?= base_url('admin/reviews'); ?>">-->
                <!--        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">-->
                <!--            <i class="fa fa-star" aria-hidden="true"></i>-->
                <!--        </div>-->
                <!--        <span class="nav-link-text ms-1">Reviews</span>-->
                <!--    </a>-->
                <!--</li>-->
                <!-- <li class="nav-item ">
                    <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" href="#orders">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-cart-plus " aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Orders</span>
                    </a>
                    <div class="collapse " id="orders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/orders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> All Orders</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/todaysorders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Today's Orders </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/confirmedorders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Confirmed Orders </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/dispatchorders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Dispatched Orders </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/transitorders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> In Transit Orders </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/deliveredorders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Delivered Orders </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/cancelledorders'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Cancelled Orders </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link text-white " href="<?= base_url('admin/abandoned'); ?>">-->
                <!--        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">-->
                <!--            <i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
                <!--        </div>-->
                <!--        <span class="nav-link-text ms-1">Abandoned Cart</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('admin/appointments'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <span class="sidenav-normal  ms-2  ps-1"> Contact Form Data</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('admin/productenquiry'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                        <span class="sidenav-normal  ms-2  ps-1"> Product Enquiry</span>
                    </a>
                </li>

                <!--<li class="nav-item">-->
                <!--    <a class="nav-link text-white " href="<?= base_url('admin/push_notification'); ?>">-->
                <!--        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">-->
                <!--            <i class="fa fa-envelope" aria-hidden="true"></i>-->
                <!--        </div>-->
                <!--        <span class="nav-link-text ms-1">Bulk Mails</span>-->
                <!--    </a>-->
                <!--</li>-->
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('admin/sliders'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sliders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('admin/gallery'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('admin/reviews'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-pen" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Reviews</span>
                    </a>
                </li>
                <!-- <li class="nav-item ">
                    <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" href="#customer">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customer</span>
                    </a>
                    <div class="collapse " id="customer">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/allusers'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> All Users </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/users'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Customers </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/subscribers'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Subscribers </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item ">
                    <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false"
                        href="#ordersExample">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pages</span>
                    </a>
                    <div class="collapse " id="ordersExample">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/about'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> About Us </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/privacy'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Privacy Policy </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/terms'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Terms and Condition </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/refund'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Refund Policy </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/shipping'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Shipping Policy </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('admin/customerservices'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Customer Services </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Settings</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('admin/globalsettings'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('admin/change-password'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Change Password</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky noPrint"
            id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <!-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol> -->
                    <img src="<?=base_url(sitelogo)?>" style="height:3rem" alt="" srcset="">
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar"
                    style="justify-content: end;">
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="<?=site_url('admin/logout') ?>" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <!--<li class="nav-item px-3 d-flex align-items-center">-->
                        <!--    <a href="<?=site_url('admin/globalsettings') ?>" class="nav-link text-body p-0">-->
                        <!--        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <!--<li class="nav-item dropdown pe-2 d-flex align-items-center">-->
                        <!--    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">-->
                        <!--        <i class="fa fa-bell cursor-pointer"></i>-->
                        <!--    </a>-->
                        <!--    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">-->
                        <!--        <li class="mb-2">-->
                        <!--            <a class="dropdown-item border-radius-md" href="javascript:;">-->
                        <!--                <div class="d-flex py-1">-->
                        <!--                    <div class="my-auto">-->
                        <!--                        <img src="<?=base_url('assets/admin/img/team-2.jpg'); ?>" class="avatar avatar-sm  me-3 ">-->
                        <!--                    </div>-->
                        <!--                    <div class="d-flex flex-column justify-content-center">-->
                        <!--                        <h6 class="text-sm font-weight-normal mb-1">-->
                        <!--                            <span class="font-weight-bold">New message</span> from Laur-->
                        <!--                        </h6>-->
                        <!--                        <p class="text-xs text-secondary mb-0">-->
                        <!--                            <i class="fa fa-clock me-1"></i>-->
                        <!--                            13 minutes ago-->
                        <!--                        </p>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li class="mb-2">-->
                        <!--            <a class="dropdown-item border-radius-md" href="javascript:;">-->
                        <!--                <div class="d-flex py-1">-->
                        <!--                    <div class="my-auto">-->
                        <!--                        <img src="<?=base_url('assets/admin/img/small-logos/logo-spotify.svg'); ?>" class="avatar avatar-sm bg-gradient-dark  me-3 ">-->
                        <!--                    </div>-->
                        <!--                    <div class="d-flex flex-column justify-content-center">-->
                        <!--                        <h6 class="text-sm font-weight-normal mb-1">-->
                        <!--                            <span class="font-weight-bold">New album</span> by Travis Scott-->
                        <!--                        </h6>-->
                        <!--                        <p class="text-xs text-secondary mb-0">-->
                        <!--                            <i class="fa fa-clock me-1"></i>-->
                        <!--                            1 day-->
                        <!--                        </p>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="dropdown-item border-radius-md" href="javascript:;">-->
                        <!--                <div class="d-flex py-1">-->
                        <!--                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">-->
                        <!--                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">-->
                        <!--                            <title>credit-card</title>-->
                        <!--                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
                        <!--                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">-->
                        <!--                                    <g transform="translate(1716.000000, 291.000000)">-->
                        <!--                                        <g transform="translate(453.000000, 454.000000)">-->
                        <!--                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>-->
                        <!--                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>-->
                        <!--                                        </g>-->
                        <!--                                    </g>-->
                        <!--                                </g>-->
                        <!--                            </g>-->
                        <!--                        </svg>-->
                        <!--                    </div>-->
                        <!--                    <div class="d-flex flex-column justify-content-center">-->
                        <!--                        <h6 class="text-sm font-weight-normal mb-1">-->
                        <!--                            Payment successfully completed-->
                        <!--                        </h6>-->
                        <!--                        <p class="text-xs text-secondary mb-0">-->
                        <!--                            <i class="fa fa-clock me-1"></i>-->
                        <!--                            2 days-->
                        <!--                        </p>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                    </ul>
                </div>
            </div>
        </nav>
        <?php if(isset($_SESSION['settings_saved'])){ ?>
        <script>
        setTimeout(function() {
            document.getElementById('myalert').style.display = "none";
        }, 3000);
        </script>
        <div class="alert alert-success alert-dismissible text-white ms-auto w-30" id="myalert"
            style="right: 24px; top: 0px; position: absolute; z-index: 10000;" role="alert">
            <span class="text-sm"><?=$_SESSION['settings_saved']; ?></span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <!-- End Navbar -->
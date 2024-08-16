<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?=base_url('assets/front/images/favicon.png');?>">
    <title>jowenly-Jewelry Store HTML5 Template</title>
    <link href="<?=base_url('assets/front/css/themify-icons.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/flaticon_jowenly.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/animate.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/owl.carousel.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/owl.theme.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/slick.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/slick-theme.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/swiper.min.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/owl.transitions.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/jquery.fancybox.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/css/odometer-theme-default.css');?>" rel="stylesheet">
    <link href="<?=base_url('assets/front/sass/style.css');?>" rel="stylesheet">
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="<?=base_url('assets/front/images/preloader.png');?>" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->
        <!-- Start header -->
        <header id="header">
            <!-- end topbar -->
            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-md-3 col-3 d-lg-none dl-block">
                                <div class="mobail-menu">
                                    <button type="button" class="navbar-toggler open-btn">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar first-angle"></span>
                                        <span class="icon-bar middle-angle"></span>
                                        <span class="icon-bar last-angle"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-6">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="<?=base_url()?>"><img
                                            src="<?=base_url('assets/front/images/logosvg');?>" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-1 col-1">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li><a href="<?=base_url()?>">Home</a></li>
                                        <li><a href="<?=base_url('about')?>">about us </a></li>
                                        <li class="menu-item-has-children">
                                            <a class="active" href="#">Pages</a>
                                            <ul class="sub-menu">
                                                <li class="menu-item-has-children">
                                                    <a href="#">Shop</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="shop.php">Shop</a></li>
                                                        <li><a href="shop-single.php">Shop Single</a></li>
                                                        <li><a href="cart.php">Cart</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="wishlist.php">wishlist</a></li>
                                                <li><a href="order.php">order</a></li>
                                                <li><a href="404.php">404 Error</a></li>
                                                <li><a class="active" href="faq.php">FAQ</a></li>
                                                <li><a href="login.php">login</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">team</a>
                                            <ul class="sub-menu">
                                                <li><a href="team.php">team</a></li>
                                                <li><a href="team-single.php">team single</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Blog</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?=base_url('blog')?>">Blog right sidebar</a></li>
                                                <li><a href="blog-left-sidebar.php">Blog left sidebar</a></li>
                                                <li><a href="blog-fullwidth.php">Blog fullwidth</a></li>
                                                <li class="menu-item-has-children">
                                                    <a href="#">Blog details</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="blog-single.php">Blog details right sidebar</a>
                                                        </li>
                                                        <li><a href="blog-single-left-sidebar.php">Blog details left
                                                                sidebar</a></li>
                                                        <li><a href="blog-single-fullwidth.php">Blog details
                                                                fullwidth</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="<?=base_url('contact')?>">Contact</a></li>
                                    </ul>

                                </div><!-- end of nav-collapse -->
                            </div>
                            <div class="col-lg-2 col-md-2 col-2">
                                <div class="header-right">
                                    <div class="mini-cart">
                                        <button class="cart-toggle-btn"> <i class="ti-shopping-cart"></i>
                                            <span class="cart-count"></span></button>
                                        <div class="mini-cart-content">
                                            <button class="mini-cart-close"><i class="ti-close"></i></button>
                                            <div class="mini-cart-items">
                                                <div class="mini-cart-item clearfix">
                                                    <div class="mini-cart-item-image">
                                                        <a href="shop.php"><img
                                                                src="<?=base_url('assets/front/images/shop/mini-cart/img-1.jpg');?>"
                                                                alt></a>
                                                    </div>
                                                    <div class="mini-cart-item-des">
                                                        <a href="shop.php">Ear Ring</a>
                                                        <span class="mini-cart-item-price">$20.15 x 1</span>
                                                        <span class="mini-cart-item-quantity"><a href="#"><i
                                                                    class="ti-close"></i></a></span>
                                                    </div>
                                                </div>
                                                <div class="mini-cart-item clearfix">
                                                    <div class="mini-cart-item-image">
                                                        <a href="shop.php"><img
                                                                src="<?=base_url('assets/front/images/shop/mini-cart/img-2.jpg');?>"
                                                                alt></a>
                                                    </div>
                                                    <div class="mini-cart-item-des">
                                                        <a href="shop.php">Necklace</a>
                                                        <span class="mini-cart-item-price">$13.25 x 2</span>
                                                        <span class="mini-cart-item-quantity"><a href="#"><i
                                                                    class="ti-close"></i></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-cart-action clearfix">
                                                <span class="mini-checkout-price">Subtotal: <span>$215.14</span></span>
                                                <div class="mini-btn">
                                                    <a href="checkout.php" class="view-cart-btn s1">Checkout</a>
                                                    <a href="cart.php" class="view-cart-btn">View Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end of container -->
                </nav>
            </div>
        </header>

        <!-- start wpo-page-title -->
        <section class="wpo-page-title">
            <div class="container">
                <div class="row">
                    <div class="col col-xs-12">
                        <div class="wpo-breadcumb-wrap">
                            <h2>Faq</h2>
                            <ol>
                                <li><a href="<?=base_url()?>">Home</a></li>
                                <li>Faq</li>
                            </ol>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end container -->
            <div class="left-img">
                <img src="<?=base_url('assets/front/images/pagetitle.png');?>" alt="">
            </div>
            <div class="right-img">
                <div class="shape-1">
                    <img src="<?=base_url('assets/front/images/shape-1.png');?>" alt="">
                </div>
                <div class="image">
                    <img src="<?=base_url('assets/front/images/pagetitle-1.jpg');?>" alt="">
                </div>
                <div class="shape-2">
                    <img src="<?=base_url('assets/front/images/shape-2.png');?>" alt="">
                </div>
            </div>
        </section>
        <!-- end page-title -->

        <!-- start wpo-faq-section -->
        <section class="wpo-faq-section section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="wpo-section-title">
                            <h2>Frequently Asked Question</h2>
                        </div>
                    </div>
                    <div class="col-lg-8 offset-lg-2">
                        <div class="wpo-faq-section">
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <div class="wpo-benefits-item">
                                        <div class="accordion" id="accordionExample">
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingOne">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                        aria-expanded="true" aria-controls="collapseOne">
                                                        What types of cases does your consoel firm handle?
                                                    </button>
                                                </h3>
                                                <div id="collapseOne" class="accordion-collapse collapse show"
                                                    aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum
                                                            exercitationem pariatur iure nemo esse repellendus est quo
                                                            recusandae. Delectus, maxime.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingTwo">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                        aria-expanded="false" aria-controls="collapseTwo">
                                                        Before hiring a consoel, what kind of questions should I ask?
                                                    </button>
                                                </h3>
                                                <div id="collapseTwo" class="accordion-collapse collapse"
                                                    aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum
                                                            exercitationem pariatur iure nemo esse repellendus est quo
                                                            recusandae. Delectus, maxime.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingThree">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                                        aria-expanded="false" aria-controls="collapseThree">
                                                        Should I meet with multiple Consultancy and shop around before
                                                        hiring one?
                                                    </button>
                                                </h3>
                                                <div id="collapseThree" class="accordion-collapse collapse"
                                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum
                                                            exercitationem pariatur iure nemo esse repellendus est quo
                                                            recusandae. Delectus, maxime.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item">
                                                <h3 class="accordion-header" id="headingFour">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                                        aria-expanded="false" aria-controls="collapseFour">
                                                        In addition to billable hours, what other costs can consoel's
                                                        charge for?
                                                    </button>
                                                </h3>
                                                <div id="collapseFour" class="accordion-collapse collapse"
                                                    aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eum
                                                            exercitationem pariatur iure nemo esse repellendus est quo
                                                            recusandae. Delectus, maxime.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </section>
        <!-- end faq-section -->

        <div class="question-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wpo-section-title">
                            <h2>Do You Have Any Question?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="question-touch">
                            <h2>Get In Touch</h2>
                            <form method="post" class="contact-validation-active" id="contact-form"
                                novalidate="novalidate">
                                <div class="half-col">
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Your Name">
                                </div>
                                <div class="half-col">
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="half-col">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Subject">
                                </div>
                                <div>
                                    <textarea class="form-control" name="note" id="note"
                                        placeholder="Your Question"></textarea>
                                </div>
                                <div class="submit-btn-wrapper">
                                    <button type="submit" class="theme-btn">Submit Now</button>
                                    <div id="loader">
                                        <i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
                                    </div>
                                </div>
                                <div class="clearfix error-handling-messages">
                                    <div id="success">Thank you</div>
                                    <div id="error"> Error occurred while sending email. Please try again later. </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- start of wpo-site-footer-section -->
        <footer class="wpo-site-footer">
            <div class="wpo-upper-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget about-widget">
                                <div class="logo widget-title">
                                    <img src="<?=base_url('assets/front/images/logo-2svg');?>" alt="blog">
                                </div>
                                <p>Neque convallis a cras semper auctor. Adipiscing elit ut aliquam purus sit amet
                                    luctus.</p>
                                <ul class="social">
                                    <li><a href="#"><i class="flaticon-facebook-app-symbol"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>Quick Links:</h3>
                                </div>
                                <ul>
                                    <li><a href="#">Contact us</a></li>
                                    <li><a href="#">How it Works</a></li>
                                    <li><a href="#">Create</a></li>
                                    <li><a href="#">Explore</a></li>
                                    <li><a href="#">Terms & Services</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget link-widget">
                                <div class="widget-title">
                                    <h3>support:</h3>
                                </div>
                                <ul>
                                    <li><a href="#">faq</a></li>
                                    <li><a href="#">sustainability</a></li>
                                    <li><a href="#">care guide</a></li>
                                    <li><a href="#">Explore</a></li>
                                    <li><a href="#">size guide</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="widget social-widget">
                                <div class="widget-title">
                                    <h3>Subscribe Now:</h3>
                                </div>
                                <p>Lorem Ipsum is simply dummy text standard dummy printing text.</p>
                                <form class="subscribe">
                                    <input class="sub" type="email" placeholder="Email here">
                                    <button type="submit">
                                        <i class="flaticon-telegram"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </div>
            <div class="wpo-lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <p class="copyright"> Copyright &copy; 2023 Jowenly by <a
                                    href="<?=base_url()?>">wpOceans</a>.
                                All
                                Rights Reserved.</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <svg viewBox="0 0 260 394" fill="none">
                    <rect opacity="0.5" x="0.5" y="0.5" width="191" height="393" rx="95.5" stroke="white"
                        stroke-opacity="0.2" />
                    <rect width="260" height="140" fill="#5C623D" />
                </svg>
            </div>
        </footer>
        <!-- end of wpo-site-footer-section -->


    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="<?=base_url('assets/front/js/jquery.min.js');?>"></script>
    <script src="<?=base_url('assets/front/js/bootstrap.bundle.min.js');?>"></script>
    <!-- Plugins for this template -->
    <script src="<?=base_url('assets/front/js/modernizr.custom.js');?>"></script>
    <script src="<?=base_url('assets/front/js/jquery.dlmenu.js');?>"></script>
    <script src="<?=base_url('assets/front/js/jquery-plugin-collection.js');?>"></script>
    <!-- Custom script for this template -->
    <script src="<?=base_url('assets/front/js/script.js');?>"></script>
</body>

</html>
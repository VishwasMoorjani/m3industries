<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="<?=base_url('assets/front/images/favicon.png');?>">

    <title><?= $title ?></title>
    <meta name="keyword" content="<?= $keyword ?>">
    <meta name="description" content="<?= $description ?>">


    <link href="<?=base_url('assets/front/css/intlTelInput.css');?>" rel="stylesheet">
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


    <div class="page-wrapper">

        <!-- <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="<?=base_url('assets/front/images/preloader.png');?>" alt="">
                </div>
            </div>
        </div> -->

        <header id="header" class="noPrint">

            <div class="wpo-site-header">
                <nav class="navigation navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <div class="navibarr">
                                <button type="button" class="navbar-toggler open-btn mobail-menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar first-angle"></span>
                                    <span class="icon-bar middle-angle"></span>
                                    <span class="icon-bar last-angle"></span>
                                </button>
                            <div class="logobrand">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="<?=base_url()?>"><img src="<?=base_url('assets/front/images/logo.png');?>"
                                            alt="logo"></a>
                                </div>
                            </div>
                            <div class="navigation">
                                <div id="navbar" class="collapse navbar-collapse navigation-holder">
                                    <button class="menu-close"><i class="ti-close"></i></button>
                                    <ul class="nav navbar-nav mb-2 mb-lg-0">
                                        <li><a class="active" href="<?=base_url()?>">Home</a></li>
                                        <li><a href="<?=base_url('about')?>">About us </a></li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Products</a>
                                            <ul class="sub-menu">
                                                <!-- <li class="menu-item-has-children">
                                                    <a href="#">Shop</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="shop.php">Shop</a></li>
                                                        <li><a href="shop-single.php">Shop Single</a></li>
                                                        <li><a href="cart.php">Cart</a></li>
                                                        <li><a href="checkout.php">Checkout</a></li>
                                                    </ul>
                                                </li> -->
                                                <?php foreach($maincategories as $headcategories){ ?>
                                                    <li><a href="<?=base_url('category/'.$headcategories['link'])?>"><?=$headcategories['name']?></a></li>
                                                <?php } ?>
                                                
                                            </ul>
                                        </li>
                                        <li><a href="<?=base_url('blog')?>">Blog</a></li>
                                        <li><a href="<?=base_url('contact')?>">Contact</a></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="cart">
                                <div class="header-right">
                                    <div class="mini-cart">
                                        <!-- <button class="account-icon" onclick="location.href='profile.php';">
                                            <i class="fi flaticon-profile"></i>
                                        </button>
                                        <button class="account-icon" onclick="location.href='wishlist.php';">
                                            <i class="fi flaticon-heart"></i>
                                        </button> -->
                                        <button class="cart-toggle-btn"> <i class="ti-shopping-cart"></i>
                                            <span class="cart-count"><?=$this->cart->total_items()?></span></button>
                                        <div class="mini-cart-content">
                                            <button class="mini-cart-close"><i class="ti-close"></i></button>
                                            <div class="mini-cart-items">

                                            <?php $shipping_charge = 0;
                                            if ($this->cart->total_items() > 0) {
                                            foreach ($cartItems as $item) { ?>
                                                <div class="mini-cart-item clearfix">
                                                    <div class="mini-cart-item-image">
                                                        <a href="<?=base_url('product/'.$item['link'])?>"><img
                                                                src="<?=base_url('assets/front/images/'.$item["image"]);?>" alt></a>
                                                    </div>
                                                    <div class="mini-cart-item-des">
                                                        <a href="<?=base_url('product/'.$item['link'])?>"><?=$item['name']?></a>
                                                        <span class="mini-cart-item-price">₹<?=$item['price']?></span>
                                                        <span class="mini-cart-item-quantity"><a href="<?=base_url('home/removeItem/'.$item['rowid']);?>"><i
                                                                    class="ti-close"></i></a></span>
                                                    </div>
                                                </div>
                                            <?php } }  ?>
                                               
                                            </div>
                                            <div class="mini-cart-action clearfix">
                                                <span class="mini-checkout-price">Subtotal: <span>₹ <?=$this->cart->total()?></span></span>
                                                <div class="mini-btn">
                                                    <!-- <a href="checkout.php" class="view-cart-btn s1">Checkout</a> -->
                                                    <a href="<?=base_url('cart')?>" class="view-cart-btn">View Cart</a>
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
        <!-- end of header -->
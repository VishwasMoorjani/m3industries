<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M3 Industries</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css" type="text/css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
    type="text/css">

    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,300;1,600;1,700&display=swap" rel="stylesheet">

  <link rel="shortcut icon" href="<?=base_url('assets/front/imageslogo.png');?>" type="image/ico" />
  <link rel="stylesheet" href="<?=base_url('assets/front/css/magiczoomplus.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/owl.theme.default.min.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/owl.carousel.min.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/all.min.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/bootstrap.min.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/animate.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/style.css');?>" type="text/css">
  <link rel="stylesheet" href="<?=base_url('assets/front/css/responsive.css');?>" type="text/css">

</head>

<body>

  <header style="background: #072a0a;">

    <nav class="navbar ">
      <div class="container">

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar">
          <span><i class="fa-solid fa-bars"></i></span>
        </button>

        <div></div>

        <a class="navbar-brand justify-content-center" href="<?=base_url();?>"><img src="<?=base_url('assets/front/imageslogo.png');?>"
            alt=""></a>

        <ul class="cart d-flex list-unstyled align-items-center">
          <li><a href="javascript: void(0);"><i class="fa-solid fa-magnifying-glass" id="search-icon"></i></a></li>

          <!-- <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li> -->

          <li class="carrt"> <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"><i class="fa-solid fa-cart-shopping"></i></a></li>
        
          <div class="vive-cart ">
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Shopping Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
              <?php $shipping_charge = 0;
                  if ($this->cart->total_items() > 0) {
                  foreach ($cartItems as $item) { ?>
                <div class="row">
                  <div class="col-6">
                    <div class="imgsc">
                      <img src="<?=base_url('assets/front/images/' . $item["image"])?>" alt="">
                    </div>
                  </div>

                  <div class="col-6">
                    <div class="content">
                      <h3><a href="<?=base_url('product/'.$item['link'])?>"><?=$item['name']?> x <?=$item['qty']?></a></h3>
                        <h4><b>Plating: </b><?=$item["options"]["plating"]?></h4>
                        <h5><b>Size: </b><?=$item["options"]["size"]?></h5>
                        <h5><b>Stone: </b><?=$item["options"]["stone"]?></h5>

                      <h6>₹ <?=$item['price']?></h6>

                      <!-- <div class="qty-input">
                        <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                        <input class="product-qty" type="number" name="product-qty" min="0" max="100" value="1">
                        <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                      </div> -->

                    </div>
                  </div>

                </div>
                <?php }
                    }  ?>

                <ul class="cartinfo d-flex list-unstyled justify-content-between">
                  <li>Sub Total:</li>
                  <li><b>₹<?=$this->cart->total();?></b></li>
                </ul>

                <ul class="cartinfoo d-flex list-unstyled justify-content-between">
                  <li>Total:</li>
                  <li><b>₹<?=$this->cart->total();?></b></li>
                </ul>

                <a href="<?=base_url('cart');?>" class="btnd">View cart</a>

              </div>
            </div>
          </div>


          <li><a href="<?=base_url('user/wishlist');?>"><i class="fa-solid fa-heart"></i></a></li>
          <li><a href="<?=base_url('user/login');?>"><i class="fa-solid fa-user"></i></a></li>
        </ul>

      </div>
    </nav>

    <nav class="navbar navbar-expand-lg">
      <div class="container">

        <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Pranshi Creations</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('shop');?>">SHOP</a>
              </li>
              <li class="nav-item dropdown"  style="z-index:9999">
                <button id="category" class="nav-link">COLLECTION <i class="fa-solid fa-chevron-down"></i></button>
                <ul class="ul">
                  <?php foreach($getcategories as $headcategories){ ?>
                  <li><a href="<?=base_url('category/'.$headcategories['link']);?>"><?=$headcategories['name']?></a></li>
                  <?php } ?>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('popular');?>">POPULAR</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('about');?>">ABOUT US</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?=base_url('contact');?>">CONTACT US</a>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </nav>

  </header>

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
                    <h2>Cart</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>Cart</li>
                    </ol>
                </div>
            </div>
        </div> <!-- end row -->
    </div>
</section>
<!-- end page-title -->

<!-- cart-area start -->
<div class="cart-area section-padding">
    <div class="container">
        <div class="form">
            <div class="cart-wrapper">
                <div class="row">
                    <div class="col-12">
                        <form action="cart">
                            <table class="table-responsive cart-wrap">
                                <thead>
                                    <tr>
                                        <th class="images images-b">Image</th>
                                        <th class="product-2">Product Name</th>
                                        <!-- <th class="pr">Quantity</th> -->
                                        <!--<th class="ptice">Price</th>-->
                                        <!-- <th class="stock">Total Price</th> -->
                                        <th class="remove remove-b">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $shipping_charge = 0;
                                    if ($this->cart->total_items() > 0) {
                                    foreach ($cartItems as $item) { ?>

                                        <tr class="product-box-contain">
                                            <td class="images">
                                                <img src="<?=base_url('assets/front/images/'.$item['image']);?>" alt=""></td>
                                            <td class="product">
                                                <ul>
                                                    <li class="first-cart"><?=$item['name']?></li>
                                                    <!-- <li>Karat: 42</li>
                                                    <li>Weight:1gm</li> -->
                                                </ul>
                                            </td>
                                            
                                            <!-- <td class="stock">
                                                <ul class="input-style">
                                                    <li class="quantity cart-plus-minus">
                                                        <input type="text" value="1" />
                                                    </li>
                                                </ul>
                                            </td> -->
                                            <!--<td class="ptice">₹ <?=$item['price']?></td>-->
                                            <!-- <td class="stock">₹ 250</td> -->
                                            <td class="action">
                                                <ul>
                                                    <li class="w-btn"><a class="close_button" data-bs-toggle="tooltip"
                                                            data-bs-html="true" title="Remove from Cart" href="<?=base_url('home/removeItem/'.$item['rowid']);?>"><i
                                                                class="fi ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>

                                    <?php } }  ?>


                                </tbody>
                            </table>
                        </form>

                        <div class="submit-btn-area">
                            <ul>
                                <li><a class="theme-btn" href="shop.php"><i class="fa fa-angle-double-left"></i>
                                        Continue Shopping </a></li>
                                <li><a type="button" data-bs-toggle="modal" data-bs-target="#enquirynow"
                                        class="theme-btn">Enquiry Now</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade theme-modal" id="enquirynow" tabindex="-1" aria-labelledby="exampleModalLabel3"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel3">Enquiry</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                     <i class="fa-solid fa-xmark"></i>
                 </button>
             </div>
             <div class="modal-body">
                <form action="<?=base_url('home/cartenquiry')?>" method="post">
                     <div class="mb-3">
                         <input type="text" autocomplete="Name" placeholder="Name" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="email" autocomplete="E-mail" placeholder="E-mail" name="email"
                             class="form-control">
                     </div>
                     <div class="mb-3">
                         <input type="text" autocomplete="Mobile" pattern="[7896][0-9]{9}" class="form-control" placeholder="Phone Number"
                             name="mobile">
                     </div>
                     <div class="mb-3">
                         <button type="submit" class="btn theme-btn">Submit</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

<?php include('footer.php');?>
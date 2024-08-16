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
                    <h2>Order</h2>
                    <ol>
                        <li><a href="<?=base_url()?>">Home</a></li>
                        <li>order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->


<!-- cart-area start -->
<div class="order-area section-padding">
    <div class="container">
        <div class="form">
            <div class="order-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="order-invoice">
                            <div class="order-id">
                                <a href="user-dashboard.php#pills-tabContent">Order ID: order_476614956685</a>
                            </div>
                            <div class="invoice-print">
                                <a class="btn" href="invoice.php">Invoice</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <form action="order">
                            <table class="table-responsive order-wrap">
                                <thead>
                                    <tr>
                                        <th class="images images-b">Order ID</th>
                                        <th class="product">Date</th>
                                        <th class="ptice">Quantity</th>
                                        <th class="ptice">Ship To</th>
                                        <th class="">Total Price</th>
                                        <th class="remove">Status</th>
                                        <th class="action remove-b">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="images"># 8976A</td>
                                        <td class="product">05 : 08 : 2023</td>
                                        <td class="ptice">06</td>
                                        <td class="name">Tiara</td>
                                        <td class="">₹ 450</td>
                                        <td class="Del"><span>Delivered</span></td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn-view"><a data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="View" href="#"><i class="fi ti-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images"># 8976A</td>
                                        <td class="product">05 : 08 : 2023</td>
                                        <td class="ptice">06</td>
                                        <td class="name">Earrings</td>
                                        <td class="">₹ 450</td>
                                        <td class="stock"><span>Pending</span></td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn-view"><a data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="View" href="#"><i class="fi ti-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images"># 8976A</td>
                                        <td class="product">05 : 08 : 2023</td>
                                        <td class="ptice">06</td>
                                        <td class="name">Rings</td>
                                        <td class="">₹ 450</td>
                                        <td class="stocks"><span>Pending</span></td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn-view"><a data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="View" href="#"><i class="fi ti-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images"># 8976A</td>
                                        <td class="product">05 : 08 : 2023</td>
                                        <td class="ptice">06</td>
                                        <td class="name">Choker</td>
                                        <td class="">₹ 450</td>
                                        <td class="can"><span>Canceled</span></td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn-view"><a data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="View" href="#"><i class="fi ti-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="images"># 8976A</td>
                                        <td class="product">05 : 08 : 2023</td>
                                        <td class="ptice">06</td>
                                        <td class="name">Bracelet</td>
                                        <td class="">₹ 450</td>
                                        <td class="pro"><span>Processing</span></td>
                                        <td class="action">
                                            <ul>
                                                <li class="w-btn-view"><a data-bs-toggle="tooltip" data-bs-html="true"
                                                        title="View" href="#"><i class="fi ti-eye"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php');?>
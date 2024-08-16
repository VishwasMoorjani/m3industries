<?php include("head.php"); ?>
<?php include("header.php"); ?>
<style>
	td {
		text-align: left;
	}

	.card-body {
        padding-top: 0px !important; 
	}

	.table thead th {
		padding: 3px;
	}

	@media(max-width:450px) {
		.address>tr {
			display: grid;
		}

		.address>tbody>tr {
			display: grid;
		}
	}

	@media print {
		.Print {
			display: contents;
		}
	}
</style>
<div class="aiz-user-panel container-fluid py-4">
	<div class="aiz-titlebar mt-2 mb-4 noPrint">
		<div class="row align-items-center">
			<div class="col-md-12">
				<span class="h3">Order ID: <?= $order['order_id'] ?></span>
				<!--<a href="javascript:window.print()" style="float: right;">Print Invoice <i class="fa fa-print" aria-hidden="true"></i></a>-->

			</div>
		</div>
	</div>

	<div class="card mb-1" style="padding:0px">
		<div class="card-header">
			<table class="table-borderless table noPrint address" style="margin-bottom: 0rem;">
				<tr>
					<td>
						<h5 class="h6 mb-0">Order Id: <?= $order['order_id'] ?></h5>
					</td>
					<td>
						<h5 class="h6 mb-0">Order date: <?= $order['order_date'] ?></h5>
					</td>
				</tr>

			</table>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12">
					<table class="table-borderless table aiz-table table footable footable-1 breakpoint-xl">
						<tbody class="address">
							<tr>
								<td>
									<h4>Bill To:</h4>
									<p style="columns: 2; font-size:13px; color:#7b809a; line-height: 1.625; font-weight: 300;"><?= $order['billingAddress'] ?></p>
								</td>
								<td>
									<h4>Ship To:</h4>
									<p style="columns: 2; font-size:13px; color:#7b809a; line-height: 1.625; font-weight: 300;"><?= $order['shippingAddress'] ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card mb-1 noPrint" style="padding:0px">
		<div class="card-header">
			<h5 class="h6 mb-0">Special Note</h5>
		</div>
		<div class="card-body">
			<p style="font-size:13px; font-weight: 300;" class="m-2"><?= $order['message'] ?></p>
		</div>
	</div>

                           <div class="row">
            					<div class="col-md-9">
            						<div class="card" style="padding:0px">
            							<div class="card-header">
            								<h5 class="h6 mb-0">Order Details</h5>
            							</div>
            							<div class="card-body" style="overflow: auto;">
            								<table class="aiz-table table footable footable-1 breakpoint-xl">
            									<thead>
            										<tr class="footable-header">
            											<th class="footable-first-visible" style="display: table-cell;">#</th>
            											<th class="noPrint" style="display: table-cell;">Product Image</th>
            											<th style="display: table-cell;">Product Name</th>
            											<th style="display: table-cell;">Quantity</th>
            											<th style="display: table-cell;">Price</th>
            											<th style="display: table-cell;">GST</th>
            											<th style="display: table-cell;">Total</th>
            										</tr>
            									</thead>
            									<tbody>
            										<?php
            										$i = 1;
            										foreach ($items as $item) {
            										?>
            											<tr>
            												<td class="footable-first-visible" style="display: table-cell;"><?= $i++; ?></td>
            												<td class="noPrint" style="display: table-cell;">
            													<img src="<?=base_url('assets/front/images/' . $item['image']); ?>" width=150px />
            												</td>
            												<td><?= $item['name'] ?></td>
            												<td style="display: table-cell;">
            													<?= $item['qty'] ?>
            												</td>
            												<td style="display: table-cell;"><?=($order['currency']=='USD') ? "₹ ".$item['price']*0.82 : "₹ ".$item['price']*0.82;?></td>
            												<td style="display: table-cell;"><?=($order['currency']=='USD') ? "₹ ".$item['price']*0.18 : "₹ ".$item['price']*0.18;?></td>
            												<td style="display: table-cell;"><?=($order['currency']=='USD') ? "₹ ".$item['price']: "₹ ".$item['price'];?></td>
            												
            											</tr>
            										<?php } ?>
            									</tbody>
            								</table>
            							</div>
            						</div>
            					</div>
            					<div class="col-md-3">
            						<div class="card">
            							<div class="card-header">
            								<b class="fs-15">Order Amount</b>
            							</div>
            							<div class="card-body pb-0">
            								<table class="table-borderless table">
            									<tbody>
            										<tr>
            											<td class="w-50 fw-600">Subtotal</td>
            											<td class="text-right">
            												<span class="strong-600"><?=($order['currency']=='USD') ? "$ ": "$ ";?> <?= ($order['totalAmount'] - $order['totalShipping'] + $order['totalDiscount']) * 0.82 ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600">GST</td>
            											<td class="text-right">
            												<span class="text-italic"><?=($order['currency']=='USD') ? "$ ": "$ ";?> <?= ($order['totalAmount'] - $order['totalShipping'] + $order['totalDiscount']) * 0.18 ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600">Shipping</td>
            											<td class="text-right">
            												<span class="text-italic"><?=($order['currency']=='USD') ? "$ ": "$ ";?> <?= $order['totalShipping'] ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600">Discount</td>
            											<td class="text-right">
            												<span class="text-italic"> <?=($order['currency']=='USD') ? "$ ": "$ ";?><?= $order['totalDiscount'] ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600">Total</td>
            											<td class="text-right">
            												<strong><span><?=($order['currency']=='USD') ? "$ " . $order['totalAmount'] : "$ " . $order['totalAmount'] ;?></span></strong>
            											</td>
            											
            										</tr>
            										<tr class="Print">
            										    <td class="w-50 fw-600"> </td>
            										    <td class="text-right">
            										        <strong><span><?php $f = new NumberFormatter("EN", NumberFormatter::SPELLOUT); ?>
            												<?= ucfirst($f->format($order['totalAmount'])); ?></span></strong>
            											</td>
            										</tr>
            									</tbody>
            								</table>
            							</div>
            						</div>
            					</div>
            				</div>
</div>
</main>

<?php include("footer.php"); ?>
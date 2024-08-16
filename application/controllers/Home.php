<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Admin_model');
		$this->load->model('User_model');
		$this->load->model('Blog_model');
		$this->load->library('form_validation');
		$this->Global = $this->Global_model->getdata();
		$this->Global['getproducts'] = $this->Product_model->getdata();
		$this->Global['getcategories'] = $this->Product_model->getchildcategories();
		$this->Global['colors'] = $this->Product_model->getallcolors();
		$this->Global['stones'] = $this->Admin_model->getgemstones();
		$this->Global['maincategories'] = $this->Product_model->getchildcategories();
		$this->Global['pages'] = $this->Global_model->getpages();
		$this->Global['sliders'] = $this->Global_model->getactivesliders();
		$this->Global['gallery'] = $this->Global_model->getactivegallery();
		$this->Global['reviews'] = $this->Global_model->getactivereviews();
// 		$field = "trending";
// 		$value = "on";
// 		$this->Global['topproduct'] = $this->Product_model->getdata($field, $value);
		$this->Global['blogs'] = $this->Blog_model->get_posts(3, 0);
		$this->Global['cartItems'] = $this->cart->contents();

	}
	public function index()
	{
		
// 		$this->Global['products'] = array_slice($this->Product_model->getdata(), 0, 7);
		$field = "new_arrival";
		$value = "on";
		$this->Global['about'] = $this->Global_model->getpage("about")[0];
		$this->Global['products'] = array_slice($this->Product_model->getdata($field, $value), 0, 7);
// 		$field = "trending";
// 		$value = "on";
// 		$this->Global['trending'] = array_slice($this->Product_model->getdata($field, $value), 0, 7);
// 		$field = "featured";
// 		$value = "on";
// 		$this->Global['featured'] = array_slice($this->Product_model->getdata($field, $value), 0, 7);
		$this->load->view('front/index', $this->Global);
	}

	// public function shop()
	// {
	//     if (isset($_GET['clear'])) {
	// 		redirect(base_url('shop'));
	// 	}
	// 	if (isset($_GET['filter'])) {	
	// 		if(isset($_GET['order_by'])) {
	// 		$data['order_by'] = $this->input->get('order_by');
	// 		$this->Global['order_by'] = $_GET['order_by'];
	// 		}else{
	// 			$data['order_by'] = '';
	// 			$this->Global['order_by'] = '';
	// 		}
	// 		$data['minimum_price'] = $this->input->get('minimum_price');
	// 		$data['maximum_price'] = $this->input->get('maximum_price');
	// 		$data['color'] = $this->input->get('color');
	// 		$data['metal'] = $this->input->get('metal');
	// 		$data['stone'] = $this->input->get('stone');
	// 		$data['plating'] = $this->input->get('plating');
	// 		$this->Global['product'] = $this->Product_model->categoryproducts(NULL, $data);
	// 		$this->load->view('front/shop', $this->Global);
	// 	}else{
	// 			$this->Global['order_by'] = '';
	// 			$this->Global['product'] = $this->Product_model->getdata();
	// 			$this->load->view('front/shop', $this->Global);
	// 		}
	// }

	public function error()
	{
		$this->load->view('front/error', $this->Global);
	}

	public function about()
	{
		$this->Global['about'] = $this->Global_model->getpage("about")[0];
		$this->load->view('front/about', $this->Global);
	}
	
	public function contact()
	{
		$this->load->view('front/contact', $this->Global);
	}
	public function privacy_policy()
	{
		$this->Global['title'] = "Privacy Policy";
		$this->Global['page'] = $this->Global_model->getpage("privacy")[0];
		$this->load->view('front/page', $this->Global);
	}
	public function term_and_condition()
	{
		$this->Global['title'] = "Terms and Condition";
		$this->Global['page'] = $this->Global_model->getpage("terms")[0];
		$this->load->view('front/page', $this->Global);
	}
	public function refund_policy()
	{
		$this->Global['title'] = "Refund Policy";
		$this->Global['page'] = $this->Global_model->getpage("refund")[0];
		$this->load->view('front/page', $this->Global);
	}
	public function shipping_policy()
	{
		$this->Global['title'] = "Shipping Policy";
		$this->Global['page'] = $this->Global_model->getpage("shipping")[0];
		$this->load->view('front/page', $this->Global);
	}
	public function customerservices()
	{
		$this->Global['title'] = "Customer Services";
		$this->Global['page'] = $this->Global_model->getpage("customerservices")[0];
		$this->load->view('front/page', $this->Global);
	}
	public function category($req = null)
	{
		if ($this->Product_model->checkcategory($req)) {

			$data = $this->Product_model->get_category($req);
			$this->Global['details'] = $data;
			if ($data->parent == "") {
				$this->Global['categories'] = $this->Product_model->subcategory($req);
				$this->load->view('front/sub-category', $this->Global);
			} else {
				$this->Global['products'] = $this->Product_model->categoryproducts($req);
				$this->load->view('front/products', $this->Global);
			}
		} else {
			redirect('error');
		}
	}

	public function product($req = null)
	{	
		if ($this->Product_model->checkproduct($req)) {
			$this->Global['product'] = $this->Product_model->get_product($req);
			$this->Global['sizes'] = $this->Product_model->getsizes($req);
			$this->Global['stones'] = $this->Product_model->getstones($req);
			$this->Global['productreviews'] = $this->Product_model->get_productreviews($req);
			$this->Global['related_product'] = $this->Product_model->categoryproducts($this->Global['product']->category);
			$this->load->view('front/product-detail', $this->Global);
		} else {
			redirect('error');
		}
	}
	public function addtocart($req = null)
	{
		$product = $this->Product_model->get_product($req);
		$size =  $this->Product_model->get_product_size($product->size)->name;
		$stone =  $product->gemstones;
		$plating = 'Silver';
		$price = $product->saleprice;
		$qnty = 1;
		if (isset($_POST['qty'])) {
			$qnty = $_POST['qty'];
			// $size = $this->Product_model->get_product_size($_POST['lastsize'])->name;
			// $stone = $_POST['laststone'];
			// $plating = $_POST['lastplating'];
			// $price = $_POST['lastprice'];
		}
		// Fetch specific product by ID
		// Add product to the cart
		$data = array(
			'id'    => $product->id,
			'qty'    => $qnty,
			'price'    => $price,
			'name'    => $product->name,
			'link' => $product->link,
			'image' => $product->featured_image,
			'shipping_charge' => $product->shipping_charges,
			'options' =>array('plating' => $plating, 'size' => $size, 'stone' => $stone)
		);
		// print_r($data);
	    // die();
		$this->cart->insert($data);
		redirect('cart');
		// if (!$_POST['qty']) {
			// redirect('cart');
		// }
			// $_SESSION['notification'] = "Product Added Successfully!";
			// redirect($_SERVER['HTTP_REFERER']);
	}
	public function cart()
	{
// 		if (isset($_POST['coupon_discount'])) {
			
// 			$coupon = $this->Product_model->getcoupon($_POST['coupon_discount'], 1);
// 			if (isset($coupon['name'])) {
// 				if ($coupon['quantity'] >= 1) {
// 					if ($coupon['min_amt'] < $this->cart->total()) {
// 						$this->Global['coupon'] = $coupon;
// 						$this->session->set_userdata('coupon', $coupon);
// 						// $this->session->set_flashdata('error_msg', "Congratulation! ".$coupon['name']." is applied");
// 						$this->Product_model->getcoupon($_POST['coupon_discount'], 1, 1);
// 					} else {
// 						$this->session->unset_userdata('coupon', $coupon);
// 						$this->session->set_flashdata('error_msg', "Minimum order value must be " . $coupon['min_amt']);
// 					}
// 				} else {
// 					$this->session->set_flashdata('error_msg', "No coupon code found !");
// 					$this->session->set_userdata('discount', 0);
// 				}
// 			} else {
// 				$this->session->set_flashdata('error_msg', "No coupon code found !");
// 				$this->session->set_userdata('discount', 0);
// 			}
// 		} else if (isset($_SESSION['coupon'])) {
// 			$coupon = $this->Product_model->getcoupon($_SESSION['coupon']['name'], 1);
// 			if ($coupon['min_amt'] < $this->cart->total()) {
// 				$this->Global['coupon'] = $coupon;
// 			} else {
// 				$this->session->unset_userdata('coupon', $coupon);
// 				$this->session->set_flashdata('error_msg', "Minimum order value must be " . $coupon['min_amt']);
// 			}
// 		} else {
// 			$this->session->set_userdata('discount', 0);
// 		}
        
		$this->Global['cartItems'] = $this->cart->contents();
		$this->load->view('front/cart', $this->Global);

	}
	public function updateItemQty()
	{
		$update = 0;

		// Get cart item info
		$rowid = $this->input->get('rowid');
		$qty = $this->input->get('qty');

		// Update item in the cart
		if (!empty($rowid) && !empty($qty)) {
			$data = array(
				'rowid' => $rowid,
				'qty'   => $qty
			);
			$update = $this->cart->update($data);
		}

		// Return response
		echo $update ? 'ok' : 'err';
	}
	public function emptycart()
	{
		$this->cart->destroy();
		redirect('cart');
	}
	public function removeItem($rowid)
	{
		// Remove item from cart
		$remove = $this->cart->remove($rowid);

		// Redirect to the cart page
		redirect('cart');
	}
	public function checkout()
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/checkout');
		} else {
			redirect('user/login');
		}
	}
	public function search()
	{
		if (isset($_GET['keyword']) && isset($_GET['order_by'])) {
			$this->Global['product'] = $this->Product_model->search($_GET['keyword'], $_GET['order_by']);
			// $this->Global['colors'] = $this->Product_model->getcolor();
			$this->Global['details'] = $_GET['keyword'];
			$this->load->view('front/search', $this->Global);
		}
		else if (isset($_GET['keyword'])){
			$this->Global['product'] = $this->Product_model->search($_GET['keyword']);
			// $this->Global['colors'] = $this->Product_model->getcolor();
			$this->Global['details'] = $_GET['keyword'];
			$this->load->view('front/search', $this->Global);
		}
	}
	function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->Product_model->search_title($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = $row->name;
				echo json_encode($arr_result);
			}
		}
	}
	function getpopupdata(){
		$req = $_POST['id'];
		if ($this->Product_model->checkproduct($req)) {
			print_r(json_encode($this->Product_model->get_product($req)));
		} 
	}
	public function save(){
		$data = $_POST;
		$this->Global['project'] = $this->Global_model->save($data);
		$data['toemail'] = array('lead@gdigitalindia.com','gdigitalindialeads@gmail.com',admin_email);
		$data['subject'] = sitename." Contact Enquiry";
		$mail_message = sitename." Contact Enquiry";
		$mail_message .="<br/>Name - ".$_REQUEST['firstname']." ".$_REQUEST['lastname'];
		$mail_message .="<br/>Email - ".$_REQUEST['email'];
		$mail_message .="<br/>Mobile - ".$_REQUEST['phoneno'];
		$mail_message .="<br/>Message - ".$_REQUEST['message'];
		$data['message'] = $mail_message;
		$this->Global_model->send_mail($data);
		
	}
	public function savereview(){
		$data = $_POST;
		$this->Global['project'] = $this->Global_model->savereview($data);
		redirect(base_url('product/'.$data['product_slug']));
	}
	public function thanks(){
		$this->load->view('front/thanks', $this->Global);
	}
	public function newsletter()
	{
			if (isset($_POST['email'])) {

				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[subscriber.email]');
				$this->form_validation->set_message('is_unique', 'This %s is already taken');


				if ($this->form_validation->run() == true) {
					$data = $_POST;
					$this->User_model->registersubscriber($data);
					
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}
			redirect('home/thanks');
	}
	public function popular()	{
		if (isset($_GET['clear'])) {
			redirect(base_url('popular'));
		}
		if (isset($_GET['filter'])) {	
			if(isset($_GET['order_by'])) {
			$data['order_by'] = $this->input->get('order_by');
			$this->Global['order_by'] = $_GET['order_by'];
			}else{
				$data['order_by'] = '';
				$this->Global['order_by'] = '';
			}
			$data['minimum_price'] = $this->input->get('minimum_price');
			$data['maximum_price'] = $this->input->get('maximum_price');
			$data['color'] = $this->input->get('color');
			$data['metal'] = $this->input->get('metal');
			$data['stone'] = $this->input->get('stone');
			$data['plating'] = $this->input->get('plating');
			$this->Global['product'] = $this->Product_model->categoryproducts(NULL, $data);
			$this->load->view('front/shop', $this->Global);
		}else{
				$this->Global['order_by'] = '';
				$this->Global['product'] = $this->Product_model->getdata();
				$this->load->view('front/shop', $this->Global);
			}
						
	}

	function getstones(){
		$size_id=$_POST["size_id"];
		$this->Global['stone'] = $this->Product_model->getstone($size_id);
		$html = '<span class="title">Stone</span> <br>';
		$html .= '<ul class="checkbutton d-flex list-unstyled gap-3">';
		foreach($this->Global['stone'] as $stone){
			$id = $stone['stoneid'];
			$name = $stone['stone'];
			$price = $stone['varprice'];
			$html .= '<input type="radio" class="btn-check" onchange="getstone(\''.$name.'\','.$price.','.$id.')" name="stone" id="'.$id.'" value="'.$name.'" autocomplete="off" required>';
			$html .= '<label class="btn btn-outline-secondary" for="'.$id.'">'.$name.'</label> </li>';
			// $mystones[$stone['stoneid']] = $stone['stone'];
		}
		$html .= '</ul>';
		echo($html);
		// print_r(json_encode($mystones));
	}

	public function delivery(){
		$this->load->view('front/delivery', $this->Global);
	}
	
	public function enquiry(){
		$data = $_POST;
		$this->Global_model->enquiry($data);
		$data['toemail'] = array('lead@gdigitalindia.com','gdigitalindialeads@gmail.com',admin_email);
		$data['subject'] = sitename." Enquiry";
		$mail_message = sitename." Enquiry";
		$mail_message .="<br/>Name - ".$_REQUEST['name'];
		$mail_message .="<br/>Mobile - ".$_REQUEST['mobile'];
		$mail_message .="<br/>Email - ".$_REQUEST['email'];
		// $mail_message .="<br/>Message - ".$_REQUEST['message'];
		if(isset($_REQUEST['product'])){ 
		$mail_message .="<br/>Request For - ".$_REQUEST['product'];
		}
		$data['message'] = $mail_message;
		$this->Global_model->send_mail($data);
		redirect('thanks');
	}
	
	public function cartenquiry(){
		$data = $_POST;
		$data['product'] = $this->cart->contents();
		$html = '<table><tr style="text-align:start"><th style="border:1px solid">Sno</th><th style="border:1px solid">Product Name</th><th style="border:1px solid">Product Link</th><th style="border:1px solid">Price</th></tr>';
		$count = 1;
		foreach($data['product'] as $item){
		    $html.= '<tr>';
		    $html.= '<td style="border:1px solid">'.$count++.'</td>';
		    $html.= '<td style="border:1px solid">'.$item['name'].'</td>';
		    $html.= '<td style="border:1px solid">'.base_url('product/'.$item['link']).'</td>';
		    $html.= '<td style="border:1px solid">'.$item['price'].'</td>';
		    $html.= '</tr>';
		}
		
		// $html.= '<tr><td style="text-align: right;" colspan="6"> Total Amount: '.$this->cart->total().'</td><tr>';
		$html.= '</table>';
		$data['product'] = $html;
		$this->Global_model->enquiry($data);
		$data['toemail'] = array('lead@gdigitalindia.com','gdigitalindialeads@gmail.com',admin_email);
		$data['subject'] = sitename." Enquiry";
		$mail_message = sitename." Enquiry";
		$mail_message .="<br/>Name - ".$_REQUEST['name'];
		$mail_message .="<br/>Mobile - ".$_REQUEST['mobile'];
		$mail_message .="<br/>Email - ".$_REQUEST['email'];
		// $mail_message .="<br/>Message - ".$_REQUEST['message'];
		if(isset($data['product'])){ 
		$mail_message .="<br/>Request For - ".$data['product'];
		}
		$data['message'] = $mail_message;
		$this->Global_model->send_mail($data);
		redirect('thanks');
	}

	public function blogs()//index page
    {
        $this->Global['blogs'] = $this->Blog_model->get_posts();
        $this->Global['recentblogs'] = $this->Blog_model->get_posts();
        $this->load->view('front/blog', $this->Global);
    }

    function blog($slug)//single post page
    {
		$this->Global['blogs'] = $this->Blog_model->get_posts(5, 0);
        $this->Global['recentblogs'] = $this->Blog_model->get_posts();

        $this->Global['blog'] = $this->Blog_model->get_post($slug);
        $this->load->view('front/blog-detail', $this->Global);
    }

}	
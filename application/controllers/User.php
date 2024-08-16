<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require APPPATH . 'views/user/razorpay-php/Razorpay.php';

// use Razorpay\Api\Api;

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		// Load form validation ibrary & user model 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('Paypal_lib');
		$this->load->model('User_model');
		$this->load->model('Orders_model');
		$this->load->model('Admin_model');
		$this->load->model('Product_model');
		$this->Global = $this->Global_model->getdata();
		$this->Global['coupons'] = $this->Global_model->getactivecoupons();
		$this->Global['getproducts'] = $this->Product_model->getdata();
		$this->Global['getcategories'] = $this->Product_model->getchildcategories();
		$this->Global['maincategories'] = $this->Product_model->getmaincategories();
		$this->Global['pages'] = $this->Global_model->getpages();
		// $this->Global['sliders'] = $this->Global_model->getactivesliders();
		// $this->Global['gallery'] = $this->Global_model->getactivegallery();
		$this->Global['cartItems'] = $this->cart->contents();

		// User login status 
		$this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
	}

	public function index()
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {
			redirect('user/login');
		}
	}
	public function myaccount()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['AccountSubmit'])) {
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('password', 'password', 'trim|required');
			}
			$this->Global['orders'] = $this->Orders_model->getorders('userId', $_SESSION['userId']);
			$this->Global['account'] = $this->User_model->getdata($_SESSION['userId']);
			$this->load->view('user/myaccount', $this->Global);
		}
	}

	public function order_history()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->Global['orders'] = $this->Orders_model->getorders('userId', $_SESSION['userId']);
			$this->load->view('user/order-history', $this->Global);
		}
	}
	public function wishlist()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->Global['wishlist'] = $this->User_model->getwishlist();
			$this->load->view('user/wishlist', $this->Global);
		}
	}

	public function addtowishlist($req = null)
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$a = $this->User_model->checkwishlist($req, $_SESSION['userId']);

			if ($a == 1) {
				redirect(base_url('user/wishlist'));
			} else {
				$this->load->model('Product_model');
				$product = $this->Product_model->get_product($req);
				$data = array(
					'name'    => $product->name,
					'price'    => $product->saleprice,
					'color'    => $product->color,
					'image' => $product->featured_image,
					'userId'  => $_SESSION['userId'],
					'productslug'    => $product->link
				);
				$this->User_model->addtowishlist($data);
				redirect(base_url('user/wishlist'));
			}


			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function removewishlist($req = null)
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			$this->User_model->removewishlist($req);

			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function changepassword()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
			if (isset($_POST['oldpassword'])) {
				$this->form_validation->set_rules('oldpassword', 'password', 'required');
				$this->form_validation->set_rules('password', 'Password', 'trim|min_length[4]|required');
				$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[4]|matches[password]');
				if ($this->form_validation->run() == true) {
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $_SESSION['userEmail'],
							'password' => sha1($this->input->post('oldpassword')),
						)
					);
					$checkLogin = $this->User_model->getRows($con);
					if ($checkLogin) {
						$data['id'] = $_SESSION['userId'];
						$data['email'] = $_SESSION['userEmail'];
						$data['password'] = sha1($this->input->post('password'));
						$this->User_model->updateUser($data);
						$this->session->set_flashdata('success_msg', ' Password Changed Successfully.');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the fields correctly.');
				}
			}
			$products = $this->db->query("Select * from product");
			$data['totalproducts'] = $products->num_rows();
			$this->load->view('user/newpassword', $this->Global);
		}
	}
	public function login()
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {
			$data = array();
			// If login request submitted 
			if (isset($_POST['loginSubmit'])) {
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
				$this->form_validation->set_rules('password', 'password', 'trim|required');

				if ($this->form_validation->run() == true) {
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $this->input->post('email'),
							'password' => sha1($this->input->post('password')),
						)
					);
					$checkLogin = $this->User_model->getRows($con);
					if ($checkLogin) {
						if ($checkLogin['status'] == 2) {
							$this->session->set_flashdata('error_msg', 'Your Account is Blocked');
							redirect('user/login');
						} else if ($checkLogin['status'] == 0) {
							$this->session->set_userdata('email', $checkLogin['email']);
							redirect('user/verifyaccount');
						} else {
							$this->session->set_userdata('isUserLoggedIn', TRUE);
							$this->session->set_userdata('userId', $checkLogin['id']);
							$this->session->set_userdata('userName', $checkLogin['firstname'] . " " . $checkLogin['lastname']);
							$this->session->set_userdata('userEmail', $checkLogin['email']);
							$this->session->set_userdata('userPhone', $checkLogin['phone']);
							redirect('cart');
						}
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('user/sign-in', $this->Global);
		}
	}

	public function register()
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {

			$data = array();
			// If login request submitted 
			if (isset($_POST['registerSubmit'])) {

				$this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('phone', 'Mobile No', 'trim|required|is_unique[users.phone]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
				$this->form_validation->set_message('is_unique', 'This %s is already taken');


				if ($this->form_validation->run() == true) {
					unset($_POST["registerSubmit"]);
					unset($_POST["confirmpassword"]);
					$_POST["password"] = sha1($_POST["password"]);
					$_POST["code"] = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
					$this->User_model->register($_POST);
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $this->input->post('email'),
						)
					);
					$registerUser = $this->User_model->getRows($con);
					if ($registerUser) {
						$data['code'] = $_POST["code"];
						$data['firstname'] = $registerUser['firstname'];
						$data['email'] = $registerUser['email'];
						$data['from'] = $this->Global['email'];
						$this->User_model->verifyaccount($data);
						$this->session->set_userdata('email', $registerUser['email']);
						redirect('user/verifyaccount');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('user/register', $this->Global);
		}
	}

	public function verifyaccount($link = null)
	{
		if (isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/myaccount');
		} else {
			if (!empty($this->input->post("resendotp"))) {
				$user = $this->User_model->getuser($_SESSION['email']);
				$data['code'] = $user["code"];
				$data['firstname'] = $user['firstname'];
				$data['email'] = $user['email'];
				$data['from'] = $this->Global['email'];
				$this->User_model->verifyaccount($data);
				redirect('user/verifyaccount');
			}
			if (isset($_POST['code'])) {
				$this->form_validation->set_rules('code', 'Verification Code', 'trim|required');
				if ($this->form_validation->run() == true) {
					$code = $_POST['code'];
				} else {
					$this->session->set_flashdata('error_msg', ' Please enter code.');
				}
			} else {
				$code = $link;
			}
			if (isset($code)) {
				$registerUser = $this->User_model->verify($code);
				if ($registerUser) {
					$this->session->set_userdata('isUserLoggedIn', TRUE);
					$this->session->set_userdata('userId', $registerUser['id']);
					$this->session->set_userdata('userName', $registerUser['firstname'] . " " . $registerUser['lastname']);
					$this->session->set_userdata('userEmail', $registerUser['email']);
					$this->session->set_userdata('userPhone', $registerUser['phone']);
					redirect('user/myaccount');
				} else {
					$this->session->set_flashdata('error_msg', 'Incorrect code. Please check your Email Account');
				}
			}


			// Load view 
			$this->load->view('user/verifyaccount', $this->Global);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('isUserLoggedIn');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userEmail');
		$this->session->unset_userdata('userPhone');
		$this->session->sess_destroy();
		redirect('user/login', $this->Global);
	}
	public function forgot_password()
	{
		if (isset($_POST['email'])) {
			$email = $this->input->post('email');
			$findemail = $this->User_model->ForgotPassword($email);
			if ($findemail) {
				$this->User_model->sendpassword($findemail);
				redirect(base_url() . 'user/login');
			} else {
				$this->session->set_flashdata('error_msg', ' Email not found!');
				redirect(base_url() . 'user/forgot_password', 'refresh');
			}
		}
		$this->load->view('user/forgot', $this->Global);
	}

	public function changecaddress()
	{
		$caddress = "";
		foreach ($_POST as $key => $value) {
			$caddress = $caddress . " " . ucfirst($key) . " - " . $value . "<br/>";
		}
		$address = "\"" . $caddress . "\"";
		$id = "\"" . $_SESSION['userId'] . "\"";
		$this->db->query("Update users set currentaddress = $address where id = $id");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function sameaddress()
	{
		$con = array(
			'returnType' => 'single',
			'conditions' => array(
				'email' => $_SESSION['userEmail'],
			)
		);
		$user_data = $this->User_model->getRows($con);
		$currentaddress = $user_data['currentaddress'];
		$id = $_SESSION['userId'];
		$this->db->query("Update users set shippingaddress = '$currentaddress' where id = $id");
		redirect($_SERVER['HTTP_REFERER']);
	}	

	public function changesaddress()
	{
		$saddress = "";
		foreach ($_POST as $key => $value) {
			$saddress = $saddress . " " . ucfirst($key) . " - " . $value . "<br/>";
		}
		$address = "\"" . $saddress . "\"";
		$id = $_SESSION['userId'];
		$this->db->query("Update users set shippingaddress = $address where id = $id");
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function checkout()
	{
		if (!isset($_SESSION['isUserLoggedIn'])) {
			redirect('user/login');
		} else {
		    if(isset($_SESSION['shipping_charge']) && $_SESSION['shipping_charge']!=0){
		        
		    }else{
			$_SESSION['shipping_charge'] = 0;
		    }
			$con = array(
				'returnType' => 'single',
				'conditions' => array(
					'email' => $_SESSION['userEmail'],
				)
			);
			$user_data = $this->User_model->getRows($con);
			$_SESSION['currentaddress'] = $user_data['currentaddress'];
			$_SESSION['shippingaddress'] = $user_data['shippingaddress'];
			$this->Global['name'] = $_SESSION['userName'];
			$this->Global['userEmail'] = $_SESSION['userEmail'];
			$this->Global['phone'] = $_SESSION['userPhone'];
			if (!isset($_SESSION['discount'])) {
				$_SESSION['discount'] = 0;
			}
			$amount = 	$this->cart->format_number($this->cart->total() + $_SESSION['shipping_charge'] - $_SESSION['discount']);
			$amount = str_replace(",", "", $amount);
			$amount = floatval($amount);

			if ($amount < 1.00) {
				redirect('cart');
			}
			$_SESSION['totalAmount'] = $amount;
			// $api = new Api(RAZOR_KEY_ID, RAZOR_KEY_SECRET);
			// $this->Global['order'] = $api->order->create(array(
			// 	'receipt' => '123',
			// 	'amount' => ($amount * 100),
			// 	'currency' => 'USD',
			// 	'notes' => array('key1' => 'value3', 'key2' => 'value2')
			// ));
			// echo('<pre>');
			// print_r($this->Global['order']['id']);

			$this->Global['order'] = array(
				'id' => 'order_'.rand('999999','999999999999'),
				'entity' => 'order',
				'amount' => ($amount),
				'amount_paid' => '0',
				'amount_due' => ($amount),
				'currency' => 'USD',
				'receipt' => '123',
				'status' => 'created',
				'attempts' => '0'
			);
			
			$_SESSION['orderid'] = $this->Global['order']['id'];
			if (!isset($_SESSION['isUserLoggedIn'])) {
				redirect('user/login');
			} else {
				$this->Global['cartItems'] = $this->cart->contents();
				$this->load->view('user/checkout', $this->Global);
			}
		}
	}

	public function details($razorpay_order_id)
	{
		$this->Global['items'] = $this->Orders_model->getitems($razorpay_order_id);
		$this->Global['order'] = $this->Orders_model->getorder($razorpay_order_id)[0];
		$this->load->view('user/order', $this->Global);
	}

	function buyProduct($id)
	{
		$data['order_id'] = $_SESSION['orderid'];
		$this->Orders_model->saveOrder($data['order_id']);
		foreach ($this->cart->contents() as $cartItem) {
			$cartItem['userId'] = $_SESSION['userId'];
			$cartItem['order_id'] = $_SESSION['orderid'];
			$this->Orders_model->orderitems($cartItem);
		}
				$data['toemail'] = admin_username;
                $data['subject'] = "New order recieved on Rajasthan Traditional Dresses";
                $mail_message = 'You have recieved a new order on Rajasthan Traditional Dresses with the order id ('.$_SESSION['orderid'].') Amount $'. number_format((float)$_SESSION['totalAmount'], 2, '.', '');
                $mail_message .= '<br/>Thanks & Regards';
                $mail_message .= '<br/> Rajasthan Traditional Dresses';
                $data['message'] = $mail_message;
				$this->Admin_model->send_mail($data);
		//Set variables for paypal form
		$returnURL = base_url() . 'paypal/success'; //payment success url
		$cancelURL = base_url() . 'paypal/cancel'; //payment cancel url
		$notifyURL = base_url() . 'paypal/ipn'; //ipn url
		//get particular product data
		$logo = base_url('assets/front/img/route-logo.png');
		$this->paypal_lib->add_field('return', $returnURL);
		$this->paypal_lib->add_field('cancel_return', $cancelURL);
		$this->paypal_lib->add_field('notify_url', $notifyURL);
		$this->paypal_lib->add_field('item_name', $id);
		$this->paypal_lib->add_field('custom', $_SESSION['userId']);
		$this->paypal_lib->add_field('billingAddress', $_SESSION['currentaddress']);
		$this->paypal_lib->add_field('item_number',  $id);
		$this->paypal_lib->add_field('amount', floatval($this->cart->total() + $_SESSION['shipping_charge'] - $_SESSION['discount']));
		$this->paypal_lib->image($logo);
		$this->paypal_lib->paypal_auto_form();
	}
	function success()
	{
		//get the transaction data
		$paypalInfo = $this->input->post();
		$items = $this->Orders_model->getitems($paypalInfo['item_number']);
	    foreach ($items as $cartItem) {
			$product = $this->Product_model->get_product($cartItem['slug']);
			$datas = array(
			'id'    => $product->id,
			'quantity'    => $product->quantity - $cartItem['qty']
		    );
		 
		}
		$this->User_model->updateqnt($datas);
		$con = array(
			'returnType' => 'single',
			'conditions' => array(
				'id' => $paypalInfo['custom'],
			)
		);
		$checkLogin = $this->User_model->getRows($con);
		$this->session->set_userdata('isUserLoggedIn', TRUE);
		$this->session->set_userdata('userId', $checkLogin['id']);
		$this->session->set_userdata('userName', $checkLogin['firstname'] . " " . $checkLogin['lastname']);
		$this->session->set_userdata('userEmail', $checkLogin['email']);
		$this->session->set_userdata('userPhone', $checkLogin['phone']);
		$this->session->set_userdata('shippingAddress', $checkLogin['shippingaddress']);
		$this->session->set_userdata('billingAddress', $checkLogin['currentaddress']);
		$data['order_id'] = $paypalInfo['item_number'];
		$data['transactionId'] = $paypalInfo["txn_id"];
		$data['payment_status'] = $paypalInfo['payment_status'];
		$this->Orders_model->updateOrder($data);
		// print_r($a);
		// print_r($data);
		// die();
		
		redirect('user/order-history/details/' . $paypalInfo['item_number']);
	}
	function cancel()
	{
		redirect(base_url() . 'user/checkout');
		//if transaction cancelled
		// $this->load->view('paypal/cancel');
	}

	// function cod($order_id){
	// 		$this->Orders_model->codOrder($order_id);
	// 		foreach ($this->cart->contents() as $cartItem) {
	// 			$cartItem['userId'] = $_SESSION['userId'];
	// 			$cartItem['order_id'] = $order_id;
	// 			$this->Orders_model->orderitems($cartItem);
	// 		}
	// 		$data['toemail'] = admin_username;
    //             $data['subject'] = "New order recieved on Rajasthan Traditional Dresses";
    //             $mail_message .= 'You have recieved a new order on Rajasthan Traditional Dresses with the order id ('.$order_id.') Amount $'. number_format((float)$_SESSION['totalAmount'], 2, '.', '');
    //             $mail_message .= '<br/>Thanks & Regards';
    //             $mail_message .= '<br/> Rajasthan Traditional Dresses';
    //             $data['message'] = $mail_message;
	// 		$this->Admin_model->send_mail($data);
			
	// 		$this->cart->destroy();
	// 		$this->session->unset_userdata('special_note');
	// 		$this->session->unset_userdata('shipping_charge');
	// 		$this->session->unset_userdata('discount');
	// 		$this->session->unset_userdata('totalAmount');
	// 		$this->session->unset_userdata('coupon');
	// 		redirect('user/order-history/details/' . $order_id);
	// }
	
	function reorder($orderid){
	    $items = $this->Orders_model->getitems($orderid);
        $this->cart->destroy();
	    foreach ($items as $cartItem) {
			$product = $this->Product_model->get_product($cartItem['slug']);
			$data = array(
			'id'    => $product->id,
			'qty'    => $cartItem['qty'],
			'price'    => $product->saleprice,
			'name'    => $product->name,
			'link' => $product->link,
			'image' => $product->featured_image,
			'shipping_charge' => $product->shipping_charges,
			'options' =>array('plating' => $product->color, 'size' => $cartItem['size'])
		    );
		 $this->cart->insert($data);
		}
		redirect('cart');
	}
	
	function shippingtype(){
	   $this->session->set_userdata('shipping_charge', $_POST['charge']);
	   echo ("₹".($this->cart->total()) + $_SESSION['shipping_charge'] - $_SESSION['discount']);
	}

}

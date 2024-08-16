<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		// Load form validation ibrary & user model 
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->model('Orders_model');
		$this->load->model('Product_model');
		$this->load->model('Blog_model');

		// Admin login status 
		$this->isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn');
		$this->Global = $this->Global_model->getdata();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		if (isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/dashboard');
		} else {
			redirect('admin/login');
		}
	}
	public function dashboard()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$data['totalsales'] = $this->Admin_model->totalsales()->amount;
			$data['totalusales'] = $this->db->query("Select SUM(totalAmount) AS amount from orders where currency = 'usd'")->result()[0]->amount;
			$data['customer'] = $this->Admin_model->customer();
			$products = $this->db->query("Select * from product");
			$data['totalproducts'] = $products->num_rows();
			$data['products'] = $this->Admin_model->getproducts();
			$totalcategory = $this->db->query("Select * from category where parent is null");
			$data['totalcategory'] = $totalcategory->num_rows();
			$totalorders = $this->db->query("Select * from orders");
			$data['totalorders'] = $totalorders->num_rows();
			$data['todayorders'] = count($data['orders'] = $this->Orders_model->todaysorders());
			$totalsubcategory = $this->db->query("Select * from category where parent is not null");
			$data['totalsubcategory'] = $totalsubcategory->num_rows();
			$products = $this->db->query("Select * from product");
			$data['totalproducts'] = $products->num_rows();
			$this->load->view('admin/dashboard', $data);
		}
	}
    public function appointments()
    {
    	if (!isset($_SESSION['isAdminLoggedIn'])) {
    		redirect('admin/login');
    	} else {
    		$query = $this->db->query("Select * from appointment order by date desc");
    		$data['appointments'] = $query->result_array();
    		$this->load->view('admin/appointments', $data);
    	}
    }
    public function viewmessage($req){
	    if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$query = $this->db->query("Select * from appointment where id='$req'");
			$data['message'] = $query->row_array();
			$this->load->view('admin/view-message', $data);
		}
	}

	public function productenquiry()
    {
    	if (!isset($_SESSION['isAdminLoggedIn'])) {
    		redirect('admin/login');
    	} else {
    		$query = $this->db->query("Select * from enquiry order by date_added desc");
    		$data['appointments'] = $query->result_array();
    		$this->load->view('admin/product-enquiry', $data);
    	}
    }
    public function viewproductenquiry($req){
	    if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$query = $this->db->query("Select * from enquiry where id='$req'");
			$data['message'] = $query->row_array();
			$this->load->view('admin/view-product-enquiry', $data);
		}
	}
	function get_autocomplete()
	{
		if (isset($_GET['term'])) {
			$result = $this->Product_model->search_title($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row)
					$arr_result[] = $row->link;
				echo json_encode($arr_result);
			}
		}
	}
	public function about()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['name'] = 'about';
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				} else {
					unset($data['image']);
				}
				unset($data["submit"]);
				$this->Global_model->editpage($data);
				redirect('admin/about');
			}
			$a = $this->Global_model->getpage("about");
			$data["pagecontent"] = $a[0];
			$this->load->view('admin/about', $data);
		}
	}
	public function privacy()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['name'] = 'privacy';
				unset($data["submit"]);
				$this->Global_model->editpage($data);
				redirect('admin/privacy');
			}
			$a = $this->Global_model->getpage("privacy");
			$data["pagecontent"] = $a[0];
			$this->load->view('admin/page', $data);
		}
	}
	public function refund()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['name'] = 'refund';
				unset($data["submit"]);
				$this->Global_model->editpage($data);
				redirect('admin/refund');
			}
			$a = $this->Global_model->getpage("refund");
			$data["pagecontent"] = $a[0];
			$this->load->view('admin/page', $data);
		}
	}
	public function shipping()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['name'] = 'shipping';
				unset($data["submit"]);
				$this->Global_model->editpage($data);
				redirect('admin/shipping');
			}
			$a = $this->Global_model->getpage("shipping");
			$data["pagecontent"] = $a[0];
			$this->load->view('admin/page', $data);
		}
	}
	public function terms()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['name'] = 'terms';
				unset($data["submit"]);
				$this->Global_model->editpage($data);
				redirect('admin/terms');
			}
			$a = $this->Global_model->getpage("terms");
			$data["pagecontent"] = $a[0];
			$this->load->view('admin/page', $data);
		}
	}
	public function customerservices()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['name'] = 'customerservices';
				unset($data["submit"]);
				$this->Global_model->editpage($data);
				redirect('admin/customerservices');
			}
			$a = $this->Global_model->getpage("customerservices");
			$data["pagecontent"] = $a[0];
			$this->load->view('admin/page', $data);
		}
	}
	public function login()
	{
		if (isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/dashboard');
		} else {
			$data = array();
			// If login request submitted 
			if (isset($_POST['loginSubmit'])) {
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
				$this->form_validation->set_rules('password', 'password', 'required');

				if ($this->form_validation->run() == true) {
					$con = array(
						'returnType' => 'single',
						'conditions' => array(
							'email' => $this->input->post('email'),
							'password' => sha1($this->input->post('password')),
						)
					);
					$checkLogin = $this->Admin_model->getRows($con);
					if ($checkLogin) {
						$this->session->set_userdata('isAdminLoggedIn', TRUE);
						$this->session->set_userdata('userId', $checkLogin['id']);
						$this->session->set_userdata('adminEmail', $checkLogin['email']);
						redirect('admin/dashboard/');
					} else {
						$this->session->set_flashdata('error_msg', ' Wrong email or password, please try again.');
					}
				} else {
					$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
				}
			}

			// Load view 
			$this->load->view('admin/sign-in', $data);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('isAdminLoggedIn');
		$this->session->unset_userdata('userId');
		$this->session->unset_userdata('adminEmail');
		$this->session->sess_destroy();
		redirect('admin/login');
	}
	public function forgot_password()
	{
		if (isset($_POST['email'])) {
			$con = array(
				'returnType' => 'single',
				'conditions' => array(
					'email' => $this->input->post('email'),
				)
			);
			$checkLogin = $this->Admin_model->getRows($con);
			if ($checkLogin) {
				$this->Admin_model->sendpassword($checkLogin);
			} else {
				$this->session->set_flashdata('error_msg', ' Email not found!');
				redirect(base_url() . 'admin/login', 'refresh');
			}
		}
		$this->load->view('admin/forgot');
	}
	public function change_password()
	{

		if (isset($_POST['oldpassword'])) {
			$this->form_validation->set_rules('oldpassword', 'password', 'required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
			$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[password]');
			if ($this->form_validation->run() == true) {
				$con = array(
					'returnType' => 'single',
					'conditions' => array(
						'email' => $_SESSION['adminEmail'],
						'password' => sha1($this->input->post('oldpassword')),
					)
				);
				$checkLogin = $this->Admin_model->getRows($con);
				if ($checkLogin) {
					$data['id'] = $_SESSION['userId'];
					$data['email'] = $_SESSION['adminEmail'];
					$data['password'] = sha1($this->input->post('password'));
					$this->Admin_model->updateAdmin($data);
					$this->session->set_flashdata('success_msg', ' Password Changed Successfully.');
				} else {
					$this->session->set_flashdata('error_msg', ' Wrong password, please try again.');
				}
			} else {
				$this->session->set_flashdata('error_msg', ' Please fill all the mandatory fields.');
			}
		}
		$this->load->view('admin/change-password');
	}

	public function products()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['products'] = $this->Product_model->getdata();
			$this->load->view('admin/products', $data);
		}
	}
	public function coupons()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['coupons'] = $this->Product_model->getcoupons();
			$this->load->view('admin/coupons', $data);
		}
	}

	public function categories()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getmaincategories();
			$data['title'] = "Categories";
			$this->load->view('admin/category', $data);
		}
	}

	public function subcategories()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getsubcategories();
			$data['title'] = "Sub-categories";
			$this->load->view('admin/subcategory', $data);
		}
	}
	public function childcategories()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getchildcategories();
			$data['title'] = "Child-categories";
			$this->load->view('admin/childcategory', $data);
		}
	}

	public function colors()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Admin_model');
			$data['colors'] = $this->Admin_model->getcolors();
			$data['title'] = "Colors";
			$this->load->view('admin/colors', $data);
		}
	}

	public function sizes()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Admin_model');
			$data['sizes'] = $this->Admin_model->getsizes();
			$data['title'] = "Sizes";
			$this->load->view('admin/sizes', $data);
		}
	}

	public function stones()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Admin_model');
			$data['stones'] = $this->Admin_model->getgemstones();
			$data['title'] = "Sizes";
			$this->load->view('admin/stones', $data);
		}
	}

	public function addproducts()
	{
		$data['platings'] = $this->Admin_model->getplatings();
		$data['gemstones'] = $this->Admin_model->getgemstones();
		$data['colors'] = $this->Admin_model->getcolors();
		$data['sizes'] = $this->Admin_model->getsizes();
// 		$data['maincategories'] = $this->Product_model->getmaincategories();
		$data['categories'] = $this->Product_model->getsubcategories();
		$data['products'] = $this->Product_model->getdata();
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
			    // if(isset($_POST['trending'])){
			    //     if ($_POST['trending'] != "on") {
				// 	    $_POST['trending'] = NULL;
				//     }
			    // }
			    // if(isset($_POST['featured'])){
				//     if ($_POST['featured'] != "on") {
				// 	    $_POST['featured'] = NULL;
				//     }
			    // }
				if(isset($_POST['new_arrival'])){
				    if ($_POST['new_arrival'] != "on") {
					    $_POST['new_arrival'] = NULL;
				    }
				}
				
				$title = $_POST['name'];
				$table = "product";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				// $qr = $this->create_qr($slug);
				$_POST['plating'] =  json_encode($_POST['plating']);
				// $_POST['similiar'] =  json_encode($_POST['similiar']);
				$data = $_POST;
				// $data['qrimage'] = $qr;
				$data['qrimage'] = "";
				$data['link'] = $slug;
				
				$image = $this->upload('featured_image', 'images');
				$image = $this->upload('featured_image', 'images');
				$data['featured_image'] = $image['file_name'];

				// $image = $this->upload('image', 'images');
				// $data['featured_image'] = $image['file_name'];
				// if (!empty($_FILES['pdf']['name'])) {
				// 	$pdf = $this->upload('pdf', 'pdf');
				// 	$data['pdf'] = $pdf['file_name'];
				// } else {
				// 	unset($data["pdf"]);
				// }
				if (!empty($_FILES['var1']['name'])) {
					$var1 = $this->upload('var1', 'images');
					$data['var1'] = $var1['file_name'];
				} else {
					unset($data["var1"]);
				}
				if (!empty($_FILES['var2']['name'])) {
					$var2 = $this->upload('var2', 'images');
					$data['var2'] = $var2['file_name'];
				} else {
					unset($data["var2"]);
				}
				if (!empty($_FILES['var3']['name'])) {
					$var3 = $this->upload('var3', 'images');
					$data['var3'] = $var3['file_name'];
				} else {
					unset($data["var3"]);
				}
				if (!empty($_FILES['var4']['name'])) {
					$var4 = $this->upload('var4', 'images');
					$data['var4'] = $var4['file_name'];
				} else {
					unset($data["var4"]);
				}
				unset($data["submit"]);
				unset($data["varsize"]);
				unset($data["varstone"]);
				unset($data["varprice"]);
				$this->load->model('Product_model');
				$pid = $this->Admin_model->addproduct($data);
				$priceArr=$_POST['varprice']; 
				$size_idArr=$_POST['varsize']; 
				$stone_idArr=$_POST['varstone']; 

				// foreach($priceArr as $key=>$val){
				// 	$productAttrArr=[];
				// 	$productAttrArr['products_id']=$slug;
				// 	$productAttrArr['varprice']=$priceArr[$key];
				// 	$productAttrArr['varstone']=$stone_idArr[$key];
					
				// 	if($size_idArr[$key]==''){
				// 		$productAttrArr['varsize']=0;
				// 	}else{
				// 		$productAttrArr['varsize']=$size_idArr[$key];
				// 	}
				// 		$this->load->model('Product_model');
				// 		$this->Admin_model->addproductattri($productAttrArr);
				// }
				redirect('admin/products');
			}
			$this->load->model('Product_model');
			
			// $data['subcategories'] = $this->Product_model->getchildcategories();

			// $arr = $this->categoryTree();
			// $data['categories'] = $arr;
			$this->load->view('admin/add-product', $data);
		}
	}

	public function editproduct($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
		    $data['platings'] = $this->Admin_model->getplatings();
    		$data['gemstones'] = $this->Admin_model->getgemstones();
    		$data['colors'] = $this->Admin_model->getcolors();
    		$data['sizes'] = $this->Admin_model->getsizes();
    // 		$data['maincategories'] = $this->Product_model->getmaincategories();
    		$data['categories'] = $this->Product_model->getsubcategories();
			$data['products'] = $this->Product_model->getdata();
            
			if (isset($_POST['submit'])) {
			    // if(!isset($_POST['trending'])){
			    //     $_POST['trending'] = NULL;
			    // }
			    // if(!isset($_POST['featured'])){
			    //     $_POST['featured'] = NULL;
			    // }
			    if(!isset($_POST['new_arrival'])){
			        $_POST['new_arrival'] = NULL;
			    }
			 //   if(isset($_POST['trending'])){
			 //       if ($_POST['trending'] != "on") {
				// 	    $_POST['trending'] = NULL;
				//     }
			 //   }
			 //   if(isset($_POST['featured'])){
				//     if ($_POST['featured'] != "on") {
				// 	    $_POST['featured'] = NULL;
				//     }
			 //   }
				// if(isset($_POST['new_arrival'])){
				//     if ($_POST['new_arrival'] != "on") {
				// 	    $_POST['new_arrival'] = NULL;
				//     }
				// }
				// $_POST['size'] =  json_encode($_POST['size']);
				// $_POST['similiar'] =  json_encode($_POST['similiar']);
				// $_POST['color'] =  json_encode($_POST['color']);
				$_POST['plating'] =  json_encode($_POST['plating']);
				$data = $_POST;
				
				if (!empty($_FILES['featured_image']['name'])) {
					$image = $this->upload('featured_image', 'images');
					$data['featured_image'] = $image['file_name'];
				}
				if (!empty($_FILES['pdf']['name'])) {
					$pdf = $this->upload('pdf', 'pdf');
					$data['pdf'] = $pdf['file_name'];
				} else {
					unset($data["pdf"]);
				}
				unset($data["submit"]);
				unset($data["varid"]);
				unset($data["varsize"]);
				unset($data["varstone"]);
				unset($data["varprice"]);
				$this->load->model('Product_model');
				$this->Admin_model->editproduct($data);
				$priceArr=$_POST['varprice']; 
				$size_idArr=$_POST['varsize']; 					
				$stone_idArr=$_POST['varstone']; 					

				// foreach($priceArr as $key=>$val){
				// 	$productAttrArr=[];
				// 	$productAttrArr['products_id']=$data["link"];

				// 	$productAttrArr['varprice']=$priceArr[$key];

					
				// 	if($size_idArr[$key]==''){
				// 		$productAttrArr['varsize']=0;
				// 	}else{
				// 		$productAttrArr['varsize']=$size_idArr[$key];
				// 	}
					
				// 	if($stone_idArr[$key]==''){
				// 		$productAttrArr['varstone']=0;
				// 	}else{
				// 		$productAttrArr['varstone']=$stone_idArr[$key];
				// 	}


				// 	if(isset($_POST['varid'][$key])){
				// 		$productAttrArr['varid'] = $_POST['varid'][$key];
				// 		$this->load->model('Product_model');
				// 		$this->Admin_model->editproductattri($productAttrArr);
				// 	}
				// 	else if($productAttrArr['varprice'] != ''){
				// 		$this->load->model('Product_model');
				// 		$this->Admin_model->addproductattri($productAttrArr);
				// 	}
				// }
				
				redirect('admin/products');
			}
			$this->load->model('Product_model');
			// $data['categories'] = $this->categoryTree();
			$product = $this->Product_model->getdata('link', $slug);
			$data['product'] = $product[0];
			$data['productAttrArr'] = $this->Product_model->getattributes($data['product']['link']);
			// print_r($data['productAttrArr']);
			// die();
			$this->load->view('admin/edit-product', $data);
		}
	}
	
	public function addcategory()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = $_POST['name'];
				$table = "category";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['parent'] = "";
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->addcategory($data);
				redirect('admin/categories');
			}
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getmaincategories();
			$this->load->view('admin/add-category', $data);
		}
	}

	public function addsubcategory()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = $_POST['name'];
				$table = "category";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->load->model('Product_model');
				$a = $this->Admin_model->addcategory($data);
				redirect('admin/subcategories');
			}
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getmaincategories();
			$this->load->view('admin/add-sub-category', $data);
		}
	}


	public function editcategory($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$data['parent'] = "";
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editcategory($data);
				redirect('admin/categories');
			}
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getmaincategories();
			$category = $this->Product_model->get_category($slug);
			$data['cat'] = json_decode(json_encode($category), true);
			$this->load->view('admin/edit-category', $data);
		}
	}

	public function editsubcategory($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editcategory($data);
				redirect('admin/subcategories');
			}
			$this->load->model('Product_model');
			$data['categories'] = $this->Product_model->getmaincategories();
			$category = $this->Product_model->get_category($slug);
			$data['cat'] = json_decode(json_encode($category), true);
			$this->load->view('admin/edit-sub-category', $data);
		}
	}

	
	public function addcolor()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = $_POST['name'];
				$table = "color";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->addcolor($data);
			}
			$this->load->view('admin/add-color');
		}
	}
	public function addsize()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = $_POST['name'];
				$table = "size";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->addsize($data);
			}
			$this->load->view('admin/add-size');
		}
	}

	public function addstone()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = $_POST['name'];
				$table = "stone";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->addstone($data);
			}
			$this->load->view('admin/add-stone');
		}
	}

	public function editstone($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editstone($data);
				redirect('admin/stones');
			}
			$this->load->model('Product_model');
			$stone = $this->Product_model->get_stone($slug);
			$data['stone'] = json_decode(json_encode($stone), true);
			$this->load->view('admin/edit-stone', $data);
		}
	}

	public function editcolor($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editcolor($data);
				redirect('admin/colors');
			}
			$this->load->model('Product_model');
			$color = $this->Product_model->get_color($slug);
			$data['color'] = json_decode(json_encode($color), true);
			$this->load->view('admin/edit-color', $data);
		}
	}	

	public function editsize($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				unset($data["submit"]);
				$this->load->model('Product_model');
				$this->Admin_model->editsize($data);
				redirect('admin/sizes');
			}
			$this->load->model('Product_model');
			$size = $this->Product_model->get_size($slug);
			$data['size'] = json_decode(json_encode($size), true);
			$this->load->view('admin/edit-size', $data);
		}
	}

	public function addcoupon()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
			    if(isset($_POST['offer_section'])){
			        if ($_POST['offer_section'] != "on") {
					    $_POST['offer_section'] = NULL;
				    }
			    }
				$this->form_validation->set_rules('name', 'Coupon Name', 'trim|required|is_unique[coupons.name]');
				if ($this->form_validation->run() == true) {
				$data = $_POST;
				unset($data["submit"]);
				$this->Admin_model->addcoupon($data);
				}
			}
			$this->load->view('admin/add-coupon');
		}
	}

	public function editcoupon($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
			 //   if(isset($_POST['offer_section'])){
			        if ($_POST['offer_section'] != "on") {
					    $_POST['offer_section'] = NULL;
				    }
			 //   }
				$data = $_POST;
				unset($data["submit"]);
				$this->Admin_model->editcoupon($data);
				redirect('admin/coupons');
			}
			$this->load->model('Product_model');
			$data['coupon'] = $this->Product_model->getcoupon($slug);
			$this->load->view('admin/edit-coupon', $data);
		}
	}
	
	public function shows()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$data['shows'] = $this->Product_model->getshows();
			$this->load->view('admin/shows', $data);
		}
	}
	
	public function addshow()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
			    if(isset($_POST['offer_section'])){
			        if ($_POST['offer_section'] != "on") {
					    $_POST['offer_section'] = NULL;
				    }
			    }
				$data = $_POST;
				unset($data["submit"]);
				$this->Admin_model->addshow($data);
			}
			$this->load->view('admin/add-show');
		}
	}

	public function editshow($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
			 //   if(isset($_POST['offer_section'])){
			        if ($_POST['offer_section'] != "on") {
					    $_POST['offer_section'] = NULL;
				    }
			 //   }
				$data = $_POST;
				unset($data["submit"]);
				$this->Admin_model->editshow($data);
				redirect('admin/shows');
			}
			$this->load->model('Product_model');
			$data['show'] = $this->Product_model->getshow($slug);
			$this->load->view('admin/edit-show', $data);
		}
	}
	
	

	public function upload($file, $dir = 'images',$slider = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$config['upload_path']          = FCPATH . 'assets/front/' . $dir;
			// $config['allowed_types']        = 'gif|jpg|png|jpeg|webp|svg';
			$config['allowed_types']        = '*';
			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			if (!$this->upload->do_upload($file)) {
				$data['error_message'] =  $this->upload->display_errors();
				$this->session->set_flashdata('error_msg', $data['error_message']);
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				if($dir == 'images' && $slider== NULL){
					$configer =  array(
						'image_library' => 'gd2',
						'source_image'  =>  $this->upload->data()['full_path'],
						'maintain_ratio' =>  TRUE,
						'height'       =>  '1100',
						'new_image' => $this->upload->data()['full_path'],
					);
					$this->load->library('image_lib', $configer);
					$a = $this->image_lib->resize();
					if($a == 1){
						return $this->upload->data();
					}
				}
				return $this->upload->data();
			}
		}
	}

	public function create_slug($name, $table, $field)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			// Use this code to create a slug
			// $title = "My name is Vishwas Moorjani";
			// $table = "product";
			// $field = "link";
			// $a =  $this->create_slug($title, $table, $field);

			$slug = $name;
			$slug = url_title($name);
			$key = NULL;
			$value = NULL;
			$i = 0;
			$params = array();
			$params[$field] = $slug;

			if ($key) $params["$key !="] = $value;

			while ($this->db->from($table)->where($params)->get()->num_rows()) {
				if (!preg_match('/-{1}[0-9]+$/', $slug))
					$slug .= '-' . ++$i;
				else
					$slug = preg_replace('/[0-9]+$/', ++$i, $slug);
				$params[$field] = $slug;
			}

			return strtolower($slug);
		}
	}

	public function create_qr($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->library('ciqrcode');
			$params['data'] = base_url('product/') . $slug;
			$params['level'] = 'H';
			$params['size'] = 10;
			$name = $slug . '.png';
			$params['savename'] = FCPATH . 'assets/front/img/qr/' . $name;
			$this->ciqrcode->generate($params);
			return $name;
		}
	}

	public function activate($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->activate($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	public function deactivate($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->deactivate($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function delete($table = NULL, $link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->delete($table, $link);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function removesettingsdata($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removesettingsdata($link);
			echo ("done");
		}
	}

	public function removeimg($link = NULL,$field = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removeplatingimages('product', $link, $field);
			echo ("done");
		}
	}
	public function removecatimg($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removecat('category', $link);
			echo ("done");
		}
	}
	public function removeabout($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->db->query("Update pages set $slug = NULL where name = 'about'");
			echo ("done");
		}
	}
	public function removeimage($link = NULL, $row = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$images = $this->Product_model->getimages($link);
			$target_value = $row;
			$a = "";
			$array = (json_decode($images->images));
			foreach ($array as $key => $value) {
				if ($value == $target_value) {
					unset($array[$key]);
				} else {
					$a = $a . json_encode($value) . ",";
				}
			}
			$a = "[" . (trim($a, ",")) . "]";
			$this->Product_model->saveimage($link, $a);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function removeslider($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global_model->removeimg('slider', $link);
			echo ("done");
		}
	}
	
	public function removecertificate($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global_model->removeimg('certificates', $link);
			echo ("done");
		}
	}

	public function removepdf($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removepdf('product', $link);
			echo ("done");
		}
	}

	public function sliders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['sliders'] = $this->Global_model->getsliders();
			$this->load->view('admin/sliders', $this->Global);
		}
	}

	public function gallery()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['sliders'] = $this->Global_model->getgallery();
			$this->load->view('admin/gallery', $this->Global);
		}
	}
	
	public function certificates()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->Global['certificates'] = $this->Global_model->getcertificate();
			$this->load->view('admin/certificates', $this->Global);
		}
	}

	public function addsliders($slider)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = rand(100, 10000);
				$table = "slider";
				$field = "link";
				$data['location'] = $slider;
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				$image = $this->upload('image', 'images','slider');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Global_model->addsliders($data);
			}
			$this->Global['sliders'] = $this->Global_model->getsliders($slider);
			$this->load->view('admin/add-sliders', $this->Global);
		}
	}

	public function addgallery()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = rand(100, 10000);
				$table = "slider";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['location'] = 'gallery';
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Global_model->addgallery($data);
			}
			$this->Global['sliders'] = $this->Global_model->getgallery();
			$this->load->view('admin/add-gallery', $this->Global);
		}
	}
	
	public function addcertificate()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$title = rand(100, 10000);
				$table = "certificates";
				$field = "link";
				$slug =  $this->create_slug($title, $table, $field);
				$data = $_POST;
				$data['link'] = $slug;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Global_model->addcertificate($data);
			}
			$this->Global['certificates'] = $this->Global_model->getcertificate();
			$this->load->view('admin/add-certificate', $this->Global);
		}
	}

	public function editslider($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images','slider');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				unset($data["num"]);
				$this->Global_model->editsliders($data);
				redirect('admin/'.$_POST['num']);
			}
			$slider = $this->Global_model->getslider($link);
			$this->Global['slider'] = $slider[0];
			$this->load->view('admin/edit-slider', $this->Global);
		}
	}

	public function editgallery($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$a = $this->Global_model->editgallery($data);
				redirect('admin/gallery');
			}
			$slider = $this->Global_model->getgallery($link);
			$this->Global['slider'] = $slider[0];
			$this->load->view('admin/edit-gallery', $this->Global);
		}
	}
	
	public function editcertificate($link)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
					$data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$a = $this->Global_model->editcertificate($data);
				redirect('admin/certificates');
			}
			$certificate = $this->Global_model->getcertificate($link);
			$this->Global['certificate'] = $certificate[0];
			$this->load->view('admin/edit-certificate', $this->Global);
		}
	}

	public function globalsettings()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->view('admin/globalsettings', $this->Global);
		}
	}

	public function editsettings()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				if ($_POST['shippingon'] != "on") {
					$_POST['shippingon'] = NULL;
				}
				$name = $_POST['name'];
				$value = $_POST['value'];
				$this->Global_model->editsettings($name, $value);
			}
			$this->session->set_flashdata('settings_saved', 'Settings Saved Successfully');
			redirect('admin/globalsettings');
		}
	}
	public function editisettings()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$image = $this->upload('value', 'images');
				$value = $image['file_name'];
				$this->Global_model->editsettings($name, $value);
			}
			$this->session->set_flashdata('settings_saved', 'Settings Saved Successfully');
			redirect('admin/globalsettings');
		}
	}
	public function editcsettings()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['name'])) {
			 //   die($_POST['name']);
				$name = $_POST['name'];
				if ($_POST['value'] != "on") {
					$value = NULL;
				} else {
					$value = $_POST['value'];
				}
				$this->session->set_flashdata('settings_saved', 'Settings Saved Successfully');
				$this->Global_model->editsettings($name, $value);
			}
			redirect('admin/globalsettings');
		}
	}

	public function orders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$data['orders'] = $this->Orders_model->getorders();
			$data['title'] = "All Order";
			$this->load->view('admin/orders', $data);
		}
	}

	public function todaysorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$data['orders'] = $this->Orders_model->todaysorders();
			$data['title'] = "Today's Order";
			$this->load->view('admin/orders', $data);
		}
	}

	public function pendingorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Pending";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Pending Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function confirmedorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Confirm";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Confirm Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function dispatchorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Dispatch";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Dispatch Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function transitorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Transit";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Transit Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function deliveredorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Delivered";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Delivered Order";
			$this->load->view('admin/orders', $data);
		}
	}
	public function cancelledorders()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$field = "status";
			$status = "Cancelled";
			$data['orders'] = $this->Orders_model->getorders($field, $status);
			$data['title'] = "Cancelled Order";
			$this->load->view('admin/orders', $data);
		}
	}

	public function orderdetails($orderid)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			if (isset($_POST['order_id'])) {
				$data = $_POST;
				$this->Orders_model->change_status($data);
			    $order = $this->Orders_model->getorder($orderid)[0];
				$data['toemail'] = $order['userEmail'];
                $data['subject'] = $order['order_id'] . ' has been ' . $order['status'];
                $mail_message = 'Dear ' . $order['userName'] . ',' . "<br/>";
                $mail_message .= 'We would like to inform you that your order ('.$order['order_id'].') has been '. $order['status'];
                if($order['status'] == 'Dispatch'){
                $mail_message .= '<br/>The tracking id is <strong>'.$order['tracking_id'].'</strong> <br/> The tracking url is '. $order['tracking_url'];
                }
                $mail_message .= '<br/>Thanks & Regards';
                $mail_message .= '<br/> Rajasthan Traditional Dresses';
                $data['message'] = $mail_message;
				$this->Admin_model->send_mail($data);
			}
			$data['global'] = $this->Global;
			$data['items'] = $this->Orders_model->getitems($orderid);
			$data['order'] = $this->Orders_model->getorder($orderid)[0];
			$this->load->view('admin/orderdetails', $data);
		}
	}

	public function addimages($link)
	{
		$this->load->model('Product_model');
		$result = $this->Product_model->getimages($link);
		$data['link'] = $link;
		$data['images'] = json_decode($result->images, true);
		$this->load->view('admin/images', $data);
	}

	function dragDropUpload($link)
	{
		if (!empty($_FILES)) {
			// File upload configuration 
			$config['upload_path']          = FCPATH . 'assets/front/images';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|svg';

			// Load and initialize upload library 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to the server 
			if ($this->upload->do_upload('file')) {
					$configer =  array(
						'image_library' => 'gd2',
						'source_image'  =>  $this->upload->data()['full_path'],
						'maintain_ratio' =>  TRUE,
						'height'       =>  '1100',
						'new_image' => $this->upload->data()['full_path'],
					);
					$this->load->library('image_lib', $configer);
					$a = $this->image_lib->resize();
					if($a == 1){
						$fileData = $this->upload->data();
					}
				$fileData = $this->upload->data();
				$this->load->model('Product_model');
				$images = $this->Product_model->getimages($link);
				$target_value = $fileData['file_name'];
				if ($images->images == "[]") {
					$a = trim($images->images, "]") . json_encode($target_value) . "]";
				} else {
					$a = (trim($images->images, "]") . "," . json_encode($target_value)) . "]";
				}
				$insert = $this->Product_model->saveimage($link, $a);
			}
		}
	}

	public function push_notification()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$this->Admin_model->bulkmail($data);
			}
			$this->load->view('admin/bulk-mail');
		}
	}

	public function users($type)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {

			if ($type == "all") {
				$data['title'] = "Users";
			} else if ($type == "customer") {
				$data['title'] = "Customers";
			} else if ($type == "subscriber") {
				$data['title'] = "Subscribers";
			}
			$data['users'] = $this->Admin_model->getusers($type);
			$this->load->view('admin/users', $data);
		}
	}
	
	public function vish()
	{
			$this->load->library('ciqrcode');
			$params['data'] = base_url();
			$params['level'] = 'H';
			$params['size'] = 10;
			$name = sitename.'.png';
			$params['savename'] = FCPATH . 'assets/front/img/qr/' . $name;
			$this->ciqrcode->generate($params);
			return $name;
	}

	function getsubcategory(){
		$category_id=$_POST["category_id"];
		$this->Global['subcategories'] = $this->Product_model->subcategory($category_id);
		echo('<option value="">Select SubCategory</option>');

		foreach($this->Global['subcategories'] as $subcategory){
			echo('<option value="'.$subcategory['link'].'">'.$subcategory['name'].'</option>');
		}
		// echo('<option value="">Select SubCategory</option>');
	}

	function categoryTree(){
		$arr[] = [];
		$count = 0 ;
    	$categories = $this->Product_model->getmaincategories();
			foreach($categories as $category){
				$arr[$count]['link'] = $category['link']; 
				$arr[$count++]['name'] = strtoupper($category['name']); 
				foreach($this->Product_model->subcategory($category['link']) as $subcat){
					$arr[$count]['link'] = $subcat['link']; 
					$arr[$count++]['name'] = strtoupper($category['name']).' -> '.strtoupper($subcat['name']); 
					foreach($this->Product_model->subcategory($subcat['link']) as $childcat){
						$arr[$count]['link'] = $childcat['link']; 
						$arr[$count++]['name'] = strtoupper($category['name']).' -> '.strtoupper($subcat['name']).' -> '.strtoupper($childcat['name']); 
					}
				}
			}
		return $arr;
	}
	
    public function addreview()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Admin_model->addreview($data);
			}
			$this->load->view('admin/add-review');
		}
	}
	
	public function editreviews($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
				    $data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Admin_model->editreview($slug,$data);
			}
			$review = $this->Admin_model->getreviews('id', $slug);
			$data['review'] = $review[0];
			$this->load->view('admin/edit-review', $data);
		}
	}
	
	public function removereviews($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removeimg('reviews', $link);
			echo ("done");
		}
	}
	
	public function reviews()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$data['reviews'] = $this->Admin_model->getreviews();
			$this->load->view('admin/reviews', $data);
		}
	}

	public function addtimeline()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Admin_model->addtimeline($data);
			}
			$this->load->view('admin/add-timeline');
		}
	}
	
	public function edittimelines($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
				    $data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Admin_model->edittimeline($slug,$data);
			}
			$timeline = $this->Admin_model->gettimelines('id', $slug);
			$data['timeline'] = $timeline[0];
			$this->load->view('admin/edit-timeline', $data);
		}
	}
	
	public function removetimelines($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Product_model');
			$this->Product_model->removeimg('timelines', $link);
			echo ("done");
		}
	}
	
	public function timelines()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$data['timelines'] = $this->Admin_model->gettimelines();
			$this->load->view('admin/timelines', $data);
		}
	}
	
	public function texthtml()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
		    if(isset($_POST['description'])){
		        
               $search = array(
                '/(\n|^)(\x20+|\t)/',
                '/(\n|^)\/\/(.*?)(\n|$)/',
                '/\n/',
                '/\<\!--.*?-->/',
                '/(\x20+|\t)/', # Delete multispace (Without \n)
                '/\>\s+\</', # strip whitespaces between tags
                '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
                '/=\s+(\"|\')/'); # strip whitespaces between = "'
            
               $replace = array(
                "\n",
                "\n",
                " ",
                "",
                " ",
                "><",
                "$1>",
                "=$1");
                $_POST['description'] = preg_replace($search,$replace,$_POST['description']);
                $_POST['description']  = preg_replace("/\s+|\n+|\r/", ' ', $_POST['description']);
                
		    }
			    $this->load->view('admin/text-html');
		}
	}
	
	public function exportproducts() {
	    if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
        $this->load->model('Product_model');
		$listInfo = $this->Product_model->getdata();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->SetCellValue('A1', 'Name');
        $sheet->SetCellValue('B1', 'Sku');
        $sheet->SetCellValue('C1', 'Category');
        $sheet->SetCellValue('D1', 'Subcategory');       
        $sheet->SetCellValue('E1', 'Featured Image');       
        $sheet->SetCellValue('F1', 'Price');       
        $sheet->SetCellValue('G1', 'Saleprice');       
        $sheet->SetCellValue('H1', 'Shortdescription');       
        $sheet->SetCellValue('I1', 'Description');       
        $sheet->SetCellValue('J1', 'Shipping_description');       
        $sheet->SetCellValue('K1', 'Size');       
        $sheet->SetCellValue('L1', 'Color');       
        $sheet->SetCellValue('M1', 'Video');       
        $sheet->SetCellValue('N1', 'New Arrival');       
        $sheet->SetCellValue('O1', 'Featured');       
        $sheet->SetCellValue('P1', 'Trending');       
        $sheet->SetCellValue('Q1', 'Quantity');       
        $sheet->SetCellValue('R1', 'Shipping_charges');       
        $sheet->SetCellValue('S1', 'Unit');       
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $sheet->SetCellValue('A' . $rowCount, $list['name']);
            $sheet->SetCellValue('B' . $rowCount, $list['sku']);
            $sheet->SetCellValue('C' . $rowCount, $list['maincategory']);
			$sheet->SetCellValue('D' . $rowCount, $list['category']);
            $sheet->SetCellValue('E' . $rowCount, base_url('assets/front/images/').$list['featured_image']);
            // $list['images'] = json_decode($list['images']);
            // foreach($list['images'] as $images){
            //     $imagedata[] = base_url('assets/front/images/').$images;
            // }
            // $sheet->SetCellValue('E' . $rowCount, str_replace("\/","/",json_encode($imagedata)));
            $sheet->SetCellValue('F' . $rowCount, $list['price']);
            $sheet->SetCellValue('G' . $rowCount, $list['saleprice']);
            $sheet->SetCellValue('H' . $rowCount, htmlspecialchars_decode($list['shortdescription']));
            $sheet->SetCellValue('I' . $rowCount, htmlspecialchars_decode($list['description']));
            $sheet->SetCellValue('J' . $rowCount, htmlspecialchars_decode($list['shipping_description']));
            $sheet->SetCellValue('K' . $rowCount, $list['size']);
            $sheet->SetCellValue('L' . $rowCount, $list['color']);
            $sheet->SetCellValue('M' . $rowCount, $list['video']);
            $sheet->SetCellValue('N' . $rowCount, $list['new_arrival']);
            $sheet->SetCellValue('O' . $rowCount, $list['featured']);
            $sheet->SetCellValue('P' . $rowCount, $list['trending']);
            $sheet->SetCellValue('Q' . $rowCount, $list['quantity']);
            $sheet->SetCellValue('R' . $rowCount, $list['shipping_charges']);
            $sheet->SetCellValue('S' . $rowCount, $list['unit']);
            $rowCount++;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = "export - ". date("Y-m-d-H-i-s");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file
        }
	}
    
    public function dropimages()
	{
		$this->load->model('Product_model');
		$data['images'] = $this->Product_model->getdropimages();
		$this->load->view('admin/dropimages', $data);
	}
	
    function adddropimages()
	{
		if (!empty($_FILES)) {
			// File upload configuration 
			$config['upload_path']          = FCPATH . 'assets/front/images';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|webp|svg';

			// Load and initialize upload library 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			// Upload file to the server 
			if ($this->upload->do_upload('file')) {
					$configer =  array(
						'image_library' => 'gd2',
						'source_image'  =>  $this->upload->data()['full_path'],
						'maintain_ratio' =>  TRUE,
						'height'       =>  '1100',
						'new_image' => $this->upload->data()['full_path'],
					);
					$this->load->library('image_lib', $configer);
					$a = $this->image_lib->resize();
					if($a == 1){
						$fileData = $this->upload->data();
					}
				$fileData = $this->upload->data();
				$this->load->model('Product_model');
				$insert = $this->Product_model->savedropimages($fileData['file_name']);
			}
		}
	}
	public function removedropimages($link,$id)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$a = unlink(FCPATH . 'assets/front/images/'.$link);
			$this->Product_model->removedropimages($id);
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function import(){
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if(isset($_FILES['upload_file']['name']) && in_array($_FILES['upload_file']['type'], $file_mimes)) {
            $arr_file = explode('.', $_FILES['upload_file']['name']);
                $extension = end($arr_file);
                    if('csv' == $extension){
                        // $reader = new PhpOffice\PhpSpreadsheet\Reader\Csv();
                        redirect('admin/products');
                    } else {
                        $reader = new PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                    }
                    $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);
                    $sheetDatas = $spreadsheet->getActiveSheet()->toArray();
                    $count = 1;
                    foreach($sheetDatas as $sheetData){
                        if($count++ == '1'){
                            continue;
                        }
                    $title = $sheetData[0];
    				$table = "product";
    				$field = "link";
    				$slug =  $this->create_slug($title, $table, $field);
    				$qr = $this->create_qr($slug);
                    $data =[
                    'name' => $sheetData[0],
                    'link' => $slug,
                    'sku' => $sheetData[1],
                    'category' => $sheetData[2],
                    'featured_image'   => str_replace(base_url('/assets/front/images/'),"",$sheetData[3]),     
                    'images'        => str_replace(base_url('/assets/front/images/'),"",$sheetData[4]),
                    'price'        => $sheetData[5],
                    'saleprice'        => $sheetData[6],
                    'shortdescription'    => $sheetData[7],    
                    'description'        => $sheetData[8],
                    'shipping_description'  => $sheetData[9],      
                    'size'        => $sheetData[10],
                    'color'        => $sheetData[11],
                    'video'        => $sheetData[12],
                    'new_arrival'  => $sheetData[13],      
                    'featured'    => $sheetData[14],    
                    'trending'       => $sheetData[15], 
                    'quantity'        => $sheetData[16],
                    'shipping_charges'   => $sheetData[17],   
                    'qrimage' => $qr,
                    'date_added' => date("Y-m-d"),
                    'unit'  => $sheetData[18]
                    ];
                    $this->load->model('Product_model');
			        $this->Admin_model->addproduct($data); 
                    }
            redirect('admin/products');
        }
    }
    
    public function abandoned()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$data['orders'] = $this->Orders_model->gettemporders();
			$data['title'] = "Abandoned Cart";
			$this->load->view('admin/abandoned', $data);
		}
	}
		public function abandoneddetails($orderid)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$this->load->model('Orders_model');
			$data['items'] = $this->Orders_model->getitems($orderid);
			$data['order'] = $this->Orders_model->gettemporder($orderid)[0];
			$this->load->view('admin/abandoned-details', $data);
		}
	}
	
	public function exportexcel() {
	    if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
        $this->load->model('Product_model');
		$listInfo = $this->Product_model->getdata();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->SetCellValue('A1', 'Name');
        $sheet->SetCellValue('B1', 'Sku');
        $sheet->SetCellValue('C1', 'category');
        $sheet->SetCellValue('D1', 'featured_image');       
        $sheet->SetCellValue('E1', 'images');       
        $sheet->SetCellValue('F1', 'price');       
        $sheet->SetCellValue('G1', 'saleprice');       
        $sheet->SetCellValue('H1', 'shortdescription');       
        $sheet->SetCellValue('I1', 'description');       
        $sheet->SetCellValue('J1', 'shipping_description');       
        $sheet->SetCellValue('K1', 'size');       
        $sheet->SetCellValue('L1', 'color');       
        $sheet->SetCellValue('M1', 'video');       
        $sheet->SetCellValue('N1', 'new_arrival');       
        $sheet->SetCellValue('O1', 'featured');       
        $sheet->SetCellValue('P1', 'trending');       
        $sheet->SetCellValue('Q1', 'quantity');       
        $sheet->SetCellValue('R1', 'shipping_charges');       
        $sheet->SetCellValue('S1', 'unit');       
        // set Row
        $rowCount = 2;
        foreach ($listInfo as $list) {
            $sheet->SetCellValue('A' . $rowCount, $list['name']);
            $sheet->SetCellValue('B' . $rowCount, $list['sku']);
            $sheet->SetCellValue('C' . $rowCount, $list['category']);
            $sheet->SetCellValue('D' . $rowCount, base_url('assets/front/images/').$list['featured_image']);
            $list['images'] = json_decode($list['images']);
            foreach($list['images'] as $images){
                $imagedata[] = base_url('assets/front/images/').$images;
            }
            $sheet->SetCellValue('E' . $rowCount, str_replace("\/","/",json_encode($imagedata)));
            $sheet->SetCellValue('F' . $rowCount, $list['price']);
            $sheet->SetCellValue('G' . $rowCount, $list['saleprice']);
            $sheet->SetCellValue('H' . $rowCount, htmlspecialchars_decode($list['shortdescription']));
            $sheet->SetCellValue('I' . $rowCount, htmlspecialchars_decode($list['description']));
            $sheet->SetCellValue('J' . $rowCount, htmlspecialchars_decode($list['shipping_description']));
            $sheet->SetCellValue('K' . $rowCount, $list['size']);
            $sheet->SetCellValue('L' . $rowCount, $list['color']);
            $sheet->SetCellValue('M' . $rowCount, $list['video']);
            $sheet->SetCellValue('N' . $rowCount, $list['new_arrival']);
            $sheet->SetCellValue('O' . $rowCount, $list['featured']);
            $sheet->SetCellValue('P' . $rowCount, $list['trending']);
            $sheet->SetCellValue('Q' . $rowCount, $list['quantity']);
            $sheet->SetCellValue('R' . $rowCount, $list['shipping_charges']);
            $sheet->SetCellValue('S' . $rowCount, $list['unit']);
            break;
        }
        $writer = new Xlsx($spreadsheet);
        $filename = "export - ". date("Y-m-d-H-i-s");
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output'); // download file
        }
	}


	
	public function blogs()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			$data['blogs'] = $this->Blog_model->getblogs();
			$this->load->view('admin/blogs', $data);
		}
	}
	public function addblog()
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				$title = $_POST['post_title'];
				$table = "blog";
				$field = "link";
				$data['link'] =  $this->create_slug($title, $table, $field);
				
				$image = $this->upload('image', 'images');
				$data['image'] = $image['file_name'];
				unset($data["submit"]);
				$this->Blog_model->addblog($data);
			}
			$this->load->view('admin/add-blog');
		}
	}
	public function editblog($slug)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			if (isset($_POST['submit'])) {
				$data = $_POST;
				if (!empty($_FILES['image']['name'])) {
					$image = $this->upload('image', 'images');
				    $data['image'] = $image['file_name'];
				}
				unset($data["submit"]);
				$this->Blog_model->editpost($slug,$data);
				
			}
			$blog = $this->Blog_model->getblogs('link', $slug);
			$data['blog'] = $blog[0];
			$this->load->view('admin/edit-blog', $data);
		}
	}
	
	public function removeblog($link = NULL)
	{
		if (!isset($_SESSION['isAdminLoggedIn'])) {
			redirect('admin/login');
		} else {
			
			$this->Blog_model->removeimg('blog','image','link', $link);
			echo ("done");
		}
	}
}

<?php defined('BASEPATH') or exit('No direct script access allowed');
#[\AllowDynamicProperties]
class Admin_model extends CI_Model
{
    function __construct()
    {
        // Set table name 
        $this->table = 'admin';
    }

    /* 
     * Fetch user data from the database 
     * @param array filter data based on the passed parameters 
     */
    function getRows($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->table);

        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params) || $params['returnType'] == 'single') {
                if (!empty($params['id'])) {
                    $this->db->where('id', $params['id']);
                }
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('id', 'desc');
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        // Return fetched data 
        return $result;
    }

    function updateAdmin($params = array())
    {
        $this->db->where('id', $params['id']);
        $this->db->update('admin', $params);
    }

    public function sendpassword($data)
    {
        $email = $data['email'];
        $query1 = $this->db->query("SELECT *  from admin where email = '" . $email . "' ");
        $row = $query1->result_array();
        if ($query1->num_rows() > 0) {
            $passwordplain  = rand(999999999, 9999999999);
            $newpass['password'] = sha1($passwordplain);
            $this->db->where('email', $email);
            $this->db->update('admin', $newpass);
            $data['toemail'] = $email;
            $data['subject'] = 'OTP from ' . sitename;
            $mail_message = 'Dear ' . $row[0]['name'] . ',' . "\r\n";
            $mail_message .= 'Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>' . $passwordplain . '</b>' . "\r\n";
            $mail_message .= '<br>Please Update your password.';
            $mail_message .= '<br>Thanks & Regards';
            $mail_message .= '<br>Your company name';
            $data['message'] = $mail_message;
            $a = $this->send_mail($data);
            if ($a == "success") {
                $this->session->set_flashdata('success_msg', 'Password sent to your email!');
            } else {
                $this->session->set_flashdata('error_msg', 'Failed to send password, please try again!');
                return $a;
            }
            redirect(base_url() . 'admin/login', 'refresh');
        } else {
            $this->session->set_flashdata('error_msg', 'Email not found try again!');
            redirect(base_url() . 'admin/login', 'refresh');
        }
    }

    public function send_mail($data)
    {
        $this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = admin_host;
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = admin_username;
        $config['smtp_pass']    = admin_password;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not    

        $this->email->initialize($config);
        $this->email->from(admin_email, admin_name);
        $this->email->to($data['toemail']);
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);
        if (!$this->email->send()) {
            return $this->email->print_debugger();
        } else {
            return "success";
        }
    }

    public function aboutus($data)
    {
        $this->db->where('name', 'about');
        $this->db->update('image', $data['image']);
        $this->db->update('content', $data['content']);
        redirect('admin/about');
    }

    public function privacy($data)
    {
        $this->db->where('name', 'privacy');
        $this->db->update('content', $data['content']);
        redirect('admin/privacy');
    }

    public function terms($data)
    {
        $this->db->where('link', 'terms');
        $this->db->update('content', $data['content']);
        redirect('admin/terms');
    }

    public function refund($data)
    {
        $this->db->where('link', 'refund');
        $this->db->update('content', $data['content']);
        redirect('admin/refund');
    }

    public function shipping($data)
    {
        $this->db->where('link', 'shipping');
        $this->db->update('content', $data['content']);
        redirect('admin/shipping');
    }

    public function totalsales()
    {
        $this->load->database();
        $query = $this->db->query("Select SUM(totalAmount) AS amount from orders");
        return $query->result()[0];
    }
    public function customer()
    {
        $this->load->database();
        $query = $this->db->query("Select * from users");
        return $query->num_rows();
    }

    public function getusers($type)
    {
        $this->load->database();
        if ($type == 'all')
            $query = $this->db->query("Select * from users");
        else if ($type == 'customer') {
            $query = $this->db->query("Select * from users where type = \"" . $type . "\"");
        } else if ($type == 'subscriber') {
            $query = $this->db->query("Select * from users where type = \"" . $type . "\"");
        }
        return $query->result_array();
    }

    public function getproducts()
    {
        $this->load->database();
        $query = $this->db->get('product');
        return $query->result_array();
    }
    
    public function getcolors()
    {
        $this->load->database();
        $query = $this->db->get('color');
        return $query->result_array();
    }
    public function getplatings()
    {
        $this->load->database();
        $query = $this->db->get('plating');
        return $query->result_array();
    }
    public function getgemstones()
    {
        $this->load->database();
        $query = $this->db->get('stone');
        return $query->result_array();
    }

    
    public function getsizes()
    {
        $this->load->database();
        $query = $this->db->get('size');
        return $query->result_array();
    }


    public function addproduct($data)
    {
        $this->db->insert('product', $data);
        $this->load->database();
        $this->db->where('link', $data['link']);
        $query = $this->db->get('product');
        
        return $query->row_array()['id'];
        // redirect('admin/products');
    }
    public function addproductattri($data)
    {
        $this->db->insert('products_attr', $data);
    }
    public function editproductattri($data)
    {
        $this->db->where('id', $data['varid']);
        unset($data["varid"]);
        $this->db->update('products_attr', $data);
    }
    
    public function editproduct($data)
    {
        $this->db->where('link', $data['link']);
        $this->db->update('product', $data);
        // redirect('admin/products');
    }
    public function addcategory($data)
    {
        if($data['parent'] == ""){
            $data['parent'] = NULL;
        }
        $this->db->insert('category', $data);
        return 1;
    }    
    public function addcolor($data)
    {
        $this->db->insert('color', $data);
        redirect('admin/colors');
    }
    public function addsize($data)
    {
        $this->db->insert('size', $data);
        redirect('admin/sizes');
    }

    public function addstone($data)
    {
        $this->db->insert('stone', $data);
        redirect('admin/stones');
    }

    public function addcoupon($data)
    {
        $this->db->insert('coupons', $data);
        redirect('admin/coupons');
    }

    public function editcoupon($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('coupons', $data);
        return 1;
    }
    
    public function addshow($data)
    {
        $this->db->insert('shows', $data);
        redirect('admin/shows');
    }

    public function editshow($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('shows', $data);
        return 1;
    }

    public function editcategory($data)
    {
        if($data['parent'] == ""){
            $data['parent'] = NULL;
        }
        $this->db->where('link', $data['link']);
        $this->db->update('category', $data);
        return 1;
    }    
    public function editcolor($data)
    {
        $this->db->where('link', $data['link']);
        $this->db->update('color', $data);
        return 1;
    } 
    public function editsize($data)
    {
        $this->db->where('link', $data['link']);
        $this->db->update('size', $data);
        return 1;
    }

    public function editstone($data)
    {
        $this->db->where('link', $data['link']);
        $this->db->update('stone', $data);
        return 1;
    }

    public function bulkmail($data)
    {
        $this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'host.gdigitalindia.in';
        $config['smtp_crypto'] = 'ssl';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = admin_username;
        $config['smtp_pass']    = admin_password;
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not    

        $this->email->initialize($config);
        $mail_message = $data['message'];
        $this->email->from(admin_username, 'Rajasthan Traditional Dresses');
        $query = $this->db->query("Select * from users");
        $users = $query->result_array();
        foreach ($users as $user) {
            $this->email->bcc($user['email'], $user['firstname']);
        }
        $this->email->subject($data['subject']);
        $this->email->message($mail_message);
        if (!$this->email->send()) {
            return $this->email->print_debugger();
        }
    }
    function addreview($data)
    {
        $this->db->insert('reviews',$data);
        redirect('admin/reviews');
    }
    
    function editreview($post_id, $data)
    {
        $this->db->where('id',$post_id);
        $this->db->update('reviews',$data);
        redirect(base_url('admin/reviews'));
    }
    function getreviews($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            $this->db->order_by('date_added','desc');
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('reviews');
        return $query->result_array();
    }
    function getproductreviews($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            $this->db->order_by('date','desc');
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('productreviews');
        return $query->result_array();
    }
    
    function addtimeline($data)
    {
        $this->db->insert('timelines',$data);
        redirect('admin/timelines');
    }
    
    function edittimeline($post_id, $data)
    {
        $this->db->where('id',$post_id);
        $this->db->update('timelines',$data);
        redirect(base_url('admin/timelines'));
    }
    function gettimelines($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            $this->db->order_by('date_added','desc');
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('timelines');
        return $query->result_array();
    }
    function editproductreview($post_id, $data)
    {
        $this->db->where('id',$post_id);
        $this->db->update('productreviews',$data);
        redirect(base_url('admin/productreviews'));
    }
}

<?php defined('BASEPATH') or exit('No direct script access allowed');

#[\AllowDynamicProperties]

class User_model extends CI_Model
{
    function __construct()
    {
        // Set table name 
        $this->table = 'users';
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
    
    function getdata($id){
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    function getuser($id){
        $this->db->from($this->table);
        $this->db->where('email', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    function updateUser($params = array())
    {
        $this->db->where('id', $params['id']);
        $this->db->update('users', $params);
    }

    function getwishlist(){
        $this->db->select('*'); 
        $this->db->from('wishlist'); 
        $this->db->where('userId',$_SESSION['userId']); 
        $query = $this->db->get(); 
        $result = $query->result_array(); 
        return !empty($result)?$result:false; 
    }

    function checkwishlist($productId,$userId){

        $this->db->where('userId', $userId);
        $this->db->where('productslug', $productId);
        return $this->db->count_all_results('wishlist');
    }

    function verify($code)
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('code', $code);
        $query = $this->db->get();
        $result = $query->row_array();
        if ($query->num_rows() > 0) {
            $this->db->set('status', 1);
            $this->db->set('code', '');
            $this->db->where('code', $code);
            $this->db->update('users');
        }
        return $result;
    }

    function register($data = array())
    {
        return $this->db->insert('users', $data);
    }

    public function addtowishlist($data = array()){
        return $this->db->insert('wishlist', $data);
    }

    public function removewishlist($data = NULL){
        $this->db->where('productslug', $data);
        return $this->db->delete('wishlist');
    }

    public function ForgotPassword($email)
    {
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sendpassword($data)
    {
        $email = $data['email'];
        $query1 = $this->db->query("SELECT *  from users where email = '" . $email . "' ");
        $row = $query1->result_array();
        if ($query1->num_rows() > 0) {
            $passwordplain  = rand(999999999, 9999999999);
            $newpass['password'] = sha1($passwordplain);
            $this->db->where('email', $email);
            $this->db->update('users', $newpass);
            $data['toemail'] = $email;
            $data['subject'] = 'OTP from '.sitename;
            $mail_message = 'Dear ' . $row[0]['firstname'] . ',' . "\r\n";
            $mail_message .= 'Thanks for being a part of '.sitename.',<br> Your <b>Password</b> is <b>' . $passwordplain . '</b>' . "\r\n";
            $mail_message .= '<br>Please Update your password on first login.';
            $mail_message .= '<br>Thanks & Regards';
            $mail_message .= '<br>'.sitename ;
            $data['message'] = $mail_message;
            $this->load->model('Admin_model');
            $a = $this->Admin_model->send_mail($data);
            if ( $a == "success") {
                $this->session->set_flashdata('success_msg', 'Password sent to your email!');
            }
            else{
                $this->session->set_flashdata('error_msg', 'Failed to send password, please try again!');
                return $a;
            }
        } else {
            $this->session->set_flashdata('error_msg', 'Email not found try again!');
            redirect(base_url() . 'user/forgot_password', 'refresh');
        }
    }

    public function verifyaccount($data)
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
        $code = $data['code'];
        $mail_message = 'Dear ' . $data['firstname'] . ',' . "\r\n";
        $mail_message .= 'Thanks for being a part of '.sitename.',<br> Your <b>Verification Code </b> is <b>' . $code . '</b>' . "\r\n";
        $mail_message .= '<br>Please Verify your Account by filling the code or visit';
        $mail_message .= '<br>' . base_url('/user/verifyaccount/' . $code);
        $mail_message .= '<br>Thanks & Regards';
        $mail_message .= '<br>'.sitename;
        $this->email->from(admin_username,sitename);
        $this->email->to($data['email']);
        $this->email->subject('Verify Your Account Now');
        $this->email->message($mail_message);
        if ( ! $this->email->send())
        { return $this->email->print_debugger(); }
    }

    public function bulkmail($data)
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
        $mail_message = $data['message'];
        $this->email->from(admin_username,admin_name);
        foreach($data['users'] as $user){
            $this->email->bcc($user['email'],$user['firstname']);
        }
        $this->email->subject('Verify Your Account Now');
        $this->email->message($mail_message);
        if ( ! $this->email->send())
        { return $this->email->print_debugger(); }
    }
    
    function registersubscriber($data = array())
    {
        return $this->db->insert('subscriber', $data);
    }
    
    public function updateqnt($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('product', $data);
        // redirect('admin/products');
    }

}

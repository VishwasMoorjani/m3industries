<?php
#[\AllowDynamicProperties]
class Orders_model extends CI_Model
{

    public function getorders($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $this->db->order_by("order_date", "desc");
        $query = $this->db->get('orders');
        return $query->result_array();
    }
    
        public function todaysorders()
    {
        $this->load->database();
        $this->db->where('order_date >=', date('y-m-d').' 00:00:00');
        $this->db->where('order_date <=', date('y-m-d').' 23:59:59');
        $query = $this->db->get('orders');
        return $query->result_array();
    }
    
    public function getorder($orderid)
    {
        $this->load->database();
        $this->db->where('order_id', $orderid);
        $query = $this->db->get('orders');
        return $query->result_array();
    }

    public function codOrder($order_id){
        $data['order_id']= $order_id;
        $data['userId']= $_SESSION['userId'];
        $data['userName']= $_SESSION['userName'];
        $data['userEmail']= $_SESSION['userEmail'];
        $data['billingAddress']= $_SESSION['currentaddress'];
        $data['shippingAddress']= $_SESSION['shippingaddress'];
        $data['totalAmount']= number_format((float)$_SESSION['totalAmount'], 2, '.', '');
        $data['totalShipping']= number_format((float)$_SESSION['shipping_charge'], 2, '.', '');
        $data['totalDiscount'] = number_format((float)$_SESSION['discount'], 2, '.', '');
        $data['currency'] = "INR";
        $data['transactionId']= "Cash on Delivery";
        $data['paymentMethod']= "Cash on Delivery";
        $data['message']= isset($_SESSION['special_note'])?$_SESSION['special_note']:NULL;
        $insert = $this->db->insert('orders', $data); 
        return $insert?true:false; 
    }

    public function saveOrder($order_id){
        $data['order_id']= $order_id;
        $data['userId']= $_SESSION['userId'];
        $data['userName']= $_SESSION['userName'];
        $data['userEmail']= $_SESSION['userEmail'];
        $data['billingAddress']= $_SESSION['currentaddress'];
        $data['shippingAddress']= $_SESSION['shippingaddress'];
        $data['totalAmount']= number_format((float)$_SESSION['totalAmount']+$_SESSION['shipping_charge'], 2, '.', '');
        $data['totalShipping']= number_format((float)$_SESSION['shipping_charge'], 2, '.', '');
        $data['totalDiscount'] = number_format((float)$_SESSION['discount'], 2, '.', '');
        $data['paymentMethod']= "Paypal";
        $data['message']= isset($_SESSION['special_note'])?$_SESSION['special_note']:NULL;
        $insert = $this->db->insert('temporders', $data); 
        return $insert?true:false; 
    }
    
    public function updateOrder($data){

        $this->load->database();
        $this->db->where('order_id', $data['order_id']);
        $temp = $this->db->get('temporders')->row_array();
        $data = array_merge($temp,$data);
        unset($data['id'] );
        
        // Trying for stock management
        // $products = $this->getitems($data);
        // print_r($products);
        // foreach($products as $items){
            
        // }
        // $this->db->query('Update coupons set quantity = quantity-1 where name = "' . $link . '"');
        // print_r($data);
        // die();
        $insert = $this->db->insert('orders', $data); 
        $this->db->where('order_id', $data['order_id']);
        $this->db->delete('temporders');
        return $insert?true:false; 
    }

    public function orderitems($cartItem){
        $data['userId'] = $cartItem['userId'] ;
		$data['order_id'] = $cartItem['order_id'];
		$data['qty'] = $cartItem['qty'];
		$data['price'] = $cartItem['price'];
		$data['name'] = $cartItem['name'];
		$data['slug'] = $cartItem['link'];
		$data['image'] = $cartItem['image'];
		$data['color'] = $cartItem['options']['plating'];
		$data['size'] = $cartItem['options']['size'];
        $insert = $this->db->insert('orderitems', $data); 
        return $insert?true:false; 
    }

    public function getitems($order_id){
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('orderitems');
        return $query->result_array();
    }
    
    public function change_status($data)
    {
        $this->db->where('order_id', $data['order_id']);
        $this->db->update('orders', $data);
    }
    
    public function gettemporders($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where($field, $value);
        }
        $this->db->order_by("order_date", "desc");
        $query = $this->db->get('temporders');
        return $query->result_array();
    }
    
    public function gettemporder($orderid)
    {
        $this->load->database();
        $this->db->where('order_id', $orderid);
        $query = $this->db->get('temporders');
        return $query->result_array();
    }
}

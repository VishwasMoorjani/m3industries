<?php
#[\AllowDynamicProperties]
class Product_model extends CI_Model
{

    public function getdata($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            $this->db->where('status', 1);
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function getcoupons($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('coupons');
        return $query->result_array();
    }
    
    public function getshows($field = NULL, $value = NULL)
    {
        $this->load->database();
        if ($field != NULL && $value != NULL) {
            // $where = "name='Joe' AND status='boss' OR status='active'";
            $this->db->where($field, $value);
        }
        $query = $this->db->get('shows');
        return $query->result_array();
    }

    public function get_product($link)
    {

        $query = $this->db->get_where('product', array('link' => $link));
        return $query->row();
    }    

    public function getattributes($link)
    {
        $query = $this->db->get_where('products_attr', array('products_id' => $link));
        return $query->result();
    }

    public function getcolors($link){
        $this->db->select('color.name as color, color.code, products_attr.*');
        $this->db->from('products_attr');
        $this->db->join('color', 'products_attr.varcolor = color.name');
        $this->db->where('products_attr.products_id', $link);
        $this->db->group_by('varcolor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getallcolors(){
        $query = $this->db->get('color');
        return $query->result_array();
    }

    public function getsizes($link){
        $this->db->select('size.name as size, size.id as sizeid, products_attr.*');
        $this->db->from('products_attr');
        $this->db->join('size', 'products_attr.varsize = size.id');
        $this->db->where('products_attr.products_id', $link);
        $this->db->group_by('varsize');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getstones($link){
        $this->db->select('stone.name as stone, stone.id as stoneid, products_attr.*');
        $this->db->from('products_attr');
        $this->db->join('stone', 'products_attr.varstone = stone.id');
        $this->db->where('products_attr.products_id', $link);
        $this->db->group_by('varstone');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getstone($link)
    {
        $this->db->select('stone.name as stone, stone.id as stoneid, products_attr.*');
        $this->db->from('products_attr');
        $this->db->join('stone', 'products_attr.varstone = stone.id');
        $this->db->where('products_attr.varsize', $link);
        $this->db->group_by('varstone');
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function getcoupon($link, $active = NULL, $val = NULL)
    {
        if (isset($val) && $val == 1) {
            $this->db->query('Update coupons set quantity = quantity-1 where name = "' . $link . '"');
            return 1;
        }
        if (isset($active) && $active == 1) {
            $this->db->where('status', 1);
        }
        $this->db->where('name', $link);
        $query = $this->db->get('coupons');
        return $query->row_array();
    }
    public function getshow($link, $active = NULL, $val = NULL)
    {
        if (isset($val) && $val == 1) {
            $this->db->query('Update shows set quantity = quantity-1 where name = "' . $link . '"');
            return 1;
        }
        if (isset($active) && $active == 1) {
            $this->db->where('status', 1);
        }
        $this->db->where('name', $link);
        $query = $this->db->get('shows');
        return $query->row_array();
    }

    public function checkproduct($link)
    {

        $query = $this->db->get_where('product', array('link' => $link));
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function subcategory($link)
    {
        $query = $this->db->get_where('category', array('parent' => $link));
        return $query->result_array();
    }

    public function get_category($link)
    {

        $query = $this->db->get_where('category', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    public function get_color($link)
    {

        $query = $this->db->get_where('color', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }    
    public function get_size($link)
    {

        $query = $this->db->get_where('size', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    public function get_stone($link)
    {

        $query = $this->db->get_where('stone', array('link' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }

    public function get_product_size($link)
    {

        $query = $this->db->get_where('size', array('id' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    public function get_product_gemstones($link)
    {

        $query = $this->db->get_where('stone', array('id' => $link));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return 0;
        }
    }
    public function getmaincategories()
    {
        $this->db->where('parent', NULL);
        $query = $this->db->get('category');
        return $query->result_array();
    }
    public function getsubcategories()
    {
        $this->db->where('parent != ');
        // $this->db->where('main IS NULL');
        $query = $this->db->get('category');
        return $query->result_array();
    }
    public function getchildcategories()
    {
        $this->db->where('parent != ');
        // $this->db->where('main != ');
        $query = $this->db->get('category');
        return $query->result_array();
    }
    public function getcategories()
    {
        $query = $this->db->get('category');
        return $query->result_array();
    }
    public function checkcategory($link)
    {
        $query = $this->db->get_where('category', array('link' => $link));
        if ($query->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function categoryproducts($link, $data = NULL)
    {

        // $query = $this->db->get_where('product', array('category' => $link));
        $query = "SELECT * FROM product WHERE status = '1'";
        if ($link == "new") {
            $query .= "AND new_arrival = 'on'";
        } else if($link != NULL) {
            $query .= "AND category = '$link'";
            // $query .= "OR category = '$link'";
        }
        if ($data != NULL) {
            if (isset($data['minimum_price'], $data['maximum_price']) && !empty($data['minimum_price']) &&  !empty($data['maximum_price'])) {
                $query .= " AND saleprice BETWEEN '" . $data['minimum_price'] . "' AND '" . $data['maximum_price'] . "' ";
            }
            
            if(isset($data['size'])){
                if($data['size'] != ''){
                    $count = 0;
                    foreach($data['size'] as $size){
                        if(++$count == 1){
                            $query .= " AND size = '$size'";
                        }else{
                            $query .= " OR size = '$size'";
                        }
                    }
                }
            }

            if(isset($data['color'])){
                if($data['color'] != ''){
                    $count = 0;
                    foreach($data['color'] as $color){
                        if(++$count == 1){
                            $query .= " AND color = '$color'";
                        }else{
                            $query .= " OR color = '$color'";
                        }
                    }
                }
            }



            if($data['order_by'] == 'price_desc'){
                $query .= "
                ORDER BY saleprice DESC";
            }
            else if($data['order_by'] == 'price_asc'){
                $query .= "
                ORDER BY saleprice ASC";
            }
            if($data['order_by'] == 'id_desc'){
                $query .= "
                ORDER BY id DESC";
            }
            else if($data['order_by'] == 'id_asc'){
                $query .= "
                ORDER BY id ASC";
            }
        }
        $result = $this->db->query($query);
        // return $this->db->last_query();
		return $result->result_array();
    }

    public function getcolor($link = NULL)
    {
        $this->db->distinct();
        $this->db->select('color');
        if (isset($link)) {
            $this->db->where(array('category' => $link));
        }
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function activate($table = NULL, $link = NULL)
    {
        if ($table == "users" || $table == "coupons" || $table == "reviews" || $table == "productreviews" || $table == "shows") {
            $this->db->set('status', 1);
            $this->db->where('id', $link);
            $this->db->update($table);
        } else {
            $this->db->set('status', 1);
            $this->db->where('link', $link);
            $this->db->update($table);
        }
    }
    public function deactivate($table = NULL, $link = NULL)
    {
        if ($table == "users") {
            $this->db->set('status', 2);
            $this->db->where('id', $link);
            $this->db->update($table);
        } else if ($table == "coupons" || $table == "reviews" || $table == "productreviews" || $table == "shows") {
            $this->db->set('status', 0);
            $this->db->where('id', $link);
            $this->db->update($table);
        } else {
            $this->db->set('status', 0);
            $this->db->where('link', $link);
            $this->db->update($table);
        }
    }

    public function delete($table = NULL, $link = NULL)
    {
        if ($table == "coupons" || $table == "products_attr" || $table == "reviews" || $table == "subscriber" || $table == "productreviews" || $table == "shows") {
            $this->db->where('id', $link);
            $this->db->delete($table);
            return true;
        } else {
            $this->db->where('link', $link);
            $this->db->delete($table);
            return true;
        }
    }

    public function removeimg($table = NULL, $link = NULL)
    {
        if ($table == "reviews") {
            $this->db->set('image', "");
            $this->db->where('id', $link);
        }
        else{
            $this->db->set('featured_image', "");
            $this->db->where('link', $link);
        }
        $this->db->update($table);
    }
    
    public function removeplatingimages($table = NULL, $link = NULL,$field = NULL)
    {
            $this->db->set($field, "");
            $this->db->where('link', $link);
            $this->db->update($table);
    }

    public function removesettingsdata($link = NULL)
    {
        $this->db->set('value', "");
        $this->db->where('name', $link);
        $this->db->update('global');
    }
    
    public function removecat($table = NULL, $link = NULL)
    {
        $this->db->set('image', "");
        $this->db->where('link', $link);
        $this->db->update($table);
    }

    public function saveimage($link, $images)
    {
        $this->db->set('images', $images);
        $this->db->where('link', $link);
        $this->db->update('product');
    }
    
    public function getdropimages($link = NULL)
    {
        $this->db->from('images');
        $query = $this->db->get();
        $result = $query->result_array();
        return !empty($result) ? $result : false;
    }
    
    public function savedropimages($image)
    {
        $data['image'] = $image;
        $this->db->insert('images', $data);
    }
    
    public function removedropimages($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("images");
    }
    

    public function removepdf($table = NULL, $link = NULL)
    {
        $this->db->set('pdf', "");
        $this->db->where('link', $link);
        $this->db->update($table);
    }

    public function getimages($link)
    {
        $this->db->select('images');
        $this->db->from('product');
        if ($link) {
            $this->db->where('link', $link);
            $query = $this->db->get();
            $result = $query->row();
        } else {
            $query = $this->db->get();
            $result = $query->result_array();
        }

        return !empty($result) ? $result : false;
    }

    public function search($keyword, $data = NULL)
    {

        $query = "SELECT * FROM product WHERE name like '%$keyword%' or category like '%$keyword%' or category like '%$keyword%' and status = 1";
        if ($data != NULL) {
            if($data == 'price_desc'){
                $query .= "
                ORDER BY price DESC";
            }
            else if($data == 'price_asc'){
                $query .= "
                ORDER BY price ASC";
            }
            if($data == 'id_desc'){
                $query .= "
                ORDER BY id DESC";
            }
            else if($data == 'id_asc'){
                $query .= "
                ORDER BY id ASC";
            }

                
        }
        $result = $this->db->query($query);
        return $result->result_array();
    }

    function search_title($title)
    {
        $this->db->like('name', $title, 'both');
        $this->db->order_by('name', 'ASC');
        $this->db->limit(10);
        return $this->db->get('product')->result();
    }

    /* 
     * Insert file data into the database 
     * @param array the data for inserting into the table 
     */
    public function insert($data = array())
    {
        $insert = $this->db->insert('product', $data);
        return $insert ? true : false;
    }

    public function storeTransaction($data = array()){
        $insert = $this->db->insert('payments',$data);
        return $insert?true:false;
    }
    public function get_productreviews($link)
    {
        $this->db->where('status', 1);
        $query = $this->db->get_where('productreviews', array('product_slug' => $link));
        return $query->result_array();
    }   
}

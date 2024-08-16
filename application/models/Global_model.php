<?php
class Global_model extends CI_Model
{

        public function getdata()
        {
                $this->load->database();
                $query = $this->db->query("Select * from global");
                $info = $query->result_array();
                foreach ($info as $row) {
                        $data[$row['name']] = $row['value'];
                }
                return $data;
        }
        public function getsliders()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where location = 'slider'");
                return $query->result_array();
        }

        public function getsizes()
        {
                $this->load->database();
                $query = $this->db->query("Select * from size");
                return $query->result_array();
        }
        public function getpage($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from pages where name=\"$link\"");
                return $query->result_array();
        }
        public function getsize($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from size where id=\"$link\"");
                return $query->row_array();
        }
        public function getcolor($link)
        {
                $this->db->select('product.link as link,color.code as code,color.name as name');
                $this->db->from('product');
                $this->db->join('color', 'color.name = product.color');
                $this->db->where('product.id', $link);
                $query = $this->db->get();
                return $query->row_array();
        }
        public function getpages()
        {
                $this->load->database();
                $query = $this->db->query("Select * from pages");
                return $query->result_array();
        }
        public function getgallery()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where location = 'gallery'");
                return $query->result_array();
        }
        public function getcertificate()
        {
                $this->load->database();
                $query = $this->db->query("Select * from certificates");
                return $query->result_array();
        }
        public function getactivesliders()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where status = 1 and location = 'slider'");
                return $query->result_array();
        }

        public function getactivegallery()
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where status = 1 and location = 'gallery'");
                return $query->result_array();
        }
        public function getactivecertificate()
        {
                $this->load->database();
                $query = $this->db->query("Select * from certificates where status = 1");
                return $query->result_array();
        }
        public function getactivecoupons()
        {
                $this->load->database();
                $query = $this->db->query("Select * from coupons where status = 1 and type = 'percentage' or type = 'fixed'");
                return $query->result_array();
        }
        public function getactiveshows()
        {
                $this->load->database();
                $query = $this->db->query("Select * from shows where status = 1");
                return $query->result_array();
        }
        public function getactivecouponson()
        {
                $this->load->database();
                $query = $this->db->query("Select * from coupons where status = 1 and offer_section = 'on' and type = 'percentage' or type = 'fixed'");
                return $query->result_array();
        }

        public function getslider($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where link = '$link'");
                return $query->result_array();
        }
        public function getgalleryimage($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from slider where link = '$link' and location = 'gallery' ");
                return $query->result_array();
        }
        public function getcertificateimage($link)
        {
                $this->load->database();
                $query = $this->db->query("Select * from certificates where link = '$link'");
                return $query->result_array();
        }
        public function menu()
        {
                $this->load->database();
                $query = $this->db->query("Select * from global");
                $info = $query->result_array();
                foreach ($info as $row) {
                        $data[$row['name']] = $row['value'];
                }
                return $data;
        }

        public function editsettings($name, $value)
        {
                $this->db->set('value', $value);
                $this->db->where('name', $name);
                $this->db->update('global');
        }

        public function addsliders($data)
        {
                $this->db->insert('slider', $data);
                redirect('admin/sliders');
        }

        public function addgallery($data)
        {
                $this->db->insert('slider', $data);
                redirect('admin/gallery');
        }

        public function editsliders($data)
        {
                $this->db->where('link', $data['link']);
                $this->db->update('slider', $data);
        }
        public function editpage($data)
        {
                $this->db->where('name', $data['name']);
                $this->db->update('pages', $data);
        }

        public function editgallery($data)
        {
                $this->db->where('link', $data['link']);
                $this->db->update('slider', $data);
                return $data;
        }

        public function addcertificate($data)
        {
                $this->db->insert('certificates', $data);
                redirect('admin/certificates');
        }
        public function editcertificate($data)
        {
                $this->db->where('link', $data['link']);
                $this->db->update('certificates', $data);
                return $data;
        }
        public function removeimg($table = NULL, $link = NULL)
        {
                $this->db->set('image', "");
                $this->db->where('link', $link);
                $this->db->update($table);
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
                $this->email->from(admin_username, admin_name);
                $this->email->to($data['toemail']);
                $this->email->subject($data['subject']);
                $this->email->message($data['message']);
                if (!$this->email->send()) {
                return $this->email->print_debugger();
                } else {
                redirect('home/thanks');
                }
        }
        public function save($data = array())
        {
                $insert = $this->db->insert('appointment', $data);
        }
        public function savereview($data = array())
        {
                $insert = $this->db->insert('productreviews', $data);
        }
        public function getactivereviews()
        {
                $this->load->database();
                $query = $this->db->query("Select * from reviews where status = 1");
                return $query->result_array();
        }
        public function getactivetimelines()
        {
                $this->load->database();
                $query = $this->db->query("Select * from timelines where status = 1");
                return $query->result_array();
        }
        
        public function enquiry($data = array())
        {
            unset($data['submit']);
            $insert = $this->db->insert('enquiry', $data);
        }
}

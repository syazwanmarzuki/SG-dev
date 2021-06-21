<?php

    class Branch_Model extends CI_Model{

        public function __construct()
        {
            parent::__construct();

            $this->load->database();
        }

        public function create($data){
             $this->db->insert("tbl_branches" , $data);
        }

        public function get_all_branch(){
            $this->db->select("*");
            $this->db->from("tbl_branches");
            $this->db->order_by("id", "DESC");
            $query = $this->db->get();

            return $query->result();
        }
    }

?>
<?php

    require APPPATH."libraries/REST_Controller.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");

    class Semester extends REST_Controller{
        public function __construct(){
            parent::__construct();

            $this->load->model("api/semester_model");            
        }

        public function create_project_post(){

        }

        public function project_list_get(){
            
        }
    }
?>
<?php

    require APPPATH."libraries/REST_Controller.php";

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET");

    class Branch extends REST_Controller{
        public function __construct(){
            parent::__construct();

            $this->load->model("api/branch_model");            
        }

        public function create_post(){
            $data = json_decode(file_get_contents("php://input"));

            if (isset($data->name)){
                $branch_data = array(
                    "name" => $data->name
                );

                if ($this->branch_model->create($branch_data)){
                    $this->response(array(
                        "status" => 1,
                        "message" => "Branch successfully created"
                    ), parent::HTTP_OK);
                }else{
                    $this->response(array(
                        "status" => 0,
                        "message" => "Failed to create branch"
                    ), parent::HTTP_OK);
                }

            }else{
                $this->response(array(
                    "status" => 0,
                    "message" => "Branch name required"
                ), parent::HTTP_NOT_FOUND);
            }
        }

        public function list_get(){
            $branch_list = $this->branch_model->get_all_branch();

            if (count($branch_list) > 0){
                $this->response(array(
                    "status" => 1,
                    "message" => "Branch list",
                    "data" => $branch_list
                ));
            }
            else{
                $this->response(array(
                    "status" => 0,
                    "message" => "No data to be found"
                ), parent::HTTP_NOT_FOUND);
            }
        }

        public function delete_branch_delete(){
            $data = json_decode(file_get_contents("php://input"));

            if (isset($data->branch_id)){

            }
            else{
                $this->response(array(
                    "status" => 0,
                    "message" => "Branch id needed"
                ), parent::HTTP_NOT_FOUND);
            }
        }
    }
?>
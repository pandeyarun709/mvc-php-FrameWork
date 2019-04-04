<?php 
    class IndexController {
        private $model;

        function  _construct( $tile ) {
            $this->model = new $tile;
          
        }

        public function index() {
            return "Index Method";
        }

        public function login() {
            echo "<h1> check </h1>";
            echo "Login Method";
        }

        public function showUsers() {
            echo "check-----";
            print_r($this->model);
            echo "check 2";
            print_r($this->model->getUsers());
        }
    }

?>
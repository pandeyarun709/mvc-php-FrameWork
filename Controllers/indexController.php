<?php 
    class IndexController {
        private $model;

        function  _construct($title) {
            $this->model = new $title;
        }

        public function index() {
            return "Index Method";
        }

        public function login() {
            echo "Login Method";
        }
    }

?>
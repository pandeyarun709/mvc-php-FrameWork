<?php
use Core\Core\C_Base;
use Core\Core\Redirect;

class IndexController extends C_Base {
    function _construct($title) {
        $this->mode = new $title;
    }

    public function index() {
        /* Initializing a index.html view Found in (Views/index.html) */
         Init::view('index');
    }

    public function pay()
  	{
      Init::view('index');
  	}
    public function withdraw()
  	{
      Init::view('index');
  	}
}

?>
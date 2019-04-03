<?php
 
  if(isset($_SERVER["PATH_INFO"])) {
    
    $path = $_SERVER['PATH_INFO'];

    //split the path
    $path_split = explode('/', ltrim($path));
  } else {
    $path_split = '/';

  }
 
  // INDEX
  if($path_split === '/') {
      // import indexModel 
      require_once __DIR__."/Models/indexModel.php";
      
      //import indexController file
      require_once __DIR__."/Controllers/indexController.php";

      // create instance of indexModel
      $req_model = new indexModel();

      // create instance of indexController
      $req_controller = new indexController($req_model);

      /* 
       * @return class
       */
      $model = new $req_model;
      $controller = new $req_controller;

      /* Creating instance of Mode and Controller
       *  @ return object 
       */
      $ModelObj = new $model;
      $ControllerObj = new $controller($req_model);

      /*
       * @ return method name 
       */
      $method = $req_method;


      /*
       * Check if Controller Exist is not empty, then performs an
       * action on the method;
       * @return true;
       */
      
       // if URL has params then it runs
       if($req_method != '') {
         /*
          * Outputs The Required controller and the req *method respectively
          * @return Required Method;
          */
          print $ControllerObj->$method($req_param);

       } else {
         // it works only URL does not contain any frame work
         print $ControllerObj->index(); // calls the index func of indexController
       }
  } else {
       // other then index will handel here
  } 

  
?>
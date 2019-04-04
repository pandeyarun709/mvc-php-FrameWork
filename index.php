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
         // it works only URL does not contain any PARAMS frame work
         print $ControllerObj->index(); // calls the index func of indexController
       }
  } else {
    // ************ other then INDEX / ROOT will handel here *************************

      // Required Control name 
      $req_controller = $path_split[1];

      // Required Model
      $req_model = $path_split[1];

      /* Method Correspondng to params is fetched
       * Set required Method Name 
       * retunr method
       */
      $req_method = isset($path_split[2]) ? $path_split[2] : '';

      /*
       * Required Params
       * return Params
       */
      $req_param = array_slice($path_split , 3); // fetch param
      
      //check controller file exist or not 
      $req_controller_exist = __DIR__.'/Controllers/'.$req_controller.'Controller.php';

      if(file_exists($req_controller_exist)) {
        /*
         * Requiring all files of Model and Controller needed
         */
        
         require_once __DIR__.'/Models/'.$req_model.'Model.php';
         require_once __DIR__.'/Controllers/'.$req_controller.'Controller.php';

         /*
          * return class
          */

          $model = ucfirst($req_model).'Model'; //ucfirst -- convert first letter into upper case
          $controller = ucfirst($req_controller).'Controller';

          /* 
           *  return object
           */
          $ModelObj = new $model;
          $ControllerObj = new $controller(ucfirst($req_method.'Model')); 

          
          /*
          * Assigning Object of Class Init to a Variable, to make it Usable
          * return Method Name;
          */
          $method = $req_method;

          /*
           * Check if Controller METHOD Exist is not empty, then performs an
           * action on the method;
           * @return true;
           */
           if($req_method != '') {
               
            /*
            * Outputs The Required controller and the req *method respectively
            * @return Required Method;
            */
            print $ControllerObj->$method($req_param);

           } else {
             // This work only url not contain any parameter
             print $ControllerObj->index();
           }
      } else {
        
        header('HTTP/1.1 404 Not Found');
        die('404 - The file - '.$app->req_controller.' - not found');
        //require the 404 controller and initiate it
        //Display its view
      }


  } 

  
?>
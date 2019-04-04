<?php
    class IndexModel
    {
        function __construct(){

        }
        
        public function getUsers() {
            $users = [
                ["name" => "Arun", "Phone Number" => "090982xxxxxx"],
                ["name" => "Pandey", "Phone Number"=> "080982xxxxxx"]
            ];
            return json_encode($users);
        }
    }
?>
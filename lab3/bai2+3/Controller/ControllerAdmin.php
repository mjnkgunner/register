<?php

class admin{
    public function admincheck($admin, $password){

        $this->user = $admin;
        $this->pass =$password;
        if($this->user == "VanLinh" && $this->pass =="12345"){
            require_once "View/dashbroard.php";
        }
        else{
            echo "ban da nhap sai ten hoac mat khau";
        }
        
    }
}

?>
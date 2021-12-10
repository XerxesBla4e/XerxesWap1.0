<?php

class Usersview extends Users{

    public function retrieveUsers($email, $password ) {
       
        $stmt = $this->getUser($email, $password);

        if($stmt == 1){
          $_SESSION['user'] = $email;
          header("location:".HOMEURL.'admin/dashboard');
           
        }else{
          header("location:".HOMEURL.'admin/login');
        }
      #  echo "Full name:".$stmt[0]['firstname']." ".$stmt[0]['lastname'] ; 
     }

     public function retrieveAdmin() {
       return $this->getAdmin();
   }
}
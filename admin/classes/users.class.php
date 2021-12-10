<?php

class Users extends Connection{

    protected function getUser($email, $password ){

         $sql = 'SELECT * FROM login WHERE email=? AND pass=?';
         $res = $this->connect()->prepare($sql);

         $res->execute([$email,$password]);
         $count = $res->rowCount();
         $stmt = $res->fetchAll();
 
        return $count;
    }

    protected function getAdmin(){

     $sql = 'SELECT * FROM Admin';
     $res = $this->connect()->query($sql);

     $count = $res->rowCount();
     $stmt = $res->fetchAll();
     
    return $stmt;
}

    
    protected function setMovie($id,$title,$image_url,$description,$runtme,$year){
         $sql = "INSERT INTO movies(id,title,image_url,description,runtme,year) VALUES(?,?,?,?,?,?)";
         $stmt = $this->connect()->prepare($sql);
         $res = $stmt->execute([$id,$title,$image_url,$description,$runtme,$year]);
         if($res){
              echo "Success";
         }else{
              echo "Fail";
         }
    }

    protected function setGenre($id,$name){
     $sql = "INSERT INTO genres(id,name) VALUES(?,?)";
     $stmt = $this->connect()->prepare($sql);
     $res = $stmt->execute([$id,$name]);
     if($res){
          echo "Success";
     }else{
          echo "Fail";
     }
    }

    protected function setAdmin($name,$email,$phone,$upload){
     $query = "INSERT INTO Admin(name,email,phone,photo) VALUES(?,?,?,?)";
     $stmt = $this->connect()->prepare($query);
     $res = $stmt->execute([$name,$email,$phone,$upload]);
     if($res){
          echo "Success";
     }else{
          echo "Fail";
     }
    }
}
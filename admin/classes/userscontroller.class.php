<?php

class Userscontroller extends Users{

    public function createMovie($id,$title,$image_url,$description,$runtme,$year){
        $this->setMovie($id,$title,$image_url,$description,$runtme,$year);
    }

    public function createGenre($id,$name){
        $this->setGenre($id,$name);
    }

    
    public function createAdmin($name,$email,$phone,$upload){
        $this->setAdmin($name,$email,$phone,$upload);
    }
}

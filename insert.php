<?php

include_once('connection.php');


 $key = "Mugashab@gmail.com";
 $s = explode("@",$key);

 print_r($s[0]);
 

 /*
$name ="Pidson";
$username= "Pidson Manzi";

$password=md5($username);

$exec = $con->prepare("INSERT into tbl_admin(first_name,username,password) 
VALUES(?,?,?)") or die(mysqli_error($con));
$exec->bind_param('sss',$name,$username,$password);

if($exec->execute()){
    echo "success";
}else{
    echo "Fail";
}*/
<?php
session_start();
include('functions.php');
extract($_REQUEST);
if(isset($login)){
    $username = htmlspecialchars($username);
    //$password
    $password = sha1($password);
    $check = check_user($username,$password);
    if($check!=null && $check!==false){
        $data = $check;
        $_SESSION['user_login']=true;
        $_SESSION['user_id'] = $data->id;
        echo json_encode(array("type"=>true,"msg"=>""));
        die();
    }else{
        echo json_encode(array("type"=>false,"msg"=>"Username or password is incorrect"));
        die();
    }
}
if(isset($save)){
    $name = htmlspecialchars($name);
    $phone = htmlspecialchars($phone);
 //   $address = htmlspecialchars($address);
    $reg_no = htmlspecialchars($reg_no);
    $mr_no = htmlspecialchars($mr_no);
    $designation = htmlspecialchars($designation);
    $msg = htmlspecialchars($message);

    if(strlen($name)==0){
        echo json_encode(array("type"=>false,"msg"=>"Name can't be empty, please enter your name"));
        die();
    }
    if(strlen($phone)==0){
        echo json_encode(array("type"=>false,"msg"=>"Phone can't be empty, please enter your phone number"));
        die();
    }
    if(strlen($address)==0){
        echo json_encode(array("type"=>false,"msg"=>"Address can't be empty, please enter your address"));
        die();
    }
    if(strlen($reg_no)==0){
        echo json_encode(array("type"=>false,"msg"=>"Registration No. can't be empty, please enter your registration no."));
        die();
    }
    if(strlen($mr_no)==0){
        echo json_encode(array("type"=>false,"msg"=>"MR No. can't be empty, please enter your Mr. No"));
        die();
    }
    
    $id = save_user_data($name,$phone,$address,$reg_no,$mr_no,$designation,$msg);
    if(is_numeric($id)){
        echo json_encode(array("type"=>true,"msg"=>"","id"=>encode($id)));
        die();
    }else{
        echo json_encode(array("type"=>false,"msg"=>"sorry, there is an error while saving your data"));
        die();
    }
}
?>
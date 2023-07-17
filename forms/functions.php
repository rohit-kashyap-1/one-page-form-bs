<?php

require('connection.php');


function users($where='',$order='data.id desc',$limit=0,$offset=0){
    global $pdo;
    $a = ($limit!=0)?" limit $limit offset $offset ":'';
    try{
        $stmt = $pdo->prepare("select data.* from data where 1=1 $where  order by $order $a");
        if($stmt->execute()===true){
            return $stmt->fetchAll();
        }else{
            return implode(':',$stmt->errorInfo());
        }
        
    }catch(Exception $e){
        return $e->getMessage();
    }
}

function check_user($username,$password){
    global $pdo;
    try{
        $stmt = $pdo->prepare("select * from users where username=:username and password=:password");
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":password",$password);
        if($stmt->execute()===true){
            return $stmt->fetch();
        }else{
            return implode(':',$stmt->errorInfo());
        }
        
    }catch(Exception $e){
        return $e->getMessage();
    }
}
function get_user_data($id){
    global $pdo;
    try{
        $stmt = $pdo->prepare("select * from data where id=:id");
        $stmt->bindParam(":id",$id);
        if($stmt->execute()===true){
            return $stmt->fetch();
        }else{
            return implode(':',$stmt->errorInfo());
        }
        
    }catch(Exception $e){
        return $e->getMessage();
    }
}
function save_user_data($name,$phone,$address,$reg_no,$mr_no,$designation,$msg){
    global $pdo;
    try{
        $stmt = $pdo->prepare("insert into data(name,phone,address,reg_no,mr_no,designation,msg) values(:name,:phone,:address,:reg_no,:mr_no,:designation,:msg)");
        $stmt->bindParam(":name",$name);
        $stmt->bindParam(":phone",$phone);
        $stmt->bindParam(":address",$address);
        $stmt->bindParam(":reg_no",$reg_no);
        $stmt->bindParam(":mr_no",$mr_no);
        $stmt->bindParam(":designation",$designation);
        $stmt->bindParam(":msg",$msg);
        if($stmt->execute()===true){
            return $pdo->lastInsertId();
        }else{
            return implode(':',$stmt->errorInfo());
        }
        
    }catch(Exception $e){
        return $e->getMessage();
    }
}

 
 //utility functions
 function encode($string){
     return base64_encode($string);
 }
 function decode($string){
     return base64_decode($string);
 }
 function display_edit_title($title,$url){
     return "<div class='title'>
     <h5 >$title </h5>
     <a href='".$url."'class='btn btn-sm btn-dark'><i class='fa fa-arrow-left'></i> Back</a>
     </div>";
 }
 function display_listing_title($title,$url){
     return "<div class='title'>
     <h5 >$title </h5>
     <a href='".$url."'class='btn btn-sm btn-dark'><i class='fa fa-plus'></i> Add New</a>
     </div>";
 }
 function urlParamCount($url){
     $components = parse_url($url);
     if(isset($components['query'])){
         parse_str($components['query'], $results);
     return sizeof($results);
     }else{
         return 0;
     }
 }
 function removeParam($url, $param) {
     $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*$/', '', $url);
     $url = preg_replace('/(&|\?)'.preg_quote($param).'=[^&]*&/', '$1', $url);
     return $url;
 }
 function slug($text)
 {
   $text = preg_replace('~[^\pL\d]+~u', '-', $text);
   $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
   $text = preg_replace('~[^-\w]+~', '', $text);
   $text = trim($text, '-');
   $text = preg_replace('~-+~', '-', $text);
   $text = strtolower($text);
   if (empty($text)) {
     return 'n-a';
   }
 
   return $text;
 }
 
 function localSlug($string){
     return str_replace('.php','',$string);
 }
 function alert($type,$msg){
 if($type==true){
 return ' <div class="alert alert-success alert-dismissible fade show">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <strong>Info!</strong> '.$msg.'
           </div>';
 }else{
 return ' <div class="alert alert-danger alert-dismissible fade show">
             <button type="button" class="close" data-dismiss="alert">&times;</button>
             <strong>Info!</strong> '.$msg.'
           </div>';
 }
 }
 
 function clean($input){
     return preg_replace("/[^a-zA-Z.]+/", "", $input);
 }
 
 function validate_email($email){
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   return false;
 }else{
     return true;
 }    
 }
 
 function validate_phone($phone){
     if(preg_match("/^[0-9]{10}$/", $phone)){
         return true;
     }else{
         return false;
     }
 }
 function clear($string) {
    $string = str_replace(' ', ' ', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', ' ', $string); // Removes special chars.
 }
 function get_current_url(){
     return $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 }
 function getUserIP()
 {
     // Get real visitor IP behind CloudFlare network
     if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
               $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
               $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
     }
     $client  = @$_SERVER['HTTP_CLIENT_IP'];
     $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
     $remote  = $_SERVER['REMOTE_ADDR'];
 
     if(filter_var($client, FILTER_VALIDATE_IP))
     {
         $ip = $client;
     }
     elseif(filter_var($forward, FILTER_VALIDATE_IP))
     {
         $ip = $forward;
     }
     else
     {
         $ip = $remote;
     }
 
     return $ip;
 }
 
 function ms_redirect($file, $exit=true, $sess_msg=''){
    global $site_url;
    ob_end_clean();header("Location: ".$site_url."$file");exit();}
 function limit_text($length,$string){
     if(strlen($string)>$length)
     return $string = substr($string, 0, $length).'...';
     else
     return $string;
 }
 function current_url(){
     return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 }
 function url(){
    return $_SERVER['REQUEST_SCHEME'] .'://'. $_SERVER['HTTP_HOST'] 
    . explode('?', $_SERVER['REQUEST_URI'], 2)[0];
  }
 function clear_filter(){
    if(isset($_GET['filter']) && $_GET['filter']==true){
        echo "<a href='".url()."' class='btn btn-danger btn-sm'>Clear Filters</a>";
    }
 }

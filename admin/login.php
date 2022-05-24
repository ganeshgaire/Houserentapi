<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
//sheader('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$password= $data['password'];
include "config.php";
$checkUser ="SELECT *FROM adminsignup WHERE email ='$email' and password='$password'";
$checkQuery = mysqli_query($conn,$checkUser);
if(mysqli_num_rows($checkQuery)>0){
  
	
    $userdata = mysqli_fetch_assoc($checkQuery);
    echo json_encode(array('message' => 'Login Sucess', 'status' => 200,'data'=>$userdata));
}
else{
    echo json_encode(array('message' => 'Login Failed', 'status' => 401));
}
?>

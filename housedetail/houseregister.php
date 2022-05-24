<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


$data = json_decode(file_get_contents("php://input"), true);

$hname = $data['housename'];
$image = $data['image'];
$location = $data['location'];
$ownerno=$data['owner_no'];
$bedroom= $data['bedroom_no'];
$bathroom= $data['bathroom_no'];
$price= $data['price'];
$description=$data['description'];
include "config.php";
// echo "<img src='".base64_decode($image)."'>";return;
$image_name = round(microtime(true) * 1000). ".png"; //Giving new name to image.

$image_upload_dir =$_SERVER['DOCUMENT_ROOT'].'/houserentapi/housedetail/images/'.$image_name; //Set the path where we need to upload the image.
$checkUser ="SELECT *from housedetail WHERE house_name ='$hname'";
$checkQuery = mysqli_query($conn,$checkUser);

if(mysqli_num_rows($checkQuery)>0){
	 echo json_encode(array('message' => 'House already exist', 'status' => 409));
	

} else {
	$insertQuery = "INSERT INTO housedetail(house_name,house_image,location,owner_no,bedroom_no,bathroom_no,price,description) VALUES ('{$hname}', '{$image_name}', '{$location}','{$ownerno}','{$bedroom}','{$bathroom}','{$price}','{$description}')";
$result = mysqli_query($conn, $insertQuery);


if($result){


    $flag = file_put_contents($image_upload_dir, base64_decode($image));
	
	echo json_encode(array('message' => 'Register Sucess', 'status' => 200));

}else{

 echo json_encode(array('message' => 'Register Failed', 'status' => 406));

}
}
?>

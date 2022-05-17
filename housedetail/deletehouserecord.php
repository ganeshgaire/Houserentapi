<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$house_id = $data['id'];

include "config.php";

$sql = "DELETE FROM housedetail WHERE id = {$house_id}";

if(mysqli_query($conn, $sql)){
	
	echo json_encode(array('message' => 'House Record Deleted .', 'status' => true));

}else{

 echo json_encode(array('message' => 'House Record  not Deleted.', 'status' => false));

} 

?>

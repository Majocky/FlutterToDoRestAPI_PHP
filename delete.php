<?php
include("conn.php");
$id = $_POST['id'];
//  $username = isset($data['username']) ? $data['username'] : '';

$query="delete from notestable where id='".$id."'";
$run=mysqli_query($con,$query);
if($run){
    $response = array(
        'success' => true,
        'message' => 'Deleted'
    );
}else{
    $response = array(
        'success' => false,
        'message' => 'Failed to Update'
    );
}
header('Content-Type: application/json');
echo json_encode($response);
?>
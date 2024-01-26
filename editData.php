<?php
include("conn.php");
// $json_data = file_get_contents('php://input');
// $data = json_decode($json_data, true);

// $json_data = file_get_contents('php://input');
// $data = json_decode($json_data, true);
$topic=$_POST['topic'];
$note=$_POST['note'];
$datecreated=$_POST['datecreated'];
$id=$_POST['id'];

// $topic = isset($data['topic']) ? $data['topic'] : '';
// $note = isset($data['note']) ? $data['note'] : '';
// $datecreated = date("Y-m-d");//isset($data['datecreated']) ? $data['datecreated'] : '';
// $id=isset($data['id']) ? $data['id'] : '';

$query="UPDATE notestable SET topic='".$topic."', note='".$note."', dateUpdated='".$datecreated."' WHERE id='".$id."'";
$run=mysqli_query($con,$query);
if($run){
    $response = array(
        'success' => true,
        'message' => 'Updated successful'
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
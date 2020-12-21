<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Db.php';
include_once '../../model/Remotets.php';
$database= new Db();
$db=$database->con();
$remotets= new Remotets($db);
$data=json_decode(file_get_contents("php://input"));

$remotets->id = $data->id;

if($remotets->delete())
{
    echo json_encode(array('mesasge' => 'Deleted Device'));
}
else
{
    echo json_encode(array('message'=>'Device Not Deleted'));
}
?>
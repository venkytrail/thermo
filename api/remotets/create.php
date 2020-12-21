<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once '../../config/Db.php';
include_once '../../model/Remotets.php';
$database= new Db();
$db=$database->con();
$remotets= new Remotets($db);
$data=json_decode(file_get_contents("php://input"));
$remotets->m_id = $data->m_id;
$remotets->info = $data->info;
$remotets->dtemp = $data->dtemp;
$remotets->stemp = $data->stemp;
$remotets->sstime = $data->sstime;
if($remotets->create())
{
    echo json_encode(array('mesasge' => 'Created Device'));
}
else
{
    echo json_encode(array('message'=>'Device Not Created'));
}
?>
<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once '../../config/Db.php';
include_once '../../model/Remotets.php';
$database= new Db();
$db=$database->con();
$remotets= new Remotets($db);
$dstatus=$remotets->adinfo();
$nod=$dstatus->rowcount();
if($nod>0)
{
$device_arr =array();
$device_arr['data']=array();
while($row=$dstatus->fetch(PDO::FETCH_ASSOC))
{
    extract($row);
    $device=array('id'=>$id,'m_id'=>$m_id, 'powermode'=>$powermode, 'info'=>$info, 'dtemp'=>$dtemp, 'stemp'=>$stemp, 'sstime'=>$sstime);
    array_push($device_arr['data'],$device);
}
echo json_encode($device_arr);
}
else
{
    echo json_encode(array('message'=>'No Devices Found'));
}

?>
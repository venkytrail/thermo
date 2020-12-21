<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type: application/json');
include_once '../../config/Db.php';
include_once '../../model/Remotets.php';
$database= new Db();
$db=$database->con();
$remotets= new Remotets($db);
$remotets->id=isset($_GET['id']) ? $_GET['id'] : die();
$remotets->dinfo();

$device_arr=array('id'=>$remotets->id,'m_id'=>$remotets->m_id, 'powermode'=>$remotets->powermode, 'info'=>$remotets->info, 
                  'dtemp'=>$remotets->dtemp, 'stemp'=>$remotets->stemp, 'sstime'=>$remotets->sstime);
print_r(json_encode($device_arr));
?>
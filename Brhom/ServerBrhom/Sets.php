<?php
include "../Brhom/config.php";
session_start();
error_reporting(0);
header('Content-Type: application/json');

$URLSet = "https://". $_SERVER['HTTP_HOST'] ."/$NameServer/". $NameFolder ."/Set.php?Get1=";
$URLSets = "https://". $_SERVER['HTTP_HOST'] ."/$NameServer/". $NameFolder ."/Sets.php?Get1=";

function EncryptTow($Str) {
return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($Str)))));
}

$RandCKey = '!"#$%&\'()*+,-./01VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=2345670123456701234567012345670123456701234567012345670123456701234567012345670123456701234567012345670123456701234567dsacsvesddlkasmdcajnsfvewc89:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ[\]^_`abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzabcdefVjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwdVjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=ghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz{|}~===========================================VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=VjIwd01WRXdNWE5hUm14U1ZrVndWbGxZY0Zka01WSnhVMVJHVG1GNlJrcFpWVkpEVkRKV2NWRlliRlpoTWxGNlZGVmFjMVl4Um5SUFZUVnBWbTVDTmxkc1pIZFdNVXBDVUZRd1BRPT0=';
$_SESSION["ApiEncrypt"] = EncryptTow(substr(str_shuffle($RandCKey),1, 100));

function Encrypt($Str) {
return base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(join(substr(str_shuffle($RandCKey),1, 100), str_split($Str)))))));
//return $Str;
}

// $Key_Code = $_GET['Key_Code'];
// $uuid = $_GET['uuid'];

$uuid = $_GET['Get1'];
$uuidGet = $_GET['Get1'];
$Key = $_GET['Get2'];
$Key_Code = $_GET['Get2'];
// $Key_Code = base64_decode($Key); 
// $uuid = base64_decode($uuidGet);
$Bundleid = $_GET['Get3'];
$NameID = $_GET['Get4'];
$GetIP = $_SERVER["REMOTE_ADDR"];
$GetVer = $_GET['Get5'];

$query = mysqli_query($link,"SELECT * FROM `hack` WHERE id = '$GetVer'");
foreach($query as $row){
$Stop = $row["Stop"];
$StopMsg = $row["StopMsg"];
}

if ($Stop == "YES") {
$Stop = "1";
} else {
$Stop = "0";
}

if($Key_Code && $uuid && $GetVer == "1") {
$sql = "SELECT * FROM `keys` WHERE Key_Code = '$Key_Code'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$idGet = $row["id"];
$StatusNow = $row["Status"];
$Status = "Activated";
$NSTimerSub = $row["NSTimerSub"];
$NSTime = date('Y/m/d H:i:s');
$startDate = time();
if($NSTimerSub == "2 Hour"){
$NSTimeFinished =  date('Y/m/d H:i:s', strtotime('+2 Hour', $startDate));
} else if($NSTimerSub == "1 Day"){
$NSTimeFinished =  date('Y/m/d H:i:s', strtotime('+1 Day', $startDate));
} else if ($NSTimerSub == "7 Day"){
$NSTimeFinished =  date('Y/m/d H:i:s', strtotime('+7 Day', $startDate));
} else if($NSTimerSub == "30 Day"){
$NSTimeFinished = date('Y/m/d H:i:s', strtotime('+30 Day', $startDate));
}
}
} else {
}

$query = mysqli_query($link,"SELECT * FROM `keys` WHERE Key_Code = '$Key_Code'");
foreach($query as $row){
$ExpDate  = strtotime($row['NSTimerSubUse']);
$nowD = strtotime(date("Y/m/d H:i:s"));

if($StatusNow == "Reset") {
if($ExpDate <= $nowD){
$sql = "UPDATE `keys` SET Status = 'EndTime' WHERE id = $idGet";
if ($link->query($sql) === TRUE) {
echo '{"0":"'. $_SESSION["ApiEncrypt"] .'","1":"' .Encrypt('{"1":"3","2":"Code Expired","3":"'. $row['NSTimerSubUse']. '","5":"'. $Stop .'","6":"' . $StopMsg .'"}') .'"}';
}
} else {
$sql = "UPDATE `keys` SET uuid='$uuid', ip='$GetIP', Status='$Status', Name='$NameID', Bundleid='$Bundleid' WHERE id = '$idGet'";
if ($link->query($sql) === TRUE) {
echo '{"0":"'. $_SESSION["ApiEncrypt"] .'","1":"' .Encrypt('{"0":"'. $uuid .'","1":"1","2":"Code Reset","3":"'. $row['NSTimerSubUse'] . '","4":"' .$URLSet . $uuidGet .'&Get2='. $Key .'&Get5='. $GetVer .'","5":"'. $Stop .'","6":"' . $StopMsg .'","7":"'. $URLSets . $uuidGet .'&Get2='. $Key .'&Get5='. $GetVer .'"}') .'"}';
}
}

} else {
if($StatusNow == "NotActivated") {
$sql = "UPDATE `keys` SET uuid='$uuid', ip='$GetIP', Status='$Status', Name='$NameID', Bundleid='$Bundleid', NSTimerSubUse= '$NSTimeFinished', DateUse= '$NSTime'  WHERE id = $idGet";
if ($link->query($sql) === TRUE) {
echo '{"0":"'. $_SESSION["ApiEncrypt"] .'","1":"' .Encrypt('{"0":"'. $uuid .'","1":"1","2":"Device Saved","3":"'. $NSTimeFinished . '","4":"' .$URLSet . $uuidGet .'&Get2='. $Key .'&Get5='. $GetVer .'","5":"'. $Stop .'","6":"' . $StopMsg .'","7":"'. $URLSets . $uuidGet .'&Get2='. $Key .'&Get5='. $GetVer .'"}') .'"}';
}
} else {
$udid = $row["uuid"];
$KEY = $row["Key_Code"];

if ($udid == $uuid && $KEY == $Key_Code) {
if($ExpDate <= $nowD){
$sql = "UPDATE `keys` SET Status = 'EndTime' WHERE id = $idGet";
if ($link->query($sql) === TRUE) {
echo '{"0":"'. $_SESSION["ApiEncrypt"] .'","1":"' .Encrypt('{"1":"3","2":"Code Expired","3":"'. $row['NSTimerSubUse']. '","5":"'. $Stop .'","6":"' . $StopMsg .'"}') .'"}';
}
} else {
$sql = "UPDATE `keys` SET uuid='$uuid', ip='$GetIP', Name='$NameID', Bundleid='$Bundleid' WHERE id = '$idGet'";
if ($link->query($sql) === TRUE) {
echo '{"0":"'. $_SESSION["ApiEncrypt"] .'","1":"' .Encrypt('{"0":"'. $row['uuid'] .'","1":"1","2":"Logged in","3":"'. $row['NSTimerSubUse'] . '","4":"' .$URLSet . $uuidGet .'&Get2='. $Key .'&Get5='. $GetVer .'","5":"'. $Stop .'","6":"' . $StopMsg .'","7":"'. $URLSets . $uuidGet .'&Get2='. $Key .'&Get5='. $GetVer .'"}') .'"}';
}
}
} else {
if ($Key_Code == $KEY) {
echo '{"0":"'. $_SESSION["ApiEncrypt"] .'","1":"' .Encrypt('{"1":"2","2":"Code On Tnother Device","5":"'. $Stop .'","6":"' . $StopMsg .'"}') .'"}';
} else {
}
}
}
}
}
}
?>
<?php
require_once "config.php";
require_once "logout.php";
require_once "header.php";

$query = mysqli_query($link,"SELECT * FROM room");
foreach($query as $row){
$GetRoom = $row["Room"];
}

if ($_SESSION["Room"] == $GetRoom) {
$RoomNow = $_SESSION["Room"];
$sql = "DELETE FROM `room`";
if ($link->query($sql) === TRUE);

$Fix = "UPDATE `keys` SET `Status` = 'NotActivated' WHERE DateUse = ''";
if ($link->query($Fix) === TRUE);

$query = mysqli_query($link,"SELECT * FROM setting WHERE id = '1'");
foreach($query as $row){
$VerNow = $row["Ver"];
}

if(isset($_POST['SetDayHow'])) {
$update = "UPDATE `keys` SET Status = 'Reset' WHERE NSTimerSub = '30 Day' AND Status = 'Activated'";
if ($link->query($update) === TRUE) {
$query = mysqli_query($link,"SELECT * FROM `keys` WHERE NSTimerSub = '30 Day' AND Status = 'Reset'");
foreach($query as $row) {
$DayHow = $_POST['DayHow'];
$DateHow = $row['NSTimerSubUse'];
$id = $row['id'];
$DateHowNew = date('Y/m/d H:i:s', strtotime($DateHow . '+'. $DayHow .'day'));
$UpdateDate = "UPDATE `keys` SET `NSTimerSubUse` = '$DateHowNew' WHERE id = '$id'";
if ($link->query($UpdateDate) === TRUE);
echo "<script>window.location = 'index.php'</script>";
}
}
}

if(isset($_POST['SaveServer'])) {
$Servers;
for($i=0; $i<100; $i++) {
$Servers++;
$Server = $_POST['Server'. $Servers];
$Time = date('Y/m/d H:m:s');
$SaveServer = "UPDATE `servers` SET `Server`= '$Server' WHERE id = '$Servers'";
if ($link->query($SaveServer) === TRUE);
}

$LogEcho = 'Update Servers , '. 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);
echo "<script>window.location = 'index.php'</script>";
}

if(isset($_POST['SaveVer'])) {
$Ver = $_POST['Ver'];
$SVer = "UPDATE `setting` SET `Ver`= '$Ver' WHERE id = '1'";
if ($link->query($SVer) === TRUE);

$LogEcho = 'Edit Ver : '. $Ver  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);
echo "<script>window.location = 'index.php'</script>";
}

if(isset($_POST['AddVer'])){
$AddV = "INSERT INTO `hack` (`AntiBan`, `Stop`, `StopMsg`, `Updatee`, `UpdateMsg`) VALUES ('', '', '', '', '')";
if ($link->query($AddV) === TRUE);

$query = mysqli_query($link,"SELECT * FROM `hack` ORDER BY ID DESC LIMIT 1");
foreach($query as $row){
$LastVer = $row["id"];
}

$SVer = "UPDATE `setting` SET `Ver` = '$LastVer' WHERE id = '1'";
if ($link->query($SVer) === TRUE);

$LogEcho = 'Add Ver : '. $LastVer  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);
echo "<script>window.location = 'index.php'</script>";
}

$EditID = $_SESSION["EditID"];
$SERC = $_POST["Serc"];
$SErc = $_SESSION["Serc"];

if(isset($_POST['SerC'])){
$_SESSION["Serc"] = $SERC;
echo "<script>window.location = 'index.php";
echo "'</script>";
}

if(isset($_POST['Edit'])){
$idEdit = $_POST["Edit"];

$_SESSION["EditID"] = $idEdit;
echo "<script>window.location = 'index.php'</script>";
}

$query = mysqli_query($link,"SELECT * FROM `keys` WHERE id = $EditID");
foreach($query as $row) {
$KEYY = $row["Key_Code"];
$UUIDD = $row["uuid"];
$IPP = $row["ip"];
$DENDD = $row["NSTimerSubUse"];
}

if(isset($_POST['AddBan'])){
$UUIDB = $_POST["UUIDB"];
$IPB = $_POST["IPB"];

$ADMINADD = "INSERT INTO `block` (uuid, ip) VALUES ('$UUIDB', '$IPB')";
if ($link->query($ADMINADD) === TRUE);

$LogEcho = 'Add Ban : '. $UUIDB  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'INSERT')";
if ($link->query($AddLoG) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}

if(isset($_POST['AddAdmin'])){
$USER = $_POST["User"];
$PASS = $_POST["Pass"];

$ADMINADD = "INSERT INTO `users` (username, password, rank, LastLogin, Panel, Acti, NoActi) VALUES ('$USER', '$PASS', '$USER', '', 'No', 'No', 'No')";
if ($link->query($ADMINADD) === TRUE);

$LogEcho = 'Add Admin : '. $USER  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'INSERT')";
if ($link->query($AddLoG) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}

if(isset($_POST['EditI'])){
$KEY = $_POST["KEY"];
$UUID = $_POST["UUID"];
$IP = $_POST["IP"];
$DEND = $_POST["DEND"];
  
  
$update = "UPDATE `keys` SET Key_Code = '$KEY',uuid = '$UUID', ip = '$IP',NSTimerSubUse = '$DEND' WHERE id = $EditID";
if ($link->query($update) === TRUE);

$LogEcho = 'Edit Key : '. $KEY  ." , ". 'UUID : '. $UUID  ." , " ."ip : " . $IP ." , ". 'SubTime : '. $DEND;
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);

$_SESSION["EditID"] = "0";
echo "<script>window.location = 'index.php'</script>";
echo "<script>window.location = 'index.php'</script>";
}

$query = mysqli_query($link,"SELECT * FROM hack WHERE id = '$VerNow'");
foreach($query as $row){
$AntiBan = $row["AntiBan"];
$StopMsg = $row["StopMsg"];
$UpdateMsg = $row["UpdateMsg"];
}

if(isset($_POST['LogC'])){
$LogC= "DELETE FROM `log`";
if ($link->query($LogC) === TRUE);
echo "<script>window.location = 'index.php'</script>";
}

if(isset($_POST['submit2'])){
$idD = $_POST["submit2"];

$query = mysqli_query($link,"SELECT * FROM `keys` WHERE id = $idD");
foreach($query as $row){
$idKeyD = $row["Key_Code"];
}

$LogEcho = 'Delete Key : '. $idKeyD  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'DELETE')";
if ($link->query($AddLoG) === TRUE);

$sql = "DELETE FROM `keys` WHERE id=$idD";
if ($link->query($sql) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}

if (isset($_POST['submit'])) {
$DLET = "DELETE FROM `logkey`";
if ($link->query($DLET) === TRUE);

$Nump = $_POST["Nump"];
$LogEcho = 'Add Keys : '. $Nump  ." , ". 'Admin : '. $_POST["RANK"] ." , ". 'SubTime : '. $_POST["NSTimerSub"];
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'INSERT')";
if ($link->query($AddLoG) === TRUE);

for($i=0; $i<$Nump; $i++) {
$Key_Code = $_POST["Key"];
$NSTimerSub = $_POST["NSTimerSub"];
$RANK = $_POST["RANK"];
$NSTime = date('Y/m/d H:i:s');

$NotActivated = "NotActivated";

$rand = 'ABSCDEFGHIJKLMNOQRVSTYXYZ1234567890';
$CodeKEy = substr(str_shuffle($rand),1,15);
$CodeKey = "$SoKey$CodeKEy";

if ($Nump > 1) {
$CodeHow = $NameKey.$CodeKey;
} else {
$CodeHow = $NameKey.$Key_Code;
}

$sql = "INSERT INTO `keys` (uuid, ip, Status, Key_Code, Name, Bundleid, NSTimerSub, Date, DateUse, NSTimerSubUse, ForAdmin)
VALUES ('', '', '$NotActivated', '$CodeHow', '', '', '$NSTimerSub', '$NSTime', '', '','$RANK')";
if ($link->query($sql) === TRUE);

$sql = "INSERT INTO `logkey` (Key_Code) VALUES ('$CodeHow')";
if ($link->query($sql) === TRUE);

$LogEcho = 'Add Key : '. $CodeHow  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'INSERT')";
if ($link->query($AddLoG) === TRUE);
}

$_SESSION["Show"] = "YES";
echo "<script>window.location = 'index.php'</script>";
$link->close();
}

if(isset($_POST['edit'])){
$id = $_POST["edit"];

$update = "UPDATE `keys` SET Status = 'Reset',uuid = '',ip = '' WHERE id = $id";
if ($link->query($update) === TRUE);

$query = mysqli_query($link,"SELECT * FROM `keys` WHERE id = $id");
foreach($query as $row){
$idKey = $row["Key_Code"];
}

$LogEcho = 'Reset Key : '. $idKey  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}

if(isset($_POST['ResetAll'])){
$update = "UPDATE `keys` SET Status = 'Reset' WHERE Status = 'Activated'";
if ($link->query($update) === TRUE) {

$LogEcho = 'Reset All'." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}
}

if(isset($_POST['DeleteAll'])){
$update = "DELETE FROM `keys`";
if ($link->query($update) === TRUE) {
$LogEcho = 'Delete All'." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'DELETE')";
if ($link->query($AddLoG) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}
}

if(isset($_POST['TimeAll'])){
$update = "DELETE FROM `keys` WHERE Status = 'EndTime'";
if ($link->query($update) === TRUE) {
$LogEcho = 'Delete All Time End'." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'DELETE')";
if ($link->query($AddLoG) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}
}

if(isset($_POST['BanAll'])){
$update = "DELETE FROM `block`";
if ($link->query($update) === TRUE) {
$LogEcho = 'Delete All Ban'." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'DELETE')";
if ($link->query($AddLoG) === TRUE);
$FixBan = "UPDATE `keys` SET `Status` = 'Reset' WHERE Status = 'block'";
if ($link->query($FixBan) === TRUE);

echo "<script>window.location = 'index.php'</script>";
}
}

if(isset($_POST['ban'])){
$iD = $_POST["ban"];
$query = mysqli_query($link,"SELECT * FROM `keys` WHERE id = $iD");
foreach($query as $row){
$uUIDD = $row["uuid"];
$iP = $row["ip"];
$Status = $row["Status"];
}

if ($Status == "Block") {
$UNBLOCK = "UPDATE `keys` SET Status = 'Reset' WHERE id = $iD";
if ($link->query($UNBLOCK) === TRUE);
$LogEcho = 'UnBan User : '. $uUIDD ." , " ."ip : " .$iP  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);
$UnBlock = "DELETE FROM `block` WHERE ip = '$iP'";
if ($link->query($UnBlock) === TRUE);

echo "<script>window.location = 'index.php'</script>";
} else {
$BLOCK = "UPDATE `keys` SET Status = 'Block' WHERE id = $iD";
if ($link->query($BLOCK) === TRUE);
$Time = date('Y/m/d H:m:s');
$Block = "INSERT INTO `block` (`ip`, `uuid`, `Time`) VALUES ('$iP', '$uUIDD', '$Time');";
if ($link->query($Block) === TRUE);
$LogEcho = 'Ban User : '. $uUIDD ." , " ."ip : " .$iP  ." , ". 'Time : '. date("Y/m/d H:m:s");
$AddLoG = "INSERT INTO `log` (`Log`, `Set`) VALUES ('$LogEcho', 'UPDATE')";
if ($link->query($AddLoG) === TRUE);
echo "<script>window.location = 'index.php'</script>";
}
}

$rand = 'ABSCDEFGHIJKLMNOQRVSTYXYZ1234567890';
$Code_KEy = substr(str_shuffle($rand),1,15);

$TowHour = "2 Hour";
$OneDay =  "1 Day";
$SevenDay =  "7 Day";
$ThreeDay = "30 Day";

$count = 0;
$query = mysqli_query($link,"SELECT * FROM `keys` WHERE Status = 'Activated'");
foreach($query as $row){
$count++; 
}

$counts = 0;
$query = mysqli_query($link,"SELECT * FROM `keys`");
foreach($query as $row){
$counts++; 
}

$countse = 0;
$query = mysqli_query($link,"SELECT * FROM `users` WHERE Rank != 'Control'");
foreach($query as $row){
$countse++; 
}

$countese = 0;
$query = mysqli_query($link,"SELECT * FROM `keys` WHERE Status = 'EndTime'");
foreach($query as $row){
$countese++; 
}

$num_per_page = 10;
if(isset($_SESSION["page"])) {
$page = $_SESSION["page"];
} else {
$_SESSION["page"] = 1;
}
?>

<script>
function Soon() {
(async () => {
Swal.fire({
title:"الاحصائيات",
html: "عدد الاكواد : <?php echo $counts; ?> <br> عدد الاكواد المفعلة : <?php echo $count; ?> <br> عدد  الاكواد المنتهيه : <?php echo $countese; ?> <br> عدد الموزعين : <?php echo $countse; ?> <br>",
showCloseButton: true,
showConfirmButton:false
})
})()
}

function SKey() {
(async () => {
Swal.fire({
title:"تم اضافة الاكواد",
html: "<?php $query = mysqli_query($link,"SELECT * FROM `logkey`"); foreach($query as $row){ echo $row["Key_Code"] ."<br>"; }?>",
showCloseButton: true,
showConfirmButton:false
})
})()
}

<?php
$option1 = '<option value="';
$option2 = '">';
$option3 = '</option>';
?>

function AddKey() {
(async () => {
Swal.fire({
  title: 'اضافة كود',
  showCloseButton: true,
  html:'<form method="post"><input name="Key" type="text" value="<?php echo $Code_KEy; ?>" class="swal2-input" placeholder="الكود"><input name="Nump" type="text" value="1"  class="swal2-input" style="margin: 0.3em 0.3em 0; width: 23%;" placeholder="عدد"><select name="NSTimerSub" style="width: 70%; height: 40px; border-radius: 4px;"> <option value="<?php echo $TowHour; ?>"><?php echo $TowHour; ?></option> <option value="<?php echo $OneDay; ?>"><?php echo $OneDay; ?></option> <option value="<?php echo $SevenDay; ?>"><?php echo $SevenDay; ?></option> <option value="<?php echo $ThreeDay; ?>"><?php echo $ThreeDay; ?></option></select><select name="RANK" style="width: 100%; height: 40px; border-radius: 4px;"><?php $sql = "SELECT rank FROM users"; $result = $link->query($sql); if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { echo $option1,$row["rank"],$option2,$row["rank"],$option3; }} ?></select><button name="submit" type="submit" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حفظ</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function EditKey() {
(async () => {
Swal.fire({
  title: 'تعديل كود',
  showCloseButton: true,
  html:'<form method="post"><input name="KEY" type="text" value="<?php echo $KEYY; ?>" class="swal2-input" placeholder="الكود"><input name="UUID" type="text" value="<?php echo $UUIDD; ?>" class="swal2-input" placeholder="معرف الجهاز"><input name="IP" type="text" value="<?php echo $IPP; ?>" class="swal2-input" placeholder="الايبي"><input name="DEND" type="text" value="<?php echo $DENDD; ?>" class="swal2-input" placeholder="تاريخ الأنتهاء"><button name="EditI" type="submit" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حفظ</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function Menu() {
(async () => {
Swal.fire({
  title: 'تعويض اكواد الشهري',
  showCloseButton: true,
  html:'<form method="post"><label style="color: #fff; margin-bottom: .0rem;">مدة التعويض بالايام</label><input name="DayHow" type="text" class="swal2-input" placeholder="مدة التعويض"><button type="submit" name="SetDayHow" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حفظ</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function Log() {
(async () => {
Swal.fire({
  title: 'السجل',
  showCloseButton: true,
  html:'<center style="height: 200px; overflow: scroll;"><?php $getlog = mysqli_query($link,"SELECT * FROM `log`");
foreach($getlog as $row){ echo '<h5 class="h5Log">'.$row["Log"]. "<br>"."</h5>"; } ?></center><form method="post"><button name="LogC" type="submit" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">مسح السجل</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function Admin() {
(async () => {
Swal.fire({
  title: 'اضافة موزع',
  showCloseButton: true,
  html:'<form method="post"><input name="User" type="text" class="swal2-input" placeholder="اسم المستخدم"><input name="Pass" type="text" class="swal2-input" placeholder="كلمة السر"><button formaction="Admins.php" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">انتقال الى ادارة الموزعين</button><button name="AddAdmin" type="submit" class="btn btn-round btn-primary" style="margin-top: 3px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حفظ</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function Ban() {
(async () => {
Swal.fire({
  title: 'اضافة حظر',
  showCloseButton: true,
  html:'<form method="post"><input name="UUIDB" type="text" class="swal2-input" placeholder="uuid"><input name="IPB" type="text" class="swal2-input" placeholder="ip"><button formaction="Bans.php" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">انتقال الى ادارة المحظورين</button></button><button name="BanAll" type="submit" class="btn btn-round btn-primary" style="margin-top: 3px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">مسح جميع المحظورين</button><button name="AddBan" type="submit" class="btn btn-round btn-primary" style="margin-top: 3px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حفظ</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function Editi() {
(async () => {
Swal.fire({
  title: 'تحرير الاكواد',
  showCloseButton: true,
  html:'<form method="post"><button name="TimeAll" type="submit" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حذف جميع الاكواد المنتهيه</button><button name="DeleteAll" type="submit" class="btn btn-round btn-primary" style="margin-top: 5px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حذف جميع الاكواد</button><button name="ResetAll" type="submit" class="btn btn-round btn-primary" style="margin-top: 5px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">ترسيت جميع الأكواد</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function Getip(IP ,IPE) {
(async () => {
Swal.fire({
title:IP,
html: IPE,
showCloseButton: true,
showConfirmButton:false
})
})()
}
</script>

<div class="topnav">
<a class="active" href=""><i class="fa fa-home"></i></a>
<a href="#" onclick="AddKey()"><i class="fa fa-plus"></i></a>
<a href="#" onclick="Editi()"><i class="fa fa-ellipsis-h"></i></a>
<a href="#" onclick="Admin()"><i class="fa fa-users"></i></a>
<a href="#" onclick="Soon()"><i class="fa fa-bar-chart"></i></a>
</div>
<br>
<div class="card">
<div class="card-body">
<div class="table-responsive invoice_list">
<table class="table table-hover table-striped table-vcenter text-nowrap">
<thead>
<tr>
<th><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<input type="checkbox" onclick="toggle(this);"/>
<button onclick="myFunction()" style="color: #18BADD;" class="btn btn-icon" ><i class="fa fa-trash"></i></button></td>
</form></th>

<script>
function myFunction() {
if (confirm("هل انت متأكد ؟")) {
} else {
}
}
</script>
<th>الموزع</th>
<th>رقم المشترك</th>
<th>معلومات الجهاز</th>
<th><form method="post"><input name="Serc" value="<?php echo $SErc; ?>" type="Text" placeholder="بحث عن كود او موزع"><button name="SerC" style="color: #18BADD;" class="btn btn-icon"><i class="fa fa-search"></i></button></form></th>
<th>حاله الاشتراك</th>
<th>مدة الكود</th>
<th>تاريخ الاستخدام</th>
<th>تحرير</th>
</tr>
</thead>
<tbody>

<script language="JavaScript">
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
</script>
<?php
if ($SErc == "") {
$start_from = ($page-1) * 10;
$SSECQ = "SELECT * FROM `keys` limit $start_from,$num_per_page";
} else {
$SSECQ = "SELECT * FROM `keys` WHERE Key_Code = '$SErc' OR ForAdmin = '$SErc'";
}
$queryse = mysqli_query($link,$SSECQ);
foreach($queryse as $row){
?>

<tr>
<td>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
<input type="checkbox" name="DLE<?php echo $row["id"] ?>" value="<?php echo $row["id"] ?>" id="DLE <?php echo $row["id"] ?>" />
</form>

<?php
$DLE = filter_input(INPUT_POST, 'DLE<?php echo $row["id"] ?>', FILTER_SANITIZE_STRING);

if ($DLE&$row["id"]) {
$idd = $_POST["DLE"];
    
$sql = "DELETE FROM `keys` WHERE id=$idd";
if ($link->query($sql) === TRUE);
} else {
}
?>
</td>
<td><?php echo $row["ForAdmin"] ?></td>
<td><?php echo $row["id"] ?></td>
<td>
<div class="d-flex align-items-center">
<div class="ml-1">
<p class="mb-0"><?php echo $row["uuid"]; ?></p>
<a onclick="Getip('<?php echo $row["ip"]; ?>','<?php $IPS = $row["ip"]; $GET = json_decode(file_get_contents("http://ip-api.com/json/" .$IPS)); echo 'رمز الدولة : ' .$GET->countryCode .'<br>'; echo 'التوقيت : ' .$GET->timezone .'<br>'; echo 'المديتة : ' .$GET->city; ?>')" class="mb-0"><?php echo $row["ip"]; ?></a>
</div>
</div>
</td>
<td><?php echo $row["Key_Code"]; ?></td>

<?php
if ($row["Status"] == "Activated") {
$success = "success";
$successT = "مفعل";
} else if ($row["Status"] == "NotActivated") {
$success = "info";
$successT = "غير مفعل";
} else if ($row["Status"] == "Block") {
$success = "Block";
$successT = "محظور";
} else if ($row["Status"] == "EndTime") {
$success = "danger";
$successT = "انتهت المدة";
} else if ($row["Status"] == "Reset") {$success = "warning";
$successT = "مرست";
}

if ($_SESSION["EditID"] > 0) {
echo "<script>EditKey();</script>";
}

if ($_SESSION["Show"] == "YES") {
echo "<script>SKey();</script>";
$_SESSION["Show"] = "NO";
}
?>

<td><span class="tag tag-<?php echo $success; ?>"><?php echo $successT; ?></span></td>
<td>
<div class="d-flex align-items-center">
<div class="ml-1">
<p class="mb-0"><?php echo $row["Date"]; ?></p>
<p class="mb-0"><?php echo $row["NSTimerSub"]; ?></p>
</div>
</div>
</td>
<td>
<div class="d-flex align-items-center">
<div class="ml-1">
<p class="mb-0"><?php echo $row["DateUse"]; ?></p>
<p class="mb-0"><?php echo $row["NSTimerSubUse"]; ?></p>
</div>
</div>
</td>
<td>
<form method="post">
<button style="color: #18BADD;" type="submit" name="Edit" value="<?php echo $row["id"] ?>" class="btn btn-icon"><i class="fa fa-edit"></i></button>
<button style="color: #18BADD;" type="submit" name="ban" value="<?php echo $row["id"] ?>" class="btn btn-icon"><i class="fa fa-ban"></i></button>
</form>
<form method="post">
<button style="color: #18BADD;" type="submit" name="edit" value="<?php echo $row["id"] ?>" class="btn btn-icon"><i class="fa fa-refresh"></i></button>
<button style="color: #18BADD;" type="submit" name="submit2" value="<?php echo $row["id"] ?>"class="btn btn-icon" ><i class="fa fa-trash"></i></button></td>
</form>
</tr>
<?php } ?>
</tbody>
</table>
<?php if (!$SErc) { ?>
<center style="width: 100%; height: 50px; overflow: scroll;">
<?php
$queryr = mysqli_query($link,"SELECT * FROM `keys`");
$total_record = mysqli_num_rows($queryr);
$total_page = ceil($total_record/$num_per_page);
if($page>1) {
$_SESSION["page"] = ($page-1);
echo "<a href='index.php' class='btn btn-danger'>السابق</a>";
}
                
for($i=1;$i<$total_page;$i++) {
$_SESSION["page"] = $i;
echo "<a href='index.php' class='btn btn-primary'>$i</a>";
}

if($i>$page) {
$_SESSION["page"] = ($page+1);
echo "<a href='index.php' class='btn btn-danger'>التالي</a>";
}
?>
</center>
<?php } mysqli_close($link); ?>
</div>
</div>
</div>
</div>
</div>

<style>
.swal2-actions {
    display: none;
}

h5.h5Log {
    font-size: 12px;
}
</style>

<?php include "footer.php"; } ?>
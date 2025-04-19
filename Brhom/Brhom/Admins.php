<?php
require_once "logout.php";
require_once "header.php";
require_once "config.php";

$query = mysqli_query($link,"SELECT * FROM room");
foreach($query as $row){
$GetRoom = $row["Room"];
}

if ($_SESSION["Room"] == $GetRoom) {
$RoomNow = $_SESSION["Room"];
$sql = "DELETE FROM `room`";
if ($link->query($sql) === TRUE);

$EditID = $_GET["EditID"];
$query = mysqli_query($link,"SELECT * FROM `users` WHERE id = $EditID");
foreach($query as $row){
$KEYY = $row["username"];
$UUIDD = $row["password"];
}

if(isset($_POST['EditI'])){
$KEY = $_POST["KEY"];
$UUID = $_POST["UUID"];  
  
$update = "UPDATE `users` SET username = '$KEY',password = '$UUID' WHERE id = $EditID";
if ($link->query($update) === TRUE);
  
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['submit2'])){
$id = $_POST["submit2"];

$query = mysqli_query($link,"SELECT * FROM `users` WHERE id = $id");
foreach($query as $row){
$idKeyD = $row["username"];
}

$sql = "DELETE FROM `users` WHERE id=$id";
if ($link->query($sql) === TRUE);

echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['deleteAll'])){
$id = $_POST["deleteAll"];
$sql = "DELETE FROM `keys` WHERE ForAdmin = '$id'";
if ($link->query($sql) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['YPanel'])){
$id = $_POST["YPanel"];
$update = "UPDATE `users` SET Panel = 'No' WHERE username = '$id'";
if ($link->query($update) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['NPanel'])){
$id = $_POST["NPanel"];
$update = "UPDATE `users` SET Panel = 'Yes' WHERE username = '$id'";
if ($link->query($update) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['YActi'])){
$id = $_POST["YActi"];
$update = "UPDATE `users` SET Acti = 'No' WHERE username = '$id'";
if ($link->query($update) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['NActi'])){
$id = $_POST["NActi"];
$update = "UPDATE `users` SET Acti = 'Yes' WHERE username = '$id'";
if ($link->query($update) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['YNActi'])){
$id = $_POST["YNActi"];
$update = "UPDATE `users` SET NoActi = 'No' WHERE username = '$id'";
if ($link->query($update) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}

if(isset($_POST['NOActi'])){
$id = $_POST["NOActi"];
$update = "UPDATE `users` SET NoActi = 'Yes' WHERE username = '$id'";
if ($link->query($update) === TRUE);
echo "<script>window.location = 'Admins.php'</script>";
}
?>

<script>
function EditKey() {
(async () => {
Swal.fire({
  title: 'تعديل موزع',
  showCloseButton: true,
  html:'<form method="post"><input name="KEY" type="text" value="<?php echo $KEYY; ?>" class="swal2-input" placeholder="اسم المستخدم"><input name="UUID" type="text" value="<?php echo $UUIDD; ?>" class="swal2-input" placeholder="كلمة السر"><button name="EditI" type="submit" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: -webkit-fill-available; height: 35px;">حفظ</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function KeyStatus(Name, Data) {
(async () => {
Swal.fire({
  title:'تحكم باكواد الموزع : ' + Name,
  showCloseButton: true,
  html:Data + '<form method="post"><button type="submit" name="YPanel" value="' + Name + '" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: 48%; height: 35px;">تفعيل اللوحة</button><button name="NPanel" value="' + Name + '" type="submit" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: 48%; height: 35px; margin-left: 5px;">تعطيل اللوحة</button><button name="YActi" value="' + Name + '" type="submit" class="btn btn-round btn-primary" style="margin-top: 5px; background-color: #18BADD; width: 48%; height: 35px;">تفعيل الاكواد المفعله</button><button name="YNActi" value="' + Name + '" type="submit" class="btn btn-round btn-primary" style="margin-top: 5px; background-color: #18BADD; width: 48%; height: 35px; margin-left: 5px;">تفعيل الاكواد الغير مفعله</button><button name="NActi" value="' + Name + '" type="submit" class="btn btn-round btn-primary" style="margin-top: 5px; background-color: #18BADD; width: 48%; height: 35px;">تعطيل الاكواد المفعله</button><button name="NOActi" value="' + Name + '" type="submit" class="btn btn-round btn-primary" style="margin-top: 5px; background-color: #18BADD; width: 48%; height: 35px; margin-left: 5px;">تعطيل الاكواد الغير مفعله</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}

function DeleteAll(Name) {
(async () => {
Swal.fire({
  title:'مسح جميع اكواد الموزع : ' + Name,
  showCloseButton: true,
  html:'<form method="post"><button type="submit" name="deleteAll" value="' + Name + '" class="btn btn-round btn-primary" style="margin-top: 30px; background-color: #18BADD; width: 48%; height: 35px;">حذف</button></form>',
  focusConfirm: false,
showConfirmButton:false
})
})()
}
</script>

<?php
if ($EditID > 0) {
echo "<script>EditKey();</script>";
}
?>

<div class="section-body mt-3">

<div class="card">
<div class="card-body ribbon">
<div class="ribbon-box green">   </div>
<a href="index.php" class="my_sort_cut text-muted">
<i class="fa fa-power-off"></i>
<span>العوده لقائمه المشتركين</span>
</a>
</div>
</div>
</div>
<!-- -->
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
<th>رقم الموزع</th>
<th>اسم المستخدم</th>
<th>كلمة السر</th>
<th>الرتبة</th>
<th>اخر تسجيل دخول</th>
<th>تحرير</th>
<th>عدد الاكواد</th>
<th>عدد الاكواد المفعلة</th>
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
$query = mysqli_query($link,"SELECT * FROM `users` WHERE id != '1'");
foreach($query as $row){
$UserName = $row["username"];
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
    
$sql = "DELETE FROM `users` WHERE id=$idd";
if ($link->query($sql) === TRUE);
} else {
}
?>
</td>
<td><?php echo $row["id"] ?></td>
<td>
<div class="d-flex align-items-center">
<div class="ml-1">
<p class="mb-0"><?php echo $row["username"]; ?></p>
</div>
</div>
</td>
<td><?php echo $row["password"]; ?></td>
<td>موزع</td>
<td><?php echo $row["LastLogin"]; ?></td>
<td>
<form method="post">
<a style="color: #18BADD;" href="?EditID=<?php echo $row["id"] ?>" class="btn btn-icon"><i class="fa fa-edit"></i></a>
<a style="color: #18BADD;" class="btn btn-icon" onclick="DeleteAll('<?php echo $row["username"] ?>')"><i class="fa fa-minus"></i></a>
<a style="color: #18BADD;" class="btn btn-icon" onclick="KeyStatus('<?php echo $row["username"] ?>', 'ايقاف اللوحة : <?php echo $row["Panel"] ?> <br> ايقاف الاكواد المفعله : <?php echo $row["Acti"] ?> <br> ايقاف الاكواد الغير مفعله : <?php echo $row["NoActi"] ?> <br>')"><i class="fa fa-ban"></i></a>
<button style="color: #18BADD;" type="submit" name="submit2" value="<?php echo $row["id"] ?>" class="btn btn-icon" ><i class="fa fa-trash"></i></button></td>
</form>
<td><?php $counts = 0; $query = mysqli_query($link,"SELECT * FROM `keys` WHERE ForAdmin = '$UserName'"); foreach($query as $row){ $counts++; } echo $counts; ?></td>
<td><?php $count = 0; $query = mysqli_query($link,"SELECT * FROM `keys` WHERE ForAdmin = '$UserName' && Status = 'Activated'"); foreach($query as $row){ $count++; } echo $count; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>

<style>
.swal2-actions {
    display: none;
}
</style>

<?php include "footer.php"; } ?>
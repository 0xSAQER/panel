<?php
require_once "logoutA.php";
require_once "config.php";

$id = base64_decode(hexToStr (base64_decode(hexToStr (base64_decode($_SESSION["UserName"])))));
$query = mysqli_query($link,"SELECT * FROM users WHERE username = '$id'");
foreach($query as $row){
$GetPanel = $row["Panel"];
}

if ($GetPanel == "Yes") { ?>
<body style="background-color: #1e1d21;">
<h1 style="color: white; text-align: center;">تم إيقاف لوحة الموزع بسبب عدم الالتزام بسعر البيع</h1>
</body>
<?php
} else {
require_once "header2.php";
$Rank = base64_decode(hexToStr (base64_decode(hexToStr (base64_decode($_SESSION["UserName"])))));
$SERC = $_POST["Serc"];
$SErc = $_SESSION["Serc"];

if(isset($_POST['SerC'])){
$_SESSION["Serc"] = $SERC;
echo "<script>window.location = 'Admin.php";
echo "'</script>";
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

echo "<script>window.location = 'Admin.php'</script>";
echo "<script>window.location = 'Admin.php'</script>";
}

$num_per_page = 10;
if(isset($_SESSION["page"])) {
$page = $_SESSION["page"];
} else {
$_SESSION["page"] = 1;
}
?>

<div class="section-body mt-3">

</div>
</div>
<div class="card">
<div class="card-body">
<div class="table-responsive invoice_list">
<table class="table table-hover table-striped table-vcenter text-nowrap">
<thead>
<tr>
<th>رقم المشترك</th>
<th>معلومات الجهاز</th>
<th><form method="post"><input name="Serc" value="<?php echo $SErc; ?>" type="Text" placeholder="بحث عن كود"><button name="SerC" style="color: #18BADD;" class="btn btn-icon"><i class="fa fa-search"></i></button></form></th>
<th>حاله الاشتراك</th>
<th>مدة الكود</th>
<th>تاريخ الاستخدام</th>
<th>تحرير</th>
</tr>
</thead>
<tbody>

<?php
if ($SErc == "") {
$start_from = ($page-1) * 10;
$SSECQ = "SELECT * FROM `keys` WHERE ForAdmin = '$Rank' limit $start_from,$num_per_page";
} else {
$SSECQ = "SELECT * FROM `keys` WHERE ForAdmin = '$Rank' AND Key_Code = '$SErc'";
}
$queryse = mysqli_query($link,$SSECQ);
foreach($queryse as $row){
?>

<tr>
<td><?php echo $row["id"] ?></td>
<td>
<div class="d-flex align-items-center">
<div class="ml-1">
<p class="mb-0"><?php echo $row["uuid"]; ?></p>
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
$success = "danger";
$successT = "محظور";
} else if ($row["Status"] == "Reset") {
$success = "warning";
$successT = "مرست";
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
<button style="color: #18BADD;" type="submit" name="edit" value="<?php echo $row["id"] ?>" class="btn btn-icon"><i class="fa fa-refresh"></i></button>
</form>
</tr>
<?php } ?>
</tbody>
</table>
<?php if (!$SErc) { ?>
<center style="width: 100%; height: 50px; overflow: scroll;">
<?php
$queryr = mysqli_query($link,"SELECT * FROM `keys` WHERE ForAdmin = '$Rank'");
$total_record = mysqli_num_rows($queryr);
$total_page = ceil($total_record/$num_per_page);
if($page>1) {
$_SESSION["page"] = ($page-1);
echo "<a href='Admin.php' class='btn btn-danger'>السابق</a>";
}
                
for($i=1;$i<$total_page;$i++) {
$_SESSION["page"] = $i;
echo "<a href='Admin.php' class='btn btn-primary'>$i</a>";
}

if($i>$page) {
$_SESSION["page"] = ($page+1);
echo "<a href='Admin.php' class='btn btn-danger'>التالي</a>";
}
?>
</center>
<?php } ?>
</div>

</div>
</div>
</div>
</div>

<style>
.swal2-actions {
    display: none;
}

a.btn.btn-primary {
    margin-left: 3px;
    margin-right: 4px;
    margin-top: 4px;
}
</style>

<?php include "footer.php"; }?>

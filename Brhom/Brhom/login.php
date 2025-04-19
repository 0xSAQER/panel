<?php
session_start();
include 'server.php';
?>

<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>LOGIN</title>

<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/theme4.css"/>

</head>
<body class="font-montserrat sidebar_dark">

<script>
(async () => {
const inputOptions = new Promise((resolve) => {
  setTimeout(() => {
    resolve({
      '?Lang=Ar': 'Arabic',
      '?Lang=En': 'Einglish'
    })
  }, 1000)
})

const { value: color } = await Swal.fire({
  title: 'Language | اللغة',
  input: 'radio',
  inputOptions: inputOptions,
  inputValidator: (value) => {
    if (!value) {
      return 'Select The Language | قم بتحديد اللغة'
    }
  }
})

if (color) {
}
})()
</script>

<div class="auth">
<div class="card">
<div class="text-center mb-2">
</div>
<div class="card-body">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<div class="form-group">
<label class="form-label">اسم المستخدم</label>
<input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
</div>
<div class="form-group">
<label class="form-label">كلمه السر</label>
<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>

<div class="form-footer">
<input type="submit" name="login_user"  class="btn btn-primary btn-block" value="Sign in">

</div>
</from>

<style>
.auth {
    display: flex;
    height: 100%;
    width: 80%;
    margin-left: 10%;
    align-items: center;
}

body {
    background-color: #1e1d21;
}

.btn-primary {
    background: #18BADD;
}

.card {
    background-color: #35343a;
}

.card-title {
    color: white;
}

label.form-label {
    color: white;
}
</style>

<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="assets/js/core.js"></script>
</body>
</html>

<style>
.swal2-popup.swal2-modal.swal2-icon-error.swal2-show {
    background-color: #35343a;
}

button.swal2-confirm.swal2-styled {
    background-color: #18BADD;
}

.swal2-popup.swal2-modal.swal2-show {
    background-color: #35343a;
}

h2#swal2-title {
    color: #fff;
}

input.swal2-input {
    color: #fff;
}

.swal2-radio {
    background: #35343a;
    color: #fff
}

div#swal2-validation-message {
    background: #83333a;
    color: #fff;
}
</style>
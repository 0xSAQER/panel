<?php
require_once "logout.php";
include "config.php";
require_once "Encrypt.php";
?>
<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<script src="Set.js"></script>

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Home</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

<!-- Plugins css -->
<link rel="stylesheet" href="assets/plugins/charts-c3/c3.min.css"/>

<!-- Core css -->
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/theme4.css"/>
</head>

<body class="theme-dark font-montserrat sidebar_dark offcanvas">
<!-- Page Loader -->
<div class="page-loader-wrapper">
<div class="loader">
</div>
</div>

<div id="main_content">

<div class="page">
<div id="page_top" class="section-body ">
<div class="container-fluid">
<div class="page-header">
<center>
<h1 class="page-title"><?php echo base64_decode(hexToStr (base64_decode(hexToStr (base64_decode($_SESSION["UserName"]))))) ." اهلا بك "; ?></h1>
</center>

<form method="post">
<button style="color: #18BADD;" type="submit" name="logout" class="btn btn-icon"><i class="fa fa-sign-out"></i></button>
</form>

</div>
</div>
</div>


<div class="section-body">
<div class="container-fluid">

<style>
.page {
    left: 5%;
    width: calc(100% - 10%);
}

body {
    background-color: #1e1d21;
}

.page .section-white, .page .section-body {
    background-color: #1e1d21;
    border-radius: 15px;
}

.page-header .right .nav-link {
    background: transparent;
    border: 0;
    color: white;
}

.page-header {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    align-items: center;
    border-bottom: 0px solid #E8E9E9;
}

.text-green, .text-info, .text-success, .text-danger, .text-primary, .text-warning, .mail-star.active, .page-title {
    color: #ffffff !important;
}

.page-loader-wrapper {
    text-align: center;
    z-index: 99999999;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    background: #000000;
    display: flex;
}

.card {
    background-color: #35343a;
    border-radius: 15px;
}

.text-muted {
    color: #ffffff!important;
}

.table th {
    color: #ffffff;
}

.table td, .table th {
    border-color: #E8E9E9;
    font-size: 14px;
}

.btn:hover {
    color: #ffffff;
    text-decoration: none;
}

td {
    color: white;
}

@media screen and (max-width: 767px)
.page {
    padding: 10px 0 0 0;
    width: 100%;
    left: 0;
}

.page {
    padding: 10px 0 0 0;
    width: 100%;
    left: 0;
}

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

input.swal2-input {
    color: #fff;
    width: 100%;
    height: 40px;
    margin: 0.3em 0em 0;
}

div#swal2-html-container {
    color: white;
}

.tag-danger {
    background: #db2828;
}

a.btn.btn-primary {
    margin-left: 3px;
    margin-right: 4px;
    margin-top: 4px;
}

::-webkit-scrollbar {
  width: 0px;
}

.table.table-striped tbody tr:nth-of-type(even) {
    background-color: rgba(0,0,0,0.0);
}

.topnav {
    position: sticky;
    top: 0;
    z-index: 100;
    overflow: hidden;
    background-color: #35343a;
    width: 100%;
    border-radius: 15px;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 3px;
  width: 10%;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #18BADD;
  color: white;
}
</style>
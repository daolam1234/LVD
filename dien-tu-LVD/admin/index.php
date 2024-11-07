<?php

// Require file Common
require_once './dien%20tu%20LVD'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';




// Route
$act = $_GET['act'] ?? '/';
// var_dump($_GET['act']);die();


match ($act) {
};

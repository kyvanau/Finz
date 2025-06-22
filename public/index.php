<?php
// Routing berdasarkan ?c=NamaController&m=namaMethod

$c = $_GET['c'] ?? 'Home';        // default controller
$m = $_GET['m'] ?? 'index';       // default method

$controllerFile = "../controllers/$c.class.php";

// Cek apakah file controller ada
if (!file_exists($controllerFile)) {
    die("404 - Controller file not found: $controllerFile");
}

require_once $controllerFile;

// Cek apakah class controller ada
if (!class_exists($c)) {
    die("404 - Class '$c' not found in file '$controllerFile'");
}

// Buat objek controller
$controller = new $c();

// Cek apakah method tersedia
if (!method_exists($controller, $m)) {
    die("404 - Method '$m' not found in controller '$c'");
}

// Jalankan method
$controller->$m();


<?php
session_start();

$userId = $_SESSION["user_id"];
$name = $_SESSION["name"];
$role = $_SESSION["role"];
//Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification){
    unset($_SESSION['notification']);
}
/*periksa apakah sesi username dan role sudah ada, jika tidak diarahkan ke halaman login */
if (empty($_SESSION["username"]) || empty($_SESSION["role"])){
    $_SESSION['notification']=[
        'type' => 'danger',
        'message' => 'Silahkan Login Terlebih Dahulu!'
    ];
    header('Location: ./auth/login.php');
    exit();
}
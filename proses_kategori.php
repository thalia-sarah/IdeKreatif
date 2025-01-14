<?php

//Menghubungkan ke file konfigurasi database
include("config.php");

//Memulai sesi untuk menyimpan notifikasi
session_start();

//Proses penambahan kategori baru
if(isset($_POST['simpan'])){
    //Mengambil data nama kategori dari form
    $category_name = $_POST['category_name'];

    //Query untuk menambahkan berhasil atau gagal ke dalam session
    $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    $exac = mysqli_query($conn, $query);

    //Menyimpan notifikasi berhasil atau gagal ke dalam session
    if($exac){
        $_SESSION['notification'] = [
            'type' => 'primary', //Jenis notifikasi(contoh primary untuk keberhasilan)
            'message' => 'Gagal menambahkan kategori: ' . mysqli_error($conn)
        ];
    }
    //Redirect kembali ke halaman kategori
    header('Location: kategori.php');
    exit();
}

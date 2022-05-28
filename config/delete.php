<?php
include 'config.php';

if(isset($_GET['idBarang'])){
    $id = $_GET['idBarang'];
    $query = mysqli_query($conn, "DELETE FROM barang WHERE kode_barang = '$id'");
    if ($query){
        header('location:index.php');
    }
    else{
        echo "Gagal Menghapus Data";
    }
}elseif(isset($_GET['idOrder'])){
    $id = $_GET['idOrder'];
    $query = mysqli_query($conn, "DELETE FROM orders WHERE id_order = '$id'");
    $queryDetail = mysqli_query($conn, "DELETE FROM detail_order WHERE id_order = '$id'");
    if ($query){
        header('location:../index.php');
    }
    else{
        echo "Gagal Menghapus Data";
    }
}


?>
<?php
include "config.php";

if($_POST['hid'] == 'barang'){
    $kdBarang = $_POST['kdBarang'];
    $namaBarang = $_POST['nama_barang'];
    $stok = $_POST['stock'];
    $harga = $_POST['harga'];
    $kategori = ($_POST['kategori']);

    $query = mysqli_query($conn,"INSERT INTO barang VALUES ('$kdBarang', '$namaBarang', '$stok', '$harga', '$kategori')");

    if ($query){
        header('location:../index.php');
    }
    else{
        echo 'Gagal menambah Data';
    }

} elseif($_POST['hid'] == 'kategori'){
    $kategori = $_POST['kategori'];
    $query = mysqli_query($conn, "INSERT INTO kategori (nama) VALUES ('$kategori')");

    if ($query){
        header('location:../index.php');
    }
    else{
        echo "Gagal menambah Kategori";
    }
}elseif($_POST['hid'] == 'order'){
    $id = $_POST['idOrder'];
    $total = $_POST['total'];
    $barang = $_POST['namaBarang'];
    $qty = $_POST['qtyBarang'];
    $kategori = $_POST['kategori'];
    // $totaQty = $_POST['totalBarang'];
    $tanggal =$_POST['tanggal'];

    for($i = 0; $i < count($barang); $i++){
        $idBarang = mysqli_query($conn, "SELECT kode_barang FROM barang WHERE nama = '$barang'");
    }

    $array = [];
    for($i = 0; $i < count($barang); $i++){
        $insertDetail = mysqli_query($conn, "INSERT INTO detail_order (quantity, id_order, id_barang) VALUES ('$qty[$i]', '$id', '$kategori[$i]')");
    }
    $insert = mysqli_query($conn, "INSERT INTO orders VALUES ('$id', NOW(), 'Lunas', '$total')");

    if ($insert && $insertDetail){
        header('location:../index.php');
    }
    else{
        echo "Gagal menambah Kategori";
    }
}elseif($_POST['hid'] == 'edit'){
    $kdBarang = $_POST['kdBarang'];
    $namaBarang = $_POST['nama_barang'];
    $stok = $_POST['stock'];
    $harga = $_POST['harga'];
    $kategori = ($_POST['kategori']);

    $query = mysqli_query($conn,"UPDATE barang SET nama = '$namaBarang', stok = '$stok', harga = '$harga', id_kategori = '$kategori'  WHERE kode_barang = '$kdBarang'");

    if ($query){
        header('location:../index.php');
    }
    else{
        echo 'Gagal menambah Data';
    }
}
?>
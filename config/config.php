<?php
$conn = mysqli_connect('host', 'user','password', 'database');

// fetch data
$getBarang = mysqli_query($conn, "SELECT * FROM barang");
$getCount = mysqli_query($conn, "SELECT COUNT(*) FROM barang");

if(mysqli_num_rows($getBarang) == 0){
    $id = 'B001';
} elseif (mysqli_num_rows($getBarang) > 0 && mysqli_num_rows($getBarang) < 9) {
    while($row = mysqli_fetch_assoc($getCount)){
        if ($row['COUNT(*)'] < 10){
            $id = 'B00'.$row['COUNT(*)']+1;
        }
    }
} elseif(mysqli_num_rows($getBarang) > 9  && mysqli_num_rows($getBarang) < 99 ){
    while($row = mysqli_fetch_assoc($getCount)){
        if ($row['COUNT(*)'] > 9){
            $id = 'B0'.$row['id_order']+1;
        }
    }
}else{
    $order = 'kosong';
    echo 'kosong';
}

// fetch order
$getOrder = mysqli_query($conn, "SELECT * FROM orders");


// fetch kategori
$getKategori = mysqli_query($conn, "SELECT * FROM kategori");



if(mysqli_num_rows($getOrder) == 0){
    $order = 'D001';
} elseif (mysqli_num_rows($getOrder) > 0 && mysqli_num_rows($getOrder) < 9) {
    while($row = mysqli_fetch_assoc($getOrder)){
        if ($row['id_order'] < 10){
            $order =$row['id_order']+1;
        }
    }
} elseif(mysqli_num_rows($getOrder) > 9  && mysqli_num_rows($getOrder) < 99 ){
    while($row = mysqli_fetch_assoc($getOrder)){
        if ($row['id_order'] > 9){
            $order = $row['id_order']+1;
        }
    }
}else{
    $order = 'kosong';
    echo 'kosong';
}


?>


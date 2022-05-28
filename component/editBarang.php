<?php
include "../config/config.php";

$idEdit = $_GET['idBarang'];
$getBarang = mysqli_query($conn, "SELECT * FROM barang WHERE kode_barang = '$idEdit'");


while($row = mysqli_fetch_assoc($getBarang)){;?>
<head>
<link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
        />
        <style>
            a {
    text-decoration: none;
    color: black;
}

a:hover {
    text-decoration: none;
    color: black;
}
        </style>
</head>
<div class="container">
    <h3 class="text-center mt-3 fw-light">Edit Barang</h3>
    <form class="mt-5" action="../config/savedata.php" method="POST">
        <input type="hidden" name="hid" value="edit" />
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input
            type="text"
            class="form-control"
                id="kode_barang"
                name="kdBarang"
                readonly
                value=<?=$row['kode_barang']?>
                />
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input
                type="text"
                class="form-control"
                id="nama_barang"
                name="nama_barang"
                placeholder=<?=$row['nama']?>
                value=<?=$row['nama']?>
                />
            </div>
            <div class="form-group">
                <label for="kode_barang">Stock</label>
                <input
                type="text"
                class="form-control"
                id="stock"
                name="stock"
                value=<?=$row['stok']?>
                />
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input
            type="text"
            class="form-control"
                id="harga"
                name="harga"
                value=<?=$row['harga']?>
            />
        </div>
        <div class="form-group">
            <label for="kategori">Kategori</label>
            <br />
            <select
                name="kategori"
                id=""
                class="form-select form-control w-100"
            >
            <?php
                    if(mysqli_num_rows($getKategori)>0){
                        echo "<option selected>Buka Untuk Memilih Kategori</option>";
                        while($row = mysqli_fetch_assoc($getKategori)){ ?>
                        <option value=<?=$row['id_kategori']?>><?=$row['nama'] ?></option>
                        <?php }
                }else { ?>
                    <option">Belum Ada Kategori</option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        <?php }
?>


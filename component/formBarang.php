<?php 
include '../config/config.php';
?>

<div class="w-100 pb-3">
    <h3 class="text-center fw-light mt-3">Input Barang</h3>
    <form class="mt-5" action="../config/savedata.php" method="POST">
        <input type="hidden" name="hid" value="barang" />
        <div class="form-group">
            <label for="kode_barang">Kode Barang</label>
            <input
                type="text"
                class="form-control"
                id="kode_barang"
                name="kdBarang"
                readonly
                value=<?=$id?>
            />
        </div>
        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input
                type="text"
                class="form-control"
                id="nama_barang"
                name="nama_barang"
                placeholder="Nama Barang"
            />
        </div>
        <div class="form-group">
            <label for="kode_barang">Stock</label>
            <input
                type="text"
                class="form-control"
                id="stock"
                name="stock"
                placeholder="Stok"
            />
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input
                type="text"
                class="form-control"
                id="harga"
                name="harga"
                placeholder="Harga"
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

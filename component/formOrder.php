<?php
include '../config/config.php';

?>

<div id="formAdd">
    <div class="row">
        <div class="col">
            <label for="namaBarang" class="form-label">Nama Barang</label> <br>
            <select name="namaBarang[]" id="namaBarang" class="form-control">
                <?php
                if(mysqli_num_rows($getBarang) > 0){
                    echo "<option selected>Buka Untuk Melihat Barang Yang Tersedia</option>";
                    while($row = mysqli_fetch_assoc($getBarang)){ ?>
                    <option value=<?=$row['kode_barang']?>><?=$row['kode_barang']?></option>
                <?php
                    }
                }
                 ?>
            </select>
        </div>
        <div class="col">
            <label for="qtyBarang" class="form-label">Qty</label>
            <input
                type="text"
                id="qtyBarang"
                class="form-control"
                name="qtyBarang[]"
                onchange="checkQty()"
            />
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="" class="form-label">Harga</label>
            <input
            type="text"
            class="form-control"
            name="hargaBarang[]"
            onchange="check()"
            />
        </div>
        <div class="col">
            <label for="kategori">Kategori</label>
            <br />
            <select
                name="kategori[]"
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
    </div>
</div>

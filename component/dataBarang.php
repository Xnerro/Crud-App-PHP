<?php
include '../config/config.php';
$i = 1; ?>
<div class='w-100'>
<?php if(mysqli_num_rows($getBarang)>0){ ?>
    <h3 class="text-center fw-light mt-3">Data Barang</h3>
    <table class="table table-light table-hover table-striped mt-5">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>stok</th>
                <th>Kategori</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table table-borderless">
        <?php while($row = mysqli_fetch_assoc($getBarang)){ ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row['kode_barang'] ?></td>
                <td><?=$row['nama'] ?></td>
                <td><?=$row['harga'] ?></td>
                <td><?=$row['stok'] ?></td>
                <td><?=$row['id_kategori'] ?></td>
                <td>
                    <span class="d-flex justify-content-around">
                        <a href=<?='../config/delete.php?idBarang='.$row['kode_barang']?> class="bi bi-trash3"></a>
                        <a href=<?='component/editBarang.php?idBarang='.$row['kode_barang']?> class="bi bi-pencil-fill"></a>
                    </span>
                </td>
            </tr>
            <?php $i++; } ?>
        </tbody>
        
    </table>
    <?php } else{ ?>
        <center>

            <h3 class="text-center fw-ligth mt-3">Data Barang Kosong</h3>
        </center>
</div>
<?php } ?>

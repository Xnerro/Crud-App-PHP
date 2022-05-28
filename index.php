<?php 
include 'config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css"
        />
        <script
            src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"
        ></script>
        <link rel="stylesheet" href="/style/style.css" />
        <title>Document</title>

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
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Side Bar  -->
                <div class="col-sm-2 side">
                    <div
                        class="row rounded mt-3 list barang ms-2 me-2 fw-light"
                    >
                        Data Barang
                    </div>
                    <div class="row rounded mt-2 list input ms-2 me-2 fw-light">
                        Input Barang
                    </div>
                    <div class="row rounded mt-2 list order ms-2 me-2 fw-light">
                        Data Order
                    </div>
                    <div
                        class="row rounded mt-2 list inputOrder ms-2 me-2 fw-light"
                    >
                        Input Order
                    </div>
                    <div
                        class="row rounded mt-2 list kategori ms-2 me-2 fw-light"
                    >
                        Tambah Kategori
                    </div>
                </div>
                <div
                    class="col d-flex align-items-center justify-content-center flex-column"
                >
                <div class="row w-100">

                    <!-- Data Barang Yang Sudah di Input -->
                    <div class="container hide show" id="barang"></div>
                    
                    <div class="container hide" id="inputForm" style='height: 75vh;'>
                        <!-- Form Input Barang -->
                        
                    </div>
                </div>

                    <!-- Data Order Yang Sudah di Input -->
                    <div class="container hide" id="order"></div>
                    
                    <!-- Form Input Order Baru -->
                    <div class="container hide" id="inputOrder" style="height: 75vh">
                        <div class="w-100 d-flex justify-content-between flex-column" style="height: 100%">
                        <div>
                            <h3 class="text-center mt-3">Input Order</h3>
                            <form action="config/saveData.php" method="post">
                                <input
                                    type="hidden"
                                    name="hid"
                                    value="order"
                                />
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label
                                                for="idOrder"
                                                class="form-label"
                                                >Order Id</label
                                            >
                                            <input
                                                readonly
                                                name="idOrder"
                                                type="text"
                                                id="idOrder"
                                                class="form-control"
                                                value=<?=$order?>
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label
                                                for="namaBarang"
                                                class="form-label"
                                                >Nama Barang</label
                                            >
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
                                            <label
                                                for="qtyBarang"
                                                class="form-label"
                                                >Qty</label
                                            >
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
                                            <label for="" class="form-label"
                                            >Harga</label
                                            >
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
                                    <div id="multiForm"></div>
                                    <div class="row">
                                        <div class="col">
                                            <label
                                            for="total"
                                                class="form-label"
                                                >Total</label
                                            >
                                            <input
                                                type="text"
                                                id="total"
                                                class="form-control"
                                                name='total'
                                                readonly
                                            />
                                        </div>
                                        <div class="col">
                                            <label
                                            for="totalBarang"
                                            class="form-label"
                                            >Total Barang</label
                                            >
                                            <input
                                                type="text"
                                                id="totalBarang"
                                                class="form-control"
                                                name='totalbarang'
                                                readonly
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label
                                                for="tanggal"
                                                class="form-label"
                                                >Tanggal</label
                                            >
                                            <input
                                            type="text"
                                                id="tanggal"
                                                class="form-control"
                                                name='tanggal'
                                                readonly
                                            />
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col">
                                            <button
                                            id="submitOrder"
                                            class="btn btn-primary ms-4"
                                            id="addForm"
                                            >
                                            Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div
                            class="container d-flex justify-content-end pb-2"
                        >
                            <div>
                                <button
                                    class="btn btn-primary"
                                    id="addForm"
                                    onclick="loadForm()"
                                >
                                    Tambah
                                </button>
                                <button
                                    class="btn btn-danger"
                                    id="delete"
                                    onclick="removeForm()"
                                    >
                                    Delete
                                </button>
                            </div>
                        </div>
                        </div>
                    </div>
<!-- Form Input For Kategori -->
                    <div class="container hide" id="kategori" style="height: 30vh">
                </div>
                </div>
            </div>
        </div>

        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"
            ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"
        ></script>
        <script src="/js/index.js"></script>
    </body>
</html>
<?php
mysqli_close($conn);
?>

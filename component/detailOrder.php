<?php
include "../config/config.php";

$id = $_GET['idOrder'];

$query = mysqli_query($conn, "SELECT * FROM detail_order WHERE id_order = '$id'");

if($query){ ?>
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
    <div>
        <h3 class="text-center fw-light mt-3">Detail Order</h3>
        <?php while($row = mysqli_fetch_assoc($query)){ ?>
            <div class="container">

                <div class="row">
                    <div class="col">
                <label for="" class="form-label">id Detail Order</label>
                <input type="text" class="form-control" readonly value=<?=$row['id_detailorder']?>>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="" class="form-label">Quantity</label>
                <input type="text" class="form-control" readonly value=<?=$row['quantity']?>>
            </div>
            <div class="col">
                <label for="" class="form-label">Id Order</label>
                <input type="text" class="form-control" readonly value=<?=$row['id_order']?>>
            </div>
            <div class="col">
                <label for="" class="form-label">Id Barang</label>
                <input type="text" class="form-control" readonly value=<?=$row['id_barang']?>>
            </div>
        </div>
    </div>
    <?php }
    echo '<div class="container">';
    echo '<a href="../" class="btn btn-primary mt-4 ms-5">Back</a>';
    echo "</div>";
    echo "</div>";
}
else{
    echo 'detail tidak ada';
}
?>
<?php
include '../config/config.php';
$x = mysqli_query($conn, "SELECT * FROM orders");
$i = 0;
?>



<div class="container-fluid w-100">
    <div id="detailOrder">

    </div>
    <?php if(mysqli_num_rows($getOrder) > 0){ ?>
        <h3 class="text-center fw-light mt-3">Data Order</h3>
        <table class="table table-light table-hover table-striped mt-5">
        <thead>
            <tr>
                <th>Id_Order</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
            <?php while($row = mysqli_fetch_assoc($x)){ ?>
                <tr>
                    <td><?=$row['id_order']?></td>
                    <td><?=$row['tanggal']?></td>
                    <td><?=$row['status']?></td>
                    <td><?=$row['total']?></td>
                    <td>
                    <span class="d-flex justify-content-around">
                        <a href=<?="../component/detailOrder.php?idOrder=".$row['id_order']?> class="bi bi-eye"></a>
                        <a href=<?='../config/delete.php?idOrder='.$row['id_order']?> class="bi bi-trash3"></a>
                    </span>
                </td>
                </tr>
                <?php } ?>
            </table>
        <?php } 
        else{ ?>
            <h3 class="text-center fw-light mt-3">Belum Ada Order</h3>
        <?php } ?>
</div>


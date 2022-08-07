<?php


$query = "SELECT * FROM `tb_transaksi` join tb_barang on tb_transaksi.id_barang = tb_barang.id_barang";
$ex = mysqli_query($conn, $query);
$fetch = mysqli_fetch_all($ex, MYSQLI_ASSOC);

?>
<div class="col-lg-12">
    <div class="card shadow-sm mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="data-table table table-bordered table-md">
                    <thead>
                        <th>#</th>
                        <th>ID Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Transaksi</th>
                        <th>Pembelian/Pemakaian</th>
                        <th>Tipe Transaksi</th>
                        <th>Stok Akhir</th>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($fetch as $row) { ?>
                            <tr>
                                <td><?= $i ?>.</td>
                                <td><?= $row['id_transaksi'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['tipe_transaksi'] == 0 ? $row['pembelian'] : $row['pemakaian']  ?></td>

                                <td><?= $row['tipe_transaksi'] == 0 ? "Barang Masuk" : "Barang Keluar" ?></td>
                                <td><?= $row['sisa'] ?></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php



$query = "SELECT * FROM `tb_barang`";

$ex = mysqli_query($conn, $query);

$fetch = mysqli_fetch_all($ex, MYSQLI_ASSOC);


?>

<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <button id="btn-barang-add" class="btn btn-primary">Tambah Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="data-table table table-bordered table-md">
                    <thead>
                        <th>#</th>
                        <th>ID Barang</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Stok Barang</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($fetch as $row) { ?>
                            <tr>
                                <td><?= $i ?>.</td>
                                <td><?= $row['id_barang'] ?></td>
                                <td><img src="" alt="<?= $row['gambar'] ?>"></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['stok'] ?></td>
                                <td>
                                    <?= $row['deskripsi'] ?>
                                </td>
                                <td>
                                    <button href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="process/delete-barang.php?id=<?= $row['id_barang'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
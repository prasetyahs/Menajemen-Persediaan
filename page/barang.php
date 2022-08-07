<?php


include "config/excel_reader.php";

$query = "SELECT * FROM `tb_barang`";

$ex = mysqli_query($conn, $query);

$fetch = mysqli_fetch_all($ex, MYSQLI_ASSOC);

$countBarang = mysqli_num_rows($ex);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = new Spreadsheet_Excel_Reader($_FILES['excel']['name'], false);
    $jumlah_baris = $data->rowcount($sheet_index = 0);
    $berhasil = 0;
    var_dump($jumlah_baris);
    // for ($i = 2; $i <= $jumlah_baris; $i++) {
    //     $id_barang     = $data->val($i, 1);
    //     $nama_barang   = $data->val($i, 2);
    //     $deskripsi  = $data->val($i, 3);
    //     $gambar  = $data->val($i, 4);
    //     $status  = $data->val($i, 5);
    //     $keterangan  = $data->val($i, 6);
    //     $stok  = $data->val($i, 7);
    //     $data = [
    //         "id_barang" => $id_barang,
    //         "nama_barang" => $nama_barang,
    //         "deskripsi" => $deskripsi,
    //         "gambar" => $gambar,
    //         "keterangan" => $keterangan,
    //         "stok" => $stok
    //     ];
    //     create($data, $conn, "tb_barang");
    // }
}
?>

<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <button id="btn-barang-add" class="btn btn-primary">Tambah Data</button>
                </div>
                <div class="col-6">
                    <button id="btn-import" class="btn btn-primary">Import Data</button>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type='file' name="excel" id="getFile" style="display:none">
                        <button type="submit" style="display: none;" id="import" class="btn btn-primary">Import Data</button>
                    </form>
                </div>
            </div>
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
                        <th>Deskripsi</th>
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
                                <td><?= $row['deskripsi'] ?></td>
                                <td>
                                    <?= $row['keterangan'] ?>
                                </td>
                                <td>
                                    <button onclick="editBarang(this)"  data-id="<?= $row['id_barang'] ?>" data-keterangan="<?= $row['keterangan'] ?>"  data-nama="<?= $row['nama_barang'] ?>"  data-stok="<?= $row['stok'] ?>"  data-deskripsi="<?= $row['deskripsi'] ?>" class="btn btn-warning"><i class="fas fa-pencil-alt btn-edit-barang"></i></button>
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
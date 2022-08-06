<?php

$query = "SELECT * FROM `tb_user`";

$ex = mysqli_query($conn, $query);

$fetch = mysqli_fetch_all($ex, MYSQLI_ASSOC);


?>

<div class="col-lg-12">
    <div class="card shadow-sm mb-4">
        <div class="card-header">
            <button id="btn-pengguna-add" class="btn btn-primary">Tambah Data</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="data-table table table-bordered table-md">
                    <thead>
                        <th>#</th>
                        <th>ID Pengguna</th>
                        <th>Nama Pengguna</th>
                        <th>Level</th>
                        <th>Username</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($fetch as $row) { ?>
                            <tr>
                                <td><?= $i ?>.</td>
                                <td><?= $row['id_user'] ?></td>
                                <td><?= $row['nama_user'] ?></td>
                                <td><?= $row['level'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['telepon']?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['status'] ?></td>

                                <td><?= $row['keterangan'] ?></td>
                                <td>
                                    <button href="#" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                                    <a href="process/delete-pengguna.php?id=<?= $row['id_user'] ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
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
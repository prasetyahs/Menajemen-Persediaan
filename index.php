<!DOCTYPE html>
<html lang="en">
<?php

include "config/connect.php";
?>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">CV Telaga Berkat</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <!-- <i class="fa-duotone fa-arrow-trend-up"></i> -->

                    <ul class="sidebar-menu">
                        <li><a href="index.php?page=dashboard" class="nav-link active"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
                        <li><a href="index.php?page=barang" class="nav-link"><i class="fas fa-boxes"></i> <span>Barang</span></a></li>
                        <li><a href="index.php?page=rekap" class="nav-link"><i class="fas fa-server"></i> <span>Rekapitulasi</span></a></li>
                        <li><a href="index.php?page=prediksi" class="nav-link"><i class="fas fa-diagnoses"></i> <span>Prediksi</span></a></li>
                        <li class="menu-header">Transaksi</li>
                        <li><a class="nav-link" href="index.php?page=barang-masuk&tipe_transaksi=0"><i class="fas fa-inbox"></i><span>Barang Masuk</span></a></li>
                        <li><a class="nav-link" href="index.php?page=barang-keluar&tipe_transaksi=1"> <i class="fas fa-boxes"></i> Barang Keluar</a></li>
                        <li class="menu-header">Analisa</li>
                        <li id="dma"><a class="nav-link" href="#"><i class="fas fa-chart-area"></i> <span>DMA</span></a></li>
                        <li id="poqModal"><a class="nav-link" href="#" onclick="showModalPOQ()"><i class="fas fa-chart-line"></i> <span>POQ</span> </a></li>

                        <li class="menu-header">User</li>
                        <li><a href="index.php?page=pengguna" class="nav-link"><i class="fas fa-user-friends"></i> <span>Pengguna</span></a></li>
                    </ul>

                    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                        <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <i class="fas fa-rocket"></i> Documentation
                        </a>
                    </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1><?= strtoupper($_GET['page']) ?></h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><?= $_GET['page'] ?></div>
                        </div>
                    </div>

                    <div class="section-body">
                        <?php if ($_GET['page'] === "barang") { ?>
                            <?php include "page/barang.php" ?>
                        <?php } else if ($_GET['page'] == "barang-masuk" || $_GET['page'] == "barang-keluar") { ?>
                            <?php include "page/transaksi.php" ?>
                        <?php } else if ($_GET['page'] === "pengguna") { ?>
                            <?php include "page/pengguna.php" ?>
                        <?php } else if ($_GET['page'] == "dma") { ?>
                            <?php include "page/analisa-dma.php" ?>
                        <?php } else if ($_GET['page'] == "dashboard") { ?>
                            <?php include "page/dashboard.php" ?>
                        <?php } else if ($_GET['page'] == 'rekap') { ?>
                            <?php include "page/rekap.php" ?>
                        <?php } else if ($_GET['page'] == 'poq') { ?>
                            <?php include "page/analisa-poq.php" ?>
                        <?php } ?>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="google.com"></a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function printData() {
            var divToPrint = document.getElementById("printTable");
            newWin = window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        $('button').on('click', function() {
            printData();
        })

        function showModalPOQ() {
            $("#analisaPOQ").modal()

        }

        function editPengguna(d) {
            $("#editPengguna").modal()
            $('#editPengguna input[name="id_user"]').val($(d).data("id"))
            $('#editPengguna input[name="nama_user"]').val($(d).data("nama"))
            $('#editPengguna input[name="level"]').val($(d).data("level"))
            $('#editPengguna input[name="email"]').val($(d).data("email"))
            $('#editPengguna input[name="telepon"]').val($(d).data("telepon"))
            $('#editPengguna input[name="username"]').val($(d).data("username"))
            $('#editPengguna input[name="password"]').val($(d).data("password"))
            $('#editPengguna textarea[name="keterangan"]').val($(d).data("keterangan"))

        }

        function editBarang(d) {
            $("#editbarang").modal()
            $('#editbarang input[name="id_barang"]').val($(d).data("id"))
            $('#editbarang input[name="nama_barang"]').val($(d).data("nama"))
            $('#editbarang input[name="stok"]').val($(d).data("stok"))
            $('#editbarang textarea[name="deskripsi"]').val($(d).data("deskripsi"))
            $('#editbarang textarea[name="keterangan"]').val($(d).data("keterangan"))
        }
        $('.data-table').dataTable({
            responsive: true,
            dom: 'Bfrtip',
            search: true,
            "ordering": false,
            buttons: [{
                extend: 'copy',
                attr: {
                    id: 'allan'
                }
            }, 'csv', 'excel', 'pdf']

        });
        $('#btn-barang-add').click(function() {
            $("#exampleModal").modal()
        })

        $('#btn-pengguna-add').click(function() {
            $("#addPengguna").modal()
        })
        $('#btn-barang-masuk').click(function() {
            $("#barang-masuk-modal").modal()
        })

        $("#btn-import").click(function() {
            $('#getFile').trigger('click');
            $('#getFile').change(function() {
                $("#import").click();
            });

        })
    </script>
</body>


<?php

$query = "SELECT id_user  FROM tb_user";
$ex = mysqli_query($conn, $query);
$countBarang = mysqli_num_rows($ex);

?>


<div class="modal fade" id="analisaPOQ" tabindex="-1" aria-labelledby="addPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPenggunaLabel">Analisis POQ</h5>
                <button type="button" class="btn btn-transparent"><i class="fas fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <form action="index.php?page=poq" method="get">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Analisis Berapa Bulan Kedepan?</label>
                        <input type="number" name="bulan" class="form-control" required required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="page" class="form-control" value="poq" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Pemesanan</label>
                        <input type="number" name="pemesanan" class="form-control" required required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Penyimpanan</label>
                        <input type="number" name="penyimpanan" class="form-control" required required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addPengguna" tabindex="-1" aria-labelledby="addPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPenggunaLabel">Tambah Data</h5>
                <button type="button" class="btn btn-transparent"><i class="fas fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <form action="process/store-pengguna.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Pengguna</label>
                        <input type="text" name="id_user" class="form-control" value="USR0<?= $countBarang + 1 ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Pengguna</label>
                        <input type="text" name="nama_user" class="form-control" required required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Level</label>
                        <select class="form-control" required name="level">
                            <option>--Pilih--</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Staff Gudang">Staff Gudang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telepon</label>
                        <input type="tel" name="telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea name="keterangan" type="text" class="form-control" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editPengguna" tabindex="-1" aria-labelledby="editPenggunaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPenggunaLabel">Tambah Data</h5>
                <button type="button" class="btn btn-transparent"><i class="fas fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <form action="process/update-pengguna.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Pengguna</label>
                        <input required type="text" name="id_user" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Pengguna</label>
                        <input required type="text" name="nama_user" class="form-control" required required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Level</label>
                        <select class="form-control" required name="level">
                            <option>--Pilih--</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Staff Gudang">Staff Gudang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input required type="text" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Telepon</label>
                        <input required type="tel" name="telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Username</label>
                        <input required type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea name="keterangan" type="text" class="form-control" required></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php

$query = "SELECT id_barang  FROM tb_barang";
$ex = mysqli_query($conn, $query);
$countBarang = mysqli_num_rows($ex);

?>

<div class="modal fade" id="editbarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn btn-transparent"><i class="fas fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <form action="process/update-barang.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Barang</label>
                        <input required type="text" name="id_barang" class="form-control" value="BRG0<?= $countBarang + 1 ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Barang</label>
                        <input required type="text" name="nama_barang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stok</label>
                        <input required type="number" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Deskripsi</label>
                        <textarea required type="text" name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <div class="custom-file">
                            <input required name="gambar" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea required name="keterangan" type="text" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn btn-transparent"><i class="fas fa-times-circle"></i></button>
            </div>
            <div class="modal-body">
                <form action="process/store-barang.php" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">ID Barang</label>
                        <input type="text" name="id_barang" class="form-control" value="BRG0<?= $countBarang + 1 ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Stok</label>
                        <input type="number" name="stok" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Deskripsi</label>
                        <textarea type="text" name="deskripsi" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Gambar</label>
                        <div class="custom-file">
                            <input name="gambar" type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <textarea name="keterangan" type="text" class="form-control"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php

$query = "SELECT * FROM `tb_barang`";

$ex = mysqli_query($conn, $query);

$barang = mysqli_fetch_all($ex, MYSQLI_ASSOC);

?>
<div class="modal fade" id="barang-masuk-modal" tabindex="-1" aria-labelledby="barang-masukLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="barang-masukLabel"><?= $_GET['page'] === "barang-masuk" ? "Pemasukkan"  : "Pengeluaran" ?></h5>
                <button type="button" class="btn btn-transparent"><i class="fas fa-times-circle"></i></button>
            </div>
            <form action="process/store-transaction.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Pilih Barang</label>
                        <select name="id_barang" class="form-control" id="exampleFormControlSelect1">
                            <option value="">---Pilih Barang---</option>
                            <?php foreach ($barang as $b) { ?>
                                <option value="<?= $b['id_barang'] ?>"><?= $b['nama_barang'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Jumlah <?= $_GET['page'] === "barang-masuk" ? "Pemasukkan"  : "Pengeluaran" ?></label>
                        <input name="pembelian" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Keterangan</label>
                        <textarea type="text" name="keterangan" class="form-control"></textarea>
                    </div>
                    <input type="hidden" name="tipe_transaksi" value="<?= $_GET['tipe_transaksi'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
</div>

</html>
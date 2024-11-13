<!-- header -->
<?php include './views/layout/header.php' ?>

<!-- Navbar -->
<?php include './views/layout/navbar.php' ?>


<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php' ?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quan ly tai khoan khach hang </h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ho Ten</th>
                                        <th>Anh dai dien</th>
                                        <th>Email</th>
                                        <th>So dien thoai</th>
                                        <th>Trang thai</th>
                                        <th>Thao tac</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listKhachHang as $key => $khachHang): ?>
                                        <tr>
                                            <th><?= $key + 1 ?></th>
                                            <th>
                                                <img src="<?= BASE_URL_ADMIN . $khachHang['anh_dai_dien'] ?> " style="width: 100px;"
                                                    onerror="this.onerror=null; this.src='https://th.bing.com/th/id/OIP.YRKgxCqyL9gs6rG9wZ_42AHaHa?rs=1&pid=ImgDetMain'">
                                            </th>
                                            <th><?= $khachHang['ho_ten'] ?></th>
                                            <th><?= $khachHang['email'] ?></th>
                                            <th><?= $khachHang['so_dien_thoai'] ?></th>
                                            <th><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></th>
                                            <th>
                                                <div class="btn-group">
                                                    <a href=" <?= BASE_URL_ADMIN . '?act=chi_tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                        <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                    </a>
                                                    <a href=" <?= BASE_URL_ADMIN . '?act=form-sua-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                        <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                    </a>
                                                    <a href=" <?= BASE_URL_ADMIN . '?act=chi_tiet-khach-hang&id_khach_hang=' . $khachHang['id'] ?>">
                                                        <button class="btn btn-danger"><i class="fas fa-circle-notch"></i></button>
                                                    </a>

                                                </div>

                                            </th>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ho Ten</th>
                                        <th>Email</th>
                                        <th>So dien thoai</th>
                                        <th>Trang thai</th>
                                        <th>Thao tac</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- footer -->
<?php include './views/layout/footer.php' ?>

<!-- end footer -->
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->

</body>

</html>
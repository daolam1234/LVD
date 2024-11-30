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
                    <h1>Quan ly san pham</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-san-pham' ?>">
                                <button class="btn btn-success">Them san pham</button>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ten san pham</th>
                                        <th>Anh san pham</th>
                                        <th>Gia san pham</th>
                                        <th>So luong</th>
                                        <th>Danh muc</th>
                                        <th>Trang thai</th>
                                        <th>Thao tac</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listSanPham as $key => $sanPham): ?>
                                        <tr>

                                            <th><?= $key + 1 ?></th>
                                            <th><?= $sanPham['ten_san_pham'] ?></th>
                                            <th>
                                                <img src="<?= BASE_URL . $sanPham['hinh_anh'] ?> " style="width: 100px;"
                                                    onerror="this.onerror=null; this.src='https://th.bing.com/th/id/OIP.YRKgxCqyL9gs6rG9wZ_42AHaHa?rs=1&pid=ImgDetMain'">
                                            </th>
                                            <th><?= $sanPham['gia_san_pham'] ?></th>
                                            <th><?= $sanPham['so_luong'] ?></th>
                                            <th><?= $sanPham['ten_danh_muc'] ?></th>
                                            <th><?= $sanPham['trang_thai'] == 1 ? 'Còn hàng' : '<s>Hết hàng</s>'; ?></th>
                                            <th>
                                                <div class="btn-group">
                                                    <a href="<?= BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                        <button class="btn btn-primary"><i class="far fa-eye"></i></button>
                                                        <a href="<?= BASE_URL_ADMIN . '?act=form-sua-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                            <button class="btn btn-warning"><i class="fas fa-cogs"></i></button>
                                                        </a><a href="<?= BASE_URL_ADMIN . '?act=xoa-san-pham&id_san_pham=' . $sanPham['id'] ?>"
                                                            onclick="return confirm('Bạn có chắc muốn xóa không?')">
                                                            <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                        </a>
                                                </div>


                                            </th>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>STT</th>
                                        <th>Ten san pham</th>
                                        <th>Anh san pham</th>
                                        <th>Gia san pham</th>
                                        <th>So luong</th>
                                        <th>Danh muc</th>
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
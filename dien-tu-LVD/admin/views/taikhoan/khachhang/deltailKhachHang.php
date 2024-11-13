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
                    <h1>Quan ly tai khoan khach hang</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="<?= BASE_URL_ADMIN . $khachHang['anh_dai_dien'] ?> " style="width: 70%;"
                        onerror="this.onerror=null; this.src='https://th.bing.com/th/id/OIP.YRKgxCqyL9gs6rG9wZ_42AHaHa?rs=1&pid=ImgDetMain'">

                </div>
                <div class="col-8">
                    <table class="table table-borderless">
                        <div class="container">
                            <tbody style="font-size: x-large;">
                                <tr>
                                    <th>Ho ten</th>
                                    <td><?= $khachHang['ho_ten'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Ngay sinh</th>
                                    <td><?= $khachHang['ngay_sinh'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $khachHang['email'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>So dien thoai</th>
                                    <td><?= $khachHang['do_dien_thoai'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Gioi tinh</th>
                                    <td><?= $khachHang['gioi_tinh'] == 1 ? 'Nam' : 'Nữ' ?></td>
                                </tr>
                                <tr>
                                    <th>Dia chi</th>
                                    <td><?= $khachHang['dai_chi'] ?? '' ?></td>
                                </tr>
                                <tr>
                                    <th>Trang thai </th>
                                    <td><?= $khachHang['trang_thai'] == 1 ? 'Active' : 'Inactive' ?></td>
                                </tr>
                            </tbody>
                        </div>
                    </table>
                </div>
                <div class="col-12">
                    <h2>Thong tin mua hang</h2>
                    <table></table>
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


</body>

</html>

</html>
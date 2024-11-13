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
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">sua thong tin tai khoan khach hang: <?= $khachHang['ho_ten']; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '/?act=sua-quan-tri' ?>" method="POST">
                            <input type="hidden" name="quan_tri_id" value="<?= $khachHang['id'] ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ten tai khoan</label>
                                    <input type="text" class="form-control" name="ho_ten" value="<?= $khachHang['ho_ten'] ?>" placeholder="Nhap ho ten">
                                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="<?= $khachHang['email'] ?>" placeholder="Nhap Email">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>So dien thoai</label>
                                    <input type="text" class="form-control" name="so_dien_thoai" value="<?= $khachHang['so_dien_thoai'] ?>" placeholder="Nhap Email">
                                    <?php if (isset($_SESSION['error']['so_dien_thoai'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['so_dien_thoai'] ?></p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Ngay sinh</label>
                                    <input type="date" class="form-control" name="ngay_sinh" value="<?= $khachHang['ngay_sinh'] ?>" placeholder="Nhap ngay sinh">
                                    <?php if (isset($_SESSION['error']['ngay_sinh'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ngay_sinh'] ?></p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Gioi tinh</label>
                                    <select name="gioi_tinh" id="inputStatus" class="form-control custom-select">
                                        <option <?= $khachHang['gioi_tinh'] == 1 ? 'selected' : '' ?> value="1">Nam</option>
                                        <option <?= $khachHang['gioi_tinh'] !== 2 ? 'selected' : '' ?> value="2">Nu</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label>Dia chi</label>
                                    <input type="text" class="form-control" name="dia_chi" value="<?= $khachHang['dia_chi'] ?>" placeholder="Nhap dia chi">
                                    <?php if (isset($_SESSION['error']['dia_chi'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['dia_chi'] ?></p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Trang thai</label>
                                    <select name="trang_thai" id="inputStatus" class="form-control custom-select">
                                        <option <?= $khachHang['trang_thai'] == 1 ? 'selected' : '' ?> value="1">Active</option>
                                        <option <?= $khachHang['trang_thai'] !== 2 ? 'selected' : '' ?> value="2">Inactive</option>
                                    </select>

                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </form>
                    </div>
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
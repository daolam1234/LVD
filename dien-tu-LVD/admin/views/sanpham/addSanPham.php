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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">them san pham</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '/?act=them-san-pham' ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Ten san pham</label>
                                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Ten san pham">
                                    <?php if (isset($errors['ten_san_pham'])) { ?>
                                        <p class="text-danger"><?= $errors['ten_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Gia san pham</label>
                                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Gia san pham">
                                    <?php if (isset($errors['gia_san_pham'])) { ?>
                                        <p class="text-danger"><?= $errors['gia_san_pham'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Gia khuyen mai</label>
                                    <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Gia khuyen mai">
                                    <?php if (isset($errors['gia_khuyen_mai'])) { ?>
                                        <p class="text-danger"><?= $errors['gia_khuyen_mai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Hinh anh</label>
                                    <input type="file" class="form-control" name="hinh_anh">

                                </div>
                                <div class="form-group col-6">
                                    <label>Album ảnh</label>
                                    <input type="file" class="form-control" name="img_array" multiple>

                                </div>

                                <div class="form-group col-6">
                                    <label>Số luọng</label>
                                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                    <?php if (isset($errors['so_luong'])) { ?>
                                        <p class="text-danger"><?= $errors['so_luong'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" placeholder="Ngày nhập">
                                    <?php if (isset($errors['ngay_nhap'])) { ?>
                                        <p class="text-danger"><?= $errors['ngay_nhap'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Danh Mục</label>
                                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listDanhMuc as $danhMuc): ?>
                                            <option value="<?= $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($errors['danh_muc_id'])) { ?>
                                        <p class="text-danger"><?= $errors['danh_muc_id'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn trạng thái sản phẩm</option>
                                        <option value="1">Còn hàng</option>
                                        <option value="2">Hết hàng</option>
                                    </select>
                                    <?php if (isset($errors['trang_thai'])) { ?>
                                        <p class="text-danger"><?= $errors['trang_thai'] ?></p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>Mo ta</label>
                                    <textarea name="mo_ta" class="form-control" id="" placeholder="Nhap mo ta"></textarea>
                                </div>

                                <!-- /.card-body -->

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
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
                        <form action="<?= BASE_URL_ADMIN . '/?act=them-san-pham' ?>" method="post">
                            <div class="card-body row">
                                <div class="form-group col-12">
                                    <label>Ten san pham</label>
                                    <input type="text" class="form-control" name="ten_san_pham" placeholder="Ten san pham">
                                </div>
                                <div class="form-group col-6">
                                    <label>Gia san pham</label>
                                    <input type="number" class="form-control" name="gia_san_pham" placeholder="Gia san pham">
                                </div>
                                <div class="form-group col-6">
                                    <label>Ten khuyen mai</label>
                                    <input type="number" class="form-control" name="gia_khuyen_mai" placeholder="Gia khuyen mai">
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
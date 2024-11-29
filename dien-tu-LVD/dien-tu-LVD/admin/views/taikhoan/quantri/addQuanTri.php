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
                    <h1>Quan ly tai khoan quan tri vien</h1>
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
                            <h3 class="card-title">them tai khoan quan tri</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-quan-tri' ?>" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>ten tai khoan</label>
                                    <input type="text" class="form-control" name="ho_ten" placeholder="Nhap ho ten">
                                    <?php if (isset($_SESSION['error']['ho_ten'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['ho_ten'] ?></p>
                                    <?php }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="emaill" class="form-control" name="email" placeholder="Nhap Email">
                                    <?php if (isset($_SESSION['error']['email'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['email'] ?></p>
                                    <?php }
                                    ?>
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
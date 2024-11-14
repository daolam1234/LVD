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

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">

                        <div class="col-12">
                            <img style="width: 500px; height: 700px" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" class="product-image" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <?php foreach ($listAnhSanPham as $key => $anhSP): ?>
                                <div class="product-image-thumb <?= $anhSP[$key] = 0 ? 'active' : '' ?>"><img src="<?= BASE_URL . $anhSP['link_hinh_anh']; ?>" alt="Product Image"></div>
                            <?php endforeach ?>

                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3">Ten san pham <?= $sanPham['ten_san_pham']; ?></h3>
                        <hr>
                        <h4 class="my-3">Gia tien: <small><?= $sanPham['gia_san_pham'] ?></small></h4>
                        <h4 class="my-3">Gia khuyen mai: <small><?= $sanPham['gia_khuyen_mai'] ?></small></h4>
                        <h4 class="my-3">So luong: <small><?= $sanPham['so_luong'] ?></small></h4>
                        <h4 class="my-3">Luot xem: <small><?= $sanPham['luot_xem'] ?></small></h4>
                        <h4 class="my-3">Ngay nhap: <small><?= $sanPham['ngay_nhap'] ?></small></h4>
                        <h4 class="my-3">Danh muc: <small><?= $sanPham['ten_danh_muc'] ?></small></h4>
                        <h4 class="my-3">Trang thai: <small><?= $sanPham['trang_thai'] == 1 ? 'Con hang' : 'Het hang' ?></small></h4>
                        <h4 class="my-3">Mo ta: <small><?= $sanPham['mo_ta'] ?></small></h4>




                    </div>
                </div>

                <ul class="nav nav-tabs row mt-4" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Binh luan</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <table class="table table-striped table-hover ">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ten nguoi binh luan</th>
                                    <th>Noi dung</th>
                                    <th>Ngay dang</th>
                                    <th>Thao tac</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>dao lam</td>
                                    <td>san pham dep qua</td>
                                    <td>20/8/2020</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class="btn btn-warning">An</button></a>
                                            <a href="#"><button class="btn btn-danger">xoa</button></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>nguyen khang</td>
                                    <td>san pham dep qua</td>
                                    <td>20/5/2020</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"><button class="btn btn-warning">An</button></a>
                                            <a href="#"><button class="btn btn-danger">xoa</button></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.card -->

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
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

</body>

</html>
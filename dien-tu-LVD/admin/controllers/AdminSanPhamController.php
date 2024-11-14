<?php

class AdminSanPhamController
{

    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
        $this->modelDanhMuc = new AdminDanhMuc();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        //hiem thi san pham
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/sanpham/addSanPham.php';

        deleteSessionError();
    }
    public function postAddSanPham()
    {
        //xu ly them du lieu
        // var_dump($_POST);
        //kiem tra du lieu co phai duowc submit len ko
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
        ) {
            //lay du lieu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            //luu hinh anh
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            $img_array = $_FILES['img_array'];

            //tao 1 mang trong
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'không để trống trống ten dang nhap';
            }
            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'không để trống rống giá sản phẩm';
            }
            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'không để trống rống giá khuyến mãi';
            }
            if (empty($so_luong)) {
                $errors['so_luong'] = 'không để trống rống số lượng';
            }
            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'không để trống rống ngày nhập';
            }
            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'không để trống rống danh mục';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'không để trống rống trạng thái';
            }
            if ($hinh_anh['errors' !== 0]) {
                $errors['hinh_anh'] = 'không để trống rống trạng thái';
            }

            $_SESSION['error'] = $errors;

            //ko co loi
            if (empty($errors)) {
                //neu ko co loi
                $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);

                header("Location:" . BASE_URL_ADMIN . '/?act=san-pham');
            } else {
                //tra ve form
                //dat chi thi xoa session sau khi hirn thi form
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '/?act=form-them-san-pham');
            }
        }
    }
}

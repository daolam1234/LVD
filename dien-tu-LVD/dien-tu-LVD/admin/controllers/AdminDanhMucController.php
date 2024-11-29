<?php

class AdminDanhMucController
{

    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelDanhMuc = new AdminDanhmuc();
    }
    public function danhSachDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/danhmuc/listDanhmuc.php';
    }
    public function formAddDanhMuc()
    {
        //hàm dùng để hiển thị form nhập
        require_once './views/danhmuc/addDanhmuc.php';
    }
    public function postAddDanhMuc()
    {
        //hàm dùng để xử lý thêm dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được trống';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->insertDanhMuc($ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                require_once './views/danhmuc/addDanhmuc.php';
            }
        }
    }
    public function formEditDanhMuc()
    {
        //hàm dùng để hiển thị form nhập
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            require_once './views/danhmuc/editDanhmuc.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
            exit();
        }
    }
    public function postEditDanhMuc()
    {
        //hàm dùng để xử lý thêm dữ liệu
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            $errors = [];
            if (empty($ten_danh_muc)) {
                $errors['ten_danh_muc'] = 'Tên danh mục không được trống';
            }
            if (empty($errors)) {
                $this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta);
                header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
                exit();
            } else {
                $danhMuc = ['id' => $id, 'ten_danh_muc' => $ten_danh_muc, 'mo_ta' => $mo_ta];
                require_once './views/danhmuc/editDanhmuc.php';
            }
        }
    }
    public function deleteDanhMuc()
    {
        $id = $_GET['id_danh_muc'];
        $danhMuc = $this->modelDanhMuc->getDetailDanhMuc($id);
        if ($danhMuc) {
            $this->modelDanhMuc->destroyDanhMuc($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=danh-muc');
        exit();
    }
}

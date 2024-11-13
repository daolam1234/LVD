<?php

class AdminSanPhamController
{

    public $modelSanPham;
    public $modelDanhMuc;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
    }
    public function danhSachSanPham()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/sanpham/listSanPham.php';
    }

    public function formAddSanPham()
    {
        //hiem thi san pham
        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/sanpham/addSanPham.php';
    }
    public function postAddSanPham()
    {
        //xu ly them du lieu
        var_dump($_POST);
    }
}

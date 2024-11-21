<?php

class HomeController
{
    public $modelSanPham;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllProduct();
        require_once './views/home.php';
    }

    // public function trangChu()
    // {
    //     echo "day la trang chu";
    // }

    public function danhSachSanPham()
    {
        $listProduct = $this->modelSanPham->getAllProduct();
        // var_dump($listProduct);die();
        require_once './views/listProduct.php';
    }   
    
    public function chiTietSanPham(){
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        $listSanPhamCungDanhMuc = $this -> modelSanPham -> getlistSanPhamDanhMuc($sanPham['danh_muc_id']);

        if ($sanPham) {
            require_once './views/detailSanPham.php';
        } else {
            header("Location: " . BASE_URL );
            exit();
        }
    }
}

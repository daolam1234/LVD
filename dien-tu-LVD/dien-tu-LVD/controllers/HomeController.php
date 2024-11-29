<?php

class HomeController
{
    public $modelSanPham;
    // public $modelTaiKhoan;
    // public $modelGioHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        // $this->modelTaiKhoan = new TaiKhoan();
        // $this->$modelGioHang =  new GioHang();
    }

    public function home()
    {
        $listSanPham = $this->modelSanPham->getAllSanPham();
        require_once './views/home.php';
    }
    public function trangChu()
    {
        echo "Đây là trang chủ của tôi";
    }
    // public function danhSachSanPham()
    // {
    //     $listProduct = $this->modelSanPham->getAllProduct();
    //     // var_dump($listProduct);die();
    //     require_once './views/listProduct.php';
    // }
    // public function chiTietSanPham(){
    //     $id = $_GET['id_san_pham'];
    //     $sanPham = $this->modelSanPham->getDetailSanPham($id);
    //     $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
    //     $listBinhLuan = $this->modelSanPham->getBinhLuanFormSanPham($id);
    //     $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamDanhMuc($sanPham['danh_muc_id']);
    //     if ($sanPham) {
    //         require_once './views/detailSanPham.php';
    //     } else {
    //         header("Location: " . BASE_URL);
    //         exit();
    //     }
    // }
    // public function formLogin(){
    //     require_once './views/auth/formLogin.php';
    //     deleteSessionError();
    //     exit();
    // }
    // public function postLogin(){
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $email = $_POST['email'];
    //         $password = $_POST['password'];
    //         $user = $this->modelTaiKhoan->checkLogin($email, $password);
    //         if($user == $email) {
    //             $_SESSION['user_client'] = $user;
    //             header("Location: " . BASE_URL);
    //             exit();
    //         }else{
    //             $_SESSION['error'] = $user;
    //             $_SESSION['flash'] = true;
    //             header("Location: " . BASE_URL . '?act=login');
    //             exit();
    //         }
    //     }
    // }
    // public function addGioHang(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         if(isset($_SESSION['user_client'])){
    //             $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
    //             $gioHang = $this->modelGioHang->getGioHangFormUser($mail['id']);
    //             if (!$gioHang) {
    //                 $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
    //                 $gioHang = ['id'=>$gioHangId];
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //             }else{
    //                 $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //             }
    //             $san_pham_id = $_POST['san_pham_id'];
    //             $so_luong = $_POST['so_luong'];
    //             $checkSanPham = false;
    //             foreach($chiTietGioHang as $detail){
    //                 if($detail['san_pham_id'] == $san_pham_id) {
    //                     $newSoLuong = $detail['so_luong'] + $so_luong;
    //                     $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
    //                     $checkSanPham = true;
    //                     break;
    //                 }
    //             }
    //             if(!$checkSanPham) {
    //                 $this->modelGioHang->addDetailGioHang($gioHang['id'],$san_pham_id, $so_luong);
    //             }
    //             header("Location: " . BASE_URL . '?act=gio-hang');
    //         }else{
    //             var_dump('Chưa đăng nhập');die;
    //         }
    //     }
    // }
    // public function gioHang(){
    //     if (isset($_SESSION['user_client']){}){
    //         $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
    //         $gioHang = $this->modelGioHang->getGioHangFormUser($mail['id']);
    //         if(!$gioHang) {
    //             $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
    //             $gioHang = ['id'=>$gioHangId];
    //             $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //         }else{
    //             $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    //         }
    //         require_once './views/gioHang.php';
    //     }else{
    //         var_dump('Chưa đăng nhập');die;
    //     }
    // }
    // public function thanhToan(){
    //     require_once './views/thanhToan.php';
    // }
}


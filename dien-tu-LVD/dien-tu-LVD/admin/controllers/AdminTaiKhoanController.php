<?php
class AdminTaiKhoanController
{
    public $modelTaiKhoan;

    public function __construct()
    {
        $this->modelTaiKhoan = new AdminTaiKhoan();
    }

    public function danhSachQuanTri()
    {
        $listQuantri = $this->modelTaiKhoan->getAllTaiKhoan(1);
        require_once './views/taikhoan/quantri/listQuanTri.php';
    }

    public function formAddQuanTri()
    {
        require_once './views/taikhoan/quantri/addQuanTri.php';


        // deleteSessionError();
    }
    public function postAddQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = "ko duoc de trong ten";
            }
            if (empty($email)) {
                $errors['email'] = "ko duoc de trong email";
            }

            $_SESSION["errors"] = $errors;

            if (empty($errors)) {
                //dat password mac dinh
                $password = password_hash('123@123ab', PASSWORD_BCRYPT);
                // var_dump($password);
                // die;
                //khai bao chuc vu
                $chuc_vu_id = 1;

                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $password, $chuc_vu_id);
                header("Location:" .  BASE_URL_ADMIN . '/?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" .  BASE_URL_ADMIN . '/?act=form-them-quan-tri');
                exit();
            }
        }

        // deleteSessionError();
    }
    public function formEditQuanTri()
    {
        $id_quan_tri = $_GET['id_quan_tri'];
        $quanTri = $this->modelTaiKhoan->getDetailTaiKhoan($id_quan_tri);
        require_once './views/taikhoan/quantri/editQuanTri.php';
    }

    public function postEditQuanTri()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $quan_tri_id = $_POST["quan_tri_id"] ?? '';

            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST["email"] ?? '';
            $so_dien_thoai = $_POST["so_dien_thoai"] ?? '';
            $trang_thai = $_POST["trang_thai"] ?? '';

            $errors = [];
            if (empty($ho_ten)) {
                $errors['ho_ten'] = "ko duoc de trong ten";
            }
            if (empty($email)) {
                $errors['email'] = "ko duoc de trong email";
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = "ko duoc de trong trang thai";
            }
            $_SESSION["errors"] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($quan_tri_id, $ho_ten, $email, $so_dien_thoai, $trang_thai);
                header("Location:" .  BASE_URL_ADMIN . '/?act=list-tai-khoan-quan-tri');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location:" .  BASE_URL_ADMIN . '/?act=form-sua-quan-tri&id_quan_tri=' . $quan_tri_id);
                exit();
            }
        }
    }


    public function danhSachKhachHang()
    {
        $listKhachHang = $this->modelTaiKhoan->getAllTaiKhoan(2);
        require_once './views/taikhoan/khachhang/listKhachHang.php';
    }

    public function formEditKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        require_once './views/taikhoan/khachhang/editKhachHang.php';
    }

    public function deltailKhachHang()
    {
        $id_khach_hang = $_GET['id_khach_hang'];
        $khachHang = $this->modelTaiKhoan->getDetailTaiKhoan($id_khach_hang);
        require_once './views/taikhoan/khachHang/deltailKhachHang.php';
    }


    //login
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            var_dump($password, $email);
            die;
        }
    }
}

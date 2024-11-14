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

            //mang hinh anh
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
            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'không để trống rống trạng thái';
            }

            $_SESSION['error'] = $errors;

            //ko co loi
            if (empty($errors)) {
                //neu ko co loi
                $san_pham_id = $this->modelSanPham->insertSanPham($ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $file_thumb);

                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }
                header("Location:" . BASE_URL_ADMIN . '/?act=san-pham');
            } else {
                //tra ve form
                //dat chi thi xoa session sau khi hirn thi form
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '/?act=form-them-san-pham');
                exit();
            }
        }
    }
    public function formEditSanPham()
    {
        //hàm dùng để hiển thị form nhập
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("Location: " . BASE_URL_ADMIN . '/?act=san-pham');
            exit();
        }
    }

    public function postEditSanPham()
    {
        //xu ly them du lieu
        // var_dump($_POST);
        //kiem tra du lieu co phai duowc submit len ko
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST'
        ) {
            //lay du lieu
            //lay du lieu cu cua san pham
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //truy van
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; //lay anh cu

            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;


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
            // if ($hinh_anh['error'] !== 0) {
            //     $errors['hinh_anh'] = 'không để trống rống trạng thái';
            // }

            $_SESSION['error'] = $errors;


            //logic sua anh
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                //up anh moi
                $new_file = uploadFile($hinh_anh, './uploads/');

                if (!empty($old_file)) { //xoa anh cu neu co
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }

            //ko co loi
            if (empty($errors)) {
                //neu ko co loi
                $san_pham_id = $this->modelSanPham->updateSanPham($san_pham_id, $ten_san_pham, $gia_san_pham, $gia_khuyen_mai, $so_luong, $ngay_nhap, $danh_muc_id, $trang_thai, $mo_ta, $new_file);

                header("Location:" . BASE_URL_ADMIN . '/?act=san-pham');
            } else {
                //tra ve form
                //dat chi thi xoa session sau khi hirn thi form
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL_ADMIN . '/?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
                exit();
            }
        }
    }
    //sua album anh
    // sua anh cu
    //ko sua anh cu
    //xoa anh cu

    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            //lay danh sach anh hien tai cua
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            //xu ly anh tu form
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_id'] ?? [];

            //khai bao mang de luu anh moi
            $upload_file = [];

            //up anh moi hoac thay anh cu

            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            //luu anh moi vao db va xoa anh cu
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];
                    //cap nhat anh cu
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);
                    //xoa anh cu
                    deleteFile($old_file);
                } else {
                    //them anh moi
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }
            }
            //xu ly xoa anh
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // xoa anh trong db
                    $this->modelSanPham->destroyAnhSanPham($anh_id);
                    //xoa file
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location:" . BASE_URL_ADMIN . '/?act=form-sua-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }

    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=san_pham');
        exit();
    }
}

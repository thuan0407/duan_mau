<?php

$action = $_GET['action'] ?? '/';
$id = $_GET['id'] ?? '';

match ($action) {
    //phái khách hàng///////       ////              /////             ////
    '/'         => (new ControllerQuery)->webphone(),
    'gioithieu'         => (new ControllerQuery)->gioithieu(),
    'trangchu'         => (new ControllerQuery)->trangchu(),
    'lienhe'         => (new ControllerQuery)->lienhe(),
    'sanpham'         => (new ControllerQuery)->sanpham(),

    //các luông phần quản lý sản phẩm
    'create_sanpham'         => (new ControllerQuery)->create_sanpham(),
    'delete_sanpham'         => (new ControllerQuery)->delete_sanpham($id),
    'updeta_sanpham'         => (new ControllerQuery)->update_sanpham($id),
    //


    //phía người quản trị //////         /////          /////            //////
    'dangky'         => (new ControllerQuery)->dangky(),
    'dangnhap'         => (new ControllerQuery)->dangnhap(),
    'dangxuat'         => (new ControllerQuery)->dangxuat(),
    'giaodien'         => (new ControllerQuery)->giaodien(),
    'quanly_sanpham'         => (new ControllerQuery)->quanly_sanpham(),
    'quanly_danhmuc'         => (new ControllerQuery)->quanly_danhmuc(),
    'quanly_taikhoan'         => (new ControllerQuery)->quanly_taikhoan(),
    'quanly_binhluan'         => (new ControllerQuery)->quanly_binhluan(),
    'quanly_donhang'         => (new ControllerQuery)->quanly_donhang(),


    //còn lại
    default     => (new ControllerQuery)->error404(), // nên thêm hàm xử lý lỗi 404
};
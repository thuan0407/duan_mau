<?php

$action = $_GET['action'] ?? '/';
$id = $_GET['id'] ?? '';
$hot = $_GET['hot'] ?? '';

match ($action) {
    //phái khách hàng///////       ////              /////             ////
    '/'                 => (new ControllerQuery)->webphone(),
    'gioithieu'         => (new ControllerQuery)->gioithieu(),
    'trangchu'          => (new ControllerQuery)->trangchu($hot),
    'lienhe'            => (new ControllerQuery)->lienhe(),
    'sanpham'           => (new ControllerQuery)->sanpham(),
    'danhmuc'           => (new ControllerQuery)->danhmuc($id),
    'chi_tiet_sp'       => (new ControllerQuery)->chi_tiet_sp($id),
    'hot1'              => (new ControllerQuery)->hot1(),
    'hot2'              => (new ControllerQuery)->hot2(),
    'khuyenmai'         => (new ControllerQuery)->khuyenmai(),
    'default'         => (new ControllerQuery)->trangchu(),


    //các luông phần quản lý sản phẩm
    'create_sanpham'         => (new ControllerQuery)->create_sanpham(),
    'delete_sanpham'         => (new ControllerQuery)->delete_sanpham($id),
    'updeta_sanpham'         => (new ControllerQuery)->update_sanpham($id),
    //các luộng phần quản lý danh mục
    'delete_danhmuc'         => (new ControllerQuery)->delete_danhmuc($id),
    'update_danhmuc'         => (new ControllerQuery)->update_danhmuc($id),


    //phía người quản trị //////         /////          /////            //////
    'dangky'                 => (new ControllerQuery)->dangky(),
    'dangnhap'               => (new ControllerQuery)->dangnhap(),
    'dangxuat'               => (new ControllerQuery)->dangxuat(),
    'giaodien'               => (new ControllerQuery)->giaodien(),
    'trangchu_admin'         => (new ControllerQuery)->trangchu_admin(),
    'quanly_sanpham'         => (new ControllerQuery)->quanly_sanpham(),
    'quanly_danhmuc'         => (new ControllerQuery)->quanly_danhmuc(),
    'quanly_taikhoan'        => (new ControllerQuery)->quanly_taikhoan(),
    'quanly_binhluan'        => (new ControllerQuery)->quanly_binhluan(),
    'quanly_donhang'         => (new ControllerQuery)->quanly_donhang(),


    //còn lại
    default                  => (new ControllerQuery)->error404(), // nên thêm hàm xử lý lỗi 404
};
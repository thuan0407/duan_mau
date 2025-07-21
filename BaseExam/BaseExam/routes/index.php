<?php

$action = $_GET['action'] ?? '/';
$id = $_GET['id'] ?? '';
$hot = $_GET['hot'] ?? '';

match ($action) {

    //xử lý phần đăng nhập đăng ký đầu vào //////         /////          /////            //////
    '/'                      => (new ControllerChung)->webphone(),
    'dangky'                 => (new ControllerChung())->dangky(),
    'dangnhap'               => (new ControllerChung)->dangnhap(),




    //phái khách hàng///////       ////              /////             ////
    'gioithieu'         => (new ControllerUser)->gioithieu(),
    'trangchu'          => (new ControllerUser)->trangchu($hot),
    'lienhe'            => (new ControllerUser)->lienhe(),
    'sanpham'           => (new ControllerUser)->sanpham(),
    'danhmuc'           => (new ControllerUser)->danhmuc($id),
    'chi_tiet_sp'       => (new ControllerUser)->chi_tiet_sp($id),
    'hot1'              => (new ControllerUser)->hot1(),
    'hot2'              => (new ControllerUser)->hot2(),
    'khuyenmai'         => (new ControllerUser)->khuyenmai(),
    'default'           => (new ControllerUser)->trangchu(),





    //các luông phần quản lý sản phẩm
    'create_sanpham'         => (new ControllerAdmin)->create_sanpham(),
    'delete_sanpham'         => (new ControllerAdmin)->delete_sanpham($id),
    'updeta_sanpham'         => (new ControllerAdmin)->update_sanpham($id),
    //các luộng phần quản lý danh mục
    'delete_danhmuc'         => (new ControllerAdmin)->delete_danhmuc($id),
    'update_danhmuc'         => (new ControllerAdmin)->update_danhmuc($id),



    //phía người quản trị //////         /////          /////            //////
    'giaodien'               => (new ControllerAdmin)->giaodien(),
    'trangchu_admin'         => (new ControllerAdmin)->trangchu_admin(),
    'quanly_sanpham'         => (new ControllerAdmin)->quanly_sanpham(),
    'quanly_danhmuc'         => (new ControllerAdmin)->quanly_danhmuc(),
    'quanly_taikhoan'        => (new ControllerAdmin)->quanly_taikhoan(),
    'quanly_binhluan'        => (new ControllerAdmin)->quanly_binhluan(),
    'quanly_donhang'         => (new ControllerAdmin)->quanly_donhang(),
  
};
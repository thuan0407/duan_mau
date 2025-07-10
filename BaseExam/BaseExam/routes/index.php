<?php

$action = $_GET['action'] ?? '/';
$id = $_GET['id'] ?? '';

match ($action) {
    '/'         => (new ControllerQuery)->webphone(),
    'gioithieu'         => (new ControllerQuery)->gioithieu(),
    'trangchu'         => (new ControllerQuery)->trangchu(),
    'lienhe'         => (new ControllerQuery)->lienhe(),
    'sanpham'         => (new ControllerQuery)->sanpham(),

    'dangnhap'         => (new ControllerQuery)->dangnhap(),
    'dangxuat'         => (new ControllerQuery)->dangxuat(),
    'giaodien'         => (new ControllerQuery)->giaodien(),
};
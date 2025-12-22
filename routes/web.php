<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/user', function () {
    return view('user.dashboard');
});

// USER ROUTES
Route::get('/user/pinjam-ruangan', function () {
    return view('user.pinjam_ruangan');
})->name('user.pinjam-ruangan');

Route::get('/user/pinjam-barang', function () {
    return view('user.pinjam_barang');
})->name('user.pinjam-barang');

Route::get('/user/status-pengajuan', function () {
    return view('user.status_pengajuan');
})->name('user.status-pengajuan');

Route::get('/user/detail-ruangan', function () {
    return view('user.detail_ruangan');
})->name('user.detail-ruangan');

Route::get('/user/detail-barang', function () {
    return view('user.detail_barang');
})->name('user.detail-barang');


// ADMIN ROUTES
Route::get('/admin/kelola-ruangan', function () {
    return view('admin.ruangan');
})->name('admin.kelola-ruangan');

Route::get('/admin/tambah-ruangan', function () {
    return view('admin.tambah_ruangan');
})->name('admin.tambah-ruangan');

Route::get('/admin/edit-ruangan', function () {
    return view('admin.edit_ruangan');
})->name('admin.edit-ruangan');

Route::get('/admin/kelola-inventaris', function () {
    return view('admin.inventaris');
})->name('admin.kelola-inventaris');

Route::get('/admin/tambah-inventaris', function () {
    return view('admin.tambah_inventaris');
})->name('admin.tambah-inventaris');

Route::get('/admin/edit-inventaris', function () {
    return view('admin.edit_inventaris');
})->name('admin.edit-inventaris');

Route::get('/admin/peminjaman-ruangan', function () {
    return view('admin.peminjaman_ruangan');
})->name('admin.peminjaman-ruangan');

Route::get('/admin/peminjaman-barang', function () {
    return view('admin.peminjaman_barang');
})->name('admin.peminjaman-barang');
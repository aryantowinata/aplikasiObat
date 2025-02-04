<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/postLogin', [LoginController::class, 'postLogin'])->name('postLogin');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin/beranda', [AdminController::class, 'index'])->name('admin.beranda');
    Route::get('/admin/data-obat', [AdminController::class, 'dataObat'])->name('admin.dataObat');
    Route::get('/admin/tambah-data-obat', [AdminController::class, 'tambahDataObat'])->name('admin.tambah-data-obat');
    Route::post('/admin/simpan-data-obat', [AdminController::class, 'simpanDataObat'])->name('admin.simpan-data-obat');
    Route::delete('/admin/hapus-data-obat/{id}', [AdminController::class, 'hapusDataObat'])->name('admin.hapus-data-obat');
    Route::get('/admin/edit-data-obat/{id}', [AdminController::class, 'editDataObat'])->name('admin.edit-data-obat');
    Route::put('admin/update-data-obat/{id}', [AdminController::class, 'updateDataObat'])->name('admin.update-data-obat');

    Route::get('/admin/data-obat-masuk', [AdminController::class, 'dataObatMasuk'])->name('admin.data-obat-masuk');
    Route::get('/admin/tambah-data-obat-masuk', [AdminController::class, 'tambahDataObatMasuk'])->name('admin.tambah-data-obat-masuk');
    Route::post('/admin/simpan-obat-masuk', [AdminController::class, 'simpanDataObatMasuk'])->name('admin.simpan.obat-masuk');
    Route::delete('/admin/data-obat-masuk/{id}', [AdminController::class, 'hapusDataObatMasuk'])->name('admin.hapus-data-obat-masuk');
    Route::get('/admin/edit-data-obat-masuk/{id}', [AdminController::class, 'editDataObatMasuk'])->name('admin.edit-data-obat-masuk');
    Route::put('admin/update-data-obat-masuk/{id}', [AdminController::class, 'updateDataObatMasuk'])->name('admin.update-data-obat-masuk');

    Route::get('/admin/profileAdmin', [AdminController::class, 'profile'])->name('admin.profile');

    Route::get('/admin/persediaan', [AdminController::class, 'persediaan'])->name('admin.persediaan');
    Route::post('/admin/simpan-persediaan', [AdminController::class, 'simpanPersediaan'])->name('admin.simpan-persediaan');
    Route::get('/admin/tambah-persediaan', [AdminController::class, 'tambahPersediaan'])->name('admin.tambah-persediaan');
    Route::get('/admin/edit-persediaan/{id}', [AdminController::class, 'editPersediaan'])->name('admin.edit-persediaan');
    Route::post('/admin/persediaan/update/{id}', [AdminController::class, 'updatePersediaan'])->name('admin.update-persediaan');
    Route::delete('/admin/persediaan/hapus/{id}', [AdminController::class, 'hapusPersediaan'])->name('admin.hapus-persediaan');

    Route::get('/admin/data-obat-keluar/{id}', [AdminController::class, 'dataObatKeluar'])->name('admin.data-obat-keluar');
    Route::get('/admin/tambah-data-obat-keluar/{id}', [AdminController::class, 'tambahDataObatKeluar'])->name('admin.tambah-data-obat-keluar');
    Route::post('/admin/simpan-obat-keluar', [AdminController::class, 'simpanDataObatKeluar'])->name('admin.simpan.obat-keluar');
    Route::get('/admin/edit-data-obat-keluar/{id}', [AdminController::class, 'editDataObatKeluar'])->name('admin.edit-data-obat-keluar');
    Route::delete('/admin/hapus-data-obat-keluar/{id}', [AdminController::class, 'hapusDataObatKeluar'])->name('admin.hapus-data-obat-keluar');
    Route::put('admin/update-data-obat-keluar/{id}', [AdminController::class, 'updateDataObatKeluar'])->name('admin.update-data-obat-keluar');


    Route::get('/admin/sisa-stok-obat', [AdminController::class, 'sisaStokObat'])->name('admin.sisa-stok-obat');
    Route::get('/admin/laporan', [AdminController::class, 'laporan'])->name('admin.laporan');
    Route::post('/admin/cetak', [AdminController::class, 'cetak'])->name('admin.cetak');

    Route::post('/admin/profile/update', [AdminController::class, 'updateProfile'])->name('admin.updateProfile');
});

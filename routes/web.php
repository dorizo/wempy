<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrondendController::class, 'index'])->name('home');
// function () {
//     return view('frondend.layout');
// });

Route::get('/galeri', [App\Http\Controllers\HomeController::class, 'index'])->name('galeri');

Route::get('/news', [App\Http\Controllers\HomeController::class, 'index'])->name('news');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/halaman/{kode}', [App\Http\Controllers\FrondendController::class, 'halaman'])->name('halaman');
Route::get('/permission/add', [App\Http\Controllers\Master\PermissionController::class, 'add'])->name('permission.add');
Route::resource('permission', App\Http\Controllers\Master\PermissionController::class);
Route::post('/permissionrole', [App\Http\Controllers\Master\RoleController::class, 'permission_role'])->name('permissionrole.store');
Route::delete('/permissionrole/{permission_role}', [App\Http\Controllers\Master\RoleController::class, 'permission_destroy'])->name('permissionrole.destroy');

Route::resource('beritas', App\Http\Controllers\BeritaController::class);
Route::resource('beritavideo', App\Http\Controllers\BeritavideoController::class);
Route::resource('role', App\Http\Controllers\Master\RoleController::class);
Route::resource('user', App\Http\Controllers\Master\UserController::class);
Route::resource('jabatan', App\Http\Controllers\JabatanController::class);
Route::resource('member', App\Http\Controllers\MemberController::class);
Route::resource('menu', App\Http\Controllers\MenuController::class);
Route::resource('whatsapp', App\Http\Controllers\WhatsappController::class);
Route::resource('kategori', App\Http\Controllers\MemberKatsController::class)->parameters(['kategori' => 'member_kats']);;
Route::get('member/{member}/change', [App\Http\Controllers\MemberController::class, 'change'])->name('member.changepw');
Route::resource('member', App\Http\Controllers\MemberController::class);
Route::post('member/changepw', [App\Http\Controllers\MemberController::class, 'changepw'])->name('member.changepwput');
Route::put('menu/{menu}/menucontent', [App\Http\Controllers\MenuController::class, 'menucontent'])->name('menu.menucontent');
Route::post('whatsapp/submitdetail', [App\Http\Controllers\WhatsappController::class, 'submitdetail']);
Route::resource('settingblash', App\Http\Controllers\SettingblashController::class);

Route::resource('iuran', App\Http\Controllers\IuranController::class);
Route::resource('pengeluaran', App\Http\Controllers\PengeluaranController::class);
Route::post('/iuran/bayar', [App\Http\Controllers\IuranController::class, 'bayar'])->name('iuran.bayar');

Route::get('/home/berita', [App\Http\Controllers\HomeController::class, 'berita'])->name('home.berita');

Route::get('/api/member/{id}', [App\Http\Controllers\MemberController::class, 'listdata']);
Route::get('/api/runwa/{id}', [App\Http\Controllers\MemberController::class, 'runwa']);
Route::get('/api/sendwa/{id}/{whatsappCode}', [App\Http\Controllers\WhatsappDetailController::class, 'sendwa']);

Route::get('/home/beritavideo', [App\Http\Controllers\HomeController::class, 'beritavideo'])->name('home.beritavideo');



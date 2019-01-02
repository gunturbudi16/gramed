<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kategori;
use Buku;

class AdminController extends Controller
{
    //
    function do_ubah_buku(Request $request,$id_buku){
        $rules = [
            "txt_nama" => "required",
            "cbo_kategori" => "required",
            "txt_pengarang" => "required",
            "txt_penerbit" => "required",
            "txt_tanggal" => "required",
            "txt_harga" => "required|numeric|min:1",
            "txt_stok" => "required|numeric|min:1",
            "file_foto" => "image|mimes:jpeg,png"
        ];
        $attributes=[
            "txt_nama" => "Nama Buku",
            "cbo_kategori" => "Kategori",
            "txt_pengarang" => "Pengarang",
            "txt_penerbit" => "Penerbit",
            "txt_tanggal" => "Tanggal Pinjam",
            "txt_harga" => "Harga Satuan",
            "txt_stok" => "Stok Buku",
            "file_foto" => "Foto Buku"
        ];
        $message = [
            "numeric" => ":attribute harus diisi dengan angka",
            "required" => ":attribute harus diisi",
            "min" => ":attribute harus diisi minimal :min",
            "mimes" => ":attribute harus diisi dengan format :value"
        ];

        $this->validate($request,$rules,$message,$attributes);

        $foto = $request->file_foto;
        if(!empty($foto)){
            $foto_buku=$foto->getClientOriginalName();
            $foto->move("img/buku/",$foto_buku);
        }else{
            $foto_buku="";
        }

        $nama_buku=$request->txt_nama;
        $id_kategori=$request->cbo_kategori;
        $tanggal_pinjam=$request->txt_tanggal;
        $harga_satuan=$request->txt_harga;
        $pengarang=$request->txt_pengarang;
        $penerbit=$request->txt_penerbit;
        $stok_buku=$request->txt_stok;

        Buku::ubah_buku($id_buku,$nama_buku,$id_kategori,$tanggal_pinjam,$foto_buku,$harga_satuan,$pengarang,$penerbit,$stok_buku);
        return redirect("admin/");
    }

    function ubah_buku($id_buku){
        $kategori = Kategori::list_kategori();
        $data = Buku::detail_buku($id_buku);
        return view ("admin_view/ubah_buku")
        ->with("kategori",$kategori)
        ->with("data",$data);
    }

    function hapus_buku($id_buku){
        Buku::hapus_buku($id_buku);
        return redirect("admin/");
    }

    function list_buku(Request $request){
    	$nama_buku = $request->cari;
    	$list = Buku::list_buku($nama_buku);
    	return view("admin_view/list_buku")->with("list",$list);
    }

    function tambah_buku(){
    	$kategori = Kategori::list_kategori();
    	return view("admin_view/tambah_buku")->with("kategori",$kategori);
    }

    function do_tambah_buku(Request $request){
    	$rules = [
    		"txt_nama" => "required",
    		"cbo_kategori" => "required",
    		"txt_pengarang" => "required",
    		"txt_penerbit" => "required",
    		"txt_tanggal" => "required",
    		"txt_harga" => "required|numeric|min:1",
    		"txt_stok" => "required|numeric|min:1",
    		"file_foto" => "required|image|mimes:jpeg,png"
    	];
    	$attributes=[
    		"txt_nama" => "Nama Buku",
    		"cbo_kategori" => "Kategori",
    		"txt_pengarang" => "Pengarang",
    		"txt_penerbit" => "Penerbit",
    		"txt_tanggal" => "Tanggal Pinjam",
    		"txt_harga" => "Harga Satuan",
    		"txt_stok" => "Stok Buku",
    		"file_foto" => "Foto Buku"
    	];
    	$message = [
    		"numeric" => ":attribute harus diisi dengan angka",
    		"required" => ":attribute harus diisi",
    		"min" => ":attribute harus diisi minimal :min",
    		"mimes" => ":attribute harus diisi dengan format :value"
    	];

    	$this->validate($request,$rules,$message,$attributes);

    	$file_foto = $request->file_foto;
        $foto_buku=$file_foto->getClientOriginalName();
        $file_foto->move("img/buku/",$foto_buku);
        $nama_buku=$request->txt_nama;
        $id_kategori=$request->cbo_kategori;
        $tanggal_pinjam=$request->txt_tanggal;
        $harga_satuan=$request->txt_harga;
        $pengarang=$request->txt_pengarang;
        $penerbit=$request->txt_penerbit;
        $stok_buku=$request->txt_stok;

        Buku::tambah_buku($nama_buku,$id_kategori,$tanggal_pinjam,$foto_buku,$harga_satuan,$pengarang,$penerbit,$stok_buku);

        return redirect("/admin");
    }
}

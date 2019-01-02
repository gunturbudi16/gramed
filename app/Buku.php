<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon;

class Buku extends Model
{
    //

    protected $primaryKey = "id_buku";
    protected $table = "buku";
    //public $timestamps = false;

    protected $fillable = [
        'nama_buku', 'id_kategori','tanggal_pinjam','foto_buku','harga_satuan','pengarang','penerbit','stok_buku'
    ];

    static function tambah_buku($nama_buku,$id_kategori,$tanggal_pinjam,$foto_buku,$harga_satuan,$pengarang,$penerbit,$stok_buku){
    	Buku::create([
    		"nama_buku" => $nama_buku,
    		"id_kategori" => $id_kategori,
    		"tanggal_pinjam" => Carbon::parse($tanggal_pinjam),
    		"foto_buku" => $foto_buku,
    		"harga_satuan" => $harga_satuan,
    		"pengarang" => $pengarang,
    		"penerbit" => $penerbit,
    		"stok_buku" => $stok_buku,
    	]);
    }

    static function ubah_buku($id_buku,$nama_buku,$id_kategori,$tanggal_pinjam,$foto_buku="",$harga_satuan,$pengarang,$penerbit,$stok_buku){
    	$data = Buku::where("id_buku",$id_buku)->first();
    	$data->nama_buku = $nama_buku;
    	$data->id_kategori = $id_kategori;
    	$data->tanggal_pinjam = Carbon::parse($tanggal_pinjam);
    	if($foto_buku!=""){
    		$data->foto_buku = $foto_buku;	
    	}
    	$data->harga_satuan = $harga_satuan;
    	$data->pengarang = $pengarang;
    	$data->penerbit = $penerbit;
    	$data->save();
    }

    static function hapus_buku($id_buku){
    	$data = Buku::where("id_buku",$id_buku)->first();
    	$data->delete();
    }

    static function list_buku($nama_buku=""){
    	$data = DB::table("buku as bk")->join("kategori as kt","kt.id_kategori","=","bk.id_kategori");
    	if($nama_buku!=""){
    		$data->where("bk.nama_buku","LIKE","%".$nama_buku."%");
    		//$data->where => AND
    		//$data->orWhere => AND
    	}
    	return $data->paginate(1);
    }

    static function detail_buku($id_buku){
    	$data = DB::table("buku as bk")->join("kategori as kt","kt.id_kategori","=","bk.id_kategori")->where("bk.id_buku",$id_buku)->first();
    	return $data;
    }
}

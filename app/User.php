<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "id_user";
    //public $timestamps = false;

    protected $fillable = [
        'nama', 
        'email', 
        'password',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'jurusan',
        'telp',
        'foto'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //eloquent
    static function tambah_user($nama,$email,$password,$tanggal_lahir,$alamat,$jenis_kelamin,$jurusan,$telp,$foto){
        $data = User::create([
            "nama" => $nama,
            "email" => $email,
            "password" => bcrypt($password),
            "tanggal_lahir" => Carbon::parse($tanggal_lahir),
            "alamat" => $alamat,
            "jenis_kelamin" => $jenis_kelamin,
            "jurusan" => $jurusan,
            "telp" => $telp,
            "foto" => $foto,
        ]);

        return $data->id_user;
    }

    static function ubah_user($id_user,$nama,$tanggal_lahir,$alamat,$jenis_kelamin,$jurusan,$telp,$foto=""){
        $data = User::where("id_user",$id_user)->first();
        $data->nama = $nama;
        $data->tanggal_lahir = Carbon::parse($tanggal_lahir);
        $data->alamat = $alamat;
        $data->jenis_kelamin = $jenis_kelamin;
        $data->jurusan = $jurusan;
        $data->telp = $telp;
        if($foto!=""){
            $data->foto = $foto;
        }

        //$data->stok_buku = $data->stok_buku - $jumlah;
        $data->save();
    }

    static function hapus_user($id_user){
        $data = User::where("id_user",$id_user)->first();
        $data->delete();
    }

    static function detail_user($id_user){
        $data = User::where("id_user",$id_user)->first();
        return $data;
    }

    static function list_user(){
        //get();
        //limit();
        //paginate();
        $data = User::all();
        return $data;
    }

    static function login_user($email,$password){
        //check();
        //user()->nama;
        //logout();

        $data = Auth::attempt([
            "email" => $email,
            "password" => $password
        ],true);

        return $data;
    }
}

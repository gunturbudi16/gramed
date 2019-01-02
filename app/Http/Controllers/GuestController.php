<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use User;
use Auth;
use Fungsi;

class GuestController extends Controller
{
    //

    function register(){
    	$jurusan = ["SI","TI","Akuntansi"];
    	return view("guest_view/register")->with("jurusan",$jurusan);
    }

    function do_register(Request $request){
    	$rules=[
    		"txt_nama" => "required",
    		"txt_email" => "required|email|unique:users,email",
    		"txt_password" => "required|min:6",
    		"txt_ulangi"=> "required|same:txt_password",
    		"txt_tanggal" => "required",
    		"txt_alamat" => "required",
    		"rdo_kelamin" => "required",
    		"cbo_jurusan" => "required",
    		"txt_telp" => "required|numeric|digits_between:7,12",
    		"file_foto" => "required|image|mimes:jpeg,png",
    		"chk_setuju" => "required "
    	];
    	$attributes=[
    		"txt_nama" => "Nama Anda",
    	];
    	$messages=[
            "unique" => ":attribute sudah digunakan",
    		"required" => ":attribute harus diisi",
    		"same" => ":attribute harus sama dengan :other"
    	];

    	$this->validate($request,$rules,$messages,$attributes);

        $file_foto = $request->file_foto;
        $foto=$file_foto->getClientOriginalName();
        $file_foto->move("img/",$foto);

        $nama=$request->txt_nama;
        $email=$request->txt_email;
        $password=$request->txt_password;
        $tanggal_lahir=$request->txt_tanggal;
        $alamat=$request->txt_alamat;
        $jenis_kelamin=$request->rdo_kelamin;
        $jurusan=$request->cbo_jurusan;
        $telp=$request->txt_telp;

        User::tambah_user($nama,$email,$password,$tanggal_lahir,$alamat,$jenis_kelamin,$jurusan,$telp,$foto);
        $pesan="halo ".$nama." Selamat Datang";
        Fungsi::kirim_sms($telp,$pesan);

        return back()->with("sukses","Data Anda berhasil diregistrasikan");

        //redirect()

    }

    function login(){
    	return view("guest_view/login");
    }

    function do_login(Request $request){
        $email = $request->txt_email;
        $password = $request->txt_password;
        $cek = User::login_user($email,$password);
        if($cek){
            /*
                $role = Auth::user()->role;
                switch($role){
                    case "Admin":
                        return redirect("/admin");
                        break;
                }
            */
            return redirect("/admin");
        }else{
            return back()->with("error","Email dan Password salah");
        }
    }

    function logout(){
        Auth::logout();
        return redirect("/");
    }


}

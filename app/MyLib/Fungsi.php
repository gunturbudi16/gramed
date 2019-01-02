<?php 
namespace App\MyLib;
	class Fungsi {
		static function kirim_sms($telp,$pesan){
			$userkey = "ukcw8l"; //userkey lihat di zenziva
			$passkey = "4ding15lax"; // set passkey di zenziva
			$telepon = $telp;
			$message = $pesan;
			$url = "https://reguler.zenziva.net/apps/smsapi.php";
			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL, $url);
			curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$telepon.'&pesan='.urlencode($message));
			curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
			curl_setopt($curlHandle, CURLOPT_POST, 1);
			$results = curl_exec($curlHandle);
			curl_close($curlHandle);
		}
	}
 ?>
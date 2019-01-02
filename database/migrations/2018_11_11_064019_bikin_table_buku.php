<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BikinTableBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->integer("id_kategori")->unsigned();
            $table->date("tanggal_pinjam");
            $table->string("foto_buku");
            $table->string("nama_buku");
            $table->integer('harga_satuan');
            $table->string('pengarang');
            $table->string('penerbit');
            $table->integer('stok_buku');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}

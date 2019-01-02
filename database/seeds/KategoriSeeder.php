<?php

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kategori::tambah_kategori("Komik");
        Kategori::tambah_kategori("Komputer");
        Kategori::tambah_kategori("Bisnis");
        Kategori::tambah_kategori("Novel");
        Kategori::tambah_kategori("Majalah");
    }
}

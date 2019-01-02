@extends("admin_view/layout")
@section("judul","Tambah Buku")
@section("content")
	<form class="form-horizontal" method="post" action="{{url('admin/buku/tambah')}}" enctype="multipart/form-data">
		{{csrf_field()}}
<fieldset>

<!-- Form Name -->
<legend></legend>

@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	</div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_nama">Nama Buku</label>  
  <div class="col-md-4">
  <input id="txt_nama" name="txt_nama" type="text" placeholder="Nama Buku" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cbo_kategori">Kategori</label>
  <div class="col-md-4">
    <select id="cbo_kategori" name="cbo_kategori" class="form-control">
      <option value="">-Pilih-</option>
      @foreach($kategori as $kat)
      <option value="{{$kat->id_kategori}}">{{$kat->nama_kategori}}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_harga">Harga Satuan</label>  
  <div class="col-md-4">
  <input id="txt_harga" name="txt_harga" type="text" placeholder="Harga Satuan" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_pengarang">Pengarang</label>  
  <div class="col-md-4">
  <input id="txt_pengarang" name="txt_pengarang" type="text" placeholder="Pengarang" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_stok">Stok Buku</label>  
  <div class="col-md-4">
  <input id="txt_stok" name="txt_stok" type="text" placeholder="Stok Buku" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_penerbit">Penerbit</label>  
  <div class="col-md-4">
  <input id="txt_penerbit" name="txt_penerbit" type="text" placeholder="Penerbit" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_tanggal">Tanggal Pinjam</label>  
  <div class="col-md-4">
  <input id="txt_tanggal" name="txt_tanggal" type="date" placeholder="Tanggal Pinjam" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_foto">Foto Buku</label>
  <div class="col-md-4">
    <input id="file_foto" name="file_foto" class="input-file" type="file">
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Simpan</button>
  </div>
</div>

</fieldset>
</form>

@endsection


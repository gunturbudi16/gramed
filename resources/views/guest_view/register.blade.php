@extends("guest_view/layout")
@section("judul","Home")
@section("content")
	<form class="form-horizontal" method="post" action="{{url('/register')}}" enctype="multipart/form-data">
		{{ csrf_field() }}
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

@if($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	</div>
@endif

@if(Session::has("sukses"))
  <div class="alert alert-success">
    {{Session::get("sukses")}}
  </div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_nama">Nama</label>  
  <div class="col-md-4">
  <input id="txt_nama" name="txt_nama" type="text" placeholder="Nama Anda" class="form-control input-md" value="{{old('txt_nama')}}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_email">Email</label>  
  <div class="col-md-4">
  <input id="txt_email" name="txt_email" type="text" placeholder="Email Anda" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_password">Password</label>
  <div class="col-md-4">
    <input id="txt_password" name="txt_password" type="password" placeholder="Password Anda" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_ulangi">Ulangi Password</label>
  <div class="col-md-4">
    <input id="txt_ulangi" name="txt_ulangi" type="password" placeholder="Ulangi Password Anda" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_tanggal">Tanggal Lahir</label>  
  <div class="col-md-4">
  <input id="txt_tanggal" name="txt_tanggal" type="date" placeholder="Tanggal Lahir" class="form-control input-md">
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_alamat">Alamat</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="txt_alamat" name="txt_alamat"></textarea>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-4 control-label" for="rdo_kelamin">Jenis Kelamin</label>
  <div class="col-md-4">
  <div class="radio">
    <label for="rdo_kelamin-0">
      <input type="radio" name="rdo_kelamin" id="rdo_kelamin-0" value="Pria" checked="checked">
      Pria
    </label>
	</div>
  <div class="radio">
    <label for="rdo_kelamin-1">
      <input type="radio" name="rdo_kelamin" id="rdo_kelamin-1" value="Wanita">
      Wanita
    </label>
	</div>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cbo_jurusan">Jurusan</label>
  <div class="col-md-4">
    <select id="cbo_jurusan" name="cbo_jurusan" class="form-control">
      <option value="">-Pilih-</option>
      @foreach($jurusan as $j)
      	<option value="{{$j}}">{{$j}}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_telp">Telp</label>  
  <div class="col-md-4">
  <input id="txt_telp" name="txt_telp" type="text" placeholder="Telp Anda" class="form-control input-md">
    
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="file_foto">Foto</label>
  <div class="col-md-4">
    <input id="file_foto" name="file_foto" class="input-file" type="file">
  </div>
</div>

<!-- Multiple Checkboxes (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="chk_setuju"></label>
  <div class="col-md-4">
    <label class="checkbox-inline" for="chk_setuju-0">
      <input type="checkbox" name="chk_setuju" id="chk_setuju-0" value="ya">
      Saya Setuju dengan peraturan
    </label>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Register</button>
  </div>
</div>

</fieldset>
</form>

@endsection

